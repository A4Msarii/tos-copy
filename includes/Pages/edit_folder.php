<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$page_redirection=$_POST['page_redirection'];
echo $id=$_POST['id'];
$folder=$_POST['folder'];

$query_fl="UPDATE `folders`
SET `folder` = '$folder'
WHERE `id`='$id'";
$statement_fl = $connect->prepare($query_fl);
$statement_fl->execute();
// echo $query;
$_SESSION['success'] = "Data Edited Successfully";
if ($page_redirection=="admin") {
header('Location:file_management.php');
}
if($page_redirection=="user"){
header('Location:../../Library/file_management.php');
}

?>