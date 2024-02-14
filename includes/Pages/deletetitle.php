<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();


if (isset($_REQUEST['deleteTitleId'])) {
    $deleteTitleId = $_REQUEST['deleteTitleId'];
 
    $sql1 = "DELETE FROM persontitle WHERE id='$deleteTitleId'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Data Deleted Successfully";
            header('Location:landingpage.php');
}
?>