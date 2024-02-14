<?php 
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$number=$_POST['number'];

$itquery="UPDATE `examsubcategory`
SET `subjectPercentage` = '$number'
WHERE `id`='$id'";
$statement_i = $connect->prepare($itquery);
$statement_i->execute();


$_SESSION['success'] = "Data Edited Successfully";
header('Location:managetest.php');
?>