<?php
include ROOT_PATH . 'includes/connect.php';
// for fetching ctp name
$Total_type_maarks = "";
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
$courseDate = "";
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
// include 'allnotification.php';
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Side And Head</title>
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">


    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>fullcalendar/fullcalendar.min.css" />


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

        /* #alert_Form {
            display: none;
        }*/

        .navbar-vertical-content {
            height: calc(100% - 21.975rem) !important;
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
        /* .image-container:hover .zoom-popup {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        } */

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
        .zoomProfile {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        /*.offcanvas-end.wide-offcanvas {
            width: 70%;
        }*/

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

        body {
            background-image: url('<?php echo BASE_URL; ?>assets/svg/doodle/bglight3.png');
        }

        .folderCross {
            display: none;
        }

        .loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #00c9a7;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
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

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset bg-white">


    <script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance.js"></script>

    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>


    <!-- ========== HEADER ========== -->

    <?php
    include ROOT_PATH . 'includes/message.php';
    displayMSG();
    ?>
    <?php
    include ROOT_PATH . 'includes/alert_for_users.php';
    ?>

    <?php
    $checkUpdate = $connect->query("SELECT count(*) FROM updatehide WHERE userId = '$user_id'");
    if ($checkUpdate->fetchColumn() <= 0) {
        include ROOT_PATH . 'includes/featureupdate.php';
    }
    ?>

    <?php
    include ROOT_PATH . 'includes/Pages/mainheader.php';
    ?>



    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->
    <div class="courcedropdown shadow p-3 bg-light" id="dropdownContent">
        <div class="col-12 text-center border-bottom-2">
            <input style="padding:5px;border:2px solid #B5C3FF;margin-bottom:5px; width:50%;" type="text" placeholder="Search CTP or Courses" name="shelf" id="shelfval" class="" value="" required="">
        </div>
        <div class="container-fluid border-top">
            <div class="row mt-2 ajax-content">
                <!-- Display paginated data here using AJAX -->
            </div>
        </div>
    </div>



    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white" style="z-index:1;">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">

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
                        <!-- <span class="nav-link-title text-success" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $_SESSION['department_NAME']; ?>" style="cursor: pointer;font-weight:bolder;">
                            <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?></span> / <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $_SESSION['department_NAME']; ?> </span>
                        </span> -->
                        <?php
                        $url = $_SERVER['PHP_SELF'];

                        $filename2 = basename($url);
                        $parts = explode('/Test/', $url);

                        if (count($parts) > 1) {
                            $path_after_test = $parts[1];

                            $pos = strpos($url, "Test/" . $path_after_test);

                            if ($pos !== false) {
                                // Extract the desired part of the URL
                                $desiredPart = substr($url, $pos);
                        ?>
                                <span class="nav-link-title text-dark" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $_SESSION['department_NAME']; ?>" style="cursor: pointer;font-weight:bolder;">
                                    <span onclick="window.location.href='<?php echo BASE_URL; ?>Test/dashboard/dashboard.php';"><?php echo $mainDName; ?>/<?php echo $_SESSION['department_NAME']; ?>
                                        <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><i class="bi bi-caret-down text-dark"></i></span>
                                    </span>
                                </span>
                            <?php
                            }
                        } else {
                            ?>

                            <span class="nav-link-title text-success aaaaaaa" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $_SESSION['department_NAME']; ?>" style="cursor: pointer;font-weight:bolder;">
                                <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?>/<?php echo $_SESSION['department_NAME']; ?> </span>
                                <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>" title="Select Department"><i class="bi bi-caret-down text-dark"></i></span>
                            </span>
                        <?php
                        }
                        ?>
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
                        <!-- <span class="nav-link-title text-success" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;">
                            <?php if (isset($department)) {
                            ?>

                                <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?></span> /<span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $department; ?> </span>
                            <?php
                            }
                            ?>
                        </span> -->

                        <?php
                        $url = $_SERVER['PHP_SELF'];

                        $filename2 = basename($url);
                        $parts = explode('/Test/', $url);

                        if (count($parts) > 1) {
                            $path_after_test = $parts[1];

                            $pos = strpos($url, "Test/" . $path_after_test);

                            if ($pos !== false) {
                                // Extract the desired part of the URL
                                $desiredPart = substr($url, $pos);
                        ?>
                                <span class="nav-link-title text-dark" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;">
                                    <?php if (isset($department)) {
                                    ?>

                                        <span onclick="window.location.href='<?php echo BASE_URL; ?>Test/dashboard/dashboard.php';"><?php echo $mainDName; ?></span> /<span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $department; ?> </span>
                                    <?php
                                    }
                                    ?>
                                </span>
                            <?php
                            }
                        } else {
                            ?>

                            <span class="nav-link-title text-success ayushi" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;">
                                <?php if (isset($department)) {
                                ?>
                                    <?php
                                    if ($role == "instructor") {
                                    ?>
                                        <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/dashboard/mydashboard.php';"><?php echo $mainDName; ?>/<?php echo $department; ?> </span>
                                    <?php
                                    } else {
                                    ?>
                                        <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?>/<?php echo $department; ?> </span>
                                    <?php
                                    }
                                    ?>
                                    <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>" title="Select Department"><i class="bi bi-caret-down text-dark"></i></span>
                                <?php
                                }
                                ?>
                            </span>
                        <?php } ?>
                    </a>
                <?php } ?>

                <!--devision  name-->
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
                <hr style="margin:3px">
                <!-- course name -->

                <?php

                if (!isset($_SESSION['permission']) || $permission['select_Course'] == "1") { ?>
                    <div class="nav-item" style="margin-top:-10px;">
                        <?php
                        $fixed_ctp_id = "";
                        if (isset($_COOKIE['fixed_ctp_id'])) {
                            $fixed_ctp_id = $_COOKIE['fixed_ctp_id'];
                        }
                        ?>
                        <form method="post" data-bs-toggle="collapse" action="#">
                            <a class="nav-link" role="button" aria-expanded="false">
                                <img style="height:20px; width:25px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/New course.png">

                                <span class="nav-link-title" style="font-weight:bold; margin-bottom:5px;">Course</span>
                                <!-- <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="courcedropdown">
                                <i class="bi bi-list"></i>
                            </button> -->
                                <br>
                                <div class="form-control courcedropdowntoggle" style="height:40px;width: 104%;">
                                    <!-- <span id="get_co_name" style="color:#677788; font-size:small;" ></span> -->
                                    <span id="get_co_name"></span>
                                    <span id="get_co_name1" style="color:#677788; font-size:small;">Select Course</span>
                                </div>
                            </a>
                    </div>
                    <!-- student fetched according to the course -->
                    <!-- <div class="nav-item" style="margin-bottom: -55px;"> -->
                    <!-- <div class="dropdown dropup m-1">

                  
                    <i class="bi bi-paperclip" style id="selectstd" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                  

                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectstd" style="width:350px; height:auto; overflow-y:auto;">
                    <span class="dropdown-header" style="font-weight:bold; color: black;">User
                    <table id="fetc_cou_std">


                    </table>
                    </span>
                     

                  </div>
                </div> -->

                    <a class="nav-link" role="button" aria-expanded="false" style="margin-top:-10px">
                        <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/User.png">
                        <span class="nav-link-title" style="font-weight:bold;">Student <?php
                                                                                        if (isset($_COOKIE['student']) && $_COOKIE['student'] != 'all') {
                                                                                            $val_stud = $_COOKIE['student'];
                                                                                            $user_name = $connect->query("SELECT nickname FROM users WHERE id = '$val_stud'");
                                                                                            $user_nameData = $user_name->fetchColumn();
                                                                                            echo " - " . $user_nameData;
                                                                                        }
                                                                                        ?></span>

                        <?php if ($role == "super admin") { ?>
                            <select data-bs-toggle="collapse" type="text" id="state" class="form-select" autocomplete="off" name="student">

                                <option value="" class="nav-link">Select Student</option>

                                <?php
                                if (isset($_COOKIE['allstudent2'])) {
                                    echo $_COOKIE['allstudent2'];
                                }
                                ?>

                            </select>
                        <?php } ?>
                        <?php
                        $fetchname = "";
                        $phpcourse = "";
                        $student = "";
                        $fetchid = "";
                        $fetchphone = "";
                        $fetchrole = "";
                        $fetchuser_id = "";
                        $fetchnickname = "";
                        $course_id = "";
                        $course_code = "";
                        $fetchuser_image = "";
                        $course_id = "";
                        //set selected value from both dropdown in php

                        if (isset($_COOKIE['phpgetcourse']) && isset($_COOKIE['student']) && $_COOKIE['student'] != 'all') {
                            $phpcourse = $_COOKIE['phpgetcourse'];
                            $student = $_COOKIE['student'];
                            $fetchname = "";

                            $name = "SELECT * FROM users where id='$student'";
                            $stname2 = $connect->prepare($name);
                            $stname2->execute();

                            if ($stname2->rowCount() > 0) {
                                $rename2 = $stname2->fetchAll();
                                foreach ($rename2 as $rowname2) {
                                    $fetchname = $rowname2['nickname'];
                                    $fetchid = $rowname2['studid'];
                                    $fetchrole = $rowname2['role'];
                                    $fetchphone = $rowname2['phone'];
                                    $fetchemail = $rowname2['email'];
                                    $fetchuser_id = $rowname2['id'];
                                    $fetchuser_image = $rowname2['file_name'];
                                    $fetchnickname = $rowname2['nickname'];
                                }
                            }
                            $cr_name = "SELECT * FROM ctppage where CTPid='$phpcourse'";
                            $cr_st = $connect->prepare($cr_name);
                            $cr_st->execute();

                            if ($cr_st->rowCount() > 0) {
                                $cr_result = $cr_st->fetchAll();
                                foreach ($cr_result as $row) {

                                    $std_course1 = $row['CTPid'];
                                    $std_course = $row['course'];
                                    $Total_type_maarks = $row['total_mark'];
                                    $course_code = $row['symbol'];
                                }
                            }

                            $cr_name_data = "SELECT * FROM newcourse where StudentNames='$student'";
                            $cr_st1 = $connect->prepare($cr_name_data);
                            $cr_st1->execute();

                            if ($cr_st1->rowCount() > 0) {
                                $cr_result1 = $cr_st1->fetchAll();
                                foreach ($cr_result1 as $row1) {
                                    $c_id = $row1['Courseid'];
                                    $CourseCode11 = $row1['CourseCode'];
                                    $std_course1 = $row1['CourseName'];
                                    $Coursename11 = $row1['nick_name'];
                                    $courseDate = $row1['CourseDate'];
                                }
                            }
                        } else if (isset($_COOKIE['student']) && isset($_COOKIE['course_ids']) && $_COOKIE['student'] == 'all') {
                            $fetchuser_id = "0";
                            $course_id = $_COOKIE['course_ids'];
                            $cr_name_data = "SELECT * FROM newcourse where Courseid='$course_id'";
                            $cr_st1 = $connect->prepare($cr_name_data);
                            $cr_st1->execute();

                            if ($cr_st1->rowCount() > 0) {
                                $cr_result1 = $cr_st1->fetchAll();
                                foreach ($cr_result1 as $row1) {
                                    $c_id = $row1['Courseid'];
                                    $CourseCode11 = $row1['CourseCode'];
                                    $std_course1 = $row1['CourseName'];
                                    $Coursename11 = $row1['nick_name'];
                                    $courseDate = $row1['CourseDate'];
                                }
                            }
                        }
                        $cr_name = "SELECT * FROM ctppage where CTPid='$std_course1'";
                        $cr_st = $connect->prepare($cr_name);
                        $cr_st->execute();

                        if ($cr_st->rowCount() > 0) {
                            $cr_result = $cr_st->fetchAll();
                            foreach ($cr_result as $row) {
                                $Total_type_maarks = $row['total_mark'];
                                $course_code = $row['symbol'];
                            }
                        }
                        // $cr_name = "SELECT COUNT(Courseid), StudentNames FROM newcourse GROUP BY StudentNames where Courseid='$phpcourse'";

                        ?>

                    </a>

                    <!-- <input style="width: max-content; margin-top:20px;" type="submit" name="" value="search" class="btn btn-primary"> -->


                    </form>

                    <?php if ($role != "super admin") { ?>
                        <div class="nav-item navbar-vertical-content" style="margin-top:-3px;height: calc(100% - 14.975rem) !important;">
                            <div class="container-fluid border">
                                <?php

                                if (isset($_COOKIE['course_ids'])) {
                                ?>
                                    <center>
                                        <input style="position: relative;right: 8px;border-radius: 10px;box-shadow: none;height: 30px;border: 1px solid #80808075;" type="text" id="studentSearch" onkeyup="studentSearch()" placeholder="Search.." title="Type in a name">
                                    </center>

                                    <div class="row h-100" id="newUserDetail">

                                        <div id="sideBarLoader" style="display:flex;">
                                            <div class="loading-spinner"></div>
                                            <h1 style="margin:5px;">Loading....</h1>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php }
                }

                if (!isset($_SESSION['permission']) || $permission['select_student_details'] == "1") {

                    $fetchid = $row22['studid'];
                    $fetchuser_image = $row22['file_name'];
                    $fetchuser_id = $row22['id'];
                    $fetchnickname = $row22['nickname'];
                    $fetchrole = $row22['role'];
                    $fetchphone = $row22['phone'];;
                    ?>
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                        <div id="navbarVerticalMenuPagesMenu">

                            <?php

                            ?>
                            <label style="display:none;" class="text-success" style="font-weight: bolder;">Name : <span style="color:black;"><?php echo $student = $row22['name'] ?></span></label><br>
                            <?php
                            $Total_type_maarks = "";
                            $fetch_course = "SELECT * FROM newcourse where StudentNames='$user_id'";
                            $fetch_course_st = $connect->prepare($fetch_course);
                            $fetch_course_st->execute();

                            if ($fetch_course_st->rowCount() > 0) {
                                $result_data = $fetch_course_st->fetchAll();
                                foreach ($result_data as $res) {
                                    $c_id = $res['Courseid'];
                                    $Coursename11 = $res['nick_name'];
                                    $courseides = $res['Courseid'];
                                    $CourseCode11 = $res['CourseCode'];
                                    $std_ides = $res['StudentNames'];
                                    $std_course1 = $res['CourseName'];
                                    $get_course_name = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                                    $get_course_name->execute([$std_course1]);
                                    $course_code = $get_course_name->fetchColumn();
                                    // echo '<span class="text-success">Course :</span>'.$course_code;
                                    $get_total_marks = $connect->prepare("SELECT total_mark FROM ctppage WHERE CTPid=?");
                                    $get_total_marks->execute([$std_course1]);
                                    $Total_type_maarks = $get_total_marks->fetchColumn();
                                }

                            ?>




                        </div>

                        <div class="student-profile">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent text-center">
                                                <img class="profile_img" src="<?php echo BASE_URL . 'includes/Pages/upload/' . $fetchuser_image; ?>" alt="John">
                                                <h3><?php echo $fetchnickname ?></h3>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0 text-dark"><strong class="pr-1">ID : </strong><?php echo $fetchid ?></p>
                                                <p class="mb-0 text-dark"><strong class="pr-1">Class : </strong><?php echo $course_code . ' - ' . '0' . $CourseCode11; ?></p>
                                                <p class="mb-0 text-dark"><strong class="pr-1">Course : </strong><?php echo $Coursename11; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php
                            } else {
                    ?>


                        <div class="student-profile">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-transparent text-center">
                                                <img class="profile_img" src="<?php echo BASE_URL . 'includes/Pages/upload/' . $fetchuser_image; ?>" alt="John">
                                                <h3><?php echo $fetchnickname ?></h3>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0"><strong class="pr-1">ID : </strong><?php echo $fetchid ?></p>
                                                <p class="mb-0"><strong class="pr-1">Class : </strong>Not Added Yet</p>
                                                <p class="mb-0"><strong class="pr-1">Course : </strong>Not Added Yet</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php }
                        }
                ?>



                <hr style="margin:1px">
                <?php if (!isset($_SESSION['permission']) || $permission['sidebar_phase'] == "1") { ?>
                    <div class="nav-item item_data" style="margin-bottom:-45px;">
                        <!-- <div class="tom-select-custom"> -->
                        <form action="<?php echo BASE_URL; ?>includes/Pages/Next-home.php" method="post" data-bs-toggle="collapse">
                            <a class="nav-link" role="button" aria-expanded="false">
                                <img style="height:20px; width:20px; margin-left:20px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/CTP.png">
                                <span class="nav-link-title" style="font-weight:bold;">CTP </span>
                                <select class="form-select" autocomplete="off" name="ctp" id="set_ctp" style="width:104%;">

                                    <?php if ($output2 != "") { ?>
                                        <option value="">Select ctp</option>
                                    <?php echo $output2;
                                    } else { ?>
                                        <option value="0">Please add ctp</option>
                                    <?php } ?>
                                </select>

                            </a>
                        </form><br><br>
                        <!--  </div> -->
                    </div>
                    <hr style="margin:15px"><?php } ?>
                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav" style="padding:0px;">

                        <div id="navbarVerticalMenuPagesMenu">



                            <!-- End Collapse -->
                            <?php if (!isset($_SESSION['permission']) || $permission['Datapage'] == "1") { ?>

                                <!-- Collapse -->
                                <div class="nav-item">
                                    <a class="nav-link session dropdown-toggle dropdown-toggle-split" role="button" aria-expanded="false" aria-controls="navbarVerticalMenuPagesEcommerceMenu">
                                        <!-- <i class="bi-basket nav-icon"></i> -->
                                        <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/New/Data Pg.png">
                                        <span class="nav-link-title">Data Page<span class="badge bg-secondary rounded-pill ms-1">6</span></span>
                                    </a>

                                    <div id="navbarVerticalMenuPagesEcommerceMenu" class="nav-collapse" data-bs-parent="#navbarVerticalMenuPagesMenu">

                                        <div id="navbarUsersMenuDiv">
                                            <!-- Collapse -->

                                            <div class="nav-item">
                                                <a class="nav-link session active" href="<?php echo BASE_URL; ?>includes/Pages/usersinfo.php" role="button" aria-expanded="false">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/all.png">
                                                    <!-- <i class="bi-house-door nav-icon"></i> -->

                                                    <span>All</span>
                                                </a>

                                            </div>
                                            <?php if (!isset($_SESSION['permission']) || $permission['Start0'] == "1") { ?>

                                                <div class="nav-item">
                                                    <a class="nav-link session dropdown-toggle" href="#navbarpagesquare" role="button" data-bs-toggle="collapse" data-bs-target="#navbarpagesquare" aria-expanded="false" aria-controls="navbarpagesquare">
                                                        <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Square.png">
                                                        <span class="nav-link-title">Square</span>
                                                    </a>

                                                    <div id="navbarpagesquare" class="nav-collapse collapse " data-bs-parent="#navbarUserssquareDiv">
                                                        <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/start0.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Start0">1</a>
                                                        <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/division.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Division">2</a>
                                                        <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/vehiclecate.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Equipment Category">3</a>
                                                        <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/ctp.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Course Training Plan">4</a>
                                                        <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/newcourse.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create New Course">5</a>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link session dropdown-toggle" href="#navbarCtpMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCtpMenu" aria-expanded="false" aria-controls="navbarCtpMenu">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/CTP.png">
                                                    <span>CTP</span>
                                                </a>

                                                <div id="navbarCtpMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/ctp.php">Add CTP</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/Next-home.php">Phase</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/ctp_list.php">CTP List</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/prereuisite.php">Prerequisites</a>
                                                    <a class="nav-link session" type="button" data-bs-toggle="modal" data-bs-target="#class_modal">Create Gradesheet</a>
                                                </div>
                                            </div>
                                            <div class="nav-item">
                                                <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/drag_drop.php" role="button" aria-expanded="false">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_sche/filemanage3.png">
                                                    <span>Drag And Drop</span>
                                                </a>

                                            </div>
                                            <!-- End Collapse -->

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link session dropdown-toggle" href="#navbarCourseMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCourseMenu" aria-expanded="false" aria-controls="navbarCourseMenu">
                                                    <img style="height:25px; width:30px; margin-right:10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/New course.png">
                                                    <span>Course</span>
                                                </a>

                                                <div id="navbarCourseMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/newcourse.php">
                                                        Add New Course
                                                    </a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/quiz_data.php">Quiz</a>
                                                    <a class="nav-link session" type="button" type="button" data-bs-toggle="modal" data-bs-target="#select_course">Add Group</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/course_list.php">Course List</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <div class="nav-item">
                                                <a class="nav-link session dropdown-toggle" href="#navbarUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarUsersMenu" aria-expanded="false" aria-controls="navbarUsersMenu">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Multiple Users.png">
                                                    <span>Users</span>
                                                </a>

                                                <div id="navbarUsersMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/roles.php">Manage Roles</a>
                                                    <a class="nav-link session" type="button" data-bs-toggle="modal" data-bs-target="#newuser_head" onclick="register()">Register User</a>
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/user_list.php">User List</a>
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/profile.php">My Profile</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <!-- <div class="nav-item">
                                                <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/sessionlogin.php" role="button" aria-expanded="false">
                                                    <img style="height:25px; width:25px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/hr/hr.png">
                                                    <span>HR App</span>
                                                </a>

                                            </div> -->

                                            <div class="nav-item">
                                                <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/create_test.php" role="button" aria-expanded="false">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/icons/questionbank2.png">
                                                    <span>Question Bank</span>
                                                </a>

                                            </div>

                                            <div class="nav-item">
                                                <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/test/managetest.php" role="button" aria-expanded="false">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/icons/managetest1.png">
                                                    <span>Manage Test</span>
                                                </a>

                                            </div>

                                            <div class="nav-item">
                                                <a class="nav-link session dropdown-toggle" href="#deconflictermenu" role="button" data-bs-toggle="collapse" data-bs-target="#deconflictermenu" aria-expanded="false" aria-controls="deconflictermenu">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/icons/deconflicter.png">
                                                    <span>Deconflicter</span>
                                                </a>

                                                <div id="deconflictermenu" class="nav-collapse collapse " data-bs-parent="#deconflictermenuDiv">
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/vehiclepage.php">Vehicle</a>
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/leave.php">Leave</a>
                                                    <!-- <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/unplannedpage.php">Unplanned Leave</a> -->
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/attritionpage.php">Attrition</a>
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/Weekend.php">Weekend</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link session dropdown-toggle" href="#navbarpageMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarpageMenu" aria-expanded="false" aria-controls="navbarpageMenu">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Pgs.png">
                                                    <span>Pages</span>
                                                </a>

                                                <div id="navbarpageMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">

                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/status.php">All Gradesheet</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/actual_phase.php">
                                                        <?php
                                                        $fetchAllCustom = $connect->query("SELECT * FROM custom_menu_names WHERE refrence = 'actual'");
                                                        $customMenuNames = $fetchAllCustom->fetch();
                                                        if ($fetchAllCustom->rowCount() > 0) {
                                                            if ($customMenuNames['refrence'] == "actual") {
                                                                echo $customMenuNames['customName'] . " ";
                                                            } else {
                                                                echo "Actual ";
                                                            }
                                                        } else {
                                                            echo "Actual ";
                                                        }
                                                        ?>
                                                    </a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/acedemic_phase.php">
                                                        <?php
                                                        $fetchAllCustom = $connect->query("SELECT * FROM custom_menu_names WHERE refrence = 'academic'");
                                                        $customMenuNames = $fetchAllCustom->fetch();
                                                        if ($fetchAllCustom->rowCount() > 0) {
                                                            if ($customMenuNames['refrence'] == "academic") {
                                                                echo $customMenuNames['customName'] . " ";
                                                            } else {
                                                                echo "Acedemic ";
                                                            }
                                                        } else {
                                                            echo "Acedemic ";
                                                        }
                                                        ?>
                                                    </a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/draganddrop.php">Activity</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/assigning.php">Assigning Task</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/warning.php">CAP</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/clearance_data.php">Clearance Log</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/mainchecklist.php">Create Checklist</a>

                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/desciplinecate.php">Descipline</a>

                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/emergency_data.php">Emergency Log</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/create_exam.php">Evaluation</a>
                                                    <a class="nav-link session" type="button" data-bs-toggle="modal" data-bs-target="#landing_type">Landing Page</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/memocate.php">Memo</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/organization.php">Organization Chart</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/permissionPage.php">Permission</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/dashboard/mydashboard.php">Quiz</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/qual_data.php">Qual Log</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/.php">Report</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/sim_phase.php">
                                                        <?php
                                                        $fetchAllCustom = $connect->query("SELECT * FROM custom_menu_names WHERE refrence = 'sim'");
                                                        $customMenuNames = $fetchAllCustom->fetch();
                                                        if ($fetchAllCustom->rowCount() > 0) {
                                                            if ($customMenuNames['refrence'] == "sim") {
                                                                echo $customMenuNames['customName'] . " ";
                                                            } else {
                                                                echo "Simulation ";
                                                            }
                                                        } else {
                                                            echo "Simulation ";
                                                        }
                                                        ?>

                                                    </a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/testing_phase.php">Testing</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/.php">Task</a>

                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link session dropdown-toggle" href="#navbarScoreMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarScoreMenu" aria-expanded="false" aria-controls="navbarScoreMenu">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Scoring.png">
                                                    <span>Scoring</span>
                                                </a>

                                                <div id="navbarScoreMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link session" id="permissionbtn" type="button" data-bs-toggle="modal" data-bs-target="#per_list_head">Permission</a>
                                                    <a class="nav-link session" onclick="scorebtn()" type="button" data-bs-toggle="modal" data-bs-target="#per_table_head">Percentage</a>
                                                    <a class="nav-link session" type="button" href="<?php echo BASE_URL; ?>includes/Pages/addtype.php">Add Type</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->

                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link session dropdown-toggle" href="#navbarVehicleMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVehicleMenu" aria-expanded="false" aria-controls="navbarVehicleMenu">
                                                    <img style="height:25px; width:25px; margin-right: 10px; margin-top: 5px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Vehicle.png">
                                                    <span>Equipment Type/Tools</span>
                                                </a>

                                                <div id="navbarVehicleMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link session" type="button" data-bs-toggle="modal" data-bs-target="#add_cate_head" onclick="addcate()">Add Category</a>
                                                    <a class="nav-link session" type="button" data-bs-toggle="modal" data-bs-target="#vehiclecate_list_head" onclick="addvehicle()">Equipment Category List</a>
                                                    <a class="nav-link session" type="button" data-bs-toggle="modal" data-bs-target="#addvehicle_head" onclick="addvehicle()">Add Equipment</a>
                                                    <a class="nav-link session" type="button" data-bs-toggle="modal" data-bs-target="#vehicle_list_head" onclick="addvehicle()">Equipment List</a>
                                                </div>
                                            </div>
                                            <!-- End Collapse -->


                                            <!-- Collapse -->
                                            <div class="nav-item">
                                                <a class="nav-link session dropdown-toggle" href="#navbarSettingMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarSettingMenu" aria-expanded="false" aria-controls="navbarSettingMenu">
                                                    <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/2d icons PNG/new/Setting.png">
                                                    <span>Setting</span>
                                                </a>

                                                <div id="navbarSettingMenu" class="nav-collapse collapse " data-bs-parent="#navbarUsersMenuDiv">
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/department_list.php">Department</a>
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/department.php">Main Department</a>
                                                    <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/division.php">Division</a>
                                                </div>
                                            </div>

                                            <div class="nav-item">
                                                <a class="nav-link session" href="<?php echo BASE_URL; ?>includes/Pages/file_management.php" role="button" aria-expanded="false">
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
                        <!-- End Content -->


                        <div class="navbar-vertical-footer fixed">

                            <center>
                                <?php include ROOT_PATH . 'includes/Pages/rolecolor.php'; ?>
                            </center>

                            <hr style="color:black; margin-top:-5px;">
                            <ul class="navbar-vertical-footer-list" style="margin-top:-30px; margin-bottom:-10px;">
                                <li class="navbar-vertical-footer-list-item">
                                    <!-- Style Switcher -->
                                    <div class="dropdown dropup">
                                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                            <?php
                                            $url = $_SERVER['PHP_SELF'];

                                            $filename2 = basename($url);
                                            $parts = explode('/Test/', $url);

                                            if (count($parts) > 1) {
                                                $path_after_test = $parts[1];

                                                $pos = strpos($url, "Test/" . $path_after_test);

                                                if ($pos !== false) {
                                                    // Extract the desired part of the URL
                                                    $desiredPart = substr($url, $pos);
                                            ?>
                                                    <img src="<?php echo BASE_URL; ?>assets/svg/new/test.png" style="height:20px; width: 20px; margin: 3px;">
                                                <?php
                                                }
                                            } else {
                                                ?>

                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:20px; width: 20px; margin: 3px;">
                                            <?php } ?>
                                        </button>

                                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown" style="width:210px;">
                                            <span class="dropdown-header text-success" style="font-size:large;">Apps
                                            </span>
                                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/Home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V2.1.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:30px; width: 30px; margin: 3px;">
                                                <span class="text-truncate" style="font-size: large;">Grade sheet</span>
                                            </a>

                                            <!-- <a class="dropdown-item" href="http://localhost/latest/TOS/includes/Pages/sessionlogin.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/bridge.png" style="height:25px; width: 25px; margin: 7px;">
                                                <span class="text-truncate" style="font-size:large;">Hr</span>
                                            </a> -->


                                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>Library/index.php?checkValue=<?php echo "unchecked"; ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="V1.2.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:30px; width: 30px; margin: 3px;">
                                                <span class="text-truncate" style="font-size: large;">Library</span>
                                            </a>
                                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>Scheduling/home.php" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.1.0">
                                                <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:30px; width: 30px; margin: 3px;">
                                                <span class="text-truncate" style="font-size: large;">Scheduling</span>
                                            </a>

                                            <!-- <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/hotwash.php" data-placement="left" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/2D icons PNG/new/MicrosoftTeams-image (21).png">
                                                <span class="text-truncate" style="font-size:larger;">Hotwash</span>
                                            </a> -->
                                            <?php if ($role != "super admin") { ?>
                                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>Test/index.php" data-placement="left" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                    <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/new/test.png">
                                                    <span class="text-truncate" style="font-size: large; margin: 5px;">Test</span>
                                                </a>
                                            <?php } else { ?>
                                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>Test/dashboard/dashboard.php" data-placement="left" data-bs-toggle="tooltip" data-bs-placement="right" title="V0.0.0">
                                                    <img style="height:30px; width:30px;" src="<?php echo BASE_URL; ?>assets/svg/new/test.png">
                                                    <span class="text-truncate" style="font-size: large;margin: 5px;">Test</span>
                                                </a><?php } ?>
                                        </div>
                                    </div>

                                    <!-- End Style Switcher -->
                                </li>

                                <li class="navbar-vertical-footer-list-item">
                                    <!-- Other Links -->
                                    <div class="dropdown dropup">
                                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                            <i class="bi-info-circle text-dark" style="font-size:20px;"></i>
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
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newupdates">
                                                <i class="bi-gift dropdown-item-icon"></i>
                                                <span class="text-truncate" title="What's new?">What's new?</span>
                                                <span><img src="<?php echo BASE_URL; ?>assets/svg/new2.gif" style="height: 25px;"></span>
                                                <!-- <span class="badge bg-danger rounded-pill ms-1">New</span> -->
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
                                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle text-dark" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation style="font-size:20px;">

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

    <!-- Activity -->

    <!-- End Activity -->
    <div class="toogle">
        <?php include ROOT_PATH . "Library/file_dropdown.php" ?>
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
                    <form action="<?php echo BASE_URL; ?>includes/Pages/per_doc.php" method="post">

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
                        <form enctype="multipart/form-data" style="border: 2 px solid black;" class="form form-border" action="<?php echo BASE_URL; ?>includes/Pages/admin_register_user.php" novalidate id="reg_form_head" method="post">
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
                                <input class="form-control" type="file" name="file" required accept="image/*" /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>
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

                    <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_vehiclecategory.php" style="width:100%;">
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
                    <form action="<?php echo BASE_URL; ?>includes/Pages/vehicledata.php" method="post">

                        <!-- <div class="form-outline">
                <label class="form-label" for="coursename" style="color:black; font-weight:bold; margin:5px;">Vehicle Name :</label>
                <input type="text" name="VehicleName" class="form-control form-control-md" />
            </div> -->

                        <div class="form-outline">
                            <label class="form-label text-dark" for="coursename" style="font-weight:bold; margin:5px;">Equipment/Tool Number <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                            <input type="text" name="VehicleNumber" class="form-control form-control-md" />
                        </div>

                        <div class="form-outline">
                            <label class="form-label text-dark" for="coursename" style="font-weight:bold; margin:5px;">Equipment/Tool Spot <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                            <input type="text" name="VehicleSpot" class="form-control form-control-md" />
                        </div>

                        <div class="form-outline">
                            <label class="form-label text-dark" for="VehicleType" style="font-weight:bold; margin:5px;">Equipment/Tool Category <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
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
                                <th class="text-white">Sr No</th>

                                <th class="text-white">Category Type</th>
                                <th class="text-white">Action</th>
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
                                <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_vehiclecate_head.php">
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
                                <th class="text-white">Sr No</th>

                                <th class="text-white">Equipment Type</th>
                                <th class="text-white">Equipment Number</th>
                                <th class="text-white">Equipment Spot</th>
                                <th class="text-white">Action</th>
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
                                <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_vehicle_head.php">
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
                    <form action="<?php echo BASE_URL; ?>includes/Pages/acedemic_selection.php" method="post">
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
                    <form action="<?php echo BASE_URL; ?>includes/Pages/selected_student.php" method="post">
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
                        <form action="<?php echo BASE_URL; ?>includes/Pages/Next-home.php" method="post">
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



    <!--select division modal-->

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


    <!--confiramation modal box to delete ctp-->
    <!-- <div class="modal fade" id="third_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> -->

    <!-- <div class="modal fade" id="first_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> -->
    <!-- <div class="modal fade" id="second_confrim_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> -->

    <!--Permission grade modal-->
    <div class="modal fade" id="per_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Grade List</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="get" action="<?php echo BASE_URL; ?>includes/Pages/update_grade_per.php">
                        <table class="table table-striped table-bordered table-hover">

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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Percentage Table</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <center>
                        <table style=" width: max-content;" class="table table-striped table-bordered table-hover">
                            <input style="width:50%; display: none;" class="form-control" type="text" onkeyup="score()" placeholder="Search for name.." title="Type in a name">
                            <thead class="bg-dark">
                                <th class="text-white">Sr No</th>
                                <th class="text-white">Type</th>
                                <th class="text-white">Percentage</th>
                                <th class="text-white">Color</th>
                                <th class="text-white">Description</th>
                                <th class="text-white">Action</th>
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
                                        <td><?php echo $row6['description']; ?></td>
                                        <td><a class="btn btn-soft-success btn-xs" onclick="document.getElementById('per_id_1').value='<?php echo $row6['id'] ?>'
                                    document.getElementById('ppp_name').innerHTML='<?php echo $row6['percentagetype']; ?>';
                            document.getElementById('percentage_name_1').value='<?php echo $row6['percentage'] ?>';
                            " data-bs-toggle="modal" data-bs-target="#edit_percentage_head"><i class="bi bi-pen-fill"></i></a>
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
                        <form action="<?php echo BASE_URL; ?>includes/Pages/prereuisite.php" method="post">
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
                    <h3 class="modal-title text-success" id="ppp_name"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_percentage.php">
                        <!-- <h3 id="ppp_name"></h3> -->
                        <input class="form-control" type="hidden" name="id" value="" id="per_id_1">
                        <!-- <input type="text" name="percentagetype" value="" id="percentage_type"> -->
                        <input class="form-control" type="text" name="percentage" value="" id="percentage_name_1"><br>
                        <label class="form-label">Add Description</label>
                        <input type="" name="description" class="form-control"><br>
                        <!-- <input type="text" name="color" value="" id="percentage_color"> -->
                        <center>
                            <input class="btn btn-success" type="submit" name="submit" value="Submit" style="float: right;">
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- department list modal -->

    <div class="modal fade" id="department_list_head" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
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
                                <th class="text-white">Sr No</th>
                                <!-- <th class="text-white">Id</th> -->
                                <th class="text-white">Main Department</th>
                                <th class="text-white">Department Name</th>
                                <th class="text-white">Add Logo</th>
                                <th class="text-white">Action</th>
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

                                        <td>
                                            <center>
                                                <form action="<?php echo BASE_URL; ?>includes/Pages/department_logo.php" method="post" enctype="multipart/form-data">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" class="form-control" name="id" readonly value="<?php echo $row2['id'] ?>">
                                                                <input type="file" class="form-control" name="file" accept="image/*">
                                                            </td>
                                                            <td> <input style="margin:5px;" type="submit" name="submit" value="Upload" class="btn btn-info"></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </center>
                                        </td>
                                        <td><a class="btn btn-soft-success btn-xs" onclick="document.getElementById('id_head').value='<?php echo $row2['id'] ?>';
                                    document.getElementById('school_name_head').value='<?php echo $row2['school_name'] ?>';
                                    document.getElementById('department_name_head').value='<?php echo $row2['department_name'] ?>';
                                    document.getElementById('description').value='<?php echo $row2['description'] ?>';document.getElementById('location').value='<?php echo $row2['location'] ?>';document.getElementById('contact_number').value='<?php echo $row2['contact_number'] ?>';
                                    document.getElementById('email').value='<?php echo $row2['email'] ?>';document.getElementById('website').value='<?php echo $row2['website'] ?>';document.getElementById('additional').value='<?php echo $row2['additional'] ?>';
                                    " data-bs-toggle="modal" data-bs-target="#edit_department_head"><i class="bi bi-pen-fill"></i></a>
                                            <a class="btn btn-soft-danger btn-xs" href="department_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>
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
                    <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_department.php">
                        <!-- <label class="text-success" style="font-size:larger;">ID</label> -->
                        <input type="hidden" name="departId" value="" id="id_head" readonly>
                        <label style="color:black; font-weight:bold; margin:5px;">Main Department Name :</label>
                        <input type="text" name="school_name" value="" id="school_name_head" class="form-control"><br>

                        <label style="color:black; font-weight:bold; margin:5px;">Department Name :</label>
                        <input type="text" name="department_name" value="" id="department_name_head" class="form-control"><br>

                        <label style="color:black; font-weight:bold; margin:5px;">Description :</label>
                        <input type="text" name="description" value="" id="description" class="form-control"><br>

                        <label style="color:black; font-weight:bold; margin:5px;">Location :</label>
                        <input type="text" name="location" value="" id="location" class="form-control"><br>

                        <label style="color:black; font-weight:bold; margin:5px;">Contact Number :</label>
                        <input type="text" name="contact" value="" id="contact_number" class="form-control"><br>

                        <label style="color:black; font-weight:bold; margin:5px;">Email Id :</label>
                        <input type="text" name="email" value="" id="email" class="form-control"><br>

                        <label style="color:black; font-weight:bold; margin:5px;">Website :</label>
                        <input type="text" name="website" value="" id="website" class="form-control"><br>

                        <label style="color:black; font-weight:bold; margin:5px;">Additional Information :</label>
                        <input type="text" name="additional" value="" id="additional" class="form-control"><br>

                        <input class="btn btn-success" type="submit" name="submit" value="Submit" style="float: right;">
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

    <!-- Modal for select landing category -->
    <div class="modal fade" id="landing_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Select Type</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>

                        <a class="nav-link dropdown-toggle form-control" href="#selectlanding" role="button" data-bs-toggle="collapse" data-bs-target="#selectlanding" aria-expanded="false" aria-controls="selectlanding">

                            <span>Select Type</span>
                        </a>

                        <div id="selectlanding" class="nav-collapse collapse " data-bs-parent="#selectlandingDiv">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>includes/Pages/personal.php">Personal</a>
                            <a class="nav-link " type="button" data-bs-toggle="modal" data-bs-target="#alert_modal">Alert</a>
                            <a class="nav-link " type="button" data-bs-toggle="modal" data-bs-target="#image_modal">Image</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>


    <!-- Modal for checklist -->
    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Create Your Own Checklist</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include ROOT_PATH . 'includes/Pages/per_checklistform.php'; ?>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Add Images</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" enctype="multipart/form-data" id="multipleimage" action="<?php echo BASE_URL; ?>includes/Pages/insert_album.php">
                        <div class="input-field">
                            <label class="form-label" style="color:black; font-weight:bold;">Title</label>
                            <input type="text" name="title" class="form-control"><br>
                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Images</label>
                            <input type="file" class="form-control" name="album[]" id="" multiple /><br>

                            <input style="margin:5px; float: right;" type="submit" value="Submit" name="submitimage" class="btn btn-success" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="option_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Alert</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>

            </div>
        </div>
    </div>
    <!-- Modal for select landing category -->
    <div class="modal fade" id="landing_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Edit User</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered" id="usertable">
                        <input style="margin:5px;" class="form-control" type="text" id="usersearch" onkeyup="userlist()" placeholder="Search for names.." title="Type in a name">
                        <thead class="bg-dark">
                            <th class="text-white">Sr No</th>

                            <th class="text-white">Name</th>
                            <th class="text-white">User Id</th>
                            <th class="text-white">Profile image</th>
                            <th class="text-white">Role</th>

                        </thead>
                        <?php $query7 = "SELECT * FROM users  ORDER BY id ASC";
                        $statement = $connect->prepare($query7);
                        $statement->execute();

                        if ($statement->rowCount() > 0) {
                            $result = $statement->fetchAll();
                            $sn = 1;
                            foreach ($result as $row) {
                        ?>
                                <tr data-bs-toggle="modal" data-bs-target="#message_modal" onclick="document.getElementById('user_name').innerHTML='<?php echo $row['name'] ?>';
             document.getElementById('u_id').value='<?php echo $row['id'] ?>';
             ">
                                    <td><?php echo $sn++ ?></td>

                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['studid'] ?></td>
                                    <td><?php
                                        $prof_pic11 = $row['file_name'];


                                        if ($prof_pic11 != "") {
                                            $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                                                $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                            } else {
                                                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        }
                                        ?>
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                                        </div>
                                    </td>
                                    <td><?php echo $row['role'] ?></td>
                                </tr>
                        <?php
                            }
                        }       ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Select which ctp u want-->
    <div class="modal fade" id="select_course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Select Course</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <form action="<?php echo BASE_URL; ?>includes/Pages/add_group.php" method="get">
                            <span class="nav-link-title" style="font-weight:bold;">Course Name</span>
                            <select style="margin:5px;" type="text" id="course_fet" data-bs-toggle="collapse" class="form-select" autocomplete="off" name="course_fet">
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

                                        <option id="<?php echo $row1['Courseid'] ?>" class="<?php echo $row1['CourseName'] ?>" value="<?php echo $row1['Courseid'] ?>"><?php echo $name_of_ctp . ' - ' . '0' . $symbol_name; ?></option>
                                <?php }
                                } ?>
                            </select>
                            <button class="btn btn-success" type="submit" name="submit_course">Submit</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="test_Ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center bg-danger">
                    <h4 class="heading text-dark">Are you sure?</h4>
                </div>

                <!--Body-->
                <div class="modal-body">

                    <i class="bi bi-x-lg animated rotateIn"></i>

                </div>

                <!--Footer-->
                <div class="modal-footer flex-center">
                    <a href="" class="btn  btn-outline-danger">Yes</a>
                    <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newupdates" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <?php include ROOT_PATH . 'includes/newupdates.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    <!-- Phase File Edit Modals -->

    <div class="modal fade" id="editPhaseAttach" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Edit File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nav -->
                    <div class="text-center">
                        <ul class="nav nav-segment nav-pills mb-7" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="nav-one-egfirst-tab" href="#nav-one-egfirst" data-bs-toggle="pill" data-bs-target="#nav-one-egfirst" role="tab" aria-controls="nav-one-egfirst" aria-selected="true">Update</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-two-egtwo-tab" href="#nav-two-egtwo" data-bs-toggle="pill" data-bs-target="#nav-two-egtwo" role="tab" aria-controls="nav-two-egtwo" aria-selected="false">Edit</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav -->

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-one-egfirst" role="tabpanel" aria-labelledby="nav-one-egfirst-tab">
                            <form action="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php" enctype="multipart/form-data" method="post">
                                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose File
                                </label>
                                <input type="file" class="form-control" name="newPhaseFile" id="" />
                                <input type="hidden" name="oldPhaseFile" id="oldPhaseFile" />
                                <input type="hidden" name="phaseFileId" class="phaseFileId" />
                                <hr>
                                <input style="float:right;" class="btn btn-success" type="submit" value="Update" name="editPhaseFile" />
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-two-egtwo" role="tabpanel" aria-labelledby="nav-two-egtwo-tab">
                            <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOpt">
                                <option selected>Select File Method</option>
                                <!-- <option value="addNewPage">New Page</option> -->
                                <option value="addFile">Attachment</option>
                                <option value="addFileLoca">Drive Link</option>
                                <option value="addFileLink">Link</option>
                            </select>

                            <br>
                            <center>
                                <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php">
                                    <div class="input-field">
                                        <table class="table table-bordered">
                                            <tr>
                                                <input type="hidden" name="phaseFileId" class="phaseFileId" />
                                                <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                                    <input type="file" class="form-control" name="file" id="" />
                                                </td>
                                        </table>
                                    </div><br>
                                    <hr>
                                    <center>
                                        <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="attachement" class="btn btn-success" />

                                    </center>
                                </form>
                            </center>
                            <center>
                                <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
                                    <div class="input-field">
                                        <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                                        <table class="table table-bordered" id="table-field">
                                            <input type="hidden" name="phaseFileId" class="phaseFileId" />
                                            <tr>
                                                <td style="text-align: center;"><input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required /> </td>
                                                <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" /> </td>
                                                <td style="width:20px;"><button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <br>
                                    <hr>
                                    <center>
                                        <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
                                    </center>
                                </form>
                            </center>

                            <center>
                                <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
                                    <div class="input-field">
                                        <input type="hidden" name="phaseFileId" class="phaseFileId" />
                                        <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                                        <table class="table table-bordered" id="table-field-link">
                                            <tr>
                                                <td style="text-align: center;"><input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required /> </td>
                                                <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" /> </td>
                                                <td style="width:20px;"><button type="button" name="add_link" id="add_link" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <br>
                                    <hr>
                                    <center>
                                        <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
                                    </center>
                                </form>
                            </center>
                        </div>
                    </div>
                    <!-- End Tab Content -->



                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="editPhaseLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Edit Link</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <ul class="nav nav-segment nav-pills mb-7" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="nav-one-egfirst-tab" href="#nav-one-egfirstLink" data-bs-toggle="pill" data-bs-target="#nav-one-egfirstLink" role="tab" aria-controls="nav-one-egfirstLink" aria-selected="true">Update</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-two-egtwo-tab" href="#nav-two-egtwoLink" data-bs-toggle="pill" data-bs-target="#nav-two-egtwoLink" role="tab" aria-controls="nav-two-egtwoLink" aria-selected="false">Edit</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav -->

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-one-egfirstLink" role="tabpanel" aria-labelledby="nav-one-egfirst-tab">
                            <form action="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php" enctype="multipart/form-data" method="post">
                                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Name</label>
                                <input type="text" class="form-control" name="newPhaseLinkName" id="newPhaseLinkName" />
                                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Last Name</label>
                                <input type="text" class="form-control" name="newPhaseLinkLastName" id="newPhaseLinkLastName" />
                                <input type="hidden" name="phaseLinkId" class="phaseLinkId" />
                                <hr>
                                <input style="margin:5px;float: right;" class="btn btn-success" type="submit" value="Update" name="editPhaseLink" />
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-two-egtwoLink" role="tabpanel" aria-labelledby="nav-two-egtwo-tab">
                            <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOpt">
                                <option selected>Select File Method</option>
                                <!-- <option value="addNewPage">New Page</option> -->
                                <option value="addFile">Attachment</option>
                                <option value="addFileLoca">Drive Link</option>
                                <option value="addFileLink">Link</option>
                            </select>

                            <br>
                            <center>
                                <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php">
                                    <div class="input-field">
                                        <table class="table table-bordered">
                                            <tr>
                                                <input type="hidden" name="phaseFileId" class="phaseLinkId" />
                                                <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                                                    <input type="file" class="form-control" name="file" id="" />
                                                </td>
                                        </table>
                                    </div><br>
                                    <hr>
                                    <center>
                                        <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="attachement" class="btn btn-success" />

                                    </center>
                                </form>
                            </center>
                            <center>
                                <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
                                    <div class="input-field">
                                        <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                                        <table class="table table-bordered" id="table-field">
                                            <input type="hidden" name="phaseFileId" class="phaseLinkId" />
                                            <tr>
                                                <td style="text-align: center;"><input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required /> </td>
                                                <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" /> </td>
                                                <!-- <td style="width:20px;"><button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td> -->
                                            </tr>
                                        </table>
                                    </div>
                                    <br>
                                    <hr>
                                    <center>
                                        <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
                                    </center>
                                </form>
                            </center>

                            <center>
                                <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
                                    <div class="input-field">
                                        <input type="hidden" name="phaseFileId" class="phaseLinkId" />
                                        <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                                        <table class="table table-bordered" id="table-field-link">
                                            <tr>
                                                <td style="text-align: center;"><input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required /> </td>
                                                <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" /> </td>
                                                <!-- <td style="width:20px;"><button type="button" name="add_link" id="add_link" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td> -->
                                            </tr>
                                        </table>
                                    </div>
                                    <br>
                                    <hr>
                                    <center>
                                        <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
                                    </center>
                                </form>
                            </center>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>

    <!-- Edit Menu's Name Modal Varun -->

    <div class="modal fade" id="editMenusName" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">Add Custom Name</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo BASE_URL; ?>includes/Pages/addCustomMenuName.php">
                        <input class="form form-control" type="text" name="menuName" id="classMenuName" placeholder="Enter Custom Name" />
                        <input type="hidden" name="menuRef" id="menuRefName" />
                        <hr>
                        <input type="submit" value="Change" name="editMenuName" class="btn btn-success" style="float:right;" />
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- End -->

    <!-- Modal -->
    <div id="EsignMOdal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalCenterTitle">E Signature</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12" style="justify-content: center;display: flex;">
                            <?php
                            $fetchSig = $connect->query("SELECT signature FROM users WHERE id = '$user_id'");
                            $sigData = $fetchSig->fetchColumn();
                            ?>
                            <img src="<?php echo $sigData; ?>" style="height: 110px;width:150px;" />
                        </div>
                    </div>
                    <form action="<?php echo BASE_URL; ?>includes/Pages/addUserSignature.php" method="post" enctype="multipart/form-data">
                        <canvas id="signature-pad" width="475" height="200" class="form-control"></canvas>
                        <input type="hidden" name="signature_data" id="signature_data">

                </div>
                <div class="modal-footer">
                    <button type="button" name="addSignature" id="addSignature" class="btn btn-success">Save Signature</button>
                    <button type="button" id="clear-btn" class="btn btn-danger">Clear Signature</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- End Phase File Edit Modals -->
    <!-- Toast -->
    <div id="chatNotification"></div>
    <!-- End Toast -->



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
    <script src="<?php echo BASE_URL; ?>assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/datatables.net.extensions/select/select.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/clipboard/dist/clipboard.min.js"></script>


    <script src="<?php echo BASE_URL; ?>fullcalendar/lib/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>fullcalendar/lib/moment.min.js"></script>
    <script src="<?php echo BASE_URL; ?>fullcalendar/fullcalendar.min.js"></script>

    <script>
        (function() {
            // INITIALIZATION OF STEP FORM
            // =======================================================
            new HSStepForm('.js-step-form')
        });
    </script>

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
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/us.svg",
                        "code": "US"
                    },
                    {
                        "coords": [20, 77],
                        "name": "India",
                        "active": 300,
                        "new": 100,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/in.svg",
                        "code": "IN"
                    },
                    {
                        "coords": [60, -105],
                        "name": "Canada",
                        "active": 400,
                        "new": 500,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/ca.svg",
                        "code": "CA"
                    },
                    {
                        "coords": [51, 9],
                        "name": "Germany",
                        "active": 120,
                        "new": 600,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/de.svg",
                        "code": "DE"
                    },
                    {
                        "coords": [54, -2],
                        "name": "United Kingdom",
                        "active": 140,
                        "new": 100,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/gb.svg",
                        "code": "GB"
                    },
                    {
                        "coords": [1.3, 103.8],
                        "name": "Singapore",
                        "active": 56,
                        "new": 0,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/sg.svg",
                        "code": "SG"
                    },
                    {
                        "coords": [9.0, 8.6],
                        "name": "Nigeria",
                        "active": 34,
                        "new": 2,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/ng.svg",
                        "code": "NG"
                    },
                    {
                        "coords": [61.5, 105.3],
                        "name": "Russia",
                        "active": 135,
                        "new": 46,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/ru.svg",
                        "code": "RU"
                    },
                    {
                        "coords": [35.8, 104.1],
                        "name": "China",
                        "active": 325,
                        "new": 75,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/cn.svg",
                        "code": "CN"
                    },
                    {
                        "coords": [-10, -51],
                        "name": "Brazil",
                        "active": 242,
                        "new": 17,
                        "flag": "./assets/vendor/flag-icon-css/flags/1x1/br.svg",
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
        // INITIALIZATION OF LIVE TOAST
        // =======================================================
        const liveToast = new bootstrap.Toast(document.querySelector('#liveToast'))
        // document.querySelector('#liveToastBtn').addEventListener('click', () => liveToast.show())
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
    <!--search bar for department-->


    <!--search bar for division-->

    <script>
        function divSearch() {
            var input, filter, departments, department, departmentName, i;
            input = document.getElementById('divsearch');
            filter = input.value.toUpperCase();
            departments = document.getElementsByClassName('divisionsearch');

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
                        url: '<?php echo BASE_URL; ?>includes/Pages/update_noti.php',
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
                        url: '<?php echo BASE_URL; ?>includes/Pages/fetch_msg.php',
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
                            url: '<?php echo BASE_URL; ?>includes/Pages/check_available_Student.php',
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
                        url: '<?php echo BASE_URL; ?>includes/Pages/mark_read.php',
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
                        url: '<?php echo BASE_URL; ?>includes/Pages/mark_read_admin.php',
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
                        url: '<?php echo BASE_URL; ?>includes/Pages/fetch_student_acedemic.php',
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
                        url: '<?php echo BASE_URL ?>includes/Pages/check_id.php',
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
        // Add JavaScript to enable the collapsing behavior
        document.addEventListener("DOMContentLoaded", function() {
            var navbarVerticalMenuPagesEcommerceMenu = document.getElementById("navbarVerticalMenuPagesEcommerceMenu");
            if (navbarVerticalMenuPagesEcommerceMenu) {
                navbarVerticalMenuPagesEcommerceMenu.classList.add("show");
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var get_id = sessionStorage.getItem('set_id');
            $('#set_ctp').val(get_id);
            $('#set_ctp').on('change', function() {
                var get_val = $(this).val();
                sessionStorage.setItem('set_id', get_val);
                document.cookie = "fixed_ctp_id = " + get_val;
                window.location.href = '<?php echo BASE_URL; ?>includes/Pages/Next-home.php';
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
                localStorage.setItem('courseId', id);
                localStorage.setItem('courseClass', class1);


                if (role) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BASE_URL; ?>includes/check_cm_pm.php',
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
                        url: '<?php echo BASE_URL; ?>includes/selec_std.php',
                        data: 'course=' + id + '&ides=' + class1,
                        success: function(html) {

                            sessionStorage.setItem('id', countryID);
                            document.cookie = "course_ids = " + countryID;
                            document.cookie = "phpgetcourse = " + class1;
                            document.cookie = "allstudent2 = " + html;

                            $('#state').append(html);
                            window.location.reload();
                        }
                    });
                }

            });

            $('#select_class_re').on('change', function() {

                var studentname = $(this).val();

                var id = $(this).children(":selected").attr("id");

                window.location.href = '<?php echo BASE_URL; ?>includes/Pages/add_item_subitem.php?class_id=' + studentname + '&class=' + id;
            });
            //onchange of second dropdown select dynamic value from selec.php
            $('#state').on('change', function() {

                var studentname = $(this).val();
                //  console.log(studentname);
                if (studentname) {

                    sessionStorage.setItem('student', studentname);
                    document.cookie = "student = " + studentname;
                    localStorage.setItem('cookieStudent', studentname);
                    var getUrl = window.location;
                    var baseUrl = getUrl.pathname.split('/')[5];



                    if (studentname != 'all') {
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/testing_all.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/testing.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/tasklog_all.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/tasklog.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/clearance_all.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/clearance.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/CAP_all.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/CAP.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/memo_all.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/memo.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/discipline_all.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/discipline.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/discipline_all.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/discipline.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/checklistpage_all.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/checklistpage.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/newgradesheet.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/actual.php';
                        } else {
                            window.location.reload();
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/newgradesheetcl.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/actual.php';
                        }
                    }
                    if (studentname == 'all') {
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/testing.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/testing_all.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/tasklog.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/tasklog_all.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/clearance.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/clearance_all.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/CAP.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/CAP_all.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/memo.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/memo_all.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/discipline.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/discipline_all.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/checklistpage.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/checklistpage_all.php';
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/newgradesheet.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/Home.php';
                        } else {
                            window.location.reload();
                        }
                        if (baseUrl == "<?php echo BASE_URL; ?>includes/Pages/newgradesheetcl.php") {
                            window.location.href = '<?php echo BASE_URL; ?>includes/Pages/actual.php';
                        }
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
        //     function showDropdown(element) {
        //   $(element).addClass('show');
        //   $(element).find('.dropdown-menu').addClass('show');
        //   const classH = $(element).data("class");
        //   const classC = $(element).data("color");
        //   $("." + classH).css('background', classC);
        // }

        // function hideDropdown(element) {
        //   $(element).removeClass('show');
        //   $(element).find('.dropdown-menu').removeClass('show');
        //   const classH = $(element).data("class");
        //   const classC = $(element).data("color");
        //   $("." + classH).css('background', "#377dff1a");

        // }
    </script>


    <!-- <script>
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
    </script> -->
    <script>
        $(document).ready(function() {
            // Toggle dropdown content when clicking the toggle button or spans
            $('.courcedropdowntoggle, #get_co_name, #get_co_name1').on('click', function(event) {
                var dropdownContent = $("#dropdownContent");
                dropdownContent.toggle(); // Toggle display between "block" and "none"
                event.stopPropagation(); // Prevent the click event from reaching the document click handler
            });

            // Hide the element when clicking anywhere outside the dropdown content and toggle button
            $(document).on('click', function(event) {
                var dropdownContent = $("#dropdownContent");
                var toggleButton = $(".courcedropdowntoggle");

                if (!toggleButton.is(event.target) && !dropdownContent.is(event.target) && dropdownContent.has(event.target).length === 0) {
                    dropdownContent.hide();
                }
            });
        });
    </script>




    <script>
        function openSelectedPage(selectedValue) {
            if (selectedValue === "personal") {
                window.location.href = "<?php echo BASE_URL; ?>includes/Pages/personal.php"; // Replace with the URL of the personal page
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
                url: '<?php echo BASE_URL; ?>includes/Pages/fetch_file_name.php',
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

        $(".image-container1").on("click", function() {
            $(".zoom-popup1").toggleClass("zoomProfile");
        });

        $(".image-container").on("click", function() {
            $(".zoom-popup").toggleClass("zoomProfile");
        });
    </script>

    <!-- Add this script after loading jQuery -->
    <script>
        $(document).ready(function() {
            var currentClickedDiv = null;

            $(document).on("click", ".set_student", function() {
                var id = $(this).data("id");
                var getstudent1 = sessionStorage.getItem('student');

                // Batch DOM manipulations
                if (getstudent1) {
                    $(".set_student" + getstudent1).css("background-color", "").addClass("bg-soft-secondary").removeClass("bg-primary");
                }

                if (currentClickedDiv) {
                    currentClickedDiv.css("background-color", "").addClass("bg-soft-secondary").removeClass("bg-primary");
                }

                $(this).css("background-color", "#00c9a7").removeClass("bg-soft-secondary").addClass("bg-primary");

                // Update the currently clicked div
                currentClickedDiv = $(this);

                if (id) {
                    sessionStorage.setItem('student', id);
                    document.cookie = "student=" + id;
                    localStorage.setItem('cookieStudent', id);
                    // Avoid unnecessary reloads if possible
                    window.location.reload();
                }
            });

            var getstudent1 = sessionStorage.getItem('student');
            // alert(getstudent1)
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
                url: '<?php echo BASE_URL; ?>includes/Pages/delete_notis.php',
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




    <!-- <script type="text/javascript">
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
</script> -->

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

    <script type="text/javascript">
        $(document).ready(function() {
            $(".next-button").click(function() {
                // Get the current tab
                var currentTab = $(this).closest(".tab-pane");

                // Get the ID of the next tab
                var nextTabId = currentTab.next(".tab-pane").attr("id");

                // Switch to the next tab
                $('a[href="#' + nextTabId + '"]').tab('show');
            });

            $(".previous-button").click(function() {
                // Get the current tab
                var currentTab = $(this).closest(".tab-pane");

                // Get the ID of the previous tab
                var prevTabId = currentTab.prev(".tab-pane").attr("id");

                // Switch to the previous tab
                $('a[href="#' + prevTabId + '"]').tab('show');
            });
        });
    </script>

    <script>
        $("#doneBtn").on("click", function() {
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/hideUpdate.php',
                data: '',
                success: function(response) {
                    // alert(response);
                    window.location.reload();
                }
            });
        })
    </script>
</body>

<script>
    $(document).ready(function() {
        // Function to be called
        function myFunction() {
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/fetchChatNotification.php',
                data: {
                    userId: "user",
                },
                success: function(response) {
                    $("#chatNotification").empty();
                    $("#chatNotification").html(response);
                }
            });
        }

        // Call the function on page load
        myFunction();

        // Call the function every 5 seconds
        setInterval(myFunction, 15000); // 5000 milliseconds = 5 seconds
    });
</script>

<script>
    $(document).ready(function() {
        function myFunctionNoti() {
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/fetchChatNotification.php',
                data: {
                    msgRead: "msgRead",
                },
                success: function(response) {
                    if (response > 0) {
                        $(".msgCount").css("display", "");
                        $(".msgCount").empty();
                        $(".msgCount").text(response);
                    }

                }
            });
        }
        myFunctionNoti();

        // Call the function every 5 seconds
        setInterval(myFunctionNoti, 5000); // 5000 milliseconds = 5 seconds
    });
</script>

<script type="text/javascript">
    function studentSearch() {
        var input, filter, students, student, a, i, txtValue;
        input = document.getElementById('studentSearch');
        filter = input.value.toUpperCase();
        students = document.querySelectorAll('.set_student');

        for (i = 0; i < students.length; i++) {
            student = students[i].getElementsByTagName('span')[0];
            txtValue = student.textContent || student.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                students[i].style.display = '';
            } else {
                students[i].style.display = 'none';
            }
        }
    }
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
            $('.nav-link.session[href="' + activeLink + '"]').addClass('active');
            // Show the parent nav-collapse to keep it open
            $('.nav-link.session[href="' + activeLink + '"]').closest('.nav-collapse').addClass('show');
        }

        // Handling click event on nav-links
        $('.nav-link.session').click(function(e) {
            // Set the clicked link's href in a cookie
            setCookie("activeLink", $(this).attr('href'), 1);
        });
    });
