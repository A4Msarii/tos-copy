<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$green = "#28a745";
$red = "#dc3545";
$yellow = "#ffc107";
$darkgrey = "#007bff";
$black = "#6c757d";
$userBriefName=$_REQUEST['userBriefName'];
$brief_id=$_REQUEST['brief_id'];
$_SESSION['userBriefName']=$userBriefName;
$_SESSION['brief_id']=$brief_id;
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
</head>

<style type="text/css">
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

<body>
<?php include 'lb_loader.php';?>
    <div id="header-hide">
        <?php include('./grid_header.php');
        // if (isset($_REQUEST['bId'])) {
        //     $_SESSION['page_ID'] = $_REQUEST['bId'];
        // }
        // if (isset($_REQUEST['pId'])) {
        //     $_SESSION['page_ID'] = $_REQUEST['pId'];
        // }
        if (isset($_REQUEST['brief_id'])) {
            $briefId = $_REQUEST['brief_id'];
        }
        $briefName="";
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

        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header" style="margin-top:40px; border-bottom:none;">
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
                        <a href="<?php echo BASE_URL; ?>Library/grid_view_brief.php">
                            <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                <img src="<?php echo BASE_URL ?>assets/svg/phase2white/briefcase.png" style="height:20px; width:20px; margin:5px;">
                            </div><?php echo $briefName ?>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Page Header -->
        </div>
        <!-- Content -->
        <div class="content container-fluid" style="margin-top:-120px; margin-left:20px;">
            <center>
                <div class="row justify-content-center">

                    <div class="col-lg-11 mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card card-hover-shadow h-100" style="border:1px solid black;">
                            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
                                <h1 style="margin:10px; font-size:40px;"><?php echo $briefName ?></h1>
                            </div>

                            <div class="card-body" style="border:1px solid green; text-align:left; box-shadow: #272729 10px 9px 15px; border:blue;">

                                <table class="table table-bordered table-striped table-hover">

                                    <?php
                                    $fileId = "";
                                    if (isset($_REQUEST['brief_id'])) {
                                        $fetchBrief = $connect->query("SELECT * FROM user_files WHERE briefId = '$briefId'");
                                        while ($brefData = $fetchBrief->fetch()) {
                                            $fileName = $brefData['filename'];
                                            $fileLastName = $brefData['lastName'];
                                            $fileId = $brefData['id'];
                                    ?>


                                            <?php
                                            if ($brefData['type'] == "pdf") {
                                            ?>
                                                <tr>
                                                    <h1><span><a href="<?php echo BASE_URL; ?>Library/openpdfpagegrid.php?pdfPageName=<?php echo $brefData['filename']; ?>&fileID=<?php echo $fileId; ?>&userBriefName=<?php echo $briefName; ?>" class="nav-link view_document_pdf1" style="color: black; border-left:3px solid <?php echo $brefData['color']; ?>;border-radius: 0px;" data-bs-placement="bottom" title="<?php echo $fileName; ?>">
                                                                <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:20px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-right:5px; "></div>
                                                                <?php
                                                                }
                                                                ?>

                                                                <?php echo $brefData['filename']; ?>
                                                                <button style="float: right;" class="btn btn-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>includes/pages/files/<?php echo $row_file2['filename']; ?>');">
                                                                    <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                                </button>
                                                            </a></span></h1>
                                                </tr>
                                                <hr>
                                            <?php
                                            } else if ($brefData['type'] == "offline") {
                                            ?>

                                                <tr><span class="get_url_val1" id="<?php echo $brefData['id'] ?>">
                                                        <h1><a class="nav-link text-dark" role="button" style="border-left:3px solid <?php echo $brefData['color']; ?>;border-radius: 0px;" href="<?php echo BASE_URL; ?>/openPageIllu.php" style="color: white;" name="<?php echo BASE_URL; ?>Library/userUrlPage.php?linkId=<?php echo $fileId; ?>&fileName=<?php echo $brefData['filename']; ?>" target="_blank">
                                                                <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:25px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-right:5px;"></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php echo $brefData['filename']; ?>

                                                                <button style="float: right;" class="btn btn-primary btn-sm offLineUrl" name="<?php echo $fileName; ?>" title="copy link">
                                                                    <i class="bi bi-files"></i></button>
                                                            </a></h1>
                                                        <h1> <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a></h1>
                                                    </span></tr>
                                                <hr>
                                            <?php
                                            } elseif ($brefData['type'] == "online") {
                                            ?>
                                                <tr>
                                                    <span class="get_url_val" id="<?php echo $brefData['id'] ?>">
                                                        <h1>
                                                            <a class="nav-link text-dark" role="button" style="border-left:3px solid <?php echo $brefData['color']; ?>;border-radius: 0px; color: black;" href="<?php echo $fileName; ?>" target="_blank">
                                                                <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:25px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-right:5px;"></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php echo $brefData['filename']; ?>
                                                                <button style="float: right;" class="btn btn-primary btn-sm onLineUrl" name="<?php echo $fileName; ?>" title="copy link">
                                                                    <i class="bi bi-files"></i></button>
                                                            </a>
                                                        </h1>

                                                        <h1> <a style="display:none" href="<?php echo $fileName; ?>" class="url_value<?php echo $brefData['id'] ?>" target="_blank"><?php echo $fileName; ?></a></h1>
                                                    </span></h1>
                                                </tr>
                                                <hr>
                                            <?php
                                            } elseif ($brefData['type'] == "pptx" || $brefData['type'] == "docx" || $brefData['type'] == "xlsx") {
                                            ?>
                                                <tr>
                                                    <span class="get_url_val">
                                                        <h1>
                                                            <a class="nav-link docxLink text-dark" role="button" style="border-left:3px solid <?php echo $brefData['color']; ?>;border-radius: 0px; color: black;" onclick="redirectToPage('<?php echo BASE_URL; ?>Library/openpdfpagegrid.php?pdfPageName=<?php echo $fileName; ?>&fileID=<?php echo $fileId; ?>&briefName=<?php echo $briefName; ?>');" name="<?php echo $fileName; ?>">
                                                                <?php
                                                                $filePer = $connect->query("SELECT * FROM filepermissions WHERE pageId = '$fileId'");
                                                                while ($filePerData = $filePer->fetch()) {
                                                                ?>
                                                                    <div style="display: inline-block;height:25px;width:3px;background-color:<?php echo $filePerData['color']; ?>;margin-right:5px;"></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php echo $brefData['filename']; ?>

                                                                <button style="float: right;" class="btn btn-primary otherbtn docxLink" name="<?php echo $fileName; ?>">
                                                                    <i class="bi bi-download" data-bs-placement="bottom" title="Download file" style="color:white;"></i>
                                                                </button>
                                                            </a>
                                                        </h1>

                                                        <h1> <a style="display:none" href="<?php echo $fileName; ?>" class="url_value" target="_blank"><?php echo $fileName; ?></a></h1>
                                                    </span></h1>
                                                </tr>
                                                <hr>
                                        <?php
                                            }
                                        }
                                        ?>

                                        <?php
                                        $editBreifQ = $connect->query("SELECT * FROM editor_data WHERE briefId = '$briefId'");
                                        while ($editBData = $editBreifQ->fetch()) {
                                            $bId = $editBData['id'];
                                        ?>
                                            <tr>
                                                <h1><a class="nav-link text-dark" href="<?php echo BASE_URL; ?>Library/pageDatagrid.php?pId=<?php echo $bId; ?>&userBrief_ID=<?php echo $briefId; ?>" role="button" style="border-left:3px solid <?php echo $editBData['color']; ?>;border-radius: 0px;">
                                                        <?php
                                                        $perColor1 = array();
                                                        $perC = 0;
                                                        $perColorQ = $connect->query("SELECT * FROM pagepermissions WHERE pageId = '$briefId'");
                                                        while ($perColor = $perColorQ->fetch()) {

                                                            if (!in_array($perColor['color'], $perColor1)) {
                                                        ?>
                                                                <span style="border-left: 3px solid <?php echo $perColor['color']; ?>;margin-right: 5px;"></span>
                                                        <?php
                                                            }
                                                            $perColor1[$perC] = $perColor['color'];
                                                            $perC++;
                                                        } ?>
                                                        <?php echo $editBData['pageName']; ?>
                                                        <button style="float: right;" class="btn btn-primary otherbtn" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId<?php echo $row_file12['id'] ?>');">
                                                            <i class="bi bi-window-plus" data-bs-placement="bottom" title="Open in New Window" style="color:white;"></i>
                                                        </button>
                                                    </a>

                                                </h1>
                                            </tr>
                                            <hr>

                                    <?php
                                        }
                                    }

                                    ?>
                                </table>

                            </div>


                        </div>
                    </div>
                    <!-- End Row -->

                </div>
            </center>
        </div>
    </main>




    <div class="modal fade" id="view_document_pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success modalName"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <embed id="pdf_view1" type="application/pdf" frameborder="0" width="100%" height="700px">
                </div>

            </div>
        </div>
    </div>


