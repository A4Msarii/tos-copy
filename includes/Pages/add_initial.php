<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$initial=$_REQUEST['initial'];
$id=$_REQUEST['ini_id'];
$query="UPDATE `users`
SET `initial` = '$initial'
 WHERE `id`='$id'";
   
$statement = $connect->prepare($query);
$statement->execute();
                // echo "Initial added successfully";

$_SESSION['success'] = "Initial Inserted Successfully";
 header("Location:profile.php");   

?>