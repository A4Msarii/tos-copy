<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
echo $id = $_GET["deleteId"];
$type=$_GET['type'];
if($type=="link"){
    $sql1 = "DELETE FROM user_files WHERE user_id='$id' and type IN ('online', 'offline')";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();  
}elseif($type=="img"){
    $sql1 = "DELETE FROM user_files WHERE user_id='$id' and type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();  
}else{
    $sql1 = "DELETE FROM user_files WHERE user_id='$id' and type='$type'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();
}

$_SESSION['danger'] = "Pages Deleted Successfully";
header('Location:file_management.php');

if (isset($_REQUEST["deleteIdlibrary"])) {
    echo $id = $_GET["deleteIdlibrary"];
$type=$_GET['type'];
if($type=="link"){
    $sql1 = "DELETE FROM user_files WHERE user_id='$id' and type='offline' OR type='online'";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();  
}elseif($type=="img"){
    $sql1 = "DELETE FROM user_files WHERE user_id='$id' and type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();  
}else{
    $sql1 = "DELETE FROM user_files WHERE user_id='$id' and type='$type'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();
}

$_SESSION['danger'] = "Pages Deleted Successfully";
header('Location:../../Library/file_management.php');
}
?>