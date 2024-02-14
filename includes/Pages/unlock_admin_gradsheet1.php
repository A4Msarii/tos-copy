<?php 
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$userid=$_POST['useridlogin'];
$id=$_POST['gradesheetid'];
$username=$_POST['check_admin_username'];
$password=$_POST['check_admin_password'];
$clone_id=$_POST['clone_id'];
$password=md5($password);
$reason=$_POST['check_admin_reason'];
if($username!="" && $password!="" && $reason!=""){
 $q="SELECT * from users where studid='$username' and password='$password' AND role='super admin'";
$statement = $connect->prepare($q);
$statement->execute();

   if($statement->rowCount() > 0)
{
                            $query="UPDATE cloned_gradesheet
                            SET status = '0'
                            where id='$id'";
                            $statement = $connect->prepare($query);
                            $statement->execute();

                            $stu_grade="SELECT * FROM  cloned_gradesheet where id='$id'";
                            $st = $connect->prepare($stu_grade);
                            $st->execute();
                            if($st->rowCount() > 0)
                            {
                              $re = $st->fetchAll();
                              foreach($re as $value)
                             {
                                $user_id=$value['user_id'];
                               
                                $instructor=$value['instructor'];
                                
                                $type=$value['class'];
                             
                                $class_id=$value['class_id'];
                             
                              }
                            }
                            $sql10 = "INSERT INTO unclock_gradsheet_reason1 (`user_id`,`reason`,`g_id`,`cl_id`,`date`) VALUES ('$userid','$reason','$id','$clone_id',NOW())";
                            $statement10 = $connect->prepare($sql10);
                             $statement10->execute();
                            $get_data= "SELECT * FROM notifications where user_id='$user_id' and type='$type' and data='$class_id' AND extra_data='clone_unlock_request' and permission='$clone_id'";

                            $get_datast= $connect->prepare($get_data);
                            $get_datast->execute();
                    
                            if($get_datast->rowCount() <= 0)
                                {
                                    $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,permission,date) VALUES ('$user_id','$instructor','$type','$class_id','clone_unlock_request',$clone_id,CURRENT_TIMESTAMP)";
                    
                                    $statement = $connect->prepare($sql);
                    
                                    $statement->execute();
                                    echo "Instructor will get notified.";
                    
                                }else{
                                $query1="UPDATE `notifications`
                                SET `to_userid` = '$instructor',is_read='0'
                                where user_id='$user_id' and type='$type' and data='$class_id' and extra_data='clone_unlock_request' and permission='$clone_id'";
                            
                                $statement1 = $connect->prepare($query1);
                    
                                $statement1->execute();
                                echo "instructor will get notified.";
                                }

    echo 'gradsheet unlocked';
}else{
    echo 'username or password is wrong';  
}}else{
    echo 'please fill all data';
}
?>