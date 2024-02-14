<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// session_start();
include("./fheader.php");
$b_name = "";
$b_id = "";
$fi_id = "";
if (isset($_COOKIE["f_id"])) {
    $_SESSION['folderId'] = $_COOKIE["f_id"];
}

if (isset($_REQUEST['folder_ID'])) {
    $fi_id = $_SESSION['folderId'] = $_REQUEST['folder_ID'];
}
if (isset($_REQUEST['b_id'])) {
    $b_id = $_SESSION['b_id'] = $_REQUEST['b_id'];
    $b_name = $connect->prepare("SELECT briefcase_name FROM `user_briefcase` WHERE id=?");
    $b_name->execute([$b_id]);
    $b_name = $b_name->fetchColumn();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg">
    <title>new page</title>
</head>

<body onload="getses();">

    <script src="loading.js"></script>
    <div id="loading-screen" style="display:none;">
    <?php include (ROOT_PATH .  'Library/lb_loader.php');?>
  </div>
    <!-- <center>
    <main style="width:80%; margin-left:290px; margin-top:10px;" >
         <a style="margin-right:1170px; display: none;" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Shelf Page" href="<?php echo BASE_URL; ?>Library/index.php"><i class="bi bi-arrow-left"></i></a>
    </main>
</center> -->
    <!-- <script>
        function getses() {
            var f_Id = sessionStorage.getItem('folder_id');
        };
    </script> -->
    <div>
        <?php include(ROOT_PATH . 'Library/secondWindowHeader.php') ?>

    </div>

    <main id="content" role="main" class="main">


        <!-- Content -->
        <div class="content container-fluid" style="background-color:black; margin-left:-85px;">
            <center>
                <div class="row justify-content-center">
                    

                    <div class="col-lg-10 mb-3">
                        <div class="card-header card-header-content-center" style="background-color:black; border-bottom:none;">

                             <?php
                    $creDetail = $connect->query("SELECT * FROM user_briefcase WHERE id = '$b_id'");
                    while ($creData = $creDetail->fetch()) {
                        $brId = $creData['user_id'];
                        $perUserQuery = $connect->query("SELECT nickname FROM users WHERE id = '$brId'");
                        $perName = $perUserQuery->fetchColumn();
                        $fileUserId = $creData['user_id'];
                    ?>
                        
                        <p style="color:white;text-transform:uppercase;font-size: xx-large; font-weight:bold;"><b> <?php echo $creData['briefcase_name']; ?></b>
                        </p>

                    <?php
                    }
                    ?>

                            </a>


                        </div>
                    </div>
                    <!-- End Row -->

                </div>
            </center>
        </div>
    </main>

    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-black" style="right:0px !important;top:65px;left: inherit;border-left: 1px solid white; z-index: 0;" id="aside">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset" style="height:auto;">

                <div style="margin-top: 12%;margin-left: 10%;">
                    <h3 style="color:white;">Details</h3>
                    
                        <p style="color:white;">Created By <?php echo $perName; ?></p>
                        

                    
                    <hr>
                </div>


                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                        <div id="navbarVerticalMenuPagesMenu">
                            <div class="nav-item">
                                <?php
                                if($userId == $brId){
                                ?>
                                <a data-bs-toggle="modal" data-bs-target="#editbreif" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/Edit1.png">
                                        </div>
                                        Edit
                                    </span>
                                </a>

                                <a href="<?php echo BASE_URL ?>Library/edit_briefs.php?briefDeleteId=<?php echo $b_id; ?>&fol=<?php echo $fi_id ?>" class="nav-link dropdown-toggle-split">
                                    <span style="color:white;" class="nav-link-title">
                                        <div style="border-radius: 60%; background-color:grey; display: inline-block; padding: 5px; margin: 5px;">
                                            <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/white/delete_1.png">
                                        </div>
                                        Delete
                                    </span>
                                </a>
                                <?php } ?>
                            </div>
                            <hr>
                        </div>

                        <div id="navbarVerticalMenuPagesMenu" style="display:none;">
                            <div class="nav-item">
                                <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarFileFavorite" aria-expanded="false" aria-controls="navbarFileFavorite">
                                    <span style="color:white;" class="nav-link-title">Favourite</span>
                                </a>
                                <div id="navbarFileFavorite" class="nav-collapse collapse hide" data-bs-parent="#navbarFileFavorite" hs-parent-area="#navbarFileFavorite">

                                    <div id="navbarUsersMenuDiv">
                                        <div class="nav-item">
                                            <form method="POST" action="<?php echo BASE_URL; ?>Library/saveFavourite.php">
                                                <input type="hidden" name="pageId" value="<?php echo $fileID; ?>" />
                                                <!-- <input class="btn btn-success" type="submit" value="submit" name="favSubmit"> -->
                                                <div style="position:relative;">
                                                    <a href="<?php echo $redUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="red"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#dc3545" />
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $greenUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="green"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#28a745" />
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $yellowUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="yellow"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#ffc107" />
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $blueUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="blue"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#007bff" />
                                                </div>
                                                <div style="position:relative;">
                                                    <a href="<?php echo $blackUrl; ?>" class="nav-link">
                                                        <span style="color:white;" class="nav-link-title" id="grey"></span>
                                                    </a>
                                                    <input style="position: absolute;top:16px;right:25px" type="checkbox" name="favColor[]" value="#6c757d" />
                                                </div>
                                                <!-- <input style="float: right;" class="btn btn-success" type="submit" value="submit"> -->
                                            </form>
                                        </div>

                                    </div>
                                    <hr>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <div class="modal fade" id="editbreif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Briefcase</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo BASE_URL ?>Library/edit_briefs.php">
                        <input type="hidden" class="form-control" name="briefId" value="<?php echo $b_id ?>" id="brief_edit_id" readonly>
                        <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
                        <input type="hidden" class="form-control" name="fol" value="<?php echo $fi_id ?>">
                        <input type="text" class="form-control" name="brief" value="<?php echo $b_name ?>" id="brief1">
                        <br>
                        <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_briefcase" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>