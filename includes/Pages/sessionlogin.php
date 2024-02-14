<?php

// Include the PHP code you provided here at the top of your PHP pages
ob_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Start the session
session_start();

echo '<pre>Session before setting JWT: ';
print_r($_SESSION);
echo '</pre>';

// Require Composer's autoloader.
require_once __DIR__ . '/../../vendor/autoload.php';

use Firebase\JWT\JWT;

// Check if the user is logged in
if (isset($_SESSION['nickname'], $_SESSION['login_id'], $_SESSION['inst_id'], $_SESSION['role'], $_SESSION['department_Id'])) {
    // The JWT key should be the same as the one used in your Django application
    $key = "Zz5tw0Ionm3XPZZfN0NOml3z9FMfmpgXwovR9fp6ryDIoGRM8EPHAB6iHsc0fb";
    $payload = [
        "userData" => [
            "nickname" => $_SESSION['nickname'],
            "login_id" => $_SESSION['login_id'],
            "inst_id" => $_SESSION['inst_id'],
            "role" => $_SESSION['role'],
            "department_Id" => $_SESSION['department_Id']
        ],
        "exp" => time() + (60 * 60 * 4) // 4-hour expiration
    ];

    // Encode the payload into a JWT
    $jwt = JWT::encode($payload, $key, 'HS256');
    // Save JWT to session
    $_SESSION['jwt'] = $jwt;

    echo '<pre>Session after setting JWT: ';
    print_r($_SESSION);
    echo '</pre>';

    // Print the JWT token to check if it's present in the session
    echo '<pre>JWT Token in PHP: ' . $_SESSION['jwt'] . '</pre>';

    // Log the JWT token to a text file for debugging
    $logfile = 'jwt_log.txt';
    file_put_contents($logfile, 'JWT Token in PHP: ' . $_SESSION['jwt'] . PHP_EOL, FILE_APPEND);

    // Base URL of your Django application
    $djangoBaseUrl = "http://127.0.0.1:8000/";

    // Function to create a URL with the JWT token
    function createDjangoUrl($path, $jwt, $userId = null) {
        global $djangoBaseUrl;
        $url = $djangoBaseUrl . $path;
    
        if ($userId !== null) {
            $url .= $userId . '/'; // Append the user ID if provided
        }
    
        return $url . "?token=" . urlencode($jwt);
    }
    
    // Example: Creating a URL to the Django users page
    $djangoUsersUrl = createDjangoUrl('users/', $jwt);
    
    // Redirect to the Django users page
    header("Location: " . $djangoUsersUrl);
    ob_end_flush();
    exit;
    
} else {
    // If the user is not logged in, handle accordingly
    echo "User is not logged in.";
}
?>
