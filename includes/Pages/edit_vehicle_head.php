<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['vehicle_id'];
// $vec_name=$_POST['vec_name'];
$veh_type=$_POST['veh_type'];
$veh_nub=$_POST['veh_nub'];
$veh_spot=$_POST['veh_spot'];
$query="UPDATE `vehicle`
SET `VehicleType`='$veh_type',`VehicleNumber`='$veh_nub',`VehicleSpot`='$veh_spot'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$_SESSION['success'] = "Data Edited Successfully";
header('Location:usersinfo.php');
?>
