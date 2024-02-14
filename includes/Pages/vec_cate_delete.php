<?php 
echo $id=$_GET['id'];
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$sqlcate = "DELETE FROM vehicletype WHERE vehid='$id'";
$statementcate = $connect->prepare($sqlcate);

            $statementcate->execute();
      
         $_SESSION['danger'] = "Vehicle Deleted Successfully";
         header('Location:usersinfo.php');
?>