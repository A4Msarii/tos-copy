<?php 
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
echo $grade=$_REQUEST['grade'];
echo $gradeuserid=$_REQUEST['gradeuserid'];
echo $ins_id=$_REQUEST['ins_id'];
var_dump($grade == "" || $gradeuserid == "" || $ins_id =="");
if($grade == "" || $gradeuserid == "" || $ins_id ==""){
header('Location:actual.php');
}else{
    $sql = "INSERT INTO grade_per_notifications (user_id,to_userid,type,data,is_read) VALUES ('$ins_id','$gradeuserid','permission','$grade','0')";

    $statement = $connect->prepare($sql);

    $statement->execute();
 header('location:actual.php');
}
?>