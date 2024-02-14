<?php 
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
session_start();
$role=$_REQUEST['role'];
$sql = "SELECT count(*) FROM roles WHERE roles LIKE ?"; 
$result = $connect->prepare($sql); 
$result->execute([$role]); 
 $number_of_rows = $result->fetchColumn(); 
if($number_of_rows==0){
    $array=serialize(array(
        "Dashboard"=>"0",
        "phase_page"=>"0",
        "class_page"=>"0",
        "actual"=>"0",
        "sim"=>"0",
        "Academic"=>"0",
        "Testing"=>"0",
        "evaluation"=>"0",
        "Task"=>"0",
        "Student"=>"0",
        "Emergency"=>"0",
        "Qual"=>"0",
        "Clearance"=>"0",
        "CAP"=>"0",
        "Memo"=>"0",
        "Report"=>"0",
        "Discipline"=>"0",
        "Start0"=>"0",
        "Datapage"=>"0",
        "CTP"=>"0",
        "Newcourse"=>"0",
        "sidebar_phase"=>"0",
        "Quiz"=>"0",
        "select_Course"=>"0",
        "select_student_details"=>"0",
        "course_details"=>"0",
        "landing_page"=>"0",
        "checklist_pages"=>"0",
        "clone_delete"=>"0",
        "askclone_delete"=>"0",
        "fill_gradsheet"=>"0",
        "reset_gradsheet"=>"0",
        "Unlock_gradsheet"=>"0",
        "askUnlock_gradsheet"=>"0",
        "askreset_gradsheet"=>"0",
        "give_per_gradsheet"=>"0",
        "ask_per_gradsheet"=>"0",
        "give_Acedemic"=>"0",
        "Clear_Acedemic"=>"0",
        "ask_Acedemic"=>"0",
        "delete_task"=>"0",
        "give_marks_evalution"=>"0",
        "view_marks_evalution"=>"0",
        "give_marks_test"=>"0",
        "unlock_test"=>"0",
        "askunlock_test"=>"0",
        "unlock_test"=>"0",
        "add_attachment_test"=>"0",
        "delete_emergance"=>"0",
        "assign_Cap"=>"0",
        "Create_memo"=>"0",
        "Edit_memo"=>"0",
        "Delete_memo"=>"0",
        "Delete_course"=>"0",
        "Edit_landing"=>"0",
        "Delete_landing"=>"0",
        "alerts"=>"0",
        "export_course"=>"0",
        "course_phase_man_dashbirad"=>"0",
        "test_dasborad"=>"0",
        "coursemanager"=>"0",
        "phasemanager"=>"0",
        "assingeresource"=>"0",
        ));
$sql = "INSERT INTO roles (roles,permission) VALUES ('$role','$array')";

$statement = $connect->prepare($sql);

$statement->execute();
$_SESSION['success'] = "Role Added successfully";
}else{
    $_SESSION['danger'] = "Can't Add Same Roles";
   
}

header('Location:roles.php');
?>