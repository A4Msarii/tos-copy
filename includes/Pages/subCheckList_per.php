<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sub CheckList</title>
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
<!--Input checklists-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">
  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">Sub CheckList</h1>
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

            <?php
            $course_du = "";
            if(isset($_REQUEST['checkListId'])){
                $checkID = $_REQUEST['checkListId'];
            }
            ?>

          <!-- End Header -->

          <!-- Body -->
          <div class="card-body">


            <!--checklist Table-->



            <table class="table table-striped table-bordered table-hover" id="newsubchecktable">
              <input style="margin:5px;" class="form-control" type="text" id="subchecklistsearch" onkeyup="subchecklist()" placeholder="Search for checklists.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <th class="text-white">Sub Checklist</th>
                <th class="text-white">Files</th>
                <th class="text-white" colspan="2">Action</th>
              </thead>
              <?php

              $output1 = "";
              $query1 = "SELECT * FROM per_subchecklist WHERE main_checklist_id = '$checkID'";
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
                    <td><span data-bs-toggle="modal" data-bs-target="#uploadCheckListDocumnet_per" class="addCheckValue" data-check="<?php echo $checkID;?>" data-subcheck="<?php echo $id;?>" style="cursor: pointer;"><?php echo $row1['name']; ?></span></td>
                    <td>
                      <?php
                      $allFiles = $connect->query("SELECT count(*) FROM per_subchecklistfile WHERE subCheckId = '$id'");
                      echo $allFiles->fetchColumn();
                      ?>
                    </td>
                    <td><a class="btn btn-soft-success btn-xs editSubCheck" id="<?php echo $row1['id'] ?>" href="" data-bs-toggle="modal" data-bs-target="#editsubchecklist_per"><i class="bi bi-pen-fill"></i></a>

                      <a class="btn btn-soft-danger btn-xs" href="editSubCheckList_per.php?deleteId=<?php echo $id ?>&mainCheck=<?php echo $checkID; ?>"><i class="bi bi-trash-fill"></i></a>

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
<div class="modal fade" id="editsubchecklist_per" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Sub Checklist</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="editSubCheckList_per.php">
            <input type="hidden" name="mainCheck" value="<?php echo $checkID; ?>" />
          <div class="row" id="subCheckData_per">

          </div>


          <input class="btn btn-success" type="submit" value="Submit" name="editSub" style="float:right; font-weight:bold; font-size:large;" />

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
            <th class="text-white">Sr No</th>
            <th class="text-white">Name</th>
            <th class="text-white">Files</th>
            <th class="text-white">Action</th>
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

