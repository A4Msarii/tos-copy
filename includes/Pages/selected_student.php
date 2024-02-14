<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$noties_id=$_REQUEST['noties_id'];
echo $ac_id=$_REQUEST['ac_id'];
$student_sel=$_REQUEST['student_sel'];
var_dump($student_sel);

$query2 = "SELECT * FROM notifications where id='$noties_id'";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if($statement2->rowCount() > 0)
    {
        $result2 = $statement2->fetchAll();
        foreach($result2 as $row)
     {
       echo $user_id=$row['user_id'];
       echo $to_userid=$row['to_userid'];
       echo $type=$row['type'];
       echo $data=$row['data'];
      }
   }

foreach($student_sel as $student_sels){
    $checkitem_std = "SELECT * FROM acedemic_stu where std_id='$student_sels' AND acedemic_id='$data' and permission='0'";
    $checkitem_stdst = $connect->prepare($checkitem_std);
    $checkitem_stdst->execute();
    if($checkitem_stdst->rowCount() <= 0)
                    {
                $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,date) VALUES ('$to_userid','$student_sels','$type','$data','Has Accepted Academic For',CURRENT_TIMESTAMP)";
                $statement = $connect->prepare($sql);
                $statement->execute();

                $query1 ="INSERT INTO acedemic_stu (std_id,acedemic_id,permission,date) VALUES ('$student_sels','$ac_id','1',CURRENT_TIMESTAMP())";
                $statement1 = $connect->prepare($query1);
                $statement1->execute();
                    }else{
                        $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,date) VALUES ('$to_userid','$student_sels','$type','$data','Has Accepted Academic For',CURRENT_TIMESTAMP)";
                        $statement = $connect->prepare($sql);
                        $statement->execute();
                                    $query2="UPDATE `acedemic_stu` SET `permission` = '1' WHERE `std_id`='$student_sels' and acedemic_id='$data'";

                                 $statement2 = $connect->prepare($query2);

                                             $statement2->execute();
                    }
}
$_SESSION['success'] = "Student Added";
header("Location:academic.php");
?>