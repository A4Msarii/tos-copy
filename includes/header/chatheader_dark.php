<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// for fetching ctp name

if (isset($show_navbar) && $show_navbar && isset($window_id) && $window_id === 'window1') {
    // Include navbar contents
}

$role = "";
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
$output2 = "";
$output10 = "";
$query2 = "SELECT * FROM roles where permission!='' ORDER BY id ASC";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if ($statement2->rowCount() > 0) {
    $result2 = $statement2->fetchAll();
    $sn = 1;
    foreach ($result2 as $row2) {
        $output10 .= '<option name="role" value="' . $row2['roles'] . '">' . $row2['roles'] . '</option>';
    }
}
$query2 = "SELECT * FROM ctppage  ORDER BY CTPid ASC";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if ($statement2->rowCount() > 0) {
    $result2 = $statement2->fetchAll();

    foreach ($result2 as $row2) {
        $output2 .= '<option value="' . $row2['CTPid'] . '">' . $row2['course'] . '</option>';
    }
}
$output_20 = "";
$query_20 = "SELECT * FROM actual";
$statement_20 = $connect->prepare($query_20);
$statement_20->execute();

if ($statement_20->rowCount() > 0) {
    $result_20 = $statement_20->fetchAll();

    foreach ($result_20 as $row_20) {
        $output_20 .= '<option value="' . $row_20['id'] . '" id="actual">' . $row_20['symbol'] . '</option>';
    }
}
$output_201 = "";
$query_201 = "SELECT * FROM sim";
$statement_201 = $connect->prepare($query_201);
$statement_201->execute();

if ($statement_201->rowCount() > 0) {
    $result_201 = $statement_201->fetchAll();

    foreach ($result_201 as $row_201) {
        $output_201 .= '<option value="' . $row_201['id'] . '" id="sim">' . $row_201['shortsim'] . '</option>';
    }
}
// data according to the role
// session_start();

$username = "";
if (isset($_SESSION['nickname'])) {
    $username = $_SESSION['nickname'];
}

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

