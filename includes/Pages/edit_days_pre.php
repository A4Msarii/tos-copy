<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$pre_id=$_REQUEST['pre_id1'];
$class_id=$_REQUEST['class1'];
$days=$_REQUEST['days1'];

$cate = "SELECT * FROM $class_id where id='$pre_id'";
$state = $connect->prepare($cate);
$state->execute();
if($state->rowCount()>0)
{
$query="UPDATE $class_id
SET `days` = '$days'
WHERE id='$pre_id'";
$statement = $connect->prepare($query);
$statement->execute();
}else{
    $query_phase ="UPDATE $class_id
    SET `days` = '$days'
    WHERE id='$pre_id'";
    $statement_phase = $connect->prepare($query_phase);
    $statement_phase->execute();
}
$_SESSION['success'] = "Data Edited Successfully";
header('Location:prereuisite.php');

?>