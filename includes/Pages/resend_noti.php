<?php
   include('../../includes/config.php');
   include(ROOT_PATH.'includes/connect.php');
   session_start();
 $noti=$_REQUEST['noti_id'];
 $query="UPDATE `notifications`
 SET `is_read` = '0'
 WHERE `id`='$noti'";
 
 $statement = $connect->prepare($query);
 
 $statement->execute();
 $_SESSION['success'] = "Notification Resend";
								header("Location:CAP.php");
?>