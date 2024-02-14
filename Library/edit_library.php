<?php
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $ctp=$_POST['ctp'];
echo $id=$_POST['id'];
$library_name=$_POST['library_name'];
if(isset($_POST["saveit"])){
    if($id!=""){
        $que_library = "SELECT library FROM library where library='$library_name'";
							$stat_library = $connect->prepare($que_library);
						    $stat_library->execute();
							
							if($stat_library->rowCount() == 0)
						    {
             $query="UPDATE `library`
            SET `library` = '$library_name'
            WHERE `id`='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();
            $_SESSION['success'] = "Data Updated successfully..";
            header('Location:index.php');
            }else{
                $_SESSION['danger'] = "library name already exist";
                header('Location:index.php');
             }
        }else{
            $_SESSION['danger'] = "library name is missing..";
    header('Location:index.php');
 }
}
?>