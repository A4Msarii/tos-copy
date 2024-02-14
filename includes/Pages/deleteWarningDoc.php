<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['docId'])) {
    $docId = $_REQUEST['docId'];
    $notiId = $_REQUEST['notiId'];

    $sql = "DELETE FROM assing_warning_doc WHERE id = '$docId' AND noti_id = '$notiId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "Document Deleted Successfully";
    header('Location:CAP.php');
}

if(isset($_REQUEST['classId'])){
    $classId = $_REQUEST['classId'];
    $fileId = $_REQUEST['fileId'];

    $sql = "DELETE FROM userdocumnet WHERE id = '$fileId' AND studentId = '$classId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "Document Deleted Successfully";
    header('Location:courseDetails.php');

}
