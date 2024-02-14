<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$category=$_POST['category'];
$mark = $_REQUEST['mark'];
$itquery="UPDATE `memocate`
SET `category` = '$category',marks = '$mark'
WHERE `id`='$id'";
$statement_i = $connect->prepare($itquery);
$statement_i->execute();
echo $itquery;
$_SESSION['success'] = "Data Edited Successfully";

header('Location:memocate.php');
?>