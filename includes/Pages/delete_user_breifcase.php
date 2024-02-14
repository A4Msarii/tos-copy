<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
echo $id = $_GET["id"];

$u_id = $_GET["u_id"];
        $sql = "DELETE FROM user_briefcase WHERE id='$id'";

        $statement = $connect->prepare($sql);
        $statement->execute();
        $sql1 = "DELETE FROM user_files WHERE brief_id='$id' and user_id='$u_id'";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();

        $sql1 = "DELETE FROM editor_data WHERE briefId='$id' and userId='$u_id'";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
   
$_SESSION['danger'] = "Briefcase Deleted Successfully";
header('Location:Home.php');
