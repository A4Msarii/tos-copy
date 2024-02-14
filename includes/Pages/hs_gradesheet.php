<li class="hs-has-mega-menu nav-item" style="position: relative;">
  <div class="nav-link" id="landingsMegaMenu" aria-current="page" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-placement="bottom" title="Mega Menu" onmouseover="showMegaMenu()" onmouseout="hideMegaMenu()">
    <a style="font-size: x-large; margin-right: -10px;" href="#">
      <img src="<?php echo BASE_URL;?>assets/svg/menuicon/menu1.png" style="height: 30px;">
    </a>
  </div>

  <!-- Mega Menu -->
  <div class="hs-mega-menu dropdown-menu bg-light" id="megaMenu" style="width: auto; position: absolute; top: 100%; left: -925px;" onmouseover="showMegaMenu()" onmouseout="hideMegaMenu()">
    <div class="row ps-2 pe-2">


      <!-- Promo Link -->
      <?php if (!isset($_SESSION['permission']) || $permission['Task'] == "1") { ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/task.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Task</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/filled/Evaluation.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Evaluation</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Student Activity.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Activity</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/test.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Testing</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/filled/Emergancy Log.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Emergency</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Qual.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Qual</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/clearence.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Clearnace</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/CAP.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">CAP</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Memorandum Icon.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Memo</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/report.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Report</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/discipline.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Discipline</span>

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
                  <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/Quiz.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Quiz</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        <!-- End Promo Link -->
    
        <?php if (!isset($_SESSION['permission']) || $permission['course_details'] == "1") { ?>
      <div class="col-4 p-2 border">
        <!-- Promo Link -->
        <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/courseDetails.php">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <span class="svg-icon svg-icon-sm text-primary">
                <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/course.png">
              </span>
            </div>

            <div class="flex-grow-1 ms-3">
              <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Course Details</span>

            </div>
          </div>
        </a>
        <!-- End Promo Link -->
      </div>
      <?php } ?>
      <?php if (!isset($_SESSION['permission']) || $permission['landing_page'] == "1") { ?>
      <div class="col-4 p-2 border">
        <!-- Promo Link -->
        <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/landingpage.php">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <span class="svg-icon svg-icon-sm text-primary">
                <img style="height:25px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/page.png">
              </span>
            </div>

            <div class="flex-grow-1 ms-3">
              <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Landing Page</span>

            </div>
          </div>
        </a>
        <!-- End Promo Link -->
      </div>
      <?php } ?>
      <?php if (!isset($_SESSION['permission']) || $permission['checklist_pages'] == "1") { ?>
      <div class="col-4 p-2 border">
        <!-- Promo Link -->
        <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/checklistpage.php">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <span class="svg-icon svg-icon-sm text-primary">
                <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/priya/todo.png">
              </span>
            </div>

            <div class="flex-grow-1 ms-3">
              <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Todo's</span>

            </div>
          </div>
        </a>
        <!-- End Promo Link -->
      </div>
      <?php } ?>

    </div>





    <!-- End Promo Item -->
  </div>
  <!-- End Promo -->
  <script>
    function showMegaMenu() {
      document.getElementById("megaMenu").style.display = "block";
    }

    function hideMegaMenu() {
      document.getElementById("megaMenu").style.display = "none";
    }
  </script>
</li>