<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$group_id=$_REQUEST['coid'];
$student=$_REQUEST['stid'];

if(empty($student)){
    $_SESSION['danger'] = "Student Are Blank";
    
 header("Location:add_group.php");
}else{
foreach($student as $students){
    $query_type ="INSERT INTO group_student_scheduling (std_id,group_id) VALUES ('$students','$group_id')";
			$statement_type = $connect->prepare($query_type);
			$statement_type->execute();
}
$_SESSION['success'] = "Student Added";
 header("Location:add_group.php");
}
?>