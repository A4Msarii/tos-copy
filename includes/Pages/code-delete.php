<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM status WHERE id = '$id'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "Status Deleted Successfully";
    header('Location:status.php');
}
