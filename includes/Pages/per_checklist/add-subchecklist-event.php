<?php
session_start(); // Start the session

include('../../../includes/config.php');
include('../../../includes/connect.php');

// Get the user_id from the request
$user_id = $_REQUEST['user_id'];

// Get the subevent data from the POST request
$mainChecklistId = $_POST['main_checklist_id']; // Main checklist ID
$name = $_POST['name']; // Subevent name
$date = $_POST['date']; // Subevent date

try {
    $query_sub = "INSERT INTO per_subchecklist (user_id, name, main_checklist_id, date) VALUES (:user_id, :name, :main_checklist_id, :date)";
    $statement_sub = $connect->prepare($query_sub);

    $statement_sub->bindParam(':user_id', $user_id);
    $statement_sub->bindParam(':main_checklist_id', $mainChecklistId);
    $statement_sub->bindParam(':name', $name);
    $statement_sub->bindParam(':date', $date);

    if ($statement_sub->execute()) {
        echo "Subevent Added Successfully";
    } else {
        echo "Error occurred while saving the subevent.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
