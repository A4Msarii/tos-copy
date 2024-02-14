<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$page_type = $_REQUEST['page_type'];

echo $id = $_REQUEST["userid"];
$sql = "DELETE FROM user_files WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
$sql1 = "DELETE FROM favouritefiles WHERE fileId='$id'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();
$_SESSION['danger'] = "Files Deleted Successfully";
if($page_type == "admin"){
header('Location:file_management.php');
}else{
    header('Location:../../Library/file_management.php');
}
?>