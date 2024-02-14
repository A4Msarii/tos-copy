<?php 
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $std_id=$_REQUEST['std_id'];
echo $marks=$_REQUEST['marks'];
echo $course_id=$_REQUEST['course_id'];
        $get_data= "SELECT * FROM quiz_marks where student_id='$std_id' and course_id='$course_id'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();
 
         if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO quiz_marks(student_id,marks,course_id) VALUES ('$std_id','$marks','$course_id')";
                $statement1 = $connect->prepare($sql);
                $statement1->execute();
               $_SESSION['success'] = "Quiz Mark Added Successfully";
                header("Location:evaluation.php");
            }else{
                $query="UPDATE `quiz_marks`
                SET `marks` = '$marks'
                where student_id='$std_id' and course_id='$course_id'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
                $_SESSION['success'] = "Quiz Mark Updated Successfully";
 
            header("Location:evaluation.php");
            }
            
?>
