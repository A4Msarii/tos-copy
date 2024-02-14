<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');


		// $ctp=$_POST['ctp'];
		$course = $_POST["course"];
        $Test_name = $_POST["Test_name"];
        $Test_dec = $_POST["Test_dec"];
        $date = $_POST["Exam_date"];
        $duration_hours = $_POST["duration_hours"];
        $duration_minutes = $_POST["duration_minutes"];
		foreach ($course as $key => $value) {
            $Test_names=$Test_name[$key];
            $Test_decs=$Test_dec[$key];
            $dates=$date[$key];
            $duration_hourss=$duration_hours[$key];
            $duration_minutess=$duration_minutes[$key];
			$query_devision = "INSERT INTO test_course_exam (course_id,exam_name,exam_description,date,duration_hr,duration_min) VALUES ('$value','$Test_names','$Test_decs','$dates','$duration_hourss','$duration_minutess')";
			$statement_devision = $connect->prepare($query_devision);
			$statement_devision->execute();
	    }
		$_SESSION['success'] = "Exam Inserted Successfully";
			header("Location:create_test.php");
