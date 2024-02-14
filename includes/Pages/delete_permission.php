<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['userPermissionDeleteId'])) {
    $id = $_REQUEST["userPermissionDeleteId"];
    $page_type = $_REQUEST['page_type'];

    $sql1 = "DELETE FROM pagepermissions WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();
    
    $_SESSION['danger'] = "Permission Deleted Successfully";
    if ($page_type == "admin") {
        header('Location:file_management.php');
    } else {
        header('Location:../../Library/file_management.php');
    }
}

if (isset($_REQUEST['userFilePermissionDeleteId'])) {
    $id = $_REQUEST["userFilePermissionDeleteId"];
    $page_type = $_REQUEST['page_type'];

    $sql1 = "DELETE FROM filepermissions WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    if ($page_type == "admin") {
        header('Location:file_management.php');
    } else {
        header('Location:../../Library/file_management.php');
    }
}

if (isset($_REQUEST['PermissionDeleteId'])) {
    $id = $_REQUEST["PermissionDeleteId"];

    $sql1 = "DELETE FROM pagepermissions WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:fheader1.php');
}


if (isset($_REQUEST['PermissionFileDeleteId'])) {
    $id = $_REQUEST["PermissionFileDeleteId"];

    $sql1 = "DELETE FROM filepermissions WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:fheader1.php');
}

if (isset($_REQUEST['adminPermissionFileDeleteId'])) {
    $id = $_REQUEST["adminPermissionFileDeleteId"];

    $sql1 = "DELETE FROM filepermissionsfm WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:fheader1.php');
}





if (isset($_REQUEST['adminPermissionDeleteId'])) {
    $id = $_REQUEST["adminPermissionDeleteId"];

    $sql1 = "DELETE FROM pagepermissionsfm WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:file_management.php');
}
