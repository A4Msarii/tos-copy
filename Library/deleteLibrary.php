<?php
session_start();
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

$labID = $_REQUEST['labId'];
$userId = $_REQUEST['userId'];

// echo $labID;
// echo $userId;

if(isset($_REQUEST['userId'])){
    $labDel = "DELETE FROM library WHERE id='$labID' AND user_id='$userId'";
    $statement = $connect->prepare($labDel);
    $statement->execute();

    $folderLabfDel = "DELETE FROM folder_shop_user WHERE lib_id='$labID' AND user_id='$userId' AND lib_id='$labID'";
    $statement1 = $connect->prepare($folderLabfDel);
    $statement1->execute();

    $shelfLabDel = "DELETE FROM shelf_shop WHERE lib_id='$labID' AND user_id='$userId' AND lib_id='$labID'";
    $statement2 = $connect->prepare($shelfLabDel);
    $statement2->execute();

    $_SESSION['danger'] = "Library Deleted Successfully";
	header("Location:index.php");

}
?>