<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$query = "SELECT * FROM grade_per_notifications";
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $fetch .= '
  <li>
  <a href="#">
  <strong>'.$row["type"].'</strong><br />
  <small><em>'.$row["data"].'</em></small>
  </a>
  </li>
  ';
  echo $fetch;
}
}
else{
    $fetch .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM grade_per_notifications";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $fetch,
   'unseen_notification'  => $count
);
echo json_encode($data);

?>