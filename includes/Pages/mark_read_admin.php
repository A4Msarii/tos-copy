<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id=$_REQUEST['id'];
// $query="UPDATE `notifications`
// SET `is_read` = '1'
// WHERE `to_userid`='$id'";

// $statement = $connect->prepare($query);

// $statement->execute();

$query1="UPDATE `notifications`
SET `is_read` = '1'
WHERE `if_admin`='super admin'";

$statement1 = $connect->prepare($query1);

$statement1->execute();


?>