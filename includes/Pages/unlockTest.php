<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['submitUnlock'])) {
    $stuId = $_REQUEST['std_id'];
    $courseId = $_REQUEST['crs_id'];
    $username  = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $testUnlockId = $_REQUEST['testUnlockId'];
    $password = md5($password);

    $checkLoginQ = $connect->query("SELECT count(*) FROM users WHERE studid = '$username' AND password = '$password'");
    if ($checkLoginQ->fetchColumn() > 0) {

        $updateQuery = "UPDATE test_data SET status = '0' WHERE test_id = '$testUnlockId' AND student_id = '$stuId' AND course_id = '$courseId'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Test Unlocked Successfully";
        header("Location:testing.php");
    } else {
        $_SESSION['danger'] = "Invalid Username Or password..";
        header("Location:testing.php");
    }
}

if (isset($_REQUEST['unlockQuiz'])) {
    $stuId = $_REQUEST['std_id'];
    $courseId = $_REQUEST['crs_id'];
    $username  = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $testUnlockId = $_REQUEST['quizUnlockId'];
    $password = md5($password);

    $checkLoginQ = $connect->query("SELECT count(*) FROM users WHERE studid = '$username' AND password = '$password'");
    if ($checkLoginQ->fetchColumn() > 0) {

        $updateQuery = "UPDATE quiz_marks SET status = '0' WHERE quiz_id = '$testUnlockId' AND student_id = '$stuId' AND course_id = '$courseId'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
        $_SESSION['success'] = "Quiz Unlocked Successfully";
        header("Location:quiz.php");
    } else {
        $_SESSION['danger'] = "Invalid Username Or password..";
        header("Location:quiz.php");
    }
}
