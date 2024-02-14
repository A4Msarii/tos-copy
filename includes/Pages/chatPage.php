<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$user_id = $_SESSION['login_id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatbox</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>includes/Pages/tos.svg">

</head>

<body>

<?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>


<div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/chatheader.php');
    ?>
  </div>

  <main id="content" role="main" class="main" style="padding-left:0px !important;">

      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <!-- <div class="page-header page-header-light">
          <h1 style="color:black;">DashBoard</h1>
        </div> -->
        <!-- End Page Header -->
      </div>


    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">
      <div class="row">

          <div class="col-lg-12 col-lg-6 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
              <div class="card-body">
                <!-- <h6 class="card-subtitle"><a class="text-success"><h1></h1></a></h6>
                <hr class="text-success"> -->

                <div class="row align-items-center gx-2 mb-2">
                  <div class="col-12">
                    
                    <?php include ROOT_PATH . 'chatbox/chatmain.php'; ?>
                  </div>
              </div>
            </div>
            <!-- End Card -->
          </div>

        </div>
    </div>
  </div>
</main>
 
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>