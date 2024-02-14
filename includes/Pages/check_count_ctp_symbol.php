<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$sym=$_REQUEST['id'];
$unique_id=1;
$check_course_code= "SELECT max(`CourseCode`) as id_count FROM `newcourse` WHERE `CourseName`='$sym'";
//var_dump($check_course_code);
$check_course_codest = $connect->prepare($check_course_code);
$check_course_codest->execute();
if($check_course_codest->rowCount() > 0)
  {
      $re = $check_course_codest->fetchAll();
    foreach($re as $get_all)
      {
        $unique_id=$get_all['id_count'];
        $unique_id+=1;
        echo $unique_id;
      }
  }else{
    echo $unique_id;
  }
?>