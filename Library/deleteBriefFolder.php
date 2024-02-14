<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';


if (isset($_REQUEST['fileId'])) {
    $fileId = $_REQUEST['fileId'];

    $updateQuery = "UPDATE user_files SET folderId = '0',shopid = '0' WHERE id = '$fileId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:../includes/Pages/fheader1.php");
}


if (isset($_REQUEST['pageId'])) {
    $fileId = $_REQUEST['pageId'];

    $updateQuery = "UPDATE editor_data SET folderId = '0',shopid = '0' WHERE id = '$fileId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['danger'] = "Page Deleted Successfully";
    header("Location:../includes/Pages/fheader1.php");
}
