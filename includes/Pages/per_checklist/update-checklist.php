<?php
session_start(); // Start the session

include('../../../includes/config.php');
include('../../../includes/connect.php');

// Get the user_id from the session (assuming it's stored in the session)

$event_id = $_REQUEST['id'];
$date = $_REQUEST['newStart'];

$query="UPDATE `per_checklist` SET `date`='$date' WHERE `id`='$event_id'";
$statement = $connect->prepare($query);
$statement->execute();

$query="UPDATE `per_checklist` SET `date`='$date' WHERE `mainCheckId`='$event_id'";
$statement = $connect->prepare($query);
$statement->execute();
?>
