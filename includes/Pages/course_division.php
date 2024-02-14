<?php
header("HTTP/1.0 404 Not Found");
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>Course Division</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

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

  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Select Division</h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>


    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">


            <!-- Body -->
            <div class="card-body">
            

              <div class="container">
                <div class="row">
                  <?php
                  $querydivision1 = "SELECT * FROM division_department where departmentId='$department_Id'";
                  $data_division1 = $connect->prepare($querydivision1);
                  $data_division1->execute();
                  $result_division = $data_division1->fetchAll();
                  foreach ($result_division as $key1) {
                    $department_Id1 = $key1['divisionId'];
                    $querydivision11 = "SELECT * FROM division where id='$department_Id1'";
                    $data_division11 = $connect->prepare($querydivision11);
                    $data_division11->execute();
                    $result_division1 = $data_division11->fetchAll();
                    foreach ($result_division1 as $dt) {
                      $id_div = $dt['id'];
                      $color3 = $dt['color'];
                      $dName = $dt['divisionName'];
                      $bURL = BASE_URL . "includes/Pages/setDivsion.php?divisionName=" . $dName . "&divisionColor=" . urlencode($color3) . "&id=" . $id_div ?>

                      <div class="col-3">
                        <div class="col-12 rounded ">
                          <a href="<?php echo $bURL; ?>">
                            <label class="data p-2 border text-white rounded" style="cursor:pointer;width:70%;background:<?php
                                                                                                                          if ($color3 == "") {
                                                                                                                            echo "gray";
                                                                                                                          } else {
                                                                                                                            echo $color3;
                                                                                                                          }
                                                                                                                          ?>;" for="flexCheckDefault">
                              <?php echo $dt['divisionName'] ?>
                            </label>
                          </a>
                        </div>
                      </div>


                  <?php  }
                  }
                  ?>
                </div>
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
  <!--Main contect We need to insert data here-->


  <script type="text/javascript" src="<?php echo BASE_URL; ?>includes/line_chart/js/Chart.min.js"></script>

  <script type="text/javascript" src="<?php echo BASE_URL; ?>includes/line_chart/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>includes/line_chart/js/Chart.min.js"></script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>