<script>
    $(".onLineUrl").on("click", "button", function() {
        var id = $(this).attr('id');
        var text = $(this).attr('name');

        var temp2 = $("<input>");
        $("body").append(temp2);
        temp2.val(text).select();
        document.execCommand("copy");
        temp2.remove();
        // alert("hii");
        $('.get_url_val').find("#" + id).find(".bi").removeClass("bi-files").addClass("bi-check-circle");
        $('.get_url_val').find("#" + id).removeClass("btn-primary").addClass("btn-soft-success");
        setTimeout(function() {
            $('.get_url_val').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-files");
            $('.get_url_val').find("#" + id).removeClass("btn-soft-success").addClass("btn-primary");
            window.open(text, '_blank');
        }, 2000);

    });
    $(".offLineUrl").on("click", "button", function() {
        var id = $(this).attr('id');
        var text = $(this).attr('name');

        var temp2 = $("<input>");
        $("body").append(temp2);
        temp2.val(text).select();
        document.execCommand("copy");
        temp2.remove();
        // alert("hii");
        $('.get_url_val1').find("#" + id).find(".bi").removeClass("bi-files").addClass("bi-check-circle");
        $('.get_url_val1').find("#" + id).removeClass("btn-primary").addClass("btn-soft-success");
        setTimeout(function() {
            $('.get_url_val1').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-files");
            $('.get_url_val1').find("#" + id).removeClass("btn-soft-success").addClass("btn-primary");
            window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
        }, 2000);

    });
