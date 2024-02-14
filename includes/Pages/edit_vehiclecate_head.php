<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['vehicate_id'];
// $vec_name=$_POST['vec_name'];
$veh_cate=$_POST['veh_cate'];
$querycate="UPDATE `vehicletype`
SET `vehicletype`='$veh_cate'
WHERE `vehid`='$id'";
$statementcate = $connect->prepare($querycate);
$statementcate->execute();
$_SESSION['success'] = "Data Edited Successfully";

header('Location:usersinfo.php');
?>