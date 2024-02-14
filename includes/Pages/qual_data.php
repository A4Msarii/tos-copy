<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// $total_value="0";
$ctp = "Select Ctp";
$error = '';
$type_table = '';
$ctp_name = "Select ctp";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Qual Data</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>


<body>
 
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>


  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
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
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Qual Data</h1>
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
          <?php
          $qualQ = $connect->query("SELECT className FROM classfilter WHERE pageName = 'qual'");
          $qualData = $qualQ->fetchColumn();
          ?>
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <div class="card-header card-header-content-between">
              <h3 class="text-success">CTP : <span class="text-dark" style="font-weight:bold;"><?php echo $ctp_name ?></span></h3>
              <div class="col-md-3">
                <select name="" id="classFilter" class="form form-control">
                  <option selected disabled>--Select Class--</option>
                  <?php
                  if($qualData != ''){
                    if($qualData == "both"){
                      $qualData = "Actual+Sim";
                    }
                  ?>
                  <option disabled selected value="<?php echo $qualData; ?>"><?php echo $qualData; ?></option>
                  <?php } ?>
                  <option value="actual">Actual</option>
                  <option value="sim">Sim</option>
                  <option value="both">Actual+Sim</option>
                </select>
              </div>
            </div>

            <!-- Body -->
            <div class="card-body">

              <form action="qual_submit.php" method="post">
                <?php if (isset($fixed_ctp_id) || isset($_SESSION['type_ctp'])) { ?>
                  <input type="hidden" name="ctp_id" value="<?php echo $ctp ?>">
                <?php } ?>
                <table class="table table-bordered src-table1 table-striped" id="qualtable">
                  <input style="margin:5px;" class="form-control" type="text" id="qualsearch" onkeyup="qual()" placeholder="Search for Subitem name.." title="Type in a name">
                  <thead class="bg-dark">
                    <tr>
                      <th class="text-white"><input type="checkbox" id="select-all-item"></th>
                      <th class="text-white">Id</th>
                      <th class="text-white">Item</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $item_sel = "SELECT * FROM itembank";
                    $item_selst = $connect->prepare($item_sel);
                    $item_selst->execute();

                    if ($item_selst->rowCount() > 0) {
                      $students = $item_selst->fetchAll();

                      $sn = 1;
                      foreach ($students as $student) {
                        $check_id = $student['id'];

                    ?>
                        <tr>
                          <td><input type="checkbox" class="get_value" name="itemcheck[]" value="<?php echo $student['id'] ?>" /></td>
                          <td><?php echo $sn++; ?></td>
                          <td>

                            <?php echo $student['item']; ?></td>
                        </tr>
                    <?php

                      }
                    }

                    ?>
                    <tr>
                      <td colspan='3'>Subitems</td>
                    </tr>
                    <?php

                    $subitem_sel_em = "SELECT * FROM sub_item";
                    $subitem_selst_em = $connect->prepare($subitem_sel_em);
                    $subitem_selst_em->execute();

                    if ($subitem_selst_em->rowCount() > 0) {
                      $substudents_em = $subitem_selst_em->fetchAll();

                      // $i1 = 0;
                      // $sn1=1;
                      foreach ($substudents_em as $substudent) {
                        $subcheck_id = $substudent['id'];

                    ?>
                        <tr>

                          <td><input type="checkbox" class="get_value" name="subitemcheck[]" id="<?php echo 'subitem' ?>" value="<?php echo $substudent['id'] ?>" /></td>
                          <td><?php echo $sn++; ?></td>
                          <td>

                            <?php echo $substudent['subitem']; ?></td>
                        </tr>
                    <?php

                      }
                    }

                    ?>

                  </tbody>
                </table>
                <!-- <input type="text" name="std_id" value="<?php echo $fetchuser_id ?>"> -->
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="submit">Select</button>
              </form>
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
    function qual() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("qualsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("qualtable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
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
  <script>
    document.getElementById('select-all-item').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>



<script>
  $("#classFilter").on("change", function() {
    const className = $(this).val();
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL; ?>includes/Pages/qualFilter.php",
      data: {
        className1: className,
        pageName1: "qual",
      },
      dataType: "html",

      success: function(resultData) {
        window.location.reload();
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