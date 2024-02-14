<?php

// generate_report.php
$command = escapeshellcmd('python Pages\sim_generator.py');
$output = shell_exec($command);
echo $output;

// Code to serve the generated Excel file to the client
$file = 'C:\xampp\htdocs\latest/grades.xlsx';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    flush(); // Flush system output buffer
    readfile($file);
    exit;
}
?>
