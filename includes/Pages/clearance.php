<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Clearance Log</title>
 <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width,
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
include ROOT_PATH . 'includes/head_navbar.php';

?>
</div>
<!--Fetching item info in this container-->
<!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
     <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px; display:flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" style="color:black; text-decoration:none;" href="clearance_data.php"><i class="bi bi-arrow-left"></i></a><h1 class="text-success">
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Clearence_Log.png">
          Clearance Log</h1>
          
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
     <div class="content container-fluid" style="margin-top: -18rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
              <!--Student name And course name-->
              <?php include 'courcecode.php';?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              
                 <!--  <center>
              <button style="margin:5px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#item-bank" id="student_details">
              <i class="fas fa-plus-hexagon"></i>ADD
              </button></center> -->

              <?php include ROOT_PATH . 'includes/Pages/clearancetable.php';?>
            <center>



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

 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>