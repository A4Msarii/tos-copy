<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
echo $phaseid=$_REQUEST['phaseid'];
$courseidesss=$_REQUEST['courseidesss'];
$coursename=$_REQUEST['coursename'];
$filesides=$_REQUEST['filesides'];
$userides=$_REQUEST['userides'];
echo $mainid=$_REQUEST['mainid'];
$query101 = "SELECT * FROM phasefilepermission where id='$mainid'";
$statement101 = $connect->prepare($query101);
$statement101->execute();
if ($statement101->rowCount() > 0) {
  $result101 = $statement101->fetchAll();
  foreach ($result101 as $row101) {
    $status=$row101['status'];
    $year=$row101['year'];
    $comments=$row101['comments'];
    $custom_number=$row101['custom_number'];
    $lastApprove=$row101['lastApprove'];
    $lastDate=$row101['lastDate'];
  }
}
foreach($userides as $useridess){
  $nRows=0;
  $nRows = $connect->query("SELECT count(*) from phasefilepermission WHERE instId='$useridess' and phaseId='$phaseid' and coursecode='$courseidesss' and courseName='$coursename' and fileId='$filesides'")->fetchColumn();
if($nRows==0){
$sql = "INSERT INTO phasefilepermission (fileId,instId,phaseId,coursecode,courseName,status,year,comments,custom_number,lastApprove,lastDate) VALUES ('$filesides','$useridess','$phaseid','$courseidesss','$coursename','$status','$year','$comments','$custom_number','$lastApprove','$lastDate')";

$statement = $connect->prepare($sql);
$statement->execute();
}
}
$_SESSION['success'] = "assigne Inserted Successfully";
header("Location: {$_SERVER['HTTP_REFERER']}");
?>