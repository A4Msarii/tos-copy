<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if(isset($_POST['instructor_id'])) {
    $instructorId = $_POST['instructor_id'];
    
    // Fetch instructor information from the database
    $query = $connect->prepare("SELECT id, nickname, file_name FROM users WHERE id = :instructor_id");
    $query->bindParam(':instructor_id', $instructorId);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    // Prepare instructor data
    $instructorData = array(
        'id' => $result['id'],
        'name' => $result['nickname']
    );

    // Check if image file exists
    if (!empty($result['file_name'])) {
        $instructorData['image'] = BASE_URL . 'includes/Pages/upload/' . $result['file_name'];
    } else {
        // If no image available, use default avatar
        $instructorData['image'] = BASE_URL . 'includes/Pages/avatar/avatar.png';
    }
    
    // Return instructor data as JSON
    echo json_encode($instructorData);
}
?>
