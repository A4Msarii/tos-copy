<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id=$_REQUEST['id'];
$q2= "SELECT * FROM notifications where id='$id'";
$st2 = $connect->prepare($q2);
$st2->execute();

    if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
        echo $data=$row2["extra_data"];
         }
     
     }
$query="UPDATE `notifications`
SET `is_read` = '1'
WHERE `id`='$id'";

$statement = $connect->prepare($query);

$statement->execute();

?>