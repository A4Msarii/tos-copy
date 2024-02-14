<?php
session_start(); // Start the session

include('../../../includes/config.php');
include('../../../includes/connect.php');
$id = $_REQUEST['id'];
$eventtitle = $_REQUEST['eventtitle'];
$eventDesc = $_REQUEST['eventDesc'];
$eventDate = $_REQUEST['eventDate'];
$eventStatus = $_REQUEST['eventStatus'];
$eventPriority = $_REQUEST['eventPriority'];
$eventCat = $_REQUEST['eventCat'];
$eventComent = $_REQUEST['eventComent'];
$eventColor = $_REQUEST['eventColor'];
$query = "UPDATE `per_checklist` SET `title`='$eventtitle',description = '$eventDesc',status = '$eventStatus', priority = '$eventPriority',comment = '$eventComent',date = '$eventDate',category = '$eventCat',color = '$eventColor' WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
