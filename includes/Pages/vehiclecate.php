<?php
include('../../includes/config.php');
include(ROOT_PATH.'includes/connect.php');
?><!DOCTYPE html>
<html>
<head>
	<title>Equipment Category</title>
  <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
                  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  


<div id="header-hide">
<?php
include(ROOT_PATH.'includes/head_navbar.php');
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
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
               <h3 class="text-success">Add Equipment Category</h3>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              

              
                <center>
                <form method="post" action="insert_vehicletype.php" style="width:80%;">
                  <label class="text-success">Equipment Category <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                  <input class="form-control" type="text" name="vehicletype1" value="">
                  <center>
                  <input style="margin:5px;" class="btn btn-success" type="submit" name="Submit" value="Submit">
                  </center>
                </form>
              </center>
              <center>
            <div style="height:50px; width:auto; text-align: center; background-color:#ededb9; width: fit-content;
    border-radius: 10px;
    margin: 10px;
    padding: 10px;">
            <i class="bi bi-info-square" style="    color: #111110;
    font-size: larger;
    font-weight: bold;
    margin-right: 5px;
    padding: 5px;"></i><span style="color: black;">Please Click On Next If You Don't Want to Create New Equipment Category</span></div>
            <div class="modal-footer">
              <button style="float:right; margin-top:5px;" class="btn btn-primary"><a style="color:white;" href="firstctp.php">Next</a></button>
            </div>
          </div>
          </center>
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
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html> 