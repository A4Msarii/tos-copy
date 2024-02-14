<style type="text/css">
  span.apexcharts-legend-text {
    color: var(--bg-dark) !important;
    /* Replace with the Bootstrap class you want */
  }


  .outer-div {
    position: relative;
    /* Make this div a positioning context for absolute positioning */
  }

  .hidden-div {
    display: none;
    /* Initially hide the div */
    position: absolute;
    top: 100%;
    /* Position it below the outer div */
    left: 0;
    background-color: #f0f0f0;
    padding: 10px;
    border: 1px solid #ccc;
    width: max-content;
    height: 85px;
    z-index: 1;
  }

  .hidden-div-mm {
    display: none;
    /* Initially hide the div */
    position: absolute;
    top: 100%;
    /* Position it below the outer div */
    left: 0;
    background-color: #f0f0f0;
    padding: 10px;
    border: 1px solid #ccc;
    width: max-content;
    /*    height: 85px;*/
    z-index: 1;
  }

  .outer-div:hover .hidden-div-mm {
    display: block;
    /* Show the div on hover */
  }

  .outer-div:hover .hidden-div {
    display: block;
    /* Show the div on hover */
  }

  .loading-spinner {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #00c9a7;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .progress-container {
    width: 100%;
    border: 1px solid #ccc;
    background-color: #f0f0f0;
    position: relative;
    /* padding: 10px; */
  }

  .progress-bar {
    height: 18px;
    color: white;
    text-align: center;
    line-height: 30px;
    /* position: relative; */
    width: 100%;
    top: 0;
    background-color: #ccc !important;
  }

  .student-profile {
    /* width: 100%; */
    position: absolute;
    margin-bottom: 10px;
    align-items: center;
    left: -10px;
    top: 0px;
    display: flex;
    flex-direction: row-reverse;
  }

  .student-image {
    /* margin-right: 10px; */
    position: relative;
    z-index: 9;
    top: -20px;
  }

  .student-details {
    flex-grow: 1;
  }

  .student-name {
    font-weight: bold;
  }

  .student-image {
    z-index: 0;
  }
</style>

<!--Phase Manager Conatiner-->
<div class="row">
  <div class="col-12" style="justify-content: end;display: grid;">
    <!-- <p id="progressMessage"></p> -->
    <button id="generateReportBtn" style="width: auto;" class="btn btn-success btn-sm"><i class="bi bi-download m-1"></i>Generate Report</button>
    <p id="progressMessage"></p>

  </div>
  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">


        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <h6 class="card-subtitle"><a class="text-success">Phase Manager</a></h6>
            <hr class="text-success">

            <div class="row align-items-center gx-2 mb-2">
              <div class="col-12">
                <?php
                $fetchPhaseDetail = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName = '$std_course1' AND courseCode = '$CourseCode11' GROUP BY phase_id,courseName,courseCode");
                if ($fetchPhaseDetail->rowCount() > 0) {
                ?>
                  <div class="row mb-2">
                    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
                      <div class="card-body">
                        <!-- <h6 class="text-success">
                          <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/phaseM.png"> &nbsp;&nbsp;Phase Manager's
                        </h6>
                        <hr style="margin: 10px;margin-top: -5px;"> -->
                        <!-- <hr class="text-dark"> -->
                        <div class="row" id="demoPhase">
                          <?php
                          while ($phaseDetail = $fetchPhaseDetail->fetch()) {
                            $phaseId = $phaseDetail['phase_id'];
                            $instId = $phaseDetail['intructor'];
                            $backupIns = $phaseDetail['b_up_manger'];
                            $fetchPhaseName = $connect->query("SELECT phasename,color FROM phase WHERE id = '$phaseId'");
                            $phaseData = $fetchPhaseName->fetch();
                            if ($phaseData['color'] == "") {
                              $PhaseColor = "gray";
                            } else {
                              $PhaseColor = $phaseData['color'];
                            }
                            $fetchInstName = $connect->query("SELECT nickname FROM users WHERE id = '$instId'");
                            $fetchBackInstName = $connect->query("SELECT nickname FROM users WHERE id = '$backupIns'");
                            // echo  . "-" . $fetchInstName->fetchColumn();
                            // echo "<br>";

                          ?>
                            <!-- <div class="row"> -->
                            <div class="col-md-4 mb-2" style="width:revert-layer;">
                              <span style="background-color:<?php echo $PhaseColor; ?>;font-size: large;width: 50%;" title="<?php echo $phaseData['phasename']; ?>" class="badge rounded-pill"><?php echo substr($phaseData['phasename'], 0, 15); ?></span> -
                              <span style="font-size:large;font-weight: bold;background-color:#020080;color:white;padding: 5px;border-radius: 5px;"><?php echo $fetchInstName->fetchColumn(); ?> / <?php echo $fetchBackInstName->fetchColumn(); ?></span>

                            </div>
                            <!-- </div> -->
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>

                    <!-- End Col -->
                  </div>

                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Progreess Bar Container-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <!-- <h6 class="card-subtitle"><a class="text-success"><h1></h1></a></h6>
        <hr class="text-success"> -->

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12" id="ProgressBarFetching">
            <div class="loadingProgress" style="display:flex;">
              <div class="loading-spinner"></div>
              <h1 style="margin:5px;">Loading....</h1>
            </div>
          </div>

        </div>



      </div>
    </div>
    <!-- End Card -->
  </div>

</div>

<!--missing gradesheet conatiner-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a class="text-success">Missing Gradesheets</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <div class="row">
              <?php
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
                      <div class="col-4">
                        <div class="row">
                          <div class="col-2">
                            <div style="display: grid;">
                              <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">
                              <span value="<?php echo $instrucId; ?>" style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                            </div>
                          </div>
                          <div class="col-11" style="margin-left: 60px; margin-top:-70px;">
                            <?php
                            $stuQ = $connect->query("SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'");
                            $count = 0; // Counter for anchor tags
                            while ($stu_Data = $stuQ->fetch()) {
                              $s_tid = $stu_Data['StudentNames'];
                              $classQ = $connect->query("SELECT * FROM gradesheet WHERE instructor = '$instrucId' AND user_id = '$s_tid' AND over_all_grade IS NULL ORDER BY id");
                              while ($classData = $classQ->fetch()) {
                                // Generating anchor tags
                                if ($count < 3) { // Display only the first 3 anchor tags directly
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
                                $count++;
                              }
                              // Add a "Show more" button if there are more than 3 anchor tags

                            }
                            if ($count > 3) {
                              ?>
                              <a data-insid="<?php echo $instrucId; ?>" href="#" class="show-more" data-bs-toggle="modal" data-bs-target="#MissingGradesheetModal">Show more</a>
                              <!-- <script>
                                $(document).ready(function() {
                                  $(".show-more").click(function(e) {
                                    e.preventDefault();
                                    $(".hidden-anchors").toggle();
                                    $(this).text(function(i, text) {
                                      return text === "Show more" ? "Show less" : "Show more";
                                    });
                                  });
                                });
                              </script> -->
                            <?php
                            }
                            ?>
                            <div class="hidden-anchors" style="display:none;">
                              <?php
                              // Code for generating anchor tag but hide initially
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
              <?php
                    }
                  }
                }
              }
              ?>
            </div>

          </div>
          <div class="col-12" style="display: none;">

            <?php
            if ($fetchuser_id == '0') {

              $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
              $statement101 = $connect->prepare($query101);
              $statement101->execute();
              if ($statement101->rowCount() > 0) {
                $result101 = $statement101->fetchAll();
                foreach ($result101 as $row101) {
                  $s_tid = $row101['StudentNames'];
                  $count_missing = "SELECT count(*) FROM `gradesheet` WHERE user_id='$s_tid' AND over_all_grade IS NULL ORDER BY id";
                  $resultcount_missing = $connect->prepare($count_missing);
                  $resultcount_missing->execute();
                  $number_of_rows_count_missing = $resultcount_missing->fetchColumn();
                  if ($number_of_rows_count_missing > 0) {
                    $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                    $get_image->execute([$s_tid]);
                    $get_image_name = $get_image->fetchColumn();
                    $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                    $get_name_st->execute([$s_tid]);
                    $get_name_st_name = $get_name_st->fetchColumn();

                    if ($get_image_name != "") {
                      $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                    } else {
                      $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
            ?>
                    <div class="row mb-5">
                      <div class="col-2 outer-div">
                        <div style="display: grid;">
                          <img class="avatar avatar-sm avatar-circle avatar-img hello" src="<?php echo $pic111; ?>" alt="Image Description">
                          <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                        </div>
                        <div class="hidden-div">Content to be shown on hover</div>
                      </div>

                      <!-- <div class="col-2">
                        <div style="display: grid;">
                          <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">
                          <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                        </div>
                      </div> -->
                      <div class="col-11" style="display: flex;margin-left: 60px;margin-top: -70px;">

                        <?php $fetch_missing2 = "SELECT * FROM gradesheet WHERE user_id='$s_tid' AND over_all_grade IS NULL ORDER BY id";
                        $fetch_missingstatement12 = $connect->prepare($fetch_missing2);
                        $fetch_missingstatement12->execute();
                        $fetch_missingresult12 = $fetch_missingstatement12->fetchAll();
                        foreach ($fetch_missingresult12 as $row11512) {
                          $table_name10 = $row11512['class'];
                          $symbol_id10 = $row11512['class_id'];
                          $inst_Id = $row11512['instructor'];

                          if ($table_name10 == "actual") {
                            $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                            $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
                          } else if ($table_name10 == "sim") {
                            $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                            $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
                          }

                          $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$inst_Id'");
                          $insD = $insQ->fetchColumn();

                          $name111221 = $q11->fetchColumn();
                          $q10->execute([$symbol_id10]);
                          $name_class = $q10->fetchColumn();

                        ?>
                          <a style="margin-right: 10px; width:max-content; height: fit-content;" class="btn btn-danger position-relative"><?php echo $name_class; ?>

                            <span class="circleig1"><?php echo $insD; ?></span>
                          </a>
                        <?php
                        }
                        ?>
                      </div>
                    </div>

            <?php }
                }
              }
            }
            ?>
          </div>
          <!-- End Col -->
        </div>



      </div>
    </div>
    <!-- End Card -->
  </div>

</div>

<!--clearnce log row-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">


        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <?php

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
              <hr class="text-success">

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





                      <script>
                        $(document).ready(function() {
                          $("#generateReportBtn").on("click", function(event) {
                            event.preventDefault();
                            $("#progressMessage").html('Generating report...');
                            $("#downloadProgress").attr('value', 0);

                            // Make an AJAX request to generate the report
                            $.ajax({
                              url: "<?php echo BASE_URL; ?>includes/Pages/allgenerate.php",
                              type: 'GET',
                              dataType: 'json',
                              success: function(response) {
                                if (response.status === 'success') {
                                  // Use an iframe to download the file without navigating away
                                  var iframe = $('<iframe/>', {
                                    id: 'hiddenDownloader',
                                    src: response.fileUrl,
                                    style: 'display:none;'
                                  }).appendTo('body');

                                  // Update progress message and show alert
                                  $("#progressMessage").html('Download completed..');
                                  alert('Report download completed.');
                                } else {
                                  $("#progressMessage").html('Error generating report: ' + response.message);
                                }
                              },
                              error: function(xhr, status, error) {
                                $("#progressMessage").html('Error generating report: ' + (xhr.status ? 'HTTP Status ' + xhr.status : xhr.statusText));
                              }
                            });
                          });
                        });
                      </script>

                    </tbody>

                    </thead>

                  </table>
                  <hr>

                </div>
                <!-- End Col -->
              </div>
            <?php } ?>

          </div>
          <!-- End phase progressbar -->
          <!-- End Col -->
        </div>



      </div>
    </div>
    <!-- End Card -->
  </div>

