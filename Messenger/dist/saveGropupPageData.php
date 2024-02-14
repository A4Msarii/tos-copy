<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['pagesubmit'])) {
    $senderId = $_REQUEST['senderId'];
    $pagename = $_REQUEST['pagename'];
    $editorData = $_REQUEST['editorData'];
    $role = $_SESSION['role'];
    if ($role == 'instructor') {
        $color = "yellow";
    } elseif ($role == 'student') {
        $color = 'blue';
    } else {
        $color = 'red';
    }
    $date = $dt1 = date("Y-m-d");
    $createdBy = $_SESSION['nickname'];
    $updatedBy = $_SESSION['nickname'];
    $permissionCategory = $_REQUEST['permissionCategory'];

    $permissionType = $_REQUEST['permissionType'];
    $permissionUser = $_REQUEST['userId'];

    // $sql = "DELETE FROM checktyping WHERE userId = '$userId' AND chatId = '$senderId'";
    // $statement = $connect->prepare($sql);
    // $statement->execute();

    $query_editor = "INSERT INTO editor_data(pageName,editorData,createdAt,updatedAt,createdBy,updatedBy,userId,color,userRole,pageLoc) VALUES ('$pagename','$editorData','$date','$date','$createdBy','$updatedBy','$userId','$color','$role','chat')";
    $statement_editor = $connect->prepare($query_editor);
    $statement_editor->execute();

    $lastQ = $connect->query("SELECT id FROM editor_data ORDER BY id DESC LIMIT 1");
    $lastId = $lastQ->fetchColumn();

    $permissionPage = $lastId;

    $query1 = "INSERT INTO groupchats(senderId,groupId,messages,date,loca) VALUES ('$userId','$senderId','$lastId',NOW(),'page')";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();


    // $permissionType = $_REQUEST['permissionType'];
    // $permissionCategory = $_REQUEST['permissionCategory'];
    // $userId1 = $_REQUEST['userId'];

    if (isset($permissionUser)) {
        // $userId = $_REQUEST['userId'];
        $totalUser = count($permissionUser);
        $color = "green";
        if ($totalUser > 0) {
            for ($i = 0; $i < $totalUser; $i++) {
                $user_id = $permissionUser[$i];
                $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$user_id','$color','$permissionCategory')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $_SESSION['success'] = "Permission Given successfully..";
                header("Location:chat-group.php?groupId=" . $senderId . "");
            }
        }
    } else {
        if ($permissionType == "All instructor") {
            $color = "yellow";
        } else {
            $color = "blue";
        }
        $query = "INSERT INTO pagepermissions (pageId,permissionId,userId,color,permissionType) VALUES ('$lastId','$userId','$permissionType','$color','$permissionCategory')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $_SESSION['success'] = "Permission Given successfully..";
        header("Location:chat-group.php?groupId=" . $senderId . "");
    }

    // $_SESSION['warning'] = "Marks should be under or equal 100";
    header("Location:chat-group.php?groupId=" . $senderId . "");
}

if (isset($_REQUEST['editPage'])) {
    $editId = $_REQUEST['editId'];
    $pagename = $_REQUEST['pagename'];
    $editorData = $_REQUEST['editorData'];
    $senderId = $_REQUEST['senderId'];
    $mainId = $_REQUEST['mainId'];

    $updateQuery = "UPDATE editor_data SET pageName = '$pagename',editorData = '$editorData' WHERE id = '$editId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $updateQuery = "UPDATE groupchats SET msgEdit = 'Edited' WHERE id = '$mainId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    header("Location:chat-group.php?groupId=" . $senderId . "");
}
