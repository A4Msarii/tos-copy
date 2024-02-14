<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$id = $_GET["id"];
$page_type = $_REQUEST['page_type'];

if (isset($_REQUEST['folderId'])) {
  $folderId = $_REQUEST['folderId'];
  $sql = "DELETE FROM folders WHERE id='$folderId'";
  $statement = $connect->prepare($sql);
  $statement->execute();

  $sql = "UPDATE user_briefcase SET folderId = '0', shopid = '0' WHERE folderId='$folderId'";
  $statement = $connect->prepare($sql);
  $statement->execute();

  $query = "UPDATE user_files SET folderId = '0', shopid = '0' WHERE folderId = '$folderId'";
  $statement = $connect->prepare($query);
  $statement->execute();

  $query = "UPDATE editor_data SET folderId = '0', shopid = '0'WHERE folderId = '$folderId'";
  $statement = $connect->prepare($query);
  $statement->execute();

  $_SESSION['danger'] = "Folder Deleted Successfully";
  if ($page_type == "admin") {
    header('Location:file_management.php');
  } else {
    header('Location:../../Library/file_management.php');
  }
}

if (isset($_REQUEST["lib_fol_id"])) {
  $id = $_REQUEST["lib_fol_id"];
  $sql1 = "DELETE FROM file_briefcase_folder WHERE folder_id='$id'";
  $statement1 = $connect->prepare($sql1);
  $statement1->execute();
  $sql = "DELETE FROM folders WHERE id='$id'";

  $statement = $connect->prepare($sql);
  $statement->execute();

  $_SESSION['danger'] = "Folder Deleted Successfully";
  header('Location:../../Library/file_management.php');
}
