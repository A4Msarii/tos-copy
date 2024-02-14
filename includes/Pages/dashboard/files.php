<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

$Phase_names11 = "";
$q6 = "SELECT * FROM phase";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $Phase_names11 .= '<option value="' . $row6['phasename'] . '">' . $row6['phasename'] . '</option>';
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Vehicle</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

<style type="text/css">
  .table>:not(caption)>*>* {
        padding: 5px !important;
    }
    #ActionPhaseFiles:hover {
        color: white !important;
    }
    #ActionAcademicFiles:hover {
        color: white !important;
    }
</style>

<body>
  <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
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
          <h1 class="text-success">Files</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-11 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <div class="card-body">
              <!-- Nav -->
              <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="phaseFiles-tab" href="#phaseFiles" data-bs-toggle="pill" data-bs-target="#phaseFiles" role="tab" aria-controls="phaseFiles" aria-selected="true">
                    <div class="d-flex align-items-center text-success">
                      Phase Files
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="academicFiles-tab" href="#academicFiles" data-bs-toggle="pill" data-bs-target="#academicFiles" role="tab" aria-controls="academicFiles" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      Academic Files
                    </div>
                  </a>
                </li>
              </ul>
              <hr>
              <!-- End Nav -->

              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="phaseFiles" role="tabpanel" aria-labelledby="phaseFiles-tab">
                  <?php
                  include ROOT_PATH . 'includes/Pages/dashboard/phaseFiles.php';
                  ?>
                </div>

                <div class="tab-pane fade" id="academicFiles" role="tabpanel" aria-labelledby="academicFiles-tab">
                  <?php
                  include ROOT_PATH . 'includes/Pages/dashboard/academicFiles.php';
                  ?>
                </div>
              </div>
              <!-- End Tab Content -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

    </div>

    <!-- End Row -->
    </div>
    <!-- End Content -->

  </main>


  <div class="modal fade" id="addcustom_number" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Custom Number</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/update_custom.php">
            <input type="hidden" id="custome_number_file_id" name="id">
            <input type="hidden" name="customNumberCourseCode" id="customNumberCourseCode">
            <input type="hidden" name="customNumberCourseName" id="customNumberCourseName">
            <input type="hidden" name="customNumberPhaseId" id="customNumberPhaseId">
            <input type="text" name="custom_number" class="form-control" id="custome_number">
            <hr>
            <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="submit" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addcustomNumberAssignee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Custom Number</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/update_custom.php">
            <input type="hidden" id="customeNumberFileId" name="customeNumberFileId">
            <input type="hidden" name="asigneeCustomNumberCourseCode" id="asigneeCustomNumberCourseCode">
            <input type="hidden" name="asigneeCustomNumberCourseName" id="asigneeCustomNumberCourseName">
            <input type="hidden" name="asigneeCustomNumberPhaseId" id="asigneeCustomNumberPhaseId">
            <input type="text" name="customNumberAssignee" class="form-control" id="customNumberAssignee">
            <hr>
            <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="addCustomAssignee" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="phaseCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Comment</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/update_custom.php">
            <input type="hidden" id="commentFileId" name="commentFileId">
            <input type="hidden" id="commentPhaseId" name="commentPhaseId">
            <input type="hidden" id="commentCourseCode" name="commentCourseCode">
            <input type="hidden" id="commentCourseName" name="commentCourseName">
            <textarea name="phaseComment" id="phaseComment" cols="60" rows="10"></textarea>
            <hr>
            <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="submitComment" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="assigneeCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Comments</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/update_custom.php">
            <input type="hidden" id="assgiCommentFileId" name="assigneeCommentFileId">
            <input type="hidden" id="assgiCommentPhaseId" name="assigneeCommentPhaseId">
            <input type="hidden" id="assgiCommentCourseCode" name="assigneeCommentCourseCode">
            <input type="hidden" id="assgiCommentCourseName" name="assigneeCommentCourseName">
            <textarea name="assigneeComment" id="assigneeComment" cols="60" rows="10"></textarea>
            <hr>
            <input style="margin:5px;float: right;" class="btn btn-success" type="submit" name="submitAssigneeComment" value="Submit">
          </form>

        </div>
      </div>
    </div>
  </div>

  <div id="WorkingfilesModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="workingfilesModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="workingfilesModalTitle">Add File</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOptWorking">
            <option selected>Select File Method</option>
            <!-- <option value="addNewPage">New Page</option> -->
            <option value="addFile">Attachment</option>
            <option value="addFileLoca">Drive Link</option>
            <option value="addFileLink">Link</option>
          </select>
          <br>
          <center>
            <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">
              <div class="input-field">
                <table class="table table-bordered">
                  <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                  <tr>
                    <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                      <input type="file" class="form-control" name="file[]" id="" multiple />
                    </td>
                </table>
              </div><br>
              <hr>
              <center>
                <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="attachement" class="btn btn-success" />

              </center>
            </form>
          </center>
          <center>
            <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" style="width:80%;display:none;" enctype="multipart/form-data">
              <div class="input-field">
                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                <table class="table table-bordered" id="table-field">
                  <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                  <tr>
                    <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" /> </td>
                  </tr>
                </table>
              </div>
              <br>
              <hr>
              <center>
                <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
              </center>
            </form>
          </center>

          <center>
            <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php?returnUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" style="width:80%;display:none;" enctype="multipart/form-data">
              <div class="input-field">
                <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                <table class="table table-bordered" id="table-field-link">
                  <tr>
                    <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required /> </td>
                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" /> </td>
                  </tr>
                </table>
              </div>
              <br>
              <hr>
              <center>
                <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
              </center>
            </form>
          </center>
        </div>

      </div>
    </div>
  </div>

  <script>
    function ClassSearchFile() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("ClassesSearchFile");
      filter = input.value.toUpperCase();
      table = document.getElementById("PhaseFileTableAll");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
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
    function ClassSearchAcademic() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("ClassesSearchAcademic");
      filter = input.value.toUpperCase();
      table = document.getElementById("AcademicFileTableAll");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
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
    $('.file_status').on('change', function() {
      var value = $(this).val();
      var id_files = $(this).data("values");
      var phase_id = $(this).data("values1");
      var userId = $(this).data("userid");
      var mainId = $(this).data("id");
      var courseCode = $(this).data("coursecode");
      var courseName = $(this).data("coursename");
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/chnage_status_phase_file.php',
        data: {
          value: value,
          id_files: id_files,
          phase_id: phase_id,
          userId: userId,
          mainId: mainId,
          courseCode: courseCode,
          courseName: courseName
        },
        success: function(response) {
          // alert(response);
          window.location.reload();

        }
      });
    });
  </script>

  <script>
    $('.file_statusAssignee').on('change', function() {
      var value = $(this).val();
      var id_files = $(this).data("values");
      var phase_id = $(this).data("values1");
      var userId = $(this).data("userid");
      var courseCode = $(this).data("coursecode");
      var courseName = $(this).data("coursename");
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/chnage_status_phase_file.php',
        data: {
          value1: value,
          id_files1: id_files,
          phase_id1: phase_id,
          userId: userId,
          courseCode: courseCode,
          courseName: courseName
        },
        success: function(response) {
          window.location.reload();

        }
      });
    });
  </script>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initial data
      var originalRows = document.querySelectorAll('.file-rows tr');

      // Add event listeners for filter changes
      document.getElementById('phaseFilter').addEventListener('change', filterFiles);
      document.getElementById('statusFilter').addEventListener('change', filterFiles);

      function filterFiles() {
        var phaseFilter = document.getElementById('phaseFilter').value;
        var statusFilter = document.getElementById('statusFilter').value;

        var rows = document.querySelectorAll('.file-rows tr');

        rows.forEach(function(row) {
          var phaseName = row.querySelector('td:nth-child(8) span').innerText.trim();
          var status = row.querySelector('td:nth-child(6) select').value.trim();

          // Debugging output
          console.log('Phase Filter:', phaseFilter);
          console.log('Phase Name:', phaseName);

          var phaseMatch = (phaseFilter.trim().toLowerCase() === 'all' || phaseName.trim().toLowerCase() === phaseFilter.trim().toLowerCase());
          var statusMatch = (statusFilter === 'all' || status === statusFilter);

          if (phaseMatch && statusMatch) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      }
    });
  </script>

   <script>
    // Function to keep track of the last clicked tab and store it in sessionStorage
    function storeLastClickedTab() {
      // Retrieve the last clicked tab ID from sessionStorage
      var storedTab = sessionStorage.getItem('lastClickedTab');

      // If there is a stored tab, activate it on page load
      if (storedTab !== null) {
        $('a#' + storedTab).tab('show');
      }

      // When a tab is clicked, set the last clicked tab to its ID and store it in sessionStorage
      $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
        var lastClickedTab = e.target.id;
        sessionStorage.setItem('lastClickedTab', lastClickedTab);
      });
    }

    // Function to stay on the last clicked tab after form submission
    function stayOnLastClickedTab() {
      // Retrieve the last clicked tab ID from sessionStorage
      var storedTab = sessionStorage.getItem('lastClickedTab');

      // When the form is submitted, stay on the last clicked tab
      $('form').submit(function() {
        // Perform form submission
        // ...
        console.log("lastClickedTab: " + lastClickedTab);
        // Activate the last clicked tab
        $('a#' + storedTab).tab('show');

        // Return false to prevent the form from submitting normally
        return false;
      });
    }

    // Call the functions on window load
    window.onload = function() {
      storeLastClickedTab();
      stayOnLastClickedTab();
    };
  </script>






  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

</html>