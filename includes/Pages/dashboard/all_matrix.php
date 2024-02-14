<?php
$filter_phase = $connect->query("SELECT * FROM phase WHERE ctp='$std_course1' GROUP BY phasename");
$filter_phase_Data = $filter_phase->fetchAll();

$phaseFIlter = "";
foreach ($filter_phase_Data as $dt) {
  $pId = $dt["id"];
  $checkActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$pId'");
  $checkSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$pId'");
  if ($checkActualClass->fetchColumn() > 0 || $checkSimClass->fetchColumn() > 0) {
    $phaseFIlter .= '<option value="' . $dt['id'] . '">' . $dt['phasename'] . '</option>';
  }
}
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

  .apexcharts-tooltip.apexcharts-theme-light {
    color: black !important;
  }

  .styletext {
    font-size: 20px;
    font-weight: bold;
    background-color: #210070;
    padding: 5px;
    color: white;
    width: auto;
    margin-top: 0px;
    border-radius: 5px;
    height: max-content;
    margin: 5px;
  }


  .heatmaptext {
    text-align: center;
    font-size: 25px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    /*ackground: linear-gradient(45deg, yellow, green, transparent);
    -webkit-text-fill-color: transparent;
    margin-top: -70px;*/
    color: #FB2576;
  }

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

  .menu-btn {
    display: none;
    float: right;
    top: 45px;
    right: -5px;
    position: absolute;
  }

  /* When hovering over the first div, display the second div */
  #seeclassdetailsstd:hover+.dropdown-menu {
    display: block;
  }

  .menu-btnff {
    display: none;
    float: right;
    top: 45px;
    right: -5px;
    position: absolute;
  }

  /* When hovering over the first div, display the second div */
  #seeclassdetailsstdff:hover+.dropdown-menu {
    display: block;
  }

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
<div class="row">
  <div class="col-md-6 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle text-success" style="float:left;"><a class="text-success" href=""><span class="badge bg-primary" style="font-size:large;text-transform: uppercase;">Duration</span><span style="margin:10px;">Actual</span></a></h1>

        <div class="form-group col-4 m-1" style="float: right;">
          <label>Filter By Phase </label>
          <select style="height: 30px;width: 50%;border-radius: 10px;" name="" id="actualAllDurationFilter" data-courseid="<?php echo $std_course1; ?>" data-course="<?php echo $c_id; ?>">
            <option selected value="all">All</option>
            <?php
            echo $phaseFIlter;
            ?>
          </select>
        </div><br>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12" id="allActualDurationData">

          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

  <div class="col-md-6 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle text-success" style="float:left;"><a class="text-success" href=""><span class="badge bg-primary" style="font-size:large;text-transform: uppercase;">Duration</span><span style="margin:10px;">Sim</span></a></h1>
        <div class="form-group col-4 m-1" style="float: right;">
          <label>Filter By Phase </label>
          <select style="height: 30px;width: 50%;border-radius: 10px;" name="" id="simAllDurationFilter" data-courseid="<?php echo $std_course1; ?>" data-course="<?php echo $c_id; ?>">
            <option selected value="all">All</option>
            <?php
            echo $phaseFIlter;
            ?>
          </select>
        </div><br>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12" id="allSimDurationData">

          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

</div>
<!--All graph-->

