<?php
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');

// echo "hello";
// die();


if(isset($_REQUEST['f_Id'])){
    $f_Id = $_REQUEST['f_Id'];
    $html = "<body>";
    $html  .="<p style='color:white'>FolderId = $f_Id </p>";
    $html .= "</body>";

    echo $html;
}

// if(isset($_REQUEST['id'])){
//     $id = $_REQUEST['id'];
//     echo "<p style='z-index:111;'>$id</p>";
//     die();
// }
