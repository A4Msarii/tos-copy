<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];
$error = '';
$phase_id = $_POST['phase_id'];
$phase = $_POST['phase'];
$ctp = $_POST['ctp'];
if (isset($_POST['submit_actual'])) {
	
	$actual = $_POST['actual'];
	$symbol = $_POST['actualsymbol'];
	$ptype = $_POST['ptype'];
	$percentage = $_POST['percentage'];

	 $fetchShopId = $connect->query("SELECT id FROM shops WHERE ctpId = '$ctp'");
	$shopId = $fetchShopId->fetchColumn();

	$fetchFolderId = $connect->query("SELECT id FROM folders WHERE phaseId = '$phase_id'");
	$folderId = $fetchFolderId->fetchColumn();

	foreach ($actual as $key => $value) {
		$sym = $symbol[$key];
		$que = "SELECT symbol FROM actual where symbol='$sym' and ctp='$ctp'";
		$stat = $connect->prepare($que);
		$stat->execute();
		var_dump($stat->rowCount() == 0);
		if ($stat->rowCount() == 0) {
			$query = "INSERT into actual(actual, symbol, ptype, percentage, phase,ctp,date) values('" . $value . "', '" . $symbol[$key] . "','" . $ptype[$key] . "','" . $percentage[$key] . "','$phase_id','$ctp', NOW())";
			$statement = $connect->prepare($query);
			$statement->execute();

			$lastQ = $connect->query("SELECT id FROM actual WHERE ctp = '$ctp' AND phase = '$phase_id' ORDER BY id DESC LIMIT 1");
			$lastId = $lastQ->fetchColumn();

			$query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,classId,className) VALUES ('".$symbol[$key]."','$userId','$folderId','$shopId','super admin','red','$lastId','actual')";
            $stmt = $connect->prepare($query);
            $stmt->execute();

			$_SESSION['success'] = "Actual class inserted successfully..";
			header("Location:phase-view.php");
		} else {


			$_SESSION['info'] = "This Data Already Exist.. Please Enter New Class";
			header("Location:phase-view.php");
		}
	}
}
