<?php
$filter_phase = $connect->query("SELECT * FROM phase GROUP BY phasename");
$filter_phase_Data = $filter_phase->fetchAll();

?>
<style type="text/css">
    /* Initially hide the second div */
    .dropdown-menu {
        display: none;
        float: right;
        top: 15px;
        position: absolute;
    }

    /* When hovering over the first div, display the second div */
    #seeclassdetails:hover+.dropdown-menu {
        display: block;
    }
</style>
<div class="row">

    <div class="col-lg-12 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h6 class="card-subtitle text-success">HeatMap</h6>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-2">
                    <div class="col-12">
                        <div class="container">
                            <?php

                            $query_heatmap = "SELECT * FROM phase where ctp='$std_course1'";
                            $statement_heatmap = $connect->prepare($query_heatmap);
                            $statement_heatmap->execute();
                            $result_heatmap = $statement_heatmap->fetchAll();
                            foreach ($result_heatmap as $row_heatmap) {
                                $ph_id = $row_heatmap['id'];
                                $ph_co = $row_heatmap['color'];
                                $var10 = $connect->query("SELECT
                    (SELECT COUNT(*) FROM actual 
                     WHERE phase='$ph_id') +
                    (SELECT COUNT(*) FROM sim 
                     WHERE phase='$ph_id') AS total_count");
                                $var_data10 = $var10->fetchColumn();
                                if ($var_data10 > 0) {
                            ?>
                                    <div class="row mb-2" style="margin: 0px !important; padding:0px !important;">
                                        <div class="col-1" style="width:auto;">
                                            <?php echo '<span style="font-weight: bold;color:' . $ph_co . '">' . $row_heatmap['phasename'] . '</span>'; ?>
                                        </div>
                                        <?php

                                        $query_heatmap_cl = "SELECT id,symbol as clas_sym,'actual' as table_name FROM actual WHERE ctp = '$std_course1' and phase='$ph_id'
                          UNION
                          SELECT id,shortsim as clas_sym,'sim' as table_name FROM sim WHERE ctp = '$std_course1' and phase='$ph_id'";
                                        $statement_heatmap_cl = $connect->prepare($query_heatmap_cl);
                                        $statement_heatmap_cl->execute();
                                        $result_heatmap_cl = $statement_heatmap_cl->fetchAll();


                                        foreach ($result_heatmap_cl as $row_heatmap_cl) {
                                            $cl_ides = $row_heatmap_cl['id'];
                                            $cl_names = $row_heatmap_cl['table_name'];
                                            $allnotitem = "SELECT * FROM item WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names'";

                                            $statementallnotitem = $connect->prepare($allnotitem);
                                            $statementallnotitem->execute();
                                            $var1 = $connect->query("SELECT COUNT(*) FROM item 
                           WHERE course_id='$std_course1' 
                             AND class_id='$cl_ides' 
                             AND phase_id='$ph_id' 
                             AND class='$cl_names'");
                                            $var_data = $var1->fetchColumn();
                                            $var = 0;
                                            $var3 = 0;
                                            $var4 = 0;
                                            $number_of_rows111 = "";
                                            $number_of_rows112 = "";
                                            if ($statementallnotitem->rowCount() > 0) {
                                                $resultallnotitem = $statementallnotitem->fetchAll();
                                                foreach ($resultallnotitem as $rowallnotitem) {
                                                    $grade = "";
                                                    $item_id_s = $rowallnotitem['id'];
                                                    $sql51 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' AND (grade='U' OR grade='F')";
                                                    $result51 = $connect->prepare($sql51);
                                                    $result51->execute();
                                                    $number_of_rows11 = $result51->fetchColumn();
                                                    $var = $var + $number_of_rows11;
                                                    $sql511 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' and grade='U'";
                                                    $result511 = $connect->prepare($sql511);
                                                    $result511->execute();
                                                    $number_of_rows111 = $result511->fetchColumn();
                                                    $var3 = $var3 + $number_of_rows111;
                                                    $sql512 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='F'";
                                                    $result512 = $connect->prepare($sql512);
                                                    $result512->execute();
                                                    $number_of_rows112 = $result512->fetchColumn();
                                                    $var4 = $var4 + $number_of_rows112;
                                                }
                                            }
                                            $allnotitem = "SELECT * FROM subitem WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names'";
                                            $statementallnotitem = $connect->prepare($allnotitem);
                                            $statementallnotitem->execute();
                                            $var1 = $connect->query("SELECT COUNT(*) FROM subitem WHERE course_id = '$std_course1' AND class_id = '$cl_ides' AND phase_id = '$ph_id' AND class = '$cl_names'");
                                            $var_data = $var1->fetchColumn();
                                            $number_of_rows111 = "";
                                            $number_of_rows112 = "";
                                            if ($statementallnotitem->rowCount() > 0) {
                                                $resultallnotitem = $statementallnotitem->fetchAll();
                                                foreach ($resultallnotitem as $rowallnotitem) {
                                                    $grade = "";
                                                    $item_id_s = $rowallnotitem['id'];
                                                    $sql51 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND (grade='U' OR grade='F')";
                                                    $result51 = $connect->prepare($sql51);
                                                    $result51->execute();
                                                    $number_of_rows11 = $result51->fetchColumn();
                                                    $var = $var + $number_of_rows11;
                                                    $sql511 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='U'";
                                                    $result511 = $connect->prepare($sql511);
                                                    $result511->execute();
                                                    $number_of_rows111 = $result511->fetchColumn();
                                                    $var3 = $var3 + $number_of_rows111;
                                                    $sql512 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$fetchuser_id' AND grade='F'";
                                                    $result512 = $connect->prepare($sql512);
                                                    $result512->execute();
                                                    $number_of_rows112 = $result512->fetchColumn();
                                                    $var4 = $var4 + $number_of_rows112;
                                                }
                                            }

                                            $fetch_grade = $connect->prepare("SELECT over_all_grade FROM `gradesheet` WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names' and user_id='$fetchuser_id'");

                                            $fetch_grade->execute();
                                            $grade = $fetch_grade->fetchColumn();
                                            $Percentage = 0;
                                            $css = "background-color:#eeeeee;";
                                            if ($grade != "") {
                                                $css = "background-color:#d6e685;";
                                            }
                                            if ($var4 <= 2 && $var4 != 0) {
                                                $css = "background-color:#92eb8d;";
                                            }

                                            if ($var3 == 1 || $var4 >= 3 && $var4 <= 4) {
                                                $css = "background-color:#8cc665;";
                                            }
                                            if ($var3 == 2 || $var4 >= 5 && $var4 <= 7) {
                                                $css = "background-color:#44a340;";
                                            }
                                            if ($var3 == 3 || $var4 >= 7 && $var4 <= 9) {
                                                $css = "background-color:#276b37;";
                                            }
                                            if ($var3 >= 4 || $var4 >= 9) {
                                                $css = "background-color:#0a3608;";
                                            }
                                            if ($grade == 'U') {
                                                $css = "background-color:#ff0000;";
                                            }
                                            if ($grade == 'F') {
                                                $css = "background-color:#ffdb1b;";
                                            }

                                        ?>
                                            <div class="btn-group" style="<?php echo $css; ?> padding: 5px; width: 15px;height: 15px; margin:3px;border-radius:2px;cursor:pointer;box-shadow: 0px 1px 3px 0px #677788;position: relative;">
                                                <div class="col-11 fetchHeatMapData" data-courseId="<?php echo $std_course1; ?>" data-classId="<?php echo $cl_ides; ?>" data-phaseId="<?php echo $ph_id; ?>" data-class="<?php echo $cl_names; ?>" data-userId="<?php echo $fetchuser_id; ?>" data-bs-toggle="dropdown" aria-expanded="false" id="seeclassdetails" style="width: 15px;height: 15px;">
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="seeclassdetails" style="width:auto;">
                                                    <div class="container">

                                                        <div class="row">
                                                            <ul>
                                                                <li><span style="font-size: large; font-weight:bold;"><?php echo $row_heatmap_cl['clas_sym']; ?></span></li>
                                                                <hr style="margin: 0px;">
                                                                <li><span style="font-size: large; font-weight:bold;" class="text-danger">U : <?php echo $var3 ?></span></li>
                                                                <div class="heatMapData">

                                                                </div>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <hr>
                        <div class="row" style="float:right;">
                            Less<div class="col-11" style="background-color:#eeeeee;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="0%">
                                <?php echo "" ?></div>
                            <div class="col-11" style="background-color:#d6e685;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Gradsheet Filled">
                                <?php echo "" ?></div>
                            <div class="col-11" style="background-color:#92eb8d;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="25%">
                                <?php echo "" ?></div>
                            <div class="col-11" style="background-color:#8cc665;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="50%">
                                <?php echo "" ?></div>
                            <div class="col-11" style="background-color:#44a340;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="75%">
                                <?php echo "" ?></div>
                            <div class="col-11" style="background-color:#276b37;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="100%">
                                <?php echo "" ?></div>
                            <div class="col-11" style="background-color:#0a3608;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="more than 100%">
                                <?php echo "" ?></div>
                            <div class="col-11" style="background-color:#ff0000;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="U overall">
                                <?php echo "" ?></div>
                            <div class="col-11" style="background-color:#ffdb1b;padding: 5px; width: 15px;height: 15px; margin:1px;border-radius:2px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="F overall">
                                <?php echo "" ?></div>More
                        </div>
                    </div>

                    <!-- <div id="github_chart_1"></div>
            <div class="seperate"></div> -->
                </div>
            </div>
            <!-- End Col -->
        </div>

    </div>
</div>