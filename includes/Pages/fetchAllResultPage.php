<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    function getcall($mark_total, $cat_convert_val, $count_of_value)
    {


        $get_sum = $mark_total * $cat_convert_val;
        $get_all_count = $count_of_value * 100;
        $final_cal = $get_sum / $get_all_count;
        return $final_cal;
    }

    function handleInf($value, $default = 0)
    {
        if (is_infinite($value)) {
            return $default; // Replace "INF" with a default value (e.g., 0)
        }
        return $value; // If not "INF," return the original value
    }
    $std_course1 = $_REQUEST['ctpId'];
    $course_Code = $_REQUEST['courseCode'];
    $course_Name = $_REQUEST['courseName'];
    $c_id = $_REQUEST['courseId'];
    $Total_type_maarks = $_REQUEST['totalType']
?>

    <div class="card-body">
        <?php
        $checkStatus = $connect->query("SELECT count(*) FROM typegradefilter WHERE ctpId = '$std_course1' AND filterStatus = 'Active'");
        $filValQ = $connect->query("SELECT gradeValue FROM typegradefilter WHERE ctpId = '$std_course1'");
        $filValue = $filValQ->fetchColumn();
        $checkStatusData = $checkStatus->fetchColumn();
        if ($checkStatusData > 0) {
            $checkVal = "checked";
        } else {
            $checkVal = "";
        }
        ?>

        <!-- type calculation -->
        <div style="float: left;">
            <h1 style="font-size:1.7rem;display:inline-block;" class="text-success">Total Mark : <span class="text-dark"><?php echo $Total_type_maarks ?></span></h1>
        </div>
        <br><br>
        <!-- </h1> -->
        <hr class="text-success">
    </div>
    <?php
    $students = array();
    $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id'");
    while ($getCourseData = $getCourse->fetch()) {
        $course_Code = $getCourseData['CourseCode'];
        $course_Name = $getCourseData['CourseName'];
        $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
        while ($selecAllUserData = $selecAllUser->fetch()) {
            $fetchuser_id = $selecAllUserData['StudentNames'];
    ?>
            <div class="col-12 mb-10 mb-lg-15 d-none">
                <!-- Card -->
                <div class="row align-items-center">
                    <?php

                    $query7 = "SELECT * FROM type_data where ctp='$std_course1'";
                    $statement7 = $connect->prepare($query7);
                    $statement7->execute();
                    $result7 = $statement7->fetchAll();

                    $gradeCount = 0;
                    $sumC = 0;

                    $sum2 = 0;
                    foreach ($result7 as $row7) {
                        $sum1 = 0;
                        $sum = 0;
                    ?>
                        <?php
                        //select id
                        $type = $row7['id'];
                        $type_mark = $row7['marks'];
                        $round = round($type_mark, 3);
                        ?>
                        <div class="col-3 mb-3 mb-lg-15">
                            <a class="card card-hover-shadow h-100">
                                <div class="card-body">

                                    <!-- print type name -->
                                    <div class="row align-items-center">
                                        <h1 class="col-6 card-subtitle text-success"><?php echo $row7['type_name'] ?></h1><br>
                                        <div class="col-6 h4" style="text-align: right;">
                                            <?php
                                            $get_cat = "SELECT * FROM type_category_data where type='$type'";
                                            $get_cat_St = $connect->prepare($get_cat);
                                            $get_cat_St->execute();

                                            if ($get_cat_St->rowCount() > 0) {
                                                $reget_cat = $get_cat_St->fetchAll();
                                                foreach ($reget_cat as $row_name) {
                                                    $count1 = 0;
                                                    $count2 = 0;
                                                    $count3 = 0;
                                                    $count7 = 0;
                                                    $count5 = 0;
                                                    $count4 = 0;
                                                    $count6 = 0;
                                                    $count8 = 0;
                                                    $count9 = 0;
                                                    $count10 = 0;
                                                    $count11 = 0;
                                                    $count20 = 0;
                                                    $count12 = 0;
                                                    $count13 = 0;
                                                    $count14 = 0;
                                                    $id_count8 = 0;
                                                    $table_value = $row_name['category_value'];
                                                    $table = $row_name['category'];
                                                    $percentage = $row_name['percent'];
                                                    $only_for_phase = $row_name['category_phase'];

                                                    $per_value_convert = $percentage * $type_mark / 100;
                                                    if ($table == "phase") {
                                                        if ($table_value == "all" && $only_for_phase == "all") {

                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $classIdQ = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['class_id'];
                                                                $allClassTable = $classIdData['class'];
                                                                $classGradQ = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' AND class = '$allClassTable' AND class_id = '$allClassId' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = '$allClassTable' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $cloneClass = $getCloneQData['class_name'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id' AND course_id='$std_course1' AND class='$cloneClass' AND class_id='$checkGradeData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                        $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = '$cloneClass' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                if ($countGradeData['over_all_grade'] == 'U') {
                                                                                    if ($checkStatusData > 0) {
                                                                                        $all_phase_total = $all_phase_total + $filValue;
                                                                                    } else {
                                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                    }
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = '$allClassTable' AND class_id = '$allClassId' AND over_all_grade_per != ''");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        if ($countGradeData['over_all_grade'] == 'U') {
                                                                            if ($checkStatusData > 0) {
                                                                                $all_phase_total = $all_phase_total + $filValue;
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }

                                                            if ($id_count != 0) {
                                                                $count1 = getcall($all_phase_total, $per_value_convert, $id_count);
                                                            }
                                                        } else if ($table_value != "all" && $only_for_phase == "all") {

                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $classIdQ = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$fetchuser_id' AND phase_id = '$table_value'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['class_id'];
                                                                $allClassTable = $classIdData['class'];
                                                                $classGradQ = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' AND class = '$allClassTable' AND class_id = '$allClassId' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = '$allClassTable' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $cloneClass = $getCloneQData['class_name'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id' AND course_id='$std_course1' AND class='$cloneClass' AND class_id='$checkGradeData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                        $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = '$cloneClass' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                if ($countGradeData['over_all_grade'] == 'U') {
                                                                                    if ($checkStatusData > 0) {
                                                                                        $all_phase_total = $all_phase_total + $filValue;
                                                                                    } else {
                                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                    }
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = '$allClassTable' AND class_id = '$allClassId' AND over_all_grade_per != ''");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        if ($countGradeData['over_all_grade'] == 'U') {
                                                                            if ($checkStatusData > 0) {
                                                                                $all_phase_total = $all_phase_total + $filValue;
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }

                                                            if ($id_count != 0) {
                                                                $count1 = getcall($all_phase_total, $per_value_convert, $id_count);
                                                            }
                                                        } else if ($table_value == "all" && $only_for_phase == "actual") {
                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $classIdQ = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'actual'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['class_id'];
                                                                $allClassTable = $classIdData['class'];
                                                                $classGradQ = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' AND class = 'actual' AND class_id = '$allClassId' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = 'actual' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $cloneClass = $getCloneQData['class_name'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id' AND course_id='$std_course1' AND class='actual' AND class_id='$checkGradeData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                        $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'actual' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                if ($countGradeData['over_all_grade'] == 'U') {
                                                                                    if ($checkStatusData > 0) {
                                                                                        $all_phase_total = $all_phase_total + $filValue;
                                                                                    } else {
                                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                    }
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'actual' AND class_id = '$allClassId' AND over_all_grade_per != ''");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        if ($countGradeData['over_all_grade'] == 'U') {
                                                                            if ($checkStatusData > 0) {
                                                                                $all_phase_total = $all_phase_total + $filValue;
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }

                                                            if ($id_count != 0) {
                                                                $count12 = getcall($all_phase_total, $per_value_convert, $id_count);
                                                            }
                                                        } else if ($table_value == "all" && $only_for_phase == "sim") {
                                                            // $sql2 = "SELECT sum(`over_all_grade_per`) as all_phase_total,count(`id`) as id_count FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and over_all_grade_per!='' and class='sim'";
                                                            // $sql2_prepare = $connect->prepare($sql2);
                                                            // $result2 = $connect->query($sql2);
                                                            // $datas1 = $result2->fetch(PDO::FETCH_ASSOC);
                                                            // $all_phase_total = $datas1['all_phase_total'];
                                                            // $id_count = $datas1['id_count'];

                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $classIdQ = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'sim'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['class_id'];
                                                                $allClassTable = $classIdData['class'];
                                                                $classGradQ = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' AND class = 'sim' AND class_id = '$allClassId' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = 'sim' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $cloneClass = $getCloneQData['class_name'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id' AND course_id='$std_course1' AND class='sim' AND class_id='$checkGradeData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                        $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'sim' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                if ($countGradeData['over_all_grade'] == 'U') {
                                                                                    if ($checkStatusData > 0) {
                                                                                        $all_phase_total = $all_phase_total + $filValue;
                                                                                    } else {
                                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                    }
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'sim' AND class_id = '$allClassId' AND over_all_grade_per != ''");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        if ($countGradeData['over_all_grade'] == 'U') {
                                                                            if ($checkStatusData > 0) {
                                                                                $all_phase_total = $all_phase_total + $filValue;
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }

                                                            if ($id_count != 0) {
                                                                $count13 = getcall($all_phase_total, $per_value_convert, $id_count);
                                                            }
                                                        } else if ($table_value != "all" && $only_for_phase == "actual") {
                                                            // calculation for particular phase
                                                            // $sql3 = "SELECT sum(`over_all_grade_per`) as all_phase_total1,count(`id`) as id_count1 FROM gradesheet WHERE user_id='$fetchuser_id' and phase_id='$table_value' and over_all_grade_per!='' and class='actual'";
                                                            // $sql3_prepare = $connect->prepare($sql3);
                                                            // $result3 = $connect->query($sql3);
                                                            // $datas3 = $result3->fetch(PDO::FETCH_ASSOC);
                                                            // $all_class_total1 = $datas3['all_phase_total1'];
                                                            // $id_count1 = $datas3['id_count1'];

                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $classIdQ = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$table_value' AND class = 'actual'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['class_id'];
                                                                $allClassTable = $classIdData['class'];
                                                                $classGradQ = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' AND phase_id = '$table_value' AND class = 'actual' AND class_id = '$allClassId' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = 'actual' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $cloneClass = $getCloneQData['class_name'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id' AND course_id='$std_course1' AND phase_id = '$table_value' AND class='actual' AND class_id='$checkGradeData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                        $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$table_value' AND class = 'actual' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                if ($countGradeData['over_all_grade'] == 'U') {
                                                                                    if ($checkStatusData > 0) {
                                                                                        $all_phase_total = $all_phase_total + $filValue;
                                                                                    } else {
                                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                    }
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$table_value' AND class = 'actual' AND class_id = '$allClassId' AND over_all_grade_per != ''");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        if ($countGradeData['over_all_grade'] == 'U') {
                                                                            if ($checkStatusData > 0) {
                                                                                $all_phase_total = $all_phase_total + $filValue;
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }

                                                            $all_class_total1 = $all_phase_total;
                                                            $id_count1 = $id_count;

                                                            if ($id_count1 != 0) {
                                                                $count2 = getcall($all_class_total1, $per_value_convert, $id_count1);
                                                            }
                                                        } else if ($table_value != "all" && $only_for_phase == "sim") {
                                                            // calculation for particular phase
                                                            // $sql3 = "SELECT sum(`over_all_grade_per`) as all_phase_total1,count(`id`) as id_count1 FROM gradesheet WHERE user_id='$fetchuser_id'and phase_id='$table_value' and over_all_grade_per!='' and class='sim'";
                                                            // $sql3_prepare = $connect->prepare($sql3);
                                                            // $result3 = $connect->query($sql3);
                                                            // $datas3 = $result3->fetch(PDO::FETCH_ASSOC);
                                                            // $all_class_total1 = $datas3['all_phase_total1'];
                                                            // $id_count1 = $datas3['id_count1'];

                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $classIdQ = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$table_value' AND class = 'sim'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['class_id'];
                                                                $allClassTable = $classIdData['class'];
                                                                $classGradQ = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' AND phase_id = '$table_value' AND class = 'sim' AND class_id = '$allClassId' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = 'sim' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $cloneClass = $getCloneQData['class_name'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id' AND course_id='$std_course1' AND phase_id = '$table_value' AND class='sim' AND class_id='$checkGradeData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                        $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$table_value' AND class = 'sim' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                if ($countGradeData['over_all_grade'] == 'U') {
                                                                                    if ($checkStatusData > 0) {
                                                                                        $all_phase_total = $all_phase_total + $filValue;
                                                                                    } else {
                                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                    }
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND phase_id = '$table_value' AND class = 'sim' AND class_id = '$allClassId' AND over_all_grade_per != ''");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        if ($countGradeData['over_all_grade'] == 'U') {
                                                                            if ($checkStatusData > 0) {
                                                                                $all_phase_total = $all_phase_total + $filValue;
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }

                                                            $all_class_total1 = $all_phase_total;
                                                            $id_count1 = $id_count;

                                                            if ($id_count1 != 0) {
                                                                $count14 = getcall($all_class_total1, $per_value_convert, $id_count1);
                                                            }
                                                        }
                                                    }
                                                    if ($table == "actual") {
                                                        // calcultion for all actual
                                                        if ($table_value == "all") {
                                                            // $sql4 = "SELECT sum(`over_all_grade_per`) as all_phase_total2,count(`id`) as id_count2 FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and class='actual' and over_all_grade_per!=''";
                                                            // $sql4_prepare = $connect->prepare($sql4);
                                                            // $result4 = $connect->query($sql4);
                                                            // $datas4 = $result4->fetch(PDO::FETCH_ASSOC);
                                                            // $all_class_total2 = $datas4['all_phase_total2'];
                                                            // $id_count2 = $datas4['id_count2'];

                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $classIdQ = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'actual'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['class_id'];
                                                                $allClassTable = $classIdData['class'];
                                                                $classGradQ = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' AND class = 'actual' AND class_id = '$allClassId' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = 'actual' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $cloneClass = $getCloneQData['class_name'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id' AND course_id='$std_course1' AND class='actual' AND class_id='$checkGradeData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                        $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'actual' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                if ($countGradeData['over_all_grade'] == 'U') {
                                                                                    if ($checkStatusData > 0) {
                                                                                        $all_phase_total = $all_phase_total + $filValue;
                                                                                    } else {
                                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                    }
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'actual' AND class_id = '$allClassId' AND over_all_grade_per != ''");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        if ($countGradeData['over_all_grade'] == 'U') {
                                                                            if ($checkStatusData > 0) {
                                                                                $all_phase_total = $all_phase_total + $filValue;
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }
                                                            $all_class_total2 = $all_phase_total;
                                                            $id_count2 = $id_count;

                                                            if ($id_count2 != 0) {
                                                                $count3 = getcall($all_class_total2, $per_value_convert, $id_count2);
                                                                // echo $count3."actual";
                                                            }
                                                        } else if ($table_value != "all") {
                                                            // calculation for particular actual
                                                            // $sql5 = "SELECT sum(`over_all_grade_per`) as all_phase_total3,count(`id`) as id_count3 FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and class='actual' and class_id='$table_value' and over_all_grade_per!=''";
                                                            // $sql5_prepare = $connect->prepare($sql5);
                                                            // $result5 = $connect->query($sql5);
                                                            // $datas5 = $result5->fetch(PDO::FETCH_ASSOC);
                                                            // $all_class_total5 = $datas5['all_phase_total3'];
                                                            // $id_count5 = $datas5['id_count3'];
                                                            $all_phase_total = 0;
                                                            $id_count = 0;

                                                            $checkN = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and class='actual' and class_id='$table_value' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                            $checkNData = $checkN->fetchColumn();
                                                            if ($checkNData) {
                                                                $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkNData' AND class_name = 'actual' AND std_id = '$fetchuser_id'");
                                                                while ($getCloneQData = $getCloneQ->fetch()) {
                                                                    $cClassId = $getCloneQData['cloned_id'];
                                                                    $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and class='actual' and class_id='$checkNData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                    // print_r($checkCloneGQ);
                                                                    $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                    if (!$checkNData1) {
                                                                        $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'actual' and class_id='$checkNData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                        $countGradeData = $countGradeNum->fetch();
                                                                        if ($countGradeData > 0) {
                                                                            if ($countGradeData['over_all_grade'] == 'U') {
                                                                                if ($checkStatusData > 0) {
                                                                                    $all_phase_total = $all_phase_total + $filValue;
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                            $id_count++;
                                                                        }
                                                                        break;
                                                                    }
                                                                }
                                                            } else {
                                                                $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'actual' AND class_id = '$table_value' AND over_all_grade_per != ''");
                                                                $countGradeData = $countGradeNum->fetch();
                                                                if ($countGradeData > 0) {
                                                                    if ($countGradeData['over_all_grade'] == 'U') {
                                                                        if ($checkStatusData > 0) {
                                                                            $all_phase_total = $all_phase_total + $filValue;
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                    } else {
                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                    }
                                                                    $id_count++;
                                                                }
                                                            }
                                                            $all_class_total5 = $all_phase_total;
                                                            $id_count5 = $id_count;

                                                            if ($id_count5 != 0) {
                                                                $count4 = getcall($all_class_total5, $per_value_convert, $id_count5);
                                                            }
                                                        }
                                                    }
                                                    if ($table == "sim") {
                                                        //calcultion for all sim
                                                        if ($table_value == "all") {
                                                            // $sql5 = "SELECT sum(`over_all_grade_per`) as all_phase_total2,count(`id`) as id_count2 FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and class='sim' and over_all_grade_per!=''";
                                                            // $sql5_prepare = $connect->prepare($sql5);
                                                            // $result5 = $connect->query($sql5);
                                                            // $datas5 = $result5->fetch(PDO::FETCH_ASSOC);
                                                            // $all_class_total6 = $datas5['all_phase_total2'];
                                                            // $id_count6 = $datas5['id_count2'];

                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $classIdQ = $connect->query("SELECT * FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'sim'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['class_id'];
                                                                $allClassTable = $classIdData['class'];
                                                                $classGradQ = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' AND class = 'sim' AND class_id = '$allClassId' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = 'sim' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $cloneClass = $getCloneQData['class_name'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id' AND course_id='$std_course1' AND class='sim' AND class_id='$checkGradeData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                        $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade  FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'sim' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                if ($countGradeData['over_all_grade'] == 'U') {
                                                                                    if ($checkStatusData > 0) {
                                                                                        $all_phase_total = $all_phase_total + $filValue;
                                                                                    } else {
                                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                    }
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade  FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'sim' AND class_id = '$allClassId' AND over_all_grade_per != ''");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        if ($countGradeData['over_all_grade'] == 'U') {
                                                                            if ($checkStatusData > 0) {
                                                                                $all_phase_total = $all_phase_total + $filValue;
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }
                                                            $all_class_total6 = $all_phase_total;
                                                            $id_count6 = $id_count;

                                                            if ($id_count6 != 0) {
                                                                $count5 = getcall($all_class_total6, $per_value_convert, $id_count6);
                                                                // echo $count5."sim";
                                                            }
                                                        } else if ($table_value != "all") {
                                                            //calcultion for particular
                                                            // $sql7 = "SELECT sum(`over_all_grade_per`) as all_phase_total3,count(`id`) as id_count3 FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and class='sim' and class_id='$table_value' and over_all_grade_per!=''";
                                                            // $sql7_prepre = $connect->prepare($sql7);
                                                            // $result7 = $connect->query($sql7);
                                                            // $datas7 = $result7->fetch(PDO::FETCH_ASSOC);
                                                            // $all_class_total7 = $datas7['all_phase_total3'];
                                                            // $id_count7 = $datas7['id_count3'];
                                                            $all_phase_total = 0;
                                                            $id_count = 0;
                                                            $checkN = $connect->query("SELECT class_id FROM gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and class='sim' and class_id='$table_value' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0')");
                                                            $checkNData = $checkN->fetchColumn();
                                                            if ($checkNData) {
                                                                $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkNData' AND class_name = 'sim' AND std_id = '$fetchuser_id'");
                                                                while ($getCloneQData = $getCloneQ->fetch()) {
                                                                    $cClassId = $getCloneQData['cloned_id'];
                                                                    $checkCloneGQ = $connect->query("SELECT id FROM cloned_gradesheet WHERE user_id='$fetchuser_id'and course_id='$std_course1' and class='sim' and class_id='$checkNData' AND (over_all_grade_per = 'N' OR over_all_grade_per = '0') AND cloned_id = '$cClassId'");
                                                                    // print_r($checkCloneGQ);
                                                                    $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                    if (!$checkNData1) {
                                                                        $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM cloned_gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'sim' and class_id='$checkGradeData' AND over_all_grade_per != '' AND cloned_id = '$cClassId'");
                                                                        $countGradeData = $countGradeNum->fetch();
                                                                        if ($countGradeData > 0) {
                                                                            if ($countGradeData['over_all_grade'] == 'U') {
                                                                                if ($checkStatusData > 0) {
                                                                                    $all_phase_total = $all_phase_total + $filValue;
                                                                                } else {
                                                                                    $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                }
                                                                            } else {
                                                                                $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            }
                                                                            $id_count++;
                                                                        }
                                                                        break;
                                                                    }
                                                                }
                                                            } else {
                                                                $countGradeNum = $connect->query("SELECT over_all_grade_per,over_all_grade FROM gradesheet WHERE user_id = '$fetchuser_id' AND course_id = '$std_course1' AND class = 'sim' AND class_id = '$table_value' AND over_all_grade_per != ''");
                                                                $countGradeData = $countGradeNum->fetch();
                                                                if ($countGradeData > 0) {
                                                                    if ($countGradeData['over_all_grade'] == 'U') {
                                                                        if ($checkStatusData > 0) {
                                                                            $all_phase_total = $all_phase_total + $filValue;
                                                                        } else {
                                                                            $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        }
                                                                    } else {
                                                                        $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                    }
                                                                    $id_count++;
                                                                }
                                                            }
                                                            $all_class_total7 = $all_phase_total;
                                                            $id_count7 = $id_count;

                                                            if ($id_count7 != 0) {
                                                                $count7 = getcall($all_class_total7, $per_value_convert, $id_count7);
                                                            }
                                                        }
                                                    }
                                                    if ($table == "test") {
                                                        //var_dump($table_value != "all");
                                                        //test calcultion

                                                        if ($table_value == "all") {
                                                            $sum12 = 0;
                                                            $id_count = 0;
                                                            // $sql8 = "SELECT sum(`marks`) as test_marks,count(`id`) as id_count4 FROM test_data WHERE student_id='$fetchuser_id' and course_id='$std_course1'";
                                                            // $sql8_prepre = $connect->prepare($sql8);
                                                            // $result8 = $connect->query($sql8);
                                                            // $datas8 = $result8->fetch(PDO::FETCH_ASSOC);
                                                            // $sum12 = $datas8['test_marks'];

                                                            $classIdQ = $connect->query("SELECT * FROM test_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1'");
                                                            while ($classIdData = $classIdQ->fetch()) {
                                                                $allClassId = $classIdData['test_id'];
                                                                $classGradQ = $connect->query("SELECT test_id FROM test_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND test_id = '$allClassId' AND marks = '0'");
                                                                // print_r($classGradQ);
                                                                $checkGradeData = $classGradQ->fetchColumn();
                                                                if ($checkGradeData) {
                                                                    $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkGradeData' AND class_name = 'test' AND std_id = '$fetchuser_id'");
                                                                    while ($getCloneQData = $getCloneQ->fetch()) {
                                                                        $cClassId = $getCloneQData['cloned_id'];
                                                                        $checkCloneGQ = $connect->query("SELECT id FROM test_cloned_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND test_id = '$allClassId' AND marks = '0' AND clone_id = '$cClassId'");
                                                                        echo $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                        if (!$checkNData1) {
                                                                            $countGradeNum = $connect->query("SELECT marks FROM test_cloned_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND test_id = '$allClassId' AND marks != '' AND clone_id = '$cClassId'");
                                                                            $countGradeData = $countGradeNum->fetch();
                                                                            if ($countGradeData > 0) {
                                                                                // if ($countGradeData['over_all_grade'] == 'U') {
                                                                                //   if ($checkStatusData > 0) {
                                                                                //     $all_phase_total = $all_phase_total + $filValue;
                                                                                //   } else {
                                                                                //     $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                                //   }
                                                                                // } else {
                                                                                $sum12 = $sum12 + $countGradeData['marks'];
                                                                                // }
                                                                                $id_count++;
                                                                            }
                                                                            break;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $countGradeNum = $connect->query("SELECT marks FROM test_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND test_id = '$allClassId' AND marks != '0'");
                                                                    $countGradeData = $countGradeNum->fetch();
                                                                    if ($countGradeData > 0) {
                                                                        // if ($countGradeData['over_all_grade'] == 'U') {
                                                                        //   if ($checkStatusData > 0) {
                                                                        //     $all_phase_total = $all_phase_total + $filValue;
                                                                        //   } else {
                                                                        //     $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                        //   }
                                                                        // } else {
                                                                        $sum12 = $sum12 + $countGradeData['marks'];
                                                                        // }
                                                                        $id_count++;
                                                                    }
                                                                }
                                                            }
                                                            if ($sum12 != "") {
                                                                $id_count8 = $id_count;
                                                                $get_sum4 = $sum12 * $per_value_convert;
                                                                $get_totl_ids = $id_count8 * 100;
                                                                if ($get_totl_ids != 0) {
                                                                    $count6 = $get_sum4 / $get_totl_ids;
                                                                }
                                                            }
                                                        } else if ($table_value != "all") {
                                                            $sum5 = 0;
                                                            // $sql13 = $connect->prepare("SELECT marks FROM `test_data` WHERE student_id=? and course_id=? and test_id=?");
                                                            // $sql13->execute([$fetchuser_id, $std_course1, $table_value]);
                                                            // $sum5 = $sql13->fetchColumn();

                                                            $checkN = $connect->query("SELECT test_id FROM test_data WHERE student_id = '$fetchuser_id' AND course_id='$std_course1' AND test_id = '$table_value' AND marks = '0'");
                                                            $checkNData = $checkN->fetchColumn();
                                                            if ($checkNData) {
                                                                $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkNData' AND class_name = 'test' AND std_id = '$fetchuser_id'");
                                                                while ($getCloneQData = $getCloneQ->fetch()) {
                                                                    $cClassId = $getCloneQData['cloned_id'];
                                                                    $checkCloneGQ = $connect->query("SELECT id FROM test_cloned_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND test_id = '$checkNData' AND marks = '0' AND clone_id = '$cClassId'");
                                                                    // print_r($checkCloneGQ);
                                                                    $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                    if (!$checkNData1) {
                                                                        $countGradeNum = $connect->query("SELECT marks FROM test_cloned_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND test_id = '$checkNData' AND marks != '' AND clone_id = '$cClassId'");
                                                                        $countGradeData = $countGradeNum->fetch();
                                                                        if ($countGradeData > 0) {
                                                                            // if ($countGradeData['over_all_grade'] == 'U') {
                                                                            //   if ($checkStatusData > 0) {
                                                                            //     $all_phase_total = $all_phase_total + $filValue;
                                                                            //   } else {
                                                                            //     $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                            //   }
                                                                            // } else {
                                                                            $sum5 = $sum5 + $countGradeData['marks'];
                                                                            // }
                                                                            $id_count++;
                                                                        }
                                                                        break;
                                                                    }
                                                                }
                                                            } else {
                                                                $countGradeNum = $connect->query("SELECT marks FROM test_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND test_id = '$table_value' AND marks != '0'");
                                                                $countGradeData = $countGradeNum->fetch();
                                                                if ($countGradeData > 0) {
                                                                    // if ($countGradeData['over_all_grade'] == 'U') {
                                                                    //   if ($checkStatusData > 0) {
                                                                    //     $all_phase_total = $all_phase_total + $filValue;
                                                                    //   } else {
                                                                    //     $all_phase_total = $all_phase_total + $countGradeData['over_all_grade_per'];
                                                                    //   }
                                                                    // } else {
                                                                    $sum5 = $sum5 + $countGradeData['marks'];
                                                                    // }
                                                                    $id_count++;
                                                                }
                                                            }
                                                            if ($sum5 != "") {
                                                                $per_value_convert;
                                                                $get_sum13 = $sum5 * $per_value_convert;
                                                                $count11 = $get_sum13 / 100;
                                                            }
                                                        }
                                                    }
                                                    if ($table == "discipline") {
                                                        //discipline calculation
                                                        $sum4 = 0;
                                                        $sql10 = $connect->prepare("SELECT dismarks FROM `discipline_data` WHERE student_id=?");
                                                        $sql10->execute([$fetchuser_id]);
                                                        $sum4 = $sql10->fetchColumn();
                                                        if ($sum4 != "") {
                                                            $per_value_convert;
                                                            $get_sum10 = $sum4 * $per_value_convert;
                                                            $count8 = $get_sum10 / 100;
                                                        } else {
                                                            $get_sum10 = 0;
                                                            $count8 = 0;
                                                        }
                                                    }
                                                    if ($table == "self") {
                                                        //self calculation
                                                        //$sum3=0;
                                                        $sql11 = $connect->prepare("SELECT marks FROM `self` WHERE student_id=? and course_id=?");
                                                        $sql11->execute([$fetchuser_id, $std_course1]);
                                                        $sum3 = $sql11->fetchColumn();
                                                        if ($sum3 != "") {
                                                            $per_value_convert;
                                                            // echo $sum3;
                                                            $get_sum11 = $sum3 * $per_value_convert;
                                                            $count9 = $get_sum11 / 100;
                                                        } else {
                                                            $get_sum11 = 0;
                                                            $count9 = 0;
                                                        }
                                                    }
                                                    if ($table == "quiz") {
                                                        //quiz calculation
                                                        $sum4 = 0;
                                                        $id_count = 0;
                                                        // $sql12 = $connect->prepare("SELECT marks FROM `quiz_marks` WHERE student_id=? and course_id=?");
                                                        // $sql12->execute([$fetchuser_id, $std_course1]);
                                                        // $sum4 = $sql12->fetchColumn();

                                                        $testClass = $connect->query("SELECT * FROM quiz_marks WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1'");
                                                        while ($testClassData = $testClass->fetch()) {
                                                            $testId = $testClassData['quiz_id'];
                                                            $checkZero = $connect->query("SELECT quiz_id FROM quiz_marks WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND marks = '0'");
                                                            $checkZeroData = $checkZero->fetchColumn();
                                                            if ($checkZeroData) {
                                                                $getCloneQ = $connect->query("SELECT * FROM clone_class WHERE class_id = '$checkZeroData' AND class_name = 'quiz' AND std_id = '$fetchuser_id'");
                                                                while ($getCloneQData = $getCloneQ->fetch()) {
                                                                    $cClassId = $getCloneQData['cloned_id'];
                                                                    $checkCloneGQ = $connect->query("SELECT id FROM quiz_cloned_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND quiz_id = '$checkZeroData' AND marks = '0' AND clone_id = '$cClassId'");
                                                                    $checkNData1 = $checkCloneGQ->fetchColumn();
                                                                    if (!$checkNData1) {
                                                                        $countGradeNum = $connect->query("SELECT marks FROM quiz_cloned_data WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND quiz_id = '$checkZeroData' AND marks != '0' AND clone_id = '$cClassId'");
                                                                        $countGradeData = $countGradeNum->fetchColumn();
                                                                        if ($countGradeData > 0) {
                                                                            $sum4 = $sum4 + $countGradeData;
                                                                            $id_count++;
                                                                        }
                                                                        break;
                                                                    }
                                                                }
                                                            } else {
                                                                $countGradeNum = $connect->query("SELECT marks FROM quiz_marks WHERE student_id = '$fetchuser_id' AND course_id = '$std_course1' AND quiz_id = '$testId' AND marks != '0'");
                                                                $countGradeData = $countGradeNum->fetchColumn();
                                                                if ($countGradeData > 0) {
                                                                    $sum4 = $sum4 + $countGradeData;
                                                                    $id_count++;
                                                                }
                                                            }
                                                        }
                                                        // $sum4 = $all_phase_total;

                                                        if ($sum4 != "") {
                                                            $per_value_convert;
                                                            // echo $id_count;
                                                            $id_count8 = $id_count;
                                                            $get_sum12 = $sum4 * $per_value_convert;
                                                            $get_totl_ids = $id_count8 * 100;
                                                            if ($get_totl_ids != 0) {
                                                                $count10 = $get_sum12 / $get_totl_ids;
                                                            }
                                                        }
                                                    }
                                                    $sum1 = $sum1 + $count1 + $count2 + $count3 + $count7 + $count5 + $count4 + $count6 + $count8 + $count9 + $count10 + $count11 + $count20 + $count12 + $count13 + $count14;
                                                }
                                            }
                                            $sum = $sum + $sum1;


                                            echo round($sum, 5) . ' / ' . $round;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php
                        $sum2 = handleInf($sum2 + $sum);
                        $gradeCount = handleInf($gradeCount + $round);
                    }


                    $student = array("id" => $fetchuser_id, "percent" => $sum2, "totalPerCent" => $gradeCount);
                    $students[] = $student;
                    usort($students, function ($a, $b) {
                        if ($a['percent'] == $b['percent']) {
                            return 0;
                        }
                        return ($a['percent'] < $b['percent']) ? 1 : -1;
                    });
                    ?>
                </div>
                <!-- End Card -->
            </div>
    <?php
        }
    }


    ?>
    <div class="row">
        <!--php code here-->
        <?php
        foreach ($students as $key_val => $student) {
            $stdId = $student['id'];
            $userNameQ = $connect->query("SELECT nickname FROM users WHERE id = '$stdId'");
            $uName = $userNameQ->fetchColumn();
            $get_name_st = $connect->prepare("SELECT file_name FROM users WHERE id=?");
            $get_name_st->execute([$stdId]);
            $get_name_st_name = $get_name_st->fetchColumn();

            if ($get_name_st_name != "") {
                $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_name_st_name;
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                    $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_name_st_name;
                } else {
                    $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }
            } else {
                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
            $gradeVal = $student['percent'];
        ?>
            <div class="col-4 mb-3 mb-lg-15">
                <div class="card card-hover-shadow h-100">
                    <div class="card-header bg-soft-dark" style="border-bottom: 2px solid lightgray;">
                        <div style="display: flex; float:left;">
                            <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">
                            <h1 style="margin:5px;"><?php echo $uName; ?></h1>
                            <?php if ($key_val == 0) { ?>
                                <img src="<?php echo BASE_URL ?>assets/rank/rank1.png" alt="Image Description" style="height:30px;width:30px">
                            <?php } ?>
                            <?php if ($key_val == 1) { ?>
                                <img src="<?php echo BASE_URL ?>assets/rank/rank2.png" alt="Image Description" style="height:30px;width:30px">
                            <?php } ?>
                            <?php if ($key_val == 2) { ?>
                                <img src="<?php echo BASE_URL ?>assets/rank/rank3.png" alt="Image Description" style="height:30px;width:30px">
                            <?php } ?>
                        </div>
                        <div style="display: flex; float:right;">
                            <h2 style="margin: 5px;"><span><?php echo round($gradeVal, 5) ?></span>/<?php echo $student['totalPerCent']; ?></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php

}
