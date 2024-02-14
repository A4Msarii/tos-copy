<?php

include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$dep=$_REQUEST['dep'];
$id=$_REQUEST['id'];
$u_id=$_REQUEST['u_id'];
foreach($dep as $school_name){
$query_department1 = "INSERT INTO homepage (user_id,department_name,school_name) VALUES ('$u_id','$school_name','$id')";
$statement1 = $connect->prepare($query_department1);
$statement1->execute();
}


$_SESSION['success'] = "Department Added Successfully";
header("Location:department_list.php");
?>