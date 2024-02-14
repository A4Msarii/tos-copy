<?php
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';
session_start();
$userId = $_SESSION['login_id'];

$senderId = $_REQUEST['senderId'];
$msg = $_REQUEST['msg'];

$sql = "DELETE FROM checktyping WHERE userId = '$userId' AND chatId = '$senderId'";
$statement = $connect->prepare($sql);
$statement->execute();

$query1 = "INSERT INTO chats(senderId,receiverId,messages,date) VALUES ('$userId','$senderId','$msg',NOW())";
$statement1 = $connect->prepare($query1);
$statement1->execute();

// $_SESSION['warning'] = "Marks should be under or equal 100";
header("Location:chat-direct.php?chatId=" . $senderId . "");