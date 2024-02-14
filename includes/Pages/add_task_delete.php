<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET["id"];
$sql = "DELETE FROM additional_task WHERE ad_id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Item Deleted Successfully";
header('Location:tasklog.php');
?>