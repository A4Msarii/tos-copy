<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$user_id = $_REQUEST['sesid'];
$role=$_REQUEST['role'];


$get_data= "SELECT * FROM notifications where user_id='$user_id' and to_userid='$user_id' and  if_admin='super admin' and data='$role' AND extra_data='ask for role change'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();
 
         if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,if_admin,data,extra_data,date) VALUES ('$user_id','$user_id','super admin','$role','ask for role change',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                 $statement->execute();
                 $_SESSION['success'] = "Notification send";
            }else{
                $query="UPDATE `notifications`
                SET `is_read` = '1'
                where user_id='$user_id' and `to_userid` = '$user_id' and `data`='$role' and extra_data='ask for role change'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
                $_SESSION['success'] = "Notification aleady send";
            }
            header('Location: profile.php');
          
?>