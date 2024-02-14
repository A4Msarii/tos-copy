<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET['id'];
$query="UPDATE `grade_per_notifications`
SET `permission` = '1',`is_read`='1'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();

          $_SESSION['success'] = "Approved";
          header('Location:approve_per.php');
?>