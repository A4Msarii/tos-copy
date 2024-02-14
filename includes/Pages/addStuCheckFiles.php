<?php
session_start();
$user_Id = $_SESSION['login_id'];
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

$role = $_SESSION['role'];

if (isset($_REQUEST['addNewFile'])) {
    $senderId = $_REQUEST['senderId'];
    // $totalfiles = count($_FILES['file']['name']);
    $userId = $_SESSION['login_id'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    // $permissionType = $_REQUEST['permissionType'];
    // $permissionUser = $_REQUEST['userId'];
    if ($role == "super admin") {
        $color = "red";
    } elseif ($role == 'instructor') {
        $color = "yellow";
    } else {
        $color = "blue";
    }
    $mainCheckFileId = $_REQUEST['mainCheckFileId'];


    // for ($i = 0; $i < $totalfiles; $i++) {

    $filename = $_FILES['file']['name'];
    // $dupliQuery = $connect->query("SELECT count(*) FROM chats WHERE messages = '$filename'");
    // $dupliData = $dupliQuery->fetchColumn();

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uploadPath = 'files/' . $filename;
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
    $dupliData = $dupliQuery->fetchColumn();


    if ($dupliData > 0) {
        $_SESSION['warning'] = "Duplicate File Not Allowed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadPath)) {

            $query = "INSERT INTO user_files (filename,type,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy) VALUES ('$filename','$ext','$userId','$role','$color','$date','$date','$createdBy','$updatedBy')";
            $stmt = $connect->prepare($query);
            $stmt->execute();

            $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
            $lastId = $lastQ->fetchColumn();

            $query = "INSERT INTO checklistfile (fileId,checkListId) VALUES ('$lastId','$mainCheckFileId')";
            $stmt = $connect->prepare($query);
            $stmt->execute();


            // if ($role == "super admin") {

            //     $shopShelfDel = "DELETE FROM tempbrief WHERE briefId = '$briefCase_ID' AND folderId = '$folder_ID' AND shopId = '$shopId' AND userId = '$userId'";
            //     $shopShelfStatement = $connect->prepare($shopShelfDel);
            //     $shopShelfStatement->execute();
            // }

            // $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
            // $lastId = $lastQ->fetchColumn();

            // if (isset($permissionUser)) {
            //     // $userId = $_REQUEST['userId'];
            //     $totalUser = count($permissionUser);
            //     $color = "green";
            //     if ($totalUser > 0) {
            //         for ($i = 0; $i < $totalUser; $i++) {
            //             $user_id = $permissionUser[$i];
            //             $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
            //             $stmt = $connect->prepare($query);
            //             $stmt->execute();
            //         }
            //     }
            // } else {
            //     if ($permissionType == "All instructor") {
            //         $color = "yellow";
            //     } else {
            //         $color = "blue";
            //     }
            //     $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
            //     $stmt = $connect->prepare($query);
            //     $stmt->execute();
            // }

            // if (isset($permissionUser)) {
            //     // $userId = $_REQUEST['userId'];
            //     $totalUser = count($permissionUser);
            //     $color = "green";
            //     if ($totalUser > 0) {
            //         for ($i = 0; $i < $totalUser; $i++) {
            //             $user_id = $permissionUser[$i];
            //             $query = "INSERT INTO phasefilepermission (fileId,phaseId,permissionType) VALUES ('$lastId','$phaseId','readAndWrite')";
            //             $stmt = $connect->prepare($query);
            //             $stmt->execute();
            //         }
            //     }
            // } else {
            //     if ($permissionType == "All instructor") {
            //         $color = "yellow";
            //     } else {
            //         $color = "blue";
            //     }
            //     $query = "INSERT INTO phasefilepermission (fileId,phaseId,permissionType) VALUES ('$lastId','$phaseId','readAndWrite')";
            //     $stmt = $connect->prepare($query);
            //     $stmt->execute();
            // }
            $_SESSION['success'] = "File Inserted Successfully";
        } else {
            echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
        }
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['driveLink'])) {
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
    // $permissionType = $_REQUEST['permissionType'];
    // $permissionUser = $_REQUEST['userId'];

    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    // $permissionCategory = $_REQUEST['permissionCategory'];
    $mainCheckFileId = $_REQUEST['mainCheckFileId'];

    // while ($name < count($countPhase)) {
    $value = $phase;



    if ($phaseName == '') {
        $string = $phase;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $phaseName;
    }

    // $dupliQuery = $connect->query("SELECT count(*) FROM chats WHERE messages = '$location'");
    // $dupliData = $dupliQuery->fetchColumn();
    // echo $dupliData;
    // die();

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
        // $stmt->bindParam(':fileLocation', $fileLoc);

        // Execute the statement
        $stmt->execute();

        $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
        $lastId = $lastQ->fetchColumn();

        $query = "INSERT INTO checklistfile (fileId,checkListId) VALUES ('$lastId','$mainCheckFileId')";
        $stmt = $connect->prepare($query);
        $stmt->execute();

        // $sql = "INSERT INTO chats (senderId,receiverId,messages,date,loca) VALUES ('$userId','$senderId','$lastId',NOW(),'userfile')";
        // $stmt = $connect->prepare($sql);
        // $stmt->execute();

        // if ($role == "super admin") {

        //     $shopShelfDel = "DELETE FROM tempbrief WHERE briefId = '$briefCase_ID' AND folderId = '$folder_ID' AND shopId = '$shopId' AND userId = '$userId'";
        //     $shopShelfStatement = $connect->prepare($shopShelfDel);
        //     $shopShelfStatement->execute();
        // }



        // if (isset($permissionUser)) {
        //     // $userId = $_REQUEST['userId'];
        //     $totalUser = count($permissionUser);
        //     $color = "green";
        //     if ($totalUser > 0) {
        //         for ($i = 0; $i < $totalUser; $i++) {
        //             $user_id = $permissionUser[$i];
        //             $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
        //             $stmt = $connect->prepare($query);
        //             $stmt->execute();
        //         }
        //     }
        // } else {
        //     if ($permissionType == "All instructor") {
        //         $color = "yellow";
        //     } else {
        //         $color = "blue";
        //     }
        //     $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
        //     $stmt = $connect->prepare($query);
        //     $stmt->execute();
        // }

        // if (isset($permissionUser)) {
        //     // $userId = $_REQUEST['userId'];
        //     $totalUser = count($permissionUser);
        //     $color = "green";
        //     if ($totalUser > 0) {
        //         for ($i = 0; $i < $totalUser; $i++) {
        //             $user_id = $permissionUser[$i];
        //             $query = "INSERT INTO phasefilepermission (fileId,phaseId,permissionType) VALUES ('$lastId','$phaseId','readAndWrite')";
        //             $stmt = $connect->prepare($query);
        //             $stmt->execute();
        //         }
        //     }
        // } else {
        //     if ($permissionType == "All instructor") {
        //         $color = "yellow";
        //     } else {
        //         $color = "blue";
        //     }
        //     $query = "INSERT INTO phasefilepermission (fileId,phaseId,permissionType) VALUES ('$lastId','$phaseId','readAndWrite')";
        //     $stmt = $connect->prepare($query);
        //     $stmt->execute();
        // }
        $_SESSION['success'] = "Locations Inserted successfully..";

        //     $name++;
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['onlineLink'])) {
    $phase = $_REQUEST["link"];
    $countPhase = $_REQUEST['link'];
    $phaseName = $_REQUEST['linkName'];
    $senderId = $_REQUEST['senderId'];
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
    // $permissionType = $_REQUEST['permissionType'];
    // $permissionUser = $_REQUEST['userId'];
    $mainCheckFileId = $_REQUEST['mainCheckFileId'];

    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    // $permissionCategory = $_REQUEST['permissionCategory'];

    // while ($name < count($countPhase)) {
    $value = $phase;



    if ($phaseName == '') {
        $string = $phase;
        $substring = substr($string, 0, 10);
        $location = $substring;
    } else {
        $location = $phaseName;
    }

    // $dupliQuery = $connect->query("SELECT count(*) FROM chats WHERE lastName = '$location'");
    // $dupliData = $dupliQuery->fetchColumn();
    // echo $dupliData;
    // die();

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
        $lastId = $lastQ->fetchColumn();

        $query = "INSERT INTO checklistfile (fileId,checkListId) VALUES ('$lastId','$mainCheckFileId')";
        $stmt = $connect->prepare($query);
        $stmt->execute();

        // $sql = "INSERT INTO chats (senderId,receiverId,messages,date,loca) VALUES ('$userId','$senderId','$lastId',NOW(),'userfile')";
        // $stmt = $connect->prepare($sql);
        // $stmt->execute();

        // if ($role == "super admin") {

        //     $shopShelfDel = "DELETE FROM tempbrief WHERE briefId = '$briefCase_ID' AND folderId = '$folder_ID' AND shopId = '$shopId' AND userId = '$userId'";
        //     $shopShelfStatement = $connect->prepare($shopShelfDel);
        //     $shopShelfStatement->execute();
        // }

        // $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
        // $lastId = $lastQ->fetchColumn();

        // if (isset($permissionUser)) {
        //     // $userId = $_REQUEST['userId'];
        //     $totalUser = count($permissionUser);
        //     $color = "green";
        //     if ($totalUser > 0) {
        //         for ($i = 0; $i < $totalUser; $i++) {
        //             $user_id = $permissionUser[$i];
        //             $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
        //             $stmt = $connect->prepare($query);
        //             $stmt->execute();
        //         }
        //     }
        // } else {
        //     if ($permissionType == "All instructor") {
        //         $color = "yellow";
        //     } else {
        //         $color = "blue";
        //     }
        //     $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
        //     $stmt = $connect->prepare($query);
        //     $stmt->execute();
        // }

        // if (isset($permissionUser)) {
        //     // $userId = $_REQUEST['userId'];
        //     $totalUser = count($permissionUser);
        //     $color = "green";
        //     if ($totalUser > 0) {
        //         for ($i = 0; $i < $totalUser; $i++) {
        //             $user_id = $permissionUser[$i];
        //             $query = "INSERT INTO phasefilepermission (fileId,phaseId,permissionType) VALUES ('$lastId','$phaseId','readAndWrite')";
        //             $stmt = $connect->prepare($query);
        //             $stmt->execute();
        //         }
        //     }
        // } else {
        //     if ($permissionType == "All instructor") {
        //         $color = "yellow";
        //     } else {
        //         $color = "blue";
        //     }
        //     $query = "INSERT INTO phasefilepermission (fileId,phaseId,permissionType) VALUES ('$lastId','$phaseId','readAndWrite')";
        //     $stmt = $connect->prepare($query);
        //     $stmt->execute();
        // }
        $_SESSION['success'] = "Locations Inserted successfully..";

        //     $name++;
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['addSelectFile'])) {
    $mainCheckFileId = $_REQUEST['mainCheckFileId'];
    $fileId = $_REQUEST['fileId'];
    $name = 0;
    while ($name < count($fileId)) {
        $fId = $fileId[$name];
        $query = "INSERT INTO checklistfile (fileId,checkListId) VALUES ('$fId','$mainCheckFileId')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $name++;
    }

    $_SESSION['success'] = "File Inserted successfully..";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
