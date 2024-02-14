<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$ctp = "";
if (isset($fixed_ctp_id)) {
  $_SESSION['type_ctp'] = $ctp = $fixed_ctp_id;
} else if (isset($_SESSION['type_ctp'])) {
  $ctp = $_SESSION['type_ctp'];
}
$course_names11 = "";
$q6 = "SELECT * FROM test_course";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $course_name_value = $row6['course_name'];
    $course_names11 .= '<option value="' . $row6['id'] . '">' . $course_name_value . '</option>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Vehicle</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

<body>
  <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Vehicle</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">
              <!-- Nav -->
              <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="deaprtment-tab" href="#deaprtment" data-bs-toggle="pill" data-bs-target="#deaprtment" role="tab" aria-controls="deaprtment" aria-selected="true">
                    <div class="d-flex align-items-center text-success" style="font-size: large;">
                      Department
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="yearly-tab" href="#yearly" data-bs-toggle="pill" data-bs-target="#yearly" role="tab" aria-controls="yearly" aria-selected="true">
                    <div class="d-flex align-items-center text-success" style="font-size: large;">
                      Yearly
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="exception-tab" href="#exception" data-bs-toggle="pill" data-bs-target="#exception" role="tab" aria-controls="exception" aria-selected="false">
                    <div class="d-flex align-items-center text-success" style="font-size: large;">
                      Exception
                    </div>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/yearClaendar.php">
                    <div class="d-flex align-items-center text-success" style="font-size: large;">
                      Calendar
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/fullCalendar.php">
                    <div class="d-flex align-items-center text-success" style="font-size: large;">
                      Full View Calendar
                    </div>
                  </a>
                </li> -->
              </ul>
              <hr>
              <!-- End Nav -->

              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="deaprtment" role="tabpanel" aria-labelledby="deaprtment-tab">
                  <table class="table table-striped table-bordered" id="phasetable">

                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">Sr No</th>
                        <th class="text-white">Department Name</th>
                        <th class="text-white">Class Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $departMentQuery = $connect->query("SELECT * FROM homepage");
                      $sr = 0;
                      while ($departMentQueryData = $departMentQuery->fetch()) {
                        $depId = $departMentQueryData['id'];
                        $sr++;
                      ?>
                        <tr>
                          <td><?php echo $sr; ?></td>
                          <td><a class="fetchDepCourse" data-depid="<?php echo $departMentQueryData['id']; ?>" style="cursor: pointer;" data-bs-target="#addClassesDepartment" data-bs-toggle="modal"><?php echo $departMentQueryData['department_name']; ?></a></td>
                          <td>
                            <?php
                            $fetchCourse = $connect->query("SELECT * FROM course_in_department WHERE departmentId = '$depId'");
                            while ($fetchCourseData = $fetchCourse->fetch()) {
                              $fetchCtp = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '" . $fetchCourseData['courseName'] . "'");
                            ?>
                              <p>
                                <?php echo $fetchCtp->fetchColumn() . " -0" . $fetchCourseData['courseCode']; ?>
                                <a href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/fetchCourses.php?removeClass=<?php echo $fetchCourseData['id']; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                              </p>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                  <form action="<?php echo BASE_URL; ?>includes/Pages/addDeconflicterData.php" method="post">
                    <!-- <input type="hidden" name="departMentId" value="<?php echo $department_Id; ?>"> -->
                    <div class="row">
                      <div class="col-md-6 mb-2">

                        <div class="form-outline">
                          <label class="form-label text-dark" for="course" style="font-weight:bold;">Year<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                          <?php
                          echo '<select name="yearlyDate" class="form-control"';
                          $starting_year  = date('Y', strtotime('-10 year'));
                          $ending_year = date('Y', strtotime('+10 year'));
                          $current_year = date('Y');
                          for ($starting_year; $starting_year <= $ending_year; $starting_year++) {
                            echo '<option value="' . $starting_year . '"';
                            if ($starting_year ==  $current_year) {
                              echo ' selected="selected"';
                            }
                            echo ' >' . $starting_year . '</option>';
                          }
                          echo '<select>';
                          ?>
                        </div>

                      </div>
                      <div class="col-md-6 mb-2">

                        <div class="form-outline">
                          <label style="text-align:left;font-weight:bold;" class="form-label text-dark" for="type">Lines Required<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                          <input type="text" id="linePerDay" name="linePerDay" class="form-control form-control-md" required />
                        </div>

                      </div>
                    </div>
                    <center>
                      <input type="submit" value="Save" name="addYearlyDate" class="btn btn-success" style="font-size:large; font-weight:bold;" />
                    </center>
                  </form>
                  <hr>
                  <table class="table table-striped table-bordered" id="phasetable">

                    <thead class="bg-dark" style="text-align: center;">
                      <tr>

                        <th class="text-white">Year</th>
                        <th class="text-white">Line Per Day</th>
                        <th class="text-white" style="width: 40%;">Days</th>
                        <th class="text-white">Weekend</th>
                        <th class="text-white">Department</th>
                        <th class="text-white">Action</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center;">
                      <?php
                      $dQ = $connect->query("SELECT * FROM deconflicterdata WHERE yearly IS NOT NULL ORDER BY yearly DESC");
                      $sr = 0;
                      while ($dQData = $dQ->fetch()) {
                        $dQData1 = $dQData['id'];
                        $sr++;
                      ?>
                        <tr>

                          <td><span style="font-size: large;font-weight: bold;"><?php echo $dQData['yearly']; ?></span></td>
                          <td><span style="font-size: large;font-weight: bold;"><?php echo $dQData['linePerDay']; ?></span></td>
                          <td>
                            <form action="<?php echo BASE_URL; ?>includes/Pages/addDeconflicterData.php" method="POST" style="display: flex;">
                              <div class="row justify-content-center">
                                <div class="col-md-4">
                                  <input type="hidden" name="mId" value="<?php echo $dQData['id']; ?>">
                                  <select class="form form-control" name="dayName" id="" style="width:revert-layer;margin: 5px;">
                                    <option selected value="" disabled>--Select Day--</option>
                                    <?php
                                    if ($dQData['day'] != "") {
                                    ?>
                                      <option selected value="<?php echo $dQData['day']; ?>"><?php echo $dQData['day']; ?></option>
                                    <?php
                                    }
                                    ?>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thuresday">Thuresday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                  </select>
                                </div>

                                <div class="col-md-2">
                                  <input class="form form-control" value="<?php echo $dQData['lineDayPer']; ?>" type="text" name="dayLine" id="days" style="margin: 5px;" />
                                </div>
                                <div class="col-md-2">

                                  <input type="submit" value="Add" class="btn btn-success" name="addSpecificDay" style="margin: 5px;" />
                                </div>
                              </div>
                            </form>
                          </td>
                          <td>
                            <?php
                            $include = "";
                            $exclude = "";
                            if ($dQData['weekend'] == "include") {
                              $include = "checked";
                            }
                            if ($dQData['weekend'] == "exclude") {
                              $exclude = "checked";
                            }
                            ?>

                            <select class="addWeekend form from-control" name="weekend" id="" data-id="<?php echo $dQData['id']; ?>" style="    width: -webkit-fill-available;height: 40px;border-radius: 20px;margin: 5px;padding: 5px;">
                              <option selected disabled value="">--Select--</option>
                              <option selected value="<?php echo $dQData['weekend'] ?>" disabled><?php echo $dQData['weekend'] ?></option>
                              <option value="include">Include</option>
                              <option value="exclude">Exclude</option>
                            </select>
                          </td>
                          <td>
                            <?php
                            $depQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE mainId = '$dQData1' AND type = 'linePerDay'");
                            if ($depQ->rowCount() > 0) {
                              while ($depQName = $depQ->fetch()) {
                                $depID = $depQName['departMentId'];
                                $depNameQ = $connect->query("SELECT department_name FROM homepage WHERE id = '$depID'");
                                $depNameData = $depNameQ->fetchColumn();
                            ?>
                                <p>
                                  <?php echo $depNameData; ?>
                                  <a href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?deleteDep=<?php echo $depID; ?>&linePerDay=<?php echo $dQData1; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                </p>
                              <?php
                              }
                            } else {
                              ?>
                              <img src="<?php echo BASE_URL; ?>assets/icons/icons anchit/addData.gif" style="height:100px;width:100px;" alt="">
                            <?php
                            }
                            ?>
                          </td>
                          <td>
                            <a class="btn btn-soft-primary btn-xs fetchDepartMent" data-id="<?php echo $dQData['id']; ?>" data-year="<?php echo $dQData['yearly']; ?>" data-bs-toggle="modal" data-bs-target="#addDepartment"><i class="bi bi-people"></i></a>
                            <a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('yearvl_id').value='<?php echo $dQData['id'] ?>'; document.getElementById('yearvehicle_name').value='<?php echo $dQData['linePerDay']; ?>';" data-bs-toggle="modal" data-bs-target="#edityearlyvehicletab"><i class="bi bi-pen-fill"></i></a>
                            <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?vehicleDelete=<?php echo $dQData['id']; ?>"><i class="bi bi-trash-fill"></i></a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade" id="exception" role="tabpanel" aria-labelledby="exception-tab">
                  <form action="<?php echo BASE_URL; ?>includes/Pages/addDeconflicterData.php" method="post">
                    <!-- <input type="hidden" name="departMentId" value="<?php echo $department_Id; ?>"> -->
                    <div class="row">
                      <div class="col-md-4 mb-2">

                        <div class="form-outline">
                          <label class="form-label text-dark" for="course" style="font-weight:bold;">Start date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                          <input type="date" id="startDate" name="startDate" class="form-control form-control-md" required />
                        </div>

                      </div>
                      <div class="col-md-4 mb-2">

                        <div class="form-outline">
                          <label class="form-label text-dark" for="symbol" style="font-weight:bold;">End Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                          <input type="date" id="endDate" name="endDate" class="form-control form-control-md" required />
                        </div>

                      </div>

                      <div class="col-md-4 mb-2">

                        <div class="form-outline">
                          <label style="text-align:left;font-weight:bold;" class="form-label text-dark" for="type">Lines Required<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                          <input type="text" id="linePerDay" name="linePerDay" class="form-control form-control-md" required />
                        </div>

                      </div>
                    </div>
                    <center>
                      <input type="submit" value="Save" name="addLinesPerDay" class="btn btn-success" style="font-size:large; font-weight:bold;" />
                    </center>
                  </form>
                  <hr>
                  <table class="table table-striped table-bordered" id="phasetable">

                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">Sr No</th>
                        <th class="text-white">Start Date</th>
                        <th class="text-white">End DAte</th>
                        <th class="text-white">Line Per Dey</th>
                        <th class="text-white">Department</th>
                        <th class="text-white">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $dQ = $connect->query("SELECT * FROM deconflicterdata WHERE yearly IS NULL");
                      $sr = 0;
                      while ($dQData = $dQ->fetch()) {
                        $dQData1 = $dQData['id'];
                        $sr++;
                      ?>
                        <tr>
                          <td><?php echo $sr; ?></td>
                          <td><?php echo $dQData['startDate']; ?></td>
                          <td><?php echo $dQData['endDate']; ?></td>
                          <td><?php echo $dQData['linePerDay']; ?></td>
                          <td>
                            <?php
                            $depQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE mainId = '$dQData1' AND type = 'linePerDay'");
                            while ($depQName = $depQ->fetch()) {
                              $depID = $depQName['departMentId'];
                              $depNameQ = $connect->query("SELECT department_name FROM homepage WHERE id = '$depID'");
                              $depNameData = $depNameQ->fetchColumn();
                            ?>
                              <p>
                                <?php echo $depNameData; ?>
                                <a href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?deleteDep=<?php echo $depID; ?>&linePerDay=<?php echo $dQData1; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                              </p>
                            <?php
                            }
                            ?>
                          </td>

                          <td>
                            <a class="btn btn-soft-primary btn-xs fetchDepartMent" data-id="<?php echo $dQData['id']; ?>" data-bs-toggle="modal" data-bs-target="#addDepartment"><i class="bi bi-people"></i></a>
                            <a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('vl_id').value='<?php echo $dQData['id'] ?>'; document.getElementById('vehicle_name').value='<?php echo $dQData['linePerDay']; ?>';document.getElementById('vstart_name').value='<?php echo $dQData['startDate']; ?>';document.getElementById('vend_name').value='<?php echo $dQData['endDate']; ?>';" data-bs-toggle="modal" data-bs-target="#editvehicletab"><i class="bi bi-pen-fill"></i></a>
                            <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?vehicleDelete=<?php echo $dQData['id']; ?>"><i class="bi bi-trash-fill"></i></a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- End Tab Content -->
            </div>

            <div class="card-body" style="display:none;">
              <form action="<?php echo BASE_URL; ?>includes/Pages/addDeconflicterData.php" method="post">
                <!-- <input type="hidden" name="departMentId" value="<?php echo $department_Id; ?>"> -->
                <div class="row">
                  <div class="col-md-4 mb-2">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="course" style="font-weight:bold;">Start date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input type="date" id="startDate" name="startDate" class="form-control form-control-md" required />
                    </div>

                  </div>
                  <div class="col-md-4 mb-2">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="symbol" style="font-weight:bold;">End Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input type="date" id="endDate" name="endDate" class="form-control form-control-md" required />
                    </div>

                  </div>

                  <div class="col-md-4 mb-2">

                    <div class="form-outline">
                      <label style="text-align:left;font-weight:bold;" class="form-label text-dark" for="type">Lines Required<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input type="text" id="linePerDay" name="linePerDay" class="form-control form-control-md" required />
                    </div>

                  </div>
                </div>
                <center>
                  <input type="submit" value="Save" name="addLinesPerDay" class="btn btn-success" style="font-size:large; font-weight:bold;" />
                </center>
              </form>
              <hr>
              <table class="table table-striped table-bordered" id="phasetable">

                <thead class="bg-dark">
                  <tr>
                    <th class="text-white">Sr No</th>
                    <th class="text-white">Start Date</th>
                    <th class="text-white">End DAte</th>
                    <th class="text-white">Line Per Dey</th>
                    <th class="text-white">Department</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $dQ = $connect->query("SELECT * FROM deconflicterdata");
                  $sr = 0;
                  while ($dQData = $dQ->fetch()) {
                    $dQData1 = $dQData['id'];
                    $sr++;
                  ?>
                    <tr>
                      <td><?php echo $sr; ?></td>
                      <td><?php echo $dQData['startDate']; ?></td>
                      <td><?php echo $dQData['endDate']; ?></td>
                      <td><?php echo $dQData['linePerDay']; ?></td>
                      <td>
                        <?php
                        $depQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE mainId = '$dQData1' AND type = 'linePerDay'");
                        while ($depQName = $depQ->fetch()) {
                          $depID = $depQName['departMentId'];
                          $depNameQ = $connect->query("SELECT department_name FROM homepage WHERE id = '$depID'");
                          $depNameData = $depNameQ->fetchColumn();
                        ?>
                          <p>
                            <?php echo $depNameData; ?>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?deleteDep=<?php echo $depID; ?>&linePerDay=<?php echo $dQData1; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                          </p>
                        <?php
                        }
                        ?>
                      </td>

                      <td><a class="btn btn-soft-primary btn-xs fetchDepartMent" data-id="<?php echo $dQData['id']; ?>" data-bs-toggle="modal" data-bs-target="#addDepartment"><i class="bi bi-people"></i></a>
                        <a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('vl_id').value='<?php echo $dQData['id'] ?>'; document.getElementById('vehicle_name').value='<?php echo $dQData['linePerDay']; ?>';document.getElementById('vstart_name').value='<?php echo $dQData['startDate']; ?>';document.getElementById('vend_name').value='<?php echo $dQData['endDate']; ?>';" data-bs-toggle="modal" data-bs-target="#editvehicletab"><i class="bi bi-pen-fill"></i></a>


                        <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?vehicleDelete=<?php echo $dQData['id']; ?>"><i class="bi bi-trash-fill"></i></a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>

  <div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="vehicleId1" id="vehicleId">
            <table class="table table-striped table-bordered" id="phasetable">

              <thead class="bg-dark">
                <tr>
                  <th class="text-white">Sr No</th>
                  <th class="text-white">Department</th>
                </tr>
              </thead>
              <tbody id="departmentData">

              </tbody>
            </table>
            <input type="submit" value="Add" class="btn btn-success" name="addDepart" />
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="editvehicletab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Vehicle</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php">
            <input class="form-control" type="hidden" name="vId" value="" id="vl_id">
            <label class="text-dark" style="font-weight:bold;">Lines Required</label>
            <input class="form-control" type="number" name="planned_name" value="" id="vehicle_name">
            <label class="text-dark" style="font-weight:bold;">Start Date</label>
            <input class="form-control" type="date" name="vstart_name" value="" id="vstart_name">
            <label class="text-dark" style="font-weight:bold;">End Date</label>
            <input class="form-control" type="date" name="vend_name" value="" id="vend_name">
            <hr>
            <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editVehicleName" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edityearlyvehicletab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Vehicle</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php">
            <input class="form-control" type="hidden" name="yearvId" value="" id="yearvl_id">
            <label class="text-dark" style="font-weight:bold;">Lines Required</label>
            <input class="form-control" type="number" name="yearplanned_name" value="" id="yearvehicle_name">
            <label class="text-dark" style="font-weight:bold;">Year</label>
            <?php
            echo '<select name="yearlyDate" class="form-control"';
            $starting_year  = date('Y', strtotime('-10 year'));
            $ending_year = date('Y', strtotime('+10 year'));
            $current_year = date('Y');
            for ($starting_year; $starting_year <= $ending_year; $starting_year++) {
              echo '<option value="' . $starting_year . '"';
              if ($starting_year ==  $current_year) {
                echo ' selected="selected"';
              }
              echo ' >' . $starting_year . '</option>';
            }
            echo '<select>';
            ?>
            <hr>
            <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editYearVehicleName" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addClassesDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Add Courses</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo BASE_URL; ?>includes/Pages/deconflicter/fetchCourses.php" method="POST">
            <div id="coursesData"></div>
            <input type="submit" value="Add" name="addCourse" class="btn btn-success" />
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(".fetchDepartMent").on("click", function() {
      const vehicleId = $(this).data("id");
      const year = $(this).data("year");
      $("#vehicleId").val(vehicleId);
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php',
        data: {
          vehicleId: vehicleId,
          year: year,
        },
        success: function(response) {
          // alert(response);
          $("#departmentData").empty();
          $("#departmentData").html(response);
        }
      });
    });
  </script>

  <script type="text/javascript">
    window.onload = function() {
      //Reference the DropDownList.
      var ddlYears = document.getElementById("ddlYears");

      //Determine the Current Year.
      var currentYear = (new Date()).getFullYear();

      //Loop and add the Year values to DropDownList.
      for (var i = 1950; i <= 2100; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        ddlYears.appendChild(option);
      }
    };
  </script>

  <!--Footer-->


  <script>
    $(".fetchDepCourse").on("click", function() {
      const departId = $(this).data("depid");
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/deconflicter/fetchCourses.php',
        data: {
          departId: departId
        },
        success: function(response) {
          $("#coursesData").empty();
          $("#coursesData").html(response);
        }
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      // Attach change event to radio buttons
      $('.addWeekend').on('change', function() {
        var selectedValue = $(this).val();
        var selectedDataId = $(this).data('id');
        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/addDeconflicterData.php',
          data: {
            selectedValue: selectedValue,
            selectedDataId: selectedDataId
          },
          success: function(response) {
            window.location.reload();
          }
        });
      });
    });
  </script>

  <script>
    // Function to keep track of the last clicked tab and store it in sessionStorage
    function storeLastClickedTab() {
      // Retrieve the last clicked tab ID from sessionStorage
      var storedTab = sessionStorage.getItem('lastClickedTab');

      // If there is a stored tab, activate it on page load
      if (storedTab !== null) {
        $('a#' + storedTab).tab('show');
      }

      // When a tab is clicked, set the last clicked tab to its ID and store it in sessionStorage
      $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
        var lastClickedTab = e.target.id;
        sessionStorage.setItem('lastClickedTab', lastClickedTab);
      });
    }

    // Function to stay on the last clicked tab after form submission
    function stayOnLastClickedTab() {
      // Retrieve the last clicked tab ID from sessionStorage
      var storedTab = sessionStorage.getItem('lastClickedTab');

      // When the form is submitted, stay on the last clicked tab
      $('form').submit(function() {
        // Perform form submission
        // ...
        console.log("lastClickedTab: " + lastClickedTab);
        // Activate the last clicked tab
        $('a#' + storedTab).tab('show');

        // Return false to prevent the form from submitting normally
        return false;
      });
    }

    // Call the functions on window load
    window.onload = function() {
      storeLastClickedTab();
      stayOnLastClickedTab();
    };
  </script>

  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

</html>