
<!-- <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script> -->
<!-- <script type="text/javascript">
        function showDropdown(element) {
            $(element).addClass('show');
            $(element).find('.dropdown-menu').addClass('show');
        }

        function hideDropdown(element) {
            $(element).removeClass('show');
            $(element).find('.dropdown-menu').removeClass('show');
        }
    </script> -->
<style type="text/css">
     #alert_Form {
            display: none;
        }
        .offcanvas-end.wide-offcanvas {
            width: 95%;
        }
</style>
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
            $_SESSION['mainDName']=$mainDName;
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
                <?php
                if ($role == "instructor") {
                ?>
                    <span class="nav-link-title text-success archana" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $_SESSION['department_NAME']; ?>" style="cursor: pointer;font-weight:bolder;">
                        <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/dashboard/mydashboard.php';"><?php echo $mainDName; ?>/<?php $_SESSION['department_NAME']; ?> </span>
                        <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><i class="bi bi-caret-down text-dark"></i></span>
                    </span>
                    <?php
                }else{
                    ?>
                    <span class="nav-link-title text-success archana" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $_SESSION['department_NAME']; ?>" style="cursor: pointer;font-weight:bolder;">
                        <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?>/<?php $_SESSION['department_NAME']; ?> </span>
                        <span data-bs-toggle="modal" data-bs-target="<?php echo $depModal; ?>"><i class="bi bi-caret-down text-dark"></i></span>
                    </span>
                    <?php
                }
                ?>

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
                    <span class="nav-link-title text-success varun" aria-label="Front" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $mainDName ?> / <?php echo $department; ?>" style="cursor: pointer;font-weight:bolder;">
                        <?php if (isset($department)) {
                        ?>

                            <span onclick="window.location.href='<?php echo BASE_URL; ?>includes/Pages/Home.php';"><?php echo $mainDName; ?>/<?php echo $department; ?> </span>
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
                <!-- <ul class="navbar-nav">
                  <li class="nav-item">Menu</li>  
                  <li class="nav-item">Linnk</li>  
                  <li class="nav-item">Drive</li>  
                  <li class="nav-item">Mega Menu</li>  
                  <li class="nav-item">Navbar</li>  
                  <li class="nav-item">Content</li>  
                </ul> -->
                <ul class="navbar-nav" style="list-style-type:none;">

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
                }else{
                    ?>
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
                       <button style="font-size:x-large;" data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>Test/index.php" style="color: #71869d;">
                                <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/home_1.png" style="height:30px; width: 30px; margin: 3px;"></a>
                        </button>
                    </li>

                    <?php
                                            }} else {
                                            ?>
                    <li class="nav-item">
                       <button style="font-size:x-large;" data-bs-placement="bottom" title="Dashboard" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a href="<?php echo BASE_URL ?>includes/Pages/Home.php" style="color: #71869d;">
                                <img src="<?php echo BASE_URL; ?>assets/svg/menuicon/home_1.png" style="height:30px; width: 30px; margin: 3px;"></a>
                        </button>
                    </li>
                    <?php } ?>
                    <?php } ?>

                    <!-- <div style="display:flex;"> -->
                        <li class="nav-item">
                            <?php include(ROOT_PATH ."Library/libraryMenuFiles.php"); ?>
                        
                            </li>  
                            <li class="nav-item">  
                          <button data-bs-toggle="modal" data-bs-target="#LibraryModal" class="btn btn-ghost-secondary btn-icon" style="margin: 5px;margin-top: 10px;">
                              <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height: 30px;margin-top: -5px;">
                              <!-- <span class="text-truncate" style="font-size: large;color: #7901c1;">Main</span> -->
                          </button></li>
                          
                    <!-- </div> -->

                    <li class="nav-item d-none" style="margin-left: 8px;">
                        <a class="btn btn-ghost-secondary btn-icon" href="<?php echo BASE_URL; ?>includes/Pages/deconflicter/calendar.php"><img style="height: 25px;width: 25px;" src="<?php echo BASE_URL; ?>assets/svg/menuicon/calendar.png" title="Cource Calendar">
                        </a>
                    </li>

                    
                    <li class="nav-item d-none">
                       <button style="font-size:xx-large;" data-bs-placement="bottom" title="Menu" type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" data-bs-dropdown-animation>
                            <a style="color: #71869d;">
                              <i class="bi bi-list"></i>
                            </a>
                        </button>
                    </li>

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
                       <?php include ROOT_PATH . 'includes/Pages/hs_test_admin.php';?> 
                    </li> 
                                            <?php
                                            }} else {
                                            ?>

                                                <li class="nav-item">

                        <?php 
                        
                       if (isset($_COOKIE['course_ids']) && isset($_COOKIE['student']) && $_COOKIE['student']!='all' || $role=="student") {
                        include ROOT_PATH . 'includes/Pages/hs_gradesheet.php'; 
                      }else if(isset($_COOKIE['student']) && isset($_COOKIE['course_ids']) && $_COOKIE['student']=='all'){
                         include ROOT_PATH . 'includes/Pages/hs_gradesheet_all.php';  
                     }else if(isset($_COOKIE['course_id'])){
                        include ROOT_PATH . 'includes/Pages/hs_scheduling_all.php';  
                     }else{
                        include ROOT_PATH . 'includes/Pages/select_user.php'; 
                   
                     }?>
                    </li>
                                            <?php } ?>
                    
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


                    <li class="nav-item">
                        <?php
                if ($role == "super admin" || $role == "instructor") {
                    ?>
                      
                      <img src="<?php echo BASE_URL;?>assets/svg/menuicon/alert3.png" style="height: 25px; width:25px;margin-right: 5px; margin-left:5px;cursor: pointer;" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-target="#alert_modal" title="Send Alert">
                <?php
                      }
                ?>  
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


                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Activity -->
                        <button style="font-size:x-large;" class="btn btn-ghost-secondary btn-icon rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasActivityStream11" aria-controls="offcanvasActivityStream11" data-bs-placement="bottom" title="Alert/Todo's">
                            <img src="<?php echo BASE_URL;?>assets/svg/menuicon/alert_2.png" style="height: 30px;">
                        </button>
                        <!-- Activity -->
                    </li>

                    <!-- <li class="nav-item d-none d-sm-inline-block">
                        <span data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">Hello</span>
                    </li> -->

                    <li class="nav-item">
                        <!-- user modal -->

                        <?php include ROOT_PATH . 'includes/Pages/profileinfo.php'; ?>
                        <!-- End user modal -->
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
        </div>
    </header>

