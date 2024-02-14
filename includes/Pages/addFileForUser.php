<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if(isset($_REQUEST['addFile'])){
    $courseId = $_REQUEST['courseId'];
    $studentId = $_REQUEST['studentId'];
    // $uploadFile = $_REQUEST['uploadFile'];
    $totalfiles = count($_FILES['uploadFile']['name']);
    $name = 0;

    // echo $courseId."<br>";
    // echo $studentId."<br>";
    // print_r($totalfiles);
    // die();

    for ($i = 0; $i < $totalfiles; $i++) {
        $filename = $_FILES['uploadFile']['name'][$i];

        $dupliQuery = $connect->query("SELECT count(*) FROM userdocumnet WHERE fileName = '$filename'");
        $dupliData = $dupliQuery->fetchColumn();

        if($dupliData >= 1){
            $_SESSION['danger'] = "Duplicate File Not Allowed";
            header("Location:courseDetails.php");
        }else{
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $uploadPath = 'files/' . $filename;
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], $uploadPath)) {
                $query = "INSERT INTO userdocumnet (userId,studentId,fileName,fileType) VALUES ('$studentId','$courseId','$filename','$ext')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
            }else {
                echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
            }
        }
    }
    $_SESSION['success'] = "Files Inserted Successfully";
    header("Location:courseDetails.php");
}
