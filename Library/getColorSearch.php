<?php
session_start();
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['colorValue'])) {
    $colorValue = $_REQUEST['colorValue'];
    $query = $connect->query("SELECT * FROM editor_data WHERE userId = '$userId' AND favouriteColor = '$colorValue'");

    while ($data = $query->fetch()) {
        $colorName = $data['favouriteColor'];
        $color = $data['color'];
        $pageName = $data['pageName'];
        echo "<div class='folbr' style='border-left:5px solid $colorName;'>";
        echo "<h1 style='color:$color;'>$pageName</h1>";
        echo "</div>";
    }
}
