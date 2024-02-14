<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET["id"];
$sql = "DELETE FROM clone_class WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Cloned Class Deleted Successfully"
            header('Location:testing.php');
?>