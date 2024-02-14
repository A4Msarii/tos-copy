
<?php
	include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$error = '';
$phase_id=$_POST['phase_id'];
$phase=$_POST['phase'];
$ctp=$_POST['ctp'];
if (isset($_POST['submit_test'])) 
{
$test = $_POST['test'];
$shorttest = $_POST['shorttest'];
$ptype = $_POST['ptype'];
$percentage = $_POST['percentage']; 
foreach ($test as $key => $value) 
{
	$sym_test=$shorttest[$key];
	$que_test = "SELECT shorttest FROM test where shorttest='$sym_test' and ctp='$ctp'";
	$stat_test = $connect->prepare($que_test);
    $stat_test->execute();
	var_dump($stat_test->rowCount() == 0);
	if($stat_test->rowCount() == 0)
    {
		$query_test ="INSERT into test(test,shorttest,ptype,percentage,phase,ctp,date) values('".$value."', '".$shorttest[$key]."','".$ptype[$key]."','".$percentage[$key]."','$phase_id','$ctp',NOW())";
		$statement_test = $connect->prepare($query_test);
		$statement_test->execute();
		$_SESSION['success'] = "Test Class Inserted Successfully";
		header("Location:phase-view.php");
	}
	else
	{
		
		$_SESSION['info'] = "This Data Already Exist.. Please Enter New Class";
		header("Location:phase-view.php");
	}
		
}
}  
?>