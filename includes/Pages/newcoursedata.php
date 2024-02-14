<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$userId = $_SESSION['login_id'];

$coursename = $_POST['coursename'];
$coursedate = $_POST['coursedate'];
$nick_name = $_POST['nick_name'];
$value_enter = $_POST['value_enter'];
$coursemanager = $_POST['coursemanager'];
$CourseCode = $_POST['CourseCode'];

$checkbox1 = $_POST['student'];
$phase = $_POST['phase'];
$bup_phase = $_POST['bup_phase'];
$phase_id = $_POST['phase_id'];
$phasedate = $_REQUEST['phasedate'];
$departmentId = $_REQUEST['departmentId'];

$fetch_ctp_name1 = $connect->query("SELECT `id` FROM shops WHERE ctpId = '$coursename'");
$ctp_name1 = $fetch_ctp_name1->fetchColumn();
$fetch_ctp_name = $connect->query("SELECT `symbol` FROM ctppage WHERE CTPid = '$coursename'");
$ctp_name = $fetch_ctp_name->fetchColumn();

$ctp_1Name = $ctp_name . " - " . $CourseCode;

$sql11 = "INSERT INTO course_in_department(departmentId,courseCode,courseName) VALUES ('$departmentId','$CourseCode','$coursename')";
$statement11 = $connect->prepare($sql11);
$statement11->execute();
if(isset($checkbox1)){
foreach ($checkbox1 as $chk1) {

  $sql = "INSERT INTO newcourse (CourseName,nick_name,CourseDate,CourseCode,StudentNames,CourseManager,value_enter,departmentId)
          VALUES ('$coursename','$nick_name','$coursedate','$CourseCode','$chk1','$coursemanager','$value_enter','$departmentId')";

  $statement = $connect->prepare($sql);

  $statement->execute();
  $lastid = $connect->lastInsertId();

  $sql11 = "INSERT INTO folders(folder,course_id) VALUES ('$ctp_1Name','$lastid')";
  $statement11 = $connect->prepare($sql11);
  $statement11->execute();
  $last_id9 = $connect->lastInsertId();


   $fetchNic = $connect->query("SELECT nickname FROM users WHERE id = '$chk1'");
  $name = $fetchNic->fetchColumn();

  $query = "INSERT INTO user_briefcase (briefcase_name,user_id,folderId,shopid,role,color,className,courseId,stuId) VALUES ('$name','$userId','$last_id9','$ctp_name1','super admin','red','course','$lastid','$chk1')";
  $stmt = $connect->prepare($query);
  $stmt->execute();
}
}else{
  $sql = "INSERT INTO newcourse (CourseName,nick_name,CourseDate,CourseCode,CourseManager,value_enter,departmentId)
          VALUES ('$coursename','$nick_name','$coursedate','$CourseCode','$coursemanager','$value_enter','$departmentId')";

  $statement = $connect->prepare($sql);

  $statement->execute();
  $lastid = $connect->lastInsertId();

  $sql11 = "INSERT INTO folders(folder,course_id) VALUES ('$ctp_1Name','$lastid')";
  $statement11 = $connect->prepare($sql11);
  $statement11->execute();
  $last_id9 = $connect->lastInsertId();

}
$nRows = $connect->query("select count(*) from shelf where library_id='1' and shelf='Course Training Standard'")->fetchColumn();
if ($nRows == 0) {
  $sql112 = "INSERT INTO shelf(shelf,library_id) VALUES ('Course Training Standard','1')";
  $statement112 = $connect->prepare($sql112);
  $statement112->execute();
  $last_id1 = $connect->lastInsertId();
} else {
  $query3 = "SELECT * FROM shelf where shelf='Course Training Standard' and library_id='1'";
  $statement2 = $connect->prepare($query3);
  $statement2->execute();
  $result2 = $statement2->fetchAll();
  foreach ($result2 as $row8) {
    $last_id1 = $row8['id'];
  }
}


