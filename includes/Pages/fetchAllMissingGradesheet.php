<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    $course_Code = $_REQUEST['courseCode'];
    $course_Name = $_REQUEST['courseName'];
    $c_id = $_REQUEST['courseId'];
    $fetchuser_id = $_REQUEST['userId']; 

            if ($fetchuser_id == '0') {
              $selectIns = $connect->query("SELECT * FROM gradesheet WHERE course_id='$std_course1' AND over_all_grade IS NULL ORDER BY id");
              $insArr = array();
              $insIndex = 0;
              while ($selectInsData = $selectIns->fetch()) {
                if ($selectInsData['instructor'] != "") {
                  $instrucId = $selectInsData['instructor'];
                  $table_name10 = $selectInsData['class'];
                  $symbol_id10 = $selectInsData['class_id'];
                  $user_Id = $selectInsData['user_id'];
                  if (!in_array($instrucId, $insArr)) {
                    $insArr[$insIndex] = $instrucId;
                    $insIndex++;
                    $get_image = $connect->query("SELECT file_name FROM users WHERE id = '$instrucId'");
                    $get_image_name = $get_image->fetchColumn();
                    $get_name_st = $connect->query("SELECT nickname FROM users WHERE id = '$instrucId'");
                    $get_name_st_name = $get_name_st->fetchColumn();
                    // echo "varun";
                    if ($get_image_name != "") {
                      $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                    } else {
                      $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
            ?>
                    <div class="row mb-5">
                      <div class="col-2">
                        <div style="display: grid;">
                          <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">
                          <span value="<?php echo $instrucId; ?>" style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                        </div>
                      </div>

                      <div class="col-11" style="margin-left: 60px; margin-top:-70px;">
                        <?php
                        $stuQ = $connect->query("SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$course_Code'");
                        while ($stu_Data = $stuQ->fetch()) {
                          $s_tid = $stu_Data['StudentNames'];
                          $classQ = $connect->query("SELECT * FROM gradesheet WHERE instructor = '$instrucId' AND user_id = '$s_tid' AND over_all_grade IS NULL ORDER BY id");
                          while ($classData = $classQ->fetch()) {
                            $table_name10 = $classData['class'];
                            $symbol_id10 = $classData['class_id'];
                            $user_Id = $classData['user_id'];
                            if ($table_name10 == "actual") {
                              $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                              $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
                            } else if ($table_name10 == "sim") {
                              $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                              $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
                            }
                            $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$user_Id'");
                            $insD = $insQ->fetchColumn();

                            $name111221 = $q11->fetchColumn();
                            $q10->execute([$symbol_id10]);
                            $name_class = $q10->fetchColumn();
                        ?>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/newgradesheet.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>&std_id=<?php echo $s_tid; ?>" style="margin-right: 10px; width:max-content; height: fit-content;" class="btn btn-danger position-relative"><?php echo $name_class; ?>

                              <span class="circleig1"><?php echo $insD; ?></span>
                            </a>
                          <?php
                          }
                          $classQ = $connect->query("SELECT * FROM cloned_gradesheet WHERE instructor = '$instrucId' AND user_id = '$s_tid' AND over_all_grade IS NULL ORDER BY id");
                          while ($classData = $classQ->fetch()) {
                            $table_name10 = $classData['class'];
                            $symbol_id10 = $classData['class_id'];
                            $user_Id = $classData['user_id'];
                            if ($table_name10 == "actual") {
                              $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                              $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
                            } else if ($table_name10 == "sim") {
                              $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                              $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
                            }
                            $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$user_Id'");
                            $insD = $insQ->fetchColumn();
                            $xString = str_repeat("x", $classData['cloned_id']);

                            $name111221 = $q11->fetchColumn();
                            $q10->execute([$symbol_id10]);
                            $name_class = $q10->fetchColumn();
                          ?>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/newgradesheetcl.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>&std_id=<?php echo $s_tid; ?>" style="margin-right: 10px; width:max-content; height: fit-content;" class="btn btn-danger position-relative"><?php echo $name_class . $xString; ?>

                              <span class="circleig1"><?php echo $insD; ?></span>
                            </a>
                        <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
              <?php
                  }
                }
              }
              ?>

            <?php
            }
        }
            ?>