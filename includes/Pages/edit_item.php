

<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_REQUEST['id'])) {
    echo $id = $_POST['id'];
    $item = $_POST['item'];

    $itquery = "UPDATE `itembank`
SET `item` = '$item'
WHERE `id`='$id'";
    $statement_i = $connect->prepare($itquery);
    $statement_i->execute();
    echo $itquery;
    $_SESSION['success'] = "Data Edited Successfully";

    header('Location:add_item_subitem.php');
}

if(isset($_REQUEST['ctsId'])){
    $ctsId = $_REQUEST['ctsId'];
    $condition = $_REQUEST['condition'];
    $standards = $_REQUEST['standards'];

    $updateQuery = "UPDATE itembank SET CTScondition = '$condition',CTSstandards = '$standards' WHERE id = '$ctsId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "CTS Added Successfully";

    header('Location:add_item_subitem.php');

}

if(isset($_REQUEST['ctsId1'])){
    $ctsId = $_REQUEST['ctsId1'];
    $condition = $_REQUEST['condition1'];
    $standards = $_REQUEST['standards1'];

    $updateQuery = "UPDATE sub_item SET CTScondition = '$condition',CTSstandards = '$standards' WHERE id = '$ctsId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();

    $_SESSION['success'] = "CTS Added Successfully";

    header('Location:add_item_subitem.php');

}
?>