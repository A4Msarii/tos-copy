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
?>
<!DOCTYPE html>
<html>

<head>
  <title>Quiz Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<style type="text/css">
  #button {
    display: inline-block;
    position: relative;
    margin: 1em;
    /*    padding: 0.57em;*/
    border: 2px solid #FFF;
    overflow: hidden;
    text-decoration: none;
    /*    font-size: 2em;*/
    outline: none;
    color: #FFF;
    /*    background: black;*/
    font-family: 'raleway', sans-serif;
  }

  #button span {
    color: #FFF;
    -webkit-transition: 0.6s;
    -moz-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s;
    -webkit-transition-delay: 0.2s;
    -moz-transition-delay: 0.2s;
    -o-transition-delay: 0.2s;
    transition-delay: 0.2s;
  }

  #button:before,
  #button:after {
    content: '';
    position: absolute;
    top: 0.67em;
    left: 0;
    width: 100%;
    text-align: center;
    opacity: 0;
    -webkit-transition: .4s, opacity .6s;
    -moz-transition: .4s, opacity .6s;
    -o-transition: .4s, opacity .6s;
    transition: .4s, opacity .6s;
  }

  /* :before */

  #button:before {
    content: attr(data-hover);
    -webkit-transform: translate(-150%, 0);
    -moz-transform: translate(-150%, 0);
    -ms-transform: translate(-150%, 0);
    -o-transform: translate(-150%, 0);
    transform: translate(-150%, 0);
  }

  /* :after */

  #button:after {
    content: attr(data-active);
    -webkit-transform: translate(150%, 0);
    -moz-transform: translate(150%, 0);
    -ms-transform: translate(150%, 0);
    -o-transform: translate(150%, 0);
    transform: translate(150%, 0);
  }

  /* Span on :hover and :active */

  #button:hover span,
  #button:active span {
    opacity: 0;
    -webkit-transform: scale(0.3);
    -moz-transform: scale(0.3);
    -ms-transform: scale(0.3);
    -o-transform: scale(0.3);
    transform: scale(0.3);
  }

  /*  
    We show :before pseudo-element on :hover 
    and :after pseudo-element on :active 
*/

  #button:hover:before,
  #button:active:after {
    opacity: 1;
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    -webkit-transition-delay: .0s;
    -moz-transition-delay: .0s;
    -o-transition-delay: .0s;
    transition-delay: .0s;
  }

  /* 
  We hide :before pseudo-element on :active
*/

  #button:active:before {
    -webkit-transform: translate(-150%, 0);
    -moz-transform: translate(-150%, 0);
    -ms-transform: translate(-150%, 0);
    -o-transform: translate(-150%, 0);
    transform: translate(-150%, 0);
    -webkit-transition-delay: 0s;
    -moz-transition-delay: 0s;
    -o-transition-delay: 0s;
    transition-delay: 0s;
  }
</style>

