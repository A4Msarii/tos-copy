<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['certificateId'])) {
    $certificateId = $_REQUEST['certificateId'];
    $containerHtml = $_REQUEST['containerHtml'];

    $cerQ = $connect->query("SELECT count(*) FROM originalcertificate WHERE certificateId = '$certificateId'");
    $cerData = $cerQ->fetchColumn();
    if ($cerData > 0) {
        $updateQuery = "UPDATE originalcertificate SET certificateHtml = '$containerHtml' WHERE certificateId = '$certificateId'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    } else {
        $sql = "INSERT INTO originalcertificate (certificateId,certificateHtml) VALUES ('$certificateId','$containerHtml')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    }
}
