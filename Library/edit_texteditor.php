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
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>includes/Pages/tos.svg" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css" />

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css" />

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css" />


    <!-- CSS Front Template -->

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" data-hs-appearance="default" as="style" />
    <title>Edit File Data</title>
    <!-- <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script> -->
    <style>
        .tox-promotion {
            display: none !important;
        }

        .tox-statusbar {
            display: none !important;
        }
    </style>
    <style>
        /* Style the editor container and toolbar */
        .editor-container {
            /*      margin: 10px;*/
            border: 1px solid #ccc;
            border-radius: 5px;
            /*      height: 700px;*/
        }

        .editor-toolbar {
            margin-bottom: 5px;
            background-color: #f1f1f1;
            border-bottom: 1px solid #ccc;
            border-radius: 5px 5px 0 0;
            padding: 5px;
        }

        /* Style the editor content */
        .editor-content {
            padding: 10px;
            min-height: 700px;
        }

        #name {
            width: 80%;
            height: 50px;
            border-radius: 5px;
            border: 1px solid #808080b3;
            font-size: 30px;
            color: #8b8f8f9e;
        }

        #pagetitlecontainer {
            height: 30%;
        }

        :-ms-input-placeholder {
            color: red;
            font-size: 30px;
            opacity: 1;
            /* Firefox */
        }

        #savebtn {
            background-color: aliceblue;
            border: aliceblue;
            margin-top: 15px;

        }
    </style>
</head>

<body>
   <?php include 'lb_loader.php';?>
    <div id="header-hide">
        <main id="content" role="main" class="main">
            <div class="content container-fluid" style="padding-top:0x; margin-top:0px;">
                <div class="row justify-content-center">
                    <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
                    <div class="col-lg-12">
                        <div class="card card-hover-shadow h-100">
                            <div class="editor-container-fluid">
                                <?php
                                if (isset($_REQUEST['adminId'])) {
                                    $adminId = $_REQUEST['adminId'];
                                    $query = $connect->query("SELECT * FROM newpage_fm WHERE id = '$adminId'");
                                    while ($data = $query->fetch()) {
                                ?>
                                        <form action="update_newpage.php" method="post" enctype="multipart/form-data">
                                            <div class="container" style="height:50px;">
                                                <div class="row" style="float: right;">
                                                    <button name="update" type="submit" style="float:right; color: black;" class="btn"><i class="bi bi-download text-dark" style="margin:5px;"></i>Save Changes</button>
                                                </div>

                                                <div class="row" style="float: right;">
                                                    <div class="dropdown">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-ghost-secondary" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation style="color:black;">
                                                                <i class="bi bi-pen text-dark" style="margin:5px;"></i>Set ChangeLog
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                                                <div class="dropdown-item-text">
                                                                    <div class="align-items-center">
                                                                        <p>Enter a brief description of the changes you've made</p>
                                                                        <input class="form-control" type="text" placeholder="Enter ChangeLog" name="initial" id="initial" />

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="float: right;">
                                                    <div class="dropdown">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-ghost-secondary" id="navbarscannerDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation style="color:black;">
                                                                <i class="bi bi-qr-code-scan"></i>
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 18rem;">
                                                                <div class="dropdown-item-text">
                                                                    <div class="align-items-center">
                                                                        <!-- <form action="/" id="qr-generation-form"> -->
                                                                        <input class="form-control" type="text" name="qr-code-content" id="qr-content" value="" placeholder="Enter QR content" autocomplete="off" />
                                                                        <input class="btn btn-soft-secondary" style="float:right;margin-top: 15px;margin-bottom: 13px;" type="button" value="Generate QR Code" id="qrCodeBtn" />
                                                                        <!-- </form> -->
                                                                        <br />
                                                                        <div id="qr-code"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div refs="page-editor@titleContainer" class="input" style="text-align:center;" id="pagetitlecontainer">
                                                <input type="hidden" value="<?php echo $data['id']; ?>" name="pageId" />
                                                <input type="hidden" value="<?php echo $data['createdBy']; ?>" name="createdBy" />
                                                <center>
                                                    <input class="form-control" type="text" id="name" name="pagename" placeholder="Page Title" value="<?php echo $data['pageName']; ?>" />
                                                </center>
                                            </div>
                                            <textarea id="editor" class="editor-content" style="height: 650px;" name="editorData">
                                        <?php echo $data['editorData']; ?>
                                    </textarea>
                                        </form>
                                    <?php
                                    }
                                }
                                if (isset($_REQUEST['userPageId'])) {
                                    $userPageId = $_REQUEST['userPageId'];
                                    $query = $connect->query("SELECT * FROM editor_data WHERE id = '$userPageId'");
                                    while ($data = $query->fetch()) {
                                    ?>
                                        <form action="update_newpage.php" method="post" enctype="multipart/form-data">
                                            <div class="container" style="height:50px;">
                                                <div class="row" style="float: right;">
                                                    <button name="userPageUpdate" type="submit" style="float:right; color: black;" class="btn"><i class="bi bi-download text-dark" style="margin:5px;"></i>Save Changes</button>
                                                </div>

                                                <div class="row" style="float: right;">
                                                    <div class="dropdown">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-ghost-secondary" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation style="color:black;">
                                                                <i class="bi bi-pen text-dark" style="margin:5px;"></i>Set ChangeLog
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                                                <div class="dropdown-item-text">
                                                                    <div class="align-items-center">
                                                                        <p>Enter a brief description of the changes you've made</p>
                                                                        <input class="form-control" type="text" placeholder="Enter ChangeLog" name="initial" id="initial" />

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="float: right;">
                                                    <div class="dropdown">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-ghost-secondary" id="navbarscannerDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation style="color:black;">
                                                                <i class="bi bi-qr-code-scan"></i>
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 18rem;">
                                                                <div class="dropdown-item-text">
                                                                    <div class="align-items-center">
                                                                        <!-- <form action="/" id="qr-generation-form"> -->
                                                                        <input class="form-control" type="text" name="qr-code-content" id="qr-content" value="" placeholder="Enter QR content" autocomplete="off" />
                                                                        <input class="btn btn-soft-secondary" style="float:right;margin-top: 15px;margin-bottom: 13px;" type="button" value="Generate QR Code" id="qrCodeBtn" />
                                                                        <!-- </form> -->
                                                                        <br />
                                                                        <div id="qr-code"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div refs="page-editor@titleContainer" class="input" style="text-align:center;" id="pagetitlecontainer">
                                                <input type="hidden" value="<?php echo $data['id']; ?>" name="pageId" />
                                                <input type="hidden" value="<?php echo $data['createdBy']; ?>" name="createdBy" />
                                                <center>
                                                    <input class="form-control" type="text" id="name" name="pagename" placeholder="Page Title" value="<?php echo $data['pageName']; ?>" />
                                                </center>
                                            </div>
                                            <textarea id="editor" class="editor-content" style="height: 650px;" name="editorData">
                                        <?php echo $data['editorData']; ?>
                                    </textarea>
                                        </form>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="<?php echo BASE_URL; ?>assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // Initialize the TinyMCE editor without file, edit, and view menus
    tinymce.init({
        selector: '#editor',
        plugins: 'table, link, image, media, hr, codesample, fullscreen, code, textcolor',
        toolbar: 'undo redo | styleselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample | hr media | collapsible | code | about fullscreen | table',
        table_default_attributes: {
            border: '1'
        }
    });
</script>

</html>