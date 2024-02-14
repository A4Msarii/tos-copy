<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $val=$_REQUEST['val1'];

$sql521 = "SELECT count(*) FROM `grade_permission` WHERE grade_id='$val' AND grade='E' and `status`='1'";
$result521 = $connect->prepare($sql521);
$result521->execute();
$number_of_rows121 = $result521->fetchColumn();
 echo $number_of_rows121;

?>