$sql113 = "INSERT INTO folder_shop_user(folder_id,shelf_id,user_id,shop_id,lib_id) VALUES ('$last_id9','$last_id1','$userId','$ctp_name1','1')";
$statement131 = $connect->prepare($sql113);
$statement131->execute();

foreach ($phase as $phase1 => $index) {
  $bup_phases = $bup_phase[$phase1];
  $phase_ids = $phase_id[$phase1];
  $phasedate1 = $phasedate[$phase1];
  $phaseIns = $phase[$phase1];
  echo  $phaseIns;
   if ($phaseIns != "NULL" && $bup_phases == 'NULL') {
    $sql1 = "INSERT INTO manage_role_course_phase (phase_id,intructor,course_id,phaseDate,courseName,courseCode) VALUES ('$phase_ids','$phaseIns','$lastid','$phasedate1','$coursename','$CourseCode')";
      $statement1 = $connect->prepare($sql1);
      $statement1->execute();
   }
    if($phaseIns != "NULL" && $bup_phases != 'NULL'){
      $sql1 = "INSERT INTO manage_role_course_phase (phase_id,intructor,b_up_manger,course_id,phaseDate,courseName,courseCode) VALUES ('$phase_ids','$phaseIns','$bup_phases','$lastid','$phasedate1','$coursename','$CourseCode')";
          $statement1 = $connect->prepare($sql1);
          $statement1->execute();
    }
    if($phaseIns == "NULL" && $bup_phases != 'NULL'){
      $sql1 = "INSERT INTO manage_role_course_phase (phase_id,b_up_manger,course_id,phaseDate,courseName,courseCode) VALUES ('$phase_ids','$bup_phases','$lastid','$phasedate1','$coursename','$CourseCode')";
      $statement1 = $connect->prepare($sql1);
      $statement1->execute();
    }

      $query2 = "SELECT * FROM user_files where is_phase_resourse='$phase_ids'";
      $statement2 = $connect->prepare($query2);
      $statement2->execute();

      if ($statement2->rowCount() > 0) {
          $result2 = $statement2->fetchAll();
          foreach ($result2 as $row) {
              $file_ides = $row['id'];
              if($phaseIns != "NULL"){
              $query4 = "INSERT INTO  phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$file_ides','$phaseIns','$phase_ids','$CourseCode','$coursename')";
              $stmt4 = $connect->prepare($query4);
              $stmt4->execute();
              }
              if($bup_phases != "NULL"){
                $query4 = "INSERT INTO  phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$file_ides','$bup_phases','$phase_ids','$CourseCode','$coursename')";
                $stmt4 = $connect->prepare($query4);
                $stmt4->execute();
              }
          }
      }
      $query12 = "SELECT * FROM academic where phase='$phase_ids'";
      $statement12 = $connect->prepare($query12);
      $statement12->execute();

      if ($statement12->rowCount() > 0) {
          $result12 = $statement12->fetchAll();
          foreach ($result12 as $row) {
              $fileId = $row['file'];
              if($phaseIns != "NULL"){
                $query2 = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType,phaseId) VALUES ('$fileId','$userId','$phaseIns','blue','readAndWrite','academic')";
              $stmt2 = $connect->prepare($query2);
              $stmt2->execute();
              $query = "INSERT INTO academicassignee (filesId,instId,phaseId,coursecode,coursename) VALUES ('$fileId','$phaseIns','$phase_ids','$CourseCode','$coursename')";
              $stmt = $connect->prepare($query);
              $stmt->execute();
            }
            if($bup_phases != "NULL"){ 
              $query2 = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType,phaseId) VALUES ('$fileId','$userId','$bup_phases','blue','readAndWrite','academic')";
              $stmt2 = $connect->prepare($query2);
              $stmt2->execute();
              $query = "INSERT INTO academicassignee (filesId,instId,phaseId,coursecode,coursename) VALUES ('$fileId','$bup_phases','$phase_ids','$CourseCode','$coursename')";
              $stmt = $connect->prepare($query);
               $stmt->execute();
            }
          }
      }
    }

     
     

$_SESSION['success'] = "New Course Plan Added Successfully";
header("Location:newcourse.php");
