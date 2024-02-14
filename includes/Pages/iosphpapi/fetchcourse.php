<?php
ini_set('display_errors', 1);

define("BASE_URL","/latest/TOS/");
 define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/latest/TOS/");
 $connect = new PDO("mysql:host=localhost;dbname=grade sheet","root","");
session_start();
$sessionId = session_id();

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo $division_id = isset($_REQUEST['divisionid']) ? $_REQUEST['divisionid'] : '';

    if (empty($division_id)) {
        $response = array('success' => false, 'message' => 'please select division');
    } else {
        try {
            $q = "SELECT * FROM sidebar_ctp INNER JOIN ctppage ON sidebar_ctp.ctp_id =  ctppage.CTPid where ctppage.divisionType=:division";
            $statement = $connect->prepare($q);
            $statement->bindParam(':division', $division_id, PDO::PARAM_INT); // Assuming userId is an integer, adjust accordingly
            $statement->execute();
            if ($statement->rowCount() > 0) {  
                $result = $statement->fetchAll();
                $response = array('success' => true, 'message' => 'Fetched successfully.', 'ctpid' => $result);
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

