<?php
session_start();
$user_Id = $_SESSION['login_id'];
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['mainId'])) {
    $mainId = $_REQUEST['mainId'];
    $colorVal = $_REQUEST['colorVal'];

    $query_ad = "UPDATE `per_checklist` SET `color` = '$colorVal' WHERE `id`='$mainId'";
    $statement_ad = $connect->prepare($query_ad);
    $statement_ad->execute();
}
