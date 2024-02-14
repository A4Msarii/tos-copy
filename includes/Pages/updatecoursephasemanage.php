<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$userId = $_SESSION['login_id'];
$phasetype = $_POST['phase'];
$courseCode = $_POST['courseCode'];
$courseName = $_POST['courseName'];
$phase_id = $_POST['phaseId'];
$index = $_POST['selectedOptionValue'];
$courseid_val = $_POST['courseIdValue'];
$manageroleid = $_POST['manageroleid'];
$date = date("Y-m-d");
$msg = '';
$fetchInstName = $connect->query("SELECT nickname FROM users WHERE id = '$index'");
$instName = $fetchInstName->fetchColumn();
$fetchPhaseName = $connect->query("SELECT phasename FROM phase WHERE id = '$phase_id'");
$phaseName = $fetchPhaseName->fetchColumn();
$query2 = "SELECT * FROM user_files where is_phase_resourse='$phase_id'";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if ($statement2->rowCount() > 0) {
    $result2 = $statement2->fetchAll();
    foreach ($result2 as $row) {
        $nRows=0;
        $status="";    $year="";    $comments="";    $custom_number="";    $lastApprove="";$lastDate="";
        $file_ides = $row['id'];
        $query21 = "SELECT * FROM phasefilepermission where fileId='$file_ides' and coursecode='$courseCode' and courseName='$courseName' and phaseId='$phase_id'";
        $statement21 = $connect->prepare($query21);
        $statement21->execute();
         if ($statement21->rowCount() > 0) {
            $result21 = $statement21->fetchAll();
            foreach ($result21 as $row1011) {
                $status=$row1011['status'];
                $year=$row1011['year'];
                $comments=$row1011['comments'];
                $custom_number=$row1011['custom_number'];
                $lastApprove=$row1011['lastApprove'];
                $lastDate=$row1011['lastDate'];
            }
        }
        $nRows = $connect->query("SELECT count(*) from phasefilepermission WHERE instId='$index' and phaseId='$phase_id' and coursecode='$courseCode' and courseName='$courseName' and fileId='$file_ides'")->fetchColumn();
        if($nRows==0){
        $query4 = "INSERT INTO phasefilepermission (fileId,instId,phaseId,coursecode,courseName,status,year,comments,custom_number,lastApprove,lastDate) VALUES ('$file_ides','$index','$phase_id','$courseCode','$courseName','$status','$year','$comments','$custom_number','$lastApprove','$lastDate')";
        $query2 = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType,phaseId) VALUES ('$file_ides','$userId','$index','blue','readAndWrite','academic')";
        $stmt2 = $connect->prepare($query2);
        $stmt2->execute();
        $stmt4 = $connect->prepare($query4);
        $stmt4->execute();
        } 
    }
}
$query12 = "SELECT * FROM academic where phase='$phase_id'";
$statement12 = $connect->prepare($query12);
$statement12->execute();

