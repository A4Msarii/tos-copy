<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['id'])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM accomplish_task WHERE ac_id='$id'";
    $statement = $connect->prepare($sql);
    $statement->execute();


    $_SESSION['danger'] = "Item Deleted Successfully";
    header('Location:tasklog.php');
}

if (isset($_REQUEST['accId'])) {
    $accId = $_REQUEST['accId'];

    $updateQuery = "UPDATE accomplish_task SET assign_class = NULL,assign_class_table = NULL,assign_class_table_cloneid = NULL WHERE ac_id = '$accId'";

    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    $_SESSION['danger'] = "Item Removed Successfully";
    header('Location:tasklog.php');
}

if (isset($_REQUEST['addId'])) {
    $accId = $_REQUEST['addId'];

    $updateQuery = "UPDATE additional_task SET assign_class = NULL,assign_class_table = NULL,assign_class_table_cloneid = NULL WHERE ad_id = '$accId'";

    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    $_SESSION['danger'] = "Item Removed Successfully";
    header('Location:tasklog.php');
}
