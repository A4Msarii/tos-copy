
<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$f_id = $_POST['fol'];
 $id=$_POST['id'];
$brief=$_POST['brief'];
$query1="UPDATE `user_briefcase`
	SET `briefcase_name` = '$brief'
	WHERE `id`='$id'";
	$statement1 = $connect->prepare($query1);
	$statement1->execute();
	$_SESSION['success'] = "Briefcase Edited Successfully";

header('Location:fheader2.php?folder_ID='.$f_id.'&b_id='.$id);
?>