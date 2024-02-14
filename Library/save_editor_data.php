<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
if (isset($_REQUEST['pagesubmit'])) {
    if (isset($_REQUEST['folderId'])) {
        $folderId = $_REQUEST['folderId'];
    } else {
        $folderId = NULL;
    }
    if (isset($_REQUEST['briefId'])) {
        $briefId = $_REQUEST['briefId'];
    } else {
        $briefId = NULL;
    }
    $pageName = $_REQUEST['pagename'];
    $editorData = $_REQUEST['editorData'];
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $userId = $_SESSION['login_id'];
    $initial = $_REQUEST['initial'];
    $briefType = $_REQUEST['briefType'];
    $role = $_SESSION['role'];
    if ($role == 'instructor') {
        $color = "yellow";
    } elseif ($role == 'student') {
        $color = 'blue';
    } else {
        $color = 'red';
    }
    $shopId = $_SESSION['shopId'];

    $permissionCategory = $_REQUEST['permissionCategory'];

    $permissionType = $_REQUEST['permissionType'];
    $permissionUser = $_REQUEST['userId'];

    // echo $pageName."<br>";
    // echo $editorData."<br>";
    // echo $permissionType."<br>";
    // print_r($permissionUser);
    // die();

    if (empty($editorData)) {
        $_SESSION['danger']="Pls Insert Some Data in edior field..";
        header("Location:../includes/Pages/fheader1.php");
    } else {
        $query_editor = "INSERT INTO editor_data(pageName,editorData,folderId,shopid,briefId,createdAt,updatedAt,createdBy,updatedBy,userId,changeLog,color,userRole,briefType) VALUES ('$pageName','$editorData','$folderId','$shopId','$briefId','$date','$date','$createdBy','$updatedBy','$userId','$initial','$color','$role','$briefType')";
        $statement_editor = $connect->prepare($query_editor);
        $statement_editor->execute();

        if ($role == "super admin") {

            $shopShelfDel = "DELETE FROM tempbrief WHERE briefId = '$briefId' AND folderId = '$folderId' AND shopId = '$shopId' AND userId = '$userId'";
            $shopShelfStatement = $connect->prepare($shopShelfDel);
            $shopShelfStatement->execute();
        }
    }

    $lastQ = $connect->query("SELECT id FROM editor_data ORDER BY id DESC LIMIT 1");
    $lastId = $lastQ->fetchColumn();

    if (isset($permissionUser)) {
        // $userId = $_REQUEST['userId'];
        $totalUser = count($permissionUser);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $permissionUser[$i];
                $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success']="Permission Given successfully..";
                header("Location:../includes/Pages/fheader1.php");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success']="Permission Given successfully..";
        header("Location:../includes/Pages/fheader1.php");
    }
}
