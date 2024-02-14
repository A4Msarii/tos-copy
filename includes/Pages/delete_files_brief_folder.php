<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_GET["id"];
$sql = "DELETE FROM file_briefcase_folder WHERE file_id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Files Removed From Folder";
            header('Location:file_management.php');

if (isset($_REQUEST["files_brief_folder_id"])) {
echo $id=$_REQUEST["files_brief_folder_id"];
$sql = "DELETE FROM file_briefcase_folder WHERE file_id='$id'";

$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Files Removed From Folder";
            header('Location:../../Library/file_management.php');
}
?>