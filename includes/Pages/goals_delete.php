<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
$sql = "DELETE FROM table_golas WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Data Deleted Successfully";
            header('Location:phase-view.php');
}else{
   $_SESSION['warning'] = "Something Went Wrong";
   header('Location:phase-view.php');
}   

if(isset($_GET['goals_id'])){
    $id=$_GET['goals_id'];
$sql = "DELETE FROM goals WHERE id='$id'";
$statement = $connect->prepare($sql);
$statement->execute();
            $_SESSION['danger'] = "Data Deleted Successfully";
            header('Location:phase-view.php');
}else{
   
   $_SESSION['danger'] = "Goal Deleted Successfully";
   header('Location:phase-view.php');
}
