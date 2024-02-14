<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['chatId'])) {
    $chatId = $_REQUEST['chatId'];

    $checkType = $connect->query("SELECT count(*) FROM checktyping WHERE userId = '$chatId' AND chatId = '$userId'");
    $checkTypeData = $checkType->fetchColumn();
    if($checkTypeData > 0){
        echo "Typing..";
    }else{
        echo " ";
    }
}
?>