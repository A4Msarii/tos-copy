<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$std=$_REQUEST['std'];
$ins=$_REQUEST['inst'];
$class_name=$_REQUEST['class_name'];
$class_id=$_REQUEST['class_id'];
$clone_id=$_REQUEST['cl_id'];
$get_data= "SELECT * FROM notifications where user_id='$std' and type='$class_name' and data='$class_id' AND extra_data='requesting to grade clone' and permission='$clone_id'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();

        if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,if_admin,`type`,`data`,extra_data,permission,date) VALUES ('$std','$ins','super admin','$class_name','$class_id','requesting to grade clone','$clone_id',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                $statement->execute();
                 echo "admin will get notified.";

            }else{
                $query="UPDATE `notifications`
                SET `to_userid` = '$ins'
                where user_id='$std' and type='$class_name' and data='$class_id' and extra_data='requesting to grade clone' and permission='$clone_id'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
                echo "already notified.";
            }
?>