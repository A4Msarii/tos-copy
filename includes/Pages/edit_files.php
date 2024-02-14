<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$page_redirection=$_POST['page_redirection'];
$fileId = $_REQUEST['pdf_loc_edit_id'];

 $newFileName="";
 $completeFilename = $_REQUEST['fullname'];
 $directory = "../../includes/pages/files/";

 $editedFilename = $_REQUEST['editname'];

$extension = pathinfo($completeFilename, PATHINFO_EXTENSION);
$editedCompleteFilename = $editedFilename . '.' . $extension;

 $originalFilePath = $directory . $completeFilename;

 $editedFilePath = $directory . $editedCompleteFilename;
  if (file_exists($editedFilePath)) {
      $_SESSION['warning'] = "A file with the new name already exists.";
      if ($page_redirection=="admin") {
        header('Location:file_management.php');
        }
        if($page_redirection=="user"){
        header('Location:../../Library/file_management.php');
        }
    } else {
        if (rename($originalFilePath, $editedFilePath)) {
             $query = "UPDATE user_files SET filename = '$editedCompleteFilename' WHERE id = '$fileId'";
            

            $stmt = $connect->prepare($query);
            $stmt->execute();
            if ($page_redirection=="admin") {
                header('Location:file_management.php');
                }
                if($page_redirection=="user"){
                header('Location:../../Library/file_management.php');
                }
        } else {
    
            
            $_SESSION['danger'] = "There was an error updating the file name";
            if ($page_redirection=="admin") {
                header('Location:file_management.php');
                }
                if($page_redirection=="user"){
                header('Location:../../Library/file_management.php');
                }
        }
    } 



?>
