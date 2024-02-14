<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET['id'];
$sql = "DELETE FROM homepage WHERE id='$id'";
$statement = $connect->prepare($sql);

            $statement->execute();
      
         $_SESSION['danger'] = "Department Deleted Successfully";
         header('Location:department_list.php');
?>