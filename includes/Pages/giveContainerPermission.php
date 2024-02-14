<?php
include '../config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['containerPermission'])) {
    $roles = $_REQUEST['userId'];
    $name = 0;
    $cardName = $_REQUEST['cardName'];

    while ($name < count($roles)) {
        $role = $roles[$name];
        $dupliQuery = $connect->query("SELECT count(*) FROM rolepermission WHERE rolePermission = '$role' AND cardName = '$cardName'");
        $dupliData = $dupliQuery->fetchColumn();

        if ($dupliData == 0) {
            $query = "INSERT INTO rolepermission (rolePermission,cardName) VALUES ('$role','$cardName')";
            // echo $query."<br>";
            $stmt = $connect->prepare($query);
            $stmt->execute();
        }

        $name++;
    }
    $_SESSION['success'] = "Permission Added successfully";

    header('Location:permissionPage.php');
}

if (isset($_REQUEST['deleteId'])) {
    $deleteId = $_REQUEST['deleteId'];

    $sql = "DELETE FROM rolepermission WHERE id = '$deleteId'";
    $statement = $connect->prepare($sql);

    $statement->execute();

    $_SESSION['danger'] = "Permission Deleted Successfully";
    header('Location:permissionPage.php');
}
