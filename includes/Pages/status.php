<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Status</title>
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
        <h1 class="text-success">Status</h1>
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

          </div>
          <!-- End Header -->

          <div class="card-body">
            <!-- Nav -->
            <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="status-tab" href="#status" data-bs-toggle="pill" data-bs-target="#status" role="tab" aria-controls="status" aria-selected="true">
                  <div class="d-flex align-items-center text-success">
                    Status
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="cgradesheet-tab" href="#cgradesheet" data-bs-toggle="pill" data-bs-target="#cgradesheet" role="tab" aria-controls="cgradesheet" aria-selected="false">
                  <div class="d-flex align-items-center text-success">
                    Create Gradesheet
                  </div>
                </a>
              </li>
              
            </ul>
            <!-- End Nav -->

            <!-- Tab Content -->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="status" role="tabpanel" aria-labelledby="status-tab">
                <center>
              <form class="insert-phases" id="phase_form" method="post" action="insert_code.php">
                <div class="input-field">
                  <table class="table table-bordered" id="table-field-code">
                    <tr>
                     
                      <td >
                        <label class="form-label text-dark" style="font-weight:bold;">Code :</label>
                        <input type="text" placeholder="Enter Code" name="code[]" id="phaseval" class="form-control" value="" required /> 
                      </td>
                      <td>
                        <label class="form-label text-dark" style="font-weight:bold;">Description : </label>
                        <input type="text" placeholder="Enter Description" name="description[]" id="phaseval" class="form-control" value="" required /> 
                      </td>
                      <td>
                        <label class="form-label text-dark" style="font-weight:bold;">Explanation : </label>
                        <input type="text" placeholder="Enter Explanation" name="explanation[]" id="phaseval" class="form-control" value="" required /> 
                      </td>
                      <td>
                        <label class="form-label text-dark" style="font-weight:bold;">Progression : </label>
                        <input type="text" placeholder="Enter Progression" name="progression[]" id="phaseval" class="form-control" value="" required /> 
                      </td>
                      <td style="width:20px;"><button type="button" name="add_code" id="add_code" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="code_submit" name="codesave">Submit</button>
                </center>
              </form>
            </center>

             <table class="table table-striped table-bordered table-hover" id="codetable">
              <input style="margin:5px;" class="form-control" type="text" id="codesearch" onkeyup="code()" placeholder="Search for Codes.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <th class="text-white">Code</th>
                <th class="text-white">Description</th>
                <th class="text-white">Explanation</th>
                <th class="text-white">Progression</th>
                <th class="text-white" colspan="2">Action</th>
              </thead>
              <?php

              $output1 = "";
              $query1 = "SELECT * FROM status";
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
                    <td><?php echo $row1['code']; ?></td>
                    <td><?php echo $row1['description']; ?></td>
                    <td><?php echo $row1['explanation']; ?></td>
                    <td><?php echo $row1['progression']; ?></td>
                    <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('c_id').value='<?php echo $row1['id'] ?>';
                                        document.getElementById('code_name').value='<?php echo $row1['code']; ?>';
                                        document.getElementById('des').value='<?php echo $row1['description']; ?>';
                                        document.getElementById('exp').value='<?php echo $row1['explanation']; ?>';
                                        document.getElementById('pre').value='<?php echo $row1['progression']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editcode"><i class="bi bi-pen-fill"></i></a>


                      <a class="btn btn-soft-danger btn-xs" href="code-delete.php?id=<?php echo $id ?>&ctp=<?php echo $ctp ?>"><i class="bi bi-trash-fill"></i></a>
                      

                      </a>

                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </table>
              </div>

              <div class="tab-pane fade" id="cgradesheet" role="tabpanel" aria-labelledby="cgradesheet-tab">
                
               <div class="container">
                 <div class="row">
                   <div class="col">
                      <label class="form-label text-dark" for="student" style="font-weight:bold; margin:5px;">Select Class :</label>
                        <select type="text" class="form-control form-control-md" name="ctp" id="select_class_re1" required>
                            <option selected disabled value="">-select Class-</option>
                            <?php
                            echo $output_20;
                            echo $output_201;
                            ?>
                        </select>
                   </div>
                 </div>
               </div>
              </div>

              <div class="tab-pane fade" id="nav-three-eg2" role="tabpanel" aria-labelledby="nav-three-eg2-tab">
                <p>Third tab content...</p>
              </div>
            </div>
<!-- End Tab Content -->
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
<div class="modal fade" id="editcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Status</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <form method="post" action="edit_status.php" style="width:80%;">
            <?php if (isset($_SESSION['ctp_value'])) { ?>
              <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
            <?php } ?>
            <input class="form-control" type="hidden" name="id" value="" id="c_id">
            <label class="form-label text-dark" style="font-weight:bold;">Code : </label>
            <input class="form-control" type="text" name="code" value="" id="code_name">

            <label class="form-label text-dark" style="font-weight:bold;">Description : </label>
            <input class="form-control" type="text" name="description" value="" id="des">

            <label class="form-label text-dark" style="font-weight:bold;">Explanation : </label>
            <input class="form-control" type="text" name="explanation" value="" id="exp">

            <label class="form-label text-dark" style="font-weight:bold;">Progression : </label>
            <input class="form-control" type="text" name="progression" value="" id="pre">

            <input style="margin:5px; float: right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
          </form>
        
      </div>
    </div>
  </div>
