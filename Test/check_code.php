<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$exam_id= $_REQUEST['exam_id'];
$r_id= $_REQUEST['r_id'];
    $userCode = $_REQUEST['user_code']; // Replace with your input method (e.g., form input)

    // Prepare a SQL statement to check if the code exists in the database
    $sql = "SELECT * FROM exam_question_ist WHERE code = :user_code and exam_id='$exam_id'";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':user_code', $userCode, PDO::PARAM_STR);
    $stmt->execute();

    // Check if a matching code was found
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $_SESSION['success'] = "Best Of luck for exam";
        header('Location:studentpanel/mcqtest.php?id='.urlencode(base64_encode($exam_id)).'&r_id='.urlencode(base64_encode($r_id)));
    } else {
        $_SESSION['danger'] = "Code is not matching";
        header('Location:index.php');
    }

?>
