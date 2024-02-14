<?php
session_start();

// Prevent caching
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 

// Define the path to the log file
$logFilePath = 'C:\\xampp\\htdocs\\latest\\TOS\\includes\\Pages\\logfilesession.log';

// Log the session data before clearing it
error_log("Session data before unset: " . print_r($_SESSION, true), 3, $logFilePath);

// Check if a user is logged in
if (isset($_SESSION['user_id'])) {
    // Log the user ID before logout
    error_log("User ID before logout: " . $_SESSION['user_id'], 3, $logFilePath);
}

// Unset and destroy the session
session_unset();
session_destroy();

// Log after session destruction
error_log("Session destroyed.", 3, $logFilePath);

// Check if a user was logged out
if (!isset($_SESSION['user_id'])) {
    // Log a message indicating successful logout
    error_log("User successfully logged out.", 3, $logFilePath);
}

$djangoLogoutURL = "http://127.0.0.1:8000/logout/"; // Replace with your Django logout URL
$ch = curl_init($djangoLogoutURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, []);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Redirect to a safe PHP page or display a logout confirmation message

// For example, if you want to redirect to index.php after Django logout:
header("Location: ../../index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>
<body>
</body>
</html>