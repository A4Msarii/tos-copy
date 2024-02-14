<?php
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$page_type = $_REQUEST['page_type'];

if (isset($_REQUEST['adminBrief'])) {
    $adminBrief = $_REQUEST['adminBrief'];

    $sql = "DELETE FROM user_briefcase WHERE id='$adminBrief'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $query = "UPDATE user_files SET briefId = '0', folderId = '0', shopid = '0' WHERE briefId = '$adminBrief'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query = "UPDATE editor_data SET briefId = '0', folderId = '0', shopid = '0'WHERE briefId = '$adminBrief'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['danger'] = "Briefcase Deleted Successfully";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
}

if(isset($_REQUEST['folderBrief'])){
    $folderBrief = $_REQUEST['folderBrief'];
    $briefId = $_REQUEST['briefId'];

    $sql = "UPDATE user_briefcase SET folderId = '0', shopid = '0' WHERE folderId='$folderBrief' AND id = '$briefId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $query = "UPDATE user_files SET folderId = '0', shopid = '0' WHERE folderId = '$folderBrief' AND briefId = '$briefId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query = "UPDATE editor_data SET folderId = '0', shopid = '0'WHERE folderId = '$folderBrief' AND briefId = '$briefId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['danger'] = "Briefcase Removed";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
}

if(isset($_REQUEST['folderBriefFile'])){
    $folderBriefFile = $_REQUEST['folderBriefFile'];
    $folderFileId = $_REQUEST['folderFileId'];

    $query = "UPDATE user_files SET folderId = '0', shopid = '0' WHERE id = '$folderBriefFile' AND folderId = '$folderFileId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['danger'] = "File Removed";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
}

if(isset($_REQUEST['folderBriefPage'])){
    $folderBriefPage = $_REQUEST['folderBriefPage'];
    $folderPageId = $_REQUEST['folderPageId'];

    $query = "UPDATE editor_data SET folderId = '0', shopid = '0'WHERE id = '$folderBriefPage' AND folderId = '$folderPageId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['danger'] = "Page Removed";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
}

if(isset($_REQUEST['shopId'])){
    $shopId = $_REQUEST['shopId'];
    $shopFolderId = $_REQUEST['shopFolderId'];

    echo $sql = "UPDATE user_briefcase SET shopid = '0' WHERE shopid='$shopId' AND folderId = '$shopFolderId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $query = "UPDATE user_files SET shopid = '0' WHERE shopid='$shopId' AND folderId = '$shopFolderId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query = "UPDATE editor_data SET shopid = '0' WHERE shopid='$shopId' AND folderId = '$shopFolderId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $sql = "DELETE FROM folder_shop_user WHERE shop_id='$shopId' AND folder_id = '$shopFolderId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "Folder Removed";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
}

if(isset($_REQUEST['shopBrief'])){
    $shopBrief = $_REQUEST['shopBrief'];
    $briefId = $_REQUEST['briefId'];

    $sql = "UPDATE user_briefcase SET shopid = '0' WHERE id = '$briefId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $query = "UPDATE user_files SET shopid = '0' WHERE shopid='$shopBrief' AND briefId = '$briefId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query = "UPDATE editor_data SET shopid = '0' WHERE shopid='$shopBrief' AND briefId = '$briefId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['danger'] = "Briefcase Removed";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
}

if(isset($_REQUEST['shopFile'])){
    $shopFile = $_REQUEST['shopFile'];
    $fileId = $_REQUEST['fileId'];

    $query = "UPDATE user_files SET shopid = '0' WHERE id = '$fileId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['danger'] = "File Removed";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
}

if(isset($_REQUEST['shopPage'])){
    $shopPage = $_REQUEST['shopPage'];
    $pageId = $_REQUEST['pageId'];

    $query = "UPDATE editor_data SET shopid = '0' WHERE id = '$pageId' AND shopid = '$shopPage'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['danger'] = "File Removed";
    if ($page_type == "admin") {
        header('Location:file_management.php');
      } else {
        header('Location:../../Library/file_management.php');
      }
}

