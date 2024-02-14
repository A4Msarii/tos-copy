<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['addAttrition'])) {
    $percentage = $_REQUEST['percentage'];
    $name = 0;

    while ($name < count($percentage)) {
        $percentage1 = $percentage[$name];
        $query = "INSERT INTO attrition (attritionPercent) VALUES ('$percentage1')";
        // echo $query;
        // die();
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $name++;
    }

    $_SESSION['success'] = "Data Inserted Successfully";
    header("Location:./deconflicter/attritionpage.php");
}
