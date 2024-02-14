<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Title -->
    <title>Log In</title>

    <!-- Favicon -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>tos.svg">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style">
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/boostrap.min.css" />
    <style>
        .body {
            margin: 0px;
            padding: 0px;
            background: linear-gradient(135deg, rgba(152, 146, 218, 1) 35%, rgba(253, 253, 253, 1) 100%);
        }

        .topbar {
            background: #6C6B94;
            height: 50px;
        }

        .iconsection {
            height: 100vh;
            position: relative;
            background: transparent;
        }

        .menusection {
            height: 100vh;
            background: #6C6B94;
        }

        .forminput {
            width: 60%;
            background: linear-gradient(180deg, rgba(231, 232, 255, 1) 0%, rgba(126, 127, 155, 1) 100%);
            border: none;
            border-radius: 5px;
            color: black;
            padding-left: 10px;
            font-weight: bolder;
        }

        .iconproduct {
            height: 400px;
            width: 100%;
            position: absolute;
            top: 130px;
            right: 0px;
        }

        .iconhome {
            font-size: 3em;
            color: beige;
            display: flex;
            width: 100%;
            /*justify-content: center;
            align-items: center;*/
        }

        .btnicon {
            border-radius: 100px;
            height: 50px;
            width: 50px;
            border: none;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        .knh {
            color: wheat;
            padding: 5px;
        }

        .borderbottom {
            border-bottom: 2px solid wheat;
        }
        .list-group-item{
            background: transparent;
            border: none;
            color: white;
        }
        .selected{
            background: #313754;
            color:white
        }
        .sidebar
        {
                width: 4.333333% !important;
                border-right: 1px solid black;
        }
    </style>
</head>

<body class="body">

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <div class="col-1 vh-100 sidebar">
                <div class="row">
                    <!-- icons -->
                    <div class="col-1 iconsection">
                        <div class="iconphome_out">
                            <a href="#" class="iconhome">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </div>
                        <div class="iconproduct">
                            <!-- <button type="button" class="btnicon m-2 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
                            <i class="bi bi-house-door-fill"></i>
                            </button> -->
                            <button type="button" class="btnicon m-2 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
                                <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:20px; width: 20px; margin: 2px;">
                            </button>
                            <button type="button" class="btnicon m-2 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Library">
                                <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:20px; width: 20px; margin: 2px;">
                            </button>
                            <button type="button" class="btnicon m-2 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="BRI">
                                <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:20px; width: 20px; margin: 2px;">
                            </button>
                            <button type="button" class="btnicon m-2 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Scheduling">
                                <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:20px; width: 20px; margin: 2px;">
                            </button>
                            <button type="button" class="btnicon m-2 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Hotwash">
                                <img src="<?php echo BASE_URL; ?>assets/svg/new/hotwash.png" style="height:20px; width: 20px; margin: 2px;">
                            </button>
                        </div>
                    </div>
                    <!-- endicons -->
                    <!-- menu section -->
                    <!-- end menu section -->
                </div>
            </div>
            <!-- end sidebar -->
            <!-- main section -->
            <div class="col-11">
<!-- Description -->

  <!-- Description -->
<!-- <div class="container content-space-1"> -->
  <div class="row">
    <div class="col-md-2">
      <!-- Navbar -->
      <div class="navbar-expand-md">
        <!-- Navbar Toggle -->
        <div class="d-grid">
          <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenuEg2" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenuEg2">
            <span class="d-flex justify-content-between align-items-center">
              <span class="text-dark mb-0">Menu</span>

              <span class="navbar-toggler-default">
                <i class="bi-list"></i>
              </span>

              <span class="navbar-toggler-toggled">
                <i class="bi-x"></i>
              </span>
            </span>
          </button>
        </div>
        <!-- End Navbar Toggle -->

        <!-- Navbar Collapse -->
        <div id="navbarVerticalNavMenuEg2" class="collapse navbar-collapse">
          <ul style="display: block;" id="navbarSettingsEg2" class="js-sticky-block js-scrollspy nav nav-tabs nav-link-gray nav-vertical"
              data-hs-sticky-block-options='{
               "parentSelector": "#navbarVerticalNavMenuEg2",
               "targetSelector": "#header",
               "breakpoint": "md",
               "startPoint": "#navbarVerticalNavMenuEg2",
               "endPoint": "#stickyBlockEndPointEg2",
               "stickyOffsetTop": 20
             }'>
            <li class="nav-item">
              <a class="nav-link active" href="#content">1. Accounts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#linksToOtherWebsInfo">2. Links to other websites</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#terminationInfo">3. Termination</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#goveringLawInfo">4. Governing law</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#changesInfo">5. Changes</a>
            </li>
          </ul>
        </div>
        <!-- End Navbar Collapse -->
      </div>
      <!-- End Navbar -->
    </div>
    <!-- End Col -->

    <div class="col-md-10">
     <!--  <div class="mb-7">
        <p>Thanks for using our products and services ("Services"). The Services are provided by Pixeel Ltd. ("Front"), located at 153 Williamson Plaza, Maggieberg, MT 09514, England, United Kingdom.</p>

        <p>By using our Services, you are agreeing to these terms. Please read them carefully.</p>

        <p>Our Services are very diverse, so sometimes additional terms or product requirements (including age requirements) may apply. Additional terms will be available with the relevant Services, and those additional terms become part of your agreement with us if you use those Services.</p>
      </div> -->

      <div id="accountInfo" class="mb-7">
        <h4>1. Accounts</h4>

        <p>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>

        <p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>

        <p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>
      </div>

      <div id="linksToOtherWebsInfo" class="mb-7">
        <h4>2. Links to other websites</h4>

        <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Front.</p>

        <p>Front has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Front shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>

        <p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>
      </div>

      <div id="terminationInfo" class="mb-7">
        <h4>3. Termination</h4>

        <p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

        <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

        <p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

        <p>Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.</p>

        <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
      </div>

      <div id="goveringLawInfo" class="mb-7">
        <h4>4. Governing law</h4>

        <p>These Terms shall be governed and construed in accordance with the laws of Jersey, without regard to its conflict of law provisions.</p>

        <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>
      </div>

      <div id="changesInfo" class="mb-7">
        <h4>5. Changes</h4>

        <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>

        <p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>
      </div>

      <!-- End Sticky End Point -->
      <div id="stickyBlockEndPointEg2"></div>
    </div>
    <!-- End Col -->
  </div>
  <!-- End Row -->
<!-- </div> -->
<!-- End Description -->
  <!-- End Row -->
</div>
<!-- End Description -->
            </div>
        </div>
  
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/hs-scrollspy/dist/hs-scrollspy.min.js"></script>

<!-- JS Plugins Init. -->
<script>
  (function() {
    // INITIALIZATION OF STICKY BLOCKS
    // =======================================================
    Promise.all(Array.from(document.images)
      .filter(img => !img.complete)
      .map(img => new Promise(resolve => {
        img.onload = img.onerror = resolve
      })))
      .then(() => {
        new HSStickyBlock('.js-sticky-block', {
          targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
        })
      })


    // INITIALIZATION OF SCROLLSPY
    // =======================================================
    new bootstrap.ScrollSpy(document.body, {
      target: '#navbarSettingsEg2',
      offset: 10
    })

    new HSScrollspy('#navbarVerticalNavMenuEg2', {
      breakpoint: 'lg'
    })
  })()
</script>
</body>

</html>