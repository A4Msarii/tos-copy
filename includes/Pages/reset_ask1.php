<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $asking_id=$_REQUEST['session_id'];
 $asking_for_id=$_REQUEST['for_unlock'];
 $class_name=$_REQUEST['class_name'];
 $class_id=$_REQUEST['class_id'];
$get_clone_ides=$_REQUEST['get_clone_ides'];
$get_data= "SELECT * FROM notifications where user_id='$asking_for_id' and type='$class_name' and data='$class_id' AND extra_data='requesting to reset clone'";

        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();

        if($get_datast->rowCount() <= 0)
            {
                 $sql = "INSERT INTO notifications (user_id,to_userid,if_admin,type,data,extra_data,permission,date) VALUES ('$asking_for_id','$asking_id','super admin','$class_name','$class_id','requesting to reset clone','$get_clone_ides',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                $statement->execute();
               

            }else{
                $query="UPDATE `notifications`
                SET `to_userid` = '$asking_id',is_read='0'
                where user_id='$asking_for_id' and type='$class_name' and data='$class_id' and extra_data='requesting to reset clone',permission='$get_clone_ides'";
             
                $statement = $connect->prepare($query);
    
                $statement->execute();
           
            }
            $_SESSION['success'] = "Notification Send Successfully";
            header('Location:newgradesheetcl.php');
?>