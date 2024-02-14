<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['division_color'])) {

    $id = $_REQUEST["id"];
    $favcolor = $_REQUEST['favcolor'];

    $query = "UPDATE division SET color = '$favcolor' WHERE id = '$id'";
    // echo $query;
    // die();
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:division.php');
}

if (isset($_REQUEST['phase_color'])) {
    $id = $_REQUEST["id"];
    $favcolor = $_REQUEST['favcolor'];

    $query = "UPDATE phase SET color = '$favcolor' WHERE id = '$id'";
    // echo $query;
    // die();
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:Next-home.php');
}

if (isset($_REQUEST['ctp_color'])) {
    $CTPid = $_REQUEST["CTPid"];
    $favcolor = $_REQUEST['favcolor'];

    $query = "UPDATE ctppage SET color = '$favcolor' WHERE CTPid = '$CTPid'";
    // echo $query;
    // die();
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:ctp_list.php');
}

if (isset($_REQUEST['cap_color'])) {
    $capId = $_REQUEST['capId'];
    $favcolor = $_REQUEST['favcolor'];

    $query = "UPDATE warning_data SET bgColor = '$favcolor' WHERE id = '$capId'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Color Added Successfully";

    header('Location:warning.php');
}

if (isset($_REQUEST['checklist_color'])) {
    $id = $_REQUEST["id"];
    $favcolor = $_REQUEST['favcolor'];

    $query = "UPDATE checklist SET color = '$favcolor' WHERE id = '$id'";
    // echo $query;
    // die();
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Color Added Successfully";

    header('Location:mainchecklist.php');
}

if (isset($_REQUEST['checklist_color_per'])) {
    $id = $_REQUEST["id"];
    $favcolor = $_REQUEST['favcolor'];

    $query = "UPDATE per_checklist SET color = '$favcolor' WHERE id = '$id'";
    // echo $query;
    // die();
    $statement = $connect->prepare($query);
    $statement->execute();

    $_SESSION['success'] = "Color Added Successfully";

    header('Location:per_checklist.php');
}
