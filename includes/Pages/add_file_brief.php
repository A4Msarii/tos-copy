<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$brief_id = $_REQUEST['brid'];
$admin_users_file = $_REQUEST['fsid2'];
$useridess = $_REQUEST['urtype'];
$user_name_files = $connect->prepare("SELECT `role` FROM `users` WHERE id=?");
$user_name_files->execute([$useridess]);
$name12 = $user_name_files->fetchColumn();
$admin_pages = $_REQUEST['fsid1'];
if (empty($admin_users_file) && empty($admin_pages) ) {
    

    $_SESSION['danger'] = "Files are blank";
    header("Location:add_file_brief.php");
} else {

    if (isset($admin_users_file)) {
        foreach ($admin_users_file as $file) {
            $query = "UPDATE `user_files`
                SET `briefId` = '$brief_id',user_id='$useridess',`role`='$name12'
                WHERE `id`='$file'";

            $statement = $connect->prepare($query);

            $statement->execute();

        }
    }
    if (isset($admin_pages)) {
        foreach ($admin_pages as $files) {
            $query = "UPDATE `editor_data`
                SET `briefId` = '$brief_id',userId='$useridess',userRole='$name12'
                WHERE `id`='$files'";

            $statement = $connect->prepare($query);

            $statement->execute();

        }
    }

   
    $_SESSION['success'] = "Files Added Successfully";
    if($_REQUEST['page_type'] == "admin"){
        header("Location:file_management.php");
    }else{
        header("Location:../../Library/file_management.php");
    }
}
