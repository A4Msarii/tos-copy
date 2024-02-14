<?php 
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $Instructor=$_REQUEST['Instructor'];
$login_id=$_REQUEST['login_id'];
$aced_id=$_REQUEST['aced_id'];
$get_data= "SELECT * FROM notifications where user_id='$login_id' AND type='academic' AND data='$aced_id'";
      
$get_datast= $connect->prepare($get_data);
        $get_datast->execute();
var_dump($get_datast->rowCount() == 0);
        if($get_datast->rowCount() == 0)
            {
$sql = "INSERT INTO notifications(user_id,to_userid,type,data,extra_data,date) VALUES ('$login_id','$Instructor','academic','$aced_id','has request you to give acedemic for',CURRENT_TIMESTAMP)";
$statement = $connect->prepare($sql);
                  $statement->execute();
                          $_SESSION['success'] = "Instructor will get Notified";
                          header('location:academic.php');

							
            }else{
                
                $query="UPDATE `notifications`
                SET `to_userid` = '$Instructor'
                WHERE user_id='$login_id' AND type='academic' AND data='$aced_id'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
                
                $_SESSION['success'] = "Instructor is updated, instructor will get notified..";
              header('location:academic.php');
            }
        ?>