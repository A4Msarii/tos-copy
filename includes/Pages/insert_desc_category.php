<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_POST["savecategory"])) {
	if (empty($_POST["category"])) {
		
		$_SESSION['warning'] = "Category Required";
		header("Location:desciplinecate.php");
	} else {
		// $ctp = $_POST['ctp'];
		$category = $_POST["category"];
		$marks = $_REQUEST['marks'];

		foreach ($category as $key => $value) {
			$sym_cate = $category[$key];
			$sym_mark = $marks[$key];
			$que_phase = "SELECT category FROM desccate where category='$sym_cate'";
			$stat_phase = $connect->prepare($que_phase);
			$stat_phase->execute();

			if ($stat_phase->rowCount() == 0) {
				$query_phase = "INSERT INTO desccate (category,marks,date) VALUES ('$sym_cate','$sym_mark',NOW())";
				$statement_phase = $connect->prepare($query_phase);
				$statement_phase->execute();
			}
		}
		
		$_SESSION['success'] = "Category Inserted Successfully";
		header("Location:desciplinecate.php");
	}
}
