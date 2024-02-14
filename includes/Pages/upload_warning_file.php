

<?php
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
//var_dump(isset($_POST["upload"]));
echo $id=$_POST['id'];

if(isset($_POST["upload"])){
$file = rand(1000,100000)."-".$_FILES['doc']['name'];
 $file_loc = $_FILES['doc']['tmp_name'];
$file_size = $_FILES['doc']['size'];
$file_type = $_FILES['doc']['type'];
$folder="uploads/".$file_name;
$new_size = $file_size/1024;  
$new_file_name = strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);
if(move_uploaded_file($file_loc,$folder.$final_file))
{
    $query_w="UPDATE `warning_data`
SET `file_name` = '$final_file',`type`='$file_type'
WHERE `id`='$id'";
var_dump($query_w);
$statement_w = $connect->prepare($query_w);

            $statement_w->execute();
            $_SESSION['success'] = "File uploaded successfully";
            header('Location: warning.php');
            
          
}
else
{

     header('Location: warning.php');
     
     }
 }
?>