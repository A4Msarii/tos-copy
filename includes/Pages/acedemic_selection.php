<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $noti_id=$_REQUEST['noti_id'];
// echo $chose_button=$_REQUEST['chose_button'];
$get_ac_class_id=$_REQUEST['get_ac_class_id'];

  $query1 = "SELECT * FROM notifications where id='$noti_id'";
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                           foreach($result1 as $row1)
                        {
                          echo $user_id=$row1['user_id'];
                          echo $to_userid=$row1['to_userid'];
                          echo $type=$row1['type'];
                          echo $data=$row1['data'];
                         
                  $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,date) VALUES ('$to_userid','$user_id','$type','$data','Has Decline Academic For',CURRENT_TIMESTAMP)";

                                  $statement = $connect->prepare($sql);

                                  $statement->execute();

                              
                        }
                      }

$query ="INSERT into acedemic_stu(std_id,acedemic_id,permission,date) values('$user_id','$data','0',CURRENT_TIMESTAMP)";
$statement = $connect->prepare($query);
 $statement->execute();
 

 $_SESSION['danger'] = "Declined";
 header("Location:academic.php");
?>