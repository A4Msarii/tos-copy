<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
 
$fileId = $_REQUEST['fileId'];

 $newFileName="";
 $completeFilename = $_REQUEST['oldfileName'];
 $directory = "../includes/pages/files/";

 $editedFilename = $_REQUEST['fileName'];

$extension = pathinfo($completeFilename, PATHINFO_EXTENSION);
$editedCompleteFilename = $editedFilename . '.' . $extension;

 $originalFilePath = $directory . $completeFilename;

 $editedFilePath = $directory . $editedCompleteFilename;
  if (file_exists($editedFilePath)) {
      $_SESSION['danger'] = "A file with the new name already exists.";
         header('Location:openpdfpage.php?fileID='.$fileId);
    } else {
        if (rename($originalFilePath, $editedFilePath)) {
             $query = "UPDATE user_files SET filename = '$editedCompleteFilename' WHERE id = '$fileId'";
            

            $stmt = $connect->prepare($query);
            $stmt->execute();
            $_SESSION['success'] = "File name has been updated to: ' ". $editedCompleteFilename."'";
             header('Location:openpdfpage.php?fileID='.$fileId);
        } else {
            $_SESSION['danger'] = "There was an error updating the file name";
             header('Location:openpdfpage.php?fileID='.$fileId);
        }
    } 

?>