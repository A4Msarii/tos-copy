<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$type=$_GET["type"];

$sql = "DELETE FROM file_briefcase WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Briefcase File Deleted Successfully";
            header('Location:file_management.php');

if (isset($_REQUEST["br_lib_id"])) {
echo $id=$_REQUEST["br_lib_id"];
$sql = "DELETE FROM file_briefcase WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Briefcase File Deleted Successfully";
            header('Location:../../Library/file_management.php');
}

if (isset($_REQUEST["userid"])) {
    echo $id=$_REQUEST["userid"];
$sql = "DELETE FROM file_briefcase WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Briefcase File Deleted Successfully";
            header('Location:file_management.php');

if (isset($_REQUEST["user_br_lib_id"])) {
echo $id=$_REQUEST["user_br_lib_id"];
$sql = "DELETE FROM file_briefcase WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Briefcase File Deleted Successfully";
            header('Location:../../Library/file_management.php');
}
}
?>