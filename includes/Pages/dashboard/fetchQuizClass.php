<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 


            if ($fetchuser_id != '0') {

              $fetchQuiz = $connect->query("SELECT * FROM quiz_marks WHERE course_id = '$std_course1'  AND student_id = '$fetchuser_id' ORDER BY id DESC");
              while ($quizMarksData = $fetchQuiz->fetch()) {
                $quizId = $quizMarksData['quiz_id'];
                $inId = $quizMarksData['userId'];
                $marks_quiz_q = $quizMarksData['marks'];
                $quizName = $connect->query("SELECT quiz FROM quiz WHERE id = '$quizId'");
                $quizNameData = $quizName->fetchColumn();
                $inQ = $connect->query("SELECT nickname FROM users WHERE id = '$inId'");
                $inData1 = $inQ->fetchColumn();
                if ($inData1 == "") {
                  $inData = "-";
                } else {
                  $inData = $inData1;
                }
                $class_quiz_q = "btn btn-dark";
                if ($marks_quiz_q != "") {
                  if ($marks_quiz_q <= 50 && $marks_quiz_q >= 0) {
                    $class_quiz_q = "btn btn-danger";
                  } else if ($marks_quiz_q <= 70 && $marks_quiz_q >= 51) {
                    $class_quiz_q = "btn btn-warning";
                  } else if ($marks_quiz_q <= 80 && $marks_quiz_q >= 71) {
                    $class_quiz_q = "btn btn-secondary";
                  } else if ($marks_quiz_q <= 90 && $marks_quiz_q >= 81) {
                    $class_quiz_q = "btn btn-success";
                  } else if ($marks_quiz_q <= 100 && $marks_quiz_q >= 91) {
                    $class_quiz_q = "btn btn-primary";
                  }
                }
            ?>
                <h4 id="<?php echo $quizId; ?>" name="quiz" data-bs-toggle="modal" data-bs-target="#" style="margin:5px; padding: 5px;position:relative;" class="btnFlip quizFiles" style="margin:5px; padding: 5px;">
                  <span class="legend-indicator bg-danger"></span>
                  <span class="tooltip-text" style="white-space: nowrap;"><?php echo $inData; ?></span>
                  <span style="font-weight:bold; width:5%; text-align:center; padding:5px; border-radius: 5px; color:white;" class="badge<?php echo $class_quiz_q; ?>"><?php echo $marks_quiz_q; ?></span> -
                  <a style="font-weight:bold;"><?php echo $quizNameData ?></a>

                </h4>
                <?php
              }
            }
          }
            ?>