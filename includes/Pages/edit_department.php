<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_REQUEST['submit'])){
$departId = $_REQUEST['departId'];
$department_name = $_REQUEST['department_name'];
$description = $_REQUEST['description'];
$location = $_REQUEST['location'];
$contact = $_REQUEST['contact'];
$email = $_REQUEST['email'];
$website = $_REQUEST['website'];
$description = $_REQUEST['description'];
$additional = $_REQUEST['additional'];

$query = "UPDATE homepage SET department_name = '$department_name', description = '$description', location = '$location', contact_number = '$contact', email = '$email', website = '$website', additional = '$additional' WHERE id = '$departId'";



// $query="UPDATE homepage SET department_name = '$department_name', description ='$description',location = '$location', contact_number = '$contact', email = '$email', website = '$website','additional' = '$additional' WHERE id = '$departId'";
// echo $query;
// die();
$statement = $connect->prepare($query);
$statement->execute();
$_SESSION['success'] = "Data Edited Successfully";

header('Location:department_list.php');
}
?>