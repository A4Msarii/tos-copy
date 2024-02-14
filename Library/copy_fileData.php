<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$breifCase = $_REQUEST['breifCase'];
$pageId = $_REQUEST['pageId'];
$pageName = $_REQUEST['pageName'];
$pageShop = $_REQUEST['pageShop'];
$folder = $_REQUEST['folder'];
$userId = $_SESSION['login_id'];
$role = $_SESSION['role'];

if ($role == 'super admin') {
    $color = 'red';
} else if ($role == 'instructor') {
    $color = 'yellow';
} else {
    $color = 'blue';
}

$date = $dt1 = date("Y-m-d");
$createdBy = $_SESSION['nickname'];
$updatedBy = $_SESSION['nickname'];

$sql = $connect->query("SELECT type FROM user_files WHERE id = '$pageId'");
$result = $sql->fetchColumn();

$query_editor = "INSERT INTO user_files(filename,type,briefId,folderId,shopid,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy) VALUES ('$pageName','$result','$breifCase','$folder','$pageShop','$userId','$role','$color','$date','$date','$createdBy','$updatedBy')";
$statement_editor = $connect->prepare($query_editor);
$statement_editor->execute();

$lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
$lastId = $lastQ->fetchColumn();

$query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','Everyone','blue','readOnly')";
$stmt = $connect->prepare($query);
$stmt->execute();
$_SESSION['success'] = "File Copied Successfully";
header("Location:newPage.php");
