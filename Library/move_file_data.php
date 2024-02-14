<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$pageId1 = $_REQUEST['copyId'];
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
            width: 50%;
            margin-left: 12%;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .folbr {
            height: inherit;
            width: 200px;
            padding: 20px;
            border: 1px solid #00000038;
            border-radius: 20px;
            margin-left: 15px;
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
<?php include 'lb_loader.php';?>
  <div id="header-hide">
    <?php include('./secondWindowHeader.php'); 
    
$folderId = $_SESSION['folderId'];
$userId = $_SESSION['login_id'];
    ?>
</div>

<main id="content" role="main" class="main">


    <!-- Content -->
    <center>
    <div class="content container-fluid" style="margin-left:50px;">
      <div class="row justify-content-center">
        <div class="alertlibrary" style="width: 100%;margin-top: -30px;margin-bottom: -30px;margin-right: 50px;;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
                    <div class="col-lg-12 mb-3 mb-lg-5" style="margin-right: 55px;">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:1px solid black;">
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
                <h1 style="margin:10px;">Move File</h1>
            </div>
            <!-- Body -->
            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <input type="hidden" id="pageId" value="<?php echo $pageId1; ?>" readonly />
                                        
                                        <?php
                                        $sql = $connect->query("SELECT filename FROM user_files WHERE id = '$pageId1'");
                                        $pageName = $sql->fetchColumn();
                                        ?>
                                        <h1 style="color: blueviolet;
    font-size: xx-large;
   
    text-decoration-line: underline;
    text-decoration-style: double;"><?php echo $pageName; ?></h1>
                                        
                                    </div>
                                    <hr>
                                    
                                    <div class="row justify-content-center">
                                        <?php
                                        $sql1 = $connect->query("SELECT * FROM folders WHERE id='$folderId'");
                                        while ($fData = $sql1->fetch()) {
                                            $fName = $fData['folder'];
                                        ?>
                                            <div class="col-2 folbr" name="<?php echo $folderId; ?>" value="0"><?php echo $fName; ?></div>
                                            
                                            <?php
                                            $sel_val = "SELECT file_briefcase.brief_id FROM `file_briefcase`
                                            INNER JOIN file_briefcase_folder ON file_briefcase.file_id = file_briefcase_folder.file_id where file_briefcase_folder.folder_id='$folderId' GROUP BY file_briefcase.brief_id";
                                            $statement1_bb = $connect->prepare($sel_val);
                                            $statement1_bb->execute();
                                            if ($statement1_bb->rowCount() > 0) {
                                                $result1_bb = $statement1_bb->fetchAll();
                                                $sn1122 = 1;
                                                foreach ($result1_bb as $row5) {
                                                    $breifcase_id = $row5['brief_id'];
                                                    $select_breifcase = $connect->prepare("SELECT briefcase FROM briefcase WHERE id=?");
                                                    $select_breifcase->execute([$breifcase_id]);
                                                    $select_breifcase_id = $select_breifcase->fetchColumn();
                                            ?>
                                                    <div class="col-2 folbr" value="<?php echo $breifcase_id; ?>" name="0"><?php echo $select_breifcase_id; ?></div>
                                                    
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                        <?php
                                        $query = $connect->query("SELECT * FROM user_briefcase WHERE user_id = '$userId'");
                                        while ($result = $query->fetch()) {
                                            $userbriefId = $result['id'];
                                        ?>
                                            <div class="col-2 folbr" value="<?php echo $userbriefId; ?>" name="0"><?php echo $result['briefcase_name']; ?></div>
                                            
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
                                </tr>
                            </table><hr>
                            <center>
                                    <button style="margin:5px;display:none;font-size: large; font-weight:bold;" class="btn btn-soft-dark" type="button" id="copyNewPage">Submit</button></center>
                                </form>
                            </div>
                        
                            <!-- End Body -->
                     
        </div>
      </div>
      <!-- End Row -->
    </div>
</div>
</center>
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
        var pageName = $("#pageName").val();
        var folder = $(".brfol").attr("name");

        $.ajax({

            type: "POST",
            url: "<?php echo BASE_URL; ?>Library/move_fileData.php",
            data: {
                breifCase: breifCase,
                pageId: pageId,
                pageName: pageName,
                folder: folder
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