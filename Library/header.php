<?php
// include '../includes/config.php';
// include(ROOT_PATH . 'includes/connect.php');

$symbol_name = "";
$course_nickname = "";
$fetch_class_value = "";
$class_name = "";
$std_course1 = " ";
$fetchnickname = "";
$CourseCode11 = "";
$Coursename11 = "";
$pic_department = "";




// data according to the role  
// session_start();
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
    $_SESSION['danger']="Please Login Again";
    header("Location:../../index.php");
}
if (isset($_SESSION['inst_id'])) {
    $inst_id = $_SESSION['inst_id'];
}
$institute = "";
$department = "";
// for fetching department name and institute name
$q1 = "SELECT * FROM homepage where user_id=$inst_id";
$st1 = $connect->prepare($q1);
$st1->execute();

if ($st1->rowCount() > 0) {
    $result = $st1->fetchAll();
    foreach ($result as $row) {
        $department = $row['department_name'];
        $institute = $row['school_name'];
    }
}

// for fetching user profile pic         

$profile = $connect->prepare("SELECT file_name FROM `users` WHERE id=?");
$profile->execute([$user_id]);
$prof_pic = $profile->fetchColumn();
if ($prof_pic != null) {
    $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
} else {
    $pic = BASE_URL . 'includes/Pages/upload/avtar.png';
}



$icon = "";
$fetched_per = "";




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
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>tos.svg">



    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css">


    <!-- CSS Front Template -->

    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style">
    <!-- <link rel="preload" href="<?php echo BASE_URL; ?>includes/Pages/assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style"> -->

    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;
        }
    </style>

    <style type="text/css">
        .form-control,
        .form-select {
            border-radius: 20px;
            border: 0.001rem solid #a49d9dd1;
        }

        label {
            margin: 5px;
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

        .select2-container .select2-selection--single {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid black !important;
            border-radius: 0px !important;
        }

        /*#divHover {
  background-color: blue;
  transition: all 0.2s ease-in-out;
  padding: 10px;
  display: inline-block;
  width: 130px;
}*/
        #divHover:hover {
            background-color: aliceblue;
            /*          width: 150px;*/
            padding-right: 15px;
        }

        .form-switch .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
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


