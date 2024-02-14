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
    <?php
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
    <div class="content container-fluid">
      <center>
      <div class="row justify-content-center">
        <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:1px solid black; border-radius:20px; margin:10px;">
            <!-- Body -->

            

                
                            <!-- Header -->

                            <!-- Body -->
                            <div class="card-body" style="background-color: white; text-align:left; border-radius:20px; margin:20px;">
                                <?php
                                $result = $connect->query("SELECT * FROM editor_data WHERE id = '$id'");
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
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

    </div>
</center>
</div>
    <!-- End Content -->

</main>





<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

</html>