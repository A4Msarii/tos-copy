<?php 

  include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
echo $cat=$_POST['cat'];
echo $cat_data=$_POST['cat_data'];
echo $warId=$_POST['warId'];
echo $u_id=$_POST['u_id'];
$get_data= "SELECT * FROM notifications where user_id='$u_id' and data='$warId' AND extra_data='reached_cout'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();
 
         if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,`data`,extra_data,class_id,class_name,date) VALUES ('$u_id','$u_id','$warId','reached_cout','$cat_data','$cat',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                $statement->execute();
               
            }else{
                $query="UPDATE `notifications`
                SET `data` = '$warId',class_id'='$cat_data',class_name='$cat'
                where user_id='$std' and type='$class_name' and data='$class_id' and extra_data='reached_cout'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
              
            }

?>