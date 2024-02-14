<?php
include('./includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
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

</head>

<body>

  <!--Navbar-->

  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand"><img src="<?php echo BASE_URL; ?>includes/Pages/tos.svg" style="width: 30px; height:30px;"><span style="font-size:large; font-weight:bold;">TOS</span></a>


      <button class="btn btn-outline-success d-flex" type="button" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>

    </div>
  </nav>

  <br>

  <main class="main">
    <div id="info-login">
      <?php
      if (isset($_REQUEST['error'])) {
        $error = $_REQUEST['error'];
        echo $error;
      }
      ?>
    </div>
    <?php include "login_content/grid.php"; ?>
  </main>


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
    include(ROOT_PATH . 'includes/footer2.php');

    ?>

  </footer>

</body>

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

</html>