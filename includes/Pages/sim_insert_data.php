
<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$error = '';
$phase_id = $_POST['phase_id'];
$phase = $_POST['phase'];
$ctp = $_POST['ctp'];
if (isset($_POST['submit_sim'])) {
	$sim = $_POST['sim'];
	$shortsim = $_POST['shortsim'];
	$ptype = $_POST['ptype'];
	$percentage = $_POST['percentage'];
	
	$fetchShopId = $connect->query("SELECT id FROM shops WHERE ctpId = '$ctp'");
	$shopId = $fetchShopId->fetchColumn();

	$fetchFolderId = $connect->query("SELECT id FROM folders WHERE phaseId = '$phase_id'");
	$folderId = $fetchFolderId->fetchColumn();
	foreach ($sim as $key => $value) {
		$sym_sim = $shortsim[$key];
		$que_sim = "SELECT shortsim FROM sim where shortsim='$sym_sim' and ctp='$ctp'";
		$stat_sim = $connect->prepare($que_sim);
		$stat_sim->execute();
		var_dump($stat_sim->rowCount() == 0);
		if ($stat_sim->rowCount() == 0) {
			$query_sim = "INSERT into sim(sim, shortsim, ptype, percentage, phase,ctp,date) values('" . $value . "', '" . $shortsim[$key] . "','" . $ptype[$key] . "','" . $percentage[$key] . "','$phase_id','$ctp', NOW())";
			$statement_sim = $connect->prepare($query_sim);
			$statement_sim->execute();

			$lastQ = $connect->query("SELECT id FROM sim WHERE ctp = '$ctp' AND phase = '$phase_id' ORDER BY id DESC LIMIT 1");
			$lastId = $lastQ->fetchColumn();

			$query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,classId,className) VALUES ('" . $shortsim[$key] . "','$userId','$folderId','$shopId','super admin','red','$lastId','sim')";
            $stmt = $connect->prepare($query);
            $stmt->execute();

			$_SESSION['success'] = "Class Inserted Successfully";
			header("Location:phase-view.php");
		} else {

			$_SESSION['warning'] = "This Data Already Exist.. Please Enter New Class";
			header("Location:phase-view.php");
		}
	}
}
?>