<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id=$_REQUEST['id'];

$q6 = "SELECT * FROM temp_cat where cat_id='$id'";
$st6 = $connect->prepare($q6);
$st6->execute();



if ($st6->rowCount() == 0) {
$query = "INSERT INTO temp_cat (cat_id) VALUES ('$id')";
$stmt = $connect->prepare($query);
$stmt->execute();

}
   ?>
