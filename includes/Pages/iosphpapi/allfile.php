<?php
ini_set('display_errors', 1);
// include('./includes/config.php');
// include './includes/connect.php';  // Assuming connect.php is in the same directory
define("BASE_URL","/latest/TOS/");
 define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/latest/TOS/");
 $connect = new PDO("mysql:host=localhost;dbname=grade sheet","root","");
session_start();
$sessionId = session_id();

$response = array();
//fetch selected department division list
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['departmentid'])){
    $depid = $_POST['departmentid'];

    $q = "SELECT *
        FROM division
        JOIN division_department ON division.id = division_department.divisionId
        WHERE division_department.departmentId = :departmentId;
    ";

    $statement = $connect->prepare($q);
    $statement->bindParam(':departmentId', $depid, PDO::PARAM_INT);
    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        $response = array('success' => true, 'message' => 'Fetched successfully.', 'data' => $results);
    } else {
        $response = array('success' => false, 'message' => 'Not Added yet');
    }
}
//fetch selected division ctp list
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_REQUEST['divisionid'])){
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
                $response = array('success' => true, 'message' => 'Fetched successfully.', 'data' => $result);
            }else {
                $response = array('success' => false, 'message' => 'Not Added yet');
            }
           
            $stmt = null; // close the statement
        } catch (PDOException $e) {
            $response = array('success' => false, 'message' => 'Database error: ' . $e->getMessage());
        }
    }
}
//verify username and passord authenticate
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($username) || empty($password)) {
        $response = array('success' => false, 'message' => 'Username and password are required.');
    } else {
        // Hash the password using MD5
        $hashedPassword = md5($password);

        $q = "SELECT * FROM users WHERE studid = :username AND `password` = :password";
        $statement = $connect->prepare($q);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $hashedPassword); // Bind the hashed password
        $statement->execute();
        
        // Fetch the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $response = array('success' => true, 'message' => 'Login successful.', 'data' => $result);
        } else {
            $response = array('success' => false, 'message' => 'Invalid Username or password.');
        }
    }
}
//fetch department where user is added
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_REQUEST['userId'])) {
    $userId = isset($_REQUEST['userId']) ? $_REQUEST['userId'] : '';
 
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
                $response = array('success' => false, 'message' => 'Not Added yet');
            }
 
            $stmt = null; // close the statement
        } catch (PDOException $e) {
            $response = array('success' => false, 'message' => 'Database error: ' . $e->getMessage());
        }
    } 
}
//select course for selected ctp
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_REQUEST['ctpid'])) {
    $ctpid = isset($_REQUEST['ctpid']) ? $_REQUEST['ctpid'] : '';
    if (empty($ctpid)) {
        $response = array('success' => false, 'message' => 'please select division');
    } else {
        try {
            $q = "SELECT cp.symbol,nc.CourseCode, nc.CourseName, MAX(nc.Courseid) AS MaxCourseid
            FROM newcourse nc
            JOIN ctppage cp ON nc.CourseName = cp.CTPid
            WHERE nc.CourseName = :ctp
            GROUP BY nc.CourseCode, nc.CourseName
            LIMIT 0, 25";
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
}
//fetch student for selected course
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_REQUEST['coursename']) && isset($_REQUEST['coursecode'])) {
    $coursename = isset($_REQUEST['coursename']) ? $_REQUEST['coursename'] : '';
    $coursecode = isset($_REQUEST['coursecode']) ? $_REQUEST['coursecode'] : '';
    if (empty($coursename) && empty($coursecode)) {
        $response = array('success' => false, 'message' => 'please select course');
    } else {
        try {
            $q = "SELECT *
            FROM users
            JOIN newcourse ON users.id = newcourse.StudentNames
            WHERE newcourse.CourseName = '$coursename'
              AND newcourse.CourseCode = '$coursecode';";
            $statement = $connect->prepare($q);
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
}
// Set proper headers for JSON response
header('Content-Type: application/json');

// Output JSON response
echo json_encode($response);
?>