<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();


if (isset($_REQUEST['deleteId'])) {
    $deleteId = $_REQUEST['deleteId'];

    $sql = "DELETE FROM newpage_fm WHERE id='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM pagepermissionsfm WHERE pageId='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:file_management.php");
}

if (isset($_REQUEST['dashboardDeleteId'])) {
    $deleteId = $_REQUEST['dashboardDeleteId'];

    $sql = "DELETE FROM newpage_fm WHERE id='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM pagepermissionsfm WHERE pageId='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:../../Library/dashboard_library.php");
}



if (isset($_REQUEST['userDeleteId'])) {
    $deleteId = $_REQUEST['userDeleteId'];

    $sql = "DELETE FROM editor_data WHERE id='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM pagepermissions WHERE pageId='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:file_management.php");
}

if (isset($_REQUEST['deleteIdlibrary'])) {
    $deleteIdlibrary = $_REQUEST['deleteIdlibrary'];

    $sql = "DELETE FROM newpage_fm WHERE id='$deleteIdlibrary'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM pagepermissionsfm WHERE pageId='$deleteIdlibrary'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:../../Library/file_management.php");
}

if (isset($_REQUEST['userDeleteIdlibrary'])) {
    $userDeleteIdlibrary = $_REQUEST['userDeleteIdlibrary'];

    $sql = "DELETE FROM editor_data WHERE id='$userDeleteIdlibrary'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM pagepermissions WHERE pageId='$userDeleteIdlibrary'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:../../Library/file_management.php");
}

?>
