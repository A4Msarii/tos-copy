<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$std=$_REQUEST['std'];
$ins=$_REQUEST['inst'];
$class_name=$_REQUEST['class_name'];
$class_id=$_REQUEST['class_id'];
$g_id=$_REQUEST['g_id'];
$clone_id=$_REQUEST['clone_id'];
$get_data= "SELECT * FROM notifications where user_id='$std' and type='$class_name' and data='$class_id' AND extra_data='permission grade clone' and permission='$clone_id'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();

        if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,`type`,`data`,extra_data,`date`,`permission`) VALUES ('$std','$ins','$class_name','$class_id','permission grade clone',CURRENT_TIMESTAMP,'$clone_id')";

                $statement = $connect->prepare($sql);

                $statement->execute();
                 

            }else{
                $query="UPDATE `notifications`
                SET `is_read` = '0'
                where user_id='$std' and type='$class_name' and data='$class_id' and extra_data='permission grade clone' and permission='$clone_id'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
            }
            $get_data1= "SELECT * FROM grade_permission_clone where grade_id='$g_id' and grade='E' and clone_id='$clone_id'";
        $get_datast1= $connect->prepare($get_data1);
        $get_datast1->execute();

        if($get_datast1->rowCount() <= 0)
            {
            $sql11 = "INSERT INTO grade_permission_clone (grade_id,grade,`status`,`clone_id`) VALUES ('$g_id','E','1','$clone_id')";
            $statement11 = $connect->prepare($sql11);
             $statement11->execute(); 
            }else{
                $query2="UPDATE `grade_permission_clone`
                SET `status` = '1'
                where grade_id='$g_id' and grade='E' and clone_id='$clone_id'";
              
                $statement2 = $connect->prepare($query2);
    
                $statement2->execute();
            }
            $_SESSION['success'] = "Permission is Given";
		header("Location:itemsubitemcl.php");
?>