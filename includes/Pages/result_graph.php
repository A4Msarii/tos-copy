<?php
header("HTTP/1.0 404 Not Found");
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// session_start();
// $_SESSION['page'] = 'grade sheet';
// $phase = "";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Home page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <?php include 'gs_thumbnail.php'; ?>

</head>

<style type="text/css">
    .dropdown-menu {
    display: none;
}

/* Show the dropdown menu when hovering over the button */
#seephaseclasses:hover + .dropdown-menu {
    display: block;
}

/* Keep the dropdown menu open when hovering over it */
.dropdown-menu:hover {
    display: block;
}
.dropdown-menu.above {
    transform-origin: top;
  }

  .dropdown-menu.above:before {
    content: "";
    position: absolute;
    border: 10px solid transparent;
    border-bottom-color: #fff;
    top: -20px;
    left: 10px;
    z-index: -1;
  }
  .card-subtitle {
    font-size: 1.1rem !important;
  }

  .tooltip-text {
    visibility: hidden;
    position: absolute;
    top: -40px;
    left: 10px;
    z-index: 2;
    width: auto;
    color: white;
    font-size: 12px;
    background-color: #192733;
    border-radius: 10px;
    padding: 10px 15px 10px 15px;
  }

  .circleig1 {
    height: 20px;
    width: 100%;
    position: absolute;
    display: inline-block;
    left: 0px;
    bottom: -18px;
    border-radius: 2px;
    /*    font-weight: bolder;*/
    /*    font-size: larger;*/
    color: white;
    font-family: cursive;
    background: darkcyan;
  }

  .tooltip-text::before {
    content: "";
    position: absolute;
    transform: rotate(45deg);
    background-color: #192733;
    padding: 5px;
    z-index: 1;
    top: 29px;
    left: 35px;
  }

  .btnFlip:hover .tooltip-text {
    visibility: visible;
  }

  .tooltip-text1 {
    visibility: hidden;
    position: absolute;
    top: -42px;
    left: 0px;
    z-index: 2;
    width: auto;
    color: white;
    font-size: 12px;
    background-color: #192733;
    border-radius: 10px;
    padding: 10px 15px 10px 15px;
  }

  .tooltip-text1::before {
    content: "";
    position: absolute;
    transform: rotate(45deg);
    background-color: #192733;
    padding: 5px;
    z-index: 1;
    top: 31px;
    left: 28px;
  }

  .btn-flip11:hover .tooltip-text1 {
    visibility: visible;
  }

  .chart--container {
    height: 100%;
    width: 100%;
    min-height: 530px;
  }
</style>

<body>
 
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  
  <!--Head Navbar-->
  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
    $_SESSION['page'] = 'grade sheet';
    $phase = "";
    ?>
  </div>

  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header page-header-light">
          <!-- <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Dashboard" style="color:black; text-decoration:none;" href="<?php echo BASE_URL;?>includes/Pages/Home.php"><i class="bi bi-arrow-left"></i></a> -->
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="col-sm-auto" style="text-align: center; margin: 10px;">
                  <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Dashboard" style="color:black; float: left; text-decoration:none;" href="<?php echo BASE_URL;?>includes/Pages/Home.php"><i class="bi bi-arrow-left"></i></a>
                    <ul class="nav nav-pills justify-content-center" role="tablist">

                      <li class="nav-item" style="border-radius: 20px;">
                        <a style="font-weight:bolder; font-size:large;" class="nav-link active" id="Metrix1-tab" href="#Metrix1" data-bs-toggle="pill" data-bs-target="#Metrix1" role="tab" aria-controls="Metrix1" aria-selected="false">
                          <div class="d-flex align-items-center">
                            Metrics
                          </div>
                        </a>
                      </li>
                       
                      <li class="nav-item" style="border-radius: 20px;">
                        <a style="font-weight:bolder; font-size:large;" class="nav-link" id="result-tab" href="#result" data-bs-toggle="pill" data-bs-target="#result" role="tab" aria-controls="result" aria-selected="false">
                          <div class="d-flex align-items-center">
                            Result
                          </div>
                        </a>
                      </li>

                    </ul>

                  </div>

            <!-- End Header -->


            <!-- Body -->
            <div class="card-body">


              <div class="tab-content">
                
                <div class="tab-pane fade show active" id="Metrix1" role="tabpanel" aria-labelledby="Metrix1-tab">
                  <?php 
                  if($fetchuser_id!=0){
                  include ROOT_PATH . 'includes/Pages/dashboard/matrix.php';
                  }else if($fetchuser_id==0){
                  include ROOT_PATH . 'includes/Pages/dashboard/all_matrix.php'; 
                  }
                  ?>
                </div>

                <div class="tab-pane fade" id="result" role="tabpanel" aria-labelledby="result-tab">
                  <?php 
                  if($fetchuser_id!=0){
                  include ROOT_PATH . 'includes/Pages/dashboard/resultpage.php';
                  }else if($fetchuser_id==0){
                  include ROOT_PATH . 'includes/Pages/dashboard/all_resultpage.php'; 
                  }
                  ?>
                </div>

              </div>

              <!-- End Card -->
            </div>
            <!-- End Content -->

  </main>
  <!-- ========== END MAIN CONTENT ========== -->
  <?php
  function getcall($mark_total, $cat_convert_val, $count_of_value)
  {


    $get_sum = $mark_total * $cat_convert_val;
    $get_all_count = $count_of_value * 100;
    $final_cal = $get_sum / $get_all_count;
    return $final_cal;
  }
  ?>
  <!-- ========== SECONDARY CONTENTS ========== -->


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>


 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>




</html>