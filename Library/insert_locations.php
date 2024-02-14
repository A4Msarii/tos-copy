<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_POST["savephase"])) {
    if (empty($_POST["phase"])) {
        $_SESSION['danger'] = "Locations required..";
        header("Location:../includes/Pages/fheader1.php");
    } else {
        $briefCase_ID = $_REQUEST['briefCase_ID'];
        $folder_ID = $_REQUEST['folder_ID'];
        $countPhase = $_REQUEST['phase'];
        $phase = $_REQUEST["phase"];
        $type = $_REQUEST['linkType'];
        $phaseName = $_REQUEST['phaseName'];
        $userId = $_SESSION['login_id'];
        $permissionCategory = $_REQUEST['permissionCategory'];
        $shopId = $_SESSION['shopId'];
        $role = $_SESSION['role'];

        if ($role == 'instructor') {
            $color = "yellow";
        } elseif ($role == 'student') {
            $color = 'blue';
        } else {
            $color = 'red';
        }
        $role = $_SESSION['role'];
        $userBriefcase = $_REQUEST['fileBriefcase'];
        $name = 0;
        $permissionType = $_REQUEST['permissionType'];
        $permissionUser = $_REQUEST['userId'];

        $checkphase = $connect->query("SELECT phaseId FROM folders WHERE id = '$folder_ID'");
        $phaseId = $checkphase->fetchColumn();

        $date = $dt1 = date("Y-m-d");
        $createdBy = $_SESSION['nickname'];
        $updatedBy = $_SESSION['nickname'];
        while ($name < count($countPhase)) {
            $value = $phase[$name];



            if ($phaseName[$name] == '') {
                $string = $phase[$name];
                $substring = substr($string, 0, 10);
                $location = $substring;
            } else {
                $location = $phaseName[$name];
            }

            $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
            $dupliData = $dupliQuery->fetchColumn();
            // echo $dupliData;
            // die();
            if ($dupliData > 0) {
                $_SESSION['danger'] = "Duplicate File Not Allowed...";
            } else {

                $value = $phase[$name];
                $str = $phase[$name];

                if ($phaseId > 0) {
                    $sql = "INSERT INTO user_files (filename, lastName, type, briefId, folderId, shopid, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileBriefcase,is_phase_resourse) VALUES (:filename, :lastName, :type, :briefId, :folderId, :shopid, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileBriefcase, :isPhase)";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':filename', $str);
                    $stmt->bindParam(':lastName', $location);
                    $stmt->bindParam(':type', $type);
                    $stmt->bindParam(':briefId', $briefCase_ID);
                    $stmt->bindParam(':folderId', $folder_ID);
                    $stmt->bindParam(':shopid', $shopId);
                    $stmt->bindParam(':user_id', $userId);
                    $stmt->bindParam(':role', $role);
                    $stmt->bindParam(':color', $color);
                    $stmt->bindParam(':createdAt', $date);
                    $stmt->bindParam(':updatedAt', $date);
                    $stmt->bindParam(':createdBy', $createdBy);
                    $stmt->bindParam(':updatedBy', $updatedBy);
                    $stmt->bindParam(':fileBriefcase', $userBriefcase);
                    $stmt->bindParam(':isPhase', $phaseId);
                    $stmt->execute();
                } else {
                    $sql = "INSERT INTO user_files (filename, lastName, type, briefId, folderId, shopid, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileBriefcase) VALUES (:filename, :lastName, :type, :briefId, :folderId, :shopid, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileBriefcase)";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':filename', $str);
                    $stmt->bindParam(':lastName', $location);
                    $stmt->bindParam(':type', $type);
                    $stmt->bindParam(':briefId', $briefCase_ID);
                    $stmt->bindParam(':folderId', $folder_ID);
                    $stmt->bindParam(':shopid', $shopId);
                    $stmt->bindParam(':user_id', $userId);
                    $stmt->bindParam(':role', $role);
                    $stmt->bindParam(':color', $color);
                    $stmt->bindParam(':createdAt', $date);
                    $stmt->bindParam(':updatedAt', $date);
                    $stmt->bindParam(':createdBy', $createdBy);
                    $stmt->bindParam(':updatedBy', $updatedBy);
                    $stmt->bindParam(':fileBriefcase', $userBriefcase);
                    $stmt->execute();
                }

                if ($role == "super admin") {

                    $shopShelfDel = "DELETE FROM tempbrief WHERE briefId = '$briefCase_ID' AND folderId = '$folder_ID' AND shopId = '$shopId' AND userId = '$userId'";
                    $shopShelfStatement = $connect->prepare($shopShelfDel);
                    $shopShelfStatement->execute();
                }

                $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
                $lastId = $lastQ->fetchColumn();

                $fetchAllInst = $connect->query("SELECT * FROM manage_role_course_phase WHERE phase_id = '$phaseId'");
                while ($instData = $fetchAllInst->fetch()) {
                    $insId = $instData['intructor'];
                    $bckupId = $instData['b_up_manger'];
                    $coId = $instData['id'];
                    $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color, permissionType) VALUES ('$lastId','$userId','$insId','blue','readAndWrite')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();


                    $query = "INSERT INTO phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$lastId','$insId','$phaseId','". $instData['courseCode'] ."','". $instData['courseName'] ."')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                    if ($bckupId != "") {
                        $query = "INSERT INTO phasefilepermission (fileId,instId,backupId,phaseId,coursecode,courseName) VALUES ('$lastId','$bckupId','1','$phaseId','". $instData['courseCode'] ."','". $instData['courseName'] ."')";
                        $stmt = $connect->prepare($query);
                        $stmt->execute();
                    }
                }

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
                $_SESSION['success'] = "Locations Inserted successfully..";
            }

            $name++;
        }

        header("Location:../includes/Pages/fheader1.php");
    }
}

