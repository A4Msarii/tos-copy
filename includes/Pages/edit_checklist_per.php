<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$checklist_name=$_POST['checklist_name'];
$description=$_POST['description'];
$status=$_POST['status'];
$priority=$_POST['priority'];
$category=$_POST['category'];
$comment=$_POST['comment'];
$date=$_POST['date'];
if(isset($_POST["checksubmit"])){
    
            echo $query="UPDATE `per_checklist`
            SET `checklist` = '$checklist_name',`description` = '$description',`status` = '$status',`priority` = '$priority',`category`='$category',`comment` = '$comment',`date` = '$date'
            WHERE `id`='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();
            $_SESSION['success'] = "Data Updated Successfully";
            header('Location:per_checklist.php');
          
}
?>