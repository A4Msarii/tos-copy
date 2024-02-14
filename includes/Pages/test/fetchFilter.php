<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['chatId'])) {
    $course_names11 = "";
    $opQ = $connect->query("SELECT * FROM test_course");
    while ($opData = $opQ->fetch()) {
        $opId = $opData['id'];
        $checOp = $connect->query("SELECT count(*) FROM testcatfil WHERE courseId = '$opId'");
        if ($checOp->fetchColumn() <= 0) {
            $course_names11 .= '<option value="' . $opData['id'] . '">' . $opData['course_name'] . '</option>';
        }
    }
    echo $course_names11;
}

if (isset($_REQUEST['catId'])) {
    $catId = $_REQUEST['catId'];
    $query = "INSERT INTO testcatfil (courseId) VALUES ('$catId')";
    $stmt = $connect->prepare($query);
    $stmt->execute();
}
