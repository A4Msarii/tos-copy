<?php 
echo $id=$_GET['id'];
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$sql = "DELETE FROM vehicle WHERE id='$id'";
$statement = $connect->prepare($sql);

            $statement->execute();
      
         $_SESSION['danger'] = "Vehicle Deleted Successfully";
         header('Location:usersinfo.php');
?>