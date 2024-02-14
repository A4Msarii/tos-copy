<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

echo $id=$_GET["id"];
$sql = "DELETE FROM extra_item_subitem_cl WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "Item Deleted Successfully";
            header('Location:itemsubitemcl.php');
?>