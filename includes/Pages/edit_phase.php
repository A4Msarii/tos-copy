<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $ctp=$_POST['ctp'];
echo $id=$_POST['id'];
$phase_name=$_POST['phase_name'];
if(isset($_POST["saveit"])){
    if($id!=""){
        $que_phase = "SELECT phasename FROM phase where phasename='$phase_name' and ctp='$ctp'";
							$stat_phase = $connect->prepare($que_phase);
						    $stat_phase->execute();
							
							if($stat_phase->rowCount() == 0)
						    {
             $query="UPDATE `phase`
            SET `phasename` = '$phase_name'
            WHERE `id`='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();
            $_SESSION['success'] = "Data Updated Successfully";
            header('Location:Next-home.php');
            }else{
                
                $_SESSION['warning'] = "Phase Name Already Exist";
                header('Location:Next-home.php');
             }
        }else{
   
    $_SESSION['danger'] = "Phase Name Is Missing";
    header('Location:Next-home.php');
 }
}
?>