<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_GET["userid"];
 echo $query="UPDATE `editor_data`
SET `briefId`='0',folderId='0'
WHERE `id`='$id'";

$statement = $connect->prepare($query);

$statement->execute();
$_SESSION['danger'] = "Pages Removed";
header('Location:file_management.php');

?>