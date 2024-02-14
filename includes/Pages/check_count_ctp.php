<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
if (isset($_REQUEST['id'])) {
  $sym = $_REQUEST['id'];

  $get_color = $connect->prepare("SELECT value_enter FROM `newcourse` WHERE `CourseName`='$sym'");
  $get_color->execute();
  $value_per = $get_color->fetchColumn();
  if ($value_per == "1" && $value_per != "") {
    echo "yes";
  }
}

if (isset($_REQUEST['select_course1'])) {
  $select_course1 = $_REQUEST['select_course1'];
  $std1 = '';


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

  $phaseQuery = $connect->query("SELECT * FROM phase WHERE ctp = '$select_course1'");

  while ($phaseData = $phaseQuery->fetch()) {
    echo '<div class="row">';
    echo '<div class="col-2">';
    echo '<label class="form-label select-label" style="margin-top: 35px;
    font-size: large;font-weight:bold; color:' . $phaseData['color'] . '"><input type="hidden" value="' . $phaseData['id'] . '" name="phase_id[]">';
    echo $phaseData['phasename'];
    echo '</label>';
    echo "</div>";
    echo '<div class="col-2">';
    echo '<label style="color:black; font-weight:bold;">Phase Manager</label>';
    echo '<select name="phase[]" id="" class="select form-control form-control-md"><option value="NULL" disable selected>Select instructor</option>';
    echo $std1;
    echo "</select>";
    echo '</div>';
    echo '<div class="col-2">';
    echo '<label style="color:black; font-weight:bold;">Backup/W</label>';
    echo '<select name="bup_phase[]" id="" class="select form-control form-control-md"><option value="NULL" disable selected>Select instructor</option>';
    echo $std1;
    echo "</select>";
    echo '</div>';
    echo '<div class="col-2">';
    echo '<label style="color:black; font-weight:bold;">Date</label>';
    echo '<input class="form-control form-control-md" type="date" name="phasedate[]" />';
    echo '</div>';
    echo "</div>";
  }
}

if (isset($_REQUEST['select_course2'])) {
  $select_course1 = $_REQUEST['select_course2'];
  $select_courseId = $_REQUEST['select_courseId'];
  $std1 = '';
  $std2 = '';

  $allInst = $connect->query("SELECT * FROM users WHERE role = 'instructor' or role = 'instructors'");
  while ($insData = $allInst->fetch()) {
    $insId = $insData['id'];
    // echo $insId."<br>";
    $checkIns = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE intructor = '$insId' AND course_id = '$select_courseId'");
    $data = $checkIns->fetchColumn();
    $select = "";

    // echo $data."<br>";
    if ($data == 1) {
      $select = "selected";
    }
    $std1 .= '<option value="' . $insData['id'] . '"  ' . $select . '>' . $insData['nickname'] . '</option>';
  }
  // die();

  $allInst = $connect->query("SELECT * FROM users WHERE role = 'instructor' or role = 'instructors'");
  while ($insData = $allInst->fetch()) {
    $insId1 = $insData['id'];
    $checkIns = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE b_up_manger = '$insId1' AND course_id = '$select_courseId'");
    $data = $checkIns->fetchColumn();
    if ($data == 1) {
      $select = "selected";
    } else {
      $select = "";
    }
    $std2 .= '<option value="' . $insData['id'] . '"  ' . $select . '>' . $insData['nickname'] . '</option>';
  }


  $phaseQuery = $connect->query("SELECT * FROM phase WHERE ctp = '$select_course1'");

  while ($phaseData = $phaseQuery->fetch()) {
    echo '<label class="form-label select-label" style="color: black; font-weight:bold;"><input type="hidden" value="' . $phaseData['id'] . '" name="phase_id[]">';
    echo $phaseData['phasename'];
    echo '</label>';
    echo "</div>";
    echo '<div style="display: flex;">';
    echo '<select name="phase[]" id="" class="select form-control form-control-md" required><option value="0" disable>Select instructor</option>';
    echo $std1;
    echo "</select>";
    echo '<select name="bup_phase[]" id="" class="select form-control form-control-md"><option value="0" disable>Select instructor</option>';
    echo $std2;
    echo "</select>";
    echo "</div>";
  }
}
