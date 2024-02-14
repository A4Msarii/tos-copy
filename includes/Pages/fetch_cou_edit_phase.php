<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$ctid = $_REQUEST['ctid'];
$std1 = '';


echo '<input type="hidden" value="' . $ctid . '" name="Courseid_val1" id="Courseid_val">';
$query = "SELECT * FROM newcourse where Courseid='$ctid'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
echo '<table class="table table-striped table-bordered">';
echo '<tbody>';
echo '<tr>';
echo '<th class="text-dark">Phase Name</th>';
echo '<th class="text-dark">Phase Manager</th>';
echo '<th class="text-dark">Backup Manager</th>';
echo '<th class="text-dark">Phase Date</th>';
echo '</tr>';
foreach ($result as $row) {

    $ctp = $row['CourseName'];
    $query1 = "SELECT * FROM phase where ctp='$ctp'";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    $result1 = $statement1->fetchAll();
    $name11 = "";
    foreach ($result1 as $phaseData) {
        $pId1 = $phaseData['id'];
        $instr_name1 = $connect->prepare("SELECT intructor FROM `manage_role_course_phase` WHERE course_id=? AND phase_id = ?");
        $instr_name1->execute([$ctid, $pId1]);
        $name11 = $instr_name1->fetchColumn();
        $instr_name2 = $connect->prepare("SELECT b_up_manger FROM `manage_role_course_phase` WHERE course_id=? AND phase_id = ?");
        $instr_name2->execute([$ctid, $pId1]);
        $name12 = $instr_name2->fetchColumn();

        $instr_date = $connect->prepare("SELECT phaseDate FROM `manage_role_course_phase` WHERE course_id=? AND phase_id = ?");
        $instr_date->execute([$ctid, $pId1]);
        $date = $instr_date->fetchColumn();

        $phaseId = $connect->prepare("SELECT id FROM `manage_role_course_phase` WHERE course_id=? AND phase_id = ?");
        $phaseId->execute([$ctid, $pId1]);
        $phaseIdData = $phaseId->fetchColumn();
        $phasemanager = "";
        $phasemanager1 = "";
        if ($name11 != "") {
            $instr_name21 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
            $instr_name21->execute([$name11]);
            $name121 = $instr_name21->fetchColumn();
            // $phasemanager='<option value="'.$name11.'" selected>'.$name121.'</option>';

        }
        if ($name12 != "") {
            $instr_name22 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
            $instr_name22->execute([$name12]);
            $name122 = $instr_name22->fetchColumn();
            // $phasemanager1='<option readonly value="'.$name12.'" selected>'.$name122.'</option>';

        }
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
                            if ($name11 != $row2['id'] || $name12 != $row2['id']) {
                                $std1 .= '<option value="' . $row2['id'] . '">' . $row2['nickname'] . '</option>';
                            }
                        }
                    }
                }
            }
        }
        echo '<tr>';
        echo '<td><input type="hidden" value="' . $phaseData['id'] . '" name="phase_id[]"><input type="hidden" value="' . $row['CourseName'] . '" name="courseName[]"><input type="hidden" value="' . $row['CourseCode'] . '" name="courseCode[]">';
        echo $phaseData['phasename'];

        echo '<input type="hidden" value="' . $phaseIdData . '" name="phaseId[]">';
        echo '</td>';
        echo '<td class="manePhase' . $phaseData['id'] . '" id="' . $phaseData['id'] . '">';
        if ($name11 != "") {
            echo ' <a data-class="mainManaRem" class="remPhaseMana remMainPhaseMana' . $phaseData['id'] . '" data-insid="' . $name11 . '" data-coursecode="' . $row['CourseCode'] . '" data-coursename="' . $row['CourseName'] . '" data-phaseid="' . $phaseData['id'] . '" data-phaseutype="phasemanger">' . $name121 . '<i class="bi bi-x-circle text-danger"></i></a>';
        } else {
            echo '<select id="phasedropdown" class="select form-control form-control-md manePhaseSelec' . $phaseData['id'] . '" data-phase="phasemanger" data-coursecode="' . $row['CourseCode'] . '" data-coursename="' . $row['CourseName'] . '" data-phaseid="' . $phaseData['id'] . '" data-manageroleid="' . $phaseIdData . '" data-class="mainMana">
        <option value="NULL">None</option>';
            echo $std1;
            echo "</select>";
        }
        echo '</td>';
        echo '<td class="backPhase' . $phaseData['id'] . '" id="' . $phaseData['id'] . '">';
        if ($name12 != "") {
            echo ' <a data-class="bacaManaRem" class="remPhaseMana remBacaPhaseMana' . $phaseData['id'] . '" data-insid="' . $name12 . '" data-coursecode="' . $row['CourseCode'] . '" data-coursename="' . $row['CourseName'] . '" data-phaseid="' . $phaseData['id'] . '" data-phaseutype="bkphasemanger">' . $name122 . '<i class="bi bi-x-circle text-danger"></i></a>';
        } else {
            echo '<select id="phasedropdown" class="select form-control form-control-md bacaPhaseSelec' . $phaseData['id'] . '" data-phase="bkphasemanger"  data-coursecode="' . $row['CourseCode'] . '" data-coursename="' . $row['CourseName'] . '" data-phaseid="' . $phaseData['id'] . '" data-manageroleid="' . $phaseIdData . '" data-class="bacaMana">
        <option value="NULL">None</option>';
            echo $std1;
            echo "</select>";
        }
        echo '</td>';
        echo '<td>';
        echo '<input class="form-control form-control-md addPhaseDate" type="date" data-coursename="' . $row['CourseName'] . '" data-coursecode="' . $row['CourseCode'] . '" data-phaseid="' . $phaseData['id'] . '" data-courseid="' . $ctid . '" value="' . $date . '"/>';
        echo '</td>';
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
