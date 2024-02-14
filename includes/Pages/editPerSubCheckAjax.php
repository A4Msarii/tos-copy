<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['dataId'])) {
    $dataId = $_REQUEST['dataId'];
    $editedValue = $_REQUEST['editedValue'];
if($editedValue!=""){
    $updateQuery = "UPDATE per_subchecklist SET name = '$editedValue' WHERE id = '$dataId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}
}

if(isset($_REQUEST['delId'])){
    $delId = $_REQUEST['delId'];
 echo $sql = "DELETE FROM per_subchecklist WHERE id = '$delId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

}

if(isset($_REQUEST['perId'])){
    $perId = $_REQUEST['perId'];
    $perCol = $_REQUEST['perCol'];

    $updateQuery = "UPDATE per_subchecklist SET color = '$perCol' WHERE id = '$perId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}