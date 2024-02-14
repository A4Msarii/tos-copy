<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $std=$_REQUEST['std'];
 $class_name=$_REQUEST['class_name'];
 $class_id=$_REQUEST['class_id'];
 $status=$_REQUEST['status'];

$stud_subi = $connect->prepare("SELECT code FROM `status` WHERE id=?");
$stud_subi->execute([$status]);
$name_sub = $stud_subi->fetchColumn();
$query="UPDATE `gradesheet`
SET `gradsheet_status` = '$status'
WHERE `user_id`='$std' and class_id='$class_id' and class='$class_name'";

$statement = $connect->prepare($query);

$statement->execute();
echo $name_sub;
?>