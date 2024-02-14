<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Warning Category</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>


<body>

 <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

  <div class="modal fade" id="showCapData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Indivisual Method Data</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="shid" name="shop">
          <table class="table table-bordered table-striped table-hover src-table1" id="itemtablesearch">
            <input style="margin:5px;" class="form-control" type="text" id="listsearch" onkeyup="listindivitual()" placeholder="Search for Category.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-light">Id</th>
              <th class="text-light">Category</th>
              <th class="text-light">Type(only for phase)</th>
              <th class="text-light">Category data</th>
              <th class="text-light">Action</th>
            </thead>
            <tbody id="capData">

            </tbody>
          </table>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div id="header-hide">
    <?php

    include ROOT_PATH . 'includes/head_navbar.php';
    $output = "";
    $type_id = "Select type";
    $ctp = "Select Ctp";
    if (isset($_GET['ctp'])) {
      $_SESSION['cap_ctp'] = $ctp = urldecode(base64_decode($_GET['ctp']));
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
    } else if (isset($_SESSION['cap_ctp'])) {
      $ctp = $_SESSION['cap_ctp'];
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
    if (isset($_GET['warning_id'])) {
      $_SESSION['warning_id_page'] = $warning_id = urldecode(base64_decode($_GET['warning_id']));
      $warning_id_data = "SELECT * FROM warning_data where id='$warning_id'";
      $statement = $connect->prepare($warning_id_data);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $warning_name = $row['warning_name'];
          // $type_mark=$row['marks'];
        }
      }
    } else if (isset($_SESSION['warning_id_page'])) {
      $warning_id = $_SESSION['warning_id_page'];
      $warning_id_data = "SELECT * FROM warning_data where id='$warning_id'";
      $statement = $connect->prepare($warning_id_data);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $warning_name = $row['warning_name'];
          // $type_mark=$row['marks'];
        }
      }
    }





    ?>
    <script>
      $(document).on("click", ".edit_cat_war", function() {
        var id = $(this).attr('id');
        $("#get_cat_id").val(id);
        if (id) {
          $.ajax({
            type: 'POST',
            url: 'fetch_cat_detail.php',
            data: 'id=' + id,
            success: function(response) {
              $('#get_creted_form').empty();
              $("#get_creted_form").append(response);
            }
          });
        }
      });
    </script>
  </div>

  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">

              <h3 class="text-success">CTP : <span style="color:black; font-weight:bold;"><?php echo $ctp_name ?></span></h3>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <center>
                <div class="col-10">
                  
                  <?php if (isset($_GET['ctp']) || isset($_SESSION['cap_ctp'])) { ?>
                    <input type="hidden" id="ctp_value" name="ctp_id" value="<?php echo $ctp ?>">
                  <?php } ?>


                  <table style="width:100%;">
                    <center>
                      <tr>
                        <td>
                          <label class="form-label" style="color:black; font-weight:bold;">Type</label>
                          <input style="background-color: #bfcfe09e;" type="text" class="form-control" placeholder="Enter Type here.." readonly value="<?php echo $warning_name; ?>">
                        </td>


                      </tr>
                    </center>
                  </table>

                  <br>
                  <select class="form-select" name="group_id" id="cat_dropdown" style="width:50%;margin-bottom:25px;">
                    <option selected disabled>Select Method</option>
                    <option value="individual">Individual Method</option>
                    <option value="multiple">Multiple Method</option>
                  </select>
                  <?php
                  $d_value = "";
                  if (isset($_COOKIE['dropdown_val'])) {
                    $d_value = $_COOKIE['dropdown_val'];
                    if ($d_value == "individual") {
                      include "individual.php";
                    } elseif ($d_value == "multiple") {
                      include "multiples.php";
                    }
                  }
 
                  ?>
                  <br>

                  <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-dark">
                      <th class="text-light">Id</th>
                      <th class="text-light">Category</th>
                      <th class="text-light">Type(only for phase)</th>
                      <th class="text-light">Category data</th>
                      <th class="text-light">Grades / Marks</th>
                      <th class="text-light">Count</th>
                      <th class="text-light">Threshold / range</th>
                      <th class="text-light">Action</th>
                    </thead>
                    <?php
                    if (isset($all_value_table)) {
                      echo $all_value_table;
                    }
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

  <div class="modal fade" id="editcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Phase</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="edit_war_cat.php" method="post">
            <input type="hidden" name="cat_id" id="get_cat_id">
            <div id="get_creted_form"></div>
            <br>
            <button type="submit" class="btn btn-success">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script>
    $(document).on("change", "#cat_dropdown", function() {
      var val = $(this).val();
      document.cookie = "dropdown_val = " + val;
      window.location.reload();
    });
  </script>
  <script>
    $(".getGropuId").on("click", function() {
      var groupId = $(this).attr("value");
      $.ajax({
        type: 'POST',
        url: "fetchCtpData.php",
        data: {
          groupId: groupId,
        },
        dataType: "html",

        success: function(resultData) {
          $("#capData").empty();
          $("#capData").html(resultData);
          // console.log(resultData);
        }
      });
    });
  </script>

  <script>
    function listindivitual() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("listsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("itemtablesearch");
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