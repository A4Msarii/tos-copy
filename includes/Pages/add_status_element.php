<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php'); 
   $id=$_REQUEST['id'];
   $values=$_REQUEST['values'];

   $sql_add="UPDATE $values
   SET `status`='1'
   WHERE `id`='$id'";
 $sql_add;
 $statement_add = $connect->prepare($sql_add);

 $statement_add->execute();
?>