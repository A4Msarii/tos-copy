<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');


// Query to fetch data from the database
$sql = "SELECT * FROM exam_question WHERE type='mcq'";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Initialize an empty array to store the questions
$questions = [];

// Fetch data and structure it into the $questions array
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $question = [
        "question" => $row['question'],
        "option1" => $row['option1'],
        "option2" => $row['option2'],
        "option3" => $row['option3'],
        "option4" => $row['option4']
    ];

    // Add the question to the $questions array
    $questions[] = $question;
}

// Close the database connection
$conn = null;

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($questions);
?>
