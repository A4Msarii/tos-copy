<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Phase</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, 
                    initial-scale=1" />
    <?php include 'gs_thumbnail.php'; ?>

</head>
<style type="text/css">
    tr:hover {
        background-color: #accbec6b;
    }
</style>
<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  

<div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    $course = "";
    $ctp = "";
    ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">
    <!-- Content -->
    <div>
        <div class="content container-fluid" style="height: 30rem;">
            <!-- Page Header -->
            <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
            <div class="page-header" style="padding: 0px;">
                <h1 class="text-success">Manage Phase On Actual Page</h1>
            </div>
            <!-- End Page Header -->
        </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

        <div class="row justify-content-center">

            <div class="col-lg-10 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
                    <!-- Header -->
                    <div class="card-header card-header-content-center">
                        <?php
                        $ctp = "";
                        if (isset($fixed_ctp_id)) {
                            $_SESSION['ctp_value'] = $ctp = $fixed_ctp_id;
                        } else if (isset($_SESSION['ctp_value'])) {
                            $ctp = $_SESSION['ctp_value'];
                        }
                        $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
                        $statement = $connect->prepare($ctp_id);
                        $statement->execute();
                        if ($statement->rowCount() > 0) {
                            $result = $statement->fetchAll();
                            $sn = 1;
                            foreach ($result as $row) {
                                $course = $row['course'];
                            }
                        }
                        if (isset($_SESSION['ctp_value'])) { ?>
                            <h3>Selected CTP: <span style="color:blue;"><?php echo $course ?></span></h3>
                        <?php } else { ?>
                            <h3>Selected CTP: <span style="color:red;">Select ctp</span></h3>
                        <?php }  ?>

                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div id="info-phase">
                            <?php
                            if (isset($_REQUEST['error'])) {
                                $error = $_REQUEST['error'];
                                echo $error;
                            }
                            ?></div>
                        <form action="giveContainerPermission.php" method="post" style="width:100%;" enctype="multipart/form-data">
                        <select name="cardName" id="cardName" class="form form-control" required>
                            <option selected value="">--Select Card--</option>
                            <option value="allGradsheet">All Gradesheet</option>
                            <option value="clearncaeLog">Clearncae Log</option>
                            <option value="myMissingGradsheet">My Missing Gradsheet</option>
                        </select>
                            <?php

                            $select_ctps = "SELECT r.*
                            FROM roles r
                            LEFT JOIN rolepermission rp ON r.roles = rp.rolePermission
                            WHERE rp.rolePermission IS NULL";
                            $select_ctps2 = $connect->prepare($select_ctps);
                            $select_ctps2->execute();

                            if ($select_ctps2->rowCount() > 0) {
                                $select_ctpsre2 = $select_ctps2->fetchAll();
                                foreach ($select_ctpsre2 as $select_ctpsrow2) {
                            ?>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" value="<?php echo $select_ctpsrow2['roles'] ?>" name="userId[]" type="checkbox">
                                        <label class="custom-control-label"><?php echo $select_ctpsrow2['roles'] ?></label>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual">
                            <table class="table table-bordered tableData" style="display:none;">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-white">#</th>
                                        <th class="text-white">Profile Image</th>
                                        <th class="text-white">Name</th>

                                    </tr>
                                </thead>
                                <tbody class="userDetail">

                                </tbody>
                            </table>
                            <div class="row">
                                <center>
                                    <input class="btn btn-success" style="width:50%;" type="submit" value="Submit" name="containerPermission" />
                                    <br><br>
                                </center>
                        </form>
                        <hr>
                        <br><br>
                        <table class="table table-striped table-bordered">
                            <thead class="bg-dark">
                                <th class="text-white">Sr No</th>
                                <th class="text-white">Permission</th>
                                <th class="text-white" colspan="2">Action</th>
                            </thead>
                            <?php
                            $query112 = "SELECT * FROM rolepermission";
                            $statement112 = $connect->prepare($query112);
                            $statement112->execute();
                            if ($statement112->rowCount() > 0) {
                                $result112 = $statement112->fetchAll();
                                $sn112 = 1;
                                foreach ($result112 as $row112) {
                                    $perId = $row112['rolePermission'];
                                    if (is_numeric($perId)) {
                                        $tQ = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                                        $tData = $tQ->fetchColumn();
                                      } else {
                                        $tData = $row112['rolePermission'];
                                      }
                            ?>
                                    <tr>
                                        <td><?php echo $sn112++; ?></td>
                                        <td><?php echo $tData; ?></td>
                                        <td>
                                            <a href="giveContainerPermission.php?deleteId=<?php echo $row112['id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a>

                                        </td>

                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>

                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->

</main>


<script>
    setTimeout(function() {
        document.getElementById('info-phase').style.display = 'none';
        /* or
        var item = document.getElementById('info-message')
        item.parentNode.removeChild(item); 
        */
    }, 4000);
</script>

<script>
    $(".txt_search").keyup(function() {
        var search = $(this).val();
        // alert(search);
        if (search != "") {

            $.ajax({
                type: 'POST',
                url: '<?php echo BASE_URL; ?>Library/getPermissionSearch.php',
                data: {
                    search1: search,
                },
                success: function(response) {
                    // alert(response);
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

 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>
</html>