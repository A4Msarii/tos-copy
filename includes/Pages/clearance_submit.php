<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$itemcheck = $_REQUEST['itemcheck'];
$subitemcheck = $_REQUEST['subitemcheck'];
$stud_db_id = $_REQUEST['stud_db_id'];
$ctp_id = $_REQUEST['ctp_id'];
if(empty($ctp_id)){
    $_SESSION['info'] = "Select Ctp First";
  header("Location:clearance_data.php");
  }else{
if (isset($itemcheck)) {
    foreach ($itemcheck as $itemchecks) {

        $sql_e = "INSERT INTO clearance_data(item,stud_id,ctp_id) VALUES ('$itemchecks','$stud_db_id','$ctp_id')";

        $statement_e = $connect->prepare($sql_e);

        $statement_e->execute();
      

    }
}
if (isset($subitemcheck)) {
    foreach ($subitemcheck as $subitemchecks) {

        $sql_eq = "INSERT INTO clearance_data(subitem,stud_id,ctp_id) VALUES ('$subitemchecks','$stud_db_id','$ctp_id')";

        $statement_eq = $connect->prepare($sql_eq);

        $statement_eq->execute();
      

    }
}
$_SESSION['success'] = "Item Inserted Successfully";
header("Location:clearance.php");
  }