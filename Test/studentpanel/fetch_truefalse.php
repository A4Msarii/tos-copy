<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$itemsPerPage = 1;

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

$offset = ($currentPage - 1) * $itemsPerPage;

$query = "SELECT * FROM `exam_question` WHERE type='true_false' LIMIT :itemsPerPage OFFSET :offset";
$statement = $connect->prepare($query);
$statement->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$statement->bindValue(':offset', $offset, PDO::PARAM_INT);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);


$totalItemsQuery = "SELECT COUNT(*) as total FROM `exam_question` WHERE type='true_false'";
$totalItemsStatement = $connect->prepare($totalItemsQuery);
$totalItemsStatement->execute();
$totalItemsResult = $totalItemsStatement->fetch(PDO::FETCH_ASSOC);
$totalItems = $totalItemsResult['total'];


$totalPages = ceil($totalItems / $itemsPerPage);

$paginatedData = [];

foreach ($result as $key => $row) {
    $paginatedData[] = [
        'question' => $row['question'],
        'option1' => 'True',
        'option2' => 'False',

    ];
}

echo json_encode([
    'data' => $paginatedData,
    'totalPages' => $totalPages,
]);