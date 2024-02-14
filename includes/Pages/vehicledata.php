<?php
     include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST['submitvehicle']))
{    

     // $VehicleName = $_POST['VehicleName'];
     $VehicleType = $_POST['VehicleType'];
     $VehicleNumber = $_POST['VehicleNumber'];
     $VehicleSpot = $_POST['VehicleSpot'];
     $sql = "INSERT INTO vehicle (VehicleType, VehicleNumber, VehicleSpot)
      VALUES ('$VehicleType','$VehicleNumber', '$VehicleSpot')";

     $statement = $connect->prepare($sql);

     $statement->execute();
    $_SESSION['success'] = "Equipment Added Successfully";
 
     header("Location:usersinfo.php");
}
?>