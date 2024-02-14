<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();

if (isset($_REQUEST['filesId'])) {
    $filesId = $_REQUEST['filesId'];

    $updateQuery = "UPDATE user_files SET menu_type = 'NULL',type_id = '0' WHERE id = '$filesId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    $_SESSION['success']="Files Removed Successfully..";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['menuId'])) {
    $menuId = $_REQUEST['menuId'];

    $sql1 = "DELETE FROM file_menu_name WHERE id = '$menuId'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $updateQuery = "UPDATE user_files SET menu_type = 'NULL',type_id = '0' WHERE type_id = '$menuId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success']="Menu Removed Successfully..";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
