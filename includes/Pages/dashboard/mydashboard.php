<?php
header("HTTP/1.0 404 Not Found");
include '../../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
// session_start();
// $_SESSION['page'] = 'grade sheet';
// $phase = "";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Home page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <?php include ROOT_PATH . 'includes/Pages/gs_thumbnail.php'; ?>

</head>

<style type="text/css">
  /**/
  .card-subtitle {
    font-size: 1.1rem !important;
  }

  .tooltip-text {
    visibility: hidden;
    position: absolute;
    top: -40px;
    left: 10px;
    z-index: 2;
    width: auto;
    color: white;
    font-size: 12px;
    background-color: #192733;
    border-radius: 10px;
    padding: 10px 15px 10px 15px;
  }

  .circleig1 {
    height: 20px;
    width: 100%;
    position: absolute;
    display: inline-block;
    left: 0px;
    bottom: -18px;
    border-radius: 2px;
    /*    font-weight: bolder;*/
    /*    font-size: larger;*/
    color: white;
    font-family: cursive;
    background: darkcyan;
  }

  .tooltip-text::before {
    content: "";
    position: absolute;
    transform: rotate(45deg);
    background-color: #192733;
    padding: 5px;
    z-index: 1;
    top: 29px;
    left: 35px;
  }

  .btnFlip:hover .tooltip-text {
    visibility: visible;
  }

  .tooltip-text1 {
    visibility: hidden;
    position: absolute;
    top: -42px;
    left: 0px;
    z-index: 2;
    width: auto;
    color: white;
    font-size: 12px;
    background-color: #192733;
    border-radius: 10px;
    padding: 10px 15px 10px 15px;
  }

  .tooltip-text1::before {
    content: "";
    position: absolute;
    transform: rotate(45deg);
    background-color: #192733;
    padding: 5px;
    z-index: 1;
    top: 31px;
    left: 28px;
  }

  .btn-flip11:hover .tooltip-text1 {
    visibility: visible;
  }

  .chart--container {
    height: 100%;
    width: 100%;
    min-height: 530px;
  }

  svg#SvgjsSvg2815 {
    background-color: yellow !important;
  }

  .nav-link.aaaa.active {
    background-color: #67778833 !important;
    /* Set your desired background color */
  }

  .nav-link.aaaa {
    font-weight: bolder;
    font-size: large;
    /*    background: aliceblue;*/
  }

  /* Animation property */
  #selectStudent {
    animation: wiggle 2s linear infinite;
  }

  /* Keyframes */
  @keyframes wiggle {

    0%,
    7% {
      transform: rotateZ(0);
    }

    15% {
      transform: rotateZ(-15deg);
    }

    20% {
      transform: rotateZ(10deg);
    }

    25% {
      transform: rotateZ(-10deg);
    }

    30% {
      transform: rotateZ(6deg);
    }

    35% {
      transform: rotateZ(-4deg);
    }

    40%,
    100% {
      transform: rotateZ(0);
    }
  }

  #selectStudent {

    height: 4em;
    width: max-content;

    background: #444;
    background: linear-gradient(top, #555, #333);
    border: none;
    border-top: 3px solid orange;
    border-radius: 0 0 0.2em 0.2em;
    color: #fff;
    font-family: Helvetica, Arial, Sans-serif;
    font-size: 2em;
    transform-origin: 50% 5em;
  }

  /*.clsbutn:hover {
    background-color: #cddfef !important;
  }*/

  .clsbutn span {
    font-size: large;
    font-weight: bold;
  }
</style>

