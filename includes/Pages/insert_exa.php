<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');


// $ctp=$_POST['ctp'];
echo $course = $_POST["course"];
$type = $_POST["type"];
$question = $_POST["question"];
$option1 = $_POST["option1"];
$option2 = $_POST["option2"];
$option3 = $_POST["option3"];
$option4 = $_POST["option4"];
$answer = $_POST["answer"];
$refrence = $_REQUEST['refrence'];

$difficulty = $_POST["difficulty"];
$document = $_POST["document"];
// $mcqFile = $_REQUEST['mcqFile'];


foreach ($question as $key => $value) {
    $filename = $_FILES['mcqFile']['name'][$key];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uploadPath = 'files/' . $filename;

    if (move_uploaded_file($_FILES["mcqFile"]["tmp_name"][$key], $uploadPath)) {
        $option1s = $option1[$key];
        $option2s = $option2[$key];
        $option3s = $option3[$key];
        $option4s = $option4[$key];
        $answers = $answer[$key];
        $refrences = $refrence[$key];
        $difficultys = $difficulty[$key];
        $documents = $document[$key];
        $query_devision = "INSERT INTO  exam_question (`category`,`type`,`question`,`option1`,`option2`,`option3`,`option4`,`correst_answer`,`difficulty`,`document`,`fileName`,`fileType`,`questionRef`) VALUES ('$course','$type','$value','$option1s','$option2s','$option3s','$option4s','$answers','$difficultys','$documents','$filename','$ext','$refrences')";
        $statement_devision = $connect->prepare($query_devision);
        $statement_devision->execute();
    } else {

        $option1s = $option1[$key];
        $option2s = $option2[$key];
        $option3s = $option3[$key];
        $option4s = $option4[$key];
        $answers = $answer[$key];
        $difficultys = $difficulty[$key];
        $documents = $document[$key];
        $refrences = $refrence[$key];
        $query_devision = "INSERT INTO  exam_question (`category`,`type`,`question`,`option1`,`option2`,`option3`,`option4`,`correst_answer`,`difficulty`,`document`,`questionRef`) VALUES ('$course','$type','$value','$option1s','$option2s','$option3s','$option4s','$answers','$difficultys','$documents','$refrences')";
        $statement_devision = $connect->prepare($query_devision);
        $statement_devision->execute();
    }
}
$_SESSION['success'] = "Course Inserted Successfully";
header("Location:create_test.php");
