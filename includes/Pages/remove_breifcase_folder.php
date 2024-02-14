<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
echo $id = $_GET["id"];

$query1 = "SELECT * FROM file_briefcase where brief_id='$id'";
$statement1 = $connect->prepare($query1);
$statement1->execute();

if ($statement1->rowCount() > 0) {
    $result1 = $statement1->fetchAll();
    foreach ($result1 as $row1) {
        $file_id = $row1['file_id'];
        $sql = "DELETE FROM file_briefcase_folder WHERE file_id='$file_id'";

        $statement = $connect->prepare($sql);
        $statement->execute();
    }
}

$_SESSION['danger'] = "Breifcase Removed from Folder";
header('Location:file_management.php');

if (isset($_REQUEST["remove_breifcase_folder_id"])) {
echo $id = $_REQUEST["remove_breifcase_folder_id"];

$query1 = "SELECT * FROM file_briefcase where brief_id='$id'";
$statement1 = $connect->prepare($query1);
$statement1->execute();

if ($statement1->rowCount() > 0) {
    $result1 = $statement1->fetchAll();
    foreach ($result1 as $row1) {
        $file_id = $row1['file_id'];
        $sql = "DELETE FROM file_briefcase_folder WHERE file_id='$file_id'";

        $statement = $connect->prepare($sql);
        $statement->execute();
    }
}

$_SESSION['danger'] = "Breifcase Removed from Folder";
header('Location:../../Library/file_management.php');
}
?>