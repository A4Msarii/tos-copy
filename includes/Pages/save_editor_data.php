<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$conn = mysqli_connect("localhost", "root", "", "grade sheet");

if (isset($_REQUEST['pagesubmit'])) {

    $pageName = $_REQUEST['pagename'];

    $editorData1 = $_REQUEST['editorData'];
    $folderId = 0;
    $briefId = 0;
    $editorData = mysqli_real_escape_string($conn, $editorData1);
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $userId = $_SESSION['login_id'];
    $initial = $_REQUEST['initial'];
    $role = $_SESSION['role'];
    if ($role == 'instructor') {
        $color = "yellow";
    } elseif ($role == 'student') {
        $color = 'blue';
    } else {
        $color = 'red';
    }

    $permissionCategory = $_REQUEST['permissionCategory'];

    if (empty($editorData)) {
        $error = "<div class='alert alert-danger'>Pls Insert Some Data in edior field..</div>";
        header("Location:file_management.php?error=" . $error);
    } else {
        $query_editor = "INSERT INTO `editor_data`(`pageName`,`editorData`,`folderId`,`briefId`,`createdAt`,`updatedAt`,`createdBy`,`updatedBy`,`userId`,`changeLog`,`color`,`userRole`) VALUES ('$pageName','$editorData','$folderId','$briefId','$date','$date','$createdBy','$updatedBy','$userId','$initial','$color','$role')";
        //  print_r ($query_editor);
        // die();
        $statement_editor = $connect->prepare($query_editor);
        $statement_editor->execute();

        // $error ="<div class='alert alert-success'>Page Inserted successfully..</div>";
        // header("Location:file_management.php?error=".$error);

        $permissionType = $_REQUEST['permissionType'];
        $permissionUser = $_REQUEST['userId'];

        $lastId = $connect->lastInsertId();

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
                    $error = "<div class='alert alert-success'>Page Added successfully..</div>";
                    header("Location:file_management.php?error=" . $error);
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
            $error = "<div class='alert alert-success'>Page Added successfully..</div>";
            // die($error);
            if($_REQUEST['page'] == "admin"){
                header("Location:file_management.php?error=" . $error);
            }else{
                header("Location:../../Library/file_management.php?error=" . $error);
            }
        }
    }
}
