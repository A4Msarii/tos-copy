<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');


// $ctp=$_POST['ctp'];
echo $course = $_POST["course"];
$type = $_POST["type"];
$question = $_POST["question"];
$answer = $_POST["correct_answer"];

$difficulty = $_POST["difficulty"];
$document = $_POST["document"];

foreach ($question as $key => $value) {
	$filename = $_FILES['trueFalseFile']['name'][$key];

	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$uploadPath = 'files/' . $filename;

	if (move_uploaded_file($_FILES["trueFalseFile"]["tmp_name"][$key], $uploadPath)) {

		$option1s = $option1[$key];
		$answers = $answer[$key];
		$difficultys = $difficulty[$key];
		$documents = $document[$key];
		$query_devision = "INSERT INTO  exam_question (`category`,`type`,`question`,`correst_answer`,`difficulty`,`document`,`fileName`,`fileType`) VALUES ('$course','$type','$value','$answers','$difficultys','$documents','$filename','$ext')";
		$statement_devision = $connect->prepare($query_devision);
		$statement_devision->execute();
	} else {
		$option1s = $option1[$key];
		$answers = $answer[$key];
		$difficultys = $difficulty[$key];
		$documents = $document[$key];
		$query_devision = "INSERT INTO  exam_question (`category`,`type`,`question`,`correst_answer`,`difficulty`,`document`) VALUES ('$course','$type','$value','$answers','$difficultys','$documents')";
		$statement_devision = $connect->prepare($query_devision);
		$statement_devision->execute();
	}
}
$_SESSION['success'] = "Course Inserted Successfully";
header("Location:create_test.php");
