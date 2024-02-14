<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_REQUEST['id'];
$query="UPDATE `notifications`
SET `is_read` = '1',`permission`='1'
WHERE `id`='$id'";
var_dump($query);
$statement = $connect->prepare($query);

            $statement->execute();

          $_SESSION['success'] = "Approved";
          header('Location:approve_aced.php');
?>