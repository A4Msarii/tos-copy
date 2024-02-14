<!--Insert Phases-->
<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$total_value = "0";
$ctp = "Select Ctp";
$error = '';
$type_table = '';

?>

<!DOCTYPE html>
<html>

<head>
  <title>Warning</title>
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
  <!--Input Phases-->
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <!-- <div class="page-header page-header-light">
          <h2 class="text-success">Mark distribution page</h2>
        </div> -->
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
            <!-- Header -->
            <div class="card-header card-header-content-center">

              <h3 class="text-success">CTP : <span class="text-dark" style="font-weight:bold;"><?php echo $ctp_name ?></span></h3>


            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <center>
                <form class="insert-phases" id="integrity" method="post" action="insert_warning.php" style="width:700px;">
                  <div class="input-field">
                    <table class="table table-bordered type-insert-table" id="table-field-warn">
                      <tr>
                        <?php if (isset($fixed_ctp_id) || isset($_SESSION['type_ctp'])) { ?>
                          <input type="hidden" name="ctp" value="<?php echo $ctp ?>">
                        <?php } ?>
                        <td style="text-align: center;"><input type="text" placeholder="Enter Type" name="warning[]" class="form-control" required /> </td>
                        <td style="width:20px;"><button type="button" name="add_warning" id="add_warning" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                      </tr>
                    </table>
                  </div>
                  <center>
                    <button style="margin:5px;" class="btn btn-success" type="submit" name="Insert_warning">Submit</button>
                  </center>
                </form>
              </center>

              <br>
              <table class="table table-striped table-bordered table-hover mark-table">
                <thead class="bg-dark">
                  <th class="text-white">Id</th>
                  <th class="text-white">Type</th>
                  <th class="text-white">DOC</th>
                  <th class="text-white">File</th>
                  <th class="text-white">view</th>
                  <th class="text-white">Operations</th>
                </thead>
                <?php
                $query_w = "SELECT * FROM warning_data where ctp='$ctp' ORDER BY id ASC;";
                $statement_w = $connect->prepare($query_w);
                $statement_w->execute();

                if ($statement_w->rowCount() > 0) {
                  $result_w = $statement_w->fetchAll();
                  $sn = 1;
                  foreach ($result_w as $row) {
                    if($row['bgColor'] == ""){
                      $bgColor = "gray";
                    }else{
                      $bgColor = $row['bgColor'];
                    }

                ?>
                    <tr>
                      <td><?php echo $sn++ ?></td>
                      <td style="width:15%;"><a style="color:<?php echo $bgColor; ?>;text-decoration:underline;" href="add_warning_data.php?warning_id=<?php echo urlencode(base64_encode($row['id'])) ?>&ctp=<?php echo urlencode(base64_encode($ctp)) ?>"><?php echo $row["warning_name"] ?></a></td>
                      <td>
                        <form method="post" action="upload_warning_file.php" enctype="multipart/form-data">

                          <ul style="display:flex;" id="filenone">
                            <li style="list-style-type: none;" id="linone">
                              <input class="form-control" type="file" name="doc" accept="application/pdf" />
                            </li>
                            <li style="list-style-type:none;">
                              <button style="margin-left:5px;" class="btn btn-success" type="submit" name="upload">upload</button>
                              <input style="visibility:hidden;" type="text" id="id" name="id" value='<?php echo $id = $row['id'] ?>'>
                            </li>
                          </ul>


                        </form>
                      </td>
                      <td><?php echo $row['file_name'] ?></td>
                      <!-- <a href="warning_files/<?php echo $row['file_name']; ?>" target="_blank">View</a> -->
                      <td>
                        <?php if ($row['file_name'] != "") { ?>
                          <a href="uploads/<?php echo $row['file_name']; ?>" target="_blank">View</a>
                        <?php } else {
                          echo "-";
                        } ?>
                      </td>
                      <td><a class="btn btn-soft-success btn-xs" href="edit_warning.php?id=<?php echo urlencode(base64_encode($row["id"])); ?>"><i class="bi bi-pen-fill"></i></a>
                        <a class="btn btn-soft-danger btn-xs" href="delete_warning.php?id=<?php echo $row["id"]; ?>"><i class="bi bi-trash-fill"></i></a>
                        <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('cap_id').value='<?php echo $row['id'] ?>';" data-bs-toggle="modal" data-bs-target="#color_phase" data-bs-title="Add Color"><i class="bi bi-palette"></i>

                        </a>
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

  <!-- add color modal modal -->
  <div class="modal fade" id="color_phase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Add Color</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form action="<?php echo BASE_URL; ?>includes/Pages/insert_color.php">
              <input class="form-control" type="hidden" name="capId" value="" id="cap_id">
              <label for="color" style="font-size:large; font-weight:bold;">Select a color for CAP:</label><br>
              <input type="color" id="color" name="favcolor" required><br>
              <hr>
              <input type="submit" class="btn btn-success" style="float:right;" name="cap_color">
            </form>

          </center>
        </div>
      </div>
    </div>
  </div>



  <script>
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
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      var html = '<tr>\
	                        <td style="text-align: center;"><input type="text" placeholder="Enter Type" name="warning[] " class="form-control" value="" required /> </td>\
	                        <td><button type="button" name="remove_actual" id="remove_warning" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
      var max = 100;
      var a = 1;

      $("#add_warning").click(function() {
        if (a <= max) {
          $("#table-field-warn").append(html);
          a++;
        }
      });
      $("#table-field-warn").on('click', '#remove_warning', function() {
        $(this).closest('tr').remove();
        a--;
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