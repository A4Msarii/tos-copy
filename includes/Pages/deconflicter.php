<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>Deconflicter</title>
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
          <h1 class="text-success">Deconflicter</h1>
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

            <!-- Body -->
            <div class="card-body">
              <!-- Nav -->
                <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="vehicletab-tab" href="#vehicletab" data-bs-toggle="pill" data-bs-target="#vehicletab" role="tab" aria-controls="vehicletab" aria-selected="true">
                      <div class="d-flex align-items-center">
                        Vehicle
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="planned-tab" href="#planned" data-bs-toggle="pill" data-bs-target="#planned" role="tab" aria-controls="planned" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Planned
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="unplanned-tab" href="#unplanned" data-bs-toggle="pill" data-bs-target="#unplanned" role="tab" aria-controls="unplanned" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Unplanned
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="attrition-tab" href="#attrition" data-bs-toggle="pill" data-bs-target="#attrition" role="tab" aria-controls="attrition" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Attrition
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

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->

            <!-- Body -->
            <div class="card-body">
              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="vehicletab" role="tabpanel" aria-labelledby="vehicletab-tab">
                  <?php include ROOT_PATH . 'includes/Pages/deconflicter/vehicletab.php'; ?>
                </div>

                <div class="tab-pane fade" id="planned" role="tabpanel" aria-labelledby="planned-tab">
                 <?php include ROOT_PATH . 'includes/Pages/deconflicter/plannedtab.php'; ?>
                </div>

                <div class="tab-pane fade" id="unplanned" role="tabpanel" aria-labelledby="unplanned-tab">
                 <?php include ROOT_PATH . 'includes/Pages/deconflicter/unplannedtab.php'; ?>
                </div>

                <div class="tab-pane fade" id="attrition" role="tabpanel" aria-labelledby="attrition-tab">
                  <?php include ROOT_PATH . 'includes/Pages/deconflicter/attritiontab.php'; ?>
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
    <!-- End Content -->

  </main>


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>