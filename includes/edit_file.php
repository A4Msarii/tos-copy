<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// Process form data

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $file_name = $_FILES['file']['name'];

    // Prepare SQL statement to update the data
    $sql = "UPDATE files SET name = :name, file = :file WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);

    // If a new file is uploaded, move it to the desired location
    if (!empty($file_name)) {
        $file_temp = $_FILES['file']['tmp_name'];
        $file_path = 'files/' . $file_name;
        move_uploaded_file($file_temp, $file_path);
        $stmt->bindParam(':file', $file_path);
    } else {
        // If no file is uploaded, use the existing file path
        $stmt->bindParam(':file', $_POST['old_file']);
    }

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect to the homepage
        header("Location: multiple_files.php");
        exit;
    } else {
        echo "Error updating record: " . $stmt->errorCode();
    }
}
?>
