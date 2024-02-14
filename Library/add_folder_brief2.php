<?php
include('../includes/config.php');
include ROOT_PATH . 'includes/connect.php';
session_start();

$folder_id = $_REQUEST['fol_id'];
$file_brief = $_REQUEST['fsid2'];
$shop_id = $_REQUEST['shop_id'];
$brief_id = $_REQUEST['breif_id'];
$file_brief1 = $_REQUEST['fsid1'];
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['addBriefFile'])) {
    if (empty($file_brief) && empty($file_brief1)) {
        $_SESSION['warning'] = "Files Are Blank";
        header("Location:../includes/Pages/fheader1.php");
    } else {
        if (isset($file_brief)) {
            foreach ($file_brief as $filess) {
                echo $query = "UPDATE `user_files` SET briefId = '$brief_id', folderId = '$folder_id', shopid = '$shop_id' WHERE `id`='$filess'";
                $statement = $connect->prepare($query);
                $statement->execute();
            }
        }
        if (isset($file_brief1)) {
            foreach ($file_brief1 as $filesss) {
                echo $query = "UPDATE `editor_data` SET folderId = '$folder_id',shopid = '$shop_id',briefId = '$brief_id' WHERE `id`='$filesss'";
                $statement = $connect->prepare($query);
                $statement->execute();
            }
        }

        $shopShelfDel = "DELETE FROM tempbrief WHERE briefId = '$brief_id' AND folderId = '$folder_id' AND shopId = '$shop_id' AND userId = '$userId'";
        $shopShelfStatement = $connect->prepare($shopShelfDel);
        $shopShelfStatement->execute();


        // if(isset($breifcase)){
        //     foreach ($breifcase as $files) {   
        //         $query="UPDATE `user_briefcase` SET `shopid` = '$folder_id' WHERE `id`='$files'";
        //         $statement = $connect->prepare($query);
        //         $statement->execute(); 
        //     }
        // }
        // if(isset($main_breif)){
        //     foreach ($main_breif as $files1) {   
        //         $query="UPDATE `user_briefcase` SET `shopid` = '$folder_id' WHERE `id`='$files1'";
        //         $statement = $connect->prepare($query);
        //         $statement->execute(); 
        //     }
        // }
        $_SESSION['success'] = "Files Added";
        header("Location:../includes/Pages/fheader1.php");
    }
}

if (isset($_REQUEST['addBriefFolder'])) {
    $shopId = $_REQUEST['shopId'];
    $folId = $_REQUEST['folId'];
    $brId = $_REQUEST['main_breif'];

    if (isset($brId)) {
        foreach ($brId as $files1) {
            $query = "INSERT INTO tempbrief (briefId,folderId,shopId,userId) VALUES('$files1','$folId','$shopId','$userId')";
            $statement = $connect->prepare($query);
            $statement->execute();
        }
    }
   $_SESSION['success'] = "Briefcase Added";
    header("Location:../includes/Pages/fheader1.php");
}
