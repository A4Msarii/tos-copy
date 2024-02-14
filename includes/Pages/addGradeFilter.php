<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpValue'])) {
    $ctpValue = $_REQUEST['ctpValue'];
    $gardeVal = $_REQUEST['gardeVal'];

    $sql = "DELETE FROM typegradefilter WHERE ctpId = '$ctpValue'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $query = "INSERT INTO typegradefilter (ctpId,gradeValue) VALUES ('$ctpValue','$gardeVal')";
    $stmt = $connect->prepare($query);
    $stmt->execute();
}

if (isset($_REQUEST['statusCtp'])) {
    $statusCtp = $_REQUEST['statusCtp'];
    $updateItemGrade = "UPDATE typegradefilter SET filterStatus = 'Active' WHERE ctpId = '$statusCtp'";
    $statement_editor = $connect->prepare($updateItemGrade);
    $statement_editor->execute();
}

if (isset($_REQUEST['disStatusCtp'])) {
    $statusCtp = $_REQUEST['disStatusCtp'];
    $updateItemGrade = "UPDATE typegradefilter SET filterStatus = 'Deactive' WHERE ctpId = '$statusCtp'";
    $statement_editor = $connect->prepare($updateItemGrade);
    $statement_editor->execute();
}
