<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['submit'])) {
    echo $id = $_POST['id'];
    $date = $_POST['date'];
    $topic = $_POST['topic'];
    $memomarks = $_POST['memomarks'];
    $comment = $_POST['comment'];
    $oldAttachemnt = $_REQUEST['oldAttachemnt'];
    if ($_FILES["attachemnt"]["name"]) {
        $filename = $_FILES["attachemnt"]["name"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadPath = 'files/' . $filename;
        move_uploaded_file($_FILES["attachemnt"]["tmp_name"], $uploadPath);
    } else {
        $filename = $oldAttachemnt;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
    }

    $query = "UPDATE `memo`
SET `date` = '$date',`memomarks`='$memomarks',`comment`='$comment',`fileName`='$filename',`fileExt`='$ext',`categoryId`='$topic'
WHERE `id`='$id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:memo.php');
}

if (isset($_REQUEST['submitAbsent'])) {
    echo $id = $_POST['id'];
    $date = $_POST['date'];
    $topic = $_POST['topic'];
    $memomarks = $_POST['memomarks'];
    $comment = $_POST['comment'];
    $oldAttachemnt = $_REQUEST['oldAttachemnt'];
    if ($_FILES["attachemnt"]["name"]) {
        $filename = $_FILES["attachemnt"]["name"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadPath = 'files/' . $filename;
        move_uploaded_file($_FILES["attachemnt"]["tmp_name"], $uploadPath);
    } else {
        $filename = $oldAttachemnt;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
    }

    $query = "UPDATE `memo`
SET `date` = '$date',`memomarks`='$memomarks',`comment`='$comment',`fileName`='$filename',`fileExt`='$ext',`categoryId`='$topic'
WHERE `id`='$id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:memo.php');
}
