<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['simId'])) {
    $simId = $_REQUEST['simId'];
    $sql = "DELETE FROM clone_class WHERE id = '$simId'";

    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "Cloned Class Deleted Successfully";
    header('Location:sim.php');
}

if (isset($_REQUEST['actualId'])) {
    $actualId = $_REQUEST['actualId'];
    $sql = "DELETE FROM clone_class WHERE id = '$actualId'";

    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "Cloned Class Deleted Successfully";
    header('Location:actual.php');
}
