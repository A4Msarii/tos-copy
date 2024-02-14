<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
echo $ctp = $_POST['ctp'];
echo $id = $_POST['id'];
$objective = $_POST['objective'];
if (isset($_POST["saveit"])) {


    $query = "UPDATE phase
            SET objective = '$objective' WHERE id = '$id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    // echo $query;
    // die();
    $_SESSION['success'] = "Data Updated Successfully";
    header('Location:Next-home.php');
} else {
   
    $_SESSION['warning'] = "Phase Name Is Missing";
    header('Location:Next-home.php');
}
