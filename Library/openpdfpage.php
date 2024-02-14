<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'lb_thumbnail.php'; ?>
    <title>Document</title>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
    <style>
        /* .tox-toolbar__group {
            background-color: white !important;
        } */
    </style>
    <style>
        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
            /*  background-color: #eee;*/
            width: 50%;
            margin-left: 140px;
        }

        ul.breadcrumb li {
            display: inline;
            font-size: 18px;
        }

        ul.breadcrumb li+li:before {
            padding: 8px;
            color: grey;
            content: ">";
        }

        ul.breadcrumb li a {
            color: snow;
            text-decoration: none;
        }

        ul.breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }

        .page-content.blur {
            filter: blur(5px);
            /* Adjust the blur value as needed */
        }

        .modal.fade {
            transition: opacity 0.15s linear;
        }

        .modal-dialog {
            margin: 15% auto;
        }

        .modal-content {
            background-color: #fefefe;
            border: 1px solid #888;
        }

        #pdf_view {

            width: 100%;
            border: none;
        }
    </style>
</head>

<body>
    <?php include 'lb_loader.php'; ?>
    <div class="page-content" id="header-hide">
        <div>
            <?php include('./secondWindowHeader.php');
            if (isset($_REQUEST['fileID'])) {
                $_SESSION['fileID'] = $_REQUEST['fileID'];
                // $fileID = $_REQUEST['fileID'];
            }
            $fileID = $_SESSION['fileID'];

            $fileName1 = $connect->query("SELECT filename FROM user_files WHERE id = '$fileID'");
            $fileData = $fileName1->fetchColumn();

            $green = "#28a745";
            $red = "#dc3545";
            $yellow = "#ffc107";
            $blue = "#007bff";
            $black = "#6c757d";

            $greenUrl = BASE_URL . "Library/saveFavourite.php?favouriteDocxId=" . $fileID . "&colorName=" . urlencode($green) . "&fileType=user";
            $redUrl = BASE_URL . "Library/saveFavourite.php?favouriteDocxId=" . $fileID . "&colorName=" . urlencode($red) . "&fileType=user";
            $yellowUrl = BASE_URL . "Library/saveFavourite.php?favouriteDocxId=" . $fileID . "&colorName=" . urlencode($yellow) . "&fileType=user";
            $blueUrl = BASE_URL . "Library/saveFavourite.php?favouriteDocxId=" . $fileID . "&colorName=" . urlencode($blue) . "&fileType=user";
            $blackUrl = BASE_URL . "Library/saveFavourite.php?favouriteDocxId=" . $fileID . "&colorName=" . urlencode($black) . "&fileType=user";
            // if (isset($_REQUEST['pId'])) {
            //     $_SESSION['page_ID'] = $_REQUEST['pId'];
            // }

            if (isset($_REQUEST['brief_ID'])) {
                $breId = $_REQUEST['brief_ID'];
                $breSql = $connect->query("SELECT briefcase FROM briefcase WHERE id = '$breId'");
                $breRes = $breSql->fetchColumn();
            }

            if (isset($_REQUEST['userBrief_ID'])) {
                $breId = $_REQUEST['userBrief_ID'];
                $breSql = $connect->query("SELECT briefcase_name FROM user_briefcase WHERE id = '$breId'");
                $breRes = $breSql->fetchColumn();
            }


            if (isset($_REQUEST["pdfPageName"])) {
            }

            $pdf_name = $_SESSION['pdfPageName'] = $fileData;
            $extension = pathinfo($pdf_name, PATHINFO_FILENAME);
            $userId = $_SESSION['login_id'];

            $pdfPageName = $_SESSION['pdfPageName'];
            $ext = pathinfo($pdfPageName, PATHINFO_EXTENSION);
            ?>
        </div>

        <main id="content" role="main" class="main">

            <!-- Content -->
            <div class="content container-fluid">
                <center>
                    <div class="row justify-content-center">
                        <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php" style="text-decoration-line: none; color:white;margin-top: -65px;margin-bottom: 10px;">

                            <span style="font-size: xx-large; font-weight:bolder;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $extension; ?>">
                                <?php echo $extension; ?></span>

                        </a>
                        <div class="col-lg-10 mb-3 mb-lg-5" style="margin-right:200px;">
                            <div class="card-header card-header-content-center" style="background-color:black; border-bottom:none;display: none;">
                                <a href="" class="btn btn-soft-primary" style="float:right; margin-left: 5px;" type="button" data-bs-toggle="modal" data-bs-target="#expandpdf"><i class="bi bi-arrows-angle-expand" style="font-size: x-large;"></i></a>

                                <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $pdfPageName; ?>" class="btn btn-soft-primary" style="float: right;"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="font-size: x-large;"></i></a>


                            </div>
                            <!-- Card -->

                            <div class="card card-hover-shadow h-100" style="border:1px solid black;">
                                <!-- Body -->
                                <div class="card-body">

                                    <?php
                                    if ($ext == "docx" || $ext == "xlsx" || $ext == "pptx") {
                                    ?> <center>
                                            <img src="<?php echo BASE_URL; ?>assets/svg/open_link/3d/download3d.png" style="width:60%; height: 500px;" /><br>
                                        </center>
                                        <br>

                                        <p style="text-align: center;font-style: oblique; font-size:large;"> <label style="color:black; font-weight:bold;">Note : </label> For security reasons, Windows may prevent direct file opening. Instead, files are downloaded. Enable automatic opening or check the download folder</p>
                                    <?php
                                    } else {
                                    ?>
                                        <?php
                                        if ($ext == "png" || $ext == "svg" || $ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "webp") {
                                        ?>
                                            <span style="font-size: xx-large; font-weight:bolder;color: black;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $extension; ?>">
                                                <?php echo $extension; ?></span>
                                            <a href="" class="btn btn-soft-primary" style="float:right; margin-left: 5px;" type="button" data-bs-toggle="modal" data-bs-target="#expandimage"><i class="bi bi-arrows-angle-expand" style="font-size: large;"></i></a>

                                            <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $pdfPageName; ?>" class="btn btn-soft-primary" style="float: right;"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="font-size: large;"></i></a>
                                            <hr style="margin: 0px;">
                                            <iframe src="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $pdfPageName; ?>" id="pdf_view" frameborder="0" width="100%" height="700px"></iframe>
                                        <?php
                                        } else {
                                        ?>
                                            <!-- <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php" style="text-decoration-line: none; color:black;">

                                <span style="font-size: xx-large; font-weight:bolder;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $extension; ?>">
                                    <?php echo $extension; ?></span>

                            </a> -->
                                            <a href="" class="btn btn-soft-primary" style="float:right; margin-left: 5px;" type="button" data-bs-toggle="modal" data-bs-target="#expandpdf"><i class="bi bi-arrows-angle-expand" style="font-size: large;"></i></a>

                                            <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $pdfPageName; ?>" class="btn btn-soft-primary" style="float: right;"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="font-size:large;"></i></a>
                                            <iframe scrolling="no" style="overflow:hidden;" src="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $pdfPageName; ?>" id="pdf_view" frameborder="0" width="100%" height="3000"></iframe>
                                    <?php
                                        }
                                    }

                                    ?>
                                </div>
                                <!-- End Body -->

                            </div>
                            <!-- End Body -->

                        </div>
                        <!-- End Row -->

                    </div>
                </center>
            </div>
        </main>


        <div id="aside">
            <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-black" style="right:0px !important;top:65px;left: inherit;border-left: 1px solid white;z-index: 0;z-index:1;">
                <div class="navbar-vertical-container" style="height: fit-content; overflow-y:auto;">
                    <div class="navbar-vertical-footer-offset" style="height:auto;">

                        <div style="margin-top: 12%;margin-left: 10%;">
                            <h3 style="color:white;">Details</h3>
                            <?php
                            $creDetail = $connect->query("SELECT * FROM user_files WHERE id = '$fileID'");
                            while ($creData = $creDetail->fetch()) {
                                $fileUserId = $creData['user_id'];
                            ?>
                                <p style="color:white;">creted At <?php echo $creData['createdAt']; ?> By <?php echo $creData['createdBy']; ?></p>
                                <p style="color:white;">updated At <?php echo $creData['updatedAt']; ?> By <?php echo $creData['updatedBy']; ?></p>
                                <?php
                                $checkPhaseId = $connect->query("SELECT phaseId FROM folders WHERE id = '$f_id'");
                                if ($checkPhaseId->rowCount() > 0) {
                                    $phaseId = $checkPhaseId->fetchColumn();

                                    $checkPerAss = $connect->query("SELECT count(*) FROM phasefilepermission WHERE fileId = '$fileID' AND instId = '$userId' AND phaseId = '$phaseId'");

                                    $fetchRefIds = $connect->query("SELECT * FROM phasefilepermission WHERE fileId = '$fileID' AND phaseId = '$phaseId' AND status = 'Approved'");
                                    $coId = 0;
                                    $coCode = 0;
                                    while ($fetchRefIdsData = $fetchRefIds->fetch()) {
                                        if ($fetchRefIdsData['coursecode'] > $coId) {
                                            $coId = $fetchRefIdsData['coursecode'];
                                            $coCode = $fetchRefIdsData['courseName'];
                                            $year = $fetchRefIdsData['year'];
                                            $custom_number = $fetchRefIdsData['custom_number'];
                                        }
                                    }
                                    if ($coId > 0) {
                                        $fetchCtpName = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$coCode'");
                                        echo '<p style="color:white;">Version Number - ' . $year . ',' . $fetchCtpName->fetchColumn() . '-0' . $coId . ',' . $custom_number . '</p>';
                                        // echo $year . ",";
                                        // echo $fetchCtpName->fetchColumn() . "-0" . $coId . ",";
                                        // echo $custom_number;
                                    } else {
                                        echo "-";
                                    }
                                }

                                $fetchBrefId = $connect->query("SELECT phase FROM academic WHERE file = '$fileID'");
                                if ($fetchBrefId->rowCount() > 0) {
                                    $phaseId = $fetchBrefId->fetchColumn();
                                    $fetchRefIds = $connect->query("SELECT * FROM academicassignee WHERE filesId = '$fileID' AND phaseId = '$phaseId' AND status = 'Approved'");

                                    $checkPerAss = $connect->query("SELECT count(*) FROM academicassignee WHERE filesId = '$fileID' AND instId = '$userId' AND phaseId = '$phaseId'");

                                    $coId = 0;
                                    $coCode = 0;
                                    while ($fetchRefIdsData = $fetchRefIds->fetch()) {
                                        if ($fetchRefIdsData['coursecode'] > $coId) {
                                            $coId = $fetchRefIdsData['coursecode'];
                                            $coCode = $fetchRefIdsData['coursename'];
                                            $year = $fetchRefIdsData['year'];
                                            $custom_number = $fetchRefIdsData['customNumber'];
                                        }
                                    }
                                    if ($coId > 0) {
                                        $fetchCtpName = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$coCode'");
                                        echo '<p style="color:white;">Version Number - ' . $year . ',' . $fetchCtpName->fetchColumn() . '-0' . $coId . ',' . $custom_number . '</p>';
                                        // echo $year . ",";
                                        // echo $fetchCtpName->fetchColumn() . "-0" . $coId . ",";
                                        // echo $custom_number;
                                    } else {
                                        echo "-";
                                    }
                                }
                                ?>
                            <?php
                            }
                            ?>

                            <?php
                            $permissionQuery = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' AND permissionId = '$userId' ORDER BY id DESC LIMIT 2");
                            while ($perData = $permissionQuery->fetch()) {
                                if ($perData['userId'] == "All instructor" || $perData['userId'] == "Everyone" || $perData['userId'] == "None") {
                                    $perName = $perData['userId'];
                                } else {
                                    $perId = $perData['userId'];
                                    $perUserQuery = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                                    $perName = $perUserQuery->fetchColumn();
                                }
                            ?>
                                <p style="color:white;">This File Permission To <?php echo $perName; ?></p>
                            <?php
                            }
                            if ($fileUserId == $userId) {
                            ?>
                                <button name="" type="button" style="color:white ;" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pageper">More</button>
                            <?php } ?>
                            <hr>
                        </div>



                        <!-- End Navbar Vertical Toggle -->

                        <!-- Content -->
                        <div class="navbar-vertical-content">
                            <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                                <div id="navbarVerticalMenuPagesMenu">
                                    <div class="nav-item">
                                        <?php

                                        $phaseFilePer = $checkPerAss->fetchColumn();

                                        $fileType = $connect->query("SELECT role FROM user_files WHERE id = '$fileID'");
                                        $userRole = $fileType->fetchColumn();
                                        $fileType1 = $connect->query("SELECT user_id FROM user_files WHERE id = '$fileID'");
                                        $user_id = $fileType1->fetchColumn();
                                        if ($_SESSION['role'] == 'super admin') {
                                        ?>
                                            <a data-bs-toggle="modal" data-bs-target="#fileEdit" class="nav-link dropdown-toggle-split">
                                                <span style="color:white;" class="nav-link-title">
                                                    <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                        <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Edit1.png">
                                                    </div>
                                                    Edit
                                                </span>
                                            </a>
                                            <?php
                                        }
                                        if ($_SESSION['role'] == 'instructor') {
                                            $pagePer = $connect->query("SELECT permissionType FROM filepermissions WHERE pageId = '$fileID' AND (userId = 'Everyone' OR userId = '$userId' OR userId = 'All instructor')");
                                            $userPerData = $pagePer->fetchColumn();
                                            if ($fileUserId == $userId || $userPerData == 'readAndWrite') {
                                            ?>
                                                <a data-bs-toggle="modal" data-bs-target="#fileEdit" class="nav-link dropdown-toggle-split">
                                                    <span style="color:white;" class="nav-link-title">
                                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Edit1.png">
                                                        </div>
                                                        Edit
                                                    </span>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($_SESSION['role'] == 'student') {
                                            $pagePer = $connect->query("SELECT permissionType FROM filepermissions WHERE pageId = '$fileID' AND (userId = 'Everyone' OR userId = 'All instructor' OR userId = '$userId')");
                                            $userPerData = $pagePer->fetchColumn();
                                            if ($userPerData == 'readAndWrite' || $fileUserId == $userId) {
                                        ?>
                                                <a data-bs-toggle="modal" data-bs-target="#fileEdit" class="nav-link dropdown-toggle-split">
                                                    <span style="color:white;" class="nav-link-title">
                                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Edit1.png">
                                                        </div>
                                                        Edit
                                                    </span>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                        <a href="copy_file_data.php?copyId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                            <span style="color:white;" class="nav-link-title">
                                                <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                    <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Copy.png">
                                                </div>
                                                Copy
                                            </span>
                                        </a>
                                        <?php
                                        if ($_SESSION['role'] == 'super admin' || $user_id == $userId || $phaseFilePer > 0) {
                                        ?>
                                            <a href="move_link_data.php?copyId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                                <span style="color:white;" class="nav-link-title">
                                                    <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                        <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/move_1.png">
                                                    </div>
                                                    Move
                                                </span>
                                            </a>
                                            <a href="givePermission.php?filePermissionId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                                <span style="color:white;" class="nav-link-title">
                                                    <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                        <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/permission_1.png">
                                                    </div>
                                                    Permission
                                                </span>
                                            </a>
                                            <a href="update_editor_data.php?fileDeleteId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                                <span style="color:white;" class="nav-link-title">
                                                    <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                        <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/delete_1.png">
                                                    </div>
                                                    Delete
                                                </span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                </div>

                                <div id="navbarVerticalMenuPagesMenu">
                                    <div class="nav-item">
                                        <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarFileFavorite" aria-expanded="false" aria-controls="navbarFileFavorite">
                                            <span style="color:white;" class="nav-link-title">Favourite</span>
                                        </a>
                                        <div id="navbarFileFavorite" class="nav-collapse collapse hide" data-bs-parent="#navbarFileFavorite" hs-parent-area="#navbarFileFavorite">

                                            <div id="navbarUsersMenuDiv">
                                                <div class="nav-item">
                                                    <div style="position:relative;">
                                                        <a href="<?php echo $redUrl; ?>" class="nav-link">
                                                            <span style="color:white;" class="nav-link-title" id="red"></span>
                                                        </a>
                                                        <?php
                                                        $favQuery = $connect->query("SELECT id FROM favouritefiles WHERE favouriteColors = '#dc3545' AND fileId = '$fileID' AND userId = '$userId'");
                                                        $delFavId = $favQuery->fetchColumn();
                                                        if ($favQuery->rowCount() > 0) {
                                                        ?>
                                                            <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $delFavId; ?>&pageId=<?php echo $fileID ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div style="position:relative;">
                                                        <a href="<?php echo $greenUrl; ?>" class="nav-link">
                                                            <span style="color:white;" class="nav-link-title" id="green"></span>
                                                        </a>
                                                        <?php
                                                        $favQuery = $connect->query("SELECT id FROM favouritefiles WHERE favouriteColors = '#28a745' AND fileId = '$fileID' AND userId = '$userId'");
                                                        $delFavId = $favQuery->fetchColumn();
                                                        if ($favQuery->rowCount() > 0) {
                                                        ?>
                                                            <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $delFavId; ?>&pageId=<?php echo $fileID ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div style="position:relative;">
                                                        <a href="<?php echo $yellowUrl; ?>" class="nav-link">
                                                            <span style="color:white;" class="nav-link-title" id="yellow"></span>
                                                        </a>
                                                        <?php
                                                        $favQuery = $connect->query("SELECT id FROM favouritefiles WHERE favouriteColors = '#ffc107' AND fileId = '$fileID' AND userId = '$userId'");
                                                        $delFavId = $favQuery->fetchColumn();
                                                        if ($favQuery->rowCount() > 0) {
                                                        ?>
                                                            <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $delFavId; ?>&pageId=<?php echo $fileID ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div style="position:relative;">
                                                        <a href="<?php echo $blueUrl; ?>" class="nav-link">
                                                            <span style="color:white;" class="nav-link-title" id="blue"></span>
                                                        </a>
                                                        <?php
                                                        $favQuery = $connect->query("SELECT id FROM favouritefiles WHERE favouriteColors = '#007bff' AND fileId = '$fileID' AND userId = '$userId'");
                                                        $delFavId = $favQuery->fetchColumn();
                                                        if ($favQuery->rowCount() > 0) {
                                                        ?>
                                                            <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $delFavId; ?>&pageId=<?php echo $fileID ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div style="position:relative;">
                                                        <a href="<?php echo $blackUrl; ?>" class="nav-link">
                                                            <span style="color:white;" class="nav-link-title" id="grey"></span>
                                                        </a>
                                                        <?php
                                                        $favQuery = $connect->query("SELECT id FROM favouritefiles WHERE favouriteColors = '#6c757d' AND fileId = '$fileID' AND userId = '$userId'");
                                                        $delFavId = $favQuery->fetchColumn();
                                                        if ($favQuery->rowCount() > 0) {
                                                        ?>
                                                            <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favFile=<?php echo $delFavId; ?>&pageId=<?php echo $fileID ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                    </form>
                                                </div>

                                            </div>
                                            <hr>
                                        </div>
                                    </div>

                                    <!-- <div class="nav-item">
                                <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarExport" aria-expanded="false" aria-controls="navbarExport">
                                    <span style="color:white;" class="nav-link-title">Export</span>
                                </a>
                                <div id="navbarExport" class="nav-collapse collapse hide" data-bs-parent="#navbarExport" hs-parent-area="#navbarExport">

                                    <div id="navbarUsersMenuDiv">
                                        <div class="nav-item">
                                            <a href="<?php echo BASE_URL; ?>Library/savePDF.php?pdfId=<?php echo $pageId ?>" class="nav-link">
                                                <span style="color:white;" class="nav-link-title">PDF</span>
                                            </a>
                                            <a href="<?php echo BASE_URL; ?>Library/saveDocx.php?docxId=<?php echo $pageId ?>" class="nav-link">
                                                <span style="color:white;" class="nav-link-title">DOCX</span>
                                            </a>
                                            <a href="<?php echo BASE_URL; ?>Library/saveHtml.php?htmlId=<?php echo $pageId ?>" class="nav-link">
                                                <span style="color:white;" class="nav-link-title">HTML</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                                    <hr>
                                    <div class="nav-item" style="display:none;">
                                        <a class="nav-link" href="<?php echo BASE_URL; ?>Library/list_view_files.php" role="button" aria-expanded="false">

                                            <span style="color:white;" class="nav-link-title">List View</span>
                                        </a>

                                    </div>

                                    <div class="nav-item" style="display:none;">
                                        <a class="nav-link" href="<?php echo BASE_URL; ?>Library/grid_view_files.php" role="button" aria-expanded="false">

                                            <span style="color:white;" class="nav-link-title">Grid View</span>
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>



    <div class="modal fade" id="fileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- option to edit what -->
                    <select class="form-select" id="editpdf">
                        <option value="edit">edit name</option>
                        <option value="file">edit file</option>
                    </select>
                    <br>
                    <!-- edit name of file chnage both in folder and database -->
                    <form method="post" action="editUsernameFiles.php" enctype="multipart/form-data" id="edit_name">
                        <input type="hidden" class="form-control" name="fileId" value="<?php echo $fileID; ?>" id="" readonly />
                        <input type="text" name="fileName" class="form-control" value="<?php echo $extension ?>">
                        <input type="hidden" name="oldfileName" class="form-control" value="<?php echo $pdf_name ?>">
                        <br>
                        <br>
                        <input style="float:right;" class="btn btn-soft-dark" type="submit" name="editFilenameBtn" value="Submit">
                    </form>

                    <!-- option to add what type of file -->
                    <select class="form-select" id="fileOpt1" style="display:none">
                        <option selected>Select File Method</option>

                        <option value="addFile">upload other file</option>
                        <option value="addFileLoca">Drive Link</option>
                        <option value="addFileLink">Link</option>
                    </select>
                    <br>
                    <!-- edit file  -->
                    <form action="updateuserpdffiles.php" method="post" enctype="multipart/form-data" style="display:none" id="multipleFile1">
                        <input type="hidden" class="form-control" name="fileId" value="<?php echo $fileID; ?>" id="" readonly />
                        <div class="input-field">
                            <table class="table table-bordered">
                                <tr>

                                    <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                                        <input type="file" class="form-control" name="fileName" />
                                    </td>
                                </tr>
                            </table>
                        </div><br>
                        <center>
                            <input style="margin:5px;" type="submit" value="Submit" name="submitfileslibrary" class="btn btn-success" />

                        </center>
                    </form>
                    <form class="insert-phases phase_form" id="phase_form1" method="post" action="edit_files_locations.php" style="display:none" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="fileId" value="<?php echo $fileID; ?>" id="" readonly />
                        <div class="input-field">
                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">update with Files Location</label>
                            <table class="table table-bordered" id="table-field">
                                <tr>
                                    <td style="text-align: center;"><input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required /> </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" />
                                    </td>
                                </tr>
                            </table>
                        </div> <br>
                        <center>
                            <input style="margin:5px;" type="submit" value="Submit" name="submitfileslibrary" class="btn btn-success" />

                        </center>
                    </form>
                    <form class="insert-phases" id="filelink2" method="post" action="edit_files_link.php" style="display:none" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="fileId" value="<?php echo $fileID; ?>" id="" readonly />
                        <div class="input-field">
                            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
                            <table class="table table-bordered" id="table-field-link">
                                <tr>

                                    <td style="text-align: center;"><input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" />
                                    </td>
                                </tr>
                            </table>

                        </div> <br>
                        <center>
                            <input style="margin:5px;" type="submit" value="Submit" name="submitfileslibrary" class="btn btn-success" />

                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="pageper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Permission Detail</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <center>
                            <center>
                                <table class="table table-bordered" id="msarii">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th class="text-light">#</th>
                                            <th class="text-light">Permission Name</th>
                                            <th class="text-light">Permission Type</th>
                                            <th class="text-light">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="varuntest">
                                        <?php
                                        $permissionQuery = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' AND permissionId = '$userId'");
                                        $sn = 1;
                                        while ($perData = $permissionQuery->fetch()) {
                                            if ($perData['userId'] == "All instructor" || $perData['userId'] == "Everyone" || $perData['userId'] == "None") {
                                                $perName = $perData['userId'];
                                            } else {
                                                $perId = $perData['userId'];
                                                $perUserQuery = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                                                $perName = $perUserQuery->fetchColumn();
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $perName; ?></td>
                                                <td><?php
                                                    if ($perData['permissionType'] == "readOnly") {
                                                        echo "Read Only";
                                                    } elseif ($perData['permissionType'] == "readAndWrite") {
                                                        echo "Read And Write";
                                                    } else {
                                                        echo $perData['permissionType'];
                                                    }
                                                    ?></td>
                                                <td>
                                                    <a style="float:right;" href="<?php echo BASE_URL; ?>includes/Pages/delete_permission.php?PermissionFileDeleteId=<?php echo $perData['id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                                    <a style="float:right;" href="<?php echo BASE_URL; ?>Library/givePermission.php?filePermissionId=<?php echo $perData['pageId']; ?>"><i class="bi bi-pen-fill text-success"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $sn++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="expandpdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="width: 1700px;margin-left: -272px; height:900px;">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="pageName"><?php echo $pdfPageName; ?></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <iframe src="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $pdfPageName; ?>" id="pdf_view" frameborder="0" width="100%" height="700px"></iframe>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="expandimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
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
                    <div id="mySlider" class="carousel slide" data-ride="carousel" style="height:600px;">
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
                                    <a href="#mySlider" data-slide-to="<?php echo $index ?>" class="<?php if ($index === 0) {
                                                                                                        echo 'active';
                                                                                                    }
                                                                                                    ?>">
                                        <img src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $image ?>" alt="<?php echo $image ?>" width="50">
                                    </a>

                                <?php } ?>
                            </div>
                        </center>
                        <!-- Controls -->
                        <a class="carousel-control-prev text-primary" href="#mySlider" role="button" data-slide="prev" style="font-weight:bold;">
                            <span class="carousel-control-prev-icon text-primary btn btn-dark" aria-hidden="true"></span>
                            <!-- <span class="sr-only text-primary btn btn-soft-dark">Previous</span> -->
                        </a>
                        <a class="carousel-control-next text-primary" href="#mySlider" role="button" data-slide="next" style="font-weight: bold;">
                            <span class="carousel-control-next-icon text-primary btn btn-dark" aria-hidden="true"></span>
                            <!-- <span class="sr-only text-primary btn btn-soft-dark">Next</span> -->
                        </a>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($ext == "docx" || $ext == "xlsx" || $ext == "pptx") {
    ?>

    <?php
    }
    ?>
    <script>
        $("#editpdf").change(function() {

            if ($(this).val() == "edit") {
                $("#edit_name").css("display", "block");
                $("#fileOpt1").css("display", "none");
                $("#multipleFile1").css("display", "none");
                $("#phase_form1").css("display", "none");

                $("#filelink2").css("display", "none");
            }
            if ($(this).val() == "file") {
                $("#edit_name").css("display", "none");
                $("#fileOpt1").css("display", "block");
            }

        });
    </script>
    <script>
        // Get a reference to the select element
        var selectElement = document.getElementById("fileOpt1");

        // Attach an event listener to the select element
        selectElement.addEventListener("change", function() {
            // Get the value of the selected option
            var selectedOption = selectElement.options[selectElement.selectedIndex].value;

            // Check if the selected option value matches the desired value
            if (selectedOption === "addNewPage") {
                // Redirect the user to the desired page
                window.location.href = "<?php echo BASE_URL; ?>includes/Pages/text-editor-full.php";
            }
        });
    </script>
    <script>
        $("#fileOpt1").change(function() {

            if ($(this).val() == "addFile") {
                $("#multipleFile1").css("display", "block");
                $("#phase_form1").css("display", "none");
                $("#filelink2").css("display", "none");
                $("#newpageform").css("display", "none");

            }

            if ($(this).val() == "addFileLoca") {
                $("#phase_form1").css("display", "block");
                $("#multipleFile1").css("display", "none");
                $("#filelink2").css("display", "none");
                $("#newpageform").css("display", "none");

            }
            if ($(this).val() == "addFileLink") {

                $("#phase_form1").css("display", "none");
                $("#multipleFile1").css("display", "none");
                $("#filelink2").css("display", "block");
                $("#newpageform").css("display", "none");

            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#mySlider').carousel();
        });
    </script>

    <script>
        // Function to handle messages from the iframe
        function receiveMessage(event) {
            if (event.origin === '<?php echo BASE_URL; ?>') {
                // Update the iframe height based on the received data
                var iframe = document.getElementById('pdf_view');
                if (event.data && event.data.height) {
                    iframe.style.height = event.data.height + 'px';
                }
            }
        }

        // Add event listener for messages
        window.addEventListener('message', receiveMessage);

        // Function to send a request for the iframe height
        function requestIframeHeight() {
            var iframe = document.getElementById('pdf_view');
            // Send a message to the iframe requesting its height
            iframe.contentWindow.postMessage({
                requestHeight: true
            }, '<?php echo BASE_URL; ?>');
        }

        // Call the function when the iframe content is loaded and when the window is resized
        document.getElementById('pdf_view').addEventListener('load', requestIframeHeight);
        window.addEventListener('resize', requestIframeHeight);

        // Initial call to request the iframe height when the page loads
        requestIframeHeight();
    </script>


    <script src="blur.js"></script>

    <footer id="contenthome" role="footer" class="footer">
        <?php include ROOT_PATH . 'includes/footer2.php'; ?>
    </footer>
</body>

</html>