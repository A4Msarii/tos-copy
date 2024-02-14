<?php
include('../includes/config.php');
include ROOT_PATH . 'includes/connect.php';
session_start();
$folder_id = $_REQUEST['me_id'];
$file_brief = $_REQUEST['fsid2'];
$me_ty = $_REQUEST['me_ty'];


if (isset($file_brief)) {
       foreach ($file_brief as $filess) {
              $query = "UPDATE `user_files` SET `menu_type` = '$me_ty',type_id='$folder_id' WHERE `id`='$filess'";
              $statement = $connect->prepare($query);
              $statement->execute();
       }
       $_SESSION['success'] = "File Added";
       header("Location:index.php");
}
