<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $type=$_REQUEST['id'];
 $data_id=$_REQUEST['values'];
  $std_id=$_REQUEST['std_id'];
 $gr_id=$_REQUEST['grad_id'];

 $sql_add = "INSERT INTO additional_task(Item,gradesheet_id,Stud_id,type,clone_id) VALUES ('$data_id','$gr_id','$std_id','$type',NULL)";

 $statement_add = $connect->prepare($sql_add);

  $statement_add->execute();
?>