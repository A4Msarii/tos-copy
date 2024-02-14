<?php
session_start(); // Start the session

// Include necessary files
include('../../../includes/config.php');
include('../../../includes/connect.php');

// Check if the ID parameter is set and not empty
if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = $_REQUEST['id'];

    // Prepare and execute the SQL query to fetch event details
    $query = "SELECT * FROM per_checklist WHERE id = ?";
    $statement = $connect->prepare($query);
    $statement->bind_param("i", $id);
    $statement->execute();

    // Get the result
    $result = $statement->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch the event details
        $eventData = $result->fetch_assoc();
        
        // Convert the event data to JSON format and output it
        echo json_encode($eventData);
    } else {
        // No event found with the given ID
        echo json_encode(array('error' => 'Event not found'));
    }

    // Close the statement and database connection
    $statement->close();
} else {
    // No ID parameter provided
    echo json_encode(array('error' => 'No event ID provided'));
}

// Close the database connection
$connect->close();
?>
