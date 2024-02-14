<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$user_Id = $_SESSION['login_id'];

if(isset($_REQUEST['shareCoursePermission'])){
    $userId = $_REQUEST['userId'];
    $permissionRole = $_REQUEST['permissionRole'];
    $permissionCourse = $_REQUEST['permissionCourse'];

    if ($userId) {
        $totalUser = count($userId);
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query_title = "INSERT INTO coursepermission (courseId,permissionUser,userId) VALUES ('$permissionCourse','$user_id','$user_Id')";
                $statement_title = $connect->prepare($query_title);
                $statement_title->execute();
            }
            $_SESSION['success'] = "Shared Successfully";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
    } else {
        if ($permissionRole == "everyone") {
            $fetchUser = $connect->query("SELECT * FROM users WHERE id != '$user_Id'");
            while ($userData = $fetchUser->fetch()) {
                $uId = $userData['id'];
                $query_title = "INSERT INTO coursepermission (courseId,permissionUser,userId) VALUES ('$permissionCourse','$uId','$user_Id')";
                $statement_title = $connect->prepare($query_title);
                $statement_title->execute();
            }
            $_SESSION['success'] = "Shared Successfully";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            $fetchUser = $connect->query("SELECT * FROM users WHERE id != '$user_Id' AND role = '$permissionRole'");
            while ($userData = $fetchUser->fetch()) {
                $uId = $userData['id'];
                $query_title = "INSERT INTO coursepermission (courseId,permissionUser,userId) VALUES ('$permissionCourse','$uId','$user_Id')";
                $statement_title = $connect->prepare($query_title);
                $statement_title->execute();
            }
            $_SESSION['success'] = "Shared Successfully";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
    }

}

?>