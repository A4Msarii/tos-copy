<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['update'])) {
    $pageId = $_REQUEST['pageId'];
    $pageName = $_REQUEST['pagename'];
    $pageData = $_REQUEST['editorData'];
    $date = $dt1 = date("Y-m-d");
    $updatedBy = $_SESSION['nickname'];
    // $briefId = $_REQUEST['briefId'];
    // $folderId = $_REQUEST['folderId'];
    $createdBy = $_REQUEST['createdBy'];
    $changeLog = $_REQUEST['changeLog'];


    $updateQuery = "UPDATE editor_data SET pageName = '$pageName',editorData = '$pageData',updatedAt = '$date', updatedBy = '$updatedBy' WHERE id = '$pageId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $query_changeLog = "INSERT INTO newpagechangelogdata(createdBy,changeLog,pageId,pageName) VALUES ('$createdBy','$changeLog','$pageId','$pageName')";
    $statement_changeLog = $connect->prepare($query_changeLog);
    $statement_changeLog->execute();
    $_SESSION['success'] = "Page Updated Successfully";
    header("Location:pageData.php");
}

if (isset($_REQUEST['deleteId'])) {
    $deleteId = $_REQUEST['deleteId'];

    $sql = "DELETE FROM editor_data WHERE id='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM pagepermissions WHERE pageId='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM favouritepages WHERE pageId='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "Page Deleted Successfully";
    header("Location:../includes/Pages/fheader1.php");
}

if (isset($_REQUEST['fileDeleteId'])) {
    $deleteId = $_REQUEST['fileDeleteId'];

    $sql = "DELETE FROM user_files WHERE id='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM filepermissions WHERE pageId='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM favouritefiles WHERE fileId='$deleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:../includes/Pages/fheader1.php");
}

if (isset($_REQUEST['deleteIdfiles'])) {
    $deleteIdfiles = $_REQUEST['deleteIdfiles'];

    $sql = "DELETE FROM user_files WHERE id='$deleteIdfiles'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM filepermissions WHERE pageId='$deleteIdfiles'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM favouritefiles WHERE fileId='$deleteIdfiles'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:list_view_files.php");
}

if (isset($_REQUEST['deleteIdgrid'])) {
    $deleteIdgrid = $_REQUEST['deleteIdgrid'];

    $sql = "DELETE FROM user_files WHERE id='$deleteIdgrid'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM filepermissions WHERE pageId='$deleteIdgrid'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM favouritefiles WHERE fileId='$deleteIdgrid'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:grid_view_files.php");
}
?>