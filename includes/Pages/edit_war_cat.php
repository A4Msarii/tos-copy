<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
echo $cat_id=$_REQUEST['cat_id'];
echo $grade=$_REQUEST['grade'];
echo $count_ed=$_REQUEST['count_ed'];
echo $thri_ed=$_REQUEST['thri_ed'];

     $query="UPDATE `warning_category_data` SET `grade` = '$grade',`count`='$count_ed',`threshold`='$thri_ed' WHERE id='$cat_id'";

        $statement = $connect->prepare($query);
             $statement->execute();
 
$_SESSION['success'] = "Data Updated Successfully";
 
 header("Location:add_warning_data.php");

?>