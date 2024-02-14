<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$role=$_REQUEST['role'];
$Dashboard=$_REQUEST['Dashboard']?$_REQUEST['Dashboard']:'0';
$phase_page=$_REQUEST['phase_page']?$_REQUEST['phase_page']:'0';
$class_page=$_REQUEST['class_page']?$_REQUEST['class_page']:'0';
$actual=$_REQUEST['actual']?$_REQUEST['actual']:'0';
$sim=$_REQUEST['sim']?$_REQUEST['sim']:'0';
$Academic=$_REQUEST['Academic']?$_REQUEST['Academic']:'0';
$Testing=$_REQUEST['Testing']?$_REQUEST['Testing']:'0';
$evaluation=$_REQUEST['evaluation']?$_REQUEST['evaluation']:'0';
$Task=$_REQUEST['Task']?$_REQUEST['Task']:'0';
$Student=$_REQUEST['Student']?$_REQUEST['Student']:'0';
$Emergency=$_REQUEST['Emergency']?$_REQUEST['Emergency']:'0';
$Qual=$_REQUEST['Qual']?$_REQUEST['Qual']:'0';
$Clearance=$_REQUEST['Clearance']?$_REQUEST['Clearance']:'0';
$CAP=$_REQUEST['CAP']?$_REQUEST['CAP']:'0';
$Memo=$_REQUEST['Memo']?$_REQUEST['Memo']:'0';
$Report=$_REQUEST['Report']?$_REQUEST['Report']:'0';
$Discipline=$_REQUEST['Discipline']?$_REQUEST['Discipline']:'0';
$Start0=$_REQUEST['Start0']?$_REQUEST['Start0']:'0';
$Datapage=$_REQUEST['Datapage']?$_REQUEST['Datapage']:'0';
$CTP=$_REQUEST['CTP']?$_REQUEST['CTP']:'0';
$Newcourse=$_REQUEST['Newcourse']?$_REQUEST['Newcourse']:'0';
$sidebar_phase=$_REQUEST['sidebar_phase']?$_REQUEST['sidebar_phase']:'0';
$Quiz=$_REQUEST['Quiz']?$_REQUEST['Quiz']:'0';
$select_Course=$_REQUEST['select_Course']?$_REQUEST['select_Course']:'0';
$select_student_details=$_REQUEST['select_student_details']?$_REQUEST['select_student_details']:'0';

$array=serialize(array(
"Dashboard"=>$Dashboard,
"phase_page"=>$phase_page,
"class_page"=>$class_page,
"actual"=>$actual,
"sim"=>$sim,
"Academic"=>$Academic,
"Testing"=>$Testing,
"evaluation"=>$evaluation,
"Task"=>$Task,
"Student"=>$Student,
"Emergency"=>$Emergency,
"Qual"=>$Qual,
"Clearance"=>$Clearance,
"CAP"=>$CAP,
"Memo"=>$Memo,
"Report"=>$Report,
"Discipline"=>$Discipline,
"Start0"=>$Start0,
"Datapage"=>$Datapage,
"CTP"=>$CTP,
"Newcourse"=>$Newcourse,
"sidebar_phase"=>$sidebar_phase,
"Quiz"=>$Quiz,
"select_Course"=>$select_Course,
"select_student_details"=>$select_student_details,
));

$sql = "INSERT INTO roles (roles,permission) VALUES ('".$role."','".$array."')";

$statement = $connect->prepare($sql);

$statement->execute();
header('Location:roles.php');
?>