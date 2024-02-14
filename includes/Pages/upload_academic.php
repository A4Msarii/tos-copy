<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$role = $_SESSION['role'];
//var_dump(isset($_POST["upload"]));
echo $id = $_POST['id'];

if (isset($_POST["attachement"])) {
    $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $max_file_size = 1000;
    $folder = "files/";
    $new_size = $file_size / $max_file_size * 1024 * 1024;
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ', '-', $new_file_name);

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
    $dupliQuery = $connect->query("SELECT count(*) FROM user_files WHERE filename = '$final_file'");
    $dupliData = $dupliQuery->fetchColumn();


    if ($dupliData > 0) {
        $_SESSION['warning'] = "Duplicate File Not Allowed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $ext = pathinfo($final_file, PATHINFO_EXTENSION);

            $query = "INSERT INTO user_files (filename,type,user_id,role,color,createdAt,updatedAt,createdBy,updatedBy,fileLocation) VALUES ('$final_file','$ext','$userId','$role','$color','$date','$date','$createdBy','$updatedBy','academic')";
            $stmt = $connect->prepare($query);
            $stmt->execute();

            $lastQ = $connect->query("SELECT id FROM user_files ORDER BY id DESC LIMIT 1");
            $lastId = $lastQ->fetchColumn();

            $query = "UPDATE `academic` SET `file` = '$lastId',`type`='user_file' ,`size`='$new_size' WHERE `id`='$id'";
            var_dump($query);
            $statement = $connect->prepare($query);
            $statement->execute();

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

            $_SESSION['success'] = "Added";
            header('Location: phase-view.php');
        } else {

            header('Location: phase-view.php');
        }
    }
}
