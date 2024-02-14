<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Files</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                    initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>includes/Pages/tos.svg">

</head>
<style type="text/css">
  tr:hover {
    background-color: #accbec6b;
  }

  #phase_form,
  #multipleFile {
    display: none;
  }
</style>
<body>
 
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  
<div id="header-hide">
  <?php
  include ROOT_PATH . 'includes/head_navbar.php';
  $course = "";
  $ctp = "";
  ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">

  <!-- Content -->
  <div class="content container-fluid" style="margin-top:70px;">

    <div class="row justify-content-center">

      <div class="col-lg-12 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
          <!-- Header -->

          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">
            <div>
              <h3>Files</h3>
            </div>
            

            <center>
              <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="fileOpt">
                <option selected>Select File Method</option>
                <option value="addFile">Add File</option>
                <option value="addFileLoca">Add File Location</option>
              </select>
              <form action="addfiles.php" method="post" enctype="multipart/form-data" style="width:60%;" id="multipleFile">
                <div class="input-field">
                  <table class="table table-bordered">
                    <tr>
                      <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                        <input type="file" class="form-control" name="file[]" id="" multiple />
                      </td>
                    </tr>
                  </table>
                </div><br>
                <center>
                  <input style="margin:5px;" type="submit" value="Submit" name="submitfiles" class="btn btn-success" />

                </center>
              </form>
              <br>

            </center>
            <center>
              <form class="insert-phases" id="phase_form" method="post" action="insert_locations.php" style="width:700px;" enctype="multipart/form-data">
                <div class="input-field">
                  <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Multiple Files Location</label>
                  <table class="table table-bordered" id="table-field-location">
                    <tr>
                      <td style="text-align: center;"><input type="text" placeholder="Enter Locations" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                      <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="phaseName[]" id="phasename" class="form-control" value="" /> </td>
                      <td style="width:20px;"><button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>
                </center>
              </form>
            </center>
            <!--Phase Table-->

            <table class="table table-striped table-bordered" id="file">
              <input style="margin:5px;" class="form-control" type="text" id="search" onkeyup="file()" placeholder="Search for files.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-light">Sr No</th>
                <!-- <th class="text-light">File Names</th> -->
                <th class="text-light">Uploaded Files</th>
                <th class="text-light">View</th>
                <th class="text-light">Action</th>
              </thead>
              <?php
              // $output ="";
              $query1_ff = "SELECT * FROM files";
              $statement1_ff = $connect->prepare($query1_ff);
              $statement1_ff->execute();
              if ($statement1_ff->rowCount() > 0) {
                $result1_ff = $statement1_ff->fetchAll();
                $sn = 1;
                foreach ($result1_ff as $row) {
                  $filename = "";
                  $id = $row['id']; ?>
                  <tr>
                    <td style="width:50px;"><?php echo $sn++; ?></td>

                    <td><?php
                        if ($row['type'] == "") { ?>
                        <a href="files/<?php echo $row['name'] ?>" target="_blank"><?php echo $row['name'] ?></a>
                      <?php } else {
                        ?>
                        <a href="<?php echo $row['name']; ?>" target="_blank"><?php echo $row['type']; ?></a>
                          <?php
                        }
                      ?>
                    </td>
                    <td><?php if ($row['name'] != "" && $row['type'] != "") {
                          echo "-";
                        ?>
                      <?php } else {
                      ?>
                        <a href="files/<?php echo $row['name']; ?>" target="_blank">View</a>
                      <?php
                        } ?>
                    </td>
                    <td>
                      <a href="delet_file.php?id=<?php echo $id ?>"><i style="color:red;" class="bi bi-trash-fill"></i></a>

                    </td>
                  </tr>
                <?php
                }
              } else { ?>
                <tr>
                  <td colspan='3' style="text-align:center">
                    No data
                  </td>
                </tr>
              <?php }
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




<!--Edit actual class modal-->
<div class="modal fade" id="editfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_file.php">
          <input type="hidden" class="form-control" name="id" value="" id="file_id" readonly>
          <label style="color:black; font-weight:bold; margin:5px;">Name :</label>
          <input type="text" class="form-control" name="name" value="" id="name1">
          <label style="color:black; font-weight:bold; margin:5px;">File :</label>
          <input type="file" class="form-control" name="file" value="" id="file1">
          <br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<!--Script for add multiple phases-->

<script>
  function file() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("filetable");
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

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
          <td style="text-align: center;"><input type="text" placeholder="Enter Locations" name="phase[]" id="phaseval" class="form-control" value="" required/> </td>\
          <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="phaseName[]" id="phasename" class="form-control" value=""/> </td>\
                          <td style="width:20px;"><button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>\
	                    </tr>'
    var max = 100;
    var a = 1;

    $("#add_phase").click(function() {
      if (a <= max) {
        $("#table-field-location").append(html);
        a++;
      }
    });
    $("#table-field-location").on('click', '#remove_phase', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  function file() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("file");
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
  $("#fileOpt").change(function() {
    if ($(this).val() == "addFile") {
      $("#multipleFile").css("display", "block");
      $("#phase_form").css("display", "none");
    }

    if ($(this).val() == "addFileLoca") {
      $("#phase_form").css("display", "block");
      $("#multipleFile").css("display", "none");
    }
  });
</script>


<!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>