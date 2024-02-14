<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_POST['id'];
$war_name=$_POST['war_name'];
$query="UPDATE `warning_data`
SET `warning_name` = '$war_name'
WHERE `id`='$id'";

$statement = $connect->prepare($query);

$statement->execute();
$_SESSION['success'] = "Data Updated Successfully";
header('Location:warning.php?id='.urlencode(base64_encode($id)));
            
     

  ?>