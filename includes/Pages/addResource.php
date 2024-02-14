<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// session_start();
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['addResource'])) {
    $fileID = $_REQUEST['fileID'];
    $phaseId = $_REQUEST['phaseId'];
    $ctpId = $_REQUEST['ctpId'];

    $fetchShopId = $connect->query("SELECT id FROM shops WHERE ctpId = '$ctpId'");
    $shopId = $fetchShopId->fetchColumn();

    $fetchFolderId = $connect->query("SELECT id FROM folders WHERE phaseId = '$phaseId'");
    $folderId = $fetchFolderId->fetchColumn();

    // $fetchPhaseMana = $connect->query("SELECT * FROM manage_role_course_phase WHERE phase_id = '$phaseId'");
    // while ($phaseData = $fetchPhaseMana->fetch()) {
    $name = 0;
    while ($name < count($fileID)) {
        $file1 = $fileID[$name];
        $query_ac = "UPDATE user_files SET is_phase_resourse = '$phaseId',shopid = '$shopId',folderId = '$folderId',briefId = NULL WHERE `id`='$file1'";

        $statement_ac = $connect->prepare($query_ac);

        $statement_ac->execute();
        $color = "blue";
        $fetchAllInst = $connect->query("SELECT * FROM manage_role_course_phase WHERE phase_id = '$phaseId'");
        while ($instData = $fetchAllInst->fetch()) {
            $insId = $instData['intructor'];
            $bckupId = $instData['b_up_manger'];
            $coId = $instData['id'];
            $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color, permissionType) VALUES ('$file1','$userId','$insId','$color','readAndWrite')";
            $stmt = $connect->prepare($query);
            $stmt->execute();


            $query = "INSERT INTO phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$file1','$insId','$phaseId','". $instData['courseCode'] ."','". $instData['courseName'] ."')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
            if ($bckupId != "") {
                $query = "INSERT INTO phasefilepermission (fileId,instId,backupId,phaseId,coursecode,courseName) VALUES ('$file1','$bckupId','1','$phaseId','". $instData['courseCode'] ."','". $instData['courseName'] ."')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
            }
        }



        $name++;
    }

    $_SESSION['success'] = "Resource Added successfully";

    header('Location:phase-view.php');
}
