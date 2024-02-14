<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","grade sheet");

$sqlQuery = "SELECT user_id, over_all_grade_per, over_all_grade FROM gradesheet";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>