<div class="modal fade" id="uploadCheckListDocumnet_per" tabindex="-1" role="dialog" aria-labelledby="checkname" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-success" id="checkname">Upload Document</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
            <option selected>Select File Type</option>
            <option value="addNewPage">New Page</option>
            <option value="addFile">Attachment</option>
            <option value="addFileLoca">Drive Link</option>
            <option value="addFileLink">Link</option>
          </select>
          <form action="<?php echo BASE_URL ?>includes/Pages/addCheckFile_per.php" method="post" enctype="multipart/form-data" style="width:95%;margin: auto;margin-top: 25px;display:none;" id="multipleFile" class="multipleFile">
            <input type="hidden" name="checkId" class="checkId" value="" />
            <input type="hidden" name="subCheckId" class="subCheckId" value="" />
            <input type="hidden" name="ctpId" class="" value="<?php echo $std_course1; ?>" />
            <!-- <input type="hidden" name="fileBriefcase" class="" value="user" /> -->
            <div class="input-field">
              <table class="table table-bordered">
                <tr>
                  <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                    <input type="file" class="form-control" name="file[]" id="" multiple />
                  </td>
                </tr>
              </table>
            </div><br>
            <!-- <center>
                <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                <br>
                <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                  <option value="All instructor">Instructor Only</option>
                  <option value="Everyone" selected>Everyone</option>
                  <option value="None">None</option>
                </select>
                <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                  <option selected value="readOnly">ReadOnly</option>
                  <option value="None">None</option>
                  <option value="readAndWrite">Read And Write</option>
                </select>
                <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                <table class="table table-bordered tableData" style="display:none;">
                  <thead class="bg-dark">
                    <tr>
                      <th class="text-white">#</th>
                      <th class="text-white">Profile Image</th>
                      <th class="text-white">Name</th>

                    </tr>
                  </thead>
                  <tbody class="userDetail">

                  </tbody>
                </table>
              </center> -->
            <center>
              <input style="margin:5px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" value="Submit" name="attachement" />
              <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
            </center>
          </form>
          <br>
          <center>
            <form class="insert-phases phase_form" id="phase_form" method="post" action="<?php echo BASE_URL ?>includes/Pages/addCheckFile_per.php" style="display:none;" enctype="multipart/form-data">
              <input type="hidden" name="checkId" class="checkId" value="" />
              <input type="hidden" name="subCheckId" class="subCheckId" value="" />
              <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
              <input type="hidden" name="ctpId" class="" value="<?php echo $std_course1; ?>" />
              <input type="hidden" name="fileBriefcase" class="" value="user" />
              <div class="input-field">
                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                <table class="table table-bordered" id="table-field">
                  <tr>
                    <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                  </tr>
                  <tr>
                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                    </td>
                  </tr>
                </table>
              </div>
              <!-- <center>
                  <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                  <br>
                  <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                    <option value="All instructor">Instructor Only</option>
                    <option value="Everyone" selected>Everyone</option>
                    <option value="None">None</option>
                  </select>
                  <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                    <option selected value="readOnly">ReadOnly</option>
                    <option value="None">None</option>
                    <option value="readAndWrite">Read And Write</option>
                  </select>
                  <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                  <table class="table table-bordered tableData" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">Profile Image</th>
                        <th class="text-white">Name</th>

                      </tr>
                    </thead>
                    <tbody class="userDetail">

                    </tbody>
                  </table>
                </center> -->
              <center>
                <button style="margin:5px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
                <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
              </center>
            </form>
          </center>
          <center>
            <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>includes/Pages/addCheckFile_per.php" style="display:none;" enctype="multipart/form-data" sty>
              <input type="hidden" name="checkId" class="checkId" value="" />
              <input type="hidden" name="subCheckId" class="subCheckId" value="" />
              <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
              <input type="hidden" name="ctpId" class="" value="<?php echo $std_course1; ?>" />
              <input type="hidden" name="fileBriefcase" class="" value="user" />
              <div class="input-field">
                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                <table class="table table-bordered" id="table-field-link">
                  <tr>
                    <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required />
                    </td>

                  </tr>
                  <tr>
                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" />
                    </td>
                  </tr>
                </table>
              </div>
              <!-- <center>
                  <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                  <br>
                  <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                    <option value="All instructor">Instructor Only</option>
                    <option value="None">None</option>
                    <option value="Everyone" selected>Everyone</option>
                  </select>
                  <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                    <option value="readOnly">ReadOnly</option>
                    <option value="None">None</option>
                    <option value="readAndWrite">Read And Write</option>
                  </select>
                  <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                  <table class="table table-bordered tableData" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">Profile Image</th>
                        <th class="text-white">Name</th>

                      </tr>
                    </thead>
                    <tbody class="userDetail">

                    </tbody>
                  </table>
                </center> -->
              <center>
                <button style="margin:5px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
                <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
              </center>
          </center>
          </form>
          </center>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- add sub checklist modal -->
<div class="modal fade" id="subchecklist" tabindex="-1" role="dialog" aria-labelledby="checklistmainname" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="checklistmainname"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="insert_subchecklist.php">
            <?php if (isset($_SESSION['ctp_value'])) { ?>
              <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
            <?php } ?>
            <input class="form-control" type="hidden" name="id" value="" id="spid">
            <div class="input-field">
              <table class="table table-bordered" id="subchecklist_table">
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

<!--Script for add multiple checklists-->

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
	                        <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter checklist" name="checklist[]" id="checklistval" class="form-control" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>\
	                        <td><button type="button" name="remove_actual" id="remove_checklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
    var max = 100;
    var a = 1;

    $("#add_checklist").click(function() {
      if (a <= max) {
        $("#table-field").append(html);
        a++;
      }
    });
    $("#table-field").on('click', '#remove_checklist', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>


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
        $("#subchecklist_table").append(html);
        a++;
      }
    });
    $("#subchecklist_table").on('click', '#remove_subchecklist', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
  $("#newchecktable").on("click", ".edit_course_data", function() {

    var ctid = $(this).attr('id');

    $.ajax({
      type: 'POST',
      url: 'fetch_check_edit_value.php',
      data: 'ctid=' + ctid,
      success: function(response) {

        $('#get_course_foem').empty();
        $('#get_course_foem').html(response);
      }
    });

  });
</script>


<script>
  function subchecklist() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("subchecklistsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("newsubchecktable");
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
  const cId = <?php echo $user_id ?>;
  $("#newsubchecktable").on("click", ".addCheckValue", function() {
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

      window.location.href = "<?php echo BASE_URL; ?>includes/Pages/subTextEditor.php?subCheck=" + subCheck + "&check=" + check + "&userId=" + cId;
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
  $(".editSubCheck").on("click",function(){

    const subId = $(this).attr("id");
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/editSubCheckList_per.php',
      data: {
        subId: subId,
      },
      success: function(response) {
        // alert(response);
        $("#subCheckData_per").empty();
        $("#subCheckData_per").html(response);
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