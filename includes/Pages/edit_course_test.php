<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_POST['id'];
$course_name=$_POST['course_name'];
$course_dec=$_POST['course_dec'];
$quizquery="UPDATE `test_course`
SET `course_name` = '$course_name',`course_description`='$course_dec'
WHERE `id`='$id'";
$statement_q = $connect->prepare($quizquery);
$statement_q->execute();
echo $quizquery;
$_SESSION['success'] = "Data Edited Successfully";

header('Location:create_test.php');
?>