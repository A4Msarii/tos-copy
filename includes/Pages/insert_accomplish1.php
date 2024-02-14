
<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id=$_REQUEST['id'];

$Class_ac=$_REQUEST['class_id'];

$class_table=$_REQUEST['class_table'];
foreach($id as $ides){
$query_ac="UPDATE `accomplish_task`
SET `assign_class`='$Class_ac',`assign_class_table`='$class_table',`assign_class_table_cloneid`=NULL
WHERE `ac_id`='$ides'";

$statement_ac = $connect->prepare($query_ac);

            $statement_ac->execute();
}
$_SESSION['success'] = "accomplish cleared";
				header("Location:itemsubitem.php");
?>