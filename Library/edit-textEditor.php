<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$pageId1 = $_REQUEST['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>includes/Pages/tos.svg" />
    <title>Edit File Data</title>

    <style>
        .tox-promotion {
            display: none !important;
        }

        .tox-statusbar {
            display: none !important;
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
    padding: 5px 13px !important;
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
   <?php include 'lb_loader.php';?>
    <div id="header-hide">
        <?php include('./secondWindowHeader.php'); ?>

    </div>


    <main id="content" role="main" class="main">


        <!-- Content -->
        <div class="content container-fluid" style="margin-left:40px; width:100%;">
            <center>
                <div class="row justify-content-center">
                    <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
                    <div class="col-lg-11 mb-3 mb-lg-5" style="width:97%;">
                        <!-- Card -->
                        <div class="card card-hover-shadow" style="border:1px solid black; height:1000px;">
                            <!-- Body -->
                            <div class="card-body">

                                <div class="editor-container">
                                    <?php
                                    $query = $connect->query("SELECT * FROM editor_data WHERE id = '$pageId1'");
                                    while ($data = $query->fetch()) {
                                    ?>
                                        <form action="update_editor_data.php" method="post" enctype="multipart/form-data">
                                            <div class="container" style="height:50px;">
                                                <div class="row" style="float: right;">
                                                    <button name="update" type="submit" style="float:right;" class="btn btn-ghost-secondary"><i class="bi bi-download text-dark" style="margin:5px;"></i>Save Changes</button>
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
                                                <input type="hidden" value="<?php echo $data['folderId']; ?>" name="folderId" />
                                                <input type="hidden" value="<?php echo $data['briefId']; ?>" name="briefId" />
                                                <input type="hidden" value="<?php echo $data['createdBy']; ?>" name="createdBy" />
                                                <input type="text" id="name" name="pagename" placeholder="Page Title" value="<?php echo $data['pageName']; ?>" style="color:#000000a6;;" />
                                            </div><br>
                                            <textarea id="editor" class="editor-content" name="editorData">
                                        <?php echo $data['editorData']; ?>
                                    </textarea>
                                        </form>
                                    <?php } ?>
                                </div>

                            </div>
                            <!-- End Body -->

                            <!-- End Card -->
                        </div>
                    </div>
                    <!-- End Row -->

                </div>
            </center>
        </div>
    </main>


<!-- JS Implementing Plugins -->
<script src="<?php echo BASE_URL; ?>assets/editor/ckeditor/ckeditor.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/qrjs.js" referrerpolicy="origin"></script>

<script>
    CKEDITOR.replace('editorData');
  </script>

<script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>


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

    var count = 1;

    $("#navbarscannerDropdown").on("click", function() {
        if (count == 1) {
            $("#dropdown").addClass("show");
            count++;
        } else {
            $("#dropdown").removeClass("show");
            count = 1;
        }
    })
</script>
<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>