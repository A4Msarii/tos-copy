<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$id = $_GET["deleteId"];
$page_type = $_REQUEST['page_type'];
$query2_fm2 = "SELECT * FROM user_briefcase where user_id='$id'";
$statement2_fm2 = $connect->prepare($query2_fm2);
$statement2_fm2->execute();
if ($statement2_fm2->rowCount() > 0) {
    $result2_fm2 = $statement2_fm2->fetchAll();
    $snm = 2;
    foreach ($result2_fm2 as $row32) {
        $ides=$row32['id'];
        $sql = "DELETE FROM user_files WHERE briefId='$ides' and user_id='$id'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $sql1 = "DELETE FROM editor_data WHERE briefId='$ides' and userId='$id'";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
    }
}
$sql2 = "DELETE FROM user_briefcase WHERE user_id='$id'";
$statement2 = $connect->prepare($sql2);
$statement2->execute();
$_SESSION['danger'] = "Data Deleted Successfully";
if ($page_type == "admin") {
    header('Location:file_management.php');
  } else {
    header('Location:../../Library/file_management.php');
  }
