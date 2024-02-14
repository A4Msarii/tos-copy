<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $asking_id=$_REQUEST['ins'];
 $asking_for_id=$_REQUEST['std'];
 $class_name=$_REQUEST['class_name'];
 $class_id=$_REQUEST['class_id'];

$get_data= "SELECT * FROM notifications where user_id='$asking_for_id' and type='$class_name' and data='$class_id' AND extra_data='requesting to unlock'";

        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();

        if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,if_admin,type,data,extra_data,date) VALUES ('$asking_for_id','$asking_id','super admin','$class_name','$class_id','requesting to unlock',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                $statement->execute();
                 echo "admin will get notified.";

            }else{
                $query="UPDATE `notifications`
                SET `to_userid` = '$asking_id',is_read='0'
                where user_id='$asking_for_id' and type='$class_name' and data='$class_id' and extra_data='requesting to unlock'";
             
                $statement = $connect->prepare($query);
    
                $statement->execute();
                echo "admin will get notified.";
            }
?>