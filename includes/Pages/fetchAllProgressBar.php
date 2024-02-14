<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    $course_Code = $_REQUEST['courseCode'];
    $course_Name = $_REQUEST['courseName'];
    $c_id = $_REQUEST['courseId'];
    $total_class = "";
    $queryTotal = "SELECT MAX(days) AS max_days,MIN(days) AS min_days FROM (SELECT days FROM actual WHERE ctp = '$std_course1' UNION ALL SELECT days FROM sim WHERE ctp = '$std_course1' UNION ALL SELECT days FROM test WHERE ctp = '$std_course1' UNION ALL SELECT days FROM academic WHERE ctp = '$std_course1') AS all_days";

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
        $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id'");
        while ($getCourseData = $getCourse->fetch()) {
            $course_Code = $getCourseData['CourseCode'];
            $course_Name = $getCourseData['CourseName'];
            $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
            while ($selecAllUserData = $selecAllUser->fetch()) {
                $uID = $selecAllUserData['StudentNames'];
                $classNames = ["actual", "sim", "test", "academic"];
                $counter = 0;
                $totalElements = count($classNames);
                while ($counter < $totalElements) {
                    $currentData = $classNames[$counter];

                    if ($currentData == "actual") {
                        $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                        while ($acData = $acQ->fetch()) {
                            $acId = $acData['id'];
                            $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$uID' AND over_all_grade IS NOT NULL");
                            $cdata = $sql->fetchColumn();
                            $totalCount = $totalCount + $cdata;
                        }
                    }

                    if ($currentData == "sim") {
                        $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                        while ($acData = $acQ->fetch()) {
                            $acId = $acData['id'];
                            $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$uID' AND over_all_grade IS NOT NULL");
                            $cdata = $sql->fetchColumn();
                            $totalCount = $totalCount + $cdata;
                        }
                    }

                    if ($currentData == "test") {
                        $acQ = $connect->query("SELECT * FROM test WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                        while ($acData = $acQ->fetch()) {
                            $acId = $acData['id'];
                            $sql = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id='$acId' AND student_id='$uID' AND status IS NOT NULL");
                            $cdata = $sql->fetchColumn();
                            $totalCount = $totalCount + $cdata;
                        }
                    }

                    if ($currentData == "academic") {
                        $acQ = $connect->query("SELECT * FROM academic WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                        while ($acData = $acQ->fetch()) {
                            $acId = $acData['id'];
                            $sql = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id='$uID' AND acedemic_id = '$acId'");
                            $cdata = $sql->fetchColumn();
                            $totalCount = $totalCount + $cdata;
                        }
                    }

                    $counter++;
                }
            }
        }
    }
    ?>

    <div class="ggggg" style="display: -webkit-inline-box;margin-bottom: -80px;float: left;">
        <h1 class="card-subtitle" style="margin:5px;font-size: 30px !important;"><?php echo $totalCount; ?>/<?php echo $totalClass; ?>
        </h1>
    </div>
    <div style="float: right;">
        <a class="btn btn-soft-secondary" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/yearClaendar.php"><img style="height: 20px;width: 20px;" src="<?php echo BASE_URL; ?>assets/svg/menuicon/calendar.png" title="Cource Calendar"><br>
            <span>View Calendar</span>
        </a>
    </div>
    <br><br>

    <hr class="text-success">
    <div>
        <span style="float: left; font-size:large;" class="badge bg-success rounded-pill mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Start">
            <?php
            $course_id = $_COOKIE['course_ids'];
            $fetchDate = $connect->query("SELECT CourseDate FROM newcourse WHERE Courseid = '$course_id'");
            $dateString = $fetchDate->fetchColumn();

            $fetchStu = $connect->query("SELECT * FROM newcourse WHERE CourseName = '$std_course1' AND CourseCode = '$course_Code'");
            while ($fetchStuData = $fetchStu->fetch()) {
                $stId = $fetchStuData['StudentNames'];
                $fetchFirstDate = $connect->query("SELECT MIN(CAST(created_at AS DATE)) AS smallest_date FROM gradesheet WHERE user_id = '$stId' AND course_id = '$std_course1'");
                $stDate = $fetchFirstDate->fetchColumn();
                if ($stDate > 0) {
                    if (strtotime($stDate) < strtotime($dateString)) {
                        $dateString = $stDate;
                    }
                }
                $fetchFirstDate = $connect->query("SELECT MIN(CAST(acedemic_stu.date AS DATE)) AS smallest_date FROM acedemic_stu INNER JOIN academic ON acedemic_stu.acedemic_id = academic.id WHERE academic.ctp = '$std_course1' AND acedemic_stu.std_id = '$stId'");
                $stDate = $fetchFirstDate->fetchColumn();
                if ($stDate > 0) {
                    if (strtotime($stDate) < strtotime($dateString)) {
                        $dateString = $stDate;
                    }
                }
                $fetchFirstDate = $connect->query("SELECT MIN(CAST(created AS DATE)) AS smallest_date FROM test_data INNER JOIN test ON test_data.test_id = test.id WHERE test.ctp = '$std_course1' AND test_data.student_id = '$stId' AND (test_data.status != '0' AND test_data.status != '')");
                $stDate = $fetchFirstDate->fetchColumn();
                if ($stDate > 0) {
                    if (strtotime($stDate) < strtotime($dateString)) {
                        $dateString = $stDate;
                    }
                }
            }
            $timestamp = strtotime($dateString);
            echo $cStartDate =  date("d-F-y", $timestamp); ?> </span>
        <span style="float:right; font-size:large;" class="badge bg-danger rounded-pill mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="End">

            <?php
            //  include(ROOT_PATH .  'includes/Pages/endDateCalculation.php'); 
            $fetchCourseDepart = $connect->query("SELECT departmentId FROM course_in_department WHERE courseCode = '$course_Code' AND courseName = '$std_course1' GROUP BY courseCode,courseName");
            $departmentID = $fetchCourseDepart->fetchColumn();
            // echo $std_course1;
            $fetchStu = $connect->query("SELECT * FROM newcourse WHERE CourseName = '$std_course1' AND CourseCode = '$course_Code'");
            $dateArr = [];
            $dateArrCount = 0;
            while ($fetchStuData = $fetchStu->fetch()) {
                $stId = $fetchStuData['StudentNames'];
                $totalCount = 0;

                $classNames = ["actual", "sim", "test", "academic"];
                $counter = 0;
                $totalElements = count($classNames);
                while ($counter < $totalElements) {
                    $currentData = $classNames[$counter];

                    if ($currentData == "actual") {
                        $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1'");
                        while ($acData = $acQ->fetch()) {
                            $acId = $acData['id'];
                            $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$stId' AND over_all_grade IS NOT NULL");
                            $cdata = $sql->fetchColumn();
                            $totalCount = $totalCount + $cdata;
                        }
                    }

                    if ($currentData == "sim") {
                        $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1'");
                        while ($acData = $acQ->fetch()) {
                            $acId = $acData['id'];
                            $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$stId' AND over_all_grade IS NOT NULL");
                            $cdata = $sql->fetchColumn();
                            $totalCount = $totalCount + $cdata;
                        }
                    }

                    if ($currentData == "test") {
                        $acQ = $connect->query("SELECT * FROM test WHERE ctp = '$std_course1'");
                        while ($acData = $acQ->fetch()) {
                            $acId = $acData['id'];
                            $sql = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id='$acId' AND student_id='$stId' AND status IS NOT NULL");
                            $cdata = $sql->fetchColumn();
                            $totalCount = $totalCount + $cdata;
                        }
                    }

                    if ($currentData == "academic") {
                        $acQ = $connect->query("SELECT * FROM academic WHERE ctp = '$std_course1'");
                        while ($acData = $acQ->fetch()) {
                            $acId = $acData['id'];
                            $sql = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id='$stId' AND acedemic_id = '$acId'");
                            $cdata = $sql->fetchColumn();
                            $totalCount = $totalCount + $cdata;
                        }
                    }

                    $counter++;
                }

                $endDay = $totalClass - $totalCount;

                $fet = $connect->query("SELECT id,symbol,days,'actual' AS table_name FROM actual where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shortsim,days,'sim' AS table_name FROM sim where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shortacademic,days,'academic' AS table_name FROM academic where ctp='$std_course1' AND days IS NOT NULL UNION ALL SELECT id,shorttest,days,'test' AS table_name FROM  test where ctp='$std_course1' AND days IS NOT NULL ORDER BY days");
                $days = 0;
                $countSameDay = 0;
                while ($fetData = $fet->fetch()) {
                    $symbol_id = $fetData["id"];
                    $table_name = $fetData["table_name"];
                    if ($table_name == "actual" || $table_name == "sim") {
                        $checkGradeSheet = $connect->query("SELECT count(*) FROM gradesheet WHERE course_id = '$std_course1' AND user_id = '$stId' AND class_id = '$symbol_id' AND class = '$table_name' AND over_all_grade IS NOT NULL");
                    }
                    if ($table_name == "test") {
                        $checkGradeSheet = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id = '$symbol_id' AND student_id = '$stId' AND status IS NOT NULL");
                    }
                    if ($table_name == "academic") {
                        $checkGradeSheet = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id = '$stId' AND acedemic_id = '$symbol_id'");
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
                $fetchWeekEnd = $connect->query("SELECT weekend FROM progress_weekend WHERE ctpId = '$std_course1' AND courseCode = '$course_Code'");
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

                if (!in_array($courseStartDate, $dateArr)) {
                    $dateArr[] = $courseStartDate;
                }
            }
            // print_r($dateArr);
            $dateTimeObjects = array_map(function ($date) {
                return new DateTime($date);
            }, $dateArr);

            // Find the maximum DateTime object
            if (count($dateArr) > 0) {
                $maxDate = max($dateTimeObjects);
                $maxDate = $maxDate->format('Y-m-d');
                $timestamp = strtotime($maxDate);
                echo date("d-F-y", $timestamp);
            } else {
                echo "TBD";
            }
            ?>
        </span>
    </div><br><br>
    <div>
        <?php
        $phaseCountQ = $connect->query("SELECT count(*) FROM phase WHERE ctp = '$std_course1'");
        $pahseCountData = $phaseCountQ->fetchColumn();
        if ($pahseCountData > 0) {
            $phaseWidthPro = 100 / $pahseCountData;
        }
        ?>


        <?php
        $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
        while ($phaseData = $phaseQ->fetch()) {
            $countPercentage = [];

            $phase_ID = $phaseData['id'];
            $totalClass = 0;
            $queryTotalActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
            $totalClass1 = $queryTotalActualClass->fetchColumn();
            $queryTotalSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$phase_ID' AND ctp = '$std_course1'");
            $totalClass2 = $queryTotalSimClass->fetchColumn();
            $totalClass = $totalClass + $totalClass1 + $totalClass2;
            if ($phaseData['color'] != "") {
                $txtColor = $phaseData['color'];
            } else {
                $txtColor = "gray";
            }
            if ($totalClass > 0) {
                // echo '<span style="float:right;">' . $phaseData['phasename'] . '</span><br><br>';
        ?>
                <br><br>
                <p style="color:<?php echo $txtColor; ?>;position: relative;top: -25px;"><?php echo $phaseData['phasename'] ?></p>
                <div class="progress-container" style="margin-bottom: 20px;">
                    <div class="progress-bar" id="progress-bar">
                        <?php
                        $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");

                        $left = 1;
                        while ($selecAllUserData = $selecAllUser->fetch()) {
                            $totalCount = 0;
                            $progressPerPhase = 0;
                            $classesCompleted = 0;
                            $totalClassesPerPhase = 0;
                            $uID = $selecAllUserData['StudentNames'];
                            $classNames = ["actual", "sim"];
                            $counter = 0;
                            $totalElements = count($classNames);

                            while ($counter < $totalElements) {
                                $currentData = $classNames[$counter];

                                if ($currentData == "actual") {
                                    $acQ = $connect->query("SELECT * FROM actual WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                                    while ($acData = $acQ->fetch()) {
                                        $acId = $acData['id'];
                                        $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='actual' AND class_id='$acId' AND user_id='$uID'");
                                        $cdata = $sql->fetchColumn();
                                        $totalCount = $totalCount + $cdata;
                                    }
                                }

                                if ($currentData == "sim") {
                                    $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                                    while ($acData = $acQ->fetch()) {
                                        $acId = $acData['id'];
                                        $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$uID'");
                                        $cdata = $sql->fetchColumn();
                                        $totalCount = $totalCount + $cdata;
                                    }
                                }

                                $counter++;
                            }
                            $totalClassesPerPhase = $totalClass;
                            $classesCompleted = $totalCount;
                            if ($totalClassesPerPhase > 0) {
                                $progressPerPhase = ($classesCompleted / $totalClassesPerPhase) * 100;
                            }
                            if ($progressPerPhase > 100) {
                                $progressPerPhase = 100;
                            }

                            $countPercentage[] = $progressPerPhase;
                            $mainUserImg = $connect->query("SELECT file_name FROM users WHERE id = '$uID'");
                            $prof_pic11 = $mainUserImg->fetchColumn();
                            $user_data_Fe = $connect->query("SELECT nickname FROM users WHERE id = '$uID'");
                            $user_data_Fe_pic = $user_data_Fe->fetchColumn();
                            if ($prof_pic11 != "") {
                                $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                    $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                } else {
                                    $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                }
                            } else {
                                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                            }
                            // if ($progressPerPhase == 0) {
                            //   $l = 22;
                            // } else {
                            $l = 22;
                            // }
                        ?>
                            <div class="student-profile" style="left:0px;background-color: <?php echo $txtColor; ?>;width:<?php echo $progressPerPhase; ?>%;height:18px;cursor:pointer;" id="seeImgContainer<?php echo $phase_ID . $uID; ?>" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation data-percent="<?php echo $progressPerPhase; ?>" data-coursename="<?php echo $course_Name; ?>" data-coursecode="<?php echo $course_Code; ?>" data-totalclass="<?php echo $totalClass; ?>" data-ctp="<?php echo $std_course1; ?>" data-phaseid="<?php echo $phase_ID; ?>" data-id="<?php echo $classesCompleted; ?>">
                                <div class="avatar-group avatar-group-lg mb-3 student-image">
                                    <span class="avatar avatar-circle" style="width:40px;height:40px;position:relative;left:22px;">
                                        <img class="avatar-img avImage" src="<?php echo $pic11; ?>" alt="Image Description" title="<?php echo $user_data_Fe_pic ?>" style="width:40px;height:40px;">
                                        <?php
                                        $count = 0;
                                        foreach ($countPercentage as $value) {
                                            if ($value === $progressPerPhase) {
                                                $count++;
                                            }
                                        }
                                        $count--;
                                        if ($count > 0) {
                                        ?>
                                            <span class="badge bg-primary rounded-pill" style="position: relative;left: -13px;top: -15px;">+<?php echo $count; ?></span>
                                        <?php } ?>
                                    </span>

                                </div>
                            </div>
                            <div class="col-12 dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="seeImgContainer<?php echo $phase_ID . $uID; ?>">
                                <div class="container-fluid">
                                    <!-- <input style="margin: 5px;width: 50%;float: right;position: absolute;right: 70px;border-radius: 10px !important;" class="form-control" type="text" id="SearchAllStudent" onkeyup="StudentAllSearch()" placeholder="Search for Department.." title="Type in a name">
                          <br> -->
                                    <div class="row stuProProfile">

                                    </div>
                                </div>
                            </div>

                        <?php
                            $left = $left + 10;
                        }
                        ?>

                    </div>

                </div>

        <?php }
        }
        ?>
    </div>
    <hr>
    <div style="display: flex;">
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
        ?>
                <ul class="list-inline">
                    <li class="list-inline-item d-inline-flex align-items-center" id="seephaseclasses" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="margin:10px; cursor: pointer;">
                        <span class="legend-indicator" style="background-color:<?php echo $phaseData['color']; ?>;height: 20px;width: 20px;"></span><span style="color:<?php echo $phaseData['color']; ?>;font-size:large;font-weight: bold;"><?php echo $phaseData['phasename']; ?></span>
                    </li>
                </ul>
        <?php }
        } ?>
        <li class="list-inline-item" style="margin:10px; cursor: pointer;" id="" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
            <span class="legend-indicator bg-success" style="height: 20px;width: 20px;"></span><span data-bs-target="#acadmicClassModal" data-bs-toggle="modal" style="font-size: large;font-weight: bold;">Academic</span>
        </li>
        <li class="list-inline-item" style="margin:10px; cursor: pointer;" id="seeallacademic" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
            <span class="legend-indicator bg-success" style="height: 20px;width: 20px;"></span><span data-bs-target="#testClassModal" data-bs-toggle="modal" style="font-size: large;font-weight: bold;">Test</span>
        </li>


    </div>

    </div>
<?php
}

?>