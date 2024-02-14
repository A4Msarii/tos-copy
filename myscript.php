<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Retrieve the data from the POST request
// $data = $_POST['data'];
// $data = $_POST['data'];
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    // rest of your code
    // Display the data
echo '<pre>';
print_r($_POST);
echo '</pre>';
} else {
    echo "No data received.";
}




?>
