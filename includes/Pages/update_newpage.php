<?php
session_start();
include '../../includes/config.php';
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


    $updateQuery = "UPDATE newpage_fm SET pageName = '$pageName',editorData = '$pageData',updatedAt = '$date', updatedBy = '$updatedBy' WHERE id = '$pageId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $query_changeLog = "INSERT INTO adminpagechangelo(createdBy,changeLog,pageId,pageName) VALUES ('$createdBy','$changeLog','$pageId','$pageName')";
    $statement_changeLog = $connect->prepare($query_changeLog);
    $statement_changeLog->execute();
    $_SESSION['success'] = "Data Updated Successfully";
    header("Location:file_management.php");
}

if (isset($_REQUEST['userPageUpdate'])) {
    $pageId = $_REQUEST['pageId'];
    $pageName = $_REQUEST['pagename'];
    $pageData = $_REQUEST['editorData'];
    $date = $dt1 = date("Y-m-d");
    $updatedBy = $_SESSION['nickname'];
    // $briefId = $_REQUEST['briefId'];
    // $folderId = $_REQUEST['folderId'];
    $createdBy = $_REQUEST['createdBy'];
    $changeLog = $_REQUEST['initial'];


    $updateQuery = "UPDATE editor_data SET pageName = '$pageName',editorData = '$pageData',updatedAt = '$date', updatedBy = '$updatedBy' WHERE id = '$pageId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $query_changeLog = "INSERT INTO newpagechangelogdata(createdBy,changeLog,pageId,pageName) VALUES ('$createdBy','$changeLog','$pageId','$pageName')";
    $statement_changeLog = $connect->prepare($query_changeLog);
    $statement_changeLog->execute();
   $_SESSION['success'] = "Data Updated Successfully";
   if($_REQUEST['page'] == 'admin'){
       header("Location:file_management.php");
   }else{
    header("Location:../../Library/file_management.php");
   }
}
