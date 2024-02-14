
<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['briefId'])) {
    $f_id = $_REQUEST['fol'];
    $briefId = $_REQUEST['briefId'];
    $brief = $_REQUEST['brief'];

    $query1 = "UPDATE `user_briefcase`
	SET `briefcase_name` = '$brief'
	WHERE `id`='$briefId'";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    $_SESSION['success'] = "Briefcase Edited Successfully";

    header('Location:../includes/Pages/fheader1.php?folder_ID=' . $f_id . '&b_id=' . $id);
}

if (isset($_REQUEST['briefDeleteId'])) {
    $briefDeleteId = $_REQUEST['briefDeleteId'];
    $f_id = $_REQUEST['fol'];

    $sql = "DELETE FROM user_briefcase WHERE id='$briefDeleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM user_files WHERE briefId='$briefDeleteId'";
    $statement = $connect->prepare($sql);
    $statement->execute();

    $sql1 = "DELETE FROM editor_data WHERE briefId='$briefDeleteId'";
    $statement = $connect->prepare($sql1);
    $statement->execute();

    $_SESSION['danger'] = "Briefcase Deleted Successfully";

    header('Location:../includes/Pages/fheader1.php?folder_ID=' . $f_id);
}
?>

