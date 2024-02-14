<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$page_redirection=$_POST['page_redirection'];
$folder_id = $_REQUEST['fol_id'];
$file_brief = $_REQUEST['foid'];
$file_brief1 = $_REQUEST['foid1'];
$breifcase = $_REQUEST['breifcase1'];
$main_breif = $_REQUEST['main_breif'];

if (empty($file_brief) && empty($breifcase) && empty($file_brief1) && empty($main_breif)) {
    
    $_SESSION['danger'] = "Files are blank";
    if ($page_redirection=="admin") {
                    header('Location:file_management.php');
                    exit();
                    }
                    if($page_redirection=="user"){
                    header('Location:../../Library/file_management.php');
                    exit();
                    }
} else {
    if (isset($file_brief)) {
        foreach ($file_brief as $filess) {
        echo $query="UPDATE `user_files` SET `folderId` = '$folder_id' WHERE `id`='$filess'";
        $statement = $connect->prepare($query);
        $statement->execute();
        }}
    if (isset($file_brief1)) {
        foreach ($file_brief1 as $filesss) {
            echo $query="UPDATE `editor_data` SET `folderId` = '$folder_id' WHERE `id`='$filesss'";
        $statement = $connect->prepare($query);
        $statement->execute();
        }
    }
    if(isset($breifcase)){
        foreach ($breifcase as $files) {   
            $query="UPDATE `user_briefcase` SET `folderId` = '$folder_id' WHERE `id`='$files'";
            $statement = $connect->prepare($query);
            $statement->execute(); 
        }
    }
    if(isset($main_breif)){
        foreach ($main_breif as $files1) {   
            $query="UPDATE `user_briefcase` SET `folderId` = '$folder_id' WHERE `id`='$files1'";
            $statement = $connect->prepare($query);
            $statement->execute(); 
        }
    }
    
    $_SESSION['success'] = "Files Added";
     if ($page_redirection=="admin") {
                    header('Location:file_management.php');
                    exit();
                    }
                    if($page_redirection=="user"){
                    header('Location:../../Library/file_management.php');
                    exit();
                    }
}

