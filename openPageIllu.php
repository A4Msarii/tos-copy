<?php
include('./includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->


    <!-- Title -->
    <title>Open Link Here</title>

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

    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 1;
        }
    </style>
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
        <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem;">
            <!-- Shape -->
            <div class="shape shape-bottom zi-1">
                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                    <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
                </svg>
            </div>
            <center>
            <img src="./assets/svg/open_link/3d/url_paste.png" style="width:600px; height: 600px; margin-top:-220px;"/>
            
            <p style="font-size:30px;">Due to security reasons of Microsoft Windows, we can not open the folder directory, You can paste directly into the URL box to open the selected directory. To open selected file or directory.</p>
        </center>
            <!-- End Shape -->
        </div>
    </main>

</body>

</html>