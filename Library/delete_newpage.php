<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['userDeleteId'])) {
    $deleteId = $_REQUEST['userDeleteId'];
    $sql = "DELETE FROM editor_data WHERE id='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM pagepermissions WHERE pageId='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:file_management.php");
}
?>
