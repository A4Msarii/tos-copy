<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";
$statement = $connect->prepare($sql);

            $statement->execute();
         $_SESSION['danger'] = "User Deleted Successfully.";

header('Location:usersinfo.php');
?>