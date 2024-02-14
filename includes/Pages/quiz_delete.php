<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['quizId'])) {
    $quizId = $_REQUEST['quizId'];
    $quizName = $_REQUEST['quizName'];
    $sql = "DELETE FROM quiz WHERE id = '$quizId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $quizMarksDelete = "DELETE FROM quiz_marks WHERE quiz_id='$quizId'";
    $statement = $connect->prepare($quizMarksDelete);
    $statement->execute();

    $quizMarksDelete = "DELETE FROM clone_class WHERE class_id = '$quizId' AND class_name = 'quiz'";
    $statement = $connect->prepare($quizMarksDelete);
    $statement->execute();

    $quizMarksDelete = "DELETE FROM quiz_cloned_data WHERE quiz_id = '$quizId'";
    $statement = $connect->prepare($quizMarksDelete);
    $statement->execute();

   $_SESSION['danger'] = "Quiz Deleted Successfully";
    header('Location:quiz.php');
}

if (isset($_REQUEST['cloneId'])) {
    $cloneId = $_REQUEST['cloneId'];
    $classId = $_REQUEST['classId'];
    $stuId = $_REQUEST['stuId'];
    $sql = "DELETE FROM clone_class WHERE class_id = '$classId' AND std_id = '$stuId' AND cloned_id = '$cloneId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $quizMarksDelete = "DELETE FROM quiz_cloned_data WHERE quiz_id = '$classId' AND student_id = '$stuId' AND clone_id = '$cloneId'";
    $statement = $connect->prepare($quizMarksDelete);
    $statement->execute();

    $_SESSION['danger'] = "Cloned Quiz Deleted Successfully";
    header('Location:quiz.php');
}

if(isset($_REQUEST['testId'])){
    $testId = $_REQUEST['testId'];
    $sql = "DELETE FROM test WHERE id = '$testId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $quizMarksDelete = "DELETE FROM test_data WHERE test_id = '$testId'";
    $statement = $connect->prepare($quizMarksDelete);
    $statement->execute();

    $quizMarksDelete = "DELETE FROM clone_class WHERE class_id = '$testId' AND class_name = 'test'";
    $statement = $connect->prepare($quizMarksDelete);
    $statement->execute();

    $quizMarksDelete = "DELETE FROM quiz_cloned_data WHERE test_id = '$testId'";
    $statement = $connect->prepare($quizMarksDelete);
    $statement->execute();

    $_SESSION['danger'] = "Test Deleted Successfully";
    header('Location:testing.php');
}

if(isset($_REQUEST['cloneTestId'])){
    $testId = $_REQUEST['cloneTestId'];
    $stuId = $_REQUEST['stuId'];
    $classId = $_REQUEST['classId'];
    $cloneId = $_REQUEST['cloneId'];
    $sql = "DELETE FROM clone_class WHERE id = '$testId' AND class_id = '$classId' AND std_id = '$stuId' AND cloned_id = '$cloneId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $quizMarksDelete = "DELETE FROM test_cloned_data WHERE test_id = '$classId' AND student_id = '$stuId' AND clone_id = '$cloneId'";
    $statement = $connect->prepare($quizMarksDelete);
    $statement->execute();

    $_SESSION['danger'] = "Test Deleted Successfully";
    header('Location:testing.php');
}