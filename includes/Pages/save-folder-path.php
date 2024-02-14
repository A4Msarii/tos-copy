<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$folder_path = $_POST['folder-path'];
$query_type ="INSERT INTO files (files) VALUES ('$folder_path')";
			$statement_type = $connect->prepare($query_type);
			$statement_type->execute();
?>