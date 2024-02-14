
<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$test_up=$_POST['test'];
$symbol_up=$_POST['shorttest'];

$query1="UPDATE `test`
SET `test` = '$test_up',`shorttest`='$symbol_up'
WHERE `id`='$id'";
$statement1 = $connect->prepare($query1);
$statement1->execute();
echo $query1;
$_SESSION['success'] = "Data Edited Successfully";

header('Location:phase-view.php');
?>