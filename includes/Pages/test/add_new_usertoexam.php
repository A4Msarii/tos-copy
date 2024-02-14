<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$exam_id=$_REQUEST["exam_id"];
$person=$_REQUEST["person"];
foreach($person as $persons){
    $query = "INSERT INTO studentexam (examId,examSubject) VALUES ('$exam_id','$persons')";
    $stmt = $connect->prepare($query);
    $stmt->execute();
}
$_SESSION['success'] = "Data added Successfully";
header('Location:managetest.php');


