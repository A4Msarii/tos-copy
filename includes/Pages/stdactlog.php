<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
$std_course = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Activity Log</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>



<div id="header-hide">
<?php
include(ROOT_PATH.'includes/head_navbar.php');
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
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Student_Activity.png">
          Student Activity Log</h1>
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
         <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
              <!--Student name And course name-->
              <?php include 'courcecode.php';?>
            </div>            <!-- End Header -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

        <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

            <!-- Body -->
            <div class="card-body">
              <form class="form-inline" method="POST" action="">
                <table>
                  <tr>
                    <td>
                      <label class="text-dark" style="font-weight:bold; font-size:large;">Date:</label>
                      <input style="margin:10px;" type="date" class="form-control text-dark" placeholder="Start"  name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
                    </td>
                    <td>
                      <label class="text-dark" style="font-weight:bold; font-size:large;">To:</label>
                      <input style="margin:10px" type="date" class="form-control text-dark" placeholder="End"  name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
                    </td>
                    <td>
                      <label></label>
                      <button style="margin-top:20px; margin-left: 10px;" class="btn btn-primary" name="search"><i class="bi bi-search"></i></button> </td>
                    <td>
                      <a style="margin-top:20px; margin-left:10px;" href="stdactlog.php" type="button" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i></a>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

       <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100">

            <!-- Body -->
            <div class="card-body">
              <div class="table">  
                  <table class="table table-bordered table-striped">
                    <thead class="bg-dark"> 
                      <tr>
                        <th class="text-white">Sr No</th>
                        <th class="text-white">Student Name</th>
                        <th class="text-white">Class Name</th>
                        <th class="text-white">Class Symbol</th>
                        <th class="text-white">Instructor Name</th>
                        <th class="text-white">CTP</th>
                        <th class="text-white">Time</th>
                        <th class="text-white">Date</th>
                        <th class="text-white">Percentage</th>
                        <th class="text-white">Grade</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include'filterrange.php'?>  
                    </tbody>
                  </table>
                </div>  
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