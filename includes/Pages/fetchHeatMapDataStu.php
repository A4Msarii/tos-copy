<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

if (isset($_REQUEST['stdCour'])) {
    $std_course1 = $_REQUEST['stdCour'];
    $fetchuser_id = $_REQUEST['fetchUserId'];

?>
    <div class="card-body">
        <h6 class="card-subtitle text-success" style="float:left;"><span class="badge bg-primary" style="font-size:large;">Heatmap</span></h6>
        <div style="float: right;">
            <?php
            $totalU = 0;
            $totalF = 0;
            $countGradeU = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$fetchuser_id'");
            $countGradeF = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$fetchuser_id'");
            $countCloneGradeU = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$fetchuser_id'");
            $countCloneGradeF = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$fetchuser_id'");

            $totalU = $countCloneGradeU->fetchColumn() + $countGradeU->fetchColumn();
            $totalF = $countCloneGradeF->fetchColumn() + $countGradeF->fetchColumn();

            if ($totalU > 0) {
            ?>

                <div class="btn-group">
                    <div class="col-11" id="seeclassdetailsstd" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="">
                        <button class="btn btn btn-ghost-danger border" style="font-size: large;font-weight: bold;" type="button" data-bs-target="#uOverAll" data-bs-toggle="modal"><?php echo $totalU; ?>U</button>
                    </div>
                    <div class="col dropdown-menu navbar-dropdown-menu-borderless menu-btn" aria-labelledby="seeclassdetailsstd">
                        <div class="container">
                            <div class="row" id="searchClassesstd">
                                <div style="width: max-content;">
                                    <?php
                                    $totalU = 0;
                                    $countGradeU = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class='actual'");
                                    $countCloneGradeU = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class='actual'");
                                    $totalU = $countCloneGradeU->fetchColumn() + $countGradeU->fetchColumn();
                                    ?>
                                    <label>Actual</label><span class="badge bg-primary rounded pill" style="margin:5px;"><?php echo $totalU; ?></span>
                                    <hr style="margin:0px;">
                                    <?php
                                    $totalU = 0;
                                    $countGradeU = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class='sim'");
                                    $countCloneGradeU = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class='sim'");
                                    $totalU = $countCloneGradeU->fetchColumn() + $countGradeU->fetchColumn();
                                    ?>
                                    <label>Sim</label><span class="badge bg-primary rounded pill" style="margin:5px;"><?php echo $totalU; ?></span>
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
                        <button class="btn btn btn-ghost-warning border" style="font-size: large;font-weight: bold;" type="button" data-bs-target="#fOverAll" data-bs-toggle="modal"><?php echo $totalF; ?>F</button>
                    </div>
                    <div class="col dropdown-menu navbar-dropdown-menu-borderless menu-btnff" aria-labelledby="seeclassdetailsstdff">
                        <div class="container">
                            <div class="row" id="searchClassesstdff">
                                <div style="width: max-content;">
                                    <?php
                                    $totalF = 0;
                                    $countGradeF = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class='actual'");
                                    $countCloneGradeF = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class='actual'");
                                    $totalF = $countCloneGradeF->fetchColumn() + $countGradeF->fetchColumn();
                                    ?>
                                    <label>Actual</label><span class="badge bg-primary rounded pill" style="margin:5px;"><?php echo $totalF; ?></span>
                                    <hr style="margin:0px;">
                                    <?php
                                    $totalF = 0;
                                    $countGradeF = $connect->query("SELECT count(*) FROM gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class='sim'");
                                    $countCloneGradeF = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND class='sim'");
                                    $totalF = $countCloneGradeF->fetchColumn() + $countGradeF->fetchColumn();
                                    ?>
                                    <label>Sim</label><span class="badge bg-primary rounded pill" style="margin:5px;"><?php echo $totalF; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>
            <button class="btn btn btn-ghost-success border" type="button" data-bs-toggle="modal" data-bs-target="#issuesModalAll" style="font-size: large;font-weight: bold;">All Issues</button>
        </div>
    </div>
    <hr class="text-success">
    <div class="row align-items-center gx-2 mb-2">
        <div class="col-12">
            <div class="container-fluid" id="heatChart">
                <?php

                // Query to fetch phase data
                $queryHeatmap = $connect->prepare("SELECT * FROM phase WHERE ctp = :std_course1");
                $queryHeatmap->bindParam(':std_course1', $std_course1);
                $queryHeatmap->execute();

                while ($queryHeatmapData = $queryHeatmap->fetch(PDO::FETCH_ASSOC)) {
                    $ph_id = $queryHeatmapData['id'];
                    $ph_co = empty($queryHeatmapData['color']) ? "gray" : $queryHeatmapData['color'];
                    $phasename = $queryHeatmapData['phasename'];
                    $classQuery = $connect->prepare("SELECT id, symbol as clas_sym, 'actual' as table_name FROM actual WHERE ctp = :std_course1 AND phase = :ph_id UNION SELECT id, shortsim as clas_sym, 'sim' as table_name FROM sim WHERE ctp = :std_course1 AND phase = :ph_id");
                    $classQuery->bindParam(':std_course1', $std_course1);
                    $classQuery->bindParam(':ph_id', $ph_id);
                    $classQuery->execute();
                    if ($classQuery->rowCount() > 0) {
                        $fetchAvg = $connect->query("SELECT AVG(over_all_grade_per) FROM gradesheet WHERE phase_id = '$ph_id' AND course_id = '$std_course1' AND user_id = '$fetchuser_id' AND over_all_grade_per IS NOT NULL AND over_all_grade IS NOT NULL");
                        echo '<div class="row mb-2" style="margin: 0px !important; padding:0px !important;">';
                        echo '<div class="col-md-1" style="margin-right:-20px;">';
                        echo '<span style="font-weight: bold;color:' . $ph_co . '">' . $phasename . '</span>';
                        echo '</div>';
                        echo '<div class="col-md-10">';
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
                            $uID = $fetchuser_id;
                            $grade = 0;
                            $countItemU1 = [];
                            $countItemF1 = [];
                            $countSubItemU1 = [];
                            $countSubItemF1 = [];
                            $checkOverU = 0;
                            $checkOverF = 0;

                            $checkCloneId = $connect->query("SELECT cloned_id FROM cloned_gradesheet WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names' AND user_id = '$uID'");
                            while ($checkCloneData = $checkCloneId->fetch()) {
                                $cloneId = $checkCloneData['cloned_id'];

                                $checkOverUQuery = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names' AND user_id = '$uID' AND cloned_id = '$cloneId' AND over_all_grade = 'U'");

                                if ($checkOverUQuery->fetchColumn() > 0) {
                                    $checkOverU++;
                                }

                                $checkOverFQuery = $connect->query("SELECT count(*) FROM cloned_gradesheet WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names' AND user_id = '$uID' AND cloned_id = '$cloneId' AND over_all_grade = 'F'");

                                if ($checkOverFQuery->fetchColumn() > 0) {
                                    $checkOverF++;
                                }

                                $itemQuery = $connect->prepare("SELECT i.id, i.item FROM item i INNER JOIN item_clone_gradesheet ig ON i.id = ig.item_id WHERE ig.user_id = :uID AND ig.grade IN ('U', 'F') AND ig.cloned_id = :cloneId AND i.course_id = :std_course1 AND i.class_id = :cl_ides AND i.phase_id = :ph_id AND i.class = :cl_names");
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
                                    if ($subCheckU > 0) {
                                        $subNameQU = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subitem_id_s'");
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
                                        $subNameQF = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subitem_id_s'");
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


                            // Query to fetch item data
                            $itemQuery = $connect->prepare("SELECT i.id, i.item FROM item i INNER JOIN item_gradesheet ig ON i.id = ig.item_id WHERE ig.user_id = :uID AND ig.grade IN ('U', 'F')AND i.course_id = :std_course1 AND i.class_id = :cl_ides AND i.phase_id = :ph_id AND i.class = :cl_names");
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
                            $subItemQuery = $connect->prepare("SELECT si.id, si.subitem FROM subitem si
                INNER JOIN subitem_gradesheet sig ON si.id = sig.subitem_id WHERE sig.user_id = :uID AND sig.grade IN ('U', 'F') AND si.course_id = :std_course1 AND si.class_id = :cl_ides AND si.phase_id = :ph_id AND si.class = :cl_names");
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
                                    $subNameQU = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subitem_id_s'");
                                    $subNameDataU = $subNameQU->fetchColumn();
                                    $countSubItemU1[] = $subNameDataU;
                                    if (!in_array($subNameDataU, $subItemArrU)) {
                                        $varU++;
                                        $subItemArrU[] = $subNameDataU;
                                    }
                                }

                                $countItemF = $connect->query("SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$subitem_id_s' AND user_id='$uID' AND grade='F'");
                                $subCheckF = $countItemF->fetchColumn();
                                if ($subCheckF > 0) {
                                    $subNameQF = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subitem_id_s'");
                                    $subNameDataF = $subNameQF->fetchColumn();
                                    $countSubItemF1[] = $subNameDataF;
                                    if (!in_array($subNameDataF, $subItemArrF)) {
                                        $varF++;
                                        $subItemArrF[] = $subNameDataF;
                                    }
                                }

                                $varFU = $varU + $varF;
                            }
                            $gradeQ = $connect->prepare("SELECT over_all_grade FROM `gradesheet` WHERE course_id=:std_course1 AND class_id=:cl_ides AND phase_id=:ph_id AND class=:cl_names AND user_id=:uID");
                            $gradeQ->bindParam(':std_course1', $std_course1);
                            $gradeQ->bindParam(':cl_ides', $cl_ides);
                            $gradeQ->bindParam(':ph_id', $ph_id);
                            $gradeQ->bindParam(':cl_names', $cl_names);
                            $gradeQ->bindParam(':uID', $uID);
                            $gradeQ->execute();
                            $grade = $gradeQ->fetchColumn();

                            // CSS logic
                            $css = "background-color:#eeeeee;";
                            if ($grade != "") {
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
                            if ($grade == 'U') {
                                $css = "background-color:#ff0000;";
                            }
                            if ($grade == 'F') {
                                $css = "background-color:#ffdb1b;";
                            }

                            if ($checkOverF > 0) {
                                $css = "background-color:#ffdb1b;";
                            }

                            if ($checkOverU > 0) {
                                $css = "background-color:#ff0000;";
                            }
                ?>

                            <div class="btn-group" style="<?= $css ?> padding: 5px; width: 15px;height: 15px; margin:3px;border-radius:2px;cursor:pointer;box-shadow: 0px 1px 3px 0px #677788;position: relative;">
                                <div class="col-11" id="seeclassdetails" data-bs-toggle="dropdown" style="width: 15px;height: 15px;" aria-expanded="false" data-bs-dropdown-animation data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?= $classQueryData['clas_sym']; ?>,U:<?= $varU ?>,F:<?= $varF ?>,Total:<?= $varFU; ?>">
                                    <?= "" ?>
                                </div>
                                <div class="col dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="seeclassdetails">
                                    <div class="container">
                                        <div class="row" id="searchClasses">
                                            <center class="bg-soft-success"><span class="heatmaptext text-success"><?= $classQueryData['clas_sym']; ?></span></center>
                                            <hr style="margin:1px;padding: 1px;">
                                            <div style="width: max-content;">
                                                <center>
                                                    <label style="font-size: 20px; font-weight:bold; cursor: pointer;">Issues :
                                                        <span class="badge rounded-pill bg-danger m-1">
                                                            <?php
                                                            if ($varU > 0) {
                                                                echo $varU;
                                                            } ?>
                                                        </span>
                                                        <span class="badge rounded-pill bg-warning m-1" style="background-color: #f5ca99 !important;">
                                                            <?php
                                                            if ($varF > 0) {
                                                                echo $varF;
                                                            }
                                                            ?>
                                                        </span>
                                                    </label>
                                                </center>
                                                <hr class="text-dark" style="margin:0px;">
                                                <ul style="padding: 0px;">
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
                                                        echo '<span style="font-size:large;" class="text-danger"><li>' . $itemNameU->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span>';
                                                    }
                                                    foreach ($subItemArrU as $subNameDataU) {
                                                        $count = 0;
                                                        foreach ($countSubItemU1 as $value) {
                                                            if ($value === $subNameDataU) {
                                                                $count++;
                                                            }
                                                        }
                                                        if ($count == 0) {
                                                            $count = "";
                                                        }
                                                        echo '<span style="font-size:large;" class="text-danger"><li>' . $subNameDataU . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span>';
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
                                                        echo '<span style="font-size:large;" class="text-warning"><li>' . $itemNameF->fetchColumn() . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span>';
                                                    }

                                                    foreach ($subItemArrF as $subNameDataF) {
                                                        $count = 0;
                                                        foreach ($countSubItemF1 as $value) {
                                                            if ($value === $subNameDataF) {
                                                                $count++;
                                                            }
                                                        }
                                                        if ($count == 0) {
                                                            $count = "";
                                                        }
                                                        echo '<span style="font-size:large;" class="text-warning"><li>' . $subNameDataF . '</li></span><span class="badge bg-primary rounded pill" style="margin:5px;">' . $count . '</span>';
                                                    }
                                                    ?>
                                                    <center class="bg-soft-success"><span style="font-size: x-large; font-weight:bold;" class="text-success">Total:<?= $varFU ?></span></center>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
            </div>
            <div class="col-1" style="justify-content: end;display: flex;">
                        <span style="font-weight: bold;font-size: small; margin: 5px;" class="badge bg-success"><?php echo round($fetchAvg->fetchColumn(), 2);?></span>
                        </div>
        </div>


<?php
                    }
                }
            }


?>
    </div>
    <hr>
    <div class="row" style="float:right; margin: 5px;margin-top: -10px;">
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

    <?php
    $filter_phase = $connect->query("SELECT * FROM phase WHERE ctp='$std_course1' GROUP BY phasename");
    $filter_phase_Data = $filter_phase->fetchAll();
    ?>


    <!-- Modal issues -->