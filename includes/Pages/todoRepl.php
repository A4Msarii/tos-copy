<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if(isset($_REQUEST['ok'])){
    $toDoDate = $_REQUEST['toDoDate'];
    $user_id = $_REQUEST['user_id'];

    $sql = "INSERT INTO todo_ok (userId,date) VALUES ('$user_id','$toDoDate')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");

}

?>