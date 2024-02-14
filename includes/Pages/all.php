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

        <div style="display: -webkit-inline-box;margin-bottom: -80px;">
            <h1 class="card-subtitle" style="margin:5px;font-size: 30px !important;"><?php echo $totalCount; ?>/<?php echo $totalClass; ?>

            </h1>
            <?php
            $phaseQ = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
            while ($phaseData = $phaseQ->fetch()) {
                $totalClass = 0;
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
            ?>
                <ul class="list-inline">
                    <li class="list-inline-item d-inline-flex align-items-center" id="seephaseclasses" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="margin:10px; cursor: pointer;">
                        <span class="legend-indicator" style="background-color:<?php echo $phaseData['color']; ?>"></span><span style="color:<?php echo $phaseData['color']; ?>"><?php echo $phaseData['phasename']; ?></span>
                    </li>
                    <!-- <div class="col-8 dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="seephaseclasses">
                        <div class="container">
                            <input type="text" id="searchInputclasses" placeholder="classes" class="form-control"><br>
                            <div class="row" id="searchClasses">
                                <?php
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
                                ?>
                                            <div class="col-2 aaayyy" style="width:auto;">
                                                <h6 class="badge bg-soft-secondary rounded-pill" style="width:auto; color: black;">
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

                                    if ($currentData == "sim") {
                                        $acQ = $connect->query("SELECT * FROM sim WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                                        while ($acData = $acQ->fetch()) {
                                            $acId = $acData['id'];
                                            $sql = $connect->query("SELECT count(*) FROM `gradesheet` WHERE class='sim' AND class_id='$acId' AND user_id='$fetchuser_id' AND over_all_grade IS NOT NULL");
                                            $cdata = $sql->fetchColumn();
                                            $totalCount = $totalCount + $cdata;
                                        ?>
                                            <div class="col-2 aaayyy" style="width:auto;">
                                                <h6 class="badge bg-soft-secondary rounded-pill" style="width:auto; color: black;">
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

                                    if ($currentData == "test") {
                                        $acQ = $connect->query("SELECT * FROM test WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                                        while ($acData = $acQ->fetch()) {
                                            $acId = $acData['id'];
                                            $sql = $connect->query("SELECT count(*) FROM `test_data` WHERE test_id='$acId' AND student_id='$fetchuser_id' AND status IS NOT NULL");
                                            $cdata = $sql->fetchColumn();
                                            $totalCount = $totalCount + $cdata;
                                        ?>
                                            <div class="col-2 aaayyy" style="width:auto;">
                                                <h6 class="badge bg-soft-secondary rounded-pill" style="width:auto; color: black;">
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

                                    if ($currentData == "academic") {
                                        $acQ = $connect->query("SELECT * FROM academic WHERE ctp = '$std_course1' AND phase = '$phase_ID'");
                                        while ($acData = $acQ->fetch()) {
                                            $acId = $acData['id'];
                                            $sql = $connect->query("SELECT count(*) FROM `acedemic_stu` WHERE permission='1' AND std_id='$fetchuser_id' AND acedemic_id = '$acId'");
                                            $cdata = $sql->fetchColumn();
                                            $totalCount = $totalCount + $cdata;
                                        ?>
                                            <div class="col-2 aaayyy" style="width:auto;">
                                                <h6 class="badge bg-soft-secondary rounded-pill" style="width:auto; color: black;">
                                                    <?php if ($cdata != 0) { ?>
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

                                    $counter++;
                                }
                                ?>
                            </div>
                        </div>
                    </div> -->
                </ul>
            <?php } ?>
        </div>

        <hr class="text-success">
        <div>
            <span style="float: left;" class="badge bg-success rounded-pill mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Start">
                <?php $dateString = $courseDate;
                $timestamp = strtotime($dateString);
                echo date("d-F-y", $timestamp); ?> </span>
            <span style="float:right;" class="badge bg-danger rounded-pill mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="End">
                <?php if (isset($total_class)) {
                    $dateTime = new DateTime($courseDate);
                    $dateTime->add(new DateInterval("P{$total_class}D"));
                    $futureDate = $dateTime->format("Y-m-d");
                    $timestamp = strtotime($futureDate);
                    echo date("d-F-y", $timestamp);
                }
                ?>
            </span>
        </div><br><br>
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
        ?>
            <div class="progress" style="width: <?php echo $phaseWidthPro; ?>%;float: left;    margin-right: -3px;height:40px;">
                <?php
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
                    $totalCount = 0;
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
                        $totalClassesPerPhase = $totalClass;
                        $classesCompleted = $totalCount;
                        if ($totalClassesPerPhase > 0) {
                            $progressPerPhase = $classesCompleted / $totalClassesPerPhase * 100;
                        }
                        $mainUserImg = $connect->query("SELECT file_name FROM users WHERE id = '$uID'");
                        $prof_pic11 = $mainUserImg->fetchColumn();
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
                ?>
                        <div class="progress-bar" style=" width: <?php echo $progressPerPhase ?>%;background-color:<?php echo $txtColor ?>;position:relative;">
                            <div class="student-profile" style="position: absolute;right: 52px;">
                                <img style="height: 50px;width: 50px;margin-right: -55px;border-radius: 50px;" src="<?php echo $pic11; ?>" alt="varun" class="student-image" />

                            </div>
                        </div>
                    <?php
                    }

                    ?>

                <?php
                }

                ?>

            </div>
        <?php
        }
        ?>
    </div>
</div>