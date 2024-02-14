<div class="row align-items-center gx-2 mb-2">
    <div class="col-12">
        <?php
        $total_class = "";
        $queryTotal = "SELECT MAX(days) AS max_days,MIN(days) AS min_days
                              FROM (
                                  SELECT days FROM actual WHERE ctp = '$std_course1'
                                  UNION ALL
                                  SELECT days FROM sim WHERE ctp = '$std_course1'
                                  UNION ALL
                                  SELECT days FROM test WHERE ctp = '$std_course1'
                                  UNION ALL
                                  SELECT days FROM academic WHERE ctp = '$std_course1'
                              ) AS all_days";

        // Execute the query and fetch the result
        $statementTotal = $connect->prepare($queryTotal);
        $statementTotal->execute();
        $resultTotal = $statementTotal->fetch(PDO::FETCH_ASSOC);
        $total_class = $resultTotal['max_days'];
        $total_class1 = $resultTotal['min_days'];
        $count_del = $total_class - $total_class1;
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
                $phaseQ = $connect->query("SELECT *
                FROM phase
                INNER JOIN test_phase ON phase.id = test_phase.phase
                WHERE phase.ctp = '$std_course1'");
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