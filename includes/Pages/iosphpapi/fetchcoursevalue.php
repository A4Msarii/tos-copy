<?php
ini_set('display_errors', 1);

define("BASE_URL","/latest/TOS/");
 define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/latest/TOS/");
 $connect = new PDO("mysql:host=localhost;dbname=grade sheet","root","");
session_start();
$sessionId = session_id();

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo $ctpid = isset($_REQUEST['ctpid']) ? $_REQUEST['ctpid'] : '';

    if (empty($ctpid)) {
        $response = array('success' => false, 'message' => 'please select division');
    } else {
        try {
            $q = "SELECT * FROM newcourse WHERE CourseName =:ctp GROUP BY CourseCode,CourseName";
            $statement = $connect->prepare($q);
            $statement->bindParam(':ctp', $ctpid, PDO::PARAM_INT); // Assuming userId is an integer, adjust accordingly
            $statement->execute();
            if ($statement->rowCount() > 0) {  
                $result = $statement->fetchAll();
                $response = array('success' => true, 'message' => 'Fetched successfully.', 'course' => $result);
            }else {
                $response = array('success' => false, 'message' => 'No data found.', 'data' => 'Not Added yet');
            }
           
            $stmt = null; // close the statement
        } catch (PDOException $e) {
            $response = array('success' => false, 'message' => 'Database error: ' . $e->getMessage());
        }
    }
    echo json_encode($response);
} 

 // close the database connection


?>

