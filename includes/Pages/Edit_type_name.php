<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_POST['id'];
$upt_name=$_POST['upt_name'];
$query="UPDATE `type_data`
SET `type_name` = '$upt_name'
WHERE `id`='$id'";

$statement = $connect->prepare($query);

$statement->execute();
$_SESSION['success'] = "Data Updated Successfully";
header('Location:addtype.php?id='.urlencode(base64_encode($id)));
            
     

  ?>
