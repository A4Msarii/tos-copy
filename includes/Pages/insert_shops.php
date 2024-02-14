<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$page_redirection = $_POST['page_redirection'];
// Process form data
if (isset($_POST["saveshop"])) {
    // Retrieve form data
    $shops = $_POST["shop"];
    $files = $_FILES["file"];

    // Loop through form data and insert into database
    for ($i = 0; $i < count($shops); $i++) {
        $shop = $shops[$i];
        $file_name = $files["name"][$i];
        $file_temp = $files["tmp_name"][$i];
        $file_size = $files["size"][$i];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validate file type
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Prepare the SQL query
        $stmt = $connect->prepare("INSERT INTO shops (shops, image) VALUES (:shops, :image)");

        // Bind the parameters to the placeholders
        $stmt->bindParam(':shops', $shop);
        $stmt->bindParam(':image', $file_name);

        // Execute the query
        $stmt->execute();

        // Move uploaded file to a directory
        $target_dir = "shops/";
        $target_file = $target_dir . basename($file_name);
        move_uploaded_file($file_temp, $target_file);
    }

    // Redirect to a success page
    if ($page_redirection == "admin") {
        header('Location:file_management.php');
        exit();
    }
    if ($page_redirection == "user") {
        header('Location:../../Library/file_management.php');
        exit();
    }
}

if (isset($_POST["addShopLib"])) {
    // Retrieve form data

    $shops = $_POST["shop"];
    $files = $_FILES["file"];
    $shelf_Id = $_REQUEST['shelf_Id'];
    $lab_Id = $_REQUEST['lab_Id'];
    $userId = $_SESSION['login_id'];

    // Loop through form data and insert into database
    for ($i = 0; $i < count($shops); $i++) {
        $shop = $shops[$i];
        $file_name = $files["name"][$i];
        $file_temp = $files["tmp_name"][$i];
        $file_size = $files["size"][$i];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validate file type
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Prepare the SQL query
        $stmt = $connect->prepare("INSERT INTO shops (shops, image) VALUES (:shops, :image)");

        // Bind the parameters to the placeholders
        $stmt->bindParam(':shops', $shop);
        $stmt->bindParam(':image', $file_name);

        // Execute the query
        $stmt->execute();

        // Move uploaded file to a directory
        $target_dir = "shops/";
        $target_file = $target_dir . basename($file_name);
        move_uploaded_file($file_temp, $target_file);

        $lastQ = $connect->query("SELECT id FROM shops ORDER BY id DESC LIMIT 1");
        $lastId = $lastQ->fetchColumn();

        $query = "INSERT INTO shelf_shop (user_id,shelf_id,shop_id,lib_id) VALUES ('$userId','$shelf_Id','$lastId','$lab_Id')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    }

    // Redirect to a success page
    $_SESSION['success'] = "Shop Inserted Successfully";
    header("Location:../../Library/index.php");
}
