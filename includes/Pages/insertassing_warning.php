<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$lastId=$_REQUEST['noti_id'];
$cat = $_REQUEST['cat'];
$cat_data = $_REQUEST['cat_data'];
$other = $_REQUEST['other'];
$user_Id = $_REQUEST['user_Id'];
$insert="";
            foreach ($cat as $key => $cats) {
 
             $cat_datas = $cat_data[$key];
             $others= $other[$key];
    
     if(isset($others)){
        $insert=$others;
    }
    if(isset($cat_datas) && $cat_datas!='0'){
        $insert=$cat_datas; 
    }
    $sql11 = "SELECT count(*) FROM new_warnning WHERE type='$cats' and classId='$insert' and notificationId='$lastId' and studentId='$user_Id'";
    $result11 = $connect->prepare($sql11);
    $result11->execute();
    $number_of_rows110 = $result11->fetchColumn();
    if($number_of_rows110==0){
    $sql1 = "INSERT INTO new_warnning (notificationId,studentId,type,classId)
     VALUES ('$lastId','$user_Id','$cats','$insert')";
    $statement1 = $connect->prepare($sql1);
    $statement1->execute();
    }
    }
   $_SESSION['success'] = "Warning Class/ Test Added";
 header("Location:CAP.php"); 
     
    


   
   
 



