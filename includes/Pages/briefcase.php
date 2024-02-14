<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>BriefCase</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                    initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
  tr:hover {
    background-color: #accbec6b;
  }
</style>
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
              <h3>BriefCase</h3>
            </div>
            
            <center>
              <form class="insert-brief" id="brief_form" method="post" action="insert_briefcase.php" enctype="multipart/form-data" style="width:700px;">
                <div class="input-field">
                  <table class="table table-bordered" id="table-field-brief1">
                    <tr>

                      <td style="text-align: center;"><input type="text" placeholder="Enter Briefcase" name="briefcase[]" id="val" class="form-control" value="" required /> </td>
                      <td style="width:20px;"><button type="button" name="add_brief1" id="add_brief1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit" id="briefcase_submit" name="savesbrief">Submit</button>
                </center>
              </form>
            </center>

            <!--Phase Table-->

            <table class="table table-striped table-bordered" id="brieftable1">
              <input class="form-control" type="text" id="briefsearch1" onkeyup="brief1()" placeholder="Search for Briefcase.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-light">Sr No</th>
                <th class="text-light">BriefCases</th>
                <th class="text-light">Files</th>
                <th class="text-light">Action</th>
              </thead>
              <?php
              // $output ="";
              $query1_bb = "SELECT * FROM briefcase";
              $statement1_bb = $connect->prepare($query1_bb);
              $statement1_bb->execute();
              if ($statement1_bb->rowCount() > 0) {
                $result1_bb = $statement1_bb->fetchAll();
                $sn = 1;
                foreach ($result1_bb as $row) {
                  $id = $row['id']; ?>
                  <tr>
                    <td style="width:50px;"><?php echo $sn++; ?></td>
                    <td><a style="color:black; text-decoration:underline;" onclick="document.getElementById('brid').value='<?php echo $row['id'] ?>';" type="button" data-bs-toggle="modal" data-bs-target="#selectfiles"><?php echo $row['briefcase'] ?></a></td>
                    <td>
                      <?php
                      $name = "SELECT * FROM file_briefcase where brief_id='$id'";
                      $stname2 = $connect->prepare($name);
                      $stname2->execute();

                      if ($stname2->rowCount() > 0) {
                        $rename2 = $stname2->fetchAll();
                        foreach ($rename2 as $rowname2) {
                          $stu_ides = $rowname2['file_id'];
                          $ides1 = $rowname2['id'];
                          $st_name_id = $connect->prepare("SELECT `name` FROM `files` WHERE id=?");
                          $st_name_id->execute([$stu_ides]);
                          $studentsname = $st_name_id->fetchColumn();
                          $studentsname . '<br>'; ?>
                          <ul style=" list-style-type: none; display: block;">
                            <li style="text-decoration: none;">
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <span style="color:#9540e4;">
                                <?php echo $studentsname; ?></span>
                              <a href="delete_files_brief.php?id=<?php echo $ides1 ?>"><i class="bi bi-x-circle text-danger"></i></a>
                            </li>
                          </ul>
                      <?php        }
                      }
                      ?>

                    </td>
                    <td><a href="" style="margin: 10px;" onclick="document.getElementById('brief_id').value='<?php echo $id = $row['id'] ?>';
                                                             document.getElementById('brief').value='<?php echo $row['briefcase'] ?>';" data-bs-toggle="modal" data-bs-target="#editbrief"><i class="bi bi-pen-fill text-success"></i>
                      </a>
                      <a href="brief-delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>

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
              <?php  }
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




<!--Edit briefcase modal-->
<div class="modal fade" id="editbrief" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Briefcase</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_briefcase.php">
          <input type="hidden" class="form-control" name="id" value="" id="brief_id" readonly>
          <label style="color:black; font-weight:bold; margin:5px;">Briefcase</label>
          <input type="text" class="form-control" name="brief" value="" id="brief">
          <br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>
 
<!--Edit briefcase modal-->
<div class="modal fade" id="selectfiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL;?>includes/Pages/add_file_brief.php" enctype="multipart/form-data">
          <input type="hidden" id="brid" name="brid">
          <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <table class="table table-striped table-bordered" id="files1">
            <input style="margin:5px;" class="form-control" type="text" id="file_search" onkeyup="file_by_file()" placeholder="Search for Files.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-light"><input type="checkbox" id="select-all-pre"></th>
              <!-- <th class="text-light">File Names</th> -->
              <th class="text-light">Uploaded Files</th>
              <th class="text-light">View</th>

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
                $stdes = $row['name'];
                $filename = "";
                $file_id = $row['id'];
                $checkitem_sel = "SELECT * FROM file_briefcase where file_id='$file_id'";
                $checkitem_selst = $connect->prepare($checkitem_sel);
                $checkitem_selst->execute();


                if ($checkitem_selst->rowCount() <= 0) {
            ?>
                  <tr>
                    <td><input type="checkbox" name="fsid[]" value="<?php echo $row['id'] ?>" /></td>
                    <!-- <td>
                                              <?php
                                              if ($row['name'] == " ") {
                                                $filename = $row['file_name'];
                                              } else {
                                                $filename = $row['name'];
                                              }
                                              ?>
                                              <?php echo $filename; ?></td> -->
                    <td>
                      <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                      <span style="color:#9540e4;"><?php echo $row['name'] ?></span>
                    </td>
                    <td><?php if ($row['name'] != "") { ?>
                        <a href="files/<?php echo $row['name']; ?>" target="_blank">View</a>
                      <?php } else {
                          echo "-";
                        } ?>
                    </td>

                  </tr>
              <?php
                }
              }
            } else { ?>
              <tr>
                <td colspan='3' style="text-align:center">
                  No data
                </td>
              </tr>
            <?php  }
            ?>
          </table>
          <hr>
          <input style="float:right;" type="submit" class="btn btn-success" value="Add">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function brief1() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("briefsearch1");
    filter = input.value.toUpperCase();
    table = document.getElementById("brieftable1");
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
                        \
                          <td style="text-align: center;"><input type="text" placeholder="Enter Briefcase" name="briefcase[]" id="val" class="form-control" value="" required /> </td>\
                          <td style="width:20px;"><button type="button" name="remove_brief1" id="remove_brief1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>\
                        </tr>'
    var max = 100;
    var a = 1;

    $("#add_brief1").click(function() {
      if (a <= max) {
        $("#table-field-brief1").append(html);
        a++;
      }
    });
    $("#table-field-brief1").on('click', '#remove_brief1', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  function file_by_file() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("file_search");
    filter = input.value.toUpperCase();
    table = document.getElementById("files1");
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