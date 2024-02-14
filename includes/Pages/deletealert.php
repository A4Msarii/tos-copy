<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();

if (isset($_REQUEST['deletealertId'])) {
    $deletealertId = $_REQUEST['deletealertId'];
 
    $sql1 = "DELETE FROM alerttable WHERE id='$deletealertId'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Data Deleted Successfully";

    // Check if a returnUrl is set in the URL
    if (isset($_GET['returnUrl'])) {
        header("Location: " . $_GET['returnUrl']);
    } else {
        // Default redirection if returnUrl is not set
        header('Location: landingpage.php');
    }
}
?>
