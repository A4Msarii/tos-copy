<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
// $percentagetype=$_POST['percentagetype'];
$percentage=$_POST['percentage'];
$description=$_POST['description'];
// $color=$_POST['color'];
$query="UPDATE `percentage`
SET `percentage` = '$percentage',`description` = '$description'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$_SESSION['success'] = "Data Edited Successfully";

header('Location:usersinfo.php');
?>