</script>

<script>
    $(document).on("click", ".editPhaseFile", function() {
        const phaseFileId = $(this).data("fileid");
        const phaseFileName = $(this).data("filename");
        $(".phaseFileId").val(phaseFileId);
        $("#oldPhaseFile").val(phaseFileName);
    });

    $(document).on("click", ".editPhaseLink", function() {
        const phaseLinkId = $(this).data("fileid");
        const phaseLinkName = $(this).data("filename");
        const phaseLinkLastName = $(this).data("filelastname");
        $("#newPhaseLinkName").val(phaseLinkName);
        $("#newPhaseLinkLastName").val(phaseLinkLastName);
        $(".phaseLinkId").val(phaseLinkId);
    });

    $(document).on("click", ".driveLinkPer", function() {
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

<script>
    // Add an event listener to the modal to focus on the input when it's shown
    // $('#SearchModalAll').on('shown.bs.modal', function () {
    //   console.log("hello");
    //   $('#myInput').focus();
    // });
</script>

<script src="<?php echo BASE_URL; ?>assets/signature/signature.js"></script>
<script>
    var canvas = document.getElementById('signature-pad');
    var signaturePad = new SignaturePad(canvas);

    document.querySelector('form').addEventListener('submit', function(e) {

    });
    document.getElementById('clear-btn').addEventListener('click', function() {
        signaturePad.clear();
    });

    $("#addSignature").on("click", function() {
        var dataUrl = signaturePad.toDataURL();

        $.ajax({
            type: 'POST',
            url: '<?php echo BASE_URL; ?>includes/Pages/addUserSignature.php',
            data: {
                signatureData: dataUrl,
            },
            success: function(response) {
                window.location.reload();
                // console.log(response);
            }
        });
        // alert(dataUrl);
        // document.getElementById('signature_data').value = dataUrl;
    })

    $(document).on("change", ".fileOpt", function() {
        if ($(this).val() == "addFile") {
            $(".multipleFile").css("display", "block");
            $(".phase_form").css("display", "none");
            $(".filelink").css("display", "none");
            $(".newpageform").css("display", "none");
            $(".file").css("display", "block");
        }

        if ($(this).val() == "addFileLoca") {
            $(".phase_form").css("display", "block");
            $(".multipleFile").css("display", "none");
            $(".filelink").css("display", "none");
            $(".newpageform").css("display", "none");
            $(".file").css("display", "block");
        }
        if ($(this).val() == "addFileLink") {
            $(".phase_form").css("display", "none");
            $(".multipleFile").css("display", "none");
            $(".newpageform").css("display", "none");
            $(".filelink").css("display", "block");
            $(".file").css("display", "block");
        }


    });
</script>

<script>
    var cookieStudent = localStorage.getItem('cookieStudent');
    var cookiePhpGetCourse = localStorage.getItem('cookiePhpGetCourse');
    var cookieCourseId = localStorage.getItem('cookieCourseId');

    document.cookie = "course_ids = " + cookieCourseId;
    document.cookie = "phpgetcourse = " + cookiePhpGetCourse;
    document.cookie = "student = " + cookieStudent;
</script>

<!-- <script type="text/javascript">
    function showHide(elementid){
            if (document.getElementById(elementid).style.display == 'none'){
                document.getElementById(elementid).style.display = '';
            } else {
                document.getElementById(elementid).style.display = 'none';
            }
    }
    window.onload = function () { reSizeTextarea(); showHide('loading-screen'); }
</script> -->

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

<script>
    // $('#muteBtn').change(function() {
    $(document).on('change', '.muteBtn', function() {
        if ($(this).is(':checked')) {
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/setMute.php',
                data: {
                    mute: "mute",
                },
                success: function(response) {
                    // $("#divisionContainer").empty();
                    // $("#divisionContainer").html(response);
                    window.location.reload();
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>includes/Pages/setMute.php',
                data: {
                    unMute: "unMute",
                },
                success: function(response) {
                    // $("#divisionContainer").empty();
                    // $("#divisionContainer").html(response);
                    window.location.reload();
                }
            });
        }
    });
</script>

<script>
    $(".customMenuBtns").on("click", function() {
        var menuName = $(this).data("menuname");
        var menuRef = $(this).data("menuref");

        $("#classMenuName").val(menuName);
        $("#menuRefName").val(menuRef);
    })
</script>

</html>