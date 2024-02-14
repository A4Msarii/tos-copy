<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$page_redirection=$_POST['page_redirection'];
echo $shop = $_REQUEST['shop'];

$add_folder = $_REQUEST['add_folder'];

$add_breif = $_REQUEST['add_breif'];
$fileId = $_REQUEST['add_file'];
 $fileId1 = $_REQUEST['add_file1'];
if (empty($add_breif) && empty($fileId) && empty($fileId1)) {
    
    $_SESSION['danger'] = "Folder Are Blank";
if ($page_redirection=="admin") {
                    header('Location:file_management.php');
                    exit();
                    }
                    if($page_redirection=="user"){
                    header('Location:../../Library/file_management.php');
                    exit();
                    }
} else {
    if (isset($add_breif)) {
        foreach ($add_breif as $b_id) {
            $query = "UPDATE `user_briefcase` SET `shopid` = '$shop' WHERE `id`='$b_id'";
            $statement = $connect->prepare($query);
            $statement->execute();
        }
    }
    if (isset($fileId)) {
        foreach ($fileId as $f_id) {
            $query = "UPDATE `user_files` SET `shopid` = '$shop' WHERE `id`='$f_id'";
            $statement = $connect->prepare($query);
            $statement->execute();
        }
    }
    if (isset($fileId1)) {
        foreach ($fileId1 as $f_id1) {
            $query = "UPDATE `editor_data` SET `shopid` = '$shop' WHERE `id`='$f_id1'";
            $statement = $connect->prepare($query);
            $statement->execute();
        }
    }
    

    $_SESSION['success'] = "Folders Added";
 if ($page_redirection=="admin") {
                    header('Location:file_management.php');
                    exit();
                    }
                    if($page_redirection=="user"){
                    header('Location:../../Library/file_management.php');
                    exit();
                    }
}

