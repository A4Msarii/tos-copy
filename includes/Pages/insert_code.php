<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_POST["codesave"])) {
	if (empty($_POST["code"])) {
		
		$_SESSION['warning'] = "Code Required";
		header("Location:status.php");
	} else {
		// $ctp = $_POST['ctp'];
		$code = $_POST["code"];
		$description = $_POST["description"];
		$explanation = $_POST["explanation"];
		$progression = $_POST["progression"];
		foreach ($code as $key => $value) {
			$sym_phase = $code[$key];
			$description1 = $description[$key];
			$explanation1 = $explanation[$key];
			$progression1 = $progression[$key];
			$que_phase = "SELECT code FROM status where code='$sym_phase' and ctp='$ctp'";
			$stat_phase = $connect->prepare($que_phase);
			$stat_phase->execute();

			if ($stat_phase->rowCount() == 0) {
				$query_phase = "INSERT INTO status (code,description,explanation,progression) VALUES ('$sym_phase','$description1','$explanation1','$progression1')";
				$statement_phase = $connect->prepare($query_phase);
				$statement_phase->execute();
				// $last_id = $connect->lastInsertId();
				// if ($last_id != "") {
				// 	$sql1 = "INSERT INTO actual_phase(phase,ctp_id) VALUES ('$last_id','$ctp')";
				// 	$statement1 = $connect->prepare($sql1);
				// 	$statement1->execute();
				// }
				$_SESSION['success'] = "Status Inserted Successfully";
				header("Location:status.php");
			} else {
				
				$_SESSION['warning'] = "This Data Already Exist.. Please Enter New Status";
				header("Location:status.php");
			}
		}
	}
}
?>