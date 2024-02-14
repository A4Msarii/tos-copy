<?php
include '../../includes/config.php';
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
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
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

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 
  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
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

    if (isset($_REQUEST['adminid'])) {
        $id = $_REQUEST['adminid'];
    } 
    if (isset($_REQUEST['userid'])) {
        $id = $_REQUEST['userid'];
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
            <div class="content container-fluid">
               <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Data Page" style="color:black; text-decoration:none;" href="<?php echo BASE_URL; ?>includes/Pages/file_management.php"><i class="bi bi-arrow-left"></i></a>
                <div class="row justify-content-center">



                    <div class="col-lg-12 mb-3 mb-lg-5" style="margin-left: 135px;">
                        <!-- Card -->
                        <div class="card h-100" style="width:85%;">
                            <!-- Header -->

                            <!-- Body -->
                            <div class="card-body">

                                <?php
                                if (isset($_REQUEST["adminid"])) {
                                    $result = $connect->query("SELECT * FROM newpage_fm WHERE id = '$id'");
                                }
                                if (isset($_REQUEST["userid"])) {
                                    $result = $connect->query("SELECT * FROM editor_data WHERE id = '$id'");
                                }
                                
                                while ($data = $result->fetch()) {
                                    $pageId = $data['id'];
                                    $createdAt = $data['createdAt'];
                                    $updatedAt = $data['updatedAt'];
                                    $createdBy = $data['createdBy'];
                                    $updatedBy = $data['updatedBy'];
                                ?>
                                    <h1><?php echo $data['pageName']; ?></h1>
                                    <div>
                                        <?php echo $data['editorData']; ?>
                                    </div>
                                <?php
                                }
                                ?>
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
                                <?php
                                if (isset($_REQUEST["adminid"])) {
                                    $result = $connect->query("SELECT * FROM newpage_fm WHERE id = '$id'");
                                }
                                if (isset($_REQUEST["userid"])) {
                                    $result = $connect->query("SELECT * FROM editor_data WHERE id = '$id'");
                                }
                                
                                while ($data = $result->fetch()) {
                                    $pageId = $data['id'];
                                    $createdAt = $data['createdAt'];
                                    $updatedAt = $data['updatedAt'];
                                    $createdBy = $data['createdBy'];
                                    $updatedBy = $data['updatedBy'];
                                ?>
                                    <h1><?php echo $data['pageName']; ?></h1>
                                    <div>
                                        <?php echo $data['editorData']; ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>   
</body>

</html>