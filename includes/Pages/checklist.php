<?php

include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$output = "";
$course = "select course";
$std_course = "";
if (isset($_REQUEST['noti_id'])) {
  $noti_id = urldecode(base64_decode($_REQUEST['noti_id']));
  $update_read = "UPDATE `notifications`
  SET `is_read` = 1 WHERE `id`='$noti_id'";
  $update_statement = $connect->prepare($update_read);
  $update_statement->execute();
}

$in11 = "";
$q6 = "SELECT * FROM users where role='instructor' or role = 'instructors'";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $in11 .= '<option value="' . $row6['id'] . '">' . $row6['nickname'] . '</option>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Checklist Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<body>


<?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  <!--Head Navbar-->
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <!--Main Content-->

  <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">
          <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Quiz.png">
          Checklist
        </h1>
      </div>
      <!-- End Page Header -->
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">

              <?php include 'courcecode.php'; ?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              
              <form action="" method="post" style="width:100%;" id="" enctype="multipart/form-data">

                <div class="row">


                  <div class="col-md-6 mb-4">
                     <div class="form-outline">
                      <label class="form-label" for="item_name" style="color: black; font-weight:bold;">CheckList Item Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" type="text" name="item_name" required />

                    </div>

                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="description" style="color: black; font-weight:bold;">Description<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" type="text" name="description" required />

                    </div>
                  </div>

                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="date" style="color: black; font-weight:bold;">Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" type="date" name="date" required />

                    </div>
                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="status" style="color: black; font-weight:bold;">Status<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" type="text" name="status" required />

                    </div>

                  </div>


                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="coursemanager" style="color: black; font-weight:bold;">Assigned To<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>

                      <select id="coursemanager" name="coursemanager" class="form-control form-control-md" required>
                        <option selected disabled value="">-Instructor-</option>
                        <?php
                        echo $in11;

                        ?>

                      </select>
                      <br>
                    </div>

                  </div>



                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="coursemanager" style="color: black; font-weight:bold;">Priority<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>

                      <select id="coursemanager" name="coursemanager" class="form-control form-control-md" required>
                        <option selected disabled value="">-Priority-</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                      </select>
                      <br>
                    </div>
                  </div>

                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label" style="color:black; font-weight:bold;">Category<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control" type="text" name="category" value="" /><br>
                    </div>

                  </div>

                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label" for="coursemanager" style="color: black; font-weight:bold;">Comments<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <textarea class="form-control" name="comment"></textarea>
                    </div>

                  </div>

                </div>

                <div class="row">
                  <center>
                    <input class="btn btn-success" style="width:50%;" type="submit" value="Submit" name="submit" />
                  </center>
                </div>
            </div>

            </form>

            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->

    <div class="row justify-content-center d-none">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">

              <?php include 'courcecode.php'; ?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
             
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->
    </div>

  </main>


<!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>

</body>
</html>