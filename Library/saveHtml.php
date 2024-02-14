<?php

include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

$htmlId = $_REQUEST['htmlId'];

$sql = $connect->query("SELECT * FROM editor_data WHERE id = '$htmlId'");

while($data = $sql->fetch()){
    $pageName = $data['pageName'];
    $pageData = $data['editorData'];
}

$html = $pageName;
$html .= $pageData;

header('Content-Type: text/html');
header("content-disposition: attachment;filename=$pageName.html");

echo $html;


?>
