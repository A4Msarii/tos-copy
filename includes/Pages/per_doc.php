<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $per_val=$_REQUEST['per_but'];
 $std_id=$_REQUEST['std_id'];
 $warning_id=$_REQUEST['warning_id'];
$sql = "SELECT count(*) FROM warning_permission WHERE std_id=? and warning_id='$warning_id'"; 
$result = $connect->prepare($sql); 
$result->execute([$std_id]); 
 $count = $result->fetchColumn();

if($per_val=="accept"){
    $noti_id=$_REQUEST['noti_id'];
        $query="UPDATE `notifications`
        SET `is_read` = '1'
        WHERE `id`='$noti_id'";
        $statement = $connect->prepare($query);
        $statement->execute();
$msg="You accepted";
$class="success";
}else{
    $msg="You Not Accepted";
    $class="danger";
}

if($count==0){
    $query_type ="INSERT INTO warning_permission(std_id,warning_id,permission) VALUES ('$std_id','$warning_id','$per_val')";
    $statement_type = $connect->prepare($query_type);
    $statement_type->execute();
    $error ="<div class='alert alert-".$class."'>".$msg."</div>";
    header("Location:Home.php?error=".$error);
}else{
    $query_ad="UPDATE `warning_permission`
SET `permission` = '$per_val'
WHERE std_id='$std_id'and warning_id='$warning_id'";
$statement_ad = $connect->prepare($query_ad);
$statement_ad->execute();
// $error ="<div class='alert alert-".$class."'>".$msg."</div>";
$_SESSION['success'] = ".$msg.";
header("Location:Home.php");
}

?>