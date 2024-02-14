<?php

include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$filename = $_FILES['fileName']['name'];
    $fileId = $_REQUEST['fileId'];
   

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $uploadPath = '../includes/pages/files/' . $filename;
    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $uploadPath)) {
        $query = "UPDATE user_files SET filename = '$filename',lastName=NULL,type = '$ext' WHERE id = '$fileId'";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "File Updated Successfully";
        header("Location:openpdfpage.php?fileID=".$fileId);
    } else {
        
        
        $_SESSION['danger'] = "Error In File uploading";
        header("Location:openpdfpage.php?fileID=".$fileId);
    }

 
    ?>