<?php
    include ROOT_PATH . 'includes/Pages/offcanvas.php';
?>


<!-- Modal -->
<div id="SearchModalAll" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center" style="margin-top: -25px;">
            <img class="col-md-3 col-lg-3 col-sm-4 mt-5 pt-5" src="<?php echo BASE_URL;?>assets/svg/search/search1.png" alt="" srcset="" style="width: 10rem;">
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
<!-- End Modal -->

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
    <?php
                    // $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
                    include ROOT_PATH . 'includes/Pages/menu_modal.php';
                    include ROOT_PATH . 'includes/Pages/editmodalmenu.php';
                
include ROOT_PATH . 'includes/Pages/addmegadropdown.php';

                    ?>
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
                                        <div class="col-md-4 departmentsearch" style="cursor:pointer;width: auto;">
                                            <div class="col-12 rounded" style="">
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
                                    <div class="col-md-4 departmentsearch" style="cursor:pointer; width: auto;">
                                        <div class="col-12 rounded">
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

 <div id="LibraryModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="max-width:1500px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h3 class="modal-title text-success" id="exampleModalCenterTitle">E Signature</h3> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                       include ROOT_PATH . 'Library/mainlib.php';
                     ?>

                </div>
                
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <script>
        // $(document).ready(function() {
        //     $("#myInput").keyup(function() {
        //         var search = $(this).val();
        //         var search_user_id = $(this).data('userid');
        //         if (search != "") {
        //             $.ajax({
        //                 type: 'GET',
        //                 url: '<?php echo BASE_URL; ?>includes/Pages/globalsearch.php',
        //                 data: {
        //                     search_data: search,
        //                     search_user_id: search_user_id
        //                 },
        //                 success: function(response) {
        //                     console.log(response);
        //                     // $('.searchResult1').empty();
        //                     $('#searchDropdownMenu').html(response);
        //                 }
        //             });
        //         } else {
        //             $('#searchDropdownMenu').html('');
        //         }
        //     });
        // });

        $(document).ready(function() {
            $('#searchDropdownMenu').hide();
            $(document).on('click', 'body', function() {
                $('#searchDropdownMenu').hide();
            });
            $(document).on('keyup', "#myInput", function() {
                var search = $(this).val();
                if ($.trim(search).length) {
                    $('#searchDropdownMenu').show('slow');
                } else {
                    $('#searchDropdownMenu').hide('slow');
                }
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


    <!--search bar for deparment list table-->


