<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['attachement'])) {
    $checkId = $_REQUEST['checkId'];
    $subCheckId = $_REQUEST['subCheckId'];
    $totalfiles = count($_FILES['file']['name']);
    $ctpId = $_REQUEST['ctpId'];

    for ($i = 0; $i < $totalfiles; $i++) {
        // if ($role == "super admin") {
        //     $color = "red";
        // } elseif ($role == 'instructor') {
        //     $color = "yellow";
        // } else {
        //     $color = "blue";
        // }
        $filename = $_FILES['file']['name'][$i];
        $dupliQuery = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE filename = '$filename'");
        $dupliData = $dupliQuery->fetchColumn();



        if ($dupliData > 0) {
            $_SESSION['warning'] = "Duplicate File Not Allowed";
        } else {

            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $uploadPath = 'files/' . $filename;

            if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $uploadPath)) {
                $query = "INSERT INTO subchecklistfiles (filename,fileType,checkId,subCheckId,ctpId) VALUES ('$filename','$ext','$checkId','$subCheckId',$ctpId)";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                // $last_id = $connect->lastInsertId();

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
                $_SESSION['success'] = "File Inserted Successfully";
            } else {
                echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
            }
        }
    }
    header("Location:mainchecklist.php");
}

if (isset($_REQUEST['driveLink'])) {
    $checkId = $_REQUEST['checkId'];
    $subCheckId = $_REQUEST['subCheckId'];
    $phase = $_REQUEST["phase"];
    $countPhase = $_REQUEST['phase'];
    $phaseName = $_REQUEST['phaseName'];
    $ctpId = $_REQUEST['ctpId'];
    $type = "offline";
    $name = 0;

    while ($name < count($countPhase)) {
        $value = $phase[$name];



        if ($phaseName[$name] == '') {
            $string = $phase[$name];
            $substring = substr($string, 0, 10);
            $location = $substring;
        } else {
            $location = $phaseName[$name];
        }

        $dupliQuery = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE lastName = '$location'");
        $dupliData = $dupliQuery->fetchColumn();
        // echo $dupliData;
        // die();
        if ($dupliData > 0) {
            $_SESSION['danger'] = "Duplicate File Not Allowed...";
        } else {

            $str = str_replace('\\', '\\\\', $value);
            $sql = "INSERT INTO subchecklistfiles (fileName,lastName,fileType,checkId,subCheckId,ctpId) VALUES ('$str','$location','$type','$checkId','$subCheckId','$ctpId')";
            $stmt = $connect->prepare($sql);
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
            $_SESSION['success'] = "Locations Inserted successfully..";
        }

        $name++;
    }

    header("Location:mainchecklist.php");
}

if (isset($_REQUEST['onlineLink'])) {
    $checkId = $_REQUEST['checkId'];
    $subCheckId = $_REQUEST['subCheckId'];
    $phase = $_REQUEST["link"];
    $countPhase = $_REQUEST['link'];
    $phaseName = $_REQUEST['linkName'];
    $ctpId = $_REQUEST['ctpId'];
    $type = "online";
    $name = 0;

    while ($name < count($countPhase)) {
        $value = $phase[$name];



        if ($phaseName[$name] == '') {
            $string = $phase[$name];
            $substring = substr($string, 0, 10);
            $location = $substring;
        } else {
            $location = $phaseName[$name];
        }

        $dupliQuery = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE lastName = '$location'");
        $dupliData = $dupliQuery->fetchColumn();
        // echo $dupliData;
        // die();
        if ($dupliData > 0) {
            $_SESSION['danger'] = "Duplicate File Not Allowed...";
        } else {

            $str = str_replace('\\', '\\\\', $value);
            $sql = "INSERT INTO subchecklistfiles (fileName,lastName,fileType,checkId,subCheckId,ctpId) VALUES ('$str','$location','$type','$checkId','$subCheckId','$ctpId')";
            $stmt = $connect->prepare($sql);
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
            $_SESSION['success'] = "Locations Inserted successfully..";
        }

        $name++;
    }

    header("Location:mainchecklist.php");
}

if (isset($_REQUEST['pagesubmit'])) {
    $checkId = $_REQUEST['checkId'];
    $subCheckId = $_REQUEST['subCheckId'];
    $ctpId = $_REQUEST['ctpId'];
    $type = "editorData";

    $pagename = $_REQUEST['pagename'];
    $editorData = $_REQUEST['editorData'];

    $sql = "INSERT INTO subchecklistfiles (fileName,lastName,fileType,checkId,subCheckId,ctpId) VALUES ('$pagename','$editorData','$type','$checkId','$subCheckId','$ctpId')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    header("Location:mainchecklist.php");
}
