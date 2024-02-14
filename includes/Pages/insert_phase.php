<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];
if (isset($_POST["savephase"])) {
	if (empty($_POST["phase"])) {
		$_SESSION['warning'] = "Phase Name Required";
		header("Location:Next-home.php");
	} elseif (empty($_POST["ctp"])) {
		$_SESSION['info'] = "Select CTP First";
		header("Location:Next-home.php");
	} else {
		$ctp = $_POST['ctp'];
		$phase = $_POST["phase"];
		foreach ($phase as $key => $value) {
			$sym_phase = $phase[$key];
			$que_phase = "SELECT phasename FROM phase where phasename='$sym_phase' and ctp='$ctp'";
			$stat_phase = $connect->prepare($que_phase);
			$stat_phase->execute();



			$nRows = $connect->query("select count(*) from shelf where library_id='1' and shelf='Course Training Standard'")->fetchColumn();
			if ($nRows == 0) {
				$sql112 = "INSERT INTO shelf(shelf,library_id) VALUES ('Course Training Standard','1')";
				$statement112 = $connect->prepare($sql112);
				$statement112->execute();
				$last_id1 = $connect->lastInsertId();
			} else {
				$query3 = "SELECT * FROM shelf where shelf='Course Training Standard' and library_id='1'";
				$statement2 = $connect->prepare($query3);
				$statement2->execute();
				$result2 = $statement2->fetchAll();
				foreach ($result2 as $row8) {
					$last_id1 = $row8['id'];
				}
			}
			$fetch_ctp_name = $connect->query("SELECT `id` FROM shops WHERE ctpId = '$ctp'");
			$ctp_name = $fetch_ctp_name->fetchColumn();
			if ($stat_phase->rowCount() == 0) {
				$query_phase = "INSERT INTO phase (phasename,ctp) VALUES ('" . $value . "','$ctp')";
				$statement_phase = $connect->prepare($query_phase);
				$statement_phase->execute();
				$last_id = $connect->lastInsertId();

				$folIdQ = $connect->query("SELECT id FROM folders WHERE ctpId = '$ctp'");
				$folId = $folIdQ->fetchColumn();

				$query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,className,phaseId) VALUES ('$value','$userId','$folId','$ctp_name','super admin','red','academic','$last_id')";
				$stmt = $connect->prepare($query);
				$stmt->execute();

				if ($last_id != "") {
					$sql1 = "INSERT INTO actual_phase(phase,ctp_id) VALUES ('$last_id','$ctp')";
					$statement1 = $connect->prepare($sql1);
					$statement1->execute();

					$sql11 = "INSERT INTO folders(folder,phaseId) VALUES ('$value','$last_id')";
					$statement11 = $connect->prepare($sql11);
					$statement11->execute();
					$last_id2 = $connect->lastInsertId();

					$sql113 = "INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES ('$last_id2','$last_id1','$userId','$ctp_name','1')";
					$statement131 = $connect->prepare($sql113);
					$statement131->execute();
				}
				$_SESSION['success'] = "Phase Inserted Successfully";
				header("Location:Next-home.php");
			} else {

				$_SESSION['info'] = "This Data Already Exist.. Please Enter New Phase";
				header("Location:Next-home.php");
			}
		}
	}
}


if (isset($_REQUEST['saveDuration'])) {
	$duration = $_REQUEST['duration'];
	$durationId = $_REQUEST['durationId'];
	$ctp_du = $_REQUEST['ctp_du'];
	$ctp = $_REQUEST['ctp_id'];

	$marks_sum = "SELECT SUM(`phaseDuration`) FROM phase where ctp='$ctp' ";
	$statement = $connect->prepare($marks_sum);
	$statement->execute();
	$total = $statement->fetch(PDO::FETCH_NUM);
	$mark_sum = $total[0];
	$cal = $ctp_du - $mark_sum;

	if ($duration > $cal) {
		if ($cal == 0) {
			$cal = "";

			$_SESSION['warning'] = "Can't Add More Than $ctp_du";
			header("Location:Next-home.php");
		} else {

			$_SESSION['info'] = "You can add $cal percent or below";
			header("Location:Next-home.php");
		}
	} else {
		$updateQuery = "UPDATE phase SET phaseDuration = '$duration' WHERE id = '$durationId'";
		$statement_editor = $connect->prepare($updateQuery);
		$statement_editor->execute();

		$_SESSION['success'] = "Duration Inserted Successfully";
		header("Location:Next-home.php");
	}
}
