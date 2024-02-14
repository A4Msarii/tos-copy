<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Personal CheckList</title>
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
<!--Input checklists-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">
  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">Personal CheckList</h1>
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
          <!-- <div class="card-header card-header-content-center">

          </div> -->
          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">

            <center>
              <?php include ROOT_PATH . 'includes/Pages/per_checklistform.php'; ?>
            </center>

            <!--checklist Table-->



            <table class="table table-striped table-bordered" id="checklisttable_per">
              <input style="margin:5px;" class="form-control" type="text" id="per_checklistsearch" onkeyup="per_checklist()" placeholder="Search for checklists.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <th class="text-white">checklist</th>
                <th class="text-white">Subchecklist Files</th>
                <th class="text-white" colspan="2">Action</th>
              </thead>
              <?php

              $output1 = "";
              $query1 = "SELECT * FROM per_checklist GROUP BY title";
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
                    <td><a style="color: <?php echo $row1['color'];?>" href="<?php echo BASE_URL; ?>includes/Pages/subCheckList_per.php?checkListId=<?php echo $row1['id']; ?>"><?php echo $row1['title']; ?></a></td>
                    <td>
                      <?php
                      $allFiles = $connect->query("SELECT * FROM subchecklistfiles WHERE checkId = '$id'");
                      while ($fileData = $allFiles->fetch()) {
                        if ($fileData['fileType'] != "offline") {
                          if ($fileData['fileType'] == "online") {
                      ?>
                            <a href="<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo $fileData['lastName']; ?></a>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php?deleteId=<?php echo $fileData['id']; ?>"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>|
                          <?php
                          } if ($fileData['fileType'] == "pdf" || $fileData['fileType'] == "PDF") {
                          ?>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo substr($fileData['fileName'], 0, 10); ?> </a>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php?deleteId=<?php echo $fileData['id']; ?>"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>|
                          <?php
                          }
                        } if($fileData['fileType'] == "editorData"){
                          ?>
                          <a data-bs-target="#pageModal" data-bs-toggle="modal" style="cursor: pointer;" class="editData" data-id="<?php echo $id; ?>"><?php echo substr($fileData['fileName'], 0, 10); ?> </a>
                          <a href="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php?deleteId=<?php echo $fileData['id']; ?>"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>|
                          <?php
                        }if($fileData['fileType'] == "offline") {
                          ?>
                          <a style="cursor: pointer;" class="driveLink1" value="<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo $fileData['lastName']; ?> </a>
                          <a href="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php?deleteId=<?php echo $fileData['id']; ?>"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>|
                        <?php
                        }
                        ?>

                      <?php
                      }
                      ?>
                    </td>
                    <td><a class="btn btn-soft-success btn-xs edit_course_data_per" id="<?php echo $row1['id'] ?>" href="" onclick="document.getElementById('ch_id').value='<?php echo $row1['id'] ?>';document.getElementById('check_name').value='<?php echo $row1['checklist']; ?>';" data-bs-toggle="modal" data-bs-target="#editchecklistper"><i class="bi bi-pen-fill"></i></a>


                      <a class="btn btn-soft-danger btn-xs" href="per_checklist-delete.php?id=<?php echo $id ?>&ctp=<?php echo $ctp ?>"><i class="bi bi-trash-fill"></i></a>
                      <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('sp_id').value='<?php echo $row1['id'] ?>';document.getElementById('checklistmain_name').innerHTML='<?php echo $row1['checklist'] ?>';
                                      " data-bs-toggle="modal" data-bs-target="#per_subchecklist" data-bs-title="Add Sub Checklist"><i class="bi bi-info-lg"></i></a>

                      <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('ccc_id').value='<?php echo $row1['id']; ?>';
                                        document.getElementById('ccc_name').innerHTML='<?php echo $row1['checklist']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#color_checklist_per" data-bs-title="Add Color"><i class="bi bi-palette"></i>

                      </a>

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

<!-- edit checklist modal -->
<div class="modal fade" id="editchecklistper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit checklist</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="edit_checklist_per.php">
          <input class="form-control" type="hidden" name="id" value="" id="ch_id">
          <div class="row" id="get_course_foem_per">




          </div>


          <input class="btn btn-success" type="submit" value="Submit" name="checksubmit" style="float:right; font-weight:bold; font-size:large;" />

      </div>
      </form>

    </div>
  </div>
</div>
</div>

<div class="modal fade" id="subchecklistmange" tabindex="-1" role="dialog" aria-labelledby="checkname" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-success" id="checkname"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered">
          <thead class="bg-dark">
            <th class="text-light">Sr No</th>
            <th class="text-light">Name</th>
            <th class="text-light">Files</th>
            <th class="text-light">Action</th>
          </thead>
          <tbody id="subCheckListId">
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pageModal" tabindex="-1" role="dialog" aria-labelledby="checkname" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-success" id="checkname"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="pageDatas">

      </div>
    </div>
  </div>
</div>



