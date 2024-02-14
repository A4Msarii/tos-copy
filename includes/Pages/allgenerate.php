<?php
// Set error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the path to your Python script
$pythonScriptPath = 'C:\\xampp3\\htdocs\\latest\\TOS\\includes\\Pages\\allstudent.py';

// Specify the directory where the Excel files will be generated
$excelFilesDirectory = 'C:\\xampp3\\htdocs\\latest\\TOS\\downloadable_reports\\';

// Construct the command to execute the Python script
$command = "python " . escapeshellarg($pythonScriptPath);

// Execute the Python script
exec($command, $output, $returnCode);

if ($returnCode === 0) {
    // Create a ZIP file containing all Excel reports
    $zip = new ZipArchive();
    $zipFileName = 'reports.zip';
    $zipPath = $excelFilesDirectory . $zipFileName;

    if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
        // Add Excel files to the ZIP archive
        foreach (glob($excelFilesDirectory . '*.xlsx') as $excelFile) {
            $zip->addFile($excelFile, basename($excelFile));
        }
        $zip->close();

        // Construct the URL to the ZIP file
        $fileUrl = 'http://localhost:8080/latest/TOS/downloadable_reports/' . $zipFileName;

        $response = array(
            'status' => 'success',
            'message' => 'Report generated successfully.',
            'fileUrl' => $fileUrl
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Failed to create ZIP file.'
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Error generating report.'
    );
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
