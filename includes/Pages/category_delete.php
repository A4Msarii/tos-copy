<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET['id'];
$sql = "DELETE FROM type_category_data WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Data Deleted Successfully";
header('Location:add_type_data.php');
?>