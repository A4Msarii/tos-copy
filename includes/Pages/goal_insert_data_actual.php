<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['submit_goal_actual'])) {
    $classId = $_REQUEST['classId'];
    $goalactual = $_REQUEST['goalactual'];
    $name = 0;

    while ($name < count($goalactual)) {
        $goalactual1 = $goalactual[$name];

        $sql = "INSERT INTO table_golas (goalTable,goalName,goalClassId) VALUES ('actual','$goalactual1','$classId')";
        // echo $sql;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $name++;
    }
    // die();

    $_SESSION['success'] = "Goals Inserted Successfully";
    header("Location:phase-view.php");
}

if(isset($_REQUEST['submit_goal_sim'])){
    $classId = $_REQUEST['classId'];
    $goalsim = $_REQUEST['goalsim'];
    $name = 0;

    while ($name < count($goalsim)) {
        $goalsim1 = $goalsim[$name];

        $sql = "INSERT INTO table_golas (goalTable,goalName,goalClassId) VALUES ('sim','$goalsim1','$classId')";
        // echo $sql;
        // die();
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $name++;
    }
    // die();

    $_SESSION['success'] = "Goals Inserted Successfully";
    header("Location:phase-view.php");
}

if(isset($_REQUEST['submit_goal_academic'])){
    $classId = $_REQUEST['classId'];
    $goalacademic = $_REQUEST['goalacademic'];
    $name = 0;

    while ($name < count($goalacademic)) {
        $goalacademic1 = $goalacademic[$name];

        $sql = "INSERT INTO table_golas (goalTable,goalName,goalClassId) VALUES ('academic','$goalacademic1','$classId')";
        // echo $sql;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $name++;
    }
    // die();

    $_SESSION['success'] = "Goals Inserted Successfully";
    header("Location:phase-view.php");
}

if(isset($_REQUEST['submit_goal_test'])){
    $classId = $_REQUEST['classId'];
    $goaltest = $_REQUEST['goaltest'];
    $name = 0;

    while ($name < count($goaltest)) {
        $goaltest1 = $goaltest[$name];

        $sql = "INSERT INTO table_golas (goalTable,goalName,goalClassId) VALUES ('test','$goaltest1','$classId')";
        // echo $sql;
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $name++;
    }
    // die();

    $_SESSION['success'] = "Goals Inserted Successfully";
    header("Location:phase-view.php");
}


if(isset($_REQUEST['edit_goal_actual'])){
    $name = $_REQUEST['goalactual'];
    $id = $_REQUEST['id'];
    $query="UPDATE `table_golas` SET `goalName` = '$name' WHERE `id`='$id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $error="<div class='alert alert-success'>Goal Update successfully.</div>";
            header('Location:phase-view.php?error='.$error);
}
