<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>
<title>Testing Log</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
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
  

  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');

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
      top: 2px;
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

    .tooltip1 {
      position: absolute;
      background-color: #333;
      color: #fff;
      padding: 5px;
      border-radius: 4px;
      font-size: 12px;
      z-index: 999999;
      top: -34px;
      display: none;
    }

    /*.tooltip-text {
      visibility: hidden;
      position: absolute;
      top: -46px;
      left: 10px;
      z-index: 2;
      width: auto;
      color: white;
      font-size: 12px;
      background-color: #192733;
      border-radius: 10px;
      padding: 10px 15px 10px 15px;
    }

    .tooltip-text::before {
      content: "";
      position: absolute;
      transform: rotate(45deg);
      background-color: #192733;
      padding: 5px;
      z-index: 1;
      top: 32px;
      left: 35px;
    }

    .btn-flip1:hover .tooltip-text {
      visibility: visible;
    }*/

    .tooltip-text1 {
      visibility: hidden;
      position: absolute;
      z-index: 2;
      /*  width: 100px;*/
      color: white;
      font-size: 12px;
      background-color: #F5FFFA;
      border-radius: 10px;
      padding: 10px 15px 10px 15px;
      /*border-top: 1px solid black;
  border-left: 1px solid black;
  border-right: 1px solid black;*/
      border: 1px solid lightgray;
    }

    .tooltip-text1::before {
      content: "";
      position: absolute;
      transform: rotate(45deg);
      background-color: white;
      padding: 5px;
      z-index: 1;
    }

    .hover-text:hover .tooltip-text1 {
      visibility: visible;
    }

    #top {
      top: -60px;
      left: -2%;
      width: max-content;
    }

    #top::before {
      top: 95%;
      /* left: 7%; */
    }

    #bottom {
      top: 25px;
      left: -50%;
    }

    #bottom::before {
      top: 15%;
      left: 45%;
    }

    #left {
      top: -8px;
      right: 120%;
    }

    #left::before {
      top: 35%;
      left: 94%;
    }

    #right {
      top: -8px;
      left: 120%;
    }

    #right::before {
      top: 35%;
      left: -2%;
    }

    .hover-text {
      position: relative;
      display: inline-block;
      /*  margin: 40px;*/
      font-family: Arial;
      text-align: center;
    }
  </style>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:25px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Test_class.png">
            Testing Log
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
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
              <!--Student name And course name-->
              <div>
                <?php include 'courcecode.php'; ?>
              </div>
              <button class="btn btn-secondary" style="padding: 0px;
    margin: 0px;border-radius: 20px;"><img href="" data-bs-toggle="modal" data-bs-target="#clone" title="Cloned Gradesheet" style="height:30px; width:30px; margin:5px;" src="<?php echo BASE_URL; ?>assets/svg/icons/clone12.png"></button>
            </div>

            <div class="card-body">

              <!-- Tab Content -->
              <div class="col">
                <table id="table" class="center">
                  <?php
                  $query = "SELECT * FROM test_phase where ctp_id='$std_course1'";
                  $statement = $connect->prepare($query);
                  $statement->execute();
                  $result = $statement->fetchAll();
                  foreach ($result as $row) {
                  ?>
                    <div class="container">

                      <?php
                      $phase = $row['phase'];
                      $sel_ctp_nam = $connect->prepare("SELECT phasename FROM phase WHERE id=?");
                      $sel_ctp_nam->execute([$phase]);
                      $sel_ctp_nam_data2 = $sel_ctp_nam->fetchColumn();
                      echo $phase_name = '<div style="margin-top:-5px; margin-bottom:-15px;"><h4 style="color:blue" id="phase1">' . $sel_ctp_nam_data2 . '</h4></div><hr>';
                      ?>
                      <?php
                      $query1 = "SELECT * FROM test where phase='$phase'";
                      $statement1 = $connect->prepare($query1);
                      $statement1->execute();
                      $result1 = $statement1->fetchAll();
                      foreach ($result1 as $row1) {
                        $test_id = $row1['id'];
                        $className = $row1['test'];
                        // $className = str_replace(' ', '', $className1);
                        $testName = $row1['shorttest'] . "-" . $row1['test'];
                        $fetchedmarks = "";

                        $test_mar = $connect->prepare("SELECT marks FROM `test_data` WHERE test_id='$test_id' and student_id='$fetchuser_id'");
                        $test_mar->execute([]);
                        $test_mar1 = $test_mar->fetchColumn();

                        $test_mark1 = $connect->prepare("SELECT status FROM `test_data` WHERE test_id='$test_id' and student_id='$fetchuser_id'");
                        $test_mark1->execute([]);
                        $test_mar11 = $test_mark1->fetchColumn();

                        if ($test_mar11 == 0) {
                          $modalName = "testmodal";
                        } else {
                          $modalName = "testUnlockModal";
                        }

                        // $sql11 = "SELECT marks FROM `test_data` WHERE test_id='$test_id' and student_id='$fetchuser_id'";

                        //            $sql11_prepre = $connect->prepare($sql11);
                        //              $result11 = $connect->query($sql11);
                        //                $datas11 = $result11->fetch(PDO::FETCH_ASSOC);
                        // echo   $test_mar1;


                        $class = "btn btn-dark";
                        if ($test_mar1 != "") {
                          if ($test_mar1 <= 50 && $test_mar1 >= 0) {
                            $class = "btn btn-danger";
                          } else if ($test_mar1 <= 70 && $test_mar1 >= 51) {
                            $class = "btn btn-warning";
                          } else if ($test_mar1 <= 80 && $test_mar1 >= 71) {
                            $class = "btn btn-secondary";
                          } else if ($test_mar1 <= 90 && $test_mar1 >= 81) {
                            $class = "btn btn-success";
                          } else if ($test_mar1 <= 100 && $test_mar1 >= 91) {
                            $class = "btn btn-primary";
                          }
                        }


                      ?>

                        <!-- <a onclick="document.getElementById('test_id').value='<?php echo $test_id ?>';" data-hover="<?php echo $test_mar1; ?>" data-bs-toggle="modal" data-bs-target="#testmodal" id="cl_sy" class="<?php echo $class ?>" ><?php echo $row1['shorttest'] ?></a> -->
                        <div style="display: inline-block;" class="hover-text">
                          <a style="margin-bottom:10px;" class="<?php echo $class; ?> btn-flip1" data-back="<?php echo $test_mar1; ?>" data-front="<?php echo $row1['shorttest']; ?>" onclick="document.getElementById('testUnlockId').value='<?php echo $row1['id']; ?>';document.getElementById('test_id').value='<?php echo $test_id ?>';document.getElementById('testId').value='<?php echo $row1['id']; ?>';document.getElementById('testingMarksModal').innerHTML='<?php echo $testName ?>';" data-bs-toggle="modal" data-bs-target="#<?php echo $modalName; ?>" id="cl_sy">
                            <!-- <span class="tooltip-text" class="top1" style="white-space: nowrap;"><?php echo $className; ?></span> -->
                          </a>

                          <span class="tooltip-text1" id="top" style="text-align:left;border-left: 5px solid red;">
                            <span class="m-1 p-2 mt-2" style="margin-bottom:3px;color: white;"><label style="font-weight: bold;color: darkgoldenrod;font-size: large;">Class:</label><span style="font-size:large; font-family:cursive;color:black;"><?php echo $className; ?></span></span>
                          </span>
                          <a data-bs-toggle="modal" id="<?php echo $row1['id']; ?>" data-stu="<?php echo $fetchuser_id; ?>" data-bs-target="#testAttachModal" style="position:relative;top:11px;right:26px;color: white;font-size: 20px;margin-left: -6px;" class="testFiles"><i style="float:right; margin-top:-15px;" class="bi bi-paperclip"></i></a>
                        </div>

                        <?php
                        $cloneId = $connect->query("SELECT * FROM clone_class WHERE class_id = '$test_id' AND std_id = '$fetchuser_id' AND class_name = 'test'");
                        if ($cloneId->rowCount() > 0) {
                          while ($cloData = $cloneId->fetch()) {
                            $cloneID = $cloData['cloned_id'];
                            $cloneClassId = $cloData['id'];

                            $xString = str_repeat("X", $cloneID);
                            $testCloneModalName = $row1['shorttest'] . $xString;

                            $test_marClone = $connect->query("SELECT marks FROM `test_cloned_data` WHERE test_id = '$test_id' AND student_id='$fetchuser_id' AND clone_id = '$cloneID'");
                            // print_r($test_marClone);
                            // $test_marClone->execute([]);
                            $test_marClone1 = $test_marClone->fetchColumn();

                            $class = "btn btn-dark";
                            if ($test_marClone1 != "") {
                              if ($test_marClone1 <= 50 && $test_marClone1 >= 0) {
                                $class = "btn btn-danger";
                              } else if ($test_marClone1 <= 70 && $test_marClone1 >= 51) {
                                $class = "btn btn-warning";
                              } else if ($test_marClone1 <= 80 && $test_marClone1 >= 71) {
                                $class = "btn btn-secondary";
                              } else if ($test_marClone1 <= 90 && $test_marClone1 >= 81) {
                                $class = "btn btn-success";
                              } else if ($test_marClone1 <= 100 && $test_marClone1 >= 91) {
                                $class = "btn btn-primary";
                              }
                            }
                        ?>
                            <div style="display: inline-block;" class="hover-text">
                              <a style="margin-bottom:10px;" class="<?php echo $class; ?> btn-flip1" data-back="<?php echo $test_marClone1; ?>" data-front="<?php echo $row1['shorttest'] . $xString; ?>" onclick="document.getElementById('test_id1').value='<?php echo $test_id ?>';document.getElementById('get_clon_id').value='<?php echo $cloneID ?>';document.getElementById('cloneTestMarksModal').innerHTML='<?php echo $testCloneModalName; ?>';" data-bs-toggle="modal" data-bs-target="#testmodal1" id="cl_sy">
                                <!-- <span class="tooltip-text" class="top1" style="white-space: nowrap;"><?php echo $className; ?></span> -->
                              </a>

                              <span class="tooltip-text1" id="top" style="text-align:left;border-left: 5px solid red;">
                                <span class="m-1 p-2 mt-2" style="margin-bottom:3px;color: white;"><label style="font-weight: bold;color: darkgoldenrod;font-size: large;">Class:</label><span style="font-size:large; font-family:cursive;color:black;"><?php echo $className; ?></span></span>
                              </span>
                              <!-- <a data-bs-toggle="modal" id="<?php echo $row1['id']; ?>" data-bs-target="#testAttachModal" style="position:relative;top:11px;right:26px;color: white;font-size: 20px;margin-left: -6px;" class="testFiles"><i style="float:right; margin-top:-15px;" class="bi bi-paperclip"></i></a> -->
                            </div>
                      <?php
                          }
                        }
                      }
                      ?>
                    </div>

                  <?php } ?>
                </table>

              </div>
              <!-- End Header -->
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->



      </div>
      <!-- End Row -->


      <div class="row justify-content-center" style="display:none;">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="clone_card" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="background-color:cadetblue;">
              <!--Student name And course name-->
              <h3 class="text-white">Cloned Test</h3>
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
                  $query4 = "SELECT * FROM test_phase where ctp_id='$std_course1'";
                  $statement4 = $connect->prepare($query4);
                  $statement4->execute();
                  $result4 = $statement4->fetchAll();
                  foreach ($result4 as $row4) {
                    $phase = $row4['phase'];
                    $sel_ctp_nam1 = $connect->prepare("SELECT phasename FROM phase WHERE id=?");
                    $sel_ctp_nam1->execute([$phase]);
                    $sel_ctp_nam1_data2 = $sel_ctp_nam1->fetchColumn();

                    $selcetPhaseId = $connect->query("SELECT * FROM test WHERE phase = '$phase'");
                    $ct = 0;
                    while ($selcetPhaseData = $selcetPhaseId->fetch()) {
                      $cId = $selcetPhaseData['id'];
                      $className = $selcetPhaseData['test'];
                      $actualCount = $connect->query("SELECT count(*) FROM clone_class WHERE class_name = 'test' AND std_id = '$fetchuser_id' AND class_id = '$cId'");
                      $actualdata = $actualCount->fetchColumn();
                      if ($actualdata > 0) {
                        $ct = 1;
                        break;
                      }
                    }
                    if ($ct == 1) {
                      echo '<div><h4 style="color:blue" id="phase">' . $sel_ctp_nam1_data2 . '</h4></div>';
                      $phase_ides = $row4['phase'];
                      $query5 = "SELECT clone_class.id,clone_class.class_id,clone_class.std_id,clone_class.cloned_id,clone_class.class_name FROM clone_class LEFT JOIN test ON clone_class.class_id = test.id where clone_class.std_id='$fetchuser_id' and test.phase='$phase_ides' and clone_class.class_name='test'";
                      $statement5 = $connect->prepare($query5);
                      $statement5->execute();
                      $result5 = $statement5->fetchAll();
                      foreach ($result5 as $row3) {
                        echo $class_ides = $row3['class_id'];
                        $clone_ides = $row3['cloned_id'];
                        $delete_id = $row3['id'];
                        $stuId = $row3['std_id'];
                        $sql2 = "SELECT * FROM test WHERE id='$class_ides'";
                        $sql2_prepare = $connect->prepare($sql2);
                        $result2 = $connect->query($sql2);
                        $datas1 = $result2->fetch(PDO::FETCH_ASSOC);
                        $name = $datas1['shorttest'];
                        $testCloneModalName = $name . '-C' . $clone_ides;

                        $test_id1 = $row3['class_id'];
                        $fetchedmarks1 = "";
                        $sql111 = "SELECT marks FROM test_cloned_data WHERE test_id='$test_id1' and student_id='$fetchuser_id' and clone_id='$clone_ides'";
                        $sql111_prepre = $connect->prepare($sql111);
                        $result5 = $connect->query($sql111);
                        $datas111 = $result5->fetchColumn();
                        $fetchedmarks1 = $datas111;


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
                            <a style="margin-right:5px;margin-bottom:5px;" data-back="<?php echo $fetchedmarks1; ?>" onclick="document.getElementById('test_id1').value='<?php echo $test_id1 ?>';document.getElementById('get_clon_id').value='<?php echo $clone_ides ?>';document.getElementById('cloneTestMarksModal').innerHTML='<?php echo $testCloneModalName; ?>';" data-bs-toggle="modal" data-bs-target="#testmodal1" title="<?php echo $fetchedmarks1; ?>" id="cl_sy1" class="<?php echo $class1 ?> btn-flip1" data-front="<?php echo $name . $xString; ?>"><span class="tooltip-text" class="top1" style="white-space: nowrap;"><?php echo $className; ?></span></a>
                            <!-- <a href="quiz_delete.php?cloneTestId=<?php echo $delete_id; ?>&stuId=<?php echo $stuId; ?>&classId=<?php echo $class_ides; ?>&cloneId=<?php echo $clone_ides; ?>" style="position:relative;top:11px;right:26px;"><i style="float:right; margin-top:-15px;" class="bi bi-x-circle text-danger"></i></a> -->
                          </div>
                          <?php
                          // echo $fetchedmarks1; 
                          ?>

                      <?php

                      }
                    }
                      ?>
                        </tr>
                        <hr>
                        </td>

              </div>

            <?php } ?>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Content -->

  </main>

  <div class="modal fade" id="clone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Clone Test</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="clone_gradsheet_test.php" method="post">
            <input type="hidden" name="student_id" value="<?php echo $fetchuser_id ?>">
            <input type="hidden" name="class" value="test">
            <table style="margin: 5px; padding:5px;" class="table table-striped table-bordered" id="testclonetable">
              <input class="form-control" type="text" id="testclonesearch" onkeyup="testclone()" placeholder="Search for Test Class.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-white"><input type="checkbox" id="select-all-test"></th>
                <th class="text-white">Sr No</th>
                <th class="text-white">Symbol</th>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM Test where ctp='$std_course1'";
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
                    <td><?php echo $row['shorttest'] ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
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
    <div id="testmodal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="cloneTestMarksModal"></h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <center>
              <form method="post" action="testmark_cloned.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
                <input type="hidden" value="<?php echo $phpcourse ?>" name="crs_id">
                <input type="hidden" name="get_clon_id" id="get_clon_id">
                <input type="text" name="Marks" placeholder="Enter Marks" class="form-control">
                <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                  <input style="margin:10px;" class="btn btn-success" type="submit" name="submit" value="Submit">
                </div>
                <input type="hidden" id="test_id1" name="test_id1" value="">
              </form>
            </center>
          </div>
        </div>
      </div>
    </div> <?php }

            ?>

  <?php if (isset($_SESSION['permission']) && $permission['give_marks_test'] == "1") {  ?>
    <!-- Modal for marks-->
    <div id="testmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="testingMarksModal"></h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <center>
              <!-- cloned mark and adding id is remaining -->
              <form method="post" action="testmark.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
                <input type="hidden" value="<?php echo $phpcourse ?>" name="crs_id">

                <input type="text" name="Marks" placeholder="Enter Marks" class="form-control">
                <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                  <input style="margin:10px;" class="btn btn-success" type="submit" name="submit" value="Submit">
                </div>
                <input type="hidden" id="test_id" name="test_id" value="">
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>

    <div id="testUnlockModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
              <?php if (isset($_SESSION['permission']) && $permission['askunlock_test'] == "1") { ?>
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
            <input type="hidden" name="testUnlockId" id="testUnlockId" />
            <input type="hidden" value="<?php echo $fetchuser_id ?>" name="std_id">
            <input type="hidden" value="<?php echo $phpcourse ?>" name="crs_id">

            <input class="form-control" type="text" name="username" placeholder="Username" autofocus="true"><br>
            <input class="form-control" type="password" name="password" placeholder="Password">
            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
            <input style="margin:10px;" class="btn btn-danger" type="submit" name="submitUnlock" value="Unlock">
        </div>
        <input type="hidden" id="test_id" name="test_id" value="">
        </form>
      <?php } ?>
      </center>
      </div>
    </div>
    </div>
    </div>
  <?php }

  ?>

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
                <input type="hidden" class="testId" name="testId">
                <input type="hidden" id="" name="className" value="test" />
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
                      <input type="hidden" id="" name="className" value="test" />
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
                      <input type="hidden" id="" name="className" value="test" />
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
                    <input type="hidden" id="" name="className" value="test" />
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

    <!-- End Modal -->

    <!--Footer-->


    <script type="text/javascript">
      $(document).ready(function() {
        var html = '<tr>\
                  <td style="text-align: center;"><input type="text" name="quiz[]" class="form-control" placeholder="Subject"></td>\
                  <td><input class="form-control" type="number" name="percentage[]" placeholder="Percentage"></td>\
                  <td><button type="button" name="remove_quiz" id="remove_quiz" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
        var max = 5;
        var a = 1;

        $("#add_quiz").click(function() {
          if (a <= max) {
            $("#table-field-quiz").append(html);
            a++;
          }
        });
        $("#table-field-quiz").on('click', '#remove_quiz', function() {
          $(this).closest('tr').remove();
          a--;
        });
      });
    </script>

    <script>
      function testclone() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("testclonesearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("testclonetable");
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
      document.getElementById('select-all-test').onclick = function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
          checkbox.checked = this.checked;
        }
      }
    </script>


    <script>
      $('.tooltip-element').hover(function() {
        var tooltipText = $(this).attr('data-tooltip');
        var tooltip = $('<div class="tooltip1">' + tooltipText + '</div>');
        $(this).append(tooltip);
        tooltip.fadeIn('fast');
      }, function() {
        $('.tooltip1').fadeOut('fast', function() {
          $(this).remove();
        });
      });
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
            className: 'test',
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