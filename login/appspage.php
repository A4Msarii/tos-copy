<?php
include('./includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Select Apps</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/test.png">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <?php 
  include (ROOT_PATH. 'Test/ts_loader.php');
  ?>
  <div id="header-hide" style="display:none;">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');

    
    ?>  
  </div>

  <!--Main contect We need to insert data here-->

  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
    </div>
  </div>
  <!-- End Content -->
 
  <!-- Content -->

  <div class="container-fluid" id="content" style="margin-top: -28rem;">

    <div class="row justify-content-center">  
      <div class="col-lg-12 mb-3">
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
          <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
            <h1 class="text-secondary">Select App</h1>
            
          </div>
          <div class="card-body">
            <center>
            <div class="mb-3">
              <button type="button" class="btnicon m-2 rediect gradeSheet bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
                <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:30px; width: 30px; margin: 2px;">
              </button>

              <button type="button" class="btnicon m-2 rediect library bg-light onclickbtnicon" data-bs-toggle="tooltip" data-bs-placement="right" title="Library">
                <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:35px; width: 35px; margin: 2px;filter: contrast(200%);">
              </button>

              <!-- <button type="button" class="btnicon m-2 rediect bri bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="BRI">
                <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:30px; width: 30px; margin: 2px;">
              </button> -->

              <button type="button" class="btnicon m-2 rediect scheduling bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Scedulling">
                <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:30px; width: 30px; margin: 2px;">
              </button>

              <!-- <button type="button" class="btnicon m-2 rediect hotwash bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Hotwash">
                <img src="<?php echo BASE_URL; ?>assets/svg/new/hotwash.png" style="height:30px; width: 30px; margin: 2px;">
              </button> -->

              <button type="button" class="btnicon m-2 rediect testpage bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Test">
                <img src="<?php echo BASE_URL; ?>assets/svg/new/test.png" style="height:30px; width: 30px; margin: 2px;">
              </button>

              <button type="button" class="btnicon m-2 rediect globalsearch bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="global search">
                <img src="<?php echo BASE_URL; ?>assets/approved/search.png" style="height:30px; width: 30px; margin: 2px;">
              </button>
            </div>
          </center>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>