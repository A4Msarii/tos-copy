<?php 
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$targetDir = "draganddropimg/";

 $cert_id = $_REQUEST["cert_id"];
 $image_height = $_REQUEST["image_height"];
 $image_width = $_REQUEST["image_width"];
$border_radius = $_REQUEST["border_radius"];
 $border = $_REQUEST["border"];
 $border_color = $_REQUEST["border_color"];

$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
  	$subquery1 = "INSERT INTO  frame_cert (cert_id,image_height,image_width,border_radius,border,border_color,file_name) VALUES ('$cert_id','$image_height','$image_width','$border_radius','$border','$border_color','$fileName')";
    $substatement1 = $connect->prepare($subquery1);
    $substatement1->execute();
}


    $_SESSION['success']="Item inserted successfully..";
	header("Location:draganddrop.php");
     ?>