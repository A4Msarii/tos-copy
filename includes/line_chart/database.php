<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","grade sheet");
$student_id = 13;
$sqlQuery = "SELECT user_id, over_all_grade_per FROM gradesheet WHERE user_id = $student_id";
$sqlQuery1 = "SELECT name FROM users WHERE id=$student_id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$nameResult = mysqli_query($conn, $sqlQuery1);
$nameRow = mysqli_fetch_assoc($nameResult);
$name = $nameRow['name'];
$data[0]['name'] = $name; // Add the student name to the $data array

mysqli_close($conn);

echo json_encode($data);
?>