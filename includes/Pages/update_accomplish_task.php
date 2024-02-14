
<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$id=$_GET['id'];
$Instructor_ac=$_REQUEST['Instructor_ac'];
$Class_ac=$_REQUEST['Class_ac'];
$date_ac=$_REQUEST['date_ac'];
$query_ac="UPDATE `accomplish_task`
SET `assign_inst` = '$Instructor_ac',`assign_class`='$Class_ac',`assign_date`='$date_ac'
WHERE `ac_id`='$id'";

$statement_ac = $connect->prepare($query_ac);

            $statement_ac->execute();
$_SESSION['success'] = "Data Edited Successfully";

header('Location:tasklog.php');
?>