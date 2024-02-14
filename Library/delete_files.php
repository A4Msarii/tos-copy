<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['deleteIdfiles'])) {
    $deleteIdfiles = $_REQUEST['deleteIdfiles'];

    $sql = "DELETE FROM user_files WHERE id='$deleteIdfiles'";
    $statement = $connect->prepare($sql);
    $statement->execute();


    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:dashboard_library.php");
}

if (isset($_REQUEST['deleteUserIdadmin'])) {
    $deleteIdadmin = $_REQUEST['deleteUserIdadmin'];

    $sql = "DELETE FROM files WHERE id='$deleteIdadmin'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:dashboard_library.php");
}

if (isset($_REQUEST['deleteIdfilesdetail'])) {
    $deleteIdfilesdetail = $_REQUEST['deleteIdfilesdetail'];

    $sql = "DELETE FROM user_files WHERE id='$deleteIdfilesdetail'";
    $statement = $connect->prepare($sql);
    $statement->execute();


    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:alldetails.php");
}

if(isset($_REQUEST['userFileID'])){
    $deleteIdfilesdetail = $_REQUEST['userFileID'];

    $sql = "DELETE FROM user_files WHERE id='$deleteIdfilesdetail'";
    $statement = $connect->prepare($sql);
    $statement->execute();


    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:../includes/Pages/file_management.php");
}
