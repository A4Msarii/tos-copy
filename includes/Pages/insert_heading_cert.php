<?php 
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$cert_id = $_REQUEST["cert_id"];
$headings_name = $_REQUEST["headings_name"];
$headings_style = $_REQUEST["headings_style"];
$heading_backgoround = $_REQUEST["heading_backgoround"];
$heading_text = $_REQUEST["heading_text"];
$text_type_heading = $_REQUEST["text_type_heading"];
 $font_family = $_REQUEST["font_family"];
 $heading_texts = $_REQUEST["heading_texts"];
 $font_size_height=$_REQUEST["font_size_height"];
	$subquery1 = "INSERT INTO heading_cert (cert_id,headings_name,font_size_height,heading_text_value,headings_style,heading_backgoround,heading_text,text_type_heading,font_family) VALUES ('$cert_id','$headings_name','$font_size_height','$heading_texts','$headings_style','$heading_backgoround','$heading_text','$text_type_heading','$font_family')";
    $substatement1 = $connect->prepare($subquery1);
    $substatement1->execute();

    $_SESSION['success']="Item inserted successfully..";
	header("Location:draganddrop.php");
     ?>