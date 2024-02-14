<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['Cid'])) {
    echo $id = $_POST['Cid'];
    $course = $_POST['course'];
    // $manual=$_POST['manual'];
    $type = $_POST['type'];
    $vehtype = $_POST['vehtype'];
    $Symbol = $_POST['Symbol'];
    $Spon = $_POST['Spon'];
    $Location = $_POST['Location'];
    $Courseaim = $_POST['Courseaim'];
    $Classsize = $_POST['Classsize'];
    $vehicleName = $_REQUEST['vehicleName'];

    $courseDivision = $_REQUEST['courseDivision'];
    $courseDuration = $_REQUEST['courseDuration'];
    $courseDescription = $_REQUEST['courseDescription'];


    $query = "UPDATE `ctppage`
SET `course` = '$course',`symbol`='$Symbol',`Type`='$type',`VehicleType`='$vehtype',`Sponcors`='$Spon',`Location`='$Location',`CourseAim`='$Courseaim',`ClassSize`='$Classsize',`description`='$courseDescription',`duration`='$courseDuration',`divisionType`='$courseDivision',`vehicleName` = '$vehicleName' WHERE `CTPid`='$id'";
    // echo $query;
    $statement = $connect->prepare($query);
    $statement->execute();
    $_SESSION['success'] = "CTP Edited Successfully";

    header('Location:ctp_list.php');
}

if (isset($_REQUEST['editGoalBtn'])) {
    $goalCtpId = $_REQUEST['goalCtpId'];
    $editGoals = $_REQUEST['editGoals'];
    $goal1 = implode(",", $editGoals);
    $updateQuery = "UPDATE ctppage SET goal = '$goal1' WHERE CTPid = '$goalCtpId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "Goals Updated Successfully";
    header("Location:ctp_list.php");
}
