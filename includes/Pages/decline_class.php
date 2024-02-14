<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET['id'];
$query="UPDATE `notifications`
SET `permission` = '0',`is_read`='1'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
            $_SESSION['danger'] = "Decline";
          
          header('Location:approve_per.php');
?>