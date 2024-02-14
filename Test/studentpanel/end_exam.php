<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
// Resume the session
session_start();

// Clear the exam start time to end the session
unset($_SESSION['exam_start_time']);
unset($_SESSION['unique_id']);
unset($_SESSION['exam_id']);
$exam_id = $_GET['id'];
$repeat_id = $_GET['repeat_id'];
$user_id = $_GET['user_id'];
$total_question = "";
$table_type_value = "";


// Assuming $exam_id is set somewhere in your code

$query = "SELECT * FROM examname WHERE id = '$exam_id'";
$result = $connect->query($query);

if ($result) {
  foreach ($result as $row) {
    $typeoftest = $row['exam_Types'];
    $total_marks = $row['total_marks'];
    $exam_marks_type = $row['marks_type'];
    $exam_marksmin_type = $row['passing_marks'];
    $examFor = $row['examFor'];
    $examName = $row['examName'];
    // Use the retrieved values as needed within the loop
  }
}


if ($typeoftest == "repeat") {
  $table_type_value = "exam_answers_repeat_test";
} else {
  $table_type_value = "exam_answers_once_test";
}

$stmt = $connect->query("SELECT * FROM exam_question_ist where exam_id='$exam_id'");
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalQuestions = count($questions);
$score = 0;
$diaScore = 0;
$cLength = 0;
$dis_mark = 0;
$dis_mark = $total_marks / $totalQuestions;
foreach ($questions as $question) {
  $questionid = $question['id'];
  $question_Id = $question['question_id'];
  $check_type_q = $connect->query("SELECT `type` FROM exam_question WHERE id = '$question_Id'");
  $exam_q_type = $check_type_q->fetchColumn();
  $fetch_answer = $connect->prepare("SELECT correst_answer FROM `exam_question` WHERE id=?");
  $fetch_answer->execute([$question_Id]);
  $fetch_answer_names = $fetch_answer->fetchColumn();
  if ($exam_q_type != "digrame") {
    if ($typeoftest == "once") {
      $check_dia_an = $connect->query("SELECT `answer` FROM $table_type_value where exam_id='$exam_id' and user_id='$user_id' and question='$questionid'");
    } else {
      $check_dia_an = $connect->query("SELECT `answer` FROM $table_type_value where exam_id='$exam_id' and user_id='$user_id' and repeat_id='$repeat_id' and question='$questionid'");
    }
    $studentAnswer = $check_dia_an->fetchColumn();
    if ($studentAnswer == $fetch_answer_names) {
      $score++;
    }
  } else if ($exam_q_type == "digrame") {
    $values = unserialize($fetch_answer_names);
    $length = count($values);
   $cLength = $cLength + $length;
    
    foreach ($values as $key => $value) {
     

      $corAns = $key;
      $corQ = $value;
      if ($typeoftest == "once") {
      $sqlss = $connect->query("SELECT count(*) FROM $table_type_value WHERE exam_id = '$exam_id' AND user_id = '$user_id' AND answer = '$corAns' AND question = '$questionid' AND options='$corQ'");
      }else{
        $sqlss = $connect->query("SELECT count(*) FROM $table_type_value WHERE exam_id = '$exam_id' AND user_id = '$user_id' AND answer = '$corAns' AND question = '$questionid' AND options='$corQ' and repeat_id='$repeat_id'");
      }
      $diQAns = $sqlss->fetchColumn();

      if ($diQAns > 0) {
        $diaScore++;
      }
    }
   
  }
}

if($diaScore > 0){
$diaPerQMarks = $dis_mark / $cLength;

$obMarks = $diaPerQMarks * $diaScore;
}else{
  $obMarks = 0;
}


$marks_got = $score * $dis_mark;

$marks_got = $marks_got + $obMarks;

   $rounded = round($marks_got);

if ($rounded >= $exam_marksmin_type) {
  $status = "pass";
} else {
  $status = "failed";
}

$updateQuery = "UPDATE test_updates SET status_end = '1',end_time=NOW(),exam_status='$status',correct_answer='$score',marks_got='$rounded' WHERE user_id = '$user_id' and exam_id='$exam_id' and repeat_id='$repeat_id'";
$statement_editor = $connect->prepare($updateQuery);
$statement_editor->execute();
if ($examFor == "course") {
  $test_value = $connect->query("SELECT ctp FROM test WHERE id = '$examName'");
  echo $test_value_name = $test_value->fetchColumn();
  $get_data = "SELECT * FROM test_data where test_id='$examName' and student_id='$user_id' and course_id='$test_value_name'";
  $get_datast = $connect->prepare($get_data);
  $get_datast->execute();

  if ($get_datast->rowCount() > 0) {
    $query = "UPDATE test_data
                    SET marks = '$rounded', status = '1' WHERE `test_id`='$examName' and student_id='$user_id' and course_id='$test_value_name'";

    $statement = $connect->prepare($query);

    $statement->execute();
  } else {
    $sql = "INSERT INTO test_data (test_id,student_id,course_id,marks,created,status,userId) VALUES ('$examName','$user_id','$test_value_name','$rounded',NOW(),'1','$user_id')";
    $statement = $connect->prepare($sql);
    $statement->execute();
  }
}


// End the session
// session_destroy();
header('Location:studentresult.php?exam_id1=' . urlencode(base64_encode($exam_id)) . '&repid=' . urlencode(base64_encode($repeat_id)) . '');
exit();
