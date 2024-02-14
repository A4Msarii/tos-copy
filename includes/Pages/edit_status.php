<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['saveit'])) {
    $ctp = $_REQUEST['ctp'];
    $c_id = $_REQUEST['id'];
    $code = $_REQUEST['code'];
    $description = $_REQUEST['description'];
    $explanation = $_REQUEST['explanation'];
    $progression = $_REQUEST['progression'];

    $updateQuery = "UPDATE status SET code = '$code',ctp = '$ctp',description = '$description', explanation = '$explanation', progression = '$progression' WHERE id = '$c_id'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:status.php');
}
