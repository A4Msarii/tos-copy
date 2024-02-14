<?php
session_start(); // Start the session

include('../../../includes/config.php');
include('../../../includes/connect.php');

// Get the user_id from the request
$user_id = $_REQUEST['user_id'];

$title = isset($_POST['title']) ? $_POST['title'] : "";
$date = isset($_POST['start']) ? $_POST['start'] : ""; // Changed variable name to start
$end = isset($_POST['end']) ? $_POST['end'] : "";
$color = isset($_POST['color']) ? $_POST['color'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : "";
$priority = isset($_POST['priority']) ? $_POST['priority'] : "";
$category = isset($_POST['category']) ? $_POST['category'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";

$checkedValues = $_REQUEST['checkedValues'];
$permissionType = $_REQUEST['permissionType'];
$permissionRole = $_REQUEST['permissionRole'];

$query_devision = "INSERT INTO per_checklist (user_id, title, date, end, color, description, status, priority, category, comment) VALUES ('$user_id', '$title', '$date','$end', '$color', '$description', '$status', '$priority', '$category', '$comment')"; // Updated query to include start date
$statement_devision = $connect->prepare($query_devision);
$statement_devision->execute();

$lastQ = $connect->query("SELECT id FROM per_checklist ORDER BY id DESC LIMIT 1");
$lastId = $lastQ->fetchColumn();
$totalUser = count($checkedValues);
if ($totalUser > 0) {
    for ($i = 0; $i < $totalUser; $i++) {
        $userId = $checkedValues[$i];
        $query_devision = "INSERT INTO per_checklist (user_id, title, date, end, color, description, status, priority, category, comment,mainCheckId,sharedType,perType) VALUES ('$userId', '$title', '$date','$end', '$color', '$description', '$status', '$priority', '$category', '$comment','$lastId','particular','$permissionType')"; // Updated query to include start date
        $statement_devision = $connect->prepare($query_devision);
        $statement_devision->execute();
    }
} else {
    if ($permissionRole == "everyone") {
        $fetchUser = $connect->query("SELECT * FROM users WHERE id != '$user_id'");
        while ($userData = $fetchUser->fetch()) {
            $uId = $userData['id'];
            $query_devision = "INSERT INTO per_checklist (user_id, title, date, end, color, description, status, priority, category, comment,mainCheckId,sharedType,perType) VALUES ('$uId', '$title', '$date','$end', '$color', '$description', '$status', '$priority', '$category', '$comment','$lastId','$permissionRole','$permissionType')"; // Updated query to include start date
            $statement_devision = $connect->prepare($query_devision);
            $statement_devision->execute();
        }
    } else {
        $fetchUser = $connect->query("SELECT * FROM users WHERE id != '$user_Id' AND role = '$permissionRole'");
        while ($userData = $fetchUser->fetch()) {
            $uId = $userData['id'];
            $query_devision = "INSERT INTO per_checklist (user_id, title, date, end, color, description, status, priority, category, comment,mainCheckId,sharedType,perType) VALUES ('$uId', '$title', '$date','$end', '$color', '$description', '$status', '$priority', '$category', '$comment','$lastId','$permissionRole','$permissionType')"; // Updated query to include start date
            $statement_devision = $connect->prepare($query_devision);
            $statement_devision->execute();
        }
    }
}

$_SESSION['success'] = "Checklist Added Successfully";
header('Location: per_check_calender.php');
