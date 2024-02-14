<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$examid = $_REQUEST['examid'];
$fetchExamType = $connect->query("SELECT exam_created_type FROM examname WHERE id = '$examid'");
if ($fetchExamType->fetchColumn() == "manual") {
    $startDate = $_REQUEST['startDate'];
    $startTime = $_REQUEST['startTime'];
    $endDate = $_REQUEST['endDate'];
    $endTime = $_REQUEST['endTime'];
    $exam_for = $_REQUEST['exam_for'];
    $course_id = $_REQUEST['course_id'];
    $exam_dep = $_REQUEST['exam_dep'];
    if ($exam_for == "course") {
        $updateQuery = "UPDATE examname SET examFor = '$exam_for',dep_id = NULL,course_id = '$course_id', start_hours = '$startTime',end_hours = '$endTime',dates = '$startDate',end_date = '$endTime' WHERE id = '$examid'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    } else if ($exam_for == "dep") {
        $updateQuery = "UPDATE examname SET examFor = '$exam_for',dep_id = '$exam_dep',course_id = NULL, start_hours = '$startTime',end_hours = '$endTime',dates = '$startDate',end_date = '$endTime' WHERE id = '$examid'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    } else {
        $updateQuery = "UPDATE examname SET examFor = '$exam_for',dep_id = NULL,course_id = NULL, start_hours = '$startTime',end_hours = '$endTime',dates = '$startDate',end_date = '$endTime' WHERE id = '$examid'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    }
} else {
    $examname = $_REQUEST['examname'];
    $question = $_REQUEST['question'];
    $easy = $_REQUEST['easy'];
    $medium = $_REQUEST['medium'];
    $hard = $_REQUEST['hard'];
    $veryhard = $_REQUEST['veryhard'];
    $exammarks = $_REQUEST['exammarks'];
    $passmarks = $_REQUEST['passmarks'];
    $date = $_REQUEST['date'];
    $updateQuery = "UPDATE examname SET examName = '$examname',questionNumber='$question',percentageEasy='$easy',percentageMedium='$medium',percentageHard='$hard',percentageveryhard='$veryhard',total_marks='$exammarks',passing_marks='$passmarks',dates='$date' WHERE id = '$examid'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}
$_SESSION['success'] = "Data updated Successfully";
header('Location:managetest.php');
