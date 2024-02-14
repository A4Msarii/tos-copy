<?php 
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$cert_id = $_REQUEST["cert_id"];
$text_data = $_REQUEST["text_data"];
$heading_text = $_REQUEST["heading_text"];
$font_size_height = $_REQUEST["font_size_height"];
$text_type_heading = $_REQUEST["text_type_heading"];
 $font_style = $_REQUEST["font_style"];
 $background_color=$_REQUEST["background_color"];
 $subquery1 = "INSERT INTO para_cert (cert_id,text_data,heading_backgoround,heading_text,font_size_height,text_type_heading,font_style) VALUES ('$cert_id','$text_data','$background_color','$heading_text','$font_size_height','$text_type_heading','$font_style')";
    $substatement1 = $connect->prepare($subquery1);
    $substatement1->execute();

    $_SESSION['success']="Item inserted successfully..";
	header("Location:draganddrop.php");
     ?>