<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('../../includes/config.php');

// Detect the protocol and domain based on the current request
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$domain = $_SERVER['HTTP_HOST'];
$baseUrl = $protocol . $domain;

// Execute the Python script
$command = escapeshellcmd('python Pages/report_generator.py');
$output = shell_exec($command);

// $file = 'D:\xampp\htdocs\latest\report.xlsx';
$file = 'C:/Users/hp/Downloads/report.xlsx';

if (file_exists($file)) {
    // Return JSON response with the URL to the download script
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success', 
        'downloadUrl' => $baseUrl . '/latest/TOS/includes/Pages/download.php?file=' . urlencode(basename($file))
    ]);
} else {
    // Return JSON error response
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error', 
        'message' => 'Report file not found.'
    ]);
}
exit;
?>
