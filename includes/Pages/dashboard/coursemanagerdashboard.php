<style>
  /* Style the options */
  .form-control option {
    background-color: #fff;
    /* Background color of options */
    color: #333;
    /* Text color of options */
  }

  /* Style the selected option */
  .form-control option:checked {
    background-color: #007bff;
    /* Background color of the selected option */
    color: #fff;
    /* Text color of the selected option */
  }
</style>

<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a class="text-success">
            <img style="height:25px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/missing.png">
            My Missing Gradsheet</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <?php $fetch_missing = "SELECT *
              FROM gradesheet
              INNER JOIN newcourse ON newcourse.StudentNames = gradesheet.user_id
              WHERE gradesheet.instructor = '$user_id'
                  AND gradesheet.over_all_grade IS NULL
                  AND newcourse.CourseName = '$std_course1'
                  AND newcourse.CourseCode = '$CourseCode11'
              ORDER BY gradesheet.id";
            $fetch_missingstatement1 = $connect->prepare($fetch_missing);
            $fetch_missingstatement1->execute();
            $fetch_missingresult1 = $fetch_missingstatement1->fetchAll();
            foreach ($fetch_missingresult1 as $row1151) {
              $table_name10 = $row1151['class'];
              $symbol_id10 = $row1151['class_id'];
              $inst_Id = $row1151['instructor'];
              $usId = $row1151['user_id'];

              if ($table_name10 == "actual") {
                $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
              } else if ($table_name10 == "sim") {
                $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
              }

              $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$usId'");
              $insD = $insQ->fetchColumn();

              $name111221 = $q11->fetchColumn();
              $q10->execute([$symbol_id10]);
              $name_class = $q10->fetchColumn();

            ?>
              <a href="<?php echo BASE_URL; ?>includes/Pages/newgradesheet.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>&std_id=<?php echo $usId; ?>" class="btn btn-danger position-relative"><?php echo $name_class; ?>

                <span class="circleig1"><?php echo $insD; ?></span>
              </a>
            <?php
            }
            ?>
            <?php $fetch_missing1 = "SELECT * FROM cloned_gradesheet WHERE instructor = '$user_id' AND over_all_grade IS NULL ORDER BY id";
            $fetch_missing1statement1 = $connect->prepare($fetch_missing1);
            $fetch_missing1statement1->execute();
            $fetch_missing1result1 = $fetch_missing1statement1->fetchAll();
            foreach ($fetch_missing1result1 as $row1152) {
              $table_name10 = $row1152['class'];
              $symbol_id10 = $row1152['class_id'];
              $inst_Id = $row1152['instructor'];
              $cl_id = $row1152['cloned_id'];
              $usId = $row1152['user_id'];
              if ($table_name10 == "actual") {
                $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
              } else if ($table_name10 == "sim") {
                $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
              }

              $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$usId'");
              $insD = $insQ->fetchColumn();

              $name111221 = $q11->fetchColumn();
              $q10->execute([$symbol_id10]);
              $name_class = $q10->fetchColumn();
              $xString4 = str_repeat("x", $cl_id);
            ?>
              <a href="<?php echo BASE_URL; ?>includes/Pages/newgradesheetcl.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>&clone_ides=<?php echo urlencode(base64_encode($cl_id)); ?>&std_id=<?php echo $usId; ?>" class="btn btn-danger position-relative"><?php echo $name_class . $xString4; ?>
                <span class="circleig1"><?php echo $insD; ?></span>
              </a>
            <?php
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





<div class="row">
  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5" data-bs-toggle="collapse">

    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body" style="margin-bottom:-50px;">
        <!-- <h2 class="text-success" style="text-align:center;">Courses Overview & file Management</h2> -->
        <h6 class="card-subtitle"><a class="text-success">
            <img style="height:25px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/overview.png">
            Courses Overview & file Management</a></h6>
        <hr class="text-success">
      </div>
      <div class="card-body bg-soft-secondary">
        <center>
          <ul class="nav nav-segment nav-pills" role="tablist">
            <?php
            $query = "SELECT * FROM newcourse GROUP BY CourseName,CourseCode";
            $statement = $connect->prepare($query);
            $statement->execute();

            if ($statement->rowCount() > 0) {
              $result = $statement->fetchAll();
              $sn = 1;
                foreach ($result as $row) {
                  //course code
                $CourseCode112 = $row['CourseCode'];
                $std_course2 = $row['CourseName'];
                //symbol and color of ctp
                $get_course_name3 = $connect->prepare("SELECT symbol,color FROM ctppage WHERE CTPid=?");
                $get_course_name3->execute([$std_course2]);
                $course_code3 = $get_course_name3->fetch();
                //student count check any missing gradhseet
                $checkStu = $connect->query("SELECT * FROM newcourse WHERE CourseName = '$std_course2' AND CourseCode='$CourseCode112'");
                $stuCount = 0;
                while ($checkStuData = $checkStu->fetch()) {
                  $stId = $checkStuData['StudentNames'];
                  $checkStu = $connect->query("SELECT count(*) FROM `gradesheet` WHERE user_id = '$stId' AND over_all_grade IS NULL ORDER BY id");
                  if ($checkStu->fetchColumn() > 0) {
                    $stuCount = 1;
                    break;
                  } else {
                    $stuCount = 0;
                  }
                }
                $nRows12=0;
              //check clearance
                $checkClearanceData = $connect->query("SELECT * FROM clearance_data WHERE ctp_id = '$std_course2'");
                //check course manager
                $nRows12 = $connect->query("select count(*) from newcourse where CourseManager='$user_id' and CourseCode='$CourseCode112' and CourseName='$std_course2'")->fetchColumn();
               //check acedmeic
                $checkAss = 0;
                $checkAss = $connect->query("SELECT count(*) FROM academicassignee WHERE instId = '$user_id' AND coursecode='$CourseCode112' and coursename='$std_course2'")->fetchColumn();
              //check phase resource file
                $checkPha = 0;
                $checkPha = $connect->query("SELECT count(*) FROM phasefilepermission WHERE instId = '$user_id' AND coursecode='$CourseCode112' and courseName='$std_course2'")->fetchColumn(); 
                $fetchPhaseDetail = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName = '$std_course2' AND courseCode = '$CourseCode112'");
               if ($nRows12>0 && $stuCount == 1 || $checkPha>0  || $checkAss>0 || $nRows12>0 && $checkClearanceData->rowCount() > 0 || $fetchPhaseDetail->rowCount() > 0 && $nRows12>0) {
                 ?>
                  <li class="nav-item" class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#demoCource<?php echo $CourseCode112 . $std_course2; ?>" aria-expanded="false" aria-controls="demoCource<?php echo $CourseCode112 . $std_course2; ?>">
                    <a style="font-size: x-large;font-weight: bold;background-color: <?php echo $course_code3['color']; ?>!important;color: white;" class="nav-link <?php echo ($sn == 1) ? 'active' : ''; ?>" id="nav-one-eg1-tab<?php echo $CourseCode112 . $std_course2; ?>" href="#nav-one-eg1<?php echo $CourseCode112 . $std_course2; ?>" data-bs-toggle="pill" data-bs-target="#nav-one-eg1<?php echo $CourseCode112 . $std_course2; ?>" role="tab" aria-controls="nav-one-eg1<?php echo $CourseCode112 . $std_course2; ?>" aria-selected="<?php echo ($sn == 1) ? 'true' : 'false'; ?>">
                      <?php echo $course_code3['symbol'] . ' - ' . $CourseCode112; ?>
                    </a>
                  </li>
                  <?php
                  $sn++;
                }
              }
            }
            ?>
          </ul>
        </center>
        <div>

          <style type="text/css">
            .accordion-button:not(.collapsed) {
              color: <?php echo $course_code3['color']; ?> !important;
            }

            .accordion-button {
              font-size: xx-large !important;
              font-weight: bold !important;
              background-color: #8c98a400 !important;
            }

            .accordion-button::after {
              width: 4rem;
              height: 4rem;
              background-size: 4rem;
              /*position: absolute;
              margin-left: 750px;*/
            }

            .accordion-button.subContainer {
              color: #00c9a7 !important;
              font-size: large !important;
              font-weight: bold !important;
              margin-left: -30px;
              margin-top: -15px;
              text-transform: uppercase;
            }

            .accordion-button.subContainer::after {
              width: 2rem;
              height: 2rem;
              background-size: 2rem;
              position: absolute;
              margin-left: 750px;
            }
          </style>
          <div class="tab-content">
            <?php
            $CourseCode112 = "";
            $std_course2 = "";
            $course_code3 = "";
            $checkPha12 = 0;
            $query11111 = "SELECT * FROM newcourse group by CourseName,CourseCode;";
            $statement111 = $connect->prepare($query11111);
            $statement111->execute();

            $sn = 1; // Reset $sn for tab content
            if ($statement111->rowCount() > 0) {
              $result = $statement111->fetchAll();
              foreach ($result as $row11111) {
                $stuIDArr = array();
                $stuIDArrP = 0;
                $CourseCode112 = $row11111['CourseCode'];
                $std_course2 = $row11111['CourseName'];
                $get_course_name3 = $connect->prepare("SELECT symbol,color FROM ctppage WHERE CTPid=?");
                $get_course_name3->execute([$std_course2]);
                $course_code3 = $get_course_name3->fetch();
                //student count check any missing gradhseet
                $stId=[];
                $checkStu = $connect->query("SELECT * FROM newcourse WHERE CourseName = '$std_course2' AND CourseCode='$CourseCode112'");
                $stuCount = 0;
                while ($checkStuData = $checkStu->fetch()) {
                  $stId = $checkStuData['StudentNames'];
                  $checkStu = $connect->query("SELECT count(*) FROM `gradesheet` WHERE user_id = '$stId' AND over_all_grade IS NULL ORDER BY id");
                  if ($checkStu->fetchColumn() > 0) {
                    $stuCount = 1;
                    break;
                  } else {
                    $stuCount = 0;
                  }
                }
                $nRows12=0;
              //check clearance
                $checkClearanceData = $connect->query("SELECT * FROM clearance_data WHERE ctp_id = '$std_course2'");
                //check course manager
                $nRows12 = $connect->query("select count(*) from newcourse where CourseManager='$user_id' and CourseCode='$CourseCode112' and CourseName='$std_course2'")->fetchColumn();
               //check acedmeic
                $checkAss = 0;
                $checkAss = $connect->query("SELECT count(*) FROM academicassignee WHERE instId = '$user_id' AND coursecode='$CourseCode112' and coursename='$std_course2'")->fetchColumn();
              //check phase resource file
                $checkPha = 0;
                $checkPha = $connect->query("SELECT count(*) FROM phasefilepermission WHERE instId = '$user_id' AND coursecode='$CourseCode112' and courseName='$std_course2'")->fetchColumn(); 
                $fetchPhaseDetail = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName = '$std_course2' AND courseCode = '$CourseCode112'");
               if ($nRows12>0 && $stuCount == 1 || $checkPha>0  || $checkAss>0 || $nRows12>0 && $checkClearanceData->rowCount() > 0 || $fetchPhaseDetail->rowCount() > 0 && $nRows12>0) {
                   $get_course_name3 = $connect->prepare("SELECT symbol,color FROM ctppage WHERE CTPid=?");
                  $get_course_name3->execute([$std_course2]);
                  $course_code3 = $get_course_name3->fetch();
            ?>



                  <div class="tab-pane fade collapse <?php echo ($sn == 1) ? 'show active' : ''; ?>" id="nav-one-eg1<?php echo $CourseCode112 . $std_course2; ?>" role="tabpanel" aria-labelledby="nav-one-eg1-tab<?php echo $CourseCode112 . $std_course2; ?>">
                   
                    <h6 class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#demoCource<?php echo $CourseCode112 . $std_course2; ?>" aria-expanded="false" aria-controls="demoCource<?php echo $CourseCode112 . $std_course2; ?>" style="cursor: pointer;" title="Expand/Collapes" style=""><?php echo $course_code3['symbol'] . ' - ' . $CourseCode112; ?></h6>

                      <hr style="color: <?php echo $course_code3['color']; ?>!important;margin: 10px;">
                      <div class="container-fluid collapse" id="demoCource<?php echo $CourseCode112 . $std_course2; ?>">
                       <?php
                              $CourseCode1121 = $CourseCode112;
                              $std_course21 = $std_course2;
                              include("./resourcePhaseFile.php");
                              ?>
                              <?php include("./academicPhaseFile.php"); ?>
                      <?php
                        
                       if ($nRows12>0 && $stuCount == 1) {
                        ?>
                        <!-- <div class="container" id="demoCource"> -->
                        <div class="row mb-2 aaaaa">
                          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
                            <div class="card-body">
                              <h6 class="accordion-button collapsed subContainer text-success" role="button" data-bs-toggle="collapse" data-bs-target="#demoMissing" aria-expanded="false" aria-controls="demoMissing" title="Expand">
                                <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/missing.png">
                                All Missing Gradesheet
                              </h6>
                              <hr style="margin:10px; margin-top:-5px;">
                              <!-- <hr class="text-dark"> -->
                             
                              <div class="col-12 collapse" id="demoMissing">
                                <?php
                                $query101 = "SELECT * FROM newcourse where CourseName='$std_course2' and CourseCode='$CourseCode112'";
                                $statement101 = $connect->prepare($query101);
                                $statement101->execute();
                                if ($statement101->rowCount() > 0) {
                                  $result101 = $statement101->fetchAll();
                                  foreach ($result101 as $row101) {
                                    $s_tid = $row101['StudentNames'];

                                    $sql143 = "SELECT count(*) FROM `gradesheet` WHERE user_id='$s_tid' AND over_all_grade IS NULL ORDER BY id";
                                    $result143 = $connect->prepare($sql143);
                                    $result143->execute();
                                    $number_of_rows143 = $result143->fetchColumn();
                                    if ($number_of_rows143 > 0) {
                                      $get_course_name = $connect->prepare("SELECT file_name,nickname FROM users WHERE id=?");
                                      $get_course_name->execute([$s_tid]);
                                      $get_name_st_name11 = $get_course_name->fetch();
                                      $get_image_name=$get_name_st_name11['file_name'];
                                      $get_name_st_name=$get_name_st_name11['nickname'];
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
                                      <div class="row mb-1">
                                        <div class="col-2">
                                          <div style="margin-bottom:30px; display:grid;">
                                            <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">
                                            <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                                          </div>
                                        </div>
                                        <div class="col-10" style="display: flex;margin-left: 60px;margin-top: -100px;">

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
                                            <a href="<?php echo BASE_URL; ?>includes/Pages/newgradesheet.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>&std_id=<?php echo $s_tid; ?>" style="margin-right: 10px; width:max-content; height: fit-content;" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>" class="btn btn-danger position-relative"><?php echo $name_class; ?>

                                              <span class="circleig1"><?php echo $insD; ?></span>
                                            </a>
                                          <?php
                                          }
                                          ?>
                                        </div>
                                      </div>

                                <?php }
                                  }
                                } ?>
                              </div>
                            </div>
                          </div>
                          <!-- End Col -->
                        </div>
                        <hr style="margin:0px;">
                      <?php } ?>
                      <?php
                      $cl = 0;
                    
                      if ($nRows12>0 && $checkClearanceData->rowCount() > 0) {
                        $cl = 1;
                      ?>
                        <div class="row mb-2 bbbbbbbb">
                          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
                            <div class="card-body">
                              <h6 class="accordion-button collapsed subContainer text-success" role="button" data-bs-toggle="collapse" data-bs-target="#demoClearance" aria-expanded="false" aria-controls="demoClearance" title="Expand">
                                <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Clearence_Log.png">
                                Clearanace Log
                              </h6>
                              <hr style="margin:10px;margin-top: -5px;">
                              <!-- <hr class="text-dark"> -->
                              <div class="col-12 collapse" id="demoClearance">
                                <table class="table table-bordered">
                                  <thead class="bg-dark">
                                    <tr>
                                      <th class="text-light">item</th>
                                      <?php
                                      // AND StudentNames = '29'
                                      $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$CourseCode112' AND CourseName = '$std_course2'");
                                      while ($selecAllUserData = $selecAllUser->fetch()) {
                                        $uID = $selecAllUserData['StudentNames'];
                                        $usersQ = $connect->query("SELECT * FROM users WHERE id = '$uID'");
                                        while ($usersQData = $usersQ->fetch()) {
                                          if (!in_array($usersQData['id'], $stuIDArr)) {
                                            $stuIDArr[$stuIDArrP] = $usersQData['id'];
                                            $stuIDArrP++;
                                          }
                                      ?>
                                          <th class="text-light text-center"><?php echo $usersQData['nickname']; ?></th>
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
                                          <img class=" avatar avatar-img avatar-circle" src="<?php echo $img; ?>" height='20px' width='20px' alt="<?php echo $std_course1 ?>">
                                        </td>
                                      <?php $stuName++;
                                      } ?>
                                    </tr>
                                    <?php
                                    $eme_id = "SELECT * FROM clearance_data WHERE ctp_id = '$std_course2'";
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
                                  </tbody>
                                  </thead>
                                </table>
                              </div>
                            </div>
                          </div>
                          <!-- End Col -->
                        </div>
                        <hr style="margin:0px;">
                      <?php } ?>

                      <?php
                      $fetchPhaseDetail = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName = '$std_course2' AND courseCode = '$CourseCode112'");
                      if ($fetchPhaseDetail->rowCount() > 0 && $nRows12>0) {
                      ?>
                        <div class="row mb-2">
                          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
                            <div class="card-body">
                              <h6 class="accordion-button collapsed subContainer text-success" role="button" data-bs-toggle="collapse" data-bs-target="#demoPhase" aria-expanded="false" aria-controls="demoPhase" title="Expand">
                                <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/phaseM.png"> &nbsp;&nbsp;Phase Manager's
                              </h6>
                              <hr style="margin: 10px;margin-top: -5px;">
                              <!-- <hr class="text-dark"> -->
                              <div class="row collapse" id="demoPhase">
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
                                  <div class="col-md-3 mb-1">
                                    <span style="background-color:<?php echo $PhaseColor; ?>;font-size: large;" class="badge rounded-pill"><?php echo $phaseData['phasename']; ?></span> -
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
                <?php
                  $sn++;
                }
              }
            }
           ?>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>


<?php
$sql1 = "SELECT SUM(cnt) as total_count
 FROM (
     SELECT COUNT(*) as cnt
     FROM examname AS en
     INNER JOIN roles AS r ON en.examFor = r.id
     WHERE r.roles = '$role' AND CURDATE() BETWEEN en.dates AND en.end_date
     
     UNION ALL
     
     SELECT COUNT(*) as cnt
     FROM examname
     WHERE examFor = 'par' AND CURDATE() BETWEEN dates AND end_date
     
     UNION ALL
     
     SELECT COUNT(*) as cnt
     FROM examname
     WHERE examFor = 'course' AND CURDATE() BETWEEN dates AND end_date
     
     UNION ALL
     
     SELECT COUNT(*) as cnt
     FROM examname
     WHERE examFor = 'everyone' AND CURDATE() BETWEEN dates AND end_date
     
     UNION ALL
     
     SELECT COUNT(*) as cnt
     FROM examname
     WHERE examFor = 'dep' AND CURDATE() BETWEEN dates AND end_date
 ) AS subquery;";
$result1 = $connect->prepare($sql1);
$result1->execute();
$number_of_rows = $result1->fetchColumn();
if ($number_of_rows > 0) { ?>
  <div class="row">

    <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
      <!-- Card -->
      <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
        <div class="card-body">
          <h6 class="card-subtitle text-success">
            Today's Test
          </h6>
          <hr class="text-success">
          <?php include ROOT_PATH . 'Test/todaystest.php'; ?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<div class="modal fade" id="addcustom_number" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-success" id="exampleModalLabel">Custom Number</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/update_custom.php">
          <input type="hidden" id="custome_number_file_id" name="id">
          <input type="hidden" name="customNumberCourseCode" id="customNumberCourseCode">
          <input type="hidden" name="customNumberCourseName" id="customNumberCourseName">
          <input type="hidden" name="customNumberPhaseId" id="customNumberPhaseId">
          <input type="text" name="custom_number" class="form-control" id="custome_number">
          <hr>
          <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="assinguservalue" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">Assing User</h3>
        <div class="form-group m-1" style="float: right;position: absolute;right: 60px;">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="adduserassing.php" method="post">
          <input type="hidden" name="phaseid" id="phaseidess">
          <input type="hidden" name="courseidesss" id="courseidesss">
          <input type="hidden" name="coursename" id="coursename">
          <input type="hidden" name="filesides" id="filesides">
          <input type="hidden" name="mainid" id="mainid">
          <table class="table table-striped table-bordered" id="assingtablesdata">
            <thead class="bg-dark">
              <th class="text-light" style="width: 10%;text-align: center;"><input type="checkbox" name="checksub"></th>
              <th class="text-light">Name</th>
            </thead>
            <tbody id="assDataForm">
              <?php
              // echo $in1;
              ?>
            </tbody>
          </table>
          <hr>
          <input type="submit" class="btn btn-success" style="float:right;">
        </form>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="assingacuservalue" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">Assing User</h3>
        <div class="form-group m-1" style="float: right;position: absolute;right: 60px;">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="adduseracassing.php" method="post">
          <input type="hidden" name="phaseid" id="phaseidess1">
          <input type="hidden" name="courseidesss" id="courseidesss1">
          <input type="hidden" name="coursename" id="coursename1">
          <input type="hidden" name="filesides" id="filesides1">
          <input type="hidden" name="mainid" id="mainid1">
          <table class="table table-striped table-bordered" id="assingtablesdata">
            <thead class="bg-dark">
              <th class="text-light" style="width: 10%;text-align: center;"><input type="checkbox" name="checksub"></th>
              <th class="text-light">Name</th>
            </thead>
            <tbody id="assacDataForm">
              <?php
              // echo $in1;
              ?>
            </tbody>
          </table>
          <hr>
          <input type="submit" class="btn btn-success" style="float:right;">
        </form>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="addcustomNumberAssignee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-success" id="exampleModalLabel">Custom Number</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/update_custom.php">
          <input type="hidden" id="customeNumberFileId" name="customeNumberFileId">
          <input type="hidden" name="asigneeCustomNumberCourseCode" id="asigneeCustomNumberCourseCode">
          <input type="hidden" name="asigneeCustomNumberCourseName" id="asigneeCustomNumberCourseName">
          <input type="hidden" name="asigneeCustomNumberPhaseId" id="asigneeCustomNumberPhaseId">
          <input type="text" name="customNumberAssignee" class="form-control" id="customNumberAssignee">
          <hr>
          <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="addCustomAssignee" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="phaseCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-success" id="exampleModalLabel">Comments</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/update_custom.php">
          <input type="hidden" id="commentFileId" name="commentFileId">
          <input type="hidden" id="commentPhaseId" name="commentPhaseId">
          <input type="hidden" id="commentCourseCode" name="commentCourseCode">
          <input type="hidden" id="commentCourseName" name="commentCourseName">
          <textarea name="phaseComment" id="phaseComment" cols="60" rows="10"></textarea>
          <hr>
          <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="submitComment" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="assigneeCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-success" id="exampleModalLabel">Comments</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/update_custom.php">
          <input type="hidden" id="assigneeCommentFileId" name="assigneeCommentFileId">
          <input type="hidden" id="assigneeCommentPhaseId" name="assigneeCommentPhaseId">
          <input type="hidden" id="assigneeCommentCourseCode" name="assigneeCommentCourseCode">
          <input type="hidden" id="assigneeCommentCourseName" name="assigneeCommentCourseName">
          <textarea name="assigneeComment" id="assigneeComment" cols="60" rows="10"></textarea>
          <hr>
          <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="submitAssigneeComment" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle">
          <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/checklist.png">
          <a class="text-success">Checklist Calendar</a>
        </h6>
        <hr class="text-success">

        <div class="row">
          <div class="col-9">
            <?php include ROOT_PATH . 'includes/Pages/calendar.php'; ?>
            <div class="response"></div>
            <div class="calendar"></div>
          </div>
          <div class="col-3">
            <?php
            include ROOT_PATH . 'includes/Pages/per_checklist/event_list.php';
            ?>
          </div>
          <!-- End Col -->
        </div>

      </div>
    </div>
    <!-- End Card -->
  </div>

</div>




<div id="WorkingfilesModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="workingfilesModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="workingfilesModalTitle">Add File</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOptWorking">
          <option selected>Select File Method</option>
          <!-- <option value="addNewPage">New Page</option> -->
          <option value="addFile">Attachment</option>
          <option value="addFileLoca">Drive Link</option>
          <option value="addFileLink">Link</option>
        </select>
        <br>
        <center>
          <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">
            <div class="input-field">
              <table class="table table-bordered">
                <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                <tr>
                  <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                    <input type="file" class="form-control" name="file[]" id="" multiple />
                  </td>
              </table>
            </div><br>
            <hr>
            <center>
              <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="attachement" class="btn btn-success" />

            </center>
          </form>
        </center>
        <center>
          <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
              <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
              <table class="table table-bordered" id="table-field">
                <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                  <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" /> </td>
                </tr>
              </table>
            </div>
            <br>
            <hr>
            <center>
              <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
            </center>
          </form>
        </center>

        <center>
          <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" style="width:80%;display:none;" enctype="multipart/form-data">
            <div class="input-field">
              <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
              <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
              <table class="table table-bordered" id="table-field-link">
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required /> </td>
                  <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" /> </td>
                </tr>
              </table>
            </div>
            <br>
            <hr>
            <center>
              <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
            </center>
          </form>
        </center>
      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<div id="WorkingPhaseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Working Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include ROOT_PATH . 'includes/Pages/workingFiles.php'; ?>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div id="phaseInstModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Manage Users</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="phaseAssignFile" class="container">

        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Modal -->


<div class="modal fade" id="resourceInstRemoveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-danger text-center" style="height: 110px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Are you sure to delete <span id="remoUserPhaseName"></span>?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
      </div>
      <div class="modal-body text-center">
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#second_confrim_ctp">are you sure to delete ctp?</button> -->
        <center>
          <span>
            <img class="avatar avatar-img avatar-circle" id="phaseRemoUser" alt="" style="height: 100px;width: 100px;" />
          </span>
        </center>
        <label class="text-danger" style="font-weight: bold;">
          Note : </label><span>Removing users from the assigned list will result in a loss of permissions for files.</span>
        <form action="<?php echo BASE_URL; ?>includes/Pages/dashboard/removePhaseManager.php" method="POST">
          <input type="hidden" name="fileId" id="resFileId">
          <input type="hidden" name="phaseId" id="resPhaseId">
          <input type="hidden" name="instId" id="resInstId">
          <input type="hidden" name="courseCode" id="courseCode">
          <input type="hidden" name="courseName" id="courseName">
          <div class="modal-footer flex-center" style="margin-bottom: -30px;">
            <input type="submit" name="removeResAss" class="btn btn-outline-danger" value="Yes" />
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="WorkingAcademicModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Working Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include ROOT_PATH . 'includes/Pages/workingFiles.php'; ?>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<div id="academicInstModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Manage Users</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="AcademicAssignFile" class="container"></div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Modal -->


<div class="modal fade" id="academicInstRemoveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-danger text-center" style="height: 110px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Are you sure to delete <span id="remoUserAssigneeName"></span>?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
      </div>
      <div class="modal-body text-center">
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#second_confrim_ctp">are you sure to delete ctp?</button> -->
        <center>
          <span>
            <img class="avatar avatar-img avatar-circle" id="asssignRemoUser" alt="" style="height: 100px;width: 100px;" />
          </span>
        </center>
        <label class="text-danger" style="font-weight: bold;"><br>Note : </label><span>Removing users from the assigned list will result in a loss of permissions for files.</span>

        <form action="<?php echo BASE_URL; ?>includes/Pages/dashboard/removePhaseManager.php" method="POST">
          <input type="hidden" name="fileId" id="assigneeFileId">
          <input type="hidden" name="phaseId" id="assigneePhaseId">
          <input type="hidden" name="instId" id="assigneeInstId">
          <input type="hidden" name="courseCode" id="assigneecourseCode">
          <input type="hidden" name="courseName" id="assigneecourseName">
          <div class="modal-footer flex-center" style="margin-bottom: -30px;">
            <input type="submit" name="removeAcaAss" class="btn btn-outline-danger" value="Yes" />
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(".academicAssignee").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const coursecode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL; ?>includes/Pages/fetchAssignFile.php",
      data: {
        fileId: fileId,
        phaseId: phaseId,
        academic: "academic",
        coursecode: coursecode,
        courseName: courseName
      },
      dataType: "html",

      success: function(resultData) {
        // console.log(resultData);
        $("#AcademicAssignFile").empty();
        $("#AcademicAssignFile").html(resultData);
        // alert(resultData);
      }
    });
  });
  // $(".confirmPhaseIns").on("click", function() {
    $(document).on('click', '.confirmPhaseIns', function() {
    const fileId = $(this).data("fileid");
    const instId = $(this).data("instid");
    const phaseId = $(this).data("phaseid");
    const instName = $(this).data("instname");
    const userImg = $(this).data("userimg");
    const coursecode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");
    $("#asssignRemoUser").attr('src', userImg);

    $("#assigneeInstId").val(instId);
    $("#assigneeFileId").val(fileId);
    $("#assigneePhaseId").val(phaseId);
    $("#assigneecourseCode").val(coursecode);
    $("#assigneecourseName").val(courseName);
    $("#remoUserAssigneeName").html(instName);
  });
