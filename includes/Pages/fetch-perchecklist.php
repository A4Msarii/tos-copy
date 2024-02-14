<?php
// Include the necessary config and connect files
include('../../includes/config.php');
include('../../includes/connect.php');

// Get the user_id from the request
$user_id = $_REQUEST['user_id'];

// Initialize an empty array to store the combined data
$combinedData = [];

// Query per_checklist
$sqlQuery = "SELECT * FROM per_checklist WHERE user_id = '$user_id' ORDER BY id";
$stmt = $connect->prepare($sqlQuery);
$stmt->execute();
$eventArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($eventArray as $event) {
    $mainChecklistId = $event['id']; // Assuming 'id' is the main_checklist_id

    if($event['mainCheckId'] != ""){
        $mId = $event['mainCheckId'];
        $uIdQ = $connect->query("SELECT user_id FROM per_checklist WHERE id = '$mId'");
        $uId = $uIdQ->fetchColumn();

        $nameQ = $connect->query("SELECT nickname FROM users WHERE id = '$uId'");
        $event['mainName'] = $nameQ->fetchColumn();
    }

    // Query per_subchecklist for data related to the current main_checklist_id
    $subChecklistQuery = "SELECT * FROM per_subchecklist WHERE main_checklist_id = :mainChecklistId";
    $subChecklistStmt = $connect->prepare($subChecklistQuery);
    $subChecklistStmt->bindParam(':mainChecklistId', $mainChecklistId, PDO::PARAM_INT);
    $subChecklistStmt->execute();
    $subChecklistData = $subChecklistStmt->fetchAll(PDO::FETCH_ASSOC);

    // Add the subchecklist data as an array to the current event
    $event['subchecklist'] = $subChecklistData;

    // Add the current event to the combined data array
    $combinedData[] = $event;
}

// Encode the combinedData array as JSON
$json = json_encode($combinedData);

// Output the JSON data
header('Content-Type: application/json');
echo $json;
?>
