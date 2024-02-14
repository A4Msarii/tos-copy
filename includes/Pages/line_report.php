<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(300);

// Clear any previously set headers
header_remove();

// generate_report.php
$command = escapeshellcmd('python Pages/line_generator.py');
$output = shell_exec($command);

// Clear the buffer, turn off output buffering
while (ob_get_level()) {
    ob_end_clean();
}

// Code to serve the generated Excel file to the client
$file = 'C:/xampp/htdocs/latest/selected_phases_class_counts_and_colors.xlsx';

if (file_exists($file)) {
    // Binary transfer for Excel files
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    header('Content-Transfer-Encoding: binary');

    readfile($file);
    exit;
} else {
    echo "The file does not exist.";
}

?>
