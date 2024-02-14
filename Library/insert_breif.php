<?php

include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();

if(isset($_REQUEST['savebrief'])){
    if(empty($_REQUEST['breifcase'])){
        $_SESSION['danger']="Breifcae Name is required..";
        header("Location:../includes/Pages/fheader1.php");
    }else{
        $userId = $_REQUEST['user_id'];
        $briefCaseName = $_REQUEST['breifcase'];
        $folderId = $_REQUEST['folderId'];
        $role = $_SESSION['role'];
        if($role == "super admin"){
            $color = "red";
        }

        if($role == 'instructor'){
            $color = 'yellow';
        }

        if($role == 'student'){
            $color = 'blue';
        }
        
        $shopId = $_SESSION['shopId'];
        

        $query_brief ="INSERT INTO user_briefcase(briefcase_name,user_id,folderId,shopid,role,color) VALUES ('$briefCaseName','$userId','$folderId','$shopId','$role','$color')";
		$statement_brief = $connect->prepare($query_brief);
		$statement_brief->execute();
        $_SESSION['success']="Briefcase Inserted successfully..";
		header("Location:../includes/Pages/fheader1.php");
    }
}
