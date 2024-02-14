<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if(isset($_REQUEST['refId'])){
    $refId = $_REQUEST['refId'];

    $refQ = $connect->query("SELECT refrence FROM document_test WHERE id = '$refId'");
    echo $refQ->fetchColumn();
}

?>