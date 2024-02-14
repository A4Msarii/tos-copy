<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['removeResAss'])) {
    $phaseId = $_REQUEST['phaseId'];
    $fileId = $_REQUEST['fileId'];
    $instId = $_REQUEST['instId'];
    // $resRefId = $_REQUEST['resRefId'];
    $courseCode = $_REQUEST['courseCode'];
    $courseName = $_REQUEST['courseName'];

    $sql = "DELETE FROM phasefilepermission WHERE fileId = '$fileId' AND instId = '$instId' AND phaseId = '$phaseId' AND coursecode = '$courseCode' AND courseName = '$courseName'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "User Removed Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['removeAcaAss'])) {
    $phaseId = $_REQUEST['phaseId'];
    $fileId = $_REQUEST['fileId'];
    $instId = $_REQUEST['instId'];
    $assigneCourseCode = $_REQUEST['courseCode'];
    $assigneCourseName = $_REQUEST['courseName'];

    echo $sql = "DELETE FROM academicassignee WHERE filesId = '$fileId' AND instId = '$instId' AND phaseId = '$phaseId' AND coursecode = '$assigneCourseCode' AND coursename = '$assigneCourseName'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['success'] = "User Removed Successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
