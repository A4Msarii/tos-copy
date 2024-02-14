<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['editMenuName'])) {
    $menuName = $_REQUEST['menuName'];
    $menuRef = $_REQUEST['menuRef'];

    $checkAvl = $connect->query("SELECT count(*) FROM custom_menu_names WHERE refrence = '$menuRef'");
    if ($checkAvl->fetchColumn() > 0) {
        $query_ad = "UPDATE custom_menu_names SET customName = '$menuName' WHERE refrence = '$menuRef'";
        $statement_ad = $connect->prepare($query_ad);
        $statement_ad->execute();
    } else {
        $sql = "INSERT INTO custom_menu_names (customName,refrence) VALUES ('$menuName','$menuRef')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
}