</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">


    <script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

    <!-- <div id="loading-screen" class="spinner-border" style="height:50px; width:50px; display:none;">Loading...</div> -->

    <!-- ========== HEADER ========== -->

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
                <div class="dropdown ms-2">
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

                    <li class="nav-item">
                        <div class="form-check form-switch" data-bs-placement="bottom" title="Disable Swap Window" type="button">
                            <input class="form-check-input switch <?php
                                                                    if (isset($_REQUEST['checkValue'])) {
                                                                        echo $_REQUEST['checkValue'];
                                                                    }
                                                                    ?>" type="checkbox" id="switch" <?php
                                                                if (isset($_REQUEST['checkValue'])) {
                                                                    if ($_REQUEST['checkValue'] != "unchecked") {
                                                                        echo "checked";
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                }
                                                                ?> />

                        </div>
                    </li>


                    <!-- <li class="nav-item">
                        <button data-bs-placement="bottom" title="Disable Swap Window" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>Library/index.php" target="_blank" style="color: #71869d;">
                                <i class="bi bi-info-circle"></i></a>
                        </button>

                    </li> -->

                    <li class="nav-item">
                        <button data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>Library/dashboard_library.php" style="color: #71869d;">
                                <i class="bi bi-clipboard-data"></i></a>
                        </button>

                    </li>

                    <li class="hs-has-mega-menu nav-item">
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

                    <li class="nav-item">
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
                                                <input type="text" id="txt_search" name="to_user" class="form-control" placeholder="share individual" autocomplete="off" required value="">
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
                        <div class="dropdown">
                            <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="<?php echo $pic ?>" alt="Image Description">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <?php
                            $fetch_details1 = "SELECT * FROM users where id='$user_id'";
                            $fetch_detailsst22 = $connect->prepare($fetch_details1);
                            $fetch_detailsst22->execute();

                            if ($fetch_detailsst22->rowCount() > 0) {
                                $re22 = $fetch_detailsst22->fetchAll();
                                foreach ($re22 as $row22) {
                                }
                            }
                            ?>

                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                <div class="dropdown-item-text">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?php echo $pic; ?>" alt="Image Description">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mb-0"><?php echo $username; ?></h5>
                                            <p class="card-text text-body"><?php echo $row22['email'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>


                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/profile.php" id="change_profile">Change Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/logout.php" id="sign_out">Sign out</a>
                            </div>
                        </div>
                        <!-- End user modal -->
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
        </div>
    </header>

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->

    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">
                <?php
                $profile_department = $connect->prepare("SELECT file_name FROM `homepage` WHERE user_id=?");
                $profile_department->execute([$inst_id]);
                $prof_pic_dep = $profile_department->fetchColumn();
                if ($prof_pic_dep != null) {
                    $pic_department = BASE_URL . 'includes/pages/department/' . $prof_pic_dep;
                } else {
                    $pic_department = BASE_URL . 'includes/pages/department/' . $prof_pic_dep;
                }

                ?>

                <a class="navbar-brand" href="<?php echo BASE_URL; ?>Library/index.php" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $institute . '/' . $department ?>">
                    <img class="avatar" src="<?php echo $pic_department ?>" alt="Logo" data-hs-theme-appearance="default">
                    <span class="nav-link-title" style="font-weight:bolder;color:#7901c1;"><?php if (isset($department)) { ?>
                            <?php echo $institute . '/' . $department; ?>
                        <?php } ?>
                    </span>

                </a>



                <ul class="navbar-nav" style="width:100%;">
                    
                     
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset" style="height:auto;">


                <div class="navbar-nav-wrap-content-start" style="display: none;">
                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                        <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                        <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->

                    <!-- Search Form -->
                    <div class="dropdown ms-2">
                        <!-- Input Group -->
                        <div class="d-none d-lg-block">
                            <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>

                                <input style="width:30%;" type="search here" id="myInput" name="search" onkeyup="myFunction()" class="js-form-search form-control" placeholder="Search in front" aria-label="Search in front" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenusearch",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                                <a class="input-group-append input-group-text" href="javascript:;">
                                    <i id="clearSearchResultsIcon" class="bi-x-lg"></i>
                                </a>
                            </div>
                        </div>

                        <button class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none" type="button" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenusearch",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                            <i class="bi-search"></i>
                        </button>
                        <!-- End Input Group -->

                        <!-- Card Search Content -->
                        <div id="searchDropdownMenusearch" class="hs-form-search-menu-content dropdown-menu dropdown-menu-form-search navbar-dropdown-menu-borderless">
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

                                </div>

                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card Search Content -->

                    </div>

                    <!-- End Search Form -->
                </div>



                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                

                        <div id="navbarVerticalMenuPagesMenu">
                            <div class="dropdown" style="z-index: 100; display:none;" name="" value="0">
                                <center>
                                    <button style="width:700px; margin-left:-160px; margin-top: 20px;" type="button" class="btn iconBtn">
                                        <input id="foldersearch" type="search" name="search" class="form-control find_data" style="width: 45%; height:40px; border-radius:10px;" placeholder="Search here..." autocomplete="off" /> </button>
                                </center>

                                <div id="openfolderdiv" class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 20rem; position:absolute;top:10px;">
                                    <!-- Header -->
                                    <div class="card-body-height">
                                        <ul class="searchResult1">

                                        </ul>
                                    </div>
                                </div>
                            </div><br>

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
                                        <!-- <input name="search" class="form-control" type="text" id="searchInput" placeholder="Search files"> -->
                                        <div class="nav-item">
                                            <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEcommerceMenu" aria-expanded="true" aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                                                <!-- <i class="bi-basket nav-icon"></i> -->
                                                <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/folder.png" class="testFun">
                                                <span style="color:white; font-weight:bold; font-size: large;" class="nav-link-title"><?php echo $item_id1_a = $row1['folder']; ?>


                                                </span>

                                            </a>

                                            <div class="dropdown addBreifFile" style="position: fixed;z-index:99; margin-right: 5px;" value="<?php echo $f_id; ?>" name="0">
                                                <button type="button" class="btn iconBtn" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                    <img style="height:20px; width:20px; margin-right: -110px; margin-top: -13px;" src="<?php echo BASE_URL ?>assets/svg/file/grey/file_stroke.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Files">
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem; position:absolute;top:2px;left:45px;">
                                                    <!-- Header -->
                                                    <div class="card-header card-header-content-between">
                                                        <h4 class="card-title mb-0">Select Method</h4>
                                                    </div>

                                                    <!-- Body -->
                                                    <div class="card-body-height">
                                                        <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                            <option selected>Select File Method</option>
                                                            <option value="addNewPage">New Page</option>
                                                            <option value="addFile">Attachment</option>
                                                            <option value="addFileLoca">Offline Link</option>
                                                            <option value="addFileLink">Online Link</option>
                                                            
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
                                                                <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                    <option value="All instructor">Instructor Only</option>
                                                                    <option value="Everyone" selected>Everyone</option>
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
                                                                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Multiple Files Location</label>
                                                                    <table class="table table-bordered" id="table-field">
                                                                        <tr>
                                                                            <td style="text-align: center;"><input type="text" placeholder="Locations" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align: center;"><input type="text" placeholder="Locations Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <center>
                                                                    <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                    <br>
                                                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                        <option value="All instructor">Instructor Only</option>
                                                                        <option value="Everyone" selected>Everyone</option>
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
                                                            <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>Library/insert_locations.php" style="" enctype="multipart/form-data">
                                                                <input type="hidden" name="folder_ID" class="folder_ID" value="<?php echo $f_id; ?>" />
                                                                <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                <div class="input-field">
                                                                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
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
                                                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                        <option value="All instructor">Instructor Only</option>
                                                                        <option value="Everyone" selected>Everyone</option>
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

                                            <div class="dropdown" style="position: fixed;z-index:99;">
                                                <button type="button" class="btn breifBTN" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                    <img style="height:20px; width:20px; margin-right: -120px; margin-top:-15px;" src="<?php echo BASE_URL ?>assets/svg/file/grey/stroke_brief.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Breifcase">
                                                </button>

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

                                            <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

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
                                                                <a style="margin-top: 10px;background-color: rgb(235 12 235 / 23%);" class="nav-link dropdown-toggle collapsed openBrief navbarCtpMenu<?php echo $breifcase_id;
                                                                                                                                                                                                            echo $select_breifcase_id; ?> adminBrief<?php echo $breifcase_id; ?>" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu<?php echo $breifcase_id;
                                                                                                                                                                                                                                                                                                                                                                                echo $select_breifcase_id; ?>" aria-expand="false" aria-cont>

                                                                    <img style="height:20px; width:20px; margin-right:10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/briefcase.png" class="testFun">
                                                                    <span style="color:white;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $select_breifcase_id ?>"><?php echo $select_breifcase_id ?>


                                                                    </span>

                                                                </a>

                                                                <div class="navbarCtpMenu<?php echo $breifcase_id;
                                                                                            echo $select_breifcase_id; ?> dropdown addBreifFile" style="position: fixed;z-index: 9; margin-left: 5px;" name="<?php echo $breifcase_id; ?>" value="0">

                                                                    <button type="button" class="btn iconBtn " id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                                        <img style="height:20px; width:20px; margin-right: -110px; margin-top: -13px;" src="<?php echo BASE_URL ?>assets/svg/file/grey/file.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Files"> </button>

                                                                    <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem; position:absolute;top:2px;left:35px;">
                                                                        <!-- Header -->
                                                                        <div class="card-header card-header-content-between">
                                                                            <h4 class="card-title mb-0">Select Method</h4>
                                                                        </div>

                                                                        <!-- Body -->
                                                                        <div class="card-body-height">
                                                                            <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                                <option selected>Select File Method</option>
                                                                                <option value="addNewPage">New Page</option>
                                                                                <option value="addFile">Attachment</option>
                                                                                <option value="addFileLoca">Offline Link</option>
                                                                                <option value="addFileLink">Online Link</option>
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
                                                                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                        <option value="All instructor">Instructor Only</option>
                                                                                        <option value="Everyone" selected>Everyone</option>
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
                                                                                    <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                                    <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
                                                                                    <div class="input-field">
                                                                                        <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Multiple Files Location</label>
                                                                                        <table class="table table-bordered" id="table-field">
                                                                                            <tr>
                                                                                                <td style="text-align: center;"><input type="text" placeholder="Location" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td style="text-align: center;"><input type="text" placeholder="Location Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </div>
                                                                                    <center>
                                                                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                        <br>
                                                                                        <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                            <option value="All instructor">Instructor Only</option>
                                                                                            <option value="Everyone" selected>Everyone</option>
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
                                                                                    <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                                    <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                                    <div class="input-field">
                                                                                        <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
                                                                                        <table class="table table-bordered" id="table-field-link">
                                                                                            <tr>
                                                                                                <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required />
                                                                                                
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
                                                                                        <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                            <option value="All instructor">Instructor Only</option>
                                                                                            <option value="Everyone" selected>Everyone</option>
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
                                                                                            <tbody class="userDetail">

                                                                                            </tbody>
                                                                                        </table>
                                                                                    </center>
                                                                                    <center>
                                                                                        <button style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" id="link_submit" name="savelink">Submit</button>
                                                                                        <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                                                                                    </center>
                                                                                </form>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="background-color: rgb(235 12 235 / 23%);" id="navbarCtpMenu<?php echo $breifcase_id;
                                                                                                                                            echo $select_breifcase_id; ?>" class="nav-collapse collapse fileDrop adminBriefContainer<?php echo $breifcase_id; ?>" data-bs-parent="#navbarUsersMenuDiv" hs-parent-area="#navbarVerticalMenuPagesEcommerceMenu">

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
                                                                                    <span id="adminLink<?php echo $name_file; ?>" class="get_url_val1 nav-link vvvrun" style="display: flex; align-items: center;">
                                                                                        <div style="flex-grow: 1;">
                                                                                            <span>
                                                                                            <a href="<?php echo BASE_URL; ?>Library/urlPage.php?linkId=<?php echo $name_file; ?>&fileName=<?php echo $file['name']; ?>" style="color:white;" class="copyLink">
                                                                                                <?php echo $file['type']; ?>
                                                                                            </a></span>
                                                                                            <?php
                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$name_file'");
                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                            ?>
                                                                                                <span style="color:white; margin: 5px; width: 19px;
                                                                                                                height: 20px;
                                                                                                                -webkit-border-radius: 25px;
                                                                                                                -moz-border-radius: 25px;
                                                                                                                border-radius: 25px;
                                                                                                                position:relative;
                                                                                                                top:11px;
                                                                                                                display:inline-block;
                                                                                                                background: <?php echo $circlecolor; ?>;" class="userOffLineLink">
                                                                                                </span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>


                                                                                            <a style="display:none" href="<?php echo $file['name']; ?>" class="url_value<?php echo $file['id'] ?>" target="_blank">
                                                                                                <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/file.png">
                                                                                                <?php echo $file['name']; ?></a>

                                                                                            <i class="bi bi-files" style="color:white; float:right; font-size:larger; margin-right:7px;" title="copy link" id="<?php echo $file['id'] ?>"></i>
                                                                                        </div>
                                                                                    </span>

                                                                                <?php } else if ($file['file_Type'] == "link") { ?>
                                                                                    <span id="adminLink<?php echo $name_file; ?>" class="get_url_val1 nav-link" style="display:flex; align-items:center;">
                                                                                        <div style="flex-grow: 1; position: relative;">

                                                                                            <?php
                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$name_file'");
                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                            ?>
                                                                                                <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:absolute;
                                                        top:0px;
                                                        background: <?php echo $circlecolor; ?>" class="circle_color"></span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>

                                                                                            <a style="color:white;margin-left:42px;" href="<?php echo BASE_URL; ?>Library/urlPage.php?linkId=<?php echo $name_file; ?>&fileName=<?php echo $file['name']; ?>">
                                                                                                <?php echo substr($file['name'], 0, 5); ?></a>


                                                                                            <a style="display:none" href="<?php echo $file['type']; ?>" class="url_value<?php echo $file['id'] ?>" target="_blank">
                                                                                                <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/file.png">
                                                                                                <?php echo $file['name']; ?>
                                                                                            </a>
                                                                                            
                                                                                                <i id="<?php echo $file['id'] ?>" class="bi bi-files" style="color:white; float: right; margin-right:12px;"></i>
                                                                                        </div>
                                                                                    </span>

                                                                                <?php } else {

                                                                                ?>
                                                                                    <span style="display: flex; align-items: center;" class="nav-link">
                                                                                        <div style="flex-grow: 1;">
                                                                                            <?php
                                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$name_file'");
                                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                                            ?>
                                                                                                <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:absolute;
                                                        top:-13px;
                                                        background: <?php echo $circlecolor; ?>" class="circle_color"></span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </div>
                                                                                        <a class="varun" style="color: white; margin-right: 150px;" href="<?php echo BASE_URL; ?>Library/openAdminPdfPage.php?pdfPageName=<?php echo $file['name']; ?>&fileID=<?php echo $name_file; ?>" data-bs-placement="bottom" title="<?php echo $file['name']; ?>"><?php echo substr($file['name'], 0, 5); ?></a>
                                                                                        <a style="display:none;" href="<?php echo BASE_URL; ?>Library/openAdminPdfPage.php?pdfPageName=<?php echo $file['name']; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white; float:right; margin-left:40px;top:-40px;left:120px;font-size:24px;"></i></a>
                                                                                        <a target="_blank" href="<?php echo BASE_URL ?>includes/Pages/files/<?php echo $file['name']; ?>"><i style="color:white; font-size:20px;" class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window"></i></a>
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
                                                                        $fileId = $brefData['id'];
                                                                    ?>
                                                                        <!-- <img style="height:20px; width:20px; margin-right: 10px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/file.png"> -->
                                                                        <?php
                                                                        if ($fileLastName == null) {
                                                                        ?>

                                                                            <span style="display: flex; align-items:center;" class="nav-link">
                                                                                <div style="flex-grow: 1;">
                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId'");
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                    ?>
                                                                                        <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:absolute;
                                                        top:-5px;
                                                        background: <?php echo $circlecolor; ?>" class="circle_color"></span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </div>

                                                                                <a class="varun44" style="color: white; margin-right: 150px; text-align: left;" href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $fileName; ?>&fileID=<?php echo $fileId; ?>" data-bs-placement="bottom" title="<?php echo $fileName; ?>">
                                                                                    <?php
                                                                                    echo substr($fileName, 0, 5);
                                                                                    ?>
                                                                                </a>


                                                                                <a style="display:none;" href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $fileName; ?>&fileID=<?php echo $fileId; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white; float:right; margin-left:40px;top:-40px;left:120px;font-size:24px;"></i></a>
                                                                                
                                                                                    <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $fileName; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="margin:5px; margin-top: 7px; color: white; font-size:20px;"></i></a>
                                                                            
                                                                                </a>
                                                                            </span>

                                                                            <!-- <a class="nav-link" style="color: blue;" href="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $fileName; ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $fileName; ?>"><?php echo $brefData['type']; ?></a></span> -->
                                                                        <?php
                                                                        } else if ($brefData['type'] == "offline") {
                                                                        ?>
                                                                            <span class="get_url_val aarchna nav-link" style="display:flex; align-items: center;">
                                                                                <div style="flex-grow: 1;position:relative;">
                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId'");
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                    ?>
                                                                                        <span style="color:white; margin: 5px; width: 19px;
                                                                                            height: 20px;
                                                                                            -webkit-border-radius: 25px;
                                                                                            -moz-border-radius: 25px;
                                                                                            border-radius: 25px;
                                                                                            position:absolute;
                                                                                            top:-16px;
                                                                                            background: <?php echo $circlecolor; ?>" class="circle_color">
                                                                                        </span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                                <a style="color: white;" class="copyLink" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $brefData['id'] ?>&fileName=<?php echo $fileName ?>">
                                                                                    <span style="position:relative;left:35px;"> <?php echo substr($fileLastName, 0, 5); ?></span>
                                                                                </a>


                                                                                <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                
                                                                                    <i id="<?php echo $brefData['id'] ?>" class="bi bi-files" style="color:white;"></i>

                                                                            </span>

                                                                        <?php
                                                                        } elseif ($brefData['type'] == "online") {
                                                                        ?>
                                                                            <span class="get_url_val nav-link aaayu" style="display:flex; align-items: center;">
                                                                            <?php
                                                                            $perColorQ = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId'");
                                                                            while ($perColor = $perColorQ->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $perColor['color']; ?>;margin-right:3px;"></div>
                                                                            <?php } ?>
                                                                                <div style="flex-grow: 1;">
                                                                                 
                                                                                    <?php
                                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId'");
                                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                                    ?>
                                                                                        <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:10px;
                                                        display:inline-block; 
                                                        background: <?php echo $circlecolor; ?>" class="usersOnlineLink"></span>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                    <a style="color: white;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $brefData['id'] ?>&fileName=<?php echo $fileName ?>">
                                                                                        <span><?php echo substr($brefData['type'], 0, 5); ?></span>
                                                                                    </a>


                                                                                    <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                                    <button class="btn btn-soft-primary btn-sm" style="margin-left:95px;" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                                        <i class="bi bi-files" style="color:white;"></i></button>
                                                                                </div>
                                                                            </span>

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
                                                                            <?php
                                                                            $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$bId'");
                                                                            while ($perColor = $perColorQ->fetch()) {
                                                                            ?>
                                                                                <div style="border-left: 3px solid <?php echo $perColor['color']; ?>;margin-right: 5px;"></div>
                                                                            <?php } ?>

                                                                            <span style="color:white;"><?php echo $editBData['pageName']; ?></span>
                                                                            <div style="display: inherit;position:absolute;right:55px;">
                                                                                <?php
                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$bId'");
                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                ?>
                                                                                    <span style="color:white; margin: 5px; width: 19px;
                                                                                    height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:absolute;
                                                        top:-5px;
                                                                                    background: <?php echo $circlecolor; ?>" class="circle_color"></span>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
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

                                            <input class="form-control" type="hidden" id="stud_db_id11" value="<?php echo $_SESSION['login_id'] ?>">
                                            <input class="form-control" type="hidden" id="fo_id" value="<?php echo $f_id ?>">
                                            <?php
                                            $userId = $_SESSION['login_id'];
                                            $query = $connect->query("SELECT * FROM user_briefcase WHERE user_id = '$userId' AND folderId = '$f_id'");
                                            while ($result = $query->fetch()) {
                                                $userbriefId = $result['id'];
                                            ?>
                                                <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                    <div id="navbarUsersMenuDiv">


                                                        <!-- Collapse -->
                                                        <div class="nav-item">
                                                            <a class="nav-link dropdown-toggle collapsed openBrief navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                echo $result['user_id']; ?>" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                                                                                                                                            echo $result['user_id']; ?>" aria-expanded="false" aria-controls="navbarCtpMenu" value="navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                                                                                                                                                                                                                                                    echo $result['user_id']; ?>">
                                                                <img style="height:20px; width:20px; margin-right: 10px;" src="/latest/TOS/assets/svg/phase2_white/briefcase.png" class="testFun">
                                                                <span style="color:white;"><?php echo $result['briefcase_name']; ?>
                                                                    <!-- <span style="margin:2px;font-size:22px;color:white;position:absolute;right:45px;top:2px;" data-bs-target="#addfiles" data-bs-toggle="modal" data-bs-placement="bottom" title="Add New File" name="<?php echo $userbriefId; ?>" value="0" class="addBreifFile"><i class="bi bi-folder-plus"></i></span> -->

                                                            </a>

                                                            <div class="dropdown addBreifFile" style="position: fixed;    z-index: 9;" name="<?php echo $userbriefId; ?>" value="0">
                                                                <button type="button" class="btn iconBtn " id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation="">
                                                                    <img style="height:20px; width:20px; margin-right: -110px; margin-top: -13px;" src="<?php echo BASE_URL ?>assets/svg/file/grey/file.png" data-bs-toggle="tooltip" data-bs-placement="right" title="Add Files"> </button>

                                                                <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem; position:absolute;top:2px;left:45px;">
                                                                    <!-- Header -->
                                                                    <div class="card-header card-header-content-between">
                                                                        <h4 class="card-title mb-0">Select Method</h4>
                                                                    </div>

                                                                    <!-- Body -->
                                                                    <div class="card-body-height">
                                                                        <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
                                                                            <option selected>Select File Method</option>
                                                                            <option value="addNewPage">New Page</option>
                                                                            <option value="addFile">Attachment</option>
                                                                            <option value="addFileLoca">Offline Link</option>
                                                                            <option value="addFileLink">Online Link</option>
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
                                                                                <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                    <option value="All instructor">Instructor Only</option>
                                                                                    <option value="Everyone" selected>Everyone</option>
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
                                                                                <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                                <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
                                                                                <div class="input-field">
                                                                                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Multiple Files Location</label>
                                                                                    <table class="table table-bordered" id="table-field">
                                                                                        <tr>
                                                                                            <td style="text-align: center;"><input type="text" placeholder="Location" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center;"><input type="text" placeholder="Location Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                                <center>
                                                                                    <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                                                                                    <br>
                                                                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                        <option value="All instructor">Instructor Only</option>
                                                                                        <option value="Everyone" selected>Everyone</option>
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
                                                                                <input type="hidden" name="briefCase_ID" class="briefCase_ID" value="<?php echo 0; ?>" />
                                                                                <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                                                                                <div class="input-field">
                                                                                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
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
                                                                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">

                                                                                        <option value="All instructor">Instructor Only</option>
                                                                                        <option value="Everyone" selected>Everyone</option>
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

                                                            <div style="background-color: rgb(235 12 235 / 23%);" id="navbarCtpMenu<?php echo $userbriefId;
                                                                                                                                        echo $result['user_id']; ?>" class="nav-collapse collapse fileDrop" data-bs-parent="#navbarUsersMenuDiv" hs-parent-area="#navbarVerticalMenuPagesEcommerceMenu">
                                                                <?php
                                                                $briefPageQuery = $connect->query("SELECT * FROM editor_data WHERE briefId = '$userbriefId'");
                                                                while ($briefData = $briefPageQuery->fetch()) {
                                                                    $breifId = $briefData['id'];
                                                                ?>
                                                                    <a id="userPage<?php echo $breifId; ?>" class="nav-link" style="color: white;border-left:2px solid <?php echo $briefData['color']; ?>;border-radius: 0px;" href="<?php echo BASE_URL ?>Library/pageData.php?bId=<?php echo $breifId; ?>&userBrief_ID=<?php echo $userbriefId; ?>">
                                                                        <?php
                                                                        $perColor1 = array();
                                                                        $perC = 0;
                                                                        $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$breifId'");
                                                                        while ($perColor = $perColorQ->fetch()) {

                                                                            if (!in_array($perColor['color'], $perColor1)) {
                                                                        ?>
                                                                                <div style="border-left: 3px solid <?php echo $perColor['color']; ?>;margin-right: 5px;"></div>
                                                                        <?php
                                                                            }
                                                                            $perColor1[$perC] = $perColor['color'];
                                                                            $perC++;
                                                                        } ?>
                                                                        <span><?php echo $briefData['pageName']; ?></span>
                                                                        <div style="position:absolute;display:inherit;right:55px;">
                                                                            <?php
                                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$breifId'");
                                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                                $circlecolor = $favColorData['favouriteColors'];
                                                                            ?>
                                                                                <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:absolute;
                                                        top:-5px;
                                                        background: <?php echo $circlecolor; ?>" class="circle_color"></span>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>

                                                                    </a>
                                                                <?php
                                                                }
                                                                ?>
                                                                <!-- <span style="color:white;cursor:pointer;" data-bs-toggle="modal" data-bs-target="#addfiles" onclick="document.getElementById('userfi_id').value='<?php echo $userbriefId; ?>'"></><u>Add New File</u></span><br>
                                                                <a href="<?php echo BASE_URL ?>Library/newPage.php?briefid=<?php echo $userbriefId; ?>" style="color:white"><u>Add New Page</u></a><br> -->
                                                                <?php
                                                                $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$userbriefId'");
                                                                while ($brefData = $fetchBrief->fetch()) {
                                                                    $fileID = $brefData['id'];
                                                                    $fileName = $brefData['filename'];
                                                                    $fileLastName = $brefData['lastName'];
                                                                ?>

                                                                    <?php
                                                                    if ($fileLastName == null) {
                                                                    ?>
                                                                        <span id="userLink<?php echo $fileID; ?>" style="display:flex; align-items:center;" class="nav-link">
                                                                        <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-right:10px; margin-left: -12px;"></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                            <div style="flex-grow: 1;">
                                                                                <?php
                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID'");
                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                ?>
                                                                                    <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:4px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="userfiles"></span>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                            <a class="archana" href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $brefData['filename']; ?>&fileID=<?php echo $fileID; ?>" style="color: white;" data-bs-placement="bottom" title="<?php echo $fileName; ?>">

                                                                                <span style="margin-left: -180px;"><?php echo substr($brefData['filename'], 0, 5); ?></span>
                                                                            </a>
                                                                            <a target="_blank" href="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $brefData['filename']; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white; margin:5px; font-size: larger;"></i></a>
                                                                        </span>
                                                                    <?php
                                                                    } else if ($brefData['type'] == "offline") {
                                                                    ?>
                                                                        <span id="userLink<?php echo $fileID; ?>" class="get_url_val nav-link test" style="display:flex; align-items:center;">
                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID'");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-left:-12px; margin-right: 10px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div style="flex-grow: 1;position:relative;">
                                                                                <?php
                                                                                $margin = 31;
                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID'");
                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                    $margin = 0;
                                                                                ?>
                                                                                    <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:10px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="userOffLineLink"></span>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                <a href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $brefData['id'] ?>&fileName=<?php echo $fileName ?>" style="color: white;margin-left: <?php echo $margin; ?>px;">
                                                                                    <span style="position:relative;left:-35px;"><?php echo $fileLastName; ?></span>
                                                                                </a>
                                                                            </div>

                                                                            <a style="display:none; color: white;" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            
                                                                                <i class="bi bi-files" style="color:white; font-size:18px; margin-right: 5px;" title="copy link" id="<?php echo $brefData['id'] ?>"></i>
                                                                            <!-- </div> -->
                                                                        </span>

                                                                    <?php
                                                                    } elseif ($brefData['type'] == "online") {
                                                                    ?>
                                                                        <span id="userLink<?php echo $fileID; ?>" class="get_url_val nav-link" style="display:flex; align-items:center;">
                                                                            <?php
                                                                            $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID'");
                                                                            while ($filePerData = $filePer->fetch()) {
                                                                            ?>
                                                                                <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-left: -12px;margin-right: 10px;"></div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div style="flex-grow: 1;">
                                                                                <?php
                                                                                $margin = 31;
                                                                                $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileID'");
                                                                                while ($favColorData = $fetchFavColor->fetch()) {
                                                                                    $circlecolor = $favColorData['favouriteColors'];
                                                                                    $margin = 0;
                                                                                ?>
                                                                                    <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:10px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="usersOnlineLink"></span>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                <a style="color:white;margin-left: <?php echo $margin; ?>px;" href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $brefData['id'] ?>&fileName=<?php echo $fileName ?>">
                                                                                    <span style="position:relative;margin-left:-35px;"><?php echo $brefData['type']; ?></span>
                                                                                </a>
                                                                            </div>

                                                                            <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                            
                                                                                <i id="<?php echo $brefData['id'] ?>" class="bi bi-files" style="color:white; font-size:18px; margin-right:5px;"></i>


                                                                        </span>

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
                                                $fileId = $brefData['id'];
                                                $fileName = $brefData['filename'];
                                                $fileLastName = $brefData['lastName'];
                                            ?>

                                                <?php
                                                if ($fileLastName == null) {
                                                ?>
                                                    <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show varunmsarii" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                        <div id="navbarUsersMenuDiv">
                                                            <span style="display:flex; align-items:center;" class="nav-link">
                                                                <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-right:3px;"></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <div style="flex-grow: 1;">
                                                                    <?php
                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId'");
                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                    ?>
                                                                        <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        display:inline-block;
                                                        top:4px;
                                                        background: <?php echo $circlecolor; ?>" class="userfiles"></span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>

                                                                <a class="ayushi" style="color: white;" href="<?php echo BASE_URL; ?>Library/openpdfpage.php?pdfPageName=<?php echo $brefData['filename']; ?>&fileID=<?php echo $fileId; ?>" data-bs-placement="bottom" title="<?php echo $fileName; ?>">
                                                                    <span style="margin-left: -170px;"><?php echo substr($brefData['filename'], 0, 5); ?></span>
                                                                </a>
                                                                <button class="btn btn-soft-primary" style="padding-left: 10px;padding-right: 10px;">
                                                                    <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $brefData['filename']; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white; margin:5px;"></i></a>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else if ($brefData['type'] == "offline") {
                                                ?>
                                                    <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show varunmsarii" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                        <div id="navbarUsersMenuDiv">
                                                            <span class="get_url_val nav-link" style="display:flex; align-items:center;">

                                                                <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-right:3px;"></div>
                                                                <?php
                                                                }
                                                                ?>

                                                                <div style="flex-grow: 1;">

                                                                    <?php
                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId'");
                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                    ?>
                                                                        <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        top:8px;
                                                        display:inline-block;
                                                        background: <?php echo $circlecolor; ?>" class="userOffLineLink"></span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <a href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $brefData['id'] ?>&fileName=<?php echo $fileName ?>" style="color: white;">

                                                                        <span style="margin-left: -75px;"><?php echo $fileLastName; ?></span>
                                                                    </a>
                                                                </div>


                                                                <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                <button style="margin-left: 100px;" class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                    <i class="bi bi-files" style="color:white;"></i></button>

                                                            </span>
                                                        </div>
                                                    </div>
                                                <?php
                                                } elseif ($brefData['type'] == "online") {
                                                ?>
                                                    <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show varunmsarii" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                        <div id="navbarUsersMenuDiv">
                                                            <span class="get_url_val nav-link" style="display:flex; align-items:center;">
                                                                <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:40px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-right:3px;"></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <div style="flex-grow: 1;">
                                                                    <?php
                                                                    $fetchFavColor = $connect->query("SELECT * FROM favouritefiles WHERE fileId = '$fileId'");
                                                                    while ($favColorData = $fetchFavColor->fetch()) {
                                                                        $circlecolor = $favColorData['favouriteColors'];
                                                                    ?>
                                                                        <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:relative;
                                                        display:inline-block;
                                                        top:10px;
                                                        background: <?php echo $circlecolor; ?>" class="usersOnlineLink"></span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <a href="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $brefData['id'] ?>&fileName=<?php echo $fileName ?>" style="color: white;">

                                                                        <span style="margin-left:-10px"><?php echo $brefData['type']; ?></span>
                                                                    </a>
                                                                </div>


                                                                <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a>
                                                                <button style="margin-left:100px;" class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $brefData['id'] ?>">
                                                                    <i class="bi bi-files" style="color:white;"></i></button>

                                                            </span>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                        <?php
                                        $folderPageQuery = $connect->query("SELECT * FROM editor_data WHERE folderId = '$f_id'");
                                        while ($folData = $folderPageQuery->fetch()) {
                                            $circlecolor = '';
                                            $pageId = $folData['id'];
                                            $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$pageId'");
                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                $circlecolor = $favColorData['favouriteColors'];
                                            }

                                        ?>

                                            <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse collapse show varunmsarii" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">

                                                <div id="navbarUsersMenuDiv">

                                                    <a class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $pageId; ?>" role="button" style="color:white;border-left:2px solid <?php echo $folData['color']; ?>;border-radius: 0px;">
                                                        <?php
                                                        $perColor1 = array();
                                                        $perC = 0;
                                                        $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$pageId'");
                                                        while ($perColor = $perColorQ->fetch()) {
                                                            if (!in_array($perColor['color'], $perColor1)) {
                                                        ?>
                                                                <div style="border-left: 3px solid <?php echo $perColor['color']; ?>;margin-right: 5px;"></div>
                                                        <?php }
                                                            $perColor1[$perC] = $perColor['color'];
                                                            $perC++;
                                                        } ?>

                                                        <span style=""><?php echo $folData['pageName']; ?></span>
                                                        <div style="display:inherit;position:absolute;right: 55px;">
                                                            <?php
                                                            $fetchFavColor = $connect->query("SELECT * FROM favouritepages WHERE pageId = '$pageId'");

                                                            while ($favColorData = $fetchFavColor->fetch()) {
                                                                $circlecolor = $favColorData['favouriteColors'];
                                                            ?>
                                                                <span style="color:white; margin: 5px; width: 19px;
                                                        height: 20px;
                                                        -webkit-border-radius: 25px;
                                                        -moz-border-radius: 25px;
                                                        border-radius: 25px;
                                                        position:absolute;
                                                        top:-5px;
                                                        background: <?php echo $circlecolor; ?>" class="circle_color"></span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
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
                            <?php
                            if ($_SESSION['role'] == 'super admin' || $_SESSION['role'] == 'instructor') {
                            ?>
                                <hr>
                                <a href="<?php echo BASE_URL; ?>Library/alldetails.php" class="nav-link" style="color:white" id="pageBtn">All Details</a>
                            <?php
                            }
                            ?>
                            <hr>
                            <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php" class="nav-link" style="color:white;">Grid View</a>
                        </div>
                        <!-- End Content -->

                       

                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav" style="margin-top: -30px;">




                        <div class="navbar-vertical-footer fixed" style="margin-bottom: 10px;">

                            <center>
                                <?php
                                $back = "";
                                if ($role == "super admin") {
                                    $back = "background-color:#c32e2e;color:white;";
                                }
                                if ($role == "instructor") {
                                    $back = "background-color:#c3b02e;color:white";
                                }
                                if ($role == "student") {
                                    $back = "background-color:green;color:white";
                                }
                                ?>
                                <h6 style="<?php echo $back ?>"><?php

                                                                echo $role; ?></h6>
                            </center>

                            <hr style="color:black; margin-top:-5px;">
                            <ul class="navbar-vertical-footer-list" style="margin-top:-30px; margin-bottom:-10px;">
                                <li class="navbar-vertical-footer-list-item">
                                    <!-- Style Switcher -->
                                    <div class="dropdown dropup">
                                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-square" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                            <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:15px; width: 15px; margin: 3px;">
                                        </button>

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown">
                                            <span class="dropdown-header">Apps</span>
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
                                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
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
                                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
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


    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== SECONDARY CONTENTS ========== -->

    <!-- Activity -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivityStream" aria-labelledby="offcanvasActivityStreamLabel" style="width:20%;">
        <div class="offcanvas-header">

            <h4 id="offcanvasActivityStreamLabel" class="mb-0">Status</h4>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <!-- Step -->

        </div>
    </div>
    <!-- End Activity -->

    <!-- Welcome Message Modal -->
    <div class="modal fade" id="welcomeMessageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-close">
                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi-x-lg"></i>
                    </button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body p-sm-5">
                    <div class="text-center">
                        <div class="w-75 w-sm-50 mx-auto mb-4">
                            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/svg/illustrations/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="default">
                            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/svg/illustrations-light/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="dark">
                        </div>

                        <h4 class="h1">Welcome to Front</h4>

                        <p>We're happy to see you in our community.</p>
                    </div>
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer d-block text-center py-sm-5">
                    <small class="text-cap text-muted">Trusted by the world's best teams</small>

                    <div class="w-85 mx-auto">
                        <div class="row justify-content-between">
                            <div class="col">
                                <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/svg/brands/gitlab-gray.svg" alt="Image Description">
                            </div>
                            <div class="col">
                                <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/svg/brands/fitbit-gray.svg" alt="Image Description">
                            </div>
                            <div class="col">
                                <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/svg/brands/flow-xo-gray.svg" alt="Image Description">
                            </div>
                            <div class="col">
                                <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/svg/brands/layar-gray.svg" alt="Image Description">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>



   
   
   
    <!-- End Welcome Message Modal -->
    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- JS Global Compulsory  -->
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
        });
    </script>


    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            $(document).on("click", ".noti_anchor", function() {
                var id = $(this).attr('id');
                $("#get_noti_id").val(id);

                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: 'update_noti.php',
                        data: 'id=' + id,
                        success: function(response) {
                            var got_id = $("#get_ac_class_id").val(response);


                        }
                    });
                }


            });
            $(document).on("click", ".get_id_of_noti", function() {
                var id = $(this).attr('id');

                $("#get_id_on_view").val(id);

                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: 'fetch_msg.php',
                        data: 'id=' + id,
                        success: function(response) {
                            $('#get_msg').empty();
                            $("#get_msg").append(response);
                        }
                    });
                }

                $(document).on("click", ".fetch_course_data", function() {

                    var courseid = $("#Course_id").val();

                    alert(courseid);
                    if (courseid) {
                        $.ajax({
                            type: 'POST',
                            url: 'check_available_Student.php',
                            data: 'courseid=' + courseid,
                            success: function(response) {
                                // alert(response);
                                // window.location.reload();
                            }
                        });
                    }
                });



            });
            $(document).on("click", "#read_all_noti", function() {
                var id = $("#user_id_val").val();

                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: 'mark_read.php',
                        data: 'id=' + id,
                        success: function(response) {
                            alert("Marked all read");
                            window.location.reload();

                        }
                    });
                }

            });
            $(document).on("click", "#read_all_noti_admin", function() {
                var id = $("#user_id_val").val();
                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: 'mark_read_admin.php',
                        data: 'id=' + id,
                        success: function(response) {
                            alert("Marked all read");
                            window.location.reload();


                        }
                    });
                }

            });

            $(document).on("click", "#accept_acdemic", function() {
                //alert("hello");
                var id = $("#get_noti_id").val();
                $("#get_noti_ides").val(id);
                $("#get_ac_class_ide").val($("#get_ac_class_id").val());
                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: 'fetch_student_acedemic.php',
                        data: 'id=' + id,
                        success: function(response) {
                            //alert(response);
                            $('#student_fetch tbody').empty();
                            $("#student_fetch tbody").append(response);

                        }
                    });
                }
            });
            $("#txt_search").keyup(function() {
                var search = $(this).val();
                // alert(search);
                if (search != "") {

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BASE_URL; ?>includes/Pages/getSearch.php',
                        data: 'search=' + search,
                        success: function(response) {

                            $('.searchResult').empty();
                            $('.searchResult').append(response);

                        }
                    });
                } else {
                    $('.searchResult').empty();
                }


            });
            $(document).on("click", ".got_result", function() {
                var text = $(this).text();

                var get_ids = $(this).val();

                $("#txt_search").val(text);

                $('#get_id_select').attr('value', get_ids);
                $('.searchResult').empty();
            });



            $(document).on("keyup", ".reg_studid_head", function() {
                var check = $(this).val();

                if (check) {
                    $.ajax({
                        type: 'POST',
                        url: 'check_id.php',
                        data: 'check=' + check,
                        success: function(response) {
                            $('.get_val_res').empty();
                            $(".get_val_res").append(response);
                        }
                    });
                }
            });
            // INITIALIZATION OF DATERANGEPICKER
            // =======================================================
            $('.js-daterangepicker').daterangepicker();

            $('.js-daterangepicker-times').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });

            var start = moment();
            var end = moment();

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
            }

            $('#js-daterangepicker-predefined').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);
        });
    </script>

    <!-- JS Plugins Init. -->
    <script>
        (function() {
            window.onload = function() {


                // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                // =======================================================
                new HSSideNav('.js-navbar-vertical-aside').init()


                // INITIALIZATION OF NAV SCROLLER
                // =======================================================
                new HsNavScroller('.js-nav-scroller', {
                    delay: 400
                })


                // INITIALIZATION OF FORM SEARCH
                // =======================================================
                new HSFormSearch('.js-form-search')


                // INITIALIZATION OF BOOTSTRAP DROPDOWN
                // =======================================================
                HSBsDropdown.init()


                // INITIALIZATION OF CHARTJS
                // =======================================================
                var updatingChartDatasets = [
                    [
                        [18, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70],
                        [27, 38, 60, 77, 40, 50, 49, 29, 42, 27, 42, 50]
                    ],
                    [
                        [77, 40, 50, 49, 27, 38, 60, 42, 50, 29, 42, 27],
                        [60, 38, 18, 51, 88, 50, 40, 52, 60, 70, 88, 80]
                    ]
                ]


                // INITIALIZATION OF CHARTJS
                // =======================================================
                HSCore.components.HSChartJS.init(document.querySelector('#updatingLineChart'), {
                    data: {
                        datasets: [{
                                data: updatingChartDatasets[0][0]
                            },
                            {
                                data: updatingChartDatasets[0][1]
                            }
                        ]
                    }
                })

                const updatingLineChart = HSCore.components.HSChartJS.getItem(0)

                // Call when tab is clicked
                document.querySelectorAll('[data-bs-toggle="chart"]')
                    .forEach($item => {
                        $item.addEventListener('click', e => {
                            let keyDataset = e.currentTarget.getAttribute('data-datasets')

                            // Update datasets for chart
                            updatingLineChart.data.datasets.forEach((dataset, key) => {
                                dataset.data = updatingChartDatasets[keyDataset][key];
                            });
                            updatingLineChart.update();
                        })
                    })


                // INITIALIZATION OF CHARTJS
                // =======================================================
                HSCore.components.HSChartJS.init(document.querySelector('.js-chartjs-doughnut-half'), {
                    options: {
                        tooltips: {
                            postfix: "%"
                        },
                        cutoutPercentage: 85,
                        rotation: Math.PI,
                        circumference: Math.PI
                    }
                });


                // INITIALIZATION OF VECTOR MAP
                // =======================================================
                const markers = [{
                        "coords": [38, -97],
                        "name": "United States",
                        "active": 200,
                        "new": 40,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/us.svg",
                        "code": "US"
                    },
                    {
                        "coords": [20, 77],
                        "name": "India",
                        "active": 300,
                        "new": 100,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/in.svg",
                        "code": "IN"
                    },
                    {
                        "coords": [60, -105],
                        "name": "Canada",
                        "active": 400,
                        "new": 500,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/ca.svg",
                        "code": "CA"
                    },
                    {
                        "coords": [51, 9],
                        "name": "Germany",
                        "active": 120,
                        "new": 600,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/de.svg",
                        "code": "DE"
                    },
                    {
                        "coords": [54, -2],
                        "name": "United Kingdom",
                        "active": 140,
                        "new": 100,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/gb.svg",
                        "code": "GB"
                    },
                    {
                        "coords": [1.3, 103.8],
                        "name": "Singapore",
                        "active": 56,
                        "new": 0,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/sg.svg",
                        "code": "SG"
                    },
                    {
                        "coords": [9.0, 8.6],
                        "name": "Nigeria",
                        "active": 34,
                        "new": 2,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/ng.svg",
                        "code": "NG"
                    },
                    {
                        "coords": [61.5, 105.3],
                        "name": "Russia",
                        "active": 135,
                        "new": 46,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/ru.svg",
                        "code": "RU"
                    },
                    {
                        "coords": [35.8, 104.1],
                        "name": "China",
                        "active": 325,
                        "new": 75,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/cn.svg",
                        "code": "CN"
                    },
                    {
                        "coords": [-10, -51],
                        "name": "Brazil",
                        "active": 242,
                        "new": 17,
                        "flag": "<?php echo BASE_URL; ?>assets/vendor/flag-icon-css/flags/1x1/br.svg",
                        "code": "BR"
                    }
                ];
                const tooltipTemplate = function(marker) {
                    return `
          <span class="d-flex align-items-center mb-2">
            <img class="avatar avatar-xss avatar-circle" src="${marker.flag}" alt="Flag">
            <span class="h5 ms-2 mb-0">${marker.name}</span>
          </span>
          <div class="d-flex justify-content-between" style="max-width: 10rem;">
            <strong>Active:</strong>
            <span class="ms-2">${marker.active}</span>
          </div>
          <div class="d-flex justify-content-between" style="max-width: 10rem;">
            <strong>New:</strong>
            <span class="ms-2">${marker.new}</span>
          </div>
        `;
                };

                HSCore.components.HSJsVectorMap.init('.js-jsvectormap', {
                    markers,
                    onRegionTooltipShow(tooltip, code) {
                        let marker = markers.find(function(marker) {
                            return marker.code === code;
                        });

                        if (marker) {
                            tooltip.selector.innerHTML = tooltipTemplate(marker);
                        } else {
                            tooltip.selector.style.display = 'none';
                        }
                    },
                    onMarkerTooltipShow: function(tooltip, code) {
                        tooltip.selector.innerHTML = tooltipTemplate(markers[code]);
                    },
                    backgroundColor: HSThemeAppearance.getAppearance() === 'dark' ? '#25282a' : '#132144'
                })

                const vectorMap = HSCore.components.HSJsVectorMap.getItem(0)

                window.addEventListener('on-hs-appearance-change', e => {
                    vectorMap.setBackgroundColor(e.detail === 'dark' ? '#25282a' : '#132144')
                })
            }
        })()
    </script>

    <!-- Style Switcher JS -->

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

    <script>
        $(document).ready(function() {
            var get_id = sessionStorage.getItem('set_id');
            $('#set_ctp').val(get_id);
            $('#set_ctp').on('change', function() {
                var get_val = $(this).val();
                sessionStorage.setItem('set_id', get_val);
                document.cookie = "fixed_ctp_id = " + get_val;
                window.location.href = 'Next-home.php';
                // window.location.reload();
            });
            //set value for first dropdown on page change
            var course = sessionStorage.getItem('id');
            $('#course').val(course);
            //set value of javascript to php variable

            //on change of course dropdown send value to selec_std.php and fetch value
            $('#course').on('change', function() {

                var countryID = $(this).val();
                var class1 = $(this).children(":selected").attr("class");
                // alert(countryID);
                if (countryID) {
                    sessionStorage.setItem('id', countryID);
                    document.cookie = "phpgetcourse2 = " + class1;
                    document.cookie = "course_id = " + countryID;
                    window.location.reload();
                }

            });

            //onchange of second dropdown select dynamic value from selec.php
            // $('#state').on('change', function(){

            //   var studentname = $(this).val();
            // //  console.log(studentname);   
            //     if(studentname){

            //       sessionStorage.setItem('student',studentname);
            //       document.cookie = "student = " + studentname;
            //       var getUrl =window.location;
            //           var baseUrl =getUrl.pathname.split('/')[4];

            //             if(baseUrl=="gradesheet.php"){
            //               window.location.href = 'actual.php';
            //             }else{
            //              window.location.reload();
            //             }
            //       }
            // });
            // //set value of selected student in javascript session
            // var getstudent = sessionStorage.getItem('student');
            // $('#state').val(getstudent);


        });
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
    <!-- End Style Switcher JS -->

    <script>
        function course() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("newcoursesearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("newcoursetable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <!--search bar for vehicle table-->
    <script>
        function vehiclehead() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("vehicleheadsearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("vehicletablehead");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <!--search bar for courselist table-->
    <script>
        function vehiclecatehead() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("vehiclecateheadsearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("vehiclecatetablehead");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <!--search bar for deparment list table-->
    <script>
        function departmenthead() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("departmentsearchhead");
            filter = input.value.toUpperCase();
            table = document.getElementById("departmenttablehead");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <!--search bar for ctp list table-->
    <script>
        function ctp() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("ctpsearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("ctptable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script>
        $('.select2').select2();
    </script>

</body>

</html>