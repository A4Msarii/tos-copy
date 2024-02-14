<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

$ins=$_POST['ins'];
$std=$_POST['std'];
$class_name=$_POST['class_name'];
$class_id=$_POST['class_id'];
$cloned_id=$_POST['cloned_id'];
$get_data= "SELECT * FROM notifications where user_id='$std' and type='$class_name' and data='$class_id' AND extra_data='cloned_gradsheet' and permission='$cloned_id'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();
 
         if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,permission,date) VALUES ('$std','$ins','$class_name','$class_id','cloned_gradsheet','$cloned_id',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                 $statement->execute();

            }else{
                $query="UPDATE `notifications`
                SET `to_userid` = '$ins'
                where user_id='$std' and type='$class_name' and data='$class_id' and extra_data='cloned_gradsheet' and permission='$cloned_id'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
            }
           // echo $error="<div class='alert alert-success'>Instructor added successfully..</div>";
?>