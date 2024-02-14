<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

?>

<!DOCTYPE html>
<html>

<head>
  <title>Template</title>
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

  ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">
<?php include("php_value_gradesheet.php"); ?>
  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">Template</h1>
        
      </div>
      <!-- End Page Header -->
    </div>
  </div>
  <!-- End Content -->

  <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
                    <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
                <form>
                    
                </form>
</div></div></div></div></div></div></div>
  <!-- End Content -->

</main>



  
<script>
    document.getElementById('select-all-u').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="radio"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>


 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>