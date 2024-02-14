
<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
 $id=$_GET['id'];

$Class_ac=$_REQUEST['class_id'];

$class_table=$_REQUEST['class_table'];
$class_cl=$_REQUEST['class_cl'];
$query_ac="UPDATE `accomplish_task`
SET `assign_class`='$Class_ac',`assign_class_table`='$class_table',`assign_class_table_cloneid`='$class_cl'
WHERE `ac_id`='$id'";
echo $query_ac;
$statement_ac = $connect->prepare($query_ac);

             $statement_ac->execute();
//  echo "updated data";
?>