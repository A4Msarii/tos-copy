<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['groupId'])) {
    $groupId = $_REQUEST['groupId'];
    $groupDetail = $connect->query("SELECT * FROM chatgroup WHERE id = '$groupId'");
    while ($groupData = $groupDetail->fetch()) {
        $groupImg = $groupData['groupProfile'];
        if ($groupImg != "") {
            $groupProfile = BASE_URL . 'includes/Pages/groupProfile/' . $groupImg;
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $groupProfile)) {
                $groupProfile = BASE_URL . 'includes/Pages/groupProfile/' . $groupImg;
            } else {
                $groupProfile = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
        } else {
            $groupProfile = BASE_URL . 'includes/Pages/avatar/avtar.png';
        }
?>
        <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
            <img class="avatar-img" src="<?php echo $groupProfile; ?>" alt="Image Description">
            <span class="avatar-status avatar-status-success"></span>
        </div>
        <input type="hidden" name="groupID" value="<?php echo $groupData['id'] ?>">
        <label style="color:black; font-weight:bold; margin:5px;">Group Profile:</label>
        <input class="form-control" type="file" name="newFile" id="">
        <input type="hidden" name="groupProfile" value="<?php echo $groupData['groupProfile'] ?>">
        <label style="color:black; font-weight:bold; margin:5px;">Group Name:</label>
        <input class="form-control" type="text" name="groupName" value="<?php echo $groupData['groupName'] ?>" id="">
        <label style="color:black; font-weight:bold; margin:5px;">Group Description :</label>
        <textarea class="form-control" type="text" name="groupDesc"><?php echo $groupData['groupDesc'] ?></textarea>
<?php

    }
}

if (isset($_REQUEST['groupName'])) {
    $groupName = $_REQUEST['groupName'];
    $groupDesc = $_REQUEST['groupDesc'];
    $groupId = $_REQUEST['groupID'];
    if ($_FILES['newFile']['name'] != "") {
        $filename = $_FILES['newFile']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadPath = '../includes/Pages/groupProfile/' . $filename;
        if (move_uploaded_file($_FILES["newFile"]["tmp_name"], $uploadPath)) {

            $updateQuery = "UPDATE chatgroup SET groupName = '$groupName',groupDesc = '$groupDesc',groupProfile = '$filename' WHERE id = '$groupId'";
            $statement_editor = $connect->prepare($updateQuery);
            $statement_editor->execute();
        }
    } else {
        $filename = $_REQUEST['groupProfile'];
        $updateQuery = "UPDATE chatgroup SET groupName = '$groupName',groupDesc = '$groupDesc',groupProfile = '$filename' WHERE id = '$groupId'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    }
    $_SESSION['success'] = "Group Updated Successfully";
    header("Location:chat-direct.php");
}

if (isset($_REQUEST['deleteId'])) {
    $deleteId = $_REQUEST['deleteId'];

    $sql = "DELETE FROM chatgroup WHERE id = '$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM groupmember WHERE groupId = '$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Group Deleted Successfully";
    header("Location:chat-direct.php");
}

?>