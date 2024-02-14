<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$title=$_POST['title'];
$message=$_POST['message'];
$itquery="UPDATE `persontitle`
SET `title` = '$title',`message` = '$message'
WHERE `id`='$id'";
$statement_i = $connect->prepare($itquery);
$statement_i->execute();
echo $itquery;
$_SESSION['success'] = "Data Edited Successfully";

header('Location:landingpage.php');
?>