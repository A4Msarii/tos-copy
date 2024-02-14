<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
include('../../includes/config.php');
 
// Check if 'id' and 'ctp' are provided in the request
$std = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$ctp = isset($_REQUEST['ctp']) ? $_REQUEST['ctp'] : null;
 
// Exit the script if 'id' or 'ctp' are not provided
if ($std === null || $ctp === null) {
    die("The required parameters were not provided.");
}
echo "STD (User ID): " . $std . "<br>";
echo "CTP (Course ID): " . $ctp . "<br>";
 
// Construct your command using these variables in the correct order
// Execute the Python script with parameters
// The order is important: first course_id, then user_id.
$command = escapeshellcmd('python "' . ROOT_PATH . 'includes/Pages/report_generator.py" ' . escapeshellarg($ctp) . ' ' . escapeshellarg($std));
 
$output = shell_exec($command . ' 2>&1');
if ($output !== null) {
    echo "Python script output: " . htmlspecialchars($output);
} else {
    echo "No output from Python script.";
} // Use htmlspecialchars to safely display the output
 
// Path to the generated Excel file
$file = 'C:\\xampp\\htdocs\\file\\report.xlsx';
 
// Check if the Excel file was generated and exists
if (file_exists($file)) {
    // Clear all previous output
    ob_end_clean();
 
    // Set the headers to trigger a download
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.ms-excel.sheet.macroEnabled.12');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
 
    // Clear the output buffer and disable output buffering
    while (ob_get_level()) {
        ob_end_clean();
    }
 
    // Read the file and send it to the user
    readfile($file);
 
    // Optionally delete the file after download
    unlink($file);
 
    // Terminate the script
    exit;
} else {
    echo "Failed to generate the Excel file.";
}
?>