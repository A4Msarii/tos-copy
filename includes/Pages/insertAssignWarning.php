<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$warning_id = $_REQUEST['warning'];
$cat = $_REQUEST['cat'];
$cat_data = $_REQUEST['cat_data'];
$other = $_REQUEST['other'];
$user_Id = $_REQUEST['user_Id'];
$role = $_SESSION['role'];
$insert = "";

$fileMethod = $_REQUEST['fileMethod'];

if ($fileMethod == "addFile") {
    $userId = $_SESSION['login_id'];
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    if ($role == "super admin") {
        $color = "red";
    } elseif ($role == 'instructor') {
        $color = "yellow";
    } else {
        $color = "blue";
    }

    $filename = $_FILES['file']['name'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uploadPath = 'files/' . $filename;

    // if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadPath)) {
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
    $dupliData = $dupliQuery->fetchColumn();


    if ($dupliData > 0) {
        $_SESSION['warning'] = "Duplicate File Not Allowed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

        $query = "INSERT INTO user_files (filename,type,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy) VALUES ('$filename','$ext','$userId','$role','$color','$date','$date','$createdBy','$updatedBy')";
        $stmt = $connect->prepare($query);
        $stmt->execute();

        $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
        $lastId1 = $lastQ->fetchColumn();
    }

    // $query = "INSERT INTO personalchecklist_files (fileId,mainCheckId) VALUES ('$lastId','$mainCheckFileId')";
    // $stmt = $connect->prepare($query);
    // $stmt->execute();
    // $_SESSION['success'] = "File Inserted Successfully";
    // }
}

if ($fileMethod == "addFileLoca") {

    $phase = $_REQUEST["phase"];
    $countPhase = $_REQUEST['phase'];
    $phaseName = $_REQUEST['phaseName'];
    $senderId = $_REQUEST['senderId'];
    $userId = $_SESSION['login_id'];
    $type = "offline";
    $name = 0;
    if ($role == 'instructor') {
        $color = "yellow";
    } elseif ($role == 'student') {
        $color = 'blue';
    } else {
        $color = 'red';
    }

    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $value = $phase;
    if ($phaseName == '') {
        $string = $phase;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $phaseName;
    }
    $str = str_replace('\\', '\\\\', $value);
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
    $dupliData = $dupliQuery->fetchColumn();


    if ($dupliData > 0) {
        $_SESSION['warning'] = "Duplicate File Not Allowed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

        $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy)";

        $stmt = $connect->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':filename', $str);
        $stmt->bindParam(':lastName', $location);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':createdAt', $date);
        $stmt->bindParam(':updatedAt', $date);
        $stmt->bindParam(':createdBy', $createdBy);
        $stmt->bindParam(':updatedBy', $updatedBy);

        $stmt->execute();

        $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
        $lastId1 = $lastQ->fetchColumn();
    }
}

if ($fileMethod == "addFileLink") {
    $phase = $_REQUEST["link"];
    $countPhase = $_REQUEST['link'];
    $phaseName = $_REQUEST['linkName'];
    $userId = $_SESSION['login_id'];
    $type = "online";
    $name = 0;
    if ($role == 'instructor') {
        $color = "yellow";
    } elseif ($role == 'student') {
        $color = 'blue';
    } else {
        $color = 'red';
    }
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $value = $phase;



    if ($phaseName == '') {
        $string = $phase;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $phaseName;
    }

    $str = str_replace('\\', '\\\\', $value);
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
    $dupliData = $dupliQuery->fetchColumn();


    if ($dupliData > 0) {
        $_SESSION['warning'] = "Duplicate File Not Allowed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

        $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy)";

        // print_r($sql);
        // die();

        $stmt = $connect->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':filename', $str);
        $stmt->bindParam(':lastName', $location);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':createdAt', $date);
        $stmt->bindParam(':updatedAt', $date);
        $stmt->bindParam(':createdBy', $createdBy);
        $stmt->bindParam(':updatedBy', $updatedBy);

        // Execute the statement
        $stmt->execute();


        $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
        $lastId1 = $lastQ->fetchColumn();
    }
}


if ($user_Id != "") {

    $filename = $uploadedFiles["name"];

    // ... (same file checks as before)


    $sql = "INSERT INTO notifications (user_id,to_userid,data,extra_data,date)
            VALUES ('$user_Id','$user_Id','$warning_id','reached_cout',CURRENT_TIMESTAMP)";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $lastId = $connect->lastInsertId();
    foreach ($cat as $key => $cats) {

        $cat_datas = $cat_data[$key];
        $others = $other[$key];

        if (isset($others)) {
            $insert = $others;
        }
        if (isset($cat_datas) && $cat_datas != '0') {
            $insert = $cat_datas;
        }
        $sql11 = "SELECT count(*) FROM new_warnning WHERE type='$cats' and classId='$insert' and notificationId='$lastId' and studentId='$user_Id'";
        $result11 = $connect->prepare($sql11);
        $result11->execute();
        $number_of_rows110 = $result11->fetchColumn();
        if ($number_of_rows110 == 0) {
            $sql1 = "INSERT INTO new_warnning (notificationId,studentId,type,classId)
     VALUES ('$lastId','$user_Id','$cats','$insert')";
            $statement1 = $connect->prepare($sql1);
            $statement1->execute();
        }
    }
    $query = "INSERT INTO assing_warning_doc (files,noti_id)
    VALUES ('$lastId1','$lastId')";
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $_SESSION['success'] = "Warning Assinged";
    header("Location:CAP.php");
} else {
    $_SESSION['warning'] = "Warning Not Assinged";
    header("Location:assignWarning.php");
}
