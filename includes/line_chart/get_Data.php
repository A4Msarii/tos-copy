<?php
header('Content-Type: application/json');


// $conn = mysqli_connect("localhost","root","","grade sheet");

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "grade sheet");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$stuId = $_REQUEST['sideId'];

// Fetch data from both tables

if ($stuId != "All") {
    $sql = "SELECT gradesheet.user_id, gradesheet.over_all_grade_per, users.name 
        FROM gradesheet 
        JOIN users ON gradesheet.user_id = users.id 
        WHERE gradesheet.user_id = '$stuId'";
} else {
    $sql = "SELECT gradesheet.user_id, gradesheet.over_all_grade_per, users.name FROM gradesheet JOIN users ON gradesheet.user_id = users.id";
}
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Create empty array to store results
$response = array();

// Loop through results and add to response array
while ($row = mysqli_fetch_assoc($result)) {
    $response[] = array(
        "name" => $row["name"],
        "over_all_grade_per" => $row["over_all_grade_per"]

    );
}

// Close database connection
mysqli_close($conn);

// Encode response array as JSON and output
echo json_encode($response);
