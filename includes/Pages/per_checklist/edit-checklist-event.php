<?php
session_start(); // Start the session

include('../../../includes/config.php');
include('../../../includes/connect.php');

// Get the user_id from the session (assuming it's stored in the session)
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
    $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
    $event_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($title && $date && $color && $event_id !== false) {
        // Use prepared statements to prevent SQL injection
        $query_update = "UPDATE per_checklist SET title = ?, date = ?, color = ? WHERE id = ? AND user_id = ?";
        $statement_update = $connect->prepare($query_update);
        $statement_update->bind_param("ssssi", $title, $date, $color, $event_id, $user_id);

        if ($statement_update->execute()) {
            $_SESSION['success'] = "Checklist Updated Successfully";
            header('Location: per_check_calender.php');
            exit();
        } else {
            $_SESSION['error'] = "Error updating the checklist";
        }
    } else {
        $_SESSION['error'] = "Invalid or missing input data";
    }
} else {
    $_SESSION['error'] = "Invalid request method";
}

// Redirect back to the calendar page (with an error message if applicable)
header('Location: per_check_calender.php');

