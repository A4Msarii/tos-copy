<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>CTP List</title>
  <!-- <title>Phase</title> -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

<body>
  
  <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
              <h2 class="text-success">CTP List</h2>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <center>
                <table class="table table-striped table-bordered table-hover" id="ctptable">
                  <input style="margin:5px;" class="form-control" id="ctpsearch" type="text" onkeyup="ctp()" placeholder="Search for Course name.." title="Type in a name">
                  <thead class="bg-dark">
                    <th class="text-white">Sr No</th>
                    <th class="text-white">Course Name</th>
                    <!-- <th class="text-white">Manual</th> -->
                    <th class="text-white">Type</th>
                    <th class="text-white">Equipment Type</th>
                    <th class="text-white">Symbol</th>
                    <th class="text-white">Sponsors</th>
                    <th class="text-white">Location</th>
                    <th class="text-white">CourseAim</th>
                    <th class="text-white">ClassSize</th>
                    <th class="text-white">Description</th>
                    <th class="text-white">Class Duration</th>
                    <th class="text-white">Division Type</th>
                    <th class="text-white">Vehicle Type</th>
                    <th class="text-white">Action</th>
                  </thead>
                  <?php
                  $query3 = "SELECT * FROM ctppage ORDER BY CTPid ASC";
                  $statement2 = $connect->prepare($query3);
                  $statement2->execute();
                  if ($statement2->rowCount() > 0) {
                    $result2 = $statement2->fetchAll();
                    $sn2 = 1;
                    foreach ($result2 as $row8) {
                      $ctpId = $row8['CTPid'];
                      $vehtype1 = $row8['VehicleType'];
                      $diviId = $row8['divisionType'];
                      $vehitype1 = $connect->prepare("SELECT vehicletype FROM vehicletype WHERE vehid=?");
                      $vehitype1->execute([$vehtype1]);
                      $vehicletype1 = $vehitype1->fetchColumn();
                      $divitype1 = $connect->prepare("SELECT divisionName FROM division WHERE id=?");
                      $divitype1->execute([$diviId]);
                      $divisiontype1 = $divitype1->fetchColumn();
                  ?>
                      <tr>
                        <td><?php echo $sn2++; ?></td>

                        <td><?php echo $row8['course']; ?></td>
                        <!-- <td><?php echo $row8['manual']; ?></td> -->
                        <td><?php echo $row8['Type']; ?></td>
                        <td><?php echo $vehicletype1; ?></td>
                        <td><?php echo $row8['symbol']; ?></td>
                        <td><?php echo $row8['Sponcors']; ?></td>
                        <td><?php echo $row8['Location']; ?></td>
                        <td><?php echo $row8['CourseAim']; ?></td>
                        <td><?php echo $row8['ClassSize']; ?></td>
                        <td><?php echo $row8['description']; ?></td>
                        <td><?php echo $row8['duration']; ?></td>
                        <td><?php echo $divisiontype1; ?></td>
                        <td>
                          <?php
                          if ($row8['vehicleName'] == "") {
                            echo "-";
                          } else {
                            echo $row8['vehicleName'];
                          }
                          ?>
                        </td>
                        <td>
                          <a id="<?php echo $row8['CTPid'] ?>" class="btn btn-soft-success btn-xs fetch_ctp_id_val" data-bs-toggle="modal" data-bs-target="#editctp" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit CTP"><i class="bi bi-pen-fill"></i></a>
                          <a class="btn btn-soft-danger btn-xs" onclick="document.getElementById('ctp_id_to_del').value='<?php echo $row8['CTPid'] ?>';" data-bs-toggle="modal" data-bs-target="#first_confrim_ctp" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete CTP"><i class="bi bi-trash-fill"></i></a>
                          <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('c_id').value='<?php echo $row8['CTPid']; ?>';" data-bs-toggle="modal" data-bs-target="#colorModal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Color"><i class="bi bi-palette"></i>
                          </a>
                          <a id="<?php echo $row8['CTPid'] ?>" class="btn btn-soft-secondary btn-xs fetchGoal" data-bs-toggle="modal" data-bs-target="#editGoal"><img src="<?php echo BASE_URL; ?>assets/svg/file/goal.png" style="height: 15px;width: 12px;">
                          </a>
                          <?php
                          $checkShop = $connect->query("SELECT count(*) FROM shops WHERE ctpId = '$ctpId'");
                          if ($checkShop->fetchColumn() <= 0) {
                          ?>
                             <a class="btn btn-soft-primary btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/addCtpShop.php?ctpId=<?php echo $row8['CTPid']; ?>&shopName=<?php echo $row8['course']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create Shop"><i class="bi bi-shop"></i>
                            </a>
                          <?php } ?>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </table>
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

  <!-- add color modal modal -->
  <div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Add Color</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form action="<?php echo BASE_URL; ?>includes/Pages/insert_color.php">
              <input class="form-control" type="" name="CTPid" value="" id="c_id">
              <label for="color" style="font-size:large; font-weight:bold;">Select a color for CTP:</label><br>
              <input type="color" id="color" name="favcolor" required><br>
              <hr>
              <input type="submit" class="btn btn-success" style="float:right;" name="ctp_color">
            </form>

          </center>
        </div>
      </div>
    </div>
  </div>


  <!--Edit Ctp modal-->
  <div class="modal fade" id="editctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit CTP</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="edit_ctp.php">
            <div id="editctpform"></div>

          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editGoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Goal</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="edit_ctp.php">
            <table>
              <tbody id="goalTable">

              </tbody>
            </table>
            <table class="table" id="table-field1">
              <tbody>
                <tr>
                  <td style="text-align: center;"><input type="text" placeholder="Enter Goals" name="editGoals[]" id="editGoals" class="form-control form-control-md" value="" /> </td>
                  <td style="width:20px;"><button type="button" name="add_goal" id="addGoal" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </tbody>
            </table>
            <input type="submit" value="Edit" class="btn btn-success" name="editGoalBtn" />
          </form>

        </div>
      </div>
    </div>
  </div>

  <!--confiramation modal box to delete ctp-->
  <div class="modal fade" id="third_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header btn-danger text-center" style="height: 110px;">
          <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Please Enter Admin Password To Delete This CTP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
        </div>
        <div class="modal-body">
          <form action="ctp_delete.php" method="post">
            <input type="hidden" id="ctp_id_to_del" name="CTPid" value="">
            <label class="text-dark" style="font-weight:bolder;">Admin Password:</label>
            <input type="Password" name="delete" class="form-control">
            <hr>
            <button type="submit" class="btn btn-outline-danger" style="float:right;">Delete</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="first_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header btn-danger text-center" style="height: 110px;">
          <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Are you sure to delete ctp?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
        </div>
        <div class="modal-body text-center">
          <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#second_confrim_ctp">are you sure to delete ctp?</button> -->
          <i class="bi bi-trash text-danger" style="font-size: xxx-large;
    font-weight: bolder;"></i>
        </div>


        <div class="modal-footer flex-center">
          <a href="" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#second_confrim_ctp">Yes</a>
          <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
        </div>

      </div>
    </div>
  </div>
  <div class="modal fade" id="second_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">


        <div class="modal-header btn-danger text-center" style="height: 110px;">
          <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Are You Really Sure to Delete This CTP?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
        </div>


        <div class="modal-body">
          <h1>List Of Data Which Will Get Deleted</h1>
          <ul>
            <li>Phase</li>
            <li>Class</li>
            <li>Item And Subitem</li>
            <li>Course</li>
            <li>Emergancy</li>
            <li>Test</li>

          </ul>
          <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#third_confrim_ctp">are you really sure to delete ctp??</button> -->
        </div>

        <div class="modal-footer flex-center">
          <a href="" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#third_confrim_ctp">Yes</a>
          <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    $("#ctptable").on("click", ".fetch_ctp_id_val", function() {

      var ctid = $(this).attr('id');
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL;?>includes/Pages/fetch_ctp_edit_value.php',
        data: 'ctid=' + ctid,
        success: function(response) {

          $('#editctpform').empty();
          $('#editctpform').html(response);
        }
      });

    });
  </script>

  <script type="text/javascript">
    $(".fetchGoal").on("click", function() {

      var ctpId = $(this).attr('id');
      $.ajax({
        type: 'POST',
        url: 'fetch_ctp_edit_value.php',
        data: 'ctpId=' + ctpId,
        success: function(response1) {

          // alert(response1);

          $('#goalTable').empty();
          $('#goalTable').html(response1);
        }
      });

    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Goals" name="editGoals[]" id="goalval" class="form-control form-control-md" value="" required/> </td>\
                          <td><button type="button" name="remove_goal" id="remove_goal1" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
      var max = 100;
      var a = 1;

      $("#addGoal").click(function() {
        if (a <= max) {
          $("#table-field1").append(html);
          a++;
        }
      });
      $("#table-field1").on('click', '#remove_goal1', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>

  <!--search bar for ctp list table-->
  <script>
    function ctp() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("ctpsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("ctptable");
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

<script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
</body>

</html>