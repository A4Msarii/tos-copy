<?php
session_start(); // Start the session

include('../../../includes/config.php');
include('../../../includes/connect.php');

// Get the subevent ID from the POST data
$subeventId = $_POST['id'];

try {
    // Prepare and execute the query to delete the subevent
    $query_delete_subevent = "DELETE FROM per_subchecklist WHERE id = :id";
    $statement_delete_subevent = $connect->prepare($query_delete_subevent);
    $statement_delete_subevent->bindParam(':id', $subeventId);
    $statement_delete_subevent->execute();

    // Check if the deletion was successful
    if ($statement_delete_subevent->rowCount() > 0) {
        echo "success"; // Return 'success' upon successful deletion
    } else {
        echo "error"; // Return 'error' if no subevent was deleted
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); // Return any error message encountered during deletion
}
?>
