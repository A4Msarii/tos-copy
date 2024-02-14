<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['addExam'])) {

    $exam_for = $_REQUEST['exam_for'];
    $exam_name = $_REQUEST['exam_name'];
    $question_number = $_REQUEST['question_number'];
    // $examSub = $_REQUEST['examSub'];
    $course_id = $_REQUEST['course_id'];
    $exam_names = $_REQUEST['exam_names'];
    $endtimings = $_REQUEST['endtimings'];
    $starttimings = $_REQUEST['starttimings'];
    $marks_type = $_REQUEST['marks_type'];
    $exam_marks = $_REQUEST['exam_marks'];
    // $examSubPer = $_REQUEST['examSubPer'];
    // $examType = $_REQUEST['examType'];
    $total_marks = $_REQUEST['total_marks'];
    // $examTypePer = $_REQUEST['examTypePer'];
    $percentageEasy = $_REQUEST['percentageEasy'];
    $percentageMedium = $_REQUEST['percentageMedium'];
    $percentageHard = $_REQUEST['percentagehard'];
    $percentageveryhard = $_REQUEST['percentageveryhard'];
    $exam_Types = $_REQUEST['exam_Types'];
    $code = $_REQUEST['code'];
    $passing_marks = $_REQUEST['passing_marks'];
    $exam_dep = $_REQUEST['exam_dep'];
    $dates = $_REQUEST['dates'];
    $question_id = $_REQUEST['question_id'];
    $student = $_REQUEST['student'];
    $location = $_REQUEST['location'];
    $type_Exam = $_REQUEST['type_Exam'];
    echo $end_dates = $_REQUEST['end_dates'];
    $type_reult = $_REQUEST['type_reult'];
    $randomCode = $_REQUEST['randomCode'];
    $attempts= $_REQUEST['attempts'];

    if ($exam_for == "course") {
        $code = "yes";
    }


    if ($exam_for == "course") {
        $query = "INSERT INTO examname (examFor,examName,course_id,questionNumber,percentageEasy,percentageMedium,percentageHard,percentageveryhard,exam_Types,passing_marks,exam_type,result_hide_show,total_marks,marks_type,start_hours,end_hours,dates,date,end_date,location,code,exam_created_type,attempts) VALUES ('$exam_for','$exam_names','$course_id','$question_number','$percentageEasy','$percentageMedium','$percentageHard','$percentageveryhard','$exam_Types','$passing_marks','$type_Exam','$type_reult','$total_marks','$marks_type','$starttimings','$endtimings','$dates',NOW(),'$end_dates','$location','$code','manual','$attempts')";
    } else if ($exam_for == "dep") {
        $query = "INSERT INTO examname (examFor,dep_id,examName,questionNumber,percentageEasy,percentageMedium,percentageHard,percentageveryhard,exam_Types,passing_marks,exam_type,result_hide_show,total_marks,marks_type,start_hours,end_hours,dates,date,end_date,location,code,exam_created_type,attempts) VALUES ('$exam_for','$exam_dep','$exam_name','$question_number','$percentageEasy','$percentageMedium','$percentageHard','$percentageveryhard','$exam_Types','$passing_marks','$type_Exam','$type_reult','$total_marks','$marks_type','$starttimings','$endtimings','$dates',NOW(),'$end_dates','$location','$code','manual','$attempts')";
    } else {
         echo $query = "INSERT INTO examname (examFor,examName,questionNumber,percentageEasy,percentageMedium,percentageHard,percentageveryhard,exam_Types,passing_marks,exam_type,result_hide_show,total_marks,marks_type,start_hours,end_hours,dates,date,end_date,location,code,exam_created_type,attempts) VALUES ('$exam_for','$exam_name','$question_number','$percentageEasy','$percentageMedium','$percentageHard','$percentageveryhard','$exam_Types','$passing_marks','$type_Exam','$type_reult','$total_marks','$marks_type','$starttimings','$endtimings','$dates',NOW(),'$end_dates','$location','$code','manual','$attempts')";
    }

    $stmt = $connect->prepare($query);
    $stmt->execute();

    $lastQ = $connect->query("SELECT id FROM examname ORDER BY id DESC LIMIT 1");
    $lastId = $lastQ->fetchColumn();


    //    foreach($examType as $name1=>$examTypes){
    //      $examTypePer1 = $examTypePer[$name1];
    //         $query = "INSERT INTO examtype (examId,examType,examTypePercentage) VALUES ('$lastId','$examTypes','$examTypePer1')";
    //         $stmt = $connect->prepare($query);
    //         $stmt->execute();

    //     }

    foreach ($question_id as $question_ids) {
        if ($code == "yes") {
            $query = "INSERT INTO exam_question_ist (question_id,exam_id,code) VALUES ('$question_ids','$lastId','$randomCode')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        } else {
            $query = "INSERT INTO exam_question_ist (question_id,exam_id) VALUES ('$question_ids','$lastId')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }
    }
    if (isset($student)) {
        foreach ($student as $students) {

            $query = "INSERT INTO studentexam (examId,examSubject) VALUES ('$lastId','$students')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }
    }
    $_SESSION['success'] = "Exam Created Successfully";
    header("Location:managetest.php");
}
