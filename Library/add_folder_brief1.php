<?php
include('../includes/config.php');
include ROOT_PATH . 'includes/connect.php';
session_start();
$folder_id = $_REQUEST['fol_id'];
$file_brief = $_REQUEST['foid'];
$file_brief1 = $_REQUEST['foid1'];
$breifcase = $_REQUEST['breifcase1'];
$main_breif = $_REQUEST['main_breif'];

if (empty($file_brief) && empty($breifcase) && empty($file_brief1) && empty($main_breif)) {
    $_SESSION['warning'] = "Files Are Blank";
    header("Location:../includes/Pages/fheader1.php");
} else {
    if (isset($file_brief)) {
        foreach ($file_brief as $filess) {
        echo $query="UPDATE `user_files` SET `shopid` = '$folder_id' WHERE `id`='$filess'";
        $statement = $connect->prepare($query);
        $statement->execute();
        }}
    if (isset($file_brief1)) {
        foreach ($file_brief1 as $filesss) {
            echo $query="UPDATE `editor_data` SET `shopid` = '$folder_id' WHERE `id`='$filesss'";
        $statement = $connect->prepare($query);
        $statement->execute();
        }
    }
    if(isset($breifcase)){
        foreach ($breifcase as $files) {   
            $query="UPDATE `user_briefcase` SET `shopid` = '$folder_id' WHERE `id`='$files'";
            $statement = $connect->prepare($query);
            $statement->execute(); 
        }
    }
    if(isset($main_breif)){
        foreach ($main_breif as $files1) {   
            $query="UPDATE `user_briefcase` SET `shopid` = '$folder_id' WHERE `id`='$files1'";
            $statement = $connect->prepare($query);
            $statement->execute(); 
        }
    }
    $_SESSION['success'] = "Files Added";
     header("Location:../includes/Pages/fheader1.php");
}

