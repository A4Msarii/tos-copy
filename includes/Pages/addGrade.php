<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['gradeBtn'])) {
    $itemId = $_REQUEST['itemId'];
    $u = $_REQUEST['U'];
    $f = $_REQUEST['F'];
    $g = $_REQUEST['G'];
    $v = $_REQUEST['V'];
    $e = $_REQUEST['E'];
    $n = $_REQUEST['N'];

    $updateItemGrade = "UPDATE itembank SET U = '$u',F = '$f',G = '$g', V = '$v', E = '$e', N = '$n' WHERE id = '$itemId'";
    $statement_editor = $connect->prepare($updateItemGrade);
    $statement_editor->execute();
    $_SESSION['success'] = "Grade Added Successfully";
    header("Location:add_item_subitem.php");
}

if (isset($_REQUEST['subGradeBtn'])) {
    $itemId = $_REQUEST['subItemId'];
    $u = $_REQUEST['U'];
    $f = $_REQUEST['F'];
    $g = $_REQUEST['G'];
    $v = $_REQUEST['V'];
    $e = $_REQUEST['E'];
    $n = $_REQUEST['N'];

    $updateItemGrade = "UPDATE sub_item SET U = '$u',F = '$f',G = '$g', V = '$v', E = '$e', N = '$n' WHERE id = '$itemId'";
    $statement_editor = $connect->prepare($updateItemGrade);
    $statement_editor->execute();
    $_SESSION['success'] = "Grade Added Successfully";
    header("Location:add_item_subitem.php");
}
