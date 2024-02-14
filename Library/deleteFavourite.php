<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['favFile'])) {
    $favFile = $_REQUEST['favFile'];

    $sql = "DELETE FROM favouritefiles WHERE id = '$favFile'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "Favourite Deleted Successfully";

    if(isset($_REQUEST['pageId'])){
        $pId = $_REQUEST['pageId'];
        header("Location:userUrlPage.php?linkId=$pId");
    }else{
    header("Location:favouriteData.php");
    }
}

if (isset($_REQUEST['favPage'])) {
    $favPage = $_REQUEST['favPage'];

    $sql = "DELETE FROM favouritepages WHERE id='$favPage'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "Favourite Deleted Successfully";
    if(isset($_REQUEST['pageId'])){
        $pId = $_REQUEST['pageId'];
        header("Location:pageData.php?pId=$pId");
    }else{
    header("Location:favouriteData.php");
    }
}
?>