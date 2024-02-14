<?php

include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$fileId = $_REQUEST['fileId'];
 $phase = $_POST["phase"];

$phaseName = $_REQUEST['phaseName'];
 $phaseName;
if ($phaseName == '') {
    $string = $phase;
    $last_space_pos = strrpos($string, "\\");
    $substring = substr($string, $last_space_pos + 1);
    $location = $substring;
} else {
    $location = $phaseName;
}
 $location;
$str = str_replace('\\', '\\\\',$phase);
$sql = "UPDATE user_files SET filename = '$str',lastName = '$location',type = 'offline' WHERE id = '$fileId'";
$stmt = $connect->prepare($sql);
$stmt->execute();

$_SESSION['success'] = "Link Updated Successfully";
header("Location:userUrlPage.php?linkId=".$fileId."&fileName=".$phase);
    ?>