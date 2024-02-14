<?php
ini_set('display_errors', 1);

define("BASE_URL","/latest/TOS/");
 define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/latest/TOS/");
 $connect = new PDO("mysql:host=localhost;dbname=grade sheet","root","");
session_start();
$sessionId = session_id();

$response = array();



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['departmentid'])) {
    // Assuming you have a valid PDO connection in $connect
    // If not, make sure to establish a connection before this code
    
    $depid = $_POST['departmentid'];

    // Use prepared statements to prevent SQL injection
    $q = "SELECT *
    FROM division
    JOIN division_department ON division.id = division_department.divisionId
    WHERE division_department.departmentId = :departmentId;
    ";
    
    $statement = $connect->prepare($q);
    $statement->bindParam(':departmentId', $depid, PDO::PARAM_INT); // Assuming userId is an integer, adjust accordingly
    $statement->execute();
    
    // Fetch all results
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    if ($results) {
        $response = array('success' => true, 'message' => 'Fetched successfully.', 'data' => $results);
    } else {
        $response = array('success' => false, 'message' => 'No data found.', 'data' => 'Not Added yet');
    }
} else {
    $response = array('success' => false, 'message' => 'Invalid request method.');
}

// Set proper headers for JSON response
header('Content-Type: application/json');

// Output JSON response
echo json_encode($response);
?>

