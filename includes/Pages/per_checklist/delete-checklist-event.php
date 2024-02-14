<?php
include('../../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sqlDelete = "DELETE FROM per_checklist WHERE id = :id";
    $statement = $connect->prepare($sqlDelete);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    if ($statement->execute()) {
        $_SESSION['danger'] = "Item Deleted Successfully";
    } else {
        $_SESSION['danger'] = "Failed to delete the item";
    }
} else {
    $_SESSION['danger'] = "Invalid request"; // Handle cases where 'id' is not set in the POST request.
}

header('Location: per_check_calender.php');
?>
