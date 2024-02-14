<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['course'])) {
    $course = $_REQUEST['course'];
    $startDate = $_REQUEST['startDate'];
    $ctpID = $_REQUEST['ctpID'];
    $courseCode = $_REQUEST['courseCode'];

    $queryIns = "INSERT INTO course_cal (courseName,startDate,userId,ctpId,courseId) VALUES ('$course','$startDate','$userId','$ctpID','$courseCode')";
    $stmt = $connect->prepare($queryIns);
    $stmt->execute();
}

if (isset($_REQUEST['course1'])) {
    $course = $_REQUEST['course1'];
    $startDate = $_REQUEST['startDate1'];

    $sqlDel = "DELETE FROM course_cal WHERE courseName = '$course' AND startDate = '$startDate' AND userId = '$userId'";
    $statement = $connect->prepare($sqlDel);
    $statement->execute();
}

if(isset($_REQUEST['colorVal'])){
    $colorVal = $_REQUEST['colorVal'];
    $courseCode = $_REQUEST['courseCode'];
    $courseName = $_REQUEST['courseName'];

    $sqlDel = "DELETE FROM course_color WHERE courseCode = '$courseCode' AND userId = '$userId' AND ctpId = '$courseName'";
    $statement = $connect->prepare($sqlDel);
    $statement->execute();

    $queryIns = "INSERT INTO course_color (color,userId,ctpId,courseCode) VALUES ('$colorVal','$userId','$courseName','$courseCode')";
    $stmt = $connect->prepare($queryIns);
    $stmt->execute();

}
