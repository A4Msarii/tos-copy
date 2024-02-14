<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
// echo $quiz_id=$_POST['quiz_id'];
session_start();
$userId = $_SESSION['login_id'];
$std_id = $_POST['std_id'];
$id = $_POST['quiz_id'];
$crs_id = $_POST['crs_id'];
$Marks = $_POST["Marks"];

if ($Marks <= 100) {

   $checkMarks = $connect->query("SELECT count(*) FROM quiz_marks WHERE quiz_id = '$id' AND student_id = '$std_id' AND course_id = '$crs_id'");
   if ($checkMarks->fetchColumn() > 0) {
      $updateQuery = "UPDATE quiz_marks SET marks = '$Marks',status = '1',created = NOW() WHERE quiz_id = '$id' AND student_id = '$std_id' AND course_id = '$crs_id'";
      $statement_editor = $connect->prepare($updateQuery);
      $statement_editor->execute();
   } else {

      $sql = "INSERT INTO quiz_marks (quiz_id,student_id,course_id,marks,created,status,userId) VALUES ('$id','$std_id','$crs_id','$Marks',NOW(),'1','$userId')";
      // print_r($sql);
      // die();
   }

   $statement = $connect->prepare($sql);
   $statement->execute();
   $_SESSION['success'] = "Marks Added Successfully";
   header("Location:quiz.php");
} else {

   $_SESSION['warning'] = "Marks should be under or equal 100";
   header("Location:quiz.php");
}
