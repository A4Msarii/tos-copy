<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET["id"];
$sql = "DELETE FROM heading_cert WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "heading Deleted Successfully";
            header('Location:draganddrop.php');
?>