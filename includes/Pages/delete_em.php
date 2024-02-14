<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM emergency_data WHERE id='$id'";
echo $sql;
$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Item Deleted Successfully";
            header('Location:emergency.php');
?>