</script>

<script>
  $(".fetchPhaseDetail").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const instId = $(this).data("instid");
    const coursecode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL; ?>includes/Pages/fetchAssignFile.php",
      data: {
        fileId: fileId,
        phaseId: phaseId,
        phase: "phase",
        instId: instId,
        coursecode: coursecode,
        courseName: courseName
      },
      dataType: "html",

      success: function(resultData) {
        // console.log(resultData);
        $("#phaseAssignFile").empty();
        $("#phaseAssignFile").html(resultData);
      }
    });
  });

  // $(".confirmResourcePhaseIns").on("click", function() {
  $(document).on('click', '.confirmResourcePhaseIns', function() {
    const fileId = $(this).data("fileid");
    const instId = $(this).data("instid");
    const phaseId = $(this).data("phaseid");
    const instName = $(this).data("instname");
    const userImg = $(this).data("userimg");
    const coursecode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");

    $("#phaseRemoUser").attr('src', userImg);
    $("#resInstId").val(instId);
    $("#resFileId").val(fileId);
    $("#resPhaseId").val(phaseId);
    $("#courseCode").val(coursecode);
    $("#courseName").val(courseName);
    $("#remoUserPhaseName").html(instName);
  });
</script>

<script>
  $('.file_status').on('change', function() {
    var value = $(this).val();
    var id_files = $(this).data("values");
    var phase_id = $(this).data("values1");
    var userId = $(this).data("userid");
    var mainId = $(this).data("id");
    var courseCode = $(this).data("coursecode");
    var courseName = $(this).data("coursename");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/chnage_status_phase_file.php',
      data: {
        value: value,
        id_files: id_files,
        phase_id: phase_id,
        userId: userId,
        mainId: mainId,
        courseCode: courseCode,
        courseName: courseName
      },
      success: function(response) {
        // alert(response);
        window.location.reload();

      }
    });
  });
