

<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$academic_up=$_POST['academic'];
$symbol_up=$_POST['shortacademic'];

$query="UPDATE `academic`
SET `academic` = '$academic_up',`shortacademic`='$symbol_up'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
echo $query;
$_SESSION['success'] = "Data Edited Successfully";
header('Location:phase-view.php');
?>