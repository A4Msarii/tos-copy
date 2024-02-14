<?php
session_start(); // Start the session

include('../../../includes/config.php');
include('../../../includes/connect.php');

// Get the subchecklist ID and new subchecklist name from the request
$subeventId = $_POST['id']; // Assuming the data is sent via POST
$newSubeventName = $_POST['name'];

try {
    // Prepare and execute the query to update the subchecklist
    $query = "UPDATE per_subchecklist SET name = :newSubeventName WHERE id = :subeventId";
    $statement = $connect->prepare($query);
    $statement->bindParam(':newSubeventName', $newSubeventName);
    $statement->bindParam(':subeventId', $subeventId);
    $statement->execute();

    // Check if any rows were affected by the update
    $rows_affected = $statement->rowCount();
    if ($rows_affected > 0) {
        echo "Subchecklist updated successfully";
    } else {
        echo "No changes were made to the subchecklist";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
