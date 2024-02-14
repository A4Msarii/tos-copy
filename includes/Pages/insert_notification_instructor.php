<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

$ins=$_REQUEST['ins'];
$std=$_REQUEST['std'];
$class_name=$_REQUEST['class_name'];
$class_id=$_REQUEST['class_id'];
$get_data= "SELECT * FROM notifications where user_id='$std' and type='$class_name' and data='$class_id' AND extra_data='is selected to fill gradsheet of'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();
 
         if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,`type`,`data`,extra_data,date) VALUES ('$std','$ins','$class_name','$class_id','is selected to fill gradsheet of',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                $statement->execute();
               
            }else{
                $query="UPDATE `notifications`
                SET `to_userid` = '$ins'
                where user_id='$std' and type='$class_name' and data='$class_id' and extra_data='is selected to fill gradsheet of'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
              
            }
             echo "success";
           // echo $error="<div class='alert alert-success'>Instructor added successfully..</div>";
?>