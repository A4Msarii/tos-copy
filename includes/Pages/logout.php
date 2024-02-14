<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
// Destroy session
$userId = $_SESSION['login_id'];

$cookies = $_COOKIE;

// Iterate through each cookie and set its expiration time to a past date
foreach ($cookies as $name => $value) {
    setcookie($name, '', time() - 3600, '/');
}

echo '<script>';
echo 'localStorage.clear();';
echo '</script>';
$login = "DELETE FROM checkonline WHERE userId = '$userId'";
$statement = $connect->prepare($login);
$statement->execute();

$login1 = "DELETE FROM checktyping WHERE userId = '$userId'";
$statement = $connect->prepare($login1);
$statement->execute();

$_SESSION = array();


session_destroy();

$cookies = $_COOKIE;

// Loop through the cookies and set their expiration to a time in the past
foreach ($cookies as $name => $value) {
    setcookie($name, '', time() - 3600);
}

header("Location:../../index.php");
