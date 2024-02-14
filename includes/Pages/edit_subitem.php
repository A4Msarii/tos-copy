

<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$subitem=$_POST['subitem'];

$subquery="UPDATE `sub_item`
SET `subitem` = '$subitem'
WHERE `id`='$id'";
$statement_s = $connect->prepare($subquery);
$statement_s->execute();
echo $subquery;
$_SESSION['success'] = "Data Edited Successfully";

header('Location:add_item_subitem.php');
?>