if (isset($_SESSION['login_id'])) {
    $user_id = $_SESSION['login_id'];
} else {
    $_SESSION['danger'] = "Please Login Again!";
    header("Location:../../index.php");
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

if (isset($_SESSION['inst_id'])) {
    $inst_id = $_SESSION['inst_id'];
}
$department_Id = "";
if (isset($_SESSION['department_Id'])) {
    $department_Id = $_SESSION['department_Id'];
} else {
    $department_Id = $_SESSION['inst_id'];
}
$division_id = "";
if (isset($_SESSION['division_id'])) {
    $division_id = $_SESSION['division_id'];
}
$query = "SELECT * FROM roles where roles='$role'";
$statement = $connect->prepare($query);
$statement->execute();
foreach ($statement as $row1) {
    if ($row1 != "") {
        $data = $row1['permission'];
        $test = unserialize($data);
        $_SESSION['permission'] = $test;
    }
}
if (isset($_SESSION['permission'])) {
    $permission = $_SESSION['permission'];
}
$institute = "";
$department = "";
$type_name_dep = "";
// for fetching department name and institute name
$q1 = "SELECT * FROM homepage where user_id=$inst_id";
$st1 = $connect->prepare($q1);
$st1->execute();

if ($st1->rowCount() > 0) {
    $result = $st1->fetchAll();
    foreach ($result as $row) {
        $department = $row['department_name'];
        $institute = $row['school_name'];
        $type_name_dep = $row['type'];
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
$icon = '<span></span>';
include ROOT_PATH.'includes/Pages/allnotification.php';
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
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Side And Head</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="<?php echo BASE_URL; ?>tos.svg"> -->



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

    <script type="text/javascript" src="<?php echo BASE_URL; ?>includes/line_chart/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>includes/line_chart/js/Chart.min.js"></script>

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
        .student-profile .card {
            border-radius: 10px;
        }

        .student-profile .card .card-header .profile_img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin: 10px auto;
            border: 10px solid #ccc;
            border-radius: 50%;
        }

        .student-profile .card h3 {
            font-size: 20px;
            font-weight: 700;
        }

        .student-profile .card p {
            font-size: 16px;
            color: #000;
        }

        .student-profile .table th,
        .student-profile .table td {
            font-size: 14px;
            padding: 5px 10px;
            color: #000;
        }

        .form-control,
        .form-select {
            border-radius: 20px;
            border: 0.0001rem solid #a49d9dd1;
        }

        label {
            margin: 5px;
        }

        .got_result:hover {
            background-color: lightgrey;
        }

        .form-check-select:hover {
            cursor: pointer;
            background-color: #e7eaf3;
        }

        .form-control,
        .form-select {
            border-radius: 20px !important;
        }

        .courcedropdown {
            height: auto;
            width: 50%;
            border-top: 3px solid blue;
            position: fixed;
            z-index: 100000;
            top: 140px;
            left: 250px;
            display: none;
            background: white;
        }

        #alert_Form {
            display: none;
        }

        .navbar-vertical-content {
            height: calc(90% - 21.975rem) !important;
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

        /* The popup image */
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

        .tooldata {
            display: none !important;
            position: absolute;
            left: 0px;
            top: -25px;
            background-color: black;
            color: white;
            width: auto;
            font-size: 15px !important;
            font-weight: normal;
        }

        .tooldata::before {
            content: '';
            height: 10px;
            width: 10px;
            background: black;
            position: absolute;
            bottom: -4px;

            transform: rotate(45deg);
        }

        .maintool:hover .tooldata {
            display: block !important;
        }

        .student_dropdown {
            height: Auto;
            width: 50%;
            border-top: 3px solid blue;
            position: fixed;
            z-index: 100000;
            top: 200px;
            left: 250px;
            display: none;
            background: white;
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

    <?php
    include ROOT_PATH . 'includes/Pages/mainheader.php';
    ?>
    
    

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->
    <div class="courcedropdown shadow p-3" id="dropdownContent">
        <div class="col-12 text-center border-bottom-2">
            <input style="padding:5px;border:2px solid #B5C3FF;margin-bottom:5px; width:50%;" type="text" placeholder="Search CTP or Courses" name="shelf" id="shelfval" class="" value="" required="">
        </div>
        <div class="container-fluid border-top">
            <div class="row mt-2 ajax-content">
                <!-- Display paginated data here using AJAX -->
            </div>
        </div>
    </div>



    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white" style="z-index:auto;">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">

                <?php

                if (isset($_SESSION['department_NAME'])) {
                ?>
                    <a class="navbar-brand">
                        <div class="avatar avatar-sm avatar-circle">
                            <div class="image-container">
                                <img style=" margin-left: -5px;position:absolute;left:-10px" class="avatar" src="<?php echo $pic1111; ?>" alt="Logo" data-hs-theme-appearance="default">
                                <div class="zoom-popup">
                                    <img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                                </div>
                            </div>
                            <div class="image-container1">
                                <img style=" margin-left: -5px;position:absolute;left:-2px" class="avatar" src="<?php echo $pic_department; ?>" alt="Logo" data-hs-theme-appearance="default">
                                <div class="zoom-popup1">
                                    <img src="<?php echo $pic_department; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                                </div>
                            </div>
                        </div>
                        <span class="nav-link-title text-success" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;">
                            <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?></span> / <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $_SESSION['department_NAME']; ?> </span>
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
                                <img style=" margin-left: -5px;position:absolute;left:-10px" class="avatar" src="<?php echo $pic1111; ?>" alt="Logo" data-hs-theme-appearance="default">
                                <div class="zoom-popup">
                                    <img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                                </div>
                            </div>
                            <div class="image-container1">
                                <img style=" margin-left: -5px;position:absolute;left:-2px" class="avatar" src="<?php echo $pic_department; ?>" alt="Logo" data-hs-theme-appearance="default">
                                <div class="zoom-popup1">
                                    <img src="<?php echo $pic_department; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;" />
                                </div>
                            </div>
                        </div>
                        <span class="nav-link-title text-success" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;">
                            <?php if (isset($department)) {
                            ?>

                                <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?></span> /<span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $department; ?> </span>
                            <?php
                            }
                            ?>
                        </span>
                    </a>
                <?php } ?>

                


                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                
    </aside>


    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== SECONDARY CONTENTS ========== -->

    <!-- Activity -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivityStream11" aria-labelledby="offcanvasActivityStream11Label">
        <div class="offcanvas-header">

            <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">


                <li class="nav-item">
                    <a class="nav-link active" href="#alertonenav" id="alertonenav-tab" data-bs-toggle="tab" data-bs-target="#alertonenav" role="tab" aria-controls="alertonenav" aria-selected="true">Alert</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#statusonenav" id="statusonenav-tab" data-bs-toggle="tab" data-bs-target="#statusonenav" role="tab" aria-controls="statusonenav" aria-selected="false">Status</a>
                </li> -->
                <li>

                    <?php
                    if ($role == "super admin" || $role == "instructor") {
                        echo '<button style="margin-top:15px;" class="closeoffcanvas btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#alert_modal"><i class="bi bi-plus-lg"></i></button>';
                    }
                    ?>

                </li>
            </ul>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="alertonenav" role="tabpanel" aria-labelledby="alertonenav-tab">

                    <?php include ROOT_PATH . 'includes/Pages/alertdiveoffcanvas.php' ?>
                </div>

                <div class="tab-pane fade" id="statusonenav" role="tabpanel" aria-labelledby="statusonenav-tab">
                    <p>Second tab content...</p>
                </div>


            </div>

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
    <div class="modal fade" id="view_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Document</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#accept_doc">Clicking this you accept warning.</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="accept_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Please choose</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="per_doc.php" method="post">

                        <input type="hidden" name="std_id" value="<?php echo $user_id ?>">
                        <input type="hidden" id="warning_id" name="warning_id">
                        <input type="hidden" id="get_noti_id" name="noti_id">
                        <button type="submit" class="btn btn-success" name="per_but" value="accept">Yes</button>
                        <button type="submit" class="btn btn-danger" name="per_but" value="not accept">No</button>
                    </form>
                </div>

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
                        <form style="border: 2 px solid black;" class="form form-border" action="admin_register_user.php" novalidate id="reg_form_head">
                            <input type="hidden" name="ins_id" value="<?php echo $user_id ?>">

                            <div class="col-md-12 d-flex">
                                <input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>

                            </div><br>

                            <div class="col-md-12 d-flex">
                                <input class="form-control" class="login-input" type="text" name="nickname" placeholder="Nickname" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>

                            </div><br>
                            <div class="col-md-12 d-flex">
                                <input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number" required>
                                <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>

                            </div><br>

                            <div class="col-md-12 d-flex">
                                <select class="form-select mt-3" name="role" required>
                                    <?php echo $output10; ?>
                                </select><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>

                            </div><br>

                            <div class="col-md-12 d-flex">
                                <input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress"><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>

                            </div><br>

                            <div class="col-md-12 d-flex">
                                <input class="form-control" type="text" class="login-input" name="initial" placeholder="Add Initial" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>

                            </div><br>

                            <div class="col-md-12 d-flex">

                                <input class="form-control reg_studid_head" type="text" name="studid" placeholder="User Id/Username" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>

                            </div><br>
                            <p style="color:black;"><span style="color:red;">Note: </span>This will be your Login Id</p>
                            <div class="col-md-12 d-flex">
                                <input class="form-control" type="password" name="password" placeholder="Password" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>

                            </div><br>

                            <div class="col-md-12 d-flex">
                                <input class="form-control" type="file" name="file" value="avtar.png" /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>
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
                    <h3 class="modal-title text-success" id="exampleModalLabel">Add Equipment/Tool/Equipment Category</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="insert_vehiclecategory.php" style="width:100%;">
                        <label style="color:black; font-weight:bold; margin:5px;">Tool/Equipment Category <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                        <input class="form-control" type="text" name="vehicletype" value=""><br>
                        <input style="margin:5px; float: right;" class="btn btn-success" type="submit" name="Submit" value="Submit">
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
                    <h3 class="modal-title text-success" id="exampleModalLabel">Add Tool/Equipment</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vehicledata.php" method="post">

                        <!-- <div class="form-outline">
                <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Vehicle Name :</label>
                <input type="text" name="VehicleName" class="form-control form-control-md" />
            </div> -->

                        <div class="form-outline">
                            <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Equipment/Tool Number <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                            <input type="text" name="VehicleNumber" class="form-control form-control-md" />
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Equipment/Tool Spot <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                            <input type="text" name="VehicleSpot" class="form-control form-control-md" />
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="VehicleType" style="color:black; font-weight:bold; margin:5px;">Equipment/Tool Category <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                            <select type="text" class="form-control form-control-md" name="VehicleType" required>
                                <option selected disabled value="">-Select Equipment Category-</option>
                                <?php echo $vehcate; ?>
                            </select>
                        </div>
                        <br>
                        <input style="margin:5px; float: right;" class="btn btn-success btn-md" type="submit" value="Submit" name="submitvehicle" />
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
                    <h3 class="modal-title text-success" id="exampleModalLabel">Equipment Category list</h3>
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
                                            <a class="btn btn-soft-danger btn-xs" href="vec_cate_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>
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
                    <h2 class="modal-title text-success" id="exampleModalLabel">Edit Equipment Category</h2>
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
                                    <label style="color:black; font-weight:bold; margin:5px;">Equipment category :</label>
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
                    <h3 class="modal-title text-success" id="exampleModalLabel">Equipment/Tool list</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Vehicle Table-->
                    <center>
                        <table style="width: max-content;" class="table table-striped table-bordered" id="vehicletablehead">
                            <input style="margin:5px; width: 50%;" class="form-control" id="vehicleheadsearch" type="text" onkeyup="vehiclehead()" placeholder="Search for Vehicle name.." title="Type in a name">
                            <thead class="bg-dark">
                                <th class="text-light">Sr No</th>

                                <th class="text-light">Equipment Type</th>
                                <th class="text-light">Equipment Number</th>
                                <th class="text-light">Equipment Spot</th>
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
                                        <td><a class="btn btn-soft-success btn-xs" onclick="document.getElementById('vehicle_id').value='<?php echo $id = $row['id'] ?>';

                          document.getElementById('veh_type').value='<?php echo $vehicletype; ?>';
                          document.getElementById('veh_nub').value='<?php echo $row['VehicleNumber'] ?>';
                          document.getElementById('veh_spot').value='<?php echo $row['VehicleSpot'] ?>';
                          " data-bs-toggle="modal" data-bs-target="#editvehicle"><i class="bi bi-pen-fill"></i></a>
                                            </a>
                                            <a class="btn btn-soft-danger btn-xs" href="vec_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>
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
    <div class="modal fade" id="editvehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="exampleModalLabel">Edit Equipment/Tool</h2>
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

                                    <label style="color:black; font-weight:bold; margin:5px;">Equipment/Tool Spot :</label>
                                    <input class="form-control" type="text" name="veh_spot" value="<?php echo $row11['VehicleSpot'] ?>" id="vec_spot">

                                    <label style="color:black; font-weight:bold; margin:5px;">Equipment/Tool Number :</label>
                                    <input class="form-control" type="text" name="veh_nub" value="<?php echo $row11['VehicleNumber'] ?>" id="vec_nub">
                                    <label class="form-label" style="color:black; font-weight:bold;">Equipment/Tool Type :</label>
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




    <!-- <div style="z-index: 999999;top:50%;" class="modal show" id="phaseCon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Phase Modal</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="phseClose"></button>
                </div>
                <div class="modal-body">
                    <center>

                        <div id="phaseContainer"></div>

                    </center>
                </div>
            </div>
        </div>
    </div> -->




    <div class="modal fade" id="class_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Select Class</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>

                        <label class="form-label" for="student" style="color:black; font-weight:bold; margin:5px;">Select Class :</label>
                        <select type="text" class="form-control form-control-md" name="ctp" id="select_class_re" required>
                            <option selected disabled value="">-select Class-</option>
                            <?php
                            echo $output_20;
                            echo $output_201;
                            ?>
                        </select>
                        <!-- <br> -->
                        <!-- <button class="btn btn-success" type="bu" name="submit_Phase">Way To Class</button> -->

                    </center>
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



    <!--deaprtemnt all-->

    <?php if ($role != 'student') { ?>

        <div class="modal fade" id="departmentall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-success" id="exampleModalLabel">Departments</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered" id="deptable">
                            <input style="margin:5px;" class="form-control" type="text" id="depsearch" onkeyup="dep()" placeholder="Search for Department.." title="Type in a name">
                            <thead class="bg-dark">
                                <th class="text-light">Sr.No</th>
                                <th class="text-light">Department</th>

                            </thead>
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

                            ?>
                                        <tr>

                                            <td><?php echo $sn1; ?></td>
                                            <td><a href="<?php echo BASE_URL; ?>includes/Pages/setDepartment.php?departmantName=<?php echo $row1['department_name']; ?>&id=<?php echo $row1['id']; ?>">
                                                    <?php echo $row1['department_name']; ?>
                                                </a>
                                            </td>


                                        </tr>
                                    <?php
                                    }
                                }
                            } else {
                                $result1 = $connect->query("SELECT * FROM homepage");


                                while ($row1 = $result1->fetch()) {
                                    $sn1++;
                                    $id = $row1["id"];
                                    ?>
                                    <tr>

                                        <td><?php echo $sn1; ?></td>
                                        <td><a href="<?php echo BASE_URL; ?>includes/Pages/setDepartment.php?departmantName=<?php echo $row1['department_name']; ?>&id=<?php echo $row1['id']; ?>">
                                                <?php echo $row1['department_name']; ?>
                                            </a>
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

    <?php } ?>





    <!-- End Welcome Message Modal -->

    <!--select item to the table-->

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

    <!-- JavaScript code to handle the modal behavior -->
    <!-- JavaScript code to handle the modal behavior -->

    <script>
        $("#selecttypealert").change(function() {
            if ($(this).val() == "General Announcement/Note To All" || $(this).val() == "Warning" || $(this).val() == "Caution" || $(this).val() == "Alert" || $(this).val() == "Remarks" || $(this).val() == "Reminder" || $(this).val() == "Urgent Notice" || $(this).val() == "Updates" || $(this).val() == "Instructions" || $(this).val() == "Feedback Request" || $(this).val() == "Call To Action" || $(this).val() == "Meeting Summaries" || $(this).val() == "Status Reports" || $(this).val() == "Invitation") {
                $("#alert_Form").css("display", "block");

            }

            // if ($(this).val() == "addFileLoca") {
            //   $("#phase_form").css("display", "block");
            //   $("#multipleFile").css("display", "none");
            //   $("#filelink").css("display", "none");
            //   $("#newpageform").css("display", "none");
            //   $("#file").css("display", "block");
            // }
            // if ($(this).val() == "addFileLink") {
            //   $("#phase_form").css("display", "none");
            //   $("#multipleFile").css("display", "none");
            //   $("#newpageform").css("display", "none");
            //   $("#filelink").css("display", "block");
            //   $("#file").css("display", "block");
            // }
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


    <script>
        // Function to handle AJAX pagination
        function loadPage(pageNumber) {
            $.ajax({
                url: '<?php echo BASE_URL; ?>includes/ajax_pagination.php', // Path to the PHP script handling pagination
                type: 'GET',
                data: {
                    page: pageNumber
                },
                success: function(data) {
                    $('.ajax-content').html(data); // Update the content with the paginated data
                }
            });
        }

        // Event listener for pagination links
        $(document).on('click', '.pagination .page-link', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            loadPage(page);
        });

        // Load the first page on initial page load
        loadPage(1);
    </script>


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
                            // console.log(response);
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
                        url: 'getSearch.php',
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
            var course = sessionStorage.getItem('co_name');
            var color = sessionStorage.getItem('co_color');
            var co_Ins = sessionStorage.getItem('co_Ins');
            var co_Id = sessionStorage.getItem('co_Id');
            if (course !== null) {
                $('#get_co_name').html(course);

                $("#get_co_name1").css("display", "none");
                $('#get_co_color').css("background-color", color);
                $("#phase_mana").attr("name", co_Id);
                $("#phase_mana").attr("value", co_Ins);
            }
            //set value of javascript to php variable

            //on change of course dropdown send value to selec_std.php and fetch value
            $('.course').on('click', function() {
                var countryID = $(this).data("value");
                var courceColor = $(this).data("color");
                var id = $(this).attr("id");
                var role = $(this).data("role");

                var class1 = $(this).data("class");
                var name = $(this).data("name");
                sessionStorage.setItem('co_name', name);
                sessionStorage.setItem('co_color', courceColor);
                sessionStorage.setItem('co_Ins', role);
                sessionStorage.setItem('co_Id', countryID);


                if (role) {
                    $.ajax({
                        type: 'POST',
                        url: '../check_cm_pm.php',
                        data: 'u_id=' + role + '&class_id=' + countryID,
                        success: function(response) {

                            // if (response == 'c1p1') {
                            //     $("#co_mana").show();
                            //     $("#phase_mana").show();
                            // } else if (response == 'c1') {
                            //     $("#co_mana").show();
                            //     $("#phase_mana").hide();
                            // } else if (response == 'p1') {
                            //     $("#co_mana").hide();
                            //     $("#phase_mana").show();
                            // } else {
                            //     $("#co_mana").hide();
                            //     $("#phase_mana").hide();
                            // }
                        }
                    });

                }
                if (countryID) {

                    $.ajax({
                        type: 'POST',
                        url: '../selec_std.php',
                        data: 'course=' + id + '&ides=' + class1,
                        success: function(html) {

                            sessionStorage.setItem('id', countryID);
                            document.cookie = "phpgetcourse = " + class1;
                            document.cookie = "allstudent = " + html;
                            $('#state').html(html);
                            window.location.reload();
                        }
                    });
                }

            });

            $('#select_class_re').on('change', function() {

                var studentname = $(this).val();

                var id = $(this).children(":selected").attr("id");

                window.location.href = 'add_item_subitem.php?class_id=' + studentname + '&class=' + id;
            });
            //onchange of second dropdown select dynamic value from selec.php
            $('#state').on('change', function() {

                var studentname = $(this).val();
                //  console.log(studentname);
                if (studentname) {

                    sessionStorage.setItem('student', studentname);
                    document.cookie = "student = " + studentname;
                    var getUrl = window.location;
                    var baseUrl = getUrl.pathname.split('/')[5];

                    if (baseUrl == "gradesheet.php") {
                        window.location.href = 'actual.php';
                    } else {
                        window.location.reload();
                    }
                }
            });
            //set value of selected student in javascript session
            var getstudent = sessionStorage.getItem('student');
            $('#state').val(getstudent);


        });
    </script>

    <script>
        $("#phase_mana").on("mouseover", function() {
            const cId = $(this).attr("name");
            const uId = $(this).attr("value");
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/getPhaseManager.php',
                data: {
                    uId: uId,
                    cId: cId
                },
                success: function(html) {
                    // $('#state').html(html);
                    // alert(html);
                    // $("#phaseCon").css("display", "block");
                    $("#phaseContainer").empty();
                    $("#phaseContainer").html(html);

                }
            });
        });
        $("#phseClose").on("click", function() {
            $("#phaseCon").css("display", "none");
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

    <script type="text/javascript">
        function showDropdown(element) {
            $(element).addClass('show');
            $(element).find('.dropdown-menu').addClass('show');
        }

        function hideDropdown(element) {
            $(element).removeClass('show');
            $(element).find('.dropdown-menu').removeClass('show');
        }
    </script>


    <script>
        function dep() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("depsearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("deptable");
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
        $(document).ready(function() {
            $(document).on('click', '.courcedropdowntoggle', function() {
                var dropdownContent = document.getElementById("dropdownContent");
                // console.log(dropdownContent.style.display);
                if (dropdownContent.style.display === "none") {
                    dropdownContent.style.display = "block";
                } else {
                    dropdownContent.style.display = "none";
                }
            })
        });

        // Hide the element when clicking anywhere outside the element
        document.onclick = function(event) {
            var target = event.target;
            var dropdownContent = document.getElementById("dropdownContent");
            if (target !== document.getElementById("get_co_name") && !dropdownContent.contains(target)) {
                dropdownContent.style.display = "none";
            }
        };
    </script>

    <script>
        document.getElementById('select-all-dep').onclick = function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>

    <script>
        function openSelectedPage(selectedValue) {
            if (selectedValue === "personal") {
                window.location.href = "personal.php"; // Replace with the URL of the personal page
            }
        }
    </script>
    <script>
        $(document).on("click", ".get_id_doc", function() {
            var id = $(this).attr('id');
            var get_id = $(this).attr('demo');

            $("#get_noti_id").val(get_id);
            $("#warning_id").val(id);
            $.ajax({
                type: 'POST',
                url: 'fetch_file_name.php',
                data: 'id=' + id,
                success: function(response) {
                    if (response.length <= 4) {
                        $('#pdf_view').remove();
                        $('.check_av').remove();
                        $('#view_msg_de').empty();
                        $('#view_msg_de').append("<h1>contact admin</h1>");
                    } else {
                        $('#pdf_view').attr('src', '../../../TOS/includes/Pages/uploads/' + response);
                    }

                }
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
    <script>
        $(document).ready(function() {
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
                            // console.log(response);
                            // $('.searchResult1').empty();
                            $('#searchDropdownMenu').html(response);
                        }
                    });
                } else {
                    $('#searchDropdownMenu').html('');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("click", '.offline', function() {
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
                }
            });
        });
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

<!-- Add this script after loading jQuery -->
<script>
    $(document).ready(function() {
        $('.offcanvas-end').addClass('wide-offcanvas');
        // When the "Alert" tab is shown, add the "wide-offcanvas" class to increase the width
        $('#alertonenav-tab').on('shown.bs.tab', function(e) {
            $('.offcanvas-end').addClass('wide-offcanvas');
        });

        // When the "Status" tab is shown, remove the "wide-offcanvas" class to decrease the width
        $('#statusonenav-tab').on('shown.bs.tab', function(e) {
            $('.offcanvas-end').removeClass('wide-offcanvas');
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


</html>