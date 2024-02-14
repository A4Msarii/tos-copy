<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$std=$_REQUEST['std'];
$ins=$_REQUEST['inst'];
$class_name=$_REQUEST['class_name'];
$class_id=$_REQUEST['class_id'];
$g_id=$_REQUEST['g_id'];
$get_data= "SELECT * FROM notifications where user_id='$std' and type='$class_name' and data='$class_id' AND extra_data='permission grade'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();

        if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,`type`,`data`,extra_data,`date`) VALUES ('$std','$ins','$class_name','$class_id','permission grade',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                $statement->execute();
                 

            }else{
                $query="UPDATE `notifications`
                SET `is_read` = '1'
                where user_id='$std' and type='$class_name' and data='$class_id' and extra_data='permission grade'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
            }
            $get_data1= "SELECT * FROM grade_permission where grade_id='$g_id' and grade='E'";
        $get_datast1= $connect->prepare($get_data1);
        $get_datast1->execute();

        if($get_datast1->rowCount() <= 0)
            {
            $sql11 = "INSERT INTO grade_permission (grade_id,grade,`status`) VALUES ('$g_id','E','1')";
            $statement11 = $connect->prepare($sql11);
             $statement11->execute(); 
            }else{
                $query2="UPDATE `grade_permission`
                SET `status` = '1'
                where grade_id='$g_id' and grade='E'";
              
                $statement2 = $connect->prepare($query2);
    
                $statement2->execute();
            }
            $_SESSION['success'] = "Permission is Given";
		header("Location:itemsubitem.php");
?>