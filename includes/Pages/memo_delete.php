<?php 
echo $id=$_GET['id'];
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$sql = "DELETE FROM memo WHERE id='$id'";
$statement = $connect->prepare($sql);

            $statement->execute();
      
         $_SESSION['danger'] = "Data Deleted Successfully";
         header('Location:memo.php');
?>