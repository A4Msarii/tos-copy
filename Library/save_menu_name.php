<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$filename = $_REQUEST['menu_name'];
$type = $_REQUEST['type'];
$color = $_REQUEST['color'];

$query = "INSERT INTO file_menu_name (menu_name,type_menu,color) VALUES ('$filename','$type','$color')";
$stmt = $connect->prepare($query);
$stmt->execute();
$_SESSION['success'] = "Menu Inserted successfully..";
header("Location:index.php");
