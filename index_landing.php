<?php
include('./includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
include ('./includes/message.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>

  <title>Login Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>tos.svg">

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

  <!-- CSS Front Template -->

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" />
  <link href="<?php echo BASE_URL; ?>assets/css/theme-dark.min.css" />
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
  <link href="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">

  <style>
    .testimonial-container {
      width: 300px;
      /* Adjust container width as needed */
      height: 900px;
      /* Adjust container height as needed */
      overflow: hidden;
    }

    .testimonial-slider {
      animation: testimonialScroll 8s linear infinite;
    }

    .testimonial {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px;
    }

    .testimonial img {
      width: 100px;
      /* Adjust image width as needed */
      height: 100px;
      /* Adjust image height as needed */
      border-radius: 50%;
      margin-bottom: 10px;
    }

    @keyframes testimonialScroll {
      0% {
        transform: translateY(0);
      }

      100% {
        transform: translateY(-100%);
      }
    }
  </style>

</head>

<body>

  <!--Navbar-->

  <nav class="navbar navbar-light bg-light">

    <div class="container-fluid">
      <a class="navbar-brand"><img src="<?php echo BASE_URL; ?>includes/Pages/tos.svg" style="width: 30px; height:30px;"><span style="font-size:large; font-weight:bold;">TOS</span></a>
      <div style="float: right; display:flex;">              
      
      <button data-bs-placement="bottom" title="Search" type="button" class="btn d-flex" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>includes/Pages/global_search.php" style="color: #71869d;">
                                <img src="<?php echo BASE_URL; ?>assets/svg/search/search.png" style="height:30px; width: 40px; margin: 3px;"></a>
                        </button>
                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>
      </div>
    </div>
  </nav>

  <br>

  <main class="main">
   
        <div class="container-fluid">
        <div id="land" style="width:100%;">
        <div class="row">
          <div class="col-3">
            <?php include 'includes/Pages/albumdiv.php'; ?>

          </div>
          <div class="col-9">
            <?php include 'includes/Pages/personaldiv.php'; ?>

            <!-- End Row -->

            <?php include 'includes/Pages/alertdiv.php'; ?>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </div>
  </main>
<br>
<br>
<br>
<br>
<br>
<br>

  <!-- Modal -->
  <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Login</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php include "login.php"; ?>
        </div>

      </div>
    </div>
  </div>

  <footer id="content1" class="footer" role="footer">

    <?php
    include(ROOT_PATH . 'includes/footer_tos.php');

    ?>

  </footer>
  <script src="<?php echo BASE_URL ?>/assets/vendor/fslightbox/index.js"></script>

  <script>
    $(".gradeSheet").on("click",function(){
      $("#appName").removeAttr("value");
      $("#appName").val("gradeSheet")
    });
    $(".library").on("click",function(){
      $("#appName").removeAttr("value");
      $("#appName").val("library")
    });
    $(".bri").on("click",function(){
      $("#appName").removeAttr("value");
      $("#appName").val("bri")
    });
    $(".scheduling").on("click",function(){
      $("#appName").removeAttr("value");
      $("#appName").val("scheduling")
    });
    $(".hotwash").on("click",function(){
      $("#appName").removeAttr("value");
      $("#appName").val("hotwash")
    });
  </script>
</body>


</html>