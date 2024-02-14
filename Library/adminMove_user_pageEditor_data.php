<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$pageId1 = $_REQUEST['moveId'];
if (isset($_COOKIE['libShopId'])) {
    $libShopId = $_COOKIE['libShopId'];
  }
  
  if (isset($_COOKIE['libLibId'])) {
    $libLibId = $_COOKIE['libLibId'];
  }
  
  if (isset($_COOKIE['libLVid'])) {
    $libLVid = $_COOKIE['libLVid'];
  }
  $_SESSION['page'] = 'library';
?>

<?php
  $lib_id = 1;
  if (isset($_GET['library'])) {
    $lib = "Main";
    $_SESSION['library_value'] = $lib = urldecode(base64_decode($_GET['library']));
  } else if (isset($_SESSION['library_value'])) {
    $lib = $_SESSION['library_value'];
  } else {
    $lib = "Main";
  }
  if (isset($_GET['lib_id'])) {
    $lib_id = "";
    $_SESSION['libraryid_value'] = $lib_id = urldecode(base64_decode($_GET['lib_id']));
  } else if (isset($_SESSION['libraryid_value'])) {
    $lib_id = $_SESSION['libraryid_value'];
  } else {
    if (isset($_SESSION['libraryid_value'])) {
      $lib_id = $_SESSION['libraryid_value'];
    }
  }
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
            width: inherit;
            padding: 20px;
            border: 1px solid black;
        }

        .brfol {
            border: 1px solid red;
        }
    </style>
</head>

<body>
    <?php include 'lb_loader.php';?>
    
    
    <div id="header-hide">
    <?php include ROOT_PATH . 'includes/library_header.php';

// $folderId = $_SESSION['folderId'];
$userId = $_SESSION['login_id'];
?>
        <main id="content" role="main" class="main">
            <div class="content container-fluid">
                <div class="row justify-content-center">
                    <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
                    <div class="col-lg-12">
                        <div class="card card-hover-shadow h-100">
                            <div class="allContainer">
                                <h1>Move File</h1>
                                <form>
                                    <div class="form-group">
                                        <input type="hidden" id="pageId" value="<?php echo $pageId1; ?>" readonly />
                                        <label for="exampleInputPassword1">Name</label>
                                        <?php
                                        $sql = $connect->query("SELECT pageName FROM editor_data WHERE id = '$pageId1'");
                                        $pageName = $sql->fetchColumn();
                                        ?>
                                        <input type="text" class="form-control" id="pageName" placeholder="Password" value="<?php echo $pageName; ?>">
                                    </div>
                                    <div style="margin-top:25px;">
                                        <?php
                                        $sql1 = $connect->query("SELECT * FROM folders");
                                        while ($fData = $sql1->fetch()) {
                                            $fName = $fData['folder'];
                                        ?>
                                            <div class="folbr" name="<?php echo $fData['id']; ?>" value="0"><?php echo $fName; ?></div>
                                            <hr>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        $sql1 = $connect->query("SELECT * FROM briefcase");
                                        while ($fData = $sql1->fetch()) {
                                        ?>
                                                <div class="folbr" value="<?php echo $fData['id']; ?>" name="0"><?php echo $fData['briefcase']; ?></div>
                                                <hr>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        $query = $connect->query("SELECT * FROM user_briefcase");
                                        while ($result = $query->fetch()) {
                                            $userbriefId = $result['id'];
                                        ?>
                                            <div class="folbr" value="<?php echo $userbriefId; ?>" name="0"><?php echo $result['briefcase_name']; ?></div>
                                            <hr>
                                        <?php } ?>
                                    </div>
                                    <button style="margin:5px;float:right;display:none;" class="btn btn-success" type="button" id="copyNewPage">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


<script>
    $(".folbr").on("click", function() {
        $(".folbr").removeClass("brfol");
        $(this).addClass("brfol");
        $("#copyNewPage").css('display', 'block');
    });

    $("#copyNewPage").on("click", function() {
        var breifCase = $(".brfol").attr("value");
        var pageId = $("#pageId").attr('value');
        var pageName = $("#pageName").val();
        var folder = $(".brfol").attr("name");

        $.ajax({

            type: "POST",
            url: "<?php echo BASE_URL; ?>Library/move_userEditorData.php",
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