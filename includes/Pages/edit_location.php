

<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['locationEdit'])) {
    $editLocationId = $_REQUEST['editLocationId'];
    $editLocation = $_REQUEST['editLocation'];
    $editLocationType = $_REQUEST['editLocationType'];

    if ($editLocationType == '') {
        $last_space_pos = strrpos($editLocation, "\\");
        $substring = substr($editLocation, $last_space_pos + 1);
        $location = $substring;
    } else {
        $location = $editLocationType;
    }

    $editQuery = "UPDATE files SET name = '$editLocation',type = '$location' WHERE id = '$editLocationId'";
    $statement_editor = $connect->prepare($editQuery);
    $statement_editor->execute();
    $_SESSION['success'] = "Location Updated Successfully";
    header("Location:file_management.php");
}

?>