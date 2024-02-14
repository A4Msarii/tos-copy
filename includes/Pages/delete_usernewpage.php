<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
echo $id = $_GET["deleteId"];

$sql1 = "DELETE FROM editor_data WHERE userId='$id'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();

$_SESSION['danger'] = "Pages Deleted Successfully";
header('Location:file_management.php');
?>