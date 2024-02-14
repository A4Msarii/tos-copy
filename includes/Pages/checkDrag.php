<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
$cert_type = "";
$cert_id = "";
if (isset($_REQUEST['id']) && isset($_REQUEST['type'])) {
    $_SESSION['cert_type'] = $cert_type = $_REQUEST['type'];
    $_SESSION['cert_id'] = $cert_id = $_REQUEST['id'];
} else if (isset($_SESSION['cert_type']) && isset($_SESSION['cert_id'])) {
    $cert_type = $_SESSION['cert_type'];
    $cert_id = $_SESSION['cert_id'];
}
$roles_value_fetch = "";
$query_roles_fetch = "SELECT * FROM roles";
$statement_roles_fetch = $connect->prepare($query_roles_fetch);
$statement_roles_fetch->execute();

if ($statement_roles_fetch->rowCount() > 0) {
    $result_roles_fetch = $statement_roles_fetch->fetchAll();
    $sn = 1;
    foreach ($result_roles_fetch as $row_roles_fetch) {
        $roles_value_fetch .= "<option value=" . $row_roles_fetch['id'] . ">" . $row_roles_fetch['roles'] . "</option>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/chart.js/dist/Chart.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/jsvectormap/dist/css/jsvectormap.min.css" />

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css" />

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/snippets.min.css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- CSS Front Template -->

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" data-hs-appearance="default" as="style" />
    <style>
        <?php if ($cert_type == "horizontal") { ?>#draggable-container {
            width: 800px;
            height: 1300px;
            margin-right: 30px;
            border: 1px solid #ccc;
            position: relative;
        }

        <?php } else {
        ?>#draggable-container {
            width: 1300px;
            height: 800px;
            margin-right: 30px;
            border: 1px solid #ccc;
            position: relative;
        }

        <?php
        } ?>
    </style>
</head>

<body>


    <main id="content" role="main" class="main">
        <!-- Content -->
        <div>
            <div class="content container-fluid" style="height: 20rem; margin-top: 50px;">

            </div>
        </div>
        <!-- End Content -->

        <!-- Content -->
        <div class="content container-fluid" style="margin-top: -22rem;">

            <div class="row justify-content-center">

                <div class="col-lg-10 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

                        <div class="card-body">


                            <div>
                                <label>select Item</label>
                                <select class="form-control" required id="select_type" style="width: 20%;">
                                    <option value="">select option</option>
                                    <option value="img">Img</option>
                                    <option value="Heading">Heading</option>
                                    <option value="logo">logo</option>
                                    <option value="p">Paragraph</option>
                                    <option value="frame">Frame</option>
                                    <option value="horozontaltype">horizontal hr</option>
                                </select>
                            </div>
                            <?php include ROOT_PATH . 'includes/Pages/image1.php'; ?>
                            <?php include ROOT_PATH . 'includes/Pages/heading.php'; ?>
                            <?php include ROOT_PATH . 'includes/Pages/logo.php'; ?>
                            <?php include ROOT_PATH . 'includes/Pages/paragraph.php'; ?>
                            <?php include ROOT_PATH . 'includes/Pages/frame.php'; ?>
                            <?php include ROOT_PATH . 'includes/Pages/horizontal.php'; ?>
                            <hr>


                        </div>

                    </div>

                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-10 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card card-hover-shadow h-100" style="border:0.001rem solid grey;background-color:grey;">

                        <div class="card-body">
                            <div id="draggable-container" style="background:white">
                                <?php
                                $cId = $_REQUEST['cerId'];
                                $cerQ = $connect->query("SELECT * FROM originalcertificate WHERE certificateId = '$cId'");
                                while ($cerQData = $cerQ->fetch()) {
                                
                                    echo $cerQData['certificateHtml'];

                                }
                                ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- End Row -->
        </div>
        <!-- End Content -->

    </main>



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

</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", ".drag_and_drop", function() {
            let id = $(this).attr("id");
            $("#" + id).resizable();
            $("#" + id).draggable({
                containment: "#draggable-container" // Set the containment to the specific area.
            });
        });
    });
</script>
<script>
    $('#select_type').on('change', function() {
        var get_val = $(this).val();
        if (get_val == "img") {
            $(".img_select").show();
            $(".heading_select").hide();
            $(".logo_select").hide();
            $(".Paragraph_select").hide();
            $(".frame_select").hide();
            $(".hori_select").hide();
        }
        if (get_val == "Heading") {
            $(".heading_select").show();
            $(".logo_select").hide();
            $(".Paragraph_select").hide();
            $(".img_select").hide();
            $(".frame_select").hide();
            $(".hori_select").hide();
        }
        if (get_val == "logo") {
            $(".logo_select").show();
            $(".img_select").hide();
            $(".heading_select").hide();
            $(".Paragraph_select").hide();
            $(".frame_select").hide();
            $(".hori_select").hide();
        }
        if (get_val == "p") {
            $(".Paragraph_select").show();
            $(".logo_select").hide();
            $(".img_select").hide();
            $(".heading_select").hide();
            $(".frame_select").hide();
            $(".hori_select").hide();
        }
        if (get_val == "frame") {
            $(".Paragraph_select").hide();
            $(".logo_select").hide();
            $(".img_select").hide();
            $(".heading_select").hide();
            $(".frame_select").show();
            $(".hori_select").hide();
        }
        if (get_val == "horozontaltype") {
            $(".Paragraph_select").hide();
            $(".logo_select").hide();
            $(".img_select").hide();
            $(".heading_select").hide();
            $(".frame_select").hide();
            $(".hori_select").show();
        }

    });
</script>
<script>
    $('.check_user_heading').on('change', function() {
        var get_val1 = $(this).val();

        if (get_val1 == 0) {
            $(".if_text").show();
        } else {
            $(".if_text").hide();
        }
    });
</script>

</html>