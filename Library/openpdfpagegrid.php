<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$brief_id = $_SESSION['brief_id'];
$userBriefName = $_SESSION['userBriefName'];
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
        <?php include('./grid_header.php');
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

        $userId = $_SESSION['login_id'];

        $pdfPageName = $_SESSION['pdfPageName'];
        $ext = pathinfo($pdfPageName, PATHINFO_EXTENSION);
        if (isset($_REQUEST['brief_id'])) {
            $briefId = $_REQUEST['brief_id'];
        }
        if (isset($_REQUEST['briefName'])) {
            $briefName = $_REQUEST['briefName'];
        }

        if (isset($_REQUEST['userBriefName'])) {
            $briefName = $_REQUEST['userBriefName'];
        }

        $f_id = $_SESSION['folderId'];
        ?>
    </div>

    <main id="content" role="main" class="main">


        <div class="page-header" style="margin-top:60px; border-bottom:none;">
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php">
                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                            <img style="height:20px; width:20px; margin:5px;" src="<?php echo BASE_URL ?>assets/svg/phase2white/folder.png">
                        </div>
                        <?php echo $item_id1_a; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>Library/brief_file.php?brief_id=<?php echo $brief_id ?>&userBriefName=<?php echo $userBriefName ?>">
                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                            <img src="<?php echo BASE_URL ?>assets/svg/phase2white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                        </div>
                        <?php echo $briefName ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php" data-bs-placement="bottom" title="<?php echo pathinfo($pdfPageName, PATHINFO_FILENAME); ?>">
                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                            <img src="<?php echo BASE_URL ?>assets/svg/phase2white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                        </div>
                        <?php echo substr($pdfPageName,0,15); ?>

                    </a>
                </li>
            </ul>
        </div>
        <center>
            <div class="row justify-content-center">

                <div class="col-lg-10 mb-3 mb-lg-5" style="margin-top:-65px;">
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

                                <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $pdfPageName; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="margin:5px; margin-top: 7px; float: right; font-size: xx-large; margin-top:-15px;"></i></a>

                                <iframe src="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $pdfPageName; ?>" id="pdf_view" frameborder="0" width="100%" height="700px"></iframe>
                            <?php
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
                                            if ($perData['userId'] == "All instructor" || $perData['userId'] == "Everyone") {
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

<?php
if ($ext == "docx" || $ext == "xlsx" || $ext == "pptx") {
?>

<?php
}
?>

<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>