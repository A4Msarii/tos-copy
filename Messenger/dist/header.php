<?php
$user_id = $_SESSION['login_id'];
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

$department_Id = "";
if (isset($_SESSION['department_Id'])) {
    $department_Id = $_SESSION['department_Id'];
} else {
    $department_Id = $_SESSION['inst_id'];
}

$username = "";
if (isset($_SESSION['nickname'])) {
    $username = $_SESSION['nickname'];
}
$icon = '<span></span>';
include ROOT_PATH . 'includes/Pages/allnotification.php';
?>
<style type="text/css">
    .offcanvas-end.wide-offcanvas {
        width: 70% !important;
    }

    .message-count {
        position: absolute;
        top: 6px !important;
        right: 1px !important;
        background-color: #377dff;
        color: white;
        border-radius: 117%;
        padding: 10px 7px !important;
        font-size: 12px;
        height: 20px !important;
        width: 23px !important;
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

</style>
<!-- <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: -20px; margin-right: -20px;height: 60px;">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">hello</span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
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
                }
            }

            if (isset($_SESSION['department_NAME'])) {
            ?>
                <a class="navbar-brand">
                    <div class="avatar avatar-sm avatar-circle d-none">
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
                            <span class="nav-link-title text-dark" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $_SESSION['mainDName'] ?> / <?php echo $_SESSION['department_NAME']; ?>" style="cursor: pointer;font-weight:bolder;">
                                <span onclick="window.location.href='<?php echo BASE_URL; ?>Test/dashboard/dashboard.php';"><?php echo $_SESSION['mainDName']; ?></span> / <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $_SESSION['department_NAME']; ?> </span>
                            </span>
                        <?php
                        }
                    } else {
                        ?>

                        <span class="nav-link-title text-success" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $_SESSION['mainDName']; ?> / <?php echo $_SESSION['department_NAME']; ?>" style="cursor: pointer;font-weight:bolder;">
                            <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $_SESSION['mainDName']; ?></span> / <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $_SESSION['department_NAME']; ?> </span>
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
                    <span class="nav-link-title text-success" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;">
                            <?php if (isset($department)) {
                            ?>

                                <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?></span> /<span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $department; ?> </span>
                            <?php
                            }
                            ?>
                        </span>

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

                        <span class="nav-link-title text-success" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $_SESSION['mainDName'] ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;">
                            <?php if (isset($department)) {
                            ?>

                                <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $_SESSION['mainDName']; ?></span> /<span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><?php echo $department; ?> </span>
                            <?php
                            }
                            ?>
                        </span>
                    <?php } ?>
                </a>
            <?php } ?>
        </ul>
        <div class="form-inline my-2 my-lg-0" style="display: flex;position: absolute;right: 0px;">
            <ul class="navbar-nav">

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

                        <li class="nav-item">
                            <button style="font-size:x-large; margin-right: -10px;" data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                                <a href="<?php echo BASE_URL ?>Test/index.php" style="color: #71869d;">
                                    <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/home_1.png" style="height:30px; width: 30px; margin: 3px;"></a>
                            </button>
                        </li>

                    <?php
                    }
                } else {
                    ?>
                    <li class="nav-item">
                        <button style="font-size:x-large; margin-right: -10px;" data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>includes/Pages/Home.php" style="color: #71869d;">
                                <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/home_1.png" style="height:30px; width: 30px; margin: 3px;"></a>
                        </button>
                    </li>
                <?php } ?>

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
                        <li class="nav-item">
                            <?php include ROOT_PATH . 'includes/Pages/hs_test_admin.php'; ?>
                        </li>
                    <?php
                    }
                } else {
                    ?>

                    <li class="nav-item">

                        <?php
                        if (isset($_COOKIE['phpgetcourse']) && isset($_COOKIE['student']) && $_COOKIE['student'] != 'all') {
                            include ROOT_PATH . 'includes/Pages/hs_gradesheet.php';
                        } else if (isset($_COOKIE['student']) && isset($_COOKIE['course_ids']) && $_COOKIE['student'] == 'all') {
                            include ROOT_PATH . 'includes/Pages/hs_gradesheet_all.php';
                        } ?>
                    </li>
                <?php } ?>

                <!-- End Landings -->
                <!-- <li class="nav-item">
                        <button data-bs-placement="bottom" title="Search" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>includes/Pages/global_search.php" style="color: #71869d;">
                                <i class="bi bi-search"></i></a>
                        </button>

                    </li> -->

                <li class="nav-item" style="margin-right: 20px;">
                    <?php
                    if ($role == "super admin" || $role == "instructor") {
                    ?>

                        <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/alert3.png" style="height: 25px; width:25px;margin-left: 15px;cursor: pointer;top: 20px;position: absolute;" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-target="#alert_modal" title="Send Alert">
                    <?php
                    }
                    ?>
                </li>

                <li class="nav-item d-none" style="position: relative;left: 40px;">
                    <!-- message -->

                    <?php include ROOT_PATH . 'includes/Pages/message_tab.php'; ?>
                    <!-- End message -->
                </li>

                <li class="nav-item d-none d-sm-inline-block" style="position: relative;right: -20px;">
                    <!-- Notification -->

                    <?php include ROOT_PATH . 'includes/Pages/notification_tab.php'; ?>
                    <!-- End Notification -->
                </li>


                <li class="nav-item d-none d-sm-inline-block">
                    <!-- Activity -->
                    <button style="font-size:x-large;" class="btn btn-ghost-secondary btn-icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivityStream11" aria-controls="offcanvasActivityStream11">
                        <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/alert_2.png" style="height: 30px;">
                    </button>
                    <!-- Activity -->
                </li>

                <!-- <li class="nav-item d-none d-sm-inline-block">
                        <span data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">Hello</span>
                    </li> -->

                <li class="nav-item">
                    <!-- user modal -->

                    <div class="dropdown">
                        <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <div class="avatar avatar-md avatar-circle" style="margin-top: 10px;">
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


                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/profile.php">Change Profile</a>
                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/organization.php">Organization Chart</a>
                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/per_checklist.php">Checklist</a>
                            <!-- <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#newupdates" style="cursor: pointer;">New Updates </a> -->
                            <a class="dropdown-item" href="#">Settings</a>

                            <div id="navbarVerticalMenuPagesMenu">
                                <div class="nav-item">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarFavorite" aria-expanded="false" aria-controls="navbarFavorite">
                                        <span class="nav-link-title">Favourite</span>
                                    </a>
                                    <div id="navbarFavorite" class="nav-collapse collapse hide" data-bs-parent="#navbarFavorite" hs-parent-area="#navbarFavorite">

                                        <div id="navbarUsersMenuDiv">
                                            <div class="nav-item">
                                                <div style="position:relative; display: inline-block; margin: 5px;">
                                                    <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="redcolor">
                                                        <span style="color:black; position:absolute; z-index: 99;" class="nav-link-title" id="red"></span>
                                                    </a>

                                                </div>
                                                <div style="position:relative; display: inline-block; margin: 5px;">
                                                    <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="greencolor">
                                                        <span style="color:black; position:absolute; z-index: 99;" class="nav-link-title" id="green"></span>
                                                    </a>

                                                </div>
                                                <div style="position:relative; display: inline-block; margin:5px;">
                                                    <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="yellowcolor">
                                                        <span style="color:black; position:absolute; z-index: 99;" class="nav-link-title" id="yellow"></span>
                                                    </a>

                                                </div>
                                                <div style="position:relative; display: inline-block; margin: 5px;">
                                                    <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="bluecolor">
                                                        <span style="color:black; position:absolute; z-index: 99;" class="nav-link-title" id="blue"></span>
                                                    </a>

                                                </div>
                                                <div style="position:relative; display: inline-block; margin: 5px;">
                                                    <a href="<?php echo BASE_URL; ?>Library/favouriteData.php" class="nav-link colors" name="greycolor">
                                                        <span style="color:black; position:absolute; z-index:99;" class="nav-link-title" id="grey"></span>
                                                    </a>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>includes/Pages/logout.php">Sign out</a>
                        </div>
                    </div>



                    <!-- End user modal -->
                </li>
            </ul>
        </div>
    </div>
</nav>

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
                <?php
                // $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
                include ROOT_PATH . 'includes/Pages/alertform.php';
                ?>

            </div>

        </div>
    </div>
</div>

<div id="chatNotification"></div>

<script type="text/javascript">
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
        const user_ID = <?php echo $user_id ?>;
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