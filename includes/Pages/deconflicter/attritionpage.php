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
  <title>Attrition</title>
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
          <h1 class="text-success">Attrition</h1>
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
              <center>
                <form style="width:50%;" action="<?php echo BASE_URL; ?>includes/Pages/addAttrition.php" method="post">
                  <table class="table" id="table-field-attrition">
                    <tr>
                      <td>
                        <label class="text-dark">Percentage</label>
                        <input type="number" name="percentage[]" value="" class="form-control" placeholder="Add Attrition Percent" />
                      </td>
                      <td><button type="button" name="add_attrition" id="add_attrition" class="btn btn-soft-primary" style="margin-top: 30px;"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>

                  <input type="submit" name="addAttrition" value="Submit" class="btn btn-success" style="margin:5px;font-size:large; font-weight:bold;">
                </form>
              </center>
              <hr>
              <table class="table table-striped table-bordered" id="phasetable">

                <thead class="bg-dark">
                  <tr>
                    <th class="text-white">Sr No</th>
                    <th class="text-white">Attrition</th>
                    <th class="text-white">Department</th>
                  <th class="text-white">Date</th>
                    <th class="text-white">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $dQ = $connect->query("SELECT * FROM attrition");
                  $sr = 0;
                  while ($dQData = $dQ->fetch()) {
                    $dQData1 = $dQData['id'];
                    $sr++;
                  ?>
                    <tr>
                      <td><?php echo $sr; ?></td>
                      <td><?php echo $dQData['attritionPercent']; ?></td>
                      <td>
                        <?php
                        $depQ = $connect->query("SELECT * FROM deconflicterdepartment WHERE mainId = '$dQData1' AND type = 'attrition'");
                        while ($depQName = $depQ->fetch()) {
                          $depID = $depQName['departMentId'];
                          $depNameQ = $connect->query("SELECT department_name FROM homepage WHERE id = '$depID'");
                          $depNameData = $depNameQ->fetchColumn();
                        ?>
                          <p>
                            <?php echo $depNameData; ?>
                            <a href="/latest/TOS/includes/Pages/fetchDaprtMent.php?deleteDep=<?php echo $depID; ?>&deleteAttr=<?php echo $dQData1; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                          </p>
                        <?php
                        }
                        ?>
                      </td>
                      <td><?php echo $dQData['date']; ?></td>
                      <td><a class="btn btn-soft-primary btn-xs fetchDepartMent" data-id="<?php echo $dQData['id']; ?>" data-bs-toggle="modal" data-bs-target="#addDepartment"><i class="bi bi-people"></i></a>
                        <a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('al_id').value='<?php echo $dQData['id'] ?>';
                                        document.getElementById('attrition_name').value='<?php echo $dQData['attritionPercent']; ?>';
                                        document.getElementById('attrDate').value='<?php echo $dQData['date']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editattrition"><i class="bi bi-pen-fill"></i></a>


                        <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php?attrDelete=<?php echo $dQData['id']; ?>"><i class="bi bi-trash-fill"></i></a>
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
            <input type="hidden" name="attrition1" id="attrition">
            <table class="table table-striped table-bordered" id="phasetable">

              <thead class="bg-dark">
                <tr>
                  <th class="text-white">Sr No</th>
                  <th class="text-white">Department</th>
                </tr>
              </thead>
              <tbody id="departmentData">
                <?php
                $departMentQ = $connect->query("SELECT * FROM homepage");
                while ($departmentData = $departMentQ->fetch()) {
                  $depId = $departmentData['id'];
                  $checDepId = $connect->query("SELECT count(*) FROM deconflicterdepartment WHERE departMentId = '$depId' AND type = 'attrition'");
                  $checkDep = $checDepId->fetchColumn();
                  if ($checkDep <= 0) {
                ?>
                    <tr>
                      <td><input type="checkbox" name="departmentId[]" id="" value="<?php echo $departmentData['id']; ?>"></td>
                      <td><?php echo $departmentData['department_name']; ?></td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
            <input type="submit" value="Add" class="btn btn-success" name="addAttrition" />
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editattrition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Attrition</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php">
            <input class="form-control" type="hidden" name="planId" value="" id="al_id">
            <label class="text-dark" style="font-weight:bold;">Percentage</label>
            <input class="form-control" type="number" name="planned_name" value="" id="attrition_name">
            <label class="text-dark" style="font-weight:bold;">Date</label>
            <input class="form-control" type="date" name="attrDate" value="" id="attrDate">
            <hr>
            <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editAttr" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
                      <td>\
                      <label class="text-dark">Percentage</label>\
                      <input type="number" name="percentage[]" value="" class="form-control" placeholder="Add Attrition Percent">\
                    </td>\
                          <td><button type="button" name="remove_attrition" id="remove_attrition" class="btn btn-soft-danger" style="margin-top:30px;"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
      var max = 100;
      var a = 1;

      $("#add_attrition").click(function() {
        if (a <= max) {
          $("#table-field-attrition").append(html);
          a++;
        }
      });
      $("#table-field-attrition").on('click', '#remove_attrition', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>


<script>
  $(".fetchDepartMent").on("click", function() {
    const attrition = $(this).data("id");
    $("#attrition").val(attrition);
    // $.ajax({
    //   type: 'POST',
    //   url: '<?php echo BASE_URL; ?>includes/Pages/fetchDaprtMent.php',
    //   data: {
    //     attrition: attrition,
    //   },
    //   success: function(response) {
    //     // alert(response);
    //     $("#departmentData").empty();
    //     $("#departmentData").html(response);
    //   }
    // });
  });
</script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>
</html>