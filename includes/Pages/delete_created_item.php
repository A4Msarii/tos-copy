<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['id'])) {
  echo $id = $_REQUEST["id"];
  echo $class_id = $_REQUEST['class_id'];
  echo $phase_id = $_REQUEST['phase_id'];
  echo $ctp_id1 = $_REQUEST['ctp'];
  echo $class = $_REQUEST['class'];
  $item_id = $_REQUEST['item_id'];
  $select_subs = "SELECT * FROM subitem where item='$item_id' and course_id='$ctp_id1' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";
  echo $select_subs;
  $select_subsst = $connect->prepare($select_subs);
  $select_subsst->execute();

  if ($select_subsst->rowCount() > 0) {
    $sub_re = $select_subsst->fetchAll();

    foreach ($sub_re as $row3) {
      $sub_id = $row3['id'];
      $sql1 = "DELETE FROM subitem WHERE id='$sub_id'";
      $statement1 = $connect->prepare($sql1);
      $statement1->execute();
    }
  }
  $sql = "DELETE FROM item WHERE id='$id'";
  $statement = $connect->prepare($sql);
  $statement->execute();
  $_SESSION['danger'] = "Item Deleted Successfully";
  header('Location:add_item_subitem.php');
}

if (isset($_REQUEST['hashOffId'])) {
  $hashOffId = $_REQUEST['hashOffId'];
  $phaseId = $_REQUEST['phaseId'];
  $classId = $_REQUEST['classId'];
  $ctpId = $_REQUEST['ctpId'];
  $className = $_REQUEST['className'];

  $sql = "DELETE FROM hashoff_gradesheet WHERE classId = '$classId' AND phaseId = '$phaseId' AND ctpId = '$ctpId' AND className = '$className' AND hashCheck = '$hashOffId'";
  $statement = $connect->prepare($sql);
  $statement->execute();
  $_SESSION['danger'] = "HashOff Deleted Successfully";
  header('Location:add_item_subitem.php');
}
