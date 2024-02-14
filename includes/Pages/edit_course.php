<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
  $id=$_POST['Crsid'];
  $Course_Name=$_POST['Course_Name'];
  $Course_Date=$_POST['Course_Date'];
  $Course_Code=$_POST['Course_Code'];
  $Nick_name=$_POST['Nick_name'];
 $Student_Names=$_POST['Student_Names'];
  $Course_Manager=$_POST['Course_Manager'];

 if(!$Student_Names){
$_SESSION['warning'] = "No Student Was Selected";
header('Location:usersinfo.php');
 }
   
 if(isset($Student_Names)){
 foreach($Student_Names as $chk1)  
    {
       echo $sql = "INSERT INTO newcourse (CourseName,nick_name,CourseDate,CourseCode,StudentNames,CourseManager)
       VALUES ('$Course_Name','$Nick_name','$Course_Date','$Course_Code','$chk1','$Course_Manager')";
       $statement = $connect->prepare($sql);
       $statement->execute();
       
    } 
  }else{
    $query="UPDATE `newcourse`
    SET `CourseDate` = '$Course_Date',`nick_name` = '$Nick_name',`CourseManager`='$Course_Manager'
    WHERE `CourseCode`='$Course_Code' and CourseName='$Course_Name'";
    $statement = $connect->prepare($query);
    $statement->execute();
  }
$_SESSION['success'] = "Course Edited Successfully";

header('Location:course_list.php');
?>