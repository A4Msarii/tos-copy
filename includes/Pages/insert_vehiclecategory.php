<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $vehicletype=$_REQUEST['vehicletype'];
$sql_veh = "INSERT INTO vehicletype (vehicletype) VALUES ('".$vehicletype."')";

$statement_veh = $connect->prepare($sql_veh);
$statement_veh->execute();
$_SESSION['success'] = "Equipment Category Inserted Successfully";
header("Location:usersinfo.php");
?>