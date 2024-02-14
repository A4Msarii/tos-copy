<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['courseCode'])) {
    $courseCode = $_REQUEST['courseCode'];
    $ctpID = $_REQUEST['ctpID'];
    $hideClass = $connect->query("SELECT count(*) FROM hideclass WHERE courseCode = '$courseCode' AND ctpId = '$ctpID' AND userId = '$userId'");
    if ($hideClass->fetchColumn() <= 0) {
        $queryIns = "INSERT INTO hideclass (ctpId,courseCode,userId) VALUES ('$ctpID','$courseCode','$userId')";
        $stmt = $connect->prepare($queryIns);
        $stmt->execute();
    }
}

if (isset($_REQUEST['courseCode1'])) {
    $courseCode = $_REQUEST['courseCode1'];
    $ctpID = $_REQUEST['ctpID'];

    $sqlDel = "DELETE FROM hideclass WHERE courseCode = '$courseCode' AND ctpId = '$ctpID' AND userId = '$userId'";
    $statement = $connect->prepare($sqlDel);
    $statement->execute();
}
