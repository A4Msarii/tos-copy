<?php
// Include your database connection code here (e.g., $connect)
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    
    // Split the search term into words
    $words = explode(" ", $searchTerm);

    // Build a dynamic query with LIKE for each word
    $whereClauses = array();
    $params = array();
    foreach ($words as $word) {
        $whereClauses[] = "question LIKE ?";
        $params[] = "%" . $word . "%";
    }
    
    $whereClause = implode(" OR ", $whereClauses);

    $q4 = "SELECT * FROM exam_question WHERE type='mcq' AND ($whereClause)";
    $st4 = $connect->prepare($q4);
    
    // Bind parameters dynamically
    for ($i = 0; $i < count($params); $i++) {
        $st4->bindValue(($i + 1), $params[$i], PDO::PARAM_STR);
    }

    $st4->execute();

    if ($st4->rowCount() > 0) {
        $re4 = $st4->fetchAll();
        foreach ($re4 as $row4) {
            // Output HTML for each matching question (similar to your existing code)
            ?>
            <!-- Your existing HTML code for displaying the questions -->
            <?php
        }
    } else {
        echo '<p>No matching questions found.</p>';
    }
}
?>

