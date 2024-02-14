<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');


		// $ctp=$_POST['ctp'];
		$course = $_POST["course"];
        $description = $_POST["description"];
        // $date = $_POST["date"];
		foreach ($course as $key => $value) {
            $descriptions=$description[$key];
            // $dates=$date[$key];
			$que_phase = "SELECT course_name FROM test_course where course_name='$value'";
			$stat_phase = $connect->prepare($que_phase);
			$stat_phase->execute();

			if ($stat_phase->rowCount() == 0) {
			$query_devision = "INSERT INTO test_course (`course_name`,`course_description`,`date`) VALUES ('$value','$descriptions',NOW())";
			$statement_devision = $connect->prepare($query_devision);
			$statement_devision->execute();
			$_SESSION['success'] = "Course Inserted Successfully";
			header("Location:create_test.php");
	    }else{
			$_SESSION['danger'] = "Duplicate Name plase take diffrent name";
			header("Location:create_test.php");
		}
	}
	 	
