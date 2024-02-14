<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$check=$_POST['check'];
$que = "SELECT id FROM users where studid='$check'";
$stat = $connect->prepare($que);
$stat->execute();
if($stat->rowCount() > 0)
{
    echo "user id already taken";
}
else
{
    echo "user id available";
}
?>          