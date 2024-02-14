<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$f_id = $_POST['fol'];
        $adminBrief = $_REQUEST['linkDeleteId'];
    
        $sql = "DELETE FROM user_briefcase WHERE id='$adminBrief'";
        $statement = $connect->prepare($sql);
        $statement->execute();
    
        $query = "UPDATE user_files SET briefId = '0', folderId = '0', shopid = '0' WHERE briefId = '$adminBrief'";
        $statement = $connect->prepare($query);
        $statement->execute();
    
        $query = "UPDATE editor_data SET briefId = '0', folderId = '0', shopid = '0'WHERE briefId = '$adminBrief'";
        $statement = $connect->prepare($query);
        $statement->execute();
    
    
    $_SESSION['danger'] = "Folder Deleted Successfully";
    header('Location:fheader1.php?folder_ID='.$f_id.'');
    ?>