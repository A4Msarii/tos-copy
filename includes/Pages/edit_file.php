<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
// Process form data
$page_redirection = $_POST['page_redirection'];
$id = $_REQUEST['id'];
$shopName = $_REQUEST['shop'];
$shopFileName = $_REQUEST['oldFile'];
$newFileName = $_FILES['newImage']['name'];

if (!empty($newFileName)) {
    $file_path = 'shops/' . $newFileName;
    $tempname = $_FILES["newImage"]["tmp_name"];
    move_uploaded_file($tempname, $file_path);
    $shopFileName = $newFileName;
}

$sql = "UPDATE shops SET shops=?, image=? WHERE id=?";
$stmt = $connect->prepare($sql);

if ($stmt->execute([$shopName, $shopFileName, $id])) {
    if ($page_redirection == "admin") {
        header("Location: file_management.php");
        exit(); // Add exit after the header redirect
    } elseif ($page_redirection == "user") {
        header('Location: ../../Library/file_management.php');
        exit(); // Add exit after the header redirect
    }
} else {
    echo "Error updating record: " . $stmt->errorCode();
}

 

// // Check if form is submitted
// if (isset($_POST['submit'])) {
//     // Get form data
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $file_name = $_FILES['file']['name'];

//     // Prepare SQL statement to update the data
//     $sql = "UPDATE files SET name = :name, fileName = :file WHERE id = :id";
//     $stmt = $connect->prepare($sql);

//     // Bind parameters to the prepared statement
//     $stmt->bindParam(':name', $name);
//     // $stmt->bindParam(':fileName', $file_name);
//     $stmt->bindParam(':id', $id);

//     // If a new file is uploaded, move it to the desired location
//     if (!empty($file_name)) {
//         $file_temp = $_FILES['file']['tmp_name'];
//         $file_path = 'files/' . $file_name;
//         move_uploaded_file($file_temp, $file_path);
//         $stmt->bindParam(':fileName', $file_path);
//     } else {
//         // If no file is uploaded, use the existing file path
//         $stmt->bindParam(':fileName', $_POST['old_file']);
//     }

//     // Execute the prepared statement
//     if ($stmt->execute()) {
//         // Redirect to the homepage
//         header("Location: multiple_files.php");
//         exit;
//     } else {
//         echo "Error updating record: " . $stmt->errorCode();
//     }  





// Check if form is submitted
// if (isset($_POST['submit'])) {
//     // Get form data
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $file_name = $_FILES['file']['name'];

//     // Prepare SQL statement to update the data
//     $sql = "UPDATE files SET name = :name, fileName = :file WHERE id = :id";
//     $stmt = $connect->prepare($sql);

//     // Bind parameters to the prepared statement
//     $stmt->bindParam(':name', $name);
//     // $stmt->bindParam(':fileName', $file_name);
//     $stmt->bindParam(':id', $id);

//     // If a new file is uploaded, move it to the desired location
//     if (!empty($file_name)) {
//         $file_temp = $_FILES['file']['tmp_name'];
//         $file_path = 'files/' . $file_name;
//         move_uploaded_file($file_temp, $file_path);
//         $stmt->bindParam(':fileName', $file_path);
//     } else {
//         // If no file is uploaded, use the existing file path
//         $stmt->bindParam(':fileName', $_POST['old_file']);
//     }

//     // Execute the prepared statement
//     if ($stmt->execute()) {
//         // Redirect to the homepage
//         header("Location: multiple_files.php");
//         exit;
//     } else {
//         echo "Error updating record: " . $stmt->errorCode();
//     }
// }
?>