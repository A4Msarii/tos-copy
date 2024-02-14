<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['editFileBtnAdmin'])) {
    // $totalfiles = count($_FILES['fileName']['name']);
    $filename = $_FILES['fileName']['name'];
    $fileId = $_REQUEST['fileId'];
   

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $uploadPath = '../includes/pages/files/' . $filename;
    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $uploadPath)) {
        $query = "UPDATE files SET name = '$filename',type = '$ext' WHERE id = '$fileId'";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "File Updated successfully..";
        header("Location:../includes/Pages/fheader1.php");
    } else {
        echo 'Error in uploading file - ' . $_FILES['fileName']['name'] . '<br/>';
    }

    echo 'Data inserted successfully';
}

if (isset($_REQUEST['editFileBtn'])) {
    // $totalfiles = count($_FILES['fileName']['name']);
    $filename = $_FILES['fileName']['name'];
    $fileId = $_REQUEST['fileId'];
   

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $uploadPath = '../includes/pages/files/' . $filename;
    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $uploadPath)) {
        $query = "UPDATE user_files SET filename = '$filename',type = '$ext' WHERE id = '$fileId'";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "File Updated successfully..";
        header("Location:openpdfpage.php?fileID=".$fileId);
    } else {
        echo 'Error in uploading file - ' . $_FILES['fileName']['name'] . '<br/>';
    }

    echo 'Data inserted successfully';
}

if (isset($_REQUEST['submitfileadmin'])) {
    // $totalfiles = count($_FILES['fileName']['name']);
    $filename = $_FILES['fileName']['name'];
    $fileId = $_REQUEST['fileId'];
   

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $uploadPath = '../includes/pages/files/' . $filename;
    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $uploadPath)) {
        $query = "UPDATE user_files SET filename = '$filename',type = '$ext' WHERE id = '$fileId'";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "File Updated successfully..";
        header("Location:list_view_files.php");
    } else {
        echo 'Error in uploading file - ' . $_FILES['fileName']['name'] . '<br/>';
    }

    echo 'Data inserted successfully';
}

if (isset($_REQUEST['submitfile'])) {
    // $totalfiles = count($_FILES['fileName']['name']);
    $filename = $_FILES['fileName']['name'];
    $fileId = $_REQUEST['fileId'];
   

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $uploadPath = '../includes/pages/files/' . $filename;
    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $uploadPath)) {
        $query = "UPDATE user_files SET filename = '$filename',type = '$ext' WHERE id = '$fileId'";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "File Updated successfully..";
        header("Location:grid_view_files.php");
    } else {
        echo 'Error in uploading file - ' . $_FILES['fileName']['name'] . '<br/>';
    }

    echo 'Data inserted successfully';
}
?>
