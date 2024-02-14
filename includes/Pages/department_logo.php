<?php
// Include the database configuration file
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$statusMsg = '';
$id=$_REQUEST['id'];
// File upload path
$targetDir = "department/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            
            $insert = $connect->query("UPDATE `homepage` SET `file_name` = '$fileName',`uploaded_on` = NOW() WHERE `id`='$id'");
            if($insert){
                $statusMsg = "<div class='alert alert-success'>The file ".$fileName. " has been uploaded successfully.</div>";
            }else{
                $statusMsg = "<div class='alert alert-danger'>File upload failed, please try again.</div>";
            } 
        }else{
            $statusMsg = "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
        }
    }else{
        $statusMsg = "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.</div>";
    }
}else{
    $statusMsg = "<div class='alert alert-danger'>Please select a file to upload.</div>";
}
//$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:department_list.php?error='.$statusMsg);
// Display status message
//echo $statusMsg;
?>