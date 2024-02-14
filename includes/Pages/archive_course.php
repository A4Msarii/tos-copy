<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$coursecode=$_REQUEST['coursecode'];
$coursename=$_REQUEST['coursename'];

 $query1_cs = "SELECT * FROM newcourse where CourseCode='$coursecode' and CourseName='$coursename'";
$statement1_cs = $connect->prepare($query1_cs);
$statement1_cs->execute();
if ($statement1_cs->rowCount() > 0) {
  $result1_cs = $statement1_cs->fetchAll();
 foreach ($result1_cs as $row1) {
       $query1 ="INSERT INTO archivecourse (Courseid,CourseName,nick_name,CourseDate,CourseCode,StudentNames,CourseManager,file_name,	Instructor,value_enter,departmentId) VALUES ('".$row1['Courseid']."','".$row1['CourseName']."','".$row1['nick_name']."','".$row1['CourseDate']."','".$row1['CourseCode']."','".$row1['StudentNames']."','".$row1['CourseManager']."','".$row1['file_name']."','".$row1['Instructor']."','".$row1['value_enter']."','".$row1['departmentId']."')";
		$statement1 = $connect->prepare($query1);
		$statement1->execute();
     
  }
  $sql1 = "DELETE FROM newcourse WHERE CourseCode='$coursecode' and CourseName='$coursename'";
  $statement1 = $connect->prepare($sql1);
  $statement1->execute();
}
?>