<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_GET["id"])) {
    $ctp = $_GET['ctp'];
    $id = $_GET["id"];

    $sql = "DELETE FROM checklist WHERE id='$id'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "Checklist Deleted Successfully";
    header('Location:mainchecklist.php');
}

if(isset($_REQUEST['subCheckId'])){
    $subCheckId = $_REQUEST['subCheckId'];
    $checkId = $_REQUEST['checkId'];

    $sql = "DELETE FROM subcheclist WHERE id = '$subCheckId' AND main_checklist_id = '$checkId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql1 = "DELETE FROM check_sub_checklist WHERE subCheckListId = '$subCheckId' AND checkListId = '$checkId'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Subchecklist Deleted Successfully";
    header('Location:mainchecklist.php');
}
