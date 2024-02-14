<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$userid=$_REQUEST['userid'];
$cloned_id_value=$_REQUEST['cloned_id_value'];
$sql1 = "SELECT * FROM clone_class WHERE id='$cloned_id_value'";
$sql1_prepare = $connect->prepare($sql1);
$result1 = $connect->query($sql1);
$datas = $result1->fetch(PDO::FETCH_ASSOC);
echo $class_name=$datas['class_name'];
echo $class_id=$datas['class_id'];
echo $std=$datas['std_id'];
$get_data= "SELECT * FROM notifications where user_id='$std' and type='$class_name' and data='$class_id' AND extra_data='cloned delete ask'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();
 
         if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO notifications (user_id,to_userid,if_admin,type,data,extra_data,date) VALUES ('$std','$userid','super admin','$class_name','$class_id','cloned delete ask',CURRENT_TIMESTAMP)";

                $statement = $connect->prepare($sql);

                $statement->execute();
            }else{
                $query="UPDATE `notifications`
                SET `to_userid` = '$userid'
                where user_id='$std' and type='$class_name' and data='$class_id' and extra_data='cloned delete ask'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
            }
            $error="<div class='alert alert-success'>Admin Will Get Notified..</div>";
header('Location:sim.php?error='.$error);
?>