<!-- 
<li class="hs-has-mega-menu nav-item" style="position: relative;">
  <a style="font-size: x-large; margin-right:-10px;" id="testlandingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo BASE_URL;?>assets/svg/menuicon/menu1.png" style="height: 30px;"></a>
  <div class="hs-mega-menu dropdown-menu bg-light" aria-labelledby="testlandingsMegaMenu" style="width:800px; position: absolute; top: 100%; left: -740px;">
    <div class="row ps-2 pe-2">

      <div class="col-4 p-2 border d-none">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>Test/dashboard/dashboard.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/Academic.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark">Dashboard</span>

              </div>
            </div>
          </a>
        </div>

        <?php
                    if ($_SESSION['role'] == 'super admin') {
                        
                    
                    ?>


        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>Test/dashboard/dashboard.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/Academic.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark">Dashboard</span>

              </div>
            </div>
          </a>
        </div>



        <?php
      }
        ?>

        <?php
                    if ($_SESSION['role'] == 'student' || $_SESSION['role'] == 'instructor') {
                        
                    
                    ?>

        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>Test/studentpanel/alltestdetails.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/Academic.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark">My Result</span>

              </div>
            </div>
          </a>
        </div>
        <?php if($_SESSION['role'] == 'instructor'){ ?>
        <div class="col-4 p-2 border">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>Test/dashboard/dashboard.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/Academic.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark">Dashboard</span>

              </div>
            </div>
          </a>
        </div>
        <?php } ?>


        <?php
      }
        ?>
        <div class="col-4 p-2 border d-none">
          <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>Test/adminpanel/testdashboard.php">
            <div class="d-flex">
              <div class="flex-shrink-0">
                <span class="svg-icon svg-icon-sm text-primary">
                  <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/3d icons/Academic.png">
                </span>
              </div>

              <div class="flex-grow-1 ms-3">
                <span class="navbar-dropdown-menu-media-title text-dark">Dashboard</span>

              </div>
            </div>
          </a>
        </div>

  
    </div>

  </div>

</li> -->
