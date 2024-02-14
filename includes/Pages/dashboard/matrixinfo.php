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

  .custom-tooltip {
    /* Start with an opacity of 0 */
    pointer-events: none;
    transition: all 0.5s ease-in-out;
    /* Add a smooth transition for all properties */
  }

  /* Update the tooltip position smoothly */
  .custom-tooltip.active {
    opacity: 1;
    pointer-events: auto;
    transform: translate(-50%, -120%);
    /* Adjust the position as needed */
  }

  .styletext {
    font-size: 20px;
    font-weight: bold;
    background-color: #210070;
    padding: 5px;
    color: white;
    width: 100%;
    margin-top: 0px;
    border-radius: 5px;
  }

  .heatmaptext {
    text-align: center;
    font-size: 25px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
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
          <select style="height: 30px;width: 50%;border-radius: 10px;" name="" id="actualDurationFilter" data-courseid="<?php echo $std_course1; ?>" data-userid="<?php echo $fetchuser_id; ?>">
            <option selected value="all">All</option>
            <?php
            echo $phaseFIlter;
            ?>
          </select>
        </div><br>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12" id="actualDurationData" style="justify-content:center;">

          </div>
          <!-- End Col -->
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 mb-3">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <div class="card-body">
        <h1 class="card-subtitle text-success" style="float:left;"><a class="text-success" href=""><span class="badge bg-primary" style="font-size:large;text-transform: uppercase;">Duration</span><span style="margin:10px;">Sim</span></a></h1>
        <div class="form-group col-4 m-1" style="float: right;">
          <label>Filter By Phase </label>
          <select style="height: 30px;width: 50%;border-radius: 10px;" name="" id="simDurationFilter" data-courseid="<?php echo $std_course1; ?>" data-userid="<?php echo $fetchuser_id; ?>">
            <option selected value="all">All</option>
            <?php
            echo $phaseFIlter;
            ?>
          </select>
        </div><br>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-1">

          <div class="col-12" id="simDurationData">

          </div>
          <!-- End Col -->
        </div>
      </div>
    </div>
  </div>

</div>


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


<div class="row mb-2">
  <div class="col-lg-12">
    <div class="card card-hover-shadow h-100">
      <div class="card-body">
        <h6 class="card-subtitle text-success"><span class="badge bg-primary" style="font-size:large;">Line Chart</span></h6>
        <!-- <button onclick="window.location.href='line_report.php'">Generate line chart</button> -->
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">
            <div id="chart" style="height: 300px; width: 100%;"></div>
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
        </div>
        <!-- End Col -->
      </div>
    </div>
  </div>
</div>


<div class="row mb-2">
  <div class="col-lg-12">
    <div class="card card-hover-shadow h-100" id="singleUserHeapMap">
      <p>Loading....</p>
    </div>
  </div>
</div>


<div class="row mb-2">
  <div class="col-lg-12">
    <div class="card card-hover-shadow h-100">
      <div class="card-body">
        <h1 class="card-subtitle text-success"><a class="text-success" href=""><span class="badge bg-primary" style="font-size:large;">Actuals</span></a></h1>
        <!-- <button onclick="window.location.href='linegeneratoractual.php'">Generate line chart</button> -->
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
                      <div style="border-radius:20px;background:<?php echo $dt['color'] ?>;margin-top:5px;margin-right:10px;height:20px;width:20px;"></div>
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
  </div>
</div>


<div class="row mb-2">
  <div class="col-lg-12">
    <div class="card card-hover-shadow h-100">
      <div class="card-body">
        <h1 class="card-subtitle"><a href="" class="text-success"><span class="badge bg-primary" style="font-size:large;">Sim</span></a></h1>
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
  </div>
</div>


<div class="row mb-2">
  <div class="col-lg-12">
    <div class="card card-hover-shadow h-100">
      <div class="card-body">
        <h1 class="card-subtitle"><a href="" class="text-success"><span class="badge bg-primary" style="font-size:large;">Test</span></a></h1>
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
  </div>
</div>


<div class="modal fade" id="issuesModalAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">Filter Issues</h3>
        <div class="form-group m-1" style="float: right;position: absolute;right: 60px;">
          <label>Filter By Phase </label>
          <select name="phase_id" id="phaseFilterId" data-courseid="<?php echo $std_course1; ?>" data-userid="<?php echo $fetchuser_id; ?>">
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
        <div class="row justify-content-center">
          <?php
          $countGradeU = $connect->query("SELECT * FROM gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$fetchuser_id'");
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
            <div class="col-md-3 m-1">
              <p style="font-weight: bold;"><?php echo $classQ->fetchColumn(); ?>&nbsp;&nbsp;<span class="badge bg-danger rounded-pill"><?php echo $countU; ?></span></p>
            </div>
          <?php

          }

          $countGradeU = $connect->query("SELECT * FROM cloned_gradesheet WHERE over_all_grade = 'U' AND course_id = '$std_course1' AND user_id = '$fetchuser_id'");
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
            <div class="col-md-3 m-1">
              <p style="font-weight:bold;"><?php echo $classQ->fetchColumn();
                                            echo "-" . $xString; ?>&nbsp;&nbsp;<span class="badge bg-danger rounded-pill"><?php echo $countU; ?></span></p>
            </div>
          <?php

          }
          ?>
        </div>
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
        <div class="row justify-content-center">
          <?php
          $countGradeU = $connect->query("SELECT * FROM gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$fetchuser_id'");
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
            <div class="col-md-3 m-1">
              <p style="font-weight:bold;width: max-content;"><?php echo $classQ->fetchColumn(); ?><span class="badge bg-warning rounded-pill" style="float:left;"><?php echo $countU; ?></span></p>
            </div>
          <?php

          }

          $countGradeU = $connect->query("SELECT * FROM cloned_gradesheet WHERE over_all_grade = 'F' AND course_id = '$std_course1' AND user_id = '$fetchuser_id'");
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
            <div class="col-md-3 m-1">
              <p style="font-weight:bold;width: max-content;"><?php echo $classQ->fetchColumn();
                                                              echo "-" . $xString; ?><span class="badge bg-warning rounded-pill" style="float:left;"><?php echo $countU; ?></span></p>
            </div>
          <?php

          }
          ?>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>




