<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../includes/config.php');

// Check if the 'file' parameter is set
if (isset($_GET['file'])) {
    $filename = $_GET['file'];
    // $file ='D:/xampp/htdocs/latest/' . $filename;  // Adjust the path according to your directory structure
    $file = 'C:/Users/varun/Downloads/' . $filename;

    if (file_exists($file)) {
        // Set headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));

        // Clear output buffer to avoid corrupting the file contents
        ob_clean();
        flush();

        // Read the file and exit the script
        readfile($file);
        exit;
    } else {
        echo 'Error: File not found.';
    }
} else {
    echo 'Error: No file specified.';
}
?>
