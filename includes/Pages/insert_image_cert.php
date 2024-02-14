<?php 
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$cert_id = $_REQUEST["cert_id"];
$image_width = $_REQUEST["image_width"];
$image_height = $_REQUEST["image_height"];
$image_of_image = $_REQUEST["image_of_image"];
$border = $_REQUEST["border"];

 $border_radius = $_REQUEST["border_radius"];
 $border_color = $_REQUEST["border_color"];
	$subquery1 = "INSERT INTO image_cert (cert_id,image_of_image,image_width,image_height,border_radius,border,border_color) VALUES ('$cert_id','$image_of_image','$image_width','$image_height','$border_radius','$border','$border_color')";
    $substatement1 = $connect->prepare($subquery1);
    $substatement1->execute();

    $_SESSION['success']="Item inserted successfully..";
	header("Location:draganddrop.php");
     ?>