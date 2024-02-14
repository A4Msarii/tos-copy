

<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_POST['id'])) {
    echo $id = $_POST['id'];
    $sim_up = $_POST['sim'];
    $symbol_up = $_POST['shortsim'];

    $query = "UPDATE `sim`
SET `sim` = '$sim_up',`shortsim`='$symbol_up'
WHERE `id`='$id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo $query;
    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:phase-view.php');
}

if (isset($_REQUEST['addDays'])) {
    $addSimDays = $_REQUEST['addSimDays'];
    $linesRequired = $_REQUEST['linesRequired'];
    $studentPerClass = $_REQUEST['studentPerClass'];

    $query = "UPDATE sim SET linesRequired = '$linesRequired',studentPerClass = '$studentPerClass' WHERE id = '$addSimDays'";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo $query;
    $_SESSION['success'] = "Data Added Successfully";

    header('Location:phase-view.php');
}
?>