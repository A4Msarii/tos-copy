 

<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_POST["Insert_warning"])) {
	if (empty($_POST["warning"])) {

		$_SESSION['warning'] = "Warning Name Required";
	} else {
		$warning = $_POST["warning"];
		$ctp = $_POST["ctp"];
		foreach ($warning as $key => $values) {
			$subwarning = $warning[$key];
			$subque1 = "SELECT warning_name FROM warning_data where warning_name='$subwarning'";
			$substat1 = $connect->prepare($subque1);
			$substat1->execute();
			var_dump($substat1->rowCount() == 0);
			if ($substat1->rowCount() == 0) {
				$subquery1 = "INSERT INTO warning_data (warning_name,ctp) VALUES ('" . $values . "','$ctp')";
				$substatement1 = $connect->prepare($subquery1);
				$substatement1->execute();
			}
		}
		$_SESSION['success'] = "Data Inserted Successfully";
		header("Location:warning.php");
	}
}
?>