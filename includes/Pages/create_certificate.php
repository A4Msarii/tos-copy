<?php 

    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $certificate_name=$_REQUEST['certificate_name'];
 $type=$_REQUEST['type'];

$query_ac ="INSERT INTO certificate_data (`name`,`type`) VALUES ('$certificate_name','$type')";
$statement_ac = $connect->prepare($query_ac);
$statement_ac->execute();

$_SESSION['success'] = "Inserted Successfully";
header("Location:drag_drop.php");
?>