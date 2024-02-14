<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Class</title>
  <!-- <title>Phase</title> -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<style type="text/css">
  /*tr:hover {
    background-color: #accbec6b;
  }*/

  #file_form,
  #multipleFile {
    display: none;
  }

  .modal.fade .modal-dialog {
    animation: zoomIn 0.3s ease-out;
  }

  @keyframes zoomIn {
    from {
      transform: scale3d(0.3, 0.3, 0.3);
      opacity: 0;
    }

    50% {
      opacity: 1;
    }

    to {
      transform: scale3d(1, 1, 1);
    }
  }

  #fileadd:hover {
    background-color: #3a81be54;
    width: auto;
    height: 40px;
    border-radius: 5px;
  }

  #locationadd:hover {
    background-color: #3a81be54;
    width: auto;
    height: 40px;
    border-radius: 5px;
  }

  #linkadd:hover {
    background-color: #3a81be54;
    width: auto;
    height: 40px;
    border-radius: 5px;
  }

  #linkadd {
    margin-left: 12px;
  }

  ul,
  li {
    text-decoration: none;
  }

  #fileadd,
  #locationadd {
    margin-left: 15px;
    margin-bottom: -7px;
  }
</style>

<body>
  
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');

    if (isset($_GET['ctp'])) {
      //decode ctp name
      $_SESSION['class_ctp_value'] = $ctp = urldecode(base64_decode($_GET['ctp']));

      $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
      $statement = $connect->prepare($ctp_id);
      $statement->execute();
      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $course = $row['course'];
        }
      }
    } else if (isset($_SESSION['class_ctp_value'])) {
      $ctp = $_SESSION['class_ctp_value'];
      $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
      $statement = $connect->prepare($ctp_id);
      $statement->execute();
      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $course = $row['course'];
        }
      }
    } else {
      $course = "select course from sidebar";
    }

    //phase deocded
    if (isset($_GET['phase'])) {
      $phase = "";
      $_SESSION['class_phase_value'] = $phase = urldecode(base64_decode($_GET['phase']));
    } else if (isset($_SESSION['class_phase_value'])) {
      $phase = $_SESSION['class_phase_value'];
    } else {
      $phase = "";
    }
    if (isset($_GET['phase_id'])) {
      $phase_id = "";
      $_SESSION['class_phaseid_value'] = $phase_id = urldecode(base64_decode($_GET['phase_id']));
    } else if (isset($_SESSION['class_phaseid_value'])) {
      $phase_id = $_SESSION['class_phaseid_value'];
    } else {
      $phase_id = "select phase";
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
        <div class="page-header" style="padding: 0px; display:flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Phase Page" style="color:black; text-decoration:none;" href="Next-home.php"><i class="bi bi-arrow-left"></i></a>
          <h1 class="text-success" style="margin:5px;">Classes</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -17rem;">


      <!--1st roww-->
      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Body -->
            <div class="card-body">

              <h3 style="color:blue;"><?php
                                      echo $phase . ' / ' . $course; ?></h3>
              <br>
              <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="actual-tab" href="#actual-one" data-bs-toggle="pill" data-bs-target="#actual-one" role="tab" aria-controls="actual-one" aria-selected="true">
                    <div class="d-flex align-items-center text-success">
                      Actual <?php echo $type_name_dep ?>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="sim-tab" href="#sim-one" data-bs-toggle="pill" data-bs-target="#sim-one" role="tab" aria-controls="sim-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      Sim <?php echo $type_name_dep ?>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="academic-tab" href="#academic-one" data-bs-toggle="pill" data-bs-target="#academic-one" role="tab" aria-controls="academic-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      Academic
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="test-tab" href="#test-one" data-bs-toggle="pill" data-bs-target="#test-one" role="tab" aria-controls="test-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      Test
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="goal-tab" href="#goal-one" data-bs-toggle="pill" data-bs-target="#goal-one" role="tab" aria-controls="goal-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      Goals
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="resource-tab" href="#resource-one" data-bs-toggle="pill" data-bs-target="#resource-one" role="tab" aria-controls="resource-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                      Resource
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="academicNewAll-tab" href="#academicNewAll-one" data-bs-toggle="pill" data-bs-target="#academicNewAll-one" role="tab" aria-controls="academicNewAll-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success">
                    Assigment
                    </div>
                  </a>
                </li>
              </ul>
              <!-- <select class="form-control" name="role" required id="mark_type" value="Percentage Type">
                        <option selected value="">-select type-</option>
                        <option value="100">percentage type</option>
                    </select> -->
              <input type="text" name="role" id="mark_type" value="Percentage Type" class="form-control" required readonly>
              <!-- End Nav -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->


      <!--1th row-->
      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Body -->
            <div class="card-body">
                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- <div class="ayushi"> -->
                          <div class="tab-pane fade show active" id="actual-one" role="tabpanel" aria-labelledby="actual-tab">
                            <center>
                              <?php include 'actual_table.php'; ?>
                            </center>
                          </div>

                          <div class="tab-pane fade" id="sim-one" role="tabpanel" aria-labelledby="sim-tab">
                            <center>
                              <?php include 'sim_table.php'; ?>
                            </center>
                          </div>

                          <div class="tab-pane fade" id="academic-one" role="tabpanel" aria-labelledby="academic-tab">
                            <center>
                              <?php include 'academic_table.php'; ?>
                            </center>
                          </div>

                          <div class="tab-pane fade" id="test-one" role="tabpanel" aria-labelledby="test-tab">
                            <center>
                              <?php include 'test_table.php'; ?>
                            </center>
                          </div>

                          <div class="tab-pane fade" id="goal-one" role="tabpanel" aria-labelledby="goal-tab">
                            <center>
                              <?php include 'goals_table.php'; ?>
                            </center>
                          </div>

                          <div class="tab-pane fade" id="resource-one" role="tabpanel" aria-labelledby="resource-tab">
                            <center>
                              <?php include 'resource.php'; ?>
                            </center>
                          </div>
                           
                          <div class="tab-pane fade" id="academicNewAll-one" role="tabpanel" aria-labelledby="academicNewAll-tab">
                            <center>
                              <?php include 'academicnew.php'; ?>
                            </center>
                          </div>   
                    <!-- </div> -->
               </div>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
    </div>
    <!-- End Content -->

</main>


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
          <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php">
            <div class="input-field">
              <table class="table table-bordered">
                <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                <tr>
                  <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                    <input type="file" class="form-control" name="file[]" id="" multiple/>
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
          <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php" style="width:80%;display:none;" enctype="multipart/form-data">
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
          <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addworkingfile.php" style="width:80%;display:none;" enctype="multipart/form-data">
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
<!-- End Modal -->


<script type="text/javascript">
  $(document).on("change", ".fileOptWorking", function() {

    if ($(this).val() == "addFile") {
      $(".multipleFile").css("display", "block");
      $(".phase_form").css("display", "none");
      $(".filelink").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".file").css("display", "block");
    }

    if ($(this).val() == "addFileLoca") {
      $(".phase_form").css("display", "block");
      $(".multipleFile").css("display", "none");
      $(".filelink").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".file").css("display", "block");
    }
    if ($(this).val() == "addFileLink") {
      $(".phase_form").css("display", "none");
      $(".multipleFile").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".filelink").css("display", "block");
      $(".file").css("display", "block");
    }
  });
