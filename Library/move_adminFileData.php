<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$breifCase = $_REQUEST['breifCase'];
$pageId = $_REQUEST['pageId'];
$pageName = $_REQUEST['pageName'];
$folder = $_REQUEST['folder'];

$sql = $connect->query("SELECT type FROM user_files WHERE id = '$pageId'");
$result = $sql->fetchColumn();

$query_editor = "UPDATE user_files SET filename = '$pageName',type = '$result',folderId = '$folder',briefId = '$breifCase' WHERE id = '$pageId'";
$statement_editor = $connect->prepare($query_editor);
$statement_editor->execute();
$_SESSION['success']="File Moved successfully..";
header("Location:dashboard_library.php");
?>