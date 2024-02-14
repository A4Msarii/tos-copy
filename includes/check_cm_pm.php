<?php 
session_start();
include('connect.php');
$u_id=$_POST['u_id'];
$class_id=$_POST['class_id'];
$_SESSION['course_ID'] = $class_id;
$sql = "SELECT count(*) FROM `newcourse` WHERE Courseid='$class_id' and CourseManager='$u_id'"; 

$result = $connect->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 
if($number_of_rows>0){
    echo "c1";  
}
$sql = "SELECT count(*) FROM `manage_role_course_phase` WHERE course_id='$class_id' and intructor='$u_id'"; 
$result = $connect->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 
if($number_of_rows>0){
    echo "p1";  
}
