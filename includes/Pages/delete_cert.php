<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_GET["id"];
$sql = "DELETE FROM certificate_data WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "certificate Deleted Successfully";
 header('Location:drag_drop.php');
?>