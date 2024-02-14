<?php
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();

    $adminBrief = $_REQUEST['folId'];
    $page_type = $_REQUEST['page_type'];

    $query = "UPDATE user_files SET shopid = '0' WHERE id = '$adminBrief'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $_SESSION['danger'] = "File Deleted Successfully";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
    ?>