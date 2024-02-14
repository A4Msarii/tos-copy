<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$hashoff=$_POST['hashoff'];

$itquery="UPDATE `hashoff`
SET `hashoff` = '$hashoff'
WHERE `id`='$id'";
$statement_i = $connect->prepare($itquery);
$statement_i->execute();
echo $itquery;

$_SESSION['success'] = "Data Edited Successfully";
header('Location:add_item_subitem.php');
?>