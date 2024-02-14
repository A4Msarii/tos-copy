<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_REQUEST["id"];
$favcolor=$_REQUEST['favcolor'];

$query="UPDATE roles SET color = '$favcolor' WHERE id = '$id'";
$statement = $connect->prepare($query);
$statement->execute();

$_SESSION['success'] = "Color Added For Role";

header('Location:roles.php');
?>