if ($statement12->rowCount() > 0) {
    $result12 = $statement12->fetchAll();
    foreach ($result12 as $row) {
        $fileId = $row['file'];
        $nRows1=0;
        $status1="";    $year1="";    $comments1="";    $custom_number1="";    $lastApprove1="";$lastDate1="";
        $query101 = "SELECT * FROM academicassignee where filesId='$fileId' and coursecode='$courseCode' and coursename='$courseName' and phaseId='$phase_id'";
        $statement101 = $connect->prepare($query101);
        $statement101->execute();
        if ($statement101->rowCount() > 0) {
        $result101 = $statement101->fetchAll();
        foreach ($result101 as $row101) {
            $status1=$row101['status'];
            $year1=$row101['year'];
            $comments1=$row101['comment'];
            $custom_number1=$row101['customNumber'];
            $lastApprove1=$row101['lastApprove'];
            $lastDate1=$row101['lastDate'];
        }
        }
        $nRows1 = $connect->query("SELECT count(*) from academicassignee WHERE instId='$index' and phaseId='$phase_id' and coursecode='$courseCode' and coursename='$courseName' and filesId='$file_ides'")->fetchColumn();
        if($nRows1==0){
        $query2 = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType,phaseId) VALUES ('$fileId','$userId','$index','blue','readAndWrite','academic')";
        $stmt2 = $connect->prepare($query2);
        $stmt2->execute();
        $query = "INSERT INTO academicassignee (filesId,instId,phaseId,coursecode,coursename,status,year,comment,customNumber,lastApprove,lastDate) VALUES ('$fileId','$index','$phase_id','$courseCode','$courseName','$status1','$year1','$comments1','$custom_number1','$lastApprove1','$lastDate1')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    }
}
}
$countCourse = $connect->query("SELECT count(*) FROM manage_role_course_phase WHERE phase_id = '$phase_id' AND course_id = '$courseid_val' AND courseName = '$courseName' AND courseCode = '$courseCode'");
$cC = $countCourse->fetchColumn();
if ($cC > 0) {
    if ($phasetype == 'phasemanger') {
        $updateQuery = "UPDATE manage_role_course_phase SET intructor = '$index' WHERE  courseName = '$courseName' AND courseCode = '$courseCode' AND phase_id = '$phase_id'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();

        $query = "INSERT INTO alerttable (user_id,alert_type,message,date,reciever_user_id,alertCategory,color,alert_file,alert_icon,textcolor) VALUES ('$userId','Phase Alert','$msg','$date','$index','General Announcement/Note To All','#333CFF','1','announcement_w.png','white')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    }
    if ($phasetype == 'bkphasemanger') {
        $updateQuery = "UPDATE manage_role_course_phase SET b_up_manger = '$index' WHERE courseName = '$courseName' AND courseCode = '$courseCode' AND phase_id = '$phase_id'";
        $statement_editor = $connect->prepare($updateQuery);
        $statement_editor->execute();
    }
} else {
    if ($phasetype == 'phasemanger') {
        $sql = "INSERT INTO manage_role_course_phase (phase_id,intructor,course_id,courseName,courseCode) VALUES ('$phase_id','$index','$courseid_val','$courseName','$courseCode')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();

        $query = "INSERT INTO alerttable (user_id,alert_type,message,date,reciever_user_id,alertCategory,color,alert_file,alert_icon,textcolor) VALUES ('$userId','Phase Alert','$msg','$date','$index','General Announcement/Note To All','#333CFF','1','announcement_w.png','white')";
        $stmt = $connect->prepare($query);
        $stmt->execute();
    }
    if ($phasetype == 'bkphasemanger') {
        $sql = "INSERT INTO manage_role_course_phase (phase_id,b_up_manger,course_id,courseName,courseCode) VALUES ('$phase_id','$index','$courseid_val','$courseName','$courseCode')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
    }
}
$msg = $instName . " you are assigned as a phase manager for " . $phaseName . " phase.";

if ($phasetype == 'phasemanger') {
?>
    <a data-class="mainManaRem" class="remPhaseMana remMainPhaseMana<?php echo $phase_id; ?>" data-insid="<?php echo $index; ?>" data-coursecode="<?php echo $courseCode; ?>" data-coursename="<?php echo $courseName; ?>" data-phaseid="<?php echo $phase_id; ?>" data-phaseutype="phasemanger"><?php echo $instName; ?><i class="bi bi-x-circle text-danger"></i></a>
<?php
}

if ($phasetype == 'bkphasemanger') {
?>
    <a data-class="bacaManaRem" class="remPhaseMana remBacaPhaseMana<?php echo $phase_id; ?>" data-insid="<?php echo $index; ?>" data-coursecode="<?php echo $courseCode; ?>" data-coursename="<?php echo $courseName; ?>" data-phaseid="<?php echo $phase_id; ?>" data-phaseutype="bkphasemanger"><?php echo $instName; ?><i class="bi bi-x-circle text-danger"></i></a>
<?php
}
