<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST["id"];
    $sql = "DELETE FROM warning_category_data WHERE id='$id'";

    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "Category Deleted Successfully";
    header('Location:add_warning_data.php');
}

if (isset($_REQUEST['gId'])) {
    $gId = $_REQUEST["gId"];
    $sql = "DELETE FROM warning_category_data WHERE group_id='$gId'";

    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "Category Deleted Successfully";
    header('Location:add_warning_data.php');
}
