<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$page_redirection = $_POST['page_redirection'];
if (isset($_POST["savesfolder"])) {
	if (empty($_POST["folder"])) {
		$_SESSION['warning'] = "Folder Name Required";
		if ($page_redirection == "admin") {
			header('Location:file_management.php');
			exit();
		}
		if ($page_redirection == "user") {
			header('Location:../../Library/file_management.php');
			exit();
		}
	} else {

		$folder = $_POST["folder"];
		foreach ($folder as $key => $value) {
			$sym_folder = $folder[$key];
			$que_folder = "SELECT folder FROM folders where folder='$sym_folder'";
			$stat_folder = $connect->prepare($que_folder);
			$stat_folder->execute();
			// var_dump($que_folder);
			if ($stat_folder->rowCount() == 0) {
				$query_folder = "INSERT INTO folders (folder) VALUES ('" . $value . "')";
				$statement_folder = $connect->prepare($query_folder);
				$statement_folder->execute();
				// var_dump($query_folder);
			} else {
				
				$_SESSION['info'] = "This Data Already Exist.. Please Enter New folder";
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

		$_SESSION['success'] = "Folder Inserted Successfully";
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


if (isset($_POST["addFolderLib"])) {
	if (empty($_POST["folder"])) {
		
		$_SESSION['warning'] = "Folder Name Required";
		header("Location:../../Library/index.php");
	} else {

		$folder = $_POST["folder"];
		$lab_ID = $_REQUEST['lab_ID'];
		$shelf_ID = $_REQUEST['shelf_ID'];
		$shop_ID = $_REQUEST['shop_ID'];
		$userId = $_SESSION['login_id'];
		foreach ($folder as $key => $value) {
			$sym_folder = $folder[$key];
			$que_folder = "SELECT folder FROM folders where folder='$sym_folder'";
			$stat_folder = $connect->prepare($que_folder);
			$stat_folder->execute();
			// var_dump($que_folder);
			if ($stat_folder->rowCount() == 0) {
				$query_folder = "INSERT INTO folders (folder) VALUES ('" . $value . "')";
				$statement_folder = $connect->prepare($query_folder);
				$statement_folder->execute();

				$lastQ = $connect->query("SELECT id FROM folders ORDER BY id DESC LIMIT 1");
				$lastId = $lastQ->fetchColumn();

				$query = "INSERT INTO folder_shop_user (folder_id,shelf_id,user_id,shop_id,lib_id) VALUES ('$lastId','$shelf_ID','$userId','$shop_ID','$lab_ID')";
				$stmt = $connect->prepare($query);
				$stmt->execute();

				// var_dump($query_folder);
			} else {
				
				$_SESSION['info'] = "This Data Already Exist.. Please Enter New folder";
				header("Location:../../Library/index.php");
			}
		}

		$_SESSION['success'] = "Folder Inserted Successfully";
		header("Location:../../Library/index.php");
	}
}
