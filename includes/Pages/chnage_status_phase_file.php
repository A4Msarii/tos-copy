<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
if (isset($_REQUEST['value'])) {
  $value = $_REQUEST['value'];
  $id_files = $_REQUEST['id_files'];
  $phase_id = $_REQUEST['phase_id'];
  $userId = $_REQUEST['userId'];
  $mainId = $_REQUEST['mainId'];
  // $refId = $_REQUEST['refId'];
  $courseCode = $_REQUEST['courseCode'];
  $courseName = $_REQUEST['courseName'];
  $year = NULL;
  $lastDate = date("Y-m-d");
  if ($value == "Approved") {
    $year = date('Y');
    $query_ad = "UPDATE phasefilepermission SET status = '$value',year = '$year',lastDate = '$lastDate' WHERE fileId = '$id_files' AND phaseId = '$phase_id' AND coursecode = '$courseCode' AND courseName = '$courseName'";
    $query_ad1 = "UPDATE phasefilepermission SET lastApprove = '$userId',lastDate = '$lastDate' WHERE fileId = '$id_files' AND phaseId='$phase_id' AND coursecode = '$courseCode' AND courseName = '$courseName'";
    $statement_ad = $connect->prepare($query_ad1);
    $statement_ad->execute();
  } else {
    $query_ad = "UPDATE `phasefilepermission` SET `status` = '$value', `year`='$year',lastDate = '$lastDate' WHERE `fileId`='$id_files' and phaseId='$phase_id' AND coursecode = '$courseCode' AND courseName = '$courseName'";
  }
  // print_r($query_ad);
  $statement_ad = $connect->prepare($query_ad);
  $statement_ad->execute();
}

if (isset($_REQUEST['value1'])) {
  $value = $_REQUEST['value1'];
  $id_files = $_REQUEST['id_files1'];
  $phase_id = $_REQUEST['phase_id1'];
  $userId = $_REQUEST['userId'];
  $mainId = $_REQUEST['mainId'];
  // $refId = $_REQUEST['refId'];
  $courseCode = $_REQUEST['courseCode'];
  $courseName = $_REQUEST['courseName'];
  $year = NULL;
  $lastDate = date("Y-m-d");
  if ($value == "Approved") {
    $year = date('Y');
    $query_ad = "UPDATE `academicassignee` SET `status` = '$value',`year`='$year',lastDate = '$lastDate' WHERE `filesId` = '$id_files' and phaseId = '$phase_id' AND coursecode = '$courseCode' AND coursename = '$courseName'";
    $query_ad1 = "UPDATE `academicassignee` SET lastApprove = '$userId',lastDate = '$lastDate' WHERE filesId = '$id_files' AND phaseId = '$phase_id' AND coursecode = '$courseCode' AND coursename = '$courseName'";
    $statement_ad = $connect->prepare($query_ad1);
    $statement_ad->execute();
  } else {
    $query_ad = "UPDATE `academicassignee` SET `status` = '$value',`year`='$year',lastDate = '$lastDate' WHERE `filesId` = '$id_files' and phaseId = '$phase_id' AND coursecode = '$courseCode' AND coursename = '$courseName'";
  }
  $statement_ad = $connect->prepare($query_ad);
  $statement_ad->execute();
}
