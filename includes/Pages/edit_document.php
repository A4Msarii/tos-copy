<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['saveit'])) {
    $fileId = $_REQUEST['fileId'];
    $filename = $_FILES['upload_file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uploadPath = 'test_document/' . $filename;
    if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $uploadPath)) {
        // // Prepare and execute the SQL query to insert the file into the database
        $query = "UPDATE document_test SET file_name = '$filename',file_type = '$ext' WHERE id = '$fileId'";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
    $_SESSION['success'] = "File Updated Successfully";
    header("Location:create_test.php");
}

if (isset($_REQUEST['saveitLab'])) {
    $fileId = $_REQUEST['fileId'];
    $filename = $_FILES['upload_file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uploadPath = 'files/' . $filename;
    if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $uploadPath)) {
        // // Prepare and execute the SQL query to insert the file into the database
        $query = "UPDATE user_files SET filename = '$filename',type = '$ext' WHERE id = '$fileId'";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
    $_SESSION['success'] = "File Updated Successfully";
    header("Location:create_test.php");
}

if (isset($_REQUEST['editOnlineLink'])) {
    $fileId = $_REQUEST['fileId'];
    $onlineLinkType = $_REQUEST['onlineLinkType'];
    $onlineLink = $_REQUEST['onlineLink'];
    $onlineLinkName = $_REQUEST['onlineLinkName'];

    if ($onlineLinkName == '') {
        $string = $onlineLink;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $onlineLinkName;
    }

    $str = str_replace('\\', '\\\\', $onlineLink);
    $query = "UPDATE document_test SET file_name = '$str',file_type = '$onlineLinkType',lastName = '$location' WHERE id = '$fileId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Files Updated Successfully";
    header("Location:create_test.php");
}

if (isset($_REQUEST['editOnlineLinkLab'])) {
    $fileId = $_REQUEST['fileId'];
    $onlineLinkType = $_REQUEST['onlineLinkType'];
    $onlineLink = $_REQUEST['onlineLink'];
    $onlineLinkName = $_REQUEST['onlineLinkName'];

    if ($onlineLinkName == '') {
        $string = $onlineLink;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $onlineLinkName;
    }

    $str = str_replace('\\', '\\\\', $onlineLink);
    $query = "UPDATE user_files SET filename = '$str',type = '$onlineLinkType',lastName = '$location' WHERE id = '$fileId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Files Updated Successfully";
    header("Location:create_test.php");
}

if (isset($_REQUEST['editOfflineLink'])) {
    $fileId = $_REQUEST['fileId'];
    $onlineLinkType = $_REQUEST['offlineLinkType'];
    $onlineLink = $_REQUEST['onlineLink'];
    $onlineLinkName = $_REQUEST['onlineLinkName'];

    if ($onlineLinkName == '') {
        $string = $onlineLink;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $onlineLinkName;
    }

    $str = str_replace('\\', '\\\\', $onlineLink);
    $query = "UPDATE document_test SET file_name = '$str',file_type = '$onlineLinkType',lastName = '$location' WHERE id = '$fileId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Files Updated Successfully";
    header("Location:create_test.php");
}

if (isset($_REQUEST['editOfflineLinkLab'])) {
    $fileId = $_REQUEST['fileId'];
    $onlineLinkType = $_REQUEST['offlineLinkType'];
    $onlineLink = $_REQUEST['onlineLink'];
    $onlineLinkName = $_REQUEST['onlineLinkName'];

    if ($onlineLinkName == '') {
        $string = $onlineLink;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $onlineLinkName;
    }

    $str = str_replace('\\', '\\\\', $onlineLink);
    $query = "UPDATE user_files SET filename = '$str',type = '$onlineLinkType',lastName = '$location' WHERE id = '$fileId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Files Updated Successfully";
    header("Location:create_test.php");
}
