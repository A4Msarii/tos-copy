<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$id = $_REQUEST['id'];


	echo $query = "UPDATE `notifications`
SET `is_read` = '1'
WHERE `to_userid`='$id' and extra_data!='is selected to fill gradsheet of' and extra_data!='cloned_gradsheet' and `if_admin` IS NULL";

$statement = $connect->prepare($query);

$statement->execute();