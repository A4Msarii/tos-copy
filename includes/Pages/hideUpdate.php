<?php
// session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];

$query = "INSERT INTO updatehide (userId) VALUES ('$userId')";
$stmt = $connect->prepare($query);
$stmt->execute();
