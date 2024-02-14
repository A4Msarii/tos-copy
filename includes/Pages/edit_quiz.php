<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$quiz=$_POST['quiz'];

$quizquery="UPDATE `quiz`
SET `quiz` = '$quiz'
WHERE `id`='$id'";
$statement_q = $connect->prepare($quizquery);
$statement_q->execute();
echo $quizquery;
$_SESSION['success'] = "Data Edited Successfully";

header('Location:quiz_data.php');
?>