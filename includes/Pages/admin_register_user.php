<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$studid = $_REQUEST['studid'];
$nickname = $_REQUEST['nickname'];
$ins_id = $_REQUEST['ins_id'];
$role = $_REQUEST['role'];
$email = $_REQUEST['email'];
$initial = $_REQUEST['initial'];
$password = $_REQUEST['password'];
$gender = $_REQUEST['gender'];
$File = $_FILES['file'];
$file_name = $_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$que = "SELECT id FROM users where studid='$studid'";
$stat = $connect->prepare($que);
$stat->execute();

if ($stat->rowCount() == 0) {
    $folder = "upload/" . $file_name;
    $fileType = pathinfo($folder, PATHINFO_EXTENSION);
    // var_dump($fileType);
    if (!empty($_FILES["file"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($file_loc, $folder)) {

                $sql = "INSERT INTO `users` (file_name,name,nickname,studid,role,phone,ins_id,gender,email,initial,password) VALUES ('$file_name','$name', '$nickname','$studid','$role','$phone','$ins_id','$gender','$email','$initial','" . md5($password) . "')";
                $statement = $connect->prepare($sql);
                $statement->execute();
                $_SESSION['success'] = "User Register Successfully";
                header('Location:usersinfo.php');
            } else {


                $_SESSION['danger'] = "Trouble in uploading file";
                header('Location:usersinfo.php');
            }
        } else {

            $_SESSION['danger'] = "please select correct image file";
            header('Location:usersinfo.php');
        }
    } else {
        $sql = "INSERT INTO `users` (name,nickname,studid,role,phone,ins_id,gender,email,initial,password) VALUES ('$name', '$nickname','$studid','$role','$phone','$ins_id','$gender','$email','$initial','" . md5($password) . "')";
        $statement = $connect->prepare($sql);
        $statement->execute();

        $_SESSION['success'] = "Data added but image is not uploaded";
        header("Location:usersinfo.php");
    }
} else {
    $_SESSION['danger'] = "Id already taken";

    header('Location:usersinfo.php');
}
