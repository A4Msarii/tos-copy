<?php
ini_set('display_errors', 1);

define("BASE_URL","/latest/TOS/");
 define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/latest/TOS/");
 $connect = new PDO("mysql:host=localhost;dbname=grade sheet","root","");
session_start();
$sessionId = session_id();

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $userId = isset($_POST['userId']) ? $_POST['userId'] : '';

    if (empty($userId)) {
        $response = array('success' => false, 'message' => 'please login again');
    } else {
        try {
        $q = "SELECT *
        FROM homepage
        JOIN userdepartment ON homepage.id = userdepartment.departmentId
        WHERE userdepartment.userId = :userId";
    
    $statement = $connect->prepare($q);
    $statement->bindParam(':userId', $userId, PDO::PARAM_INT); // Assuming userId is an integer, adjust accordingly
    $statement->execute();
    
    // Fetch all results
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                $response = array('success' => true, 'message' => 'Fetched successfully.', 'data' => $result);

            } else {
                $response = array('success' => false, 'message' => 'No data found.', 'data' => 'Not Added yet');
            }

            $stmt = null; // close the statement
        } catch (PDOException $e) {
            $response = array('success' => false, 'message' => 'Database error: ' . $e->getMessage());
        }
    }
    echo json_encode($response);
} 

$conn = null; // close the database connection


?>

