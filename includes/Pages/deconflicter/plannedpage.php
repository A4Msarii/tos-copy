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
  <title>Planned Leaves</title>
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
          <h1 class="text-success">Leave</h1>
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
            <!-- Nav -->
            <ul class="nav nav-pills justify-content-center" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="plannedLeave-tab" href="#plannedLeave" data-bs-toggle="pill" data-bs-target="#plannedLeave" role="tab" aria-controls="plannedLeave" aria-selected="true">
                  <div class="d-flex align-items-center">
                    Planned Leave
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="UnplannedLeave-tab" href="#UnplannedLeave" data-bs-toggle="pill" data-bs-target="#UnplannedLeave" role="tab" aria-controls="UnplannedLeave" aria-selected="false">
                  <div class="d-flex align-items-center">
                    Unplanned Leave
                  </div>
                </a>
              </li>
            </ul>
            <!-- End Nav -->
            <hr>
            <div class="card-body">
              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="plannedLeave" role="tabpanel" aria-labelledby="plannedLeave-tab">
                  <form action="<?php echo BASE_URL; ?>includes/Pages/addDeconflicterData.php" method="post">
                    <!-- <input type="hidden" name="departMentId" value="<?php echo $department_Id; ?>"> -->
                    <input type="hidden" name="leaveType" value="planned">
                    <table class="table" id="table-field-planned">
                      <tr>

                        <td>
                          <div class="row">
                            <div class="col-md-4 mb-2">

                              <div class="form-outline">
                                <label class="form-label text-dark" for="course" style="font-weight:bold;">Start Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                                <input type="date" id="st_Date" name="startDate[]" class="form-control form-control-md" required />
                              </div>

                            </div>
                            <div class="col-md-4 mb-2">

                              <div class="form-outline">
                                <label class="form-label text-dark" for="symbol" style="font-weight:bold;">End Date</label>
                                <input type="date" id="en_date" name="endDate[]" class="form-control form-control-md" required />
                              </div>

                            </div>

                            <div class="col-md-4 mb-2">

                              <div class="form-outline">
                                <label class="form-label text-dark" for="symbol" style="font-weight:bold;">Name Of Holiday</label>
                                <input type="text" id="holiday" name="holiday[]" class="form-control form-control-md" required />
                              </div>

                            </div>

                          </div>
                        </td>
                        <td><button type="button" name="add_planned" id="add_planned" class="btn btn-soft-primary" style="margin-top: 30px;"><i class="bi bi-plus-circle-fill"></i></button></td>
                      </tr>
                    </table>
                    <center><input type="submit" class="btn btn-success" style="font-size: large; font-weight:bold;" name="addPlanLeave"></center>
                  </form>
                  <hr>
                  <table class="table table-striped table-bordered" id="phasetable">

                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">Sr No</th>
                        <th class="text-white">Start Date</th>
                        <th class="text-white">End DAte</th>
                        <th class="text-white">Holiday</th>
                        <th class="text-white">Department</th>
                        <th class="text-white">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $dQ = $connect->query("SELECT * FROM holydays WHERE leaveType = 'planned'");
                      $sr = 0;
                      while ($dQData = $dQ->fetch()) {
                        $dQData1 = $dQData['id'];
                        $sr++;
                      ?>
                        <tr>
                          <td><?php echo $sr; ?></td>
                          <td><?php echo $dQData['startDate']; ?></td>
                          <td><?php echo $dQData['endDate']; ?></td>
                          <td><?php echo $dQData['holyDayName']; ?></td>
                          <td>
                            <?php
                            $depQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE mainId = '$dQData1' AND type = 'planedLeave'");
                            while ($depQName = $depQ->fetch()) {
                              $depID = $depQName['departMentId'];
                              $depNameQ = $connect->query("SELECT department_name FROM homepage WHERE id = '$depID'");
                              $depNameData = $depNameQ->fetchColumn();
                            ?>
                              <p>
                                <?php echo $depNameData; ?>
                                <a href="/latest/TOS/includes/Pages/fetchDaprtMent.php?deleteDep=<?php echo $depID; ?>&deletePlanedLeaveDep=<?php echo $dQData1; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                              </p>
                            <?php
                            }
                            ?>
                          </td>
                          <td>
                            <a class="btn btn-soft-primary btn-xs fetchDepartMent" data-id="<?php echo $dQData['id']; ?>" data-bs-toggle="modal" data-bs-target="#addDepartment"><i class="bi bi-people"></i></a>
                            <a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('pl_id').value='<?php echo $dQData['id'] ?>';document.getElementById('planned_name').value='<?php echo $dQData['holyDayName']; ?>';document.getElementById('start_name').value='<?php echo $dQData['startDate']; ?>';document.getElementById('end_name').value='<?php echo $dQData['endDate']; ?>';" data-bs-toggle="modal" data-bs-target="#editplannedleave"><i class="bi bi-pen-fill"></i></a>


                            <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?planDelete=<?php echo $dQData['id']; ?>"><i class="bi bi-trash-fill"></i></a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade" id="UnplannedLeave" role="tabpanel" aria-labelledby="UnplannedLeave-tab">
                  <form action="<?php echo BASE_URL; ?>includes/Pages/addDeconflicterData.php" method="post">
                    <!-- <input type="hidden" name="departMentId" value="<?php echo $department_Id; ?>"> -->
                    <input type="hidden" name="leaveType" value="unPlanned">
                    <table class="table" id="table-field-unplanned">
                      <tr>

                        <td>
                          <div class="row">
                            <div class="col-md-4 mb-2">

                              <div class="form-outline">
                                <label class="form-label text-dark" for="course" style="font-weight:bold;">Start Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                                <input type="date" id="" name="startDate[]" class="form-control form-control-md" required />
                              </div>

                            </div>
                            <div class="col-md-4 mb-2">

                              <div class="form-outline">
                                <label class="form-label text-dark" for="symbol" style="font-weight:bold;">End Date</label>
                                <input type="date" id="" name="endDate[]" class="form-control form-control-md" required />
                              </div>

                            </div>

                            <div class="col-md-4 mb-2">

                              <div class="form-outline">
                                <label class="form-label text-dark" for="symbol" style="font-weight:bold;">Name Of Holiday</label>
                                <input type="text" id="" name="holiday[]" class="form-control form-control-md" required />
                              </div>

                            </div>

                          </div>
                        </td>
                        <td><button type="button" name="add_unplanned" id="add_unplanned" class="btn btn-soft-primary" style="margin-top: 30px;"><i class="bi bi-plus-circle-fill"></i></button></td>
                      </tr>
                    </table>
                    <center><input type="submit" name="addUnplane" class="btn btn-success" style="font-size: large; font-weight:bold;"></center>
                  </form>
                  <hr>
                  <table class="table table-striped table-bordered" id="phasetable">

                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">Sr No</th>
                        <th class="text-white">Start Date</th>
                        <th class="text-white">End DAte</th>
                        <th class="text-white">Holiday</th>
                        <th class="text-white">Department</th>
                        <th class="text-white">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $dQ = $connect->query("SELECT * FROM holydays WHERE leaveType = 'unPlanned'");
                      $sr = 0;
                      while ($dQData = $dQ->fetch()) {
                        $dQData1 = $dQData['id'];
                        $sr++;
                      ?>
                        <tr>
                          <td><?php echo $sr; ?></td>
                          <td><?php echo $dQData['startDate']; ?></td>
                          <td><?php echo $dQData['endDate']; ?></td>
                          <td><?php echo $dQData['holyDayName']; ?></td>
                          <td>
                            <?php
                            $depQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE mainId = '$dQData1' AND type = 'unPlanned'");
                            while ($depQName = $depQ->fetch()) {
                              $depID = $depQName['departMentId'];
                              $depNameQ = $connect->query("SELECT department_name FROM homepage WHERE id = '$depID'");
                              $depNameData = $depNameQ->fetchColumn();
                            ?>
                              <p>
                                <?php echo $depNameData; ?>
                                <a href="/latest/TOS/includes/Pages/fetchDaprtMent.php?deleteDep=<?php echo $depID; ?>&deleteUnPlanedLeaveDep=<?php echo $dQData1; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                              </p>
                            <?php
                            }
                            ?>
                          </td>
                          <td>
                            <a class="btn btn-soft-primary btn-xs fetchDepartMentUnplanned" data-id="<?php echo $dQData['id']; ?>" data-bs-toggle="modal" data-bs-target="#addDepartmentUnplanned"><i class="bi bi-people"></i></a>
                            <a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('ul_id').value='<?php echo $dQData['id'] ?>';
                                        document.getElementById('unplanned_name').value='<?php echo $dQData['holyDayName']; ?>';
                                        document.getElementById('unstart_name').value='<?php echo $dQData['startDate']; ?>';
                                        document.getElementById('unend_name').value='<?php echo $dQData['endDate']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editunplannedleave"><i class="bi bi-pen-fill"></i></a>


                            <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?unPlanDelete=<?php echo $dQData['id']; ?>"><i class="bi bi-trash-fill"></i></a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

              </div>

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
            <input type="hidden" name="planedLeave1" id="planedLeave">
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
            <input type="submit" value="Add" class="btn btn-success" name="addPlanedLeave" />
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- edit phase modal -->
  <div class="modal fade" id="editplannedleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Planned Leave</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php">
            <input class="form-control" type="hidden" name="planId" value="" id="pl_id">
            <label class="text-dark" style="font-weight:bold;">Holiday</label>
            <input class="form-control" type="text" name="planned_name" id="planned_name">
            <label class="text-dark" style="font-weight:bold;">Start Date</label>
            <input class="form-control" type="text" name="start_name" value="" id="start_name">
            <label class="text-dark" style="font-weight:bold;">End Date</label>
            <input class="form-control" type="text" name="end_name" value="" id="end_name">
            <hr>
            <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editPlanLeave" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- unplanned leave modal -->

  <div class="modal fade" id="addDepartmentUnplanned" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="unPlanned1" id="unPlanned">
            <table class="table table-striped table-bordered" id="phasetable">

              <thead class="bg-dark">
                <tr>
                  <th class="text-white">Sr No</th>
                  <th class="text-white">Department</th>
                </tr>
              </thead>
              <tbody id="departmentDataUnplanned">

              </tbody>
            </table>
            <input type="submit" value="Add" class="btn btn-success" name="addUnPlanned" />
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editunplannedleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Unplanned Leave</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php">
            <input class="form-control" type="hidden" name="planId" value="" id="ul_id">
            <label class="text-dark" style="font-weight:bold;">Holiday</label>
            <input class="form-control" type="text" name="planned_name" value="" id="unplanned_name">
            <label class="text-dark" style="font-weight:bold;">Start Date</label>
            <input class="form-control" type="date" name="start_name" value="" id="unstart_name">
            <label class="text-dark" style="font-weight:bold;">End Date</label>
            <input class="form-control" type="date" name="end_name" value="" id="unend_name">
            <hr>
            <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editUnPlanLeave" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- end unplanned leave -->

  <script>
    $(".fetchDepartMentUnplanned").on("click", function() {
      const unPlanned = $(this).data("id");
      $("#unPlanned").val(unPlanned);
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php',
        data: {
          unPlanned: unPlanned,
        },
        success: function(response) {
          // alert(response);
          $("#departmentDataUnplanned").empty();
          $("#departmentDataUnplanned").html(response);
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
                      <td>\
                        <div class="row">\
                        <div class="col-md-4 mb-2">\
                          <div class="form-outline">\
                            <label class="form-label text-dark" for="course" style="font-weight:bold;">Start Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>\
                            <input type="date" id="st_Date" name="st_date[]" class="form-control form-control-md" required />\
                          </div>\
                        </div>\
                        <div class="col-md-4 mb-2">\
                          <div class="form-outline">\
                            <label class="form-label text-dark" for="symbol" style="font-weight:bold;">End Date</label>\
                            <input type="date" id="en_date" name="en_date[]" class="form-control form-control-md" required />\
                          </div>\
                        </div>\
                        <div class="col-md-4 mb-2">\
                          <div class="form-outline">\
                            <label class="form-label text-dark" for="symbol" style="font-weight:bold;">Name Of Holiday</label>\
                            <input type="text" id="holiday" name="holiday[]" class="form-control form-control-md" required />\
                          </div>\
                        </div>\
                      </div>\
                      </td>\
                          <td><button type="button" name="remove_planned" id="remove_planned" class="btn btn-soft-danger" style="margin-top:30px;"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
      var max = 100;
      var a = 1;

      $("#add_planned").click(function() {
        if (a <= max) {
          $("#table-field-planned").append(html);
          a++;
        }
      });
      $("#table-field-planned").on('click', '#remove_planned', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>


  <script>
    $(".fetchDepartMent").on("click", function() {
      const planedLeave = $(this).data("id");
      $("#planedLeave").val(planedLeave);
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php',
        data: {
          planedLeave: planedLeave,
        },
        success: function(response) {
          // alert(response);
          $("#departmentData").empty();
          $("#departmentData").html(response);
        }
      });
    });
  </script>

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

</html>