<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$menuidess=$_POST['menuidess'];
$menunameess=$_POST['menunameess'];
$color=$_POST['color'];
$itquery="UPDATE `file_menu_name`
SET `menu_name` = '$menunameess',`color` = '$color'
WHERE `id`='$menuidess'";
$statement_i = $connect->prepare($itquery);
$statement_i->execute();

$_SESSION['success'] = "Data Edited Successfully";

header("Location: {$_SERVER['HTTP_REFERER']}");
?>