<?php 
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$cert_id = $_REQUEST["cert_id"];
$widht = $_REQUEST["widht"];
$border_color = $_REQUEST["border_color"];
$subquery1 = "INSERT INTO horizontal_cert (cert_id,widht,border_color) VALUES ('$cert_id','$widht','$border_color')";
    $substatement1 = $connect->prepare($subquery1);
     $substatement1->execute();
     $_SESSION['success']="Item inserted successfully..";
     header("Location:draganddrop.php");
?>