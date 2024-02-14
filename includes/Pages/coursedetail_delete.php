<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET["id"];
$sql = "DELETE FROM manage_role_course_phase WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Data Deleted Successfully";
            
            header('Location:courseDetails.php');
?>