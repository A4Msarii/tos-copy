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
  <title>Actual Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php include 'gs_thumbnail.php'; ?>

  <style type="text/css">
    .circleig1 {
      height: 20px;
      width: 100%;
      background: #e2e4e6;
      position: absolute;
      left: 0px;
      bottom: -20px;
      color: darkgoldenrod;
      font-weight: bold;
      font-family: cursive;
    }


    #button {
      display: inline-block;
      position: relative;
      margin: 1em;
      border: 2px solid #FFF;
      overflow: hidden;
      text-decoration: none;
      outline: none;
      color: #FFF;
      font-family: 'raleway', sans-serif;
      height: auto;
      transition: all 0.6s ease;
      border-radius: 10px;
      top: 10px;

    }

  </style>
</head>

<body>



  <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

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
    .btn-flip1 {
      padding: 0px !important;
      opacity: 1;
      outline: 0;
      /* color: #fff; */
      /*      line-height: 43px;*/
      position: relative;
      text-align: center;
      /*      letter-spacing: 1px;*/
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

    .tooltip-text {
      visibility: hidden;
      position: absolute;
      top: -46px;
      left: 10px;
      z-index: 2;
      width: auto;
      color: white;
      font-size: 12px;
      background-color: white;
      border-radius: 10px;
      padding: 10px 15px 10px 15px;
      text-align: left;
      bottom: 0px;
    }

    /*.tooltip-text::before {
      content: "";
      position: absolute;
      transform: rotate(45deg);
      background-color: #192733;
      padding: 5px;
      z-index: 1;
      top: 32px;
      left: 35px;
    }*/

    .btn-flip1:hover .tooltip-text {
      visibility: visible;
    }

    .top1 {
      top: -40px;
      left: -50%;
    }

    /*.top1::before {
      top: 80%;
      left: 45%;
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
  top: -100px;
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


  <main id="content" role="main" class="main">

    <div class="content container-fluid" style="height: 30rem;">
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>

      <div class="page-header" style="padding: 0px;">
        <!-- <div class="row" style="margin-bottom: -50px;">
        <div class="col-md-6 mt-3"> -->
        <h1 class="text-success">
          <img style="height:35px; width:45px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Actual_class.png">
          Actual <?php if(isset($_SESSION['division_NAME'])){ echo $_SESSION['division_NAME']; } ?>
        </h1>
        <!-- </div>


    </div> -->

      </div>

    </div>

    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">

            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
              <div>
                <?php include 'courcecode.php'; ?>
              </div>
              
                      
              <button class="btn btn-secondary" style="padding: 0px;
    margin: 0px;border-radius: 20px;"><img href="" data-bs-toggle="modal" data-bs-target="#clone" title="Cloned Gradesheet" style="height:30px; width:30px; margin:5px;" src="<?php echo BASE_URL; ?>assets/svg/icons/clone12.png"></button>
    <!-- <form action="genrate_Excel.php">
      <input type="text" name="us_id" value="<?php echo $fetchuser_id;?>">
      <button type="submit" class="btn btn-success">excel</button>
    </form> -->
              </div>




            <div class="card-body">

              <div class="col">
                <input type="hidden" id="get_std_id" value="<?php echo $fetchuser_id ?>">
                <input type="hidden" id="ctp_ides" value="<?php echo $std_course1 ?>">

                <table>
                  <?php
                  $query = "SELECT * FROM actual_phase where ctp_id='$std_course1'";
                  $statement = $connect->prepare($query);
                  $statement->execute();
                  $result = $statement->fetchAll();
                  foreach ($result as $row) { ?>

                    <div class="container">
                      <tr>
                        <?php
                        $phase = $row['phase'];
                        $sel_ctp_nam = $connect->prepare("SELECT phasename FROM phase WHERE id=?");
                        $sel_ctp_nam->execute([$phase]);
                        $sel_ctp_nam_data2 = $sel_ctp_nam->fetchColumn();
                        echo $phase_name = '<div style="margin-top:-15px;"><h4 style="color:blue; margin-top:-10px;" id="phase">' . $sel_ctp_nam_data2 . '</h4></div><hr>';
                        ?></tr>
                      <tr>
                        <?php
                        $query1 = "SELECT * FROM actual where phase='$phase'";
                        $statement1 = $connect->prepare($query1);
                        $statement1->execute();
                        $result1 = $statement1->fetchAll();
                        foreach ($result1 as $row1) {
                          $ides = $row1['id'];
                          $table = "actual";
                          $className = $row1['actual'];
                          // $className = str_replace(' ', '', $className1);

                          $over_all_grade = $connect->prepare("SELECT over_all_grade FROM `gradesheet` WHERE class=? and class_id=? and user_id=?");
                          $over_all_grade->execute([$table, $ides, $fetchuser_id]);
                          $grade = $over_all_grade->fetchColumn();
                          $get_ins_name = "";
                          $instructores = $connect->prepare("SELECT to_userid FROM `notifications` WHERE type=? and data=? and user_id=? and extra_data='is selected to fill gradsheet of'");
                          $instructores->execute([$table, $ides, $fetchuser_id]);
                          $instructor = $instructores->fetchColumn();

                          $codeId = $connect->prepare("SELECT gradsheet_status FROM `gradesheet` WHERE class=? and class_id=? and user_id=?");
                          $codeId->execute([$table, $ides, $fetchuser_id]);
                          $codeIdData = $codeId->fetchColumn();

                          $checkCode = 0;

                          $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                          $codeName->execute([$codeIdData]);
                          $codeNameData = $codeName->fetchColumn();

                          $over_all_grade_per1 = $connect->prepare("SELECT over_all_grade_per FROM `gradesheet` WHERE class=? AND class_id=? AND user_id=?");
                          $over_all_grade_per1->execute([$table, $ides, $fetchuser_id]);
                          $over_all_grade_per = $over_all_grade_per1->fetchColumn();

                          $over_all_grade_per1 = $connect->query("SELECT over_all_comment FROM `gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id'");
                          // $over_all_grade_per1->execute([$table, $ides, $fetchuser_id]);
                          $comment = $over_all_grade_per1->fetchColumn();

                          $added_ins_name = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                          $added_ins_name->execute([$instructor]);
                          $get_ins_name = $added_ins_name->fetchColumn();

                          if ($grade == "U") {
                            $class = "btn btn-danger";
                          } elseif ($grade == "F") {
                            $class = "btn btn-warning";
                          } elseif ($grade == "G") {
                            $class = "btn btn-secondary";
                          } elseif ($grade == "V") {
                            $class = "btn btn-success";
                          } elseif ($grade == "E") {
                            $class = "btn btn-primary";
                          } elseif ($grade == "N") {
                            $class = "btn btn-soft-dark";
                          } else {
                            $class = "btn btn-dark";
                          }


                        ?>


                                      
                          <!-- <div class="outer-div" style="display:contents;">
                            <a style="position:relative;margin-right:10px; margin-bottom:25px;" class="<?php echo $class; ?> btn-flip1" data-back="<?php echo $over_all_grade_per; ?>/<?php echo $get_ins_name; ?>" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($row1['id'])); ?>&class_name=<?php echo urlencode(base64_encode($table)); ?>" data-front="<?php echo $row1['symbol']; ?>">
                            <span class="circleig1"><?php echo $codeNameData; ?></span>
                            
                                      
                               </a>
                               <div class="hidden-div-mm">
                                      
                                        <span style="white-space: nowrap;height:37px;">
                            <span class="bg-success text-dark m-1 p-2"><label class="text-dark">Class:</label><?php echo $className; ?></span>
                            <span class="bg-primary text-dark m-1 p-2"><label class="text-dark">Summery:</label><?php echo $comment; ?></span>
                            </span>
                          </div>
                        </div> -->

                        <div class="hover-text"><a style="position:relative;margin-right:10px; margin-bottom:25px;" class="<?php echo $class; ?> btn-flip1" data-back="<?php echo $over_all_grade_per; ?>/<?php echo $get_ins_name; ?>" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($row1['id'])); ?>&class_name=<?php echo urlencode(base64_encode($table)); ?>" data-front="<?php echo $row1['symbol']; ?>">
                            <span class="circleig1"><?php echo $codeNameData; ?></span>
                            
                                      
                               </a>
                          <span class="tooltip-text1" id="top" style="text-align:left;border-left: 5px solid red;">
                            <span class="m-1 p-2 mt-2" style="margin-bottom:3px;color: white;"><label style="font-weight: bold;color: darkgoldenrod;font-size: large;">Class:</label><span style="font-size:large; font-family:cursive;color:black;"><?php echo $className; ?></span></span><br>
                            <span class="m-1 p-2" style="color:white;"><label style="font-weight: bold;color: darkgoldenrod; font-size: large;">Summary:</label><span style="font-size:large; font-family:cursive;color:black;"><?php echo $comment; ?></span></span>
                          </span>
                        </div>

                          <!-- <a style="position:relative;margin-right:10px; margin-bottom:25px;" class="<?php echo $class; ?> btn-flip1" data-back="<?php echo $over_all_grade_per; ?>/<?php echo $get_ins_name; ?>" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($row1['id'])); ?>&class_name=<?php echo urlencode(base64_encode($table)); ?>" data-front="<?php echo $row1['symbol']; ?>">
                            <span class="circleig1"><?php echo $codeNameData; ?></span>
                            <span class="tooltip-text" style="white-space: nowrap;height:37px;">
                            <span class="bg-success text-dark m-1 p-2"><label class="text-dark">Class:</label><?php echo $className; ?></span>
                            <span class="bg-primary text-dark m-1 p-2"><label class="text-dark">Summery:</label><?php echo $comment; ?></span>
                            </span>
                          </a> -->

                          <!-- <div class="hidden-div">
                            hi
                          </div> -->

                        <?php
                          $cloneId = $connect->query("SELECT * FROM clone_class WHERE class_id = '$ides' AND std_id = '$fetchuser_id' AND class_name = 'actual'");
                          if ($cloneId->rowCount() > 0) {
                            while ($cloData = $cloneId->fetch()) {
                              $cloneID = $cloData['cloned_id'];
                              $cloneClassId = $cloData['id'];
                              $fetch_grade1 = $connect->query("SELECT over_all_grade FROM cloned_gradesheet WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                              $grade1 = $fetch_grade1->fetchColumn();

                              // $instructores1 = $connect->query("SELECT to_userid FROM `notifications` WHERE type = '$table' AND data = '$ides' AND user_id = '$fetchuser_id' AND permission = '$cloneID' AND extra_data='cloned_gradsheet'");
                              // $instructor1 = $instructores1->fetchColumn();

                              $instructores1 = $connect->query("SELECT instructor FROM `cloned_gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                              $instructor1 = $instructores1->fetchColumn();

                              $codeId1 = $connect->query("SELECT gradsheet_status FROM `cloned_gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                              $codeIdData = $codeId1->fetchColumn();

                              $checkCode = 0;

                              $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                              $codeName->execute([$codeIdData]);
                              $codeNameData = $codeName->fetchColumn();

                              $over_all_grade_per111 = $connect->query("SELECT over_all_grade_per FROM `cloned_gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                              $over_all_grade_per11 = $over_all_grade_per111->fetchColumn();

                              $over_all_grade_per111 = $connect->query("SELECT over_all_comment FROM `cloned_gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                          // $over_all_grade_per1->execute([$table, $ides, $fetchuser_id]);
                          $comment11 = $over_all_grade_per111->fetchColumn();

                              $added_ins_name1 = $connect->query("SELECT nickname FROM `users` WHERE id = '$instructor1'");
                              $get_ins_name1 = $added_ins_name1->fetchColumn();
                              if ($grade1 == "U") {
                                $class1 = "btn btn-danger";
                              } elseif ($grade1 == "F") {
                                $class1 = "btn btn-warning";
                              } elseif ($grade1 == "G") {
                                $class1 = "btn btn-secondary";
                              } elseif ($grade1 == "V") {
                                $class1 = "btn btn-success";
                              } elseif ($grade1 == "E") {
                                $class1 = "btn btn-primary";
                              } elseif ($grade1 == "N") {
                                $class1 = "btn btn-light";
                              } else {
                                $class1 = "btn btn-dark";
                              }
                              $fetch_grade_id = $connect->query("SELECT id FROM cloned_gradesheet WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                              $grade_id = $fetch_grade_id->fetchColumn();
                              $if_cloned = "";
                              if ($grade_id == "") {
                                $if_cloned = "href=delete_clone_class.php?id=$ides";
                              } else {
                                $if_cloned = 'data-bs-toggle="modal" data-bs-target="#ask_admin"';
                              }
                              $xString = str_repeat("X", $cloneID);
                              echo '<div class="hover-text">';
                              echo '<a style="margin-bottom:25px;" data-back="' . $over_all_grade_per11 . '/' . $get_ins_name1 . '" data-front="' . $row1['symbol'] . $xString . '" class="' . $class1 . ' btn-flip1" href="newgradesheetcl.php?id=' . urlencode(base64_encode($ides)) . '&class_name=' . urlencode(base64_encode($table)) . '&clone_ides=' . urlencode(base64_encode($cloneID)) . '">
                      <span class="circleig1">' . $codeNameData . '</span></a>';
                      echo '<span class="tooltip-text1" id="top" style="text-align:left;border-left:5px solid red;">
                            <span class="m-1 p-2 mt-2" style="margin-bottom:3px;color:white;"><label style="font-weight: bold;color: darkgoldenrod;font-size:large;">Class:</label><span style="font-size:large; font-family:cursive;color:black;">' . $className . ' </span></span><br>
                            <span class="m-1 p-2" style="color:white;"><label style="font-weight: bold;color: darkgoldenrod;font-size:large;">Summary:</label><span style="font-size:large; font-family:cursive;color:black;">' . $comment11 . '</span> </span>
                          </span>';
                      echo '</div>';
                              if (isset($_SESSION['permission']) && $permission['askclone_delete'] == "1") {
                                echo '<a style="margin-left:-1px;position:relative;top:-21px;left:-22px;" ' . $if_cloned . ' class="delete_cloned" id=' . $ides . '><i class="bi bi-x-circle text-danger"></i></a>';
                              } else if (isset($_SESSION['permission']) && $permission['clone_delete'] == "1" && $grade_id != "") {
                                echo '<a style="position:relative;top:-21px;left:-22px;" data-bs-toggle="modal" data-bs-target="#first_confrim" class="delete_cloned1" id=' . $ides . '><i class="bi bi-x-circle text-danger"></i></a>';
                              } else if (isset($_SESSION['permission']) && $permission['clone_delete'] == "1" && $grade_id == "") {

                                echo '<a style="margin-left:7px; margin-right:13px;position:relative;top:-21px;left:-22px;" href=delete_clone_class.php?actualId=' . $cloneClassId . '><i class="bi bi-x-circle text-danger"></i></a>';
                              }
                            }
                          }
                        }

                        ?>

                      <tr>
                        <hr style="color:white;">

                      <?php } ?>

                </table>
              </div>
            </div>

          </div>
        </div>




  
      </div>


  </main>

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

  <div class="modal fade" id="clone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Clone Gradesheet</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalbody">
          <form action="clone_gradsheet.php" method="post">
            <input type="hidden" name="student_id" value="<?php echo $fetchuser_id ?>">
            <input type="hidden" name="class" value="<?php echo $table ?>">
            <table style="margin: 5px; padding:5px;" class="table table-striped table-bordered" id="actualclonetable">
              <input class="form-control" type="text" id="actualclonesearch" onkeyup="actualclone()" placeholder="Search for Actual Class.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-light"><input type="checkbox" id="select-all-actual"></th>
                <th class="text-light">Sr No</th>
                <th class="text-light">Symbol</th>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM actual where ctp='$std_course1'";
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
                    <td><?php echo $row['symbol'] ?></td>
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
  function actualclone() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("actualclonesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("actualclonetable");
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
  document.getElementById('select-all-actual').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  }
</script>

<!--Footer-->
<footer id="contenthome" role="footer" class="footer">
  <?php include ROOT_PATH . 'includes/footer2.php'; ?>
</footer>
 <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
</body>




</html>