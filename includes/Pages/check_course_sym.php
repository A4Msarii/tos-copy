<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$value=$_POST['value']; 
$query1 = "SELECT CTPid FROM ctppage where symbol='$value'";
$statement1 = $connect->prepare($query1);
$statement1->execute();
if($statement1->rowCount() > 0)
{
    echo "Course symbol already exist";
}
else
{
    echo "Course symbol is available";
}
?>         