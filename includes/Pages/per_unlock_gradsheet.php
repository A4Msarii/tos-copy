<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$session_id=$_REQUEST['session_id'];
$class_name=$_REQUEST['class_name'];
$class_id=$_REQUEST['class_id'];
$for_unlock=$_REQUEST['for_unlock'];
$get_data= "SELECT * FROM notifications where user_id='$session_id' and type='$class_name' and data='$class_id' AND to_userid='$for_unlock' AND extra_data='admin'";
echo $get_data;       
$get_datast= $connect->prepare($get_data);
        $get_datast->execute();
var_dump($get_datast->rowCount() <= 0);
        if($get_datast->rowCount() <= 0)
            {
    $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data) VALUES ('$session_id','$for_unlock','$class_name','$class_id','admin')";
$statement = $connect->prepare($sql);
$statement->execute();
            }else{
                $query="UPDATE `notifications`
                SET `is_read`='0',permission='0',`to_userid`='$for_unlock'
                where user_id='$session_id' and type='$class_name' and data='$class_id'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
            }
?>