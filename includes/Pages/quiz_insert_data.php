

<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$error = '';
$phase_id=$_POST['phase_id'];
$phase=$_POST['phase'];
$ctp=$_POST['ctp'];
if (isset($_POST['submit_quiz'])) 
{
$quiz = $_POST['quiz'];
$percentage = $_POST['percentage'];
foreach ($quiz as $key => $value)  
{
	$quizsym=$quiz[$key];
	$que = "SELECT quiz FROM quiz where quiz='$quizsym' and ctp='$ctp'";
	$stat = $connect->prepare($que);
    $stat->execute();
	var_dump($stat->rowCount() == 0);
	if($stat->rowCount() == 0)
    {
		$query_q ="INSERT into quiz(quiz, percentage, phase,ctp,date) values('".$quiz[$key]."','".$percentage[$key]."','$phase_id','$ctp', NOW())";
		$statement_q = $connect->prepare($query_q);
		$statement_q->execute();
		$_SESSION['success'] = "Quiz Inserted Successfully";
		header("Location:quiz.php");
	}
	else
	{
		
		$_SESSION['warning'] = "This Data Already Exist.. Please Enter New Quiz";
		header("Location:quiz.php");
	}
		
}
}  
?>