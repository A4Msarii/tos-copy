<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['keyword'])) {
    $keyword = $_POST['keyword'];
    $query = "SELECT id,nickname FROM users WHERE nickname LIKE :keyword";
    $stmt = $connect->prepare($query);
    $stmt->bindValue(':keyword', '%' . $keyword . '%');
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return results as JSON
    echo json_encode($results);
}

 if (isset($_REQUEST['instName'])) {
    $keyword = $_REQUEST['instName'];
    if (isset($_REQUEST['default'])) {
        $query = "SELECT id,nickname FROM users WHERE role = 'instructor'";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    } else {
        $query = "SELECT id,nickname FROM users WHERE role = 'instructor' AND nickname LIKE :keyword";
        $stmt = $connect->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
    }

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return results as JSON
    echo json_encode($results);
}
