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
    
    
    if (isset($_REQUEST["pdfPageName"]))
        {
           $pdfPageName = $_REQUEST["pdfPageName"];
        }

        
    // if (isset($_REQUEST['id'])) {
    //     $id = $_REQUEST['id'];
    // } else {
    //     $id = $_SESSION['page_ID'];
    // }


    // $pSql = $connect->query("SELECT pageName FROM editor_data WHERE id = '$id'");
    // $pRes = $pSql->fetchColumn();

    // $greenUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($green);
    // $redUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($red);
    // $yellowUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($yellow);
    // $blueUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($blue);
    // $blackUrl = BASE_URL . "Library/saveFavourite.php?favouriteId=" . $id . "&colorName=" . urlencode($black);
    ?>
</div>
        <main id="content" role="main" class="main">


            <!-- Content -->
            <div class="content container-fluid">
                <ul class="breadcrumb">
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
                            <?php echo $pdfPageName; ?>
                        </a>
                    </li>
                </ul>

                <div class="row justify-content-center">

                    <div class="col-lg-10 mb-3 mb-lg-5" style="margin-right: 105px;">
                        <!-- Card -->
                        <div class="card h-100" style="width:90%;">
                            <!-- Header -->

                            <!-- Body -->
                            <div class="card-body">
                               
                               
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Content -->
        </main>
        <main id="content" role="main" class="main" style="width:85%; display: none;">
            <ul class="breadcrumb">
                <li><a href="#">
                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                            <img src="<?php echo BASE_URL ?>assets/svg/phase2_white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                        </div>Briefcase
                    </a>
                </li>
                <li><a href="#">page name</a></li>

            </ul>

            <div class="content container-fluid" style="max-height: 46% !important; overflow:auto;">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card card-hover-shadow" style="width: 50%;">
                            <div style="margin-top: 5%;margin-left:1%;text-align:justify;margin-right:1%;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
  
    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-black" style="right:0px !important;top:0px;left: inherit;border-left: 1px solid white;">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset" style="height:auto;">

                <div style="margin-top: 12%;margin-left: 10%; display:none;">
                    <h3 style="color:white;">Details</h3>
                    <p style="color:white;">creted At <?php echo $createdAt; ?> By <?php echo $createdBy; ?></p>
                    <p style="color:white;">updated At <?php echo $updatedAt; ?> By <?php echo $updatedBy; ?></p>
                    <hr>
                </div>



                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                        <div id="navbarVerticalMenuPagesMenu">
                            <div class="nav-item">
                                <a href="edit-textEditor.php?id=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                    <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                      <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Edit1.png">
                                    </div>
                                     Edit
                                    </span>
                                </a>
                                <a href="copy_editor_data.php?copyId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                    <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                      <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Copy.png">
                                    </div>
                                    Copy</span>
                                </a>
                                <a href="move_editor_data.php?copyId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                      <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/move_1.png">
                                    </div>
                                    Move</span>
                                </a>
                                <a href="revision.php?revisionId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                      <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Revision.png">
                                    </div>
                                    Revision</span>
                                </a>
                                <a href="givePermission.php?permissionId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                      <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/permission_1.png">
                                    </div>
                                    Permission</span>
                                </a>
                                <a href="update_editor_data.php?deleteId=<?php echo $pageId; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                      <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/delete_1.png">
                                    </div>
                                    Delete</span>
                                </a>
                            </div>
                            <hr>
                        </div>

                        <div id="navbarVerticalMenuPagesMenu">
                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarFavorite" aria-expanded="false" aria-controls="navbarFavorite">
                                    <span style="color:white;" class="nav-link-title">Favourite</span>
                                </a>
                                <div id="navbarFavorite" class="nav-collapse collapse hide" data-bs-parent="#navbarFavorite" hs-parent-area="#navbarFavorite">

                                    <div id="navbarUsersMenuDiv">
                                        <div class="nav-item">
                                            <form method="POST" action="<?php echo BASE_URL; ?>Library/saveFavourite.php">
                                            <input type="hidden" name="pageId" value="<?php echo $id; ?>" />
                                                <input  class="btn btn-success" type="submit" value="submit" name="favSubmit">
                                                <div style="position:relative;">
                                                    <a href="<?php echo $redUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="red"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#dc3545" />
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $greenUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="green"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#28a745" />
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $yellowUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="yellow"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#ffc107" />
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $blueUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="blue"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#007bff" />
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $blackUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="grey"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#6c757d" />
                                                </div>
                                                <!-- <input style="float: right;" class="btn btn-success" type="submit" value="submit"> -->
                                            </form>
                                        </div>

                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="nav-item">
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
                            </div>

                            <hr>
                            <div class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>Library/list_view.php" role="button" aria-expanded="false">

                                    <span style="color:white;" class="nav-link-title">List View</span>
                                </a>

                            </div>

                            <div class="nav-item">
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
</body>

</html>