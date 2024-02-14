<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $custom_number = $_REQUEST['custom_number'];
  $customNumberCourseCode = $_REQUEST['customNumberCourseCode'];
  $customNumberCourseName = $_REQUEST['customNumberCourseName'];
  $customNumberPhaseId = $_REQUEST['customNumberPhaseId'];
  $query_ad = "UPDATE `phasefilepermission` SET `custom_number` = '$custom_number' WHERE `fileId`='$id' AND coursecode = '$customNumberCourseCode' AND courseName = '$customNumberCourseName' AND phaseId = '$customNumberPhaseId'";
  $statement_ad = $connect->prepare($query_ad);
  $statement_ad->execute();
  $_SESSION['success'] = "Custom Number Successfully";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['submitComment'])) {
  $commentFileId = $_REQUEST['commentFileId'];
  $phaseComment = $_REQUEST['phaseComment'];
  $commentPhaseId = $_REQUEST['commentPhaseId'];
  $commentCourseCode = $_REQUEST['commentCourseCode'];
  $commentCourseName = $_REQUEST['commentCourseName'];

  $query_ad = "UPDATE phasefilepermission SET comments = '$phaseComment' WHERE fileId = '$commentFileId' AND phaseId = '$commentPhaseId' AND coursecode = '$commentCourseCode' AND courseName = '$commentCourseName'";
  $statement_ad = $connect->prepare($query_ad);
  $statement_ad->execute();
  $_SESSION['success'] = "Comment Successfully";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['submitAssigneeComment'])) {
  $assigneeCommentFileId = $_REQUEST['assigneeCommentFileId'];
  $phaseComment = $_REQUEST['assigneeComment'];
  $assigneeCommentPhaseId = $_REQUEST['assigneeCommentPhaseId'];
  $assigneeCommentCourseCode = $_REQUEST['assigneeCommentCourseCode'];
  $assigneeCommentCourseName = $_REQUEST['assigneeCommentCourseName'];

  $query_ad = "UPDATE academicassignee SET comment = '$phaseComment' WHERE filesId = '$assigneeCommentFileId' AND coursecode = '$assigneeCommentCourseCode' AND coursename = '$assigneeCommentCourseName' AND phaseId = '$assigneeCommentPhaseId'";
  $statement_ad = $connect->prepare($query_ad);
  $statement_ad->execute();
  $_SESSION['success'] = "Comment Successfully";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}

if (isset($_REQUEST['addCustomAssignee'])) {
  $customeNumberFileId = $_REQUEST['customeNumberFileId'];
  $customNumberAssignee = $_REQUEST['customNumberAssignee'];
  $asigneeCustomNumberCourseCode = $_REQUEST['asigneeCustomNumberCourseCode'];
  $asigneeCustomNumberCourseName = $_REQUEST['asigneeCustomNumberCourseName'];
  $asigneeCustomNumberPhaseId = $_REQUEST['asigneeCustomNumberPhaseId'];


  $query_ad = "UPDATE academicassignee SET customNumber = '$customNumberAssignee' WHERE filesId = '$customeNumberFileId' AND phaseId = '$asigneeCustomNumberPhaseId' AND coursecode = '$asigneeCustomNumberCourseCode' AND coursename = '$asigneeCustomNumberCourseName'";
  $statement_ad = $connect->prepare($query_ad);
  $statement_ad->execute();
  $_SESSION['success'] = "Custom Added Successfully";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
