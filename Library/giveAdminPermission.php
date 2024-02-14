<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_REQUEST['filePermissionId'])) {
    $pageId1 = $_REQUEST['filePermissionId'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'lb_thumbnail.php';?>
    <title>Permission</title>
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
    <?php include('./secondWindowHeader.php');
    $folderId = $_SESSION['folderId'];
    $userId = $_SESSION['login_id'];
    ?>
</div>


<main id="content" role="main" class="main">


    <!-- Content -->
    <div class="content container-fluid" style="margin-left:50px;">
      <center>
      <div class="row justify-content-center">
        <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
        <div class="col-lg-11 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:1px solid black;">
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
                <h1 style="margin:10px;">Permission Page</h1>
            </div>
            <!-- Body -->
            <div class="card-body">
             
              <div class="col">
              <!-- Content -->
                            <!-- Header -->

                            <!-- Body -->
                            <div class="card-body">

                              <?php
                            if (isset($_REQUEST['permissionId'])) {
                                $permissionId = $_REQUEST['permissionId'];
                            ?>

                                    <div>
                                        <!-- <input type="hidden" id="userRole" name="userRole" value="<?php echo $userRole; ?>"> -->
                                        <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" autocomplete="off" value="">
                                        <br>
                                    </div>
                                    <div>
                                        <center>
                                            <form method="post" action="giveUserPermission.php" enctype="multipart/form-data">
                                                <center>
                                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                                        <option selected disabled>Select File Method</option>
                                                        <option value="All instructor">All Instructor</option>
                                                        <option value="Everyone">Everyone</option>
                                                    </select>
                                                    <input type="hidden" value="<?php echo $permissionId; ?>" name="permissionPage" />
                                                    <table class="table table-bordered tableData" id="" style="display:none;">
                                                        <thead class="bg-dark">
                                                            <tr>
                                                                <th class="text-light">#</th>
                                                                <th class="text-light">Profile Image</th>
                                                                <th class="text-light">Name</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody class="userDetail">

                                                        </tbody>
                                                    </table>
                                                    <input type="submit" class="btn btn-soft-dark" value="Give Permission" name="permissionBtn" />
                                            </form>
                                        </center>
                                    </div>
                                
                            <?php
                            }
                            ?>

                            <?php
                            if (isset($_REQUEST['filePermissionId'])) {
                                $permissionId = $_REQUEST['filePermissionId'];
                            ?>
                               
                                    <h1>Permision File</h1>
                                    <hr>
                                    <div>
                                        <!-- <input type="hidden" id="userRole" name="userRole" value="<?php echo $userRole; ?>"> -->
                                        <input type="text" id="txt_search" name="to_user" class="form-control" placeholder="share individual" autocomplete="off" value="">
                                        <br>
                                    </div>
                                    <div>
                                        <center>
                                            <form method="post" action="giveUserPermission.php" enctype="multipart/form-data">
                                                <center>
                                                    <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                                                        <option selected disabled>Select File Method</option>
                                                        <option value="All instructor">All Instructor</option>
                                                        <option value="Everyone">Everyone</option>
                                                    </select>
                                                    <input type="hidden" value="<?php echo $permissionId; ?>" name="permissionPage" />
                                                    <table class="table table-bordered" id="tableData1" style="display:none;">
                                                        <thead class="bg-dark">
                                                            <tr>
                                                                <th class="text-light">#</th>
                                                                <th class="text-light">Profile Image</th>
                                                                <th class="text-light">Name</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="userDetail1">

                                                        </tbody>
                                                    </table>
                                                    <input style="font-size:large; font-weight:bold;" type="submit" class="btn btn-soft-dark" value="Give Permission" name="permissionBtn" />
                                            </form>
                                        </center>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            
                            </div>
                            <!-- End Body -->
                     
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



<script>
    $(".txt_search").keyup(function() {
        var search = $(this).val();
        // alert(search);
        if (search != "") {

            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>Library/getPermissionSearch.php',
                data: {
                    search: search,
                },
                success: function(response) {
                    $(".tableData").show();
                    $('.userDetail').empty();
                    $('.userDetail').append(response);
                    // console.log(response);

                }
            });
        } else {
            $('.searchResult').empty();
            $(".tableData").hide();
        }


    });
</script>

<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>