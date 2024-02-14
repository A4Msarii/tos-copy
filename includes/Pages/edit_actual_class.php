<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_POST['id'])) {
    echo $id = $_POST['id'];
    $actual_up = $_POST['actual'];
    $symbol_up = $_POST['symbol'];

    $query = "UPDATE `actual`
SET `actual` = '$actual_up',`symbol`='$symbol_up'
WHERE `id`='$id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo $query;
    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:phase-view.php');
}

if(isset($_REQUEST['addDays'])){
    $addAcutalDays = $_REQUEST['addAcutalDays'];
    $linesRequired = $_REQUEST['linesRequired'];
    $studentPerClass = $_REQUEST['studentPerClass'];

    $query = "UPDATE actual SET linesRequired = '$linesRequired',studentPerClass = '$studentPerClass' WHERE id = '$addAcutalDays'";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo $query;
    $_SESSION['success'] = "Data Added Successfully";

    header('Location:phase-view.php');

}
