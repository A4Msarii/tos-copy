<!--Insert Phases-->
<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$total_value = "0";
$ctp = "";
$error = '';
$type_table = '';
?>


<!DOCTYPE html>
<html>

<head>
  <title>Type</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>


<body>
  
  <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    $ctp_name = "Select Ctp first";
    if (isset($fixed_ctp_id)) {
      $_SESSION['type_ctp'] = $ctp = $fixed_ctp_id;
      $ctp_id_data = "SELECT * FROM ctppage where CTPid='$ctp'";
      $statement = $connect->prepare($ctp_id_data);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $ctp_name = $row['course'];
          $total_value = $row['total_mark'];
        }
      }
    } else if (isset($_SESSION['type_ctp'])) {
      $ctp = $_SESSION['type_ctp'];
      $ctp_id_data = "SELECT * FROM ctppage where CTPid='$ctp'";
      $statement = $connect->prepare($ctp_id_data);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $ctp_name = $row['course'];
          $total_value = $row['total_mark'];
        }
      }
    }
    ?>
  </div>
  <div class="modal fade" id="add_marks_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Insert Marks</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>

            <form action="add_mark_of_type.php" method="post">
              <?php if (isset($fixed_ctp_id) || isset($_SESSION['type_ctp'])) { ?>
                <input type="hidden" name="ctp" value="<?php echo $ctp ?>">
              <?php } ?>
              <input type="hidden" id="markvalue_id" name="type_ids">
              <label style="color: black; font-weight:bold;">Enter Marks :</label>
              <input type="text" name="marks_of_type" class="form-control">

              <br>
              <button class="btn btn-success" type="submit" name="submit_Phase">Submit</button>
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!--Input Phases-->
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;display: flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="DataPage" style="color:black; text-decoration:none;" href="usersinfo.php"><i class="bi bi-arrow-left"></i></a>
          <h2 class="text-success">Add Type</h2>
          
        </div>

      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-center">

              <h3 class="text-success">CTP : <span class="text-dark" style="font-weight:bold;"><?php echo $ctp_name ?></span></h3>

              <?php
              $checkStatus = $connect->query("SELECT count(*) FROM typegradefilter WHERE ctpId = '$ctp' AND filterStatus = 'Active'");
              $filValQ = $connect->query("SELECT gradeValue FROM typegradefilter WHERE ctpId = '$ctp'");
              $filValue = $filValQ->fetchColumn();
              if ($filValue <= 0) {
                $filValue = "";
              }
              $checkStatusData = $checkStatus->fetchColumn();
              if ($checkStatusData > 0) {
                $checkVal = "checked";
              } else {
                $checkVal = "";
              }
              ?>
              <div style="float:right; display:flex;">
                <input type="number" placeholder="Enter Minimum Grade" name="gradeValue" id="gradeValue" class="form-control" value="<?php echo $filValue; ?>" />
                <button title="Save Grade" type="button" id="saveGrade" class="btn btn-soft-success btn-xs" style="margin: 5px;"><i class="bi bi-plus-circle"></i></button>
                <div class="form-check form-switch" data-bs-placement="bottom" title="Disable Swap Window" type="button" style="margin:10px;">
                  <!-- <button title="Save Grade" type="button" id="saveGrade" class="btn btn-soft-success btn-xs"><i class="bi bi-plus-circle"></i></button> -->
                  <input class="form-check-input switch" type="checkbox" id="switch" <?php echo $checkVal; ?> />

                </div>
              </div>

            </div>

            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <form action="save_type_totalmark.php" method="post">
                <center>
                  <table>
                    <tr>
                      <td>
                        <?php if (isset($fixed_ctp_id) || isset($_SESSION['type_ctp'])) { ?>

                          <input type="hidden" name="ctp" value="<?php echo $ctp ?>">
                        <?php } ?>
                        <input type="text" placeholder="Total mark" name="outof_marks" id="outof_marks" class="form-control" style="width:100%" value="<?php echo $total_value ?>" required />
                      </td>
                      <td>
                        <input type="submit" class="btn btn-success" name="submit_type_mark" id="submit_type_mark">
                      </td>
                    </tr>
                  </table>
                </center>
              </form><br>
              <center>
                <form class="insert-phases" id="integrity" method="post" action="insert_Type.php" style="width:700px;">
                  <div class="input-field">
                    <table class="table table-bordered type-insert-table" id="table-field-type">
                      <tr>
                        <?php if (isset($fixed_ctp_id) || isset($_SESSION['type_ctp'])) { ?>
                          <input type="hidden" name="ctp" value="<?php echo $ctp ?>">
                        <?php } ?>
                        <td style="text-align: center;"><input type="text" placeholder="Enter Type" name="type[]" id="first_type_input" class="form-control" value="" required /> </td>
                        <td style="width:20px;"><button type="button" name="add_Type" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                      </tr>
                    </table>
                  </div>
                  <center>
                    <button style="margin:5px;" class="btn btn-success" type="submit" name="submit_type">Submit</button>
                  </center>
                </form>
              </center>

              <!--Phase Table-->

              <br>
              <table class="table table-striped table-bordered table-hover mark-table">
                <thead class="bg-dark">
                  <th class="text-white">Id</th>
                  <th class="text-white">Type</th>
                  <th class="text-white">Marks</th>
                  <th class="text-white">Operations</th>
                </thead>
                <?php
                $query = "SELECT * FROM type_data where ctp='$ctp' ORDER BY id DESC;";
                $statement = $connect->prepare($query);
                $statement->execute();

                if ($statement->rowCount() > 0) {
                  $result = $statement->fetchAll();
                  $sn = 1;
                  foreach ($result as $row) {

                    if ($row['marks'] != 0) {
                      $value = $row['marks'];
                    } else {
                      $value = "";
                    } ?>
                    <tr>
                      <td><?php echo $sn++ ?></td>
                      <td><a class="text-dark" style="text-decoration:underline;" href="add_type_data.php?type_id=<?php echo $row['id'] ?>&ctp=<?php echo $ctp ?>"><?php echo $row["type_name"] ?></a></td>
                      <td style="width:20%"><button type="button" onclick="document.getElementById('markvalue_id').value='<?php echo $row['id'] ?>';" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_marks_modal">Add Marks</button> <?php echo $row['marks'] ?></td>
                      <td><a class="btn btn-soft-success btn-xs" href="edit_type.php?id=<?php echo urlencode(base64_encode($row["id"])); ?>"><i class="bi bi-pen-fill"></i></a>
                        <a class="btn btn-soft-danger btn-xs" href="delete_type.php?id=<?php echo $row["id"]; ?>"><i class="bi bi-trash-fill"></i></a>
                      </td>
                    </tr>
                <?php
                  }
                }     ?>
              </table>
              <br>

            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>


  <script>
    $(document).ready(function() {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, Next - home.php ? phase_id = 1 & phase = Driving & ctp = 2);
      }
      $(document).on('change', '.check_marks', function() {
        // code logic here
        var calculated_total_sum = 0;
        var outof_marks = $('#outof_marks').val();
        if (outof_marks == 0) {
          alert("enter proper mark for total marks.");
        } else if (outof_marks == "") {
          alert("please enter total marks.");
        }
        //console.log(outof_marks);

        if (outof_marks != 0 || outof_marks != "") {
          $(".check_marks").each(function() {
            var getValue = $(this).val();
            // console.log(getValue);
            if ($.isNumeric(getValue)) {
              calculated_total_sum += parseFloat(getValue);
              // console.log(calculated_total_sum);
              // console.log(outof_marks);
              //                 var remaining=parseFloat(outof_marks-calculated_total_sum);
              if (calculated_total_sum > outof_marks) {
                alert("out of limit");
                $("#submit_type_mark").attr("disabled", true);
                // $("#add_phase").attr("disabled", true);
                // $("#first_type_input").attr("disabled", true);
              } else if (calculated_total_sum <= outof_marks) {
                $("#submit_type_mark").removeAttr("disabled");
              }
            }
          });

        }
      });

    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      var html = '<tr>\
	                        <td style="text-align: center;"><input type="text" placeholder="Enter Type" name="type[] " class="form-control" value="" required /> </td>\
	                        <td><button type="button" name="remove_actual" id="remove_phase" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
      var max = 100;
      var a = 1;

      $("#add_phase").click(function() {
        if (a <= max) {
          $("#table-field-type").append(html);
          a++;
        }
      });
      $("#table-field-type").on('click', '#remove_phase', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>


<script>
  $(document).ready(function() {
    // Select the checkbox by its ID
    var checkbox = $("#switch");

    // Add a change event listener to the checkbox
    checkbox.change(function() {
      let ctpValue1 = <?php echo $ctp; ?>;
      // Check if the checkbox is checked
      if (checkbox.is(":checked")) {
        // Checkbox is checked, make an Ajax request
        $.ajax({
          type: "POST", // You can also use GET if needed
          url: "<?php echo BASE_URL; ?>includes/Pages/addGradeFilter.php",
          data: {
            // You can send data to your PHP script if needed
            statusCtp: ctpValue1
          },
          success: function(response) {
            window.location.reload();
          }
        });
      } else {
        // Checkbox is unchecked, you can handle this case similarly
        $.ajax({
          type: "POST", // You can also use GET if needed
          url: "<?php echo BASE_URL; ?>includes/Pages/addGradeFilter.php",
          data: {
            // You can send data to your PHP script if needed
            disStatusCtp: ctpValue1
          },
          success: function(response) {
            window.location.reload();
          }
        });
      }
    });
  });

  $("#saveGrade").on("click", function() {
    const gardeVal = $("#gradeValue").val();
    const ctpValue = <?php echo $ctp; ?>;
    $.ajax({
      type: "POST", // You can also use GET if needed
      url: "<?php echo BASE_URL; ?>includes/Pages/addGradeFilter.php",
      data: {
        gardeVal: gardeVal,
        ctpValue: ctpValue
      },
      success: function(response) {
        // Handle the response from the PHP script if needed
        // console.log(response);
        window.location.reload();
      }
    });
  });
</script>
<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>