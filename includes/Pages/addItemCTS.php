<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['checkboxes'])) {
    $checkboxes = $_REQUEST['checkboxes'];
    $subCheckedBoxes = $_REQUEST['subCheckedBoxes'];
    foreach ($checkboxes as $checkbox) {
        $updateQuery = "UPDATE item SET CTS = '1' WHERE id = '$checkbox'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    }

    foreach ($subCheckedBoxes as $subCheckbox){
        $updateQuery = "UPDATE subitem SET CTS = '1' WHERE id = '$subCheckbox'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    }
}
