<?php
session_start();
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
echo $ctp=$_POST['ctp'];
echo $id=$_POST['id'];
$shelf_name=$_POST['shelf_name'];
if(isset($_POST["saveit"])){
    if($id!=""){
        $que_shelf = "SELECT shelf FROM shelf where shelf='$shelf_name'";
							$stat_shelf = $connect->prepare($que_shelf);
						    $stat_shelf->execute();
							
							if($stat_shelf->rowCount() == 0)
						    {
             $query="UPDATE `shelf`
            SET `shelf` = '$shelf_name'
            WHERE `id`='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();
            $_SESSION['success'] = "Data Updated successfully..";
            header('Location:index.php');
            }else{
                $_SESSION['danger'] = "shelf name already exist";
                header('Location:index.php');
             }
        }else{
    $_SESSION['danger'] = "shelf name is missing..";
    header('Location:index.php');
 }
}
?>