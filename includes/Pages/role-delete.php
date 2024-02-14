<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$sql = "DELETE FROM roles WHERE id='" . $_GET["id"] . "'";
$statement = $connect->prepare($sql);

            $statement->execute();
         header('Location:roles.php');
?>