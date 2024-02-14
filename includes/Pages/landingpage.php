<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Landing Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <style>
    .tooldata {
      display: none !important;
      position: absolute;
      left: 0px;
      top:-25px;
      background-color: black;
      color:white;
      width: auto;
      font-size: 15px !important;
      font-weight: normal;
    }
    .tooldata::before{
      content: '';
      height: 10px;
      width:10px;
      background: black;
      position: absolute;
      bottom: -4px;

      transform: rotate(45deg);
    }
    .maintool:hover .tooldata{
      display: block !important;
    }
  </style>
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
  <script src="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
  <link href="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>



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

      </div>

    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">
     

      <div class="row">
        <div class="col-3" style="height: 400px;overflow-y:auto;">
          <?php include 'albumdiv.php'; ?>
        </div>
        <div class="col-9">
          <?php include 'personaldiv.php'; ?>
          <!-- End Row -->
        </div>
        <div class="col-12">
          <?php include 'alertdiv.php'; ?>
        </div>
      </div>
      <!-- Card -->


      <!-- End Row -->
    </div>
    <!-- End Content -->
  </main>


  <script src="<?php echo BASE_URL ?>/assets/vendor/fslightbox/index.js"></script>
  

<script>
    $(document).ready(function(){
        $('.fslightbox-absoluted fslightbox-full-dimension').slick({
            autoplay: true,         // Enable autoplay
            autoplaySpeed: 3000,    // Set autoplay interval (in milliseconds)
            // Other Slick Slider options...
        });
    });
</script>
<script>
  $(document).ready(function () {   
    $(".altCat").on("click", function() {
      const altertId = $(this).attr("value");
      const altertMsg = $(this).attr("name");
      $.ajax({
        type: 'POST',
        url: "<?php echo BASE_URL; ?>includes/Pages/edit_alert.php",
        data: {
          altertId: altertId
        },
        dataType: "html",
  
        success: function(resultData) {
          // alert(resultData);
          $("#editAltData").empty();
          $("#alert_cate").html(altertMsg);
          $("#editAltData").html(resultData);
        }
      });
    });

    $(document).on('click','.toolajax',function(){
      var alert_id = $(this).data('alertid');
      $.ajax({
        type: 'POST',
        url: "<?php echo BASE_URL; ?>includes/Pages/fetch_alert.php",
        data: {altertId: alert_id},
        success: function(resultData) {
          $('.alerthtmlset').html(resultData);
        }
      });
    });
  });
</script>

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>