<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$userid=$_REQUEST['userid'];
$role=$_REQUEST['role'];
$roleid=$_REQUEST['roleid'];
 $accpt=$_REQUEST['accpt'];
 $decline=$_REQUEST['decline'];
 if(isset($accpt)){
    foreach($userid as $userids=>$key){
 $roles=$role[$userids];
 $roleids=$roleid[$userids];
    $query_ad = "UPDATE users SET role = '$roles' WHERE id='$key'";
    $statement_ad = $connect->prepare($query_ad);
    $statement_ad->execute();
    $query_ac ="INSERT INTO role_updated_request (userid,role,accept_decline) VALUES ('$key','$roleids','1')";
    $statement_ac = $connect->prepare($query_ac);
    $statement_ac->execute();
    }
    $_SESSION['success'] = "role changed  successfully";
 }
 if(isset($decline)){
    foreach($userid as $userids=>$key){
        
$roleids=$roleid[$userids]; 
   $query_ac ="INSERT INTO role_updated_request (userid,role,accept_decline) VALUES ('$key','$roleids','0')";
    $statement_ac = $connect->prepare($query_ac);
    $statement_ac->execute();
    }
    $_SESSION['danger'] = "role changed decline";
 }
 header('Location:role_noti_chage.php');
?>