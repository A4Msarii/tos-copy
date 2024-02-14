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
    <title>Edit File Data</title>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
    <style>
        /* .tox-toolbar__group {
            background-color: white !important;
        } */
        .allContainer {
            width: 80%;
            margin-left: 12%;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .folbr {
            height: inherit;
            width: 200px;
            padding: 15px;
            border: 1px solid #00000038;
            border-radius: 20px;
            margin-left: 15px;
            text-align: center;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .brfol {
            border: 2px solid #585555;
    background-color: #a9a7ac75;
    border-radius: 40px;
    box-shadow: -6px 6px 14px 0px;
        }
    </style>
</head>

<body>
<?php include ROOT_PATH .  'lb_loader.php';?>
  <div id="header-hide">
    <?php include('./secondWindowHeader.php'); 
    $pageId1 = $_REQUEST['copyId'];
    $folderId = $_SESSION['folderId'];
    $userId = $_SESSION['login_id'];
    ?></div>


<main id="content" role="main" class="main">


    <!-- Content -->
    <div class="content container-fluid" style="margin-left:50px;">
      <center>
      <div class="row justify-content-center">
        <div class="alertlibrary" style="width: 100%;margin-top: -30px;margin-bottom: -30px;margin-right: 50px;;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
                    <div class="col-lg-12 mb-3 mb-lg-5" style="margin-right: 55px;">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:1px solid black;">
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
                <h1 style="margin:10px;">Copy Page</h1>
            </div>
            <!-- Body -->
            <div class="card-body justify-content-center">                            
                                <form>
                                    <div class="form-group">
                                        <input type="hidden" id="pageId" value="<?php echo $pageId1; ?>" />
                                        
                                        <?php
                                        $sql = $connect->query("SELECT pageName FROM editor_data WHERE id = '$pageId1'");
                                        $pageName = $sql->fetchColumn();
                                        $sql1 = $connect->query("SELECT shopid FROM editor_data WHERE id = '$pageId1'");
                                        $pageShop = $sql1->fetchColumn();
                                        ?>
                                        <h2 id="pageName" style="color: blueviolet;
    font-size: xx-large;
    font-weight: bold;
    text-decoration-line: underline;
    text-decoration-style: double;" value="<?php echo $pageName; ?>" name="<?php echo $pageShop; ?>"><?php echo $pageName; ?></h2>
                                        
                                    </div>
                                    <hr>
                                    
                                    <div class="row justify-content-center">
                                        <?php
                                        $sql1 = $connect->query("SELECT * FROM folders WHERE id='$folderId'");
                                        while ($fData = $sql1->fetch()) {
                                            $fName = $fData['folder'];
                                        ?>
                                           <div class="col-2 folbr" name="<?php echo $folderId; ?>" value="0"><h4><?php echo $fName; ?></h4></div>
                                            
                                            <?php
                                        }
                                        $briefCaseId = $connect->query("SELECT briefId FROM (
                                            SELECT briefId FROM user_files
                                            WHERE folderId = '$f_id' AND shopid = '$shopId' AND user_id = '$userId'
                                            UNION
                                            SELECT briefId FROM editor_data
                                            WHERE folderId = '$f_id' AND shopid = '$shopId' AND userId = '$userId'
                                        ) AS uniqueBriefIds");

                                    while ($briefIdData = $briefCaseId->fetch()) {
                                        $briefCasId = $briefIdData['briefId'];
                                        $briefCaseName = $connect->query("SELECT * FROM user_briefcase WHERE id = '$briefCasId'");
                                        while ($briefCases = $briefCaseName->fetch()) {
                                            ?>
                                                    <div class="col-2 folbr" value="<?php echo $briefCases['id']; ?>" name="<?php echo $briefCases['folderId']; ?>"><?php echo $briefCases['briefcase_name']; ?></div>
                                                    
                                        <?php
                                                }
                                            }
                                        ?>
                                        <?php
                                        $emptyBriefCase = $connect->query("SELECT *
                                        FROM user_briefcase
                                        WHERE (folderId = '$f_id' AND shopid = '$shopId' AND user_id = '$userId')
                                          AND id NOT IN (
                                            SELECT briefId
                                            FROM user_files
                                            UNION
                                            SELECT briefId
                                            FROM editor_data
                                        )");
                                    while ($emptyData = $emptyBriefCase->fetch()) {
                                        $breif_id1 = $emptyData['id'];
                                        ?>
                                            <div class="col-2 folbr" value="<?php echo $emptyData['id']; ?>" name="<?php echo $emptyData['folderId']; ?>"><?php echo $emptyData['briefcase_name']; ?></div>
                                            
                                        <?php } ?>
                                        <?php
                                        if ($role == "super admin") {
                                            $tempBrief = $connect->query("SELECT *
                                        FROM tempbrief
                                        WHERE folderId = '$f_id' AND shopid = '$shopId'");
                                            while ($resTemp = $tempBrief->fetch()) {
                                                $tempBrId = $resTemp['briefId'];
                                                $emptyBriefCase1 = $connect->query("SELECT * FROM user_briefcase WHERE id = '$tempBrId'");
                                                while ($emptyData = $emptyBriefCase1->fetch()) {
                                                    $breif_id1 = $emptyData['id'];
                                        ?>
                                                    <div class="col-2 folbr" value="<?php echo $emptyData['id']; ?>" name="<?php echo $emptyData['folderId']; ?>"><?php echo $emptyData['briefcase_name']; ?></div>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                <hr>
                                <center>
                                    <button style="margin:5px;display:none; font-size:large; font-weight:bold;" class="btn btn-soft-dark" type="button" id="copyNewPage">Submit</button>
                                </center>
                                </form>
                            
                            </div>
                            <!-- End Body -->
                     
        </div>
      </div>
      <!-- End Row -->

    </div>
</center>
</div>
</main>



<script>
    $(".folbr").on("click", function() {
        $(".folbr").removeClass("brfol");
        $(this).addClass("brfol");
        $("#copyNewPage").css('display','block');
    });

    $("#copyNewPage").on("click", function() {
        var breifCase = $(".brfol").attr("value");
        var pageId = $("#pageId").attr('value');
        var pageName = $("#pageName").attr('value');
        var pageShop = $("#pageName").attr('name');
        var folder = $(".brfol").attr("name");

        $.ajax({

            type: "POST",
            url: "<?php echo BASE_URL; ?>Library/copy_editorData.php",
            data: {
                breifCase: breifCase,
                pageId: pageId,
                pageName: pageName,
                folder: folder,
                pageShop: pageShop
            },
            dataType: "html",

            success: function(response) {
                window.location.reload();
            }
        });
    });
</script>
<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>