
<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET['id'];
$Instructor_ad=$_REQUEST['Instructor_ad'];
$class_ad=$_REQUEST['class_id'];
$date_ad=$_REQUEST['date_ad'];
$query_ad="UPDATE `additional_task`
SET `assign_inst` = '$Instructor_ad',`assign_class`='$class_ad',`assign_date`='$date_ad'
WHERE `ad_id`='$id'";

$statement_ad = $connect->prepare($query_ad);

            $statement_ad->execute();
$_SESSION['success'] = "Data Edited Successfully";

header('Location:tasklog.php');
?>