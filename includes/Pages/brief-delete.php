<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$id = $_GET["id"];
$sql = "DELETE FROM briefcase WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();

$sql1 = "DELETE FROM file_briefcase WHERE brief_id='$id'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();
$_SESSION['danger'] = "Briefcase Deleted Successfully";
header('Location:file_management.php');

if (isset($_REQUEST["userid"])) {
$id = $_REQUEST["userid"];
$sql = "DELETE FROM user_briefcase WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Briefcase Deleted Successfully";
header('Location:file_management.php');
}


if (isset($_REQUEST["brief_lib_id"])) {
$id = $_REQUEST["brief_lib_id"];
$sql = "DELETE FROM briefcase WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();

$sql1 = "DELETE FROM file_briefcase WHERE brief_id='$id'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();
$_SESSION['danger'] = "Briefcase Deleted Successfully";
header('Location:../../Library/file_management.php');
}

if (isset($_REQUEST["user_br_lib_id"])) {
$id = $_REQUEST["user_br_lib_id"];
$sql = "DELETE FROM user_briefcase WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Briefcase Deleted Successfully";
header('Location:../../Library/file_management.php');
}
?>