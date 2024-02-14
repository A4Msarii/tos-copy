 <?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
 $copied_id=$_REQUEST['copied_id'];
 $copyto_id=$_REQUEST['copyto_id'];
 $role=$_REQUEST['role'];
$roles = $connect->prepare("SELECT permission FROM `roles` WHERE id=?");
$roles->execute([$copied_id]);
 $name1 = $roles->fetchColumn();
$updateQuery = "UPDATE roles SET permission = '$name1',copiedfrom='$copied_id' WHERE id = '$copyto_id'";
$statement_editor = $connect->prepare($updateQuery);
$statement_editor->execute();
 $_SESSION['success'] = "Permission copied for roles";
 header('Location:role-update.php?id='.$copyto_id.'&name='.$role);
?>