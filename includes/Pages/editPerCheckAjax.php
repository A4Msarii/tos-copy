<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['dataId'])) {
    $dataId = $_REQUEST['dataId'];
    $editedValue = $_REQUEST['editedValue'];
        if($editedValue!=""){
    $updateQuery = "UPDATE per_checklist SET title = '$editedValue' WHERE id = '$dataId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
        }
}

if (isset($_REQUEST['mainCheckId'])) {
    $mainCheckId = $_REQUEST['mainCheckId'];
    $inputValues = $_REQUEST['inputValues'];
    $name = 0;
    while ($name < count($inputValues)) {
        $inputValues1 = $inputValues[$name];
        $query_title = "INSERT INTO per_subchecklist (user_id,name,main_checklist_id,date) VALUES ('$userId','$inputValues1','$mainCheckId',NOW())";
        $statement_title = $connect->prepare($query_title);
        $statement_title->execute();
        $name++;
    }
}

if (isset($_REQUEST['subCheck'])) {
    $subCheck = $_REQUEST['subCheck'];
    $mainCheck = $_REQUEST['mainCheck'];
    $query_title = "INSERT INTO per_check_sub_checklist (checkListId,subCheckListId,userId) VALUES ('$mainCheck','$subCheck','$userId')";
    $statement_title = $connect->prepare($query_title);
    $statement_title->execute();
}

if (isset($_REQUEST['subCheck1'])) {
    $subCheck = $_REQUEST['subCheck1'];
    $mainCheck = $_REQUEST['mainCheck1'];
    $sql = "DELETE FROM per_check_sub_checklist WHERE checkListId = '$mainCheck' AND subCheckListId = '$subCheck' AND userId = '$userId'";
    $statement = $connect->prepare($sql);
    $statement->execute();
}

if(isset($_REQUEST['delId'])){
    $delId = $_REQUEST['delId'];

    $sql = "DELETE FROM per_checklist WHERE id = '$delId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM per_check_sub_checklist WHERE checkListId = '$delId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

}

if(isset($_REQUEST['perId'])){
    $perId = $_REQUEST['perId'];
    $perCol = $_REQUEST['perCol'];

    $updateQuery = "UPDATE per_checklist SET color = '$perCol' WHERE id = '$perId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}