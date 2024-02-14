<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
 $ex_idid=$_REQUEST['id'];
 $query = $connect->prepare("SELECT * FROM examname WHERE id = :exam_ides");
    $query->bindParam(':exam_ides', $ex_idid);
    $query->execute();

    $row = $query->fetch(PDO::FETCH_ASSOC);
    $examFor = $row['examFor'];
    $coursed_ided=$row['course_id'];$dep_id=$row['dep_id'];
 if($examFor =="course"){
    $sql = "SELECT CourseName, CourseCode FROM newcourse WHERE Courseid = :course_id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':course_id', $coursed_ided, PDO::PARAM_INT);
    $stmt->execute();
    $result1333 = $stmt->fetch(PDO::FETCH_ASSOC);
   if ($result1333) {
        $CourseNamess=$result1333['CourseName'];
        $CourseCodess=$result1333['CourseCode'];
   }
   $queryss = "SELECT StudentNames as student_name FROM `newcourse` WHERE CourseName ='$CourseNamess' and CourseCode='$CourseCodess'";
  
  }else if($examFor=="par"){
    $queryss = "SELECT examSubject as student_name FROM `studentexam` WHERE examId ='$ex_idid'";
   
  }else if($examFor=="dep"){
    $queryss = "SELECT userId as student_name FROM `userdepartment` WHERE departmentId ='$dep_id'";
   
  }else if($examFor=="everyone"){
    $queryss = "SELECT id as student_name FROM `users` WHERE `role`!='super admin'";
    
  }else{
    $examName = $connect->query("SELECT roles FROM roles WHERE id = '$examFor'");
   $examNameData = $examName->fetchColumn();
   $queryss = "SELECT id as student_name FROM `users` WHERE `role`='$examNameData'";
 
  }
  
   $resultss = $connect->query($queryss);
   $sn_v=1;
  if ($resultss) {
 foreach ($resultss as $rowss) {
    $u_ides_da=$rowss['student_name'];
    $sql = "INSERT INTO notifications (user_id,to_userid,`data`,extra_data,date) VALUES ('$u_ides_da','$u_ides_da','$ex_idid','test scheduled',CURRENT_TIMESTAMP)";

    $statement = $connect->prepare($sql);

    $statement->execute();

 }
}
$_SESSION['success'] = "Notification Send Successfully";
 header('Location:managetest.php');
?>