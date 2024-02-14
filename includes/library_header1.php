<?php
include(ROOT_PATH . 'includes/connect.php');
// for fetching ctp name 
$name_of_ctp = "";
$symbol_name = "";
$course_nickname = "";
$fetch_class_value = "";
$class_name = "";
$std_course1 = " ";
$fetchnickname = "";
$CourseCode11 = "";
$Coursename11 = "";
$pic_department = "";

$department_Id = "";
if (isset($_SESSION['department_Id'])) {
    $department_Id = $_SESSION['department_Id'];
} else {
    $department_Id = $_SESSION['inst_id'];
}

$output2 = "";
$query2 = "SELECT * FROM ctppage  ORDER BY CTPid ASC";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if ($statement2->rowCount() > 0) {
    $result2 = $statement2->fetchAll();

    foreach ($result2 as $row2) {
        $output2 .= '<option value="' . $row2['CTPid'] . '">' . $row2['course'] . '</option>';
    }
}


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
    $error = "<div class='alert alert-danger'>Please Login Again</div>";
    header("Location:../../index.php?error=" . $error . "");
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

if ($prof_pic != "") {


    $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
        $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
    } else {
        $pic = BASE_URL . 'includes/Pages/avatar/avtar.png';
    }
}



$icon = "";
include ROOT_PATH . 'includes/Pages/allnotification.php';

?>

<!-- for fetching vehicle type -->
<?php
$vehcate = "";
$cate = "SELECT * FROM vehicletype ORDER BY vehid ASC";
$state = $connect->prepare($cate);
$state->execute();
if ($state->rowCount() > 0) {
    $ans = $state->fetchAll();
    foreach ($ans as $r) {
        $vehcate .= '<option value="' . $r['vehid'] . '">' . $r['vehicletype'] . '</option>';
    }
}

// fetching phase manager

$pm = "";
$q2 = "SELECT * FROM users where role='Phase Manager'";
$st2 = $connect->prepare($q2);
$st2->execute();

if ($st2->rowCount() > 0) {
    $re2 = $st2->fetchAll();
    foreach ($re2 as $row2) {
        $pm .= '<option value="' . $row2['name'] . '">' . $row2['name'] . '</option>';
    }
}

// fetching course manager

$cm = "";
$q3 = "SELECT * FROM users where role='course manager'";
$st3 = $connect->prepare($q3);
$st3->execute();

if ($st3->rowCount() > 0) {
    $re3 = $st3->fetchAll();
    foreach ($re3 as $row3) {
        $cm .= '<option value="' . $row3['id'] . '">' . $row3['name'] . '</option>';
    }
}

// for fetching student

$std = "";
$q4 = "SELECT * FROM users where role='student'";
$st4 = $connect->prepare($q4);
$st4->execute();

if ($st4->rowCount() > 0) {
    $re4 = $st4->fetchAll();
    foreach ($re4 as $row4) {
        $std .= '<option value="' . $row4['id'] . '">' . $row4['name'] . '</option>';
    }
}

// student fetching for message

$stu_msg = "";
$q_st = "SELECT * FROM users where role='student'";
$st_st = $connect->prepare($q_st);
$st_st->execute();

if ($st_st->rowCount() > 0) {
    $re4_st = $st_st->fetchAll();
    foreach ($re4_st as $row) {
        $stu_msg .= '<option value="' . $row['id'] . '">' . $row['name'] . ' - ' . $row['role'] . '</option>';
    }
}

// instructor fetching for message

$in_msg = "";
$q_in = "SELECT * FROM users where role='instructor' or role='instructors'";
$st_in = $connect->prepare($q_in);
$st_in->execute();

if ($st_in->rowCount() > 0) {
    $re4_in = $st_in->fetchAll();
    foreach ($re4_in as $row) {
        $in_msg .= '<option value="' . $row['id'] . '">' . $row['name'] . ' - ' . $row['role'] . '</option>';
    }
}

// admin fetching for message
$ad_msg = "";
$q_ad = "SELECT * FROM users where role='super admin'";
$st_ad = $connect->prepare($q_ad);
$st_ad->execute();

if ($st_ad->rowCount() > 0) {
    $re4_ad = $st_ad->fetchAll();
    foreach ($re4_ad as $row) {
        $ad_msg .= '<option value="' . $row['id'] . '">' . $row['name'] . ' - ' . $row['role'] . '</option>';
    }
}

// phase manager fetched for message

$ph_msg = "";
$q_ph = "SELECT * FROM users where role='phase manager'";
$st_ph = $connect->prepare($q_ph);
$st_ph->execute();

if ($st_ph->rowCount() > 0) {
    $re4_ph = $st_ph->fetchAll();
    foreach ($re4_ph as $row) {
        $ph_msg .= '<option value="' . $row['id'] . '">' . $row['name'] . ' - ' . $row['role'] . '</option>';
    }
}

// course manager fetched for message

$cs_msg = "";
$q_cs = "SELECT * FROM users where role='course manager'";
$st_cs = $connect->prepare($q_cs);
$st_cs->execute();

if ($st_cs->rowCount() > 0) {
    $re4_cs = $st_cs->fetchAll();
    foreach ($re4_cs as $row) {
        $cs_msg .= '<option value="' . $row['id'] . '">' . $row['name'] . ' - ' . $row['role'] . '</option>';
    }
}

