<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

$userId = $_SESSION['login_id'];
$class_id = $_REQUEST['class_id'];
$class = $_REQUEST['class'];
$fetchuser_id = $_REQUEST['u_id'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$instructor = $_REQUEST['ins_reset_id'];
$noti_id = $_REQUEST['noti_id'];
$user_id = $_REQUEST['stu_reset_id'];
$password = md5($password);
$clearReason = $_REQUEST['clearReason'];
$date = date("Y-m-d");
$current_time = date("H:i:s");

$q = "SELECT * from users where studid='$username' and password='$password' AND role='super admin'";
$statement = $connect->prepare($q);
$statement->execute();

if ($statement->rowCount() > 0) {
    $sql = "UPDATE gradesheet SET instructor =NULL,vehicle = NULL,`time` = NULL,date = NULL,duration_hours = NULL,duration_min = NULL,over_all_grade = NULL,over_all_grade_per = NULL,over_all_comment = NULL,comments = NULL,status = '0' WHERE class_id='$class_id' and class='$class' and user_id='$fetchuser_id'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $gradeId = $connect->query("SELECT id FROM gradesheet WHERE class_id='$class_id' and class='$class' and user_id='$fetchuser_id'");
    $gradeIdData = $gradeId->fetchColumn();

    $query_reason = "INSERT INTO `gradeaheet_clear_reason`(`userId`,`reason`,`gradesheetId`,`clearDate`,`clearTime`) VALUES ('$userId','$clearReason','$gradeIdData','$date','$current_time')";
    $statement_reason = $connect->prepare($query_reason);
    $statement_reason->execute();


    $lock = "SELECT * FROM item where class_id='$class_id' and class='$class'";
    $lockst = $connect->prepare($lock);
    $lockst->execute();
    if ($lockst->rowCount() > 0) {
        $re = $lockst->fetchAll();
        foreach ($re as $row) {
            $item_id = $row['id'];
            $sql1 = "DELETE FROM item_gradesheet WHERE item_id='$item_id' and user_id='$fetchuser_id'";
            $statement1 = $connect->prepare($sql1);
            $statement1->execute();
           
        }
    }
    $lock1 = "SELECT * FROM subitem where class_id='$class_id' and class='$class'";
    $lockst1 = $connect->prepare($lock1);
    $lockst1->execute();
    if ($lockst1->rowCount() > 0) {
        $re1 = $lockst1->fetchAll();
        foreach ($re1 as $row1) {
            $subitem_id = $row1['id'];
            $sql11 = "DELETE FROM subitem_gradesheet WHERE subitem_id='$subitem_id' and user_id='$fetchuser_id'";
            $statement11 = $connect->prepare($sql11);
            $statement11->execute();
        }
    }
    $query10 = "UPDATE `notifications`
SET is_read='1'
where id='$noti_id'";
    $statement10 = $connect->prepare($query10);
    $statement10->execute();

    $get_data = "SELECT * FROM notifications where user_id='$user_id' and type='$class' and data='$class_id' AND extra_data='You requested a gradesheet for a reset'";
    $get_datast = $connect->prepare($get_data);
    $get_datast->execute();

    if ($get_datast->rowCount() <= 0) {
        $sql = "INSERT INTO notifications (user_id,to_userid,type,data,extra_data,date) VALUES ('$user_id','$instructor','$class','$class_id','You requested a gradesheet for a reset',CURRENT_TIMESTAMP)";

        $statement = $connect->prepare($sql);

        $statement->execute();
    } else {
        $query1 = "UPDATE `notifications`
                                SET `to_userid` = '$instructor',is_read='0'
                                where user_id='$user_id' and type='$class' and data='$class_id' AND extra_data='You requested a gradesheet for a reset'";

        $statement1 = $connect->prepare($query1);

        $statement1->execute();
    }
    $_SESSION['success'] = "Gradesheet Reset";
    header('Location:newgradesheet.php');
} else {
    $_SESSION['warning'] = "Wrong Username Or Password";
    header('Location:gradesheet.php');
}
