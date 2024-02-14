<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();

if (isset($_REQUEST['editPhaseFile'])) {
    $phaseFileId = $_REQUEST['phaseFileId'];
    $oldPhaseFile = $_REQUEST['oldPhaseFile'];;
    $newPhaseFile = $_FILES['newPhaseFile']['name'];
    $date = date("Y-m-d");
    $updatedBy = $_SESSION['nickname'];

    if ($newPhaseFile) {
        $ext = pathinfo($newPhaseFile, PATHINFO_EXTENSION);
        $uploadPath = 'files/' . $newPhaseFile;
        if (move_uploaded_file($_FILES["newPhaseFile"]["tmp_name"], $uploadPath)) {
            $updateQuery = "UPDATE user_files SET filename = '$newPhaseFile',type = '$ext',updatedAt = '$date', updatedBy = '$updatedBy' WHERE id = '$phaseFileId'";
            // print_r($updateQuery);
            // die();
            $statement_editor = $connect->prepare($updateQuery);
            $statement_editor->execute();
        }
    }
    $_SESSION['success'] = "File Updated Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['editPhaseLink'])) {
    $newPhaseLinkName = $_REQUEST['newPhaseLinkName'];
    $newPhaseLinkLastName = $_REQUEST['newPhaseLinkLastName'];
    $phaseLinkId = $_REQUEST['phaseLinkId'];
    $date = date("Y-m-d");
    $updatedBy = $_SESSION['nickname'];

    if ($newPhaseLinkLastName == '') {
        $string = $newPhaseLinkLastName;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $newPhaseLinkLastName;
    }

    $str = str_replace('\\', '\\\\', $newPhaseLinkName);
    $updateQuery = "UPDATE user_files SET filename = '$str',lastName = '$location',updatedAt = '$date', updatedBy = '$updatedBy' WHERE id = '$phaseLinkId'";
    // print_r($updateQuery);
    // die();
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    $_SESSION['success'] = "Link Updated Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['phaseFileId'])) {
    $fileId = $_REQUEST['phaseFileId'];
    $coursecode = $_REQUEST['coursecode'];
    $coursename = $_REQUEST['coursename'];
    $phaseId = $_REQUEST['phaseId'];

    $sql = "DELETE FROM phasefilepermission WHERE fileId = '$fileId' AND phaseId = '$phaseId' AND coursecode = '$coursecode' AND courseName = '$coursename'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Deleted Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['assignFile'])) {
    $fileId = $_REQUEST['assignFile'];
    $coursecode = $_REQUEST['coursecode'];
    $coursename = $_REQUEST['coursename'];
    $phaseId = $_REQUEST['phaseId'];

    $sql = "DELETE FROM academicassignee WHERE filesId = '$fileId' AND coursecode = '$coursecode' AND coursename = '$coursename' AND phaseId = '$phaseId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "Deleted Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['attachement'])) {
    $phaseFileId = $_REQUEST['phaseFileId'];
    $newPhaseFile = $_FILES['file']['name'];
    $date = date("Y-m-d");
    $updatedBy = $_SESSION['nickname'];

    $ext = pathinfo($newPhaseFile, PATHINFO_EXTENSION);
    $uploadPath = 'files/' . $newPhaseFile;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadPath)) {
        $updateQuery = "UPDATE user_files SET filename = '$newPhaseFile',lastName = NULL,type = '$ext',updatedAt = '$date', updatedBy = '$updatedBy' WHERE id = '$phaseFileId'";
        // print_r($updateQuery);
        // die();
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    }
    $_SESSION['success'] = "File Updated Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if(isset($_REQUEST['driveLink'])){
    $phaseLinkId = $_REQUEST['phaseFileId'];

    $newPhaseLinkName = $_REQUEST['phase'];
    $newPhaseLinkLastName = $_REQUEST['phaseName'];
    $date = date("Y-m-d");
    $updatedBy = $_SESSION['nickname'];
    $type = "offline";

    if ($newPhaseLinkLastName == '') {
        $string = $newPhaseLinkLastName;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $newPhaseLinkLastName;
    }

    $str = str_replace('\\', '\\\\', $newPhaseLinkName);
    $updateQuery = "UPDATE user_files SET filename = '$str',lastName = '$location',type = '$type',updatedAt = '$date', updatedBy = '$updatedBy' WHERE id = '$phaseLinkId'";
    // print_r($updateQuery);
    // die();
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    $_SESSION['success'] = "Link Updated Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if(isset($_REQUEST['onlineLink'])){
    $phaseLinkId = $_REQUEST['phaseFileId'];

    $newPhaseLinkName = $_REQUEST['link'];
    $newPhaseLinkLastName = $_REQUEST['linkName'];
    $date = date("Y-m-d");
    $updatedBy = $_SESSION['nickname'];
    $type = "online";

    if ($newPhaseLinkLastName == '') {
        $string = $newPhaseLinkLastName;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $newPhaseLinkLastName;
    }

    $str = str_replace('\\', '\\\\', $newPhaseLinkName);
    $updateQuery = "UPDATE user_files SET filename = '$str',lastName = '$location',type = '$type',updatedAt = '$date', updatedBy = '$updatedBy' WHERE id = '$phaseLinkId'";
    // print_r($updateQuery);
    // die();
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    $_SESSION['success'] = "Link Updated Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
