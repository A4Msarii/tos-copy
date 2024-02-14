<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$id = $_REQUEST["id"];
$labID = $_REQUEST['labID'];
$userId = $_REQUEST['userId'];

if (isset($_REQUEST['id'])) {
    $shelfDel = "DELETE FROM shelf WHERE id='$id' AND library_id='$labID'";
    $statement = $connect->prepare($shelfDel);
    $statement->execute();

    $folderShelfDel = "DELETE FROM folder_shop_user WHERE shelf_id='$id' AND user_id='$userId' AND lib_id='$labID'";
    $statement1 = $connect->prepare($folderShelfDel);
    $statement1->execute();

    $shelfShopDel = "DELETE FROM shelf_shop WHERE shelf_id='$id' AND user_id='$userId' AND lib_id='$labID'";
    $statement2 = $connect->prepare($shelfShopDel);
    $statement2->execute();


    $_SESSION['danger'] = "Shelf Deleted Successfully";
    header('Location:index.php');
}

if (isset($_REQUEST['shopId'])) {
    $sId = $_REQUEST['shopId'];
    $shelfId = $_REQUEST['shelfId'];
    $shopDel = "DELETE FROM folder_shop_user WHERE shop_id='$sId' AND user_id='$userId' AND lib_id='$labID'";
    $shopStatement = $connect->prepare($shopDel);
    $shopStatement->execute();

    $shopShelfDel = "DELETE FROM shelf_shop WHERE shop_id='$sId' AND user_id='$userId' AND lib_id='$labID' AND shelf_id = '$shelfId'";
    $shopShelfStatement = $connect->prepare($shopShelfDel);
    $shopShelfStatement->execute();

    $_SESSION['danger'] = "Shop Deleted Successfully";
    header('Location:index.php');
}
