<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['linkDeleteId'])) {
    $deleteIdfiles = $_REQUEST['linkDeleteId'];

    $sql = "DELETE FROM user_files WHERE id='$deleteIdfiles'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql1 = "DELETE FROM favouritefiles WHERE fileId='$deleteIdfiles'";
    $statement = $connect->prepare($sql1);
    $statement->execute();

    $_SESSION['danger'] = "Link Deleted Successfully";
    header("Location:../includes/Pages/fheader1.php");
}

if (isset($_REQUEST['adminFileDeleteId'])) {
    $deleteIdfiles = $_REQUEST['adminFileDeleteId'];

    $sql = "DELETE FROM files WHERE id='$deleteIdfiles'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql1 = "DELETE FROM favouritefiles WHERE fileId='$deleteIdfiles'";
    $statement = $connect->prepare($sql1);
    $statement->execute();

    $sql2 = "DELETE FROM filepermissionsfm WHERE fileId='$deleteIdfiles'";
    $statement = $connect->prepare($sql2);
    $statement->execute();

    $sql3 = "DELETE FROM file_briefcase WHERE file_id='$deleteIdfiles'";
    $statement = $connect->prepare($sql3);
    $statement->execute();

    $sql4 = "DELETE FROM file_briefcase_folder WHERE file_id='$deleteIdfiles'";
    $statement = $connect->prepare($sql4);
    $statement->execute();

    // $sql5 = "DELETE FROM file_briefcase_folder WHERE file_id='$deleteIdfiles'";
    // $statement = $connect->prepare($sql5);
    // $statement->execute();

    $_SESSION['danger'] = "Link Deleted Successfully";
    header("Location:../includes/Pages/fheader1.php");
}


