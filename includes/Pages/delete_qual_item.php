<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM qual_data WHERE id='$id'";
echo $sql;
$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Item Deleted Successfully";
            header('Location:qual.php');
?>