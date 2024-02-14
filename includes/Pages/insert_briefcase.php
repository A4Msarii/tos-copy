<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$page_redirection = $_POST['page_redirection'];

if (isset($_POST["savesbrief"])) {
	if (empty($_POST["briefcase"])) {
		// $error = "<div class='alert alert-danger'>Briefcase Name required..</div>";
		$_SESSION['warning'] = "Briefcase Name required..";
		if ($page_redirection == "admin") {
			header('Location:file_management.php');
			exit();
		}
		if ($page_redirection == "user") {
			header('Location:../../Library/file_management.php');
			exit();
		}
	} else {
		$user_id = $_POST['user_id'];
		$briefcase = $_POST["briefcase"];
		$color = "red";

		foreach ($briefcase as $key => $value) {
			$query_briefcase = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,role,color) VALUES ('$value','$user_id','0','super admin','$color')";
			$statement_briefcase = $connect->prepare($query_briefcase);
			$statement_briefcase->execute();
		}
		// $error = "<div class='alert alert-success'>briefcase Inserted successfully..</div>";
		$_SESSION['success'] = "briefcase Inserted successfully..";
		if ($page_redirection == "admin") {
			header('Location:file_management.php');
			exit();
		}
		if ($page_redirection == "user") {
			header('Location:../../Library/file_management.php');
			exit();
		}
	}
}
