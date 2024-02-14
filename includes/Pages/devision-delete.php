<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['id'])) {
    $ctp = $_GET['ctp'];
    $id = $_GET["id"];
    $sql = "DELETE FROM division WHERE id='$id'";
    $statement = $connect->prepare($sql);
    $statement->execute();


    $_SESSION['danger'] = "Division Deleted Successfully";
    header('Location:division.php');
}

if(isset($_REQUEST['departmentId'])){
    $departmentId = $_REQUEST['departmentId'];

    $sql = "DELETE FROM division_department WHERE id = '$departmentId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "Department Deleted Successfully";
    header('Location:division.php');
}

if(isset($_REQUEST['depId'])){
    $depId = $_REQUEST['depId'];

    $sql = "DELETE FROM userdepartment WHERE id = '$depId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $_SESSION['danger'] = "User Removed Successfully";
    header('Location:department_list.php');
}
