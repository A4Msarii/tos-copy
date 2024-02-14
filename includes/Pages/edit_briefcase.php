<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$page_redirection=$_POST['page_redirection'];

 $id=$_POST['id'];
$brief=$_POST['brief'];

$query="UPDATE `user_briefcase`
SET `briefcase_name` = '$brief'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$_SESSION['success'] = "Data Edited Successfully";
if ($page_redirection=="admin") {
header('Location:file_management.php');
}
if($page_redirection=="user"){
header('Location:../../Library/file_management.php');
}

?>