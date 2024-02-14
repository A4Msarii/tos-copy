<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM shop_folder WHERE folder_id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
$_SESSION['danger'] = "File Removed From Shop";
            
            header('Location:file_management.php');

if (isset($_REQUEST["delete_file_shop_id"])) {
echo $id=$_REQUEST["delete_file_shop_id"];
$sql = "DELETE FROM shop_folder WHERE folder_id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "File Removed From Shop";
            
            header('Location:../../Library/file_management.php');
}
?>