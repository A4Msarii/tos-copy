<?php 
     include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$grade=$_REQUEST['grade'];

//$grade_name=$_REQUEST['grade_name'];
//var_dump($grade);
//var_dump($grade_name);
foreach($grade as $grade_name=>$key){

     $query="UPDATE `grade_per` SET `permission` = '1' WHERE `grade`='$key'";

        $statement = $connect->prepare($query);
             $statement->execute();
 
 $error="permission updated";
 header('Location:usersinfo.php');
}
?>