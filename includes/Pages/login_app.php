<?php
session_start();
$role = $_SESSION['role'];
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Select App</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="icon" href="<?php echo BASE_URL; ?>assets/svg/tos.png">
</head>

<style>
  .button1 {
    background: linear-gradient(176deg, rgba(255, 255, 255, 1) 0%, rgba(254, 188, 1, 1) 100%);
    border: 2px solid #D4AF37 !important;
    font-size: x-large !important;
    font-weight: bold !important;

  }
  .container-fluid {
    background-image: url('<?php echo BASE_URL; ?>assets/bgdark.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  }

  .btnicon:hover {
    background-color: #a5a11d40 !important;
    border: 2px solid whitesmoke;
    box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px;
    height: 80px !important;
    width: 80px !important;
    padding: 10px !important;
  }

  .btnicon {
    border-radius: 200px;
    height: 80px !important;
    width: 80px !important;
    padding: 10px !important;
    margin: 10px;
    border: none;
    box-shadow: rgba(0, 0, 0, 0.24) 11px 6px 10px 5px;
    border: 1px solid #09101829;
    background-color: aliceblue;
  }

  .onclickbtnicon {
    box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px;
    background-color: #a5a11d40 !important;
    border: 3px solid white;
    border-radius: 200px;
    height: 50px;
    width: 50px;
  }
 

</style>

<body class="bg-light" style="background-image:none;">
  

  <div id="header-hide" style="display:none;">
    <?php
    include(ROOT_PATH . 'includes/head_navbar1.php');
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -30rem;height: 100vh;">
      <div class="row justify-content-center" style="text-align: -webkit-center;margin-top: 15rem;">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;width: max-content;background-color: white;">

            <div class="card-body h-100">
              <center>
                <form action="<?php echo BASE_URL;?>includes/Pages/check_app.php" method="POST">
                  <input type="hidden" id="appName" name="appName" value="library" />
                  <center>
                    <div class="mb-3" style="display:flex;">
                      <?php 
                        if (!isset($_SESSION['permission']) || $permission['course_phase_man_dashbirad'] != "1") {
                          ?>
                          <a href="<?php echo BASE_URL; ?>includes/Pages/Home.php" class="btnicon m-4 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
                        <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:50px; width: 50px; margin: 5px;">
                      </a>
                      <?php
                       } elseif(!isset($_SESSION['permission']) || $permission['course_phase_man_dashbirad'] == "1"){
                      
     ?>
                      <a href="<?php echo BASE_URL; ?>includes/Pages/dashboard/mydashboard.php" class="btnicon m-4 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
                        <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:50px; width: 50px; margin: 5px;">
                      </a>
                      <?php
                    }?>
                      
                      
                      <a href="<?php echo BASE_URL; ?>Library" class="btnicon m-4 rediect library onclickbtnicon" data-bs-toggle="tooltip" data-bs-placement="right" title="Library" style="height: auto;width: auto;">
                        <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:45px; width: 45px; margin: 5px;filter: contrast(200%);">
                      </a>

                      <a href="<?php echo BASE_URL; ?>Scheduling/home.php" class="btnicon m-4 rediect scheduling" data-bs-toggle="tooltip" data-bs-placement="right" title="Scheduling">
                        <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:50px; width: 50px; margin: 5px;">
                      </a>

                      <!-- <button type="button" class="btnicon m-2 rediect hotwash bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Hotwash">
                            <img src="<?php echo BASE_URL; ?>assets/svg/new/hotwash.png" style="height:30px; width: 30px; margin: 2px;">
                          </button> -->

                      <a href="<?php echo BASE_URL; ?>Test" class="btnicon m-4 rediect testpage" data-bs-toggle="tooltip" data-bs-placement="right" title="Test">
                        <img src="<?php echo BASE_URL; ?>assets/svg/new/test.png" style="height:50px; width: 50px; margin: 5px;">
                      </a>

                      <!-- <a href="<?php echo BASE_URL; ?>includes/Pages/sessionlogin.php" type="button" class="btnicon m-4 rediect bri" data-bs-toggle="tooltip" data-bs-placement="right" title="BRI">
                            <img src="<?php echo BASE_URL; ?>assets/svg/hr/hr1.png" style="height:45px; width: 40px; margin: 5px;">
                          </a> -->
                      
                      <a href="<?php echo BASE_URL; ?>includes/Pages/global_search.php" class="btnicon m-4 rediect globalsearch" data-bs-toggle="tooltip" data-bs-placement="right" title="global search">
                        <img src="<?php echo BASE_URL; ?>assets/approved/search.png" style="height:50px; width: 50px; margin: 5px;">
                      </a>
                    </div>
                  </center>
                  <!-- <center>
                    <input type="submit" class="btn btn-outline-warning button1 text-black" value="Login">
                  </center> -->
                </form>
              </center>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
    </div>

  </main>


  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script>
    $(".gradeSheet").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("gradeSheet")
    });
    $(".library").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("library")
    });
    $(".bri").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("bri")
    });
    $(".scheduling").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("scheduling")
    });
    $(".hotwash").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("hotwash")
    });
    $(".testpage").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("testpage")
    });
    $(".globalsearch").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("globalsearch")
    });
  </script>



</body>

</html>