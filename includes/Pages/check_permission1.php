<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $val=$_REQUEST['val1'];
  $clone_id=$_REQUEST['clone_id'];
$sql521 = "SELECT count(*) FROM `grade_permission_clone` WHERE grade_id='$val' AND grade='E' and `status`='1' and clone_id='$clone_id'";
$result521 = $connect->prepare($sql521);
$result521->execute();
$number_of_rows121 = $result521->fetchColumn();
echo $number_of_rows121;

?>