<div class="row mb-2">
  <div class="col-lg-12">
    <div class="card card-hover-shadow h-100">
      <div class="card-body">
        <form action="#" method="post">
          <div class="col-md-12 d-flex justify-content-end">
            <div class="form-group col-3 m-1" style="text-align: -webkit-right;">
              <label>Filter By Phase</label>
              <select style="height: 30px;width: 50%;border-radius: 10px;" name="phase_id" id="phase_id">
                <option selected disabled>Select Phase</option>
                <?php
                foreach ($filter_phase_Data as $dt) {
                ?>
                  <option value="<?php echo $dt['id'] ?>"><?php echo $dt['phasename'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group col-3 m-1">
              <label>Filter By Month</label>
              <select style="height: 30px;width: 50%;border-radius: 10px;" name="month" id="month_id">
                <option selected disabled>Select Month</option>
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
            <button type="button" class="btn btn-primary btn-sm" id="submit">Filter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle text-success"><a class="text-success" href=""><span class="badge bg-primary" style="font-size:large;text-transform: uppercase;">Line Chart</span><span style="margin:10px;">Actual + Sim</span></a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12">
            <div id="chart" style="height: 200px; width: 100%;"></div>
            <div class="container-fluid mt-5">
              <div class="row">
                <?php
                foreach ($filter_phase_Data as $dt) {
                  $pId = $dt["id"];
                  $checkActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$pId'");
                  $checkSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$pId'");
                  if ($checkActualClass->fetchColumn() > 0 || $checkSimClass->fetchColumn() > 0) {
                ?><div class="d-flex col-auto">
                      <div style="height:20px;width:20px;border-radius:20px;background:<?php echo $dt['color'] ?>;margin-top:5px;margin-right:10px"></div>
                      <p style="font-size: x-large; font-weight:bold;"><?php echo $dt['phasename'] ?></p>
                    </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card -->
  </div>

</div>
<!-- End Card -->

<!-- all heatmap -->
<div class="row">
  <div class="col-lg-12 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body" id="allStuHeatMap">
        <h1 id="heapMapLoading">Loading..</h1>
      </div>
    </div>
  </div>
</div>

<!-- all heatmapend -->

<!--sepearte graph-->
<div class="row">
  <div class="col-md-12 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle text-success"><a class="text-success" href=""><span class="badge bg-primary" style="font-size:large;text-transform: uppercase;">Line Chart</span><span style="margin:10px;">Actual</span></a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12">
            <div id="Actual" style="height: 200px; width: 100%;"></div>
            <div class="container-fluid mt-5">
              <div class="row">
                <?php
                foreach ($filter_phase_Data as $dt) {
                  $pId = $dt["id"];
                  $checkActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$pId'");
                  $checkSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$pId'");
                  if ($checkActualClass->fetchColumn() > 0 || $checkSimClass->fetchColumn() > 0) {
                ?><div class="d-flex col-auto">
                      <div style="height:20px;width:20px;border-radius:20px;background:<?php echo $dt['color'] ?>;margin-top:5px;margin-right:10px"></div>
                      <p style="font-size: x-large; font-weight:bold;"><?php echo $dt['phasename'] ?></p>
                    </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
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
        <h1 class="card-subtitle"><a href="" class="text-success"><span class="badge bg-primary" style="font-size:large;text-transform: uppercase;">Line Chart</span><span style="margin: 10px;">Sim</span></a></h1>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">
          <div class="col-12">
            <div id="Sim" style="height: 200px; width: 100%;"></div>
            <div class="container-fluid mt-5">
              <div class="row">
                <?php
                $phaseFIlter = "";
                foreach ($filter_phase_Data as $dt) {
                  $pId = $dt["id"];
                  $checkActualClass = $connect->query("SELECT count(*) FROM actual WHERE phase = '$pId'");
                  $checkSimClass = $connect->query("SELECT count(*) FROM sim WHERE phase = '$pId'");
                  if ($checkActualClass->fetchColumn() > 0 || $checkSimClass->fetchColumn() > 0) {
                    $phaseFIlter .= '<option value="' . $dt['id'] . '">' . $dt['phasename'] . '</option>';
                ?><div class="d-flex col-auto">
                      <div style="height:20px;width:20px;border-radius:20px;background:<?php echo $dt['color'] ?>;margin-top:5px;margin-right:10px"></div>
                      <p style="font-size: x-large; font-weight:bold;"><?php echo $dt['phasename'] ?></p>
                    </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
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
  <div class="col-md-12 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle"><a href="" class="text-success"><span class="badge bg-primary" style="font-size:large;text-transform: uppercase;">Bar Chart</span><span style="margin:10px;">Test</span></a></h1>
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



<div class="modal fade" id="issuesModalAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">Filter Issues</h3>
        <div class="form-group m-1" style="float: right;position: absolute;right: 60px;">
          <label>Filter By Phase </label>
          <select name="phase_id" id="phaseFilterId" data-courseid="<?php echo $std_course1; ?>" data-userid="<?php echo $fetchuser_id; ?>" data-course="<?php echo $c_id; ?>">
            <option selected value="all">All</option>
            <?php
            $fetchPhase = $connect->query("SELECT * FROM phase WHERE ctp = '$std_course1'");
            while ($fetchPhaseData = $fetchPhase->fetch()) {
              $pId  = $fetchPhaseData['id'];
              $checkActCla = $connect->query("SELECT count(*) FROM actual WHERE ctp = '$std_course1' AND phase = '$pId'");
              $checkSimCla = $connect->query("SELECT count(*) FROM sim WHERE ctp = '$std_course1' AND phase = '$pId'");
              if ($checkActCla->fetchColumn() > 0 || $checkSimCla->fetchColumn() > 0) {
            ?>
                <option value="<?php echo $fetchPhaseData['id'] ?>"><?php echo $fetchPhaseData['phasename'] ?></option>
            <?php
              }
            }
            ?>
          </select>
          <select name="" id="itemCountFilterId">
            <option selected value="all">All</option>
            <option value="5">>=5</option>
            <option value="10">>=10</option>
            <option value="15">>=15</option>
            <option value="25">>=25</option>
            <option value="50">>=50</option>
            <option value="100">>=100</option>
          </select>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="itemSubItemData">

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<div class="modal fade" id="uOverAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">OverAll U</h3>
        <div class="form-group m-1" style="float: right;position: absolute;right: 60px;">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id'");
        while ($getCourseData = $getCourse->fetch()) {
          $course_Code = $getCourseData['CourseCode'];
          $course_Name = $getCourseData['CourseName'];
          $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
          while ($selecAllUserData = $selecAllUser->fetch()) {
            $uID = $selecAllUserData['StudentNames'];
            $fetchNick = $connect->query("SELECT nickname FROM users WHERE id = '$uID'");
            $countGradeU = $connect->query("SELECT * FROM gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$uID'");
            if ($countGradeU->rowCount() > 0) {
        ?>
              <div class="row">
                <div class="col-md-3">
                  <span style="font-size: large; font-weight:bold;"><?php echo $fetchNick->fetchColumn(); ?></span>
                </div>
                <div class="col-md-9" style="display: flex;">
                  <div class="row">
                    <div class="col m-1">
                      <?php
                      $countU = 0;
                      while ($countGradeUData = $countGradeU->fetch()) {
                        $countU = 0;
                        $countU++;
                        $classId = $countGradeUData['class_id'];
                        if ($countGradeUData['class'] == 'actual') {
                          $classQ = $connect->query("SELECT symbol AS mark FROM actual WHERE id = '$classId'");
                        }
                        if ($countGradeUData['class'] == 'sim') {
                          $classQ = $connect->query("SELECT shortsim AS mark FROM sim WHERE id = '$classId'");
                        }

                      ?>
                        <span style="margin:5px;"><?php echo $classQ->fetchColumn(); ?><span class="badge bg-danger rounded pill m-1"><?php echo $countU; ?></span></span>
                      <?php
                      }
                      $countGradeU = $connect->query("SELECT * FROM cloned_gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$uID'");
                      $countU = 0;
                      while ($countGradeUData = $countGradeU->fetch()) {
                        $countU = 0;
                        $countU++;
                        $cloneID = $countGradeUData['cloned_id'];
                        $xString = str_repeat("X", $cloneID);
                        $classId = $countGradeUData['class_id'];
                        if ($countGradeUData['class'] == 'actual') {
                          $classQ = $connect->query("SELECT symbol AS mark FROM actual WHERE id = '$classId'");
                        }
                        if ($countGradeUData['class'] == 'sim') {
                          $classQ = $connect->query("SELECT shortsim AS mark FROM sim WHERE id = '$classId'");
                        }

                      ?>
                        <span style="margin:5px;"><?php echo $classQ->fetchColumn();
                                                  echo "-" . $xString; ?><span class="badge bg-danger rounded pill m-1"><?php echo $countU; ?></span></span>
                      <?php

                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <hr style="margin:0px;">
        <?php
            }
          }
        }


        ?>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<div class="modal fade" id="fOverAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">OverAll F</h3>
        <div class="form-group m-1" style="float: right;position: absolute;right: 60px;">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id'");
        while ($getCourseData = $getCourse->fetch()) {
          $course_Code = $getCourseData['CourseCode'];
          $course_Name = $getCourseData['CourseName'];
          $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
          while ($selecAllUserData = $selecAllUser->fetch()) {
            $uID = $selecAllUserData['StudentNames'];
            $fetchNick = $connect->query("SELECT nickname FROM users WHERE id = '$uID'");
            $countGradeU = $connect->query("SELECT * FROM gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$uID'");
            if ($countGradeU->rowCount() > 0) {
        ?>
              <div class="row">
                <div class="col-md-3">
                  <span style="font-size: large; font-weight:bold;"><?php echo $fetchNick->fetchColumn(); ?></span>
                </div>
                <div class="col-md-9" style="display: flex;">
                  <div class="row">
                    <div class="col m-1">
                      <?php
                      $countU = 0;
                      while ($countGradeUData = $countGradeU->fetch()) {
                        $countU = 0;
                        $countU++;
                        $classId = $countGradeUData['class_id'];
                        if ($countGradeUData['class'] == 'actual') {
                          $classQ = $connect->query("SELECT symbol AS mark FROM actual WHERE id = '$classId'");
                        }
                        if ($countGradeUData['class'] == 'sim') {
                          $classQ = $connect->query("SELECT shortsim AS mark FROM sim WHERE id = '$classId'");
                        }

                      ?>

                        <span style="margin: 5px;"><?php echo $classQ->fetchColumn(); ?><span class="badge bg-warning rounded pill m-1"><?php echo $countU; ?></span></span>
                      <?php

                      }
                      $countGradeU = $connect->query("SELECT * FROM cloned_gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$uID'");
                      $countU = 0;
                      while ($countGradeUData = $countGradeU->fetch()) {
                        $countU = 0;
                        $countU++;
                        $cloneID = $countGradeUData['cloned_id'];
                        $xString = str_repeat("X", $cloneID);
                        $classId = $countGradeUData['class_id'];
                        if ($countGradeUData['class'] == 'actual') {
                          $classQ = $connect->query("SELECT symbol AS mark FROM actual WHERE id = '$classId'");
                        }
                        if ($countGradeUData['class'] == 'sim') {
                          $classQ = $connect->query("SELECT shortsim AS mark FROM sim WHERE id = '$classId'");
                        }

                      ?>

                        <span style="margin:5px;"><?php echo $classQ->fetchColumn();
                                                  echo "-" . $xString; ?><span class="badge bg-warning rounded pill m-1"><?php echo $countU; ?></span></span>
                      <?php

                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <hr style="margin:0px;">
        <?php
            }
          }
        }
        ?>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!-- actual duration filter -->

<script>
  var actPId;
  var actCId;
  var actCourseId;
  $(document).ready(function() {
    actPId = $("#actualAllDurationFilter").val()
    actCId = $("#actualAllDurationFilter").data("courseid");
    actCourseId = $("#actualAllDurationFilter").data("course");
    fetchActDura(actPId, actCId, actCourseId)
  });

  $("#actualAllDurationFilter").change(function() {
    actPId = $("#actualAllDurationFilter").val()
    actCId = $("#actualAllDurationFilter").data("courseid");
    actCourseId = $("#actualAllDurationFilter").data("course");
    fetchActDura(actPId, actCId, actCourseId)
  })

  function fetchActDura(actPId, actCId, actCourseId) {
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchItemSub.php',
      async: true,
      data: {
        allActualPhaseId: actPId,
        allActualCourseId: actCId,
        allCourse: actCourseId,
      },
      success: function(response) {
        // alert(response);
        $("#allActualDurationData").empty();
        $("#allActualDurationData").html(response);
      }
    });
  }
</script>

<!-- actual duration filter end -->

<!-- actual duration filter -->

<script>
  var simPId;
  var simCId;
  var simCourseId;
  $(document).ready(function() {
    simPId = $("#simAllDurationFilter").val()
    simCId = $("#simAllDurationFilter").data("courseid");
    simCourseId = $("#simAllDurationFilter").data("course");
    fetchSimDura(simPId, simCId, simCourseId)
  });

  $("#simAllDurationFilter").change(function() {
    simPId = $("#simAllDurationFilter").val()
    simCId = $("#simAllDurationFilter").data("courseid");
    simCourseId = $("#simAllDurationFilter").data("course");
    fetchSimDura(simPId, simCId, simCourseId)
  })

  function fetchSimDura(simPId, simCId, simCourseId) {
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchItemSub.php',
      async: true,
      data: {
        allSimPhaseId: simPId,
        allSimCourseId: simCId,
        allCourse: simCourseId,
      },
      success: function(response) {
        // alert(response);
        $("#allSimDurationData").empty();
        $("#allSimDurationData").html(response);
      }
    });
  }
</script>

<!-- actual duration filter end -->

<!-- scripts for graph  -->

<script>
  var pId;
  var cId;
  var uId;
  var course;
  $(document).ready(function() {
    // pId = $("#phaseFilterId").val()
    // cId = $("#phaseFilterId").data("courseid");
    // uId = $("#phaseFilterId").data("userid");
    // course = $("#phaseFilterId").data("course");
    fetchItemSub()
  });

  $("#phaseFilterId").change(function() {
    // pId = $("#phaseFilterId").val()
    // cId = $("#phaseFilterId").data("courseid");
    // uId = $("#phaseFilterId").data("userid");
    // course = $("#phaseFilterId").data("course");
    fetchItemSub()
  })

  $("#itemCountFilterId").change(function() {
    // pId = $("#phaseFilterId").val()
    // cId = $("#phaseFilterId").data("courseid");
    // uId = $("#phaseFilterId").data("userid");
    fetchItemSub()
  })

  function fetchItemSub() {
    pId = $("#phaseFilterId").val()
    cId = $("#phaseFilterId").data("courseid");
    uId = $("#phaseFilterId").data("userid");
    course = $("#phaseFilterId").data("course");
    var itemCountFilter = $("#itemCountFilterId").val();
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchItemSub.php',
      async: true,
      data: {
        phaseId1: pId,
        courseId1: cId,
        course: course,
        itemCountFilter: itemCountFilter,
      },
      success: function(response) {
        $("#itemSubItemData").empty();
        $("#itemSubItemData").html(response);
      }
    });
  }
</script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/apexcharts.min.js"></script>
<script>
  $(document).ready(function() {
    let classData, actualgraph, simgraph, academicgraph, testgraph;
    const ctpId = <?php echo $std_course1 ?>;
    const CourseCode11d = <?php echo $CourseCode11 ?>;
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetch_all_graph_data.php',
      data: {
        actual: ctpId,
        CourseCode11: CourseCode11d,
      },
      success: function(response) {

        var parsedResponse = JSON.parse(response); // Parse the JSON
        var labels = parsedResponse.labels;
        var allactualGradesheetData = parsedResponse.allactualGradesheetData;
        var grades = parsedResponse.grades;
        var instructor = parsedResponse.all_instructor;
        var allactualphases = parsedResponse.phases; // Access the otherData
        var allactualphasescolor = parsedResponse.phases_color; // Access the phasecolor
        var all_actual_percentage = parsedResponse.all_percentage;
        var all_actual_student_count = parsedResponse.student_count;
        var all_images = parsedResponse.images;
        var all_student_name_group = parsedResponse.all_student_name;
        var group_over_all_actual_grades = parsedResponse.group_over_all_grades;

        var options = {
          series: [{
            name: 'data',
            data: all_actual_percentage
          }],
          chart: {
            height: 350,
            type: 'line',
            zoom: {
              enabled: true
            },

          },
          toolbar: {
            show: true, // Display zoom and pan controls
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
              colors: ['transparent', 'transparent'],
              opacity: 0.5
            },
          },
          yaxis: {
            min: 0,
            max: 100,
            tickAmount: 2,
            labels: {

              formatter: function(value) {
                return value;
              },
              style: {
                colors: '#00c9a7',
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
              var all_actual_percentage1 = all_actual_percentage[dataPointIndex];
              var all_actual_student_count1 = all_actual_student_count[dataPointIndex];
              var group_over_all_actual_grades1 = group_over_all_actual_grades[dataPointIndex];
              var grade = grades[dataPointIndex]; // Get the grade value
              var all_images_actual = all_images[dataPointIndex];
              var all_actual_student_name_group = all_student_name_group[dataPointIndex];

              var imageFilenames = all_images_actual.split(',');
              var stident_names = all_actual_student_name_group.split(',');
              var student_grades = group_over_all_actual_grades1.split(',');
              var student_instructors = instructorName.split(',');
              // Generate HTML for displaying images
              var imageHTML = '';
              for (var i = 0; i < imageFilenames.length; i++) {
                var bgC = "";
                var bgC1 = "";
                var imageUrl = imageFilenames[i].trim(); // Trim any extra spaces
                var studentName = stident_names[i].trim(); // Trim any extra spaces
                var studentGrade = student_grades[i].trim(); // Trim any extra spaces
                var studentInstructor = student_instructors[i].trim(); // Trim any extra spaces
                if (imageUrl) {
                  if (studentGrade == "U") {
                    bgC = "#ed4c78";
                  }
                  if (studentGrade == "F") {
                    bgC = "#f5ca99";
                  }
                  if (studentGrade == "G") {
                    bgC = "#71869d";
                  }
                  if (studentGrade == "V") {
                    bgC = "#00c9a7";
                  }
                  if (studentGrade == "E") {
                    bgC = "#377dff";
                  }
                  if (studentGrade == "N") {
                    bgC = "black";
                  }

                  if (all_actual_percentage1 > 0 && all_actual_percentage1 <= 50) {
                    bgC1 = "#ed4c78"
                  }
                  if (all_actual_percentage1 > 50 && all_actual_percentage1 <= 60) {
                    bgC1 = "#ed4c78"
                  }
                  if (all_actual_percentage1 > 60 && all_actual_percentage1 <= 70) {
                    bgC1 = "#f5ca99"
                  }
                  if (all_actual_percentage1 > 70 && all_actual_percentage1 <= 80) {
                    bgC1 = "#71869d"
                  }
                  if (all_actual_percentage1 > 80 && all_actual_percentage1 <= 90) {
                    bgC1 = "#00c9a7"
                  }
                  if (all_actual_percentage1 > 90 && all_actual_percentage1 <= 100) {
                    bgC1 = "#377dff"
                  }
                  imageHTML += `<div class="m-1" style="border:1px solid LightGray; background-color:white;border-radius:5px;padding:5px;">
                                  <center>
                                  <img src="upload/${imageUrl}" alt="Student Image" width="30" height="30" style="border-radius:10px;">
                                  <h4 style="color:black;padding:1px;margin:1px;border-radius:3px;font-weight:100;color: white;font-family: cursive;background: darkcyan;" id="studentNameall">${studentName}</h4>
                                  <hr style="padding:0px;margin:0px;">
                                  <p class="title" style="padding:1px;margin:1px;border-radius:3px;margin-bottom:0px;">${studentInstructor}</p>
                                  <p class="badge rounded-pill" style="padding:5px;margin-bottom:0px;font-weight:bold;font-size:x-large;color:white;background-color:${bgC}">${studentGrade}</p>
                                  </center>
                                </div>`;
                }
              }
              var tooltipHTML = `<div class="custom-tooltip d-flex" style="background-color:aliceblue;justify-content:center;">
                  <span class='styletext'>${label}</span>
                  <span class='badge ' style='font-size: 20px;margin: 5px;background-color:${bgC1}' title='Average'>${all_actual_percentage1}%</span>
                  </div>
                  <hr style="border:0px solid #00000017;margin:0px;">
                    <div class="d-flex">${imageHTML}</div>`;
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
      url: '<?php echo BASE_URL; ?>includes/Pages/fetch_all_graph_data.php',
      data: {
        sim: ctpId,
        CourseCode11: CourseCode11d,
      },
      success: function(response) {
        var parsedResponse = JSON.parse(response);
        var labels = parsedResponse.simlabels;
        var allsimGradesheetData = parsedResponse.allsimGradesheetData;
        var instructor = parsedResponse.all_instructor;
        var allsimlphases = parsedResponse.phases;
        var allsimlphasescolor = parsedResponse.phases_color;
        var all_sim_percentage = parsedResponse.all_percentage;
        var all_sim_student_count = parsedResponse.student_count;
        var group_over_all_sim_grades = parsedResponse.group_over_all_grades; // Correct variable name
        var all_images = parsedResponse.images;
        var all_student_name_group = parsedResponse.all_student_name;

        var options = {
          series: [{
            name: "Percentage",
            data: all_sim_percentage
          }],
          chart: {
            height: 350,
            type: 'line',
            zoom: {
              enabled: true
            }
          },
          toolbar: {
            show: true, // Display zoom and pan controls
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
              colors: ['transparent', 'transparent'],
              opacity: 0.5
            },
          },
          yaxis: {
            min: 0,
            max: 100,
            tickAmount: 2,
            labels: {
              formatter: function(value) {
                return value;
              },
              style: {
                colors: '#00c9a7',
              },
            },
          },
          xaxis: {
            categories: labels,
            labels: {
              style: {
                fontSize: '12px',
                colors: allsimlphasescolor,
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
              var all_student_sim_grades = group_over_all_sim_grades[dataPointIndex];
              var tooltip_sim_percentage = all_sim_percentage[dataPointIndex]; // Renamed variable
              var tooltip_sim_student_count = all_sim_student_count[dataPointIndex]; // Renamed variable
              var tooltip_sim_all_images = all_images[dataPointIndex]; // Renamed variable
              var tooltip_sim_student_name_group = all_student_name_group[dataPointIndex]; // Renamed variable

              var imageFilenames = tooltip_sim_all_images.split(',');
              var stident_names = tooltip_sim_student_name_group.split(',');
              var stident_grades = all_student_sim_grades.split(',');
              var stident_instructors = instructorName.split(',');
              // Generate HTML for displaying images
              var imageHTML = '';
              for (var i = 0; i < imageFilenames.length; i++) {
                var bgC = "";
                var bgC1 = "";
                var imageUrl = imageFilenames[i].trim(); // Trim any extra spaces
                var studentName = stident_names[i].trim(); // Trim any extra spaces
                var studentGrade = stident_grades[i].trim(); // Trim any extra spaces
                var studentInstructor = stident_instructors[i].trim(); // Trim any extra spaces
                if (imageUrl) {
                  if (studentGrade == "U") {
                    bgC = "#ed4c78";
                  }
                  if (studentGrade == "F") {
                    bgC = "#f5ca99";
                  }
                  if (studentGrade == "G") {
                    bgC = "#71869d";
                  }
                  if (studentGrade == "V") {
                    bgC = "#00c9a7";
                  }
                  if (studentGrade == "E") {
                    bgC = "#377dff";
                  }
                  if (studentGrade == "N") {
                    bgC = "black";
                  }
                  if (tooltip_sim_percentage > 0 && tooltip_sim_percentage <= 50) {
                    bgC1 = "#ed4c78"
                  }
                  if (tooltip_sim_percentage > 50 && tooltip_sim_percentage <= 60) {
                    bgC1 = "#ed4c78"
                  }
                  if (tooltip_sim_percentage > 60 && tooltip_sim_percentage <= 70) {
                    bgC1 = "#f5ca99"
                  }
                  if (tooltip_sim_percentage > 70 && tooltip_sim_percentage <= 80) {
                    bgC1 = "#71869d"
                  }
                  if (tooltip_sim_percentage > 80 && tooltip_sim_percentage <= 90) {
                    bgC1 = "#00c9a7"
                  }
                  if (tooltip_sim_percentage > 90 && tooltip_sim_percentage <= 100) {
                    bgC1 = "#377dff"
                  }
                  imageHTML += `<div class="m-1" style="border:1px solid LightGray; background-color:white;border-radius:5px;padding:5px;">
                                  <center>
                                  <img src="upload/${imageUrl}" alt="Student Image" width="30" height="30" style="border-radius:10px;">
                                  <h4 style="color:black;padding:1px;margin:1px;border-radius:3px;font-weight:100;color: white;font-family: cursive;background: darkcyan;" id="studentNameall">${studentName}</h4>
                                  <hr style="padding:0px;margin:0px;">
                                  <p class="title" style="padding:1px;margin:1px;border-radius:3px;margin-bottom:0px;">${studentInstructor}</p>
                                  <p class="badge rounded-pill" style="padding:5px;margin-bottom:0px;font-weight:bold;font-size:x-large;color:white;background-color:${bgC}">${studentGrade}</p>
                                  </center>
                                </div>`;
                }
              }
              var tooltipHTML = `<div class="custom-tooltip d-flex" style="background-color:aliceblue;justify-content:center;">
                  <span class='styletext'>${label}</span>
                  <span class='badge ' style='font-size: 20px;margin: 5px;background-color:${bgC1}' title='Average'>${tooltip_sim_percentage}%</span>
                  </div>
                  <hr style="border:0px solid #00000017;margin:0px;">
                    <div class="d-flex">${imageHTML}</div>`;
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
      url: '<?php echo BASE_URL; ?>includes/Pages/fetch_all_graph_data.php',
      data: {
        test: ctpId,

      },
      success: function(response) {
        var parsedResponse = JSON.parse(response); // Parse the JSON
        var labels = parsedResponse.testlabels; // Access the labels array
        var sTest = parsedResponse.sTest;
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
              enabled: true
            }
          },
          toolbar: {
            show: true, // Display zoom and pan controls
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
              colors: ['transparent', 'transparent'],
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
              style: {
                colors: '#00c9a7',
              },
            },
          },
          xaxis: {
            categories: labels,
            labels: {
              style: {
                colors: '#00c9a7', // Color for the x-axis labels
              },
            }
          },
          tooltip: {
            enabled: true,
            custom: function({
              series,
              seriesIndex,
              dataPointIndex,
              w
            }) {


              var labelValue = sTest[dataPointIndex]; // Get the label for the tooltip
              var dataValue = alltestGradesheetData[dataPointIndex]; // Get the percentage value
              var bgC1;

              if (dataValue > 0 && dataValue <= 50) {
                bgC1 = "#ed4c78"
              }
              if (dataValue > 50 && dataValue <= 60) {
                bgC1 = "#ed4c78"
              }
              if (dataValue > 60 && dataValue <= 70) {
                bgC1 = "#f5ca99"
              }
              if (dataValue > 70 && dataValue <= 80) {
                bgC1 = "#71869d"
              }
              if (dataValue > 80 && dataValue <= 90) {
                bgC1 = "#00c9a7"
              }
              if (dataValue > 90 && dataValue <= 100) {
                bgC1 = "#377dff"
              }

              var customTooltip = '<div class="apexcharts-tooltip-custom m-1" style="font-family: Helvetica, Arial, sans-serif; font-size:large;text-transform: uppercase;background-color:aliceblue;">' +
                labelValue + '</div><hr style="margin:0px;border:0px solid #00000017">\
                <center><div class="apexcharts-tooltip-custom m-1 justify-content-center" style="font-family: Helvetica, Arial, sans-serif;background-color:' + bgC1 + ';"><span class="badge" style="font-size:large;">' + " " + dataValue + "%" +
                '</span></div></center>';
              return customTooltip;
            }
          }
        };

        var chart = new ApexCharts(document.querySelector("#Test"), options);
        chart.render();
      }
    });

    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetch_all_graph_data.php',
      data: {
        ctpId: ctpId,
        CourseCode11: CourseCode11d,
      },
      success: function(response) {
        var parsedResponse = JSON.parse(response);
        var labels = parsedResponse.labels;
        var allsimGradesheetData = parsedResponse.allGradesheetData;
        var allphases = parsedResponse.allphases;
        var allphasescolor = parsedResponse.allphasescolor;
        var allgradessimbol = parsedResponse.allgradessimbol;
        var all_percentage = parsedResponse.all_percentage;
        var student_count = parsedResponse.student_count;
        var all_images = parsedResponse.images;
        var all_student_name_group = parsedResponse.all_student_name;
        var group_over_all_grades = parsedResponse.group_over_all_grades;
        var group_over_all_instructors = parsedResponse.all_instructor;

        var options = {
          series: [{
            name: "Percentage",
            data: all_percentage
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
              colors: ['transparent', 'transparent'],
              opacity: 0.5
            },
          },
          yaxis: {
            min: 0,
            max: 100,
            tickAmount: 2,
            labels: {
              formatter: function(value) {
                return value;
              },
              style: {
                colors: '#00c9a7',
              },
            },
          },
          xaxis: {
            categories: labels,
            labels: {
              style: {
                fontSize: '12px',
                colors: allphasescolor,
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
              var instructorNames = group_over_all_instructors[dataPointIndex];
              var gradeSymbol = allgradessimbol[dataPointIndex];
              var average_percentage = all_percentage[dataPointIndex]; // Renamed variable
              var studentCount = student_count[dataPointIndex];
              var all_group_grade = group_over_all_grades[dataPointIndex];
              var all_student_images = all_images[dataPointIndex];
              var all_student_name = all_student_name_group[dataPointIndex];
              var bgcolor = allphasescolor[dataPointIndex];

              var imageFilenames = all_student_images.split(',');
              var stident_names = all_student_name.split(',');
              var students_grades = all_group_grade.split(',');
              var students_instructors = instructorNames.split(',');
              // Generate HTML for displaying images
              var imageHTML = '';
              for (var i = 0; i < imageFilenames.length; i++) {
                var bgC = "";
                var bgC1 = "";
                var imageUrl = imageFilenames[i].trim(); // Trim any extra spaces
                var studentName = stident_names[i].trim(); // Trim any extra spaces
                var studentGrade = students_grades[i].trim(); // Trim any extra spaces
                var studentInstructor = students_instructors[i].trim(); // Trim any extra spaces
                if (imageUrl) {
                  // imageHTML += `<div class="d-block m-1 border">
                  //                 <img src="upload/${imageUrl}" alt="Student Image" width="30" height="30" style="border-radius:60px;margin:5px;">
                  //                 <div style='margin:5px;font-weight:bold;' class='text-primary'>${studentName}</div>
                  //                 <div style='margin:5px;font-weight:bold;' class='text-info'>${studentInstructor}</div>
                  //                 <div style='margin:5px;font-weight:bold; font-size:large;'>${studentGrade}</div>
                  //               </div>`;
                  if (studentGrade == "U") {
                    bgC = "#ed4c78";
                  }
                  if (studentGrade == "F") {
                    bgC = "#f5ca99";
                  }
                  if (studentGrade == "G") {
                    bgC = "#71869d";
                  }
                  if (studentGrade == "V") {
                    bgC = "#00c9a7";
                  }
                  if (studentGrade == "E") {
                    bgC = "#377dff";
                  }
                  if (studentGrade == "N") {
                    bgC = "black";
                  }

                  if (average_percentage > 0 && average_percentage <= 50) {
                    bgC1 = "#ed4c78"
                  }
                  if (average_percentage > 50 && average_percentage <= 60) {
                    bgC1 = "#ed4c78"
                  }
                  if (average_percentage > 60 && average_percentage <= 70) {
                    bgC1 = "#f5ca99"
                  }
                  if (average_percentage > 70 && average_percentage <= 80) {
                    bgC1 = "#71869d"
                  }
                  if (average_percentage > 80 && average_percentage <= 90) {
                    bgC1 = "#00c9a7"
                  }
                  if (average_percentage > 90 && average_percentage <= 100) {
                    bgC1 = "#377dff"
                  }
                  imageHTML += `<div class="m-1" style="border:1px solid LightGray; background-color:white;border-radius:5px;padding:5px;">
                                  <center>
                                  <img src="upload/${imageUrl}" alt="Student Image" width="30" height="30" style="border-radius:10px;">
                                  <h4 class="bg-secondary" style="color:black;padding:1px;margin:1px;border-radius:3px;font-weight:100;color: white;font-family: cursive;" id="studentNameall">${studentName}</h4>
                                  <hr style="padding:0px;margin:0px;">
                                  <p class="title" style="padding:1px;margin:1px;border-radius:3px;margin-bottom:0px;">${studentInstructor}</p>
                                  <p class="badge rounded-pill" style="padding:5px;margin-bottom:0px;font-weight:bold;font-size:x-large;color:white;background-color:${bgC}">${studentGrade}</p>
                                  </center>
                                </div>`
                }
              }
              var tooltipHTML = `
                  <div class="custom-tooltip d-flex" style="background-color:aliceblue;justify-content:center;">
                  <span class='styletext'>${label}</span>
                  <span class='badge rounded-pill' style='font-size: x-large;margin: 5px;background-color:${bgC1}' title='Average'>${average_percentage}%</span>
                  </div>
                  <hr style="border:0px solid #00000017;margin:0px;">
                    <div class="d-flex">${imageHTML}</div>
                  
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
      // alert(phase);
      // alert(month);
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/fetch_all_graph_data_filter.php',
        data: {
          actual: ctpId,
          phase: phase,
          month: month,
        },
        success: function(response) {
          $('#Actual').empty();
          var parsedResponse = JSON.parse(response); // Parse the JSON
          var labels = parsedResponse.labels;
          var allactualGradesheetData = parsedResponse.allactualGradesheetData;
          var grades = parsedResponse.grades;
          var instructor = parsedResponse.all_instructor;
          var allactualphases = parsedResponse.phases; // Access the otherData
          var allactualphasescolor = parsedResponse.phases_color; // Access the phasecolor
          var all_actual_percentage = parsedResponse.all_percentage;
          var all_actual_student_count = parsedResponse.student_count;
          var all_images = parsedResponse.images;
          var all_student_name_group = parsedResponse.all_student_name;
          var group_over_all_actual_grades = parsedResponse.group_over_all_grades;

          var options = {
            series: [{
              name: 'data',
              data: all_actual_percentage
            }],
            chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: true
              }
            },
            toolbar: {
              show: true, // Display zoom and pan controls
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
                colors: ['transparent', 'transparent'],
                opacity: 0.5
              },
            },
            yaxis: {
              min: 0,
              max: 100,
              tickAmount: 2,
              labels: {
                formatter: function(value) {
                  return value;
                },
                style: {
                  colors: '#00c9a7',
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
                var all_actual_percentage1 = all_actual_percentage[dataPointIndex];
                var all_actual_student_count1 = all_actual_student_count[dataPointIndex];
                var group_over_all_actual_grades1 = group_over_all_actual_grades[dataPointIndex];
                var grade = grades[dataPointIndex]; // Get the grade value
                var all_images_actual = all_images[dataPointIndex];
                var all_actual_student_name_group = all_student_name_group[dataPointIndex];

                var imageFilenames = all_images_actual.split(',');
                var stident_names = all_actual_student_name_group.split(',');
                var student_grades = group_over_all_actual_grades1.split(',');
                var student_instructors = instructorName.split(',');
                // Generate HTML for displaying images
                var imageHTML = '';
                for (var i = 0; i < imageFilenames.length; i++) {
                  var imageUrl = imageFilenames[i].trim(); // Trim any extra spaces
                  var studentName = stident_names[i].trim(); // Trim any extra spaces
                  var studentGrade = student_grades[i].trim(); // Trim any extra spaces
                  var studentInstructor = student_instructors[i].trim(); // Trim any extra spaces
                  if (imageUrl) {
                    if (studentGrade == "U") {
                      bgC = "#ed4c78";
                    }
                    if (studentGrade == "F") {
                      bgC = "#f5ca99";
                    }
                    if (studentGrade == "G") {
                      bgC = "#71869d";
                    }
                    if (studentGrade == "V") {
                      bgC = "#00c9a7";
                    }
                    if (studentGrade == "E") {
                      bgC = "#377dff";
                    }
                    if (studentGrade == "N") {
                      bgC = "black";
                    }

                    if (all_actual_percentage1 > 0 && all_actual_percentage1 <= 50) {
                      bgC1 = "#ed4c78"
                    }
                    if (all_actual_percentage1 > 50 && all_actual_percentage1 <= 60) {
                      bgC1 = "#ed4c78"
                    }
                    if (all_actual_percentage1 > 60 && all_actual_percentage1 <= 70) {
                      bgC1 = "#f5ca99"
                    }
                    if (all_actual_percentage1 > 70 && all_actual_percentage1 <= 80) {
                      bgC1 = "#71869d"
                    }
                    if (all_actual_percentage1 > 80 && all_actual_percentage1 <= 90) {
                      bgC1 = "#00c9a7"
                    }
                    if (all_actual_percentage1 > 90 && all_actual_percentage1 <= 100) {
                      bgC1 = "#377dff"
                    }
                    imageHTML += `<div class="m-1" style="border:1px solid LightGray; background-color:white;border-radius:5px;padding:5px;">
                                  <center>
                                  <img src="upload/${imageUrl}" alt="Student Image" width="30" height="30" style="border-radius:10px;">
                                  <h4 style="color:black;padding:1px;margin:1px;border-radius:3px;font-weight:100;color: white;font-family: cursive;background: darkcyan;" id="studentNameall">${studentName}</h4>
                                  <hr style="padding:0px;margin:0px;">
                                  <p class="title" style="padding:1px;margin:1px;border-radius:3px;margin-bottom:0px;">${studentInstructor}</p>
                                  <p class="badge rounded-pill" style="padding:5px;margin-bottom:0px;font-weight:bold;font-size:x-large;color:white;background-color:${bgC}">${studentGrade}</p>
                                  </center>
                                </div>`;
                  }
                }
                var tooltipHTML = `<div class="custom-tooltip d-flex" style="background-color:aliceblue;justify-content:center;">
                  <span class='styletext'>${label}</span>
                  <span class='badge' style='font-size: 20px;margin: 5px;background-color:${bgC1}' title='Average'>${all_actual_percentage1}%</span>
                  </div>
                  <hr style="border:0px solid #00000017;margin:0px;">
                    <div class="d-flex">${imageHTML}</div>`;
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
        url: '<?php echo BASE_URL; ?>includes/Pages/fetch_all_graph_data_filter.php',
        data: {
          sim: ctpId,
          phase: phase,
          month: month,
        },
        success: function(response) {
          $('#Sim').empty();
          var parsedResponse = JSON.parse(response);
          var labels = parsedResponse.simlabels;
          var allsimGradesheetData = parsedResponse.allsimGradesheetData;
          var grades = parsedResponse.grades;
          var instructor = parsedResponse.all_instructor;
          var allsimlphases = parsedResponse.phases;
          var allsimlphasescolor = parsedResponse.phases_color;
          var all_sim_percentage = parsedResponse.all_percentage;
          var all_sim_student_count = parsedResponse.student_count;
          var group_over_all_sim_grades = parsedResponse.group_over_all_grades; // Correct variable name
          var all_images = parsedResponse.images;
          var all_student_name_group = parsedResponse.all_student_name;

          var options = {
            series: [{
              name: "Percentage",
              data: all_sim_percentage
            }],
            chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: true
              }
            },
            toolbar: {
              show: true, // Display zoom and pan controls
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
                colors: ['transparent', 'transparent'],
                opacity: 0.5
              },
            },
            yaxis: {
              min: 0,
              max: 100,
              tickAmount: 2,
              labels: {
                formatter: function(value) {
                  return value;
                },
                style: {
                  colors: '#00c9a7',
                },
              },
            },
            xaxis: {
              categories: labels,
              labels: {
                style: {
                  fontSize: '12px',
                  colors: allsimlphasescolor,
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
                var all_student_sim_grades = group_over_all_sim_grades[dataPointIndex];
                var tooltip_sim_percentage = all_sim_percentage[dataPointIndex]; // Renamed variable
                var tooltip_sim_student_count = all_sim_student_count[dataPointIndex]; // Renamed variable
                var tooltip_sim_all_images = all_images[dataPointIndex]; // Renamed variable
                var tooltip_sim_student_name_group = all_student_name_group[dataPointIndex]; // Renamed variable

                var imageFilenames = tooltip_sim_all_images.split(',');
                var stident_names = tooltip_sim_student_name_group.split(',');
                var stident_grades = all_student_sim_grades.split(',');
                var stident_instructors = instructorName.split(',');
                // Generate HTML for displaying images
                var imageHTML = '';
                for (var i = 0; i < imageFilenames.length; i++) {
                  var imageUrl = imageFilenames[i].trim(); // Trim any extra spaces
                  var studentName = stident_names[i].trim(); // Trim any extra spaces
                  var studentGrade = stident_grades[i].trim(); // Trim any extra spaces
                  var studentInstructor = stident_instructors[i].trim(); // Trim any extra spaces
                  if (imageUrl) {
                    if (studentGrade == "U") {
                      bgC = "#ed4c78";
                    }
                    if (studentGrade == "F") {
                      bgC = "#f5ca99";
                    }
                    if (studentGrade == "G") {
                      bgC = "#71869d";
                    }
                    if (studentGrade == "V") {
                      bgC = "#00c9a7";
                    }
                    if (studentGrade == "E") {
                      bgC = "#377dff";
                    }
                    if (studentGrade == "N") {
                      bgC = "black";
                    }
                    if (tooltip_sim_percentage > 0 && tooltip_sim_percentage <= 50) {
                      bgC1 = "#ed4c78"
                    }
                    if (tooltip_sim_percentage > 50 && tooltip_sim_percentage <= 60) {
                      bgC1 = "#ed4c78"
                    }
                    if (tooltip_sim_percentage > 60 && tooltip_sim_percentage <= 70) {
                      bgC1 = "#f5ca99"
                    }
                    if (tooltip_sim_percentage > 70 && tooltip_sim_percentage <= 80) {
                      bgC1 = "#71869d"
                    }
                    if (tooltip_sim_percentage > 80 && tooltip_sim_percentage <= 90) {
                      bgC1 = "#00c9a7"
                    }
                    if (tooltip_sim_percentage > 90 && tooltip_sim_percentage <= 100) {
                      bgC1 = "#377dff"
                    }
                    imageHTML += `
                                <div class="m-1" style="border:1px solid LightGray; background-color:white;border-radius:5px;padding:5px;">
                                  <center>
                                  <img src="upload/${imageUrl}" alt="Student Image" width="30" height="30" style="border-radius:10px;">
                                  <h4 style="color:black;padding:1px;margin:1px;border-radius:3px;font-weight:100;color: white;font-family: cursive;background: darkcyan;" id="studentNameall">${studentName}</h4>
                                  <hr style="padding:0px;margin:0px;">
                                  <p class="title" style="padding:1px;margin:1px;border-radius:3px;margin-bottom:0px;">${studentInstructor}</p>
                                  <p class="badge rounded-pill" style="padding:5px;margin-bottom:0px;font-weight:bold;font-size:x-large;color:white;background-color:${bgC}">${studentGrade}</p>
                                  </center>
                                </div>
                                `;
                  }
                }
                var tooltipHTML = `
              <div class="custom-tooltip d-flex" style="background-color:aliceblue;justify-content:center;">
                  <span class='styletext'>${label}</span>
                  <span class='badge ' style='font-size: 20px;margin: 5px;background-color:${bgC1}' title='Average'>${tooltip_sim_percentage}%</span>
                  </div>
                  <hr style="border:0px solid #00000017;margin:0px;">
                    <div class="d-flex">${imageHTML}</div>
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
        url: '<?php echo BASE_URL; ?>includes/Pages/fetch_all_graph_data_filter.php',
        data: {
          test: ctpId,
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
                enabled: true
              }
            },
            toolbar: {
              show: true, // Display zoom and pan controls
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
                colors: ['transparent', 'transparent'],
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
                style: {
                  colors: '#00c9a7',
                },
              },
            },
            xaxis: {
              categories: labels,
              labels: {
                style: {
                  colors: 'white', // Customize the font color here
                },
              },
            },
          };

          var chart = new ApexCharts(document.querySelector("#Test"), options);
          chart.render();
        }
      });

      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/fetch_all_graph_data_filter.php',
        data: {
          ctpId: ctpId,
          phase: phase,
          month: month,
        },
        success: function(response) {
          $('#chart').empty();
          var parsedResponse = JSON.parse(response);
          var labels = parsedResponse.labels;
          var allsimGradesheetData = parsedResponse.allGradesheetData;
          var allphases = parsedResponse.allphases;
          var allphasescolor = parsedResponse.allphasescolor;
          var allinstructor = parsedResponse.all_instructor;
          var all_percentage = parsedResponse.all_percentage;
          var student_count = parsedResponse.student_count;
          var all_images = parsedResponse.images;
          var all_student_name_group = parsedResponse.all_student_name;
          var group_over_all_grades = parsedResponse.group_over_all_grades;

          var options = {
            series: [{
              name: "Percentage",
              data: all_percentage
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
                colors: ['transparent', 'transparent'],
                opacity: 0.5
              },
            },
            yaxis: {
              min: 0,
              max: 100,
              tickAmount: 2,
              labels: {
                formatter: function(value) {
                  return value;
                },
                style: {
                  colors: '#00c9a7',
                },
              },
            },
            xaxis: {
              categories: labels,
              labels: {
                style: {
                  fontSize: '12px',
                  colors: allphasescolor,
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
                var gradeSymbol = group_over_all_grades[dataPointIndex];
                var average_percentage = all_percentage[dataPointIndex]; // Renamed variable
                var studentCount = student_count[dataPointIndex];
                var all_group_grade = group_over_all_grades[dataPointIndex];
                var all_student_images = all_images[dataPointIndex];
                var all_student_name = all_student_name_group[dataPointIndex];
                var bgcolor = allphasescolor[dataPointIndex];

                var imageFilenames = all_student_images.split(',');
                var stident_names = all_student_name.split(',');
                var student_grades = gradeSymbol.split(',');
                var student_instructors = instructorName.split(',');
                // Generate HTML for displaying images
                var imageHTML = '';
                for (var i = 0; i < imageFilenames.length; i++) {
                  var imageUrl = imageFilenames[i].trim(); // Trim any extra spaces
                  var studentName = stident_names[i].trim(); // Trim any extra spaces
                  var studentGrade = student_grades[i].trim(); // Trim any extra spaces
                  var studentInstructor = student_instructors[i].trim(); // Trim any extra spaces
                  if (imageUrl) {
                    // imageHTML += `<div class="d-block m-1 border">
                    //                 <img src="upload/${imageUrl}" alt="Student Image" width="30" height="30" style="border-radius:60px;margin:5px;">
                    //                 <div style='margin:5px;font-weight:bold;' class='text-primary'>${studentName}</div>
                    //                 <div style='margin:5px;font-weight:bold;' class='text-info'>${studentInstructor}</div>
                    //                 <div style='margin:5px;font-weight:bold; font-size:large;'>${studentGrade}</div>
                    //               </div>`;
                    if (studentGrade == "U") {
                      bgC2 = "#ed4c78";
                    }
                    if (studentGrade == "F") {
                      bgC2 = "#f5ca99";
                    }
                    if (studentGrade == "G") {
                      bgC2 = "#71869d";
                    }
                    if (studentGrade == "V") {
                      bgC2 = "#00c9a7";
                    }
                    if (studentGrade == "E") {
                      bgC2 = "#377dff";
                    }
                    if (studentGrade == "N") {
                      bgC2 = "black";
                    }

                    if (average_percentage > 0 && average_percentage <= 50) {
                      bgC12 = "#ed4c78"
                    }
                    if (average_percentage > 50 && average_percentage <= 60) {
                      bgC12 = "#ed4c78"
                    }
                    if (average_percentage > 60 && average_percentage <= 70) {
                      bgC12 = "#f5ca99"
                    }
                    if (average_percentage > 70 && average_percentage <= 80) {
                      bgC12 = "#71869d"
                    }
                    if (average_percentage > 80 && average_percentage <= 90) {
                      bgC12 = "#00c9a7"
                    }
                    if (average_percentage > 90 && average_percentage <= 100) {
                      bgC12 = "#377dff"
                    }
                    imageHTML += `<div class="m-1" style="border:1px solid LightGray; background-color:white;border-radius:5px;padding:5px;">
                                  <center>
                                  <img src="upload/${imageUrl}" alt="Student Image" width="30" height="30" style="border-radius:10px;">
                                  <h4 class="bg-secondary" style="color:black;padding:1px;margin:1px;border-radius:3px;font-weight:100;color: white;font-family: cursive;" id="studentNameall">${studentName}</h4>
                                  <hr style="padding:0px;margin:0px;">
                                  <p class="title" style="padding:1px;margin:1px;border-radius:3px;margin-bottom:0px;">${studentInstructor}</p>
                                  <p class="badge rounded-pill" style="padding:5px;margin-bottom:0px;font-weight:bold;font-size:x-large;color:white;background-color:${bgC2}">${studentGrade}</p>
                                  </center>
                                </div>`;
                  }
                }


                var tooltipHTML = `<div class="custom-tooltip d-flex" style="background-color:aliceblue;justify-content:center;">
                  <span class='styletext'>${label}</span>
                  <span class='badge rounded-pill' style='font-size: x-large;margin: 5px;background-color:${bgC12}' title='Average'>${average_percentage}%</span>
                  </div>
                  <hr style="border:0px solid #00000017;margin:0px;">
                    <div class="d-flex">${imageHTML}</div>`;
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
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const maxCharacters = 3; // Set your desired maximum character length

    const studentNameElement = document.getElementById("studentNameall");
    const studentName = studentNameElement.innerText;

    if (studentName.length > maxCharacters) {
      // Truncate the text and add ellipsis (...)
      studentNameElement.innerText = studentName.substring(0, maxCharacters) + "...";
    }
  });
</script>