<body>

  
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  
  <!--Head Navbar-->
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    $classcolor = "SELECT * FROM gradesheet where user_id='$fetchuser_id'";
    $classcolorst = $connect->prepare($classcolor);
    $classcolorst->execute();

    if ($classcolorst->rowCount() > 0) {
      $class = "";
    } else {
      $class = "";
    }
    ?>
  </div>

  <style>
    /* body {
            width: 100vw;
            height: 100vh;
            display: flex;
            position: relative;
            background: #1e1e24;
            align-items: center;
            justify-content: center;
        } */

    .btn-flip1 {
      padding: 0px !important;
      opacity: 1;
      outline: 0;
      /* color: #fff; */
      line-height: 43px;
      position: relative;
      text-align: center;
      letter-spacing: 1px;
      display: inline-block;
      text-decoration: none;
      text-transform: uppercase;
    }

    .btn-flip1:hover:after {
      opacity: 1;
      transform: translateY(0) rotateX(0);
    }

    .btn-flip1:hover:before {
      opacity: 0;
      transform: translateY(50%) rotateX(90deg);
    }

    .btn-flip1:after {
      top: 10px;
      left: 0;
      opacity: 0;
      width: 100%;
      display: block;
      transition: 0.5s;
      position: absolute;
      content: attr(data-back);
      transform: translateY(-50%) rotateX(90deg);
    }

    .btn-flip1:before {
      top: 0;
      left: 0;
      opacity: 1;
      display: block;
      padding: 0 30px;
      line-height: 40px;
      transition: 0.5s;
      position: relative;
      content: attr(data-front);
      transform: translateY(0) rotateX(0);
    }
  </style>
  <!--Main Content-->

  <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">
          <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Quiz.png">
          Quiz Page
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
              <div id="info-quiz">
                <?php
                if (isset($_REQUEST['error'])) {
                  $error = $_REQUEST['error'];
                  echo $error;
                }
                ?>
              </div>
              <table id="table" class="center">

                <div class="container">
                  <tr>
                    <td>
                      <?php
                      $query1 = "SELECT * FROM quiz where ctp='$std_course1'";
                      $statement1 = $connect->prepare($query1);
                      $statement1->execute();
                      $result1 = $statement1->fetchAll();
                      foreach ($result1 as $row1) {
                        $quiz_id = $row1['id'];
                        $qName = $row1['quiz'];
                        $fetchedmarks = "";

                        $test_mar = $connect->prepare("SELECT marks FROM `quiz_marks` WHERE quiz_id='$quiz_id' and student_id='$fetchuser_id'");
                        $test_mar->execute();
                        $fetchedmarks = $test_mar->fetchColumn();

                        $test_mar1 = $connect->prepare("SELECT status FROM `quiz_marks` WHERE quiz_id='$quiz_id' and student_id='$fetchuser_id'");
                        $test_mar1->execute();
                        $fetchedmarks1 = $test_mar1->fetchColumn();

                        if ($fetchedmarks1 == 0) {
                          $modalName = "testmodal";
                        } else {
                          $modalName = "quizUnlockModal";
                        }

                        // $sql11 = "SELECT marks FROM `test_data` WHERE test_id='$test_id' and student_id='$fetchuser_id'";

                        //            $sql11_prepre = $connect->prepare($sql11);
                        //              $result11 = $connect->query($sql11);
                        //                $datas11 = $result11->fetch(PDO::FETCH_ASSOC);
                        // echo   $fetchedmarks;


                        $class = "btn btn-dark";
                        if ($fetchedmarks != "") {
                          if ($fetchedmarks <= 50 && $fetchedmarks >= 0) {
                            $class = "btn btn-danger";
                          } else if ($fetchedmarks <= 70 && $fetchedmarks >= 51) {
                            $class = "btn btn-warning";
                          } else if ($fetchedmarks <= 80 && $fetchedmarks >= 71) {
                            $class = "btn btn-secondary";
                          } else if ($fetchedmarks <= 90 && $fetchedmarks >= 81) {
                            $class = "btn btn-success";
                          } else if ($fetchedmarks <= 100 && $fetchedmarks >= 91) {
                            $class = "btn btn-primary";
                          }
                        }


                      ?>


                        <div style="display: inline-block;">
                          <a style="margin-bottom: 10px;" class="<?php echo $class ?> btn-flip1" data-back="<?php echo $fetchedmarks; ?>" onclick="document.getElementById('quiz_idInsert').value='<?php echo $quiz_id ?>';document.getElementById('quizUnlockId').value='<?php echo $quiz_id ?>';document.getElementById('quiz_id').value='<?php echo $quiz_id ?>';document.getElementById('quizMarksModal').innerHTML='<?php echo $qName ?>';" data-bs-toggle="modal" data-bs-target="#<?php echo $modalName; ?>" data-front="<?php echo $qName; ?>"></a>
                          <a data-bs-toggle="modal" id="<?php echo $row1['id']; ?>" data-bs-target="#testAttachModal" data-stu="<?php echo $fetchuser_id; ?>" style="position:relative;top:11px;right:26px;color: white;font-size: 20px;margin-left: -6px;" class="testFiles"><i style="float:right; margin-top:-15px;" class="bi bi-paperclip"></i></a>
                        </div>


                      <?php              }
                      ?>
                      <hr>
                    </td>
                  </tr>
                </div>
              </table>
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->

        <div class="row justify-content-center" style="border-radius: 5px solid cadetblue;">

          <div class="col-lg-10 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" id="clone_card" style="border:0.001rem solid #dddddd;">
              <!-- Header -->
              <div class="card-header card-header-content-between" style="background-color:cadetblue;">
                <!--Student name And course name-->
                <h3 class="text-light">Quiz</h3>
                <img href="" data-bs-toggle="modal" data-bs-target="#clone" style="height:30px; width:30px; margin:5px; float:right;" src="<?php echo BASE_URL; ?>assets/svg/icons/Clone icon 3 white png.png">
              </div>
              <!-- End Header -->

              <!-- Body -->
              <?php

              ?>
              <div class="card-body">
                <div class="col">
                  <table>
                    <?php


                    $query5 = "SELECT clone_class.id,clone_class.class_id,clone_class.std_id,clone_class.cloned_id,clone_class.class_name,quiz.quiz FROM clone_class LEFT JOIN quiz ON clone_class.class_id = quiz.id where clone_class.std_id='$fetchuser_id' and clone_class.class_name='quiz'";

                    $statement5 = $connect->prepare($query5);
                    $statement5->execute();
                    $result5 = $statement5->fetchAll();
                    foreach ($result5 as $row3) {
                      $class_ides = $row3['class_id'];
                      $clone_ides = $row3['cloned_id'];
                      $delete_id = $row3['id'];
                      $name = $row3['quiz'];
                      $quizModalName = $name . "-C" . $clone_ides;
                      $fetchedmarks1 = "";
                      $quiz_id1 = $row3['class_id'];
                      $marks_quiz_data = $connect->prepare("SELECT marks FROM `quiz_cloned_data` WHERE quiz_id='$quiz_id1' and student_id='$fetchuser_id' and clone_id='$clone_ides'");
                      $marks_quiz_data->execute();
                      $fetchedmarks1 = $marks_quiz_data->fetchColumn();


                      $class1 = "btn btn-dark";
                      if ($fetchedmarks1 != "") {
                        if ($fetchedmarks1 <= 50 && $fetchedmarks1 >= 0) {
                          $class1 = "btn btn-danger";
                        } else if ($fetchedmarks1 <= 70 && $fetchedmarks1 >= 51) {
                          $class1 = "btn btn-warning";
                        } else if ($fetchedmarks1 <= 80 && $fetchedmarks1 >= 71) {
                          $class1 = "btn btn-secondary";
                        } else if ($fetchedmarks1 <= 90 && $fetchedmarks1 >= 81) {
                          $class1 = "btn btn-success";
                        } else if ($fetchedmarks1 <= 100 && $fetchedmarks1 >= 91) {
                          $class1 = "btn btn-primary";
                        }
                      }
                      $xString = str_repeat("x", $clone_ides);
                    ?>
                      <tr>

                        <div style="display: inline-block;">
                          <a style="margin-left:5px;margin-bottom:15px;" data-back="<?php echo $fetchedmarks1; ?>" onclick="document.getElementById('quiz_id1').value='<?php echo $quiz_id1 ?>';document.getElementById('get_clon_id').value='<?php echo $clone_ides ?>';document.getElementById('cloneQuizMarksModal').innerHTML='<?php echo $quizModalName ?>';" data-bs-toggle="modal" data-bs-target="#quizmodal1" data-front="<?php echo $name . $xString ?>" id="cl_sy1" class="<?php echo $class1 ?> btn-flip1"></a>
                          <!-- <a href="quiz_delete.php?classId=<?php echo $class_ides; ?>&stuId=<?php echo $fetchuser_id; ?>&cloneId=<?php echo $clone_ides; ?>" style="position:relative;top:11px;right:20px;"><i style="float:right; margin-top:-15px;" class="bi bi-x-circle text-danger"></i></a> -->
                        </div>
                        <?php
                        // echo $fetchedmarks1; 
                        ?>

                      <?php   }
                      ?>
                      </tr>
                      <hr>
                      </td>

                </div>


                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End Content -->

  </main>

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

          <center>
            <!-- cloned mark and adding id is remaining -->
            <?php if (isset($_SESSION['permission']) && $permission['add_attachment_test'] == "1") { ?>
              <!-- <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/addStuDoc.php" enctype="multipart/form-data">
                <input type="hidden" id="testId" name="testId">
                <input type="hidden" id="" name="className" value="quiz" />
                <input type="file" name="textFile[]" id="" class="form form-control" multiple />

                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                <input style="margin:10px;" class="btn btn-success" type="submit" name="submitTestFile" value="Save" />
                <input type="hidden" id="test_id" name="test_id" value="">
              </form> -->

              <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOptChecklist">
                <option selected>Select File Method</option>
                <!-- <option value="addNewPage">New Page</option> -->
                <option value="addFile">Attachment</option>
                <option value="addFileLoca">Drive Link</option>
                <option value="addFileLink">Link</option>
              </select>
              <br>
              <center>
                <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/addStuDoc.php">
                  <div class="input-field">
                    <table class="table table-bordered">
                      <input type="hidden" class="testId" name="testId">
                      <input type="hidden" id="" name="className" value="quiz" />
                      <input type="hidden" name="method" value="addFile" />
                      <input type="hidden" name="stuId" value="<?php echo $fetchuser_id; ?>" />
                      <tr>
                        <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                          <input type="file" class="form-control" name="file" id="" />
                        </td>
                    </table>
                  </div><br>
                  <hr>
                  <center>
                    <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="submitTestFile" class="btn btn-success" />

                  </center>
                </form>
              </center>
              <center>
                <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addStuDoc.php" style="width:80%;display:none;" enctype="multipart/form-data">
                  <div class="input-field">
                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                    <table class="table table-bordered" id="table-field">
                      <input type="hidden" class="testId" name="testId">
                      <input type="hidden" name="method" value="addFileLoca" />
                      <input type="hidden" id="" name="className" value="quiz" />
                      <input type="hidden" name="stuId" value="<?php echo $fetchuser_id; ?>" />
                      <tr>
                        <td style="text-align: center;"><input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required /> </td>
                        <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" /> </td>
                      </tr>
                    </table>
                  </div>
                  <br>
                  <hr>
                  <center>
                    <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="submitTestFile">Submit</button>
                  </center>
                </form>
              </center>

              <center>
                <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addStuDoc.php" style="width:80%;display:none;" enctype="multipart/form-data">
                  <div class="input-field">
                    <input type="hidden" class="testId" name="testId">
                    <input type="hidden" id="" name="className" value="quiz" />
                    <input type="hidden" name="method" value="addFileLink" />
                    <input type="hidden" name="stuId" value="<?php echo $fetchuser_id; ?>" />
                    <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                    <table class="table table-bordered" id="table-field-link">
                      <tr>
                        <td style="text-align: center;"><input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required /> </td>
                        <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" /> </td>
                      </tr>
                    </table>
                  </div>
                  <br>
                  <hr>
                  <center>
                    <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="submitTestFile">Submit</button>
                  </center>
                </form>
              </center>
            <?php } ?>
          </center>
        </div>
      </div>
    </div>

    <div class="modal fade" id="first_confrim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this class?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#second_confrim">Yes</button>
          </div>

        </div>
      </div>
    </div>
    <div class="modal fade" id="second_confrim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"></h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h4>Data Will get Deleted?</h4>
            <ul>
              <li>Gradsheet</li>
              <li>Cloned Class</li>
              <li>Accomplish Task</li>
              <li>Additional Task</li>
              <li>Assign Grades</li>
              <li>Asign Instructor</li>
            </ul>
            <form action="delete_cloned_id_admin.php" method="post">
              <input type="hidden" name="cloned_id_admin_del" id="get_clo_del_id"><br>
              <button type="submit" class="btn btn-success">Delete</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    <div class="modal fade" id="ask_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Permission</h3>


            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="ask_clone_delete.php" method="post">
              <input type="hidden" name="cloned_id_value" id="clonedgradesheetid">
              <input type="hidden" name="userid" value="<?php echo $user_id ?>">
              <button class="btn btn-success">Ask Admin To Delete?</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    <div class="modal fade" id="Add_more_clasess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add More Class</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><br>
          </div>
          <div class="modal-body">
            <table id="get_more_class" class="table table-striped table-bordered">
              <thead>
                <th>#</th>
                <th>id</th>
                <th>class</th>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Select</button>
          </div>

        </div>
      </div>
    </div>


  </div>
  </div>

  <!--MOdal for clone gradesheet-->

  <?php if (isset($_SESSION['permission']) && $permission['give_marks_test'] == "1") { ?>

    <div id="testmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="quizMarksModal"></h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <center>
              <!-- cloned mark and adding id is remaining -->
              <form method="post" action="quizmark.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
                <input type="hidden" value="<?php echo $phpcourse ?>" name="crs_id">
                <label style="color:black; font-weight:bold;">Enter Marks For Quiz:</label>
                <input type="text" name="Marks" placeholder="Enter Marks" class="form-control">
                <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                  <input style="margin:10px;" class="btn btn-success" type="submit" name="submit" value="Submit">
                </div>
                <input type="hidden" id="quiz_idInsert" name="quiz_id" value="">
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
    <div id="quizUnlockModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <?php if (isset($_SESSION['permission']) && $permission['askunlock_test'] == "1") {  ?>
              <h3 class="modal-title text-success" id="">Ask To Unlock</h3>
            <?php } ?>
            <?php if (isset($_SESSION['permission']) && $permission['unlock_test'] == "1") { ?>
              <h3 class="modal-title text-success" id="">Unlock</h3>
            <?php } ?>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <center>
              <!-- cloned mark and adding id is remaining -->
              <?php if (isset($_SESSION['permission']) && $permission['askunlock_test'] == "1") {  ?>
                <form method="post" action="" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
                  <input type="hidden" value="<?php echo $phpcourse ?>" name="crs_id">


                  <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                  <input style="margin:10px;" class="btn btn-danger" type="submit" name="submit" value="Ask To Unlock">
          </div>
          <input type="hidden" id="test_id" name="test_id" value="">
          </form>
        <?php } ?>
        <?php if (isset($_SESSION['permission']) && $permission['unlock_test'] == "1") { ?>
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/unlockTest.php" enctype="multipart/form-data">
            <input type="hidden" name="quizUnlockId" id="quizUnlockId" />
            <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
            <input type="hidden" value="<?php echo $phpcourse ?>" name="crs_id">

            <input class="form-control" type="text" name="username" placeholder="Username" autofocus="true"><br>
            <input class="form-control" type="password" name="password" placeholder="Password">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            <input style="margin:10px;" class="btn btn-danger" type="submit" name="unlockQuiz" value="Submit">
        </div>
        <input type="hidden" id="quiz_id" name="quiz_id" value="">
        </form>
      <?php } ?>
      </center>
      </div>
    </div>

  <?php } ?>

  <!-- Modal -->
  <div class="modal fade" id="clone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Clone Quiz</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="clone_gradsheet_quiz.php" method="post">
            <input type="hidden" name="student_id" value="<?php echo $fetchuser_id ?>">
            <input type="hidden" name="class" value="quiz">
            <table style="margin: 5px; padding:5px;" class="table table-striped table-bordered" id="quizclonetable">
              <input class="form-control" type="text" id="quizclonesearch" onkeyup="quizclone()" placeholder="Search for Actual Class.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-light"><input type="checkbox" id="select-all-quiz"></th>
                <th class="text-light">Sr No</th>
                <th class="text-light">Symbol</th>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM quiz where ctp='$std_course1'";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result1 = $statement->fetchAll();
                $sn1 = 1;
                foreach ($result1 as $row) {
                  $class_ides = $row['id'];

                ?>
                  <tr>
                    <td><input type="checkbox" name="clone_class[]" value="<?php echo $row['id'] ?>"></td>
                    <td><?php echo $sn1++; ?></td>
                    <td><?php echo $row['quiz'] ?></td>
                  </tr>
                <?php
                }
                ?>
