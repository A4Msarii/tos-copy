<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Test</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

<body>
  <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
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
          <h1 class="text-success">Test Result</h1>
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
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
             <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-borderless table-thead-bordered table-align-middle card-table table-hover" id="all-test-table">
                    <input style="border-radius:0px !important;" class="form-control" type="text" id="alltestsearch" onkeyup="testsearch()" placeholder="Search for Test name.." title="Type in a name"><br>
                    <thead class="thead-light">
                      <tr>
                        <th><span style="font-size:large; font-weight:bold;">Test name</span></th>
                        <th><span style="font-size:large; font-weight:bold;">Students</span></th>
                        <!-- <th>Spent</th>
                        <th>Hours</th> -->
                        <th><span style="font-size:large; font-weight:bold;">Completion</span></th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>
                          <a class="d-flex align-items-center" href="<?php echo BASE_URL;?>Test/adminpanel/testdetails.php">
                            <div class="flex-shrink-0">
                              <!-- <img class="avatar avatar-sm" src="./assets/svg/brands/spec-icon.svg" alt="Image Description"> -->
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <span class="d-block h5 text-inherit mb-0">MCQ Test</span>
                            </div>
                          </a>
                        </td>
                        <td>
                          <!-- Avatar Group -->
                          <div class="avatar-group avatar-group-xs avatar-circle">
                            <a class="avatar" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Amanda Harvey">
                              <img class="avatar-img" src="<?php echo BASE_URL;?>includes/Pages/upload/Donna.png" alt="Image Description">
                            </a>
                            <a class="avatar" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                              <img class="avatar-img" src="<?php echo BASE_URL;?>includes/Pages/upload/Donna.png" alt="Image Description">
                            </a>
                            <a class="avatar avatar-soft-info" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Lisa Iston">
                              <span class="avatar-initials">L</span>
                            </a>
                            <a class="avatar avatar-light avatar-circle" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Lewis Clarke, Chris Mathew and 3 more">
                              <span class="avatar-initials">+5</span>
                            </a>
                          </div>
                          <!-- End Avatar Group -->
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="mb-0 me-2">26%</span>
                            <div class="progress table-progress">
                              <div class="progress-bar" role="progressbar" style="width: 26%" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <a class="d-flex align-items-center" href="./project.html">
                            <div class="flex-shrink-0">
                              <!-- <img class="avatar avatar-sm" src="./assets/svg/brands/mailchimp-icon.svg" alt="Image Description"> -->
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <span class="d-block h5 text-inherit mb-0">True and False <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Earned extra bonus"></i></span>
                            </div>
                          </a>
                        </td>
                        <td>
                          <!-- Avatar Group -->
                          <div class="avatar-group avatar-group-xs avatar-circle">
                            <a class="avatar" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Costa Quinn">
                              <img class="avatar-img" src="<?php echo BASE_URL;?>includes/Pages/upload/Donna.png" alt="Image Description">
                            </a>
                            <a class="avatar" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Clarice Boone">
                              <img class="avatar-img" src="<?php echo BASE_URL;?>includes/Pages/upload/Donna.png" alt="Image Description">
                            </a>
                            <a class="avatar avatar-soft-danger" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Adam Keep">
                              <span class="avatar-initials">A</span>
                            </a>
                          </div>
                          <!-- End Avatar Group -->
                        </td>
                        
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="mb-0 me-2">100%</span>
                            <div class="progress table-progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                      </tr>

                      

                      <tr>
                        <td>
                          <a class="d-flex align-items-center" href="./project.html">
                            <div class="flex-shrink-0">
                              <!-- <img class="avatar avatar-sm" src="./assets/svg/brands/atlassian-icon.svg" alt="Image Description"> -->
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <span class="d-block h5 text-inherit mb-0">Diagram Test<i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Earned extra bonus"></i></span>
                            </div>
                          </a>
                        </td>
                        <td>
                          <!-- Avatar Group -->
                          <div class="avatar-group avatar-group-xs avatar-circle">
                            <a class="avatar" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Costa Quinn">
                              <img class="avatar-img" src="<?php echo BASE_URL;?>includes/Pages/upload/Donna.png" alt="Image Description">
                            </a>
                            <a class="avatar" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Clarice Boone">
                              <img class="avatar-img" src="<?php echo BASE_URL;?>includes/Pages/upload/Donna.png" alt="Image Description">
                            </a>
                            <a class="avatar avatar-soft-danger" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Adam Keep">
                              <span class="avatar-initials">A</span>
                            </a>
                          </div>
                          <!-- End Avatar Group -->
                        </td>
                        
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="mb-0 me-2">100%</span>
                            <div class="progress table-progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <a class="d-flex align-items-center" href="./project.html">
                            <div class="flex-shrink-0">
                              <!-- <img class="avatar avatar-sm" src="./assets/svg/brands/google-webdev-icon.svg" alt="Image Description"> -->
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <span class="d-block h5 text-inherit mb-0">HTML Test</span>
                            </div>
                          </a>
                        </td>
                        <td>
                          <!-- Avatar Group -->
                          <div class="avatar-group avatar-group-xs avatar-circle">
                            <a class="avatar" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Amanda Harvey">
                              <img class="avatar-img" src="<?php echo BASE_URL;?>includes/Pages/upload/Donna.png" alt="Image Description">
                            </a>
                            <a class="avatar" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                              <img class="avatar-img" src="<?php echo BASE_URL;?>includes/Pages/upload/Donna.png" alt="Image Description">
                            </a>
                            <a class="avatar avatar-soft-info" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Lisa Iston">
                              <span class="avatar-initials">L</span>
                            </a>
                            <a class="avatar avatar-light avatar-circle" href="./user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Lewis Clarke, Chris Mathew and 3 more">
                              <span class="avatar-initials">+5</span>
                            </a>
                          </div>
                          <!-- End Avatar Group -->
                        </td>
                        
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="mb-0 me-2">42%</span>
                            <div class="progress table-progress">
                              <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>

        </div>
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

</body>


</html>