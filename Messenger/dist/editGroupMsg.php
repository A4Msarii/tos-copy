<?php
session_start();
include("../../includes/config.php");
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['editChatMsgBtn'])) {
    $msgId = $_REQUEST['msgId'];
    $message = $_REQUEST['message'];
    $chatId = $_REQUEST['chatId'];

    $updateQuery = "UPDATE groupchats SET messages = '$message',msgEdit = 'Edited' WHERE id = '$msgId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if (isset($_REQUEST['deleteForme'])) {
    $chatId = $_REQUEST['chatId'];
    $deleteForMe = $_REQUEST['deleteForMe'];
    $query1 = "INSERT INTO groupdeleteforme(msgId,userId) VALUES ('$deleteForMe','$userId')";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if (isset($_REQUEST['deleteForevery'])) {
    $chatId = $_REQUEST['chatId'];
    $deleteForMe = $_REQUEST['deleteForEvery'];
    $sql = "DELETE FROM groupchats WHERE id = '$deleteForMe'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if(isset($_REQUEST['deleteFormeOther'])){
    $chatId = $_REQUEST['chatId'];
    $deleteForMe = $_REQUEST['deleteForMe'];
    $query1 = "INSERT INTO groupdeleteforme(msgId,userId) VALUES ('$deleteForMe','$userId')";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if (isset($_REQUEST['replyBtn'])) {
    $replyId = $_REQUEST['replyId'];
    $chatId = $_REQUEST['chatId'];
    $reply = $_REQUEST['reply'];
    $replyMessage = $_REQUEST['replyMessage'];

    $query1 = "INSERT INTO groupchats(senderId,groupId,messages,date,replyMsg,replyStatus) VALUES ('$userId','$chatId','$replyMessage',NOW(),'$reply','yes')";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if (isset($_REQUEST['forwardBtn'])) {
    $forwardMessage = $_REQUEST['forwardMessage'];
    $chatId = $_REQUEST['chatId'];
    $memberId = $_REQUEST['memberId'];

    $name = 0;
    while ($name < count($memberId)) {
        $memberId1 = $memberId[$name];
        $query1 = "INSERT INTO groupchats(senderId,groupId,messages,date) VALUES ('$userId','$memberId1','$forwardMessage',NOW())";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        $name++;
    }
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if (isset($_REQUEST['forwardDocBtn'])) {
    $chatId = $_REQUEST['chatId'];
    $forwardDoc = $_REQUEST['forwardDoc'];
    $docLastName = $_REQUEST['docLastName'];
    $docfileType = $_REQUEST['docfileType'];
    $memberId = $_REQUEST['memberId'];
    $forwardDocId = $_REQUEST['forwardDocId'];
    $name = 0;
    while ($name < count($memberId)) {
        $memberId1 = $memberId[$name];
        $sql = "INSERT INTO groupchats (senderId,groupId,messages,lastName,date,loca) VALUES ('$userId','$memberId1','$forwardDocId','file',NOW(),'userfile')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $name++;
    }
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if (isset($_REQUEST['editLinkBtn'])) {
    $linkId = $_REQUEST['linkId'];
    $linkType = $_REQUEST['linkType'];
    $chatId = $_REQUEST['chatId'];
    $linkName = $_REQUEST['linkName'];
    $lastName = $_REQUEST['lastName'];
    $mainId = $_REQUEST['mainId'];
    $str = str_replace('\\', '\\\\', $linkName);

    $updateQuery = "UPDATE user_files SET filename = '$str',lastName = '$lastName' WHERE id = '$linkId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $updateQuery = "UPDATE groupchats SET msgEdit = 'Edited' WHERE id = '$mainId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if (isset($_REQUEST['forwardLinkBtn'])) {
    $linkId = $_REQUEST['linkId'];
    $linkType = $_REQUEST['linkType'];
    $chatId = $_REQUEST['chatId'];
    $linkName = $_REQUEST['linkName'];
    $lastName = $_REQUEST['lastName'];
    $memberId = $_REQUEST['memberId'];
    $str = str_replace('\\', '\\\\', $linkName);
    $name = 0;

    while ($name < count($memberId)) {
        $memberId1 = $memberId[$name];
        $sql = "INSERT INTO groupchats (senderId,groupId,messages,date) VALUES ('$userId','$memberId1','$linkId',NOW())";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $name++;
    }
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

if (isset($_REQUEST['forwardEditorBtn'])) {
    $forwardEditorId = $_REQUEST['forwardEditorId'];
    $chatId = $_REQUEST['chatId'];
    $forwardEditorMessage = $_REQUEST['forwardEditorMessage'];
    $memberId = $_REQUEST['memberId'];

    // $editData = $connect->query("SELECT messages FROM chats WHERE id = '$forwardEditorId'");
    // $editDatas = $editData->fetchColumn();
    $name = 0;

    while ($name < count($memberId)) {
        $memberId1 = $memberId[$name];
        $query1 = "INSERT INTO groupchats(senderId,groupId,messages,date,loca) VALUES ('$userId','$memberId1','$forwardEditorId',NOW(),'page')";
        $statement1 = $connect->prepare($query1);
        $statement1->execute();
        $name++;
    }
    header("Location:chat-group.php?groupId=" . $chatId . "");
}

?>