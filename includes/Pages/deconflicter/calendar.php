<?php
$std_course = "";
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Calendar</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

 

</head>

<body>
  
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
          <h1 class="text-success">
            <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/calendar.png">
            Calendar
          </h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow" id="" style="border:0.001rem solid #dddddd;">

            <!-- Body -->
            <div class="card-body">
              <?php include ROOT_PATH . 'includes/Pages/deconflicter/calendarinfo.php';?>
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

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
  <!-- <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script> -->
</body>
</html>