<?php
	include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
if(isset($_POST['save']))
{	
	$user_id=$_POST['user_id'];
	echo $user_id; 
	 $school_name = $_POST['school_name'];
     $department_name = $_POST['department_name'];
     $type = $_POST['type'];
	 $sql = "INSERT INTO `homepage` (school_name, department_name, type,user_id) VALUES ('$school_name', '$department_name', '$type','$user_id')";
	 $statement = $connect->prepare($sql);
	 $statement->execute();
	 $error="<div class='alert alert-success'>Data inserted successfully</div>";
	header("Location:vehiclecate.php?error=".$error);
}

?>