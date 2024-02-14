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
<html lang="en">

<head>
  <!-- Required Meta Tags Always Come First -->


  <!-- Title -->
  <title>Log In</title>

  <!-- Favicon -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>tos.svg">

  <!-- Font -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"> -->

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

  <!-- CSS Front Template -->

  <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <style data-hs-appearance-onload-styles>
    * {
      transition: unset !important;
    }

    body {
      opacity: 0;
    }
  </style>

  <script>
    window.hs_config = {
      "autopath": "@@autopath",
      "deleteLine": "hs-builder:delete",
      "deleteLine:build": "hs-builder:build-delete",
      "deleteLine:dist": "hs-builder:dist-delete",
      "previewMode": false,
      "startPath": "/index.html",
      "vars": {
        "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
        "version": "?v=1.0"
      },
      "layoutBuilder": {
        "extend": {
          "switcherSupport": true
        },
        "header": {
          "layoutMode": "default",
          "containerMode": "container-fluid"
        },
        "sidebarLayout": "default"
      },
      "themeAppearance": {
        "layoutSkin": "default",
        "sidebarSkin": "default",
        "styles": {
          "colors": {
            "primary": "#377dff",
            "transparent": "transparent",
            "white": "#fff",
            "dark": "132144",
            "gray": {
              "100": "#f9fafc",
              "900": "#1e2022"
            }
          },
          "font": "Inter"
        }
      },
      "languageDirection": {
        "lang": "en"
      },
      "skipFilesFromBundle": {
        "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "assets/js/demo.js"],
        "build": ["assets/css/theme.css", "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js", "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css", "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js", "assets/js/demo.js"]
      },
      "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
      "copyDependencies": {
        "dist": {
          "*assets/js/theme-custom.js": ""
        },
        "build": {
          "*assets/js/theme-custom.js": "",
          "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
        }
      },
      "buildFolder": "",
      "replacePathsToCDN": {},
      "directoryNames": {
        "src": "./src",
        "dist": "./dist",
        "build": "./build"
      },
      "fileNames": {
        "dist": {
          "js": "theme.min.js",
          "css": "theme.min.css"
        },
        "build": {
          "css": "theme.min.css",
          "js": "theme.min.js",
          "vendorCSS": "vendor.min.css",
          "vendorJS": "vendor.min.js"
        }
      },
      "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
    }
    window.hs_config.gulpRGBA = (p1) => {
      const options = p1.split(',')
      const hex = options[0].toString()
      const transparent = options[1].toString()

      var c;
      if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
        c = hex.substring(1).split('');
        if (c.length == 3) {
          c = [c[0], c[0], c[1], c[1], c[2], c[2]];
        }
        c = '0x' + c.join('');
        return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
      }
      throw new Error('Bad Hex');
    }
    window.hs_config.gulpDarken = (p1) => {
      const options = p1.split(',')

      let col = options[0].toString()
      let amt = -parseInt(options[1])
      var usePound = false

      if (col[0] == "#") {
        col = col.slice(1)
        usePound = true
      }
      var num = parseInt(col, 16)
      var r = (num >> 16) + amt
      if (r > 255) {
        r = 255
      } else if (r < 0) {
        r = 0
      }
      var b = ((num >> 8) & 0x00FF) + amt
      if (b > 255) {
        b = 255
      } else if (b < 0) {
        b = 0
      }
      var g = (num & 0x0000FF) + amt
      if (g > 255) {
        g = 255
      } else if (g < 0) {
        g = 0
      }
      return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
    }
    window.hs_config.gulpLighten = (p1) => {
      const options = p1.split(',')

      let col = options[0].toString()
      let amt = parseInt(options[1])
      var usePound = false

      if (col[0] == "#") {
        col = col.slice(1)
        usePound = true
      }
      var num = parseInt(col, 16)
      var r = (num >> 16) + amt
      if (r > 255) {
        r = 255
      } else if (r < 0) {
        r = 0
      }
      var b = ((num >> 8) & 0x00FF) + amt
      if (b > 255) {
        b = 255
      } else if (b < 0) {
        b = 0
      }
      var g = (num & 0x0000FF) + amt
      if (g > 255) {
        g = 255
      } else if (g < 0) {
        g = 0
      }
      return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
    }
  </script>
</head>

