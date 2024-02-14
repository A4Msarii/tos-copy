<?php
   include('../../includes/config.php');
   include(ROOT_PATH.'includes/connect.php');
   session_start();
$noti=$_REQUEST['noti_id'];
$query_cat_warning = "SELECT * FROM notifications where id='$noti'";
$statement_cat_warning = $connect->prepare($query_cat_warning);
$statement_cat_warning->execute();
$result_cat_warning = $statement_cat_warning->fetchAll();
foreach ($result_cat_warning as $row_cat) {
   $extra_data=$row_cat['extra_data'];
 
   $data=$row_cat['data'];
   $user_id=$row_cat['user_id'];
  echo $query = "DELETE FROM notifications WHERE extra_data='$extra_data' and data=$data and user_id=$user_id";
   $statement = $connect->prepare($query);
   $statement->execute();
   $query = "DELETE FROM notifications WHERE extra_data='threshold' and data=$data and user_id=$user_id";
   $statement = $connect->prepare($query);
   $statement->execute();
}
 $query = "DELETE FROM notifications WHERE id='$noti'";
 $statement = $connect->prepare($query);
  $statement->execute();
  $_SESSION['danger'] = "Notification Deleted";

								header("Location:CAP.php");
?>