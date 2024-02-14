<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$role = $_SESSION['role'];
if (isset($_REQUEST['saveFile'])) {
    $title = $_REQUEST['title'];


    $userId = $_SESSION['login_id'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionUser = $_REQUEST['userId'];
    if ($role == "super admin") {
        $color = "red";
    } elseif ($role == 'instructor') {
        $color = "yellow";
    } else {
        $color = "blue";
    }
    $fileLoca = "testDoc";

    $year = $_REQUEST['year'];
    // Get file data
    $titles = $title;
    $years = $year;
    $filename = $_FILES['upload_file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uploadPath = 'files/' . $filename;
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
    $dupliData = $dupliQuery->fetchColumn();


    if ($dupliData > 0) {
        $_SESSION['warning'] = "Duplicate File Not Allowed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $uploadPath)) {
            // // Prepare and execute the SQL query to insert the file into the database

            $query = "INSERT INTO user_files (filename,type,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy,fileLocation) VALUES ('$filename','$ext','$userId','$role','$color','$date','$date','$createdBy','$updatedBy','$fileLoca')";
            $stmt = $connect->prepare($query);
            $stmt->execute();

            $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
            $lastId = $lastQ->fetchColumn();

            $queryDoc = "INSERT INTO document_test (file_name,title,year,fileLoca) VALUES ('$lastId','$titles','$years','userFile')";
            $stmt = $connect->prepare($queryDoc);
            $stmt->execute();

            if (isset($permissionUser)) {
                // $userId = $_REQUEST['userId'];
                $totalUser = count($permissionUser);
                $color = "green";
                if ($totalUser > 0) {
                    for ($i = 0; $i < $totalUser; $i++) {
                        $user_id = $permissionUser[$i];
                        $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
                        $stmt = $connect->prepare($query);
                        $stmt->execute();
                    }
                }
            } else {
                if ($permissionType == "All instructor") {
                    $color = "yellow";
                } else {
                    $color = "blue";
                }
                $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
            }
        }
    }
    $_SESSION['success'] = "files Inserted Successfully";
    header("Location:create_test.php");
}


if (isset($_REQUEST['driveLink'])) {
    $title = $_REQUEST['title'];
    $year = $_REQUEST['year'];
    $phase = $_REQUEST['phase'];
    $phaseName = $_REQUEST['phaseName'];
    $linkType = "offline";

    $userId = $_SESSION['login_id'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionUser = $_REQUEST['userId'];
    if ($role == "super admin") {
        $color = "red";
    } elseif ($role == 'instructor') {
        $color = "yellow";
    } else {
        $color = "blue";
    }
    $fileLoca = "testDoc";

    if ($phaseName == '') {
        $string = $phase;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $phaseName;
    }

    $str = str_replace('\\', '\\\\', $phase);
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
    $dupliData = $dupliQuery->fetchColumn();


    if ($dupliData > 0) {
        $_SESSION['warning'] = "Duplicate File Not Allowed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

        $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileLocation) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileLocation)";

        // print_r($sql);
        // die();

        $stmt = $connect->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':filename', $str);
        $stmt->bindParam(':lastName', $location);
        $stmt->bindParam(':type', $linkType);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':createdAt', $date);
        $stmt->bindParam(':updatedAt', $date);
        $stmt->bindParam(':createdBy', $createdBy);
        $stmt->bindParam(':updatedBy', $updatedBy);
        $stmt->bindParam(':fileLocation', $fileLoca);

        // Execute the statement
        $stmt->execute();

        $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
        $lastId = $lastQ->fetchColumn();


        $sql = "INSERT INTO document_test (file_name,title,year,fileLoca) VALUES ('$lastId','$title','$year','userFile')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();

        if (isset($permissionUser)) {
            // $userId = $_REQUEST['userId'];
            $totalUser = count($permissionUser);
            $color = "green";
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $permissionUser[$i];
                    $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                }
            }
        } else {
            if ($permissionType == "All instructor") {
                $color = "yellow";
            } else {
                $color = "blue";
            }
            $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }
    }

    $_SESSION['success'] = "files Inserted Successfully";
    header("Location:create_test.php");
}

if (isset($_REQUEST['onLineLink'])) {
    $title = $_REQUEST['title'];
    $year = $_REQUEST['year'];
    $phase = $_REQUEST['link'];
    $phaseName = $_REQUEST['linkName'];
    $linkType = "online";

    $userId = $_SESSION['login_id'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $permissionType = $_REQUEST['permissionType'];
    $permissionUser = $_REQUEST['userId'];
    if ($role == "super admin") {
        $color = "red";
    } elseif ($role == 'instructor') {
        $color = "yellow";
    } else {
        $color = "blue";
    }
    $fileLoca = "testDoc";

    if ($phaseName == '') {
        $string = $phase;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $phaseName;
    }

    $str = str_replace('\\', '\\\\', $phase);
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
    $dupliData = $dupliQuery->fetchColumn();


    if ($dupliData > 0) {
        $_SESSION['warning'] = "Duplicate File Not Allowed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

        $sql = "INSERT INTO user_files (filename, lastName, type, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileLocation) VALUES (:filename, :lastName, :type, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileLocation)";

        // print_r($sql);
        // die();

        $stmt = $connect->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':filename', $str);
        $stmt->bindParam(':lastName', $location);
        $stmt->bindParam(':type', $linkType);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':createdAt', $date);
        $stmt->bindParam(':updatedAt', $date);
        $stmt->bindParam(':createdBy', $createdBy);
        $stmt->bindParam(':updatedBy', $updatedBy);
        $stmt->bindParam(':fileLocation', $fileLoca);

        // Execute the statement
        $stmt->execute();

        $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
        $lastId = $lastQ->fetchColumn();


        $sql = "INSERT INTO document_test (file_name,title,year,fileLoca) VALUES ('$lastId','$title','$year','userFile')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();


        // $sql = "INSERT INTO document_test (file_name,title,year,file_type,lastName) VALUES ('$str','$title','$year','$linkType','$location')";
        // $stmt = $connect->prepare($sql);
        // $stmt->execute();

        if (isset($permissionUser)) {
            // $userId = $_REQUEST['userId'];
            $totalUser = count($permissionUser);
            $color = "green";
            if ($totalUser > 0) {
                for ($i = 0; $i < $totalUser; $i++) {
                    $user_id = $permissionUser[$i];
                    $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                }
            }
        } else {
            if ($permissionType == "All instructor") {
                $color = "yellow";
            } else {
                $color = "blue";
            }
            $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }
    }

    $_SESSION['success'] = "files Inserted Successfully";
    header("Location:create_test.php");
}
