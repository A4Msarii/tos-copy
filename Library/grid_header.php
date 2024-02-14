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
     <?php include 'lb_thumbnail.php';?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">


    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="dark" as="style">
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme-dark.min.css" data-hs-appearance="default" as="style">

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
            font-size: 23px;
            color: white;
        }

        .breifBTN {
            position: absolute;
            left: 170px;
            font-size: 28px;
            color: white;
            top: -50px;
        }
        /*.circle_color {
            width: 10px;
            height: 10px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: #dc3545 !important;
        }*/
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


    <script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

<header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered">
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
                         <?php include '../includes/Pages/profileinfo.php';?>
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
        </div>
    </header>

    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-black" style="width:300px;">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset" style="height:auto;">

                
                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                        
                        <div id="navbarVerticalMenuPagesMenu">

                            <?php
                            //fetch item
                            // if()){
                            if (isset($_SESSION['folderId'])) {
                                $f_id = $_SESSION['folderId'];
                            }
                            if (isset($f_id)) {
                                $allitem1_a = $connect->query("SELECT * FROM folders WHERE id='$f_id'");

                                if ($allitem1_a->rowCount() > 0) {
                                    $sn1111 = 'A';
                                    while ($row1 = $allitem1_a->fetch()) {
                                        $folder_id = $row1['id'];
                            ?>
                                        <div class="nav-item" style="display:none;">
                                            <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEcommerceMenu" aria-expanded="true" aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                                                <!-- <i class="bi-basket nav-icon"></i> -->
                                                <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/folder.png" class="testFun">
                                                <span style="color:white;" class="nav-link-title"><?php echo $item_id1_a = $row1['folder']; ?>
                                                    
                                                    
                                                </span>

                                            </a>

                                            <div class="dropdown addBreifFile" style="position: fixed;z-index:99;" value="<?php echo $f_id; ?>" name="0">
                                                        <button type="button" class="btn iconBtn" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                            <i class="bi bi-file-earmark-diff"></i> </button>

                                                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem; position:absolute;top:2px;left:45px;">
                                                            <!-- Header -->
                                                            <div class="card-header card-header-content-between">
                                                                <h4 class="card-title mb-0">Select Method</h4>
                                                            </div>

                                                            <!-- Body -->
                                                            <div class="card-body-height">
                                                                <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                    <option selected>Select File Method</option>
                                                                    <option value="addFile">Add File</option>
                                                                    <option value="addFileLoca">Add File Location</option>
                                                                    <option value="addFileLink">Add Link</option>
                                                                    <option value="addNewPage">Add New Page</option>
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
                                                                        <input style="margin:5px;" type="submit" value="Submit" name="submitfiles" class="btn btn-success" />
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
                                                                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Multiple Files Location</label>
                                                                            <table class="table table-bordered" id="table-field">
                                                                                <tr>
                                                                                    <td style="text-align: center;"><input type="text" placeholder="Enter Locations" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <center>
                                                                            <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>
                                                                            <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                        </center>
                                                                    </form>
                                                                </center>
                                                                <center>
                                                                    <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                        <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                        <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                        <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                        <div class="input-field">
                                                                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
                                                                            <table class="table table-bordered" id="table-field-link">
                                                                                <tr>
                                                                                    <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="linkName[]" id="linkname" class="form-control" value="" />
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align: center;"><input type="text" placeholder="Enter Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <center>
                                                                            <button style="margin:5px;" class="btn btn-success" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                            <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                        </center>
                                                                    </form>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <div class="dropdown" style="position: fixed;z-index:99;">
                                                        <button type="button" class="btn breifBTN" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" 
                                                        aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                            <i class="bi bi-folder-plus"></i> </button>

                                                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem; position:absolute;top:2px;left:45px;">
                                                            <!-- Header -->
                                                            <div class="card-header card-header-content-between">
                                                                <h4 class="card-title mb-0">Add Brief Case</h4>
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

                                            <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu" style="display:none;">

                                                <div id="navbarUsersMenuDiv">

                                                    <?php
                                                    $sel_val = "SELECT file_briefcase.brief_id FROM `file_briefcase`
                                    INNER JOIN file_briefcase_folder ON file_briefcase.file_id = file_briefcase_folder.file_id where file_briefcase_folder.folder_id='$folder_id' GROUP BY file_briefcase.brief_id";
                                                    $statement1_bb = $connect->prepare($sel_val);
                                                    $statement1_bb->execute();
                                                    if ($statement1_bb->rowCount() > 0) {
                                                        $result1_bb = $statement1_bb->fetchAll();
                                                        $sn1122 = 1;
                                                        foreach ($result1_bb as $row5) {
                                                            $breifcase_id = $row5['brief_id'];
                                                            $select_breifcase = $connect->prepare("SELECT briefcase FROM briefcase WHERE id=?");
                                                            $select_breifcase->execute([$breifcase_id]);
                                                            $select_breifcase_id = $select_breifcase->fetchColumn();

                                                    ?>

                                                            <!-- Collapse -->
                                                            <div class="nav-item">
                                                                <a class="nav-link dropdown-toggle collapsed" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu<?php echo $select_breifcase_id; ?>" aria-expanded="false" aria-controls="navbarCtpMenu">
                                                                    <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/briefcase.png" class="testFun">
                                                                    <span style="color:white;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $select_breifcase_id ?>"><?php echo $select_breifcase_id ?>
                                                                        <!-- <span style="margin:2px;font-size:22px;color:white;position:absolute;right:45px;top:2px;" data-bs-target="#addfiles" data-bs-toggle="modal" data-bs-placement="bottom" title="Add New File" name="<?php echo $breifcase_id; ?>" value="0" class="addBreifFile"><i class="bi bi-folder-plus"></i></span> -->
                                                                        


                                                                    </span>
                                                                </a>
                                                                
                                                                <div class="dropdown addBreifFile" style="position: fixed;    z-index: 9;" name="<?php echo $breifcase_id; ?>" value="0">

                                                                            <button type="button" class="btn iconBtn " id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                                                <i class="bi bi-file-earmark-diff"></i> </button>

                                                                            <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem; position:absolute;top:2px;left:45px;">
                                                                                <!-- Header -->
                                                                                <div class="card-header card-header-content-between">
                                                                                    <h4 class="card-title mb-0">Select Method</h4>
                                                                                </div>

                                                                                <!-- Body -->
                                                                                <div class="card-body-height">
                                                                                    <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                                        <option selected>Select File Method</option>
                                                                                        <option value="addFile">Add File</option>
                                                                                        <option value="addFileLoca">Add File Location</option>
                                                                                        <option value="addFileLink">Add Link</option>
                                                                                        <option value="addNewPage">Add New Page</option>
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
                                                                                            <input style="margin:5px;" type="submit" value="Submit" name="submitfiles" class="btn btn-success" />
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
                                                                                                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Multiple Files Location</label>
                                                                                                <table class="table table-bordered" id="table-field">
                                                                                                    <tr>
                                                                                                        <td style="text-align: center;"><input type="text" placeholder="Enter Locations" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </div>
                                                                                            <center>
                                                                                                <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>
                                                                                                <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                            </center>
                                                                                        </form>
                                                                                    </center>
                                                                                    <center>
                                                                                        <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                            <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                            <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                                            <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                                            <div class="input-field">
                                                                                                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
                                                                                                <table class="table table-bordered" id="table-field-link">
                                                                                                    <tr>
                                                                                                        <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="linkName[]" id="linkname" class="form-control" value="" />
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td style="text-align: center;"><input type="text" placeholder="Enter Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </div>
                                                                                            <center>
                                                                                                <button style="margin:5px;" class="btn btn-success" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                                                <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                            </center>
                                                                                        </form>
                                                                                    </center>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                <div style="display: none;" id="navbarCtpMenu<?php echo $select_breifcase_id; ?>" class="nav-collapse collapse" data-bs-parent="#navbarUsersMenuDiv" hs-parent-area="#navbarVerticalMenuPagesEcommerceMenu">

                                                                    <?php
                                                                    $file_fetch = "SELECT * FROM file_briefcase WHERE brief_id = '$breifcase_id'";
                                                                    $file_fetch_st = $connect->prepare($file_fetch);
                                                                    $file_fetch_st->execute();
                                                                    if ($file_fetch_st->rowCount() > 0) {
                                                                        $result_file = $file_fetch_st->fetchAll();
                                                                        $sn1 = 'a';
                                                                        foreach ($result_file as $row_file) {
                                                                            $name_file = $row_file['file_id'];
                                                                            $file_data = $connect->prepare("SELECT * FROM `files` WHERE id=?");
                                                                            $file_data->execute([$name_file]);
                                                                            while ($file = $file_data->fetch()) {
                                                                    ?>

                                                                                <?php if ($file['file_Type'] == "location") { ?>
                                                                                    <span class="get_url_val1">
                                                                                        <a class="copyLink" target="_blank">
                                                                                            <?php echo $file['type']; ?>
                                                                                            <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $file['id'] ?>">
                                                                                                <i class="bi bi-files"></i></button>

                                                                                            <a style="display:none" href="<?php echo $file['name']; ?>" class="url_value<?php echo $file['id'] ?>" target="_blank">
                                                                                                <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/file.png">
                                                                                                <?php echo $file['name']; ?></a>
                                                                                    </span>
                                                                                    <br>
                                                                                <?php } else if ($file['file_Type'] == "link") { ?>
                                                                                    <span class="get_url_val1">
                                                                                        <a href="<?php echo $file['name']; ?>" target="_blank">
                                                                                            <?php echo $file['type']; ?>
                                                                                            <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $file['id'] ?>">
                                                                                                <i class="bi bi-files"></i></button>

                                                                                            <a style="display:none" href="<?php echo $file['type']; ?>" class="url_value<?php echo $file['id'] ?>" target="_blank">
                                                                                                <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/file.png">
                                                                                                <?php echo $file['name']; ?>
                                                                                            </a>
                                                                                        </a>
                                                                                    </span>
                                                                                    <br>
                                                                                <?php } else {

                                                                                ?>
                                                                                    <span>
                                                                                        <a target="_blank" href="<?php echo BASE_URL ?>includes/Pages/files/<?php echo $file['name']; ?>"><i class="bi bi-arrow-90deg-right" data-bs-placement="bottom" title="Open in New Window" style="color:white; margin:5px;"></i></a>
                                                                                        <a class="nav-link view_document" style="color: blue;" data-bs-target="#view_document" target="_blank" data-bs-toggle="modal" data-bs-placement="bottom" title="<?php echo $file['name']; ?>">
                                                                                            <span>
                                                                                                <?php
                                                                                                 echo substr($file['name'],0,5);
                                                                                                  ?>
                                                                                        </span>
                                                                                            <a style="position: relative; display:none;" target="_blank" href="<?php echo BASE_URL ?>includes/Pages/files/<?php echo $file['name']; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white; float:right; margin-left:40px;position:absolute;top:-40px;left:120px;font-size:24px;"></i></a>
                                                                                        </a>
                                                                                    </span>
                                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$breifcase_id'");
                                                                    while ($brefData = $fetchBrief->fetch()) {
                                                                        $fileName = $brefData['filename'];
                                                                        $fileLastName = $brefData['lastName'];
                                                                    ?>
                                                                        <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/file.png">
                                                                        <?php
                                                                        if ($fileLastName == null) {
                                                                        ?>
                                                                            <span><a class="nav-link" style="color: blue;" href="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $fileName; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $fileName; ?>"><?php echo $brefData['type']; ?></a></span>
                                                                        <?php
                                                                        } else if ($brefData['type'] == "offline") {
                                                                        ?>
                                                                            <span class="get_url_val">
                                                                                <a class="copyLink" target="_blank">
                                                                                    <?php echo $fileLastName; ?>
                                                                                    <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                                        <i class="bi bi-files"></i></button>

                                                                                    <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            </span>
                                                                            <br>
                                                                        <?php
                                                                        } elseif ($brefData['type'] == "online") {
                                                                        ?>
                                                                            <span class="get_url_val">
                                                                                <a href="<?php echo $fileName; ?>" target="_blank">
                                                                                    <?php echo $brefData['type']; ?>
                                                                                    <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                                        <i class="bi bi-files"></i></button>

                                                                                    <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            </span>
                                                                            <br>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    $editBreifQ = $connect->query("SELECT * FROM editor_data WHERE briefId = '$breifcase_id'");
                                                                    while ($editBData = $editBreifQ->fetch()) {
                                                                        $bId = $editBData['id'];
                                                                    ?>
                                                                        <a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $bId; ?>&brief_ID=<?php echo $breifcase_id; ?>" role="button" style="color:blue;border-left:2px solid <?php echo $editBData['color']; ?>;border-radius: 0px;">
                                                                            
                                                                            <?php echo $editBData['pageName']; ?>
                                                                        </a>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <!-- End Collapse -->

                                                </div>



                                            </div>

                                            <?php
                                            $userId = $_SESSION['login_id'];
                                            $query = $connect->query("SELECT * FROM user_briefcase WHERE user_id = '$userId' AND folderId = '$f_id'");
                                            while ($result = $query->fetch()) {
                                                $userbriefId = $result['id'];
                                            ?>
                                                <div style="display: none;" id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                    <div id="navbarUsersMenuDiv">


                                                        <!-- Collapse -->
                                                        <div class="nav-item">
                                                            <a class="nav-link dropdown-toggle collapsed" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu<?php echo $userbriefId; ?>" aria-expanded="false" aria-controls="navbarCtpMenu">
                                                                <img style="height:20px; width:20px; margin-right: 10px;" src="/latest/TOS/assets/svg/phase2_white/briefcase.png" class="testFun">
                                                                <span style="color:white;"><?php echo $result['briefcase_name']; ?>
                                                                    <!-- <span style="margin:2px;font-size:22px;color:white;position:absolute;right:45px;top:2px;" data-bs-target="#addfiles" data-bs-toggle="modal" data-bs-placement="bottom" title="Add New File" name="<?php echo $userbriefId; ?>" value="0" class="addBreifFile"><i class="bi bi-folder-plus"></i></span> -->
                                                                    
                                                            </a>

                                                            <div class="dropdown addBreifFile" style="position: fixed;    z-index: 9;" name="<?php echo $userbriefId; ?>" value="0">
                                                                        <button type="button" class="btn iconBtn " id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                                            <i class="bi bi-file-earmark-diff"></i> </button>

                                                                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem; position:absolute;top:2px;left:45px;">
                                                                            <!-- Header -->
                                                                            <div class="card-header card-header-content-between">
                                                                                <h4 class="card-title mb-0">Select Method</h4>
                                                                            </div>

                                                                            <!-- Body -->
                                                                            <div class="card-body-height">
                                                                                <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                                    <option selected>Select File Method</option>
                                                                                    <option value="addFile">Add File</option>
                                                                                    <option value="addFileLoca">Add File Location</option>
                                                                                    <option value="addFileLink">Add Link</option>
                                                                                    <option value="addNewPage">Add New Page</option>
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
                                                                                        <input style="margin:5px;" type="submit" value="Submit" name="submitfiles" class="btn btn-success" />
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
                                                                                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Multiple Files Location</label>
                                                                                            <table class="table table-bordered" id="table-field">
                                                                                                <tr>
                                                                                                    <td style="text-align: center;"><input type="text" placeholder="Enter Locations" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </div>
                                                                                        <center>
                                                                                            <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>
                                                                                            <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                        </center>
                                                                                    </form>
                                                                                </center>
                                                                                <center>
                                                                                    <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                                        <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                                        <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                                        <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                                        <div class="input-field">
                                                                                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
                                                                                            <table class="table table-bordered" id="table-field-link">
                                                                                                <tr>
                                                                                                    <td style="text-align: center;"><input type="text" placeholder="Enter Locations Name" name="linkName[]" id="linkname" class="form-control" value="" />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="text-align: center;"><input type="text" placeholder="Enter Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </div>
                                                                                        <center>
                                                                                            <button style="margin:5px;" class="btn btn-success" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                                            <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                        </center>
                                                                                    </form>
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                            <div style="display: none;" id="navbarCtpMenu<?php echo $userbriefId; ?>" class="nav-collapse collapse" data-bs-parent="#navbarUsersMenuDiv" hs-parent-area="#navbarVerticalMenuPagesEcommerceMenu">
                                                                <?php
                                                                $briefPageQuery = $connect->query("SELECT * FROM editor_data WHERE briefId = '$userbriefId'");
                                                                while ($briefData = $briefPageQuery->fetch()) {
                                                                    $breifId = $briefData['id'];
                                                                ?>
                                                                    <a class="nav-link" style="color: blue;border-left:2px solid <?php echo $briefData['color']; ?>;border-radius: 0px;" href="<?php echo BASE_URL ?>Library/pageData.php?bId=<?php echo $breifId; ?>&userBrief_ID=<?php echo $userbriefId; ?>"><?php echo $briefData['pageName']; ?></a>
                                                                <?php
                                                                }
                                                                ?>
                                                                <!-- <span style="color:white;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#addfiles" onclick="document.getElementById('userfi_id').value='<?php echo $userbriefId; ?>'"></><u>Add New File</u></span><br>
                                                                <a href="<?php echo BASE_URL ?>Library/newPage.php?briefid=<?php echo $userbriefId; ?>" style="color:white"><u>Add New Page</u></a><br> -->
                                                                <?php
                                                                $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId'");
                                                                while ($brefData = $fetchBrief->fetch()) {
                                                                    $fileName = $brefData['filename'];
                                                                    $fileLastName = $brefData['lastName'];
                                                                ?>
                                                                    
                                                                    <?php
                                                                    if ($fileLastName == null) {
                                                                    ?>
                                                                        <span>
                                                                        <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $brefData['filename']; ?>"><i class="bi bi-arrow-90deg-right" data-bs-placement="bottom" title="Open in New Window" style="color:white; margin:5px;"></i></a>   
                                                                        <a class="nav-link view_document1" style="color: blue;" data-bs-target="#view_document" target="_blank" data-bs-toggle="modal" data-bs-placement="bottom" title="<?php echo $fileName; ?>">
                                                                        
                                                                            <?php echo substr($brefData['filename'],0,5); ?></a></span>
                                                                    <?php
                                                                    } else if ($brefData['type'] == "offline") {
                                                                    ?>
                                                                        <span class="get_url_val">
                                                                            <a class="copyLink" target="_blank">
                                                                                <?php echo $fileLastName; ?>
                                                                                <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                                    <i class="bi bi-files"></i></button>

                                                                                <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                        </span>
                                                                        <br>
                                                                    <?php
                                                                    } elseif ($brefData['type'] == "online") {
                                                                    ?>
                                                                        <span class="get_url_val">
                                                                            <a href="<?php echo $fileName; ?>" target="_blank">
                                                                                <?php echo $brefData['type']; ?>
                                                                                <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                                    <i class="bi bi-files"></i></button>

                                                                                <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                        </span>
                                                                        <br>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <!-- End Collapse -->
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <?php
                                            $fetchBrief = $connect->query("SELECT * FROM user_files WHERE folderId = '$f_id'");
                                            while ($brefData = $fetchBrief->fetch()) {
                                                $fileName = $brefData['filename'];
                                                $fileLastName = $brefData['lastName'];
                                            ?>
                                                
                                                <?php
                                                if ($fileLastName == null) {
                                                ?>
                                                    <span>
                                                    <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $brefData['filename']; ?>"><i class="bi bi-arrow-90deg-right" data-bs-placement="bottom" title="Open in New Window" style="color:white; margin:5px;"></i></a> 
                                                        <a class="nav-link view_document1" style="color: blue;" target="_blank" data-bs-target="#view_document" data-bs-toggle="modal" data-bs-placement="bottom" title="<?php echo $fileName; ?>"><?php echo substr($brefData['filename'],0,5); ?></a></span>
                                                <?php
                                                } else if ($brefData['type'] == "offline") {
                                                ?>
                                                    <span class="get_url_val">
                                                        <a class="copyLink" target="_blank">
                                                            <?php echo $fileLastName; ?>
                                                            <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                <i class="bi bi-files"></i></button>

                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                    </span>
                                                    <br>
                                                <?php
                                                } elseif ($brefData['type'] == "online") {
                                                ?>
                                                    <span class="get_url_val">
                                                        <a href="<?php echo $fileName; ?>" target="_blank">
                                                            <?php echo $brefData['type']; ?>
                                                            <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                <i class="bi bi-files"></i></button>

                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                    </span>
                                                    <br>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                        <?php
                                        $folderPageQuery = $connect->query("SELECT * FROM editor_data WHERE folderId = '$f_id'");
                                        while ($folData = $folderPageQuery->fetch()) {
                                            $pageId = $folData['id'];
                                            $circlecolor = $folData['favouriteColor'];
                                        ?>
                                           
                                            <div style="display: none;" id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu" >
                                                
                                                <div id="navbarUsersMenuDiv">
                                                    
                                                    <a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $pageId; ?>" role="button" style="color:white;border-left:2px solid <?php echo $folData['color']; ?>;border-radius: 0px;">
                                                         <span style="color:white; margin: 5px; width: 10px;
            height: 10px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background: <?php echo $circlecolor; ?>" class="circle_color"></span>
                                                        <span><?php echo $folData['pageName']; ?></span>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                            <?php
                                    }
                                }
                            }
                            ?>
                            <!-- 
                            <hr>
                            <a style="color: white;" class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#addBreif">Add New Breifcase</a> -->

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
                            <?php
                            if ($_SESSION['role'] == 'super admin' || $_SESSION['role'] == 'instructor') {
                            ?>
                                <hr>
                                <a href="<?php echo BASE_URL; ?>Library/alldetails.php" class="nav-link" style="color:white" id="pageBtn">All Details</a>
                            <?php
                            }
                            ?>
                            <hr>
                            <?php
                             $url = $_SERVER['PHP_SELF'];
                             $filename2 = basename($url);
                             if ($filename2 == "list_view_files.php") {
                                 ?>
                                 <a href="<?php echo BASE_URL; ?>Library/grid_view_files.php" class="nav-link" style="color:white;">Grid View</a>
                            <?php
                             }
                            ?>

                            <?php
                            if ($filename2 == "grid_view_files.php") {
                                 ?>
                                 <a href="<?php echo BASE_URL; ?>Library/list_view_files.php" class="nav-link" style="color:white;">List View</a>
                            <?php
                             }
                            ?>

                            <?php
                            if ($filename2 == "grid_view_brief.php") {
                                 ?>
                                 <a href="<?php echo BASE_URL; ?>includes/Pages/fheader1.php" class="nav-link" style="color:white;">List View</a>
                            <?php
                             }
                            ?>

                            <?php
                            if ($filename2 == "brief_file.php") {
                                 ?>
                                 <a href="<?php echo BASE_URL; ?>includes/Pages/fheader1.php" class="nav-link" style="color:white;">List View</a>
                            <?php
                             }
                            ?>

                            <?php
                            if ($filename2 == "openpdfpagegrid.php") {
                                 ?>
                                 <a href="<?php echo BASE_URL; ?>includes/Pages/fheader1.php" class="nav-link" style="color:white;">List View</a>
                            <?php
                             }
                            ?>
                            <?php
                            if ($filename2 == "pageDatagrid.php") {
                                 ?>
                                 <a href="<?php echo BASE_URL; ?>includes/Pages/fheader1.php" class="nav-link" style="color:white;">List View</a>
                            <?php
                             }
                            ?>
                            <!-- <a href="<?php echo BASE_URL; ?>includes/Pages/fheader1.php" class="nav-link" style="color:white;">List View</a> -->
                        </div>
                        <!-- End Content -->

                         <div class="navbar-vertical-footer fixed bg-black" style="margin-bottom: 10px;">
                            <center>
                                <?php include '../includes/Pages/rolecolor.php';?>
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
                                            <a class="dropdown-item" id="grade_sheet" href="<?php echo BASE_URL; ?>includes/Pages/Home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V1.0.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:15px; width: 15px; margin: 3px;" id="grade_sheet">
                                                <span class="text-truncate" id="grade_sheet">Grade sheet</span>
                                            </a>
                                            <a class="dropdown-item" id="bri" href="<?php echo BASE_URL; ?>includes/Pages/apps-bri.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:15px; width: 15px; margin: 5px;" id="bri">
                                                <span class="text-truncate" id="bri">BRI</span>
                                            </a>
                                            <a class="dropdown-item" id="library" href="<?php echo BASE_URL; ?>Library/index.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.2.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:15px; width: 15px; margin: 3px;" id="library">
                                                <span class="text-truncate" id="library">Library</span>
                                            </a>
                                            <a class="dropdown-item" id="scheduling" href="<?php echo BASE_URL; ?>Scheduling/home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.1.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:15px; width: 15px; margin: 3px;" id="scheduling">
                                                <span class="text-truncate" id="scheduling">Scheduling</span>
                                            </a>

                                            <a class="dropdown-item" id="hotwash" data-placement="left" href="<?php echo BASE_URL; ?>includes/Pages/hotwash.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                <img style="height:25px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/2D icons PNG/new/MicrosoftTeams-image (21).png" id="hotwash">
                                                <span class="text-truncate" id="hotwash">Hotwash</span>
                                            </a>

                                        </div>
                                    </div>

                                    <!-- End Style Switcher -->
                                </li>

                                <li class="navbar-vertical-footer-list-item">
                                    <!-- Other Links -->
                                    <div class="dropdown dropup">
                                        <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                            <i class="bi-info-circle"></i>
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
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-gift dropdown-item-icon"></i>
                                                <span class="text-truncate" title="What's new?">What's new?</span>
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
                                    <!-- Language -->
                                    <div class="dropdown dropup">
                                        <button type="button" class="btn btn-soft-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                            <img class="avatar avatar-xss avatar-circle" src="<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="United States Flag">
                                        </button>

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown">
                                            <span class="dropdown-header">Select language</span>
                                            <a class="dropdown-item" href="#">
                                                <img class="avatar avatar-xss avatar-circle me-2" src="<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Flag">
                                                <span class="text-truncate" title="English">English (US)</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- End Language -->
                                </li>

                            </ul>
                        </div>

                        <!-- End Footer -->
                    </div>
                </div>
    </aside>


    <div class="modal fade" id="view_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success modalName"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <embed id="pdf_view" type="application/pdf" frameborder="0" width="100%" height="700px">
                </div>

            </div>
        </div>
    </div>

</body>

<script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(".view_document").on("click", function() {
        name = $(this).attr("title");
        $(".modalName").text(name);
        $('#pdf_view').attr('src', '<?php echo BASE_URL ?>includes/Pages/files/' + name);

    });
    $(".view_document1").on("click", function() {
        name = $(this).attr("title");
        $(".modalName").text(name);
        $('#pdf_view').attr('src', '<?php echo BASE_URL ?>includes/Pages/files/' + name);

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
    $(".addBreifFile").on("click", function() {
        folder_ID = $(this).attr('value');
        briefCase_ID = $(this).attr('name');
        $(".briefCase_ID").val(briefCase_ID);
        $(".folder_ID").val(folder_ID);
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
            window.location.href = "<?php echo BASE_URL; ?>Library/newPage.php?folder_ID=" + folder_ID + "&briefCase_ID=" + briefCase_ID;
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
        //  alert('.get_valueb'+id);
        var temp1 = $("<input>");
        $("body").append(temp1);
        temp1.val(text).select();
        document.execCommand("copy");
        temp1.remove();
        $('.get_url_val').find("#" + id).find(".bi").removeClass("bi-files").addClass("bi-check-circle");
        $('.get_url_val').find("#" + id).removeClass("btn-soft-primary").addClass("btn-soft-success");
        setTimeout(function() {
            $('.get_url_val').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-files");
            $('.get_url_val').find("#" + id).removeClass("btn-soft-success").addClass("btn-soft-primary");
        }, 2000);
    });
</script>

<script>
    $(".get_url_val1").on("click", "button", function() {
        var id = $(this).attr('id');
        var text = $('.url_value' + id).text();
        //  alert('.get_valueb'+id);
        var temp1 = $("<input>");
        $("body").append(temp1);
        temp1.val(text).select();
        document.execCommand("copy");
        temp1.remove();
        $('.get_url_val1').find("#" + id).find(".bi").removeClass("bi-files").addClass("bi-check-circle");
        $('.get_url_val1').find("#" + id).removeClass("btn-soft-primary").addClass("btn-soft-success");
        setTimeout(function() {
            $('.get_url_val1').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-files");
            $('.get_url_val1').find("#" + id).removeClass("btn-soft-success").addClass("btn-soft-primary");
        }, 2000);
    });
</script>

</html>