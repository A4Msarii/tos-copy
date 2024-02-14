<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
// print_r($_REQUEST);
// die();
if (isset($_POST["alertbtn"])) {
	if (empty($_POST["title"])) {

		$_SESSION['warning'] = "Item Name Required";
	} else {
		$id = $_POST['id'];
		$date = date("Y-m-d");
		$userId = $_SESSION['login_id'];
		$alertType = $_REQUEST['selectalerttype'];
		if ($alertType == "General Announcement/Note To All") {
			$color = "#333CFF";
			$alert_icon = "annoucment/annoucment2.png";
			$textcolor = "white";
		}
		if ($alertType == "Warning") {
			$color = "#f5ca99";
			$alert_icon = "warning/warning2.png";
			$textcolor = "black";
		}
		if ($alertType == "Caution") {
			$color = "#FFC433";
			$alert_icon = "caution/caution.png";
			$textcolor = "black";
		}
		if ($alertType == "Alert") {
			$color = "#FF3342";
			$alert_icon = "Alert/alert.png";
			$textcolor = "white";
		}
		if ($alertType == "Remarks") {
			$color = "#33B426";
			$alert_icon = "remark/remark2.png";
			$textcolor = "white";
		}
		if ($alertType == "Reminder") {
			$color = "#B432E1";
			$alert_icon = "reminder/reminder2.png";
			$textcolor = "white";
		}
		if ($alertType == "Urgent Notice") {
			$color = "#FF1202";
			$alert_icon = "urgent/urgent1.png";
			$textcolor = "white";
		}
		if ($alertType == "Updates") {
			$color = "#6DE7E3";
			$alert_icon = "updates/updates1.png";
			$textcolor = "white";
		}
		if ($alertType == "Instructions") {
			$color = "brown";
			$alert_icon = "instruction/instruction.png";
			$textcolor = "white";
		}
		if ($alertType == "Feedback Request") {
			$color = "#e933cf";
			$alert_icon = "feedback/feedback2.png";
			$textcolor = "white";
		}
		if ($alertType == "Call To Action") {
			$color = "#0F5607";
			$alert_icon = "action/action2.png";
			$textcolor = "white";
		}
		if ($alertType == "Meeting Summaries") {
			$color = "grey";
			$alert_icon = "summary/summary1.png";
			$textcolor = "white";
		}
		if ($alertType == "Status Reports") {
			$color = "#77F869";
			$alert_icon = "status/status3.png";
			$textcolor = "black";
		}
		if ($alertType == "Invitation") {
			$color = "#0A2071";
			$alert_icon = "invitation/invitation1.png";
			$textcolor = "white";
		}

		$alertTitle = $_REQUEST['title'];
		$alertMessage = $_REQUEST['alertMessage'];
		$permissionType = $_REQUEST['permissionType'];
		$alert_user_ids = $_REQUEST['userId'];

		// upload laert file
		if (empty($alert_user_ids)) {
			if (!empty($_FILES["file"]["name"])) {
				$base_name =  $_FILES["file"]["name"];
				$alerttargetDirectory = "alert/" . $base_name;
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $alerttargetDirectory)) {
					$query1 = "INSERT INTO alerttable (user_id, alert_type, message, date, permission, alertCategory, color, reciever_user_id,alert_file,alert_icon,textcolor) 
					   VALUES (:userId, :alertTitle, :alertMessage, :date, :permissionType, :alertType, :color, :alert_user_ids, :alert_file, :alert_icon, :textcolor)";

					try {
						$stmt = $connect->prepare($query1);
						$stmt->bindParam(':userId', $userId);
						$stmt->bindParam(':alertTitle', $alertTitle);
						$stmt->bindParam(':alertMessage', $alertMessage);
						$stmt->bindParam(':date', $date);
						$stmt->bindParam(':permissionType', $permissionType);
						$stmt->bindParam(':alertType', $alertType);
						$stmt->bindParam(':color', $color);
						$stmt->bindParam(':alert_user_ids', $alert_user_ids);
						$stmt->bindParam(':alert_file', $base_name);
						$stmt->bindParam(':alert_icon', $alert_icon);
						$stmt->bindParam(':textcolor', $textcolor);

						$stmt->execute();
						$_SESSION['success'] = "Alert Sent Successfully";
						header("Location:personal.php");
					} catch (PDOException $e) {
						$_SESSION['error'] = $e->getMessage();
						header("Location:personal.php");
					}
				}
			} else {
				$query1 = "INSERT INTO alerttable (user_id, alert_type, message, date, permission, alertCategory, color, reciever_user_id, alert_file,alert_icon,textcolor) 
	            VALUES (:userId, :alertTitle, :alertMessage, :date, :permissionType, :alertType, :color, :alert_user_ids, 1,:alert_icon, :textcolor)";

				try {
					$stmt = $connect->prepare($query1);
					$stmt->bindParam(':userId', $userId);
					$stmt->bindParam(':alertTitle', $alertTitle);
					$stmt->bindParam(':alertMessage', $alertMessage);
					$stmt->bindParam(':date', $date);
					$stmt->bindParam(':permissionType', $permissionType);
					$stmt->bindParam(':alertType', $alertType);
					$stmt->bindParam(':color', $color);
					$stmt->bindParam(':alert_user_ids', $alert_user_ids);
					$stmt->bindParam(':alert_icon', $alert_icon);
					$stmt->bindParam(':textcolor', $textcolor);

					$stmt->execute();
					$_SESSION['success'] = "Alert Sent Successfully";
					header("Location:personal.php");
				} catch (PDOException $e) {
					$_SESSION['error'] = $e->getMessage();
					header("Location:personal.php");
				}
			}
		} else {
			if (!empty($_FILES["file"]["name"])) {
				$base_name =  $_FILES["file"]["name"];
				$alerttargetDirectory = "alert/" . $base_name;
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $alerttargetDirectory)) {
					$query1 = "INSERT INTO alerttable (user_id, alert_type, message, date, permission, alertCategory, color, reciever_user_id,alert_file,alert_icon,textcolor) 
                               VALUES (:userId, :alertTitle, :alertMessage, :date, :permissionType, :alertType, :color, :alert_user_id, :alert_file, :alert_icon, :textcolor)";

					foreach ($alert_user_ids as $user_id) {
						try {
							$stmt = $connect->prepare($query1);
							$stmt->bindParam(':userId', $userId);
							$stmt->bindParam(':alertTitle', $alertTitle);
							$stmt->bindParam(':alertMessage', $alertMessage);
							$stmt->bindParam(':date', $date);
							$stmt->bindParam(':permissionType', $permissionType);
							$stmt->bindParam(':alertType', $alertType);
							$stmt->bindParam(':color', $color);
							$stmt->bindParam(':alert_user_id', $user_id); // Use the current user_id from the loop
							$stmt->bindParam(':alert_file', $base_name);
							$stmt->bindParam(':alert_icon', $alert_icon);
							$stmt->bindParam(':textcolor', $textcolor);

							$stmt->execute();
						} catch (PDOException $e) {
							$_SESSION['error'] = $e->getMessage();
							header("Location: personal.php");
							exit();
						}
					}
					$_SESSION['success'] = "Alerts Sent Successfully";
					header("Location: personal.php");
					exit();
				}
			} else {
				$query1 = "INSERT INTO alerttable (user_id, alert_type, message, date, permission, alertCategory, color, reciever_user_id,alert_file,alert_icon,textcolor) 
                           VALUES (:userId, :alertTitle, :alertMessage, :date, :permissionType, :alertType, :color, :alert_user_id, 1, :alert_icon, :textcolor)";

				foreach ($alert_user_ids as $user_id) {
					try {
						$stmt = $connect->prepare($query1);
						$stmt->bindParam(':userId', $userId);
						$stmt->bindParam(':alertTitle', $alertTitle);
						$stmt->bindParam(':alertMessage', $alertMessage);
						$stmt->bindParam(':date', $date);
						$stmt->bindParam(':permissionType', $permissionType);
						$stmt->bindParam(':alertType', $alertType);
						$stmt->bindParam(':color', $color);
						$stmt->bindParam(':alert_user_id', $user_id); // Use the current user_id from the loop
						$stmt->bindParam(':alert_icon', $alert_icon);
						$stmt->bindParam(':textcolor', $textcolor);
						$stmt->execute();
					} catch (PDOException $e) {
						echo "<pre>";
						echo $e->getMessage();
						die;
						$_SESSION['error'] = $e->getMessage();
						header("Location: personal.php");
						exit();
					}
				}

				$_SESSION['success'] = "Alerts Sent Successfully";

				if (isset($_SESSION['previous_page'])) {
        header("Location: " . $_SESSION['previous_page']);
    } else {
        // If the previous page is not set, you can provide a default URL for redirection.
        header("Location: personal.php");
    }

    exit();
			}
		}
	}
}
