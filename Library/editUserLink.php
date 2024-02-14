<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['editLinkBtn'])) {
    $fileId = $_REQUEST['fileId'];
    $type = $_POST['fileEditType'];
    $phase = $_POST["locationName"];
    $phaseName = $_REQUEST['linkName'];
    if ($phaseName == '') {
        $string = $phase;
        $last_space_pos = strrpos($string, "\\");
        $substring = substr($string, $last_space_pos + 1);
        $location = $substring;
    } else {
        $location = $phaseName;
    }

    $conn = mysqli_connect("localhost", "root", "", "grade sheet");

    $value = mysqli_real_escape_string($conn, $phase);

    // $query = "UPDATE user_files SET filename = '$filename',type = '$ext' WHERE id = '$fileId'";
    //     $stmt = $connect->prepare($query);
    //     $stmt->execute();


    $sql = "UPDATE user_files SET filename = '$value',lastName = '$location',type = '$type' WHERE id = '$fileId'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $_SESSION['success'] = "Link Updated successfully..";
    header("Location:openpdfpage.php?linkId=".$fileId);
}


if (isset($_REQUEST['editAdminLinkBtn'])) {
    $fileId = $_REQUEST['fileId'];
    $type = $_POST['fileEditType'];
    $phase = $_POST["locationName"];
    $phaseName = $_REQUEST['linkName'];
    if ($phaseName == '') {
        $string = $phase;
        $last_space_pos = strrpos($string, "\\");
        $substring = substr($string, $last_space_pos + 1);
        $location = $substring;
    } else {
        $location = $phaseName;
    }

    $conn = mysqli_connect("localhost", "root", "", "grade sheet");

    $value = mysqli_real_escape_string($conn, $phase);

    // $query = "UPDATE user_files SET filename = '$filename',type = '$ext' WHERE id = '$fileId'";
    //     $stmt = $connect->prepare($query);
    //     $stmt->execute();


    $sql = "UPDATE files SET name = '$value',type = '$location',file_Type = '$type' WHERE id = '$fileId'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $_SESSION['success'] = "Link Updated successfully..";
    header("Location:../includes/Pages/fheader1.php");
}