</div>



<!--Script for add multiple phases-->

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
	                        <td >\
                        <label class="form-label text-dark" style="font-weight:bold;">Code :</label>\
                        <input type="text" placeholder="Enter Code" name="code[]" id="phaseval" class="form-control" value="" required />\
                      </td>\
                      <td>\
                        <label class="form-label text-dark" style="font-weight:bold;">Description : </label>\
                        <input type="text" placeholder="Enter Description" name="description[]" id="phaseval" class="form-control" value="" required />\
                      </td>\
                      <td>\
                        <label class="form-label text-dark" style="font-weight:bold;">Explanation : </label>\
                        <input type="text" placeholder="Enter Explanation" name="explanation[]" id="phaseval" class="form-control" value="" required /> \
                      </td>\
                      <td>\
                        <label class="form-label text-dark" style="font-weight:bold;">Progression : </label>\
                        <input type="text" placeholder="Enter Progression" name="progression[]" id="phaseval" class="form-control" value="" required /> \
                      </td>\
                      <td style="width:20px;"><button type="button" name="remove_code" id="remove_code" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
    var max = 100;
    var a = 1;

    $("#add_code").click(function() {
      if (a <= max) {
        $("#table-field-code").append(html);
        a++;
      }
    });
    $("#table-field-code").on('click', '#remove_code', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

 <script>
        $(document).ready(function() {
            var get_id = sessionStorage.getItem('set_id');
            $('#set_ctp').val(get_id);
            $('#set_ctp').on('change', function() {
                var get_val = $(this).val();
                sessionStorage.setItem('set_id', get_val);
                document.cookie = "fixed_ctp_id = " + get_val;
                window.location.href = 'Next-home.php';
                // window.location.reload();
            });
            //set value for first dropdown on page change
            var course = sessionStorage.getItem('co_name');
            var color = sessionStorage.getItem('co_color');
            var co_Ins = sessionStorage.getItem('co_Ins');
            var co_Id = sessionStorage.getItem('co_Id');
            if (course !== null) {
                $('#get_co_name').html(course);

                $("#get_co_name1").css("display", "none");
                $('#get_co_color').css("background-color", color);
                $("#phase_mana").attr("name", co_Id);
                $("#phase_mana").attr("value", co_Ins);
            }
            //set value of javascript to php variable

            //on change of course dropdown send value to selec_std.php and fetch value
            $('.course').on('click', function() {
                var countryID = $(this).data("value");
                var courceColor = $(this).data("color");
                var id = $(this).attr("id");
                var role = $(this).data("role");

                var class1 = $(this).data("class");
                var name = $(this).data("name");
                sessionStorage.setItem('co_name', name);
                sessionStorage.setItem('co_color', courceColor);
                sessionStorage.setItem('co_Ins', role);
                sessionStorage.setItem('co_Id', countryID);


                if (role) {
                    $.ajax({
                        type: 'POST',
                        url: '../check_cm_pm.php',
                        data: 'u_id=' + role + '&class_id=' + countryID,
                        success: function(response) {

                            // if (response == 'c1p1') {
                            //     $("#co_mana").show();
                            //     $("#phase_mana").show();
                            // } else if (response == 'c1') {
                            //     $("#co_mana").show();
                            //     $("#phase_mana").hide();
                            // } else if (response == 'p1') {
                            //     $("#co_mana").hide();
                            //     $("#phase_mana").show();
                            // } else {
                            //     $("#co_mana").hide();
                            //     $("#phase_mana").hide();
                            // }
                        }
                    });

                }
                if (countryID) {

                    $.ajax({
                        type: 'POST',
                        url: '../selec_std.php',
                        data: 'course=' + id + '&ides=' + class1,
                        success: function(html) {

                            sessionStorage.setItem('id', countryID);
                             document.cookie = "phpgetcourse = " + class1;
                            document.cookie = "allstudent = " + html;
                            $('#state').html(html);
                            window.location.reload();
                        }
                    });
                }

            });

            $('#select_class_re1').on('change', function() {

                var studentname = $(this).val();

                var id = $(this).children(":selected").attr("id");

                window.location.href = 'add_item_subitem.php?class_id=' + studentname + '&class=' + id;
            });
            //onchange of second dropdown select dynamic value from selec.php
            $('#state').on('change', function() {

                var studentname = $(this).val();
                //  console.log(studentname);
                if (studentname) {

                    sessionStorage.setItem('student', studentname);
                    document.cookie = "student = " + studentname;
                    var getUrl = window.location;
                    var baseUrl = getUrl.pathname.split('/')[5];

                    if (baseUrl == "gradesheet.php") {
                        window.location.href = 'actual.php';
                    } else {
                        window.location.reload();
                    }
                }
            });
            //set value of selected student in javascript session
            var getstudent = sessionStorage.getItem('student');
            $('#state').val(getstudent);


        });
    </script>


<script>
  function code() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("codesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("codetable");
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