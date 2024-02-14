<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM subitem WHERE id='$id'";
echo $sql;
$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Subitem Deleted Successfully";
            header('Location:add_item_subitem.php');
?>
