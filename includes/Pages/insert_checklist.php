<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_POST["savechecklist"])) {
	if (empty($_POST["checklist"])) {
		$_SESSION['warning'] = "Checklist Name Required";
		header("Location:mainchecklist.php");
	} elseif (empty($_POST["ctp"])) {
		$_SESSION['info'] = "Select CTP First";
		header("Location:mainchecklist.php");
	} else {
		$ctp = $_POST['ctp'];
		$checklist = $_POST["checklist"];
		foreach ($checklist as $key => $value) {
			$sym_checklist = $checklist[$key];
			$que_checklist = "SELECT checklist FROM checklist where checklist='$sym_checklist' and ctp='$ctp'";
			$stat_checklist = $connect->prepare($que_checklist);
			$stat_checklist->execute();

			if ($stat_checklist->rowCount() == 0) {
				$query_checklist = "INSERT INTO checklist (checklist,ctp,date) VALUES ('" . $value . "','$ctp',NOW())";
				$statement_checklist = $connect->prepare($query_checklist);
				$statement_checklist->execute();
				$_SESSION['success'] = "Checklist Inserted Successfully";
				header("Location:mainchecklist.php");
			} else {
				
				$_SESSION['info'] = "This Data Already Exist.. Please Enter New checklist";
				header("Location:mainchecklist.php");
			}
		}
	}
}

