<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $session_id=$_REQUEST['session_id'];
 $to_user=$_REQUEST['get_id_select'];
 $get_message=$_REQUEST['get_message'];
 $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,date) VALUES('$session_id','$to_user','message','0','$get_message',CURRENT_TIMESTAMP)";

 $statement = $connect->prepare($sql);
$statement->execute();
$query1 ="INSERT INTO meesages(from_id,to_id,message,date) VALUES ('$session_id','$to_user','$get_message',CURRENT_TIMESTAMP())";
$statement1 = $connect->prepare($query1);
$statement1->execute();
$_SESSION['success'] = "Message Sent Successfully";
								header("Location:home.php");

?>