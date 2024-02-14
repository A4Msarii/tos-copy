<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Test</title>
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

    
    ?>  </div>



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
      <a href="<?php echo BASE_URL;?>Test/studentpanel/studentresult.php"><button type="button" class="btn btn-primary">Back to Result Page</button></a>
      <img src="<?php echo BASE_URL;?>assets/svg/exam/examdone.png" style="width: 1300px; height:900px">
    </div>

  </div>

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer" style="display:none;">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

</html>