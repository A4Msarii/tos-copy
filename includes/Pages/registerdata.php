<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 session_start();       
        $name=$_REQUEST['name'];
     
        $phone=$_REQUEST['phone'];
        $username=$_REQUEST['username'];
        $email=$_REQUEST['email'];
        $nickname=$_REQUEST['nickname'];
        $role=$_REQUEST['role'];
        $password=$_REQUEST['password'];
        $gender=$_REQUEST['gender'];
        $create_datetime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `users` (name, phone, username, password,nickname,role, email, gender, create_datetime) VALUES ('$name', '$phone','$nickname','$role','$username', '" . md5($password) . "', '$email', 'gender', '$create_datetime')";
        $statement = $connect->prepare($sql);
        $statement->execute();
        
            $_SESSION['success'] = "User Registered Successfully";
            header('Location:login.php');
      
?>