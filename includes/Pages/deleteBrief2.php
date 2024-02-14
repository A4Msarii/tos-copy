<?php
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$page_type = $_REQUEST['page_type'];
    $adminBrief = $_REQUEST['folderBrief'];
    $sql = "UPDATE editor_data SET folderId = '0' and shopid='0' WHERE id='$adminBrief'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "File Deleted Successfully";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
    ?>