<?php
session_start();

include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['album'])) {
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $uploadDirectory = 'events/';
    //   $uploadPath = 'files/' . $filename;

    $title = $_REQUEST['title'];
    $userId = $_SESSION['login_id'];
    $date = date("Y-m-d");


    foreach ($_FILES['album']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['album']['name'][$key];
        $file_size = $_FILES['album']['size'][$key];
        $file_tmp = $_FILES['album']['tmp_name'][$key];
        $file_type = $_FILES['album']['type'][$key];

        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowedExtensions)) {
            echo 'Error: Only JPG, JPEG, and PNG images are allowed.';
            continue;
        }

        // Move the uploaded file to the target directory
        $targetFile = $uploadDirectory . $file_name;
        move_uploaded_file($file_tmp, $targetFile);

        $query = "INSERT INTO user_event (userId,title,fileName,fileType,date) VALUES ('$userId','$title','$file_name','$file_extension','$date')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    }

    $_SESSION['success'] = "File Inserted Successfully";
    header("Location:Home.php");
}
