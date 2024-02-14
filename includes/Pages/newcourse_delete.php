<?php 
echo $Courseid=$_GET['Courseid'];
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$sql = "DELETE FROM newcourse WHERE Courseid='$Courseid'";
$statement = $connect->prepare($sql);
$statement->execute();
      
        $_SESSION['danger'] = "Course Deleted Successfully";
        header('Location:course_list.php');
?>