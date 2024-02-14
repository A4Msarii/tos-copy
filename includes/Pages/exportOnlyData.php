<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "grade sheet";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Export the structure of all tables in the database
$output = '';
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_array()) {
    $table = $row[0];
    $resultTable = $conn->query("SHOW CREATE TABLE $table");
    $rowTable = $resultTable->fetch_row();
    $output .= $rowTable[1] . ";\n\n";
}

// Close the connection
$conn->close();

// Set the appropriate headers for file download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="database_structure_export.sql"');

// Output the file contents
echo $output;
?>
