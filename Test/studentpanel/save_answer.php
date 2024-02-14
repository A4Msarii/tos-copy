 <?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$question_id = $_REQUEST["question_id"];
$answer = $_REQUEST["answer"];
$user_id = $_REQUEST["userid"];
$exam_id = $_REQUEST["exam_id"];
$unique_id = $_REQUEST["repeat_id"];
$type = $_REQUEST["type"];
if ($type == "other") {
    if ($unique_id == 0) {
        $sql = "SELECT count(*) FROM `exam_answers_once_test` WHERE question='$question_id' and user_id='$user_id' and exam_id='$exam_id'";
        $result = $connect->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        if ($number_of_rows == 0) {
            $query_phase = "INSERT INTO exam_answers_once_test (question,user_id,answer,exam_id,countAttempts) VALUES ('$question_id','$user_id','$answer','$exam_id','1')";
            $statement_phase = $connect->prepare($query_phase);
            $statement_phase->execute();
        } else {
            $query_ad = "UPDATE `exam_answers_once_test`
    SET `answer` = '$answer',countAttempts = countAttempts + 1 WHERE `question`='$question_id' and `user_id`='$user_id' and exam_id='$exam_id'";
            $statement_ad = $connect->prepare($query_ad);
            $statement_ad->execute();
        }
    } else {
        $sql = "SELECT count(*) FROM `exam_answers_repeat_test` WHERE question='$question_id' and user_id='$user_id' and exam_id='$exam_id' and repeat_id='$unique_id'";
        $result = $connect->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        if ($number_of_rows == 0) {
            $query_phase = "INSERT INTO exam_answers_repeat_test (question,user_id,answer,exam_id,repeat_id,countAttempts) VALUES ('$question_id','$user_id','$answer','$exam_id','$unique_id','1')";
            $statement_phase = $connect->prepare($query_phase);
            $statement_phase->execute();
        } else {
            $query_ad = "UPDATE `exam_answers_repeat_test`
            SET `answer` = '$answer',countAttempts = countAttempts + 1 WHERE `question`='$question_id' and `user_id`='$user_id' and exam_id='$exam_id' and repeat_id='$unique_id'";
            $statement_ad = $connect->prepare($query_ad);
            $statement_ad->execute();
        }
    }
} else {
    $suboption1 = $_REQUEST["suboption1"];
    if ($unique_id == 0) {
        $sql = "SELECT count(*) FROM `exam_answers_once_test` WHERE question='$question_id' and user_id='$user_id' and exam_id='$exam_id' and options='$suboption1'";
        $result = $connect->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        if ($number_of_rows == 0) {
            $query_phase = "INSERT INTO exam_answers_once_test (question,user_id,answer,exam_id,options) VALUES ('$question_id','$user_id','$answer','$exam_id','$suboption1')";
            $statement_phase = $connect->prepare($query_phase);
            $statement_phase->execute();
        } else {
            $query_ad = "UPDATE `exam_answers_once_test`
        SET `answer` = '$answer' WHERE `question`='$question_id' and `user_id`='$user_id' and exam_id='$exam_id' and options='$suboption1'";
            $statement_ad = $connect->prepare($query_ad);
            $statement_ad->execute();
        }
    } else {
        $sql = "SELECT count(*) FROM `exam_answers_repeat_test` WHERE question='$question_id' and user_id='$user_id' and exam_id='$exam_id' and repeat_id='$unique_id' and options='$suboption1'";
        $result = $connect->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        if ($number_of_rows == 0) {
            $query_phase = "INSERT INTO exam_answers_repeat_test (question,user_id,answer,exam_id,repeat_id,options) VALUES ('$question_id','$user_id','$answer','$exam_id','$unique_id','$suboption1')";
            $statement_phase = $connect->prepare($query_phase);
            $statement_phase->execute();
        } else {
            $query_ad = "UPDATE `exam_answers_repeat_test`
                SET `answer` = '$answer' WHERE `question`='$question_id' and `user_id`='$user_id' and exam_id='$exam_id' and repeat_id='$unique_id' and options='$suboption1'";
            $statement_ad = $connect->prepare($query_ad);
            $statement_ad->execute();
        }
    }
}

$fetchQuetionId = $connect->query("SELECT question_id FROM  exam_question_ist WHERE id = '$question_id'");
$questionId = $fetchQuetionId->fetchColumn();

$fetchType = $connect->query("SELECT type FROM exam_question WHERE id = '$questionId'");
if($fetchType->fetchColumn() == "mcq"){
    $questionDetailQ = $connect->query("SELECT count(*) FROM exam_question WHERE id = '$questionId' AND correst_answer = '$answer'");
    // print_r($questionDetailQ);
    echo $questionDetailQ->fetchColumn();
}



