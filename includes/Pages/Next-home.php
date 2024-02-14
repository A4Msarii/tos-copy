<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Phase</title>
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
    $course = "";
    $ctp = "";
    ?></div>
  <!--Input Phases-->
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Phases</h1>
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
            <!-- Header -->
            <div class="card-header card-header-content-center">

              <?php
              $course_du = "";
              if (isset($fixed_ctp_id)) {
                $_SESSION['ctp_value'] = $ctp = $fixed_ctp_id;
                $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
                $statement = $connect->prepare($ctp_id);
                $statement->execute();
                if ($statement->rowCount() > 0) {
                  $result = $statement->fetchAll();
                  $sn = 1;
                  foreach ($result as $row) {
                    $course = $row['course'];
                    $course_du = $row['duration'];
                  }
                }
              } else if (isset($_SESSION['ctp_value'])) {
                $ctp = $_SESSION['ctp_value'];
                $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
                $statement = $connect->prepare($ctp_id);
                $statement->execute();

                if ($statement->rowCount() > 0) {
                  $result = $statement->fetchAll();
                  $sn = 1;
                  foreach ($result as $row) {
                    $course = $row['course'];
                    $course_du = $row['duration'];
                  }
                }
              }
              if (isset($_SESSION['ctp_value'])) { ?>
                <h3>Selected CTP: <span style="color:blue;"><?php echo $course ?></span></h3>
                <span>Duration:<?php echo $course_du; ?></span>
              <?php } else { ?>
                <h3>Selected CTP: <span style="color:red;">Select ctp</span></h3>
              <?php }

              ?>

            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">

              <center>
                <form class="insert-phases" id="phase_form" method="post" action="<?php echo BASE_URL;?>includes/Pages/insert_phase.php" style="width:700px;">
                  <div class="input-field">
                    <table class="table table-bordered" id="table-field-phase">
                      <tr>
                        <?php if ($_SESSION['ctp_value']) { ?>
                          <input type="hidden" name="ctp" value="<?php echo $ctp ?>">
                        <?php } ?>
                        <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter Phase" name="phase[]" id="phaseval" class="form-control" value="" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>
                        <td style="width:20px;"><button type="button" name="add_phase" id="adding_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                      </tr>
                    </table>
                  </div>
                  <center>
                    <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>
                  </center>
                </form>
              </center>

              <!--Phase Table-->



              <table class="table table-striped table-bordered table-hover" id="phasetable">
                <input style="margin:5px;" class="form-control" type="text" id="phasesearch" onkeyup="phase()" placeholder="Search for Phases.." title="Type in a name">
                <thead class="bg-dark">
                  <th class="text-white">Sr No</th>
                  <th class="text-white">Phase</th>
                  <th class="text-white">Objective</th>
                  <th class="text-white">Duration</th>
                  <th class="text-white" colspan="2">Action</th>
                </thead>
                <?php

                $output1 = "";
                $query1 = "SELECT * FROM phase where ctp='$ctp'";
                $statement1 = $connect->prepare($query1);
                $statement1->execute();
                if ($statement1->rowCount() > 0) {
                  $result1 = $statement1->fetchAll();
                  $sn1 = 1;
                  foreach ($result1 as $row1) {
                    $id = $row1["id"];
                ?>
                    <tr>

                      <td><?php echo $sn1++; ?></td>
                      <td><a style="color:black; text-decoration:underline; color:<?php echo $row1['color']; ?>" href="phase-view.php?phase_id=<?php echo urlencode(base64_encode($row1['id'])) ?>&phase=<?php echo urlencode(base64_encode($row1['phasename'])) ?>&ctp=<?php echo urlencode(base64_encode($ctp)) ?>"><?php echo $row1['phasename']; ?></a></td>
                      <td><?php echo $row1['objective']; ?></td>
                      <td><?php echo $row1['phaseDuration']; ?></td>
                      <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('phid').value='<?php echo $row1['id'] ?>';
                                        document.getElementById('phase_name').value='<?php echo $row1['phasename']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editphase" title="Edit Phase"><i class="bi bi-pen-fill"></i></a>


                        <a class="btn btn-soft-danger btn-xs" title="Delete Phase" href="<?php echo BASE_URL;?>includes/Pages/phase-delete.php?id=<?php echo $id ?>&ctp=<?php echo $ctp ?>"><i class="bi bi-trash-fill"></i></a>
                        <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('pid').value='<?php echo $row1['id'] ?>';
                                        document.getElementById('p_name').value='<?php echo $row1['phasename']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#objective" title="Add Objective"><i class="bi bi-info-lg"></i></a>

                        <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('pp_id').value='<?php echo $row1['id']; ?>';
                                        document.getElementById('d_name').value='<?php echo $row1['phasename']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#color_phase" title="Add Color"><i class="bi bi-palette"></i>

                        </a>
                        <a class="btn btn-soft-secondary btn-xs" href="" onclick="document.getElementById('d_id').value='<?php echo $row1['id']; ?>';
                                        document.getElementById('dd_name').value='<?php echo $row1['phasename']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#add_duration" title="Add Duration"><i class="bi bi-stopwatch"></i>
                        </a>
                        <?php
                        $checkPhase = $connect->query("SELECT count(*) FROM folders WHERE phaseId = '$id'");
                        if($checkPhase->fetchColumn() <= 0){
                        ?>
                        <a class="btn btn-soft-secondary btn-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" href="<?php echo BASE_URL; ?>includes/Pages/addCtpShop.php?phaseId=<?php echo $id; ?>&phaseName=<?php echo $row1['phasename']; ?>" data-bs-title="Create Folder"><i class="bi bi-folder-fill"></i> 

                        </a>
                        <?php } ?>

                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </table>
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

  <!-- edit phase modal -->
  <div class="modal fade" id="editphase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Phase</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form method="post" action="<?php echo BASE_URL;?>includes/Pages/edit_phase.php">
              <?php if (isset($_SESSION['ctp_value'])) { ?>
                <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
              <?php } ?>
              <input class="form-control" type="hidden" name="id" value="" id="phid">
              <!-- <label class="text-success">Phase Name</label> -->
              <input class="form-control" type="text" name="phase_name" value="" id="phase_name">
              <hr>
              <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>

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
              <input class="form-control" type="hidden" name="id" value="" id="pp_id">
              <label for="color" style="font-size:large; font-weight:bold;">Select a color for Phase:</label><br>
              <input type="color" id="color" name="favcolor" required><br>
              <hr>
              <input type="submit" class="btn btn-success" style="float:right;" name="phase_color">
            </form>

          </center>
        </div>
      </div>
    </div>
  </div>

  <!-- add duration modal modal -->
  <div class="modal fade" id="add_duration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Add Duration</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form action="<?php echo BASE_URL; ?>includes/Pages/insert_phase.php">
              <input class="form-control" type="hidden" name="durationId" value="" id="d_id">
              <input class="form-control" type="hidden" name="ctp_du" value="<?php echo $course_du ?>">
              <input class="form-control" type="hidden" name="ctp_id" value="<?php echo $ctp ?>">
              <input class="form-control" type="number" id="duration" name="duration" required><br>
              <hr>
               <input type="submit" class="btn btn-success" style="float:right;" name="saveDuration" />
            </form>

          </center>
        </div>
      </div>
    </div>
  </div>


  <!-- edit phase modal -->
  <div class="modal fade" id="objective" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Add Objective</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form method="post" action="<?php echo BASE_URL;?>includes/Pages/insert_objective.php">
              <?php if (isset($_SESSION['ctp_value'])) { ?>
                <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
              <?php } ?>
              <input class="form-control" type="hidden" name="id" value="" id="pid">
              <!-- <input class="form-control" type="" name="id" value="" id="p_name"> -->
              <!-- <input class="form-control" type="text" name="objective"> -->
              <textarea class="form-control" type="text" name="objective"></textarea>
              <hr>
              <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>




  <!--Script for add multiple phases-->

  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
	                        <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter Phase" name="phase[]" id="phaseval" class="form-control" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>\
	                        <td><button type="button" name="remove_actual" id="removing_phase" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
      var max = 100;
      var a = 1;

      $("#adding_phase").click(function() {
        if (a <= max) {
          $("#table-field-phase").append(html);
          a++;
        }
      });
      $("#table-field-phase").on('click', '#removing_phase', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>


  <script>
    function phase() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("phasesearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("phasetable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>


  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>