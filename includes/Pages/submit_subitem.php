<?php 
  include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $get_item_id_value=$_REQUEST['get_item_id_value'];
echo $class_id=$_REQUEST['class_id'];
echo $phase_id=$_REQUEST['phase_id'];
echo $ctp_id1=$_REQUEST['ctp_id1'];
echo $class=$_REQUEST['class'];
$get_id_item=$_REQUEST['subcheck'];
if (!$get_id_item) {
   $_SESSION['warning'] = "Please Select SubItem";
   header("Location:add_item_subitem.php");
  }
  
  if($class=="" || $ctp_id1 == "" || $phase_id == "" || $class_id == ""){
   
    $_SESSION['info'] = "Some Data Is Missing";
    header("Location:add_item_subitem.php");
  }

                    foreach($get_id_item as $key=>$get_id_items){
                     echo $get_id_items;
                     $sql = "INSERT INTO subitem (item,subitem,course_id,class_id,phase_id,class) VALUES ('$get_item_id_value','$get_id_items','$ctp_id1','$class_id','$phase_id','$class')";

                     $statement = $connect->prepare($sql);
                 
                     $statement->execute();
                     $_SESSION['success'] = "Subitem Inserted Successfully";
                     header("Location:add_item_subitem.php");
                    }
?>