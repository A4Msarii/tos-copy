<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$id=$_REQUEST['id'];
$std_id=$_REQUEST['std_id'];
$query = "SELECT * FROM clone_class where cloned_id='$id' and std_id='$std_id' and class_name='actual'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$snn=1;
       foreach($result as $row)
                {
                    $class_id=$row['class_id'];
                    $q= $connect->prepare("SELECT symbol FROM `actual` WHERE id=?");
                    $q->execute([$class_id]);
                    $name = $q->fetchColumn();
                  echo '<a style="margin:5px;" class="btn btn-dark">'.$name.'</a>';    
                }
?>