<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $exportFilePath = $_POST['export_path'];
    $scheduledDate = $_POST['scheduled_date'];
    $scheduledTime = $_POST['scheduled_time'];

    // Create an array to store the scheduled task data
    $scheduledTask = [
        'export_path' => $exportFilePath,
        'scheduled_datetime' => "$scheduledDate $scheduledTime",
    ];

    // Convert the task data to JSON
    $scheduledTaskJson = json_encode($scheduledTask);

    // Define the URL of the Python script that will receive the task
    $pythonScriptUrl = 'http://192.168.29.54:8000/receive_task'; // Update with the actual URL

    // Send a POST request to the Python script
    $ch = curl_init($pythonScriptUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $scheduledTaskJson);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Check the response from the Python script
    if ($response === 'Task received successfully') {
        echo "Export task scheduled successfully.";
    } else {
        echo "Error scheduling export task.";
    }
}
?>
