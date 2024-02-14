<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();

$green = "#28a745";
$red = "#dc3545";
$yellow = "#ffc107";
$blue = "#007bff";
$black = "#6c757d";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'lb_thumbnail.php';?>
    <title>Document</title>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
    <style>
        /* .tox-toolbar__group {
            background-color: white !important;
        } */
    </style>
    <style>
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

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {

            border-color: inherit;
            border-style: solid;
            border-width: 1px !important;
        }

        table {
            display: table;
            border-collapse: separate;
            box-sizing: border-box;
            text-indent: initial;
            border-spacing: 2px;
            border-color: gray;
        }
    </style>
</head>

<body>
<?php include 'lb_loader.php';?>
    <div id="header-hide">
        <?php include('./secondWindowHeader.php');
        if (isset($_REQUEST['bId'])) {
            $_SESSION['page_ID'] = $_REQUEST['bId'];
        }
        if (isset($_REQUEST['pId'])) {
            $_SESSION['page_ID'] = $_REQUEST['pId'];
        }

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

        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_SESSION['page_ID'];
        }

        $userId = $_SESSION['login_id'];


        $pSql = $connect->query("SELECT pageName FROM editor_data WHERE id = '$id'");
        $pRes = $pSql->fetchColumn();

        $greenUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($green);
        $redUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($red);
        $yellowUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($yellow);
        $blueUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($blue);
        $blackUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($black);
        ?>
    </div>


    <main id="content" role="main" class="main">


        <!-- Content -->
        <div class="content container-fluid" style="margin-left:-85px;">
            <center>
                <div class="row justify-content-center">
                    <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
                    <div class="col-lg-9 mb-3 mb-lg-5">
                        <div id="pagefile">
                            <?php
                            if (isset($_REQUEST['error'])) {
                              $error = $_REQUEST['error'];
                              echo $error;
                            }
                            ?>
                        </div>
                        <!-- Card -->
                        <div class="card card-hover-shadow h-100" style="border:1px solid black;">
                            <!-- Body -->
                            <div class="card-body" style="background-color: black;">

                                <div class="col">
                                    <!-- Content -->

                                    <ul class="breadcrumb" style="display:none;">
                                        <li>
                                            <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php">
                                                <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                    <img style="height:20px; width:20px; margin:5px;" src="<?php echo BASE_URL ?>assets/svg/phase2_white/folder.png">
                                                </div>
                                                <?php echo $item_id1_a; ?>
                                            </a>
                                        </li>
                                        <?php if (isset($breRes)) { ?>
                                            <li>
                                                <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php">
                                                    <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                        <img src="<?php echo BASE_URL ?>assets/svg/phase2_white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                                                    </div>
                                                    <?php echo $breRes; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <a href="<?php echo BASE_URL; ?>Library/pageData.php">
                                                <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                    <img src="<?php echo BASE_URL ?>assets/svg/phase2_white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                                                </div>
                                                <?php echo $pRes; ?>
                                            </a>
                                        </li>
                                    </ul>


                                    <!-- Header -->

                                    <!-- Body -->
                                    <div class="card-body" style="background-color: white; text-align:left; border-radius:20px;">
                                        <?php
                                        $result = $connect->query("SELECT * FROM editor_data WHERE id = '$id'");
                                        while ($data = $result->fetch()) {
                                            $pageUserId = $data['userId'];
                                            $pageId = $data['id'];
                                            $createdAt = $data['createdAt'];
                                            $updatedAt = $data['updatedAt'];
                                            $createdBy = $data['createdBy'];
                                            $updatedBy = $data['updatedBy'];
                                        ?>
                                            
                                            
                                             <div class="card-header card-header-content-center" style="border-bottom: 2px solid lightgray;">
                                                <h1 style="text-align:center; color: darkslategrey; font-size:xx-large;"><?php echo $data['pageName']; ?></h1>
                                            </div>
                                            <br>
                                            <div>
                                                <?php echo $data['editorData']; ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- End Body -->

                                </div>
                                <!-- End Body -->
                            </div>
                            <!-- End Card -->
                        </div>
                    </div>
                    <!-- End Row -->

                </div>
            </center>
        </div>
        <!-- End Content -->

    </main>



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
                                        $permissionQuery = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$pageId'");
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
                                                    <a style="float:right;" href="<?php echo BASE_URL; ?>includes/Pages/delete_permission.php?PermissionDeleteId=<?php echo $perData['id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                                    <a style="float:right;" href="<?php echo BASE_URL; ?>Library/givePermission.php?permissionId=<?php echo $perData['pageId']; ?>"><i class="bi bi-pen-fill text-success"></i></a>
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

    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-black" style="right:0px !important;top:65px;left: inherit;border-left: 1px solid white; z-index: 0;" id="aside">
        <div class="navbar-vertical-container" style="height:fit-content; overflow-y:auto ;">
            <div class="navbar-vertical-footer-offset" style="height:auto;">

                <div style="margin-top: 12%;margin-left: 10%;">
                    <h3 style="color:white;">Details</h3>
                    <p style="color:white;">creted At <?php echo $createdAt; ?> By <?php echo $createdBy; ?></p>
                    <p style="color:white;">updated At <?php echo $updatedAt; ?> By <?php echo $updatedBy; ?></p>

                    <?php
                    $permissionQuery = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$pageId'");
                    while ($perData = $permissionQuery->fetch()) {
                        if ($perData['userId'] == "All instructor" || $perData['userId'] == "Everyone" || $perData['userId'] == "None") {
                            $perName = $perData['userId'];
                        } else {
                            $perId = $perData['userId'];
                            $perUserQuery = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                            $perName = $perUserQuery->fetchColumn();
                        }
                    ?>
                        <p style="color:white;"><?php echo $perName; ?></p>
                    <?php
                    }
                    if ($pageUserId == $userId) {
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
                                $fileType = $connect->query("SELECT userRole FROM editor_data WHERE id = '$pageId'");
                                $userRole = $fileType->fetchColumn();
                                $fileType1 = $connect->query("SELECT userId FROM editor_data WHERE id = '$pageId'");
                                $user_id = $fileType1->fetchColumn();
                                if ($_SESSION['role'] == 'super admin') {
                                ?>
                                    <a href="edit-textEditor.php?id=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
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
                                    $pagePer = $connect->query("SELECT permissionType FROM pagepermissions WHERE pageId = '$pageId' AND (userId = 'Everyone' OR userId = '$userId' OR userId = 'All instructor')");
                                    $userPerData = $pagePer->fetchColumn();
                                    if ($pageUserId == $userId || $userPerData == 'readAndWrite') {
                                    ?>
                                        <a href="edit-textEditor.php?id=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
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
                                    $pagePer = $connect->query("SELECT permissionType FROM pagepermissions WHERE pageId = '$pageId' AND (userId = 'Everyone' OR userId = '$userId')");
                                    $userPerData = $pagePer->fetchColumn();
                                    if ($userPerData == 'readAndWrite' || $pageUserId == $userId) {
                                ?>
                                        <a href="edit-textEditor.php?id=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
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
                                <a href="copy_editor_data.php?copyId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Copy.png">
                                        </div>
                                        Copy
                                    </span>
                                </a>
                                <?php
                                if ($_SESSION['role'] == 'super admin' || $user_id == $userId) {
                                ?>
                                    <a href="move_editor_data.php?copyId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                        <span style="color:white;" class="nav-link-title">
                                            <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/move_1.png">
                                            </div>
                                            Move
                                        </span>
                                    </a>
                                    <a href="revision.php?revisionId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                        <span style="color:white;" class="nav-link-title">
                                            <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Revision.png">
                                            </div>
                                            Revision
                                        </span>
                                    </a>
                                    <a href="<?php echo BASE_URL; ?>Library/givePermission.php?permissionId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                        <span style="color:white;" class="nav-link-title">
                                            <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                                <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/permission_1.png">
                                            </div>
                                            Permission
                                        </span>
                                    </a>
                                    <a href="update_editor_data.php?deleteId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
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
                                <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarPageFavorite" aria-expanded="false" aria-controls="navbarPageFavorite">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/favourite_1.png">
                                        </div>
                                        Favourite
                                    </span>
                                </a>
                                <div id="navbarPageFavorite" class="nav-collapse collapse hide" data-bs-parent="#navbarPageFavorite" hs-parent-area="#navbarPageFavorite">

                                    <div id="navbarUsersMenuDiv">
                                        <div class="nav-item">
                                            <form method="POST" action="<?php echo BASE_URL; ?>Library/saveFavourite.php">
                                                <div style="position:relative;">
                                                    <a href="<?php echo $redUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="red"></span>
                                                    </a>
                                                    <?php
                                                    $favQuery = $connect->query("SELECT id FROM favouritepages WHERE favouriteColors = '#dc3545' AND pageId = '$pageId' AND userId = '$userId'");
                                                    $delFavId = $favQuery->fetchColumn();
                                                    if ($favQuery->rowCount() > 0) {
                                                    ?>
                                                        <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $delFavId; ?>&pageId=<?php echo $pageId ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                    <?php } ?>
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $greenUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="green"></span>
                                                    </a>
                                                    <?php
                                                    $favQuery = $connect->query("SELECT id FROM favouritepages WHERE favouriteColors = '#28a745' AND pageId = '$pageId' AND userId = '$userId'");
                                                    $delFavId = $favQuery->fetchColumn();
                                                    if ($favQuery->rowCount() > 0) {
                                                    ?>
                                                        <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $delFavId; ?>&pageId=<?php echo $pageId ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                    <?php } ?>
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $yellowUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="yellow"></span>
                                                    </a>
                                                    <?php
                                                    $favQuery = $connect->query("SELECT id FROM favouritepages WHERE favouriteColors = '#ffc107' AND pageId = '$pageId' AND userId = '$userId'");
                                                    $delFavId = $favQuery->fetchColumn();
                                                    if ($favQuery->rowCount() > 0) {
                                                    ?>
                                                        <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $delFavId; ?>&pageId=<?php echo $pageId ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                    <?php } ?>
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $blueUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="blue"></span>
                                                    </a>
                                                    <?php
                                                    $favQuery = $connect->query("SELECT id FROM favouritepages WHERE favouriteColors = '#007bff' AND pageId = '$pageId' AND userId = '$userId'");
                                                    $delFavId = $favQuery->fetchColumn();
                                                    if ($favQuery->rowCount() > 0) {
                                                    ?>
                                                        <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $delFavId; ?>&pageId=<?php echo $pageId ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                    <?php } ?>
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $blackUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="grey"></span>
                                                    </a>
                                                    <?php
                                                    $favQuery = $connect->query("SELECT id FROM favouritepages WHERE favouriteColors = '#6c757d' AND pageId = '$pageId' AND userId = '$userId'");
                                                    $delFavId = $favQuery->fetchColumn();
                                                    if ($favQuery->rowCount() > 0) {
                                                    ?>
                                                        <a style="position: absolute;top:10px;right:0px;" href="<?php echo BASE_URL; ?>Library/deleteFavourite.php?favPage=<?php echo $delFavId; ?>&pageId=<?php echo $pageId ?>"><i class="bi bi-x-circle text-danger" id="foldel"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarExport" aria-expanded="false" aria-controls="navbarExport">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Export.png">
                                        </div>
                                        Export
                                    </span>
                                </a>
                                <div id="navbarExport" class="nav-collapse collapse hide" data-bs-parent="#navbarExport" hs-parent-area="#navbarExport">

                                    <div id="navbarUsersMenuDiv">
                                        <div class="nav-item">
                                            <a href="<?php echo BASE_URL; ?>includes/Pages/savePDF.php?pdfIdUser=<?php echo $pageId ?>" class="nav-link" download="filename.pdf">
                                                <span style="color:white;" class="nav-link-title">PDF</span>
                                            </a>
                                            <a href="<?php echo BASE_URL; ?>includes/Pages/saveDocx.php?docxIdUser=<?php echo $pageId ?>" class="nav-link" download="filename.docx" download="filename.docx">
                                                <span style="color:white;" class="nav-link-title">DOCX</span>
                                            </a>
                                            <a href="<?php echo BASE_URL; ?>includes/Pages/saveHtml.php?htmlIdUser=<?php echo $pageId ?>" class="nav-link" download="filename.html">
                                                <span style="color:white;" class="nav-link-title">HTML</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="nav-item" style="display:none;">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>Library/list_view.php" role="button" aria-expanded="false">

                                    <span style="color:white;" class="nav-link-title">List View</span>
                                </a>

                            </div>

                            <div class="nav-item" style="display:none;">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>Library/grid_view.php" role="button" aria-expanded="false">

                                    <span style="color:white;" class="nav-link-title">Grid View</span>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>


<script>
    setTimeout(function() {
      document.getElementById('hide-pagefile').style.display = 'none';
      /* or
      var item = document.getElementById('info-message')
      item.parentNode.removeChild(item);
      */
    }, 4000);
  </script>


<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>

</html>