<?php
// include("../includes/Pages/fheader.php");

$username = "";
if (isset($_SESSION['nickname'])) {
    $username = $_SESSION['nickname'];
}
if (isset($_SESSION['permission'])) {
    $permission = $_SESSION['permission'];
}
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

if (isset($_SESSION['login_id'])) {
    $user_id = $_SESSION['login_id'];
} else {
    $_SESSION['danger'] = "Please Login Again";
    header("Location:../../index.php");
}
if (isset($_SESSION['inst_id'])) {
    $inst_id = $_SESSION['inst_id'];
}

$profile = $connect->prepare("SELECT file_name FROM `users` WHERE id=?");
$profile->execute([$user_id]);
$prof_pic = $profile->fetchColumn();
if ($prof_pic != "") {


    $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
        $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
    } else {
        $pic = BASE_URL . 'includes/Pages/avatar/avtar.png';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Side And Head</title>

    <!-- Favicon -->
    <?php include 'lb_thumbnail.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">


    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="dark" as="style">
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme-dark.min.css" data-hs-appearance="default" as="style">


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

    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;

        }

        body {
            opacity: 0;
            color: white !important;
            /* box-shadow: white 0px 0px 0px 0px, white 0px 0px 0px 0px, white 0px 0px 0px 1px, white 0px 0px 0px 7px, white 0px 0px 0px 8px; */
        }
    </style>

    <style type="text/css">
        #phase_form,
        #multipleFile,
        #filelink {
            display: none;
        }

        .form-control,
        .form-select {
            border-radius: 20px;
            border: 0.001rem solid #d0cbcb;
        }

        label {
            margin: 5px;
        }

        .userpages1 {
            left: 87px;
        }

        .userpages2 {
            left: 70px;
        }

        .userpages3 {
            left: 54px;
        }

        .userpages4 {
            left: 40px;
        }

        .userpages5 {
            left: 24px;
        }

        .userfiles1 {
            left: 34px;
        }

        .userfiles2 {
            left: 19px;
        }

        .userfiles3 {
            left: 4px;
        }

        .userfiles4 {
            left: -11px;
        }

        .userfiles5 {
            left: -28px;
        }

        .usersOnlineLink1 {
            left: 48px;
        }

        .usersOnlineLink2 {
            left: 32px;
        }

        .usersOnlineLink3 {
            left: 16px;
        }

        .usersOnlineLink4 {
            left: 0px;
        }

        .usersOnlineLink5 {
            left: -26px;
        }

        .userOffLineLink1 {
            left: 75px;
        }

        .userOffLineLink2 {
            left: 57px;
        }

        .userOffLineLink3 {
            left: 41px;
        }

        .userOffLineLink4 {
            left: 26px;
        }

        .userOffLineLink5 {
            left: 10px;
        }


        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-position: center;
            background-image: url("tos.svg");
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            background-size: 100px;
        }

        .got_result:hover {
            background-color: lightgrey;
        }

        .form-check-select:hover {
            cursor: pointer;
            background-color: #e7eaf3;
        }

        .editor-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            height: 800px;
        }

        .editor-toolbar {
            margin-bottom: 5px;
            background-color: #f1f1f1;
            border-bottom: 1px solid #ccc;
            border-radius: 5px 5px 0 0;
            padding: 5px;
        }

        /* Style the editor content */
        .editor-content {
            padding: 10px;
            min-height: 200px;
        }

        #name {
            width: 80%;
            height: 50px;
            border-radius: 5px;
            border: 1px solid #808080b3;
            font-size: 30px;
            color: #8b8f8f9e;
        }

        #pagetitlecontainer {
            height: 30%;
        }

        :-ms-input-placeholder {
            color: red;
            font-size: 30px;
            opacity: 1;
            /* Firefox */
        }

        #addfilebutton {
            position: relative;
            z-index: 1;
        }

        #addfile {
            position: absolute;
            top: 0;
            left: calc(100% + 10px);
            /* adjust the value to position the modal as desired */
            z-index: 0;
        }

        .iconBtn {
            position: absolute;
            top: -47px;
            left: 140px;
            color: white;
        }

        .breifBTN {
            position: absolute;
            left: 170px;
            color: white;
            top: -50px;
        }

        .circle_color:nth-child(1) {
            left: -13px;
        }

        .circle_color:nth-child(2) {
            left: -7px;
        }

        .circle_color:nth-child(3) {
            left: 1px;
        }

        .circle_color:nth-child(4) {
            left: 6px;
        }

        .circle_color:nth-child(5) {
            left: 11px;
        }

        #red {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #dc3545 !important;
        }

        #green {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #28a745 !important;
        }

        #yellow {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #ffc107 !important;
        }

        #blue {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #007bff !important;
        }

        #grey {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #6c757d !important;
        }

        .btn-soft-primary {
            position: relative;
        }

        .btn-soft-primary::after {
            content: "";
            display: block;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-soft-primary button {
            float: right;
            /* additional styles for the button */
        }

        .hs-form-search-menu-content {
            display: none;
        }

        .hs-form-search-menu-content.show {
            display: block;
        }

        /* .got_result{
            border: 1px solid red;
        } */
        .searchResult1 li {
            margin-top: 10px;
            cursor: pointer;
        }

        [data-bs-title]:hover::before {
            content: attr(data-title);
            position: absolute;
            bottom: -26px;
            display: inline-block;
            padding: 3px 6px;
            border-radius: 2px;
            background: #000;
            color: #fff;
            font-size: 12px;
            font-family: sans-serif;
            white-space: nowrap;
        }

        [data-bs-title]:hover::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 8px;
            display: inline-block;
            color: #fff;
            border: 8px solid transparent;
            border-bottom: 8px solid #000;
        }


        .btn.btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            margin-top: 10px;
            margin-left: 50px;
        }

        .button-image {
            height: 16px;
            width: 16px;
        }

        .btn.otherbtn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        span {
            cursor: pointer;
        }

        .page-content.blur {
            filter: blur(5px);
            /* Adjust the blur value as needed */
        }

        .modal.fade {
            transition: opacity 0.15s linear;
        }

        footer {
            display: none;
        }

        .alertlibrary {
            display: none;
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
                "src": "<?php echo BASE_URL; ?>includes/Pages/src",
                "dist": "<?php echo BASE_URL; ?>includes/Pages/dist",
                "build": "<?php echo BASE_URL; ?>includes/Pages/build"
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

    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>




</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset" style="background-color: black;">
    <?php

    include ROOT_PATH . 'includes/message.php';
    displayMSG();
    ?>
    <div class="page-content">
        <script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance.js"></script>

        <script src="<?php echo BASE_URL; ?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

        <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered page-content">
            <div class="navbar-nav-wrap">
                <!-- Logo -->

                <a class="navbar-brand" href="<?php echo BASE_URL; ?>Library/index.php" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $institute . '/' . $department ?>">
                    <img style="display:none;" class="avatar" src="<?php echo $pic_department; ?>" alt="Logo" data-hs-theme-appearance="default">
                    <span class="nav-link-title" style="font-weight:bolder;color:#7901c1;"><?php if (isset($department)) { ?>
                            <?php echo $institute . '/' . $department; ?>
                        <?php } ?>
                    </span>

                </a>

                <!-- End Logo -->

                <div class="navbar-nav-wrap-content-start">
                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                        <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                        <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->

                    <!-- Search Form -->
                    <div class="dropdown ms-2" style="display:none;">
                        <!-- Input Group -->
                        <div class="d-none d-lg-block">
                            <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>

                                <input type="search" id="myInput" name="search" onkeyup="myFunction()" class="js-form-search form-control" placeholder="Search in front" aria-label="Search in front" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                                <a class="input-group-append input-group-text" href="javascript:;">
                                    <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
                                </a>
                            </div>
                        </div>

                        <button class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none" type="button" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                            <i class="bi-search"></i>
                        </button>
                        <!-- End Input Group -->

                        <!-- Card Search Content -->
                        <div id="searchDropdownMenu" class="hs-form-search-menu-content dropdown-menu dropdown-menu-form-search navbar-dropdown-menu-borderless">
                            <!-- Body -->
                            <div class="card-body-height">
                                <div class="d-lg-none">
                                    <div class="input-group input-group-merge navbar-input-group mb-5">
                                        <div class="input-group-prepend input-group-text">
                                            <i class="bi-search"></i>
                                        </div>

                                        <input type="search" placeholder="Search for names.." title="Type in a name">
                                    </div>
                                </div>

                                <span class="dropdown-header">Recent searches</span>

                                <div class="dropdown-item bg-transparent text-wrap" id="headsearchtable">
                                    <!-- <input class="form-control" type="search" id="myInput" name="search" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
                                    <ul id="myUL" style="display: inline-block;">
                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/Home.php">
                                                Home <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>
                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/actual.php">
                                                Actual <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/sim.php">
                                                Sim <i class="bi-search ms-1"></i>
                                            </a>
                                        </li><br>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/academic.php">
                                                Academic <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php">
                                                Task <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/stdactlog.php">
                                                Activity <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/testing.php">
                                                Testing <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/emergency.php">
                                                Emergency <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/qual.php">
                                                Qual <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/clearnace.php">
                                                Clearance <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/CAP.php">
                                                CAP <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/memo.php">
                                                Memo <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/classreport.php">
                                                Report <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>

                                        <li style="display:inline-block; margin: 3px;">
                                            <a class="btn btn-soft-dark btn-xs rounded-pill" href="<?php echo BASE_URL; ?>includes/Pages/discipline.php">
                                                Descipline <i class="bi-search ms-1"></i>
                                            </a>
                                        </li>
                                    </ul>

                                </div>

                                <div class="dropdown-divider"></div>

                                <span class="dropdown-header">Tutorials</span>

                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/index.html">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <span class="icon icon-soft-dark icon-xs icon-circle">
                                                <i class="bi-sliders"></i>
                                            </span>
                                        </div>

                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <span>How to set up Gulp?</span>
                                        </div>
                                    </div>
                                </a>

                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/index.html">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <span class="icon icon-soft-dark icon-xs icon-circle">
                                                <i class="bi-paint-bucket"></i>
                                            </span>
                                        </div>

                                        <div class="flex-grow-1 text-truncate ms-2">
                                            <span>How to change theme color?</span>
                                        </div>
                                    </div>
                                </a>

                                <div class="dropdown-divider"></div>

                                <span class="dropdown-header">Members</span>

                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <a class="card-footer text-center" href="<?php echo BASE_URL; ?>includes/Pages/index.html">
                                See all results <i class="bi-chevron-right small"></i>
                            </a>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card Search Content -->

                    </div>

                    <!-- End Search Form -->
                </div>

                <div class="navbar-nav-wrap-content-end">
                    <!-- Navbar -->
                    <ul class="navbar-nav">


                        <li class="nav-item" style="display:none;">
                            <button data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                                <a href="<?php echo BASE_URL ?>Library/dashboard_library.php" style="color: #71869d;">
                                    <i class="bi bi-clipboard-data"></i></a>
                            </button>

                        </li>

                        <li class="hs-has-mega-menu nav-item" style="display: none;">
                            <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></a>

                            <!-- Mega Menu -->
                            <div class="hs-mega-menu dropdown-menu" aria-labelledby="landingsMegaMenu" style="width:1000px; margin-left:200px;">
                                <div class="navbar-dropdown-menu-promo">
                                    <!-- Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['actual'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>Library/favouriteData.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title">Favorite</span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>

                                    <!-- End Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['sim'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>Library/index.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title">Shelve</span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>



                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Academic'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/academic.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>

                                </div>

                                <div class="navbar-dropdown-menu-promo">
                                    <!-- Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Task'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>

                                    <!-- End Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['evaluation'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/evaluation.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>



                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Student'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/stdactlog.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>

                                </div>

                                <div class="navbar-dropdown-menu-promo">
                                    <!-- Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Testing'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/testing.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>

                                    <!-- End Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Emergency'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/emergency.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>



                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Qual'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/qual.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>

                                </div>

                                <div class="navbar-dropdown-menu-promo">
                                    <!-- Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Clearance'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/clearance.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>

                                    <!-- End Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['CAP'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/CAP.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>



                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Memo'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/memo.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>


                                </div>

                                <div class="navbar-dropdown-menu-promo">
                                    <!-- Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Report'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/classreport.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>

                                    <!-- End Promo Item -->

                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Discipline'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/discipline.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>



                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <?php if (!isset($_SESSION['permission']) || $permission['Quiz'] == "1") { ?>
                                            <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>includes/Pages/quiz.php">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <span class="svg-icon svg-icon-sm text-primary">
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>">
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <span class="navbar-dropdown-menu-media-title"></span>

                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- End Promo Link -->
                                    </div>


                                </div>


                                <!-- End Promo Item -->
                            </div>
                            <!-- End Promo -->
                        </li>
                        <!-- End Landings -->



                        <li class="nav-item" style="display:none;">

                            <div class="dropdown">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                        <i class="bi bi-list"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                        <div class="dropdown-item-text">
                                            <ul>
                                                <?php
                                                // var_dump($permission);
                                                if (!isset($_SESSION['permission']) || $permission['Dashboard'] == "1") { ?>
                                                    <li class="nav-item m-2">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/Home.php">Home</a>
                                                    </li>
                                                <?php } ?>

                                                <?php if (!isset($_SESSION['permission']) || $permission['class_page'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#8c98a4; font-size: 15px;" href="">Class</a>
                                                        <ul class="dropdown-menu" style="float:right; margin-left: 450px;">
                                                            <?php if (!isset($_SESSION['permission']) || $permission['actual'] == "1") { ?>
                                                                <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/actual.php">Actual</a>
                                                            <?php } ?>
                                                            <?php if (!isset($_SESSION['permission']) || $permission['sim'] == "1") { ?>
                                                                <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/sim.php">Simulation</a>
                                                            <?php } ?>
                                                            <?php if (!isset($_SESSION['permission']) || $permission['Academic'] == "1") { ?>
                                                                <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/academic.php">Academic</a>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>
                                                <?php } ?>

                                                <?php if (!isset($_SESSION['permission']) || $permission['Testing'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/testing.php">Testing</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['evaluation'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/evaluation.php">Evaluation</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['Task'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/tasklog.php">Task</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['Student'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/stdactlog.php">Activity</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['Emergency'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/emergency.php">Emergency</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['Qual'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/qual.php">Qual</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['Clearance'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/clearance.php">Clearance</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['CAP'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/CAP.php">CAP</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['Memo'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/memo.php">Memo</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['Report'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/classreport.php">Report</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION['permission']) || $permission['Discipline'] == "1") { ?>
                                                    <li class="nav-item m-1">
                                                        <a style="color:#8c98a4; font-size: 15px;" href="<?php echo BASE_URL; ?>includes/Pages/discipline.php">Descipline</a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="nav-item" style="display:none;">
                            <!-- message -->
                            <div class="dropdown">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                        <i class="bi bi-chat"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                        <div class="dropdown-item-text">
                                            <div class="d-flex align-items-center">
                                                <form action="send_message.php" method="post">
                                                    <input type="text" name="to-user" id="message_to_user" placeholder="share individual" class="form-control" value="<?php echo $username; ?>" readonly style="background-color: #bfcfe09e;"><br>

                                                    <input type="hidden" value="<?php echo $user_id ?>" id="get_session_id_user" name="session_id">
                                                    <input type="hidden" id="get_id_select" name="get_id_select">
                                                    <input type="text" id="txt_search" name="to_user" class="form-control" placeholder="share individual" autocomplete="off" value="">
                                                    <br>
                                                    <ul class="searchResult">

                                                    </ul><br>



                                                    <textarea class="form-control" id="message_send_user" placeholder="Write Message.." name="get_message" required></textarea><br>
                                                    <input style="float:right;" type="submit" name="msg" value="Send" id="send_message_to_user" class="btn btn-success">
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End message -->
                        </li>

                        <li class="nav-item d-none d-sm-inline-block" style="display:none;">
                            <!-- Notification -->
                            <div class="dropdown" style="display:none;">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                    <i class="bi-bell"></i>
                                    <?php echo $icon ?>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                                    <!-- Header -->
                                    <div class="card-header card-header-content-between">
                                        <h4 class="card-title mb-0">Notifications</h4>

                                        <!-- Unfold -->
                                        <div class="dropdown">
                                            <?php if ($role != "super admin") { ?>
                                                <button id="read_all_noti" class="btn btn-primary btn-sm">Read all</button>
                                            <?php } else if ($role == "super admin") { ?>
                                                <button id="read_all_noti_admin" class="btn btn-primary btn-sm">Read all</button>
                                            <?php } ?>
                                            <input type="hidden" value="<?php echo $user_id ?>" id="user_id_val">
                                            <!-- <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdownSettings">
                      <span class="dropdown-header">Settings</span>
                      <a class="dropdown-item" href="#">
                        <i class="bi-archive dropdown-item-icon"></i> Archive all
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-check2-all dropdown-item-icon"></i> Mark all as read
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-toggle-off dropdown-item-icon"></i> Disable notifications
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="bi-gift dropdown-item-icon"></i> What's new?
                      </a>
                      <div class="dropdown-divider"></div>
                      <span class="dropdown-header">Feedback</span>
                      <a class="dropdown-item" href="#">
                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                      </a>
                    </div> -->
                                        </div>
                                        <!-- End Unfold -->
                                    </div>
                                    <!-- End Header -->

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                                        <?php

                                        if ($role != "super admin") {
                                            $sql = "SELECT COUNT(`id`) FROM notifications WHERE to_userid='$user_id' and is_read=0 and extra_data!='requesting to unlock' and extra_data!='cloned delete ask' and extra_data!='requesting_unlock'";
                                            $res = $connect->query($sql);
                                            $count = $res->fetchColumn();
                                        } else if ($role == "super admin") {
                                            $sql = "SELECT COUNT(`id`) FROM notifications WHERE is_read=0 and if_admin='$role'";
                                            $res = $connect->query($sql);
                                            $count = $res->fetchColumn();
                                        }
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#notificationNavOne" id="notificationNavOne-tab" data-bs-toggle="tab" data-bs-target="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Notifications(<?php echo $count ?>)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab" data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Read Messages</a>
                                        </li>
                                    </ul>
                                    <!-- End Nav -->

                                    <!-- Body -->
                                    <div class="card-body-height">
                                        <!-- Tab Content -->
                                        <div class="tab-content" id="notificationTabContent">
                                            <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                                                <?php

                                                echo $fetched_per15;
                                                echo $fetched_per11;
                                                echo $fetched_per3;
                                                echo $fetched_per2;
                                                echo $fetched_per4;
                                                echo $fetched_per16;
                                                echo $fetched_per17;
                                                ?>

                                            </div>

                                            <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">

                                                <?php
                                                $fetched_per5 = "";
                                                $fetch_noti5 = "SELECT * FROM notifications where is_read='1' AND type='message' and to_userid='$user_id' and extra_data!='threshold' and extra_data!='reached_cout' order by id desc";

                                                $fetch_noti5st2 = $connect->prepare($fetch_noti5);
                                                $fetch_noti5st2->execute();

                                                if ($fetch_noti5st2->rowCount() > 0) {
                                                    $re5 = $fetch_noti5st2->fetchAll();
                                                    foreach ($re5 as $row5) {

                                                        $for_userid1 = $row5['to_userid'];
                                                        $fetch_std_name1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                        $fetch_std_name1->execute([$for_userid1]);
                                                        $std_name1 = $fetch_std_name1->fetchColumn();

                                                        $fetched_per5 .= '
                                <a id="' . $row5['id'] . '" class="get_id_of_noti">
                                <ul class="list-group list-group-flush navbar-card-list-group">
                                  <li class="list-group-item form-check-select bg-soft-info">
                                    <div class="row">
                                      <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                            <label class="form-check-label" for="notificationCheck1"></label>
                                          </div>
                                       </div>
                                      </div>
                                      <div class="col ms-n2">
                                       
                                      <span class="text-body fs-5 text-dark">You Have Message From ' . $std_name1 . '<span><br>
                                        <small style="margin-left:110px" class="text-success"><i>' . date("F j, Y, g:i a", strtotime($row5['date'])) . '</i></small>
                                        <button style="float:right;" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#view_msg">View</button>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                       </a>';
                                                    }
                                                } ?>
                                                <?php echo $fetched_per5 ?>

                                            </div>
                                        </div>
                                        <!-- End Tab Content -->
                                    </div>
                                    <!-- End Body -->

                                    <!-- Card Footer -->
                                    <!--  <a class="card-footer text-center" href="#">
                  View all notifications <i class="bi-chevron-right"></i>
                </a> -->
                                    <!-- End Card Footer -->
                                </div>
                            </div>
                            <!-- End Notification -->
                        </li>


                        <li class="nav-item d-none d-sm-inline-block" style="display:none;">
                            <!-- Activity -->
                            <button style="display:none;" class="btn btn-ghost-secondary btn-icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivityStream" aria-controls="offcanvasActivityStream">
                                <i class="bi-x-diamond"></i>
                            </button>
                            <!-- Activity -->
                        </li>

                        <li class="nav-item">
                            <!-- user modal -->

                            <?php include ROOT_PATH . 'includes/Pages/profileinfo.php'; ?>
                        </li>
                    </ul>
                    <!-- End Navbar -->
                </div>
            </div>
        </header>



        <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-black" style="width:310px;">
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav" style="padding:0px;">
                    <!-- Content -->
                    <div class="navbar-vertical">
                        <div class="dropdown" style="z-index: 100000;" name="" value="0">
                            <center>
                                <button style="width:700px; margin-left:-140px; margin-top: 20px;" type="button" class="btn iconBtn">
                                    <input id="foldersearch" type="search" name="search" class="form-control find_data" style="width: 40%; height:40px; border-radius:10px;margin-top:20px;" placeholder="Search here..." autocomplete="off" /> </button>
                            </center>

                            <div id="openfolderdiv" class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 20rem; position:absolute;top:20px; margin-left: 20px;">
                                <!-- Header -->
                                <div class="card-body-height">
                                    <ul class="searchResult1" style="margin-left:-35px;">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                            <div id="navbarVerticalMenuPagesMenu" style="margin-top:25px;margin-left: -15px;">
                                <div class="navbar-vertical-content">

                                    <?php
                                    //fetch item
                                    // if()){
                                        $userId = $_SESSION['login_id'];
                                    if (isset($_SESSION['folderId'])) {
                                        $f_id = $_SESSION['folderId'];
                                    }
                                    $fetchPhaseQ = $connect->query("SELECT phaseId FROM folders WHERE id = '$f_id' AND phaseId IS NOT NULL");
                                    $phaseIdPhase = $fetchPhaseQ->fetchColumn();

                                    $checkPhaseManagerBackUp = $connect->query("SELECT count(*) FROM manage_role_course_phase WHERE phase_id = '$phaseIdPhase' AND (intructor = '$userId' OR b_up_manger = '$phaseIdPhase')");
                                    $checkPhaseManagerBackUpData = $checkPhaseManagerBackUp->fetchColumn();

                                    if (isset($f_id)) {
                                        $allitem1_a = $connect->query("SELECT * FROM folders WHERE id='$f_id'");

                                        if ($allitem1_a->rowCount() > 0) {
                                            $sn1111 = 'A';
                                            while ($row1 = $allitem1_a->fetch()) {
                                                $folder_id = $row1['id'];
                                    ?>
                                                <!-- <input name="search" class="form-control" type="text" id="searchInput" placeholder="Search files"> -->
                                                <div class="nav-item">
                                                    <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEcommerceMenu" aria-expanded="true" aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                                                        <!-- <i class="bi-basket nav-icon"></i> -->
                                                        <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2white/folder.png" class="testFun">
                                                        <span style="color:white; font-weight:bold; font-size: large;" class="nav-link-title"><?php echo $item_id1_a = $row1['folder']; ?>


                                                        </span>

                                                    </a>

                                                    <div class="dropdown addBreifFile" style="z-index:10000; margin-right: 5px;" value="<?php echo $f_id; ?>" name="0" data-custom="NULL">
                                                        <button style="position:absolute;margin-left: 65px;top: -50px;" type="button" class="btn iconBtn btn-soft-secondary btn-sm" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                            <img style="height:20px; width:20px;" src="<?php echo BASE_URL ?>assets/svg/3dfile/file2.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Files">
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 18rem;position: absolute;top: -10px;left: 3.1px;">
                                                            <!-- Header -->
                                                            <div class="card-header card-header-content-between">
                                                                <h4 class="card-title mb-0">Select Type</h4>
                                                                <?php if ($_SESSION['role'] == "super admin" || $checkPhaseManagerBackUpData > 0) { ?>
                                                                    <button style="background-color: #7901c1; color:white; margin-left: 70px;" class="btn" data-bs-toggle="modal" data-bs-target="#selectbriefcase">Select</button>
                                                                <?php } ?>
                                                            </div>

                                                            <!-- Body -->
                                                            <div class="card-body-height">
                                                                <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                    <option selected>Select File Type</option>
                                                                    <option value="addNewPage">New Page</option>
                                                                    <option value="addFile">Attachment</option>
                                                                    <option value="addFileLoca">Drive Link</option>
                                                                    <option value="addFileLink">Link</option>

                                                                </select>
                                                                <form action="<?php echo BASE_URL ?>Library/addfile_user.php" method="post" enctype="multipart/form-data" style="width:95%;margin: auto;margin-top: 25px;" id="multipleFile" class="multipleFile">
                                                                    <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                    <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                    <div class="input-field">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                                                                    <input type="file" class="form-control" name="file[]" id="" multiple />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div><br>
                                                                    <center>
                                                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                        <br>
                                                                        <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                            <option value="All instructor">Instructor Only</option>
                                                                            <option selected value="Everyone">Everyone</option>
                                                                            <option value="None">None</option>
                                                                        </select>
                                                                        <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                            <option selected value="readOnly">ReadOnly</option>
                                                                            <option value="None">None</option>
                                                                            <option value="readAndWrite">Read And Write</option>
                                                                        </select>
                                                                        <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                        <table class="table table-bordered tableData" style="display:none;">
                                                                            <thead class="bg-dark">
                                                                                <tr>
                                                                                    <th class="text-light">#</th>
                                                                                    <th class="text-light">Profile Image</th>
                                                                                    <th class="text-light">Name</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="userDetail">

                                                                            </tbody>
                                                                        </table>
                                                                    </center>
                                                                    <center>
                                                                        <input style="margin:5px; background-color:#7901c1; color:white;" type="submit" value="Submit" name="submitfiles" class="btn ayushi" />
                                                                        <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                    </center>
                                                                </form>
                                                                <br>
                                                                <center>
                                                                    <form class="insert-phases phase_form" id="phase_form" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                        <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                        <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                        <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
                                                                        <div class="input-field">
                                                                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                                                                            <table class="table table-bordered" id="table-field">
                                                                                <tr>
                                                                                    <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <center>
                                                                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                            <br>
                                                                            <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                <option value="All instructor">Instructor Only</option>
                                                                                <option selected value="Everyone">Everyone</option>
                                                                                <option value="None">None</option>
                                                                            </select>
                                                                            <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                <option selected value="readOnly">ReadOnly</option>
                                                                                <option value="None">None</option>
                                                                                <option value="readAndWrite">Read And Write</option>
                                                                            </select>
                                                                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                            <table class="table table-bordered tableData" style="display:none;">
                                                                                <thead class="bg-dark">
                                                                                    <tr>
                                                                                        <th class="text-light">#</th>
                                                                                        <th class="text-light">Profile Image</th>
                                                                                        <th class="text-light">Name</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="userDetail">

                                                                                </tbody>
                                                                            </table>
                                                                        </center>
                                                                        <center>
                                                                            <button style="margin:5px; background-color:#7901c1; color:white;" class="btn" type="submit" id="phase_submit" name="savephase">Submit</button>
                                                                            <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                        </center>
                                                                    </form>
                                                                </center>
                                                                <center>
                                                                    <form class="insert-phases filelink" id="filelink1" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                        <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                        <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                        <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                        <div class="input-field">
                                                                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                                                                            <table class="table table-bordered" id="table-field-link">
                                                                                <tr>

                                                                                    <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" />
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <center>
                                                                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                            <br>
                                                                            <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                <option value="All instructor">Instructor Only</option>
                                                                                <option selected value="Everyone">Everyone</option>
                                                                                <option value="None">None</option>
                                                                            </select>
                                                                            <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                <option selected value="readOnly">ReadOnly</option>
                                                                                <option value="None">None</option>
                                                                                <option value="readAndWrite">Read And Write</option>
                                                                            </select>
                                                                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                            <table class="table table-bordered tableData" style="display:none;">
                                                                                <thead class="bg-dark">
                                                                                    <tr>
                                                                                        <th class="text-light">#</th>
                                                                                        <th class="text-light">Profile Image</th>
                                                                                        <th class="text-light">Name</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="userDetail">

                                                                                </tbody>
                                                                            </table>
                                                                        </center>
                                                                        <center>
                                                                            <button style="margin:5px; background-color:#7901c1; color:white;" class="btn" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                            <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                        </center>
                                                                    </form>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Edit briefcase modal-->

                                                    <div class="dropdown" style="z-index:1000;">
                                                        <button style="position: absolute;margin-left: 75px;top: -50px;" type="button" class="btn breifBTN btn-soft-secondary btn-sm" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                            <img style="height:20px; width:20px;" src="<?php echo BASE_URL ?>assets/svg/3dfile/brief1.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Breifcase">
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 19rem; position:absolute;top:2px;left:25px;">
                                                            <!-- Header -->
                                                            <div class="card-header card-header-content-between">
                                                                <h4 class="card-title mb-0">Add Brief Case
                                                                    <?php if ($_SESSION['role'] == "super admin") { ?>
                                                                        <button style="background-color: #7901c1; color:white; margin-left: 70px;" class="btn" data-bs-toggle="modal" data-bs-target="#selectbriefcase1">Select</button>
                                                                    <?php } ?>
                                                                </h4>
                                                            </div>

                                                            <!-- Body -->
                                                            <div class="card-body-height" style="height: 15.25rem;">
                                                                <form class="insert-shelf" id="breif_form" method="post" action="<?php echo BASE_URL ?>Library/insert_breif.php" style="margin: auto;margin-top:20px;">
                                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['login_id']; ?>">
                                                                    <input type="hidden" name="folderId" value="<?php echo $f_id; ?>">
                                                                    <div class="input-field">
                                                                        <table class="table table-bordered" id="table-field-shelf">
                                                                            <tr>
                                                                                <td style="text-align: center;">
                                                                                    <input type="text" placeholder="Enter Breifcase Name" name="breifcase" id="breifval" class="form-control" value="" required />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <center>
                                                                        <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="shelf_submit" name="savebrief">Submit</button>
                                                                    </center>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <input class="form-control" type="hidden" id="stud_db_id11" value="<?php echo $_SESSION['login_id'] ?>">
                                                    <input class="form-control" type="hidden" id="fo_id" value="<?php echo $f_id ?>">

                                                    <?php
                                                    $userId = $_SESSION['login_id'];
                                                    $shopId = $_SESSION['shopId'];

                                                    $briefCaseId = $connect->query("SELECT briefId FROM (
                                                SELECT briefId FROM user_files
                                                WHERE (folderId = '$f_id' AND user_id = '$userId' AND shopid = '$shopId') OR (role = 'super admin' AND folderId = '$f_id' AND shopid = '$shopId')
                                                UNION
                                                SELECT briefId FROM editor_data
                                                WHERE (folderId = '$f_id' AND userId = '$userId' AND shopid = '$shopId') OR (userRole = 'super admin' AND folderId = '$f_id' AND shopid = '$shopId')
                                            ) AS uniqueBriefIds");

                                                    while ($briefIdData = $briefCaseId->fetch()) {
                                                        $briefCasId = $briefIdData['briefId'];
                                                        $briefCaseName = $connect->query("SELECT * FROM user_briefcase WHERE id = '$briefCasId' ORDER BY briefcase_name ASC");
                                                        while ($briefCases = $briefCaseName->fetch()) {
                                                            $userbriefId = $briefCases['id'];
                                                            $permissionPage = 1;
                                                            $permissionFile = 1;
                                                            if ($briefCases['user_id'] != $userId) {
                                                                $briefFile = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id' AND shopid = '$shopId'");
                                                                while ($fileData = $briefFile->fetch()) {
                                                                    $perFileId = $fileData['id'];
                                                                    if ($_SESSION['role'] == 'student') {
                                                                        $perFileQuery = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$perFileId' AND (userId = 'Everyone' OR userId = '$userId')");
                                                                    }

                                                                    if ($_SESSION['role'] != 'super admin' or $_SESSION['role'] != 'student') {
                                                                        $perFileQuery = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$perFileId' AND (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId')");
                                                                    }

                                                                    if ($_SESSION['role'] == 'super admin') {
                                                                        $perFileQuery = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$perFileId'");
                                                                    }

                                                                    $perFiledata = $perFileQuery->fetchColumn();
                                                                    if ($perFiledata != 0) {
                                                                        $permissionFile = 1;
                                                                        break;
                                                                    } else {
                                                                        $permissionFile = 0;
                                                                    }
                                                                }

                                                                $permissionPage = 0;

                                                                if ($permissionFile == 1) {
                                                                    $briefPage = $connect->query("SELECT * FROM editor_data WHERE briefId = '$userbriefId' AND folderId = '$f_id' AND shopid = '$shopId'");
                                                                    while ($pageData = $briefPage->fetch()) {
                                                                        $perPageId = $pageData['id'];
                                                                        if ($_SESSION['role'] == 'student') {
                                                                            $perPageQuery = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$perPageId' AND userId = 'Everyone' OR userId = '$userId'");
                                                                        }

                                                                        if ($_SESSION['role'] == 'instructor') {
                                                                            $perPageQuery = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$perPageId' AND userId = 'Everyone' OR userId = 'instructor' OR userId = '$userId'");
                                                                        }

                                                                        if ($_SESSION['role'] == 'super admin') {
                                                                            $perPageQuery = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$perPageId'");
                                                                        }

                                                                        $perPagedata = $perPageQuery->fetchColumn();
                                                                        if ($perPagedata != 0) {
                                                                            $permissionPage = 1;
                                                                            break;
                                                                        } else {
                                                                            $permissionPage = 0;
                                                                        }
                                                                    }
                                                                } else {
                                                                    $permissionPage = 0;
                                                                }
                                                            }

                                                            if ($permissionPage == 0 && $permissionFile == 0) {
                                                                continue;
                                                            } else {

                                                    ?>
                                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                    <div id="navbarUsersMenuDiv">


                                                                        <!-- Collapse -->
                                                                        <div class="nav-item">
                                                                            <a style="border-left: 2px solid <?php echo $briefCases['color']; ?>;border-radius: 0px;" class="nav-link dropdown-toggle collapsed openBrief navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                                                                                                                        echo $briefCases['user_id']; ?>" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                                                                                                                                                                                                                                                        echo $briefCases['user_id']; ?>" aria-expanded="false" aria-controls="navbarCtpMenu" value="navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $briefCases['user_id']; ?>">
                                                                                <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/phase2white/briefcase.png" class="testFun">
                                                                                <span style="color:white;" id="<?php echo $userbriefId ?>" onclick="redirectToPage1(this);"><?php echo $briefCases['briefcase_name']; ?></span></a>

                                                                            </a>
                                                                            <?php
                                                                            if ($userId == $briefCases['user_id'] || $checkPhaseManagerBackUpData > 0) {
                                                                            ?>
                                                                                <div class="dropdown addBreifFile buti" name="<?php echo $userbriefId; ?>" value="0" data-custom="user">
                                                                                    <button style="position:absolute; margin-left: 40px;" type="button" class="btn iconBtn btn-soft-secondary btn-sm " id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                                                        <img class="button-image" style="height:20px; width:20px;" src="<?php echo BASE_URL ?>assets/svg/3dfile/file2.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Files"> </button>

                                                                                    <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 18rem;position: absolute;top: -15px;margin-right: -15px;">
                                                                                        <!-- Header -->
                                                                                        <div class="card-header card-header-content-between" style="width:max-content;">
                                                                                            <h4 class="card-title mb-0">Select Type</h4>
                                                                                            <?php if ($_SESSION['role'] == "super admin" || $checkPhaseManagerBackUpData > 0) { ?>
                                                                                                <button style="background-color: #7901c1; color:white; margin-left: 90px;" class="btn" data-bs-toggle="modal" onclick="document.getElementById('bridus').value='<?php echo $briefCases['id'] ?>';" data-bs-target="#selectbriefcase2">Select</button>
                                                                                            <?php } ?>
                                                                                            <!-- </h4> -->
                                                                                        </div>

                                                                                        <!-- Body -->
                                                                                        <div class="card-body-height">
                                                                                            <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                                                <option selected>Select File Type</option>
                                                                                                <option value="addNewPage">New Page</option>
                                                                                                <option value="addFile">Attachment</option>
                                                                                                <option value="addFileLoca">Drive Link</option>
                                                                                                <option value="addFileLink">Link</option>
                                                                                            </select>
                                                                                            <form action="<?php echo BASE_URL ?>Library/addfile_user.php" method="post" enctype="multipart/form-data" style="width:95%;margin: auto;margin-top: 25px;" id="multipleFile" class="multipleFile">
                                                                                                <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                                <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $userbriefId; ?>" />
                                                                                                <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                                <div class="input-field">
                                                                                                    <table class="table table-bordered">
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                                                                                                <input type="file" class="form-control" name="file[]" id="" multiple />
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </div><br>
                                                                                                <center>
                                                                                                    <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                    <br>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                        <option value="All instructor">Instructor Only</option>
                                                                                                        <option value="Everyone" selected>Everyone</option>
                                                                                                        <option value="None">None</option>
                                                                                                    </select>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                        <option selected value="readOnly">ReadOnly</option>
                                                                                                        <option value="None">None</option>
                                                                                                        <option value="readAndWrite">Read And Write</option>
                                                                                                    </select>
                                                                                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                    <table class="table table-bordered tableData" style="display:none;">
                                                                                                        <thead class="bg-dark">
                                                                                                            <tr>
                                                                                                                <th class="text-light">#</th>
                                                                                                                <th class="text-light">Profile Image</th>
                                                                                                                <th class="text-light">Name</th>

                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody class="userDetail">

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </center>
                                                                                                <center>
                                                                                                    <input style="margin:5px; background-color: #7901c1; color:white;" type="submit" value="Submit" name="submitfiles" class="btn" />
                                                                                                    <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                                </center>
                                                                                            </form>
                                                                                            <br>
                                                                                            <center>
                                                                                                <form class="insert-phases phase_form" id="phase_form" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                                    <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                                    <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $userbriefId; ?>" />
                                                                                                    <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
                                                                                                    <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                                    <div class="input-field">
                                                                                                        <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                                                                                                        <table class="table table-bordered" id="table-field">
                                                                                                            <tr>
                                                                                                                <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                    <center>
                                                                                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                        <br>
                                                                                                        <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                            <option value="All instructor">Instructor Only</option>
                                                                                                            <option value="Everyone" selected>Everyone</option>
                                                                                                            <option value="None">None</option>
                                                                                                        </select>
                                                                                                        <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                            <option selected value="readOnly">ReadOnly</option>
                                                                                                            <option value="None">None</option>
                                                                                                            <option value="readAndWrite">Read And Write</option>
                                                                                                        </select>
                                                                                                        <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                        <table class="table table-bordered tableData" style="display:none;">
                                                                                                            <thead class="bg-dark">
                                                                                                                <tr>
                                                                                                                    <th class="text-light">#</th>
                                                                                                                    <th class="text-light">Profile Image</th>
                                                                                                                    <th class="text-light">Name</th>

                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody class="userDetail">

                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </center>
                                                                                                    <center>
                                                                                                        <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="phase_submit" name="savephase">Submit</button>
                                                                                                        <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                                    </center>
                                                                                                </form>
                                                                                            </center>
                                                                                            <center>
                                                                                                <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                                    <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                                    <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $userbriefId; ?>" />
                                                                                                    <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                                                    <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                                    <div class="input-field">
                                                                                                        <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                                                                                                        <table class="table table-bordered" id="table-field-link">
                                                                                                            <tr>
                                                                                                                <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                                                </td>

                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" />
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                    <center>
                                                                                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                        <br>
                                                                                                        <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                            <option value="All instructor">Instructor Only</option>
                                                                                                            <option value="Everyone" selected>Everyone</option>
                                                                                                            <option value="None">None</option>
                                                                                                        </select>
                                                                                                        <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                            <option selected value="readOnly">ReadOnly</option>
                                                                                                            <option value="None">None</option>
                                                                                                            <option value="readAndWrite">Read And Write</option>
                                                                                                        </select>
                                                                                                        <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                        <table class="table table-bordered tableData" style="display:none;">
                                                                                                            <thead class="bg-dark">
                                                                                                                <tr>
                                                                                                                    <th class="text-light">#</th>
                                                                                                                    <th class="text-light">Profile Image</th>
                                                                                                                    <th class="text-light">Name</th>

                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody class="userDetail">

                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <center>
                                                                                                            <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                                                            <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                                        </center>
                                                                                                    </center>
                                                                                                </form>
                                                                                            </center>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            <?php } ?>

                                                                            <div style="background-color: rgb(202 175 202 / 20%); margin-left: -8px;" id="navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                                                        echo $briefCases['user_id']; ?>" class="nav-collapse collapse fileDrop" data-bs-parent="#navbarUsersMenuDiv" hs-parent-area="#navbarVerticalMenuPagesEcommerceMenu">

                                                                                <?php
                                                                                if ($briefCases['className'] == "academic") {
                                                                                    // $userbriefId = $emptyData['id'];
                                                                                    $brFol = $briefCases['folderId'];
                                                                                    $brName = $briefCases['briefcase_name'];
                                                                                    $ctp = $connect->query("SELECT ctpId FROM folders WHERE id = '$brFol'");
                                                                                    $ctpData = $ctp->fetchColumn();
                                                                                    $phaseQ = $connect->query("SELECT id FROM phase WHERE ctp = '$ctpData' AND phasename = '$brName'");
                                                                                    $phaseId = $phaseQ->fetchColumn();
                                                                                    $selectAcClass = $connect->query("SELECT * FROM academic WHERE ctp = '$ctpData' AND phase = '$phaseId'");

                                                                                    while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                        $fId = $selectAcClassData['file'];
                                                                                        // }

                                                                                        // }

                                                                                        $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                        $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                        $file_fetch_st2->execute();
                                                                                        if ($file_fetch_st2->rowCount() > 0) {
                                                                                            $result_file2 = $file_fetch_st2->fetchAll();
                                                                                            foreach ($result_file2 as $row_file2) {
                                                                                                // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                                // while ($brefData = $fetchBrief->fetch()) {
                                                                                                $fileID = $row_file2['id'];
                                                                                                $fileName = $row_file2['filename'];
                                                                                                $fileLastName = $row_file2['lastName'];


                                                                                ?>

                                                                                                <?php
                                                                                                if ($fileLastName == null) {
                                                                                                ?>
                                                                                                    <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                        <?php
                                                                                                        $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                        while ($filePerData = $filePer->fetch()) {
                                                                                                        ?>
                                                                                                            <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                        <div style="flex-grow: 1;">
                                                                                                            <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                                <span style="float:left;"><?php echo $selectAcClassData['shortacademic']; ?></span>

                                                                                                                <?php
                                                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                $class = 0;
                                                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                                                    $class++;
                                                                                                                ?>
                                                                                                                    <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                            </a>
                                                                                                        </div>

                                                                                                        <?php
                                                                                                        if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                            <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                                <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                            </button>

                                                                                                        <?php
                                                                                                        } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                        ?>
                                                                                                            <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                                <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                            </button>
                                                                                                        <?php
                                                                                                        } else {


                                                                                                        ?>
                                                                                                            <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                            </button>
                                                                                                        <?php
                                                                                                        } ?>
                                                                                                    </span>
                                                                                                <?php
                                                                                                } else if ($row_file2['type'] == "offline") {
                                                                                                ?>
                                                                                                    <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                        <?php
                                                                                                        $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                        while ($filePerData = $filePer->fetch()) {
                                                                                                        ?>
                                                                                                            <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                        <div style="flex-grow: 1;" class="">
                                                                                                            <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                                <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $selectAcClassData['shortacademic']; ?></span>

                                                                                                                <?php
                                                                                                                // $margin = 31;
                                                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                $class = 0;
                                                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                                                    $class++;
                                                                                                                ?>
                                                                                                                    <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                            </a>

                                                                                                        </div>

                                                                                                        <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                        <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                            <i class="bi bi-files text-light"></i></button>
                                                                                                        <!-- </div> -->
                                                                                                    </span>

                                                                                                <?php
                                                                                                } elseif ($row_file2['type'] == "online") {
                                                                                                ?>

                                                                                                    <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                        <?php
                                                                                                        $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                        while ($filePerData = $filePer->fetch()) {
                                                                                                        ?>
                                                                                                            <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                        <div style="flex-grow: 1;" class="">
                                                                                                            <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                                <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $selectAcClassData['shortacademic']; ?></span>

                                                                                                                <?php
                                                                                                                // $margin = 31;
                                                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                $class = 0;
                                                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                                                    $class++;
                                                                                                                ?>
                                                                                                                    <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                            </a>

                                                                                                        </div>
                                                                                                        <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                        <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                            <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                    </span>


                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }

                                                                                // student brief fetchinf

                                                                                if ($briefCases['className'] == "course") {
                                                                                    // $courseId = $briefCases['courseId'];
                                                                                    // $fetchStuId = $connect->query("SELECT StudentNames FROM newcourse WHERE Courseid = '$courseId'");
                                                                                    $stuId = $briefCases['stuId'];

                                                                                    // fetch cap file

                                                                                    $selectAcClass = $connect->query("SELECT * FROM notifications WHERE to_userid = '$stuId'");
                                                                                    while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                        $notiId = $selectAcClassData['id'];
                                                                                        $fetchFile = $connect->query("SELECT * FROM assing_warning_doc WHERE noti_id = '$notiId'");
                                                                                        while ($fetchFileData = $fetchFile->fetch()) {
                                                                                            $fId = $fetchFileData['files'];
                                                                                            if (is_numeric($fId)) {

                                                                                                $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                                $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                                $file_fetch_st2->execute();
                                                                                                if ($file_fetch_st2->rowCount() > 0) {
                                                                                                    $result_file2 = $file_fetch_st2->fetchAll();
                                                                                                    foreach ($result_file2 as $row_file2) {
                                                                                                        // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                                        // while ($brefData = $fetchBrief->fetch()) {
                                                                                                        $fileID = $row_file2['id'];
                                                                                                        $fileName = $row_file2['filename'];
                                                                                                        $fileLastName = $row_file2['lastName'];


                                                                                                    ?>

                                                                                                        <?php
                                                                                                        if ($fileLastName == null) {
                                                                                                        ?>
                                                                                                            <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                                <?php
                                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                                ?>
                                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                                <div style="flex-grow: 1;">
                                                                                                                    <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                                        <span style="float:left;"><?php echo $row_file2['filename']; ?></span>

                                                                                                                        <?php
                                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                        $class = 0;
                                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                                            $class++;
                                                                                                                        ?>
                                                                                                                            <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </a>
                                                                                                                </div>

                                                                                                                <?php
                                                                                                                if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                                    <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                                        <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                                    </button>

                                                                                                                <?php
                                                                                                                } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                                ?>
                                                                                                                    <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                                        <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                                    </button>
                                                                                                                <?php
                                                                                                                } else {


                                                                                                                ?>
                                                                                                                    <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                                        <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                                    </button>
                                                                                                                <?php
                                                                                                                } ?>
                                                                                                            </span>
                                                                                                        <?php
                                                                                                        } else if ($row_file2['type'] == "offline") {
                                                                                                        ?>
                                                                                                            <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                                <?php
                                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                                ?>
                                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                                <div style="flex-grow: 1;" class="">
                                                                                                                    <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                                        <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                        <?php
                                                                                                                        // $margin = 31;
                                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                        $class = 0;
                                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                                            $class++;
                                                                                                                        ?>
                                                                                                                            <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </a>

                                                                                                                </div>

                                                                                                                <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                                <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                                    <i class="bi bi-files text-light"></i></button>
                                                                                                                <!-- </div> -->
                                                                                                            </span>

                                                                                                        <?php
                                                                                                        } elseif ($row_file2['type'] == "online") {
                                                                                                        ?>

                                                                                                            <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                                <?php
                                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                                ?>
                                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                                <div style="flex-grow: 1;" class="">
                                                                                                                    <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                                        <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                        <?php
                                                                                                                        // $margin = 31;
                                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                        $class = 0;
                                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                                            $class++;
                                                                                                                        ?>
                                                                                                                            <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </a>

                                                                                                                </div>
                                                                                                                <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                                <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Copy Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                                    <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                            </span>


                                                                                                    <?php
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }



                                                                                    // test file fetching

                                                                                    $selectAcClass = $connect->query("SELECT * FROM class_documnet WHERE stuId = '$stuId'");
                                                                                    while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                        $fId = $selectAcClassData['fileName'];
                                                                                        // $fetchFile = $connect->query("SELECT * FROM assing_warning_doc WHERE noti_id = '$notiId'");
                                                                                        // while ($fetchFileData = $fetchFile->fetch()) {
                                                                                        // $fId = $fetchFileData['files'];
                                                                                        if (is_numeric($fId)) {

                                                                                            $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                            $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                            $file_fetch_st2->execute();
                                                                                            if ($file_fetch_st2->rowCount() > 0) {
                                                                                                $result_file2 = $file_fetch_st2->fetchAll();
                                                                                                foreach ($result_file2 as $row_file2) {
                                                                                                    // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                                    // while ($brefData = $fetchBrief->fetch()) {
                                                                                                    $fileID = $row_file2['id'];
                                                                                                    $fileName = $row_file2['filename'];
                                                                                                    $fileLastName = $row_file2['lastName'];


                                                                                                    ?>

                                                                                                    <?php
                                                                                                    if ($fileLastName == null) {
                                                                                                    ?>
                                                                                                        <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;">
                                                                                                                <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                                    <span style="float:left;"><?php echo $row_file2['filename']; ?></span>

                                                                                                                    <?php
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>
                                                                                                            </div>

                                                                                                            <?php
                                                                                                            if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                                </button>

                                                                                                            <?php
                                                                                                            } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                            ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                                    <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                                </button>
                                                                                                            <?php
                                                                                                            } else {


                                                                                                            ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                                </button>
                                                                                                            <?php
                                                                                                            } ?>
                                                                                                        </span>
                                                                                                    <?php
                                                                                                    } else if ($row_file2['type'] == "offline") {
                                                                                                    ?>
                                                                                                        <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;" class="">
                                                                                                                <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                                    <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                    <?php
                                                                                                                    // $margin = 31;
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>

                                                                                                            </div>

                                                                                                            <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                            <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                                <i class="bi bi-files text-light"></i></button>
                                                                                                            <!-- </div> -->
                                                                                                        </span>

                                                                                                    <?php
                                                                                                    } elseif ($row_file2['type'] == "online") {
                                                                                                    ?>

                                                                                                        <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;" class="">
                                                                                                                <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                                    <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                    <?php
                                                                                                                    // $margin = 31;
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>

                                                                                                            </div>
                                                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                            <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                                <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                        </span>


                                                                                                    <?php
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        // }
                                                                                    }

                                                                                    // end test file fetchinf

                                                                                    // discipline file fetchin

                                                                                    $selectAcClass = $connect->query("SELECT * FROM discipline WHERE student_id = '$stuId'");
                                                                                    while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                        $fId = $selectAcClassData['fileName'];
                                                                                        // $fetchFile = $connect->query("SELECT * FROM assing_warning_doc WHERE noti_id = '$notiId'");
                                                                                        // while ($fetchFileData = $fetchFile->fetch()) {
                                                                                        // $fId = $fetchFileData['files'];
                                                                                        if (is_numeric($fId)) {

                                                                                            $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                            $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                            $file_fetch_st2->execute();
                                                                                            if ($file_fetch_st2->rowCount() > 0) {
                                                                                                $result_file2 = $file_fetch_st2->fetchAll();
                                                                                                foreach ($result_file2 as $row_file2) {
                                                                                                    // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                                    // while ($brefData = $fetchBrief->fetch()) {
                                                                                                    $fileID = $row_file2['id'];
                                                                                                    $fileName = $row_file2['filename'];
                                                                                                    $fileLastName = $row_file2['lastName'];


                                                                                                    ?>

                                                                                                    <?php
                                                                                                    if ($fileLastName == null) {
                                                                                                    ?>
                                                                                                        <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;">
                                                                                                                <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                                    <span style="float:left;"><?php echo $row_file2['filename']; ?></span>

                                                                                                                    <?php
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>
                                                                                                            </div>

                                                                                                            <?php
                                                                                                            if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                                </button>

                                                                                                            <?php
                                                                                                            } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                            ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                                    <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                                </button>
                                                                                                            <?php
                                                                                                            } else {


                                                                                                            ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                                </button>
                                                                                                            <?php
                                                                                                            } ?>
                                                                                                        </span>
                                                                                                    <?php
                                                                                                    } else if ($row_file2['type'] == "offline") {
                                                                                                    ?>
                                                                                                        <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;" class="">
                                                                                                                <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                                    <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                    <?php
                                                                                                                    // $margin = 31;
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>

                                                                                                            </div>

                                                                                                            <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                            <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                                <i class="bi bi-files text-light"></i></button>
                                                                                                            <!-- </div> -->
                                                                                                        </span>

                                                                                                    <?php
                                                                                                    } elseif ($row_file2['type'] == "online") {
                                                                                                    ?>

                                                                                                        <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;" class="">
                                                                                                                <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                                    <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                    <?php
                                                                                                                    // $margin = 31;
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>

                                                                                                            </div>
                                                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                            <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                                <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                        </span>


                                                                                                    <?php
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        // }
                                                                                    }

                                                                                    // end discipline fetching

                                                                                    // memo file fetchin

                                                                                    $selectAcClass = $connect->query("SELECT * FROM memo WHERE student_id = '$stuId'");
                                                                                    while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                        $fId = $selectAcClassData['fileName'];
                                                                                        // $fetchFile = $connect->query("SELECT * FROM assing_warning_doc WHERE noti_id = '$notiId'");
                                                                                        // while ($fetchFileData = $fetchFile->fetch()) {
                                                                                        // $fId = $fetchFileData['files'];
                                                                                        if (is_numeric($fId)) {

                                                                                            $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                            $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                            $file_fetch_st2->execute();
                                                                                            if ($file_fetch_st2->rowCount() > 0) {
                                                                                                $result_file2 = $file_fetch_st2->fetchAll();
                                                                                                foreach ($result_file2 as $row_file2) {
                                                                                                    // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                                    // while ($brefData = $fetchBrief->fetch()) {
                                                                                                    $fileID = $row_file2['id'];
                                                                                                    $fileName = $row_file2['filename'];
                                                                                                    $fileLastName = $row_file2['lastName'];


                                                                                                    ?>

                                                                                                    <?php
                                                                                                    if ($fileLastName == null) {
                                                                                                    ?>
                                                                                                        <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;">
                                                                                                                <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                                    <span style="float:left;"><?php echo $row_file2['filename']; ?></span>

                                                                                                                    <?php
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>
                                                                                                            </div>

                                                                                                            <?php
                                                                                                            if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                                </button>

                                                                                                            <?php
                                                                                                            } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                            ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                                    <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                                </button>
                                                                                                            <?php
                                                                                                            } else {


                                                                                                            ?>
                                                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                                </button>
                                                                                                            <?php
                                                                                                            } ?>
                                                                                                        </span>
                                                                                                    <?php
                                                                                                    } else if ($row_file2['type'] == "offline") {
                                                                                                    ?>
                                                                                                        <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;" class="">
                                                                                                                <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                                    <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                    <?php
                                                                                                                    // $margin = 31;
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>

                                                                                                            </div>

                                                                                                            <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                            <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                                <i class="bi bi-files text-light"></i></button>
                                                                                                            <!-- </div> -->
                                                                                                        </span>

                                                                                                    <?php
                                                                                                    } elseif ($row_file2['type'] == "online") {
                                                                                                    ?>

                                                                                                        <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                            <?php
                                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                                            ?>
                                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                            <div style="flex-grow: 1;" class="">
                                                                                                                <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                                    <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                    <?php
                                                                                                                    // $margin = 31;
                                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                    $class = 0;
                                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                                        $class++;
                                                                                                                    ?>
                                                                                                                        <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </a>

                                                                                                            </div>
                                                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                            <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                                <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                        </span>


                                                                                <?php
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        // }
                                                                                    }

                                                                                    // end memo fetching

                                                                                    // end fetch cap file
                                                                                }

                                                                                // end student brief fetching
                                                                                ?>

                                                                                <?php
                                                                                $file_fetch2 = "SELECT * FROM user_files where briefId='$userbriefId' and folderId='$f_id' AND shopid = '$shopId' ORDER BY filename ASC";
                                                                                $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                $file_fetch_st2->execute();
                                                                                if ($file_fetch_st2->rowCount() > 0) {
                                                                                    $result_file2 = $file_fetch_st2->fetchAll();
                                                                                    foreach ($result_file2 as $row_file2) {
                                                                                        // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                        // while ($brefData = $fetchBrief->fetch()) {
                                                                                        $fileID = $row_file2['id'];
                                                                                        $fileName = $row_file2['filename'];
                                                                                        $fileLastName = $row_file2['lastName'];
                                                                                        if ($_SESSION['role'] == 'student' && $row_file2['role'] == "super admin") {
                                                                                            $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND pageId = '$fileID'");
                                                                                            $perFileData = $filePermission->fetchColumn();
                                                                                            if ($perFileData <= 0) {
                                                                                                continue;
                                                                                            }
                                                                                        }
                                                                                        if ($_SESSION['role'] == 'instructor' && $row_file2['role'] == "super admin") {
                                                                                            $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId') AND pageId = '$fileID'");
                                                                                            $perFileData = $filePermission->fetchColumn();
                                                                                            if ($perFileData <= 0) {
                                                                                                continue;
                                                                                            }
                                                                                        }

                                                                                ?>

                                                                                        <?php
                                                                                        if ($fileLastName == null) {
                                                                                        ?>
                                                                                            <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                <?php
                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                ?>
                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div style="flex-grow: 1;">
                                                                                                    <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                        <span style="float:left;"><?php echo substr($row_file2['filename'], 0, 15); ?></span>

                                                                                                        <?php
                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                        $class = 0;
                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                            $class++;
                                                                                                        ?>
                                                                                                            <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                    </a>
                                                                                                </div>

                                                                                                <?php
                                                                                                if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                    <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                        <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                    </button>

                                                                                                <?php
                                                                                                } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                ?>
                                                                                                    <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                        <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                    </button>
                                                                                                <?php
                                                                                                } else {


                                                                                                ?>
                                                                                                    <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                        <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                    </button>
                                                                                                <?php
                                                                                                } ?>
                                                                                            </span>
                                                                                        <?php
                                                                                        } else if ($row_file2['type'] == "offline") {
                                                                                        ?>
                                                                                            <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                <?php
                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                ?>
                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div style="flex-grow: 1;" class="">
                                                                                                    <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                        <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo substr($row_file2['lastName'], 0, 15); ?></span>

                                                                                                        <?php
                                                                                                        // $margin = 31;
                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                        $class = 0;
                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                            $class++;
                                                                                                        ?>
                                                                                                            <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                    </a>

                                                                                                </div>

                                                                                                <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                    <i class="bi bi-files text-light"></i></button>
                                                                                                <!-- </div> -->
                                                                                            </span>

                                                                                        <?php
                                                                                        } elseif ($row_file2['type'] == "online") {
                                                                                        ?>

                                                                                            <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                <?php
                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                ?>
                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div style="flex-grow: 1;" class="">
                                                                                                    <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                        <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo substr($row_file2['lastName'], 0, 15); ?></span>

                                                                                                        <?php
                                                                                                        // $margin = 31;
                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                        $class = 0;
                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                            $class++;
                                                                                                        ?>
                                                                                                            <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                    </a>

                                                                                                </div>
                                                                                                <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                    <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                            </span>


                                                                                <?php
                                                                                        }
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                                $file_fetch12 = "SELECT * FROM editor_data where briefId='$userbriefId' and folderId='$f_id' AND shopid = '$shopId' ORDER BY pageName ASC";
                                                                                $file_fetch_st12 = $connect->prepare($file_fetch12);
                                                                                $file_fetch_st12->execute();
                                                                                if ($file_fetch_st12->rowCount() > 0) {
                                                                                    $result_file12 = $file_fetch_st12->fetchAll();
                                                                                    foreach ($result_file12 as $row_file12) {
                                                                                        // $briefPageQuery = $connect->query("SELECT * FROM editor_data WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                        // while ($briefData = $briefPageQuery->fetch()) {
                                                                                        $breifId = $row_file12['id'];
                                                                                        if ($_SESSION['role'] == 'student' && $row_file12['userRole'] == "super admin") {
                                                                                            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND pageId = '$breifId'");
                                                                                            $perFileData = $filePermission->fetchColumn();
                                                                                            if ($perFileData <= 0) {
                                                                                                continue;
                                                                                            }
                                                                                        }
                                                                                        if ($_SESSION['role'] == 'instructor' && $row_file12['userRole'] == "super admin") {
                                                                                            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId') AND pageId = '$breifId'");
                                                                                            $perFileData = $filePermission->fetchColumn();
                                                                                            if ($perFileData <= 0) {
                                                                                                continue;
                                                                                            }
                                                                                        }
                                                                                ?>
                                                                                        <div style="display:flex; align-items:center; height: 35px;border-left:2px solid <?php echo $row_file12['color']; ?>;border-radius: 0px; cursor: pointer;" class="nav-link" onclick="redirectToPage('<?php echo BASE_URL; ?>Library/pageData.php?bId=<?php echo $breifId; ?>&userBrief_ID=<?php echo $userbriefId; ?>');">


                                                                                            <?php
                                                                                            $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$breifId'");
                                                                                            while ($perColor = $perColorQ->fetch()) {
                                                                                            ?>
                                                                                                <!-- <span style="border-left: 3px solid <?php echo $perColor['color']; ?>;margin-right: 5px;"></span> -->
                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $perColor['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                            <?php
                                                                                            } ?>

                                                                                            <div style="flex-grow: 1;">
                                                                                                <a data-bs-placement="bottom" title="<?php echo $row_file12['pageName'] ?>" id="userPage<?php echo $breifId; ?>" style="color: white; float: left;" class="userPage">
                                                                                                    <?php echo substr($row_file12['pageName'], 0, 15); ?></a>
                                                                                                <?php
                                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$breifId' AND userId = '$userId'");
                                                                                                $class = 0;
                                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                                    $class++;
                                                                                                ?>
                                                                                                    <span style="color:white; width: 19px; height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userpages<?php echo $class; ?>"></span>
                                                                                                <?php
                                                                                                }
                                                                                                ?>

                                                                                            </div>

                                                                                            <!-- <button class="btn btn-soft-primary otherbtn" title="Open Page" id="<?php echo $row_file12['id'] ?>">
                                                                                        <a><i class="bi bi-files" style="color:white;"></i></a></button> -->
                                                                                            <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                                                                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                            </button>
                                                                                        </div>

                                                                                <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                    }

                                                    $emptyBriefCase = $connect->query("SELECT *
                                            FROM user_briefcase
                                            WHERE ((folderId = '$f_id' AND user_id = '$userId' AND shopid = '$shopId') OR (role = 'super admin' AND folderId = '$f_id' AND shopid = '$shopId'))
                                               ORDER BY briefcase_name ASC");
                                                    while ($emptyData = $emptyBriefCase->fetch()) {
                                                        $breif_id1 = $emptyData['id'];
                                                        $checkBriefIdFile = $connect->query("SELECT count(*) FROM user_files WHERE briefId = '$breif_id1'");
                                                        $checkBriefIdPage = $connect->query("SELECT count(*) FROM editor_data WHERE briefId = '$breif_id1'");
                                                        if ($checkBriefIdFile->fetchColumn() > 0 || $checkBriefIdPage->fetchColumn() > 0) {
                                                            continue;
                                                        }
                                                        // }

                                                        // $result10 = $connect->query("SELECT count(*) FROM `user_files` WHERE briefId = '$userbriefId' AND user_id = '$userId' OR role = 'super admin'");
                                                        // $number_of_rows10 = $result10->fetchColumn();
                                                        // $result110 = $connect->query("SELECT count(*) FROM `editor_data` WHERE briefId = '$userbriefId' AND userId = '$userId' OR userRole = 'super admin'");
                                                        // $number_of_rows100 = $result110->fetchColumn();
                                                        // $total_c1 = $number_of_rows10 + $number_of_rows100;
                                                        // $foder_ides = $rowbreifcase_fetch21['folderId'];
                                                        // if ($total_c1 == 0 && $foder_ides == $f_id) {

                                                        ?>

                                                        <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                            <div id="navbarUsersMenuDiv">


                                                                <!-- Collapse -->
                                                                <div class="nav-item">
                                                                    <a style="border-left: 2px solid <?php echo $emptyData['color']; ?>;border-radius: 0px;" class="nav-link dropdown-toggle collapsed openBrief navbarCtpMenu<?php echo $breif_id1;
                                                                                                                                                                                                                                echo $emptyData['user_id']; ?>" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu<?php echo $breif_id1;
                                                                                                                                                                                                                                                                                                                                                            echo $emptyData['user_id']; ?>" aria-expanded="false" aria-controls="navbarCtpMenu" value="navbarCtpMenu<?php echo $breif_id1;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $emptyData['user_id']; ?>">
                                                                        <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/phase2white/briefcase.png" class="testFun">
                                                                        <span style="color:white;" id="<?php echo $breif_id1 ?>" onclick="redirectToPage1(this);"><?php echo $emptyData['briefcase_name'] ?></span>

                                                                    </a>
                                                                    <div class="dropdown addBreifFile buti" name="<?php echo $breif_id1; ?>" value="0" data-custom="user">
                                                                        <button style="position:absolute; margin-left: 40px;" type="button" class="btn iconBtn btn-soft-secondary btn-sm " id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                                            <img class="button-image" style="height:20px; width:20px;" src="<?php echo BASE_URL ?>assets/svg/3dfile/file2.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Files"> </button>

                                                                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 18rem; position: absolute;top: -15px;opacity: 1;margin-right: -15px;">
                                                                            <!-- Header -->
                                                                            <div class="card-header card-header-content-between" style="width:max-content;">
                                                                                <h4 class="card-title mb-0">Select Type</h4>
                                                                                <?php if ($_SESSION['role'] == "super admin" || $checkPhaseManagerBackUpData > 0) { ?>
                                                                                    <button style="background-color: #7901c1; color:white; margin-left: 90px;" class="btn" data-bs-toggle="modal" onclick="document.getElementById('bridus').value='<?php echo $emptyData['id'] ?>';" data-bs-target="#selectbriefcase2">Select</button>
                                                                                <?php } ?>
                                                                            </div>

                                                                            <!-- Body -->
                                                                            <div class="card-body-height">
                                                                                <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                                    <option selected>Select File Type</option>
                                                                                    <option value="addNewPage">New Page</option>
                                                                                    <option value="addFile">Attachment</option>
                                                                                    <option value="addFileLoca">Drive Link</option>
                                                                                    <option value="addFileLink">Link</option>
                                                                                </select>
                                                                                <form action="<?php echo BASE_URL ?>Library/addfile_user.php" method="post" enctype="multipart/form-data" style="width:95%;margin: auto;margin-top: 25px;" id="multipleFile" class="multipleFile">
                                                                                    <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                    <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $breif_id1; ?>" />
                                                                                    <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                    <div class="input-field">
                                                                                        <table class="table table-bordered">
                                                                                            <tr>
                                                                                                <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                                                                                    <input type="file" class="form-control" name="file[]" id="" multiple />
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </div><br>
                                                                                    <center>
                                                                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                        <br>
                                                                                        <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                            <option value="All instructor">Instructor Only</option>
                                                                                            <option value="Everyone" selected>Everyone</option>
                                                                                            <option value="None">None</option>
                                                                                        </select>
                                                                                        <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                            <option selected value="readOnly">ReadOnly</option>
                                                                                            <option value="None">None</option>
                                                                                            <option value="readAndWrite">Read And Write</option>
                                                                                        </select>
                                                                                        <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                        <table class="table table-bordered tableData" style="display:none;">
                                                                                            <thead class="bg-dark">
                                                                                                <tr>
                                                                                                    <th class="text-light">#</th>
                                                                                                    <th class="text-light">Profile Image</th>
                                                                                                    <th class="text-light">Name</th>

                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody class="userDetail">

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </center>
                                                                                    <center>
                                                                                        <input style="margin:5px; background-color: #7901c1; color:white;" type="submit" value="Submit" name="submitfiles" class="btn" />
                                                                                        <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                    </center>
                                                                                </form>
                                                                                <br>
                                                                                <center>
                                                                                    <form class="insert-phases phase_form" id="phase_form" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                        <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                        <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $breif_id1; ?>" />
                                                                                        <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
                                                                                        <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                        <div class="input-field">
                                                                                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                                                                                            <table class="table table-bordered" id="table-field">
                                                                                                <tr>
                                                                                                    <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </div>
                                                                                        <center>
                                                                                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                            <br>
                                                                                            <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                <option value="All instructor">Instructor Only</option>
                                                                                                <option value="Everyone" selected>Everyone</option>
                                                                                                <option value="None">None</option>
                                                                                            </select>
                                                                                            <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                <option selected value="readOnly">ReadOnly</option>
                                                                                                <option value="None">None</option>
                                                                                                <option value="readAndWrite">Read And Write</option>
                                                                                            </select>
                                                                                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                            <table class="table table-bordered tableData" style="display:none;">
                                                                                                <thead class="bg-dark">
                                                                                                    <tr>
                                                                                                        <th class="text-light">#</th>
                                                                                                        <th class="text-light">Profile Image</th>
                                                                                                        <th class="text-light">Name</th>

                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody class="userDetail">

                                                                                                </tbody>
                                                                                            </table>
                                                                                        </center>
                                                                                        <center>
                                                                                            <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="phase_submit" name="savephase">Submit</button>
                                                                                            <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                        </center>
                                                                                    </form>
                                                                                </center>
                                                                                <center>
                                                                                    <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                        <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                        <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $breif_id1; ?>" />
                                                                                        <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                                        <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                        <div class="input-field">
                                                                                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                                                                                            <table class="table table-bordered" id="table-field-link">
                                                                                                <tr>
                                                                                                    <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                                    </td>

                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" />
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </div>
                                                                                        <center>
                                                                                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                            <br>
                                                                                            <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                <option value="All instructor">Instructor Only</option>
                                                                                                <option value="None">None</option>
                                                                                                <option value="Everyone" selected>Everyone</option>
                                                                                            </select>
                                                                                            <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                <option value="readOnly">ReadOnly</option>
                                                                                                <option value="None">None</option>
                                                                                                <option value="readAndWrite">Read And Write</option>
                                                                                            </select>
                                                                                            <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                            <table class="table table-bordered tableData" style="display:none;">
                                                                                                <thead class="bg-dark">
                                                                                                    <tr>
                                                                                                        <th class="text-light">#</th>
                                                                                                        <th class="text-light">Profile Image</th>
                                                                                                        <th class="text-light">Name</th>

                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody class="userDetail">

                                                                                                </tbody>
                                                                                            </table>
                                                                                            <center>
                                                                                                <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                                                <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                            </center>
                                                                                        </center>
                                                                                    </form>
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="background-color: rgb(202 175 202 / 20%); margin-left: -8px;" id="navbarCtpMenu<?php echo $breif_id1;
                                                                                                                                                                echo $emptyData['user_id']; ?>" class="nav-collapse collapse fileDrop" data-bs-parent="#navbarUsersMenuDiv" hs-parent-area="#navbarVerticalMenuPagesEcommerceMenu">
                                                                        <?php
                                                                        if ($emptyData['className'] == "academic") {
                                                                            $userbriefId = $emptyData['id'];
                                                                            $brFol = $emptyData['folderId'];
                                                                            $brName = $emptyData['briefcase_name'];
                                                                            $ctp = $connect->query("SELECT ctpId FROM folders WHERE id = '$brFol'");
                                                                            $ctpData = $ctp->fetchColumn();
                                                                            $phaseQ = $connect->query("SELECT id FROM phase WHERE ctp = '$ctpData' AND phasename = '$brName'");
                                                                            $phaseId = $phaseQ->fetchColumn();
                                                                            $selectAcClass = $connect->query("SELECT * FROM academic WHERE ctp = '$ctpData' AND phase = '$phaseId'");
                                                                            while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                $fId = $selectAcClassData['file'];
                                                                                // }

                                                                                // }

                                                                                $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                $file_fetch_st2->execute();
                                                                                if ($file_fetch_st2->rowCount() > 0) {
                                                                                    $result_file2 = $file_fetch_st2->fetchAll();
                                                                                    foreach ($result_file2 as $row_file2) {
                                                                                        // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                        // while ($brefData = $fetchBrief->fetch()) {
                                                                                        $fileID = $row_file2['id'];
                                                                                        $fileName = $row_file2['filename'];
                                                                                        $fileLastName = $row_file2['lastName'];


                                                                        ?>

                                                                                        <?php
                                                                                        if ($fileLastName == null) {
                                                                                        ?>
                                                                                            <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                <?php
                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                ?>
                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div style="flex-grow: 1;">
                                                                                                    <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                        <span style="float:left;"><?php echo $selectAcClassData['shortacademic']; ?></span>

                                                                                                        <?php
                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                        $class = 0;
                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                            $class++;
                                                                                                        ?>
                                                                                                            <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                    </a>
                                                                                                </div>

                                                                                                <?php
                                                                                                if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                    <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                        <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                    </button>

                                                                                                <?php
                                                                                                } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                ?>
                                                                                                    <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                        <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                    </button>
                                                                                                <?php
                                                                                                } else {


                                                                                                ?>
                                                                                                    <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                        <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                    </button>
                                                                                                <?php
                                                                                                } ?>
                                                                                            </span>
                                                                                        <?php
                                                                                        } else if ($row_file2['type'] == "offline") {
                                                                                        ?>
                                                                                            <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                <?php
                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                ?>
                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div style="flex-grow: 1;" class="">
                                                                                                    <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                        <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $selectAcClassData['shortacademic']; ?></span>

                                                                                                        <?php
                                                                                                        // $margin = 31;
                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                        $class = 0;
                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                            $class++;
                                                                                                        ?>
                                                                                                            <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                    </a>

                                                                                                </div>

                                                                                                <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                    <i class="bi bi-files text-light"></i></button>
                                                                                                <!-- </div> -->
                                                                                            </span>

                                                                                        <?php
                                                                                        } elseif ($row_file2['type'] == "online") {
                                                                                        ?>

                                                                                            <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                <?php
                                                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                while ($filePerData = $filePer->fetch()) {
                                                                                                ?>
                                                                                                    <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div style="flex-grow: 1;" class="">
                                                                                                    <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                        <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $selectAcClassData['shortacademic']; ?></span>

                                                                                                        <?php
                                                                                                        // $margin = 31;
                                                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                        $class = 0;
                                                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                                                            $class++;
                                                                                                        ?>
                                                                                                            <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                    </a>

                                                                                                </div>
                                                                                                <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                    <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                            </span>


                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }

                                                                        if ($emptyData['className'] == "course") {
                                                                            // $courseId = $emptyData['courseId'];
                                                                            // $fetchStuId = $connect->query("SELECT StudentNames FROM newcourse WHERE Courseid = '$courseId'");
                                                                            $stuId = $emptyData['stuId'];

                                                                            // fetch cap file

                                                                            $selectAcClass = $connect->query("SELECT * FROM notifications WHERE to_userid = '$stuId'");
                                                                            while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                $notiId = $selectAcClassData['id'];
                                                                                $fetchFile = $connect->query("SELECT * FROM assing_warning_doc WHERE noti_id = '$notiId'");
                                                                                while ($fetchFileData = $fetchFile->fetch()) {
                                                                                    $fId = $fetchFileData['files'];
                                                                                    if (is_numeric($fId)) {

                                                                                        $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                        $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                        $file_fetch_st2->execute();
                                                                                        if ($file_fetch_st2->rowCount() > 0) {
                                                                                            $result_file2 = $file_fetch_st2->fetchAll();
                                                                                            foreach ($result_file2 as $row_file2) {
                                                                                                // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                                // while ($brefData = $fetchBrief->fetch()) {
                                                                                                $fileID = $row_file2['id'];
                                                                                                $fileName = $row_file2['filename'];
                                                                                                $fileLastName = $row_file2['lastName'];


                                                                                            ?>

                                                                                                <?php
                                                                                                if ($fileLastName == null) {
                                                                                                ?>
                                                                                                    <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                        <?php
                                                                                                        $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                        while ($filePerData = $filePer->fetch()) {
                                                                                                        ?>
                                                                                                            <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                        <div style="flex-grow: 1;">
                                                                                                            <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                                <span style="float:left;"><?php echo $row_file2['filename']; ?></span>

                                                                                                                <?php
                                                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                $class = 0;
                                                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                                                    $class++;
                                                                                                                ?>
                                                                                                                    <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                            </a>
                                                                                                        </div>

                                                                                                        <?php
                                                                                                        if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                            <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                                <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                            </button>

                                                                                                        <?php
                                                                                                        } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                        ?>
                                                                                                            <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                                <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                            </button>
                                                                                                        <?php
                                                                                                        } else {


                                                                                                        ?>
                                                                                                            <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                                <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                            </button>
                                                                                                        <?php
                                                                                                        } ?>
                                                                                                    </span>
                                                                                                <?php
                                                                                                } else if ($row_file2['type'] == "offline") {
                                                                                                ?>
                                                                                                    <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                        <?php
                                                                                                        $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                        while ($filePerData = $filePer->fetch()) {
                                                                                                        ?>
                                                                                                            <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                        <div style="flex-grow: 1;" class="">
                                                                                                            <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                                <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                <?php
                                                                                                                // $margin = 31;
                                                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                $class = 0;
                                                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                                                    $class++;
                                                                                                                ?>
                                                                                                                    <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                            </a>

                                                                                                        </div>

                                                                                                        <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                        <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                            <i class="bi bi-files text-light"></i></button>
                                                                                                        <!-- </div> -->
                                                                                                    </span>

                                                                                                <?php
                                                                                                } elseif ($row_file2['type'] == "online") {
                                                                                                ?>

                                                                                                    <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                        <?php
                                                                                                        $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                        while ($filePerData = $filePer->fetch()) {
                                                                                                        ?>
                                                                                                            <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                        <div style="flex-grow: 1;" class="">
                                                                                                            <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                                <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                                <?php
                                                                                                                // $margin = 31;
                                                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                                $class = 0;
                                                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                                                    $class++;
                                                                                                                ?>
                                                                                                                    <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                            </a>

                                                                                                        </div>
                                                                                                        <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                        <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                            <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                    </span>


                                                                                            <?php
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }



                                                                            // test file fetching

                                                                            $selectAcClass = $connect->query("SELECT * FROM class_documnet WHERE stuId = '$stuId'");
                                                                            while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                $fId = $selectAcClassData['fileName'];
                                                                                // $fetchFile = $connect->query("SELECT * FROM assing_warning_doc WHERE noti_id = '$notiId'");
                                                                                // while ($fetchFileData = $fetchFile->fetch()) {
                                                                                // $fId = $fetchFileData['files'];
                                                                                if (is_numeric($fId)) {

                                                                                    $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                    $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                    $file_fetch_st2->execute();
                                                                                    if ($file_fetch_st2->rowCount() > 0) {
                                                                                        $result_file2 = $file_fetch_st2->fetchAll();
                                                                                        foreach ($result_file2 as $row_file2) {
                                                                                            // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                            // while ($brefData = $fetchBrief->fetch()) {
                                                                                            $fileID = $row_file2['id'];
                                                                                            $fileName = $row_file2['filename'];
                                                                                            $fileLastName = $row_file2['lastName'];


                                                                                            ?>

                                                                                            <?php
                                                                                            if ($fileLastName == null) {
                                                                                            ?>
                                                                                                <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;">
                                                                                                        <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                            <span style="float:left;"><?php echo $row_file2['filename']; ?></span>

                                                                                                            <?php
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>
                                                                                                    </div>

                                                                                                    <?php
                                                                                                    if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                            <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                        </button>

                                                                                                    <?php
                                                                                                    } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                    ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                            <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                        </button>
                                                                                                    <?php
                                                                                                    } else {


                                                                                                    ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                            <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                        </button>
                                                                                                    <?php
                                                                                                    } ?>
                                                                                                </span>
                                                                                            <?php
                                                                                            } else if ($row_file2['type'] == "offline") {
                                                                                            ?>
                                                                                                <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;" class="">
                                                                                                        <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                            <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                            <?php
                                                                                                            // $margin = 31;
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>

                                                                                                    </div>

                                                                                                    <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                    <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                        <i class="bi bi-files text-light"></i></button>
                                                                                                    <!-- </div> -->
                                                                                                </span>

                                                                                            <?php
                                                                                            } elseif ($row_file2['type'] == "online") {
                                                                                            ?>

                                                                                                <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;" class="">
                                                                                                        <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                            <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                            <?php
                                                                                                            // $margin = 31;
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>

                                                                                                    </div>
                                                                                                    <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                    <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                        <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                </span>


                                                                                            <?php
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                                // }
                                                                            }

                                                                            // end test file fetchinf

                                                                            // discipline file fetchin

                                                                            $selectAcClass = $connect->query("SELECT * FROM discipline WHERE student_id = '$stuId'");
                                                                            while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                $fId = $selectAcClassData['fileName'];
                                                                                // $fetchFile = $connect->query("SELECT * FROM assing_warning_doc WHERE noti_id = '$notiId'");
                                                                                // while ($fetchFileData = $fetchFile->fetch()) {
                                                                                // $fId = $fetchFileData['files'];
                                                                                if (is_numeric($fId)) {

                                                                                    $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                    $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                    $file_fetch_st2->execute();
                                                                                    if ($file_fetch_st2->rowCount() > 0) {
                                                                                        $result_file2 = $file_fetch_st2->fetchAll();
                                                                                        foreach ($result_file2 as $row_file2) {
                                                                                            // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                            // while ($brefData = $fetchBrief->fetch()) {
                                                                                            $fileID = $row_file2['id'];
                                                                                            $fileName = $row_file2['filename'];
                                                                                            $fileLastName = $row_file2['lastName'];


                                                                                            ?>

                                                                                            <?php
                                                                                            if ($fileLastName == null) {
                                                                                            ?>
                                                                                                <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;">
                                                                                                        <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                            <span style="float:left;"><?php echo $row_file2['filename']; ?></span>

                                                                                                            <?php
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>
                                                                                                    </div>

                                                                                                    <?php
                                                                                                    if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                            <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                        </button>

                                                                                                    <?php
                                                                                                    } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                    ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                            <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                        </button>
                                                                                                    <?php
                                                                                                    } else {


                                                                                                    ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                            <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                        </button>
                                                                                                    <?php
                                                                                                    } ?>
                                                                                                </span>
                                                                                            <?php
                                                                                            } else if ($row_file2['type'] == "offline") {
                                                                                            ?>
                                                                                                <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;" class="">
                                                                                                        <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                            <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                            <?php
                                                                                                            // $margin = 31;
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>

                                                                                                    </div>

                                                                                                    <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                    <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                        <i class="bi bi-files text-light"></i></button>
                                                                                                    <!-- </div> -->
                                                                                                </span>

                                                                                            <?php
                                                                                            } elseif ($row_file2['type'] == "online") {
                                                                                            ?>

                                                                                                <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;" class="">
                                                                                                        <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                            <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                            <?php
                                                                                                            // $margin = 31;
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>

                                                                                                    </div>
                                                                                                    <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                    <button style="" type="button" class="btn btn-soft-primary otherbtn" title="Open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                        <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                </span>


                                                                                            <?php
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                                // }
                                                                            }

                                                                            // end discipline fetching

                                                                            // memo file fetchin

                                                                            $selectAcClass = $connect->query("SELECT * FROM memo WHERE student_id = '$stuId'");
                                                                            while ($selectAcClassData = $selectAcClass->fetch()) {
                                                                                $fId = $selectAcClassData['fileName'];
                                                                                // $fetchFile = $connect->query("SELECT * FROM assing_warning_doc WHERE noti_id = '$notiId'");
                                                                                // while ($fetchFileData = $fetchFile->fetch()) {
                                                                                // $fId = $fetchFileData['files'];
                                                                                if (is_numeric($fId)) {

                                                                                    $file_fetch2 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                                                    $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                                    $file_fetch_st2->execute();
                                                                                    if ($file_fetch_st2->rowCount() > 0) {
                                                                                        $result_file2 = $file_fetch_st2->fetchAll();
                                                                                        foreach ($result_file2 as $row_file2) {
                                                                                            // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                            // while ($brefData = $fetchBrief->fetch()) {
                                                                                            $fileID = $row_file2['id'];
                                                                                            $fileName = $row_file2['filename'];
                                                                                            $fileLastName = $row_file2['lastName'];


                                                                                            ?>

                                                                                            <?php
                                                                                            if ($fileLastName == null) {
                                                                                            ?>
                                                                                                <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;">
                                                                                                        <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                            <span style="float:left;"><?php echo $row_file2['filename']; ?></span>

                                                                                                            <?php
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>
                                                                                                    </div>

                                                                                                    <?php
                                                                                                    if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                            <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                        </button>

                                                                                                    <?php
                                                                                                    } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'svg' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp') {
                                                                                                    ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="">
                                                                                                            <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                        </button>
                                                                                                    <?php
                                                                                                    } else {


                                                                                                    ?>
                                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                            <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                        </button>
                                                                                                    <?php
                                                                                                    } ?>
                                                                                                </span>
                                                                                            <?php
                                                                                            } else if ($row_file2['type'] == "offline") {
                                                                                            ?>
                                                                                                <span id="userLink<?php echo $fileID; ?>" class="nav-link get_url_val1 testoff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;" class="">
                                                                                                        <a class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" style="color: white;" name="">
                                                                                                            <span style="float: left;" title="<?php echo $row_file2['filename']; ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                            <?php
                                                                                                            // $margin = 31;
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>

                                                                                                    </div>

                                                                                                    <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>


                                                                                                    <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                        <i class="bi bi-files text-light"></i></button>
                                                                                                    <!-- </div> -->
                                                                                                </span>

                                                                                            <?php
                                                                                            } elseif ($row_file2['type'] == "online") {
                                                                                            ?>

                                                                                                <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                                    <?php
                                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                                    ?>
                                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    <div style="flex-grow: 1;" class="">
                                                                                                        <a class="driveLink" href="<?php echo $row_file2['filename'] ?>" style="color:white;width:100%;display:inline-block;" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" target="_blank">
                                                                                                            <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo $row_file2['lastName']; ?></span>

                                                                                                            <?php
                                                                                                            // $margin = 31;
                                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                            $class = 0;
                                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                                $class++;
                                                                                                            ?>
                                                                                                                <span style="color:white;width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </a>

                                                                                                    </div>
                                                                                                    <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                                    <button style="" type="button" class="btn btn-soft-primary otherbtn" title="open Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                        <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                                </span>


                                                                        <?php
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                                // }
                                                                            }

                                                                            // end memo fetching

                                                                            // end fetch cap file
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                    if ($role == "super admin") {
                                                        $tempBrief = $connect->query("SELECT *
                                            FROM tempbrief
                                            WHERE folderId = '$f_id' AND shopid = '$shopId'");
                                                        while ($resTemp = $tempBrief->fetch()) {
                                                            $tempBrId = $resTemp['briefId'];
                                                            $emptyBriefCase1 = $connect->query("SELECT * FROM user_briefcase WHERE id = '$tempBrId' ORDER BY briefcase_name ASC");
                                                            while ($emptyData = $emptyBriefCase1->fetch()) {
                                                                $breif_id1 = $emptyData['id'];
                                                        ?>

                                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                    <div id="navbarUsersMenuDiv">


                                                                        <!-- Collapse -->
                                                                        <div class="nav-item">
                                                                            <a style="border-left: 2px solid <?php echo $emptyData['color']; ?>;border-radius: 0px;" class="nav-link dropdown-toggle collapsed openBrief navbarCtpMenu<?php echo $breif_id1;
                                                                                                                                                                                                                                        echo $emptyData['user_id']; ?>" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu<?php echo $breif_id1;
                                                                                                                                                                                                                                                                                                                                                                    echo $emptyData['user_id']; ?>" aria-expanded="false" aria-controls="navbarCtpMenu" value="navbarCtpMenu<?php echo $breif_id1;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo $emptyData['user_id']; ?>">
                                                                                <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/phase2white/briefcase.png" class="testFun">
                                                                                <span style="color:white;" id="<?php echo $breif_id1 ?>" onclick="redirectToPage1(this);"><?php echo $emptyData['briefcase_name'] ?></span>

                                                                            </a>
                                                                            <div class="dropdown addBreifFile buti" name="<?php echo $breif_id1; ?>" value="0" data-custom="user">
                                                                                <button style="position:absolute; margin-left: 40px;" type="button" class="btn iconBtn btn-soft-secondary btn-sm " id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                                                    <img class="button-image" style="height:20px; width:20px;" src="<?php echo BASE_URL ?>assets/svg/3dfile/file2.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Files"> </button>

                                                                                <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 20rem; position:absolute;top:2px;">
                                                                                    <!-- Header -->
                                                                                    <div class="card-header card-header-content-between">
                                                                                        <h4 class="card-title mb-0">Select Type</h4>
                                                                                        <?php if ($_SESSION['role'] == "super admin" || $checkPhaseManagerBackUpData > 0) { ?>
                                                                                            <button style="background-color: #7901c1; color:white;" class="btn btn-sm" data-bs-toggle="modal" onclick="document.getElementById('bridus').value='<?php echo $emptyData['id'] ?>';" data-bs-target="#selectbriefcase2">Select</button>
                                                                                        <?php } ?>
                                                                                    </div>

                                                                                    <!-- Body -->
                                                                                    <div class="card-body-height">
                                                                                        <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                                            <option selected>Select File Type</option>
                                                                                            <option value="addNewPage">New Page</option>
                                                                                            <option value="addFile">Attachment</option>
                                                                                            <option value="addFileLoca">Drive Link</option>
                                                                                            <option value="addFileLink">Link</option>
                                                                                        </select>
                                                                                        <form action="<?php echo BASE_URL ?>Library/addfile_user.php" method="post" enctype="multipart/form-data" style="width:95%;margin: auto;margin-top: 25px;" id="multipleFile" class="multipleFile">
                                                                                            <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                            <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $breif_id1; ?>" />
                                                                                            <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                            <div class="input-field">
                                                                                                <table class="table table-bordered">
                                                                                                    <tr>
                                                                                                        <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                                                                                            <input type="file" class="form-control" name="file[]" id="" multiple />
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </div><br>
                                                                                            <center>
                                                                                                <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                <br>
                                                                                                <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                    <option value="All instructor">Instructor Only</option>
                                                                                                    <option value="Everyone" selected>Everyone</option>
                                                                                                    <option value="None">None</option>
                                                                                                </select>
                                                                                                <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                    <option selected value="readOnly">ReadOnly</option>
                                                                                                    <option value="None">None</option>
                                                                                                    <option value="readAndWrite">Read And Write</option>
                                                                                                </select>
                                                                                                <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                <table class="table table-bordered tableData" style="display:none;">
                                                                                                    <thead class="bg-dark">
                                                                                                        <tr>
                                                                                                            <th class="text-light">#</th>
                                                                                                            <th class="text-light">Profile Image</th>
                                                                                                            <th class="text-light">Name</th>

                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody class="userDetail">

                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </center>
                                                                                            <center>
                                                                                                <input style="margin:5px; background-color: #7901c1; color:white;" type="submit" value="Submit" name="submitfiles" class="btn" />
                                                                                                <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                            </center>
                                                                                        </form>
                                                                                        <br>
                                                                                        <center>
                                                                                            <form class="insert-phases phase_form" id="phase_form" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                                <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $breif_id1; ?>" />
                                                                                                <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
                                                                                                <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                                <div class="input-field">
                                                                                                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                                                                                                    <table class="table table-bordered" id="table-field">
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <center>
                                                                                                    <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                    <br>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                        <option value="All instructor">Instructor Only</option>
                                                                                                        <option value="Everyone" selected>Everyone</option>
                                                                                                        <option value="None">None</option>
                                                                                                    </select>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                        <option selected value="readOnly">ReadOnly</option>
                                                                                                        <option value="None">None</option>
                                                                                                        <option value="readAndWrite">Read And Write</option>
                                                                                                    </select>
                                                                                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                    <table class="table table-bordered tableData" style="display:none;">
                                                                                                        <thead class="bg-dark">
                                                                                                            <tr>
                                                                                                                <th class="text-light">#</th>
                                                                                                                <th class="text-light">Profile Image</th>
                                                                                                                <th class="text-light">Name</th>

                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody class="userDetail">

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </center>
                                                                                                <center>
                                                                                                    <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="phase_submit" name="savephase">Submit</button>
                                                                                                    <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                                </center>
                                                                                            </form>
                                                                                        </center>
                                                                                        <center>
                                                                                            <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                                <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $breif_id1; ?>" />
                                                                                                <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                                                <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                                <div class="input-field">
                                                                                                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                                                                                                    <table class="table table-bordered" id="table-field-link">
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                                            </td>

                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" />
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <center>
                                                                                                    <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                    <br>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                        <option value="All instructor">Instructor Only</option>
                                                                                                        <option value="None">None</option>
                                                                                                        <option value="Everyone" selected>Everyone</option>
                                                                                                    </select>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                        <option value="readOnly">ReadOnly</option>
                                                                                                        <option value="None">None</option>
                                                                                                        <option value="readAndWrite">Read And Write</option>
                                                                                                    </select>
                                                                                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                    <table class="table table-bordered tableData" style="display:none;">
                                                                                                        <thead class="bg-dark">
                                                                                                            <tr>
                                                                                                                <th class="text-light">#</th>
                                                                                                                <th class="text-light">Profile Image</th>
                                                                                                                <th class="text-light">Name</th>

                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody class="userDetail">

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <center>
                                                                                                        <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                                                        <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                                    </center>
                                                                                                </center>
                                                                                            </form>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                    <?php
                                                            }
                                                        }
                                                    }


                                                    $briefIdArray = array();
                                                    $briefI = 0;
                                                    if ($_SESSION['role'] == 'student') {
                                                        $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND permissionId != '$userId'");
                                                    }
                                                    if ($_SESSION['role'] == 'instructor') {
                                                        $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$userId' OR userId = 'All instructor') AND permissionId != '$userId'");
                                                    }
                                                    if ($_SESSION['role'] == 'super admin') {
                                                        $permissionPageId = $connect->query("SELECT * FROM pagepermissions WHERE permissionId != '$userId'");
                                                    }
                                                    while ($perId = $permissionPageId->fetch()) {
                                                        $pageId = $perId['pageId'];
                                                        $pagePermission = $connect->query("SELECT DISTINCT briefId
                                            FROM editor_data
                                            WHERE id = '$pageId'");
                                                        while ($perBriefName = $pagePermission->fetch()) {
                                                            if (!in_array($perBriefName['briefId'], $briefIdArray)) {
                                                                $briefIdArray[$briefI] = $perBriefName['briefId'];
                                                                $briefI++;
                                                            }
                                                        }
                                                    }
                                                    if ($_SESSION['role'] == 'student') {
                                                        $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND permissionId != '$userId'");
                                                    }
                                                    if ($_SESSION['role'] == 'instructor') {
                                                        $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$userId' OR userId = 'All instructor') AND permissionId != '$userId'");
                                                    }
                                                    if ($_SESSION['role'] == 'super admin') {
                                                        $permissionFileId = $connect->query("SELECT * FROM filepermissions WHERE permissionId != '$userId'");
                                                    }

                                                    while ($perId = $permissionFileId->fetch()) {
                                                        $pageId = $perId['pageId'];
                                                        $filePermission = $connect->query("SELECT DISTINCT briefId
                                            FROM user_files
                                            WHERE id = '$pageId'");
                                                        while ($perBriefName = $filePermission->fetch()) {
                                                            if (!in_array($perBriefName['briefId'], $briefIdArray)) {
                                                                $briefIdArray[$briefI] = $perBriefName['briefId'];
                                                                $briefI++;
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                    <?php
                                                    $briefCount = 0;
                                                    while ($briefI > 0) {
                                                        $perBriefId = $briefIdArray[$briefCount];
                                                        $perBrief = $connect->query("SELECT * FROM user_briefcase WHERE id = '$perBriefId' AND role != 'super admin' AND user_id != '$userId' AND folderId = '$f_id' AND shopid = '$shopId' ORDER BY briefcase_name ASC");
                                                        while ($perBriefData = $perBrief->fetch()) {
                                                            $briefPerId = $perBriefData['id'];
                                                    ?>
                                                            <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                <div id="navbarUsersMenuDiv">


                                                                    <!-- Collapse -->
                                                                    <div class="nav-item">
                                                                        <a style="border-left: 2px solid <?php echo $perBriefData['color']; ?>;border-radius: 0px;" class="nav-link dropdown-toggle collapsed openBrief navbarCtpMenu<?php echo $briefPerId;
                                                                                                                                                                                                                                        echo $perBriefData['user_id']; ?>" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu<?php echo $perBriefData['id'];
                                                                                                                                                                                                                                                                                                                                                                        echo $perBriefData['user_id']; ?>" aria-expanded="false" aria-controls="navbarCtpMenu" value="navbarCtpMenu<?php echo $perBriefData['id'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $perBriefData['user_id']; ?>">
                                                                            <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/phase2white/briefcase.png" class="testFun">
                                                                            <span style="color:white;"><?php echo $perBriefData['briefcase_name']; ?></span>

                                                                        </a>

                                                                        <?php
                                                                        if ($role == "super admin") {
                                                                        ?>
                                                                            <div class="dropdown addBreifFile buti" name="<?php echo $briefPerId; ?>" value="0" data-custom="user">
                                                                                <button style="position:absolute; margin-left: 40px;" type="button" class="btn iconBtn btn-soft-secondary btn-sm " id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                                                    <img class="button-image" style="height:20px; width:20px;" src="<?php echo BASE_URL ?>assets/svg/3dfile/file2.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Files"> </button>

                                                                                <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 20rem; position:absolute;top:2px;">
                                                                                    <!-- Header -->
                                                                                    <div class="card-header card-header-content-between">
                                                                                        <h4 class="card-title mb-0">Select Type</h4>
                                                                                        <?php if ($_SESSION['role'] == "super admin" || $checkPhaseManagerBackUpData > 0) { ?>
                                                                                            <button style="background-color: #7901c1; color:white;" class="btn btn-sm" data-bs-toggle="modal" onclick="document.getElementById('bridus').value='<?php echo $perBriefData['id'] ?>';" data-bs-target="#selectbriefcase2">Select</button>
                                                                                        <?php } ?>
                                                                                    </div>

                                                                                    <!-- Body -->
                                                                                    <div class="card-body-height">
                                                                                        <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                                            <option selected>Select File Type</option>
                                                                                            <option value="addNewPage">New Page</option>
                                                                                            <option value="addFile">Attachment</option>
                                                                                            <option value="addFileLoca">Drive Link</option>
                                                                                            <option value="addFileLink">Link</option>
                                                                                        </select>
                                                                                        <form action="<?php echo BASE_URL ?>Library/addfile_user.php" method="post" enctype="multipart/form-data" style="width:95%;margin: auto;margin-top: 25px;" id="multipleFile" class="multipleFile">
                                                                                            <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                            <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $briefPerId; ?>" />
                                                                                            <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                            <div class="input-field">
                                                                                                <table class="table table-bordered">
                                                                                                    <tr>
                                                                                                        <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                                                                                            <input type="file" class="form-control" name="file[]" id="" multiple />
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </div><br>
                                                                                            <center>
                                                                                                <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                <br>
                                                                                                <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                    <option value="All instructor">Instructor Only</option>
                                                                                                    <option value="Everyone" selected>Everyone</option>
                                                                                                    <option value="None">None</option>
                                                                                                </select>
                                                                                                <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                    <option selected value="readOnly">ReadOnly</option>
                                                                                                    <option value="None">None</option>
                                                                                                    <option value="readAndWrite">Read And Write</option>
                                                                                                </select>
                                                                                                <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                <table class="table table-bordered tableData" style="display:none;">
                                                                                                    <thead class="bg-dark">
                                                                                                        <tr>
                                                                                                            <th class="text-light">#</th>
                                                                                                            <th class="text-light">Profile Image</th>
                                                                                                            <th class="text-light">Name</th>

                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody class="userDetail">

                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </center>
                                                                                            <center>
                                                                                                <input style="margin:5px; background-color: #7901c1; color:white;" type="submit" value="Submit" name="submitfiles" class="btn" />
                                                                                                <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                            </center>
                                                                                        </form>
                                                                                        <br>
                                                                                        <center>
                                                                                            <form class="insert-phases phase_form" id="phase_form" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                                <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $briefPerId; ?>" />
                                                                                                <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
                                                                                                <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                                <div class="input-field">
                                                                                                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                                                                                                    <table class="table table-bordered" id="table-field">
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <center>
                                                                                                    <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                    <br>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                        <option value="All instructor">Instructor Only</option>
                                                                                                        <option value="Everyone" selected>Everyone</option>
                                                                                                        <option value="None">None</option>
                                                                                                    </select>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                        <option selected value="readOnly">ReadOnly</option>
                                                                                                        <option value="None">None</option>
                                                                                                        <option value="readAndWrite">Read And Write</option>
                                                                                                    </select>
                                                                                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                    <table class="table table-bordered tableData" style="display:none;">
                                                                                                        <thead class="bg-dark">
                                                                                                            <tr>
                                                                                                                <th class="text-light">#</th>
                                                                                                                <th class="text-light">Profile Image</th>
                                                                                                                <th class="text-light">Name</th>

                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody class="userDetail">

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </center>
                                                                                                <center>
                                                                                                    <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="phase_submit" name="savephase">Submit</button>
                                                                                                    <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                                </center>
                                                                                            </form>
                                                                                        </center>
                                                                                        <center>
                                                                                            <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                                <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo $briefPerId; ?>" />
                                                                                                <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                                                <input type="hidden" name="fileBriefcase" class="" value="user" />
                                                                                                <div class="input-field">
                                                                                                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                                                                                                    <table class="table table-bordered" id="table-field-link">
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                                            </td>

                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" />
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <center>
                                                                                                    <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                                    <br>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                                        <option value="All instructor">Instructor Only</option>
                                                                                                        <option value="None">None</option>
                                                                                                        <option value="Everyone" selected>Everyone</option>
                                                                                                    </select>
                                                                                                    <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                                                                                                        <option value="readOnly">ReadOnly</option>
                                                                                                        <option value="None">None</option>
                                                                                                        <option value="readAndWrite">Read And Write</option>
                                                                                                    </select>
                                                                                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                                                                                    <table class="table table-bordered tableData" style="display:none;">
                                                                                                        <thead class="bg-dark">
                                                                                                            <tr>
                                                                                                                <th class="text-light">#</th>
                                                                                                                <th class="text-light">Profile Image</th>
                                                                                                                <th class="text-light">Name</th>

                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody class="userDetail">

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <center>
                                                                                                        <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                                                        <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                                    </center>
                                                                                                </center>
                                                                                            </form>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <div style="background-color: rgb(202 175 202 / 20%);" id="navbarCtpMenu<?php echo $briefPerId;
                                                                                                                                                echo $perBriefData['user_id']; ?>" class="nav-collapse collapse fileDrop" data-bs-parent="#navbarUsersMenuDiv" hs-parent-area="#navbarVerticalMenuPagesEcommerceMenu">
                                                                            <?php
                                                                            $file_fetch2 = "SELECT * FROM user_files where briefId='$briefPerId' and folderId='$f_id' AND shopid = '$shopId' ORDER BY filename ASC";
                                                                            $file_fetch_st2 = $connect->prepare($file_fetch2);
                                                                            $file_fetch_st2->execute();
                                                                            if ($file_fetch_st2->rowCount() > 0) {
                                                                                $result_file2 = $file_fetch_st2->fetchAll();
                                                                                foreach ($result_file2 as $row_file2) {
                                                                                    // $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                    // while ($brefData = $fetchBrief->fetch()) {
                                                                                    $fileID = $row_file2['id'];
                                                                                    $fileName = $row_file2['filename'];
                                                                                    $fileLastName = $row_file2['lastName'];

                                                                                    if ($_SESSION['role'] == "student") {
                                                                                        $perfile = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$fileID' AND (userId = 'Everyone' OR userId = '$userId')");
                                                                                    }
                                                                                    if ($_SESSION['role'] == "instructor") {
                                                                                        $perfile = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$fileID' AND (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId')");
                                                                                    }
                                                                                    // if($_SESSION['role'] == "instructor"){
                                                                                    //     $perfile = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$fileID' AND userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId'");
                                                                                    // }

                                                                                    if ($_SESSION['role'] == "super admin") {
                                                                                        $perfile = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$fileID' AND userId != 'NONE'");
                                                                                    }

                                                                                    $perfileRes = $perfile->fetchColumn();

                                                                                    if ($perfileRes == 0) {
                                                                                        continue;
                                                                                    }
                                                                            ?>

                                                                                    <?php
                                                                                    if ($fileLastName == null) {
                                                                                    ?>
                                                                                        <span value="<?php echo $row_file2['type']; ?>" name="<?php echo $row_file2['filename']; ?>" id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;" class="nav-link userLink docxLink">
                                                                                            <?php
                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                            ?>
                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -9px;"></div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <div style="flex-grow: 1;">
                                                                                                <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row_file2['filename']; ?>&fileID=<?php echo $fileID; ?>" class="archana circle 2" style="color: white;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">

                                                                                                    <span style="float: left;"><?php echo substr($row_file2['filename'], 0, 15);
                                                                                                                                echo $perfileRes; ?></span>
                                                                                                </a>
                                                                                                <?php
                                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                $class = 0;
                                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                                    $class++;
                                                                                                ?>
                                                                                                    <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                                <?php
                                                                                                }
                                                                                                ?>
                                                                                            </div>

                                                                                            <?php
                                                                                            if ($row_file2['type'] == 'xlsx' || $row_file2['type'] == 'docx' || $row_file2['type'] == 'pptx') { ?>
                                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages//fheader1.php/<?php echo $row_file2['filename']; ?>');">
                                                                                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                                </button>

                                                                                            <?php
                                                                                            } elseif ($row_file2['type'] == 'jpg' || $row_file2['type'] == 'jpeg' || $row_file2['type'] == 'png' || $row_file2['type'] == 'gif' || $row_file2['type'] == 'webp' || $row_file2['type'] == 'svg') {
                                                                                            ?>
                                                                                                <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="button">
                                                                                                    <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                                </button>
                                                                                            <?php
                                                                                            } else {


                                                                                            ?>
                                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                                </button>
                                                                                            <?php
                                                                                            } ?>
                                                                                        </span>
                                                                                    <?php
                                                                                    } else if ($row_file2['type'] == "offline") {
                                                                                    ?>
                                                                                        <span id="userLink<?php echo $fileID; ?>" class="get_url_val1 nav-link testoffff userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                            <?php
                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                            ?>
                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-9px; margin-right: 10px;"></div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <div style="flex-grow: 1;">
                                                                                                <a href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['lastName']; ?>" name="" class="driveLink1" value="<?php echo $row_file2['filename']; ?>" style="color: white;width:100%;display:inline-block;">
                                                                                                    <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo substr($row_file2['lastName'], 0, 15); ?></span>

                                                                                                    <?php
                                                                                                    // $margin = 31;
                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                    $class = 0;
                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                        $class++;
                                                                                                    ?>
                                                                                                        <span style="color:white; margin: 5px; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:10px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </a>
                                                                                            </div>

                                                                                            <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>

                                                                                            <!-- <i class="bi bi-files" style="color:white; font-size:18px; margin-right: 5px;" title="copy link" id="<?php echo $row_file2['id'] ?>"></i> -->
                                                                                            <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row_file2['id'] ?>">
                                                                                                <i class="bi bi-files text-light"></i></button>
                                                                                            <!-- </div> -->
                                                                                        </span>

                                                                                    <?php
                                                                                    } elseif ($row_file2['type'] == "online") {
                                                                                    ?>

                                                                                        <span id="userLink<?php echo $fileID; ?>" class="nav-link texton userLink" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row_file2['color']; ?>;border-radius: 0px;">
                                                                                            <?php
                                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' GROUP BY color");
                                                                                            while ($filePerData = $filePer->fetch()) {
                                                                                            ?>
                                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -9px;margin-right: 10px;"></div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                            <div style="flex-grow: 1;">
                                                                                                <a href="<?php echo $row_file2['filename']; ?>" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileID; ?>&fileName=<?php echo $row_file2['filename']; ?>" class="driveLink" style="color: white;width:100%;display:inline-block;" target="_blank">
                                                                                                    <span style="float: left;" title="<?php echo $row_file2['filename'] ?>"><?php echo substr($row_file2['lastName'], 0, 15); ?></span>

                                                                                                    <?php
                                                                                                    // $margin = 31;
                                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID' AND userId = '$userId'");
                                                                                                    $class = 0;
                                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                                        $class++;
                                                                                                    ?>
                                                                                                        <span style="color:white; margin: 5px; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:1px;display:inline-block;background: <?php echo $circlecolor; ?>" class="usersOnlineLink<?php echo $class; ?>"></span>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </a>

                                                                                            </div>

                                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row_file2['id'] ?>" target="_blank"><?php echo $fileName; ?></a>

                                                                                            <!-- <i id="<?php echo $row_file2['id'] ?>" class="bi bi-files" style="color:white; font-size:18px; margin-right:5px;"></i> -->
                                                                                            <button style="float:right;" class="btn btn-soft-primary otherbtn" title="Open link" id="<?php echo $row_file2['id'] ?>">
                                                                                                <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>


                                                                                        </span>


                                                                            <?php
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <?php
                                                                            $file_fetch12 = "SELECT * FROM editor_data where briefId='$briefPerId' and folderId='$f_id' AND shopid = '$shopId' ORDER BY pageName ASC";
                                                                            $file_fetch_st12 = $connect->prepare($file_fetch12);
                                                                            $file_fetch_st12->execute();
                                                                            if ($file_fetch_st12->rowCount() > 0) {
                                                                                $result_file12 = $file_fetch_st12->fetchAll();
                                                                                foreach ($result_file12 as $row_file12) {
                                                                                    // $briefPageQuery = $connect->query("SELECT * FROM editor_data WHERE briefId = '$userbriefId' AND folderId = '$f_id'");
                                                                                    // while ($briefData = $briefPageQuery->fetch()) {
                                                                                    $breifId = $row_file12['id'];
                                                                                    if ($_SESSION['role'] == "student") {
                                                                                        $perfile = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$breifId' AND (userId = 'Everyone' OR userId = '$userId')");
                                                                                    }
                                                                                    if ($_SESSION['role'] == "instructor") {
                                                                                        $perfile = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$breifId' AND (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId')");
                                                                                    }
                                                                                    // if($_SESSION['role'] == "instructor"){
                                                                                    //     $perfile = $connect->query("SELECT count(*) FROM filepermissions WHERE pageId = '$fileID' AND userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId'");
                                                                                    // }

                                                                                    if ($_SESSION['role'] == "super admin") {
                                                                                        $perfile = $connect->query("SELECT count(*) FROM pagepermissions WHERE pageId = '$breifId' AND userId != 'NONE'");
                                                                                    }

                                                                                    $perfileRes = $perfile->fetchColumn();

                                                                                    if ($perfileRes == 0) {
                                                                                        continue;
                                                                                    }
                                                                            ?>
                                                                                    <div style="display:flex; align-items:center; height: 35px;border-left:2px solid <?php echo $row_file12['color']; ?>;border-radius: 0px; cursor: pointer;" class="nav-link" onclick="redirectToPage('<?php echo BASE_URL; ?>Library/pageData.php?bId=<?php echo $breifId; ?>&userBrief_ID=<?php echo $userbriefId; ?>');">

                                                                                        <a data-bs-placement="bottom" title="<?php echo $row_file12['pageName'] ?>" id="userPage<?php echo $breifId; ?>" style="color: white;" class="userPage">
                                                                                            <?php echo substr($row_file12['pageName'], 0, 15); ?></a>
                                                                                        <?php
                                                                                        $perColor1 = array();
                                                                                        $perC = 0;
                                                                                        $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$breifId'");
                                                                                        while ($perColor = $perColorQ->fetch()) {

                                                                                            if (!in_array($perColor['color'], $perColor1)) {
                                                                                        ?>
                                                                                                <span style="border-left: 3px solid <?php echo $perColor['color']; ?>;margin-right: 5px;"></span>
                                                                                        <?php
                                                                                            }
                                                                                            $perColor1[$perC] = $perColor['color'];
                                                                                            $perC++;
                                                                                        } ?>

                                                                                        <div style="flex-grow: 1;">

                                                                                            <?php
                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$breifId' AND userId = '$userId'");
                                                                                            $class = 0;
                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                $class++;
                                                                                            ?>
                                                                                                <span style="color:white; width: 19px; height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;top:4px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userpages<?php echo $class; ?>"></span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>

                                                                                        </div>

                                                                                        <!-- <button class="btn btn-soft-primary otherbtn" title="Open Page" id="<?php echo $row_file12['id'] ?>">
                                                                                        <a><i class="bi bi-files" style="color:white;"></i></a></button> -->
                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                                                                            <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                        </button>
                                                                                    </div>

                                                                            <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php
                                                            // echo $perBriefData['briefcase_name'] . "<br>";
                                                        }
                                                        $briefCount++;
                                                        $briefI--;
                                                    }
                                                    ?>

                                                    <!-- fetchinf phase file -->

                                                    <?php
                                                    $fetchPhaseQ = $connect->query("SELECT phaseId FROM folders WHERE id = '$f_id' AND phaseId IS NOT NULL");

                                                    if ($fetchPhaseQ->rowCount() > 0) {


                                                        $phaseId = $fetchPhaseQ->fetchColumn();
                                                        if ($role == "super admin") {
                                                            $phaseFile = $connect->query("SELECT * FROM user_files WHERE is_phase_resourse = '$phaseId'");
                                                        } else {
                                                            $phaseFile = $connect->query("SELECT * FROM phasefilepermission WHERE phaseId = '$phaseId' AND instId = '$userId' GROUP BY fileId");
                                                        }

                                                        while ($phaseData = $phaseFile->fetch()) {
                                                            if ($role == "super admin") {
                                                                $fId = $phaseData['id'];
                                                            } else {
                                                                $fId = $phaseData['fileId'];
                                                            }


                                                            $allitem1_a1 = "SELECT * FROM user_files WHERE id = '$fId'";
                                                            $statement1_a1 = $connect->prepare($allitem1_a1);
                                                            $statement1_a1->execute();
                                                            if ($statement1_a1->rowCount() > 0) {
                                                                $result1_a1 = $statement1_a1->fetchAll();

                                                                foreach ($result1_a1 as $row11) {
                                                                    $us_id11 = $row11['user_id'];
                                                                    $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                                    $user_names1->execute([$us_id11]);
                                                                    $name12301 = $user_names1->fetchColumn();
                                                                    $fileId = $row11['id'];
                                                                    $fileName = $row11['filename'];
                                                                    $fileLastName = $row11['lastName'];
                                                    ?>
                                                                    <?php
                                                                    if ($fileLastName == null) {
                                                                    ?>
                                                                        <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                            <div id="navbarUsersMenuDiv">
                                                                                <span value="<?php echo $row11['type']; ?>" name="<?php echo $row11['filename']; ?>" id="folderFile<?php echo $fileId; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;" class="nav-link folderFile docxLink">
                                                                                    <?php
                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                    ?>
                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left:-9px;"></div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                    <div style="flex-grow: 1;">
                                                                                        <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row11['filename']; ?>&fileID=<?php echo $fileId; ?>" class="ayushi" style="color: white; float: left;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">
                                                                                            <span><?php echo substr($row11['filename'], 0, 15); ?></span>

                                                                                            <?php
                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                            $class = 0;
                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                $class++;
                                                                                            ?>
                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;display:inline-block;top:4px;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </a>
                                                                                    </div>

                                                                                    <?php
                                                                                    if ($row11['type'] == 'xlsx' || $row11['type'] == 'docx' || $row11['type'] == 'pptx') { ?>
                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row11['filename']; ?>');">
                                                                                            <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                        </button>

                                                                                    <?php
                                                                                    } elseif ($row11['type'] == 'jpg' || $row11['type'] == 'jpeg' || $row11['type'] == 'png' || $row11['type'] == 'svg' || $row11['type'] == 'gif' || $row11['type'] == 'webp') {
                                                                                    ?>
                                                                                        <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="button">
                                                                                            <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                        </button>
                                                                                    <?php
                                                                                    } else {


                                                                                    ?>
                                                                                        <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row11['filename']; ?>');">
                                                                                            <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                        </button>
                                                                                    <?php
                                                                                    } ?>


                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } else if ($row11['type'] == "offline") {
                                                                    ?>
                                                                        <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                            <div id="navbarUsersMenuDiv">
                                                                                <span id="folderFile<?php echo $fileId; ?>" class="get_url_val1 nav-link folderfileu folderFile" style="display:flex; align-items:center; height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;">

                                                                                    <?php
                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                    ?>
                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left:-9px;"></div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>

                                                                                    <div style="flex-grow: 1;">
                                                                                        <a href="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileId; ?>&fileName=<?php echo $row11['filename']; ?>" name="" class="driveLink1" value="<?php echo $row11['filename']; ?>" style="color: white;width:100%;display:inline-block;" target="_blank">

                                                                                            <span title="<?php echo $row11['filename'] ?>"><?php echo substr($row11['lastName'], 0, 15); ?></span>


                                                                                            <?php
                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                            $class = 0;
                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                $class++;
                                                                                            ?>
                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px; -moz-border-radius: 25px;border-radius: 25px;position:relative;top:8px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </a>

                                                                                    </div>


                                                                                    <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row11['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                    <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row11['id'] ?>">
                                                                                        <i class="bi bi-files text-light"></i></button>

                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($row11['type'] == "online") {
                                                                    ?>
                                                                        <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                            <div id="navbarUsersMenuDiv">
                                                                                <span id="folderFile<?php echo $fileId; ?>" class="nav-link ontest folderFile" style="display:flex; align-items:center; height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;">
                                                                                    <?php
                                                                                    $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                                    while ($filePerData = $filePer->fetch()) {
                                                                                    ?>
                                                                                        <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:2px; margin-left: -9px;"></div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                    <div style="flex-grow: 1;">
                                                                                        <a href="<?php $row11['filename']; ?>" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileId; ?>&fileName=<?php echo $row11['filename']; ?>" class="driveLink" style="color: white;width:100%;display:inline-block;" target="_blank">
                                                                                            <?php
                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                            $class = 0;
                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                                $class++;
                                                                                            ?>
                                                                                                <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px; border-radius: 25px; position:relative;display:inline-block;top:10px; background: <?php echo $circlecolor; ?>" class="usersOnlineLink<?php echo $class; ?>"></span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>


                                                                                            <span style="margin-left:10px;" title="<?php echo $row11['filename'] ?>"><?php echo substr($row11['lastName'], 0, 15); ?></span>
                                                                                        </a>
                                                                                    </div>


                                                                                    <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row11['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                    <button style="" class="btn btn-soft-primary otherbtn" title="Open link" id="<?php echo $row11['id'] ?>">
                                                                                        <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                    <!-- end fetching file -->

                                                    <?php
                                                    $allitem1_a1 = "SELECT * FROM user_files WHERE briefId='0' AND folderId='$f_id' AND shopid = '$shopId' AND (user_id = '$userId' AND role != 'super admin') ORDER BY filename ASC";
                                                    $statement1_a1 = $connect->prepare($allitem1_a1);
                                                    $statement1_a1->execute();
                                                    if ($statement1_a1->rowCount() > 0) {
                                                        $result1_a1 = $statement1_a1->fetchAll();

                                                        foreach ($result1_a1 as $row11) {
                                                            $us_id11 = $row11['user_id'];
                                                            $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                            $user_names1->execute([$us_id11]);
                                                            $name12301 = $user_names1->fetchColumn();
                                                            $fileId = $row11['id'];
                                                            $fileName = $row11['filename'];
                                                            $fileLastName = $row11['lastName'];
                                                            if ($_SESSION['role'] == 'student' && $row_file2['role'] == "super admin") {
                                                                $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND pageId = '$fileId'");
                                                                $perFileData = $filePermission->fetchColumn();
                                                                if ($perFileData <= 0) {
                                                                    continue;
                                                                }
                                                            }
                                                            if ($_SESSION['role'] == 'instructor' && $row_file2['role'] == "super admin") {
                                                                $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId') AND pageId = '$fileId'");
                                                                $perFileData = $filePermission->fetchColumn();
                                                                if ($perFileData <= 0) {
                                                                    continue;
                                                                }
                                                            }
                                                    ?>
                                                            <?php
                                                            if ($fileLastName == null) {
                                                            ?>
                                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                    <div id="navbarUsersMenuDiv">
                                                                        <span value="<?php echo $row11['type']; ?>" name="<?php echo $row11['filename']; ?>" id="folderFile<?php echo $fileId; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;" class="nav-link folderFile docxLink">
                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left:-9px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div style="flex-grow: 1;">
                                                                                <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row11['filename']; ?>&fileID=<?php echo $fileId; ?>" class="ayushi" style="color: white; float: left;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">
                                                                                    <span><?php echo substr($row11['filename'], 0, 15); ?></span>

                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                    $class = 0;
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                        $class++;
                                                                                    ?>
                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;display:inline-block;top:4px;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </a>
                                                                            </div>

                                                                            <?php
                                                                            if ($row11['type'] == 'xlsx' || $row11['type'] == 'docx' || $row11['type'] == 'pptx') { ?>
                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row11['filename']; ?>');">
                                                                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                </button>

                                                                            <?php
                                                                            } elseif ($row11['type'] == 'jpg' || $row11['type'] == 'jpeg' || $row11['type'] == 'png' || $row11['type'] == 'svg' || $row11['type'] == 'gif' || $row11['type'] == 'webp') {
                                                                            ?>
                                                                                <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="button">
                                                                                    <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                </button>
                                                                            <?php
                                                                            } else {


                                                                            ?>
                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row11['filename']; ?>');">
                                                                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                </button>
                                                                            <?php
                                                                            } ?>


                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else if ($row11['type'] == "offline") {
                                                            ?>
                                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                    <div id="navbarUsersMenuDiv">
                                                                        <span id="folderFile<?php echo $fileId; ?>" class="get_url_val1 nav-link folderfileu folderFile" style="display:flex; align-items:center; height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;">

                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left:-9px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                            <div style="flex-grow: 1;">
                                                                                <a href="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileId; ?>&fileName=<?php echo $row11['filename']; ?>" name="" class="driveLink1" value="<?php echo $row11['filename']; ?>" style="color: white;width:100%;display:inline-block;" target="_blank">

                                                                                    <span title="<?php echo $row11['filename'] ?>"><?php echo substr($row11['lastName'], 0, 15); ?></span>


                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                    $class = 0;
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                        $class++;
                                                                                    ?>
                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px; -moz-border-radius: 25px;border-radius: 25px;position:relative;top:8px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </a>

                                                                            </div>


                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row11['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row11['id'] ?>">
                                                                                <i class="bi bi-files text-light"></i></button>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } elseif ($row11['type'] == "online") {
                                                            ?>
                                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                    <div id="navbarUsersMenuDiv">
                                                                        <span id="folderFile<?php echo $fileId; ?>" class="nav-link ontest folderFile" style="display:flex; align-items:center; height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;">
                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:2px; margin-left: -9px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div style="flex-grow: 1;">
                                                                                <a href="<?php $row11['filename']; ?>" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileId; ?>&fileName=<?php echo $row11['filename']; ?>" class="driveLink" style="color: white;width:100%;display:inline-block;" target="_blank">
                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                    $class = 0;
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                        $class++;
                                                                                    ?>
                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px; border-radius: 25px; position:relative;display:inline-block;top:10px; background: <?php echo $circlecolor; ?>" class="usersOnlineLink<?php echo $class; ?>"></span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>


                                                                                    <span style="margin-left:10px;" title="<?php echo $row11['filename'] ?>"><?php echo substr($row11['lastName'], 0, 15); ?></span>
                                                                                </a>
                                                                            </div>


                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row11['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            <button style="" class="btn btn-soft-primary otherbtn" title="Open link" id="<?php echo $row11['id'] ?>">
                                                                                <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                    <?php
                                                    $allitem1_a1 = "SELECT * FROM user_files WHERE briefId='0' AND folderId='$f_id' AND shopid = '$shopId' AND (user_id != '$userId' OR role = 'super admin') AND is_phase_resourse IS NULL ORDER BY filename ASC";
                                                    $statement1_a1 = $connect->prepare($allitem1_a1);
                                                    $statement1_a1->execute();
                                                    if ($statement1_a1->rowCount() > 0) {
                                                        $result1_a1 = $statement1_a1->fetchAll();

                                                        foreach ($result1_a1 as $row11) {
                                                            $us_id11 = $row11['user_id'];
                                                            $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                            $user_names1->execute([$us_id11]);
                                                            $name12301 = $user_names1->fetchColumn();
                                                            $fileId = $row11['id'];
                                                            $fileName = $row11['filename'];
                                                            $fileLastName = $row11['lastName'];
                                                            if ($_SESSION['role'] == 'student') {
                                                                $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND pageId = '$fileId'");
                                                                $perFileData = $filePermission->fetchColumn();
                                                                if ($perFileData <= 0) {
                                                                    continue;
                                                                }
                                                            }
                                                            if ($_SESSION['role'] == 'instructor') {
                                                                $filePermission = $connect->query("SELECT count(*) FROM filepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId') AND pageId = '$fileId'");
                                                                $perFileData = $filePermission->fetchColumn();
                                                                if ($perFileData <= 0) {
                                                                    continue;
                                                                }
                                                            }
                                                    ?>
                                                            <?php
                                                            if ($fileLastName == null) {
                                                            ?>
                                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show " data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                    <div id="navbarUsersMenuDiv">
                                                                        <span value="<?php echo $row11['type']; ?>" name="<?php echo $row11['filename']; ?>" id="folderFile<?php echo $fileId; ?>" style="display:flex; align-items:center;height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;" class="nav-link folderFile docxLink">
                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left:-9px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div style="flex-grow: 1;">
                                                                                <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $row11['filename']; ?>&fileID=<?php echo $fileId; ?>" class="ayushi" style="color: white; float: left;display:inline-block;width:100%;" data-bs-placement="bottom" title="<?php echo pathinfo($fileName, PATHINFO_FILENAME); ?>">
                                                                                    <span><?php echo substr($row11['filename'], 0, 15); ?></span>

                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                    $class = 0;
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                        $class++;
                                                                                    ?>
                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;position:relative;display:inline-block;top:4px;background: <?php echo $circlecolor; ?>" class="userfiles<?php echo $class; ?>"></span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </a>
                                                                            </div>

                                                                            <?php
                                                                            if ($row11['type'] == 'xlsx' || $row11['type'] == 'docx' || $row11['type'] == 'pptx') { ?>
                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInSamePage('<?php echo BASE_URL; ?>includes/Pages/fheader1.php/<?php echo $row11['filename']; ?>');">
                                                                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                                </button>

                                                                            <?php
                                                                            } elseif ($row11['type'] == 'jpg' || $row11['type'] == 'jpeg' || $row11['type'] == 'png' || $row11['type'] == 'gif' || $row11['type'] == 'webp' || $row11['type'] == 'svg') {
                                                                            ?>
                                                                                <button class="btn btn-soft-primary otherbtn" data-bs-toggle="modal" data-bs-target="#open_slider_header" type="button">
                                                                                    <i class="bi bi-eye" data-bs-placement="bottom" title="View Slider" style="color:white;"></i>
                                                                                </button>
                                                                            <?php
                                                                            } else {


                                                                            ?>
                                                                                <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row11['filename']; ?>');">
                                                                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                                </button>
                                                                            <?php
                                                                            } ?>


                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else if ($row11['type'] == "offline") {
                                                            ?>
                                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show " data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                    <div id="navbarUsersMenuDiv">
                                                                        <span id="folderFile<?php echo $fileId; ?>" class="get_url_val1 nav-link folderfileu2 folderFile" style="display:flex; align-items:center; height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;">

                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left:-9px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                            <div style="flex-grow: 1;">
                                                                                <a href="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileId; ?>&fileName=<?php echo $row11['filename']; ?>" name="" class="driveLink1" value="<?php echo $row11['filename']; ?>" style="color: white;width:100%;display:inline-block;" target="_blank">

                                                                                    <span title="<?php echo $row11['filename'] ?>"><?php echo substr($row11['lastName'], 0, 15); ?></span>


                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                    $class = 0;
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                        $class++;
                                                                                    ?>
                                                                                        <span style="color:white; width: 19px;height: 20px;-webkit-border-radius: 25px; -moz-border-radius: 25px;border-radius: 25px;position:relative;top:5px;display:inline-block;background: <?php echo $circlecolor; ?>" class="userOffLineLink<?php echo $class; ?>"></span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </a>

                                                                            </div>


                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row11['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            <button style="" class="btn btn-soft-primary otherbtn" title="Copy Drive Link" id="<?php echo $row11['id'] ?>">
                                                                                <i class="bi bi-files text-light"></i></button>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } elseif ($row11['type'] == "online") {
                                                            ?>
                                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                                    <div id="navbarUsersMenuDiv">
                                                                        <span id="folderFile<?php echo $fileId; ?>" class="nav-link ontest2 folderFile" style="display:flex; align-items:center; height: 35px;border-left:2px solid <?php echo $row11['color']; ?>;border-radius: 0px;">
                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId' GROUP BY color");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:20px;width:2px;background-color:<?php echo $filePerData['color']; ?>;margin-right:2px; margin-left: -9px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div style="flex-grow: 1;">
                                                                                <a href="<?php echo $row11['filename']; ?>" name="<?php echo BASE_URL ?>Library/userUrlPage.php?linkId=<?php echo $fileId; ?>&fileName=<?php echo $row11['filename']; ?>" class="driveLink" style="color: white;width:100%;display:inline-block;" target="_blank">
                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId' AND userId = '$userId'");
                                                                                    $class = 0;
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                        $class++;
                                                                                    ?>
                                                                                        <span style="color:white; margin: 5px; width: 19px;height: 20px;-webkit-border-radius: 25px;-moz-border-radius: 25px; border-radius: 25px; position:relative;display:inline-block;top:10px; background: <?php echo $circlecolor; ?>" class="usersOnlineLink<?php echo $class; ?>"></span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>


                                                                                    <span style="margin-left:10px;" title="<?php echo $row11['filename'] ?>"><?php echo substr($row11['lastName'], 0, 15); ?></span>
                                                                                </a>
                                                                            </div>


                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $row11['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            <button style="" class="btn btn-soft-primary otherbtn" title="Open link" id="<?php echo $row11['id'] ?>">
                                                                                <i class="bi bi-box-arrow-up-right text-light" style="color:white;"></i></button>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                                <?php
                                                $allitem11_a1 = "SELECT * FROM editor_data WHERE briefId='0' AND folderId='$f_id' AND shopid = '$shopId' AND (userId = '$userId' AND userRole != 'super admin') ORDER BY pageName ASC";
                                                $statement11_a1 = $connect->prepare($allitem11_a1);
                                                $statement11_a1->execute();
                                                if ($statement11_a1->rowCount() > 0) {
                                                    $result11_a1 = $statement11_a1->fetchAll();

                                                    foreach ($result11_a1 as $row110) {
                                                        $us_id110 = $row110['userId'];
                                                        $user_names10 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                        $user_names10->execute([$us_id110]);
                                                        $name123010 = $user_names10->fetchColumn();
                                                        // $folderPageQuery = $connect->query("SELECT * FROM editor_data WHERE folderId = '$f_id' AND briefId = '0'");
                                                        // while ($folData = $folderPageQuery->fetch()) {
                                                        $circlecolor = '';
                                                        $pageId = $row110['id'];

                                                        if ($_SESSION['role'] == 'student' && $row110['userRole'] == "super admin") {
                                                            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND pageId = '$pageId'");
                                                            $perFileData = $filePermission->fetchColumn();
                                                            if ($perFileData <= 0) {
                                                                continue;
                                                            }
                                                        }
                                                        if ($_SESSION['role'] == 'instructor' && $row110['userRole'] == "super admin") {
                                                            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId') AND pageId = '$pageId'");
                                                            $perFileData = $filePermission->fetchColumn();
                                                            if ($perFileData <= 0) {
                                                                continue;
                                                            }
                                                        }

                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$pageId' AND userId = '$userId'");
                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                            $circlecolor = $favColorData['favouriteColors'];
                                                        }

                                                ?>

                                                        <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show varunmsarii" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                            <div id="navbarUsersMenuDiv">
                                                                <div style="display:flex; align-items:center; height: 35px; border-left:2px solid <?php echo $row110['color']; ?>;border-radius: 0px; cursor:pointer;" class="nav-link" onclick="redirectToPage('<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $pageId; ?>');">
                                                                    <a data-bs-placement="bottom" title="<?php echo $row110['pageName'] ?>" id="folderPage<?php echo $pageId; ?>" role="button" style="color:white;" class="folderPage 2">
                                                                        <?php
                                                                        $perColor1 = array();
                                                                        $perC = 0;
                                                                        $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$pageId'");
                                                                        while ($perColor = $perColorQ->fetch()) {
                                                                            if (!in_array($perColor['color'], $perColor1)) {
                                                                        ?>
                                                                                <span style="border-left: 2px solid <?php echo $perColor['color']; ?>;margin-right: 5px; height: 30px; margin-left: -8px;"></span>
                                                                        <?php }
                                                                            $perColor1[$perC] = $perColor['color'];
                                                                            $perC++;
                                                                        } ?>

                                                                        <span><?php echo substr($row110['pageName'], 0, 15); ?></span></a>
                                                                    <div style="flex-grow: 1;">
                                                                        <?php
                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$pageId' AND userId = '$userId'");
                                                                        $class = 0;
                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                            $class++;
                                                                        ?>
                                                                            <span style="color:white; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:4px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="userpages<?php echo $class; ?>"></span>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <!-- <button class="btn btn-soft-primary otherbtn">
                                                                <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $brefData['filename']; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open page" style="color:white;"></i></a>
                                                            </button> -->

                                                                    <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row110['id'] ?>');">
                                                                        <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>

                                                <?php
                                                $allitem11_a1 = "SELECT * FROM editor_data WHERE briefId='0' AND folderId='$f_id' AND shopid = '$shopId' AND (userId != '$userId' OR userRole = 'super admin') ORDER BY pageName ASC";
                                                $statement11_a1 = $connect->prepare($allitem11_a1);
                                                $statement11_a1->execute();
                                                if ($statement11_a1->rowCount() > 0) {
                                                    $result11_a1 = $statement11_a1->fetchAll();

                                                    foreach ($result11_a1 as $row110) {
                                                        $us_id110 = $row110['userId'];
                                                        $user_names10 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                                        $user_names10->execute([$us_id110]);
                                                        $name123010 = $user_names10->fetchColumn();
                                                        // $folderPageQuery = $connect->query("SELECT * FROM editor_data WHERE folderId = '$f_id' AND briefId = '0'");
                                                        // while ($folData = $folderPageQuery->fetch()) {
                                                        $circlecolor = '';
                                                        $pageId = $row110['id'];

                                                        if ($_SESSION['role'] == 'student') {
                                                            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = '$userId') AND pageId = '$pageId'");
                                                            $perFileData = $filePermission->fetchColumn();
                                                            if ($perFileData <= 0) {
                                                                continue;
                                                            }
                                                        }
                                                        if ($_SESSION['role'] == 'instructor') {
                                                            $filePermission = $connect->query("SELECT count(*) FROM pagepermissions WHERE (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId') AND pageId = '$pageId'");
                                                            $perFileData = $filePermission->fetchColumn();
                                                            if ($perFileData <= 0) {
                                                                continue;
                                                            }
                                                        }

                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$pageId' AND userId = '$userId'");
                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                            $circlecolor = $favColorData['favouriteColors'];
                                                        }

                                                ?>

                                                        <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show varunmsarii" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                            <div id="navbarUsersMenuDiv">
                                                                <div style="display:flex; align-items:center; height: 35px; border-left:2px solid <?php echo $row110['color']; ?>;border-radius: 0px; cursor:pointer;" class="nav-link" onclick="redirectToPage('<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $pageId; ?>');">
                                                                    <a data-bs-placement="bottom" title="<?php echo $row110['pageName'] ?>" id="folderPage<?php echo $pageId; ?>" role="button" style="color:white;" class="folderPage">
                                                                        <?php
                                                                        $perColor1 = array();
                                                                        $perC = 0;
                                                                        $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$pageId'");
                                                                        while ($perColor = $perColorQ->fetch()) {
                                                                            if (!in_array($perColor['color'], $perColor1)) {
                                                                        ?>
                                                                                <span style="border-left: 2px solid <?php echo $perColor['color']; ?>;margin-right: 5px; height: 30px; margin-left: -8px;"></span>
                                                                        <?php }
                                                                            $perColor1[$perC] = $perColor['color'];
                                                                            $perC++;
                                                                        } ?>

                                                                        <span><?php echo substr($row110['pageName'], 0, 15); ?></span></a>
                                                                    <div style="flex-grow: 1;">
                                                                        <?php
                                                                        $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$pageId' AND userId = '$userId'");
                                                                        $class = 0;
                                                                        while ($favColorData = $fetchFavColor->fetch()) {
                                                                            $circlecolor = $favColorData['favouriteColors'];
                                                                            $class++;
                                                                        ?>
                                                                            <span style="color:white; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:4px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="userpages<?php echo $class; ?>"></span>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <!-- <button class="btn btn-soft-primary otherbtn">
                                                                <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $brefData['filename']; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open page" style="color:white;"></i></a>
                                                            </button> -->

                                                                    <button class="btn btn-soft-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row110['id'] ?>');">
                                                                        <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>

                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <hr>

                                    <div id="navbarVerticalMenuPagesMenu">
                                        <div class="nav-item">
                                            <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarFavorite" aria-expanded="false" aria-controls="navbarFavorite">
                                                <span style="color:white;" class="nav-link-title">Favourite</span>
                                            </a>
                                            <div id="navbarFavorite" class="nav-collapse collapse hide" data-bs-parent="#navbarFavorite" hs-parent-area="#navbarFavorite">

                                                <div id="navbarUsersMenuDiv">
                                                    <div class="nav-item">
                                                        <div style="position:relative;">
                                                            <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="redcolor">
                                                                <span style="color:white;" class="nav-link-title" id="red"></span>
                                                            </a>

                                                        </div>
                                                        <div style="position:relative;">
                                                            <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="greencolor">
                                                                <span style="color:white;" class="nav-link-title" id="green"></span>
                                                            </a>

                                                        </div>
                                                        <div style="position:relative;">
                                                            <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="yellowcolor">
                                                                <span style="color:white;" class="nav-link-title" id="yellow"></span>
                                                            </a>

                                                        </div>
                                                        <div style="position:relative;">
                                                            <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="bluecolor">
                                                                <span style="color:white;" class="nav-link-title" id="blue"></span>
                                                            </a>

                                                        </div>
                                                        <div style="position:relative;">
                                                            <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="greycolor">
                                                                <span style="color:white;" class="nav-link-title" id="grey"></span>
                                                            </a>

                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <a href="<?php echo BASE_URL; ?>Library/permissionData.php" class="nav-link" style="color:white" id="pageBtn">Permission Page</a>

                                    <hr>
                                    <a href="<?php echo BASE_URL; ?>Library/alldetails.php" class="nav-link" style="color:white" id="pageBtn">All Details</a>

                                    <hr>
                                    <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php" class="nav-link" style="color:white;">Grid View</a>
                                </div>
                            </div>
                            <!-- End Content -->

                            

                            <!-- End Footer -->
                        </div>
                    </div>

                    <div class="navbar-vertical-footer fixed bg-black">
                                <center>

                                    <?php include ROOT_PATH . 'includes/Pages/rolecolor.php'; ?>
                                </center>

                                <hr style="color:white; margin-top:-5px;">
                                <ul class="navbar-vertical-footer-list" style="margin-top:-10px; margin-bottom:-10px;">
                                    <li class="navbar-vertical-footer-list-item">
                                        <!-- Style Switcher -->
                                        <div class="dropdown dropup">
                                            <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/ll_white.png" style="height:15px; width: 15px; margin: 3px;">
                                            </button>

                                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown">
                                                <span class="dropdown-header">Apps

                                                </span>
                                                <?php if ($_SESSION['role'] != "student") { ?>
                                                    <a class="dropdown-item" id="grade_sheet" href="<?php echo BASE_URL; ?>includes/Pages/Home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V1.0.0">
                                                        <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:15px; width: 15px; margin: 3px;" id="grade_sheet">
                                                        <span class="text-truncate" id="grade_sheet">Grade sheet</span>
                                                    </a>
                                                <?php }
                                                if ($_SESSION['role'] == "student") { ?>
                                                    <a class="dropdown-item" id="grade_sheet" href="<?php echo BASE_URL; ?>Grade_Sheet/student/Home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V1.0.0">
                                                        <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:15px; width: 15px; margin: 3px;" id="grade_sheet">
                                                        <span class="text-truncate" id="grade_sheet">Grade sheet</span>
                                                    </a>
                                                <?php } ?>
                                                <!-- <a class="dropdown-item" id="bri" href="<?php echo BASE_URL; ?>includes/Pages/apps-bri.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                    <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:15px; width: 15px; margin: 5px;" id="bri">
                                                    <span class="text-truncate" id="bri">BRI</span>
                                                </a> -->
                                                <a class="dropdown-item" id="library" href="<?php echo BASE_URL; ?>Library/index.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V1.2.0">
                                                    <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:15px; width: 15px; margin: 3px;" id="library">
                                                    <span class="text-truncate" id="library">Library</span>
                                                </a>
                                                <a class="dropdown-item" id="scheduling" href="<?php echo BASE_URL; ?>Scheduling/home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.1.0">
                                                    <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:15px; width: 15px; margin: 3px;" id="scheduling">
                                                    <span class="text-truncate" id="scheduling">Scheduling</span>
                                                </a>

                                                <!-- <a class="dropdown-item" id="hotwash" data-placement="left" href="<?php echo BASE_URL; ?>includes/Pages/hotwash.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                    <img style="height:25px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/2D icons PNG/new/MicrosoftTeams-image (21).png" id="hotwash">
                                                    <span class="text-truncate" id="hotwash">Hotwash</span>
                                                </a> -->

                                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>Test/index.php" data-placement="left" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                    <img style="height:25px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/new/test.png">
                                                    <span class="text-truncate" style="font-size:larger; margin: 5px;">Test</span>
                                                </a>

                                            </div>
                                        </div>

                                        <!-- End Style Switcher -->
                                    </li>

                                    <li class="navbar-vertical-footer-list-item">
                                        <!-- Other Links -->
                                        <div class="dropdown dropup">
                                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="margin-top:10px;">
                                                <i class="bi-info-circle" style="font-size: large;"></i>
                                            </button>

                                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="otherLinksDropdown">
                                                <span class="dropdown-header">Help</span>
                                                <a class="dropdown-item" href="#">
                                                    <i class="bi-journals dropdown-item-icon"></i>
                                                    <span class="text-truncate" title="Resources &amp; tutorials">Resources &amp; tutorials</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="bi-command dropdown-item-icon"></i>
                                                    <span class="text-truncate" title="Keyboard shortcuts">Hints</span>
                                                </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newupdates2">
                                                    <i class="bi-gift dropdown-item-icon"></i>
                                                    <span class="text-truncate" title="What's new?">What's new?</span>
                                                    <span><img src="<?php echo BASE_URL; ?>assets/svg/new2.gif" style="height: 25px;"></span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <span class="dropdown-header">Contacts</span>
                                                <a class="dropdown-item" href="#">
                                                    <i class="bi-chat-left-dots dropdown-item-icon"></i>
                                                    <span class="text-truncate" title="Contact support">Contact support</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- End Other Links -->
                                    </li>

                                    <li class="navbar-vertical-footer-list-item">
                                        <!-- Style Switcher -->
                                        <div class="dropdown dropup">
                                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="font-size:large; margin-top: 5px;">

                                            </button>

                                            <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                                                <!-- <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                                <i class="bi-moon-stars me-2"></i>
                                                <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                                            </a> -->
                                                <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="dark">
                                                    <i class="bi-brightness-high me-2"></i>
                                                    <span class="text-truncate" title="Default (light mode)">Light</span>
                                                </a>
                                                <a class="dropdown-item" href="#" data-icon="bi-moon" data-value="default">
                                                    <i class="bi-moon me-2"></i>
                                                    <span class="text-truncate" title="Dark">Dark</span>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- End Style Switcher -->
                                    </li>

                                </ul>
                            </div>
                    </div>
                </div>

        </aside>
        <main>
            <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Shelf Page" href="<?php echo BASE_URL; ?>Library/index.php"><i class="bi bi-arrow-left"></i></a>
        </main>


        <!--  <div class="modal fade" id="view_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success modalName"></h3>
                    <a class="open_new" target="_blank"><i style="width:20px; height:20px; margin: 5px; font-size: x-large;" class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window"></i></i>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <embed id="pdf_view" type="application/pdf" frameborder="0" width="100%" height="700px">
                </div>

            </div>
        </div>
    </div> -->
        <!--Permission modal for file-->
        <!-- <div class="modal fade" id="pageperfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

        <!--Permission modal for file folder-->
        <!-- <div class="modal fade" id="pageperfile1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

        <!--Permission modal for link folder-->
        <!-- <div class="modal fade" id="pageperfile2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

        <!--Permission modal for file admin-->
        <!-- <div class="modal fade" id="fileperbrad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

        <!--Permission modal for loaction admin-->
        <!-- <div class="modal fade" id="fileperbrad1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

        <!--Permission modal for link admin-->
        <!-- <div class="modal fade" id="fileperbrad2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

        <!--Permission modal for file for user-->
        <!-- <div class="modal fade" id="fileperbru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

        <!--Permission modal for location for user-->
        <!-- <div class="modal fade" id="fileperbru1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>
    <div class="modal fade" id="selectbriefcase2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Select Briefcase</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo BASE_URL; ?>Library/add_folder_brief2.php" enctype="multipart/form-data">
                        <input type="hidden" id="shop_id" name="shop_id" value="<?php echo $shopId ?>">
                        <input type="hidden" id="fol_id" name="fol_id" value="<?php echo $f_id ?>">
                        <input type="text" id="bridus" name="breif_id" value="">
                        <table class="table table-bordered src-table1" id="folder_table_briefcase">
                            <input style="margin:5px;" class="form-control" type="text" id="file_search" onkeyup="file_by_file()" placeholder="Search for Files.." title="Type in a name">
                            <thead class="bg-dark">
                                <th class="text-light"><input type="checkbox" id="select-all-pre"></th>
                                <!-- <th class="text-light">File Names</th> -->
                                <th class="text-light"> UPLOADED FILES</th>
                                <th class="text-light">View</th>

                            </thead>
                            <?php

                            $query11_fm10 = "SELECT * FROM user_files where briefId='0' and folderId='0' ORDER BY filename ASC";
                            $statement11_fm10 = $connect->prepare($query11_fm10);
                            $statement11_fm10->execute();
                            if ($statement11_fm10->rowCount() > 0) {
                                $result11_fm10 = $statement11_fm10->fetchAll();

                                foreach ($result11_fm10 as $row110) {
                                    $filesname = "";
                                    if ($row110['type'] == "online" || $row110['type'] == "offline") {
                                        $filesname = $row110['lastName'];
                                    } else {
                                        $filesname = $row110['filename'];
                                    }

                            ?>
                                    <tr>
                                        <td><input type="checkbox" name="fsid2[]" value="<?php echo $row110['id'] ?>" /></td>
                                        <td>
                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                            <span style="color:#9540e4;" title="<?php echo $row110['filename'] ?>"><?php echo $filesname; ?></span>
                                        </td>
                                        <td>
                                            <a href="files/<?php echo $row110['filename']; ?>" target="_blank">View</a>
                                        </td>
                                    </tr>
                            <?php }
                            }
                            ?>
                            <?php

                            $query11_fm101 = "SELECT * FROM editor_data where briefId='0' and folderId='0'";
                            $statement11_fm101 = $connect->prepare($query11_fm101);
                            $statement11_fm101->execute();
                            if ($statement11_fm101->rowCount() > 0) {
                                $result11_fm101 = $statement11_fm101->fetchAll();

                                foreach ($result11_fm101 as $row1101) {

                            ?>
                                    <tr>
                                        <td><input type="checkbox" name="fsid1[]" value="<?php echo $row1101['id'] ?>" /></td>
                                        <td>
                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                            <span style="color:#9540e4;" title="<?php echo $row1101['pageName'] ?>"><?php echo $row1101['pageName']; ?></span>
                                        </td>
                                        <td>
                                            <i class="bi bi-eye-fill" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row1101['id'] ?>');"></i>
                                        </td>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </table>
                        <input type="submit" value="Add" name="addBriefFile" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="selectbriefcase1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Select Briefcase</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo BASE_URL; ?>Library/add_folder_brief2.php" enctype="multipart/form-data">
                        <input type="hidden" id="shopId" name="shopId" value="<?php echo $shopId ?>">
                        <input type="hidden" id="f_id" name="folId" value="<?php echo $f_id ?>">
                        <table class="table table-bordered src-table1" id="folder_table_briefcase">
                            <input class="form-control" type="text" id="searchfolder" onkeyup="folder_Search()" placeholder="Search for Briefcase.." title="Type in a name"><br>

                            <tbody>
                                <?php

                                $breifcase_fetch1 = "SELECT * FROM user_briefcase";
                                $stbreifcase_fetch02 = $connect->prepare($breifcase_fetch1);
                                $stbreifcase_fetch02->execute();

                                if ($stbreifcase_fetch02->rowCount() > 0) {
                                    $rebreifcase_fetch02 = $stbreifcase_fetch02->fetchAll();
                                    foreach ($rebreifcase_fetch02 as $rowbreifcase_fetch02) {
                                        $us_id = $rowbreifcase_fetch02['user_id'];
                                        $breif_id = $rowbreifcase_fetch02['id'];
                                        $sql = "SELECT count(*) FROM `user_files` WHERE briefId = ? and folderId='$f_id'";
                                        $result = $connect->prepare($sql);
                                        $result->execute([$breif_id]);
                                        $number_of_rows = $result->fetchColumn();
                                        $sql1 = "SELECT count(*) FROM `editor_data` WHERE briefId = ? and folderId='$f_id'";
                                        $result1 = $connect->prepare($sql1);
                                        $result1->execute([$breif_id]);
                                        $number_of_rows1 = $result1->fetchColumn();
                                        $total_c = $number_of_rows + $number_of_rows1;
                                        $sql101 = "SELECT count(*) FROM `tempbrief` WHERE briefId = ? and folderId='$f_id' and shopId='$shopId'";
                                        $result101 = $connect->prepare($sql101);
                                        $result101->execute([$breif_id]);
                                        $number_of_rows101 = $result101->fetchColumn();

                                        if ($total_c == 0 && $number_of_rows101 == 0) {
                                            $user_name_files12 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                            $user_name_files12->execute([$us_id]);
                                            $name123 = $user_name_files12->fetchColumn();

                                ?>

                                            <ul style="display:inline-block;width:100%;list-style-type:none;" id="ulsearchlist">
                                                <li style="text-decoration:none; display:inline-block;">
                                                    <input type="checkbox" class="parent_checkbox" name="main_breif[]" value="<?php echo $rowbreifcase_fetch02['id'] ?>" />
                                                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                                    <?php echo '<span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px;">' . $rowbreifcase_fetch02['briefcase_name'] . ' - ' . $name123 . '</span>'; ?>
                                                </li>
                                            </ul>

                                <?php       }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <hr>
                        <input type="submit" class="btn btn-success" value="Add" style="float:right;" name="addBriefFolder">
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="selectbriefcase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Select Briefcase And Files</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo BASE_URL; ?>Library/add_folder_brief1.php" enctype="multipart/form-data">
                        <input type="hidden" id="fol_id" name="fol_id" value="<?php echo $shopId ?>">
                        <table class="table table-bordered src-table1" id="folder_table_briefcase">
                            <input class="form-control" type="text" id="searchfolder" onkeyup="folder_Search()" placeholder="Search for Briefcase.." title="Type in a name"><br>

                            <tbody>
                                <?php

                                $breifcase_fetch = "SELECT * FROM user_briefcase";
                                $stbreifcase_fetch2 = $connect->prepare($breifcase_fetch);
                                $stbreifcase_fetch2->execute();

                                if ($stbreifcase_fetch2->rowCount() > 0) {
                                    $rebreifcase_fetch2 = $stbreifcase_fetch2->fetchAll();
                                    foreach ($rebreifcase_fetch2 as $rowbreifcase_fetch2) {
                                        $breif_id = $rowbreifcase_fetch2['id'];
                                        $sql = "SELECT count(*) FROM `user_files` WHERE briefId = ? and folderId='$f_id' and shopid='0'";
                                        $result = $connect->prepare($sql);
                                        $result->execute([$breif_id]);
                                        $number_of_rows = $result->fetchColumn();
                                        $sql1 = "SELECT count(*) FROM `editor_data` WHERE briefId = ? and folderId='$f_id' and shopid='0'";
                                        $result1 = $connect->prepare($sql1);
                                        $result1->execute([$breif_id]);
                                        $number_of_rows1 = $result1->fetchColumn();
                                        $total_c = $number_of_rows + $number_of_rows1;
                                        $us_id = $rowbreifcase_fetch2['user_id'];
                                        $user_name_files12 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                        $user_name_files12->execute([$us_id]);
                                        $name123 = $user_name_files12->fetchColumn();
                                        if ($total_c > 0) {

                                ?>
                                            <details style="margin-left:30px;">
                                                <summary>
                                                    <ul style="display:inline-block;list-style-type:none;" id="ulsearchlist">
                                                        <li style="text-decoration:none; display:inline-block;">
                                                            <!-- <input type="checkbox" class="parent_checkbox" name="main_breif[]" data-created="<?php echo $rowbreifcase_fetch2['id'] ?>" value="<?php echo $rowbreifcase_fetch2['id'] ?>" /> -->
                                                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                                            <?php echo '<span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px;">' . $rowbreifcase_fetch2['briefcase_name'] . ' - ' . $name123 . '</span>'; ?>
                                                        </li>
                                                    </ul>
                                                </summary>
                                                <?php
                                                $file_fetch = "SELECT * FROM user_files where briefId='$breif_id' and folderId='$f_id' and shopid='0'";
                                                $file_fetch_st = $connect->prepare($file_fetch);
                                                $file_fetch_st->execute();
                                                if ($file_fetch_st->rowCount() > 0) {
                                                    $result_file = $file_fetch_st->fetchAll();

                                                    foreach ($result_file as $row_file) {
                                                        $filesname3 = "";
                                                        if ($row_file['type'] == "online" || $row_file['type'] == "offline") {
                                                            $filesname3 = $row_file['lastName'];
                                                        } else {
                                                            $filesname3 = $row_file['filename'];
                                                        }
                                                ?>
                                                        <ul style="margin-left:40px">
                                                            <li style="list-style-type:none; display:inline-block;">
                                                                <input type="checkbox" class="checkbox<?php echo $rowbreifcase_fetch2['id'] ?>" id="<?php echo $rowbreifcase_fetch2['id'] ?>" onclick="javascript:testId(this.id)" name="foid[]" value="<?php echo $row_file['id'] ?>" />
                                                                <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                                                <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file['filename'] . '"> ' . $filesname3 . '</span>'; ?>
                                                            </li>
                                                        </ul>
                                                <?php }
                                                }
                                                ?>
                                                <?php
                                                $file_fetch1 = "SELECT * FROM editor_data where briefId='$breif_id' and folderId='$f_id' and shopid='0'";
                                                $file_fetch_st1 = $connect->prepare($file_fetch1);
                                                $file_fetch_st1->execute();
                                                if ($file_fetch_st1->rowCount() > 0) {
                                                    $result_file1 = $file_fetch_st1->fetchAll();
                                                    foreach ($result_file1 as $row_file1) {
                                                ?>
                                                        <ul style="margin-left:40px">
                                                            <li style="list-style-type:none; display:inline-block;">
                                                                <input type="checkbox" class="checkbox<?php echo $rowbreifcase_fetch2['id'] ?>" id="<?php echo $rowbreifcase_fetch2['id'] ?>" onclick="javascript:testId(this.id)" name="foid1[]" value="<?php echo $row_file1['id'] ?>" />
                                                                <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                                                <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file1['pageName'] . '"> ' . $row_file1['pageName'] . '</span>'; ?>
                                                            </li>
                                                        </ul>
                                                <?php }
                                                }
                                                ?>
                                            </details>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                <?php
                                $allitem1_a10 = "SELECT * FROM user_files where briefId='0' and folderId='$f_id' and shopid='0'";
                                $statement1_a10 = $connect->prepare($allitem1_a10);
                                $statement1_a10->execute();
                                if ($statement1_a10->rowCount() > 0) {
                                    $result1_a10 = $statement1_a10->fetchAll();
                                    $sn = 1;
                                    foreach ($result1_a10 as $row1) {
                                        $us_id1 = $row1['user_id'];
                                        $filesname4 = "";
                                        if ($row1['type'] == "online" || $row1['type'] == "offline") {
                                            $filesname4 = $row1['lastName'];
                                        } else {
                                            $filesname4 = $row1['filename'];
                                        }
                                        $user_names = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                        $user_names->execute([$us_id1]);
                                        $name1230 = $user_names->fetchColumn();
                                ?>
                                        <ul style="margin-left:40px">
                                            <tr>
                                                <td>
                                                    <li style="list-style-type:none; display:inline-block ;"><input type="checkbox" name="foid[]" value="<?php echo $row1['id'] ?>" />
                                                        <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                                        <span style="color:#c299ff;" title="<?php echo $row1['filename'] ?>">
                                                            <?php echo $filesname4 . ' - ' . $name1230; ?></span>
                                                    </li>
                                                </td>
                                            </tr>
                                        </ul>
                                <?php
                                    }
                                }
                                ?>
                                <?php
                                $allitem1_a10 = "SELECT * FROM editor_data where briefId='0' and folderId='$f_id' and shopid='0'";
                                $statement1_a10 = $connect->prepare($allitem1_a10);
                                $statement1_a10->execute();
                                if ($statement1_a10->rowCount() > 0) {
                                    $result1_a10 = $statement1_a10->fetchAll();

                                    foreach ($result1_a10 as $row11) {
                                        $us_id11 = $row11['userId'];
                                        $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                                        $user_names1->execute([$us_id11]);
                                        $name12301 = $user_names1->fetchColumn();
                                ?>
                                        <ul style="margin-left:40px">
                                            <tr>
                                                <td>
                                                    <li style="list-style-type:none; display:inline-block ;"><input type="checkbox" name="foid1[]" value="<?php echo $row11['id'] ?>" />
                                                        <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                                        <span style="color:#c299ff;">
                                                            <?php echo $row11['pageName'] . ' - ' . $name12301; ?></span>
                                                    </li>
                                                </td>
                                            </tr>
                                        </ul>
                                <?php
                                    }
                                }
                                ?>
                                <center> <input type="submit" class="btn btn-success" value="Add" style="float:right;"></center>
                                <br>
                                <hr>


                    </form>
                    <?php

                    $breifcase_fetch1 = "SELECT * FROM user_briefcase";
                    $stbreifcase_fetch21 = $connect->prepare($breifcase_fetch1);
                    $stbreifcase_fetch21->execute();

                    if ($stbreifcase_fetch21->rowCount() > 0) {
                        $rebreifcase_fetch21 = $stbreifcase_fetch21->fetchAll();
                        foreach ($rebreifcase_fetch21 as $rowbreifcase_fetch21) {
                            $us_id2 = $rowbreifcase_fetch21['user_id'];
                            $breif_id1 = $rowbreifcase_fetch21['id'];
                            $fo_ides1 = $rowbreifcase_fetch21['folderId'];
                            $shop_id = $rowbreifcase_fetch21['shopid'];
                            $sql101 = "SELECT count(*) FROM `user_files` WHERE briefId = ? and folderId='$f_id' and shopid='$shopId'";
                            $result1101 = $connect->prepare($sql101);
                            $result1101->execute([$breif_id1]);
                            $number_of_rows1001 = $result1101->fetchColumn();
                            $sql102 = "SELECT count(*) FROM `editor_data` WHERE briefId = ? and folderId='$f_id' and shopid='$shopId'";
                            $result1102 = $connect->prepare($sql102);
                            $result1102->execute([$breif_id1]);
                            $number_of_rows1002 = $result1102->fetchColumn();
                            $to11 = $number_of_rows1001 + $number_of_rows1002;
                            $user2_name_files12 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                            $user2_name_files12->execute([$us_id2]);
                            $name1232 = $user2_name_files12->fetchColumn();
                            if ($to11 > 0) { ?>
                                <details style="margin-left:30px;">
                                    <summary>
                                        <ul style="display:inline-block;list-style-type:none;" id="ulsearchlist">
                                            <li style="text-decoration:none; display:inline-block;">
                                                <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">

                                                <?php echo '<span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px;">' . $rowbreifcase_fetch21['briefcase_name'] . '</span>'; ?>

                                                </span>
                                            </li>
                                        </ul>
                                    </summary>
                                    <?php
                                    $file_fetch2 = "SELECT * FROM user_files where briefId='$breif_id1' and folderId='$f_id' and shopid='$shopId'";
                                    $file_fetch_st2 = $connect->prepare($file_fetch2);
                                    $file_fetch_st2->execute();
                                    if ($file_fetch_st2->rowCount() > 0) {
                                        $result_file2 = $file_fetch_st2->fetchAll();

                                        foreach ($result_file2 as $row_file2) {
                                            $filesname9 = "";
                                            $filesname9 = ($row_file2['type'] == "online" || $row_file2['type'] == "offline") ? $row_file2['lastName'] : $row_file2['filename'];
                                    ?>
                                            <ul style="margin-left:150px;">
                                                <li style="list-style-type:none; display:inline-block;">
                                                    <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                                    <?php echo '<span style="color:#9540e4;" title="' . $row_file2['filename'] . '">' . $filesname9 . '</span>'; ?>
                                                    <a href="deleteBriefFolder.php?fileId=<?php echo $row_file2['id']; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                                </li>
                                            </ul>
                                    <?php }
                                    }
                                    ?>
                                    <?php
                                    $file_fetch12 = "SELECT * FROM editor_data where briefId='$breif_id1' and folderId='$f_id' and shopid='$shopId'";
                                    $file_fetch_st12 = $connect->prepare($file_fetch12);
                                    $file_fetch_st12->execute();
                                    if ($file_fetch_st12->rowCount() > 0) {
                                        $result_file12 = $file_fetch_st12->fetchAll();
                                        foreach ($result_file12 as $row_file12) {
                                    ?>
                                            <ul style="margin-left:150px;">
                                                <li style="list-style-type:none; display:inline-block;">
                                                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                                    <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file12['pageName'] . '"> ' . $row_file12['pageName'] . '</span>'; ?>
                                                    <a href="deleteBriefFolder.php?pageId=<?php echo $row_file12['id']; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                                </li>
                                            </ul>
                                    <?php }
                                    }
                                    ?>

                                </details>
                    <?php
                            }
                        }
                    } ?>

                    <?php
                    $allitem1_a1 = "SELECT * FROM user_files where briefId='0' and folderId='$f_id' and shopid='$shopId'";
                    $statement1_a1 = $connect->prepare($allitem1_a1);
                    $statement1_a1->execute();
                    if ($statement1_a1->rowCount() > 0) {
                        $result1_a1 = $statement1_a1->fetchAll();

                        foreach ($result1_a1 as $row11) {
                            $us_id11 = $row11['user_id'];
                            $filesname10 = "";
                            $filesname10 = ($row11['type'] == "online" || $row11['type'] == "offline") ? $row11['lastName'] : $row11['filename'];
                            $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                            $user_names1->execute([$us_id11]);
                            $name12301 = $user_names1->fetchColumn();
                    ?>
                            <ul>

                                <li style="list-style-type:none; display:inline-block ;">
                                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                    <span style="color:#c299ff;" title="<?php echo $row11['filename'] ?>">
                                        <?php echo $filesname10 . ' - ' . $name12301; ?></span>
                                    <a id="shakti" href="deleteBriefFolder.php?fileId=<?php echo $row11['id']; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                </li>

                            </ul>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    $allitem11_a1 = "SELECT * FROM editor_data where briefId='0' and folderId='$f_id' and shopid='$shopId'";
                    $statement11_a1 = $connect->prepare($allitem11_a1);
                    $statement11_a1->execute();
                    if ($statement11_a1->rowCount() > 0) {
                        $result11_a1 = $statement11_a1->fetchAll();

                        foreach ($result11_a1 as $row110) {
                            $us_id110 = $row110['userId'];
                            $user_names10 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                            $user_names10->execute([$us_id110]);
                            $name123010 = $user_names10->fetchColumn();
                    ?>
                            <ul>

                                <li style="list-style-type:none; display:inline-block ;">
                                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                    <span style="color:#c299ff;">
                                        <?php echo $row110['pageName'] . ' - ' . $name123010; ?></span>
                                    <a id="shakti" href="deleteBriefFolder.php?pageId=<?php echo $row110['id']; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                </li>

                            </ul>
                    <?php
                        }
                    }
                    ?>
                    </tbody>

                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <!--Permission modal for link for user-->
    <!-- <div class="modal fade" id="fileperbru2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Give Permission To File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                        <br>
                    </div>
                    <div>
                        <center>
                            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                                <center>
                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                        <option selected disabled>Select File Method</option>
                                        <option value="All instructor">Instructor Only</option>
                                        <option value="Everyone">Everyone</option>
                                    </select>
                                    <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                                    <table class="table table-bordered" id="tableData" style="display:none;">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th class="text-light">#</th>
                                                <th class="text-light">Profile Image</th>
                                                <th class="text-light">Name</th>

                                            </tr>
                                        </thead>
                                        <tbody id="userDetail">

                                        </tbody>
                                    </table>
                                    <input style="background-color:#7901c1; color:white;" type="submit" class="btn" value="Give Permission" name="permissionBtnFileManager" />
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!--Edit briefcase modal-->
    <div class="modal fade" id="edit_brief_header" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Briefcase</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="edit_brief_lib.php">
                        <input type="hidden" class="form-control" name="id" value="" id="brief_edit_id" readonly>
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
                        <input type="text" class="form-control" name="brief" value="" id="brief1">
                        <br>
                        <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_briefcase" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="open_slider_header" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="width: 1458px; margin-left: -166px;">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $query1 = "SELECT * FROM user_files WHERE folderId = '$f_id' AND shopid = '$shopId' AND type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
                            $statement1 = $connect->prepare($query1);
                            $statement1->execute();

                            // $query2 = "SELECT * FROM user_files WHERE type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
                            // $statement2 = $connect->prepare($query2);
                            // $statement2->execute();

                            $images = array();

                            if ($statement1->rowCount() > 0) {
                                $result1 = $statement1->fetchAll();
                                foreach ($result1 as $row) {
                                    $images[] = $row['filename'];
                                }
                            }

                            // if ($statement2->rowCount() > 0) {
                            //   $result2 = $statement2->fetchAll();
                            //   foreach ($result2 as $row) {
                            //     $images[] = $row['name'];
                            //   }
                            // }

                            // Display the images in the carousel

                            foreach ($images as $image) {
                                echo '<div class="carousel-item">';
                                echo '<img src="<?php echo BASE_URL; ?>includes/Pages/files/' . $image . '" class="d-block" alt="" style="width:500px; height:500px;">';
                                echo '<img src="<?php echo BASE_URL; ?>includes/Pages/files/' . $image . '" class="d-block" alt="" style="width:500px; height:500px;">';
                                echo '</div>';
                            }

                            ?>
                        </div>
                        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button> -->
                    </div>

                    <!-- End Body -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:600px;">
                        <!-- Indicators -->
                        <center>

                            <!-- Slides -->
                            <div class="carousel-inner">

                                <?php foreach ($images as $index => $image) { ?>
                                    <div class="carousel-item <?php if ($index === 0) {
                                                                    echo 'active';
                                                                }
                                                                ?>">
                                        <div class="thumbnail-caption">
                                            <h6 style="font-size: large; float:center;" class="text-success"><?php echo $image; ?></h6>
                                        </div><br>
                                        <img src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $image ?>" class="d-block" alt="<?php echo $image ?>" style="height: 500px; width: 1000px;">
                                    </div>
                                <?php } ?>
                            </div>
                            <br><br>
                            <!-- Thumbnails -->
                            <div class="carousel-thumbnails">
                                <?php foreach ($images as $index => $image) { ?>
                                    <a href="#myCarousel" data-slide-to="<?php echo $index ?>" class="<?php if ($index === 0) {
                                                                                                            echo 'active';
                                                                                                        }
                                                                                                        ?>">
                                        <img src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $image ?>" alt="<?php echo $image ?>" width="50">
                                    </a>

                                <?php } ?>
                            </div>
                        </center>
                        <!-- Controls -->
                        <a class="carousel-control-prev text-primary" href="#myCarousel" role="button" data-slide="prev" style="font-weight:bold;">
                            <span class="carousel-control-prev-icon text-primary btn btn-dark" aria-hidden="true"></span>
                            <!-- <span class="sr-only text-primary">Previous</span> -->
                        </a>
                        <a class="carousel-control-next text-primary" href="#myCarousel" role="button" data-slide="next" style="font-weight: bold;">
                            <span class="carousel-control-next-icon text-primary btn btn-dark" aria-hidden="true"></span>
                            <!-- <span class="sr-only text-primary">Next</span> -->
                        </a>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newupdates2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <?php include ROOT_PATH . 'includes/newupdates.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
        <i class="bi-chevron-up"></i>
    </a>

    <!-- <script>
  $(document).ajaxStart(function() {
    $("#loading-screen").show();
    $("#header").hide();
  });
  $(document).ajaxStop(function() {
    $("#loading-screen").hide();
    $("#header").show();
  });
</script> -->

    <script>
        (function() {
            // INITIALIZATION OF GO TO
            // =======================================================
            new HSGoTo('.js-go-to')


            // INITIALIZATION OF MEGA MENU
            // =======================================================
            new HSMegaMenu('.js-mega-menu', {
                desktop: {
                    position: 'bottom'
                }
            })
        })()
    </script>

    <script>
        $(document).ready(function() {
            $('#myCarousel').carousel();
        });
    </script>

    <script>
        function redirectToPage(url) {
            window.location.href = url;
        }
    </script>

    <script>
        function openInSamePage(url) {
            if (url) {
                var link = document.createElement("a");
                link.href = url;
                link.download = "";
                link.click();

                var messageElement = document.getElementById("message");
                messageElement.innerText = "File downloaded successfully!";
            } else {
                var messageElement = document.getElementById("message");
                messageElement.innerText = "Error: URL is empty.";
            }
        }
    </script>

    <script>
        function redirectToPage1(element) {
            var buttonId = element.id;

            window.location.href = "<?php echo BASE_URL; ?>includes/Pages/fheader2.php?folder_ID=<?php echo $f_id ?>&b_id=" + buttonId;
        }

        function openInNewWindow(url) {
            window.open(url, '_blank');
        }
    </script>

    <script>
        (function() {
            // STYLE SWITCHER
            // =======================================================
            const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
            const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

            // Function to set active style in the dorpdown menu and set icon for dropdown trigger
            const setActiveStyle = function() {
                $variants.forEach($item => {
                    if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                        $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                        return $item.classList.add('active')
                    }

                    $item.classList.remove('active')
                })
            }

            // Add a click event to all items of the dropdown to set the style
            $variants.forEach(function($item) {
                $item.addEventListener('click', function() {
                    HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                })
            })

            // Call the setActiveStyle on load page
            setActiveStyle()

            // Add event listener on change style to call the setActiveStyle function
            window.addEventListener('on-hs-appearance-change', function() {
                setActiveStyle()
            })
        })()
    </script>

    <script type="text/javascript">
        // Get the search input element
        var searchInput = document.getElementById('searchInput');

        // Attach an event listener to the search input
        searchInput.addEventListener('input', function() {
            // Get the search query
            var query = searchInput.value.toLowerCase();

            // Get the file container element
            var fileContainer = document.getElementsByClassName('nav-item');

            // Get all the div elements within the file container
            var divs = fileContainer.getElementsByTagName('div');

            // Iterate through each div element
            for (var i = 0; i < divs.length; i++) {
                var div = divs[i];
                var fileLink = div.getElementsByTagName('a')[0];
                var fileName = fileLink.textContent.toLowerCase();

                // Show/hide the div element based on the search query
                if (fileName.includes(query)) {
                    div.style.display = 'block';
                } else {
                    div.style.display = 'none';
                }
            }
        });
    </script>



    <script>
        $(".view_document").on("click", function() {
            name = $(this).attr("title");
            $(".modalName").text(name);
            $('#pdf_view').attr('src', '<?php echo BASE_URL ?>includes/Pages/files/' + name);
            $('.open_new').attr('href', '<?php echo BASE_URL ?>includes/Pages/files/' + name);
        });
        $(".view_document1").on("click", function() {
            name = $(this).attr("title");
            $(".modalName").text(name);
            $('#pdf_view').attr('src', '<?php echo BASE_URL ?>includes/pages/files/' + name);
            $('.open_new').attr('href', '<?php echo BASE_URL ?>includes/Pages/files/' + name);
        });
    </script>

    <script>
        $(".copyLink").on("click", function() {
            setTimeout(copURL, 2000);
        });

        function copURL() {
            window.open("<?php echo BASE_URL; ?>openPageIllu.php", "_blank");
        }
    </script>

    <script>
        var folder_ID;
        var briefCase_ID;
        var fileBrief;
        $(".addBreifFile").on("click", function() {
            folder_ID = $(this).attr('value');
            briefCase_ID = $(this).attr('name');
            fileBrief = $(this).data("custom")
            // $(".briefCase_ID").val(briefCase_ID);
            // $(".folder_ID").val(folder_ID);
        });

        $(".fileOpt").change(function() {
            if ($(this).val() == "addFile") {
                $(".multipleFile").css("display", "block");
                $(".phase_form").css("display", "none");
                $(".filelink").css("display", "none");
                $("#file").css("display", "block");
            }

            if ($(this).val() == "addFileLoca") {
                $(".phase_form").css("display", "block");
                $(".multipleFile").css("display", "none");
                $(".filelink").css("display", "none");
                $("#file").css("display", "block");
            }
            if ($(this).val() == "addFileLink") {
                $(".phase_form").css("display", "none");
                $(".multipleFile").css("display", "none");
                $(".filelink").css("display", "block");
            }

            if ($(this).val() == "addNewPage") {
                window.location.href = "<?php echo BASE_URL; ?>Library/newPage.php?folder_ID=" + folder_ID + "&briefCase_ID=" + briefCase_ID + "&briefType=" + fileBrief;
            }
        });



        // $("#chooseBrief").on("change", function() {
        //     var breif_ID = $(this).val();
        //     $(".briefCase_ID").val(breif_ID);
        // });

        // $("#fileModal").on("click", function() {
        //     $("#fileBtn").css("display", 'block');
        //     $("#folderForm").css("display", 'none');
        // });

        // $("#pageBtn").on("click", function() {
        //     $("#fileBtn").css("display", 'none');
        //     $("#folderForm").css("display", 'block');
        // });
    </script>

    <script>
        $(".get_url_val").on("click", "button", function() {
            var id = $(this).attr('id');
            var text = $('.url_value' + id).text();

            var temp2 = $("<input>");
            $("body").append(temp2);
            temp2.val(text).select();
            document.execCommand("copy");
            temp2.remove();
            // alert("hii");
            $('.get_url_val').find("#" + id).find(".bi").removeClass("bi-files").addClass("bi-check-circle");
            $('.get_url_val').find("#" + id).removeClass("btn-soft-primary").addClass("btn-soft-success");

            $('.get_url_val').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-files");
            $('.get_url_val').find("#" + id).removeClass("btn-soft-success").addClass("btn-soft-primary");
            window.open(text, '_blank');

        });
    </script>

    <script>
        $(".get_url_val1").on("click", "button", function() {
            var id = $(this).attr('id');

            var text = $('.url_value' + id).text();
            //  alert(text);
            var temp1 = $("<input>");
            $("body").append(temp1);
            temp1.val(text).select();
            document.execCommand("copy");
            temp1.remove();
            $('.get_url_val1').find("#" + id).find(".bi").removeClass("bi-box-arrow-up-right").addClass("bi-check-circle");
            $('.get_url_val1').find("#" + id).removeClass("btn-soft-primary").addClass("btn-soft-success");
            setTimeout(function() {
                $('.get_url_val1').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-box-arrow-up-right");
                $('.get_url_val1').find("#" + id).removeClass("btn-soft-success").addClass("btn-soft-primary");
                window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
            }, 2000);


        });

        $(".openBrief").on("click", function() {
            const storedBriefValue = localStorage.getItem('brief_Id');
            $("#" + storedBriefValue).removeClass("show");
            $("." + storedBriefValue).css('background-color', '');
            var briefName = $(this).attr("value");
            $("#" + briefName).css('background-color', '#2b2c2dad');
            $("." + briefName).css('background-color', '#2a1840');
            localStorage.setItem('brief_Id', briefName);

        });

        $(document).ready(function() {
            const storedValue = localStorage.getItem('brief_Id');
            $("#" + storedValue).addClass("show");
            $("#" + storedValue).css('background-color', '#2b2c2dad');
            $("." + storedValue).css('background-color', '#2a1840');
        });

        $(".colors").on("click", function() {
            var colorName = $(this).attr("name");
            localStorage.setItem('colorName', colorName);
        });
    </script>

    <script type="text/javascript">
        function toggleSearchDropdown() {
            var dropdown = document.getElementById("searchDropdownMenusearch");
            dropdown.classList.toggle("show");
        }
    </script>

    <script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>

    <script>
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown
        $(document).on("click", ".docxLink", function() {
            var fileName = $(this).attr("name");
            var fileType = $(this).attr('value');
            if (fileType == "docx" || fileType == "xlsx" || fileType == "pptx") {

                // Function to set active style in the dorpdown menu and set icon for dropdown trigger
                const setActiveStyle = function() {
                    $variants.forEach($item => {
                        if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                            $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                            return $item.classList.add('active')
                        }

                        $item.classList.remove('active')
                    })
                }

                // Add a click event to all items of the dropdown to set the style
                $variants.forEach(function($item) {
                    $item.addEventListener('click', function() {
                        HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                    })
                })

                // Call the setActiveStyle on load page
                setActiveStyle()
            }
        });
    </script>
    <script>
        $(".driveLink").on("click", function() {
            const page = $(this).attr("name");
            window.location.href = page;
            // alert(page);
        });
        $(document).on("click", ".driveLink1", function() {
            const page = $(this).attr("value");
            window.location.href = page;
        });
    </script>
    <script type="text/javascript">
        $("#foldersearch").keyup(function() {
            $("#openfolderdiv").css("display", "block");
            $("#openfolderdiv").addClass("show");
            $('body').click(function() {
                $('#openfolderdiv').hide();
            });
            // alert('hello');
        });
        $(".find_data").keyup(function() {
            var search = $(this).val();
            var user_id = $("#stud_db_id11").val();

            var fo_id = $("#fo_id").val();
            // alert(search);
            if (search != "") {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo BASE_URL; ?>includes/Pages/getSearch1.php',
                    data: 'search=' + search + '&u_id=' + user_id + '&fo_id=' + fo_id,
                    success: function(response) {
                        console.log(response);
                        $('.searchResult1').empty();
                        $('.searchResult1').append(response);

                    }
                });
            } else {
                $('.searchResult1').empty();
                $("#openfolderdiv").css("display", "none");
            }


        });
    </script>

    <script>
        $(document).on("click", ".parent_checkbox", function() {
            var class1 = $(this).data("created");
            var checkboxes = document.getElementsByClassName('checkbox' + class1);
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
                // $("."+class1).prop("checked", true);
            }

        });
        $(document).on('click', '.got_result', function() {
            var nameId = $(this).attr("value");
            $(".openBrief").css("display", "none");
            $("#openfolderdiv").css("display", "none");
            // $(".nav-collapse").css("display","none");
            $(".addBreifFile").css("display", "none");
            $(".varunmsarii").css("display", "none");
            var checkId = $(".navbarCtpMenu" + nameId).parent().parent().parent().attr("id");
            $("#" + checkId).css("display", "");
            $(".navbarCtpMenu" + nameId).css("display", "");
            // const storedValue = localStorage.getItem('brief_Id');
            // $("#" + storedValue).addClass("show");
            $(".fileDrop").css("display", "none");
            $("#navbarCtpMenu" + nameId).css("display", "");
            $("#navbarCtpMenu" + nameId).addClass("show");
        });

        $(document).on('click', '.got_result_link', function() {
            var fileId = $(this).attr("value");
            var briefId = $(this).attr("name");
            $(".openBrief").css("display", "none");
            $("#openfolderdiv").css("display", "none");
            // $(".nav-collapse").css("display","none");
            $(".addBreifFile").css("display", "none");
            $(".varunmsarii").css("display", "none");
            var checkId = $(".navbarCtpMenu" + briefId).parent().parent().parent().attr("id");
            $("#" + checkId).css("display", "");
            $(".navbarCtpMenu" + briefId).css("display", "");
            // const storedValue = localStorage.getItem('brief_Id');
            // $("#" + storedValue).addClass("show");
            $(".fileDrop").css("display", "none");
            $("#navbarCtpMenu" + briefId).css("display", "");
            $("#navbarCtpMenu" + briefId).addClass("show");
            $(".userLink").css("background-color", "")
            $(".folderFile").css("display", "none")
            $(".folderPage").css("display", "none")
            $("#userLink" + fileId).css("background-color", "#0B79E8")
        });

        $(document).on('click', '.got_result_user_page', function() {
            var fileId = $(this).attr("value");
            var briefId = $(this).attr("name");
            $(".openBrief").css("display", "none");
            $("#openfolderdiv").css("display", "none");
            // $(".nav-collapse").css("display","none");
            $(".addBreifFile").css("display", "none");
            $(".varunmsarii").css("display", "none");
            var checkId = $(".navbarCtpMenu" + briefId).parent().parent().parent().attr("id");
            $("#" + checkId).css("display", "");
            $(".navbarCtpMenu" + briefId).css("display", "");
            // const storedValue = localStorage.getItem('brief_Id');
            // $("#" + storedValue).addClass("show");
            $(".fileDrop").css("display", "none");
            $("#navbarCtpMenu" + briefId).css("display", "");
            $("#navbarCtpMenu" + briefId).addClass("show");
            $(".userPage").css("background-color", "")
            $(".folderFile").css("display", "none")
            $(".folderPage").css("display", "none")
            $("#userPage" + fileId).css("background-color", "#0B79E8")
        });

        $(document).on('click', '.got_result_adminLink', function() {
            var fileId = $(this).attr("value");
            var briefId = $(this).attr("name");
            $(".openBrief").css("display", "none");
            $("#openfolderdiv").css("display", "none");
            // $(".nav-collapse").css("display","none");
            $(".addBreifFile").css("display", "none");
            $(".varunmsarii").css("display", "none");
            var checkId = $(".adminBrief" + briefId).parent().parent().parent().attr("id");
            $("." + checkId).css("display", "");
            $(".adminBrief" + briefId).css("display", "");
            // const storedValue = localStorage.getItem('brief_Id');
            // $("#" + storedValue).addClass("show");
            $(".fileDrop").css("display", "none");
            $(".adminBriefContainer" + briefId).css("display", "");
            $(".adminBriefContainer" + briefId).addClass("show");
            $("#adminLink" + fileId).css("background-color", "#0B79E8")
        });

        $(document).on('click', '.got_result_folderLink', function() {
            var folderFile = $(this).attr("value");
            var briefId = $(this).attr("name");
            $(".openBrief").css("display", "none");
            $("#openfolderdiv").css("display", "none");
            // $(".nav-collapse").css("display","none");
            $(".addBreifFile").css("display", "none");
            $(".varunmsarii").css("display", "none");
            $("#folderFile" + folderFile).parent().parent().css("display", "");
            // alert(checkId);
            // $("#" + checkId).css("display", "");
            $(".adminBrief" + briefId).css("display", "");
            // const storedValue = localStorage.getItem('brief_Id');
            // $("#" + storedValue).addClass("show");
            $(".fileDrop").css("display", "none");
            $("#folderFile" + folderFile).css("display", "");
            $("#folderFile" + folderFile).addClass("show");
            $(".folderFile" + folderFile).css("background-color", "")
            $(".folderPage").css("background-color", "")
            $(".folderFile").css("background-color", "")
            $("#folderFile" + folderFile).css("background-color", "#0B79E8")
        });

        $(document).on('click', '.got_result_folder_page', function() {
            var folderFile = $(this).attr("value");
            var briefId = $(this).attr("name");
            $(".openBrief").css("display", "none");
            $("#openfolderdiv").css("display", "none");
            // $(".nav-collapse").css("display","none");
            $(".addBreifFile").css("display", "none");
            $(".varunmsarii").css("display", "none");
            $("#folderPage" + folderFile).parent().parent().parent().css("display", "");
            // alert(checkId);
            // $("#" + checkId).css("display", "");
            $(".adminBrief" + briefId).css("display", "");
            // const storedValue = localStorage.getItem('brief_Id');
            // $("#" + storedValue).addClass("show");
            $(".fileDrop").css("display", "none");
            $("#folderPage" + folderFile).css("display", "");
            $("#folderPage" + folderFile).addClass("show");
            $(".folderPage" + folderFile).css("background-color", "")
            $(".folderFile").css("background-color", "")
            $(".folderPage").css("background-color", "")
            $("#folderPage" + folderFile).css("background-color", "#0B79E8")
        });
    </script>

    <script>
        $(".txt_search").keyup(function() {
            var search = $(this).val();
            // alert(search);
            if (search != "") {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo BASE_URL; ?>Library/getPermissionSearch.php',
                    data: {
                        search: search,
                    },
                    success: function(response) {
                        $(".tableData").show();
                        $('.userDetail').empty();
                        $('.userDetail').append(response);
                        // console.log(response);

                    }
                });
            } else {
                $('.searchResult').empty();
                $(".tableData").hide();
            }


        });
    </script>

    <script>
        $(".userLink").on("click", function() {
            localStorage.setItem('userPage', 0);
            localStorage.setItem('folderFile', 0);
            localStorage.setItem('folderPage', 0);
            var linkId = $(this).attr('id');
            localStorage.setItem('userLink', linkId);
        });
        $(".userPage").on("click", function() {
            localStorage.setItem('userLink', 0);
            localStorage.setItem('folderFile', 0);
            localStorage.setItem('folderPage', 0);
            var pageId = $(this).attr('id');
            localStorage.setItem('userPage', pageId);
        });
        $(".folderFile").on("click", function() {
            localStorage.setItem('userLink', 0);
            localStorage.setItem('userPage', 0);
            localStorage.setItem('folderPage', 0);
            var folderFile = $(this).attr('id');
            localStorage.setItem('folderFile', folderFile);
            const storedBriefValue = localStorage.getItem('brief_Id');
            $("#" + storedBriefValue).removeClass("show");
        });
        $(".folderPage").on("click", function() {
            localStorage.setItem('userLink', 0);
            localStorage.setItem('userPage', 0);
            localStorage.setItem('folderFile', 0);
            var folderPage = $(this).attr('id');
            localStorage.setItem('folderPage', folderPage);

        });

        $(document).ready(function() {
            var userPage = localStorage.getItem('userPage');
            var folderFile = localStorage.getItem('folderFile');
            var folderPage = localStorage.getItem('folderPage');
            var userLink = localStorage.getItem('userLink');

            if (folderFile != 0 || folderPage != 0) {
                const storedBriefValue = localStorage.getItem('brief_Id');
                $("#" + storedBriefValue).removeClass("show");
                $("." + storedBriefValue).css('background-color', '');
            }

            $("#" + userLink).css("background-color", "#394867");
            $("#" + userPage).parent().css("background-color", "#394867");
            $("#" + folderFile).parent().css("background-color", "#394867");
            $("#" + folderPage).parent().css("background-color", "#394867");
        });

        $(document).on("click", ".docxLink", function() {
            var fileName = $(this).attr("name");
            var fileType = $(this).attr('value');
            if (fileType == "docx" || fileType == "xlsx" || fileType == "pptx") {

                function downloadFile(url, fileName) {
                    var link = document.createElement('a');
                    link.href = url;
                    link.download = fileName;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }

                // Download the DOCX file
                var docxUrl = "<?php echo BASE_URL; ?>includes/pages/files/" + fileName;
                var docxFileName = fileName;
                downloadFile(docxUrl, docxFileName);

                // // Download the XLSX file
                // var xlsxUrl = 'path/to/your/file.xlsx';
                // var xlsxFileName = 'spreadsheet.xlsx';
                // downloadFile(xlsxUrl, xlsxFileName);
            }
        });
    </script>

    <script>
        $(".driveLink").on("click", function() {
            const page = $(this).attr("name");
            window.location.href = page;
            // alert(page);
        });
        $(document).on("click", ".driveLink1", function() {
            const page = $(this).attr("value");

            var $tempInput = $("<input>");

            // Set the value of the temporary input element to the text
            $tempInput.val(page);

            // Append the temporary input element to the body
            $("body").append($tempInput);

            // Select the text in the temporary input element
            $tempInput.select();

            // Copy the selected text to the clipboard
            document.execCommand("copy");

            // Remove the temporary input element from the body
            $tempInput.remove();
            window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
        });
    </script>

    <!-- <script src="blur.js"></script> -->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('open_slider_header'));
            var openModalBtn = document.querySelector('[data-bs-target="#open_slider_header"]');
            var pageContent = document.querySelector('.page-content');

            openModalBtn.addEventListener('click', function() {
                pageContent.classList.add('blur');
            });

            modal._element.addEventListener('hidden.bs.modal', function() {
                pageContent.classList.remove('blur');
            });
        });
    </script>
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

</html>
</body>