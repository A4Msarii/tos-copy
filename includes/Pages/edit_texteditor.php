<?php
include '../../includes/config.php';
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

        #cke_1_contents {
            height: 700px !important;
        }

        #cke_1_top {
            background: white;
        }

        #cke_1_bottom {
            display: none;
        }
        a.cke_button
        {
            display: inline-block;
    height: 18px;
    padding: 5px 19px !important;
    outline: 0;
    cursor: default;
    float: left;
    border: 0;
    position: relative;
        }
        #cke_1_contents
        {
            background-color: #babac24f;
    text-align: center;
        }
        iframe.cke_wysiwyg_frame.cke_reset
        {
            width: 70% !important;
    height: 100%;
    margin-top: 30px;
        }
    </style>
</head>

<body>
    <script src="loading.js"></script>
    <div id="loading-screen" style="display:none;">
        <div id="loading-spinner" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-image: url('tos.svg'); background-repeat: no-repeat; background-size:100px; background-position:center;">
            <div class="spinner-border" style="height:300px; width:300px;">
                <!-- <img class="spinner-border" style="height:500px; width:500px;" src="tos.svg"> -->
            </div>
        </div>
    </div>
    <div id="header-hide">
        <main id="content" role="main" class="main">


            <div class="card card-hover-shadow h-100">
                <div class="editor-container-fluid">
                    <?php
                    
                    if (isset($_REQUEST['userPageId'])) {
                        $userPageId = $_REQUEST['userPageId'];
                        $query = $connect->query("SELECT * FROM editor_data WHERE id = '$userPageId'");
                        while ($data = $query->fetch()) {
                        ?>
                            <form action="<?php echo BASE_URL ?>includes/Pages/update_newpage.php" method="post" enctype="multipart/form-data">
                                <div class="container" style="height:50px;">
                                    <div class="row" style="float: right;">
                                        <button name="userPageUpdate" type="submit" style="float:right; color: black;" class="btn btn-ghost-secondary"><i class="bi bi-download" style="margin:5px; color:black;"></i>Save Changes</button>
                                    </div>

                                    <div class="row" style="float: right;">
                                        <div class="dropdown">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-ghost-secondary" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation style="color:black;">
                                                    <i class="bi bi-pen" style="color:black;"></i>Set ChangeLog
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
                                                        <button type="button" class="btn btn-ghost-secondary" id="navbarscannerDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                                            <i style="color: black; font-size:large;" class="bi bi-qr-code-scan"></i>
                                                        </button>

                                                        <div id="dropdown" class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 18rem;">
                                                            <div class="dropdown-item-text">
                                                                <div class="align-items-center">
                                                                    <!-- <form action="/" id="qr-generation-form"> -->
                                                                    <input class="form-control" type="text" name="qr-code-content" id="qr-content" value="" placeholder="Enter QR content" autocomplete="off" />
                                                                    <input onclick="generateQRCode()" class="btn btn-soft-secondary" style="float:right;margin-top: 15px;margin-bottom: 13px;" type="button" value="Generate QR Code" id="qrCodeBtn" />
                                                                    <input onclick="copyQRCode()" type="button" name="copybutton" class="btn btn-soft-primary" value="Copy" style="float:left;margin-top: 15px;margin-bottom: 13px;">
                                                                    <!-- </form> -->
                                                                    <br />
                                                                    <div id="qr-code">
                                                                    </div>
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
                                        <input style="color:#000000a6;;" class="form-control" type="text" id="name" name="pagename" placeholder="Page Title" value="<?php echo $data['pageName']; ?>" />
                                    </center>
                                </div><br>
                                <textarea id="editor" class="editor-content" style="height: 700px; width: 30%;" name="editorData">
                                        <?php echo $data['editorData']; ?>
                                    </textarea>
                            </form>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>


        </main>
    </div>
</body>
<script src="<?php echo BASE_URL; ?>assets/editor/ckeditor/ckeditor.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/qrjs.js" referrerpolicy="origin"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="<?php echo BASE_URL; ?>assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

<script src="<?php echo BASE_URL; ?>assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/maps/world.js"></script>

<!-- JS Front -->
<script src="<?php echo BASE_URL; ?>assets/js/theme.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/hs.theme-appearance-charts.js"></script>

<script src="<?php echo BASE_URL; ?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/prism/prism.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>

<script>
    function generateQRCode() {
        var link = document.getElementById('qr-content').value;
        var qrcode = new QRCode(document.getElementById("qr-code"), {
            text: link,
            width: 128,
            height: 128,
        });
    }

    function copyQRCode() {
        var qrcodeDiv = document.getElementById("qr-code");
        var range = document.createRange();
        range.selectNode(qrcodeDiv);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
        alert("QR Code copied to clipboard!");
    }
</script>

<script>
    CKEDITOR.replace('editorData');
</script>

</html>