<body>
  <!-- <a href="export_to_excel.php" target="_blank">Export to Excel</a> -->

  <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
  <div id="loading-screen" style="display:none;">
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  </div>
  <!--Head Navbar-->
  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
    $_SESSION['page'] = 'grade sheet';
    $phase = "";
    ?>
  </div>

  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">

    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;display: none;">
              <ul class="nav nav-pills justify-content-start aaa1" role="tablist" style="margin:5px;">
                <div class="d-flex">
                  <li class="nav-item" style="border-radius: 20px;">
                    <a class="nav-link aaaa active" id="mydashboardinst-tab" href="#mydashboardinst" data-bs-toggle="pill" data-bs-target="#mydashboardinst" role="tab" aria-controls="mydashboardinst" aria-selected="true">
                      <div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 150px; width:150px;border: 1px solid ;">
                        <img style="height:150px; width:150px;" class="avatar" src="<?php echo $pic; ?>" alt="Logo">
                      </div>
                      <div class="flex-grow-2 ms-5">
                        <h3 class="mb-0 text-danger" style="font-weight:bold; font-size:xxx-large; font-family: cursive;"><?php echo $username; ?>
                        </h3>
                      </div>
                    </a>
                  </li>

                </div>

                <div class="d-flex aaaaa">
                  <?php
                  if ($fetchuser_image != "") {
                    $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $fetchuser_image1)) {
                      $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
                    } else {
                      $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
                  } else {
                    $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                  }

                  if (!isset($course_code)) {
                    $course_code = "";
                  }

                  ?>
                  <li class="nav-item" style="border-radius: 20px;">
                    <a class="nav-link aaaa <?php if ($role != "instructor") {
                                              echo "active";
                                            } ?>" id="alldashboard-tab" href="#alldashboard" data-bs-toggle="pill" data-bs-target="#alldashboard" role="tab" aria-controls="alldashboard" aria-selected="false">
                      <div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 150px; width:150px;">
                        <img style="height:150px; width:150px;" class="avatar" src="<?php echo $fetchuser_image1; ?>" alt="Logo">
                      </div>
                      <div class="flex-grow-2 ms-5">
                        <h3 class="mb-0 text-danger" style="font-weight:bold; font-size:xxx-large; font-family: cursive;"><?php echo $fetchnickname ?></h3>
                      </div>
                    </a>
                  </li>

                </div>
              </ul>

            </div>
            <!-- <div class="col-sm-auto" style="text-align: center; margin: 10px;"> -->
            <div class="container-fluid">
              <div class="row">
                <?php
                if (isset($_SESSION['permission']) || $permission['course_phase_man_dashbirad'] == "1") {
                ?>
                  <div class="col-md-3" style="margin-bottom:30px;">

                    <a style="width: fit-content;margin-top: 60px;" onclick="showMyDashboard()" class="nav-link aaaa">
                      <div class="d-flex">
                      <div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 150px; width:150px;">
                        <img style="height:150px; width:150px;border: 1px solid #8c98a4;box-shadow: 1px 1px 7px 1px #8c98a4;" class="avatar" src="<?php echo $pic; ?>" alt="Logo">
                      </div>
                      <div class="flex-grow-1 ms-1">
                        <!-- <div style="float: left;"> -->
                        <center>
                          <h3 class="mb-0 text-danger" style="font-weight:bold; font-size:xx-large; font-family: cursive;padding: 5px;"><?php echo $username; ?>

                          </h3>
                          <?php $back1 = "";
                          $role_color1 = "";
                          $select_roles1 = $connect->prepare("SELECT color FROM `roles` WHERE roles=?");
                          $select_roles1->execute([$role]);
                          $role_color1 = $select_roles1->fetchColumn();
                          if ($role_color1 != "" && $role != "super admin" && $role != "instructor" && $role != "student") {
                            $back1 = "background-color:" . $role_color . ";color:white;";
                          } else if ($role == "super admin") {
                            $back1 = "background-color:#c32e2e;color:white;";
                          } else if ($role == "instructor") {
                            $back1 = "background-color:#c3b02e;color:white;";
                          } else if ($role == "student") {
                            $back1 = "background-color:green;color:white;";
                          } else {
                            $back1 = "background-color:#434044;color:white;";
                          } ?>

                          <span style="<?php echo $back1; ?>;width: 75px;;display: block;margin-top: -5px;text-align: center;
                          border-radius: 5px;font-size: small;position: sticky;"><?php echo $role; ?></span>
                          <?php
                          $inStudid = $connect->query("SELECT studid FROM users WHERE id = '$user_id'");
                          ?>

                          <span class="card-text text-body" style="font-weight:bold;"><?php echo $inStudid->fetchColumn(); ?></span>

                        </center>
                        <!-- </div> -->
                      </div>
                    </div>
                    </a>
                  </div>

                  <!-- </center> -->
                  <!-- <hr style="margin:0px;"> -->
                  <div class="col-md-9">
                    <div class="row">

                      <?php
                      $pQuery = $connect->query("SELECT * FROM manage_role_course_phase WHERE intructor = '$user_id' OR b_up_manger = '$user_id' GROUP BY courseName,courseCode");
                      while ($pData = $pQuery->fetch()) {
                        $courseCode = $pData['courseCode'];
                        $courseName = $pData['courseName'];
                        $checkAva = $connect->query("SELECT count(*) FROM newcourse WHERE CourseName = '$courseName' AND CourseCode = '$courseCode'");
                        if ($checkAva->fetchColumn() > 0) {
                          $fetchCourseSym = $connect->query("SELECT symbol,color FROM ctppage WHERE CTPid = '$courseName'");
                          $courseSym = $fetchCourseSym->fetch();
                          if ($courseSym['color'] == "") {
                            $CourceColor = "#677788";
                          } else {
                            $CourceColor = $courseSym['color'];
                          }
                          $checkCManager = $connect->query("SELECT count(*) FROM newcourse WHERE CourseName = '$courseName' AND CourseCode = '$courseCode' AND CourseManager = '$user_id'");
                      ?>
                          <div class="col-3">
                            <div class="card card-hover-shadow m-1" style="height: fit-content;">
                              <div class="card-header" style="text-align:center;padding:5px;color: white;background:<?php echo $CourceColor; ?> ;">

                                <?php echo $courseSym['symbol'] . "-" . $courseCode; ?>


                              </div>
                              <?php if ($checkCManager->fetchColumn() > 0) {
                                // echo "Course Manager";
                              ?>
                                <span style="background-color:#5c0080;color:white;padding: 1px;margin: 0px;position: relative;font-size: small;text-align: center;" id="co_mana">Course Manager</span>
                              <?php
                              } ?>
                              <div class="card-body" style="padding: 10px; font-weight:bold;font-size: large;display: flex;">
                                <div class="row">
                                  <?php
                                  $fetchPhase = $connect->query("SELECT * FROM manage_role_course_phase WHERE courseName = '$courseName' AND courseCode = '$courseCode' AND (intructor = '$user_id' OR b_up_manger = '$user_id') GROUP BY phase_id");
                                  while ($fetchPhaseData = $fetchPhase->fetch()) {
                                    $pId = $fetchPhaseData['phase_id'];
                                    $phaseQuery = $connect->query("SELECT phasename,color FROM phase WHERE id = '$pId'");
                                    $phaseQueryData = $phaseQuery->fetch();
                                    if ($phaseQueryData['color'] == "") {
                                      $PhaseColor = "#677788";
                                    } else {
                                      $PhaseColor = $phaseQueryData['color'];
                                    }
                                  ?>
                                    <div class="col-md-4 border m-1" style="width:max-content;color:<?php echo $PhaseColor; ?>;font-size: small;">

                                      <?php
                                      echo $phaseQueryData['phasename'];
                                      if ($fetchPhaseData['b_up_manger'] == $user_id && $fetchPhaseData['intructor'] != $user_id) {
                                        echo " <span>-B/U</span>";
                                      }
                                      ?>

                                    </div>
                                  <?php
                                  }
                                  ?>

                                </div>
                              </div>
                            </div>
                          </div>
                        <?php
                        }
                      }
                      $fetchCourseManaCourse = $connect->query("SELECT * FROM newcourse WHERE CourseManager = '$user_id' GROUP BY courseName,courseCode");
                      while ($fetchCourseManaCourseData = $fetchCourseManaCourse->fetch()) {
                        $courseCode = $fetchCourseManaCourseData['CourseCode'];
                        $courseName = $fetchCourseManaCourseData['CourseName'];
                        $checkPhaseManager = $connect->query("SELECT count(*) FROM manage_role_course_phase WHERE intructor = '$user_id' AND courseName = '$courseName' AND courseCode = '$courseCode'");
                        if ($checkPhaseManager->fetchColumn() <= 0) {
                          $fetchCourseSym = $connect->query("SELECT symbol,color FROM ctppage WHERE CTPid = '$courseName'");
                          $courseSym = $fetchCourseSym->fetch();
                          if ($courseSym['color'] == "") {
                            $CourceColor = "#677788";
                          } else {
                            $CourceColor = $courseSym['color'];
                          }
                        ?>
                          <div class="col-3">
                            <div class="card card-hover-shadow m-1">
                              <div class="card-header" style="text-align:center;padding:0px;color: white;background:<?php echo $CourceColor; ?> ;">

                                <span><?php echo $courseSym['symbol'] . "-" . $courseCode; ?></span>
                              </div>
                              <span style="background-color:#5c0080;color:white;padding: 1px;margin: 0px;position: relative;font-size: small;text-align: center;" id="co_mana">Course Manager</span>
                              <div class="card-body" style="padding: 5px; font-weight:bold;font-size: large;display: flex;justify-content: center;">
                                <center>
                                  <img src="<?php echo BASE_URL; ?>assets/svg/test/nophase.gif" style="height: 80px;width: 150px;">
                                </center>
                              </div>
                            </div>

                          </div>
                      <?php
                        }
                      }
                      ?>
                      <!-- <div style="float:right; margin:5px;">
                        <i style="float: right; font-size:large; padding: 2px 4px 2px 4px;" class="bi bi-arrow-right-short btn btn-sm load-more-btn btn-outline-primary" data-section="<?php echo $sectionIndex; ?>" data-current-page="1"></i>

                    </div> -->
                    </div>
                  </div>
                  <div style="position: absolute;">
                    <a type="button" class="btn clsbutn active" style="margin: 5px;position: relative;top: 155px;left: 105px;" href="<?php echo BASE_URL; ?>includes/Pages/Home.php" title="Switch To <?php echo $fetchnickname ?>">
                      <?php
                      if ($fetchuser_id != 0) {
                      ?>
                        <div class="" style="display:grid;">
                          <?php
                          if ($fetchuser_image != "") {
                            $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $fetchuser_image1)) {
                              $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
                            } else {
                              $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                            }
                          } else {
                            $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                          }

                          if (!isset($course_code)) {
                            $course_code = "";
                          }

                          ?>


                          <div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 50px; width:50px;">
                            <img style="height:50px; width:50px;border: 3px solid #8c98a4;
    box-shadow: 1px 1px 7px 1px #8c98a4;" class="avatar" src="<?php echo $fetchuser_image1; ?>" alt="Logo">
                            <!-- <span style="font-size: x-small;" class="badge text-dark">Switch To <?php echo $fetchnickname ?></span> -->
                          </div>

                          <span style="font-size: x-small;margin-left: -20px;" class="badge text-dark bg-soft-success">Switch To <?php echo $fetchnickname ?></span>
                        </div>
                      <?php
                        // include ROOT_PATH . 'includes/Pages/stud_info.php';
                      } else {
                        echo '<div class="" style="display:grid;"><div class="avatar avatar-lg avatar-circle" id="avtimg" style="height: 50px; width:50px;">
        <img style="height:50px; width:50px;border: 1px solid green;box-shadow: 1px 1px 7px 1px #0080005e;" class="avatar" src="' . BASE_URL . 'assets\exam_imag\group_user.png" alt="Logo">
      </div>
      <span style="font-size: x-small; margin-left: -20px;" class="badge text-dark bg-soft-success">Switch To All</span></div>';
                      }
                      ?>
                    </a>
                    <!-- <span style="background-color: green;color: white;width: 100%;display: block;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-top: -5px;text-align: center;">Student</span> -->
                  </div>
              </div>
              <?php
                  // var_dump($_COOKIE);
                  if (isset($_COOKIE['phpgetcourse']) && isset($_COOKIE['student']) && $_COOKIE['student'] != 'all' || isset($_COOKIE['student']) && isset($_COOKIE['course_ids']) && $_COOKIE['student'] == 'all') { ?>
               
              <?php
                  } else {
              ?>
                <div class="justify-content-center">
                  <center> <img src="<?php echo BASE_URL; ?>assets/approved/student.gif" style="height: 500px;
                    width: 500px;
                    position: unset;
                    margin-top: -320px;margin-bottom: -150px;" alt=""></center>
                </div>
            <?php
                  }
                }
            ?>
            </div>

          </div>
        </div>
      </div>
    </div>





    <!-- End Header -->

    <div class="row justify-content-center">

      <div class="col-lg-11 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
          <!-- Body -->
          <div class="card-body">

            <div class="tab-content">
              <div class="tab-pane fade <?php if (isset($_SESSION['permission']) || $permission['course_phase_man_dashbirad'] == "1") {
                                          echo "show active";
                                        } ?> ayushishow" id="mydashboardinst" role="tabpanel" aria-labelledby="mydashboardinst-tab">
                <?php include ROOT_PATH . 'includes/Pages/dashboard/coursemanagerdashboard.php'; ?>
              </div>

            </div>
            <!-- End Card -->
          </div>
        </div>
      </div>

    </div>
    </div>

    <!-- End Content -->

  </main>
  <!-- ========== END MAIN CONTENT ========== -->
  <?php
  function getcall($mark_total, $cat_convert_val, $count_of_value)
  {


    $get_sum = $mark_total * $cat_convert_val;
    $get_all_count = $count_of_value * 100;
    $final_cal = $get_sum / $get_all_count;
    return $final_cal;
  }
  ?>
  <!-- ========== SECONDARY CONTENTS ========== -->







  <div class="modal fade" id="memoinfo" tabindex="-1" role="dialog" aria-labelledby="memoinfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-success" id="topic" style="font-size: x-large;"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="hidden" id="memo" name="memo" value="">
          <label class="form-label text-dark" style="font-weight:bold;font-size: large;">Date : </label>
          <span type="date" name="date" id="date" style="font-weight:bold;font-size: large;"></span><br>
          <label class="form-label" style="font-weight:bold;font-size: large;">Instructor : </label>
          <span type="text" name="comment" id="inst" style="font-weight:bold;font-size: large;"></span><br>
          <label class="form-label" style="font-weight:bold;font-size: large;">Comment : </label>
          <span type="text" name="comment" id="comment" style="font-weight:bold;font-size: large;"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="CAPinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" id="capmodalcolor">
          <h3 class="modal-title text-light" id="capname" style="margin-bottom:20px;"></h3>
          <button style="margin-top: -40px;color: black;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="fetch_value_caps"></div>

        </div>
      </div>
    </div>
  </div>

  <!-- fetch file -->

  <div id="testAttachModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="">Attachement's</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="testFile">

          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="quizAttachModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="">Attachement's</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="quizFile">

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="disciplineinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-success" id="topic_desc" style="font-size:x-large;">discipline</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="hidden" id="desci" name="desci" value="">
          <label class="form-label text-dark" style="font-weight:bold;font-size: large;">Date : </label>
          <span type="date" name="date" id="date_desc" style="font-weight:bold;font-size: large;"></span><br>
          <label class="form-label" style="font-weight:bold;font-size: large;">Instructor : </label>
          <span type="text" name="comment" id="inst_desc" style="font-weight:bold;font-size: large;"></span><br>
          <label class="form-label" style="font-weight:bold;font-size: large;">Comment : </label>
          <span type="text" name="comment" id="comment_desc" style="font-weight:bold;font-size: large;"></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <!-- <div class="modal fade" id="featuresupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            hi
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->


  <script>
    $(document).ready(function() {

      setTimeout(function() {
        showGraph();

        // Set an interval of 3 seconds to load the function again
        setInterval(function() {
          showGraph();
        }, 100000);
      }, 1000);
    });

    function showGraph() {
      var sideId = $("#state").val();
      $.post("<?php echo BASE_URL; ?>includes/line_chart/get_Data.php/?sideId=" + sideId, function(data) {
        // console.log('varun', data);
        var name = [];
        var marks = [];

        for (var i in data) {
          name.push(data[i].symbol);
          marks.push(data[i].over_all_grade_per);
        }

        var chartdata = {
          labels: name,
          datasets: [{
            label: 'Student Marks',
            backgroundColor: '#00c9a74f',
            borderColor: '#00c9a7',
            hoverBackgroundColor: '#CCCCCC',
            hoverBorderColor: 'green',
            data: marks
          }]
        };

        var graphTarget = $("#graphCanvas");
        var barGraph = new Chart(graphTarget, {
          type: 'line',
          data: chartdata
        });
      });
    }
  </script>


  <script>
    $(".get_cap_noti").on("click", function() {
      var getid = $(this).attr("id");
      $.ajax({
        type: 'POST',
        url: 'fetch_cap_data.php',
        data: 'id=' + getid,
        success: function(response) {
          $("#fetch_value_caps").empty();

          $("#fetch_value_caps").append(response);
        }
      });
    });
    $(".testFiles").on("click", function() {
      var testFileId = $(this).attr("id");
      var className = $(this).attr("name");
      $.ajax({
        type: 'POST',
        url: "addStuDoc.php",
        data: {
          testFileId: testFileId,
          className: className,
        },
        dataType: "html",

        success: function(resultData1) {
          $("#testFile").empty();
          $("#testFile").html(resultData1);
        }
      });
    });

    $(".quizFiles").on("click", function() {
      var testFileId = $(this).attr("id");
      var className = $(this).attr("name");
      $.ajax({
        type: 'POST',
        url: "addStuDoc.php",
        data: {
          testFileId: testFileId,
          className: className,
        },
        dataType: "html",

        success: function(resultData1) {
          $("#quizFile").empty();
          $("#quizFile").html(resultData1);
        }
      });
    });
  </script>


  <script>
    $(".fetchSubCheckList").on("click", function() {
      const checkId = $(this).data("id");
      $("#checknamesub").text($(this).data("name"));
      const userId = <?php echo $fetchuser_id ?>;
      const ctpId = <?php echo $std_course1 ?>;
      $("#checkID").val(checkId);
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
        data: {
          checkId1: checkId,
          ctpId: ctpId,
          userId: userId
        },
        success: function(response) {
          $("#subCheckListId1").empty();
          $("#subCheckListId1").html(response);
        }
      });
    });
  </script>

  <script>
    $("#addAllCheckList").on("click", function() {
      const studentId = <?php echo $fetchuser_id ?>;
      const ctpId = <?php echo $std_course1 ?>;
      const totalSubItems = $('.allcheckList:checked').length;
      $('.allcheckList:checked').each(function() {
        const dataItemValue = $(this).data('checklist');
        const subItemValue = $(this).val();
        sendDataToServer(dataItemValue, subItemValue, studentId, ctpId, totalSubItems, ++submittedCount);
      });
    })

    function sendDataToServer(dataItemValue, subItemValue, studentId, ctpId, totalSubItems, submittedCount) {
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
        data: {
          dataItem: dataItemValue,
          subItem: subItemValue,
          studentId: studentId,
          ctpId: ctpId,
        },
        success: function(response) {
          if (submittedCount == totalSubItems) {
            location.reload(); // Reload the page when all subitems are submitted
          }
        }
      });
    }
  </script>

  <script>
    $(document).ready(function() {
      // Handle tab clicks and content display
      $('.nav-link').click(function() {
        // Remove the 'active' class from all tabs
        $('.nav-link').removeClass('active');
        // Add the 'active' class to the clicked tab
        $(this).addClass('active');

        // Get the target tab content ID from the data-bs-target attribute
        var targetTab = $(this).data('bs-target');

        // Show the corresponding tab content
        $(targetTab).tab('show');
      });
    });
  </script>

  <!-- <script type="text/javascript">
      // Check if the 'showModal' parameter is present in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const showModalParam = urlParams.get('showModal');
        // alert(showModalParam);

        // Function to open the modal
        function openModal() {
            $('#featuresupdate').css('display','block');
        }

        // Function to close the modal and remove the query parameter
        function closeModal() {
            $('#featuresupdate').modal('hide');
            // Remove the query parameter and reload the page
            history.replaceState({}, document.title, window.location.pathname);
        }

        // If the 'showModal' parameter is 'true', open the modal when the page loads
        if (showModalParam == 'true') {
          // alert('hello');
            openModal();
        }
    </script> -->

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

</html>