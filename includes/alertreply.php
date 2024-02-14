<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
function redirectBack() {
    // Check if the HTTP_REFERER is set
    if (isset($_SERVER['HTTP_REFERER'])) {
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url");
        exit();
    } else {
        // If HTTP_REFERER is not set, redirect to a default page
        header("Location: default-page.php");
        exit();
    }
}

if(isset($_REQUEST['ok'])){
    $alert_id = $_REQUEST['alert_id'];
    $user_id = $_REQUEST['user_id'];
    $message = $_REQUEST['ok'];
    $sql = "INSERT INTO alertreply (alert_id,user_id,message) VALUES('$alert_id','$user_id','$message')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();

    $_SESSION['success']="Accepted This Mesage!";
    redirectBack();

}else{
    $alert_id = $_REQUEST['alert_id'];
    $user_id = $_REQUEST['user_id'];
    $message = $_REQUEST['close'];
    $sql = "INSERT INTO alertreply (alert_id,user_id,message) VALUES('$alert_id','$user_id','$message')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $_SESSION['danger']="Not Accepted This Mesage!";
    redirectBack();
}