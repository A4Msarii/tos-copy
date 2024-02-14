<?php 
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');

$id=$_REQUEST['ace_id1'];
$u_id=$_REQUEST['u_id'];
 $username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$password=md5($password);

$q="SELECT * from users where studid='$username' and password='$password' AND role='super admin'";
$statement = $connect->prepare($q);
$statement->execute();

   if($statement->rowCount() > 0)
{
    $sql = "DELETE FROM notifications WHERE `type` = 'academic' and `data`='$id' and extra_data='Has Accepted Academic For' and to_userid='$u_id'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "DELETE FROM acedemic_stu WHERE acedemic_id = '$id' and std_id='$u_id'";
    $statement = $connect->prepare($sql);
    $statement->execute();
}
$_SESSION['danger'] = "Cleared Successfully";
    header('Location:academic.php');
    ?>