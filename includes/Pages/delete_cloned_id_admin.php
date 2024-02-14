<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_REQUEST["cloned_id_admin_del"];
$sql2 = "SELECT * FROM clone_class WHERE id='$id'";
$sql2_prepare = $connect->prepare($sql2);
$result2 = $connect->query($sql2);
$datas1 = $result2->fetch(PDO::FETCH_ASSOC);
 $class_id=$datas1['class_id'];
 $class_name=$datas1['class_name'];
 $std_id=$datas1['std_id'];
 $cloned_id=$datas1['cloned_id'];
$sql1 = "DELETE FROM cloned_gradesheet WHERE class_id='$class_id' and class='$class_name' and user_id='$std_id' and cloned_id='$cloned_id'";

$statement1 = $connect->prepare($sql1);
$statement1->execute();

$sql = "DELETE FROM clone_class WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Class Deleted Successfully";
           header('Location:actual.php');
?>