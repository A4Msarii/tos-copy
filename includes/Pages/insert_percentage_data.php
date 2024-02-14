<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST['submitpercentage']))
{    

     $percentagetype = $_POST['percentagetype'];
     $percentage = $_POST['percentage'];
     $color = $_POST['color'];
     $sql = "INSERT INTO percentage (percentagetype, percentage, color)
      VALUES ('$percentagetype','$percentage','$color')";

     $statement = $connect->prepare($sql);

     $statement->execute();
     $_SESSION['success'] = "Percentage Inserted Successfully";
 
     header("Location:usersinfo.php');
}
?>