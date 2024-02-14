<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$error = '';
$output = '';
$symbol=$_POST['symbol'];
$phase_name=$_POST['phase_name'];
$ctp_name=$_POST['ctp_name'];
if (isset($_POST['submit_quiz'])) 
{
if($_POST["que"]=="" || $_POST["ans"]=="")
{
  
    $_SESSION['danger'] = "Simulation Class is Require";
    header("Location:quiz.php?&symbol=".$symbol."&ctp_name=".$ctp_name."&phase_name=".$phase_name);
}
else
{
$que = $_POST['que'];
$ans = $_POST['ans'];

foreach ($que as $key => $value) {
$query ="INSERT into quiz(que, ans,symbol, ctp_name,phase_name) values('".$value."', '".$ans[$key]."','$symbol','$phase_name','$ctp_name')";
$statement = $connect->prepare($query);
$statement->execute();


$_SESSION['success'] = "Simulation class inserted successfully..";
header("Location:quiz.php?phase_id=&symbol=".$symbol."&ctp_name=".$ctp_name."&phase_name=".$phase_name);
     }
  }
}
?>