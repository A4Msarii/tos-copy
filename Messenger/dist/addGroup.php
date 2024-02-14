<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['addGroup'])) {
   $userId = $_SESSION['login_id'];

    $groupName = $_REQUEST['groupName'];
    $groupDesc = $_REQUEST['groupDesc'];
    // $groupProfile = $_REQUEST['groupProfile'];
    $filename = $_FILES['groupProfile']['name'];
    $addUsers = $_REQUEST['addUsers'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uploadPath = '../../includes/Pages/groupProfile/' . $filename;

    if (move_uploaded_file($_FILES["groupProfile"]["tmp_name"], $uploadPath)) {
        $query = "INSERT INTO chatgroup (groupName,groupDesc,groupProfile,createdAt) VALUES ('$groupName','$groupDesc','$filename',NOW())";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $lastQ = $connect->query("SELECT id FROM chatgroup ORDER BY id DESC LIMIT 1");
        $lastId = $lastQ->fetchColumn();

        $name = 0;
        while ($name < count($addUsers)) {
            $addUsers1 = $addUsers[$name];
            $query = "INSERT INTO groupmember (groupId,userId,type,createdAt) VALUES ('$lastId','$addUsers1','member',NOW())";
            $stmt = $connect->prepare($query);
            $stmt->execute();
            $name++;
        }
        $query = "INSERT INTO groupmember (groupId,userId,type,createdAt) VALUES ('$lastId','$userId','admin',NOW())";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    } else {
        $query = "INSERT INTO chatgroup (groupName,groupDesc,createdAt) VALUES ('$groupName','$groupDesc',NOW())";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $lastQ = $connect->query("SELECT id FROM chatgroup ORDER BY id DESC LIMIT 1");
        $lastId = $lastQ->fetchColumn();

        $name = 0;
        while ($name < count($addUsers)) {
            $addUsers1 = $addUsers[$name];
            $query = "INSERT INTO groupmember (groupId,userId,type,createdAt) VALUES ('$lastId','$addUsers1','member',NOW())";
            $stmt = $connect->prepare($query);
            $stmt->execute();
            $name++;
        }
        $query = "INSERT INTO groupmember (groupId,userId,type,createdAt) VALUES ('$lastId','$userId','admin',NOW())";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    }



    $_SESSION['success'] = "Group Inserted Successfully";
    header("Location:chat-direct.php");
}

if (isset($_REQUEST['addOtherParti'])) {
    $groupID = $_REQUEST['groupIDParti'];
    $memberId = $_REQUEST['memberId'];
    $name = 0;
    while ($name < count($memberId)) {
        $memberId1 = $memberId[$name];
        $query = "INSERT INTO groupmember (groupId,userId,type,createdAt) VALUES ('$groupID','$memberId1','member',NOW())";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $name++;
    }
    $_SESSION['success'] = "User Inserted Successfully";
    header("Location:chat-group.php?groupId=" . $groupID . "");
}
