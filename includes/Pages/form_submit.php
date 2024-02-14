<?php 
  include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$value=array();

$std_idie=$_REQUEST['itemcheck'];
$class_id=$_REQUEST['class_id'];
$phase_id=$_REQUEST['phase_id'];
$ctp_id1=$_REQUEST['ctp_id1'];
$class=$_REQUEST['class'];


foreach($std_idie as $std_idies=>$key){
  $value[]=$std_idie[$std_idies];
}

if (!$std_idie) {

  $_SESSION['warning'] = "Please Select Item";
 //header("Location:add_item_subitem.php?error=".$error."");
}

if($class=="" || $ctp_id1 == "" || $phase_id == "" || $class_id == ""){
  $_SESSION['danger'] = "Some Data Is Missing";
 // header("Location:add_item_subitem.php?error=".$error."");
}

foreach($value as $index => $values) {
 $query2 = "SELECT * FROM item where item='$values' AND course_id='$ctp_id1' AND class_id='$class_id' AND phase_id='$phase_id' AND class='$class'";

  $statement2 = $connect->prepare($query2);
$statement2->execute();

if($statement2->rowCount() == 0)
    {
    $sql = "INSERT INTO item (item,course_id,class_id,phase_id,class) VALUES ('$values','$ctp_id1','$class_id','$phase_id','$class')";

    $statement = $connect->prepare($sql);

    $statement->execute();
    
 
  }else{
    
    $_SESSION['info'] = "Item Already Added";
header("Location:add_item_subitem.php");
  }
  
$_SESSION['success'] = "Item Inserted Successfully";
 header("Location:add_item_subitem.php");
}
 

?>



