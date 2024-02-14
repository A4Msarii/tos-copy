<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the script is run from the command line
if (php_sapi_name() == "cli") {
    // Command-line execution
    if ($argc > 1) {
        $exportFilePath = $argv[1];
    } else {
        $exportFilePath = "C:\\Users\\vishnu\\Downloads\\database_export.sql";
    }
} else {
    // Web server execution
    $exportFilePath = "C:\\Users\\vishnu\\Downloads\\database_export.sql"; // Default path or handle differently
}

// Database credentials
$dbHost = 'localhost'; // Your database host
$dbUsername = 'root'; // Your database username
$dbPassword = ''; // Your database password
$dbName = 'grade sheet'; // Your database name

// Path to mysqldump executable
$mysqldumpPath = 'C:\\xampp\\mysql\\bin\\mysqldump.exe'; // Adjust as per your server setup

// Construct the mysqldump command
$command = "\"$mysqldumpPath\" -h $dbHost -u $dbUsername --password=$dbPassword \"$dbName\" > \"$exportFilePath\"";


// Execute the command
exec($command, $output, $returnVar);

// Check if the command executed successfully
if ($returnVar === 0) {
    echo "Database export successful. File saved to: $exportFilePath\n";
} else {
    echo "Error in database export. Details:\n";
    foreach ($output as $line) {
        echo $line . "\n";
    }
}
?>
