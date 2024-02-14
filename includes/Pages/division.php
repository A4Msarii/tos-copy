<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Division</title>
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
        <h1 class="text-success">Division</h1>
      </div>
      <!-- End Page Header -->
    </div>
  </div>


  <!-- Content -->
  <div class="content container-fluid" style="margin-top: -20rem;">

    <div class="row justify-content-center">

      <div class="col-lg-10 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
          <!-- Header -->
          <div class="card-header card-header-content-center">


          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
            <center>
              <form class="insert-devision" id="devision_form" method="post" action="insert_devision.php" style="width:700px;">
                <div class="input-field">
                  <table class="table table-bordered" id="table-field-division">
                    <tr>
                      <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter Division" name="devision[]" id="divval" class="form-control" value="" required /> <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></td>
                      <td style="width:20px;"><button type="button" name="add_div" id="add_div" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="div_submit" name="savediv">Submit</button>
                </center>
              </form>
            </center>

            <!--Phase Table-->



            <table class="table table-striped table-bordered table-hover" id="devisiontableMain">
              <input style="margin:5px;" class="form-control" type="text" id="devisionsearchAll" onkeyup="divisionSearch()" placeholder="Search for Division.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <th class="text-white">Division</th>
                <th class="text-white">Division Department</th>
                <th class="text-white" colspan="2">Action</th>
              </thead>
              <tbody>
                <?php
                $divisionQuery = $connect->query("SELECT * FROM division");
                $sr = 0;
                while ($divisionData = $divisionQuery->fetch()) {
                  $sr++;
                  $id = $divisionData["id"];
                ?>
                  <tr>
                    <td><?php echo $sr; ?></td>

                    <td><a class="fetchDepart" name="<?php echo $id; ?>" style="color: <?php echo $divisionData['color'];?>;" href="" onclick="document.getElementById('diviName').innerHTML='<?php echo 'Choose Department For : '.$divisionData['divisionName']; ?>';document.getElementById('dev_id').value='<?php echo $divisionData['id']; ?>';document.getElementById('divisionId').value='<?php echo $divisionData['id']; ?>';document.getElementById('devname').value='<?php echo $divisionData['divisionName']; ?>';" data-bs-toggle="modal" data-bs-target="#adddepartment"><?php echo $divisionData['divisionName']; ?></a></td>
                    <td>
                      <?php
                      $diviQ = $connect->query("SELECT * FROM division_department WHERE divisionId = '$id'");
                      while($diviQData = $diviQ->fetch()){
                        $diviId = $diviQData['departmentId'];
                        $departmentQ = $connect->query("SELECT * FROM homepage WHERE id = '$diviId'");
                        while($departmentData = $departmentQ->fetch()){
                          ?>
                          <p>
                            &#8226; <?php echo $departmentData['department_name']; ?>
                            <a class="btn btn-soft-danger btn-xs" href="devision-delete.php?departmentId=<?php echo $diviQData['id']; ?>"><i class="bi bi-trash-fill"></i></a>
                          </p>
                          <?php
                        }
                      }
                      ?>
                    </td>
                    <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('devid').value='<?php echo $divisionData['id']; ?>';
                                        document.getElementById('dev_name').value='<?php echo $divisionData['divisionName']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editdevision"><i class="bi bi-pen-fill"></i></a>


                      <a class="btn btn-soft-danger btn-xs" href="devision-delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>


                      <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('dev_id').value='<?php echo $divisionData['id']; ?>';
                                        document.getElementById('d_name').value='<?php echo $divisionData['divisionName']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#colorModal" data-bs-title="Add Color"><i class="bi bi-palette"></i>

                      </a>



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
    <!-- End Row -->
  </div>
  <!-- End Content -->

</main>

<!-- add department modal -->
<div class="modal fade" id="adddepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="diviName"></h3>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form action="addDepartment.php" method="POST">
          <input type="hidden" name="divisionId" id="divisionId" />
          <table class="table table-bordered" id="departmenttable">
            <input style="margin:5px;" class="form-control" type="text" id="departmentsearch" onkeyup="department()" placeholder="Search for Department.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-white"><input type="checkbox" id="select-all-department"></th>
              <th class="text-white">Department</th>
            </thead>
            <tbody id="departTable">

            </tbody>
          </table>
          <input type="submit" value="Add" class="btn btn-success" name="AddDivision" style="float:right;" />
        </form>
      </div>
    </div>
  </div>
</div>

<!-- edit division modal -->
<div class="modal fade" id="editdevision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Division</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_division.php" style="width:80%;">

            <input class="form-control" type="hidden" name="id" value="" id="devid">
            <label class="form-label text-dark">Division Name</label>
            <input class="form-control" type="text" name="dev_name" value="" id="dev_name">
            <input style="margin:5px;" class="btn btn-success" type="submit" name="saveit" value="Submit">
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

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
            <input class="form-control" type="hidden" name="id" value="" id="dev_id">
            <label class="form-label text-dark" for="color" style="font-size:large; font-weight:bold;">Select a color for Division:</label><br>
            <input type="color" id="color" name="favcolor" required><br>
            <hr>
            <input type="submit" class="btn btn-success" style="float:right;" name="division_color">
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
	                        <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter devision" name="devision[]" id="divval" class="form-control" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></td>\
	                        <td><button type="button" name="remove_div" id="remove_div" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
    var max = 100;
    var a = 1;

    $("#add_div").click(function() {
      if (a <= max) {
        $("#table-field-division").append(html);
        a++;
      }
    });
    $("#table-field-division").on('click', '#remove_div', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  function divisionSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("devisionsearchAll");
    filter = input.value.toUpperCase();
    table = document.getElementById("devisiontableMain");
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

<script>
  function department() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("departmentsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("departmenttable");
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

<script>
  document.getElementById('select-all-department').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  }
</script>

<script>
  $(".fetchDepart").on("click", function() {
    const departId = $(this).attr("name");
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL; ?>includes/Pages/addDepartment.php",
      data: {
        departId: departId,
      },
      dataType: "html",

      success: function(resultData) {
        // alert(resultData);
        $("#departTable").empty();
        $("#departTable").html(resultData);
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