if (isset($_REQUEST['savelink'])) {
    if (empty($_POST["link"])) {
        $_SESSION['danger'] = "Locations required..";
        header("Location:../includes/Pages/fheader1.php");
    } else {
        $briefCase_ID = $_REQUEST['briefCase_ID'];
        $folder_ID = $_REQUEST['folder_ID'];
        $countPhase = $_REQUEST['link'];
        $type = $_POST['linkType'];
        $phase = $_POST["link"];
        $phaseName = $_REQUEST['linkName'];
        $permissionCategory = $_REQUEST['permissionCategory'];

        $role = $_SESSION['role'];
        if ($role == 'instructor') {
            $color = "yellow";
        } elseif ($role == 'student') {
            $color = 'blue';
        } else {
            $color = 'red';
        }
        $shopId = $_SESSION['shopId'];
        $userId = $_SESSION['login_id'];
        $userBriefcase = $_REQUEST['fileBriefcase'];
        $name = 0;

        $permissionType = $_REQUEST['permissionType'];
        $permissionUser = $_REQUEST['userId'];
        $date = $dt1 = date("Y-m-d");
        $createdBy = $_SESSION['nickname'];
        $updatedBy = $_SESSION['nickname'];
        $checkphase = $connect->query("SELECT phaseId FROM folders WHERE id = '$folder_ID'");
        $phaseId = $checkphase->fetchColumn();


        while ($name < count($countPhase)) {
            if ($phaseName[$name] == '') {
                $url = $phase[$name];
                $substring = substr($url, 0, 10);
                $location = $substring;
            } else {
                $location = $phaseName[$name];
            }

            $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
            $dupliData = $dupliQuery->fetchColumn();

            if ($dupliData > 0) {
                $_SESSION['danger'] = "Duplicate File Not Allowed...";
            } else {

                $value = $phase[$name];
                $str = $phase[$name];
                if ($phaseId > 0) {
                    $sql = "INSERT INTO user_files (filename, lastName, type, briefId, folderId, shopid, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileBriefcase,is_phase_resourse) VALUES (:filename, :lastName, :type, :briefId, :folderId, :shopid, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileBriefcase, :isPhase)";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':filename', $str);
                    $stmt->bindParam(':lastName', $location);
                    $stmt->bindParam(':type', $type);
                    $stmt->bindParam(':briefId', $briefCase_ID);
                    $stmt->bindParam(':folderId', $folder_ID);
                    $stmt->bindParam(':shopid', $shopId);
                    $stmt->bindParam(':user_id', $userId);
                    $stmt->bindParam(':role', $role);
                    $stmt->bindParam(':color', $color);
                    $stmt->bindParam(':createdAt', $date);
                    $stmt->bindParam(':updatedAt', $date);
                    $stmt->bindParam(':createdBy', $createdBy);
                    $stmt->bindParam(':updatedBy', $updatedBy);
                    $stmt->bindParam(':fileBriefcase', $userBriefcase);
                    $stmt->bindParam(':isPhase', $phaseId);
                    $stmt->execute();
                } else {
                    $sql = "INSERT INTO user_files (filename, lastName, type, briefId, folderId, shopid, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileBriefcase) VALUES (:filename, :lastName, :type, :briefId, :folderId, :shopid, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileBriefcase)";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':filename', $str);
                    $stmt->bindParam(':lastName', $location);
                    $stmt->bindParam(':type', $type);
                    $stmt->bindParam(':briefId', $briefCase_ID);
                    $stmt->bindParam(':folderId', $folder_ID);
                    $stmt->bindParam(':shopid', $shopId);
                    $stmt->bindParam(':user_id', $userId);
                    $stmt->bindParam(':role', $role);
                    $stmt->bindParam(':color', $color);
                    $stmt->bindParam(':createdAt', $date);
                    $stmt->bindParam(':updatedAt', $date);
                    $stmt->bindParam(':createdBy', $createdBy);
                    $stmt->bindParam(':updatedBy', $updatedBy);
                    $stmt->bindParam(':fileBriefcase', $userBriefcase);
                    $stmt->execute();
                }

                if ($role == "super admin") {

                    $shopShelfDel = "DELETE FROM tempbrief WHERE briefId = '$briefCase_ID' AND folderId = '$folder_ID' AND shopId = '$shopId' AND userId = '$userId'";
                    $shopShelfStatement = $connect->prepare($shopShelfDel);
                    $shopShelfStatement->execute();
                }

                $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
                $lastId = $lastQ->fetchColumn();

                $fetchAllInst = $connect->query("SELECT * FROM manage_role_course_phase WHERE phase_id = '$phaseId'");
                while ($instData = $fetchAllInst->fetch()) {
                    $insId = $instData['intructor'];
                    $bckupId = $instData['b_up_manger'];
                    $coId = $instData['id'];
                    $query = "INSERT INTO filepermissions (pageId,permissionId,userId,color, permissionType) VALUES ('$lastId','$userId','$insId','blue','readAndWrite')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();


                    $query = "INSERT INTO phasefilepermission (fileId,instId,phaseId,refrenceid) VALUES ('$lastId','$insId','$phaseId','$coId')";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                    if ($bckupId != "") {
                        $query = "INSERT INTO phasefilepermission (fileId,instId,backupId,phaseId,refrenceid) VALUES ('$lastId','$bckupId','1','$phaseId','$coId')";
                        $stmt = $connect->prepare($query);
                        $stmt->execute();
                    }
                }

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
                $_SESSION['success'] = "Locations Inserted successfully..";
            }



            $name++;
        }

        header("Location:../includes/Pages/fheader1.php");
    }
}
