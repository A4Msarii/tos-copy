<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_GET["id"];
 echo $query="UPDATE `newpage_fm`
SET `briefid`=NULL,breif_type=NULL
WHERE `id`='$id'";

$statement = $connect->prepare($query);

$statement->execute();
$_SESSION['danger'] = "Pages Removed";
header('Location:file_management.php');

?>