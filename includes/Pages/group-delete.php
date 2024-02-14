<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET["id"];

$sql = "DELETE FROM groups WHERE id='$id'";
$statement = $connect->prepare($sql);
 $statement->execute();

$sql1 = "DELETE FROM group_student_scheduling WHERE group_id='$id'";
$statement1 = $connect->prepare($sql1);
 $statement1->execute();

$_SESSION['danger'] = "Group Deleted Successfully";
         header('Location:add_group.php');
?>
