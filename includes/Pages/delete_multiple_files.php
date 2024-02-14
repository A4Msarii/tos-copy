<?php 
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
  $values=$_POST['values'];
  $id=$_POST['id'];
 
  $sql = "DELETE FROM user_files WHERE id='$values'";

$statement = $connect->prepare($sql);
$statement->execute();

?>