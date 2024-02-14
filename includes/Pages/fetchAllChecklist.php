<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    $course_Code = $_REQUEST['courseCode'];
    $course_Name = $_REQUEST['courseName'];
    $c_id = $_REQUEST['courseId'];
    $fetchuser_id = $_REQUEST['userId']; 
    
            $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id'");
            while ($getCourseData = $getCourse->fetch()) {
              $stuIDArr = array();
              $stuIDArrP = 0;
              $course_Code = $getCourseData['CourseCode'];
              $course_Name = $getCourseData['CourseName'];
            ?>
              <table class="table table-bordered">
                <thead class="bg-dark">
                  <tr>
                    <th class="text-white">Checklist</th>
                    <?php
                    // AND StudentNames = '29'
                    $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
                    while ($selecAllUserData = $selecAllUser->fetch()) {
                      $uID = $selecAllUserData['StudentNames'];
                      $usersQ = $connect->query("SELECT * FROM users WHERE id = '$uID'");
                      while ($usersQData = $usersQ->fetch()) {
                        if (!in_array($usersQData['id'], $stuIDArr)) {
                          $stuIDArr[$stuIDArrP] = $usersQData['id'];
                          $stuIDArrP++;
                        }
                    ?>
                        <th class="text-white text-center"><?php echo $usersQData['nickname']; ?></th>
                    <?php
                      }
                    }
                    ?>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <img class=" avatar avatar-img avatar-circle" src="<?php echo BASE_URL; ?>assets/img/Class-Student.png" height='20px' width='20px' alt="">
                    </td>
                    <?php
                    $stuName = 0;
                    while ($stuName < count($stuIDArr)) {
                      $stuId = $stuIDArr[$stuName];
                      $query = $connect->query("SELECT file_name FROM users WHERE id = '$stuId'");
                      $prof_pic11 = $query->fetchColumn();
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
                    ?>
                      <td class="text-center">
                        <img class=" avatar avatar-img avatar-circle" src="<?php echo $img; ?>" height='20px' width='20px' alt="">
                      </td>
                    <?php $stuName++;
                    } ?>
                  </tr>
                  <?php
                  $fetchChekList = $connect->query("SELECT * FROM checklist WHERE ctp = '$std_course1'");
                  while ($checkListData = $fetchChekList->fetch()) {
                    $checkId = $checkListData['id'];
                    $countSubCheck = $connect->query("SELECT count(*) FROM subcheclist WHERE main_checklist_id = '$checkId'");
                    $countSubCheckData = $countSubCheck->fetchColumn();
                  ?>
                    <tr>
                      <td><?php echo $checkListData['checklist']; ?></td>
                      <?php
                      $stuName = 0;
                      while ($stuName < count($stuIDArr)) {
                        $stuId = $stuIDArr[$stuName];
                        $checkCheckList = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$checkId' AND studentId = '$stuId' AND ctpId = '$std_course1'");
                        $checkCheckListData = $checkCheckList->fetchColumn();
                        if ($checkCheckListData == $countSubCheckData && $countSubCheckData > 0) {
                          $bgColor1 = '<input type="checkbox" id="validCheck" class="form-check-input is-valid" checked style="height: 30px;width: 30px;border-radius: 35px;opacity: 1;" disabled>';
                        } else {
                          $bgColor1 = '<input type="checkbox" id="invalidCheck" class="form-check-input is-invalid" style="height: 30px;width: 30px;border-radius: 35px;opacity: 1;" disabled>';
                        }
                      ?>
                        <td style="text-align:center;"><?php echo $bgColor1; ?></td>
                      <?php
                        $stuName++;
                      }
                      ?>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            <?php
            }
          }
            ?>