<?php
header("HTTP/1.0 404 Not Found");
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// session_start();
// $_SESSION['page'] = 'grade sheet';
// $phase = "";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Main Library</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <?php include 'gs_thumbnail.php'; ?>

</head>

<style type="text/css">
/**/
  .card-subtitle {
    font-size: 1.1rem !important;
  }

  .tooltip-text {
    visibility: hidden;
    position: absolute;
    top: -40px;
    left: 10px;
    z-index: 2;
    width: auto;
    color: white;
    font-size: 12px;
    background-color: #192733;
    border-radius: 10px;
    padding: 10px 15px 10px 15px;
  }

  .circleig1 {
    height: 20px;
    width: 100%;
    position: absolute;
    display: inline-block;
    left: 0px;
    bottom: -18px;
    border-radius: 2px;
    /*    font-weight: bolder;*/
    /*    font-size: larger;*/
    color: white;
    font-family: cursive;
    background: darkcyan;
  }

  .tooltip-text::before {
    content: "";
    position: absolute;
    transform: rotate(45deg);
    background-color: #192733;
    padding: 5px;
    z-index: 1;
    top: 29px;
    left: 35px;
  }

  .btnFlip:hover .tooltip-text {
    visibility: visible;
  }

  .tooltip-text1 {
    visibility: hidden;
    position: absolute;
    top: -42px;
    left: 0px;
    z-index: 2;
    width: auto;
    color: white;
    font-size: 12px;
    background-color: #192733;
    border-radius: 10px;
    padding: 10px 15px 10px 15px;
  }

  .tooltip-text1::before {
    content: "";
    position: absolute;
    transform: rotate(45deg);
    background-color: #192733;
    padding: 5px;
    z-index: 1;
    top: 31px;
    left: 28px;
  }

  .btn-flip11:hover .tooltip-text1 {
    visibility: visible;
  }

  .chart--container {
    height: 100%;
    width: 100%;
    min-height: 530px;
  }
  svg#SvgjsSvg2815
  {
    background-color: yellow !important;
  }
  .nav-link.aaaa.active {
    background-color: #67778833 !important; /* Set your desired background color */
  }
  .nav-link.aaaa
  {
    font-weight:bolder; 
    font-size:large;
    background: aliceblue;
  }
  /* Animation property */
#selectStudent {
  animation: wiggle 2s linear infinite;
}

/* Keyframes */
@keyframes wiggle {
  0%, 7% {
    transform: rotateZ(0);
  }
  15% {
    transform: rotateZ(-15deg);
  }
  20% {
    transform: rotateZ(10deg);
  }
  25% {
    transform: rotateZ(-10deg);
  }
  30% {
    transform: rotateZ(6deg);
  }
  35% {
    transform: rotateZ(-4deg);
  }
  40%, 100% {
    transform: rotateZ(0);
  }
}

#selectStudent {
  
  height: 4em;
  width: max-content;
  
  background: #444;
  background: linear-gradient(top, #555, #333);
  border: none;
  border-top: 3px solid orange;
  border-radius: 0 0 0.2em 0.2em;
  color: #fff;
  font-family: Helvetica, Arial, Sans-serif;
  font-size: 2em;
  transform-origin: 50% 5em;
}
</style>

<body>
<!-- <a href="export_to_excel.php" target="_blank">Export to Excel</a> -->

 
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  
  <!--Head Navbar-->
  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
    $_SESSION['page'] = 'grade sheet';
    $phase = "";
    ?>
  </div>

  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">

    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">


            <!-- Body -->
            <div class="card-body">
                <?php include(ROOT_PATH . "Library/mainlib.php"); ?>
              
            </div>
          </div>
          </div>

          </div>
        </div>
            <!-- End Content -->

  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->



  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>