

<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM newcourse WHERE Courseid='$id'";
echo $sql;
$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Student Removed From Course";
            header('Location:usersinfo.php');
?>