</script>

<script>
    $(".view_document_pdf").on("click", function() {
        name = $(this).attr("title");
        $(".modalName").text(name);
        $('#pdf_view1').attr('src', '<?php echo BASE_URL ?>includes/Pages/files/' + name);

    });
    $(".view_document_pdf1").on("click", function() {
        name = $(this).attr("title");
        $(".modalName").text(name);
        $('#pdf_view1').attr('src', '<?php echo BASE_URL ?>includes/pages/files/' + name);

    });
</script>
<script>
    function openInSamePage(url) {
        window.location.href = url;
    }
</script>
<!-- <script>
    function redirectToPage(url) {
        window.location.href = url;
    }
</script> -->

<script>
    function redirectToPage(url) {
        window.location.href = url;
    }
</script>

<script>
    function redirectToPage1(element) {
        var buttonId = element.id;

        window.location.href = "<?php echo BASE_URL; ?>includes/Pages/fheader2.php?folder_ID=<?php echo $f_id ?>&b_id=" + buttonId;
    }

    function openInNewWindow(url) {
        window.open(url, '_blank');
    }

    $(".docxLink").on("click", function() {
        var fileName = $(this).attr("name");

            function downloadFile(url, fileName) {
                var link = document.createElement('a');
                link.href = url;
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }

            // Download the DOCX file
            var docxUrl = "<?php echo BASE_URL; ?>includes/pages/files/" + fileName;
            var docxFileName = fileName;
            downloadFile(docxUrl, docxFileName);
    });
</script>
<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>