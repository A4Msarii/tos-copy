<?php 
  include('../../includes/config.php');
  include(ROOT_PATH.'includes/connect.php');
  session_start();
echo $instructor_id=$_REQUEST['instructor_id'];
echo $vechile_id=$_REQUEST['vechile_id'];
echo $time=$_REQUEST['time'];
echo $date=$_REQUEST['date'];
$stud_db_id=$_REQUEST['st_id'];
$class_id=$_REQUEST['cl_id'];
$course_id=$_REQUEST['co_id'];
$phases_id=$_REQUEST['ph_id'];
$class_name=$_REQUEST['cl_na'];
$clo_id=$_REQUEST['clo_id'];
$duration_hours = $_REQUEST['duration_hours'];

$duration_minutes = $_REQUEST['duration_minutes'];
$get_data= "SELECT * FROM cloned_gradesheet where user_id='$stud_db_id' AND phase_id='$phases_id' AND course_id='$course_id' AND class_id='$class_id' AND class='$class_name' and cloned_id='$clo_id'";
$get_datast= $connect->prepare($get_data);
$get_datast->execute();
var_dump($get_datast->rowCount() == 0);
if($get_datast->rowCount() == 0)
{
$sql1 = "INSERT INTO cloned_gradesheet (user_id,phase_id,course_id,class_id,class,instructor,vehicle,time,date,duration_hours,duration_min,cloned_id)
VALUES ('$stud_db_id','$phases_id','$course_id','$class_id','$class_name','$instructor_id','$vechile_id','$time','$date','$duration_hours','$duration_minutes','$clo_id')";
  $statement1 = $connect->prepare($sql1);
  $statement1->execute(); 
}else{
  $query="UPDATE `cloned_gradesheet`
  SET `instructor`='$instructor_id',`vehicle`='$vechile_id',`time`='$time',`date`='$date',duration_hours='$duration_hours',duration_min='$duration_minutes'
  WHERE user_id='$stud_db_id' AND phase_id='$phases_id' AND course_id='$course_id' AND class_id='$class_id' AND class='$class_name' and cloned_id='$clo_id'";
  echo $query;
  $statement = $connect->prepare($query);
   $statement->execute();
}
$get_data= "SELECT * FROM notifications where user_id='$stud_db_id' and type='$class_name' and data='$class_id' AND extra_data='cloned_gradsheet' and permission='$clo_id'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();
 
         if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,permission,date) VALUES ('$stud_db_id','$instructor_id','$class_name','$class_id','cloned_gradsheet','$clo_id',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                 $statement->execute();

            }else{
                $query="UPDATE `notifications`
                SET `to_userid` = '$instructor_id'
                where user_id='$stud_db_id' and type='$class_name' and data='$class_id' and extra_data='cloned_gradsheet' and permission='$clo_id'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
            }
$_SESSION['success'] = "Data Filled Successfully";
header("location: newgradesheetcl.php"); 
?>