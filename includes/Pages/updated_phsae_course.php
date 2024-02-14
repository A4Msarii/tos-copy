<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$userId = $_SESSION['login_id'];
if (isset($_REQUEST['Courseid_val'])) {
   echo $lastid = $_REQUEST['Courseid_val'];
  $phase = $_POST['phase'];
  $bup_phase = $_POST['bup_phase'];
  $phase_id = $_POST['phase_id'];
  $phasedate = $_REQUEST['phasedate'];
  foreach ($phase as $phase1 => $index) {
    $bup_phases = $bup_phase[$phase1];
    $phase_ids = $phase_id[$phase1];
    $phasedate1 = $phasedate[$phase1];

    $sql1 = "INSERT INTO manage_role_course_phase (phase_id,intructor,b_up_manger,course_id,phaseDate)
              VALUES ('$phase_ids','$index','$bup_phases','$lastid','$phasedate1')";

    $statement1 = $connect->prepare($sql1);

    $statement1->execute();
  }
}
if (isset($_REQUEST['updatePhaseMana'])) {
  $phase_id = $_REQUEST['phase_id'];
  $phase = $_REQUEST['phase'];
  $bup_phase = $_REQUEST['bup_phase'];
  $phasedate = $_REQUEST['phasedate'];
  $courseid_val = $_REQUEST['Courseid_val1'];
  $phaseId = $_REQUEST['phaseId'];
  $courseName = $_REQUEST['courseName'];
  $courseCode = $_REQUEST['courseCode'];

  $date = date("Y-m-d");

  foreach ($phase as $phase1 => $index) {
    $bup_phases = $bup_phase[$phase1];
    $phase_ids = $phase_id[$phase1];
    if($bup_phases=='NULL'){
      $bup_phases=NULL;
    }
    if($index=='NULL'){
      $index=NULL;
    }
    $phasedate1 = $phasedate[$phase1];
    $phaseId1 = $phaseId[$phase1];
    $courseName1 = $courseName[$phase1];
    $courseCode1 = $courseCode[$phase1];
     $firstselects = $firstselect[$phase1];
      $bkfirstselects = $bkfirstselect[$phase1];
    
    $fetchInstName = $connect->query("SELECT nickname FROM users WHERE id = '$index'");
    $instName = $fetchInstName->fetchColumn();
    $fetchPhaseName = $connect->query("SELECT phasename FROM phase WHERE id = '$phase_ids'");
    $phaseName = $fetchPhaseName->fetchColumn();


    $msg = $instName . " you are assigned as a phase manager for " . $phaseName . " phase.";
    if($index!="" || $index!=NULL){
    if($firstselects!=$index || $firstselects==$bkfirstselects){
    $query2 = "SELECT * FROM user_files where is_phase_resourse='$phase_ids'";
    $statement2 = $connect->prepare($query2);
    $statement2->execute();

    if($statement2->rowCount() > 0)
        {
            $result2 = $statement2->fetchAll();
            foreach($result2 as $row)
        {
         $file_ides=$row['id'];
        
         $query4 = "INSERT INTO  phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$file_ides','$index','$phase_ids','$courseCode1','$courseName1')";
          $stmt4 = $connect->prepare($query4);
          $stmt4->execute();
         
        }
  
    }
  }
       }
       if($bkfirstselects!=$bup_phases || $firstselects==$bkfirstselects){ 
        $sql1 = "DELETE FROM phasefilepermission WHERE instId='$bkfirstselects' and phaseId='$phase_ids' and coursecode='$courseCode1' and courseName='$courseName1'";
        $statement1 = $connect->prepare($sql1);
        $statement1->execute();
        $query2 = "SELECT * FROM user_files where is_phase_resourse='$phase_ids'";
    $statement2 = $connect->prepare($query2);
    $statement2->execute();

    if($statement2->rowCount() > 0)
        {
            $result2 = $statement2->fetchAll();
            foreach($result2 as $row)
        {
         $file_ides=$row['id'];
        
         $query4 = "INSERT INTO  phasefilepermission (fileId,instId,phaseId,coursecode,courseName) VALUES ('$file_ides','$bup_phases','$phase_ids','$courseCode1','$courseName1')";
          $stmt4 = $connect->prepare($query4);
          $stmt4->execute();
         
        }
  
    }
  }
        
    

    $countCourse = $connect->query("SELECT count(*) FROM manage_role_course_phase WHERE phase_id = '$phase_ids' AND course_id = '$courseid_val' AND courseName = '$courseName1' AND courseCode = '$courseCode1'");
    $cC = $countCourse->fetchColumn();
    if ($cC > 0) {

      $updateQuery = "UPDATE manage_role_course_phase SET phase_id = '$phase_ids',intructor = '$index',b_up_manger = '$bup_phases', phaseDate = '$phasedate1',courseName = '$courseName1',courseCode = '$courseCode1' WHERE id = '$phaseId1'";
      $statement_editor = $connect->prepare($updateQuery);
      $statement_editor->execute();
      $query = "INSERT INTO alerttable (user_id,alert_type,message,date,reciever_user_id,alertCategory,color,alert_file,alert_icon,textcolor) VALUES ('$userId','Phase Alert','$msg','$date','$index','General Announcement/Note To All','#333CFF','1','announcement_w.png','white')";
      $stmt = $connect->prepare($query);
      $stmt->execute();
    } else {
      $sql = "INSERT INTO manage_role_course_phase (phase_id,intructor,b_up_manger,course_id,phaseDate,courseName,courseCode) VALUES ('$phase_ids','$index','$bup_phases','$courseid_val','$phasedate1','$courseName1','$courseCode1')";
      $stmt = $connect->prepare($sql);
      $stmt->execute();
      $query = "INSERT INTO alerttable (user_id,alert_type,message,date,reciever_user_id,alertCategory,color,alert_file,alert_icon,textcolor) VALUES ('$userId','Phase Alert','$msg','$date','$index','General Announcement/Note To All','#333CFF','1','announcement_w.png','white')";
      $stmt = $connect->prepare($query);
      $stmt->execute();
    }
  }


  $_SESSION['success'] = "Phase Edited Successfully";
  header('Location:course_list.php');
}