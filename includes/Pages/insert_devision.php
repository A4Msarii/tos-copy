<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_POST["savediv"])) {
	if (empty($_POST["devision"])) {
		
		$_SESSION['info'] = "Division Name Required";
		header("Location:devision.php.php");
	} else {
		// $ctp=$_POST['ctp'];
		$devision = $_POST["devision"];
		foreach ($devision as $key => $value) {
			$query_devision = "INSERT INTO division (divisionName) VALUES ('$value')";
			$statement_devision = $connect->prepare($query_devision);
			$statement_devision->execute();
			$_SESSION['success'] = "Division Inserted Successfully";
			header("Location:division.php");
		}
	}
}
