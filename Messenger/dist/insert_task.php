<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];
$chatId = $_SESSION['chatUserId'];
// echo $chatId;
// die();
if (isset($_REQUEST['addTask'])) {
    if(isset($_REQUEST['color'])){
    $color = $_REQUEST['color'];
    }else{
       $color = "gray"; 
    }
    $priority = $_REQUEST['priority'];
    $checklist = $_REQUEST['checklist'];

    $query_title = "INSERT INTO per_checklist (user_id,title,priority,date,color) VALUES ('$userId','$checklist','$priority',NOW(),'$color')";
    $statement_title = $connect->prepare($query_title);
    $statement_title->execute();

    // header("Location:chat-direct.php?chatId='.$chatId.'");
    header("Location:chat-direct.php?chatId=" . $chatId . "");
}