</body>
</table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Select</button>
</div>
</form>
</div>
</div>
</div>
<?php if (isset($_SESSION['permission']) && $permission['give_marks_test'] == "1") { ?>
  <div id="quizmodal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="cloneQuizMarksModal"></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form method="post" action="quizmark_cloned.php" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
              <input type="hidden" value="<?php echo $phpcourse ?>" name="crs_id">
              <input type="hidden" name="get_clon_id" id="get_clon_id">
              <input type="text" name="Marks" placeholder="Enter Marks" class="form-control">
              <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                <input style="margin:10px;" class="btn btn-success" type="submit" name="submit" value="Submit">
              </div>
              <input type="hidden" id="quiz_id1" name="test_id1" value="">
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>
<?php } ?>


<script>
  $('#myTable').margetable({
    type: 1,
    colindex: [{
      index: 1,
      dependent: [0]
    }]
  });
</script>
<script>
  $(document).on("click", "#cloned_button", function() {
    var got_id = $("#cloned_ides").val();
    var get_std_id = $("#get_std_id").val();

    if (got_id) {
      $.ajax({
        type: 'POST',
        url: 'fetch_cloned_class.php',
        data: 'id=' + got_id + '&std_id=' + get_std_id,

        success: function(response) {
          $('#get_cloned_class_value').empty();
          $("#get_cloned_class_value").append(response);

        }
      });
    }
  });

  $(document).on("click", "#add_more_class", function() {
    var got_id1 = $("#cloned_ides").val();
    var get_std_id = $("#get_std_id").val();
    var ctp_ides = $("#ctp_ides").val();

    if (got_id1) {
      $.ajax({
        type: 'POST',
        url: 'fetch_add_cloned_class.php',
        data: 'id=' + got_id1 + '&std_id=' + get_std_id + '&ctp_ides=' + ctp_ides,

        success: function(response) {
          //alert(response);
          $('#get_more_class tbody').empty();
          $("#get_more_class tbody").append(response);

        }
      });
    }
  });
</script>

<script>
  function quizclone() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("quizclonesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("quizclonetable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

<script>
  document.getElementById('select-all-quiz').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  }
</script>

<script>
  setTimeout(function() {
    document.getElementById('info-quiz').style.display = 'none';
    /* or
    var item = document.getElementById('info-message')
    item.parentNode.removeChild(item); 
    */
  }, 4000);
</script>


<script>
  $(".testFiles").on("click", function() {
    var testFileId = $(this).attr("id");
    var stuId = $(this).data("stu");
    $(".testId").val(testFileId);
    $.ajax({
      type: 'POST',
      url: "addStuDoc.php",
      data: {
        testFileId: testFileId,
        className: 'quiz',
        stuId: stuId,
      },
      dataType: "html",

      success: function(resultData1) {
        $("#testFile").empty();
        $("#testFile").html(resultData1);
      }
    });
  });
</script>

<!--Footer-->
<footer id="contenthome" role="footer" class="footer">
  <?php include ROOT_PATH . 'includes/footer2.php'; ?>
</footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>