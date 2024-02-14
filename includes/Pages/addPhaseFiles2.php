<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$role = $_SESSION['role'];
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
    $permissionType = $_REQUEST['permissionType'];
    $permissionUser = $_REQUEST['userId'];
    $phaseId = $_REQUEST['phaseId'];
    $ctpId = $_REQUEST['ctpId'];

    $fetchShopId = $connect->query("SELECT id FROM shops WHERE ctpId = '$ctpId'");
    $shopId = $fetchShopId->fetchColumn();

    $fetchFolderId = $connect->query("SELECT id FROM folders WHERE phaseId = '$phaseId'");
    $folderId = $fetchFolderId->fetchColumn();

    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $permissionCategory = $_REQUEST['permissionCategory'];

    while ($name < count($countPhase)) {
        $value = $phase[$name];



        if ($phaseName[$name] == '') {
            $string = $phase[$name];
            $substring = substr($string, 0, 10);
            $location = $substring;
        } else {
            $location = $phaseName[$name];
        }
        $yes = "yes";
        $str = str_replace('\\', '\\\\', $value);
        $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
        $dupliData = $dupliQuery->fetchColumn();


        if ($dupliData > 0) {
            $_SESSION['warning'] = "Duplicate File Not Allowed";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {

            $sql = "INSERT INTO user_files (filename, lastName, type,folderId,shopid, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy,is_phase_resourse) VALUES (:filename, :lastName, :type, :folderId, :shopId, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy,:yes)";


            $stmt = $connect->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':filename', $str);
            $stmt->bindParam(':lastName', $location);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':folderId', $folderId);
            $stmt->bindParam(':shopId', $shopId);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':createdAt', $date);
            $stmt->bindParam(':updatedAt', $date);
            $stmt->bindParam(':createdBy', $createdBy);
            $stmt->bindParam(':updatedBy', $updatedBy);
            $stmt->bindParam(':yes', $phaseId);
            // Execute the statement
            $stmt->execute();


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
                    $query = "INSERT INTO phasefilepermission (fileId,instId,backupId,phaseId,coursecode,courseName) VALUES ('$file1','$bckupId','1','$phaseId','" . $instData['courseCode'] . "','" . $instData['courseName'] . "')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                }
            }

            $_SESSION['success'] = "Locations Inserted successfully..";

            $name++;
        }
    }

    header("Location:phase-view.php");
}
