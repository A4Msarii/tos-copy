<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $id=$_GET['id'];
$sql2 = "SELECT count(`id`) as count FROM gradesheet WHERE class_id='$id' and class='actual'";
$sql2_prepare = $connect->prepare($sql2);
$result2 = $connect->query($sql2);
$datas1 = $result2->fetch(PDO::FETCH_ASSOC);
 $counts=$datas1['count'];
if($counts == 0){
$sql = "DELETE FROM actual WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
            

            $_SESSION['danger'] = "Data Deleted Successfully";
            header('Location:phase-view.php');
}else{
   

    $_SESSION['danger'] = "Gradsheet is filled can't delete class";
            header('Location:phase-view.php');
}   
    
?>