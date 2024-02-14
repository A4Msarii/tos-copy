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
              $get_course_name3 = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
              $get_course_name3->execute([$course_Name]);
              $course_code3 = $get_course_name3->fetchColumn();
            ?>
              <h6 class="card-subtitle"><a class="text-success">Cleranace Log <?php echo $course_code3 . ' - ' . '0' . $course_Code; ?></a></h6>

              <hr class="text-success" style="margin-top: 15px;">

              <div class="row align-items-center gx-2 mb-2">
                <div class="col-12">

                  <table class="table table-bordered">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">item</th>
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
                      $eme_id = "SELECT * FROM clearance_data WHERE ctp_id = '$std_course1'";
                      $eme_idst = $connect->prepare($eme_id);
                      $eme_idst->execute();
                      $eme_idre = $eme_idst->fetchAll();
                      $sns = 1;
                      foreach ($eme_idre as $eme_idvalue) {
                        $class_clearnce = "";
                        $class_table_clearnace = "";
                        $clone_cid_clearnace = "";
                        $get_ins_name1 = "";
                        $get_datess1 = "";
                        $eme_id = $eme_idvalue['id'];
                        $eme_get_id = $eme_idvalue['item'];
                        $eme_get_subid = $eme_idvalue['subitem'];
                        if ($eme_get_id != 0) {
                          $q1 = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                          $q1->execute([$eme_get_id]);
                          $item_name1 = $q1->fetchColumn();
                        } else if ($eme_get_subid != 0) {
                          $q1 = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
                          $q1->execute([$eme_get_subid]);
                          $item_name1 = $q1->fetchColumn();
                        }
                      ?>

                        <tr>
                          <td>
                            <?php echo $item_name1; ?>
                          </td>
                          <?php
                          $stuName = 0;
                          while ($stuName < count($stuIDArr)) {
                            $stuId = $stuIDArr[$stuName];
                            $eme_id1 = $connect->query("SELECT count(*) FROM clearance_student_id WHERE clearance_id='$eme_id' AND stud_id = '$stuId' AND class_id IS NOT NULL");
                            if ($eme_id1->fetchColumn() > 0) {
                              $bgColor1 = "#00C9A7";
                            } else {
                              $bgColor1 = "#ED4C78";
                            }
                          ?>
                            <td style="background-color:<?php echo $bgColor1; ?> !important;"></td>
                          <?php
                            $stuName++;
                          }
                          ?>
                        </tr>

                      <?php

                      }
                      ?>
                      <h6 class="card-subtitle" style="float:left;"><a class="text-success">ACTUAL <?php echo $course_code3 . ' - ' . '0' . $course_Code; ?></a></h6>

                      <div style="float: inline-end;">
                        <!-- <p id="progressMessage"></p> -->
                        <button id="generateReportBtn" style="width: auto;" class="btn btn-success btn-sm"><i class="bi bi-download m-1"></i>Generate Report</button>
                        <p id="progressMessage"></p>
                        <!-- <div id="message">
        <p id="progressMessage"></p>
        <progress id="downloadProgress" value="0" max="100"></progress>
    </div> -->
                      </div>


                      
                      

                    </tbody>

                    </thead>

                  </table>
                  <hr>

                </div>
                <!-- End Col -->
              </div>
            <?php }
            } ?>