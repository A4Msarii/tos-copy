<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM group_student_scheduling WHERE id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Student Removed From Group";
            header('Location:add_group.php');
?>