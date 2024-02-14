<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM prereuisite_data WHERE id='$id'";
echo $sql;
$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Prereuisite Deleted Successfully";
            header('Location:prereuisite.php');
?>