<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['signatureData'])) {
    $signatureData = $_POST['signatureData'];

    $updateQuery = "UPDATE users SET signature = '$signatureData' WHERE id = '$userId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}
