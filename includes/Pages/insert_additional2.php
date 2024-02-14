
<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id=$_GET['id'];

$class_ad=$_REQUEST['class_id'];

$class_table=$_REQUEST['class_table'];
$class_cl=$_REQUEST['class_cl'];
$query_ad="UPDATE `additional_task`
SET `assign_class`='$class_ad',`assign_class_table`='$class_table',`assign_class_table_cloneid`='$class_cl'
WHERE `ad_id`='$id'";

 echo $query_ad;
$statement_ad = $connect->prepare($query_ad);
 $statement_ad->execute();
 // echo "updated data";
?>