<?php 
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
 $id=$_REQUEST['id'];
$sql1 = "DELETE FROM notifications WHERE id='$id'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();
echo 'deleted';
?>