<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$idess=$_REQUEST['idess'];

foreach($idess as $idess1){
   $subquery1 ="INSERT INTO sidebar_ctp (ctp_id) VALUES ('$idess1')";
								$substatement1 = $connect->prepare($subquery1);
								$substatement1->execute();

}
$_SESSION['success'] = "CTP Added";
header("Location:mange_course_ctp.php");
?>