</script>



  <script>
    $(".get_text_value_tab").on("click", "button", function() {
      var id = $(this).attr('id');
      var text = $('.get_valueb' + id).text();
      //  alert('.get_valueb'+id);
      var temp = $("<input>");
      $("body").append(temp);
      temp.val(text).select();
      document.execCommand("copy");
      temp.remove();
      $('.get_text_value_tab').find("#" + id).find(".bi").removeClass("bi-files").addClass("bi-check-circle");
      $('.get_text_value_tab').find("#" + id).removeClass("btn-soft-primary").addClass("btn-soft-success");
      setTimeout(function() {
        $('.get_text_value_tab').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-files");
        $('.get_text_value_tab').find("#" + id).removeClass("btn-soft-success").addClass("btn-soft-primary");
      }, 2000);
    });
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

    // Call the functions on page load
    $(document).ready(function() {
      storeLastClickedTab();
      stayOnLastClickedTab();
    });


    $(document).on("change", "#fileOpt", function() {
      if ($(this).val() == "addFile") {
        $("#multipleFile").css("display", "block");
        $("#phase_form").css("display", "none");
        $("#filelink").css("display", "none");
        $("#newpageform").css("display", "none");
        $("#file").css("display", "block");
      }

      if ($(this).val() == "addFileLoca") {
        $("#phase_form").css("display", "block");
        $("#multipleFile").css("display", "none");
        $("#filelink").css("display", "none");
        $("#newpageform").css("display", "none");
        $("#file").css("display", "block");
      }
      if ($(this).val() == "addFileLink") {
        $("#phase_form").css("display", "none");
        $("#multipleFile").css("display", "none");
        $("#newpageform").css("display", "none");
        $("#filelink").css("display", "block");
        $("#file").css("display", "block");
      }


    });

    $(".txt_search").keyup(function() {
      var search = $(this).val();
      // alert(search);
      if (search != "") {

        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>Library/getPermissionSearch.php',
          data: {
            search: search,
          },
          success: function(response) {
            $(".tableData").show();
            $('.userDetail').empty();
            $('.userDetail').append(response);
            // console.log(response);

          }
        });
      } else {
        $('.searchResult').empty();
        $(".tableData").hide();
      }


    });
  </script>



  <!--Script for adding multiple academic classes-->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#mark_type').on('click', function() {

        var type = $(this).val();
        console.log(type);
        $(".type_value").val(type);
        $(".type").val('percentage');
      });
    });
  </script>




  <!--Script for search classes-->


  <!--Search for actual class-->

  <script>
    $(".copyLink").on("click", function() {
      setTimeout(copURL, 2000);
    });

    function copURL() {
      window.open("<?php echo BASE_URL; ?>openPageIllu.php", "_blank");
    }
  </script>




  <!-- <script>
    $(document).ready(function() {
      $(".file_form").css("display", "none");
      $(".multipleFile").css("display", "none");
    });

    $(".fileOpt").change(function() {
      $(".formTd").removeClass("check");
      $(this).parent().addClass("check");
      if ($(this).val() == "multipleFile") {
        $(".check .multipleFile").css("display", "block");
        $(".check .file_form").css("display", "none");
      }

      if ($(this).val() == "multipleFileLoca") {
        $(".check .file_form").css("display", "block");
        $(".check .multipleFile").css("display", "none");
      }
    });
  </script> -->

  <script>
    (function() {
      // INITIALIZATION OF SHOW ANIMATIONS
      // =======================================================
      new HSShowAnimation('.js-animation-link')
    });
  </script>
  <!--footer-->

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>



</html>