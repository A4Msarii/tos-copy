<?php
session_start();
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$userId = $_SESSION['login_id'];

if (isset($_REQUEST['assignAcademic'])) {
    $filesId = $_REQUEST['filesId'];
     $pId = $_REQUEST['phasesId'];
    $name = 0;
    $color = "blue";

foreach($filesId as $name=>$fileId){
  
        $checkFileAvl = $connect->query("SELECT count(*) FROM academicassignee WHERE filesId = '$fileId' AND phaseId = '$pId'");
        if ($checkFileAvl->fetchColumn() <= 0) {
            $fetchAllInst = $connect->query("SELECT * FROM manage_role_course_phase WHERE phase_id = '$pId'");
            while ($instData = $fetchAllInst->fetch()) {
                $insId = $instData['intructor'];
                $bckupId = $instData['b_up_manger'];
                $coursecode = $instData['courseCode'];
                $coursename = $instData['courseName'];
                $coId = $instData['id'];
               
                if($insId!=""){
                    $query2 = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType,phaseId) VALUES ('$fileId','$userId','$insId','$color','readAndWrite','academic')";
                    $stmt2 = $connect->prepare($query2);
                    $stmt2->execute();
                $query = "INSERT INTO academicassignee (filesId,instId,phaseId,coursecode,coursename) VALUES ('$fileId','$insId','$pId','$coursecode','$coursename')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                }
                if($bckupId!=""){
                    $query2 = "INSERT INTO filepermissions (pageId,permissionId,userId,color,permissionType,phaseId) VALUES ('$fileId','$userId','$bckupId','$color','readAndWrite','academic')";
                    $stmt2 = $connect->prepare($query2);
                    $stmt2->execute();
                $query = "INSERT INTO academicassignee (filesId,instId,phaseId,coursecode,coursename) VALUES ('$fileId','$bckupId','$pId','$coursecode','$coursename')";
                $stmt = $connect->prepare($query);
                $stmt->execute();
            }
            }
        }
 }

    $_SESSION['success'] = "Resource Added successfully";

    header('Location:phase-view.php');
}

if (isset($_REQUEST['fileId'])) {
    $fileId = $_REQUEST['fileId'];
    $phaseId = $_REQUEST['phaseId'];
    $uId = $_REQUEST['uId'];
    $year = date('Y');

    $updateQuery = "UPDATE academicassignee SET status = 'done',year = '$year' WHERE filesId = '$fileId' AND instId = '$uId' AND phaseId = '$phaseId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}

if (isset($_REQUEST['fileId1'])) {
    $fileId = $_REQUEST['fileId1'];
    $phaseId = $_REQUEST['phaseId1'];
    $uId = $_REQUEST['uId1'];

    $updateQuery = "UPDATE academicassignee SET status = NULL,year = NULL WHERE filesId = '$fileId' AND instId = '$uId' AND phaseId = '$phaseId'";
    $statement_editor = $connect->prepare($updateQuery);
    $statement_editor->execute();
}

if (isset($_REQUEST['removeAssignee'])) {
    $removeAssignee = $_REQUEST['removeAssignee'];
    $sql = "DELETE FROM academicassignee WHERE filesId = '$removeAssignee'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $_SESSION['success'] = "Resource Removed successfully";

    header('Location:phase-view.php');
}
