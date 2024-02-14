<style type="text/css">
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
</style>
<!--Progree bar-->

<div class="row">
  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-3">
    <div style="float: inline-end;">
      <!-- <p id="progressMessage"></p> -->
      <button id="generateReportBtn" style="width: auto;" class="btn btn-success btn-sm"><i class="bi bi-download m-1"></i>Generate Report</button>
      <p id="progressMessage"></p>
      <!-- <div id="message">
        <p id="progressMessage"></p>
        <progress id="downloadProgress" value="0" max="100"></progress>
    </div> -->
    </div>
  </div>


<?php if ($fetchuser_id == $user_id) { ?>
  <div class="row bbbbbbb">

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


  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <!-- <h6 class="card-subtitle"><a class="text-success"><h1></h1></a></h6>
        <hr class="text-success"> -->

        <div class="row align-items-center gx-2 mb-2">
          <div class="row align-items-center gx-2 mb-2">
            <div class="col-12">
              <?php
              $total_class = "";
              $queryTotal = "SELECT MAX(days) AS max_days,MIN(days) AS min_days(SELECT days FROM actual WHERE ctp = '$std_course1' UNION ALL SELECT days FROM sim WHERE ctp = '$std_course1' UNION ALL UNION ALL SELECT days FROM academic WHERE ctp = '$std_course1') AS all_days";

              // Execute the query and fetch the result
              // $statementTotal = $connect->prepare($queryTotal);
              // $statementTotal->execute();
              // $resultTotal = $statementTotal->fetch(PDO::FETCH_ASSOC);
              // $total_class = $resultTotal['max_days'];
              // $total_class1 = $resultTotal['min_days'];
              // $count_del = $total_class - $total_class1;
              ?>
              <?php
              $totalClass = 0;
              $totalCount = 0;
              $phaseCountQ = $connect->query("SELECT count(*) FROM phase WHERE ctp = '$std_course1'");
              $pahseCountData = $phaseCountQ->fetchColumn();
              if ($pahseCountData > 0) {
                $phaseWidthPro = 100 / $pahseCountData;
              }
              $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
              while ($phaseData = $phaseQ->fetch()) {
                $phase_ID = $phaseData['id'];
                $queryTotalActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass1 = $queryTotalActualClass->fetchColumn();
                $queryTotalSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass2 = $queryTotalSimClass->fetchColumn();
                $queryTotalAcaClass = $connect->query("SELECT count(*) FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass3 = $queryTotalAcaClass->fetchColumn();
                $queryTotalTestClass = $connect->query("SELECT count(*) FROM test WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass4 = $queryTotalTestClass->fetchColumn();
                $totalClass = $totalClass + $totalClass1 + $totalClass2 + $totalClass3 + $totalClass4;
                if ($phaseData['color'] != "") {
                  $txtColor = $phaseData['color'];
                } else {
                  $txtColor = "gray";
                }

                $classNames = ["actual", "sim", "test", "academic"];
                $counter = 0;
                $totalElements = count($classNames);
                while ($counter < $totalElements) {
                  $currentData = $classNames[$counter];

                  if ($currentData == "actual") {
                    $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                    while ($acData = $acQ->fetch()) {
                      $acId = $acData['id'];
                      $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                      $cdata = $sql->fetchColumn();
                      $totalCount = $totalCount + $cdata;
                    }
                  }

                  if ($currentData == "sim") {
                    $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                    while ($acData = $acQ->fetch()) {
                      $acId = $acData['id'];
                      $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                      $cdata = $sql->fetchColumn();
                      $totalCount = $totalCount + $cdata;
                    }
                  }

                  if ($currentData == "test") {
                    $acQ = $connect->query("SELECT * FROM test WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                    while ($acData = $acQ->fetch()) {
                      $acId = $acData['id'];
                      $sql = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id='$acId' AND student_id='$fetchuser_id' AND status IS NOT NULL");
                      $cdata = $sql->fetchColumn();
                      $totalCount = $totalCount + $cdata;
                    }
                  }

                  if ($currentData == "academic") {
                    $acQ = $connect->query("SELECT * FROM academic WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                    while ($acData = $acQ->fetch()) {
                      $acId = $acData['id'];
                      $sql = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id='$fetchuser_id' AND acedemic_id = '$acId'");
                      $cdata = $sql->fetchColumn();
                      $totalCount = $totalCount + $cdata;
                    }
                  }

                  $counter++;
                }
              }
              ?>

              <div class="ggggg" style="display: -webkit-inline-box;margin-bottom: -80px;float: left;">
                <h1 class="card-subtitle" style="margin:5px;font-size: 30px !important;"><?php echo $totalCount; ?>/<?php echo $totalClass; ?>
                </h1>
              </div>
              <div style="float: right;">
                <a class="btn btn-soft-secondary" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/yearClaendar.php"><img style="height: 20px;width: 20px;" src="<?php echo BASE_URL; ?>assets/svg/menuicon/calendar.png" title="Cource Calendar">
                  <br>
                  <span>View Calendar</span>
                </a>
              </div>
              <br><br>

              <hr class="text-success">
              <div>
                <span style="float: left; font-size:large;" class="badge bg-success rounded-pill mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Start">

                  <?php
                  if (isset($_COOKIE['course_ids'])) {
                    $course_id = $_COOKIE['course_ids'];
                  } else {
                    $course_id = $c_id;
                  }
                  $fetchDate = $connect->query("SELECT CourseDate FROM newcourse WHERE Courseid = '$course_id'");
                  $dateString = $fetchDate->fetchColumn();

                  $fetchFirstDate = $connect->query("SELECT MIN(CAST(created_at AS DATE)) AS smallest_date
                FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1'");
                  $stDate = $fetchFirstDate->fetchColumn();
                  if ($stDate > 0) {
                    if (strtotime($stDate) < strtotime($dateString)) {
                      $dateString = $stDate;
                    }
                  }
                  $fetchFirstDate = $connect->query("SELECT MIN(CAST(acedemic_stu.date AS DATE)) AS smallest_date FROM acedemic_stu INNER JOIN academic ON acedemic_stu.acedemic_id = academic.id WHERE academic.ctp = '$std_course1' AND acedemic_stu.std_id = '$fetchuser_id'");
                  $stDate = $fetchFirstDate->fetchColumn();
                  if ($stDate > 0) {
                    if (strtotime($stDate) < strtotime($dateString)) {
                      $dateString = $stDate;
                    }
                  }
                  $fetchFirstDate = $connect->query("SELECT MIN(CAST(created AS DATE)) AS smallest_date FROM test_data INNER JOIN test ON test_data.test_id = test.id WHERE test.ctp = '$std_course1' AND test_data.student_id = '$fetchuser_id' AND (test_data.status != '0' AND test_data.status != '')");
                  $stDate = $fetchFirstDate->fetchColumn();
                  if ($stDate > 0) {
                    if (strtotime($stDate) < strtotime($dateString)) {
                      $dateString = $stDate;
                    }
                  }
                  $timestamp = strtotime($dateString);
                  echo $cStartDate =  date("d-F-y", $timestamp);
                  ?>
                </span>
                <span style="float:right; font-size:large;" class="badge bg-danger rounded-pill mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="End">

                  <?php
                  // include (ROOT_PATH .  'includes/Pages/endDateCalculation.php');
                  $fetchCourseDepart = $connect->query("SELECT departmentId FROM course_in_department WHERE courseCode = '$CourseCode11' AND courseName = '$std_course1' GROUP BY courseCode,courseName");
                  $departmentID = $fetchCourseDepart->fetchColumn();
                  // echo $std_course1;
                  $endDay = $totalClass - $totalCount;
                  // echo $endDay;
                  $fet = $connect->query("SELECT id,symbol,days,'actual' AS table_name FROM actual where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shortsim,days,'sim' AS table_name FROM sim where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shortacademic,days,'academic' AS table_name FROM academic where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shorttest,days,'test' AS table_name FROM  test where ctp='$std_course1' AND days IS NOT NULL ORDER BY days");
                  $days = 0;
                  $countSameDay = 0;
                  while ($fetData = $fet->fetch()) {
                    $symbol_id = $fetData["id"];
                    $table_name = $fetData["table_name"];
                    if ($table_name == "actual" || $table_name == "sim") {
                      $checkGradeSheet = $connect->query("SELECT count(*) FROM gradesheet WHERE course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class_id = '$symbol_id' AND class = '$table_name' AND over_all_grade IS NOT NULL");
                    }
                    if ($table_name == "test") {
                      $checkGradeSheet = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id = '$symbol_id' AND student_id = '$fetchuser_id' AND status IS NOT NULL");
                    }
                    if ($table_name == "academic") {
                      $checkGradeSheet = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id = '$fetchuser_id' AND acedemic_id = '$symbol_id'");
                    }
                    if ($checkGradeSheet->fetchColumn() <= 0) {
                      $select_date = $connect->query("SELECT `days` FROM $table_name WHERE id = '$symbol_id'");
                      $dates = $select_date->fetchColumn();
                      if ($dates == $days) {
                        $countSameDay++;
                      }
                      $days = $dates;
                    }
                  }
                  $endDay = $endDay - $countSameDay;
                  $countForDay = 0;
                  $courseStartDate = date('Y-m-d');
                  $weekend = "exclude";
                  $fetchWeekEnd = $connect->query("SELECT weekend FROM progress_weekend WHERE ctpId = '$std_course1' AND courseCode = '$CourseCode11'");
                  if ($fetchWeekEnd->rowCount() > 0) {
                    $weekend = $fetchWeekEnd->fetchColumn();
                  }
                  while ($countForDay <= $endDay) {
                    $addDay = 1;
                    if ($countForDay != 0) {
                      $courseStartDate = date('Y-m-d', strtotime($courseStartDate . ' + ' . $addDay . ' days'));
                    }
                    while (true) {
                      $planLeave = $connect->query("SELECT * FROM deconflicterdepartment WHERE departMentId = '$departmentID' AND (type = 'unPlanned' OR type = 'planedLeave')");
                      $days2 = 0;
                      while ($planLeaveData = $planLeave->fetch()) {
                        $leaveId = $planLeaveData['mainId'];

                        $countPlanLeave = $connect->query("SELECT * FROM holydays WHERE id = '$leaveId'");
                        while ($countPlanLeaveData = $countPlanLeave->fetch()) {
                          $leaveStartDate = new DateTime($countPlanLeaveData['startDate']);
                          $leaveEndDate = new DateTime($countPlanLeaveData['endDate']);
                          $classDate = new DateTime($courseStartDate);
                          if ($classDate >= $leaveStartDate && $classDate <= $leaveEndDate) {
                            $interval = $leaveStartDate->diff($leaveEndDate);
                            $days2 = $days2 + $interval->days + 1;
                          }
                        }
                      }
                      $courseStartDate = date('Y-m-d', strtotime($courseStartDate . ' + ' . $days2 . ' days'));

                      $classWeek = $courseStartDate;
                      $dayOfWeek = date('w', strtotime($classWeek));
                      $sn1 = 0;
                      if ($weekend == "exclude") {
                        if ($dayOfWeek == 6 || $dayOfWeek == 0) {
                          $sn1 = 1;
                          $courseStartDate = date('Y-m-d', strtotime($courseStartDate . ' + ' . $sn1 . ' days'));
                        }
                      }
                      if ($days2 == 0 && $sn1 == 0) {
                        break;
                      }
                    }
                    $countForDay++;
                  }
                  $timestamp = strtotime($courseStartDate);
                  echo date("d-F-y", $timestamp);
                  ?>
                </span>
                <?php
                if ($endDay == 0) {
                ?>
                  <img style="height: 50px;width:165px;float:right;object-fit: contain;margin-right: 25px;" src="<?php echo BASE_URL; ?>assets/icons/icons anchit/allClasses.png" alt="" />
                <?php
                }
                ?>
              </div><br><br><br>
              <?php
              $phaseCountQ = $connect->query("SELECT count(*) FROM phase WHERE ctp = '$std_course1'");
              $pahseCountData = $phaseCountQ->fetchColumn();
              if ($pahseCountData > 0) {
                $phaseWidthPro = 100 / $pahseCountData;
              }
              $counrPhaeWidth = 0;

              $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
              while ($phaseData = $phaseQ->fetch()) {
                $phase_ID = $phaseData['id'];
                $totalClass = 0;
                $queryTotalActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass1 = $queryTotalActualClass->fetchColumn();
                $queryTotalSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass2 = $queryTotalSimClass->fetchColumn();
                $queryTotalAcaClass = $connect->query("SELECT count(*) FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass3 = $queryTotalAcaClass->fetchColumn();
                $queryTotalTestClass = $connect->query("SELECT count(*) FROM test WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass4 = $queryTotalTestClass->fetchColumn();
                $totalClass = $totalClass + $totalClass1 + $totalClass2 + $totalClass3 + $totalClass4;
                if ($totalClass > 0) {
                  $counrPhaeWidth++;
                }
              }

              $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
              while ($phaseData = $phaseQ->fetch()) {
                $phase_ID = $phaseData['id'];
                $totalClass = 0;
                $queryTotalActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass1 = $queryTotalActualClass->fetchColumn();
                $queryTotalSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass2 = $queryTotalSimClass->fetchColumn();
                $queryTotalAcaClass = $connect->query("SELECT count(*) FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass3 = $queryTotalAcaClass->fetchColumn();
                $queryTotalTestClass = $connect->query("SELECT count(*) FROM test WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
                $totalClass4 = $queryTotalTestClass->fetchColumn();
                $totalClass = $totalClass + $totalClass1 + $totalClass2 + $totalClass3 + $totalClass4;
                if ($totalClass > 0) {
                  if ($phaseData['color'] != "") {
                    $txtColor = $phaseData['color'];
                  } else {
                    $txtColor = "gray";
                  }

                  $classNames = ["actual", "sim", "test", "academic"];
                  $counter = 0;
                  $totalElements = count($classNames);
                  $totalCount = 0;
                  while ($counter < $totalElements) {
                    $currentData = $classNames[$counter];

                    if ($currentData == "actual") {
                      $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                      while ($acData = $acQ->fetch()) {
                        $acId = $acData['id'];
                        $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                        $cdata = $sql->fetchColumn();
                        $totalCount = $totalCount + $cdata;
                      }
                    }

                    if ($currentData == "sim") {
                      $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                      while ($acData = $acQ->fetch()) {
                        $acId = $acData['id'];
                        $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                        $cdata = $sql->fetchColumn();
                        $totalCount = $totalCount + $cdata;
                      }
                    }

                    if ($currentData == "test") {
                      $acQ = $connect->query("SELECT * FROM test WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                      while ($acData = $acQ->fetch()) {
                        $acId = $acData['id'];
                        $sql = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id='$acId' AND student_id='$fetchuser_id' AND status IS NOT NULL");
                        $cdata = $sql->fetchColumn();
                        $totalCount = $totalCount + $cdata;
                      }
                    }

                    if ($currentData == "academic") {
                      $acQ = $connect->query("SELECT * FROM academic WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                      while ($acData = $acQ->fetch()) {
                        $acId = $acData['id'];
                        $sql = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id='$fetchuser_id' AND acedemic_id = '$acId'");
                        $cdata = $sql->fetchColumn();
                        $totalCount = $totalCount + $cdata;
                      }
                    }

                    $counter++;
                  }
                  $totalClassesPerPhase = $totalClass;
                  $classesCompleted = $totalCount;
                  if ($totalClassesPerPhase > 0) {
                    $progressPerPhase = $classesCompleted / $totalClassesPerPhase * 100;
                  }
                  $phaseWidthPro = 100 / $counrPhaeWidth;
              ?>

                  <div class="progress" style="width: <?php echo $phaseWidthPro; ?>%;float: left;    margin-right: -3px;">
                    <div class="progress-bar" style=" width: <?php echo $progressPerPhase ?>%;background-color:<?php echo $txtColor ?>"></div>
                  </div>
              <?php
                }
              }
              ?>
              <!-- <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
              <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div> -->

            </div>
            <!-- phase progressbar -->
            <?php
            $totalClass = 0;
            $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
            while ($phaseData = $phaseQ->fetch()) {
              $phase_ID = $phaseData['id'];
              $totalClass = 0;
              if ($phaseData['color'] != "") {
                $txtColor = $phaseData['color'];
              } else {
                $txtColor = "gray";
              }
              $queryTotalActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
              $totalClass1 = $queryTotalActualClass->fetchColumn();
              $queryTotalSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
              $totalClass2 = $queryTotalSimClass->fetchColumn();
              $queryTotalAcaClass = $connect->query("SELECT count(*) FROM academic WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
              $totalClass3 = $queryTotalAcaClass->fetchColumn();
              $queryTotalTestClass = $connect->query("SELECT count(*) FROM test WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
              $totalClass4 = $queryTotalTestClass->fetchColumn();
              $totalClass = $totalClass + $totalClass1 + $totalClass2 + $totalClass3 + $totalClass4;

              $classNames = ["actual", "sim", "test", "academic"];
              $counter = 0;
              $totalElements = count($classNames);
              $totalCount = 0;
              while ($counter < $totalElements) {
                $currentData = $classNames[$counter];

                if ($currentData == "actual") {
                  $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                  while ($acData = $acQ->fetch()) {
                    $acId = $acData['id'];
                    $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                    $cdata = $sql->fetchColumn();
                    $totalCount = $totalCount + $cdata;
                  }
                }

                if ($currentData == "sim") {
                  $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                  while ($acData = $acQ->fetch()) {
                    $acId = $acData['id'];
                    $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                    $cdata = $sql->fetchColumn();
                    $totalCount = $totalCount + $cdata;
                  }
                }

                if ($currentData == "test") {
                  $acQ = $connect->query("SELECT * FROM test WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                  while ($acData = $acQ->fetch()) {
                    $acId = $acData['id'];
                    $sql = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id='$acId' AND student_id='$fetchuser_id' AND status IS NOT NULL");
                    $cdata = $sql->fetchColumn();
                    $totalCount = $totalCount + $cdata;
                  }
                }

                if ($currentData == "academic") {
                  $acQ = $connect->query("SELECT * FROM academic WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                  while ($acData = $acQ->fetch()) {
                    $acId = $acData['id'];
                    $sql = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id='$fetchuser_id' AND acedemic_id = '$acId'");
                    $cdata = $sql->fetchColumn();
                    $totalCount = $totalCount + $cdata;
                  }
                }

                $counter++;
              }

            ?>
              <div class="col-12" style="display: none;">
                <h1 style="color:<?php echo $txtColor; ?>"><?php echo $phaseData['phasename'] ?>:- <?php echo $totalCount; ?>/<?php echo $totalClass; ?></h1>
                <div class="progress">

                  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            <?php

            }
            ?>

            <!-- End phase progressbar -->
            <!-- End Col -->
          </div>
          <hr>
          <div style="display:flex;">

            <?php
            $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
            while ($phaseData = $phaseQ->fetch()) {
              $totalClass = 0;
              $phase_ID = $phaseData['id'];
              $queryTotalActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
              $totalClass1 = $queryTotalActualClass->fetchColumn();
              $queryTotalSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
              $totalClass2 = $queryTotalSimClass->fetchColumn();
              $totalClass = $totalClass + $totalClass1 + $totalClass2;
              if ($totalClass > 0) {
                $checkCom = $connect->query("SELECT count(*) FROM gradesheet WHERE user_id = '$fetchuser_id' AND phase_id = '$phase_ID' AND course_id = '$std_course1' AND over_all_grade IS NOT NULL");
                $checkComData = $checkCom->fetchColumn();
            ?>
                <ul class="list-inline">
                  <li class="list-inline-item d-inline-flex align-items-center" id="seephaseclasses" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="margin:10px; cursor: pointer;">
                    <?php if ($totalClass == $checkComData) { ?>
                      <!-- <img src="<?php echo BASE_URL; ?>assets/svg/icons/check1.png" style="height: 20px;margin:5px;"> -->
                      <i class="bi bi-check2-circle" style="font-size:25px;margin-right: 2px;color: <?php echo $phaseData['color']; ?>;"></i>
                    <?php } else {

                    ?>
                      <span class="legend-indicator" style="background-color:<?php echo $phaseData['color']; ?>;height: 20px;width: 20px;"></span>
                    <?php
                    }
                    ?>
                    <span style="color:<?php echo $phaseData['color']; ?>;font-size:large;font-weight: bold;"><?php echo $phaseData['phasename']; ?></span>
                  </li>
                  <div class="col-8 dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="seephaseclasses">
                    <div class="container">


                      <input type="text" id="searchInputclasses" placeholder="Search For Classes.." style="width: 100%;height: 30px;border-radius: 5px;border: 1px solid #67778894;"><br>
                      <div class="row" id="searchClasses">
                        <?php
                        $classNames = ["Actual", "Sim"];
                        $counter = 0;
                        $totalElements = count($classNames);
                        while ($counter < $totalElements) {
                          $currentData = $classNames[$counter];

                          if ($currentData == "Actual") {

                        ?>
                            <p style="margin: 5px; font-weight:bold; text-align:center;font-size: large;" class="text-success bg-soft-success">
                              <img style="height:20px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Actual_class.png"><?php echo $currentData; ?>
                            </p>

                            <?php
                            $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                            while ($acData = $acQ->fetch()) {
                              $acId = $acData['id'];
                              $sql = $connect->query("SELECT count(*) as count_records,instructor FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                              $actData = $sql->fetch();
                              $cdata = $actData['count_records'];
                              $totalCount = $totalCount + $cdata;
                              $instId = $actData['instructor'];
                              $fetchInst = $connect->query("SELECT nickname FROM users WHERE id = '$instId'");
                            ?>
                              <div class="col-1 aaayyy">
                                <h6 class="badge bg-soft-secondary rounded-pill text-dark" style="width:auto;cursor:pointer" title="<?php echo $fetchInst->fetchColumn(); ?>">
                                  <?php if ($cdata != 0) { ?>
                                    <i class="bi bi-check-circle text-success"></i>
                                  <?php } else { ?>
                                    <i class="bi bi-x-circle text-danger"></i>
                                  <?php } ?>
                                  <?php echo $acData['symbol']; ?>
                                </h6>
                              </div>
                            <?php
                            }
                          }

                          if ($currentData == "Sim") {
                            ?>
                            <p style="margin: 5px; font-weight:bold; text-align:center;font-size: large;" class="text-success bg-soft-success">
                              <img style="height:20px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Stimulation_Class.png"><?php echo $currentData; ?>
                            </p>

                            <?php
                            $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                            while ($acData = $acQ->fetch()) {
                              $acId = $acData['id'];
                              $sql = $connect->query("SELECT count(*) as count_records,instructor FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                              $actData = $sql->fetch();
                              $cdata = $actData['count_records'];
                              $totalCount = $totalCount + $cdata;
                              $instId = $actData['instructor'];
                              $fetchInst = $connect->query("SELECT nickname FROM users WHERE id = '$instId'");
                            ?>
                              <div class="col-1 aaayyy">
                                <h6 class="badge bg-soft-secondary rounded-pill text-dark" style="width:auto;cursor:pointer" title="<?php echo $fetchInst->fetchColumn(); ?>">
                                  <?php if ($cdata != 0) { ?>
                                    <i class="bi bi-check-circle text-success"></i>
                                  <?php } else { ?>
                                    <i class="bi bi-x-circle text-danger"></i>
                                  <?php } ?>
                                  <?php echo $acData['shortsim']; ?>
                                </h6>
                              </div>
                          <?php
                            }
                          }

                          // if ($currentData == "test") {
                          //     $acQ = $connect->query("SELECT * FROM test WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                          //     while ($acData = $acQ->fetch()) {
                          //         $acId = $acData['id'];
                          //         $sql = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id='$acId' AND student_id='$fetchuser_id' AND status IS NOT NULL");
                          //         $cdata = $sql->fetchColumn();
                          //         $totalCount = $totalCount + $cdata;
                          //     
                          ?>
                          <!-- //         <div class="col-2 aaayyy" style="width:auto;">
                                    //             <h6 class="badge bg-soft-secondary rounded-pill" style="width:auto; color: black;">
                                    //                 <?php if ($cdata != 0) { ?>
                                    //                     <i class="bi bi-check-circle text-success"></i>
                                    //                 <?php } else { ?>
                                    //                     <i class="bi bi-x-circle text-danger"></i>
                                    //                 <?php } ?>
                                    //                 <?php echo $acData['shorttest']; ?>
                                    //             </h6>
                                    //         </div>-->
                          <?php
                          //     }
                          // }

                          // if ($currentData == "academic") {
                          //     $acQ = $connect->query("SELECT * FROM academic WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                          //     while ($acData = $acQ->fetch()) {
                          //         $acId = $acData['id'];
                          //         $sql = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id='$fetchuser_id' AND acedemic_id = '$acId'");
                          //         $cdata = $sql->fetchColumn();
                          //         $totalCount = $totalCount + $cdata;
                          ?>
                          <!-- <div class="col-2 aaayyy" style="width:auto;">
                                                <h6 class="badge bg-soft-secondary rounded-pill" style="width:auto; color: black;">
                                                    <?php if ($cdata != 0) { ?>
                                                        <i class="bi bi-check-circle text-success"></i>
                                                    <?php } else { ?>
                                                        <i class="bi bi-x-circle text-danger"></i>
                                                    <?php } ?>
                                                    <?php echo $acData['shortacademic']; ?>
                                                </h6>
                                            </div> -->
                        <?php
                          //     }
                          // }

                          $counter++;
                        }
                        ?>
                      </div>
                    </div>
                  </div>


                </ul>
            <?php }
            } ?>
            <?php
            $countAca = $connect->query("SELECT count(*) FROM academic WHERE ctp = '$std_course1'");
            // echo $countAca->fetchColumn();
            $phaseAcaAss = $connect->query("SELECT count(*) FROM acedemic_stu INNER JOIN academic ON acedemic_stu.acedemic_id = academic.id WHERE academic.ctp = '$std_course1' AND acedemic_stu.std_id = '$fetchuser_id'");
            ?>
            <li class="list-inline-item" style="margin:10px; cursor: pointer;" id="seeallacademic" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
              <?php
              if ($countAca->fetchColumn() == $phaseAcaAss->fetchColumn()) {
              ?>
                <i class="bi bi-check2-circle" style="font-size:25px;margin-right: 2px;"></i>
              <?php
              } else {
              ?>
                <span class="legend-indicator bg-secondary" style="height: 20px;width: 20px;"></span>
              <?php } ?>
              <span style="font-size:large;font-weight: bold;">Academic</span>
            </li>

            <div class="col-8 dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="seeallacademic">
              <div class="container">
                <input type="text" id="searchInputclassesacademic" placeholder="classes" style="width: 100%;height: 30px;border-radius: 5px;border: 1px solid #67778894;"><br>
                <div class="row" id="searchClassesacademic">
                  <!-- <h2>Academic</h2> -->
                  <?php
                  $phaseQ = $connect->query("SELECT *
                FROM phase
                INNER JOIN acedemic_phase ON phase.id = acedemic_phase.phase
                WHERE phase.ctp = '$std_course1'");
                  while ($phaseData = $phaseQ->fetch()) {
                    $phase_ID = $phaseData['phase'];
                    $acQ1 = $connect->query("SELECT count(*) FROM academic WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                    if ($acQ1->fetchColumn() > 0) {
                  ?>
                      <span style="color:<?php echo $phaseData['color']; ?>;font-size: large;font-weight: bold;"><?php echo $phaseData['phasename']; ?></span>
                      <?php
                      $acQ = $connect->query("SELECT * FROM academic WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                      while ($acData = $acQ->fetch()) {
                        $acId = $acData['id'];
                        $sql = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id='$fetchuser_id' AND acedemic_id = '$acId'");
                        $cdata = $sql->fetchColumn();
                        $totalCount = $totalCount + $cdata;
                      ?>

                        <div class="col-1 archana">
                          <h6 class="badge bg-soft-secondary rounded-pill text-dark" style="width:auto;">
                            <?php if ($cdata > 0) { ?>
                              <i class="bi bi-check-circle text-success"></i>
                            <?php } else { ?>
                              <i class="bi bi-x-circle text-danger"></i>
                            <?php } ?>
                            <?php echo $acData['shortacademic']; ?>
                          </h6>
                        </div>
                  <?php
                      }
                    }
                  }
                  ?>

                </div>
              </div>
            </div>

            <li class="list-inline-item" style="margin:10px; cursor: pointer;" id="seealltest" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
              <?php
              $countTestClass = $connect->query("SELECT count(*) FROM test WHERE ctp = '$std_course1'");
              // echo $countTestClass->fetchColumn();
              $phaseTestMarks = $connect->query("SELECT count(*) FROM test_data INNER JOIN test ON test_data.test_id = test.id WHERE test.ctp = '$std_course1' AND test_data.student_id = '$fetchuser_id' AND (test_data.status != '0' AND test_data.status != '')");
              // echo $phaseTestMarks->fetchColumn();
              if ($countTestClass->fetchColumn() == $phaseTestMarks->fetchColumn()) {
              ?>
                <i class="bi bi-check2-circle" style="font-size:25px;margin-right: 2px;"></i>
              <?php
              } else {
              ?>
                <span class="legend-indicator bg-secondary" style="height: 20px;width: 20px;"></span>
              <?php } ?>
              <span style="font-size:large;font-weight: bold;">Test</span>
            </li>
            <div class="col-8 dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="seealltest">
              <div class="container">
                <input type="text" id="searchInputclassestest" placeholder="classes" style="width: 100%;height: 30px;border-radius: 5px;border: 1px solid #67778894;"><br>
                <div class="row" id="searchClassestest">
                  <!-- <h2>Test</h2> -->
                  <?php
                  $phaseQ = $connect->query("SELECT * FROM phase INNER JOIN test_phase ON phase.id = test_phase.phase WHERE phase.ctp = '$std_course1'");
                  while ($phaseData = $phaseQ->fetch()) {
                    $phase_ID = $phaseData['id'];
                  ?>
                    <span style="color:<?php echo $phaseData['color']; ?>;font-size:large; font-weight:bold;"><?php echo $phaseData['phasename']; ?></span>
                    <?php
                    $acQ = $connect->query("SELECT * FROM test WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                    while ($acData = $acQ->fetch()) {
                      $acId = $acData['id'];
                      $sql = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id='$acId' AND student_id='$fetchuser_id' AND status IS NOT NULL");
                      $cdata = $sql->fetchColumn();
                      $totalCount = $totalCount + $cdata;

                    ?>
                      <div class="col-1 varun">
                        <h6 class="badge bg-soft-secondary rounded-pill text-dark" style="width:auto;">
                          <?php if ($cdata != 0) { ?>
                            <i class="bi bi-check-circle text-success"></i>
                          <?php } else { ?>
                            <i class="bi bi-x-circle text-danger"></i>
                          <?php } ?>
                          <?php echo $acData['shorttest']; ?>
                        </h6>
                      </div>
                  <?php
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>
    <!-- End Card -->
  </div>

</div>

<!--missing gradesheet-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a class="text-success">Missing Gradsheet</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <?php
            if ($fetchuser_id != '0') {
              $fetch_missing = "SELECT * FROM gradesheet WHERE course_id='$std_course1' AND user_id='$fetchuser_id' AND instructor IS NOT NULL AND over_all_grade IS NULL ORDER BY id";
              $fetch_missingstatement1 = $connect->prepare($fetch_missing);
              $fetch_missingstatement1->execute();
              $fetch_missingresult1 = $fetch_missingstatement1->fetchAll();
              foreach ($fetch_missingresult1 as $row1151) {
                $table_name10 = $row1151['class'];
                $symbol_id10 = $row1151['class_id'];
                $inst_Id = $row1151['instructor'];

                if ($table_name10 == "actual") {
                  $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                  $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
                  $q12 = $connect->query("SELECT count(*) FROM $table_name10 WHERE id = '$symbol_id10'");
                } else if ($table_name10 == "sim") {
                  $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                  $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
                  $q12 = $connect->query("SELECT count(*) FROM $table_name10 WHERE id = '$symbol_id10'");
                }

                $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$inst_Id'");
                $insD = $insQ->fetchColumn();

                $name111221 = $q11->fetchColumn();
                $q10->execute([$symbol_id10]);
                $name_class = $q10->fetchColumn();
                $countClass = $q12->fetchColumn();
                if ($countClass > 0) {

            ?>
                  <a href="newgradesheet.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>" class="btn btn-danger position-relative"><?php echo $name_class; ?>

                    <span class="circleig1"><?php echo $insD; ?></span>
                  </a>
              <?php
                }
              }
              ?>
              <?php $fetch_missing1 = "SELECT * FROM cloned_gradesheet WHERE course_id='$std_course1' AND user_id='$fetchuser_id' AND instructor IS NOT NULL AND over_all_grade IS NULL ORDER BY id";
              $fetch_missing1statement1 = $connect->prepare($fetch_missing1);
              $fetch_missing1statement1->execute();
              $fetch_missing1result1 = $fetch_missing1statement1->fetchAll();
              foreach ($fetch_missing1result1 as $row1152) {
                $table_name10 = $row1152['class'];
                $symbol_id10 = $row1152['class_id'];
                $inst_Id = $row1152['instructor'];
                $cl_id = $row1152['cloned_id'];
                if ($table_name10 == "actual") {
                  $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                  $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
                  $q12 = $connect->query("SELECT count(*) FROM $table_name10 WHERE id = '$symbol_id10'");
                } else if ($table_name10 == "sim") {
                  $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                  $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
                  $q12 = $connect->query("SELECT count(*) FROM $table_name10 WHERE id = '$symbol_id10'");
                }

                $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$inst_Id'");
                $insD = $insQ->fetchColumn();

                $name111221 = $q11->fetchColumn();
                $q10->execute([$symbol_id10]);
                $name_class = $q10->fetchColumn();
                $countClass = $q12->fetchColumn();
                if ($countClass > 0) {
                  $xString4 = str_repeat("x", $cl_id);
              ?>
                  <a href="newgradesheetcl.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>&clone_ides=<?php echo urlencode(base64_encode($cl_id)); ?>" class="btn btn-danger position-relative"><?php echo $name_class . $xString4; ?>
                    <span class="circleig1"><?php echo $insD; ?></span>
                  </a>
            <?php
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


<!--classes row-->

<!-- Stats -->
<div class="row">
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" href="actual.php" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <div>
          <h1 class="card-subtitle text-success"><a class="text-success" href="<?php echo BASE_URL; ?>includes/Pages/actual.php">Actual</a></h1>
        </div>

        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col">

            <?php
            if ($fetchuser_id != '0') { ?>
              <?php
              $query = "SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
          FROM (
              SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, NULL as cloned_id
              FROM gradesheet WHERE class = 'actual'
                                    AND course_id = '$std_course1'
                                    AND user_id = '$fetchuser_id'
                                    AND over_all_grade IS NOT NULL
              UNION
              SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
              FROM cloned_gradesheet WHERE class = 'actual'
                                    AND course_id = '$std_course1'
                                    AND user_id = '$fetchuser_id'
                                    AND over_all_grade IS NOT NULL
          ) AS combined_data
          ORDER BY date DESC
          LIMIT 3";
              $statement = $connect->prepare($query);
              $statement->execute();
              if ($statement->rowCount() > 0) {
              ?>
                <td>
                  <?php $result = $statement->fetchAll();
                  $cR = 0;
                  foreach ($result as $row) {

                    if ($cR == 3) {
                      break;
                    }
                    $gradess = $row['over_all_grade'];
                    $gradess_per = $row['over_all_grade_per'];
                    $class_ides = $row['class_id'];
                    $clone_id = $row['cloned_id'];
                    $class_name_fect = $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                    $class_name_fect->execute([$class_ides]);
                    $class_name_fects = $class_name_fect->fetchColumn();
                    $ins_id = $row['instructor'];
                    $sel_ins1 = $connect->prepare("SELECT `nickname` FROM `users` WHERE id=?");
                    $sel_ins1->execute([$ins_id]);
                    $sel_ins_name1 = $sel_ins1->fetchColumn();

                    $codeIdData = $row['gradsheet_status'];

                    $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                    $codeName->execute([$codeIdData]);
                    $codeNameData = $codeName->fetchColumn();
                    if ($gradess == "U") {
                      $class1 = "btn btn-danger";
                    } elseif ($gradess == "F") {
                      $class1 = "btn btn-warning";
                    } elseif ($gradess == "G") {
                      $class1 = "btn btn-secondary";
                    } elseif ($gradess == "V") {
                      $class1 = "btn btn-success";
                    } elseif ($gradess == "E") {
                      $class1 = "btn btn-primary";
                    } elseif ($gradess == "N") {
                      $class1 = "btn btn-dark";
                    } else {
                      $class1 = "btn btn-dark";
                    }
                    $xString1 = str_repeat("x", $clone_id);
                  ?>
                    <div class="row">
                      <h4 class="btnFlip" style="position: relative;"><span class="legend-indicator bg-danger"></span>
                        <a style="font-weight:bold;" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($class_ides)) ?>&class_name=<?php echo urlencode(base64_encode('actual')) ?>"><?php if ($clone_id != "") {
                                                                                                                                                                                                    echo $class_name_fects . $xString1;
                                                                                                                                                                                                  } else {
                                                                                                                                                                                                    echo $class_name_fects;
                                                                                                                                                                                                  } ?></a>
                        <span class="tooltip-text" class="top1" style="white-space: nowrap;"><?php echo $sel_ins_name1; ?></span>
                      </h4>
                      <div class="col-12">

                        <span style="font-weight:bolder; font-size:larger; width:5%; text-align:center; padding:5px;" class="badge<?php echo $class1 ?>"><?php echo $gradess; ?></span> -

                        <span style="font-weight:bolder; font-size:larger;" class="badge <?php echo $class1; ?>">
                          <i class="bi-graph-up"></i> <?php echo $gradess_per; ?>%
                        </span> -
                        <?php if ($codeNameData != "") { ?>
                          <span style="font-weight:bolder; font-size:larger;color: darkgoldenrod; font-family: cursive; background: #e2e4e6;" class="badge">
                            <span><?php echo $codeNameData; ?></span>
                          </span>
                        <?php } ?>


                        <div class="slidecontainer" style="margin-top:23px;">
                          <progress style="width:100%;" id="file" max="100" value=<?php echo $gradess_per ?>><?php echo $gradess_per ?></progress>

                        </div>
                        <hr>
                      </div>
                    </div>
                  <?php $cR++;
                  }
                  ?>
                </td>
            <?php
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

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <div>
          <h1 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/sim.php" class="text-success">Sim</a></h1>
        </div>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">
            <?php
            if ($fetchuser_id != '0') {
              $query_sim = "SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
            FROM (
                SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, NULL as cloned_id
                FROM gradesheet WHERE class = 'sim'
                                      AND course_id = '$std_course1'
                                      AND user_id = '$fetchuser_id'
                                      AND over_all_grade IS NOT NULL
                UNION
                SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
                FROM cloned_gradesheet WHERE class = 'sim'
                                      AND course_id = '$std_course1'
                                      AND user_id = '$fetchuser_id'
                                      AND over_all_grade IS NOT NULL
            ) AS combined_data
            ORDER BY date DESC
            LIMIT 3";
              $statement_sim = $connect->prepare($query_sim);

              $statement_sim->execute();
              if ($statement_sim->rowCount() > 0) {
            ?>
                <td>
                  <?php $result_sim = $statement_sim->fetchAll();
                  $cR = 0;
                  foreach ($result_sim as $row) {
                    if ($cR == 3) {
                      break;
                    }
                    $gradess_sim = $row['over_all_grade'];
                    $gradess_per_sim = $row['over_all_grade_per'];
                    $class_ides_sim = $row['class_id'];
                    $clone_id = $row['cloned_id'];
                    $class_name_fect_sim = $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                    $class_name_fect_sim->execute([$class_ides_sim]);
                    $class_name_fects_sim = $class_name_fect_sim->fetchColumn();
                    $ins_id_sim = $row['instructor'];
                    $sel_ins_sim = $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                    $sel_ins_sim->execute([$ins_id_sim]);
                    $sel_ins_name_sim = $sel_ins_sim->fetchColumn();

                    $sel_ins_sim1 = $connect->prepare("SELECT `nickname` FROM `users` WHERE id=?");
                    $sel_ins_sim1->execute([$ins_id_sim]);
                    $sel_ins_name_sim1 = $sel_ins_sim1->fetchColumn();

                    $codeIdData = $row['gradsheet_status'];

                    $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                    $codeName->execute([$codeIdData]);
                    $codeNameData = $codeName->fetchColumn();

                    if ($codeNameData == "") {
                      $codeNameData = "";
                    }

                    if ($gradess_sim == "U") {
                      $class1_sim = "btn btn-danger";
                    } elseif ($gradess_sim == "F") {
                      $class1_sim = "btn btn-warning";
                    } elseif ($gradess_sim == "G") {
                      $class1_sim = "btn btn-secondary";
                    } elseif ($gradess_sim == "V") {
                      $class1_sim = "btn btn-success";
                    } elseif ($gradess_sim == "E") {
                      $class1_sim = "btn btn-primary";
                    } elseif ($gradess_sim == "N") {
                      $class1_sim = "btn btn-dark";
                    } else {
                      $class1_sim = "btn btn-dark";
                    }
                    $xString2 = str_repeat("x", $clone_id);
                  ?>
                    <div class="row">
                      <h4 class="btnFlip" style="position: relative;"><span class="legend-indicator bg-danger"></span>
                        <a style="font-weight:bold;" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_sim)) ?>&class_name=<?php echo urlencode(base64_encode('sim')) ?>"><?php if ($clone_id != "") {
                                                                                                                                                                                                    echo $class_name_fects_sim . $xString2;
                                                                                                                                                                                                  } else {
                                                                                                                                                                                                    echo $class_name_fects_sim;
                                                                                                                                                                                                  } ?></a>
                        <span class="tooltip-text" class="top1" style="white-space: nowrap;"><?php echo $sel_ins_name_sim1; ?></span>
                      </h4>
                      <div class="col-12">

                        <span style="font-weight:bolder; font-size:larger; width:5%; text-align:center; padding:5px;" class="badge<?php echo $class1_sim ?>"><?php echo $gradess_sim; ?></span> -
                        <span style="font-weight:bolder; font-size:larger;" class="badge <?php echo $class1_sim; ?>">
                          <i class="bi-graph-up"></i> <?php echo $gradess_per_sim; ?>%
                        </span> -
                        <?php if ($codeNameData != "") { ?>
                          <span style="font-weight:bolder; font-size:larger;color: darkgoldenrod; font-family: cursive; background: #e2e4e6;" class="badge">
                            <span><?php echo $codeNameData; ?></span>
                          </span>
                        <?php } ?>
                        <div class="slidecontainer" style="margin-top: 23px;">
                          <progress style="width:100%;" id="file" max="100" value=<?php echo $gradess_per_sim ?>><?php echo $gradess_per_sim ?></progress>

                        </div>
                        <hr>
                      </div>
                    </div>
                  <?php $cR++;
                  }
                  ?>
                </td>
            <?php
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

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/testing.php" class="text-success">Test</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">
            <?php
            if ($fetchuser_id != '0') {
              $query3 = "SELECT * FROM test_data where `course_id`='$std_course1' and student_id='$fetchuser_id' ORDER BY id DESC";
              $statement3 = $connect->prepare($query3);
              $statement3->execute();
              if ($statement3->rowCount() > 0) {
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

                    <h4 id="<?php echo $class_id_te; ?>" name="test" data-bs-toggle="modal" data-bs-target="#" style="margin:5px; padding: 5px;position:relative;" onclick="document.getElementById('testId').value='<?php echo $class_id_te; ?>';" class="btnFlip testFiles"><span class="legend-indicator bg-danger"></span>
                      <span style="font-weight:bold; width:5%; text-align:center; padding:5px; border-radius: 5px; color: white;" class="badge<?php echo $class_test; ?>"><?php echo $marks_test; ?></span> -
                      <a style="font-weight:bold;"><?php echo $class_name_fect_tes ?></a>
                      <span class="tooltip-text" style="white-space: nowrap;"><?php echo $inData; ?></span>
                    </h4>

                  <?php } ?>
                </td>
            <?php }
            }

            ?>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->


      </div>


    </div>
  </div>

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle"><a href="<?php echo BASE_URL; ?>includes/Pages/quiz.php" class="text-success">Quiz</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12">
            <?php
            if ($fetchuser_id != '0') {

              $fetchQuiz = $connect->query("SELECT * FROM quiz_marks WHERE course_id = '$std_course1'  AND student_id = '$fetchuser_id' ORDER BY id DESC");
              while ($quizMarksData = $fetchQuiz->fetch()) {
                $quizId = $quizMarksData['quiz_id'];
                $inId = $quizMarksData['userId'];
                $marks_quiz_q = $quizMarksData['marks'];
                $quizName = $connect->query("SELECT quiz FROM quiz WHERE id = '$quizId'");
                $quizNameData = $quizName->fetchColumn();
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
                <h4 id="<?php echo $quizId; ?>" name="quiz" data-bs-toggle="modal" data-bs-target="#" style="margin:5px; padding: 5px;position:relative;" class="btnFlip quizFiles" style="margin:5px; padding: 5px;">
                  <span class="legend-indicator bg-danger"></span>
                  <span class="tooltip-text" style="white-space: nowrap;"><?php echo $inData; ?></span>
                  <span style="font-weight:bold; width:5%; text-align:center; padding:5px; border-radius: 5px; color:white;" class="badge<?php echo $class_quiz_q; ?>"><?php echo $marks_quiz_q; ?></span> -
                  <a style="font-weight:bold;"><?php echo $quizNameData ?></a>

                </h4>
            <?php
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
<!-- End Stats -->

<div class="row">
  <?php if ($fetchuser_id != '0') { ?>
    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
      <!-- Card -->
      <div class="card card-hover-shadow h-100" href="<?php echo BASE_URL; ?>includes/Pages/academic.php" style="border:0.001rem solid #dddddd;">
        <div class="card-body">
          <h1 class="card-subtitle text-success" style="text-transform: uppercase;"><a class="text-success" href="<?php echo BASE_URL; ?>includes/Pages/academic.php">Academic</a></h1>
          <hr class="text-success">

          <div class="row align-items-center gx-2 mb-1">

            <div class="col">
              <?php
              $query2 = "SELECT * FROM notifications where `type`='academic' and extra_data='Has Accepted Academic For' and to_userid='$fetchuser_id' ORDER BY id DESC LIMIT 3";
              $statement2 = $connect->prepare($query2);
              $statement2->execute();
              if ($statement2->rowCount() > 0) {
              ?>
                <td>

                  <?php $result2 = $statement2->fetchAll();
                  foreach ($result2 as $row2) {
                    $class_id_ac = $row2['data'];
                    $class_name_fect_sc = $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                    $class_name_fect_sc->execute([$class_id_ac]);
                    $class_name_fect_scs = $class_name_fect_sc->fetchColumn();
                    $ins_ides = $row2['user_id'];
                    $sel_ins_Ac = $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                    $sel_ins_Ac->execute([$ins_ides]);
                    $sel_ins_Ac_name = $sel_ins_Ac->fetchColumn();

                  ?>


                    <h4><span class="legend-indicator bg-secondary"></span><a style="font-weight:bold;"><?php echo $class_name_fect_scs ?></a></h4>


                  <?php
                  } ?>
                </td>
              <?php }
              ?>

            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
      <!-- End Card -->
    </div>
  <?php } ?>
  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <div>
          <h1 class="card-subtitle" style="float:left;text-transform: uppercase;"><a href="<?php echo BASE_URL; ?>includes/Pages/memo.php" class="text-success">Memo</a>
            <h1>

              <?php
              $absQ = $connect->query("SELECT * FROM memo WHERE student_id = '$fetchuser_id' AND categoryId = 'absent'");
              $absDay = 0;
              while ($absData = $absQ->fetch()) {
                $absDay = $absDay + $absData['memomarks'];
              }
              ?>
              <h3 style="float:right; display:flex;" class="text-danger">Sick
                <input type="hidden" value="" name="">
                <p> - <?php echo $absDay; ?></p>
              </h3>



        </div><br>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col">
            <?php if ($fetchuser_id != '0') {
              $query5 = "SELECT * FROM memo where course_id='$std_course1' and student_id='$fetchuser_id' AND categoryId != 'absent' ORDER BY id DESC LIMIT 3";
              $statement5 = $connect->prepare($query5);
              $statement5->execute();
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
                if ($tData != "absent") {

            ?>
                  <tr>

                    <h4 class="text-dark" style="cursor:pointer;"><a onclick="document.getElementById('memo').value='<?php echo $memo ?>';
                                                document.getElementById('date').innerHTML='<?php echo $row5['date'] ?>';
                                                document.getElementById('inst').innerHTML='<?php echo $name2; ?>';
                                                document.getElementById('topic').innerHTML='<?php echo $tData ?>';
                                                document.getElementById('comment').innerHTML='<?php echo $row5['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#memoinfo" id="cl_sy"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>


                  </tr>

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

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <div>
          <h1 class="card-subtitle" style="float:left;text-transform: uppercase;"><a href="<?php echo BASE_URL; ?>includes/Pages/discipline.php" class="text-success">Discipline</a>
            <h1>

              <?php
              $absQ = $connect->query("SELECT * FROM discipline WHERE student_id = '$fetchuser_id' AND categoryId = 'absent'");
              $absDay = 0;
              while ($absData = $absQ->fetch()) {
                $absDay = $absDay + $absData['dismarks'];
              }
              ?>
              <h3 style="float:right; display:flex;" class="text-danger">Abscent
                <input type="hidden" value="" name="">
                <p> - <?php echo $absDay; ?></p>
              </h3>



        </div><br>

        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">
            <?php
            if ($fetchuser_id != '0') {
              $query6 = "SELECT * FROM discipline where course_id='$std_course1' and student_id='$fetchuser_id' AND categoryId != 'absent' ORDER BY id DESC LIMIT 3";
              $statement6 = $connect->prepare($query6);
              $statement6->execute();
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
                if ($tData != "absent") {
            ?>
                  <tr>

                    <h4 class="text-dark" style="cursor:pointer;"><a onclick="document.getElementById('desci').value='<?php echo $desci ?>';
                                                document.getElementById('date_desc').innerHTML='<?php echo $row6['date'] ?>';
                                                document.getElementById('inst_desc').innerHTML='<?php echo $name2_d ?>';
                                                document.getElementById('topic_desc').innerHTML='<?php echo $tData ?>';
                                                document.getElementById('comment_desc').innerHTML='<?php echo $row6['comment'] ?>';
                                " data-bs-toggle="modal" data-bs-target="#disciplineinfo" id="cl_sy1"><span class="legend-indicator bg-primary"></span><?php echo $tData; ?></a></h4><br>
                  </tr>

            <?php }
              }
            } ?>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->


      </div>
    </div>
  </div>

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle" style="text-transform: uppercase;"><a href="<?php echo BASE_URL; ?>includes/Pages/CAP.php" class="text-success">CAP</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12">
            <?php
            if ($fetchuser_id != '0') {
              $query6_c = "SELECT * FROM notifications where to_userid='$fetchuser_id' and extra_data='reached_cout' ORDER BY id DESC LIMIT 3";
              $statement6_c = $connect->prepare($query6_c);
              $statement6_c->execute();
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



                  <h4 class="text-dark" style="cursor:pointer;"><a style="color:<?php echo $bgColor; ?>" onclick="document.getElementById('capname').innerHTML='<?php echo $data_value ?>';
                                    document.getElementById('capmodalcolor').style.backgroundColor='<?php echo $bgColor ?>';
                                " data-bs-toggle="modal" data-bs-target="#CAPinfo" class="get_cap_noti" id="<?php echo $row7['id']; ?>"><span class="legend-indicator" style="background-color:<?php echo $bgColor; ?>"></span><?php echo $data_value ?></a></h4>


                </tr>

            <?php }
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

<!-- Stats -->
<div class="row">

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle" style="text-transform: uppercase;"><a href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php" class="text-success">Additional Task</a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">
            <?php
            if ($fetchuser_id != '0') {
              $query_add = "SELECT * FROM additional_task where assign_class_table IS NULL and Stud_id='$fetchuser_id'";
              $statement_Add = $connect->prepare($query_add);
              $statement_Add->execute();
              if ($statement_Add->rowCount() > 0) {
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

                  <a class="badge bg-soft-secondary rounded-pill m-2 text-dark" style="font-size:medium;cursor:pointer;"><?php echo $addname1; ?></a>
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

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle" style="text-transform: uppercase;"><a href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php" class="text-success">Unaccomplish Task</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col">
            <?php
            if ($fetchuser_id != '0') {
              $query_acc = "SELECT * FROM accomplish_task where assign_class_table IS null and Stud_ac='$fetchuser_id'";
              $statement_acc = $connect->prepare($query_acc);
              $statement_acc->execute();
              if ($statement_acc->rowCount() > 0) {
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

                    <a class="badge bg-soft-secondary rounded-pill m-2 text-dark" style="font-size:medium; cursor: pointer;"><?php echo $fetchname; ?></a>
            <?php }
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

  <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle" style="text-transform: uppercase;"><a href="<?php echo BASE_URL; ?>includes/Pages/checklistpage.php" class="text-success">CheckList</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12">
            <?php
            if ($fetchuser_id != '0') {
              $query5 = "SELECT * FROM checklist WHERE ctp = '$std_course1' ORDER BY id DESC LIMIT 3";
              $statement5 = $connect->prepare($query5);
              $statement5->execute();
              $result5 = $statement5->fetchAll();
              foreach ($result5 as $row6) {
                $memo = $row6['id'];

            ?>
                <tr>

                  <h4 class="text-dark" style="cursor:pointer;"><a class="fetchSubCheckList" href="" data-name="<?php echo $row6['checklist']; ?>" data-bs-toggle="modal" data-id="<?php echo $row6['id']; ?>" data-bs-target="#subchecklistcheck" data-bs-title="Sub Checklist List"><span class="legend-indicator bg-primary"></span><?php echo $row6['checklist']; ?></a></h4><br>


                </tr>

            <?php }
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

<!--clearnce log row-->
<div class="row">

  <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle text-success" style="text-transform: uppercase;"><a href="<?php echo BASE_URL; ?>includes/Pages/clearance.php" class="text-success">Clearance Log</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <div class="row gx-2 mb-1">
              <?php $item_name1 = "";
              $eme_get_subid = "";
              $iconed = "";
              $query_clearnace = "SELECT * FROM clearance_data where ctp_id='$std_course1'";
              $statement_clearnace = $connect->prepare($query_clearnace);
              $statement_clearnace->execute();
              if ($statement_clearnace->rowCount() > 0) {
                $result_clearnace = $statement_clearnace->fetchAll();
                $sn = 1;
                foreach ($result_clearnace as $row_clearnace) {
                  $iconed = "";
                  $eme_id = $row_clearnace['id'];

                  $eme_get_id = $row_clearnace['item'];
                  $eme_get_subid = $row_clearnace['subitem'];
                  if ($eme_get_id != 0) {
                    $q1 = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                    $q1->execute([$eme_get_id]);
                    $item_name1 = $q1->fetchColumn();
                  } else if ($eme_get_subid != 0) {
                    $q1 = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
                    $q1->execute([$eme_get_subid]);
                    $item_name1 = $q1->fetchColumn();
                  }
                  $cl_value = $connect->prepare("SELECT class_id FROM `clearance_student_id` WHERE clearance_id=? and stud_id='$fetchuser_id'");
                  $cl_value->execute([$eme_id]);
                  $cl_value_name1 = $cl_value->fetchColumn();


              ?>
                  <div class="col-auto">
                    <?php if ($cl_value_name1 != null) {
                      $iconed = '<i class="bi bi-check-circle text-success m-2"></i>';
                    ?>
                      <a class="badge bg-soft-success rounded-pill mb-3 text-dark" href="clearance.php" style="font-size: medium; cursor:pointer;"><?php echo $iconed . $item_name1 . "  "; ?></a>
                    <?php
                    } ?>
                  </div>
                <?php
                }

                ?>
                <hr>

                <?php
                foreach ($result_clearnace as $row_clearnace) {
                  $iconed = "";
                  $eme_id = $row_clearnace['id'];

                  $eme_get_id = $row_clearnace['item'];
                  $eme_get_subid = $row_clearnace['subitem'];
                  if ($eme_get_id != 0) {
                    $q1 = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                    $q1->execute([$eme_get_id]);
                    $item_name1 = $q1->fetchColumn();
                  } else if ($eme_get_subid != 0) {
                    $q1 = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
                    $q1->execute([$eme_get_subid]);
                    $item_name1 = $q1->fetchColumn();
                  }
                  $cl_value = $connect->prepare("SELECT class_id FROM `clearance_student_id` WHERE clearance_id=? and stud_id='$fetchuser_id'");
                  $cl_value->execute([$eme_id]);
                  $cl_value_name1 = $cl_value->fetchColumn();


                ?>
                  <div class="col-auto">
                    <?php if ($cl_value_name1 == null) {
                      $iconed = '<i class="bi bi-x-circle text-danger m-2"></i>';
                    ?>
                      <a class="badge bg-soft-danger rounded-pill mt-2 text-dark" href="clearance.php" style="font-size:medium; cursor:pointer;"><?php echo $iconed . $item_name1 . "  "; ?></a>
                    <?php
                    } ?>
                  </div>
              <?php
                }
              }

              ?>
              <!-- End Col -->
            </div>
          </div>
          <!-- End phase progressbar -->
          <!-- End Col -->
        </div>



      </div>
    </div>
    <!-- End Card -->
  </div>

</div>
<!-- Stats -->
<div class="row">

  <div class="col-lg-12 col-lg-12 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h6 class="card-subtitle" style="text-transform: uppercase;"><a class="text-success">What's Next</a></h6>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">

            <?php
            $dayQ = $connect->query("SELECT DISTINCT class_id, class_table FROM prereuisite_data ORDER BY class_table ASC");
            $ctable = '';
            while ($daysdata = $dayQ->fetch()) {
              $classId = $daysdata['class_id'];
              $classTable = $daysdata['class_table'];

              if ($ctable != $classTable) {
                if ($classTable == "actual") {
                  $img = '<img style="height:25px; width:25px; margin-left: 20px;" src="' . BASE_URL . 'assets/svg/3d_icons_green/Actual_class.png">';
                }
                if ($classTable == "academic") {
                  $img = '<img style="height:25px; width:25px; margin-left: 20px;" src="' . BASE_URL . 'assets/svg/3d_icons_green/Academics.png">';
                }
                if ($classTable == "sim") {
                  $img = '<img style="height:25px; width:25px; margin-left: 20px;" src="' . BASE_URL . 'assets/svg/3d_icons_green/Stimulation_Class.png">';
                }
                if ($classTable == "test") {
                  $img = '<img style="height:25px; width:25px; margin-left: 20px;" src="' . BASE_URL . 'assets/svg/3d_icons_green/Test_class.png">';
                }
            ?>
                <div style="margin-top:20px;">

                  <h2 style="margin-top:-10px; text-transform: capitalize;" id="phase" class="text-primary"> <?php echo $img; ?> <?php echo $classTable; ?>
                  </h2>
                </div>
                <hr>
                <?php
                $ctable = $classTable;
                if ($ctable == 'actual') {
                  $fetch_pr_next = "SELECT id,symbol,'actual' AS table_name FROM actual WHERE ctp = '$std_course1'";
                } else if ($ctable == 'academic') {
                  $fetch_pr_next = "SELECT id,shortacademic,'academic' AS table_name FROM academic WHERE ctp = '$std_course1'";
                } else if ($ctable == 'sim') {
                  $fetch_pr_next = "SELECT id,shortsim,'sim' AS table_name FROM sim WHERE ctp = '$std_course1'";
                } else if ($ctable == 'test') {
                  $fetch_pr_next = "SELECT id,shorttest,'test' AS table_name FROM  test WHERE ctp = '$std_course1'";
                }
                $fetch_pr_nextstatement1 = $connect->prepare($fetch_pr_next);
                $fetch_pr_nextstatement1->execute();
                $fetch_pr_nextresult1 = $fetch_pr_nextstatement1->fetchAll();
                foreach ($fetch_pr_nextresult1 as $row115) {
                  $table_name1 = $row115["table_name"];
                  $symbol_id1 = $row115["id"];
                  $get_data = "SELECT * FROM prereuisite_data where class_id='$symbol_id1' and class_table='$table_name1'";
                  $get_datast = $connect->prepare($get_data);
                  $get_datast->execute();
                  if ($get_datast->rowCount() == 0) {
                    if ($table_name1 == "actual") {
                      $qu_ery_1 = $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                      $qu_ery_1->execute([$symbol_id1]);
                      $name111 = $qu_ery_1->fetchColumn();
                      $sql = "SELECT count(*) FROM `gradesheet` WHERE class='actual' and class_id='$symbol_id1' and user_id='$fetchuser_id'";

                      $qu_ery_11 = $connect->prepare("SELECT actual FROM actual WHERE id=?");
                      $qu_ery_11->execute([$symbol_id1]);
                      $name11122 = $qu_ery_11->fetchColumn();

                      $result = $connect->prepare($sql);
                      $result->execute();
                      $number_of_rows = $result->fetchColumn();
                      if ($number_of_rows == 0) { ?>
                        <a style="margin:5px;position:relative;" class="btn btn-danger btn-flip11"><?php echo $name111 ?>
                          <span class="tooltip-text1" class="top1" style="white-space: nowrap;"><?php echo $name11122; ?></span>
                        </a>
                      <?php }
                    } else if ($table_name1 == "sim") {
                      $qu_ery_1 = $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                      $qu_ery_1->execute([$symbol_id1]);
                      $name111 = $qu_ery_1->fetchColumn();

                      $qu_ery_11 = $connect->prepare("SELECT sim FROM sim WHERE id=?");
                      $qu_ery_11->execute([$symbol_id1]);
                      $name11122 = $qu_ery_11->fetchColumn();

                      $sql11 = "SELECT count(*) FROM `gradesheet` WHERE class='sim' and class_id='$symbol_id1' and user_id='$fetchuser_id'";
                      $result11 = $connect->prepare($sql11);
                      $result11->execute();
                      $number_of_rows1 = $result11->fetchColumn();
                      if ($number_of_rows1 == 0) { ?>
                        <a style="margin:5px;position:relative;" class="btn btn-danger btn-flip11"><?php echo $name111 ?>
                          <span class="tooltip-text1" class="top1" style="white-space: nowrap;"><?php echo $name11122; ?></span>
                        </a>
                      <?php }
                    } else if ($table_name1 == "academic") {

                      $qu_ery_1 = $connect->prepare("SELECT shortacademic FROM academic WHERE id=?");
                      $qu_ery_1->execute([$symbol_id1]);
                      $name111 = $qu_ery_1->fetchColumn();

                      $qu_ery_11 = $connect->prepare("SELECT academic FROM academic WHERE id=?");
                      $qu_ery_11->execute([$symbol_id1]);
                      $name11122 = $qu_ery_11->fetchColumn();

                      $qu_ery_111 = $connect->prepare("SELECT academic FROM academic WHERE id=?");
                      $qu_ery_111->execute([$symbol_id1]);
                      $fileData = $qu_ery_111->fetchColumn();

                      $sql12 = "SELECT count(*) FROM `acedemic_stu` WHERE permission='1' and acedemic_id='$symbol_id1' and std_id='$fetchuser_id'";
                      $result12 = $connect->prepare($sql12);
                      $result12->execute();
                      $number_of_rows1 = $result12->fetchColumn();
                      if ($number_of_rows1 == 0) { ?>
                        <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/upload/<?php echo $fileData; ?>" style="margin:5px;position:relative;" class="btn btn-danger btn-flip11"><?php echo $name111 ?>
                          <span class="tooltip-text1" class="top1" style="white-space: nowrap;"><?php echo $name11122; ?></span>
                        </a>
                      <?php }
                    } else if ($table_name1 == "test") {
                      $qu_ery_1 = $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                      $qu_ery_1->execute([$symbol_id1]);
                      $name111 = $qu_ery_1->fetchColumn();

                      $qu_ery_11 = $connect->prepare("SELECT test FROM test WHERE id=?");
                      $qu_ery_11->execute([$symbol_id1]);
                      $name11122 = $qu_ery_11->fetchColumn();

                      $sql13 = "SELECT count(*) FROM `test_data` WHERE course_id='$std_course1' and test_id='$symbol_id1' and student_id='$fetchuser_id'";
                      $result13 = $connect->prepare($sql13);
                      $result13->execute();
                      $number_of_rows1 = $result13->fetchColumn();
                      if ($number_of_rows1 == 0) { ?>
                        <a style="margin:5px;position:relative;" class="btn btn-danger btn-flip11"><?php echo $name111 ?>
                          <span class="tooltip-text1" class="top1" style="white-space: nowrap;"><?php echo $name11122; ?></span>
                        </a>
                      <?php }
                    }
                  }
                }
              }
              $prereqId = $connect->query("SELECT * FROM prereuisite_data WHERE class_id = '$classId' AND class_table = '$classTable'");
              $prereqId1 = $connect->query("SELECT count(*) FROM prereuisite_data WHERE class_id = '$classId' AND class_table = '$classTable'");
              $countPre1 = $prereqId1->fetchColumn();
              $countPre = 0;
              // echo $countPre."<br>";
              while ($prereqData = $prereqId->fetch()) {
                $preReqId = $prereqData['prereui_id'];
                $preReqTable = $prereqData['prereui_table'];
                if ($classTable == "actual") {
                  if ($preReqTable == "actual" || $preReqTable == "sim") {
                    $sql = "SELECT count(*) FROM `gradesheet` WHERE class='$preReqTable' and class_id='$preReqId' and user_id='$fetchuser_id'";
                    $result = $connect->prepare($sql);
                    $result->execute();
                    $number_of_rows = $result->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }
                  if ($preReqTable == "academic") {
                    $sql12 = "SELECT count(*) FROM `acedemic_stu` WHERE permission='1' and acedemic_id='$preReqId' and std_id='$fetchuser_id'";
                    $result12 = $connect->prepare($sql12);
                    $result12->execute();
                    $number_of_rows = $result12->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }

                  if ($preReqTable == "test") {
                    $sql13 = "SELECT count(*) FROM `test_data` WHERE course_id='$std_course1' and test_id='$preReqId' and student_id='$fetchuser_id'";
                    $result13 = $connect->prepare($sql13);
                    $result13->execute();
                    $number_of_rows = $result13->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }
                }

                if ($classTable == "academic") {
                  if ($preReqTable == "actual" || $preReqTable == "sim") {
                    $sql = "SELECT count(*) FROM `gradesheet` WHERE class='$preReqTable' and class_id='$preReqId' and user_id='$fetchuser_id'";
                    $result = $connect->prepare($sql);
                    $result->execute();
                    $number_of_rows = $result->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }
                  if ($preReqTable == "academic") {
                    $sql12 = "SELECT count(*) FROM `acedemic_stu` WHERE permission='1' and acedemic_id='$preReqId' and std_id='$fetchuser_id'";
                    $result12 = $connect->prepare($sql12);
                    $result12->execute();
                    $number_of_rows = $result12->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }

                  if ($preReqTable == "test") {
                    $sql13 = "SELECT count(*) FROM `test_data` WHERE course_id='$std_course1' and test_id='$preReqId' and student_id='$fetchuser_id'";
                    $result13 = $connect->prepare($sql13);
                    $result13->execute();
                    $number_of_rows = $result13->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }
                }

                if ($classTable == "sim") {
                  if ($preReqTable == "actual" || $preReqTable == "sim") {
                    $sql = "SELECT count(*) FROM `gradesheet` WHERE class='$preReqTable' and class_id='$preReqId' and user_id='$fetchuser_id'";
                    $result = $connect->prepare($sql);
                    $result->execute();
                    $number_of_rows = $result->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }
                  if ($preReqTable == "academic") {
                    $sql12 = "SELECT count(*) FROM `acedemic_stu` WHERE permission='1' and acedemic_id='$preReqId' and std_id='$fetchuser_id'";
                    $result12 = $connect->prepare($sql12);
                    $result12->execute();
                    $number_of_rows = $result12->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }

                  if ($preReqTable == "test") {
                    $sql13 = "SELECT count(*) FROM `test_data` WHERE course_id='$std_course1' and test_id='$preReqId' and student_id='$fetchuser_id'";
                    $result13 = $connect->prepare($sql13);
                    $result13->execute();
                    $number_of_rows = $result13->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }
                }



                if ($classTable == "test") {

                  if ($preReqTable == "actual" || $preReqTable == "sim") {
                    $sql = "SELECT count(*) FROM `gradesheet` WHERE class='$preReqTable' and class_id='$preReqId' and user_id='$fetchuser_id'";
                    $result = $connect->prepare($sql);
                    $result->execute();
                    $number_of_rows = $result->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }
                  if ($preReqTable == "academic") {
                    $sql12 = "SELECT count(*) FROM `acedemic_stu` WHERE permission='1' and acedemic_id='$preReqId' and std_id='$fetchuser_id'";
                    $result12 = $connect->prepare($sql12);
                    $result12->execute();
                    $number_of_rows = $result12->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }

                  if ($preReqTable == "test") {
                    $sql13 = "SELECT count(*) FROM `test_data` WHERE course_id='$std_course1' and test_id='$preReqId' and student_id='$fetchuser_id'";
                    $result13 = $connect->prepare($sql13);
                    $result13->execute();
                    $number_of_rows = $result13->fetchColumn();
                    $countPre = $countPre + $number_of_rows;
                  }
                }
              }
              if ($classTable == "actual") {
                if ($countPre == $countPre1) {
                  $qu_ery_1 = $connect->prepare("SELECT symbol FROM actual WHERE id = ? AND ctp = ?");
                  $qu_ery_1->execute([$classId, $std_course1]);
                  $name111 = $qu_ery_1->fetchColumn();

                  $qu_ery_12 = $connect->prepare("SELECT actual FROM actual WHERE id = ? AND ctp = ?");
                  $qu_ery_12->execute([$classId, $std_course1]);
                  $name11122 = $qu_ery_12->fetchColumn();

                  $checkAca = $connect->query("SELECT count(*) FROM gradesheet WHERE class_id = '$classId' AND class = 'actual' AND user_id = '$fetchuser_id'");
                  $acaCount = $checkAca->fetchColumn();

                  if ($name111 != "") {
                    if ($acaCount <= 0) {
                      ?>
                      <a style="margin:5px;position:relative;" class="btn btn-danger btn-flip11"><?php echo $name111 ?>
                        <span class="tooltip-text1" class="top1" style="white-space: nowrap;"><?php echo $name11122; ?></span>
                      </a>
                    <?php
                    }
                  }
                }
              }

              if ($classTable == "academic") {
                if ($countPre == $countPre1) {
                  $qu_ery_1 = $connect->prepare("SELECT shortacademic FROM academic WHERE id = ? AND ctp = ?");
                  $qu_ery_1->execute([$classId, $std_course1]);
                  $name111 = $qu_ery_1->fetchColumn();

                  $checkAca = $connect->query("SELECT count(*) FROM acedemic_stu WHERE acedemic_id = '$classId' AND std_id = '$fetchuser_id'");
                  $acaCount = $checkAca->fetchColumn();

                  $qu_ery_12 = $connect->prepare("SELECT academic FROM academic WHERE id = ? AND ctp = ?");
                  $qu_ery_12->execute([$classId, $std_course1]);
                  $name11122 = $qu_ery_12->fetchColumn();

                  $fileName = $connect->prepare("SELECT file FROM academic WHERE id = ? AND ctp = ?");
                  $fileName->execute([$classId, $std_course1]);
                  $fileData = $fileName->fetchColumn();

                  if ($name111 != "") {
                    if ($acaCount <= 0) {
                    ?>
                      <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/upload/<?php echo $fileData; ?>" style="margin:5px;position:relative;" class="btn btn-danger btn-flip11"><?php echo $name111 ?>
                        <span class="tooltip-text1" class="top1" style="white-space: nowrap;"><?php echo $name11122; ?></span>
                      </a>

                    <?php
                    }
                  }
                }
              }

              if ($classTable == "sim") {
                if ($countPre == $countPre1) {
                  $qu_ery_1 = $connect->prepare("SELECT shortsim FROM sim WHERE id = ? AND ctp = ?");
                  $qu_ery_1->execute([$classId, $std_course1]);
                  $name111 = $qu_ery_1->fetchColumn();

                  $qu_ery_12 = $connect->prepare("SELECT sim FROM sim WHERE id = ? AND ctp = ?");
                  $qu_ery_12->execute([$classId, $std_course1]);
                  $name11122 = $qu_ery_12->fetchColumn();

                  $checkAca = $connect->query("SELECT count(*) FROM gradesheet WHERE class_id = '$classId' AND class = 'sim' AND user_id = '$fetchuser_id'");
                  $acaCount = $checkAca->fetchColumn();
                  if ($name111 != "") {
                    if ($acaCount <= 0) {
                    ?>
                      <a style="margin:5px;position:relative;" class="btn btn-danger btn-flip11"><?php echo $name111 ?>
                        <span class="tooltip-text1" class="top1" style="white-space: nowrap;"><?php echo $name11122; ?></span>
                      </a>
                    <?php
                    }
                  }
                }
              }

              if ($classTable == "test") {
                if ($countPre == $countPre1) {

                  $qu_ery_1 = $connect->prepare("SELECT shorttest FROM test WHERE id = ? AND ctp = ?");
                  $qu_ery_1->execute([$classId, $std_course1]);
                  $name111 = $qu_ery_1->fetchColumn();

                  $qu_ery_12 = $connect->prepare("SELECT test FROM test WHERE id = ? AND ctp = ?");
                  $qu_ery_12->execute([$classId, $std_course1]);
                  $name11122 = $qu_ery_12->fetchColumn();

                  $checkAca = $connect->query("SELECT count(*) FROM test_data WHERE test_id = '$classId' AND student_id = '$fetchuser_id'");
                  $acaCount = $checkAca->fetchColumn();
                  if ($name111 != "") {
                    if ($acaCount <= 0) {
                    ?>
                      <a style="margin:5px;position:relative;" class="btn btn-danger btn-flip11"><?php echo $name111 ?>
                        <span class="tooltip-text1" class="top1" style="white-space: nowrap;"><?php echo $name11122; ?></span>
                      </a>
            <?php
                    }
                  }
                }
              }
            }
            ?>

          </div>
        </div>


        <!-- End Row -->


      </div>
    </div>
    <!-- End Card -->
  </div>

</div>

<?php
$checkConPer = $connect->query("SELECT * FROM rolepermission WHERE rolePermission = '$role' OR rolePermission = '$user_id'");
while ($perData = $checkConPer->fetch()) {
?>
  <div class="row aaaaaa d-none">

    <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
      <!-- Card -->
      <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
        <div class="card-body">
          <h6 class="card-subtitle"><a class="text-success"><?php echo $perData['cardName']; ?></a></h6>
          <hr class="text-success">

          <div class="row align-items-center gx-2 mb-2">
            <div class="col-12">


            </div>
            <!-- End Col -->
          </div>



        </div>
      </div>
      <!-- End Card -->
    </div>

  </div>
<?php
}
?>


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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputclasses');
    const cardList = document.getElementById('searchClasses');
    const cards = cardList.querySelectorAll('.aaayyy');

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.touppercase();

      cards.forEach(card => {
        const ayushiElement = card.querySelector('.badge');
        const cardContent = ayushiElement.textContent.touppercase();

        if (cardContent.includes(searchTerm)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputclassesacademic');
    const cardList = document.getElementById('searchClassesacademic');
    const cards = cardList.querySelectorAll('.archana');

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.touppercase();

      cards.forEach(card => {
        const ayushiElement = card.querySelector('.badge');
        const cardContent = ayushiElement.textContent.touppercase();

        if (cardContent.includes(searchTerm)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInputclassestest');
    const cardList = document.getElementById('searchClassestest');
    const cards = cardList.querySelectorAll('.varun');

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.touppercase();

      cards.forEach(card => {
        const ayushiElement = card.querySelector('.badge');
        const cardContent = ayushiElement.textContent.touppercase();

        if (cardContent.includes(searchTerm)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
</script>



<script>
  $(document).ready(function() {
    $("#generateReportBtn").on("click", function(event) {
      event.preventDefault();
      $("#progressMessage").html('Generating report...'); // Display initial message
      $("#downloadProgress").attr('value', 0);

      // Make an AJAX request to generate the report
      $.ajax({
        url: '<?php echo BASE_URL;?>includes/Pages/generate_report.php',
        type: 'GET',
        dataType: 'json',
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
              var percentComplete = (evt.loaded / evt.total) * 100;
              $("#downloadProgress").attr('value', percentComplete);
              $("#progressMessage").html('Downloading... ' + percentComplete.toFixed(2) + '%'); // Update the message with the percentage
            }
          }, false);
          return xhr;
        },
        success: function(response) {

          if (response.status === 'success') {
            window.open(response.downloadUrl, '_blank');
            alert('Report download complete.');
            $("#progressMessage").html('Download complete.');
            $("#downloadProgress").attr('value', 100);
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