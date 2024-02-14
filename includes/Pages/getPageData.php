<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

$pageId = $_REQUEST['pageId'];

$pageQuery = $connect->query("SELECT * FROM editor_data WHERE id = '$pageId'");
while($pageData = $pageQuery->fetch()){
    echo $pageData['editorData'];
}
