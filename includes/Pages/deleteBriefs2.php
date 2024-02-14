<?php
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
    $adminBrief = $_REQUEST['folderBrief'];
    $page_type = $_REQUEST['page_type'];
    $sql = "UPDATE editor_data SET shopid='0' WHERE id='$adminBrief'";
    $statement = $connect->prepare($sql);
    $statement->execute();
   $_SESSION['danger'] = "File Deleted Successfully";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
    ?>