<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/dist/apexcharts.min.js"></script>



<script>
  var pId;
  var cId;
  var uId;
  $(document).ready(function() {
    // pId = $("#phaseFilterId").val()
    // cId = $("#phaseFilterId").data("courseid");
    // uId = $("#phaseFilterId").data("userid");
    fetchItemSub()
  });

  $("#phaseFilterId").change(function() {
    // pId = $("#phaseFilterId").val()
    // cId = $("#phaseFilterId").data("courseid");
    // uId = $("#phaseFilterId").data("userid");
    fetchItemSub()
  });

  $("#itemCountFilterId").change(function() {
    // pId = $("#phaseFilterId").val()
    // cId = $("#phaseFilterId").data("courseid");
    // uId = $("#phaseFilterId").data("userid");
    fetchItemSub()
  })

  function fetchItemSub(pid, cid, uid) {
    pId = $("#phaseFilterId").val()
    cId = $("#phaseFilterId").data("courseid");
    uId = $("#phaseFilterId").data("userid");
    var itemCountFilter = $("#itemCountFilterId").val();
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchItemSub.php',
      async: true,
      data: {
        phaseId: pId,
        courseId: cId,
        userId: uId,
        itemCountFilter: itemCountFilter,
      },
      success: function(response) {
        $("#itemSubItemData").empty();
        $("#itemSubItemData").html(response);
      }
    });
  }
</script>

<!-- actual duration filter -->

