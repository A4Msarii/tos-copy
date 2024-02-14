<?php
include('./includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
if (isset($_SESSION['login_id'])) {
  $_SESSION['success'] = "Login Status : Active ";
  header("Location: includes/Pages/Home.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Title -->
  <title>Log In</title>

  <!-- Favicon -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                 initial-scale=1" />
  <link rel="icon" href="<?php echo BASE_URL; ?>TOS2.png">
  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
  <!-- CSS Front Template -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/boostrap.min.css" />
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
  <link href="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="<?php echo BASE_URL; ?>assets/css/swiper-bundle.min.css" rel="stylesheet" crossorigin="anonymous">


    <!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">


    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css">
  <style>
    .button {
      background: linear-gradient(176deg, rgba(255, 255, 255, 1) 0%, rgba(254, 188, 1, 1) 100%);
      border: 2px solid #D4AF37;
      font-size: large;
      font-weight: bold;

    }

    .inputformdata {
      border-radius: 5px;
      background: white;
      border: white;
    }

    *:focus {
      outline: none !important;
      background: white;
    }

    #toggle-password {
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      background: white;
      border: none;
      text-align: center;
      width: 50px;
    }

    #iconpassword {
      /*border-top-left-radius: 20px;
      border-end-start-radius: 20px;*/
      background: white;
      border: white;
    }

    .container-fluid {
      background-image: url('<?php echo BASE_URL; ?>assets/bgdark.png');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .btnicon:hover {
      background-color: #2f2c2ba3 !important;
      border: 3px solid white;
      box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px;
    }

    .btnicon {
      border-radius: 200px;
      height: 50px;
      width: 50px;
      border: none;
      box-shadow: rgba(0, 0, 0, 0.24) 11px 6px 10px 5px;
    }

    .onclickbtnicon {
      box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px;
      background-color: #2f2c2ba3 !important;
      border: 3px solid white;
      border-radius: 200px;
      height: 50px;
      width: 50px;
    }

    /*#loading-screen {
      position: absolute;
      height: 100vh;
      width: 100vw;
      background: white;
      z-index: 100000000;
    }*/

    .swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 400px;
      background: white;
      opacity: 0.5;
      border-radius: 40px;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
    }

    .swiper-slide-active {
      background-color: #f2f2f2 !important;
      color: #333 !important;
      opacity: 1;
    }

    /* Add this CSS for the screensaver content */
    #screensaver-content {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      background-color: white;
    }

    #screensaver-content img {
      max-width: 100%;
      max-height: 100%;
    }
     .text {
     text-align: center;
     font-size: 70px;
     font-weight: 600;
     font-family: 'Poppins', sans-serif;
     background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
     -webkit-background-clip: text;
     -webkit-text-fill-color: transparent;
   }
  
  </style>
</head>

<body class="body">

  <?php
  include 'includes/message.php';
  displayMSG();
  ?>
  <div class="container-fluid" id="index">
    <center>
    <div class="row justify-content-center" style="margin-left: 300px;">
      <div class="col-12 mx-auto">
        <?php include './login/alertbox.php'; ?>
     </div>
    </div>
  </center>
    <div class="row" style="margin-top: -30px;">
      <div class="col-md-6 d-flex align-items-center justify-content-center vh-100">
      <form action="<?php echo BASE_URL ?>logindata.php" method="POST">
          <div class="justify-content-center mb-5">
            <img src="<?php echo BASE_URL; ?>assets/tos55.png" class="d-block" style="height:70px;">
            <span style="color: white;float: inline-end;">Version : 2.7.0</span>
          </div>
         
          <div class="mb-3">
            <div class="input-group" id="password-container">
              <input class="inputformdata" style="width: 88%;" type="text" name="username" placeholder="User Id name" id="inputText"/>
              <a class="btn btn-outline-secondary text-black" id="iconpassword">
                <i class="bi bi-person-circle"></i>
              </a>
            </div>
          </div>

          <div class="mb-3">
            <div class="input-group" id="password-container">
              <input type="password" id="password" name="password" class="inputformdata" placeholder="Password" style="width: 88%;">
              <a class="btn btn-outline-secondary text-black" id="iconpassword">
                <i class="bi bi-file-lock2"></i>
              </a>
            </div>
          </div>
         
          <div class="mb-4 d-flex justify-content-center">
            <button type="submit" class="col-8 btn btn-outline-warning button text-black">Login</button>
           
          </div>
        </form>
      </div>
      <div class="col-md-6 d-flex align-items-center justify-content-center vh-100">
        <?php include './login/cardinfo.php'; ?>
      </div>
    </div>
  </div>

  <div class="container-fluid" id="screensaver-content" style="display:none;">
    <div class="swiffy-slider slider-nav-autoplay">
      <ul class="slider-container" id="screensaver-content-data">
         <!-- <div class="row">
           <h1></h1>
         </div>
         <div class="row" id="screensaver-content-data">
           
         </div> -->
      </ul>
      <div type="button" class="slider-nav"></div>
      <div type="button" class="slider-nav slider-nav-next"></div>

      <!-- <ul class="slider-indicators">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul> -->
    </div>
  </div>


  <!-- Modal -->
