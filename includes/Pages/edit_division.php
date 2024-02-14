<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $ctp=$_POST['ctp'];
echo $id=$_POST['id'];
$dev_name=$_POST['dev_name'];
if(isset($_POST["saveit"])){
    if($id!=""){
        $que_phase = "SELECT id FROM division where divisionName='$dev_name'";
							$stat_phase = $connect->prepare($que_phase);
						    $stat_phase->execute();
							
							if($stat_phase->rowCount() == 0)
						    {
             $query="UPDATE `division`
            SET `divisionName` = '$dev_name'
            WHERE `id`='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();
            $_SESSION['success'] = "Data Edited Successfully";
            header('Location:division.php');
            }else{
                $_SESSION['warning'] = "Phase Name Already Exist";
                header('Location:division.php');
             }
        }else{
    $_SESSION['danger'] = "Phase Name Is Missing";
    header('Location:division.php');
 }
}
?>