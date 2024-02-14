<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$old_pass=$_REQUEST['old_pass'];
$old_pass=md5($old_pass);
 $new_pass=$_REQUEST['new_pass'];
 $new_pass=md5($new_pass);
 $re_pass=$_REQUEST['re_pass'];
 $id=$_REQUEST['sess_id'];
$q="SELECT * from users where id='$id' and password='$old_pass'";
$statement = $connect->prepare($q);
$statement->execute();

   if($statement->rowCount() > 0)
{

    $query="UPDATE `users`
    SET `password` = '$new_pass'
    WHERE `id`='$id'";
   
    $statement = $connect->prepare($query);
    
                $statement->execute();
                echo "Password Change Successfully";
    
}else{
    echo "Incorrect Old Password";
}
?>