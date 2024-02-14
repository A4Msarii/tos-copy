<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['memberId'])) {
    $memberId = $_REQUEST['memberId'];
    $groupId = $_REQUEST['groupId'];

    $sql = "DELETE FROM groupmember WHERE groupId = '$groupId' AND userId = '$memberId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    header('Location:chat-group.php?groupId='.$groupId.'');
}
