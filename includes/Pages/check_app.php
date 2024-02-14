<?php 
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$appName=$_REQUEST['appName'];
 if ($appName == "gradeSheet") {
    header("Location:".BASE_URL."includes/Pages/Home.php");
} elseif ($appName == "library") {
    header("Location:".BASE_URL."Library/index.php");
} elseif ($appName == "scheduling") {
    header("Location:".BASE_URL."Scheduling/home.php");
} elseif ($appName == "bri") {
    header("Location:".BASE_URL."includes/Pages/apps-bri.php");
} elseif ($appName == "hotwash") {
    header("Location:".BASE_URL."includes/Pages/hotwash.php");
} elseif ($appName == "testpage") {
   header("Location:".BASE_URL."Test/index.php");
} elseif ($appName == "globalsearch") {
    header("Location:".BASE_URL."includes/Pages/global_search.php");
}
?>