<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$page_redirection = $_POST['page_redirection'];
$file_type = $_REQUEST['file_type'];

if (isset($_POST["savephase"])) {
    if (empty($_POST["phase"])) {

        $_SESSION['warning'] = "Location Required";
        if ($page_redirection == "admin") {
            header('Location:file_management.php');
            exit();
        }
        if ($page_redirection == "user") {
            header('Location:../../Library/file_management.php');
            exit();
        }
    } else {
        $briefCase_ID = 0;
        $folder_ID = 0;
        $countPhase = $_REQUEST['phase'];
        $phase = $_REQUEST["phase"];
        $type = "offline";
        $phaseName = $_REQUEST['phaseName'];
        $userId = $_SESSION['login_id'];
        $role = $_SESSION['role'];
        $date = date("Y-m-d");
        $createdBy = $_SESSION['nickname'];
        $updatedBy = $_SESSION['nickname'];
        if ($role == 'instructor') {
            $color = "yellow";
        } elseif ($role == 'student') {
            $color = 'blue';
        } else {
            $color = 'red';
        }
        $permissionCategory = $_REQUEST['permissionCategory'];
        // $userBriefcase = $_REQUEST['fileBriefcase'];
        $name = 0;
        $permissionType = $_REQUEST['permissionType'];
        $permissionUser = $_REQUEST['userId'];
        while ($name < count($countPhase)) {
            $value = $phase[$name];
            if ($phaseName[$name] == '') {
                $string = $phase[$name];
                $substring = substr($string, 0, 10);
                $location = $substring;
            } else {
                $location = $phaseName[$name];
            }
            $str = str_replace('\\', '\\\\', $value);
            $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
            $dupliData = $dupliQuery->fetchColumn();


            if ($dupliData > 0) {
                $_SESSION['warning'] = "Duplicate File Not Allowed";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            } else {

                $sql = "INSERT INTO user_files (filename, lastName, type, briefId, folderId, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileBriefcase) VALUES (:filename, :lastName, :type, :briefId, :folderId, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileBriefcase)";

                $stmt = $connect->prepare($sql);

                // Bind parameters
                $stmt->bindParam(':filename', $str);
                $stmt->bindParam(':lastName', $location);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':briefId', $briefCase_ID);
                $stmt->bindParam(':folderId', $folder_ID);
                $stmt->bindParam(':user_id', $userId);
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':color', $color);
                $stmt->bindParam(':createdAt', $date);
                $stmt->bindParam(':updatedAt', $date);
                $stmt->bindParam(':createdBy', $createdBy);
                $stmt->bindParam(':updatedBy', $updatedBy);
                $stmt->bindParam(':fileBriefcase', $userBriefcase);

                // Execute the statement
                $stmt->execute();

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

                $name++;
            }
        }
        $_SESSION['success'] = "Location Inserted Successfully";
        if ($page_redirection == "admin") {
            header('Location:file_management.php');
            exit();
        }
        if ($page_redirection == "user") {
            header('Location:../../Library/file_management.php');
            exit();
        }
    }
}

if (isset($_REQUEST['savelink'])) {
    if (empty($_POST["link"])) {

        $_SESSION['warning'] = "Locations Required";
        if ($page_redirection == "admin") {
            header('Location:file_management.php');
            exit();
        }
        if ($page_redirection == "user") {
            header('Location:../../Library/file_management.php');
            exit();
        }
    } else {
        $briefCase_ID = 0;
        $folder_ID = 0;
        $countPhase = $_REQUEST['link'];
        $type = "online";
        $phase = $_POST["link"];
        $phaseName = $_REQUEST['linkName'];
        $userId = $_SESSION['login_id'];
        $role = $_SESSION['role'];
        $date = date("Y-m-d");
        $createdBy = $_SESSION['nickname'];
        $updatedBy = $_SESSION['nickname'];
        $permissionCategory = $_REQUEST['permissionCategory'];

        if ($role == 'instructor') {
            $color = "yellow";
        } elseif ($role == 'student') {
            $color = 'blue';
        } else {
            $color = 'red';
        }
        // $userBriefcase = $_REQUEST['fileBriefcase'];
        $name = 0;

        $permissionType = $_REQUEST['permissionType'];
        $permissionUser = $_REQUEST['userId'];


        while ($name < count($countPhase)) {
            if ($phaseName[$name] == '') {
                $string = $phase[$name];
                $substring = substr($string, 0, 10);
                $location = $substring;
            } else {
                $location = $phaseName[$name];
            }

            $value = $phase[$name];
            $str = str_replace('\\', '\\\\', $value);
            $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$str'");
            $dupliData = $dupliQuery->fetchColumn();


            if ($dupliData > 0) {
                $_SESSION['warning'] = "Duplicate File Not Allowed";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            } else {

                $sql = "INSERT INTO user_files (filename, lastName, type, briefId, folderId, user_id, role, color, createdAt, updatedAt, createdBy, updatedBy, fileBriefcase) VALUES (:filename, :lastName, :type, :briefId, :folderId, :user_id, :role, :color, :createdAt, :updatedAt, :createdBy, :updatedBy, :fileBriefcase)";

                $stmt = $connect->prepare($sql);

                // Bind parameters
                $stmt->bindParam(':filename', $str);
                $stmt->bindParam(':lastName', $location);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':briefId', $briefCase_ID);
                $stmt->bindParam(':folderId', $folder_ID);
                $stmt->bindParam(':user_id', $userId);
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':color', $color);
                $stmt->bindParam(':createdAt', $date);
                $stmt->bindParam(':updatedAt', $date);
                $stmt->bindParam(':createdBy', $createdBy);
                $stmt->bindParam(':updatedBy', $updatedBy);
                $stmt->bindParam(':fileBriefcase', $userBriefcase);

                // Execute the statement
                $stmt->execute();

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

                $name++;
            }
        }
        $_SESSION['success'] = "Location Inserted Successfully";
        if ($page_redirection == "admin") {
            header('Location:file_management.php');
            exit();
        }
        if ($page_redirection == "user") {
            header('Location:../../Library/file_management.php');
            exit();
        }
    }
}