<body>
  <script src="loading.js"></script>
  <div id="loading-screen" style="display:none; height: 1000%;">
    <div id="loading-spinner" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-image: url('tos.svg'); background-repeat: no-repeat; background-size:100px; background-position:center;">
      <div class="spinner-border" style="height:300px; width:300px;">
        <!-- <img class="spinner-border" style="height:500px; width:500px;" src="tos.svg"> -->
      </div>
    </div>
  </div>
  <script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance.js"></script>

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    <?php
    include 'includes/message.php';
    displayMSG();
    ?>
    <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem; background-image: url(./assets/svg/components/card-6.svg);">
      <!-- Shape -->
      <div class="shape shape-bottom zi-1">
        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
          <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
        </svg>
      </div>
      <!-- End Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
      <a class="d-flex justify-content-center mb-5" href="<?php echo BASE_URL; ?>index.html">
        <img class="zi-2" src="<?php echo BASE_URL; ?>tos.png" alt="Image Description" style="width: 15rem;">
      </a>

      <div class="mx-auto" style="max-width: 30rem;">
        <!-- Card -->
        <div class="card card-hover-shadow card-lg mb-5">
          <div class="card-body">
            <!-- Form -->


            <form action="logindata.php" method="POST">
              <input type="hidden" id="appName" name="appName" value="library" />

              <div class="mb-4">
                <label class="form-label" for="username">Your UserId</label>
                <input class="form-control" type="text" class="login-input" name="username" placeholder="User Id" autofocus="true" />
                <span class="invalid-feedback">Please enter a valid userid</span>
              </div>

              <div class="mb-4">
                <label class="form-label" for="password" name="password">Password</label><br>
                <input class="form-control" type="password" id="myInput" class="login-input" name="password" placeholder="Password" />
                <!-- <a class="form-label-link" href="./page-reset-password.html">Forgot Password?</a> -->
              </div>
              <div class="mb-4">
                <input type="checkbox" onclick="myFunction()"> Show Password
              </div>
              <hr>
              <div class="mb-4">
                <center>
                  <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle m-2 rediect gradeSheet " data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
                    <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:20px; width: 20px; margin: 3px;">
                  </button>

                  <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle m-2 rediect library bg-secondary" data-bs-toggle="tooltip" data-bs-placement="right" title="Library">
                    <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:20px; width: 20px; margin: 3px;">
                  </button>

                  <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle m-2 rediect bri" data-bs-toggle="tooltip" data-bs-placement="right" title="BRI">
                    <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:20px; width: 20px; margin: 3px;">
                  </button>

                  <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle m-2 rediect scheduling" data-bs-toggle="tooltip" data-bs-placement="right" title="Scedulling">
                    <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:20px; width: 20px; margin: 3px;">
                  </button>

                  <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle m-2 rediect hotwash" data-bs-toggle="tooltip" data-bs-placement="right" title="Hotwash">
                    <img src="<?php echo BASE_URL; ?>assets/svg/2D icons PNG/new/MicrosoftTeams-image (21).png" style="height:20px; width: 20px; margin: 3px;">
                  </button>

                  <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle m-2 rediect globalsearch" data-bs-toggle="tooltip" data-bs-placement="right" title="global search">
                    <img src="<?php echo BASE_URL; ?>assets/approved/search.png" style="height:25px; width: 25px; margin: 3px;">
                  </button>
                </center>
              </div>
              <div class="d-grid mb-4">
                <input class="btn btn-success" type="submit" value="Login" name="login" class="login-button" />
              </div>


            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Card -->


      </div>
    </div>
    <!-- End Content -->
    <footer id="content1" class="footer" role="footer">

      <?php
      include(ROOT_PATH . 'includes/footer_tos.php');

      ?>

    </footer>
  </main>


  <!-- ========== END MAIN CONTENT ========== -->

  <!-- JS Global Compulsory  -->


  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  <script>
    $(".gradeSheet").on("click", function() {
      $('.library').removeClass("bg-secondary");
      $("#appName").removeAttr("value");
      $("#appName").val("gradeSheet")
    });
    $(".library").on("click", function() {
      $(this).removeClass("bg-secondary");
      $("#appName").removeAttr("value");
      $("#appName").val("library")
    });
    $(".bri").on("click", function() {
      $('.library').removeClass("bg-secondary");
      $("#appName").removeAttr("value");
      $("#appName").val("bri")
    });
    $(".scheduling").on("click", function() {
      $('.library').removeClass("bg-secondary");
      $("#appName").removeAttr("value");
      $("#appName").val("scheduling")
    });
    $(".hotwash").on("click", function() {
      $('.library').removeClass("bg-secondary");
      $("#appName").removeAttr("value");
      $("#appName").val("hotwash")
    });
    $(".globalsearch").on("click", function() {
      $('.library').removeClass("bg-secondary");
      $("#appName").removeAttr("value");
      $("#appName").val("globalsearch")
    });
  </script>
  <!-- JS Plugins Init. -->
  <script>
    $(document).ready(function() {
      $("#hideButton").click(function() {
        $("#hidedive").hide('slow');
      });
      setTimeout(function() {
        $("#hidedive").hide('slow');
      }, 5000);
    });
  </script>
  <!--footer-->
</body>

</html>