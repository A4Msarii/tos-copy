<?php
include('../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
echo $id=$_POST['id'];
$brief=$_POST['brief'];
if (isset($_REQUEST['submit_briefcase'])) {
	$query="UPDATE `briefcase`
	SET `briefcase` = '$brief'
	WHERE `id`='$id'";
	$statement = $connect->prepare($query);
	$statement->execute();
}
if (isset($_REQUEST['submit_user_briefcase'])) {
	$query1="UPDATE `user_briefcase`
	SET `briefcase_name` = '$brief'
	WHERE `id`='$id'";
	$statement1 = $connect->prepare($query1);
	$statement1->execute();
}

if (isset($_REQUEST['submit_user_briefcase_dashboard'])) {
	$query1="UPDATE `user_briefcase`
	SET `briefcase_name` = '$brief'
	WHERE `id`='$id'";
	$statement1 = $connect->prepare($query1);
	$statement1->execute();
	$_SESSION['success'] = "Briefcase Edited Successfully";

header('Location:dashboard_library.php');
}

if (isset($_REQUEST['submit_user_briefcase_dashboard_admin'])) {
	$query1="UPDATE `briefcase`
	SET `briefcase` = '$brief'
	WHERE `id`='$id'";
	$statement1 = $connect->prepare($query1);
	$statement1->execute();
	$_SESSION['success'] = "Briefcase Edited Successfully";

header('Location:dashboard_library.php');
}

if (isset($_REQUEST['submit_user_briefcase_deatail'])) {
	$query1="UPDATE `user_briefcase`
	SET `briefcase_name` = '$brief'
	WHERE `id`='$id'";
	$statement1 = $connect->prepare($query1);
	$statement1->execute();
	$_SESSION['success'] = "Briefcase Edited Successfully";

header('Location:alldetails.php');
}
else
{
// echo $query;
$_SESSION['success'] = "Briefcase Edited Successfully";

header('Location:grid_view_brief.php');
}
?>

