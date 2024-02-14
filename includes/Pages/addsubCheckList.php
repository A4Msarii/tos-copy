<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['checkSub'])) {
    $checkId = $_REQUEST['checkId'];
    $subCheck = $_REQUEST['subCheck'];
    $studentId = $_REQUEST['studentId'];
    $ctpId = $_REQUEST['ctpId'];
    $name = 0;
    while ($name < count($subCheck)) {
        $subCheck1 = $subCheck[$name];
        $checkQuery = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$checkId' AND subCheckListId = '$subCheck1' AND studentId = '$studentId' AND ctpId = '$ctpId'");
        $checkData = $checkQuery->fetchColumn();

        if ($checkData <= 0) {
            $sql = "INSERT INTO check_sub_checklist (checkListId,subCheckListId,studentId,ctpId) VALUES ('$checkId','$subCheck1','$studentId','$ctpId')";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
        }
        $name++;
    }

    $_SESSION['danger'] = "Subchecklist Added Successfully";
    header('Location:Home.php');
}
