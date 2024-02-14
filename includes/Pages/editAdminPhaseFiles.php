<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['phaseId'])) {
    $phaseId = $_REQUEST['phaseId'];
    $fileId = $_REQUEST['fileId'];

    $sql = "DELETE FROM phasefilepermission WHERE fileId = '$fileId' AND phaseId = '$phaseId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $query_ac="UPDATE `user_files`
        SET `is_phase_resourse` =NULL
        WHERE `id`='$fileId'";

        $statement_ac = $connect->prepare($query_ac);
        $statement_ac->execute();
    $sql = "DELETE FROM filepermissions WHERE pageId = '$fileId' AND phaseId != 'academic' AND userId != 'Everyone'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['success'] = "File Deleted Successfully";
    header("Location:phase-view.php");
}
