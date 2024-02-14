<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_REQUEST['user_dbid'];
$name=$_REQUEST['name'];
// $user_image=$_REQUEST['user_image']
$role=$_REQUEST['role'];
$nickname=$_REQUEST['nickname'];
$studid=$_REQUEST['studid'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$query="UPDATE `users`
SET `name` = '$name',`role`='$role',`nickname`='$nickname',`studid`='$studid',`phone`='$phone',`email`='$email'
WHERE `id`='$id'";
// var_dump($query);
$statement = $connect->prepare($query);

            $statement->execute();
$_SESSION['success'] = "Data Edited Successfully";

header('Location:user_list.php');
?>