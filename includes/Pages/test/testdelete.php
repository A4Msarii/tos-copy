<?php
include('../../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET["id"];
$sql = "DELETE FROM examname WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
$sql1 = "DELETE FROM notifications WHERE data='$id' and extra_data='test scheduled'";

$statement1 = $connect->prepare($sql1);
$statement1->execute();

$_SESSION['danger'] = "Data Deleted Successfully";
            
            header('Location:managetest.php');
?>