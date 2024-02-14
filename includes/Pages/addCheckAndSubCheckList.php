<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['subItem'])) {
    $subCheckList = $_REQUEST['subItem'];
    $checkList = $_REQUEST['dataItem'];
    $studentId = $_REQUEST['studentId'];
    $ctpId = $_REQUEST['ctpId'];

    $checkQuery = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$checkList' AND subCheckListId = '$subCheckList' AND studentId = '$studentId' AND ctpId = '$ctpId'");
    $checkData = $checkQuery->fetchColumn();

    if ($checkData <= 0) {
        $sql = "INSERT INTO check_sub_checklist (checkListId,subCheckListId,studentId,ctpId) VALUES ('$checkList','$subCheckList','$studentId','$ctpId')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    }
    // else {
    //     $sql = "INSERT INTO check_sub_checklist (checkListId,subCheckListId,studentId,ctpId) VALUES ('$checkList','$subCheckList','$studentId','$ctpId')";
    //     $stmt = $connect->prepare($sql);
    //     $stmt->execute();
    // }
}

if (isset($_REQUEST['subItemRem'])) {
    $subCheckList = $_REQUEST['subItemRem'];
    $checkList = $_REQUEST['dataItem'];
    $studentId = $_REQUEST['studentId'];
    $ctpId = $_REQUEST['ctpId'];

    $sql1 = "DELETE FROM check_sub_checklist WHERE checkListId = '$checkList' AND subCheckListId = '$subCheckList' AND studentId = '$studentId' AND ctpId = '$ctpId'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();
    // else {
    //     $sql = "INSERT INTO check_sub_checklist (checkListId,subCheckListId,studentId,ctpId) VALUES ('$checkList','$subCheckList','$studentId','$ctpId')";
    //     $stmt = $connect->prepare($sql);
    //     $stmt->execute();
    // }
}


if (isset($_REQUEST['checkListId'])) {
    $checkListId = $_REQUEST['checkListId'];

    $checkQuery = $connect->query("SELECT * FROM subcheclist WHERE main_checklist_id = '$checkListId'");
    $sn1 = 1;
    while ($checkListData = $checkQuery->fetch()) {
        $subCheckId = $checkListData['id'];
        $countCheckFile = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE subCheckId = '$subCheckId'");
        $countCheckFileData = $countCheckFile->fetchColumn();

?>
        <tr>
            <td><?php echo $sn1++; ?></td>
            <td class="addCheckValue" data-subcheck="<?php echo $checkListData['id']; ?>" data-check="<?php echo $checkListId; ?>" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#uploadCheckListDocumnet"><span class="addCheckValue"><?php echo $checkListData['name']; ?></span></td>
            <td><?php echo $countCheckFileData; ?></td>
            <td>
                <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/checklist-delete.php?subCheckId=<?php echo $checkListData['id']; ?>&checkId=<?php echo $checkListId; ?>">
                    <i class="bi bi-trash-fill"></i>
                </a>
                <a class="btn btn-soft-success btn-xs edit_course_data" href="" onclick="document.getElementById('subCheckVal').value='<?php echo $checkListData['id'] ?>';document.getElementById('subCheckListInput').value='<?php echo $checkListData['name'] ?>';
                document.getElementById('checklistmainname1').innerHTML='<?php echo $checkListData['name'] ?>';" data-bs-toggle="modal" data-bs-target="#subchecklistEdit"><i class="bi bi-pen-fill"></i></a>
            </td>
        </tr>
    <?php

    }
}

if (isset($_REQUEST['checkId1'])) {
    $checkId = $_REQUEST['checkId1'];
    $userId = $_REQUEST['userId'];
    $ctpId = $_REQUEST['ctpId'];
    $checkQuery = $connect->query("SELECT * FROM subcheclist WHERE main_checklist_id = '$checkId'");
    $sn1 = 1;
    while ($checkListData = $checkQuery->fetch()) {
        $subCheckId = $checkListData['id'];
        $checkSubCheckList = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$checkId' AND subCheckListId = '$subCheckId' AND studentId = '$userId' AND ctpId = '$ctpId'");
        $checkSubData = $checkSubCheckList->fetchColumn();
        if ($checkSubData > 0) {
            $checkData = "checked";
        } else {
            $checkData = "";
        }
        // $checkSubCheckQ = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE subCheckListId = '$subCheckId' AND ctpId = '$ctpId' AND studentId = '$userId'");
        // $checkData = $checkSubCheckQ->fetchColumn();
        // if ($checkData > 0) {
        //     $iconImg = '<img src="' . BASE_URL . 'assets/svg/icons/check1.png" style="height: 25px; margin:10px;">';
        // } else {
        //     $iconImg = '<img src="' . BASE_URL . 'assets/svg/icons/corss1.png" style="height: 25px; margin:10px;">';
        // }
    ?>
        <tr>
            <td>
                <input type="checkbox" name="subCheck[]" id="" class="form-check-input is-valid" value="<?php echo $subCheckId; ?>" <?php echo $checkData; ?> />
            </td>
            <td><?php echo $checkListData['name']; ?></td>
        </tr>
<?php

    }
}

if (isset($_REQUEST['editSub'])) {
    $subCheckVal = $_REQUEST['subCheckVal'];
    $subCheckListInput = $_REQUEST['subCheckListInput'];

    $updateQuery = "UPDATE subcheclist SET name = '$subCheckListInput' WHERE id = '$subCheckVal'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Subcheck List Updated Successfully";
    header("Location:mainchecklist.php");
}

if (isset($_REQUEST['deleteId'])) {
    $deleteId = $_REQUEST['deleteId'];

    $sql1 = "DELETE FROM subchecklistfiles WHERE id = '$deleteId'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();
    $_SESSION['danger'] = "File Deleted Successfully";
    header('Location:mainchecklist.php');
}

if (isset($_REQUEST['pageId'])) {
    $pageId = $_REQUEST['pageId'];
    $pageQ = $connect->query("SELECT * FROM subchecklistfiles WHERE checkId = '$pageId'");
    while ($pageData = $pageQ->fetch()) {
        echo $pageData['lastName'];
    }
}
