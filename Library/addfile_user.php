<?php

include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();

if (isset($_REQUEST['submitfiles'])) {
    $totalfiles = count($_FILES['file']['name']);
    $briefCase_ID = $_REQUEST['briefCase_ID'];
    $folder_ID = $_REQUEST['folder_ID'];
    $userId = $_SESSION['login_id'];
    $userBriefcase = $_REQUEST['fileBriefcase'];
    $role = $_SESSION['role'];
    $permissionCategory = $_REQUEST['permissionCategory'];
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];

    $shopId = $_SESSION['shopId'];

    $permissionType = $_REQUEST['permissionType'];
    $permissionUser = $_REQUEST['userId'];

    for ($i = 0; $i < $totalfiles; $i++) {
        if ($role == "super admin") {
            $color = "red";
        } elseif ($role == 'instructor') {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $filename = $_FILES['file']['name'][$i];
        $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
        $dupliData = $dupliQuery->fetchColumn();

        $checkphase = $connect->query("SELECT phaseId FROM folders WHERE id = '$folder_ID'");
        $phaseId = $checkphase->fetchColumn();



        if ($dupliData > 0) {
            $_SESSION['warning'] = "Duplicate File Not Allowed";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {

            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $uploadPath = '../includes/pages/files/' . $filename;

            if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $uploadPath)) {
                if ($phaseId > 0) {
                    $query = "INSERT INTO user_files (filename,type,briefId,folderId,shopid,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy,fileBriefcase,is_phase_resourse) VALUES ('$filename','$ext','$briefCase_ID','$folder_ID','$shopId','$userId','$role','$color','$date','$date','$createdBy','$updatedBy','$userBriefcase','$phaseId')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                } else {
                    $query = "INSERT INTO user_files (filename,type,briefId,folderId,shopid,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy,fileBriefcase) VALUES ('$filename','$ext','$briefCase_ID','$folder_ID','$shopId','$userId','$role','$color','$date','$date','$createdBy','$updatedBy','$userBriefcase')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                }
                $last_id = $connect->lastInsertId();

                $fetchAllInst = $connect->query("SELECT * FROM manage_role_course_phase WHERE phase_id = '$phaseId'");
                while ($instData = $fetchAllInst->fetch()) {
                    $insId = $instData['intructor'];
                    $bckupId = $instData['b_up_manger'];
                    $coId = $instData['id'];
                    $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color, permissionType) VALUES ('$last_id','$userId','$insId','blue','readAndWrite')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();


                    $query = "INSERT INTO phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$last_id','$insId','$phaseId','" . $instData['courseCode'] . "','" . $instData['courseName'] . "')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                    if ($bckupId != "") {
                        $query = "INSERT INTO phasefilepermission (fileId,instId,backupId,phaseId,coursecode,courseName) VALUES ('$last_id','$bckupId','1','$phaseId','" . $instData['courseCode'] . "','" . $instData['courseName'] . "')";
                        $stmt = $connect->prepare($query);
                        $stmt->execute();
                    }
                }

                if ($role == "super admin") {

                    $shopShelfDel = "DELETE FROM tempbrief WHERE briefId = '$briefCase_ID' AND folderId = '$folder_ID' AND shopId = '$shopId' AND userId = '$userId'";
                    $shopShelfStatement = $connect->prepare($shopShelfDel);
                    $shopShelfStatement->execute();
                }

                $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
                $lastId = $lastQ->fetchColumn();

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
                $_SESSION['success'] = "File Inserted Successfully";
            } else {
                echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
            }
        }
    }


    header("Location:../includes/Pages/fheader1.php");
}
