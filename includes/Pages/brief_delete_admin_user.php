<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$id = $_GET["id"];
echo $query = "UPDATE `user_files`
SET `briefId` = NULL,fileBriefcase=NULL
WHERE `id`='$id'";

$statement = $connect->prepare($query);

$statement->execute();
$_SESSION['danger'] = "File Deleted Successfully";
 header('Location:file_management.php');

?>