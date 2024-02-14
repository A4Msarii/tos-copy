<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $vehicletype1=$_REQUEST['vehicletype1'];
$sql = "INSERT INTO vehicletype (vehicletype) VALUES ('".$vehicletype1."')";

$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['success'] = "Vehicle Type Inserted Successfully";
header("Location:firstctp.php");
?> 