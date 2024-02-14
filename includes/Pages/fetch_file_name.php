<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id = $_REQUEST['id'];

$fetch_warning_name = $connect->prepare("SELECT file_name FROM `warning_data` WHERE id=?");
$fetch_warning_name->execute([$id]);
$warning_name = $fetch_warning_name->fetchColumn();

$file = ROOT_PATH . "includes/Pages/uploads/";

// echo $warning_name;


if (file_exists($file . $warning_name)) {
        echo $warning_name;
}
         
     
     
// $query="UPDATE `notifications`
// SET `is_read` = '1'
// WHERE `id`='$id'";

// $statement = $connect->prepare($query);

// $statement->execute();
