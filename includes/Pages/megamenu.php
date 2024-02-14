
<div class="dropdown">
                            <div class="dropdown">
                                <button style="font-size:x-large;" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="testpan" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                    <i class="bi bi-list"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="testpan" style="width: 16rem;">
                                    <div class="dropdown-item-text">
                                        <div class="d-flex align-items-center">
                                            <div class="hs-mega-menu dropdown-menu" aria-labelledby="landingsMegaMenu" style="width:1000px; margin-left:200px;">
    <div class="row ps-2 pe-2">
      <!-- Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['actual'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/actual.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/filled/Actual class.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Actual <?php echo $type_name_dep ?></span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->

      <!-- End Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['sim'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/sim.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/simulation.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Sim <?php echo $type_name_dep ?></span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->



      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Academic'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/academic.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/Academic.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Academic</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->

    
      <!-- Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Task'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/task.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Task</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->

      <!-- End Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['evaluation'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/evaluation.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/filled/Evaluation.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Evaluation</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->



      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Student'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/stdactlog.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Student Activity.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Activity</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->

    
      <!-- Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Testing'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/testing.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/test.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Testing</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->

      <!-- End Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Emergency'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/emergency.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/filled/Emergancy Log.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Emergency</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->



      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Qual'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/qual.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Qual.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Qual</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->

    
      <!-- Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Clearance'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/clearance.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/clearence.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Clearnace</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->

      <!-- End Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['CAP'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/CAP.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/CAP.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">CAP</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->



      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Memo'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/memo.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Memorandum Icon.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Memo</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->


    
      <!-- Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Report'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/classreport.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/report.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Report</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->

      <!-- End Promo Item -->

      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Discipline'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/discipline.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/discipline.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Discipline</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->



      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Quiz'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/quiz.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Quiz.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title">Quiz</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->
    

      <div class="col-4 p-2 border">
        <!-- Promo Link -->
        <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/courseDetails.php">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <span class="svg-icon svg-icon-sm text-primary">
                <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/course.png">
              </span>
            </div>

            <div class="flex-grow-1 ms-3">
              <span class="navbar-dropdown-menu-media-title">Course Details</span>

            </div>
          </div>
        </a>
        <!-- End Promo Link -->
      </div>

      <div class="col-4 p-2 border">
        <!-- Promo Link -->
        <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/landingpage.php">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <span class="svg-icon svg-icon-sm text-primary">
                <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Quiz.png">
              </span>
            </div>

            <div class="flex-grow-1 ms-3">
              <span class="navbar-dropdown-menu-media-title">Landing Page</span>

            </div>
          </div>
        </a>
        <!-- End Promo Link -->
      </div>
      <div class="col-4 p-2 border">
        <!-- Promo Link -->
        <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/checklistpage.php">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <span class="svg-icon svg-icon-sm text-primary">
                <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Quiz.png">
              </span>
            </div>

            <div class="flex-grow-1 ms-3">
              <span class="navbar-dropdown-menu-media-title">Checklist</span>

            </div>
          </div>
        </a>
        <!-- End Promo Link -->
      </div>
    </div>





    <!-- End Promo Item -->
  </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>