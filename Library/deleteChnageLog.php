<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['changeLogId'])) {
    $changeLogId = $_REQUEST['changeLogId'];
    $pageId = $_REQUEST['pageId'];

    $sql = "DELETE FROM newpagechangelogdata WHERE id='$changeLogId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "File Deleted Successfully";
    header("Location:revision.php?revisionId=".$pageId);
}
?>