</script>

<script>
  $('.file_statusAssignee').on('change', function() {
    var value = $(this).val();
    var id_files = $(this).data("values");
    var phase_id = $(this).data("values1");
    var userId = $(this).data("userid");
    var mainId = $(this).data("id");
    var courseCode = $(this).data("coursecode");
    var courseName = $(this).data("coursename");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/chnage_status_phase_file.php',
      data: {
        value1: value,
        id_files1: id_files,
        phase_id1: phase_id,
        userId: userId,
        mainId: mainId,
        courseCode: courseCode,
        courseName: courseName
      },
      success: function(response) {
        window.location.reload();

      }
    });
  });
</script>

<script>
  $(".doneAcaClass").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const uId = $(this).data("userid");

    if ($(this).is(":checked")) {
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/assignAcademicFile.php',
        data: {
          fileId: fileId,
          phaseId: phaseId,
          uId: uId,
        },
        success: function(response) {
          window.location.reload();
        }
      });
    } else {
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/assignAcademicFile.php',
        data: {
          fileId1: fileId,
          phaseId1: phaseId,
          uId1: uId,
        },
        success: function(response) {
          window.location.reload();
        }
      });
    }

  });
</script>

<script>
  $(".assigneeFileBtn").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const coursename = $(this).data("coursename");
    const coursecode = $(this).data("coursecode");
    const mainid = $(this).data("mainid");
    $("#phaseidess").val(phaseId);
    $("#courseidesss").val(coursecode);
    $("#coursename").val(coursename);
    $("#filesides").val(fileId);
    $("#mainid").val(mainid);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchPhaseAss.php',
      data: {
        fileId: fileId,
        phaseId: phaseId,
        coursename: coursename,
        coursecode: coursecode,
      },
      success: function(response) {
        // alert(response);
        $("#assDataForm").empty();
        $("#assDataForm").html(response);
      }
    });
  });
</script>
<script>
  $(".assigneeacFileBtn").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const coursename = $(this).data("coursename");
    const coursecode = $(this).data("coursecode");
    const mainid = $(this).data("mainid");
    $("#phaseidess1").val(phaseId);
    $("#courseidesss1").val(coursecode);
    $("#coursename1").val(coursename);
    $("#filesides1").val(fileId);
    $("#mainid1").val(mainid);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchacPhaseAss.php',
      data: {
        fileId: fileId,
        phaseId: phaseId,
        coursename: coursename,
        coursecode: coursecode,
      },
      success: function(response) {
        // alert(response);
        $("#assacDataForm").empty();
        $("#assacDataForm").html(response);
      }
    });
  });
</script>