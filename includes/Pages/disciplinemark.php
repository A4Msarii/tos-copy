<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $std_id=$_REQUEST['std_id'];
echo $dismarks=$_REQUEST['dismarks'];
        $get_data= "SELECT * FROM discipline_data where student_id='$std_id'";
        $get_datast= $connect->prepare($get_data);
        $get_datast->execute();
 
         if($get_datast->rowCount() <= 0)
            {
                $sql = "INSERT INTO discipline_data(student_id,dismarks) VALUES ('$std_id','$dismarks')";
                $statement1 = $connect->prepare($sql);
                $statement1->execute();
                $_SESSION['success'] = "Decline Marks Added";
                header("Location:evaluation.php");
            }else{
                $query="UPDATE `discipline_data`
                SET `dismarks` = '$dismarks'
                where student_id='$std_id'";
              
                $statement = $connect->prepare($query);
    
                $statement->execute();
                $_SESSION['success'] = "Decline Marks Updated";
 
            header("Location:evaluation.php");
            }
            
?>
