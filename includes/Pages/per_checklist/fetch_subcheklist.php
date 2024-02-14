<style type="text/css">
    @keyframes blink {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.blink-animation-info {
    animation: blink 2s infinite;
}
</style>
<?php
session_start(); // Start the session

include('../../../includes/config.php');
include('../../../includes/connect.php');

// Get the user_id from the session
$user_id = $_REQUEST['user_id'];

// Get the main checklist ID from the request
$mainChecklistId = $_REQUEST['main_checklist_id'];

try {
    // Prepare and execute the query to fetch subevents for the specified user_id and main checklist ID
    $query_subevents = "SELECT id, name FROM per_subchecklist WHERE user_id = :user_id AND main_checklist_id = :main_checklist_id";
    $statement_subevents = $connect->prepare($query_subevents);
    $statement_subevents->bindParam(':user_id', $user_id);
    $statement_subevents->bindParam(':main_checklist_id', $mainChecklistId);
    $statement_subevents->execute();

    // Fetch subevents data
    $subevents = $statement_subevents->fetchAll(PDO::FETCH_ASSOC);

    // Check if subevents were found
    if (count($subevents) > 0) {
    // Output the subevent names in a list
    echo "<div class='row'>";
    foreach ($subevents as $subevent) {
        echo "<div class='col-12'>";
        echo "<div class='d-flex justify-content-between align-items-center'>";
        echo "<h3 style='margin-bottom: 0;'>" . $subevent['name'] . "</h3>";
        // Add edit and delete buttons for each subevent
        echo "<div>";
        echo "<i class='bi bi-pen text-success edit-subevent mx-2' data-subevent-id='" . $subevent['id'] . "' style='font-size: large;cursor:pointer;'></i>";
        echo "<i class='bi bi-trash text-danger delete-subevent mx-2' data-subevent-id='" . $subevent['id'] . "' style='font-size: large;cursor:pointer;'></i>";
        echo "</div>";
        echo "</div>";
        echo "<hr style='margin: 10px;'>";
        echo "</div>";
    }
    echo "</div>"; // Close the row
}
 else {
        // If no subevents were found, output a message
        echo "<div style='display:flex;'><i class='bi bi-info-circle blink-animation-info' style='margin: 5px;font-size: x-large;color: red;'></i><p style='font-size:large;font-weight:bold;margin:10px;' class='text-dark'>No Subchecklist Added For This Checklist..</p></div>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!-- JavaScript code for handling edit and delete actions -->


