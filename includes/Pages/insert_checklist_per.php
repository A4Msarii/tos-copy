<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_POST["savetitle"])) {
    if (empty($_POST["title"])) {
        $_SESSION['warning'] = "title Name Required";
        header("Location:per_title.php");
    } else { 
        $user_id = $_SESSION['login_id'];
        $title = $_POST["checklist"];
        foreach ($title as $key => $value) {
            $sym_title = $title[$key];
            $que_title = "SELECT title FROM per_checklist where title='$sym_title'";
            $stat_title = $connect->prepare($que_title);
            $stat_title->execute();

            if ($stat_title->rowCount() == 0) {
                // Default color set to grey
                $default_color = "grey";
                $query_title = "INSERT INTO per_checklist (user_id, title, color, date) VALUES ('$user_id', '$value', '$default_color', NOW())";
                $statement_title = $connect->prepare($query_title);
                $statement_title->execute();
                $_SESSION['success'] = "title Inserted Successfully";
                header("Location:per_title.php");
            } else {
                $_SESSION['info'] = "This Data Already Exist.. Please Enter New title";
                header("Location:per_checklist.php");
            }
        }
    }
}


if (isset($_REQUEST['values'])) {
	$values = $_REQUEST['values'];

	$user_id = $_SESSION['login_id'];
	$title = $_POST["checklist"];
	$checkDates = $_REQUEST['checkDates'];
	foreach ($values as $key => $value) {
		$checkDate = $checkDates[$key];
		$sym_title = $values[$key];
		$que_title = "SELECT title FROM per_checklist where title='$sym_title'";
		$stat_title = $connect->prepare($que_title);
		$stat_title->execute();

		if ($stat_title->rowCount() == 0) {
			$default_color = "grey";
			$query_title = "INSERT INTO per_checklist (user_id,title,color,date) VALUES ('$user_id','$value', '$default_color','$checkDate')";
			$statement_title = $connect->prepare($query_title);
			$statement_title->execute();
		}
	}
}
