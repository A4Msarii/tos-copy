<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Kolkata');

echo "Script started\n";

if (php_sapi_name() == "cli") {
    // Code to execute if run from the command line
    echo "Running in CLI mode\n";

    $scheduledTime = strtotime('2023-11-30 16:00:00');
 // Example: Set your scheduled time
    $exportFilePath = "C:\\Users\\vishnu\\Downloads\\database_export.sql"; // Example: Set your export file path

    $currentTime = time();
    echo "Scheduled Time: " . date('Y-m-d H:i:s', $scheduledTime) . "\n";
    echo "Current Time: " . date('Y-m-d H:i:s', $currentTime) . "\n";

    if ($currentTime >= $scheduledTime) {
        echo "Before mysqldump command\n";

        // Database credentials and mysqldump path
        $mysqldumpPath = 'C:\\xampp\\mysql\\bin\\mysqldump.exe';
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbName = 'grade sheet'; // Replace with your database name

        // Construct the mysqldump command
        $command = "\"$mysqldumpPath\" -h $dbHost -u $dbUsername \"$dbName\" > \"$exportFilePath\" 2> \"C:\\Users\\vishnu\\Downloads\\error_log.txt\"";

        exec($command, $output, $return_var);

        if ($return_var === 0) {
            echo "Database export successful.\n";
        } else {
            echo "Error in database export. Check error log for details.\n";
        }

        echo "After mysqldump command\n";
    } else {
        echo "Not yet time for database export in CLI mode.\n";
    }
} else {
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Form submitted\n";

        // Validate and sanitize inputs
        $scheduledTimeInput = htmlspecialchars($_POST['scheduled_time'], ENT_QUOTES, 'UTF-8');
        $exportFilePath = htmlspecialchars($_POST['export_path'], ENT_QUOTES, 'UTF-8');

        // Convert scheduled time to Unix timestamp
        $scheduledTime = strtotime($scheduledTimeInput);

        $currentTime = time();
        echo "Scheduled Time: " . date('Y-m-d H:i:s', $scheduledTime) . "\n";
        echo "Current Time: " . date('Y-m-d H:i:s', $currentTime) . "\n";

        if ($currentTime >= $scheduledTime) {
            echo "Before mysqldump command\n";

            // ... rest of your mysqldump logic ...

            echo "After mysqldump command\n";
        } else {
            echo "Not yet time for database export from web form.\n";
        }
    } else {
        echo "Please submit the form.\n";
    }
}

echo "Script ended\n";
?>
