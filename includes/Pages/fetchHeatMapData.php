<!-- new -->
<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['stdCour'])) {
    $std_course1 = $_REQUEST['stdCour'];
    $CourseCode11 = $_REQUEST['courseCode11'];

?>
    <h1 class="card-subtitle text-success"><span class="badge bg-primary" style="font-size:large;text-transform: uppercase;">HeatMap</span><span style="margin: 10px;">Actual + Sim</span></h1>
    <?php

    $totalU = 0;
    $totalF = 0;
    $actualUCount = 0;
    $simUCount = 0;
    $actualFCount = 0;
    $simFCount = 0;
    $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$CourseCode11' AND CourseName = '$std_course1'");
    while ($selecAllUserData = $selecAllUser->fetch()) {
        $uID = $selecAllUserData['StudentNames'];
        $countActualGradeU = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$uID' AND class = 'actual'");
        $countActualGradeF = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$uID' AND class = 'actual'");
        $countActualCloneGradeU = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$uID' AND class = 'actual'");
        $countActualCloneGradeF = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$uID' AND class = 'actual'");

        $countSimGradeU = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$uID' AND class = 'sim'");
        $countSimGradeF = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$uID' AND class = 'sim'");
        $countSimCloneGradeU = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$uID' AND class = 'sim'");
        $countSimCloneGradeF = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$uID' AND class = 'sim'");

        $countActualGradeUData = $countActualGradeU->fetchColumn();
        $countActualCloneGradeUData = $countActualCloneGradeU->fetchColumn();
        $countSimGradeUData = $countSimGradeU->fetchColumn();
        $countSimCloneGradeUData = $countSimCloneGradeU->fetchColumn();

        $totalU = $totalU + $countActualGradeUData + $countActualCloneGradeUData + $countSimGradeUData + $countSimCloneGradeUData;

        $countActualGradeFData = $countActualGradeF->fetchColumn();
        $countActualCloneGradeFData = $countActualCloneGradeF->fetchColumn();
        $countSimGradeFData = $countSimGradeF->fetchColumn();
        $countSimCloneGradeFData = $countSimCloneGradeF->fetchColumn();

        $totalF = $totalF + $countActualGradeFData + $countActualCloneGradeFData + $countSimGradeFData + $countSimCloneGradeFData;

        $actualUCount = $actualUCount + $countActualGradeUData + $countActualCloneGradeUData;
        $simUCount = $simUCount + $countSimGradeUData + $countSimCloneGradeUData;

        $actualFCount = $actualFCount + $countActualGradeFData + $countActualCloneGradeFData;
        $simFCount = $simFCount + $countSimGradeFData + $countSimCloneGradeFData;
    }

    if ($totalU > 0) {
    ?>
        <div style="float: inline-end;margin-top: -40px;">

            <div class="btn-group">
                <div class="col-11" id="seeclassdetailsstd" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="">
                    <button class="btn btn-ghost-danger border" style="font-size: large; font-weight:bold;" data-bs-target="#uOverAll" data-bs-toggle="modal" type="button"><?php echo $totalU; ?>U</button>
                </div>
                <div class="col dropdown-menu navbar-dropdown-menu-borderless menu-btn" aria-labelledby="seeclassdetailsstd">
                    <div class="container">
                        <div class="row" id="searchClassesstd">
                            <div style="width: max-content;">
                                <?php
                                // $actualUCOunt = ;

                                ?>
                                <label>Actual</label><span class="badge bg-primary rounded pill" style="margin:5px;"><?php echo $actualUCount; ?></span>
                                <hr style="margin:0px;">
                                <label>Sim</label><span class="badge bg-primary rounded pill" style="margin:5px;"><?php echo $simUCount; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    <?php
    }
    if ($totalF > 0) {
    ?>

        <div class="btn-group">
            <div class="col-11" id="seeclassdetailsstdff" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="">
                <button class="btn btn-ghost-warning border" style="font-size: large;font-weight: bold;" data-bs-target="#fOverAll" data-bs-toggle="modal" type="button"><?php echo $totalF; ?>F</button>
            </div>
            <div class="col dropdown-menu navbar-dropdown-menu-borderless menu-btnff" aria-labelledby="seeclassdetailsstdff">
                <div class="container">
                    <div class="row" id="searchClassesstdff">
                        <div style="width: max-content;">
                            <label>Actual</label><span class="badge bg-primary rounded pill" style="margin:5px;"><?php echo $actualFCount; ?></span>
                            <hr style="margin:0px;">
                            <label>Sim</label><span class="badge bg-primary rounded pill" style="margin:5px;"><?php echo $simFCount; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
    <button class="btn btn-ghost-danger border" style="font-size: large;font-weight: bold;" type="button" data-bs-toggle="modal" data-bs-target="#issuesModalAll">Issues</button>
</div>


    <hr class="text-success">
    <div class="row align-items-center gx-2 mb-2">
        <div class="col-12">
            <div class="container-fluid" id="heatChart">
                <?php

                // Fetch phase data with optional 'color' defaulting to 'gray'
                $queryHeatmap = $connect->query("SELECT id, phasename, COALESCE(color, 'gray') AS color FROM phase WHERE ctp = '$std_course1'");

                // Initialize item and subitem arrays


                while ($queryHeatmapData = $queryHeatmap->fetch()) {
                    $ph_id = $queryHeatmapData['id'];
                    $ph_co = $queryHeatmapData['color'];

                    // Fetch class data with UNION
                    $classQuery = $connect->query("SELECT id, symbol AS clas_sym, 'actual' AS table_name FROM actual WHERE ctp = '$std_course1' AND phase = '$ph_id' UNION SELECT id, shortsim AS clas_sym, 'sim' AS table_name FROM sim WHERE ctp = '$std_course1' AND phase = '$ph_id'");

                    if ($classQuery->rowCount() > 0) {
                        // Start a new row in HTML
                        $fetchAvg = $connect->query("SELECT AVG(over_all_grade_per) FROM gradesheet WHERE phase_id = '$ph_id' AND course_id = '$std_course1' AND over_all_grade_per IS NOT NULL AND over_all_grade IS NOT NULL");
                        echo '<div class="row mb-2" style="margin: 0px !important; padding:0px !important;">';
                        // echo '<div class="col-1" style="width:auto;">';
                        // echo '<span style="font-weight: bold;font-size: small; margin: 5px;" class="badge bg-success">'.round($fetchAvg->fetchColumn(),2).'</span>';
                        // echo '</div>';
                        echo '<div class="col-1" style="margin-right:-20px;">';
                        echo '<span style="font-weight: bold;color:' . $ph_co . '">' . $queryHeatmapData['phasename'] . '</span>';
                        echo '</div>';
                        echo '<div class="col-md-10">';

                        // Loop through class data
                        while ($classQueryData = $classQuery->fetch(PDO::FETCH_ASSOC)) {
                            $cl_ides = $classQueryData['id'];
                            $cl_names = $classQueryData['table_name'];
                            $itemArrU = [];
                            $itemArrF = [];
                            $subItemArrU = [];
                            $subItemArrF = [];
                            $varFU = 0;
                            $varF = 0;
                            $varU = 0;
                            $gradeArr1U = [];
                            $gradeArr1UIndex = 0;
                            $gradeArr1F = [];
                            $gradeArr1FIndex = 0;
                            $countItemU1 = [];
                            $countItemF1 = [];
                            $countSubItemU1 = [];
                            $countSubItemF1 = [];

                            $grade = 0;
                            $gradeArr = array();
                            $gradeIndex = 0;

                            $selecAllUser = $connect->query("SELECT StudentNames FROM newcourse WHERE CourseCode = '$CourseCode11' AND CourseName = '$std_course1'");

                            while ($selecAllUserData = $selecAllUser->fetch()) {
                                $uID = $selecAllUserData['StudentNames'];
                                // Query to fetch item data

                                $fetchGradeStu = $connect->query("SELECT count(*) FROM gradesheet WHERE user_id = '$uID' AND phase_id = '$ph_id' AND course_id = '$std_course1' AND class_id = '$cl_ides' AND class = '$cl_names' AND (over_all_grade = 'U')");

                                if ($fetchGradeStu->fetchColumn() > 0) {
                                    if (!in_array($uID, $gradeArr1U)) {
                                        $gradeArr1U[$gradeArr1UIndex] = $uID;
                                        $gradeArr1UIndex++;
                                    }
                                }
                                $fetchGradeStu = $connect->query("SELECT count(*) FROM gradesheet WHERE user_id = '$uID' AND phase_id = '$ph_id' AND course_id = '$std_course1' AND class_id = '$cl_ides' AND class = '$cl_names' AND (over_all_grade = 'F')");

                                if ($fetchGradeStu->fetchColumn() > 0) {
                                    if (!in_array($uID, $gradeArr1F)) {
                                        $gradeArr1F[$gradeArr1FIndex] = $uID;
                                        $gradeArr1FIndex++;
                                    }
                                }

                                $checkCloneId = $connect->query("SELECT cloned_id FROM cloned_gradesheet WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names' AND user_id = '$uID'");
                                while ($checkCloneData = $checkCloneId->fetch()) {
                                    $cloneId = $checkCloneData['cloned_id'];

                                    $fetchGradeStu = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE user_id = '$uID' AND phase_id = '$ph_id' AND course_id = '$std_course1' AND class_id = '$cl_ides' AND class = '$cl_names' AND (over_all_grade = 'U') AND cloned_id = '$cloneId'");

                                    if ($fetchGradeStu->fetchColumn() > 0) {
                                        if (!in_array($uID, $gradeArr1U)) {
                                            $gradeArr1U[$gradeArr1UIndex] = $uID;
                                            $gradeArr1UIndex++;
                                        }
                                    }
                                    $fetchGradeStu = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE user_id = '$uID' AND phase_id = '$ph_id' AND course_id = '$std_course1' AND class_id = '$cl_ides' AND class = '$cl_names' AND (over_all_grade = 'F') AND cloned_id = '$cloneId'");

                                    if ($fetchGradeStu->fetchColumn() > 0) {
                                        if (!in_array($uID, $gradeArr1F)) {
                                            $gradeArr1F[$gradeArr1FIndex] = $uID;
                                            $gradeArr1FIndex++;
                                        }
                                    }

                                    $gradeQ = $connect->query("SELECT over_all_grade FROM `cloned_gradesheet` WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names' AND user_id='$uID' AND cloned_id = '$cloneId'");
                                    $grade = $gradeQ->fetchColumn();

                                    $gradeArr[$gradeIndex] = $grade;
                                    $gradeIndex++;

                                    // $checkOverUQuery = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names' AND user_id = '$uID' AND cloned_id = '$cloneId' AND over_all_grade = 'U'");

                                    // if($checkOverUQuery->fetchColumn() > 0){
                                    //     $checkOverU++;
                                    // }

                                    $itemQuery = $connect->prepare("
                SELECT i.id, i.item 
                FROM item i
                INNER JOIN item_clone_gradesheet ig ON i.id = ig.item_id
                WHERE ig.user_id = :uID AND ig.grade IN ('U', 'F') AND ig.cloned_id = :cloneId
                AND i.course_id = :std_course1 AND i.class_id = :cl_ides AND i.phase_id = :ph_id AND i.class = :cl_names
            ");
                                    $itemQuery->bindParam(':uID', $uID);
                                    $itemQuery->bindParam(':cloneId', $cloneId);
                                    $itemQuery->bindParam(':std_course1', $std_course1);
                                    $itemQuery->bindParam(':cl_ides', $cl_ides);
                                    $itemQuery->bindParam(':ph_id', $ph_id);
                                    $itemQuery->bindParam(':cl_names', $cl_names);
                                    $itemQuery->execute();

                                    while ($itemQueryData = $itemQuery->fetch(PDO::FETCH_ASSOC)) {
                                        $checkU = 0;
                                        $checkF = 0;
                                        $item_id_s = $itemQueryData['id'];
                                        $countItemU = $connect->query("SELECT count(*) FROM `item_clone_gradesheet` WHERE item_id='$item_id_s' AND user_id='$uID' AND grade='U' AND cloned_id='$cloneId'");
                                        $checkU = $countItemU->fetchColumn();
                                        // $varU = $varU + $checkU;

                                        if ($checkU > 0) {
                                            $itemNameQU = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                                            $itemNameDataU = $itemNameQU->fetchColumn();
                                            $countItemU1[] = $itemNameDataU;
                                            if (!in_array($itemNameDataU, $itemArrU)) {
                                                $varU++;
                                                $itemArrU[] = $itemNameDataU;
                                            }
                                        }

                                        $countItemF = $connect->query("SELECT count(*) FROM `item_clone_gradesheet` WHERE item_id='$item_id_s' AND user_id='$uID' AND grade='F' AND cloned_id='$cloneId'");
                                        $checkF = $countItemF->fetchColumn();
                                        // $varF = $varF + $checkF;

                                        if ($checkF > 0) {
                                            $itemNameQF = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                                            $itemNameDataF = $itemNameQF->fetchColumn();
                                            // 
                                            $countItemF1[] = $itemNameDataF;
                                            if (!in_array($itemNameDataF, $itemArrF)) {
                                                $varF++;
                                                $itemArrF[] = $itemNameDataF;
                                            }
                                        }

                                        $varFU = $varU + $varF;
                                    }

                                    $subItemQuery = $connect->prepare("SELECT si.id, si.subitem FROM subitem si INNER JOIN subitem_cloned_gradesheet sig ON si.id = sig.subitem_id WHERE sig.user_id = :uID AND sig.grade IN ('U', 'F') AND sig.cloned_id = :cloneId AND si.course_id = :std_course1 AND si.class_id = :cl_ides AND si.phase_id = :ph_id AND si.class = :cl_names");
                                    $subItemQuery->bindParam(':uID', $uID);
                                    $subItemQuery->bindParam(':cloneId', $cloneId);
                                    $subItemQuery->bindParam(':std_course1', $std_course1);
                                    $subItemQuery->bindParam(':cl_ides', $cl_ides);
                                    $subItemQuery->bindParam(':ph_id', $ph_id);
                                    $subItemQuery->bindParam(':cl_names', $cl_names);
                                    $subItemQuery->execute();

                                    while ($subItemQueryData = $subItemQuery->fetch(PDO::FETCH_ASSOC)) {
                                        $subCheckU = 0;
                                        $subCheckF = 0;
                                        $subitem_id_s = $subItemQueryData['id'];
                                        $countItemU = $connect->query("SELECT count(*) FROM `subitem_cloned_gradesheet` WHERE subitem_id='$subitem_id_s' AND user_id='$uID' AND grade='U' AND cloned_id = '$cloneId'");
                                        $subCheckU = $countItemU->fetchColumn();
                                        // $varU = $varU + $subCheckU;

                                        if ($subCheckU > 0) {
                                            $subNameQU = $connect->query("SELECT subitem FROM subitem WHERE id = '$subitem_id_s'");
                                            $subNameDataU = $subNameQU->fetchColumn();
                                            $countSubItemU1[] = $subNameDataU;
                                            if (!in_array($subNameDataU, $subItemArrU)) {
                                                $varU++;
                                                $subItemArrU[] = $subNameDataU;
                                            }
                                        }

                                        $countItemF = $connect->query("SELECT count(*) FROM `subitem_cloned_gradesheet` WHERE subitem_id='$subitem_id_s' AND user_id='$uID' AND grade='F' AND cloned_id = '$cloneId'");
                                        $subCheckF = $countItemF->fetchColumn();
                                        // $varF = $varF + $subCheckF;

                                        if ($subCheckF > 0) {
                                            $subNameQF = $connect->query("SELECT subitem FROM subitem WHERE id = '$subitem_id_s'");
                                            $subNameDataF = $subNameQF->fetchColumn();
                                            $countSubItemF1[] = $subNameDataF;
                                            if (!in_array($subNameDataF, $subItemArrF)) {
                                                $varF++;
                                                $subItemArrF[] = $subNameDataF;
                                            }
                                        }

                                        $varFU = $varU + $varF;
                                    }
                                }

                                $itemQuery = $connect->prepare("SELECT DISTINCT i.id, i.item FROM item i INNER JOIN item_gradesheet ig ON i.id = ig.item_id WHERE ig.user_id = :uID AND ig.grade IN ('U', 'F') AND i.course_id = :std_course1 AND i.class_id = :cl_ides AND i.phase_id = :ph_id AND i.class = :cl_names");
                                $itemQuery->bindParam(':uID', $uID);
                                $itemQuery->bindParam(':std_course1', $std_course1);
                                $itemQuery->bindParam(':cl_ides', $cl_ides);
                                $itemQuery->bindParam(':ph_id', $ph_id);
                                $itemQuery->bindParam(':cl_names', $cl_names);
                                $itemQuery->execute();

                                while ($itemQueryData = $itemQuery->fetch(PDO::FETCH_ASSOC)) {
                                    $checkU = 0;
                                    $checkF = 0;
                                    $item_id_s = $itemQueryData['id'];
                                    $countItemU = $connect->query("SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$uID' AND grade='U'");
                                    $checkU = $countItemU->fetchColumn();
                                    // $varU = $varU + $checkU;

                                    if ($checkU > 0) {
                                        $itemNameQU = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                                        $itemNameDataU = $itemNameQU->fetchColumn();
                                        $countItemU1[] = $itemNameDataU;
                                        if (!in_array($itemNameDataU, $itemArrU)) {
                                            $varU++;
                                            $itemArrU[] = $itemNameDataU;
                                        }
                                    }

                                    $countItemF = $connect->query("SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$uID' AND grade='F'");
                                    $checkF = $countItemF->fetchColumn();
                                    // $varF = $varF + $checkF;

                                    if ($checkF > 0) {
                                        $itemNameQF = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                                        $itemNameDataF = $itemNameQF->fetchColumn();
                                        $countItemF1[] = $itemNameDataF;
                                        if (!in_array($itemNameDataF, $itemArrF)) {
                                            $varF++;
                                            $itemArrF[] = $itemNameDataF;
                                        }
                                    }

                                    $varFU = $varU + $varF;
                                }


                                // Query to fetch subitem data
                                $subItemQuery = $connect->prepare("SELECT DISTINCT si.id, si.subitem FROM subitem si INNER JOIN subitem_gradesheet sig ON si.id = sig.subitem_id WHERE sig.user_id = :uID AND sig.grade IN ('U', 'F') AND si.course_id = :std_course1 AND si.class_id = :cl_ides AND si.phase_id = :ph_id AND si.class = :cl_names");
                                $subItemQuery->bindParam(':uID', $uID);
                                $subItemQuery->bindParam(':std_course1', $std_course1);
                                $subItemQuery->bindParam(':cl_ides', $cl_ides);
                                $subItemQuery->bindParam(':ph_id', $ph_id);
                                $subItemQuery->bindParam(':cl_names', $cl_names);
                                $subItemQuery->execute();

                                while ($subItemQueryData = $subItemQuery->fetch(PDO::FETCH_ASSOC)) {
                                    $subCheckU = 0;
                                    $subCheckF = 0;
                                    $subitem_id_s = $subItemQueryData['id'];
                                    $countItemU = $connect->query("SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$subitem_id_s' AND user_id='$uID' AND grade='U'");
                                    $subCheckU = $countItemU->fetchColumn();
                                    // $varU = $varU + $subCheckU;

                                    if ($subCheckU > 0) {
                                        $subNameQU = $connect->query("SELECT subitem FROM subitem WHERE id = '$subitem_id_s'");
                                        $subNameDataU = $subNameQU->fetchColumn();
                                        $countSubItemU1[] = $subNameDataU;

                                        if (!in_array($subNameDataU, $subItemArrU)) {
                                            $varU++;
                                            $subItemArrU[] = $subNameDataU;
                                        }
                                    }

                                    $countItemF = $connect->query("SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$subitem_id_s' AND user_id='$uID' AND grade='F'");
                                    $subCheckF = $countItemF->fetchColumn();
                                    // $varF = $varF + $subCheckF;

                                    if ($subCheckF > 0) {
                                        $subNameQF = $connect->query("SELECT subitem FROM subitem WHERE id = '$subitem_id_s'");
                                        $subNameDataF = $subNameQF->fetchColumn();
                                        $countSubItemF1[] = $subNameDataF;

                                        if (!in_array($subNameDataF, $subItemArrF)) {
                                            $varF++;
                                            $subItemArrF[] = $subNameDataF;
                                        }
                                    }

                                    $varFU = $varU + $varF;
                                }
                                // Fetch overall grade for the user
                                $gradeQ = $connect->query("SELECT over_all_grade FROM `gradesheet` WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names' AND user_id='$uID'");
                                $grade = $gradeQ->fetchColumn();

                                $gradeArr[$gradeIndex] = $grade;
                                $gradeIndex++;
                            }

                            $css = "background-color:#eeeeee;";
                            if (in_array('V', $gradeArr) || in_array('G', $gradeArr) || in_array('E', $gradeArr) || in_array('N', $gradeArr)) {
                                $css = "background-color:#d6e685;";
                            }
                            if ($varF <= 2 && $varF != 0) {
                                $css = "background-color:#92eb8d;";
                            }
                            if ($varU == 1 || ($varF >= 3 && $varU <= 4)) {
                                $css = "background-color:#8cc665;";
                            }
                            if ($varU == 2 || ($varF >= 5 && $varF <= 7)) {
                                $css = "background-color:#44a340;";
                            }
                            if ($varU == 3 || ($varF >= 7 && $varF <= 9)) {
                                $css = "background-color:#276b37;";
                            }
                            if ($varU >= 4 || $varF >= 9) {
                                $css = "background-color:#0a3608;";
                            }
                            if (in_array("F", $gradeArr)) {
                                $css = "background-color:#ffdb1b;";
                            }
                            if (in_array("U", $gradeArr)) {
                                $css = "background-color:#ff0000;";
                            }
                ?>
                            <div class="btn-group" style="<?= $css ?> padding: 5px; width: 15px;height: 15px; margin:3px;border-radius:2px;cursor:pointer;box-shadow: 0px 1px 3px 0px #677788;position: relative;">
                                <div class="col-11" id="seeclassdetails" data-bs-toggle="dropdown" style="width: 15px;height: 15px;" aria-expanded="false" data-bs-dropdown-animation data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?= $classQueryData['clas_sym']; ?>,U:<?= $varU ?>,F:<?= $varF ?>,Total:<?= $varFU; ?>">
                                    <?= "" ?>
                                </div>
                                <div class="col dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="seeclassdetails" style="width: max-content;">
                                    <div class="container">
                                        <div class="row" id="searchClasses">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <center>
                                                        <span class="heatmaptext card-subtitle bg-soft-success text-success" style="font-size:x-large !important; font-weight: bold !important;"><?= $classQueryData['clas_sym']; ?></span>
                                                    </center>
                                                    <hr style="margin: 0px;" class="text-dark d-none">
                                                    <div>
                                                        <center><label style="font-size: 20px; font-weight:bold;text-decoration-line: underline;font-family: auto;">Overall</label></center>
                                                        <hr class="text-dark d-none" style="margin:0px;">
                                                        <ul style="padding: 0px;">
                                                            <?php if (count($gradeArr1U) > 0) { ?>
                                                                <li style="list-style-type: none; display:flex;"> <span style="font-size: x-large; font-weight:bold;" class="text-danger">U:</span>
                                                                    <?php
                                                                    echo '<div style="display: flex;">';
                                                                    foreach ($gradeArr1U as $gradeArr1UData) {
                                                                        $fetchGradeStu = $connect->query("SELECT count(*) FROM gradesheet WHERE user_id = '$gradeArr1UData' AND phase_id = '$ph_id' AND course_id = '$std_course1' AND class_id = '$cl_ides' AND class = '$cl_names' AND (over_all_grade = 'U')");

                                                                        if ($fetchGradeStu->fetchColumn() > 0) {
                                                                            $gradeQ = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$gradeArr1UData'");
                                                                            $gradeQData = $gradeQ->fetch();
                                                                            if ($gradeQData['file_name'] != "") {
                                                                                $pic111 = BASE_URL . 'includes/Pages/upload/' . $gradeQData['file_name'];
                                                                                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                                                                                    $pic111 = BASE_URL . 'includes/Pages/upload/' . $gradeQData['file_name'];
                                                                                } else {
                                                                                    $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                                }
                                                                            } else {
                                                                                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                            }
                                                                            echo '<div style="display: grid;border-radius: 10px;margin: 5px;background: aliceblue;border: 1px solid grey;box-shadow: 3px 4px 4px 0px #5d535363;"><img class="avatar avatar-sm avatar-circle avatar-img m-1" src="' . $pic111 . '" alt="Image Description"><span style="background-color: darkcyan;text-align: center;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;color: aliceblue;">' . $gradeQData['nickname'] . '</span></div>';
                                                                        }
                                                                        $fetchClone = $connect->query("SELECT cloned_id FROM cloned_gradesheet WHERE user_id = '$gradeArr1UData' AND phase_id = '$ph_id' AND course_id = '$std_course1' AND class_id = '$cl_ides' AND class = '$cl_names' AND (over_all_grade = 'U')");
                                                                        while ($cloneData = $fetchClone->fetch()) {
                                                                            $cId = $cloneData['cloned_id'];
                                                                            $xString = str_repeat("X", $cId);
                                                                            $gradeQ = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$gradeArr1UData'");
                                                                            $gradeQData = $gradeQ->fetch();
                                                                            if ($gradeQData['file_name'] != "") {
                                                                                $pic111 = BASE_URL . 'includes/Pages/upload/' . $gradeQData['file_name'];
                                                                                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                                                                                    $pic111 = BASE_URL . 'includes/Pages/upload/' . $gradeQData['file_name'];
                                                                                } else {
                                                                                    $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                                }
                                                                            } else {
                                                                                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                            }
                                                                            echo '<div style="display: grid;border-radius: 10px;margin: 5px;background: aliceblue;border: 1px solid grey;box-shadow: 3px 4px 4px 0px #5d535363;"><img class="avatar avatar-sm avatar-circle avatar-img m-1" src="' . $pic111 . '" alt="Image Description"><span style="background-color: darkcyan;text-align: center;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;color: aliceblue;">' . $gradeQData['nickname'] . '-' . $xString . '</span></div>';
                                                                        }
                                                                    }
                                                                    echo '</div>';
                                                                    ?>
                                                                </li>
                                                            <?php }
                                                            if (count($gradeArr1F) > 0) { ?>
                                                                <li style="list-style-type: none;display: flex;"> <span style="font-size: x-large; font-weight:bold;" class="text-warning">F:</span>
                                                                    <?php
                                                                    echo '<div style="display: flex;">';
                                                                    foreach ($gradeArr1F as $gradeArr1FData) {
                                                                        $fetchGradeStu = $connect->query("SELECT count(*) FROM gradesheet WHERE user_id = '$gradeArr1FData' AND phase_id = '$ph_id' AND course_id = '$std_course1' AND class_id = '$cl_ides' AND class = '$cl_names' AND (over_all_grade = 'F')");

                                                                        if ($fetchGradeStu->fetchColumn() > 0) {
                                                                            $gradeQ = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$gradeArr1FData'");


                                                                            $gradeQData = $gradeQ->fetch();
                                                                            if ($gradeQData['file_name'] != "") {
                                                                                $pic111 = BASE_URL . 'includes/Pages/upload/' . $gradeQData['file_name'];
                                                                                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                                                                                    $pic111 = BASE_URL . 'includes/Pages/upload/' . $gradeQData['file_name'];
                                                                                } else {
                                                                                    $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                                }
                                                                            } else {
                                                                                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                            }
                                                                            echo '<div style="display: grid;border-radius: 10px;margin: 5px;background: aliceblue;border: 1px solid grey;box-shadow: 3px 4px 4px 0px #5d535363;"><img class="avatar avatar-sm avatar-circle avatar-img m-1" src="' . $pic111 . '" alt="Image Description"><span style="background-color: darkcyan;text-align: center;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;color: aliceblue;">' . $gradeQData['nickname'] . '</span></div>';
                                                                        }
                                                                        $fetchClone = $connect->query("SELECT cloned_id FROM cloned_gradesheet WHERE user_id = '$gradeArr1FData' AND phase_id = '$ph_id' AND course_id = '$std_course1' AND class_id = '$cl_ides' AND class = '$cl_names' AND (over_all_grade = 'F')");
                                                                        while ($cloneData = $fetchClone->fetch()) {
                                                                            $cId = $cloneData['cloned_id'];
                                                                            $xString = str_repeat("X", $cId);
                                                                            $gradeQ = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$gradeArr1FData'");
                                                                            $gradeQData = $gradeQ->fetch();
                                                                            if ($gradeQData['file_name'] != "") {
                                                                                $pic111 = BASE_URL . 'includes/Pages/upload/' . $gradeQData['file_name'];
                                                                                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                                                                                    $pic111 = BASE_URL . 'includes/Pages/upload/' . $gradeQData['file_name'];
                                                                                } else {
                                                                                    $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                                }
                                                                            } else {
                                                                                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                                                            }
                                                                            echo '<div style="display: grid;border-radius: 10px;margin: 5px;background: aliceblue;border: 1px solid grey;box-shadow: 3px 4px 4px 0px #5d535363;"><img class="avatar avatar-sm avatar-circle avatar-img m-1" src="' . $pic111 . '" alt="Image Description"><span style="background-color: darkcyan;text-align: center;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;color: aliceblue;">' . $gradeQData['nickname'] . '-' . $xString . '</span></div>';
                                                                        }
                                                                    }
                                                                    echo '</div>';

                                                                    ?>
                                                                </li>
                                                            <?php } ?>
                                                            <hr style="padding: 0px; margin:0px;" class="text-dark">
                                                            <center>
                                                                <label style="font-size: 20px; font-weight:bold;text-decoration-line: underline;font-family: auto;cursor: pointer;">Issues</label><span> : </span><span class="badge rounded-pill bg-danger m-1">
                                                                    <?php
                                                                    if ($varU > 0) {
                                                                        echo $varU;
                                                                    }
                                                                    ?>
                                                                </span>
                                                                <span class="badge rounded-pill bg-warning m-1" style="background-color: #f5ca99 !important;">
                                                                    <?php
                                                                    if ($varF > 0) {
                                                                        echo $varF;
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </center>
                                                            <hr class="text-dark d-none" style="margin:0px;">
                                                            <?php

                                                            foreach ($itemArrU as $itemNameDataU) {
                                                                $itemNameU = $connect->query("SELECT item FROM itembank WHERE id = '$itemNameDataU'");
                                                                $count = 0;
                                                                foreach ($countItemU1 as $value) {
                                                                    if ($value === $itemNameDataU) {
                                                                        $count++;
                                                                    }
                                                                }
                                                                if ($count == 0) {
                                                                    $count = "";
                                                                }
                                                                echo '<span class="d-flex"><span style="font-size:large;" class="text-danger"><li>' . $itemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
                                                            }
                                                            foreach ($subItemArrU as $subNameDataU) {
                                                                $subItemNameU = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subNameDataU'");
                                                                $count = 0;
                                                                foreach ($countSubItemU1 as $value) {
                                                                    if ($value === $subNameDataU) {
                                                                        $count++;
                                                                    }
                                                                }
                                                                if ($count == 0) {
                                                                    $count = "";
                                                                }
                                                                echo '<span class="d-flex"><span style="font-size:large;" class="text-danger"><li>' . $subItemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
                                                            }
                                                            ?>
                                                            <?php
                                                            foreach ($itemArrF as $itemNameDataF) {
                                                                $itemNameF = $connect->query("SELECT item FROM itembank WHERE id = '$itemNameDataF'");
                                                                $count = 0;
                                                                foreach ($countItemF1 as $value) {
                                                                    if ($value === $itemNameDataF) {
                                                                        $count++;
                                                                    }
                                                                }
                                                                if ($count == 0) {
                                                                    $count = "";
                                                                }
                                                                echo '<span class="d-flex"><span style="font-size:large;" class="text-warning"><li>' . $itemNameF->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
                                                            }
                                                            foreach ($subItemArrF as $subNameDataF) {
                                                                $itemNameF = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subNameDataF'");
                                                                $count = 0;
                                                                foreach ($countSubItemF1 as $value) {
                                                                    if ($value === $subNameDataF) {
                                                                        $count++;
                                                                    }
                                                                }
                                                                if ($count == 0) {
                                                                    $count = "";
                                                                }
                                                                echo '<span class="d-flex"><span style="font-size:large;" class="text-warning"><li>' . $itemNameF->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span></span>';
                                                            }
                                                            ?>
                                                            <hr style="padding: 0px; margin:0px;" class="text-dark">

                                                        </ul>
                                                        <center class="bg-soft-success"><span style="font-size: x-large; font-weight:bold;" class="text-success">Total:<span><?= $varFU ?></span></span></center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php
                        }

                        // Close the HTML row
                        echo '</div>';
                        echo '<div class="col-1" style="justify-content: end;display: flex;">';
                        echo '<span style="font-weight: bold;font-size: small; margin: 5px;" class="badge bg-success">' . round($fetchAvg->fetchColumn(), 2) . '</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            ?>
            </div>
            <div class="row" style="float:right;">
                Less<div class="col-11" style="background-color:#eeeeee;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="0%">
                    <?php echo "" ?></div>
                <div class="col-11" style="background-color:#d6e685;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Gradsheet Filled">
                    <?php echo "" ?></div>
                <div class="col-11" style="background-color:#92eb8d;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="U-1 or F-1 less equal F-3">
                    <?php echo "" ?></div>
                <div class="col-11" style="background-color:#8cc665;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="U-2 or F-3 less equal F-5">
                    <?php echo "" ?></div>
                <div class="col-11" style="background-color:#44a340;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="U-3 or F-5 less equal F-7">
                    <?php echo "" ?></div>
                <div class="col-11" style="background-color:#276b37;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="U-4 or F-7 less equal F-9">
                    <?php echo "" ?></div>
                <div class="col-11" style="background-color:#0a3608;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="more thn 4 U or more than 10 F"></div>
                <div class="col-11" style="background-color:#ff0000;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="U overall">
                    <?php echo "" ?></div>
                <div class="col-11" style="background-color:#ffdb1b;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="F overall">
                    <?php echo "" ?></div>More
            </div>
        </div>
    </div>

    <?php
    $filter_phase = $connect->query("SELECT * FROM phase WHERE ctp='$std_course1' GROUP BY phasename");
    $filter_phase_Data = $filter_phase->fetchAll();
    ?>


    <!-- Modal issues -->