<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// session_start();
include("./fheader.php");
if (isset($_COOKIE["f_id"])) {
    $_SESSION['folderId'] = $_COOKIE["f_id"];
}

if(isset($_REQUEST['folder_ID'])){
    $_SESSION['folderId'] = $_REQUEST['folder_ID'];
}

if(isset($_REQUEST['shopId'])){
  $_SESSION['shopId'] = $_REQUEST['shopId'];
}
if(isset($_REQUEST['b_id'])){
    $_SESSION['b_id'] = $_REQUEST['b_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg">
    <title>new page</title>
</head>

<body onload="getses();">

<?php include(ROOT_PATH . 'Library/lb_loader.php')?>

    <!-- <center>
    <main style="width:80%; margin-left:290px; margin-top:10px;" >
         <a style="margin-right:1170px; display: none;" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Shelf Page" href="<?php echo BASE_URL; ?>Library/index.php"><i class="bi bi-arrow-left"></i></a>
    </main>
</center> -->
    <!-- <script>
        function getses() {
            var f_Id = sessionStorage.getItem('folder_id');
        };
    </script> -->
    <div>
    <div id="header-hide">
    <?php include(ROOT_PATH . 'Library/secondWindowHeader.php') ?>
</div>
   
</div>

<main id="content" role="main" class="main">


    <!-- Content -->
    <div class="content container-fluid" style="margin-left:120px; background-color:black;">
      <center>
      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5" style="margin-right:170px;">

            <!-- <div class="bg-success" id="message" style="width:100%; color:white; height:50px; padding:10px; border-radius: 5px; font-size:large;"></div> -->
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:1px solid black; background-color: black;">
            <!-- Body -->
            <div class="card-body">
             
              <div class="col" id="message">

              
                     
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

    </div>
</center>
</div>
</main>

</body>

</html>