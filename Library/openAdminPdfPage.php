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
    <?php include('./secondWindowHeader.php');
    if (isset($_REQUEST['fileID'])) {
        $_SESSION['fileID'] = $_REQUEST['fileID'];
        // $fileID = $_REQUEST['fileID'];
    }
    $fileID = $_SESSION['fileID'];

    $green = "#28a745";
    $red = "#dc3545";
    $yellow = "#ffc107";
    $blue = "#007bff";
    $black = "#6c757d";

    $greenUrl = BASE_URL . "Library/saveFavourite.php?favouriteFileId=" . $fileID . "&colorName=" . urlencode($green) . "&fileType=admin";
    $redUrl = BASE_URL . "Library/saveFavourite.php?favouriteFileId=" . $fileID . "&colorName=" . urlencode($red) . "&fileType=admin";
    $yellowUrl = BASE_URL . "Library/saveFavourite.php?favouriteFileId=" . $fileID . "&colorName=" . urlencode($yellow) . "&fileType=admin";
    $blueUrl = BASE_URL . "Library/saveFavourite.php?favouriteFileId=" . $fileID . "&colorName=" . urlencode($blue) . "&fileType=admin";
    $blackUrl = BASE_URL . "Library/saveFavourite.php?favouriteFileId=" . $fileID . "&colorName=" . urlencode($black) . "&fileType=admin";
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
        $_SESSION['pdfPageName'] = $_REQUEST["pdfPageName"];
    }

    $userId = $_SESSION['login_id'];

    $pdfPageName = $_SESSION['pdfPageName'];
    $ext = pathinfo($pdfPageName, PATHINFO_EXTENSION);
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
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:1px solid black;">
            <!-- Body -->
            <div class="card-body">
             
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
                                <?php echo $breRes;  ?>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo BASE_URL; ?>Library/openpdfpage.php">
                            <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                <img src="<?php echo BASE_URL ?>assets/svg/phase2_white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                            </div>
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $pdfPageName; ?>">
                                <?php echo substr($pdfPageName, 0, 10); ?></span>

                        </a>
                    </li>
                </ul>


                   <div class="card-body">

                                <?php
                                if ($ext == "docx" || $ext == "xlsx" || $ext == "pptx") {
                                ?><center>
                                        <img src="<?php echo BASE_URL; ?>assets/svg/open_link/downloads.png" style="width:80%; height: 500px;" />
                                    </center><br>
                                    <p style="text-align: center;"> <span style="color:red; font-weight:bold;">Note:</span>
                                        Due To Security Reasons Of Microsoft Windows, We Cannot Open The File Directly, Files Downloads Instaed, You Can either Check On "Open File Of This Type Automatically" Or Check Your Download Folder Or Folder Is Selected For The Downloaded File
                                    </p>
                                <?php
                                } else {
                                ?>

                                    <a target="_blank" href="<?php echo BASE_URL ?>includes/pages/files/<?php echo $pdfPageName; ?>"><i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="margin:5px; margin-top: 7px; float: right; font-size: xx-large; margin-top:-15px;"></i></a>

                                    <iframe src="<?php echo BASE_URL; ?>includes/pages/files/<?php echo $pdfPageName; ?>" id="pdf_view" frameborder="0" width="100%" height="700px"></iframe>
                                <?php
                                }
                                ?>
                            </div>
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
</main>



    <div class="modal fade" id="fileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit File</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="editUserFiles.php" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="fileId" value="<?php echo $fileID; ?>" id="" readonly />
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
                        <input type="file" class="form-control" name="fileName" value="" id="brief1">
                        <br>
                        <input style="float:right;" class="btn btn-soft-dark" type="submit" name="editFileBtnAdmin" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-black" style="right:0px !important;top:65px;left: inherit;border-left: 1px solid white; z-index:0;" id="aside">
        <div class="navbar-vertical-container" style="    height: auto;
    overflow-x: auto;">
            <div class="navbar-vertical-footer-offset" style="height:auto;">

                <div style="margin-top: 12%;margin-left: 10%;">
                    <h3 style="color:white;">Details</h3>
                    <!-- <p style="color:white;">creted At <?php echo $createdAt; ?> By <?php echo $createdBy; ?></p>
                    <p style="color:white;">updated At <?php echo $updatedAt; ?> By <?php echo $updatedBy; ?></p> -->

                    <?php
                    $permissionQuery = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileID' AND permissionId = '$userId' ORDER BY id DESC LIMIT 2");
                    while ($perData = $permissionQuery->fetch()) {
                        if ($perData['userId'] == "All instructor" || $perData['userId'] == "Everyone") {
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
                    ?>
                    <?php
                    $permissionQuery = $connect->query("SELECT * FROM filepermissionsfm WHERE pageId = '$fileID' AND permissionId = '$userId' ORDER BY id DESC LIMIT 2");
                    while ($perData = $permissionQuery->fetch()) {
                        if ($perData['userId'] == "All instructor" || $perData['userId'] == "Everyone") {
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
                    ?>
                    <button name="" type="button" style="color:white ;" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pageper">More</button>
                    <hr>
                </div>



                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                        <div id="navbarVerticalMenuPagesMenu">
                            <div class="nav-item">
                                <a data-bs-toggle="modal" data-bs-target="#fileEdit" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Edit1.png">
                                        </div>
                                        Edit
                                    </span>
                                </a>
                                <!-- <a href="copy_file_data.php?copyId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Copy.png">
                                        </div>
                                        Copy
                                    </span>
                                </a> -->
                                <!-- <a href="move_file_data.php?copyId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/move_1.png">
                                        </div>
                                        Move
                                    </span>
                                </a> -->
                                <!-- <a href="revision.php?revisionId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Revision.png">
                                        </div>
                                        Revision
                                    </span>
                                </a> -->
                                <a href="giveAdminPermission.php?filePermissionId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/permission_1.png">
                                        </div>
                                        Permission
                                    </span>
                                </a>
                                <a href="<?php echo BASE_URL; ?>Library/deleteUserLink.php?adminFileDeleteId=<?php echo $fileID; ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/delete_1.png">
                                        </div>
                                        Delete
                                    </span>
                                </a>
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
                                            </div>
                                            <div style="position:relative;">
                                                <a href="<?php echo $greenUrl; ?>" class="nav-link">
                                                    <span style="color:white;" class="nav-link-title" id="green"></span>
                                                </a>
                                            </div>
                                            <div style="position:relative;">
                                                <a href="<?php echo $yellowUrl; ?>" class="nav-link">
                                                    <span style="color:white;" class="nav-link-title" id="yellow"></span>
                                                </a>
                                            </div>
                                            <div style="position:relative;">
                                                <a href="<?php echo $blueUrl; ?>" class="nav-link">
                                                    <span style="color:white;" class="nav-link-title" id="blue"></span>
                                                </a>
                                            </div>
                                            <div style="position:relative;">
                                                <a href="<?php echo $blackUrl; ?>" class="nav-link">
                                                    <span style="color:white;" class="nav-link-title" id="grey"></span>
                                                </a>
                                            </div>
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
                                            <th class="text-light">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="varuntest">
                                        <?php
                                        $permissionQuery = $connect->query("SELECT * FROM filepermissionsfm  WHERE pageId = '$fileID' AND permissionId = '$userId'");
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
                                                <td>This Page Permission To <?php echo $perName; ?></td>
                                                <td>
                                                    <a style="float:right;" href="<?php echo BASE_URL; ?>includes/Pages/delete_permission.php?adminPermissionFileDeleteId=<?php echo $perData['id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a>
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
    <script>
        $(document).ready(function() {
            // Function to download a file
            function downloadFile(url, fileName) {
                var link = document.createElement('a');
                link.href = url;
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }

            // Download the DOCX file
            var docxUrl = "<?php echo BASE_URL; ?>includes/pages/files/<?php echo $pdfPageName; ?>";
            var docxFileName = "<?php echo $pdfPageName; ?>";
            downloadFile(docxUrl, docxFileName);

            // // Download the XLSX file
            // var xlsxUrl = 'path/to/your/file.xlsx';
            // var xlsxFileName = 'spreadsheet.xlsx';
            // downloadFile(xlsxUrl, xlsxFileName);
        });
    </script>
<?php
}
?>

<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>