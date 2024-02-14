<?php 
    include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$warning_id=$_REQUEST['warning'];
$cat=$_REQUEST['cat'];
$cat_data=$_REQUEST['cat_data'];
$cat_data1=$_REQUEST['cat_data1'];
var_dump($cat_data1);
$grades=$_REQUEST['grades'];
$group_id=$_REQUEST['group_id'];

$count=$_REQUEST['count'];
$thri=$_REQUEST['thri'];
$test_marks=$_REQUEST['test_marks'];
$value_marks=$_REQUEST['value_marks'];
$phase_selested=$_REQUEST['phase_selested']?$_REQUEST['phase_selested']:NULL;
foreach ($cat as $key =>$cats) 
{
    $gradess=$grades[$key];
    $thris=$thri[$key];
    $counts=$count[$key];
    $cat_datas=$cat_data[$key];
    $cat_datas1=$cat_data1[$key];
    $test_mark=$test_marks[$key];
    $value_mark=$value_marks[$key];
    $phase_selesteds=$phase_selested[$key];
    if($cats=="test"){
           $sql = "INSERT INTO warning_category_data (warning,category,category_phase,category_value,grade,count,threshold,group_id)
            VALUES ('$warning_id','$cats','$phase_selesteds','$cat_datas1','$test_mark','$counts','$value_mark','$group_id')";
    
            $statement = $connect->prepare($sql);
            $statement->execute();

    }else{
     $sql = "INSERT INTO warning_category_data (warning,category,category_phase,category_value,grade,count,threshold,group_id)
     VALUES ('$warning_id','$cats','$phase_selesteds','$cat_datas','$gradess','$counts','$thris','$group_id')";
    $statement = $connect->prepare($sql);
    $statement->execute();
   }
}
$_SESSION['success'] = "Category Added";
header("Location:add_warning_data.php");
?>