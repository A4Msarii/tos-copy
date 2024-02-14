<?php
session_start();
$user_Id = $_SESSION['login_id'];
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['shareCheck'])) {
    $permissionRole = $_REQUEST['permissionRole'];
    $userId = $_REQUEST['userId'];
    $mainCheckId = $_REQUEST['mainCheckId'];
    $permissionType = $_REQUEST['permissionType'];

    $fetchCheckList = $connect->query("SELECT * FROM per_checklist WHERE id = '$mainCheckId'");
    $checkData = $fetchCheckList->fetch();
    $title = $checkData['title'];
    $desc = $checkData['description'];
    $status = $checkData['status'];
    $priority = $checkData['priority'];
    $comment = $checkData['comment'];
    $category = $checkData['category'];
    $color = $checkData['color'];
    $date = $checkData['date'];


    if ($userId) {
        $totalUser = count($userId);
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $userId[$i];
                $query_title = "INSERT INTO per_checklist (user_id,title,description,status,priority,comment,date,category,color,mainCheckId,sharedType,perType) VALUES ('$user_id','$title','$desc','$status','$priority','$comment','$date','$category','$color','$mainCheckId','particular','$permissionType')";
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
                $query_title = "INSERT INTO per_checklist (user_id,title,description,status,priority,comment,date,category,color,mainCheckId,sharedType,perType) VALUES ('$uId','$title','$desc','$status','$priority','$comment','$date','$category','$color','$mainCheckId','$permissionRole','$permissionType')";
                $statement_title = $connect->prepare($query_title);
                $statement_title->execute();
            }
            $_SESSION['success'] = "Shared Successfully";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            $fetchUser = $connect->query("SELECT * FROM users WHERE id != '$user_Id' AND role = '$permissionRole'");
            while ($userData = $fetchUser->fetch()) {
                $uId = $userData['id'];
                $query_title = "INSERT INTO per_checklist (user_id,title,description,status,priority,comment,date,category,color,mainCheckId,sharedType,perType) VALUES ('$uId','$title','$desc','$status','$priority','$comment','$date','$category','$color','$mainCheckId','$permissionRole','$permissionType')";
                $statement_title = $connect->prepare($query_title);
                $statement_title->execute();
            }
            $_SESSION['success'] = "Shared Successfully";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
    }
}
