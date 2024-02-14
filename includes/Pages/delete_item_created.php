<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET["id"];
$sql = "DELETE FROM item WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Item Deleted Successfully";
            header('Location:add_item_subitem.php');
?>