<!-- add sub checklist modal -->
<div class="modal fade" id="per_subchecklist" tabindex="-1" role="dialog" aria-labelledby="checklistmain_name" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="checklistmain_name"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="insert_subchecklist_per.php">
            <input class="form-control" type="hidden" name="id" value="" id="sp_id">
            <div class="input-field">
              <table class="table table-bordered" id="subchecklist_table_per">
                <tr>

                  <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>
                  <td style="border: 1px solid white;"><button type="button" name="add_goal_actual" id="add_subchecklist" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <hr>
              <button style="margin:10px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" name="submit_subchecklist">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="subchecklistEdit" tabindex="-1" role="dialog" aria-labelledby="checklistmainname" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="checklistmainname1"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php">
            <input type="hidden" name="subCheckVal" id="subCheckVal" />
            <input class="form form-control" type="text" name="subCheckListInput" id="subCheckListInput" placeholder="Enter Sub checklist" />
            <input type="submit" value="Edit" name="editSub" class="btn btn-success" />
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- add color modal modal -->
<div class="modal fade" id="color_checklist_per" tabindex="-1" role="dialog" aria-labelledby="ccc_name" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="ccc_name"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/insert_color.php">
            <input class="form-control" type="hidden" name="id" value="" id="ccc_id">
            <label for="color" style="font-size:large; font-weight:bold;">Select a color for Checklist:</label><br>
            <input type="color" id="color" name="favcolor" required><br>
            <hr>
            <input type="submit" class="btn btn-success" style="float:right;" name="checklist_color_per">
          </form>
 
        </center>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    var html = '<tr>\
                  <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>\
                  <td style="border: 1px solid white;"><button type="button" name="remove_subchecklist" id="remove_subchecklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
    var max = 100;
    var a = 1;

    $("#add_subchecklist").click(function() {
      if (a <= max) {
        $("#subchecklist_table_per").append(html);
        a++;
      }
    });
    $("#subchecklist_table_per").on('click', '#remove_subchecklist', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
  $("#newchecktableper").on("click", ".edit_course_data_per", function() {

    var ctid = $(this).attr('id');

    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL;?>includes/Pages/fetch_check_edit_value_per.php',
      data: 'ctid=' + ctid,
      success: function(response) {

        $('#get_course_foem_per').empty();
        $('#get_course_foem_per').html(response);
      }
    });

  });
</script>


<script>
  function per_checklist() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("per_checklistsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("checklisttable_per");
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
  let subCheck = 0;
  let check = 0;
  const cId = <?php echo $std_course1 ?>;
  $("#subCheckListId").on("click", ".addCheckValue", function() {
    const checkValue = $(this).data("check");
    const subCheckValue = $(this).data("subcheck");
    subCheck = subCheckValue;
    
    check = checkValue;
    $(".subCheckId").val(subCheckValue);
    $(".checkId").val(checkValue);
  });
</script>

<script>
  $(".fetchSubCheckList").on("click", function() {
    const checkListId = $(this).data("id");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
      data: {
        checkListId: checkListId,
      },
      success: function(response) {
        $("#subCheckListId").empty();
        $("#subCheckListId").html(response);
      }
    });
  });
</script>

<script>
  $(".fileOpt").change(function() {
    
    if ($(this).val() == "addFile") {
      $(".multipleFile").css("display", "block");
      $(".phase_form").css("display", "none");
      $(".filelink").css("display", "none");
      $("#file").css("display", "block");
    }

    if ($(this).val() == "addFileLoca") {
      $(".phase_form").css("display", "block");
      $(".multipleFile").css("display", "none");
      $(".filelink").css("display", "none");
      $("#file").css("display", "block");
    }
    if ($(this).val() == "addFileLink") {
      $(".phase_form").css("display", "none");
      $(".multipleFile").css("display", "none");
      $(".filelink").css("display", "block");
    }

    if ($(this).val() == "addNewPage") {
      // window.location.href = "<?php echo BASE_URL; ?>includes/Pages/subTextEditor.php?subCheck=" + subCheck + "&check=" + check + "&ctpId=" + cId;

      window.location.href = "<?php echo BASE_URL; ?>includes/Pages/subTextEditor.php?subCheck=" + subCheck + "&check=" + check + "&ctpId=" + cId;
    }
  });
</script>
<script>
  $(document).on("click", ".driveLink1", function() {
    const page = $(this).attr("value");

    var $tempInput = $("<input>");

    // Set the value of the temporary input element to the text
    $tempInput.val(page);

    // Append the temporary input element to the body
    $("body").append($tempInput);

    // Select the text in the temporary input element
    $tempInput.select();

    // Copy the selected text to the clipboard
    document.execCommand("copy");

    // Remove the temporary input element from the body
    $tempInput.remove();
    window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
  });
</script>

<script>
  $(".editData").on("click",function(){

    const pageId = $(this).data("id");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
      data: {
        pageId: pageId,
      },
      success: function(response) {
        $("#pageDatas").empty();
        $("#pageDatas").html(response);
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