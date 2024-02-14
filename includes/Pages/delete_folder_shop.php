<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM shop_folder WHERE folder_id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Folder Removed From Shop";
            header('Location:file_management.php');
?>