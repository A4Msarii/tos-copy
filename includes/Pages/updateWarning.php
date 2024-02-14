<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['updateWarning'])) {

    $warningId = $_REQUEST['warningId'];
    $notId = $_REQUEST['notId'];

    $updateQuery = "UPDATE notifications SET data = '$warningId' WHERE id = '$notId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Notification Updated Successfully";
    header("Location:CAP.php");
}
