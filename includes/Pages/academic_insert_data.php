
<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$error = '';
$phase_id=$_POST['phase_id'];
$phase=$_POST['phase'];
$ctp=$_POST['ctp'];
if (isset($_POST['submit_academic'])) 
{
$academic = $_POST['academic'];
$shortacademic = $_POST['shortacademic'];
// $ptype = $_POST['ptype'];
// $percentage = $_POST['percentage'];
foreach ($academic as $key => $value) 
{
 	 $sym_academic=$shortacademic[$key];
        $que_aca = "SELECT shortacademic FROM academic where shortacademic='$sym_academic' and ctp='$ctp'";
	$stat_aca = $connect->prepare($que_aca);
        $stat_aca->execute();
	var_dump($stat_aca->rowCount() == 0);
	if($stat_aca->rowCount() == 0)
        {
		$query_aca ="INSERT into academic(academic, shortacademic, phase,ctp,date) values('".$value."', '".$shortacademic[$key]."','$phase_id','$ctp',NOW())";
		$statement_aca = $connect->prepare($query_aca);
		$statement_aca->execute();

		$_SESSION['success'] = "Academic Class Inserted Successfully..";
                header('Location:phase-view.php');
	}
	else
	{
		
                
                $_SESSION['info'] = "This Data Already Exist.. Please Enter New Class";
                header('Location:phase-view.php');

	}
		
}
}  
?>