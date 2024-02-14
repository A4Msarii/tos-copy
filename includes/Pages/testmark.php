<?php
ini_set("max_execution_time", 180);
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];
 $std_id=$_POST['std_id'];
 $id=$_POST['test_id'];
 $crs_id=$_POST['crs_id'];
 $Marks = $_POST["Marks"];
 $q6= "SELECT warning_category_data.id,warning_category_data.category_value,warning_category_data.grade,warning_category_data.count,warning_category_data.threshold,warning_category_data.warning
FROM warning_category_data
INNER JOIN warning_data ON warning_data.id=warning_category_data.warning where warning_data.ctp='$crs_id' and warning_category_data.category='test' and warning_category_data.category_value='all'";
$st6 = $connect->prepare($q6);
$st6->execute();
if($st6->rowCount() > 0)
     {
        $re6 = $st6->fetchAll();
       foreach($re6 as $row6)
         {  
            $cat_id=$row6['id'];
             $set_id=$row6['count'];
            $warning_id=$row6['warning'];
            $warning_count=$row6['grade']; 
            $warning_threshold=$row6['threshold'];
            $sql7 = "SELECT count(`id`) as check_exist_count FROM notifications WHERE user_id='$std_id' and data='$warning_id' and extra_data='reached_cout'";
            $res7 = $connect->query($sql7);
            $get_count7 = $res7->fetchColumn(); 
           
            if($warning_threshold == 2 && $get_count7==0){
                $sql8 = "SELECT count(`id`) as check_test_count FROM test_data WHERE student_id='$std_id' and course_id='$crs_id' and marks='$Marks'";
                $res8 = $connect->query($sql8);
                $get_count8 = $res8->fetchColumn(); 
                if($get_count8>=0){
                    $get_count8=$get_count8+1;
                    if($get_count8>=$set_id){ 
                     $msg="reached_cout";
                    send_noti($std_id,$warning_id,$msg,$cat_id);
                    }
            }
        }
        if($warning_threshold == 1 && $get_count7==0){
            $sql8 = "SELECT count(`id`) as check_test_count FROM test_data WHERE student_id='$std_id' and course_id='$crs_id' and marks<='$Marks'";
           $res8 = $connect->query($sql8);
             $get_count8 = $res8->fetchColumn(); 
            if($get_count8>=0){
                 $get_count8=$get_count8+1;
                if($get_count8>=$set_id){ 
                 $msg="reached_cout";
                 send_noti($std_id,$warning_id,$msg,$cat_id);
                }
        }
    }
                if($warning_threshold == 3 && $get_count7==0){
                    $sql8 = "SELECT count(`id`) as check_test_count FROM test_data WHERE student_id='$std_id' and course_id='$crs_id' and marks>='$Marks'";
                    $res8 = $connect->query($sql8);
                     $get_count8 = $res8->fetchColumn(); 
                     if($get_count8>=0){
                        $get_count8=$get_count8+1;
                        if($get_count8>=$set_id){ 
                        $msg="reached_cout";
                        send_noti($std_id,$warning_id,$msg,$cat_id);
                        }
                }
            }
         }

     }

$q5= "SELECT warning_category_data.id,warning_category_data.category_value,warning_category_data.grade,warning_category_data.count,warning_category_data.threshold,warning_category_data.warning
FROM warning_category_data
INNER JOIN warning_data ON warning_data.id=warning_category_data.warning where warning_data.ctp='$crs_id' and warning_category_data.category='test' and warning_category_data.category_value='$id'";
$st5 = $connect->prepare($q5);
$st5->execute();

 if($st5->rowCount() > 0)
     {
         $re5 = $st5->fetchAll();
       foreach($re5 as $row5)
         {
            $set_id=$row5['id'];
             $warning_id=$row5['warning'];
           $warning_count=$row5['grade']; 
           $warning_threshold=$row5['threshold'];
                    $sql5 = "SELECT count(`id`) as check_exist_count FROM notifications WHERE user_id='$std_id' and data='$warning_id' and extra_data='reached_cout'";
                    $res5 = $connect->query($sql5);
                    $get_count5 = $res5->fetchColumn();  
                        if($warning_threshold == 2 && $warning_count == $Marks && $get_count5==0){
                        $msg="reached_cout";
                        send_noti($std_id,$warning_id,$msg,$set_id);
                        }
                        if($warning_threshold == 1 && $warning_count >= $Marks && $get_count5==0){
                        $msg="reached_cout";
                        send_noti($std_id,$warning_id,$msg,$set_id);;
                        }
                        if($warning_threshold == 3 && $warning_count <= $Marks && $get_count5==0){
                        $msg="reached_cout";
                        send_noti($std_id,$warning_id,$msg,$set_id);
                        }
            }
        }

        function send_noti($stud_db_id,$get_id,$getmsg,$set_id){
            global $id;
    
             include(ROOT_PATH.'includes/connect.php');
            $sql5 = "SELECT * FROM newcourse WHERE StudentNames='$stud_db_id'";
            $sql5_prepare = $connect->prepare($sql5);
            $result5 = $connect->query($sql5);
            $datas5 = $result5->fetch(PDO::FETCH_ASSOC);   
             $c_m=$datas5['CourseManager'];
             $notification2 = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,class_id,class_name,date)
             VALUES ('$stud_db_id','$stud_db_id','$set_id','$get_id','$getmsg','$id','test',CURRENT_TIMESTAMP)";
             $statement2 = $connect->prepare($notification2);
             $statement2->execute();
             $notification2 = "INSERT INTO notifications (user_id,to_userid,if_admin,type,data,extra_data,class_id,class_name,date)
             VALUES ('$stud_db_id','$stud_db_id','super admin','$set_id','$get_id','$getmsg','$id','test',CURRENT_TIMESTAMP)";
             $statement2 = $connect->prepare($notification2);
             $statement2->execute();
             $notification4 = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,class_id,class_name,date)
              VALUES ('$stud_db_id','$c_m','$set_id','$get_id','$getmsg','$id','test',CURRENT_TIMESTAMP)";
               $statement1 = $connect->prepare($notification4);
               $statement1->execute();
           }
 $get_data= "SELECT * FROM test_data where test_id='$id' and student_id='$std_id' and course_id='$crs_id'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();

        if($get_datast->rowCount() > 0)
            {
            $query="UPDATE test_data
            SET marks = '$Marks', status = '1' WHERE `test_id`='$id' and student_id='$std_id' and course_id='$crs_id'";
          
            $statement = $connect->prepare($query);

            $statement->execute();

            }else{
                if($Marks <= 100){
                $sql = "INSERT INTO test_data (test_id,student_id,course_id,marks,created,status,userId) VALUES ('$id','$std_id','$crs_id','$Marks',NOW(),'1','$userId')";
                $statement = $connect->prepare($sql);
                $statement->execute();
            }else{
                
                $_SESSION['warning'] = "Marks should be under or equal 100";
                header("Location:testing.php");
             }
            }


$_SESSION['success'] = "Data Added Successfully";
header('Location:testing.php');
?>