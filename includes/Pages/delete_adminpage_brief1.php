<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['adminFiles'])) {
    $adminFiles = $_REQUEST['adminFiles'];
    $page_type = $_REQUEST['page_type'];
    $query = "UPDATE `user_files` SET `briefId`='0',folderId='0',`shopid`='0' WHERE `id`='$adminFiles'";

    $statement = $connect->prepare($query);

    $statement->execute();
    $_SESSION['danger'] = "Files Removed";
    if ($page_type == "admin") {
        header('Location:file_management.php');
    } else {
        header('Location:../../Library/file_management.php');
    }
}

if (isset($_REQUEST['adminPage'])) {
    $adminPage = $_REQUEST['adminPage'];
    $page_type = $_REQUEST['page_type'];
    $query = "UPDATE `editor_data` SET `briefId`='0',folderId='0',`shopid`='0' WHERE `id`='$adminPage'";

    $statement = $connect->prepare($query);

    $statement->execute();
    $_SESSION['danger'] = "Pages Removed";
    
    if ($page_type == "admin") {
        header('Location:file_management.php');
    } else {
        header('Location:../../Library/file_management.php');
    }
}
