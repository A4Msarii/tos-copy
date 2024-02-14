<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['perCheckId'])) {
    $perCheckId = $_REQUEST['perCheckId'];
    $perComment = $_REQUEST['perComment'];
    $perCat = $_REQUEST['perCat'];
    $perPri = $_REQUEST['perPri'];
    $perSta = $_REQUEST['perSta'];
    $perDate = $_REQUEST['perDate'];
    $perDesc = $_REQUEST['perDesc'];

    $updateQuery = "UPDATE per_checklist SET description = '$perDesc',status = '$perSta',priority = '$perPri',comment = '$perComment',category = '$perCat' WHERE id = '$perCheckId'";
    // echo $updateQuery;
    // die();
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}

if (isset($_REQUEST['perSubCheckId'])) {
    $perCheckId = $_REQUEST['perSubCheckId'];
    $perComment = $_REQUEST['perComment'];
    $perCat = $_REQUEST['perCat'];
    $perPri = $_REQUEST['perPri'];
    $perSta = $_REQUEST['perSta'];
    $perDate = $_REQUEST['perDate'];
    $perDesc = $_REQUEST['perDesc'];

    $updateQuery = "UPDATE per_subchecklist SET description = '$perDesc',status = '$perSta',priority = '$perPri',comment = '$perComment',date = '$perDate',category = '$perCat' WHERE id = '$perCheckId'";
    // echo $updateQuery;
    // die();
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}

if (isset($_REQUEST['mainCheckId'])) {
    $mainCheckId = $_REQUEST['mainCheckId'];
    $subCheckVal = $_REQUEST['subCheckVal'];
    $sql = "INSERT INTO per_subchecklist (user_id,name,main_checklist_id) VALUES ('$userId','$subCheckVal','$mainCheckId')";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
}

if (isset($_REQUEST['mainCheckIdDelete'])) {
    $mainCheckIdDelete = $_REQUEST['mainCheckIdDelete'];
    $sql = "DELETE FROM per_checklist WHERE id = '$mainCheckIdDelete' AND user_id = '$userId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM per_subchecklist WHERE main_checklist_id = '$mainCheckIdDelete' AND user_id = '$userId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM per_check_sub_checklist WHERE checkListId = '$mainCheckIdDelete' AND userId = '$userId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    
    $sql = "DELETE FROM per_subchecklistfile WHERE checkId = '$mainCheckIdDelete' AND user_id = '$userId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
}