<script>
  var actPId;
  var actCId;
  var actUId;
  $(document).ready(function() {
    actPId = $("#actualDurationFilter").val()
    actCId = $("#actualDurationFilter").data("courseid");
    actUId = $("#actualDurationFilter").data("userid");
    fetchActDura(actPId, actCId, actUId)
  });

  $("#actualDurationFilter").change(function() {
    actPId = $("#actualDurationFilter").val()
    actCId = $("#actualDurationFilter").data("courseid");
    actUId = $("#actualDurationFilter").data("userid");
    fetchActDura(actPId, actCId, actUId)
  })

  function fetchActDura(actPId, actCId, actUId) {
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchItemSub.php',
      async: true,
      data: {
        actualPhaseId: actPId,
        actualCourseId: actCId,
        actualUserId: actUId,
      },
      success: function(response) {
        // alert(response);
        $("#actualDurationData").empty();
        $("#actualDurationData").html(response);
      }
    });
  }
</script>

<!-- actual duration filter end -->

<!-- actual duration filter -->

<script>
  var simPId;
  var simCId;
  var simUId;
  $(document).ready(function() {
    simPId = $("#simDurationFilter").val()
    simCId = $("#simDurationFilter").data("courseid");
    simUId = $("#simDurationFilter").data("userid");
    fetchSimDura(simPId, simCId, simUId)
  });

  $("#simDurationFilter").change(function() {
    simPId = $("#simDurationFilter").val()
    simCId = $("#simDurationFilter").data("courseid");
    simUId = $("#simDurationFilter").data("userid");
    fetchSimDura(simPId, simCId, simUId)
  })

  function fetchSimDura(simPId, simCId, simUId) {
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchItemSub.php',
      async: true,
      data: {
        simPhaseId: simPId,
        simCourseId: simCId,
        simUserId: simUId,
      },
      success: function(response) {
        // alert(response);
        $("#simDurationData").empty();
        $("#simDurationData").html(response);
      }
    });
  }
</script>

<!-- actual duration filter end -->