if ($_SESSION['role'] != 'super admin') {
    $user_id = $_SESSION['login_id'];
    $query = "SELECT a.*
    FROM alerttable AS a
    LEFT JOIN alertreply AS r ON a.id = r.alert_id AND r.user_id = $user_id
    WHERE r.alert_id IS NULL AND (a.reciever_user_id = $user_id )";
    $statement = $connect->prepare($query);
    $statement->execute();
    $alert_data_re = $statement->fetchAll();
}
if ($_SESSION['role'] != 'super admin') {
    $user_id = $_SESSION['login_id'];
    $query = "SELECT a.*
    FROM alerttable AS a
    LEFT JOIN alertreply AS r ON a.id = r.alert_id AND r.user_id = $user_id 
    WHERE r.alert_id IS NULL AND a.permission = 'Everyone'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $alert_datae = $statement->fetchAll();
}
if ($_SESSION['role'] != 'super admin') {
    $alert_role = $_SESSION['role'];
    $user_id = $_SESSION['login_id'];
    $query = "SELECT a.*
    FROM alerttable AS a
    LEFT JOIN alertreply AS r ON a.id = r.alert_id AND r.user_id = $user_id 
    WHERE r.alert_id IS NULL AND a.permission = '$alert_role'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $alert_data = $statement->fetchAll();
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

    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="dark" as="style">
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme-dark.min.css" data-hs-appearance="default" as="style">

    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;

        }
    </style>

    <style type="text/css">
        body {
           background-image: url('<?php echo BASE_URL; ?>assets/svg/doodle/bglight3.png');
        }

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

        .zoom-popup {
            position: absolute;
            top: 0;
            left: 0;
            width: 200px;
            height: 200px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.3s;
            z-index: 9;
        }

        /* Show the popup image when hovering over the container */
        .image-container:hover .zoom-popup {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .zoom-popup1 {
            position: absolute;
            top: 0;
            left: 0;
            width: 200px;
            height: 200px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.3s;
            z-index: 9;
        }

        /* Show the popup image when hovering over the container */
        .image-container1:hover .zoom-popup1 {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .offcanvas-end.wide-offcanvas {
            width: 70%;
        }

        .navbar-vertical-content {
            height: calc(100% - 14.975rem) !important;
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
    <?php
    include ROOT_PATH . 'includes/message.php';
    displayMSG();
    ?>
    <?php
    include ROOT_PATH . 'includes/alert_for_users.php';
    ?>

    <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
        <div class="navbar-nav-wrap">
            <!-- Logo -->

            <?php
            if ($_SESSION['role'] != 'super admin') {
                $coutDep = $connect->query("SELECT count(*) FROM userdepartment WHERE userId = '$user_id'");
                $coutDepData = $coutDep->fetchColumn();
                if ($coutDepData > 1) {
                    $depModal = "#departmentall";
                } else {
                    $depModal = "";
                }
            } else {
                $depModal = "#departmentall";
            }
            ?>

            <?php
            $mainD = $connect->query("SELECT department_name FROM main_department WHERE id = '$institute'");
            $mainDName = $mainD->fetchColumn();
            $mainDImg = $connect->query("SELECT file_name FROM main_department WHERE id = '$institute'");
            $mainDImgData = $mainDImg->fetchColumn();
            if ($mainDImgData != "") {
                $pic1111 = BASE_URL . 'includes/Pages/department/' . $mainDImgData;
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1111)) {
                    $pic1111 = BASE_URL . 'includes/Pages/department/' . $mainDImgData;
                } else {
                    $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }
            } else {
                $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
            if (isset($_SESSION['department_NAME'])) {
            ?>
                <a class="navbar-brand">
                    <div class="avatar avatar-sm avatar-circle">
                        <div class="image-container">
                            <img style=" margin-left: -5px;position:absolute;left:-10px" class="avatar" src="<?php echo $pic1111; ?>" alt="Logo">
                            <div class="zoom-popup">
                                <img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                            </div>
                        </div>
                        <div class="image-container1">
                            <img style=" margin-left: -5px;position:absolute;left:-2px" class="avatar" src="<?php echo $pic_department; ?>" alt="Logo">
                            <div class="zoom-popup1">
                                <img src="<?php echo $pic_department; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                            </div>
                        </div>
                    </div>

                    <span class="nav-link-title" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $_SESSION['department_NAME']; ?>" style="cursor: pointer;font-weight:bolder;color:#7901c1;">
                        <span onclick="window.location.href='<?php echo BASE_URL; ?>Library/index.php';"><?php echo $mainDName; ?>/<?php echo $_SESSION['department_NAME']; ?> </span>
                        <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><i class="bi bi-caret-down text-dark"></i></span>
                    </span>

                </a>


            <?php
            } else {
                if ($_SESSION['role'] != 'super admin') {
                    $lastDepartQ = $connect->query("SELECT departmentId
                    FROM userdepartment
                    WHERE userId = '$user_id'
                    ORDER BY departmentId DESC
                    LIMIT 1;");
                    $lastDepartId = $lastDepartQ->fetchColumn();
                    if ($lastDepartId !== false) {
                        $departMentQ = $connect->query("SELECT * FROM homepage WHERE id = '$lastDepartId'");
                        while ($departmentdata = $departMentQ->fetch()) {
                            $department = $departmentdata['department_name'];
                            $departmentId = $departmentdata['id'];
                        }
                    } else {
                        $department = "Not in Department";
                    }
                }
            ?>
                <a class="navbar-brand">
                    <div class="avatar avatar-sm avatar-circle">
                        <div class="image-container">
                            <img style=" margin-left: -5px;position:absolute;left:-10px" class="avatar" src="<?php echo $pic1111; ?>" alt="Logo">
                            <div class="zoom-popup">
                                <img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                            </div>
                        </div>
                        <div class="image-container1">
                            <img style=" margin-left: -5px;position:absolute;left:-2px" class="avatar" src="<?php echo $pic_department; ?>" alt="Logo">
                            <div class="zoom-popup1">
                                <img src="<?php echo $pic_department; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                            </div>
                        </div>
                    </div>
                    <span class="nav-link-title" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;color:#7901c1;">
                        <?php if (isset($department)) {
                        ?>

                            <span onclick="window.location.href='<?php echo BASE_URL; ?>Library/index.php';"><?php echo $mainDName; ?>/<?php echo $_SESSION['department_NAME']; ?> </span>
                            <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><i class="bi bi-caret-down text-dark"></i></span>
                        <?php
                        }
                        ?>
                    </span>

                </a>
            <?php } ?>

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
                        <div class="search-container">

                            <button style="font-size:x-large;" data-bs-placement="bottom" title="Search" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                                <a data-bs-toggle="modal" data-bs-target="#SearchModalAll">
                                    <img src="<?php echo BASE_URL; ?>assets/svg/search/search1.png" style="height: 35px;width: 35px;margin: 5px;"></a>
                            </button>

                            <div id="searchInputContainer" class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group d-none">

                                <a class="input-group-append input-group-text" href="javascript:;">
                                    <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- End Search Form -->
            </div>

            <div class="navbar-nav-wrap-content-end">
                <!-- Navbar -->
                <ul class="navbar-nav">

                    <li class="nav-item d-none">
                        <button style="font-size:xx-large;" data-bs-toggle="modal" data-bs-target="#MenuMegaMenuModal" data-bs-placement="bottom" title="menu" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a style="color: #71869d;">
                                <i class="bi bi-list"></i>
                            </a>
                        </button>
                    </li>
                    <?php
                    if ($_SESSION['role'] == 'instructor') {
                    ?>
                        <li class="nav-item">
                            <button style="font-size:x-large;" data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                                <a href="<?php echo BASE_URL ?>includes/Pages/Home.php" style="color: #71869d;">
                                    <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/home_1.png" style="height:30px; width: 30px; margin: 3px;"></a>
                            </button>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <button style="font-size:x-large;" data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                                <a href="<?php echo BASE_URL ?>includes/Pages/Home.php" style="color: #71869d;">
                                    <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/home_1.png" style="height:30px; width: 30px; margin: 3px;"></a>
                            </button>
                        </li>
                    <?php
                    }
                    ?>
                    <div style="display:flex;">
                        <li class="nav-item"><?php include(ROOT_PATH . "Library/libraryMenuFiles.php"); ?></li>
                        <li class="nav-item btn btn-soft-secondary d-none" data-bs-toggle="modal" data-bs-target="#MainLibraryModal" style="margin: 5px;margin-top: 10px;">
                            <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height: 20px;margin-top: -5px;">
                            <!-- <span class="text-truncate" style="font-size: large;color: #7901c1;">Main</span> -->
                        </li>
                    </div>


                    <li class="nav-item">
                        <div class="form-check form-switch" data-bs-placement="bottom" title="Disable Swap Window" type="button" style="top:5px;">
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

                    <li class="nav-item" style="display:none;">
                        <button style="font-size:x-large; margin-right: -10px;" data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>includes/Pages/Home.php" style="color: #71869d;">
                                <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/home_1.png" style="height:30px; width: 30px; margin: 3px;"></a>
                        </button>
                    </li>




                    <!-- <li class="nav-item">
                        <button data-bs-placement="bottom" title="Disable Swap Window" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>Library/index.php" target="_blank" style="color: #71869d;">
                                <i class="bi bi-info-circle"></i></a>
                        </button>

                    </li> -->
                    <?php
                    if ($_SESSION['role'] == "super admin") {
                    ?>
                        <li class="nav-item">
                            <button data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                                <a href="<?php echo BASE_URL ?>Library/dashboard_library.php" style="color: #71869d;">
                                    <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/dashboard2.png" style="height:28px; width: 25px; margin: 3px;">
                                </a>
                            </button>

                        </li>
                    <?php } ?>

                    <li class="hs-has-mega-menu nav-item">
                        <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo BASE_URL; ?>assets/svg/menuicon/menu1.png" style="height: 30px;"></a>

                        <!-- Mega Menu -->
                        <div class="hs-mega-menu dropdown-menu bg-light" aria-labelledby="landingsMegaMenu" style="width:1000px; margin-left:200px;">
                            <div class="navbar-dropdown-menu-promo">
                                <!-- Promo Item -->

                                <div class="navbar-dropdown-menu-promo-item">
                                    <!-- Promo Link -->
                                    <?php if (!isset($_SESSION['permission']) || $permission['actual'] == "1") { ?>
                                        <a class="navbar-dropdown-menu-promo-link " href="<?php echo BASE_URL; ?>Library/favouriteData.php">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <span class="svg-icon svg-icon-sm text-primary">
                                                        <img style="height:30px; width:30px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/actions/white/favourite_1.png">
                                                    </span>
                                                </div>

                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Favorite</span>

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
                                                        <!-- <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>"> -->
                                                    </span>
                                                </div>

                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title text-dark" style="font-size: large;margin: 5px;">Shelve</span>

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

                    <li class="nav-item d-none">
                        <!-- message -->

                        <?php include ROOT_PATH . 'includes/Pages/message_tab.php'; ?>
                        <!-- End message -->
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->

                        <?php include ROOT_PATH . 'includes/Pages/notification_tab.php'; ?>
                        <!-- End Notification -->
                    </li>

                    <li class="nav-item">
                        <!-- Notification -->

                        <?php include ROOT_PATH . 'includes/Pages/calendar_tab.php'; ?>
                        <!-- End Notification -->
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


                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Activity -->
                        <button style="font-size:x-large;" class="btn btn-ghost-secondary btn-icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivityStream11" aria-controls="offcanvasActivityStream11">
                            <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/alert_2.png" style="height: 30px;">
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

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->

    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">

                <?php
                $profile_department = $connect->query("SELECT file_name FROM homepage WHERE id = '$department_Id'");
                $prof_pic_dep = $profile_department->fetchColumn();
                if ($prof_pic_dep != "") {


                    $pic_department = BASE_URL . 'includes/Pages/department/' . $prof_pic_dep;
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic_department)) {
                        $pic_department = BASE_URL . 'includes/Pages/department/' . $prof_pic_dep;
                    } else {
                        $pic_department = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
                } else {
                    $pic_department = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }

                ?>

                <?php

                if (isset($_SESSION['department_NAME'])) {
                ?>
                    <a class="navbar-brand">
                        <div class="avatar avatar-sm avatar-circle">
                            <div class="image-container">
                                <img style=" margin-left: -5px;position:absolute;left:-10px" class="avatar" src="<?php echo $pic1111; ?>" alt="Logo">
                                <div class="zoom-popup">
                                    <img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                                </div>
                            </div>
                            <div class="image-container1">
                                <img style=" margin-left: -5px;position:absolute;left:-2px" class="avatar" src="<?php echo $pic_department; ?>" alt="Logo">
                                <div class="zoom-popup1">
                                    <img src="<?php echo $pic_department; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                                </div>
                            </div>
                        </div>
                        <span class="nav-link-title" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;color:#7901c1;">
                            <span onclick="window.location.href='<?php echo BASE_URL; ?>Library/index.php';"><?php echo $mainDName; ?>/<?php echo $_SESSION['department_NAME']; ?> </span>
                            <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><i class="bi bi-caret-down text-dark"></i></span>
                        </span>

                    </a>
                <?php
                } else {
                ?>
                    <?php
                    if ($_SESSION['role'] != 'super admin') {
                        $lastDepartQ = $connect->query("SELECT departmentId
        FROM userdepartment
        WHERE userId = '$user_id'
        ORDER BY departmentId DESC
        LIMIT 1;");
                        $lastDepartId = $lastDepartQ->fetchColumn();
                        if ($lastDepartId !== false) {
                            $departMentQ = $connect->query("SELECT * FROM homepage WHERE id = '$lastDepartId'");
                            while ($departmentdata = $departMentQ->fetch()) {
                                $department = $departmentdata['department_name'];
                                $departmentId = $departmentdata['id'];
                            }
                        } else {
                            $department = "Not In Department";
                        }
                    }
                    ?>
                    <a class="navbar-brand">
                        <div class="avatar avatar-sm avatar-circle">
                            <div class="image-container">
                                <img style=" margin-left: -5px;position:absolute;left:-10px" class="avatar" src="<?php echo $pic1111; ?>" alt="Logo">
                                <div class="zoom-popup">
                                    <img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                                </div>
                            </div>
                            <div class="image-container1">
                                <img style=" margin-left: -5px;position:absolute;left:-2px" class="avatar" src="<?php echo $pic_department; ?>" alt="Logo">
                                <div class="zoom-popup1">
                                    <img src="<?php echo $pic_department; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                                </div>
                            </div>
                        </div>
                        <span class="nav-link-title" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;color:#7901c1;">
                            <?php if (isset($department)) {
                            ?>

                                <span onclick="window.location.href='<?php echo BASE_URL; ?>Library/index.php';"><?php echo $mainDName; ?>/<?php echo $department; ?> </span>
                                <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><i class="bi bi-caret-down text-dark"></i></span>
                            <?php
                            }
                            ?>
                        </span>
                    </a>
                <?php } ?>

                <div class="nav-item">
                    <form>

                        <?php
                        if (isset($_SESSION['division_NAME'])) {
                        ?>

                            <center>
                                <h6 style="background-color:<?php echo $_SESSION['division_COLOR']; ?>; width: 80%; color:white; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#selectdivision" id="diviId">



                                    </a>
                                    <?php echo $_SESSION['division_NAME']; ?>
                                </h6>
                                <hr style="color:black; margin-top:-5px; width: 80%;margin-bottom: 7px;">
                            </center>
                        <?php
                        } else {
                        ?>

                            <center>
                                <h6 style="background-color:#c7b6b6; width: 80%; color: white; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#selectdivision">

                                    Select Division
                                </h6>
                                <hr style="color:black; margin-top:-5px; width: 80%;margin-bottom: 7px;">
                            </center>
                        <?php } ?>

                    </form>




                    <!-- <form method="post" data-bs-toggle="collapse" action="#"> -->
                    <!-- <a class="nav-link" role="button" aria-expanded="false">
                            <img style="height:15px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/New course.png">

                            <span class="nav-link-title" style="color:black; font-weight:bold;">Devision Name</span>
                            <select style="margin:5px;" type="text" id="" data-bs-toggle="collapse" class="form-select" autocomplete="off" name="course">
                                <option selected disabled value="0">Select Devision</option>
                                <?php
                                $divisionQuery = $connect->query("SELECT DISTINCT cp.divisionType, d.divisionName
                                FROM ctppage AS cp
                                JOIN division AS d ON cp.divisionType = d.id");
                                while ($divisionData = $divisionQuery->fetch()) {
                                ?>
                                    <option value="<?php echo $divisionData['id']; ?>"><?php echo $divisionData['divisionName']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </a> -->
                </div>



                <ul class="navbar-nav" style="width:100%;">
                    <li class="nav-item">
                        <img style="height:15px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/library.png">
                        <span class="nav-link-title text-secondary" style="color:black; font-weight:bold;">Select Library</span>
                        <!-- user modal -->
                        <div class="dropdown">
                            <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                <div class="form-control" style="width: 220px;
    height: 40px;
    padding: inherit;
    margin: 5px;">
                                    <label>Select</label>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">

                                <div class="dropdown-item-text">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 ms-3">
                                            <?php
                                            $fetchlab = $connect->query("SELECT * FROM library WHERE library = 'Main' OR user_id = 'super_admin'");
                                            while ($labData = $fetchlab->fetch()) {
                                            ?>
                                                <a href="index.php?lib_id=<?php echo urlencode(base64_encode($labData['id'])) ?>&library=<?php echo urlencode(base64_encode($labData['library'])) ?>">
                                                    <h3 class="mb-0"><?php echo $labData['library']; ?></h3>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <?php
                                $query3_l = "SELECT * FROM library where `user_id`='$user_id' AND user_id != 'super_admin'";
                                $statement3_l = $connect->prepare($query3_l);
                                $statement3_l->execute();
                                if ($statement3_l->rowCount() > 0) {
                                ?>
                                    <div>
                                        <td>

                                            <?php $result3_l = $statement3_l->fetchAll();
                                            foreach ($result3_l as $row3) {
                                                $user_lib = $row3['user_id'];
                                                $library_id = $row3['id'];
                                                // $library_name=$row3['library'];

                                            ?>

                                                <h4 style="margin:5px; padding: 5px;">


                                                    <a id="divHover" class="dropdown-item" href="index.php?lib_id=<?php echo urlencode(base64_encode($row3['id'])) ?>&library=<?php echo urlencode(base64_encode($row3['library'])) ?>" style="color:black; font-weight:bold;display:initial;"><?php echo $row3['library']; ?>
                                                    </a>
                                                    <a href="" onclick="document.getElementById('lbid').value='<?php echo $row3['id'] ?>';
                                        document.getElementById('library_name').value='<?php echo $row3['library']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#editlibrary" style="float: right; font-weight:bold; font-size:large; margin-left:5px;"><i class="bi bi-pencil-square text-success"></i></a>
                                                    <a href="<?php echo BASE_URL ?>/Library/deleteLibrary.php?labId=<?php echo $row3['id'] ?>&userId=<?php echo $user_id; ?>" style="color:black; font-weight:bold;">
                                                        <i style="float: right; font-weight:bold; font-size:large;" class="bi bi-x-circle text-danger"></i>
                                                    </a>


                                                </h4>

                                            <?php      } ?>
                                        </td>
                                    </div>
                                <?php    }
                                ?>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#newlibrary" href="">Add Library</a>
                            </div>
                        </div>
                        <!-- End user modal -->
                    </li>
                    <hr>

                    <?php
                    if ($_SESSION['role'] == "super admin") {
                    ?>

                        <!-- <li class="nav-item">
                            <a style="margin-left: -5px;" class="nav-link" href="<?php echo BASE_URL; ?>Library/file_management.php" role="button" aria-expanded="false">
                                <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_sche/filemanage3.png">
                                <span class="nav-link-title text-secondary">File Management</span>
                            </a>

                        </li> -->
                    <?php } ?>
                    <!-- <hr>
                    <br> -->
                    <li class="nav-item" style="display:none;">
                        <?php if (!isset($_SESSION['permission']) || $permission['sidebar_phase'] == "1") { ?>
                            <div class="nav-item" style="margin-top:-20px; margin-bottom:-45px;">
                                <!-- <div class="tom-select-custom"> -->
                                <form action="Next-home.php" method="post" data-bs-toggle="collapse" style="margin-left: 15px;">

                                    <img style="height:15px; width:15px; margin-left:10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/CTP.png">
                                    <span class="nav-link-title text-secondary" style="color:black; font-weight:bold;">CTP</span>
                                    <select style="width: 93%; margin-left:-5px;" class="form-select" autocomplete="off" name="ctp" id="set_ctp">

                                        <?php if ($output2 != "") { ?>
                                            <option value="">Select ctp</option>
                                        <?php echo $output2;
                                        } else { ?>
                                            <option value="0">Please add ctp</option>
                                        <?php   } ?>
                                    </select>


                                </form><br><br>
                                <!--  </div> -->
                            </div>
                            <hr><?php } ?>
                    </li>
                </ul>

                <!-- course name -->

                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav" style="margin-top: -30px;padding-left: 0px;">
                        <div id="navbarVerticalMenuPagesMenu">



                            <!-- End Collapse -->
                            <?php if (!isset($_SESSION['permission']) || $permission['Datapage'] == "1") { ?>

                                <!-- Collapse -->
                                <div class="nav-item">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" aria-expanded="false" aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                                        <!-- <i class="bi-basket nav-icon"></i> -->
                                        <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/New/Data Pg.png">
                                        <span class="nav-link-title">Data Page<span class="badge bg-secondary rounded-pill ms-1">6</span></span>
                                    </a>

                                    <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse" data-bs-parent="#navbarVerticalMenuPagesMenu">

                                        <div id="navbarUsersMenuDiv">
                                            <!-- Collapse -->

                                            <div class="nav-item">
                                                <a class="nav-link active" href="<?php echo BASE_URL; ?>includes/Pages/usersinfo.php" role="button" aria-expanded="false">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/all.png">
                                                    <!-- <i class="bi-house-door nav-icon"></i> -->

                                                    <span>All</span>
                                                </a>

                                            </div>
                                            <?php if (!isset($_SESSION['permission']) || $permission['Start0'] == "1") { ?>

                                                <div class="nav-item">
                                                    <a class="nav-link dropdown-toggle" href="#navbarpagesquare" role="button" data-bs-toggle="collapse" data-bs-target="#navbarpagesquare" aria-expanded="false" aria-controls="navbarpagesquare">
                                                        <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Square.png">
                                                        <span class="nav-link-title">Square</span>
                                                    </a>

                                                    <div id="navbarpagesquare" class="nav-collapse collapse " data-bs-parent="#navbarUserssquareDiv">
                                                        <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/start0.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Start0">1</a>
                                                        <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/devision.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add devision">2</a>
                                                        <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/vehiclecate.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Vehicle Category">3</a>
                                                        <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/ctp.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Course Training Plan">4</a>
                                                        <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/newcourse.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create New Course">5</a>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu" aria-expanded="false" aria-controls="navbarCtpMenu">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/CTP.png">
                                                    <span>CTP</span>
                                                </a>

                                                <div id="navbarCtpMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/ctp.php">Add CTP</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/Next-home.php">Phase</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/ctp_list.php">CTP List</a>
                                                    <a class="nav-link " type="button" href="<?php echo BASE_URL; ?>includes/Pages/prereuisite.php">Prerequisites</a>
                                                    <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#class_modal">Create Gradesheet</a>
                                                </div>
                                            </div>
                                            <div class="nav-item">
                                                <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/drag_drop.php" role="button" aria-expanded="false">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_sche/filemanage3.png">
                                                    <span>Drag And Drop</span>
                                                </a>

                                            </div>
                                            <!-- End Collapse -->

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#navbarCourseMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCourseMenu" aria-expanded="false" aria-controls="navbarCourseMenu">
                                                    <img style="height:25px; width:30px; margin-right:10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/New course.png">
                                                    <span>Course</span>
                                                </a>

                                                <div id="navbarCourseMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/newcourse.php">
                                                        Add New Course
                                                    </a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/quiz_data.php">Quiz</a>
                                                    <a class="nav-link" type="button" type="button" data-bs-toggle="modal" data-bs-target="#select_course">Add Group</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/course_list.php">Course List</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <div class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#navbarUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarUsersMenu" aria-expanded="false" aria-controls="navbarUsersMenu">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Multiple Users.png">
                                                    <span>Users</span>
                                                </a>

                                                <div id="navbarUsersMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/roles.php">Manage Roles</a>
                                                    <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#newuser_head" onclick="register()">Register User</a>
                                                    <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/user_list.php">User List</a>
                                                    <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/profile.php">My Profile</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <div class="nav-item">
                                                <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/create_test.php" role="button" aria-expanded="false">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/icons/questionbank2.png">
                                                    <span>Question Bank</span>
                                                </a>

                                            </div>

                                            <div class="nav-item">
                                                <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/test/managetest.php" role="button" aria-expanded="false">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/icons/managetest1.png">
                                                    <span>Manage Test</span>
                                                </a>

                                            </div>

                                            <div class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#deconflictermenu" role="button" data-bs-toggle="collapse" data-bs-target="#deconflictermenu" aria-expanded="false" aria-controls="deconflictermenu">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Multiple Users.png">
                                                    <span>Deconflicter</span>
                                                </a>

                                                <div id="deconflictermenu" class="nav-collapse collapse " data-bs-parent="#deconflictermenuDiv">
                                                    <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/vehiclepage.php">Vehicle</a>
                                                    <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/plannedpage.php">Planned Leave</a>
                                                    <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/unplannedpage.php">Unplanned Leave</a>
                                                    <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/attritionpage.php">Attrition</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#navbarpageMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarpageMenu" aria-expanded="false" aria-controls="navbarpageMenu">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Pgs.png">
                                                    <span>Pages</span>
                                                </a>

                                                <div id="navbarpageMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">

                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/status.php">All Gradesheet</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/actual_phase.php">Actual</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/acedemic_phase.php">Academic</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/draganddrop.php">Activity</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/assigning.php">Assigning Task</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/warning.php">CAP</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/clearance_data.php">Clearance Log</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/mainchecklist.php">Create Checklist</a>

                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/desciplinecate.php">Descipline</a>

                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/emergency_data.php">Emergency Log</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/">Evaluation</a>
                                                    <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#landing_type">Landing Page</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/memocate.php">Memo</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/organization.php">Organization Chart</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/permissionPage.php">Permission</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/.php">Quiz</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/qual_data.php">Qual Log</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/.php">Report</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/sim_phase.php">Simulation</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/testing_phase.php">Testing</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/.php">Task</a>

                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#navbarScoreMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarScoreMenu" aria-expanded="false" aria-controls="navbarScoreMenu">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Scoring.png">
                                                    <span>Scoring</span>
                                                </a>

                                                <div id="navbarScoreMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link" id="permissionbtn" type="button" data-bs-toggle="modal" data-bs-target="#per_list_head">Permission</a>
                                                    <a class="nav-link" onclick="scorebtn()" type="button" data-bs-toggle="modal" data-bs-target="#per_table_head">Percentage</a>
                                                    <a class="nav-link" type="button" href="<?php echo BASE_URL; ?>includes/Pages/addtype.php">Add Type</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#navbarVehicleMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVehicleMenu" aria-expanded="false" aria-controls="navbarVehicleMenu">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Vehicle.png">
                                                    <span>Equipment Type/Tools</span>
                                                </a>

                                                <div id="navbarVehicleMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#add_cate_head" onclick="addcate()">Add Category</a>
                                                    <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#vehiclecate_list_head" onclick="addvehicle()">Equipment Category List</a>
                                                    <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#addvehicle_head" onclick="addvehicle()">Add Equipment</a>
                                                    <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#vehicle_list_head" onclick="addvehicle()">Equipment List</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->


                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#navbarSettingMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarSettingMenu" aria-expanded="false" aria-controls="navbarSettingMenu">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Setting.png">
                                                    <span>Setting</span>
                                                </a>

                                                <div id="navbarSettingMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/department_list.php">Department</a>
                                                    <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/department.php">Main Department</a>
                                                    <a class="nav-link " href="<?php echo BASE_URL; ?>includes/Pages/devision.php">Division</a>
                                                </div>
                                            </div>

                                            <div class="nav-item">
                                                <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/file_management.php" role="button" aria-expanded="false">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_sche/filemanage3.png">
                                                    <span>File Management</span>
                                                </a>

                                            </div>
                                            <!-- End Collapse -->
                                        </div>
                                    </div>
                                </div>


                                <!-- End Collapse -->


                                <!-- End Collapse -->
                            <?php } ?>

                        </div>


                        <div class="navbar-vertical-footer fixed" style="margin-bottom: 10px;">

                            <center>
                                <?php include ROOT_PATH . 'includes/Pages/rolecolor.php'; ?>
                            </center>

                            <hr class="text-dark" style="margin-top:-5px;">
                            <ul class="navbar-vertical-footer-list" style="margin-top:-30px; margin-bottom:-10px;">
                                <li class="navbar-vertical-footer-list-item">
                                    <!-- Style Switcher -->
                                    <div class="dropdown dropup">
                                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="margin-top:5px;">
                                            <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:20px; width: 20px; margin: 3px;">
                                        </button>

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown" style="width:210px;">
                                            <span class="dropdown-header text-success" style="font-size:large;">Apps
                                            </span>
                                            <a class="dropdown-item" id="grade_sheet" href="<?php echo BASE_URL; ?>includes/Pages/Home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V1.0.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:30px; width: 30px; margin: 3px;" id="grade_sheet">
                                                <span class="text-truncate" id="grade_sheet" style="font-size: large;">Grade sheet</span>
                                            </a>
                                            <!-- <a class="dropdown-item" href="http://localhost/latest/TOS/includes/Pages/sessionlogin.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/bridge.png" style="height:25px; width: 25px; margin: 7px;">
                                                <span class="text-truncate" style="font-size:large;">Bridge</span>
                                            </a> -->
                                            <a class="dropdown-item" id="library" href="<?php echo BASE_URL; ?>Library/index.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.2.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:30px; width: 30px; margin: 3px;" id="library">
                                                <span class="text-truncate" id="library" style="font-size: large;">Library</span>
                                            </a>
                                            <a class="dropdown-item" id="scheduling" href="<?php echo BASE_URL; ?>Scheduling/home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.1.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:30px; width: 30px; margin: 3px;" id="scheduling">
                                                <span class="text-truncate" id="scheduling" style="font-size: large;">Scheduling</span>
                                            </a>

                                            <!-- <a class="dropdown-item" id="hotwash" data-placement="left" href="<?php echo BASE_URL; ?>includes/Pages/hotwash.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/2D icons PNG/new/MicrosoftTeams-image (21).png" id="hotwash">
                                                <span class="text-truncate" id="hotwash" style="font-size: larger;">Hotwash</span>
                                            </a> -->

                                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>Test/index.php" data-placement="left" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/new/test.png">
                                                <span class="text-truncate" style="font-size: large; margin: 5px;">Test</span>
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
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newupdates1">
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
                        <!-- End Footer -->
                    </div>
                </div>
    </aside>


    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== SECONDARY CONTENTS ========== -->
    <?php include ROOT_PATH . 'includes/Pages/offcanvas.php'; ?>

    <!-- departmentmodal -->

    <?php if ($role != 'student') { ?>

        <div class="modal fade" id="departmentall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <?php
                        $mainde_fetch = $connect->query("SELECT department_name FROM main_department");
                        $mainde_fetch_name = $mainde_fetch->fetchColumn();
                        $mainde_fetch_img = $connect->query("SELECT file_name FROM main_department");
                        $mainde_fetch_name_img = $mainde_fetch_img->fetchColumn();
                        if ($mainde_fetch_name_img != "") {
                            $piclogo = BASE_URL . 'includes/Pages/department/' . $mainde_fetch_name_img;
                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $piclogo)) {
                                $piclogo = BASE_URL . 'includes/Pages/department/' . $mainde_fetch_name_img;
                            } else {
                                $piclogo = BASE_URL . 'includes/Pages/avatar/avtar.png';
                            }
                        } else {
                            $piclogo = BASE_URL . 'includes/Pages/avatar/avtar.png';
                        }
                        ?>
                        <h1 class="modal-title text-success" id="exampleModalLabel" style="font-size: xx-large;">
                            <img src="<?php echo $piclogo; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;height: 50px;width:50px;" />
                            <?php echo $mainde_fetch_name; ?>
                        </h1>
                        <input style="margin: 5px;width: 50%;float: right;position: absolute;right: 70px;border-radius: 10px !important;" class="form-control" type="text" id="depsearch" onkeyup="depSearch()" placeholder="Search for Department.." title="Type in a name">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- <center>
                                <input style="margin:5px; width: 70%;" class="form-control" type="text" id="depsearch" onkeyup="depSearch()" placeholder="Search for Department.." title="Type in a name">
                            </center> -->
                            <?php
                            $sn1 = 0;
                            if ($_SESSION['role'] != "super admin") {
                                $fetchDepart = $connect->query("SELECT * FROM userdepartment WHERE userId = '$user_id'");
                                while ($dData = $fetchDepart->fetch()) {
                                    $dId = $dData['departmentId'];
                                    $result1 = $connect->query("SELECT * FROM homepage WHERE id = '$dId'");
                                    while ($row1 = $result1->fetch()) {
                                        $sn1++;
                                        $id = $row1["id"];
                                        $mainDImg = $connect->query("SELECT file_name FROM homepage WHERE id = '$dId'");
                                        $mainDImgData = $mainDImg->fetchColumn();
                                        if ($mainDImgData != "") {
                                            $pic1111 = BASE_URL . 'includes/Pages/department/' . $mainDImgData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1111)) {
                                                $pic1111 = BASE_URL . 'includes/Pages/department/' . $mainDImgData;
                                            } else {
                                                $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        } else {
                                            $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }

                            ?>
                                        <div class="col-md-4 departmentsearch" style="cursor:pointer;">
                                            <div class="col-12 rounded" style="width:max-content;">
                                                <a class="changeDepartMentBtn" data-depname="<?php echo $row1['department_name']; ?>" data-depid="<?php echo $row1['id']; ?>" data-bs-toggle="modal" data-bs-target="#selectdivision">

                                                    <label class="data p-2 border text-white rounded bg-secondary" style="font-size:x-large;">
                                                        <img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;height: 50px;width:50px;" />
                                                        <?php echo $row1['department_name']; ?></label>
                                                </a>
                                            </div>


                                        </div>
                                    <?php
                                    }
                                }
                            } else {
                                $result1 = $connect->query("SELECT * FROM homepage");


                                while ($row1 = $result1->fetch()) {
                                    $sn1++;
                                    $id = $row1["id"];
                                    $mainDImg = $connect->query("SELECT file_name FROM homepage WHERE id = '$id'");
                                    $mainDImgData = $mainDImg->fetchColumn();
                                    if ($mainDImgData != "") {
                                        $pic1111 = BASE_URL . 'includes/Pages/department/' . $mainDImgData;
                                        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1111)) {
                                            $pic1111 = BASE_URL . 'includes/Pages/department/' . $mainDImgData;
                                        } else {
                                            $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                    } else {
                                        $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                    }
                                    ?>
                                    <div class="col-md-4 departmentsearch" style="cursor:pointer;">
                                        <div class="col-12 rounded" style="width:max-content;">
                                            <a class="changeDepartMentBtn" data-depname="<?php echo $row1['department_name']; ?>" data-depid="<?php echo $row1['id']; ?>" data-bs-toggle="modal" data-bs-target="#selectdivision">
                                                <label class="data p-2 border text-white rounded bg-secondary" style="font-size:x-large;">
                                                    <img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;height: 50px;width:50px;" />
                                                    <?php echo $row1['department_name']; ?></label>
                                            </a>
                                        </div>


                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    <?php } ?>

    <!-- end departmentmodal -->


    <!-- Modal for alert category -->
    <div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Alert</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $q_alert_roles = "SELECT * FROM `roles`";
                    $alert_data_roles = $connect->prepare($q_alert_roles);
                    $alert_data_roles->execute();
                    $alert_data_roles = $alert_data_roles->fetchAll();

                    ?>


                    <?php include ROOT_PATH . 'includes/Pages/alertform.php'; ?>

                </div>

            </div>
        </div>
    </div>
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


    <!--register new user modal-->
    <div class="modal fade" id="newuser_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Register New User</h3><br>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <center>
                        <span class="get_val_res" style="color:red"></span>
                        <form style="width: 60%; border: 2 px solid black;" class="form form-border" action="admin_register_user.php" novalidate id="reg_form_head">
                            <input type="hidden" name="ins_id" value="<?php echo $user_id ?>">

                            <div class="col-md-12">
                                <input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required>

                            </div><br>

                            <div class="col-md-12">
                                <input class="form-control" class="login-input" type="text" name="nickname" placeholder="Nickname" required>

                            </div><br>
                            <div class="col-md-12">
                                <input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number" required>

                            </div><br>

                            <div class="col-md-12">
                                <select class="form-select mt-3" name="role" required>
                                    <option name="role" value="admin">Admin</option>
                                    <option name="role" value="instructor">Instructor</option>
                                    <option name="role" value="student">Student</option>
                                    <!-- <option name="role" value="phase manager">Phase Manager</option>
                                <option name="role" value="course manager">Course Manager</option> -->
                                </select>

                            </div><br>

                            <div class="col-md-12">
                                <input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress">

                            </div><br>

                            <div class="col-md-12">

                                <input class="form-control reg_studid_head" type="text" name="studid" placeholder="User Id/Username" required>
                                <p style="color:black;"><span style="color:red;">Note: </span>This will be your Login Id</p>
                            </div><br>

                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>

                            </div><br>


                            <div class="col-md-12 mt-2">
                                <label class="mb-3 mr-1" for="gender" style="color:black; font-weight:bold; margin:5px;">Gender: </label>

                                <input type="radio" name="gender" id="male" value="male" autocomplete="off" required>
                                <label for="male">Male</label>

                                <input type="radio" name="gender" id="female" value="female" autocomplete="off" required>
                                <label for="female">Female</label>
                            </div><br>

                            <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div> -->


                            <div class="form-button mt-2">
                                <input class="btn btn-success" type="submit" name="submit" value="Register" class="login-button">
                                <!-- <p class="link"><a href="login.php">Click to Login</a></p> -->
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- add vehicle category modal -->
    <div class="modal fade" id="add_cate_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Add Vehicle/Tool/Equipment Category</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="insert_vehiclecategory.php" style="width:80%;">
                        <label style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Category :</label>
                        <input class="form-control" type="text" name="vehicletype" value="">
                        <input style="margin:5px;" class="btn btn-success" type="submit" name="Submit" value="Submit">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--Add Vehicle Modal-->
    <div class="modal fade" id="addvehicle_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Add Vehicle/Tool/Equipment</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vehicledata.php" method="post">

                        <!-- <div class="form-outline">
                <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Vehicle Name :</label>
                <input type="text" name="VehicleName" class="form-control form-control-md" />
            </div> -->

                        <div class="form-outline">
                            <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Number :</label>
                            <input type="text" name="VehicleNumber" class="form-control form-control-md" />
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Spot :</label>
                            <input type="text" name="VehicleSpot" class="form-control form-control-md" />
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="VehicleType" style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Category :</label>
                            <select type="text" class="form-control form-control-md" name="VehicleType" required>
                                <option selected disabled value="">-Select Vehicle Category-</option>
                                <?php echo $vehcate; ?>
                            </select>
                        </div>
                        <br>
                        <input style="margin:5px;" class="btn btn-success btn-md" type="submit" value="Submit" name="submitvehicle" />
                    </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="modal fade" id="vehiclecate_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Vehicle Category list</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Vehicle Table-->
                    <center>
                        <table style="width: max-content;" class="table table-striped table-bordered" id="vehiclecatetablehead">
                            <input style="margin:5px; width: 50%;" class="form-control" id="vehiclecateheadsearch" type="text" onkeyup="vehiclecatehead()" placeholder="Search for Vehicle name.." title="Type in a name">
                            <thead class="bg-dark">
                                <th class="text-light">Sr No</th>

                                <th class="text-light">Category Type</th>
                                <th class="text-light">Action</th>
                            </thead>
                            <?php

                            $querycate = "SELECT * FROM vehicletype  ORDER BY vehid ASC";
                            $statementcate = $connect->prepare($querycate);
                            $statementcate->execute();
                            if ($statementcate->rowCount() > 0) {
                                $resultcate = $statementcate->fetchAll();
                                $sn = 1;
                                foreach ($resultcate as $row) {

                            ?>
                                    <tr>
                                        <td><?php echo $sn++;
                                            $id = $row['vehid'] ?></td>

                                        <td><?php echo $row['vehicletype']; ?></td>
                                        <td><a class="btn btn-soft-success btn-xs" onclick="document.getElementById('vehicate_id').value='<?php echo $id = $row['vehid'] ?>';
                         
                          document.getElementById('vec_cate').value='<?php echo $row['vehicletype']; ?>';
                          " data-bs-toggle="modal" data-bs-target="#editvehiclecate"><i class="bi bi-pen-fill"></i></a>
                                            </a>
                                            <a class="btn btn-soft-danger btn-xs" href="vec_cate_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- edit vehicle modal -->
    <div class="modal fade" id="editvehiclecate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="exampleModalLabel">Edit Vehicles Category</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php
                    $quecate = "SELECT * FROM vehicletype where vehid='$id'";
                    $statecate = $connect->prepare($quecate);
                    $statecate->execute();
                    if ($statecate->rowCount() > 0) {
                        $resucate = $statecate->fetchAll();
                        $sn4 = 1;
                        foreach ($resucate as $row) {
                    ?>
                            <div class="container">
                                <form method="post" action="edit_vehiclecate_head.php">
                                    <input class="form-control" type="hidden" name="vehicate_id" value="" id="vehicate_id" value="<?php echo $row['vehid'] ?>">
                                    <label style="color:black; font-weight:bold; margin:5px;">Vehicle category :</label>
                                    <input class="form-control" type="text" name="veh_cate" value="<?php echo $row['vehicletype'] ?>" id="vec_cate">
                                    <br>
                                    <input style="margin:5px;" class="btn btn-success" type="submit" name="submit" value="Submit">
                                </form>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- vehicle list modal -->
    <div class="modal fade" id="vehicle_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Vehicle/Tool/Equipment list</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Vehicle Table-->
                    <center>
                        <table style="width: max-content;" class="table table-striped table-bordered" id="vehicletablehead">
                            <input style="margin:5px; width: 50%;" class="form-control" id="vehicleheadsearch" type="text" onkeyup="vehiclehead()" placeholder="Search for Vehicle name.." title="Type in a name">
                            <thead class="bg-dark">
                                <th class="text-light">Sr No</th>

                                <th class="text-light">Vehicle Type</th>
                                <th class="text-light">Vehicle Number</th>
                                <th class="text-light">Vehicle Spot</th>
                                <th class="text-light">Action</th>
                            </thead>
                            <?php

                            $query = "SELECT * FROM vehicle  ORDER BY id ASC";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            if ($statement->rowCount() > 0) {
                                $result = $statement->fetchAll();
                                $sn = 1;
                                foreach ($result as $row) {
                                    $vehtype = $row['VehicleType'];
                                    $vehitype = $connect->prepare("SELECT vehicletype FROM vehicletype WHERE vehid=?");
                                    $vehitype->execute([$vehtype]);
                                    $vehicletype = $vehitype->fetchColumn();
                            ?>
                                    <tr>
                                        <td><?php echo $sn++;
                                            $id = $row['id'] ?></td>

                                        <td><?php echo $vehicletype; ?></td>
                                        <td><?php echo $row['VehicleNumber'] ?></td>
                                        <td><?php echo $row['VehicleSpot'] ?></td>
                                        <td><a class onclick="document.getElementById('vehicle_id').value='<?php echo $id = $row['id'] ?>';
                         
                          document.getElementById('veh_type').value='<?php echo $vehicletype; ?>';
                          document.getElementById('veh_nub').value='<?php echo $row['VehicleNumber'] ?>';
                          document.getElementById('veh_spot').value='<?php echo $row['VehicleSpot'] ?>';
                          " data-bs-toggle="modal" data-bs-target="#editvehicle"><i class="bi bi-pen-fill text-success"></i></a>
                                            </a>
                                            <a href="vec_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!--search bar modal-->
    <div id="SearchModalAll" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h3 class="modal-title" id="exampleModalCenterTitle">Search Here</h3> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center" style="margin-top: -25px;">
                        <img class="col-md-3 col-lg-3 col-sm-4 mt-5 pt-5" src="<?php echo BASE_URL; ?>assets/svg/search/search1.png" alt="" srcset="" style="width: 10rem;">
                    </div><br>
                    <div class="row justify-content-center">
                        <div class="col-md-12 position-lg-relative">
                            <input type="search" id="myInput" name="search" data-userid="<?php echo $_SESSION['login_id'] ?>" class="js-form-search form-control text-dark" placeholder="Search in front">
                            <div id="searchDropdownMenu" style="height: 250px;overflow-y: auto;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit vehicle modal -->
    <div class="modal fade" id="editvehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="exampleModalLabel">Edit Vehicles/Tool/Equipment</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php
                    $que = "SELECT * FROM vehicle where id='$id'";
                    $state = $connect->prepare($que);
                    $state->execute();
                    if ($state->rowCount() > 0) {
                        $resu = $state->fetchAll();
                        $sn4 = 1;
                        foreach ($resu as $row11) {
                    ?>
                            <div class="container">
                                <form method="post" action="edit_vehicle_head.php">
                                    <input class="form-control" type="hidden" name="vehicle_id" value="" id="vehicle_id" value="<?php echo $row11['id'] ?>">

                                    <!-- <label style="color:black; font-weight:bold; margin:5px;">Vehicle Name :</label>
                        <input class="form-control" type="text" name="vec_name" value="<?php echo $row11['VehicleName'] ?>" id="vec_name"> -->

                                    <label style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Spot :</label>
                                    <input class="form-control" type="text" name="veh_spot" value="<?php echo $row11['VehicleSpot'] ?>" id="vec_spot">

                                    <label style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Number :</label>
                                    <input class="form-control" type="text" name="veh_nub" value="<?php echo $row11['VehicleNumber'] ?>" id="vec_nub">
                                    <label class="form-label" style="color:black; font-weight:bold;">Vehicle/Tool/Equipment Type :</label>
                                    <select class="form-control" name="veh_type" value="" id="vec_type">
                                        <option value="" selected><?php echo $row11['VehicleType']; ?></option>
                                        <option><?php echo $vehcate ?></option>
                                    </select>
                                    <br>
                                    <input style="margin:5px;" class="btn btn-success" type="submit" name="submit" value="Submit">
                                </form>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--Course List Modal-->
    <div class="modal fade" id="acedemic_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <H3>Do You Want To Give Acedemic?</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="acedemic_selection.php" method="post">
                        <input type="hidden" id="get_noti_id" value="" name="noti_id">
                        <input type="hidden" id="get_ac_class_id" name="get_ac_class_id">
                        <button type="button" name="chose_button" id="accept_acdemic" value="1" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accept_acedemic_modal">Accept</button>

                        <button type="submit" name="chose_button" value="0" class="btn btn-danger">Decline</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="accept_acedemic_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <H3>Do You Want To Give Acedemic?</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="selected_student.php" method="post">
                        <input type="hidden" id="get_noti_ides" name="noties_id">
                        <input type="hidden" id="get_ac_class_ide" name="ac_id">
                        <table id="student_fetch" class="table table-striped table-bordered">
                            <thead>
                                <th>sr no</th>
                                <th>Action</th>
                                <th>student</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-success" value="Select">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- course list modal -->
    <div class="modal fade" id="course_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Course List</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered" id="newcoursetable">
                        <input style="margin: 5px;" class="form-control" type="text" id="newcoursesearch" onkeyup="course()" placeholder="Search for Course name.." title="Type in a name">
                        <thead class="bg-dark">
                            <th class="text-light">Sr No</th>
                            <!-- <th class="text-light">Course Id</th> -->
                            <th class="text-light">Course Name</th>
                            <th class="text-light">Course Code</th>
                            <th class="text-light">Course Date</th>
                            <th class="text-light">Nick Name</th>
                            <th class="text-light">Student Names</th>
                            <th class="text-light">Course Manager</th>
                            <th class="text-light">Action</th>
                        </thead>
                        <?php

                        $query1_cs = "SELECT * FROM newcourse group by CourseCode,CourseName";
                        $statement1_cs = $connect->prepare($query1_cs);
                        $statement1_cs->execute();
                        if ($statement1_cs->rowCount() > 0) {
                            $result1_cs = $statement1_cs->fetchAll();
                            $sn1 = 1;
                            foreach ($result1_cs as $row1) {
                                $crs_name = $row1['CourseName'];
                                $course_name = $connect->prepare("SELECT course FROM ctppage WHERE CTPid=?");
                                $course_name->execute([$crs_name]);
                                $name2 = $course_name->fetchColumn();
                                $crs_man = $row1['CourseManager'];
                                $course_man = $connect->prepare("SELECT name FROM users WHERE id=?");
                                $course_man->execute([$crs_man]);
                                $name2_man = $course_man->fetchColumn();
                        ?>
                                <tr>
                                    <td><?php echo $sn1++; ?></td>
                                    <td><?php echo $name2; ?></td>
                                    <td><?php echo $course = $row1['CourseCode']; ?></td>
                                    <td><?php echo $row1['CourseDate']; ?></td>
                                    <td><?php echo $row1['nick_name']; ?></td>
                                    <td><?php
                                        $query_for_student = "SELECT * FROM newcourse where CourseCode='$course' and CourseName='$crs_name'";
                                        $statement_query_for_student = $connect->prepare($query_for_student);
                                        $statement_query_for_student->execute();
                                        if ($statement_query_for_student->rowCount() > 0) {
                                            $result_query_for_student = $statement_query_for_student->fetchAll();
                                            foreach ($result_query_for_student as $row_query_for_student) {
                                                $course_ides = $row_query_for_student['Courseid'];
                                                $std_id = $row_query_for_student['StudentNames'];
                                                $query2 = "SELECT * FROM users where id='$std_id'";
                                                $statement2 = $connect->prepare($query2);
                                                $statement2->execute();
                                                if ($statement2->rowCount() > 0) {
                                                    $result2 = $statement2->fetchAll();

                                                    foreach ($result2 as $row2) {

                                        ?>

                                                        <ul style=" list-style-type: none; display: block;">
                                                            <li style="text-decoration: none;"><?php echo $row2['name']; ?>
                                                                <a href="delete_student_course.php?id=<?php echo $course_ides ?>"><i class="bi bi-x-circle"></i></a>

                                                            </li>
                                                        </ul>
                                        <?php   }
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $name2_man; ?></td>
                                    <td><a onclick="document.getElementById('Course_id').value='<?php echo $row1['Courseid'] ?>';
                                    document.getElementById('Course_Name').value='<?php echo $crs_name; ?>';
                                    document.getElementById('Course_Code').value='<?php echo $row1['CourseCode'] ?>';
                                    document.getElementById('Course_Date').value='<?php echo $row1['CourseDate'] ?>';
                                    document.getElementById('Symbol_').value='<?php echo $row1['nick_name'] ?>';
                                    document.getElementById('Course_Manager').value='<?php echo $name2_man; ?>';
                                    // document.getElementById('Ins').value='<?php echo $row1['Instructor'] ?>';
                                  " data-bs-toggle="modal" data-bs-target="#editcourse"><i class="bi bi-pen-fill text-success" class="fetch_course_data"></i></a>
                                        <a href="newcourse_delete.php?Courseid=<?php echo $row1['Courseid'] ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- edit course modal -->
    <div class="modal fade" id="editcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Edit New Course</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php

                    $ins = "";
                    $qe2 = "SELECT * FROM users where role='instructor' or role='instructors'";
                    $st12 = $connect->prepare($qe2);
                    $st12->execute();

                    if ($st12->rowCount() > 0) {
                        $re12 = $st12->fetchAll();
                        foreach ($re12 as $row12) {
                            $ins .= '<option value="' . $row12['id'] . '">' . $row12['name'] . '</option>';
                        }
                    }

                    ?>
                    <form method="post" action="edit_course.php" id="course_edit_fetched_data">
                        <input class="form-control" type="text" name="Crsid" value="" id="Course_id" readonly hidden>
                        <label style="color:black; font-weight:bold; margin:5px;" hidden>Course Name :</label>
                        <input class="form-control" type="text" name="Course_Name" value="" id="Course_Name" hidden>
                        <label style="color:black; font-weight:bold; margin:5px;" hidden>Course Code :</label>
                        <input class="form-control" type="text" name="Course_Code" value="" id="Course_Code" hidden>
                        <label style="color:black; font-weight:bold; margin:5px;">Course Date :</label>
                        <input class="form-control" type="date" name="Course_Date" value="" id="Course_Date">
                        <label style="color:black; font-weight:bold; margin:5px;">Nick Name :</label>
                        <input class="form-control" type="text" name="Nick_name" value="" id="Symbol_">
                        <?php
                        $std1 = "";
                        $select_std = "SELECT * FROM users where role='student'";
                        $select_std_st = $connect->prepare($select_std);
                        $select_std_st->execute();

                        if ($select_std_st->rowCount() > 0) {
                            $result_select_std = $select_std_st->fetchAll();
                            foreach ($result_select_std as $row_select_std) {
                                $check_id = $row_select_std['id'];
                                $check_std1 = "SELECT Courseid FROM newcourse where StudentNames='$check_id'";
                                $check_std1st = $connect->prepare($check_std1);
                                $check_std1st->execute();
                                if ($check_std1st->rowCount() <= 0) {
                                    $std1 .= '<option value="' . $row_select_std['id'] . '">' . $row_select_std['name'] . '</option>';
                                }
                            }
                        }
                        ?>
                        <label style="color:black; font-weight:bold; margin:5px;">Student Name :</label>
                        <select multiple class="form-control" name="Student_Names[]" id="Student_Names1">
                            <?php echo $std1 ?>
                        </select>
                        <label style="color:black; font-weight:bold; margin:5px;">Course Manager :</label>
                        <select type="text" id="Course_Manager" name="Course_Manager" class="form-control">

                            <?php echo $ins ?>

                        </select>
                        <br>
                        <input class="btn btn-success" type="submit" name="submit1" value="Submit">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--Select which ctp u want-->
    <div class="modal fade" id="select_ctp_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Select CTP</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form action="Next-home.php" method="post">
                            <label class="form-label" for="student" style="color:black; font-weight:bold; margin:5px;">Select CTP :</label>
                            <select type="text" class="form-control form-control-md" name="ctp" required>
                                <option selected disabled value="">-select CTP-</option>
                                <?php echo $output2 ?>
                            </select>
                            <br>
                            <button class="btn btn-success" type="submit" name="submit_Phase">Way To Phase</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!--Ctp list data modal-->
    <div class="modal fade" id="ctp_data_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">CTP List</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--ctp table-->
                    <table class="table table-striped" id="ctptable">
                        <input style="margin:5px;" class="form-control" id="ctpsearch" type="text" onkeyup="ctp()" placeholder="Search for Course name.." title="Type in a name">
                        <thead class="bg-dark">
                            <th class="text-light">Sr No</th>
                            <th class="text-light">Course Name</th>
                            <!-- <th class="text-light">Manual</th> -->
                            <th class="text-light">Type</th>
                            <th class="text-light">Vehicle Type</th>
                            <th class="text-light">Symbol</th>
                            <th class="text-light">Sponcors</th>
                            <th class="text-light">Location</th>
                            <th class="text-light">CourseAim</th>
                            <th class="text-light">ClassSize</th>
                            <th class="text-light">Action</th>
                        </thead>
                        <?php
                        $query3 = "SELECT * FROM ctppage ORDER BY CTPid ASC";
                        $statement2 = $connect->prepare($query3);
                        $statement2->execute();
                        if ($statement2->rowCount() > 0) {
                            $result2 = $statement2->fetchAll();
                            $sn2 = 1;
                            foreach ($result2 as $row8) {
                                $vehtype1 = $row8['VehicleType'];
                                $vehitype1 = $connect->prepare("SELECT vehicletype FROM vehicletype WHERE vehid=?");
                                $vehitype1->execute([$vehtype1]);
                                $vehicletype1 = $vehitype1->fetchColumn();
                        ?>
                                <tr>
                                    <td><?php echo $sn2++; ?></td>

                                    <td><?php echo $row8['course']; ?></td>
                                    <!-- <td><?php echo $row8['manual']; ?></td> -->
                                    <td><?php echo $row8['Type']; ?></td>
                                    <td><?php echo $vehicletype1; ?></td>
                                    <td><?php echo $row8['symbol']; ?></td>
                                    <td><?php echo $row8['Sponcors']; ?></td>
                                    <td><?php echo $row8['Location']; ?></td>
                                    <td><?php echo $row8['CourseAim']; ?></td>
                                    <td><?php echo $row8['ClassSize']; ?></td>
                                    <td><a onclick="document.getElementById('C_id').value='<?php echo $row8['CTPid'] ?>';
                                  document.getElementById('course_2').value='<?php echo $row8['course'] ?>';
                                  // document.getElementById('manual_2').value='<?php echo $row8['manual'] ?>';
                                  document.getElementById('Type_2').value='<?php echo $row8['Type'] ?>';
                                  document.getElementById('vehicle_type2').value='<?php echo $vehicletype1; ?>';
                                  document.getElementById('symbol_2').value='<?php echo $row8['symbol'] ?>';
                                  document.getElementById('Spon_2').value='<?php echo $row8['Sponcors'] ?>';
                                  document.getElementById('Location_2').value='<?php echo $row8['Location'] ?>';
                                  document.getElementById('Courseaim_2').value='<?php echo $row8['CourseAim'] ?>';
                                  document.getElementById('Classsize_2').value='<?php echo $row8['ClassSize'] ?>';
                                  " data-bs-toggle="modal" data-bs-target="#editctp"><i class="bi bi-pen-fill text-success"></i></a>
                                        <a onclick="document.getElementById('ctp_id_to_del').value='<?php echo $row8['CTPid'] ?>';" data-bs-toggle="modal" data-bs-target="#first_confrim_ctp"><i class="bi bi-trash-fill text-danger"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Ctp modal-->
    <div class="modal fade" id="editctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Edit CTP</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="edit_ctp.php">
                        <!-- <label class="text-success" style="font-size:larger;">CTP Id</label> -->
                        <input class="form-control" type="hidden" name="Cid" value="" id="C_id" readonly>
                        <label style="color:black; font-weight:bold; margin:5px;">Course Name :</label>
                        <input class="form-control" type="text" name="course" value="" id="course_2">
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Manual :</label>
                    <input class="form-control" type="text" name="manual" value="" id="manual"> -->
                        <label style="color:black; font-weight:bold; margin:5px;">Type :</label>
                        <input class="form-control" type="text" name="type" value="" id="Type_2">
                        <label style="color:black; font-weight:bold; margin:5px;">Vehicle/Tool/Equipment Type :</label>
                        <!-- <input class="form-control" type="text" name="vehtype" value="" id="vehicletype"> -->
                        <select class="form-control" type="text" name="vehtype" id="vehicle_type2">
                            <option selected disabled value="">-Select Vehicle/Tool/Equipment Category-</option>
                            <?php echo $vehicate; ?>
                        </select>
                        <label style="color:black; font-weight:bold; margin:5px;">Symbol :</label>
                        <input class="form-control" type="text" name="Symbol" value="" id="symbol_2">
                        <label style="color:black; font-weight:bold; margin:5px;">Sponcors :</label>
                        <input class="form-control" type="text" name="Spon" value="" id="Spon_2">
                        <label style="color:black; font-weight:bold; margin:5px;">Location :</label>
                        <input class="form-control" type="text" name="Location" value="" id="Location_2">
                        <label style="color:black; font-weight:bold; margin:5px;">Course Aim :</label>
                        <input class="form-control" type="text" name="Courseaim" value="" id="Courseaim_2">
                        <label style="color:black; font-weight:bold; margin:5px;">Course Size :</label>
                        <input class="form-control" type="text" name="Classsize" value="" id="Classsize_2"><br>
                        <input class="btn btn-success" type="submit" name="submit" value="Submit">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--confiramation modal box to delete ctp-->
    <div class="modal fade" id="third_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Final confrim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="ctp_delete.php" method="post">
                        <input type="hidden" id="ctp_id_to_del" name="CTPid" value="">
                        <label class="text-dark" style="font-weight:bolder;">please enter Admin Password:</label>
                        <input type="Password" name="delete" class="form-control">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="first_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">First confrim?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#second_confrim_ctp">are you sure to delete ctp?</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="second_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data which will Get deleted</h5>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Phase</li>
                        <li>Class</li>
                        <li>Item And Subitem</li>
                        <li>Course</li>
                        <li>Emergancy</li>
                        <li>Test</li>

                    </ul>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#third_confrim_ctp">are you really sure to delete ctp??</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="selectdivision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Division</h3>
                    <input style="margin: 5px;width: 50%;float: right;position: absolute;right: 70px;border-radius: 10px !important;" class="form-control" type="text" id="divsearch" onkeyup="divSearch()" placeholder="Search for Division.." title="Type in a name">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <div class="container"> -->
                    <div class="row" id="divisionContainer">

                        <?php
                        $querydivision1 = "SELECT * FROM division_department where departmentId='$department_Id'";
                        $data_division1 = $connect->prepare($querydivision1);
                        $data_division1->execute();
                        $result_division = $data_division1->fetchAll();
                        foreach ($result_division as $key1) {
                            $department_Id1 = $key1['divisionId'];
                            $querydivision11 = "SELECT * FROM division where id='$department_Id1'";
                            $data_division11 = $connect->prepare($querydivision11);
                            $data_division11->execute();
                            $result_division1 = $data_division11->fetchAll();
                            foreach ($result_division1 as $dt) {
                                $id_div = $dt['id'];
                                $color3 = $dt['color'];
                                $dName = $dt['divisionName'];
                                $bURL = BASE_URL . "includes/Pages/setDivsion.php?divisionName=" . $dName . "&divisionColor=" . urlencode($color3) . "&id=" . $id_div . "&returnUrl=" . urlencode($_SERVER['REQUEST_URI']);
                        ?>

                                <div class="col-md-3 divisionsearch" style="width:auto;">
                                    <div class="col-12 rounded" style="cursor:pointer;">
                                        <a href="<?php echo $bURL; ?>" style="text-align: center;">
                                            <label class="data p-2 border text-white rounded" style="cursor:pointer;font-size:x-large;background:<?php
                                                                                                                                                    if ($color3 == "") {
                                                                                                                                                        echo "gray";
                                                                                                                                                    } else {
                                                                                                                                                        echo $color3;
                                                                                                                                                    }
                                                                                                                                                    ?>;" for="flexCheckDefault">
                                                <?php echo $dt['divisionName'] ?>
                                            </label>
                                        </a>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>

                    <!-- </div> -->
                </div>

            </div>
        </div>
    </div>

    <!--Permission grade modal-->
    <div class="modal fade" id="per_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Grade List</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="get" action="update_grade_per.php">
                        <table class="table table-striped">

                            <thead>
                                <th>Sr No</th>
                                <th>Type</th>

                                <th>Action</th>

                            </thead>
                            <?php
                            $grade_per = "";
                            $que = "SELECT * FROM grade_per ORDER BY id ASC";
                            $stat = $connect->prepare($que);
                            $stat->execute();
                            if ($stat->rowCount() > 0) {
                                $result6 = $stat->fetchAll();
                                $sn7 = 1;
                                foreach ($result6 as $row6) {
                            ?>
                                    <tr>
                                        <td><?php echo $sn7++; ?></td>
                                        <td><?php echo $row6['grade']; ?></td>
                                        <td>
                                            <input type="hidden" name="grade_name[]" value="<?php echo $row6['grade'] ?>">
                                            <input type="checkbox" value="1" <?php if ($row6['permission'] == "1") {
                                                                                    echo 'checked';
                                                                                } ?> name="grade[<?php echo $row6['grade']; ?>]">
                                        </td>

                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </table>
                        <button class="btn btn-success" type="submit" name="savephase">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Percentage table modal-->
    <div class="modal fade" id="per_table_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Percentage Table</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table style=" width: max-content;" class="table table-striped">
                        <input style="width:50%; display: none;" class="form-control" type="text" onkeyup="score()" placeholder="Search for name.." title="Type in a name">
                        <thead class="bg-dark">
                            <th class="text-light">Sr No</th>
                            <th class="text-light">Type</th>
                            <th class="text-light">Percentage</th>
                            <th class="text-light">Color</th>
                            <th class="text-light">Action</th>
                        </thead>
                        <?php
                        $output6 = "";
                        $query6 = "SELECT * FROM percentage  ORDER BY id ASC";
                        $statement6 = $connect->prepare($query6);
                        $statement6->execute();
                        if ($statement6->rowCount() > 0) {
                            $result6 = $statement6->fetchAll();
                            $sn6 = 1;
                            foreach ($result6 as $row6) {
                        ?>
                                <tr>
                                    <td><?php echo $id = $row6['id']; ?></td>
                                    <td><?php echo $row6['percentagetype']; ?></td>
                                    <td><?php echo $row6['percentage']; ?></td>
                                    <td><?php echo $row6['color']; ?></td>
                                    <td><a onclick="document.getElementById('per_id_1').value='<?php echo $row6['id'] ?>';
                            document.getElementById('percentage_name_1').value='<?php echo $row6['percentage'] ?>';
                            " data-bs-toggle="modal" data-bs-target="#edit_percentage_head"><i class="bi bi-pen-fill text-success"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--select ctp modal for add type-->


    <div class="modal fade" id="Prereuisites_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Select CTP</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form action="prereuisite.php" method="post">
                            <label class="form-label" for="student" style="color:black; font-weight:bold; margin:5px;">Select CTP :</label>
                            <select type="text" class="form-control form-control-md" name="pre_ctp" required>
                                <option selected disabled value="">-select CTP-</option>
                                <?php echo $output2 ?>
                            </select>
                            <br>
                            <button class="btn btn-success" type="submit" name="submit_Phase">Way To Phase</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>


    <!--Edit Percentage Table-->
    <div class="modal fade" id="edit_percentage_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Edit Percentage</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="edit_percentage.php">
                        <input class="form-control" type="hidden" name="id" value="" id="per_id_1">
                        <!-- <input type="text" name="percentagetype" value="" id="percentage_type"> -->
                        <input class="form-control" type="text" name="percentage" value="" id="percentage_name_1"><br>
                        <!-- <input type="text" name="color" value="" id="percentage_color"> -->
                        <center>
                            <input class="btn btn-success" type="submit" name="submit" value="Submit">
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- department list modal -->

    <div class="modal fade" id="department_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Department List</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Department Table-->
                    <center>
                        <table class="table table-striped table-bordered" id="departmenttablehead">
                            <input style=" margin:5px;" class="form-control" id="departmentsearchhead" type="text" onkeyup="departmenthead()" placeholder="Search for name.." title="Type in a name">
                            <thead class="bg-dark">
                                <th class="text-light">Sr No</th>
                                <!-- <th class="text-light">Id</th> -->
                                <th class="text-light">School Name</th>
                                <th class="text-light">Department Name</th>
                                <th class="text-light">Type</th>
                                <th class="text-light">Add Logo</th>
                                <th class="text-light">Action</th>
                            </thead>
                            <?php
                            $query4 = "SELECT * FROM homepage ORDER BY id ASC";
                            $statement2 = $connect->prepare($query4);
                            $statement2->execute();
                            if ($statement2->rowCount() > 0) {
                                $result2 = $statement2->fetchAll();
                                $sn4 = 1;
                                foreach ($result2 as $row2) {
                            ?>
                                    <tr>
                                        <td><?php echo $sn4++; ?></td>
                                        <!-- <td><?php echo $row2['id']; ?></td> -->
                                        <td><?php echo $row2['school_name']; ?></td>
                                        <td><?php echo $row2['department_name']; ?></td>
                                        <td><?php echo $row2['type']; ?></td>
                                        <td>
                                            <form action="department_logo.php" method="post" enctype="multipart/form-data" style="width:50%;">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="id" readonly value="<?php echo $row2['id'] ?>" style="width:50%;">
                                                            <input style="width:100px;" type="file" class="form-control" name="file">
                                                        </td>
                                                        <td> <input style="margin:5px;" type="submit" name="submit" value="Upload" class="btn btn-info"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </td>
                                        <td><a onclick="document.getElementById('id_head').value='<?php echo $row2['id'] ?>';
                                    document.getElementById('school_name_head').value='<?php echo $row2['school_name'] ?>';
                                    document.getElementById('department_name_head').value='<?php echo $row2['department_name'] ?>';
                                    document.getElementById('type_head').value='<?php echo $row2['type'] ?>';
                                    " data-bs-toggle="modal" data-bs-target="#edit_department_head"><i class="bi bi-pen-fill text-success"></i></a>
                                            <a href="department_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Department modal-->
    <div class="modal fade" id="edit_department_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Edit Department</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="edit_department.php">
                        <!-- <label class="text-success" style="font-size:larger;">ID</label> -->
                        <input type="hidden" name="id" value="" id="id_head" readonly>
                        <label style="color:black; font-weight:bold; margin:5px;">School Name :</label>
                        <input type="text" name="school_name" value="" id="school_name_head" class="form-control">
                        <label style="color:black; font-weight:bold; margin:5px;">Department Name :</label>
                        <input type="text" name="department_name" value="" id="department_name_head" class="form-control">
                        <label style="color:black; font-weight:bold; margin:5px;">Type :</label>
                        <input type="text" name="type" value="" id="type_head" class="form-control"><br>
                        <input class="btn btn-success" type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for view message -->
    <div class="modal fade" id="view_msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Message</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="get_id_on_view">
                    <h5 id="get_msg"></h5>

                </div>

            </div>
        </div>
    </div>

    <!--Select which ctp u want-->
    <div class="modal fade" id="select_course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary" id="exampleModalLabel">Select Course</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form action="add_group.php" method="post">
                            <span class="nav-link-title" style="color:black; font-weight:bold;">Course Name</span>
                            <select style="margin:5px;" type="text" id="course" data-bs-toggle="collapse" class="form-select" autocomplete="off" name="course">
                                <option readonly value="0">Select course</option>
                                <?php

                                $query1 = "SELECT newcourse.nick_name,newcourse.CourseCode,newcourse.CourseName,newcourse.Courseid
                   FROM newcourse
                   INNER JOIN sidebar_ctp ON newcourse.CourseName = sidebar_ctp.ctp_id group by CourseCode,CourseName";

                                $statement1 = $connect->prepare($query1);
                                $statement1->execute();

                                if ($statement1->rowCount() > 0) {
                                    $result1 = $statement1->fetchAll();

                                    foreach ($result1 as $row1) {
                                        $course_nickname = $row1['nick_name'];
                                        $symbol_name = $row1['CourseCode'];
                                        $course_name_value = $row1['CourseName'];
                                        $cor_name = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                                        $cor_name->execute([$course_name_value]);
                                        $name_of_ctp = $cor_name->fetchColumn();
                                ?>

                                        <option id="<?php echo $row1['CourseCode'] ?>" class="<?php echo $row1['CourseName'] ?>" value="<?php echo $row1['Courseid'] ?>"><?php echo $name_of_ctp . ' - ' . '0' . $symbol_name; ?></option>
                                <?php }
                                } ?>
                            </select>
                            <button class="btn btn-primary" type="submit" name="submit_course">Submit</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- End Welcome Message Modal -->

    <!-- new library Modal -->
    <div class="modal fade" id="newlibrary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Add New Library</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form class="insert-library" id="library_form" method="post" action="insert_library.php">
                            <div class="input-field">
                                <input type="hidden" name="userid" value="<?php echo $user_id ?>">
                                <label style="color:black; font-weight:bolder;">
                                    <h2>New Library</h2>
                                </label>
                                <input type="text" placeholder="Enter Library" name="library[]" id="val" class="form-control" value="" required />
                                <!-- <button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button> -->

                            </div>
                            <hr>
                            <center>
                                <button style="margin:5px; float: right; background-color:#7901c1; color: white;" class="btn" type="submit" id="library_submit" name="savelibrary">Add Library</button>
                            </center>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- edit library modal -->
    <div class="modal fade" id="editlibrary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Library</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form method="post" action="edit_library.php" style="width:80%;">
                            <input class="form-control" type="hidden" name="id" value="" id="lbid">
                            <label style="color:black; font-weight:bold;">Library Name</label>
                            <input class="form-control" type="text" name="library_name" value="" id="library_name">
                            <input style="margin:5px; background-color: #7901c1; color:white;" class="btn" type="submit" name="saveit" value="Submit">
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newupdates1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <?php include ROOT_PATH . 'includes/newupdates.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal -->
    <div id="MenuMegaMenuModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Menu Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include(ROOT_PATH . "Library/libraryMenuFiles.php"); ?>
                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!--select item to the table-->
    <!-- <div class="modal fade" id="item_emergency_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">Select CTP For Emergency Log</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
                        <form action="emergency_data.php" method="post">
                            <label class="form-label" for="student" style="color:black; font-weight:bold; margin:5px;">Select CTP :</label>
                            <select type="text" class="form-control form-control-md" name="ctp" required>
                                <option selected disabled value="">-select CTP-</option>
                                <?php echo $output2 ?>
                            </select>
                        <br>
                        <button class="btn btn-success" type="submit" name="submit_Phase">Way To Emergency Log</button>
                        </form>
                </center>
      </div>
    </div>
  </div>
</div> -->
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
        $(document).ready(function() {
            // function myFunction() {
            //     var input, filter, ul, li, a, i, txtValue;
            //     input = document.getElementById("myInput");
            //     filter = input.value.toUpperCase();
            //     ul = document.getElementById("myUL");
            //     li = ul.getElementsByTagName("li");
            //     for (i = 0; i < li.length; i++) {
            //         a = li[i].getElementsByTagName("a")[0];
            //         txtValue = a.textContent || a.innerText;
            //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
            //             li[i].style.display = "";
            //         } else {
            //             li[i].style.display = "none";
            //         }
            //     }
            // }

            $("#myInput").keyup(function() {
                var search = $(this).val();
                var search_user_id = $(this).data('userid');
                if (search != "") {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo BASE_URL; ?>includes/Pages/globalsearch.php',
                        data: {
                            search_data: search,
                            search_user_id: search_user_id
                        },
                        success: function(response) {
                            console.log(response);
                            // $('.searchResult1').empty();
                            $('#searchDropdownMenu').html(response);
                        }
                    });
                } else {
                    $('#searchDropdownMenu').html('');
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Get the modal element
            var modal = new bootstrap.Modal(document.getElementById('SearchModalAll'));

            // Add an event listener for the 'shown.bs.modal' event
            modal._element.addEventListener('shown.bs.modal', function() {
                // Get the input element and focus on it
                var inputElement = document.getElementById('myInput');
                if (inputElement) {
                    inputElement.focus();
                }
            });
        });
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

<script>
    // Optional: Close the popup when clicking outside the image
    document.addEventListener("click", function(event) {
        const imageContainer = document.querySelector(".image-container");
        const zoomPopup = document.querySelector(".zoom-popup");
        if (
            !imageContainer.contains(event.target) &&
            zoomPopup.style.opacity === "1"
        ) {
            zoomPopup.style.opacity = "0";
            zoomPopup.style.visibility = "hidden";
            zoomPopup.style.pointerEvents = "none";
        }
    });
    document.addEventListener("click", function(event) {
        const imageContainer = document.querySelector(".image-container1");
        const zoomPopup = document.querySelector(".zoom-popup1");
        if (
            !imageContainer.contains(event.target) &&
            zoomPopup.style.opacity === "1"
        ) {
            zoomPopup.style.opacity = "0";
            zoomPopup.style.visibility = "hidden";
            zoomPopup.style.pointerEvents = "none";
        }
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

<script>
    $(document).ready(function() {
        $('.offcanvas-end').addClass('wide-offcanvas');
        // When the "Alert" tab is shown, add the "wide-offcanvas" class to increase the width
        $('#alertonenav-tab').on('shown.bs.tab', function(e) {
            $('.offcanvas-end').addClass('wide-offcanvas');
        });

        // When the "Status" tab is shown, remove the "wide-offcanvas" class to decrease the width
        $('#statusonenav-tab').on('shown.bs.tab', function(e) {
            $('.offcanvas-end').addClass('wide-offcanvas');
        });

        // Select the element with the .closeoffcanvas class
        var closeOffcanvasButton = $('.closeoffcanvas');

        // Select the button that toggles the offcanvas
        var offcanvasToggleButton = $('[data-bs-target="#offcanvasActivityStream11"]');

        // Add a click event listener to the closeoffcanvas button
        closeOffcanvasButton.on('click', function() {
            offcanvasToggleButton.trigger('click'); // Simulate a click on the offcanvas toggle button
        });

        $(document).on('keyup', '#getuserforalert', function(e) {
            var name = $(this).val();
            var newurl = '<?php echo BASE_URL; ?>includes/getuserforalert.php';
            $.ajax({
                type: "get",
                url: newurl,
                data: {
                    'name': name
                },
                success: function(response) {
                    $('.alertuserDetail').html(response);
                    $('.alerttableData').css('display', 'block');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".offaltCat").on("click", function() {
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
                    $("#offeditAltData").empty();
                    $("#offalert_cate").html(altertMsg);
                    $("#offeditAltData").html(resultData);
                }
            });
        });

        $(document).on('click', '.offcanvasalertid', function() {
            var alert_id = $(this).data('offcanvasalertid');
            $.ajax({
                type: 'POST',
                url: "<?php echo BASE_URL; ?>includes/Pages/fetch_alert.php",
                data: {
                    altertId: alert_id
                },
                success: function(resultData) {
                    $('.offcanvasmodelforealert').html(resultData);
                }
            });
        });
    });
    $(document).on('click', '.delet_notis', function() {

        let id = $(this).attr("id");
        $.ajax({
            type: 'POST',
            url: 'delete_notis.php',
            data: 'id=' + id,
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(document).ready(function() {
        $("#studentdropdown").click(function(event) {
            event.stopPropagation();
            $(".student_dropdown").toggle('fast');
        });
        $('body').click(function(event) {
            if ($(".student_dropdown").is(':visible') && !$(".student_dropdown").is(event.target) && $(".student_dropdown").has(event.target).length === 0) {
                $(".student_dropdown").hide('fast');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        fetchCheckData();
    });

    function fetchCheckData() {
        const user_ID = <?php echo $fetchuser_id ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/perCheckData.php', // Replace with the path to your PHP script
            data: {
                user_ID: user_ID
            }, // Send the input values as data
            success: function(response) {
                $("#perCheckData").empty();
                $("#perCheckData").html(response);
            }
        });
    }
</script>

<script>
    $("#saveCheckListValue").on("click", function() {
        var inputValues = [];
        $('.perChecklistVal').each(function() {
            inputValues.push($(this).val());
        });
        // alert(inputValues);
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/insert_checklist_per.php', // Replace with the path to your PHP script
            data: {
                values: inputValues
            }, // Send the input values as data
            success: function(response) {
                $(".perChecklistVal").val("");
                // Handle the response from the PHP script
                fetchCheckData();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {


        var html = '<tr>\
                          <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter checklist" name="" id="" class="form-control perChecklistVal" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>\
                          <td><button type="button" name="remove_actual" id="remove_checklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
        var max = 100;
        var a = 1;

        $("#add_checklist").click(function() {
            if (a <= max) {
                $("#table-field").append(html);
                a++;
            }
        });
        $("#table-field").on('click', '#remove_checklist', function() {
            $(this).closest('tr').remove();
            a--;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var html = '<tr>\
                  <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>\
                  <td style="border: 1px solid white;"><button type="button" name="remove_subchecklist" id="remove_subchecklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
        var max = 100;
        var a = 1;

        $("#add_subchecklist").click(function() {
            if (a <= max) {
                $("#subchecklist_table_per").append(html);
                a++;
            }
        });
        $("#subchecklist_table_per").on('click', '#remove_subchecklist', function() {
            $(this).closest('tr').remove();
            a--;
        });
    });
    $("#newchecktableper").on("click", ".edit_course_data_per", function() {

        var ctid = $(this).attr('id');

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/fetch_check_edit_value_per.php',
            data: 'ctid=' + ctid,
            success: function(response) {

                $('#get_course_foem_per').empty();
                $('#get_course_foem_per').html(response);
            }
        });

    });
</script>

<script>
    function depSearch() {
        var input, filter, departments, department, departmentName, i;
        input = document.getElementById('depsearch');
        filter = input.value.toUpperCase();
        departments = document.getElementsByClassName('departmentsearch');

        for (i = 0; i < departments.length; i++) {
            department = departments[i];
            departmentName = department.querySelector('.data').textContent;
            if (departmentName.toUpperCase().indexOf(filter) > -1) {
                department.style.display = '';
            } else {
                department.style.display = 'none';
            }
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInputmainchecklist');
        const rowElements = document.querySelectorAll('.rowAddmain');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            rowElements.forEach(rowElement => {
                const textContent = rowElement.textContent.toLowerCase();
                if (textContent.includes(searchTerm)) {
                    rowElement.style.display = 'block';
                } else {
                    rowElement.style.display = 'none';
                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alert_modal = document.getElementById("alert_modal");
        const option_modal = document.getElementById("option_modal");
        const selectlanding = document.getElementById("selectlanding");

        // Function to open the corresponding modal when an option is selected
        selectlanding.onchange = function() {
            const selectedValue = selectlanding.value;

            // Hide both modals first
            alert_modal.style.display = "none";
            option_modal.style.display = "none";

            // Show the selected modal
            if (selectedValue === "option1") {
                alert_modal.style.display = "block";
            } else if (selectedValue === "option2") {
                option_modal.style.display = "block";
            }
        };

        // Function to close the modals when clicking outside the content box
        alert_modal.onclick = option_modal.onclick = function(event) {
            if (event.target === alert_modal || event.target === option_modal) {
                event.target.style.display = "none";
            }
        };
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#openOffcanvasButton").on("click", function() {
            // Simulate a click on the "Alert" tab link
            $("#alertonenav-tab").tab("show");

            // Show the offcanvas
            $("#offcanvasActivityStream11").offcanvas("show");
        });
    });
</script>

<script>
    // Function to set a cookie
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    // Function to get a cookie value by name
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    $(document).ready(function() {
        // Check if there is a cookie set for the active link
        var activeLink = getCookie("activeLink");
        if (activeLink) {
            // Add 'active' class to the link stored in the cookie
            $('.nav-link[href="' + activeLink + '"]').addClass('active');
            // Show the parent nav-collapse to keep it open
            $('.nav-link[href="' + activeLink + '"]').closest('.nav-collapse').addClass('show');
        }

        // Handling click event on nav-links
        $('.nav-link').click(function(e) {
            // Set the clicked link's href in a cookie
            setCookie("activeLink", $(this).attr('href'), 1);
        });
    });
</script>

<script>
    $(".changeDepartMentBtn").on("click", function() {
        var depName = $(this).data("depname");
        var depId = $(this).data("depid");
        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/setDepartment.php',
            data: {
                departmantName: depName,
                id: depId,
            },
            success: function(response) {
                $("#divisionContainer").empty();
                $("#divisionContainer").html(response);
            }
        });
    })
</script>

</html>