<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['userPermissionDeleteId'])) {
    $id = $_REQUEST["userPermissionDeleteId"];

    $sql1 = "DELETE FROM pagepermissions WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:file_management.php');
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

if (isset($_REQUEST['adminFilePermissionDeleteId'])) {
    $id = $_REQUEST["adminFilePermissionDeleteId"];

    $sql1 = "DELETE FROM filepermissionsfm WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:permissionData.php');
}

if (isset($_REQUEST['adminUsersPermissionDeleteId'])) {
    $id = $_REQUEST["adminUsersPermissionDeleteId"];

    $sql1 = "DELETE FROM filepermissions WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:permissionData.php');
}

if (isset($_REQUEST['userPermissionDeleteId'])) {
    $id = $_REQUEST["userPermissionDeleteId"];
die($id);
    $sql1 = "DELETE FROM filepermissions WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:permissionData.php');
}

if (isset($_REQUEST['userPagesPermissionDeleteId'])) {
    $id = $_REQUEST["userPagesPermissionDeleteId"];

    $sql1 = "DELETE FROM pagepermissions WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:permissionData.php');
}







if (isset($_REQUEST['adminPermissionDeleteId'])) {
    $id = $_REQUEST["adminPermissionDeleteId"];

    $sql1 = "DELETE FROM pagepermissionsfm WHERE id='$id'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();

   $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:file_management.php');
}
