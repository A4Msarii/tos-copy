<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['addHashOff'])) {
    $class_id = $_REQUEST['class_id'];
    $phase_id = $_REQUEST['phase_id'];
    $ctp_id1 = $_REQUEST['ctp_id1'];
    $class = $_REQUEST['class'];
    $hash_check = $_REQUEST['hash_check'];
    $name = 0;

    while ($name < count($hash_check)) {
        $hash_check1 = $hash_check[$name];

        $sql = "INSERT INTO hashoff_gradesheet (classId,phaseId,ctpId,className,hashCheck) VALUES ('$class_id','$phase_id','$ctp_id1','$class','$hash_check1')";

        $stmt = $connect->prepare($sql);
        $stmt->execute();

        $name++;
    }
    // die();
    $_SESSION['success'] = "Locations Inserted Successfully";
    header("Location:add_item_subitem.php");
}
