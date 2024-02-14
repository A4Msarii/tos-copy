<div class="row">
    <!-- <div class="col-md-12"> -->
        <div style="display: contents;">
<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['phase'])) {
    $fileId = $_REQUEST['fileId'];
    $phaseID = $_REQUEST['phaseId'];
     $instId = $_REQUEST['instId'];
    // $refId = $_REQUEST['refId'];
    $coursecode = $_REQUEST['coursecode'];
    $courseName = $_REQUEST['courseName'];
    
    $fetchAss = $connect->query("SELECT * FROM phasefilepermission WHERE fileId = '$fileId' AND phaseId = '$phaseID' AND coursecode = '$coursecode' AND courseName = '$courseName'");
    while ($assData = $fetchAss->fetch()) {
        $nRowspmcheckuser=0;
    $nRowsbpmcheckuser=0;
    $displaynone="";
        $insId = $assData['instId'];
        $phaseId = $assData['phaseId'];
        $fetchInsDetail = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$insId'");
        if ($fetchInsDetail->rowCount() > 0) {
            $instDData = $fetchInsDetail->fetch();
            $prof_pic11 = $instDData['file_name'];
            // echo $instDData['nickname'];
            if ($prof_pic11 != "") {
                $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
                    $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                } else {
                    $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }
            } else {
                $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
            $nRowspmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE intructor = '$insId' AND courseName = '$courseName' AND courseCode = '$coursecode'")->fetchColumn();

            $nRowsbpmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE b_up_manger = '$insId' AND courseName = '$courseName' AND courseCode = '$coursecode'")->fetchColumn();
            
            if($nRowspmcheckuser>0 || $nRowsbpmcheckuser>0){ 
                $displaynone="display:none";
            }

?>

            <div class="col-2" style="background: #f0f8ff85;width: fit-content;margin: 5px;border: 1px solid #71869d36;border-radius: 5px;padding: 5px;box-shadow: 0px 0px 6px 0px grey;text-align: center; display: flex;">

                <a data-bs-target="#resourceInstRemoveModal" data-bs-toggle="modal" class="confirmResourcePhaseIns" style="position: relative;top:-10px;left: -5px;<?php echo $displaynone;?>" data-fileid="<?php echo $fileId; ?>" data-phaseid="<?php echo $phaseId; ?>" data-instid="<?php echo $insId; ?>" data-instname="<?php echo $instDData['nickname']; ?>" data-userimg="<?php echo $img; ?>" data-coursecode="<?php echo $assData['coursecode']; ?>" data-coursename="<?php echo $assData['courseName']; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                <div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 30px; width:30px;">
                    <img class="avatar-img" src="<?php echo $img; ?>" alt="Image Description" />
                </div>
                <div class="flex-grow-2 ms-2" style="margin-top: 4px;">
                    <h3 class="mb-0 text-danger" style="font-weight:100; font-family: cursive;"><?php echo $instDData['nickname']; ?></h3>
                </div>
            </div>

            
        <?php
        }
    }
}


if (isset($_REQUEST['academic'])) {
    $fileId = $_REQUEST['fileId'];
    $phaseID = $_REQUEST['phaseId'];
    $coursecode = $_REQUEST['coursecode'];
    $courseName = $_REQUEST['courseName'];
    $fetchAss = $connect->query("SELECT * FROM academicassignee WHERE filesId = '$fileId' AND phaseId = '$phaseID' AND coursecode = '$coursecode' AND coursename = '$courseName'");
    while ($assData = $fetchAss->fetch()) {
        $nRowspmcheckuser=0;
    $nRowsbpmcheckuser=0;
    $displaynone="";
        $insId = $assData['instId'];
        $phaseId = $assData['phaseId'];
        $fetchInsDetail = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$insId'");
        if ($fetchInsDetail->rowCount() > 0) {
            $instDData = $fetchInsDetail->fetch();
            $prof_pic11 = $instDData['file_name'];
            // echo $instDData['nickname'];
            if ($prof_pic11 != "") {
                $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
                    $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                } else {
                    $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }
            } else {
                $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
            $nRowspmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE intructor = '$insId' AND courseName = '$courseName' AND courseCode = '$coursecode'")->fetchColumn();

            $nRowsbpmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE b_up_manger = '$insId' AND courseName = '$courseName' AND courseCode = '$coursecode'")->fetchColumn();
            
            if($nRowspmcheckuser>0 || $nRowsbpmcheckuser>0){ 
                $displaynone="display:none";
            }
        ?>


            <div style="background: #f0f8ff85;width: fit-content;margin: 5px;border: 1px solid #71869d36;border-radius: 5px;padding: 5px;box-shadow: 0px 0px 6px 0px grey; text-align: center; display: flex;">
                <a data-bs-target="#academicInstRemoveModal" data-bs-toggle="modal" class="confirmPhaseIns" style="position: relative;top:-10px;left: -5px;<?php echo $displaynone;?>" data-fileid="<?php echo $fileId; ?>" data-phaseid="<?php echo $phaseId; ?>" data-instid="<?php echo $insId; ?>" data-instname="<?php echo $instDData['nickname']; ?>" data-userimg="<?php echo $img; ?>" data-coursecode="<?php echo $assData['coursecode']; ?>" data-coursename="<?php echo $assData['coursename']; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                <div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 30px; width:30px;">
                    <img class="avatar-img" src="<?php echo $img; ?>" alt="Image Description" />
                </div>
                <div class="flex-grow-2 ms-2" style="margin-top: 4px;">
                    <h3 class="mb-0 text-danger" style="font-weight:100; font-family: cursive;"><?php echo $instDData['nickname']; ?></h3>
                </div>
            </div>
<?php
        }
    }
}
?>
</div>
</div>
<!-- </div> -->