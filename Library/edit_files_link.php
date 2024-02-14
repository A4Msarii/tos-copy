<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

$fileId = $_REQUEST['fileId'];
 $phase = $_POST["link"];
 $type = $_REQUEST['fileType'];

$phaseName = $_REQUEST['linkName'];
if ($phaseName == '') {
    $url = $phase;
    $characters_before_last_slash = substr($url, 0, strrpos($url, '/'));
    $characters_before_last_slash = substr($characters_before_last_slash, strrpos($characters_before_last_slash, '/') + 1);
    $location = $characters_before_last_slash;
} else {
    $location = $phaseName;
}

$str = str_replace('\\', '\\\\', $phase);

$sql = "UPDATE user_files SET filename = '$str',lastName = '$location',type = '$type' WHERE id = '$fileId'";
$stmt = $connect->prepare($sql);
$stmt->execute();

$_SESSION['success'] = "Link Updated Successfully";
header("Location:userUrlPage.php?linkId=".$fileId."&fileName=".$phase);
    ?>