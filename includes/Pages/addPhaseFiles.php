<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$role = $_SESSION['role'];

if (isset($_REQUEST['attachement'])) {
    $senderId = $_REQUEST['senderId'];
    $totalfiles = count($_FILES['file']['name']);
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
    $phaseId = $_REQUEST['phaseId'];
    $ctpId = $_REQUEST['ctpId'];

    $fetchShopId = $connect->query("SELECT id FROM shops WHERE ctpId = '$ctpId'");
    $shopId = $fetchShopId->fetchColumn();

    $fetchFolderId = $connect->query("SELECT id FROM folders WHERE phaseId = '$phaseId'");
    $folderId = $fetchFolderId->fetchColumn();


    for ($i = 0; $i < $totalfiles; $i++) {

        $filename = $_FILES['file']['name'][$i];


        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadPath = 'files/' . $filename;
        $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$filename'");
        $dupliData = $dupliQuery->fetchColumn();


        if ($dupliData > 0) {
            $_SESSION['warning'] = "Duplicate File Not Allowed";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {

            if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $uploadPath)) {

                $query1 = "INSERT INTO user_files (filename,type,folderId,shopid,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy,is_phase_resourse) VALUES ('$filename','$ext','$folderId','$shopId','$userId','$role','$color','$date','$date','$createdBy','$updatedBy','$phaseId')";
                $stmt1 = $connect->prepare($query1);
                $stmt1->execute();

                $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
                $lastId = $lastQ->fetchColumn();
                $file1 = $lastId;
                $color = "blue";
                $fetchAllInst = $connect->query("SELECT * FROM manage_role_course_phase WHERE phase_id = '$phaseId'");
                while ($instData = $fetchAllInst->fetch()) {
                    $insId = $instData['intructor'];
                    $bckupId = $instData['b_up_manger'];
                    $coId = $instData['id'];
                    $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color, permissionType) VALUES ('$file1','$userId','$insId','$color','readAndWrite')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();


                    $query = "INSERT INTO phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$file1','$insId','$phaseId','" . $instData['courseCode'] . "','" . $instData['courseName'] . "')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                    if ($bckupId != "") {
                        $query = "INSERT INTO phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$file1','$bckupId','$phaseId','" . $instData['courseCode'] . "','" . $instData['courseName'] . "')";
                        $stmt = $connect->prepare($query);
                        $stmt->execute();
                    }
                }




                $_SESSION['success'] = "File Inserted Successfully";
            } else {
                echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
            }
        }
    }

    header("Location:phase-view.php");
}
