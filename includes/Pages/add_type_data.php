<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Distribution</title>
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
    $output = "";
    $type_id = "Select type";
    $ctp = "Select Ctp";
    if (isset($_GET['ctp'])) {
      $_SESSION['cat_ctp'] = $ctp = $_GET['ctp'];
      $ctp_id_data = "SELECT * FROM ctppage where CTPid='$ctp'";
      $statement = $connect->prepare($ctp_id_data);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $ctp_name = $row['course'];
        }
      }
    } else if (isset($_SESSION['cat_ctp'])) {
      $ctp = $_SESSION['cat_ctp'];
      $ctp_id_data = "SELECT * FROM ctppage where CTPid='$ctp'";
      $statement = $connect->prepare($ctp_id_data);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $ctp_name = $row['course'];
        }
      }
    }
    if (isset($_GET['type_id'])) {
      $_SESSION['type_id_page'] = $type_id = $_GET['type_id'];
      $type_id_data = "SELECT * FROM type_data where id='$type_id'";
      $statement = $connect->prepare($type_id_data);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $type_name = $row['type_name'];
          $type_mark = $row['marks'];
        }
      }
    } else if (isset($_SESSION['type_id_page'])) {
      $type_id = $_SESSION['type_id_page'];
      $type_id_data = "SELECT * FROM type_data where id='$type_id'";
      $statement = $connect->prepare($type_id_data);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $type_name = $row['type_name'];
          $type_mark = $row['marks'];
        }
      }
    }

    $all_value_table = "";
    $type_data = "SELECT * FROM type_category_data where type='$type_id'";
    $statement = $connect->prepare($type_data);
    $statement->execute();

    if ($statement->rowCount() > 0) {
      $result = $statement->fetchAll();
      $sn = 1;
      foreach ($result as $row) {
        $fetch_id_value = $row['category_value'];
        $table = $row['category'];
        $only_for_phase = $row['category_phase'];
        $name = "-";
        $table_value_fetch = "-";
        if ($table == "phase") {

          if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "all") {
            $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
            $cat_name_value->execute([$fetch_id_value]);
            $name = $cat_name_value->fetchColumn();
            $table_value_fetch = "all";
          } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "all") {
            $name = "all";
            $table_value_fetch = "Actual + sim";
          } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "actual") {
            $name = "all";
            $table_value_fetch = "actual";
          } else if ($fetch_id_value == "all" && $fetch_id_value != "0" && $only_for_phase == "sim") {
            $name = "all";
            $table_value_fetch = "sim";
          } else if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "actual") {
            $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
            $cat_name_value->execute([$fetch_id_value]);
            $name = $cat_name_value->fetchColumn();
            $table_value_fetch = "actual";
          } else if ($fetch_id_value != "all" && $fetch_id_value != "0" && $only_for_phase == "sim") {
            $cat_name_value = $connect->prepare("SELECT phasename FROM $table WHERE id=?");
            $cat_name_value->execute([$fetch_id_value]);
            $name = $cat_name_value->fetchColumn();
            $table_value_fetch = "sim";
          }
        } else if ($table == "actual") {
          if ($fetch_id_value != "all" && $fetch_id_value != "0") {
            $cat_name_value = $connect->prepare("SELECT symbol FROM $table WHERE id=?");
            $cat_name_value->execute([$fetch_id_value]);
            $name = $cat_name_value->fetchColumn();
          } else if ($fetch_id_value == "all") {
            $name = "all";
          }
        } else if ($table == "sim") {
          if ($fetch_id_value != "all" && $fetch_id_value != "0") {
            $cat_name_value = $connect->prepare("SELECT shortsim FROM $table WHERE id=?");
            $cat_name_value->execute([$fetch_id_value]);
            $name = $cat_name_value->fetchColumn();
          } else if ($fetch_id_value == "all") {
            $name = "all";
          }
        } else if ($table == "test") {
          if ($fetch_id_value != "all" && $fetch_id_value != "0") {
            $cat_name_value = $connect->prepare("SELECT shorttest FROM $table WHERE id=?");
            $cat_name_value->execute([$fetch_id_value]);
            $name = $cat_name_value->fetchColumn();
          } else if ($fetch_id_value == "all") {
            $name = "all";
          }
        }
        $id = $row['id'];
        $check = $row['percent'] + 0;
        $all_value_table .= '
                <tr>
               <td>' . $sn++ . '</td>
               <td>' . $row['category'] . '</td>
               <td>' . $table_value_fetch . '</td>
               <td>' . $name . '</td> 
               <td>' . $check . '%</td> 
               <td style="text-align:center;">
               
                   <a class="btn btn-soft-danger btn-xs" href="category_delete.php?id=' . $id . '" style="text-align:center;"><i class="bi bi-trash-fill" style="font-size:15px;"></i></a>
               </td>
                </tr>
                ';
      }
    }

    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;display: flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Type" style="color:black; text-decoration:none;" href="addtype.php"><i class="bi bi-arrow-left"></i></a>
          <h2 class="text-success">Add Category</h2>
          
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
            <div class="card-header card-header-content-between">

              <h3 class="text-success">CTP : <span class="text-dark" style="font-weight:bold;"><?php echo $ctp_name ?></span></h3>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <center>
                <div class="col-10">
               
                  <form method="get" action="distribution_insert_data.php">
                    <input type="hidden" id="sumvalue" name="sumofmarks">
                    <div class="input-field">
                      <?php if (isset($_GET['ctp']) || isset($_SESSION['cat_ctp'])) { ?>
                        <input type="hidden" id="ctp_value" name="ctp_id" value="<?php echo $ctp ?>">
                      <?php } ?>
                      <?php if (isset($_GET['type_id']) || isset($_SESSION['type_id_page'])) { ?>
                        <input type="hidden" id="type_value" name="type" value="<?php echo $type_id ?>">
                      <?php } ?>
                      <table style="width:100%;">
                        <center>
                          <tr>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Type</label>
                              <input style="background-color: #bfcfe09e;" type="text" class="form-control" placeholder="Enter Type here.." readonly value="<?php echo $type_name ?>">
                            </td>
                            <td>
                              <label class="form-label text-dark" style="font-weight:bold;">Enter marks</label>
                              <input style="background-color: #bfcfe09e;" type="Number" maxlength="3" value="<?php echo $type_mark ?>" readonly class="form-control check_marks" placeholder="Enter marks here..">
                            </td>
                          </tr>
                        </center>
                      </table>
                      <!-- <label class="form-label" style="color:black; font-weight:bold;">Type</label>
                    <input type="text" class="form-control" placeholder="Enter Type here.." readonly value="<?php echo $type_name ?>">
                    <label class="form-label" style="color:black; font-weight:bold;">Enter marks</label>
                    <input style="background-color:#cec9c996;" type="Number" maxlength="3" value="<?php echo $type_mark ?>" readonly class="form-control check_marks" placeholder="Enter marks here..">  -->
                      <label class="form-label text-dark" style="font-weight:bold;">Categories</label>
                      <table class="table table-bordered table-striped table-hover" id="table-field1234">
                        <tr>
                          <td>

                            <select name="cat[]" class="select_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px" required>
                              <option value="" disabled selected>-select value-</option>
                              <option value="phase">Phases</option>
                              <option value="test">Test</option>
                              <option value="actual">Actual</option>
                              <option value="sim">Sim</option>

                              <option value="quiz">Quiz</option>
                              <option value="discipline">Discipline</option>
                              <option value="self">Self</option>
                            </select>
                          </td>
                          <td>
                            <div id="showdropphaseselect_Cat" style="display:none">
                              <select name="phase_selested[]" required class="fetched_phase_dataselect_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">
                                <option selected value="0">-select Type-</option>
                                <option value="all">Actual + sim</option>
                                <option value="actual">Only actual</option>
                                <option value="sim">Only sim</option>
                              </select>
                            </div>
                          </td>

                          <td>
                            <div id="showdropselect_Cat">
                              <select name="cat_data[]" required class="fetched_cat_dataselect_Cat" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">
                                <option selected value="0">-select category-</option>
                              </select>
                            </div>
                          </td>
                          <td>
                            <div id="showtextselect_Cat">
                              <input required list="browsers" required class="per_calu mark_dist" name="values[]" placeholder="Enter Percentage here.." style="border: 1px solid LightGray;border-radius:4px;padding:10px;"><span> %</span>
                              <!-- <input list="browsers" name="browser" id="browser"> -->
                              <datalist id="browsers">
                                <option value="10">
                                <option value="20">
                                <option value="30">
                                <option value="40">
                                <option value="50">
                                <option value="60">
                                <option value="70">
                                <option value="80">
                                <option value="90">
                                <option value="100">
                              </datalist>
                            </div>
                          </td>
                          <td><button type="button" name="add_phase" id="add_phase11" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                        </tr>
                      </table>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" id="submit_cat" name="submit_sim">
                  </form>
                  <br>
                  <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-dark">
                      <th class="text-white">Id</th>
                      <th class="text-white">Category</th>
                      <th class="text-white">Type(only for phase)</th>
                      <th class="text-white">Category data</th>
                      <th class="text-white">Percentage</th>
                      <th class="text-white">Action</th>
                    </thead>
                    <?php
                    echo $all_value_table;
                    ?>
                  </table>
                </div>
              </center>
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
      $(document).on('change', '.mark_dist', function() {
        // code logic here
        var calculated_total_sum = 0;
        var outof_marks = 100;
        $(".mark_dist").each(function() {
          var getValue = $(this).val();
          if ($.isNumeric(getValue)) {
            calculated_total_sum += parseFloat(getValue);
            $("#sumvalue").val(calculated_total_sum);
            if (calculated_total_sum > outof_marks) {
              alert("please percentage marks between 100");
              $("#submit_cat").attr("disabled", true);
            } else if (calculated_total_sum <= outof_marks) {
              $("#submit_cat").removeAttr("disabled");
            }
          }
        });


      });

    });
  </script>
  <?php
  $marks_sum = "SELECT SUM(`percent`) FROM type_category_data where type='$type_id'";
  $statement = $connect->prepare($marks_sum);
  $statement->execute();
  $total = $statement->fetch(PDO::FETCH_NUM);
  $mark_sum = $total[0];
  if ($mark_sum >= 100) {
  ?>
    <script type="text/javascript">
      $(document).ready(function() {


      });
    </script>
  <?php } ?>
  <script type="text/javascript">
    $(document).ready(function() {

      var max = 8;
      var a = 1;

      $("#add_phase11").click(function() {
        if (a <= max) {
          var html = '<tr>\
							<td>\
                            <select name="cat[]" class="select_Cat' + a + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px" required>\
                            <option value="" disabled selected>-select value-</option>\
                            <option value="phase">Phases</option>\
                            <option value="test">Test</option>\
                            <option value="actual">Actual</option>\
                            <option value="sim">Sim</option>\
                            <option value="quiz">Quiz</option>\
                            <option value="discipline">Discipline</option>\
                            <option value="self">Self</option>\
                            </select>\
                            </td>\
                            <td >\
                            <div id="showdropphaseselect_Cat' + a + '" style="display:none">\
                            <select name="phase_selested[]" required class="fetched_phase_dataselect_Cat' + a + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">\
                            <option selected value="0">-select Type-</option>\
                            <option value="all">Actual + sim</option>\
                            <option value="actual">Only actual</option>\
                            <option value="sim">Only sim</option>\
                            </select></div>\
                            </td>\
                            <td>\
                            <div id="showdropselect_Cat' + a + '">\
                            <select name="cat_data[]" required class="fetched_cat_dataselect_Cat' + a + '" style="border: 1px solid LightGray;border-radius:4px;padding:10px;">\
                            <option selected value="0">-select category-</option>\
                            </select></div>\
                            </td>\
                            <td><div id="showtextselect_Cat' + a + '">\
                            <input required list="browsers" required class="per_calu' + a + ' mark_dist" name="values[]" placeholder="Enter Percentage here.." style="border: 1px solid LightGray;border-radius:4px;padding:10px"><span> %</span>\
                            <datalist id="browsers">\
                                <option value="10">\
                                <option value="20">\
                                <option value="30">\
                                <option value="40">\
                                <option value="50">\
                                <option value="60">\
                                <option value="70">\
                                <option value="80">\
                                <option value="90">\
                                <option value="100">\
                              </datalist>\
                            </div></td>\
							<td><button type="button" name="remove_actual" id="remove_phase11' + a + '" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
						</tr>';
          $("#table-field1234").append(html);
          a++;

          $("#table-field1234").on('click', '#remove_phase11' + a, function() {
            $(this).closest('tr').remove();
            a--;
          });
        }
      });

    });
  </script>
  <script>
    $(document).ready(function() {



      $("#table-field1234").on("change", "select", function() {
        var Class1;
        var Class1 = this.className;
        var cat_Sel = $(this).val();
        var dis_Ctp1 = $("#ctp_value").val();

        // alert(dis_Ctp1);
        if (cat_Sel == "actual" || cat_Sel == "sim" || cat_Sel == "test") {
          $("#showdrop" + Class1).show();
          $("#showtext" + Class1).show();
          $("#showdropphase" + Class1).hide();
          //   alert(Class1);
          $('.ctp_val' + Class1).val(dis_Ctp1);
          // $("#showphase"+Class1).show();
          $.ajax({
            type: 'POST',
            url: 'selec_ctp_dis.php',
            data: 'cat=' + cat_Sel + '&ctp=' + dis_Ctp1,
            success: function(response) {
              $('.fetched_cat_data' + Class1).empty();
              $('.fetched_cat_data' + Class1).append(response);
            }
          });
        } else if (cat_Sel == "quiz" || cat_Sel == "discipline" || cat_Sel == "self" || cat_Sel == "academic") {
          $("#showtext" + Class1).show();
          $("#showdrop" + Class1).hide();
          $("#showdropphase" + Class1).hide();
          //    $("#showdrop"+Class1).append("<option value="" disabled>-no option-</option>");
        } else if (cat_Sel == "phase") {
          $("#showdrop" + Class1).show();
          $("#showtext" + Class1).show();
          $("#showdropphase" + Class1).show();

          $.ajax({
            type: 'POST',
            url: 'selec_phase.php',
            data: 'ctp=' + dis_Ctp1,
            success: function(response) {
              allphase = [];
              allphase = response;
              console.log(allphase);
              $('.fetched_cat_data' + Class1).empty();
              $('.fetched_cat_data' + Class1).append(response);
            }
          });
          $('.fetched_cat_data' + Class1).on('change', function() {
            var phase_val = $(this).val();
            if (phase_val != "all") {

              $("#showphase" + Class1).show();
              $.ajax({
                type: 'POST',
                url: 'selec_phase_val.php',
                data: 'phase=' + phase_val,
                success: function(response) {
                  $('.fetched_phase_Class' + Class1).empty();
                  $('.fetched_phase_Class' + Class1).append(response);
                }
              });
            }

          });
        }

      });
    });
  </script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>