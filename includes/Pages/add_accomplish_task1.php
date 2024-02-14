<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php'); 
   $type=$_REQUEST['id'];
   $data_id=$_REQUEST['values'];
  $std_id=$_REQUEST['std_id'];
   $gr_id=$_REQUEST['grad_id'];
   $get_clone_ides_val=$_REQUEST['get_clone_ides_val'];
 $sql_add = "INSERT INTO accomplish_task(Item_ac,gradsheet_id,Stud_ac,Type,clone_id) VALUES ('$data_id','$gr_id','$std_id','$type','$get_clone_ides_val')";

 $statement_add = $connect->prepare($sql_add);

 $statement_add->execute();
?>