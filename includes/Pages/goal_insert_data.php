<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$error = '';
$phase_id=$_POST['phase_id'];
$phase=$_POST['phase'];
$ctp=$_POST['ctp'];
if (isset($_POST['submit_goal'])) 
{
$goal = $_POST['goal'];
// $symbol = $_POST['actualsymbol'];
foreach ($goal as $key => $value) 
{
	$sym=$goal[$key];
	$que = "SELECT goal FROM goals where goal='$sym' and ctp='$ctp'";
	$stat = $connect->prepare($que);
    $stat->execute();
	var_dump($stat->rowCount() == 0);
	if($stat->rowCount() == 0)
    {
		$query ="INSERT into goals(goal,phase,ctp,date) values('".$value."','$phase_id','$ctp', NOW())";
		$statement = $connect->prepare($query);
		$statement->execute();
		$_SESSION['success'] = "Actual Class Inserted Successfully";
		header("Location:phase-view.php");
	}
	else
	{
		
		$_SESSION['warning'] = "This Data Already Exist.. Please Enter New Class";
		header("Location:phase-view.php");
	}
		
}
}


if(isset($_REQUEST['edit_goal_goal'])){
    $name = $_REQUEST['goal_name'];
    $id = $_REQUEST['id'];
    $query="UPDATE `goals` SET `goal` = '$name' WHERE `id`='$id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $_SESSION['success'] = "Goal Updated Successfully";
            header('Location:phase-view.php');
}