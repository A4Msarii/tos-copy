<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$breifCase = $_REQUEST['breifCase'];
$pageId = $_REQUEST['pageId'];
$pageName = $_REQUEST['pageName'];
$folder = $_REQUEST['folder'];

$sql = $connect->query("SELECT editorData FROM editor_data WHERE id = '$pageId'");
$result = $sql->fetchColumn();

$query_editor = "UPDATE editor_data SET pageName = '$pageName',editorData = '$result',folderId = '$folder',briefId = '$breifCase' WHERE id = '$pageId'";
$statement_editor = $connect->prepare($query_editor);
$statement_editor->execute();
$_SESSION['success']="Page Moved successfully..";
header("Location:dashboard_library.php");
?>