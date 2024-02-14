<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>BRI</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/BRI.png">
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
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <!-- <div class="page-header page-header-light">
          <img style="height: 40px;" class="img-fluid" src="./assets/svg/logos/brief.svg" alt="SVG Illustration">
        </div> -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100">
            <!-- Header -->
            <div class="col-9 col-sm-5 mb-5 mb-sm-0">
            
          </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              	<div class="row justify-content-sm-between align-items-sm-center flex-grow-1">
			          <div class="col-9 col-sm-5 mb-5 mb-sm-0">
			            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/svg/comingsoon/comesoon.png" alt="SVG Illustration">
			          </div>
			          <!-- End Col -->

			          <div class="col-sm-6">
			            <!-- Heading -->
			            <div class="mb-4">
			            	<div class="page-header page-header-light">
						          <img src="<?php echo BASE_URL;?>assets/svg/new/BRI logo.svg" style="height:40px; width: 40px; margin: 5px;">
						          <span style="color:black; font-weight:bold;">BRIEF INTERACTIVE</span>
						        </div>
			              <!-- <h1 class="text-success">BRI</h1> -->
			              <h3>We're coming soon.</h3>
			              <p>Our website is under construction. We'll be here soon with our new awesome site, subscribe to be notified.</p>
			            </div>
			            <!-- End Heading -->
			            <!-- End Row -->

			            
			          </div>
			          <!-- End Col -->
			        </div>
        <!-- End Row -->
            </div>

            <div class="col" style="margin:5px;">
            	<div class="row align-items-md-center text-center text-md-start">
		        <div class="col-md mb-3 mb-md-0">
		          <h4 class="mb-0 text-success">© Msarii.com</h4>
		        </div>

		        <div class="col-md d-md-flex justify-content-md-end">
		          <!-- Socials -->
		          <ul class="list-inline mb-0">
		            <li class="list-inline-item">
		              <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="<?php echo BASE_URL;?>index.php">
		                <img src="<?php echo BASE_URL;?>assets/svg/new/GS logo.svg" style="height:15px; width: 15px; margin: 3px;">
		              </a>
		            </li>
		            <li class="list-inline-item">
		              <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="<?php echo BASE_URL;?>apps-bri.php">
		                <img src="<?php echo BASE_URL;?>assets/svg/new/BRI logo.svg" style="height:15px; width: 15px; margin: 5px;">
		              </a>
		            </li>
		            <li class="list-inline-item">
		              <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="<?php echo BASE_URL;?>apps-library.php">
		                <img src="<?php echo BASE_URL;?>assets/svg/new/L logo.svg" style="height:15px; width: 15px; margin: 3px;">
		              </a>
		            </li>
		            <li class="list-inline-item">
		              <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="<?php echo BASE_URL;?>apps-scheduling.php">
		                <img src="<?php echo BASE_URL;?>assets/svg/new/S logo.svg" style="height:15px; width: 15px; margin: 3px;">
		              </a>
		            </li>
		            <li class="list-inline-item">
		              <a class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="<?php echo BASE_URL;?>apps-hotwash.php">
		                <img style="height:25px; width:25px;" src="<?php echo BASE_URL;?>assets/svg/2D icons PNG/new/MicrosoftTeams-image (21).png">
		              </a>
		            </li>
		          </ul>
		          <!-- End Socials -->
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


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>
</html>