<script>
  $(document).ready(function() {
    let classData, actualgraph, simgraph, academicgraph, testgraph;
    const ctpId = <?php echo $std_course1 ?>;
    const user_id = <?php echo $fetchuser_id ?>;
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
      async: true,
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
              enabled: true, // Enable zoom
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
              var grade = grades[dataPointIndex]; // Get the grade value
              var gradeClassName = mapGradeToClass(grade); // Map to class name

              var tooltipHTML = `
          <div class="custom-tooltip">
          <center>
            <span class='styletext'>${label}</span></center><hr style="margin:revert;">
            <div class="d-flex">
            <span class="badge p-1 m-1 text-white bg-${gradeClassName}" style="font-size:x-large;">${grade} - ${value}%</span><br>
            <span class='badge bg-secondary p-1 m-1' style="font-size:x-large;">${instructorName}</span><br></div>
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
      async: true,
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
                  <center>
                    <span class='styletext'>${label}</span></center><hr style="margin:revert;">
                    <div class="d-flex">
                    <span class="badge p-1 m-1 text-white bg-${gradeClassName}" style="font-size:x-large;">${grade} - ${value}%</span><br>
                    <span class='badge bg-secondary p-1 m-1' style="font-size:x-large;">${instructorName}</span><br>
                    </div>
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
      async: true,
      data: {
        test: ctpId,
        user_id: user_id,
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
            show: true,
          },
          dataLabels: {
            enabled: false
          },
          plotOptions: {
            bar: {
              columnWidth: '50%',
              colors: {
                ranges: [{
                    from: 0,
                    to: 50,
                    color: '#ed4c78'
                  },
                  {
                    from: 51,
                    to: 60,
                    color: '#f5ca99'
                  },
                  {
                    from: 60,
                    to: 70,
                    color: '#FFFF00'
                  },
                  {
                    from: 70,
                    to: 80,
                    color: '#607285'
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
                return value; // Add percentage symbol to the Y-axis labels
              },
              style: {
                colors: '#00c9a7',
              },
            },
          },
          xaxis: {
            categories: sTest, // Use 'sTest' for X-axis categories
          },
          tooltip: {
            enabled: true,
            custom: function({
              series,
              seriesIndex,
              dataPointIndex,
              w
            }) {
              var labelValue = labels[dataPointIndex]; // Get the label for the tooltip
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


        // var chart = new ApexCharts(document.querySelector("#Test"), options);
        // chart.render();
      }
    });

    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClasses.php',
      async: true,
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
                    <center><span class='styletext' style=''>${label}</span></center><hr style="margin:revert;">
                    <div class="d-flex">
                    <span class="badge p-1 m-1 text-white bg-${gradeClassName}" style="font-size:x-large;">${gradeSymbol} - ${value}%</span><br>
                    <span class="badge bg-secondary p-1 m-1" style="font-size:x-large;">${instructorName}</span>
                    </div>
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
        async: true,
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
                var grade = grades[dataPointIndex]; // Get the grade value
                var gradeClassName = mapGradeToClass(grade); // Map to class name

                var tooltipHTML = `
                  <div class="custom-tooltip">
          <center>
            <span class='styletext'>${label}</span></center><hr style="margin:revert;">
            <div class="d-flex">
            <span class="badge p-1 m-1 text-white bg-${gradeClassName}" style="font-size:x-large;">${grade} - ${value}%</span><br>
            <span class='badge bg-secondary p-1 m-1' style="font-size:x-large;">${instructorName}</span><br></div>
          </div>
              `;
                var tooltipId = `tooltip-${seriesIndex}-${dataPointIndex}`;
                return tooltipHTML.replace('custom-tooltip', tooltipId);
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
        async: true,
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
                  <center>
                    <span class='styletext'>${label}</span></center><hr style="margin:revert;">
                    <div class="d-flex">
                    <span class="badge p-1 m-1 text-white bg-${gradeClassName}" style="font-size:x-large;">${grade} - ${value}%</span><br>
                    <span class='badge bg-secondary p-1 m-1' style="font-size:x-large;">${instructorName}</span><br>
                    </div>
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
        async: true,
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
                  color: '#00c9a7' // Set the color for x-axis labels
                }
              }
            }
          };

          var chart = new ApexCharts(document.querySelector("#Test"), options);
          chart.render();
        }
      });

      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/fetchAllClassesfilter.php',
        async: true,
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
                    <center><span class='styletext' style=''>${label}</span></center><hr style="margin:revert;">
                    <div class="d-flex">
                    <span class="badge p-1 m-1 text-white bg-${gradeClassName}" style="font-size:x-large;">${gradeSymbol} - ${value}%</span><br>
                    <span class="badge bg-secondary p-1 m-1" style="font-size:x-large;">${instructorName}</span>
                    </div>
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
</script>

<script>
  $(".fetchHeatMapData").hover(function() {
    // $("#heatMapData").empty();
    const courseId = $(this).data("courseid");
    const classId = $(this).data("classid");
    const phaseId = $(this).data("phaseid");
    const className = $(this).data("class");
    const userId = $(this).data("userid");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchMatrixData.php',
      async: true,
      data: {
        courseId: courseId,
        classId: classId,
        phaseId: phaseId,
        className: className,
        userId: userId,
      }, // Send the input values as data
      success: function(response) {
        // console.log(response);
        // $(".heatMapData").html(response);
      }
    });
  });
  // Track the current active tooltip
  var currentTooltip = null;

  // Function to activate a tooltip with a delay
  function activateTooltip(tooltip) {
    if (currentTooltip) {
      currentTooltip.classList.remove('active');
      setTimeout(function() {
        if (currentTooltip) {
          currentTooltip.style.transition = 'none';
        }
      }, 2000); // Delay before removing transition
    }
    currentTooltip = tooltip;
    if (currentTooltip) {
      currentTooltip.style.transition = 'all 0.50s ease-in-out'; // Restore the transition
      currentTooltip.classList.add('active');
    }
  }


  document.addEventListener('DOMContentLoaded', function() {
    var tooltips = document.querySelectorAll('.custom-tooltip');
    tooltips.forEach(function(tooltip) {
      var id = tooltip.classList[0];
      var dataPoint = document.querySelector(`#${id}`);

      dataPoint.addEventListener('mouseenter', function() {
        activateTooltip(tooltip);
      });

      dataPoint.addEventListener('mouseleave', function() {
        activateTooltip(null);
      });
    });
  });
</script>