<div id="AppsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="AppsModalTitle" aria-hidden="true" style="background-color:#dee2e6;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AppsModalTitle">Select App</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo BASE_URL ?>logindata.php" method="POST">
      <input type="hidden" id="appName" name="appName" value="library" />
      <input type="hidden" id="outputText1" placeholder="Text Value" name="username">
        <input type="hidden" id="outputText2" placeholder="Password Value" name="password">
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
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
  </form>
    </div>
  </div>
</div>
<!-- End Modal -->

  <!-- Swiper JS -->
  <script src="<?php echo BASE_URL ?>/assets/vendor/fslightbox/index.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/swiper-bundle.min.js"></script>

   <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/maps/world.js"></script>

    <!-- JS Front -->
    <script src="<?php echo BASE_URL; ?>assets/js/theme.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance-charts.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/prism/prism.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/datatables.net.extensions/select/select.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/clipboard/dist/clipboard.min.js"></script>

  <script type="text/javascript">
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const toggleButton = document.getElementById('toggle-password');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.innerHTML = '<i class="bi bi-eye"></i>';
      } else {
        passwordInput.type = 'password';
        toggleButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
      }
    }

    $(document).ready(function() {
      $("#hideButton").click(function() {
        $("#hidedive").hide('slow');
      });
      setTimeout(function() {
        $("#hidedive").hide('slow');
      }, 5000);
    });

    $(".gradeSheet").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("gradeSheet")
    });
    $(".library").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("library")
    });
    $(".bri").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("bri")
    });
    $(".scheduling").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("scheduling")
    });
    $(".hotwash").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("hotwash")
    });
    $(".testpage").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("testpage")
    });
    $(".globalsearch").on("click", function() {
      $(".btnicon").removeClass("onclickbtnicon");
      $(this).addClass("onclickbtnicon");
      $("#appName").removeAttr("value");
      $("#appName").val("globalsearch")
    });
  </script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        stretch: 50,
        depth: 100,
        modifier: 3,
        slideShadows: true,
      },
      loop: true,
      autoplay: {
        delay: 3000, // Delay between slides in milliseconds
        disableOnInteraction: false, // Continue autoplay after user interaction
      },
    });
  </script>
<script>
  $(document).ready(function() {
    var timer; // Timer variable
    var slideCount; // Variable to store the number of slides

    function hideSlider() {
      $('#screensaver-content').slideUp();
      clearTimeout(timer); // Clear the timer
    }

    // Show slider after 10 seconds
    showSlider();

    function showSlider() {
      timer = setTimeout(function() {
        $.ajax({
          url: '<?php echo BASE_URL; ?>login/fetch_screensaver_image.php',
          method: 'GET',
          success: function(response) {
            $('#screensaver-content-data').html(response);
            slideCount = $('.slider-container li').length; // Get the number of slides
            generateIndicators(); // Call the function to generate indicators
          }
        });
        $('#screensaver-content').slideDown();
      }, 20000);
    }

    function generateIndicators() {
      var indicatorsHtml = '<ul class="slider-indicators">';
      for (var i = 0; i < slideCount; i++) {
        indicatorsHtml += '<li></li>';
      }
      indicatorsHtml += '</ul>';

      // Append indicators directly to the slider-nav element
      $('.slider-nav').after(indicatorsHtml);
    }

    $(document).on('click', function() {
      hideSlider();
      timer = setTimeout(hideSlider, 20000);
    });
  });
</script>

<script>
    $(document).ready(function () {
      $('#getValueButton').on('click', function () {
        var textValue = $('#inputText').val();
        var passwordValue = $('#password').val();
        
        // Set the values in the output textboxes
        $('#outputText1').val(textValue);
        $('#outputText2').val(passwordValue);
      });
    });
  </script>
  <!-- Add this script just before the closing </body> tag -->


</body>

</html>