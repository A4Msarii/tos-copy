<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id = $_REQUEST['refId'];
$refrence = $_REQUEST['refrenceName'];
$query = "UPDATE `document_test` SET `refrence` = '$refrence' WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();

$error = "permission updated";
header('Location:create_test.php');
