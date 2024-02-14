<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['className1'])) {
    $className = $_REQUEST['className1'];
    $pageName = $_REQUEST['pageName1'];

    $sql = "DELETE FROM classfilter WHERE pageName = '$pageName'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $query = "INSERT INTO classfilter(className, pageName) values('$className','$pageName')";
    $statement = $connect->prepare($query);
    $statement->execute();
}