</div>

<!--checklist calendar-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/checklistpage.php" class="text-success">CheckList</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-12">
            <?php
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
            ?>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

</div>

<!--accomplish task container-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php" class="text-success">Unaccomplish Task</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">

            <?php
            if ($fetchuser_id == '0') {
              $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
              $statement101 = $connect->prepare($query101);
              $statement101->execute();
              if ($statement101->rowCount() > 0) {
                $result101 = $statement101->fetchAll();
                foreach ($result101 as $row101) {
                  $s_tid = $row101['StudentNames'];
                  $query_acc = "SELECT * FROM accomplish_task where assign_class_table IS null and Stud_ac='$s_tid'";
                  $statement_acc = $connect->prepare($query_acc);
                  $statement_acc->execute();
                  if ($statement_acc->rowCount() > 0) {
                    $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                    $get_image->execute([$s_tid]);
                    $get_image_name = $get_image->fetchColumn();
                    $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                    $get_name_st->execute([$s_tid]);
                    $get_name_st_name = $get_name_st->fetchColumn();

                    if ($get_image_name != "") {
                      $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                    } else {
                      $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
            ?>
                    <div class="row">
                      <div class="col-1">
                        <div style="display: grid; place-items: center;">

                          <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">

                          <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                        </div>
                      </div>
                      <div class="col-10">
                        <?php
                        $result_acc = $statement_acc->fetchAll();
                        $sn = 1;
                        foreach ($result_acc as $row) {
                          $item_acc = $row['Item_ac'];
                          $type1 = $row['Type'];
                          if ($type1 == 'item') {
                            $it_name = $connect->prepare("SELECT item FROM itembank WHERE id=?");
                          } else if ($type1 == 'subitem') {
                            $it_name = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                          }
                          $it_name->execute([$item_acc]);
                          $fetchname = $it_name->fetchColumn(); {
                        ?>

                            <a class="badge bg-soft-secondary rounded-pill m-2 text-dark" href="#" style="font-size:medium;"><?php echo $fetchname; ?></a>
                        <?php }
                        }
                        ?>
                      </div>
                    </div>
                    <hr>
                  <?php
                  } ?>
            <?php
                }
              }
            }
            ?>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->


      </div>
    </div>
    <!-- End Card -->
  </div>

</div>

<!--Additional task container-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php" class="text-success">Additional Task</a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">

            <?php
            if ($fetchuser_id == '0') {
              $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
              $statement101 = $connect->prepare($query101);
              $statement101->execute();
              if ($statement101->rowCount() > 0) {
                $result101 = $statement101->fetchAll();
                foreach ($result101 as $row101) {
                  $s_tid = $row101['StudentNames'];
                  $query_add = "SELECT * FROM additional_task where assign_class_table IS NULL and Stud_id='$s_tid'";
                  $statement_Add = $connect->prepare($query_add);
                  $statement_Add->execute();
                  if ($statement_Add->rowCount() > 0) {
                    $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                    $get_image->execute([$s_tid]);
                    $get_image_name = $get_image->fetchColumn();
                    $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                    $get_name_st->execute([$s_tid]);
                    $get_name_st_name = $get_name_st->fetchColumn();

                    if ($get_image_name != "") {
                      $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                    } else {
                      $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
            ?>
                    <div class="row">
                      <div class="col-1">
                        <div style="display: grid; place-items: center;">

                          <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">

                          <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                        </div>
                      </div>
                      <div class="col-10">
                        <?php

                        $result_add = $statement_Add->fetchAll();
                        $sn = 1;
                        foreach ($result_add as $rows) {
                          $item_name = $rows['Item'];
                          $type = $rows['type'];
                          if ($type == 'item') {
                            $i_name = $connect->prepare("SELECT item FROM itembank WHERE id=?");
                          } else if ($type == 'subitem') {
                            $i_name = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                          }
                          $i_name->execute([$item_name]);
                          $addname1 = $i_name->fetchColumn();
                        ?>

                          <a class="badge bg-soft-secondary rounded-pill m-2 text-dark" href="#" style="font-size:medium;"><?php echo $addname1; ?></a>
                        <?php
                        } ?>
                      </div>
                    </div>
                    <hr>
                  <?php
                  } ?>
            <?php
                }
              }
            } ?>
          </div>
          <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

</div>

<!-- memo descipln cap -->
<div class="row">

  <div class="col-sm-6 col-lg-4 mb-6 mb-lg-6">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/memo.php" class="text-success">Memo</a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <!-- <div class="row align-items-center"> -->



          <!-- Avatar Group -->
          <!-- <div class="avatar-group mb-1">
                <span class="avatar avatar-circle">
                  <img class="avatar-img" src="<?php echo BASE_URL; ?>assets/img/160x160/img10.jpg" alt="Image Description">
                </span>

                <span class="avatar avatar-primary avatar-circle">
                  <span class="avatar-initials">2+</span>
                </span>
              </div> -->
          <!-- End Avatar Group -->
          <!-- </div> -->

          <!-- End Row -->
          <div class="col" style="display:contents;">


            <?php
            if ($fetchuser_id == '0') {
              $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
              $statement101 = $connect->prepare($query101);
              $statement101->execute();
              if ($statement101->rowCount() > 0) {
                $result101 = $statement101->fetchAll();
                foreach ($result101 as $row101) {
                  $s_tid = $row101['StudentNames'];
                  $countMemoAbs = $connect->query("SELECT count(*) FROM memo WHERE student_id = '$s_tid' AND categoryId = 'absent' AND course_id = '$std_course1'");
                  if ($countMemoAbs->fetchColumn() > 0) {
                    $query5 = "SELECT * FROM memo where course_id='$std_course1' and student_id='$s_tid' ORDER BY id DESC LIMIT 3";
                    $statement5 = $connect->prepare($query5);
                    $statement5->execute();
                    if ($statement5->rowCount() > 0) {
                      $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                      $get_image->execute([$s_tid]);
                      $get_image_name = $get_image->fetchColumn();
                      $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                      $get_name_st->execute([$s_tid]);
                      $get_name_st_name = $get_name_st->fetchColumn();

                      if ($get_image_name != "") {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                          $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                        } else {
                          $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                        }
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
            ?>
                      <?php
                      $absQ = $connect->query("SELECT * FROM memo WHERE student_id = '$s_tid' AND categoryId = 'absent' AND course_id = '$std_course1'");
                      $absDay = 0;
                      while ($absData = $absQ->fetch()) {
                        $absDay = $absDay + $absData['memomarks'];
                      }
                      ?>
                      <div class="row">
                        <div class="col-2 outer-div">
                          <div style="display: grid; place-items: center;">

                            <img class="avatar avatar-circle" src="<?php echo $pic111; ?>" alt="Image Description">

                            <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                            <h4 style="margin:5px; padding: 5px;display: flex;" class="text-danger"><span class="legend-indicator bg-danger m-1"></span>Sick:<?php echo $absDay; ?></h4>
                          </div>
                          <div class="hidden-div-mm" style="background-color:#91989e;">
                            <div class="col-10" style="display: -webkit-inline-box;">
                              <?php
                              $result5 = $statement5->fetchAll();
                              foreach ($result5 as $row5) {
                                $memo = $row5['id'];
                                if ($row5['topic'] == "") {
                                  $tId = $row5['categoryId'];
                                  if (is_numeric($row5['categoryId'])) {
                                    $tQ = $connect->query("SELECT category FROM memocate WHERE id = '$tId'");
                                    $tData = $tQ->fetchColumn();
                                  } else {
                                    $tData = $row5['categoryId'];
                                  }
                                } else {
                                  $tData = $row5['topic'];
                                }

                                $std_in = $row5['inst_id'];
                                $instr_name = $connect->prepare("SELECT name FROM users WHERE id=?");
                                $instr_name->execute([$std_in]);
                                $name2 = $instr_name->fetchColumn();

                              ?>
                                <tr>

                                  <h4 style="margin:5px; padding: 5px;" class="text-dark"><a href="" onclick="document.getElementById('memo').value='<?php echo $memo ?>';
                                                document.getElementById('date').value='<?php echo $row5['date'] ?>';
                                                document.getElementById('inst').value='<?php echo $name2; ?>';
                                                document.getElementById('topic').value='<?php echo $tData ?>';
                                                document.getElementById('comment').value='<?php echo $row5['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#memoinfo" id="cl_sy"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>


                                </tr>

                              <?php
                              }
                              // $absQ = $connect->query("SELECT * FROM memo WHERE student_id = '$s_tid' AND categoryId = 'absent' AND course_id = '$std_course1'");
                              // $absDay = 0;
                              // while ($absData = $absQ->fetch()) {
                              //   $absDay = $absDay + $absData['memomarks'];
                              // }
                              ?>
                              <!-- <tr>

                              <h4 style="margin:5px; padding: 5px;" class="text-dark"><span class="legend-indicator bg-danger"></span>Sick:<?php echo $absDay; ?></h4><br>


                            </tr> -->
                            </div>
                          </div>
                        </div>
                        <!-- <div class="col-10" style="display:flex;">
                        <?php
                        $result5 = $statement5->fetchAll();
                        foreach ($result5 as $row5) {
                          $memo = $row5['id'];
                          if ($row5['topic'] == "") {
                            $tId = $row5['categoryId'];
                            if (is_numeric($row5['categoryId'])) {
                              $tQ = $connect->query("SELECT category FROM memocate WHERE id = '$tId'");
                              $tData = $tQ->fetchColumn();
                            } else {
                              $tData = $row5['categoryId'];
                            }
                          } else {
                            $tData = $row5['topic'];
                          }

                          $std_in = $row5['inst_id'];
                          $instr_name = $connect->prepare("SELECT name FROM users WHERE id=?");
                          $instr_name->execute([$std_in]);
                          $name2 = $instr_name->fetchColumn();

                        ?>
                          <tr>

                            <h4 style="margin:5px; padding: 5px;"><a href="" onclick="document.getElementById('memo').value='<?php echo $memo ?>';
                                                document.getElementById('date').value='<?php echo $row5['date'] ?>';
                                                document.getElementById('inst').value='<?php echo $name2; ?>';
                                                document.getElementById('topic').value='<?php echo $tData ?>';
                                                document.getElementById('comment').value='<?php echo $row5['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#memoinfo" id="cl_sy"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>


                          </tr>

                        <?php
                        }
                        $absQ = $connect->query("SELECT * FROM memo WHERE student_id = '$s_tid' AND categoryId = 'absent' AND course_id = '$std_course1'");
                        $absDay = 0;
                        while ($absData = $absQ->fetch()) {
                          $absDay = $absDay + $absData['memomarks'];
                        }
                        ?>
                        <tr>

                          <h4 style="margin:5px; padding: 5px;"><a><span class="legend-indicator bg-primary"></span>Sick:<?php echo $absDay; ?></a></h4><br>


                        </tr>
                      </div> -->
                      </div>
                      <hr>
                  <?php
                    }
                  }
                  ?>
            <?php
                }
              }
            }
            ?>
          </div>
          <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>


    </div>
  </div>

  <div class="col-sm-6 col-lg-4 mb-6 mb-lg-6">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/discipline.php" class="text-success">Discipline</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col" style="display:contents;">


            <?php
            if ($fetchuser_id == '0') {
              $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
              $statement101 = $connect->prepare($query101);
              $statement101->execute();
              if ($statement101->rowCount() > 0) {
                $result101 = $statement101->fetchAll();
                foreach ($result101 as $row101) {
                  $s_tid = $row101['StudentNames'];
                  $countDiciAbs = $connect->query("SELECT count(*) FROM discipline WHERE student_id = '$s_tid' AND categoryId = 'absent' AND course_id = '$std_course1'");
                  if ($countDiciAbs->fetchColumn() > 0) {
                    $query6 = "SELECT * FROM discipline where course_id='$std_course1' and student_id='$s_tid' ORDER BY id DESC LIMIT 3";
                    $statement6 = $connect->prepare($query6);
                    $statement6->execute();
                    if ($statement6->rowCount() > 0) {
                      $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                      $get_image->execute([$s_tid]);
                      $get_image_name = $get_image->fetchColumn();
                      $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                      $get_name_st->execute([$s_tid]);
                      $get_name_st_name = $get_name_st->fetchColumn();

                      if ($get_image_name != "") {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                          $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                        } else {
                          $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                        }
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
            ?>
                      <?php
                      $absQ = $connect->query("SELECT * FROM discipline WHERE student_id = '$s_tid' AND categoryId = 'absent' AND course_id = '$std_course1'");
                      $absDay = 0;
                      while ($absData = $absQ->fetch()) {
                        $absDay = $absDay + $absData['dismarks'];
                      }
                      ?>
                      <div class="row">
                        <div class="col-1 outer-div">
                          <div style="display: grid; place-items: center;">

                            <img class="avatar avatar-circle" src="<?php echo $pic111; ?>" alt="Image Description">

                            <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                            <h4 style="margin:5px; padding: 5px;display: flex;" class="text-danger"><span class="legend-indicator bg-danger m-1"></span>Absent:<?php echo $absDay; ?></h4>
                          </div>
                          <div class="hidden-div-mm" style="background-color:#91989e;">
                            <div class="col-10" style="display:-webkit-inline-box;">
                              <?php
                              $result6 = $statement6->fetchAll();
                              foreach ($result6 as $row6) {
                                $desci = $row6['id'];
                                if ($row6['topic'] == "") {
                                  $tId = $row6['categoryId'];
                                  if (is_numeric($row6['categoryId'])) {
                                    $tQ = $connect->query("SELECT category FROM desccate WHERE id = '$tId'");
                                    $tData = $tQ->fetchColumn();
                                  } else {
                                    $tData = $row6['categoryId'];
                                  }
                                } else {
                                  $tData = $row6['topic'];
                                }

                                $std_in_d = $row6['inst_id'];
                                $instr_name_d = $connect->prepare("SELECT name FROM users WHERE id=?");
                                $instr_name_d->execute([$std_in_d]);
                                $name2_d = $instr_name_d->fetchColumn();

                              ?>
                                <tr>

                                  <h4 style="margin:5px; padding: 5px;"><a href="" onclick="document.getElementById('desci').value='<?php echo $desci ?>';
                                                document.getElementById('date_desc').value='<?php echo $row6['date'] ?>';
                                                document.getElementById('inst_desc').value='<?php echo $name2_d ?>';
                                                document.getElementById('topic_desc').value='<?php echo $tData ?>';
                                                document.getElementById('comment_desc').value='<?php echo $row6['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#disciplineinfo" id="cl_sy1"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>
                                </tr>

                              <?php
                              }
                              // $absQ = $connect->query("SELECT * FROM discipline WHERE student_id = '$s_tid' AND categoryId = 'absent' AND course_id = '$std_course1'");
                              // $absDay = 0;
                              // while ($absData = $absQ->fetch()) {
                              //   $absDay = $absDay + $absData['memomarks'];
                              // }
                              ?>
                              <!-- <tr>

                              <h4 style="margin:5px; padding: 5px;" class="text-danger"><span class="legend-indicator bg-danger"></span>Absent:<?php echo $absDay; ?></h4><br>
                            </tr> -->
                            </div>
                          </div>
                        </div>

                      </div>
                      <hr>
                  <?php
                    }
                  }
                  ?>
            <?php
                }
              }
            } ?>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->


      </div>


    </div>
    <!-- End Card -->
  </div>

  <div class="col-sm-6 col-lg-4 mb-6 mb-lg-6">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/CAP.php" class="text-success">CAP</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">


          <div class="col-12">


            <?php
            if ($fetchuser_id == '0') {
              $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
              $statement101 = $connect->prepare($query101);
              $statement101->execute();
              if ($statement101->rowCount() > 0) {
                $result101 = $statement101->fetchAll();
                foreach ($result101 as $row101) {
                  $s_tid = $row101['StudentNames'];
                  $query6_c = "SELECT * FROM notifications where to_userid='$s_tid' and extra_data='reached_cout' ORDER BY id DESC LIMIT 3";
                  $statement6_c = $connect->prepare($query6_c);
                  $statement6_c->execute();
                  if ($statement6_c->rowCount() > 0) {
                    $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                    $get_image->execute([$s_tid]);
                    $get_image_name = $get_image->fetchColumn();
                    $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                    $get_name_st->execute([$s_tid]);
                    $get_name_st_name = $get_name_st->fetchColumn();

                    if ($get_image_name != "") {
                      $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                    } else {
                      $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
            ?>
                    <div class="row">
                      <div class="col-1">
                        <div style="display: grid; place-items: center;">

                          <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">

                          <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                        </div>
                      </div>
                      <div class="col-10" style="display:flex;">
                        <?php

                        $result6_c = $statement6_c->fetchAll();
                        foreach ($result6_c as $row7) {

                        ?>
                          <tr>
                            <?php
                            $cap = $row7['data'];
                            $over_all_grade1 = $connect->prepare("SELECT warning_name FROM `warning_data` WHERE id=?");
                            $over_all_grade1->execute([$cap]);
                            $data_value = $over_all_grade1->fetchColumn();

                            $over_all_grade11 = $connect->prepare("SELECT bgColor FROM `warning_data` WHERE id=?");
                            $over_all_grade11->execute([$cap]);
                            $data_value11 = $over_all_grade11->fetchColumn();
                            if ($data_value11 == "") {
                              $bgColor = "gray";
                            } else {
                              $bgColor = $data_value11;
                            }
                            ?>



                            <h4 style="margin:5px; padding: 5px;"><a style="color:<?php echo $bgColor; ?>" href="" onclick="document.getElementById('capname').innerHTML='<?php echo $data_value ?>';
                                    document.getElementById('capmodalcolor').style.backgroundColor='<?php echo $bgColor ?>';
                                " data-bs-toggle="modal" data-bs-target="#CAPinfo" class="get_cap_noti" id="<?php echo $row7['id']; ?>"><span class="legend-indicator" style="background-color:<?php echo $bgColor; ?>"></span><?php echo $data_value ?></a></h4>


                          </tr>

                        <?php }
                        ?>
                      </div>
                    </div>
                    <hr>
            <?php

                  }
                }
              }
            } ?>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>
</div>
<!-- End Stats -->

<!--Quiz Container-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/quiz.php" class="text-success">Quiz</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12 d-none">

            <?php
            if ($fetchuser_id == '0') {
              $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
              $statement101 = $connect->prepare($query101);
              $statement101->execute();
              if ($statement101->rowCount() > 0) {
                $result101 = $statement101->fetchAll();
                foreach ($result101 as $row101) {
                  $s_tid = $row101['StudentNames'];
                  $sql_quiz = "SELECT count(*) FROM `quiz_marks` WHERE student_id='$s_tid'";
                  $result_quiz = $connect->prepare($sql_quiz);
                  $result_quiz->execute();
                  $number_of_rows_quiz = $result_quiz->fetchColumn();
                  if ($number_of_rows_quiz > 0) {
                    $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                    $get_image->execute([$s_tid]);
                    $get_image_name = $get_image->fetchColumn();
                    $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                    $get_name_st->execute([$s_tid]);
                    $get_name_st_name = $get_name_st->fetchColumn();

                    if ($get_image_name != "") {
                      $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                    } else {
                      $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
            ?>
                    <div class="row">
                      <div class="col-1">
                        <div style="display: grid; place-items: center;">

                          <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">

                          <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                        </div>
                      </div>
                      <div class="col-10" style="display:flex;">
                        <?php $class_name_fect_te_q = $connect->query("SELECT * FROM quiz WHERE ctp ='$std_course1' ORDER BY id DESC ");
                        while ($class_name_fect_te_q1 = $class_name_fect_te_q->fetch()) {
                          $class_name_fect_tes_q = $class_name_fect_te_q1['quiz'];
                          $quizId = $class_name_fect_te_q1['id'];
                          $query_q = "SELECT * FROM quiz_marks WHERE `course_id`='$std_course1'  AND student_id='$s_tid' AND quiz_id = '$quizId' ORDER BY id DESC LIMIT 3";
                          $statement_q = $connect->prepare($query_q);
                          $statement_q->execute();
                          if ($statement_q->rowCount() > 0) {
                        ?>
                            <td>

                              <?php $result_q = $statement_q->fetchAll();
                              foreach ($result_q as $row3) {
                                $marks_quiz_q = $row3['marks'];
                                $class_id_te_q = $row3['quiz_id'];
                                $inId = $row3['userId'];

                                $inQ = $connect->query("SELECT nickname FROM users WHERE id = '$inId'");
                                $inData1 = $inQ->fetchColumn();
                                if ($inData1 == "") {
                                  $inData = "-";
                                } else {
                                  $inData = $inData1;
                                }

                                $class_quiz_q = "btn btn-dark";
                                if ($marks_quiz_q != "") {
                                  if ($marks_quiz_q <= 50 && $marks_quiz_q >= 0) {
                                    $class_quiz_q = "btn btn-danger";
                                  } else if ($marks_quiz_q <= 70 && $marks_quiz_q >= 51) {
                                    $class_quiz_q = "btn btn-warning";
                                  } else if ($marks_quiz_q <= 80 && $marks_quiz_q >= 71) {
                                    $class_quiz_q = "btn btn-secondary";
                                  } else if ($marks_quiz_q <= 90 && $marks_quiz_q >= 81) {
                                    $class_quiz_q = "btn btn-success";
                                  } else if ($marks_quiz_q <= 100 && $marks_quiz_q >= 91) {
                                    $class_quiz_q = "btn btn-primary";
                                  }
                                }
                              ?>

                                <h4 id="<?php echo $class_id_te_q; ?>" name="quiz" data-bs-toggle="modal" data-bs-target="#quizAttachModal" style="margin:5px; padding: 5px;position:relative;" onclick="document.getElementById('testId').value='<?php echo $class_id_te; ?>';" class="btnFlip quizFiles" style="margin:5px; padding: 5px;">
                                  <span class="legend-indicator bg-danger"></span>
                                  <span class="tooltip-text" style="white-space: nowrap;"><?php echo $inData; ?></span>
                                  <span style="font-weight:bold; width:5%; text-align:center; padding:5px; border-radius: 5px; color:white;" class="badge<?php echo $class_quiz_q; ?>"><?php echo $marks_quiz_q; ?></span> -
                                  <a style="font-weight:bold;" class="text-dark"><?php echo $class_name_fect_tes_q ?></a>

                                </h4>

                          <?php }
                            }
                          } ?>
                            </td>
                      </div>
                    </div>
                    <hr>
            <?php }
                }
              }
            }

            ?>
          </div>
          <div id="quizChartContainer" class="d-flex row"></div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>


    </div>
    <!-- End Card -->
  </div>

</div>

<!--Test Container-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/testing.php" class="text-success">Test</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col d-none">

            <?php
            if ($fetchuser_id == '0') {
              $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
              $statement101 = $connect->prepare($query101);
              $statement101->execute();
              if ($statement101->rowCount() > 0) {
                $result101 = $statement101->fetchAll();
                foreach ($result101 as $row101) {
                  $s_tid = $row101['StudentNames'];
                  $query3 = "SELECT * FROM test_data where `course_id`='$std_course1' and student_id='$s_tid' ORDER BY id DESC";
                  $statement3 = $connect->prepare($query3);
                  $statement3->execute();
                  if ($statement3->rowCount() > 0) {
                    $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                    $get_image->execute([$s_tid]);
                    $get_image_name = $get_image->fetchColumn();
                    $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                    $get_name_st->execute([$s_tid]);
                    $get_name_st_name = $get_name_st->fetchColumn();

                    if ($get_image_name != "") {
                      $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                        $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                      } else {
                        $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                    } else {
                      $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
            ?>
                    <div class="row">
                      <div class="col-1">
                        <div style="display: grid; place-items: center;">

                          <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">

                          <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                        </div>
                      </div>
                      <div class="col-10" style="display:flex;">

                        <?php
                        ?>
                        <td>

                          <?php $result3 = $statement3->fetchAll();
                          foreach ($result3 as $row3) {
                            $marks_test = $row3['marks'];
                            $class_id_te = $row3['test_id'];
                            $inId = $row3['userId'];

                            $inQ = $connect->query("SELECT nickname FROM users WHERE id = '$inId'");
                            $inData1 = $inQ->fetchColumn();

                            if ($inData1 == "") {
                              $inData = "-";
                            } else {
                              $inData = $inData1;
                            }

                            $class_name_fect_te = $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                            $class_name_fect_te->execute([$class_id_te]);
                            $class_name_fect_tes = $class_name_fect_te->fetchColumn();

                            $class_test = "btn btn-dark";
                            if ($marks_test != "") {
                              if ($marks_test <= 50 && $marks_test >= 0) {
                                $class_test = "btn btn-danger";
                              } else if ($marks_test <= 70 && $marks_test >= 51) {
                                $class_test = "btn btn-warning";
                              } else if ($marks_test <= 80 && $marks_test >= 71) {
                                $class_test = "btn btn-secondary";
                              } else if ($marks_test <= 90 && $marks_test >= 81) {
                                $class_test = "btn btn-success";
                              } else if ($marks_test <= 100 && $marks_test >= 91) {
                                $class_test = "btn btn-primary";
                              }
                            }
                          ?>

                            <h4 id="<?php echo $class_id_te; ?>" name="test" data-bs-toggle="modal" data-bs-target="#testAttachModal" style="margin:5px; padding: 5px;position:relative;" onclick="document.getElementById('testId').value='<?php echo $class_id_te; ?>';" class="btnFlip testFiles text-dark"><span class="legend-indicator bg-danger"></span>
                              <span style="font-weight:bold; width:5%; text-align:center; padding:5px; border-radius: 5px; color: white;" class="badge<?php echo $class_test; ?>"><?php echo $marks_test; ?></span> -
                              <a style="color:black; font-weight:bold;"><?php echo $class_name_fect_tes ?></a>
                              <span class="tooltip-text" style="white-space: nowrap;"><?php echo $inData; ?></span>
                            </h4>

                          <?php }
                          ?>
                        </td>
                      </div>
                    </div>
                    <hr>
                  <?php
                  } ?>


            <?php }
              }
            }
            ?>
          </div>
          <div id="chartContainer" class="text-dark d-flex row"></div>
          <!-- End Col -->
        </div>
        <!-- End Row -->


      </div>


    </div>
    <!-- End Card -->
  </div>

</div>








<div class="modal fade" id="subchecklistcheck" tabindex="-1" role="dialog" aria-labelledby="checknamesub" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-success" id="checknamesub"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo BASE_URL; ?>includes/Pages/addsubCheckList.php" method="POST">
          <input type="hidden" name="checkId" id="checkID" />
          <input type="hidden" name="studentId" value="<?php echo $fetchuser_id; ?>" />
          <input type="hidden" name="ctpId" value="<?php echo $std_course1; ?>" />
          <table class="table table-striped table-bordered">
            <thead class="bg-dark">
              <th class="text-light"><input type="checkbox" name="checksub"></th>
              <th class="text-light">Name</th>
            </thead>
            <tbody id="subCheckListId1">
            </tbody>
          </table>
          <input type="submit" value="Submit" id="addAllCheckList" class="btn btn-success" name="checkSub" />
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="acadmicClassModal" tabindex="-1" role="dialog" aria-labelledby="checknamesub" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-success" id="">Academic</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Nav -->
        <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="allPhase-tab" href="#allPhase" data-bs-toggle="pill" data-bs-target="#allPhase" role="tab" aria-controls="allPhase" aria-selected="true">
              <div class="d-flex align-items-center">
                All
              </div>
            </a>
          </li>
          <?php
          $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
          while ($phaseData = $phaseQ->fetch()) {
            $totalClass = 0;
            $phase_ID = $phaseData['id'];
            $queryTotalAcaClass = $connect->query("SELECT count(*) FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
            $totalClass3 = $queryTotalAcaClass->fetchColumn();
            $totalClass = $totalClass + $totalClass3;
            if ($totalClass > 0) {
          ?>
              <li class="nav-item">
                <a class="nav-link" id="DrivingPhase-tab" href="#AcaDrivingPhase<?php echo $phaseData['id']; ?>" data-bs-toggle="pill" data-bs-target="#AcaDrivingPhase<?php echo $phaseData['id']; ?>" role="tab" aria-controls="DrivingPhase" aria-selected="false">
                  <div class="d-flex align-items-center">
                    <?php echo $phaseData['phasename'] ?>
                  </div>
                </a>
              </li>
          <?php
            }
          }
          ?>
        </ul>
        <!-- End Nav -->

        <!-- Tab Content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="allPhase" role="tabpanel" aria-labelledby="allPhase-tab">
            <input class="form-control" type="text" id="AcademicAllClassSearch" onkeyup="AcademicAllClassSearch(this)" placeholder="Search for Class.." title="Type in a name" data-tableid="AcademicAllClassTable" />
            <?php
            $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
            while ($phaseData = $phaseQ->fetch()) {
              $totalClass = 0;
              $phase_ID = $phaseData['id'];
              $queryTotalAcaClass = $connect->query("SELECT count(*) FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
              $totalClass3 = $queryTotalAcaClass->fetchColumn();
              $totalClass = $totalClass + $totalClass3;
              if ($totalClass > 0) {
            ?>
                <div style="display: flex;margin: 10px;"><span class="legend-indicator" style="background-color:<?php echo $phaseData['color']; ?>;height: 20px;width: 20px;margin: 3px;"></span>
                  <p style="color:<?php echo $phaseData['color']; ?>;font-size: large;font-weight: bold;"><?php echo $phaseData['phasename']; ?></p>
                </div>
                <?php
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
                  <table class="table table-bordered" id="AcademicAllClassTable">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">Class</th>
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
                    <tbody>
                      <tr>
                        <td>
                          <img class=" avatar avatar-img avatar-circle" src="<?php echo BASE_URL; ?>assets/img/Class-Student.png" height='20px' width='20px' alt="" style="border-radius:0%;" />
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
                      $selClassQ = $connect->query("SELECT * FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                      while ($selClassData = $selClassQ->fetch()) {
                        $academicId = $selClassData['id'];
                      ?>
                        <tr>
                          <td><?php echo $selClassData['shortacademic']; ?></td>
                          <?php
                          $stuName = 0;
                          while ($stuName < count($stuIDArr)) {
                            $stuId = $stuIDArr[$stuName];
                            $eme_id1 = $connect->query("SELECT count(*) FROM acedemic_stu WHERE acedemic_id='$academicId' AND std_id = '$stuId' AND permission = '1'");
                            if ($eme_id1->fetchColumn() > 0) {
                              $bgColor1 = "#00C9A7";
                            } else {
                              $bgColor1 = "#ED4C78";
                            }
                          ?>
                            <td style="background-color: <?php echo $bgColor1 ?>;"></td>
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
                ?>
            <?php
              }
            }
            ?>
          </div>

          <?php
          $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
          while ($phaseData = $phaseQ->fetch()) {
            $totalClass = 0;
            $phase_ID = $phaseData['id'];
            $queryTotalAcaClass = $connect->query("SELECT count(*) FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
            $totalClass3 = $queryTotalAcaClass->fetchColumn();
            $totalClass = $totalClass + $totalClass3;
            if ($totalClass > 0) {
          ?>
              <div class="tab-pane fade" id="AcaDrivingPhase<?php echo $phaseData['id']; ?>" role="tabpanel" aria-labelledby="DrivingPhase-tab">
                <input class="form-control" type="text" id="AcademicClassSearch" onkeyup="AcademicClassSearch(this)" placeholder="Search for Class.." title="Type in a name" data-tableid="AcademicClassTable<?php echo $phaseData['id']; ?>" />
                <?php
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
                  <table class="table table-bordered" id="AcademicClassTable<?php echo $phaseData['id']; ?>">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">Class</th>
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
                    <tbody>
                      <tr>
                        <td>
                          <img class=" avatar avatar-img avatar-circle" src="<?php echo BASE_URL; ?>assets/img/Class-Student.png" height='20px' width='20px' alt="" style="border-radius:0%;" />
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
                      $selClassQ = $connect->query("SELECT * FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                      while ($selClassData = $selClassQ->fetch()) {
                        $academicId = $selClassData['id'];
                      ?>
                        <tr>
                          <td><?php echo $selClassData['shortacademic']; ?></td>
                          <?php
                          $stuName = 0;
                          while ($stuName < count($stuIDArr)) {
                            $stuId = $stuIDArr[$stuName];
                            $eme_id1 = $connect->query("SELECT count(*) FROM acedemic_stu WHERE acedemic_id='$academicId' AND std_id = '$stuId' AND permission = '1'");
                            if ($eme_id1->fetchColumn() > 0) {
                              $bgColor1 = "#00C9A7";
                            } else {
                              $bgColor1 = "#ED4C78";
                            }
                          ?>
                            <td style="background-color: <?php echo $bgColor1 ?>;"></td>
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
                ?>
              </div>
          <?php
            }
          }
          ?>
        </div>
        <!-- End Tab Content -->
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="MissingGradesheetModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Header with instructor information -->
        <h5 class="modal-title" id="exampleModalCenterTitle">
          <img class="avatar avatar-sm avatar-circle avatar-img" id="modal-avatar" src="" alt="Image Description">
          <span class="modal-instructor-name" style="margin: 5px;"></span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Body content to display classes -->
        <div class="row" id="modal-classes" style="justify-content: center;">
          <!-- Classes will be loaded here -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Modal -->

<div class="modal fade" id="testClassModal" tabindex="-1" role="dialog" aria-labelledby="checknamesub" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-success" id="">Test</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input class="form-control" type="text" id="TestClassSearch" onkeyup="TestClassSearch()" placeholder="Search for Class.." title="Type in a name">
        <!-- <h2>Academic</h2> -->
        <?php
        $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
        while ($phaseData = $phaseQ->fetch()) {
          $totalClass = 0;
          $phase_ID = $phaseData['id'];
          $queryTotalTestClass = $connect->query("SELECT count(*) FROM test WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
          $totalClass4 = $queryTotalTestClass->fetchColumn();
          $totalClass = $totalClass + $totalClass4;
          if ($totalClass > 0) {
        ?>
            <ul class="list-inline">
              <li class="list-inline-item d-inline-flex align-items-center" id="seephaseclasses" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="margin:10px; cursor: pointer;">
                <span class="legend-indicator" style="background-color:<?php echo $phaseData['color']; ?>;height:20px;width:20px;"></span><span style="color:<?php echo $phaseData['color']; ?>;font-size:large;font-weight: bold;"><?php echo $phaseData['phasename']; ?></span>
              </li>
              <?php
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
                <table class="table table-bordered" id="TestClassTable">
                  <thead class="bg-dark">
                    <tr>
                      <th class="text-white">Class</th>
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
                  <tbody>
                    <tr>
                      <td>
                        <img class=" avatar avatar-img avatar-circle" src="<?php echo BASE_URL; ?>assets/img/Class-Student.png" height='20px' width='20px' alt="" style="border-radius:0%;" />
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
                    $selClassQ = $connect->query("SELECT * FROM test WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                    while ($selClassData = $selClassQ->fetch()) {
                      $testId = $selClassData['id'];
                    ?>
                      <tr>
                        <td><?php echo $selClassData['shorttest']; ?></td>
                        <?php
                        $stuName = 0;
                        while ($stuName < count($stuIDArr)) {
                          $stuId = $stuIDArr[$stuName];
                          $eme_id1 = $connect->query("SELECT count(*) FROM test_data WHERE test_id='$testId' AND student_id = '$stuId'");
                          if ($eme_id1->fetchColumn() > 0) {
                            $bgColor1 = "#00C9A7";
                          } else {
                            $bgColor1 = "#ED4C78";
                          }
                        ?>
                          <td style="background-color: <?php echo $bgColor1 ?>;"></td>
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
              ?>
            </ul>
        <?php }
        } ?>
      </div>
    </div>
  </div>
</div>

<?php
$percentageCLass = "SELECT * FROM `percentage` WHERE percentage > 0 ORDER BY CAST(percentage AS SIGNED) ASC";
$percentagestatement = $connect->prepare($percentageCLass);
$percentagestatement->execute();
$allpercentage = $percentagestatement->fetchAll();
$color = [];
foreach ($allpercentage as $cdt) {
  $color[] = $cdt['color'];
}
$colors = $color;

$data = [];
$qclass = "SELECT * FROM `test`  WHERE ctp='$std_course1'";
$classstatement = $connect->prepare($qclass);
$classstatement->execute();
foreach ($classstatement->fetchAll() as $class) {
  $test_id = $class['id'];
  // dynamic percentage
  $qpercentage = "SELECT * FROM `percentage` where percentage > 0 ORDER BY CAST(percentage AS SIGNED) ASC";
  $qperstatement = $connect->prepare($qpercentage);
  $qperstatement->execute();
  $total = 0;
  $percentagelist = $qperstatement->fetchAll();
  $arr = [];
  foreach ($percentagelist as $k => $qper) {
    if ($k > 0) {
      $from = $percentagelist[$k - 1]['percentage'] + 1;
    } else {
      $from = 0;
    }
    $to = $qper['percentage'];
    // data for A grade students
    $qmark = "SELECT td.*, u.nickname, u.file_name
    FROM `test_data` AS td
    LEFT JOIN `users` AS u ON td.student_id = u.id
    LEFT JOIN `newcourse` AS nc ON u.id = nc.StudentNames
    WHERE td.marks BETWEEN " . $from . " AND " . $to . " 
    AND td.test_id = :test_id
    AND nc.CourseCode = '$CourseCode11'
    AND nc.CourseName = '$std_course1'";
    $markstatement = $connect->prepare($qmark);
    $markstatement->bindParam(':test_id', $test_id, PDO::PARAM_INT);
    $markstatement->execute();
    $letters = explode('-', $qper['percentagetype']);
    $firstletter = trim($letters[0]);
    $arr[] = $firstletter;
    $data[$class['shorttest']][$firstletter]['students_list'] = $markstatement->fetchAll();
    $data[$class['shorttest']][$firstletter]['total_marks'] = array_sum(array_column($data[$class['shorttest']][$firstletter]['students_list'], 'marks'));
    $data[$class['shorttest']][$firstletter]['students'] = $markstatement->rowCount();
    $total += $data[$class['shorttest']][$firstletter]['students'];
  }


  //  percentage calculation
  $data[$class['shorttest']]['total_student'] = $total;
  if ($data[$class['shorttest']]['total_student'] != 0) {
    foreach ($arr as $a) {
      $data[$class['shorttest']][$a]['students_percentage'] = ($data[$class['shorttest']][$a]['students'] / $data[$class['shorttest']]['total_student']) * 100;
    }
  } else {
    foreach ($arr as $a) {
      $data[$class['shorttest']][$a]['students_percentage'] = 0;
    }
  }

  foreach ($arr as $a) {
    $data[$class['shorttest']]['all_grade_percentage'][$a] = $data[$class['shorttest']][$a]['students_percentage'];
  }
}
?>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/apexcharts.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
  function StudentAllSearch() {
    var input, filter, students, student, userName, i;
    input = document.getElementById('SearchAllStudent');
    filter = input.value.toUpperCase();
    students = document.querySelectorAll('.fetchClassOfStu');

    for (i = 0; i < students.length; i++) {
      student = students[i].querySelector('#study');
      userName = student.querySelector('span').innerText.toUpperCase(); // Select the span content

      if (userName.includes(filter)) {
        students[i].style.display = ""; // Show the student if it matches the search
      } else {
        students[i].style.display = "none"; // Hide the student if it doesn't match the search
      }
    }
  }
</script>

<script>
  var chartWidth = 300;
  // Function to generate a pie chart for a class
  function generatePieChart(className, grade_marks, grades, classData, colors) {
    // console.log(classData);
    var chartOptions = {
      series: grade_marks, // Use the grade_marks data for the pie chart
      chart: {
        width: chartWidth,
        type: 'pie',
      },
      labels: grades, // Use student names for chart segments
      title: {
        text: className,
        align: 'center',
        style: {
          color: 'grey', // You can replace 'red' with the color you want
        },
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200,
          },
          legend: {
            position: 'bottom',

          },
        },
      }],
      tooltip: {
        enabled: true,
        custom: function({
          series,
          seriesIndex,
          dataPointIndex,
          w
        }) {
          var label = w.globals.labels[seriesIndex];
          var students = classData[label]['students_list']; // Get the student name
          console.warn(students);
          var tooltipHTML = `<div class="custom-tooltip row bg-white d-flex p-2">`;
          for (var l = 0; l < students.length; l++) {
            tooltipHTML += `<div class="col-auto">
                                <span class="text-dark"><img src="upload/${students[l]['file_name']}" alt="Student Image" width="30" height="30" style="border-radius:60px;"></span><br>
                                <span class="text-dark">${students[l]['nickname']}</span><br>
                                <span class="text-dark">${students[l]['marks']}</span><br>
                            </div>`;
          }
          tooltipHTML += `</div>`;
          return tooltipHTML;
        },
      },
      colors: colors,
    };

    var chartContainer = document.createElement('div');
    chartContainer.classList.add('col-3');
    document.getElementById('chartContainer').appendChild(chartContainer);

    var chart = new ApexCharts(chartContainer, chartOptions);
    chart.render();
  }

  // Generate pie charts for each class in the data array
  <?php
  foreach ($data as $k => $dchart) {
    if (array_sum(array_values($dchart['all_grade_percentage'])) != 0) {
  ?>
      generatePieChart('<?php echo $k; ?>', <?php echo json_encode(array_values($dchart['all_grade_percentage'])); ?>, <?php echo json_encode(array_keys($dchart['all_grade_percentage'])); ?>, <?php echo json_encode($data[$k]); ?>, <?php echo json_encode($colors) ?>);
  <?php
    }
  }
  ?>
</script>

<!-- quiz chart -->

<?php
$percentageCLass = "SELECT * FROM `percentage` WHERE percentage > 0 ORDER BY CAST(percentage AS SIGNED) ASC";
$percentagestatement = $connect->prepare($percentageCLass);
$percentagestatement->execute();
$allpercentage = $percentagestatement->fetchAll();
$color = [];
foreach ($allpercentage as $cdt) {
  $color[] = $cdt['color'];
}
$colors = $color;

$data = [];
$qclass = "SELECT * FROM `quiz`  WHERE ctp='$std_course1'";
$classstatement = $connect->prepare($qclass);
$classstatement->execute();
foreach ($classstatement->fetchAll() as $class) {
  $test_id = $class['id'];
  // dynamic percentage
  $qpercentage = "SELECT * FROM `percentage` where percentage > 0 ORDER BY CAST(percentage AS SIGNED) ASC";
  $qperstatement = $connect->prepare($qpercentage);
  $qperstatement->execute();
  $total = 0;
  $percentagelist = $qperstatement->fetchAll();
  $arr = [];
  foreach ($percentagelist as $k => $qper) {
    if ($k > 0) {
      $from = $percentagelist[$k - 1]['percentage'] + 1;
    } else {
      $from = 0;
    }
    $to = $qper['percentage'];
    // data for A grade students
    $qmark = "SELECT td.*, u.nickname, u.file_name
          FROM `quiz_marks` AS td
          LEFT JOIN `users` AS u ON td.student_id = u.id
          LEFT JOIN `newcourse` AS nc ON u.id = nc.StudentNames
          WHERE td.marks BETWEEN " . $from . " AND " . $to . " 
          AND td.quiz_id = :quiz_id
          AND nc.CourseCode = '$CourseCode11'
          AND nc.CourseName = '$std_course1'";
    $markstatement = $connect->prepare($qmark);
    $markstatement->bindParam(':quiz_id', $test_id, PDO::PARAM_INT);
    $markstatement->execute();
    $letters = explode('-', $qper['percentagetype']);
    $firstletter = trim($letters[0]);
    $arr[] = $firstletter;
    $data[$class['quiz']][$firstletter]['students_list'] = $markstatement->fetchAll();
    $data[$class['quiz']][$firstletter]['total_marks'] = array_sum(array_column($data[$class['quiz']][$firstletter]['students_list'], 'marks'));
    $data[$class['quiz']][$firstletter]['students'] = $markstatement->rowCount();
    $total += $data[$class['quiz']][$firstletter]['students'];
  }


  //  percentage calculation
  $data[$class['quiz']]['total_student'] = $total;
  if ($data[$class['quiz']]['total_student'] != 0) {
    foreach ($arr as $a) {
      $data[$class['quiz']][$a]['students_percentage'] = ($data[$class['quiz']][$a]['students'] / $data[$class['quiz']]['total_student']) * 100;
    }
  } else {
    foreach ($arr as $a) {
      $data[$class['quiz']][$a]['students_percentage'] = 0;
    }
  }

  foreach ($arr as $a) {
    $data[$class['quiz']]['all_grade_percentage'][$a] = $data[$class['quiz']][$a]['students_percentage'];
  }
}
?>

<script>
  var chartWidth = 300;
  // Function to generate a pie chart for a class
  function generatePieChart(className, grade_marks, grades, classData, colors) {
    // console.log(classData);
    var chartOptions = {
      series: grade_marks, // Use the grade_marks data for the pie chart
      chart: {
        width: chartWidth,
        type: 'pie',
      },
      labels: grades, // Use student names for chart segments
      title: {
        text: className,
        align: 'center',
        style: {
          color: 'grey', // You can replace 'red' with the color you want
        },
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200,
          },
          legend: {
            position: 'bottom',
          },
        },
      }],
      tooltip: {
        enabled: true,
        custom: function({
          series,
          seriesIndex,
          dataPointIndex,
          w
        }) {
          var label = w.globals.labels[seriesIndex];
          var students = classData[label]['students_list']; // Get the student name
          console.warn(students);
          var tooltipHTML = `<div class="custom-tooltip row bg-white d-flex p-2">`;
          for (var l = 0; l < students.length; l++) {
            tooltipHTML += `<div class="col-auto">
                                <span class="text-dark"><img src="upload/${students[l]['file_name']}" alt="Student Image" width="30" height="30" style="border-radius:60px;"></span><br>
                                 <span class="text-dark m-1">${students[l]['nickname']}</span><br>
                                <span class="text-dark m-1">${students[l]['marks']}</span><br>
                            </div>`;
          }
          tooltipHTML += `</div>`;
          return tooltipHTML;
        },
      },
      colors: colors,
    };

    var chartContainer = document.createElement('div');
    chartContainer.classList.add('col-3');
    document.getElementById('quizChartContainer').appendChild(chartContainer);

    var chart = new ApexCharts(chartContainer, chartOptions);
    chart.render();
  }

  // Generate pie charts for each class in the data array
  <?php
  foreach ($data as $k => $dchart) {
    if (array_sum(array_values($dchart['all_grade_percentage'])) != 0) {
  ?>
      generatePieChart('<?php echo $k; ?>', <?php echo json_encode(array_values($dchart['all_grade_percentage'])); ?>, <?php echo json_encode(array_keys($dchart['all_grade_percentage'])); ?>, <?php echo json_encode($data[$k]); ?>, <?php echo json_encode($colors) ?>);
  <?php
    }
  }
  ?>
</script>

<!-- end quiz chart -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputclasses');
    const cardList = document.getElementById('searchClasses');
    const cards = cardList.querySelectorAll('.aaayyy');

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.toLowerCase();

      cards.forEach(card => {
        const ayushiElement = card.querySelector('.badge');
        const cardContent = ayushiElement.textContent.toLowerCase();

        if (cardContent.includes(searchTerm)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  $(".student-image").hover(function() {
    $(this).css("position", "relative");
    $(this).css("z-index", "9");
  });
  $(".student-image").mouseout(function() {
    $(this).css("position", "");
    $(this).css("z-index", "");
  });
</script>

<script>
  // $(".student-profile").on("click", function() {
  $(document).on('click', '.student-profile', function() {
    // alert("hello");
    const percent = $(this).data("percent");
    const courseCode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");
    const totalClass = $(this).data("totalclass");
    const phaseId = $(this).data("phaseid");
    const ctpId = $(this).data("ctp");
    $.ajax({
      type: "POST", // You can also use GET if needed
      url: "<?php echo BASE_URL; ?>includes/Pages/fetchAllChartData.php",
      data: {
        percent: percent,
        courseCode: courseCode,
        courseName: courseName,
        totalClass: totalClass,
        phaseId: phaseId,
        ctpId: ctpId
      },
      success: function(response) {
        // Handle the response from the PHP script if needed
        // alert(response);
        $(".stuProProfile").empty();
        $(".stuProProfile").html(response);
        // window.location.reload();
      }
    });
  });

  // $(".fetchClassOfStu").on("click",function(){
  $(document).on("mouseover", ".fetchClassOfStu", function() {
    const ctpId = $(this).data("ctpid");
    const phaseId = $(this).data("phaseid");
    const stuId = $(this).data("stuid");
    $.ajax({
      type: "POST", // You can also use GET if needed
      url: "<?php echo BASE_URL; ?>includes/Pages/fetchAllChartData.php",
      data: {
        classFetch: "classHover",
        stuId: stuId,
        phaseId: phaseId,
        ctpId: ctpId
      },
      success: function(response) {
        // Handle the response from the PHP script if needed
        // alert(response);
        $(".classChartData").show();
        $(".classChartData").empty();
        $(".classChartData").html(response);
        // window.location.reload();
      }
    });
  });

  // $(document).on("mouseout", ".fetchClassOfStu", function() {
  //   $(".classChartData").hide();
  // });
</script>

<script>
  function AcademicClassSearch(inputElement) {
    var input, filter, table, tr, td, i, txtValue;
    // input = document.getElementById('AcademicClassSearch');
    var tableId = inputElement.getAttribute("data-tableid");
    filter = inputElement.value.toUpperCase();
    table = document.getElementById(tableId);
    tr = table.getElementsByTagName('tr');

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[0]; // Assuming class names are in the first column

      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = ''; // Show the row if the class name matches the search
        } else {
          tr[i].style.display = 'none'; // Hide the row if it doesn't match the search
        }
      }
    }
  }
</script>

<script>
  function TestClassSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('TestClassSearch');
    filter = input.value.toUpperCase();
    table = document.getElementById('TestClassTable');
    tr = table.getElementsByTagName('tr');

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[0]; // Assuming class names are in the first column

      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = ''; // Show the row if the class name matches the search
        } else {
          tr[i].style.display = 'none'; // Hide the row if it doesn't match the search
        }
      }
    }
  }
</script>

<script>
  function AcademicAllClassSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('AcademicAllClassSearch');
    filter = input.value.toUpperCase();
    table = document.getElementById('AcademicAllClassTable');
    tr = table.getElementsByTagName('tr');

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[0]; // Assuming class names are in the first column

      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = ''; // Show the row if the class name matches the search
        } else {
          tr[i].style.display = 'none'; // Hide the row if it doesn't match the search
        }
      }
    }
  }
</script>

<script>
  $(document).ready(function() {
    // ProgressBarFetching
    var ctpId = <?php echo $std_course1; ?>;
    var courseCode = <?php echo $course_Code; ?>;
    var courseName = <?php echo $course_Name; ?>;
    var courseId = <?php echo $c_id; ?>;
    $.ajax({
      type: "POST", // You can also use GET if needed
      url: "<?php echo BASE_URL; ?>includes/Pages/fetchAllProgressBar.php",
      data: {
        courseCode: courseCode,
        courseName: courseName,
        ctpId: ctpId,
        courseId: courseId,

      },
      success: function(response) {
        // alert(response);
        $("#ProgressBarFetching").empty();
        $(".loadingProgress").css("display", "none");
        $("#ProgressBarFetching").html(response)
      }
    });
  })
</script>

<script>
  $(document).ready(function() {
    $("#generateReportBtn").on("click", function(event) {
      event.preventDefault();
      $("#progressMessage").html('Generating report...');

      // Make an AJAX request to generate the report
      $.ajax({
        url: 'http://localhost:8080/latest/TOS/includes/Pages/allgenerate.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            // Use an iframe to download the file without navigating away
            $('<iframe/>', {
              id: 'hiddenDownloader',
              src: response.fileUrl,
              style: 'display:none;'
            }).appendTo('body');

            $("#progressMessage").html('Download completed.');
            alert('Report download completed.');
          } else {
            $("#progressMessage").html('Error generating report: ' + response.message);
          }
        },
        error: function(xhr, status, error) {
          $("#progressMessage").html('Error generating report: ' + (xhr.status ? 'HTTP Status ' + xhr.status : xhr.statusText));
        }
      });
    });
  });
</script>

<script>
  $(document).ready(function() {
    $(".show-more").click(function(e) {
      e.preventDefault();
      var instructorId = $(this).data('insid');

      // Fetch instructor information and populate modal header
      $.ajax({
        url: '<?php echo BASE_URL;?>includes/Pages/dashboard/fetch_inst_info.php',
        type: 'POST',
        data: { instructor_id: instructorId },
        success: function(response) {
          var data = JSON.parse(response);
          $(".modal-instructor-name").text(data.name);
          $("#modal-avatar").attr("src", data.image);
        }
      });

      // Fetch classes taught by the instructor and populate modal body
      $.ajax({
        url: '<?php echo BASE_URL;?>includes/Pages/dashboard/fetch_inst_classes.php',
        type: 'POST',
        data: { instructor_id: instructorId },
        success: function(response) {
          $("#modal-classes").html(response);
        }
      });
    });
  });
</script>


