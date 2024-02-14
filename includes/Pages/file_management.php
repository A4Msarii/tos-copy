<?php
error_reporting(0);
ini_set('display_errors', 0);
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$page_type = "admin";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>File Management</title>
  <!-- <title>Phase</title> -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
<style type="text/css">
  @keyframes growProgressBar {

    0%,
    33% {
      --pgPercentage: 0;
    }

    100% {
      --pgPercentage: var(--value);
    }
  }

  @property --pgPercentage {
    syntax: '<number>';
    inherits: false;
    initial-value: 0;
  }

  div[role="progressbar"] {
    --size: 4rem;
    --fg: #369;
    --bg: #def;
    --pgPercentage: var(--value);
    animation: growProgressBar 3s 1 forwards;
    width: var(--size);
    height: var(--size);
    border-radius: 50%;
    display: grid;
    place-items: center;
    background:
      radial-gradient(closest-side, white 80%, transparent 0 99.9%, white 0),
      conic-gradient(var(--fg) calc(var(--pgPercentage) * 1%), var(--bg) 0);
    font-family: Helvetica, Arial, sans-serif;
    font-size: calc(var(--size) / 5);
    color: var(--fg);
  }

  div[role="progressbar"]::before {
    counter-reset: percentage var(--value);
    /* content: counter(percentage) '%'; */
  }

  #phase_form,
  #multipleFile,
  #filelink {
    display: none;
  }


  #name {
    width: 80%;
    height: 50px;
    border-radius: 5px;
    border: 1px solid #808080b3;
    font-size: 30px;
    color: #8b8f8f9e;
  }

  .button {
    float: right;
  }

  .varun {
    background-image: linear-gradient(to left, #553c9a, #b393d3);
  }

  .varun td {
    background-image: linear-gradient(to left, #553c9a, #b393d3) !important;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: rgb(141 141 85 / 20%) !important;
  }
</style>


<body>


    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  

  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
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
          <h1 class="text-success">File Management</h1>
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Data Page" style="color:black; text-decoration:none;" href="usersinfo.php"><i class="bi bi-arrow-left"></i></a>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -17rem;">


      <!--1st roww-->
      <div class="row justify-content-center">

        <div class="col-lg-8 mb-3 mb-lg-5" style="position:fixed; z-index: 9;">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd; background-color: #ebe8e8;">
            <!-- Body -->
            <div class="card-body">
              <br>
              <ul class="nav nav-pills justify-content-center" role="tablist" style="margin-top:-20px;">
                <li class="nav-item">
                  <a class="nav-link" id="file-tab" href="#file-one" data-bs-toggle="pill" data-bs-target="#file-one" role="tab" aria-controls="file-one" aria-selected="true">
                    <div class="d-flex align-items-center text-success" style="font-weight:bold;">
                      Files
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="briefcase-tab" href="#briefcase-one" data-bs-toggle="pill" data-bs-target="#briefcase-one" role="tab" aria-controls="briefcase-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success" style="font-weight:bold;">
                      Briefcase
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="folder-tab" href="#folder-one" data-bs-toggle="pill" data-bs-target="#folder-one" role="tab" aria-controls="folder-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success" style="font-weight:bold;">
                      Folder
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="shop-tab" href="#shop-one" data-bs-toggle="pill" data-bs-target="#shop-one" role="tab" aria-controls="shop-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success" style="font-weight:bold;">
                      Shop
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="" href="" data-bs-toggle="pill" data-bs-target="#-one" role="tab" aria-controls="-one" aria-selected="false">
                    <div class="d-flex align-items-center text-success" style="font-weight:bold;">
                      Canvas
                    </div>
                  </a>
                </li>
              </ul>
              <!-- End Nav -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->


      <!--1th row-->
      <div class="row justify-content-center" style="margin-top:150px;">


        <div class="col-lg-10 mb-3 mb-lg-5">
          
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Body -->
            <div class="card-body">

              <center>
                <!-- Tab Content -->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="file-one" role="tabpanel" aria-labelledby="file-tab">
                    <center>
                      <?php include ROOT_PATH . 'includes/Pages/filepage.php'; ?>
                    </center>
                  </div>

                  <div class="tab-pane fade" id="briefcase-one" role="tabpanel" aria-labelledby="briefcase-tab">
                    <center>
                      <?php include ROOT_PATH . 'includes/Pages/briefcasepage.php'; ?>
                    </center>
                  </div>

                  <div class="tab-pane fade" id="folder-one" role="tabpanel" aria-labelledby="folder-tab">
                    <center>
                      <?php include ROOT_PATH . 'includes/Pages/folderpage.php'; ?>
                    </center>
                  </div>

                  <div class="tab-pane fade" id="shop-one" role="tabpanel" aria-labelledby="shop-tab">
                    <center>
                      <?php include ROOT_PATH . 'includes/Pages/shoppage.php'; ?>
                    </center>
                  </div>

                  <div class="tab-pane fade" id="blackboard-one" role="tabpanel" aria-labelledby="blackboard-tab">
                    <center>
                      <div class="container-fluid">

                        <div class="row-12">
                          <div class="">
                            <h1>Black Board</h1>
                            <?php
                            include ROOT_PATH . 'Library/blackboard.php';
                            ?>
                          </div>
                        </div>
                      </div>
                    </center>
                  </div>
                  <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
          </div>

        </div>
        <!-- End Content -->

  </main>



  <div class="modal fade animate-zoom" id="url1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Copied!!!</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-field">
            <div class="view_url1"></div>
            <br>
          </div>


        </div>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JavaScript library -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- <script>
    $(document).ready(function() {
      $('#myCarousel').carousel();
    });
  </script> -->

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

  <script type="text/javascript">
    $(document).ready(function() {
      $(".next-button").click(function() {
        // Get the current tab
        var currentTab = $(this).closest(".tab-pane");

        // Get the ID of the next tab
        var nextTabId = currentTab.next(".tab-pane").attr("id");

        // Switch to the next tab
        $('a[href="#' + nextTabId + '"]').tab('show');
      });

      $(".previous-button").click(function() {
        // Get the current tab
        var currentTab = $(this).closest(".tab-pane");

        // Get the ID of the previous tab
        var prevTabId = currentTab.prev(".tab-pane").attr("id");

        // Switch to the previous tab
        $('a[href="#' + prevTabId + '"]').tab('show');
      });
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




  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
          <td style="text-align: center;"><input type="text" placeholder="Enter Locations" name="phase[]" id="phaseval" class="form-control" value="" required/> </td>\
          <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="phaseName[]" id="phasename" class="form-control" value=""/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_phase" id="remove_phase" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
      var max = 100;
      var a = 1;

      var html1 = '<tr>\
          <td style="text-align: center;"><input type="text" placeholder="Enter Locations" name="link[]" id="linkval" class="form-control" value="" required/> </td>\
          <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="linkName[]" id="linkName" class="form-control" value=""/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_link" id="remove_link" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'

      $("#add_phase").click(function() {
        if (a <= max) {
          $("#table-field").append(html);
          a++;
        }
      });

      $("#add_link").click(function() {
        if (a <= max) {
          $("#table-field-link").append(html1);
          a++;
        }
      });
      $("#table-field").on('click', '#remove_phase', function() {
        $(this).closest('tr').remove();
        a--;
      });
      $("#table-field-link").on('click', '#remove_link', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>



  <script type="text/javascript">
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
  </script>

  <script>
    function openInNewWindow(url) {
      window.open(url, '_blank');
    }
  </script>


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>

</body>

</html>