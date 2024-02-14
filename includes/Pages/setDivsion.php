<?php

session_start();
if (isset($_REQUEST['divisionName'])) {
    $divisionName = $_REQUEST['divisionName'];
    $divisionColor = $_REQUEST['divisionColor'];
    if ($divisionColor == "") {
        $divisionColor = "gray";
    }
    $id = $_REQUEST['id'];
    $_SESSION['division_id'] = $id;
    $_SESSION['division_NAME'] = $divisionName;
    $_SESSION['division_COLOR'] = $divisionColor;
}

header("Location: {$_SERVER['HTTP_REFERER']}");
