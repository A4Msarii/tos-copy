<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $ctp=$_POST['ctp'];
echo $id=$_POST['id'];
$group_name=$_POST['group_name'];
if(isset($_POST["saveit"])){
    if($id!=""){
        $que_g = "SELECT groupname FROM groups where groupname='$group_name' and ctp='$ctp'";
							$stat_g = $connect->prepare($que_g);
						    $stat_g->execute();
							
							if($stat_g->rowCount() == 0)
						    {
             $query="UPDATE `groups`
            SET `groupname` = '$group_name'
            WHERE `id`='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();
            $_SESSION['success'] = "Data Updated Successfully";
            header('Location:add_group.php');
            }else{
                
                $_SESSION['info'] = "Group Name Already Exist";
                header('Location:add_group.php');
             }
        }else{
    
    $_SESSION['danger'] = "Group Name Is Missing";
    header('Location:add_group.php');
 }
}
?>