

<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_REQUEST['user_dbid'];
$name=$_REQUEST['name'];
$user_pass=$_REQUEST['user_pass'];
$exist_pass=$_REQUEST['user_pass1'];
$pass="";
if($user_pass==""){
    $pass=$exist_pass;   
}else{
    $pass=$user_pass;   
    $pass=md5($user_pass);
}

 
// $user_image=$_REQUEST['user_image']
$role=$_REQUEST['role'];
$nickname=$_REQUEST['nickname'];
$studid=$_REQUEST['studid'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$File=$_FILES['file'];

$file_name=$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$folder="upload/".$file_name;
$fileType = pathinfo($folder,PATHINFO_EXTENSION);

if(!empty($_FILES["file"]["name"])){
    // Allow certain file formats
$allowTypes = array('jpg','png','jpeg','gif');
if(in_array($fileType, $allowTypes)){
if(move_uploaded_file($file_loc,$folder))
{
     $query1="UPDATE `users` SET `file_name` = '$file_name',`uploaded_on` = NOW() WHERE `id`='$id'";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    // var_dump($query1);
}
}
}
$query="UPDATE `users`
SET `name` = '$name',`password`='$pass',`role`='$role',`nickname`='$nickname',`studid`='$studid',`phone`='$phone',`email`='$email'
WHERE `id`='$id'";

$statement = $connect->prepare($query);
$statement->execute();
$_SESSION['success'] = "Data Edited Successfully";

header('Location:user_list.php');
?>