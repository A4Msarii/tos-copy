<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['mute'])) {
    $sql = "INSERT INTO mute_notification (userId) VALUES ('$userId')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}

if (isset($_REQUEST['unMute'])) {
    $sql = "DELETE FROM mute_notification WHERE userId = '$userId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
}
