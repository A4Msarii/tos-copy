<?php
   include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
   $class_id = $_REQUEST['pre_id'];
   $class_table = $_REQUEST['class'];
   $days = $_REQUEST['days'];
   $checkbox1=$_REQUEST['prereui']; 
  $prereui_id=$_REQUEST['prereui_id']; 
  $prereui_table=$_REQUEST['prereui_table']; 
 echo "<br>";
 //var_dump($prereui_table);

$chk="";  
$prereui_ides="";
foreach($checkbox1 as $index=>$chk1)  
   {  
        $chk .= $chk1.",";
      
   }
  //echo $chk;
   foreach($prereui_id as $index=>$prereui_idss)  
   {  
       $prereui_ides .= $prereui_idss.",";
      
   }
  echo $prereui_ides;
    
// $in_ch="INSERT INTO prereuisite_data(class_id,class_table,days,prereuisites) values ('".$class_id."','".$class_table."','".$days."','$chk')";  

// $statement = $connect->prepare($in_ch);

//                   $statement->execute();
//                 $error ="<div class='alert alert-success'>prereuisites added..</div>";
//               header("Location:prereuisite.php?error=".$error."");  

?>




