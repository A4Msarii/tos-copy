<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];
$student_sel = $_REQUEST['student_sel'];

$aced_id = $_REQUEST['aced_id'];
echo $ses_id = $_REQUEST['ses_id'];
$date = date("Y-m-d");

foreach ($student_sel as $student_sels) {
  $checkitem_std = "SELECT * FROM acedemic_stu where std_id='$student_sels' AND acedemic_id='$aced_id' and permission='0'";
  $checkitem_stdst = $connect->prepare($checkitem_std);
  $checkitem_stdst->execute();
  if ($checkitem_stdst->rowCount() <= 0) {

    $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,date) VALUES ('$ses_id','$student_sels','academic','$aced_id','Has Accepted Academic For',CURRENT_TIMESTAMP)";

    $statement = $connect->prepare($sql);

    $statement->execute();
    $query1 = "INSERT INTO acedemic_stu (std_id,acedemic_id,permission,date,updateDate,updatedBy) VALUES ('$student_sels','$aced_id','1',CURRENT_TIMESTAMP(),'$date','$userId')";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
  } else {
    $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,date) VALUES ('$ses_id','$student_sels','academic','$aced_id','Has Accepted Academic For',CURRENT_TIMESTAMP)";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $query2 = "UPDATE `acedemic_stu` SET `permission` = '1',`updateDate` = '$date',updatedBy = '$userId' WHERE `std_id`='$student_sels' and acedemic_id='$aced_id'";

    $statement2 = $connect->prepare($query2);

    $statement2->execute();
  }
}
$_SESSION['success'] = "Student Added";
header("Location:academic.php");
