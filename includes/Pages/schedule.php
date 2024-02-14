<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $scheduledDateTime = $_POST['scheduled_datetime'];
    $exportPath = $_POST['export_path'];

    // Perform validation and scheduling logic here (e.g., check if the date is in the future)

    // For simplicity, write the user's input to a text file
    $inputFile = fopen("user_input.txt", "w");
    fwrite($inputFile, "Scheduled Date and Time: $scheduledDateTime\n");
    fwrite($inputFile, "Export File Path: $exportPath\n");
    fclose($inputFile);

    echo "Task scheduled successfully for $scheduledDateTime.";
}
?>
