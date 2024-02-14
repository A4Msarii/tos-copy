<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$clone_class=$_REQUEST['clone_class'];

$student_id=$_REQUEST['student_id'];
$class=$_REQUEST['class'];

var_dump($clone_class);
foreach($clone_class as $clone_classes){
    $unique_id=1;
    $check_id_code = "SELECT max(`id`) as id,max(`cloned_id`) as max_id FROM clone_class WHERE std_id='$student_id' and class_name='$class' and class_id='$clone_classes'";
    $check_id_code_prepare = $connect->prepare($check_id_code);
                 $re = $connect->query($check_id_code);
                 $get_all = $re->fetch(PDO::FETCH_ASSOC);
               
           $unique_id1=$get_all['max_id'];
              if($unique_id1!=""){
               $unique_id1+=1;
              $unique_id=$unique_id1;
              }else{
               $unique_id=1;
              }
    $query ="INSERT into clone_class(class_id,std_id,class_name,cloned_id) values('$clone_classes','$student_id','$class','$unique_id')";
    $statement = $connect->prepare($query);
     $statement->execute();
}
$_SESSION['success'] = "Gradsheet Cloned";
header('Location:testing.php');
?>