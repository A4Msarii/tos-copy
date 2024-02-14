<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];
$std_id=$_POST['std_id'];
$id=$_POST['test_id1'];
$crs_id=$_POST['crs_id'];
$Marks = $_POST["Marks"];
$get_clon_id=$_POST["get_clon_id"];
$get_data= "SELECT * FROM test_cloned_data where test_id='$id' and student_id='$std_id' and course_id='$crs_id' and clone_id='$get_clon_id'";
       $get_datast= $connect->prepare($get_data);
       $get_datast->execute();

       if($get_datast->rowCount() > 0)
           {
           $query="UPDATE test_cloned_data
           SET marks = '$Marks'
           WHERE `test_id`='$id' and student_id='$std_id' and course_id='$crs_id' and clone_id='$get_clon_id'";
         
           $statement = $connect->prepare($query);

           $statement->execute();

           }else{
            if($Marks <= 100){
               $sql = "INSERT INTO test_cloned_data (test_id,student_id,course_id,clone_id,marks,userId) VALUES ('$id','$std_id','$crs_id','$get_clon_id','$Marks','$userId')";
            
               $statement = $connect->prepare($sql);
               $statement->execute();
            }else{
                
                $_SESSION['warning'] = "Marks should be under or equal 100";
                header("Location:testing.php");
             }
           }


$_SESSION['success'] = "Data Added Successfully";
header('Location:testing.php');
?>
