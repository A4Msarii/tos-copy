<?php
$std_course = "";
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Evaluation</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>



  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Evaluation.png">
            Evaluation
          </h1>
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
          <div class="card card-hover-shadow" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
              <!--Student name And course name-->
              <?php include 'courcecode.php'; ?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <div id="info-evaluation">
                <?php
                $red = "";
                ?></div>
              <?php if (isset($_SESSION['permission']) && $permission['view_marks_evalution'] == "1") {
                $red = "readonly";
              }
              if(isset($_SESSION['permission']) && $permission['give_marks_evalution'] == "1"){
                $red = "";
              }
              
              ?>
              <table class="table table-bordered table-striped">
                <tr>
                  <td>
                    <form action="self_marks.php">
                      <table class="table table-bordered table-striped">
                        <label class="text-dark" style="font-weight: bolder; font-size: large;">Self</label>
                        <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
                        <input type="hidden" value="<?php echo $std_course1 ?>" name="course_id">
                        <?php
                        $self = "";
                        $select_self_marks = $connect->prepare("SELECT marks FROM `self` WHERE student_id=? and course_id=?");
                        $select_self_marks->execute([$fetchuser_id, $std_course1]);
                        $self = $select_self_marks->fetchColumn();
                        ?>
                        <tr>
                          <td>
                            <input type="number" <?php echo $red ?> name="marks" class="form-control" value="<?php echo $self; ?>" placeholder="Self Marks..">
                          </td>
                        </tr>
                        <?php if(isset($_SESSION['permission']) && $permission['give_marks_evalution'] == "1"){ ?>
                          <tr>
                            <td>
                              <center>
                                <input type="submit" name="submit" value="Submit" class="btn btn-success" style="margin:10px;">
                              </center>
                            </td>
                          </tr>
                        <?php } ?>
                      </table>
                      <!-- <input type="hidden" id="dis_id" name="dis_id" value=""> -->
                    </form>
                  </td>
                  <td>
                    <form action="quiz_marks.php" method="post">
                      <table class="table table-bordered table-striped">
                        <label class="text-dark" style="font-weight: bolder; font-size: large;">Quiz</label>
                        <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
                        <input type="hidden" value="<?php echo $std_course1 ?>" name="course_id">
                        <?php
                        $quiz_marks = "";
                        $select_quiz_marks = $connect->prepare("SELECT marks FROM `quiz_marks` WHERE student_id=? and course_id=?");
                        $select_quiz_marks->execute([$fetchuser_id, $std_course1]);
                        $quiz_marks = $select_quiz_marks->fetchColumn();
                        ?>
                        <tr>
                          <td>
                            <input type="number" name="marks" <?php echo $red ?> class="form-control" placeholder="Quiz Marks.." value="<?php echo $quiz_marks ?>">
                          </td>
                        </tr>
                        <?php if(isset($_SESSION['permission']) && $permission['give_marks_evalution'] == "1"){?>
                          <tr>
                            <td>
                              <center>
                                <input type="submit" name="submit" value="Submit" class="btn btn-success" style="margin:10px;">
                              </center>
                            </td>
                          </tr><?php } ?>
                      </table>
                    </form>
                  </td>
                  <td>
                    <form action="disciplinemark.php" method="post">
                      <table class="table table-bordered table-striped">
                        <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
                        <?php
                        $dis_marks = "";
                        $select_disc_marks = $connect->prepare("SELECT dismarks FROM discipline_data WHERE student_id=?");
                        $select_disc_marks->execute([$fetchuser_id]);
                        $dis_marks = $select_disc_marks->fetchColumn();
                        ?>
                        <tr>

                          <label class="text-dark" style="font-weight: bolder; font-size: large;">Discipline</label>
                          <td>
                            <input type="number" name="dismarks" <?php echo $red ?> class="form-control" placeholder="discipline marks.." value="<?php echo $dis_marks ?>">
                          </td>
                        </tr>
                        <?php if(isset($_SESSION['permission']) && $permission['give_marks_evalution'] == "1"){ ?>
                          <tr>
                            <td>
                              <center>
                                <input type="submit" name="submit" value="Submit" class="btn btn-success" style="margin:10px;">
                              </center>
                            </td>
                          </tr><?php } ?>
                      </table>
                      <!-- <input type="" id="dis_id" name="dis_id" value="">  -->
                    </form>
                  </td>
                </tr>
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


 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>

</body>

</html>