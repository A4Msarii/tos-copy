<?php 

    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $ide=$_REQUEST['id'];
 $std=$_REQUEST['std'];
$class_table=$_REQUEST['class_table'];
$class_cl=$_REQUEST['class_cl'];
$clone_id=$_REQUEST['clone_id'];
foreach($ide as $id){
$query_ac ="INSERT INTO clearance_student_id (clearance_id,stud_id,class_id,class_table,clone_cid) VALUES ('$id','$std','$class_cl','$class_table','$clone_id')";
$statement_ac = $connect->prepare($query_ac);
$statement_ac->execute();
} 
// $_SESSION['success'] = "clearnace Inserted Successfully";
// header("Location:itemsubitem.php");
?>