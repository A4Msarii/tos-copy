<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['date'])) {
    $date = $_REQUEST['date'];
    $coursecode = $_REQUEST['coursecode'];
    $coursename = $_REQUEST['coursename'];
    $phaseId = $_REQUEST['phaseId'];
    $courseId = $_REQUEST['courseId'];
    $checkCourseAvl = $connect->query("SELECT count(*) FROM manage_role_course_phase WHERE phase_id = '$phaseId' AND course_id = '$courseId' AND courseName = '$coursename' AND courseCode = '$coursecode'");
    if ($checkCourseAvl->fetchColumn() > 0) {
        $query_ad = "UPDATE manage_role_course_phase SET phaseDate = '$date' WHERE course_id = '$courseId' AND phase_id = '$phaseId' AND coursecode = '$coursecode' AND coursename = '$coursename'";
        $statement_ad = $connect->prepare($query_ad);
        $statement_ad->execute();
    } else {
        $query_title = "INSERT INTO manage_role_course_phase (phase_id,course_id,phaseDate,courseName,courseCode) VALUES ('$phaseId','$courseId','$date','$coursename','$coursecode')";
        $statement_title = $connect->prepare($query_title);
        $statement_title->execute();
    }
}
