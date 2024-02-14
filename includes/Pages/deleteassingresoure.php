<?php
include('../config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$insId = $_REQUEST['insId'];
$coursecode = $_REQUEST['coursecode'];
$coursename = $_REQUEST['coursename'];
$phaseid = $_REQUEST['phaseid'];
$phaseutype = $_REQUEST['phaseutype'];
$sql1 = "DELETE FROM phasefilepermission WHERE instId='$insId' and phaseId='$phaseid' and coursecode='$coursecode' and     courseName='$coursename'";
$statement1 = $connect->prepare($sql1);
$statement1->execute();
$sql2 = "DELETE FROM academicassignee WHERE instId='$insId' and phaseId='$phaseid' and coursecode='$coursecode' and     coursename='$coursename'";
$statement2 = $connect->prepare($sql2);
$statement2->execute();
if ($phaseutype == 'phasemanger') {
    $query = "UPDATE manage_role_course_phase SET intructor =NULL WHERE phase_id = '$phaseid' AND courseName='$coursename' and courseCode='$coursecode'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
if ($phaseutype == 'bkphasemanger') {
    $query = "UPDATE manage_role_course_phase SET b_up_manger =NULL WHERE phase_id = '$phaseid' AND courseName='$coursename' and courseCode='$coursecode'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
$std1 = "";
$q211 = "SELECT * FROM roles";
$st211 = $connect->prepare($q211);
$st211->execute();
$re211 = $st211->fetchAll();
foreach ($re211 as $row211) {
    $row211['id'];
    $roled = unserialize($row211['permission']);
    if (isset($roled['phasemanager'])) {
        if ($roled['phasemanager'] == 1) {
            $roled = $row211['roles'];
            $q223 = "SELECT * FROM users where role='$roled'";
            $st223 = $connect->prepare($q223);
            $st223->execute();
            if ($st223->rowCount() > 0) {
                $re223 = $st223->fetchAll();
                foreach ($re223 as $row2) {
                    $std1 .= '<option value="' . $row2['id'] . '">' . $row2['nickname'] . '</option>';
                }
            }
        }
    }
}

if ($phaseutype == 'bkphasemanger') {
    echo '<select id="phasedropdown" class="select form-control form-control-md bacaPhaseSelec' . $phaseid . '" data-phase="bkphasemanger"   data-coursecode="' . $coursecode . '" data-coursename="' . $coursename . '" data-phaseid="' . $phaseid . '" data-manageroleid="' . $phaseid . '" data-class="bacaMana">
        <option value="NULL">None</option>';
    echo $std1;
    echo "</select>";
}
if ($phaseutype == 'phasemanger') {
    echo '<select id="phasedropdown" class="select form-control form-control-md manePhaseSelec' . $phaseid . '" data-phase="phasemanger" data-coursecode="' . $coursecode . '" data-coursename="' . $coursename . '" data-phaseid="' . $phaseid . '" data-manageroleid="' . $phaseid . '" data-class="mainMana">
        <option value="NULL">None</option>';
    echo $std1;
    echo "</select>";
}
