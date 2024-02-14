<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
if(isset($_POST["submit_type"]))
{
    $type = $_POST["type"];
	$ctp = $_POST["ctp"];
	var_dump(empty($ctp));
	if(empty($ctp)){
		
		$_SESSION['warning'] = "Select CTP First";
		 header("Location:addtype.php");	
	}else{
	foreach ($type as $key => $value) 

	{
		$sym_type=$type[$key];
		$que_type = "SELECT type_name FROM type_data where type_name='$sym_type' and ctp='$ctp'";
		$stat_type = $connect->prepare($que_type);
	    $stat_type->execute();
		var_dump($stat_type->rowCount() == 0);
		if($stat_type->rowCount() == 0)
	    {
			$query_type ="INSERT INTO type_data (type_name,ctp) VALUES ('".$value."','$ctp')";
			$statement_type = $connect->prepare($query_type);
			$statement_type->execute();
			$_SESSION['success'] = "Type Inserted Successfully";
			 header("Location:addtype.php");
		}
		else
		{
			
			$_SESSION['info'] = "This Data Already Exist.. Please Enter New Class";
			 header("Location:addtype.php");
		}
			
	}
}
}
?>

