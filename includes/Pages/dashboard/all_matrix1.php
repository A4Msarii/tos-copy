<?php
$filter_phase = $connect->query("SELECT * FROM phase GROUP BY phasename");
$filter_phase_Data = $filter_phase->fetchAll();

?>
<style type="text/css">
    [data-bs-title]:hover:after {
        visibility: visible;
    }

    [data-bs-title]:after {
        content: attr(data-bs-title);
        background-color: #042156;
        color: white;
        font-size: 100%;
        font-weight: bolder;
        /*            margin-top: 20px;*/
        position: absolute;
        padding: 4px 8px 4px 8px;
        visibility: hidden;
        border-radius: 10px;
        width: auto;
        margin-top: 20px;

    }
</style>
<!--All graph-->
<div class="row">
    <div class="row mb-2">
        <form action="#" method="post">
            <div class="col-md-12 d-flex justify-content-end">
                <div class="form-group col-2 m-1" style="text-align: -webkit-right;">
                    <select class="form-control" name="phase_id" id="phase_id" style="width:75%;">
                        <option selected disabled>filter according to phase</option>
                        <?php
                        foreach ($filter_phase_Data as $dt) {
                        ?>
                            <option value="<?php echo $dt['id'] ?>"><?php echo $dt['phasename'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-2 m-1">
                    <select class="form-control" name="month" id="month_id" style="width:75%;">
                        <option selected disabled>filter according to Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary btn-sm rounded-pill" id="submit">Filtersss</button>
            </div>
        </form>
    </div>

    <div class="col-lg-12 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h6 class="card-subtitle text-success">All Student Graph</h6>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-2">
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <?php
                                foreach ($filter_phase_Data as $dt) {
                                ?><div class="d-flex col-auto">
                                        <div style="height:10px;width:10px;border-radius:20px;background:<?php echo $dt['color'] ?>;margin-top:5px;margin-right:10px"></div>
                                        <p><?php echo $dt['phasename'] ?></p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div id="chart" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
                <!-- End Col -->
            </div>

        </div>
    </div>
    <!-- End Card -->
</div>

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
                                            $itemArrU = array();
                                            $itemIndexU = 0;
                                            $itemArrF = array();
                                            $itemIndexF = 0;
                                            $subItemArrU = array();
                                            $subItemIndexU = 0;
                                            $subItemArrF = array();
                                            $subItemIndexF = 0;
                                            $var = 0;
                                            $var3 = 0;
                                            $var4 = 0;
                                            $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id'");
                                            while ($getCourseData = $getCourse->fetch()) {
                                                $course_Code = $getCourseData['CourseCode'];
                                                $course_Name = $getCourseData['CourseName'];
                                                $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
                                                while ($selecAllUserData = $selecAllUser->fetch()) {
                                                    $uID = $selecAllUserData['StudentNames'];
                                                    $grade = 0;
                                                
                                            $allnotitem = "SELECT * FROM item WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names'";

                                            $statementallnotitem = $connect->prepare($allnotitem);
                                            $statementallnotitem->execute();
                                            $var1 = $connect->query("SELECT COUNT(*) FROM item 
                                            WHERE course_id='$std_course1' 
                                                AND class_id='$cl_ides' 
                                                AND phase_id='$ph_id' 
                                                AND class='$cl_names'");
                                            $var_data = $var1->fetchColumn();
                                            
                                            $number_of_rows111 = "";
                                            $number_of_rows112 = "";
                                            if ($statementallnotitem->rowCount() > 0) {
                                                $resultallnotitem = $statementallnotitem->fetchAll();
                                                foreach ($resultallnotitem as $rowallnotitem) {
                                                    $item_id_s = $rowallnotitem['id'];
                                                    $sql51 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$uID' AND (grade='U' OR grade='F')";
                                                    $result51 = $connect->prepare($sql51);
                                                    $result51->execute();
                                                    $number_of_rows11 = $result51->fetchColumn();
                                                    $var = $var + $number_of_rows11;
                                                    $sql511 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$uID' and grade='U'";
                                                    $result511 = $connect->prepare($sql511);
                                                    $result511->execute();
                                                    $number_of_rows111 = $result511->fetchColumn();
                                                    if ($number_of_rows111 > 0) {
                                                        $subIdQU = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                                                        $subIdDataU = $subIdQU->fetchColumn();
                                                        $subNameQU = $connect->query("SELECT item FROM itembank WHERE id = '$subIdDataU'");
                                                        $subNameDataU = $subNameQU->fetchColumn();
                                                        if (!in_array($subNameDataU, $itemArrU)) {
                                                            $itemArrU[$itemIndexU] = $subNameDataU;
                                                            $itemIndexU++;
                                                        }
                                                    }
                                                    $var3 = $var3 + $number_of_rows111;
                                                    $sql512 = "SELECT count(*) FROM `item_gradesheet` WHERE item_id='$item_id_s' AND user_id='$uID' AND grade='F'";
                                                    $result512 = $connect->prepare($sql512);
                                                    $result512->execute();
                                                    $number_of_rows112 = $result512->fetchColumn();
                                                    if ($number_of_rows112 > 0) {
                                                        $subIdQF = $connect->query("SELECT item FROM item WHERE id = '$item_id_s'");
                                                        $subIdDataF = $subIdQF->fetchColumn();
                                                        $subNameQF = $connect->query("SELECT item FROM itembank WHERE id = '$subIdDataF'");
                                                        $subNameDataF = $subNameQF->fetchColumn();
                                                        if (!in_array($subNameDataF, $itemArrF)) {
                                                            $itemArrF[$itemIndexF] = $subNameDataF;
                                                            $itemIndexF++;
                                                        }
                                                    }
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
                                                    $item_id_s = $rowallnotitem['id'];
                                                    $sql51 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$uID' AND (grade='U' OR grade='F')";
                                                    $result51 = $connect->prepare($sql51);
                                                    $result51->execute();
                                                    $number_of_rows11 = $result51->fetchColumn();
                                                    $var = $var + $number_of_rows11;
                                                    $sql511 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$uID' AND grade='U'";
                                                    $result511 = $connect->prepare($sql511);
                                                    $result511->execute();
                                                    $number_of_rows111 = $result511->fetchColumn();
                                                    if ($number_of_rows111 > 0) {
                                                        $subIdQU = $connect->query("SELECT subitem FROM subitem WHERE id = '$item_id_s'");
                                                        $subIdDataU = $subIdQU->fetchColumn();
                                                        $subNameQU = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subIdDataU'");
                                                        $subNameDataU = $subNameQU->fetchColumn();
                                                        if (!in_array($subNameDataU, $subItemArrU)) {
                                                            $subItemArrU[$subItemIndexU] = $subNameDataU;
                                                            $subItemIndexU++;
                                                        }
                                                    }
                                                    $var3 = $var3 + $number_of_rows111;
                                                    $sql512 = "SELECT count(*) FROM `subitem_gradesheet` WHERE subitem_id='$item_id_s' AND user_id='$uID' AND grade='F'";
                                                    $result512 = $connect->prepare($sql512);
                                                    $result512->execute();
                                                    $number_of_rows112 = $result512->fetchColumn();

                                                    if ($number_of_rows112 > 0) {
                                                        $subIdQF = $connect->query("SELECT subitem FROM subitem WHERE id = '$item_id_s'");
                                                        $subIdDataF = $subIdQF->fetchColumn();
                                                        $subNameQF = $connect->query("SELECT subitem FROM sub_item WHERE id = '$subIdDataF'");
                                                        $subNameDataF = $subNameQF->fetchColumn();
                                                        if (!in_array($subNameDataF, $subItemArrF)) {
                                                            $subItemArrF[$subItemIndexF] = $subNameDataF;
                                                            $subItemIndexF++;
                                                        }
                                                    }
                                                    $var4 = $var4 + $number_of_rows112;
                                                }
                                            }

                                            $fetch_grade = $connect->prepare("SELECT over_all_grade FROM `gradesheet` WHERE course_id='$std_course1' AND class_id='$cl_ides' AND phase_id='$ph_id' AND class='$cl_names' and user_id='$uID'");

                                            $fetch_grade->execute();
                                            $grade = $fetch_grade->fetchColumn();
                                            // $grade = $grade + $grade1;
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
                                        }
                                    }

                                        ?>
                                            <div class="col-11" id="seeclassdetails" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="<?php echo $css; ?> padding: 5px; width: 15px;height: 15px; margin:3px;border-radius:2px;cursor:pointer;box-shadow: 0px 1px 3px 0px #677788;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?php echo $row_heatmap_cl['clas_sym']; ?>,U:<?php echo $var3 ?>

                      <?php $name = 0;
                                            while ($name < count($itemArrU)) {
                                                echo $itemArrU[$name];
                                                $name++;
                                            } ?>
                      <?php $name = 0;
                                            while ($name < count($itemArrF)) {
                                                echo $itemArrF[$name];
                                                $name++;
                                            } ?>
                      ,F:<?php echo $var4 ?>
                      <?php $name = 0;
                                            while ($name < count($subItemArrU)) {
                                                echo $subItemArrU[$name];
                                                $name++;
                                            } ?>
                      <?php $name = 0;
                                            while ($name < count($subItemArrF)) {
                                                echo $subItemArrF[$name];
                                                $name++;
                                            } ?>
                      ,Total:<?php echo $var ?>">
                                                <?php echo "" ?>
                                            </div>
                                            <div class="col dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="seeclassdetails" style="width:auto;">
                                                <div class="container">

                                                    <div class="row" id="searchClasses">
                                                        <ul>
                                                            <li><span style="font-size: large; font-weight:bold;"><?php echo $row_heatmap_cl['clas_sym']; ?></span></li>
                                                            <li><span style="font-size: large; font-weight:bold;">U:<?php echo $var3 ?></span></li>

                                                            <?php $name = 0;
                                                            while ($name < count($itemArrU)) {
                                                                echo $itemArrU[$name];
                                                                $name++;
                                                            } ?>
                                                            <?php $name = 0;
                                                            while ($name < count($itemArrF)) {
                                                                echo $itemArrF[$name];
                                                                $name++;
                                                            } ?>
                                                            <li><span style="font-size: large; font-weight:bold;">F:<?php echo $var4 ?></span></li>
                                                            <?php $name = 0;
                                                            while ($name < count($subItemArrU)) {
                                                                echo $subItemArrU[$name];
                                                                $name++;
                                                            } ?>
                                                            <?php $name = 0;
                                                            while ($name < count($subItemArrF)) {
                                                                echo $subItemArrF[$name];
                                                                $name++;
                                                            } ?>
                                                        </ul>
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
<!-- End Card -->


<!--first row end-->
<style>
    .custom-tooltip {
        padding: 10px;
        /* Adjust the padding as needed */
    }

    .very-good-tooltip {
        background-color: green;
        color: white;
    }

    .good-tooltip {
        background-color: yellow;
    }

    .normal-tooltip {
        background-color: gray;
        color: white;
    }
</style>
<!--sepearte graph-->
<div class="row">
    <div class="col-md-12 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle text-success"><a class="text-success" href="">Actual</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">

                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <?php
                                foreach ($filter_phase_Data as $dt) {
                                ?><div class="d-flex col-auto">
                                        <div style="height:10px;width:10px;border-radius:20px;background:<?php echo $dt['color'] ?>;margin-top:5px;margin-right:10px"></div>
                                        <p><?php echo $dt['phasename'] ?></p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div id="Actual" style="height: 200px; width: 100%;"></div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-md-12 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle"><a href="" class="text-success">Sim</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <?php
                                foreach ($filter_phase_Data as $dt) {
                                ?><div class="d-flex col-auto">
                                        <div style="height:10px;width:10px;border-radius:20px;background:<?php echo $dt['color'] ?>;margin-top:5px;margin-right:10px"></div>
                                        <p><?php echo $dt['phasename'] ?></p>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div id="Sim" style="height: 200px; width: 100%;"></div>
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


<!--sepearte graph 2-->
<div class="row">
    <div class="col-md-12 mb-3 d-none">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle text-success"><a class="text-success" href="">Academic</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">

                    <div class="col">
                        <div id="Academic" style="height: 200px; width: 100%;"></div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>

    <div class="col-md-12 mb-3">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <h1 class="card-subtitle"><a href="" class="text-success">Test</a></h1>
                <hr class="text-success">

                <div class="row align-items-center gx-2 mb-1">
                    <div class="col">
                        <div id="Test" style="height: 200px; width: 100%;"></div>
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


<!-- scripts for graph  -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/apexcharts.min.js"></script>
<script>
    $(document).ready(function() {
        let classData, actualgraph, simgraph, academicgraph, testgraph;
        const ctpId = <?php echo $std_course1 ?>;
        const user_id = <?php echo $fetchuser_id ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                actual: ctpId,
                user_id: user_id,
            },
            success: function(response) {
                var parsedResponse = JSON.parse(response); // Parse the JSON
                var labels = parsedResponse.labels;
                var allactualGradesheetData = parsedResponse.allactualGradesheetData;
                var grades = parsedResponse.grades;
                var instructor = parsedResponse.instructor;
                var allactualphases = parsedResponse.phases; // Access the otherData
                var allactualphasescolor = parsedResponse.phases_color; // Access the phasecolor
                function mapGradeToClass(grade) {
                    switch (grade) {
                        case 'U':
                            return 'danger';
                        case 'F':
                            return 'warning';
                        case 'G':
                            return 'secondary';
                        case 'V':
                            return 'success';
                        case 'E':
                            return 'primary';
                        case 'N':
                            return 'dark';
                        default:
                            return 'dark';
                    }
                }

                var options = {
                    series: [{
                        name: 'data',
                        data: allactualGradesheetData
                    }],
                    chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        tickAmount: 5,
                        labels: {
                            formatter: function(value) {
                                return value;
                            },
                        },
                    },
                    xaxis: {
                        categories: labels,
                        labels: {
                            style: {
                                fontSize: '12px',
                                colors: allactualphasescolor, // Customize the font color here
                            },
                        },
                    },
                    tooltip: {
                        enabled: true,
                        shared: false,
                        custom: function({
                            series,
                            seriesIndex,
                            dataPointIndex,
                            w
                        }) {
                            var value = series[seriesIndex][dataPointIndex];
                            var label = labels[dataPointIndex];
                            var instructorName = instructor[dataPointIndex];
                            var phase = allactualphases[dataPointIndex];
                            var phaseColor = allactualphasescolor[dataPointIndex];
                            var grade = grades[dataPointIndex]; // Get the grade value
                            var gradeClassName = mapGradeToClass(grade); // Map to class name

                            var tooltipHTML = `
                  <div class="custom-tooltip">
                    <span>Class - ${label}</span><br>
                    <span class="rounded p-1 m-1 text-white bg-${gradeClassName}">${grade} - ${value}%</span><br>
                    <span>Instructor - ${instructorName}</span><br>
                    <span>Phase - ${phase}</span><br>
                  </div>
              `;
                            return tooltipHTML;
                        },
                    },
                };

                var chart = new ApexCharts(document.querySelector("#Actual"), options);
                chart.render();

            }
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                sim: ctpId,
                user_id: user_id,
            },
            success: function(response) {
                var parsedResponse = JSON.parse(response); // Parse the JSON
                var labels = parsedResponse.simlabels; // Access the labels array
                var allsimGradesheetData = parsedResponse.allsimGradesheetData; // Access the otherData
                var grades = parsedResponse.grades;
                var instructor = parsedResponse.instructor;
                var allsimlphases = parsedResponse.phases; // Access the otherData
                var allsimlphasescolor = parsedResponse.phases_color;

                function mapGradeToClass(grade) {
                    switch (grade) {
                        case 'U':
                            return 'danger';
                        case 'F':
                            return 'warning';
                        case 'G':
                            return 'secondary';
                        case 'V':
                            return 'success';
                        case 'E':
                            return 'primary';
                        case 'N':
                            return 'dark';
                        default:
                            return 'dark';
                    }
                }
                var options = {
                    series: [{
                        name: "Percentage",
                        data: allsimGradesheetData // Use the 'allsim' array as data points
                    }],
                    chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        tickAmount: 5,
                        labels: {
                            formatter: function(value) {
                                return value;
                            },
                        },
                    },
                    xaxis: {
                        categories: labels,
                        labels: {
                            style: {
                                fontSize: '12px',
                                colors: allsimlphasescolor, // Customize the font color here
                            },
                        },
                    },
                    tooltip: {
                        enabled: true,
                        shared: false,
                        custom: function({
                            series,
                            seriesIndex,
                            dataPointIndex,
                            w
                        }) {
                            var value = series[seriesIndex][dataPointIndex];
                            var label = labels[dataPointIndex];
                            var instructorName = instructor[dataPointIndex];
                            var simphasecolor = allsimlphases[dataPointIndex];
                            var grade = grades[dataPointIndex]; // Get the grade value
                            var gradeClassName = mapGradeToClass(grade); // Map to class name

                            var tooltipHTML = `
                  <div class="custom-tooltip">
                    <span>Class - ${label}</span><br>
                    <span class="rounded p-1 m-1 text-white bg-${gradeClassName}">${grade} - ${value}%</span><br>
                    <span>Instructor - ${instructorName}</span><br>
                    <span>Phase - ${simphasecolor}</span><br>
                  </div>
              `;
                            return tooltipHTML;
                        },
                    },
                };

                var chart = new ApexCharts(document.querySelector("#Sim"), options);
                chart.render();

            }
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                test: ctpId,
                user_id: user_id,
            },
            success: function(response) {
                var parsedResponse = JSON.parse(response); // Parse the JSON
                var labels = parsedResponse.testlabels; // Access the labels array
                var alltestGradesheetData = parsedResponse.alltestGradesheetData; // Access the otherData
                var options = {
                    series: [{
                        name: "Percentage",
                        data: alltestGradesheetData
                    }],
                    chart: {
                        height: 350,
                        type: 'bar',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '50%', // Adjust the width of the bars as needed
                            colors: {
                                ranges: [{
                                        from: 0,
                                        to: 50,
                                        color: '#ed4c78' // Red for percentages between 0 and 25
                                    }, {
                                        from: 51,
                                        to: 60,
                                        color: '#f5ca99' // Orange for percentages between 25 and 50
                                    }, {
                                        from: 60,
                                        to: 70,
                                        color: '#FFFF00' // Yellow for percentages between 50 and 75
                                    }, {
                                        from: 70,
                                        to: 80,
                                        color: '#607285' // Green for percentages between 75 and 100
                                    },
                                    {
                                        from: 80,
                                        to: 90,
                                        color: '#00ab8e'
                                    },
                                    {
                                        from: 90,
                                        to: 100,
                                        color: '#2c64cc'
                                    }
                                ]
                            }
                        }
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        tickAmount: 10,
                        labels: {
                            formatter: function(value) {
                                return value;
                            },
                        },
                    },
                    xaxis: {
                        categories: labels,
                    }
                };

                var chart = new ApexCharts(document.querySelector("#Test"), options);
                chart.render();
            }
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
            data: {
                ctpId: ctpId,
                user_id: user_id,
            },
            success: function(response) {
                var parsedResponse = JSON.parse(response); // Parse the JSON
                var labels = parsedResponse.labels; // Access the labels array
                var allsimGradesheetData = parsedResponse.allGradesheetData; // Access the otherData
                var allphases = parsedResponse.allphases; // Access the otherData
                var allphasescolor = parsedResponse.allphasescolor; // Access the phasecolor
                var allinstructor = parsedResponse.allinstructor; // Access the otherData
                var allgradessimbol = parsedResponse.allgradessimbol; // Access the otherData
                function mapGradeToClass(grade) {
                    switch (grade) {
                        case 'U':
                            return 'danger';
                        case 'F':
                            return 'warning';
                        case 'G':
                            return 'secondary';
                        case 'V':
                            return 'success';
                        case 'E':
                            return 'primary';
                        case 'N':
                            return 'dark';
                        default:
                            return 'dark';
                    }
                }
                var options = {
                    series: [{
                        name: "Percentage",
                        data: allsimGradesheetData // Use the 'otherData' array as data points
                    }],
                    chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                            enabled: true,
                            type: 'xy'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        tickAmount: 5,
                        labels: {
                            formatter: function(value) {
                                return value;
                            },
                        },
                    },
                    xaxis: {
                        categories: labels,
                        labels: {
                            style: {
                                fontSize: '12px',
                                colors: allphasescolor, // Customize the font color here
                            },
                        },
                    },
                    tooltip: {
                        enabled: true,
                        shared: false,
                        custom: function({
                            series,
                            seriesIndex,
                            dataPointIndex,
                            w
                        }) {
                            var value = series[seriesIndex][dataPointIndex];
                            var label = labels[dataPointIndex];
                            var phase = allphases[dataPointIndex];
                            var instructorName = allinstructor[dataPointIndex];
                            var gradeSymbol = allgradessimbol[dataPointIndex];
                            var bgcolor = allphasescolor[dataPointIndex];
                            var gradeClassName = mapGradeToClass(gradeSymbol); // Map to class name

                            var tooltipHTML = `
                  <div class="custom-tooltip">
                    <span>Class - ${label}</span><br>
                    <span class="rounded p-1 m-1 text-white bg-${gradeClassName}">${gradeSymbol} - ${value}%</span><br>
                    <span>Instructor - ${instructorName}</span><br>
                    <span>Phase - ${phase}</span><br>
                  </div>
              `;
                            return tooltipHTML;
                        },
                    },
                };


                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();

            }
        });

        $(document).on('click', '#submit', function() {
            var phase = $('#phase_id').val();
            var month = $('#month_id').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClassesfilter.php',
                data: {
                    actual: ctpId,
                    user_id: user_id,
                    phase: phase,
                    month: month,
                },
                success: function(response) {
                    $('#Actual').empty();
                    var parsedResponse = JSON.parse(response); // Parse the JSON
                    var labels = parsedResponse.labels;
                    var allactualGradesheetData = parsedResponse.allactualGradesheetData;
                    var grades = parsedResponse.grades;
                    var instructor = parsedResponse.instructor;
                    var allactualphases = parsedResponse.phases; // Access the otherData
                    var allactualphasescolor = parsedResponse.phases_color; // Access the phasecolor
                    function mapGradeToClass(grade) {
                        switch (grade) {
                            case 'U':
                                return 'danger';
                            case 'F':
                                return 'warning';
                            case 'G':
                                return 'secondary';
                            case 'V':
                                return 'success';
                            case 'E':
                                return 'primary';
                            case 'N':
                                return 'dark';
                            default:
                                return 'dark';
                        }
                    }

                    var options = {
                        series: [{
                            name: 'data',
                            data: allactualGradesheetData
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            },
                        },
                        yaxis: {
                            min: 0,
                            max: 100,
                            tickAmount: 5,
                            labels: {
                                formatter: function(value) {
                                    return value;
                                },
                            },
                        },
                        xaxis: {
                            categories: labels,
                            labels: {
                                style: {
                                    fontSize: '12px',
                                    colors: allactualphasescolor, // Customize the font color here
                                },
                            },
                        },
                        tooltip: {
                            enabled: true,
                            shared: false,
                            custom: function({
                                series,
                                seriesIndex,
                                dataPointIndex,
                                w
                            }) {
                                var value = series[seriesIndex][dataPointIndex];
                                var label = labels[dataPointIndex];
                                var instructorName = instructor[dataPointIndex];
                                var phase = allactualphases[dataPointIndex];
                                var phaseColor = allactualphasescolor[dataPointIndex];
                                var grade = grades[dataPointIndex]; // Get the grade value
                                var gradeClassName = mapGradeToClass(grade); // Map to class name

                                var tooltipHTML = `
                  <div class="custom-tooltip">
                    <span>Class - ${label}</span><br>
                    <span class="rounded p-1 m-1 text-white bg-${gradeClassName}">${grade} - ${value}%</span><br>
                    <span>Instructor - ${instructorName}</span><br>
                    <span>Phase - ${phase}</span><br>
                  </div>
              `;
                                return tooltipHTML;
                            },
                        },
                    };

                    var chart = new ApexCharts(document.querySelector("#Actual"), options);
                    chart.render();

                }
            });

            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClassesfilter.php',
                data: {
                    sim: ctpId,
                    user_id: user_id,
                    phase: phase,
                    month: month,
                },
                success: function(response) {
                    $('#Sim').empty();
                    var parsedResponse = JSON.parse(response); // Parse the JSON
                    var labels = parsedResponse.simlabels; // Access the labels array
                    var allsimGradesheetData = parsedResponse.allsimGradesheetData; // Access the otherData
                    var grades = parsedResponse.grades;
                    var instructor = parsedResponse.instructor;
                    var allsimlphases = parsedResponse.phases; // Access the otherData
                    var allsimlphasescolor = parsedResponse.phases_color;

                    function mapGradeToClass(grade) {
                        switch (grade) {
                            case 'U':
                                return 'danger';
                            case 'F':
                                return 'warning';
                            case 'G':
                                return 'secondary';
                            case 'V':
                                return 'success';
                            case 'E':
                                return 'primary';
                            case 'N':
                                return 'dark';
                            default:
                                return 'dark';
                        }
                    }
                    var options = {
                        series: [{
                            name: "Percentage",
                            data: allsimGradesheetData // Use the 'allsim' array as data points
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth'
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            },
                        },
                        yaxis: {
                            min: 0,
                            max: 100,
                            tickAmount: 5,
                            labels: {
                                formatter: function(value) {
                                    return value;
                                },
                            },
                        },
                        xaxis: {
                            categories: labels,
                            labels: {
                                style: {
                                    fontSize: '12px',
                                    colors: allsimlphasescolor, // Customize the font color here
                                },
                            },
                        },
                        tooltip: {
                            enabled: true,
                            shared: false,
                            custom: function({
                                series,
                                seriesIndex,
                                dataPointIndex,
                                w
                            }) {
                                var value = series[seriesIndex][dataPointIndex];
                                var label = labels[dataPointIndex];
                                var instructorName = instructor[dataPointIndex];
                                var simphasecolor = allsimlphases[dataPointIndex];
                                var grade = grades[dataPointIndex]; // Get the grade value
                                var gradeClassName = mapGradeToClass(grade); // Map to class name

                                var tooltipHTML = `
                  <div class="custom-tooltip">
                    <span>Class - ${label}</span><br>
                    <span class="rounded p-1 m-1 text-white bg-${gradeClassName}">${grade} - ${value}%</span><br>
                    <span>Instructor - ${instructorName}</span><br>
                    <span>Phase - ${simphasecolor}</span><br>
                  </div>
              `;
                                return tooltipHTML;
                            },
                        },
                    };

                    var chart = new ApexCharts(document.querySelector("#Sim"), options);
                    chart.render();

                }
            });

            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClassesfilter.php',
                data: {
                    test: ctpId,
                    user_id: user_id,
                    phase: phase,
                    month: month,
                },
                success: function(response) {
                    $('#Test').empty();
                    var parsedResponse = JSON.parse(response); // Parse the JSON
                    var labels = parsedResponse.testlabels; // Access the labels array
                    var alltestGradesheetData = parsedResponse.alltestGradesheetData; // Access the otherData
                    var options = {
                        series: [{
                            name: "Percentage",
                            data: alltestGradesheetData // Use the 'test' array as data points
                        }],
                        chart: {
                            height: 350,
                            type: 'bar',
                            zoom: {
                                enabled: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth'
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            },
                        },
                        yaxis: {
                            min: 0,
                            max: 100,
                            tickAmount: 10,
                            labels: {
                                formatter: function(value) {
                                    return value;
                                },
                            },
                        },
                        xaxis: {
                            categories: labels,
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#Test"), options);
                    chart.render();
                }
            });

            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClassesfilter.php',
                data: {
                    ctpId: ctpId,
                    user_id: user_id,
                    phase: phase,
                    month: month,
                },
                success: function(response) {
                    $('#chart').empty();
                    var parsedResponse = JSON.parse(response); // Parse the JSON
                    var labels = parsedResponse.labels; // Access the labels array
                    var allsimGradesheetData = parsedResponse.allGradesheetData; // Access the otherData
                    var allphases = parsedResponse.allphases; // Access the otherData
                    var allphasescolor = parsedResponse.allphasescolor; // Access the phasecolor
                    var allinstructor = parsedResponse.allinstructor; // Access the otherData
                    var allgradessimbol = parsedResponse.allgradessimbol; // Access the otherData
                    function mapGradeToClass(grade) {
                        switch (grade) {
                            case 'U':
                                return 'danger';
                            case 'F':
                                return 'warning';
                            case 'G':
                                return 'secondary';
                            case 'V':
                                return 'success';
                            case 'E':
                                return 'primary';
                            case 'N':
                                return 'dark';
                            default:
                                return 'dark';
                        }
                    }
                    var options = {
                        series: [{
                            name: "Percentage",
                            data: allsimGradesheetData // Use the 'otherData' array as data points
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: true,
                                type: 'xy'
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth'
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            },
                        },
                        yaxis: {
                            min: 0,
                            max: 100,
                            tickAmount: 5,
                            labels: {
                                formatter: function(value) {
                                    return value;
                                },
                            },
                        },
                        xaxis: {
                            categories: labels,
                            labels: {
                                style: {
                                    fontSize: '12px',
                                    colors: allphasescolor, // Customize the font color here
                                },
                            },
                        },
                        tooltip: {
                            enabled: true,
                            shared: false,
                            custom: function({
                                series,
                                seriesIndex,
                                dataPointIndex,
                                w
                            }) {
                                var value = series[seriesIndex][dataPointIndex];
                                var label = labels[dataPointIndex];
                                var phase = allphases[dataPointIndex];
                                var instructorName = allinstructor[dataPointIndex];
                                var gradeSymbol = allgradessimbol[dataPointIndex];
                                var bgcolor = allphasescolor[dataPointIndex];
                                var gradeClassName = mapGradeToClass(gradeSymbol); // Map to class name

                                var tooltipHTML = `
                  <div class="custom-tooltip">
                    <span>Class - ${label}</span><br>
                    <span class="rounded p-1 m-1 text-white bg-${gradeClassName}">${gradeSymbol} - ${value}%</span><br>
                    <span>Instructor - ${instructorName}</span><br>
                    <span>Phase - ${phase}</span><br>
                  </div>
              `;
                                return tooltipHTML;
                            },
                        },
                    };


                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();

                }
            });
        });
    });


    var options = {
        series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: '',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
    };

    var chart = new ApexCharts(document.querySelector("#Descipline"), options);
    chart.render();

    var options = {
        series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: '',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
    };

    var chart = new ApexCharts(document.querySelector("#Memo"), options);
    chart.render();
</script>