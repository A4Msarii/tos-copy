
<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id=$_REQUEST['add_clear'];

$class_ad=$_REQUEST['class_id'];

$class_table=$_REQUEST['class_table'];
var_dump($id);
foreach($id as $ides){
$query_ad="UPDATE `additional_task`
SET `assign_class`='$class_ad',`assign_class_table`='$class_table',`assign_class_table_cloneid`=NULL
WHERE `ad_id`='$ides'";
$statement_ad = $connect->prepare($query_ad);
$statement_ad->execute();

}
$_SESSION['success'] = "additionl cleared";
				header("Location:itemsubitem.php");
?>