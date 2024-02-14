<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_GET["userid"];
 $mid=$_GET["main_id"];
 $page_type = $_REQUEST['page_type'];
 $user_name_files = $connect->prepare("SELECT `role` FROM `users` WHERE id=?");
 $user_name_files->execute([$mid]);
 $name12 = $user_name_files->fetchColumn();
 echo $query="UPDATE `user_files`
SET `briefId`='0',folderId='0',user_id='$mid',role='$name12'
WHERE `id`='$id'";

$statement = $connect->prepare($query);

$statement->execute();
$_SESSION['danger'] = "Pages Removed";
if ($page_type == "admin") {
    header('Location:file_management.php');
  } else {
    header('Location:../../Library/file_management.php');
  }

?>