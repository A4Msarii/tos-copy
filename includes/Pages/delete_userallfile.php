<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
echo $id = $_GET["deleteId"];

    $sql1 = "DELETE FROM user_files WHERE user_id='$id'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();


$_SESSION['danger'] = "Pages Deleted Successfully";
header('Location:file_management.php');


if (isset($_REQUEST["deleteIdlibrary"])) {
    echo $id = $_GET["deleteIdlibrary"];
$sql1 = "DELETE FROM user_files WHERE user_id='$id'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();

$_SESSION['danger'] = "Pages Deleted Successfully";
header('Location:../../Library/file_management.php');
}

?>
