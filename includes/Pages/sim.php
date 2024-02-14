<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$std_course = "";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Simulation Page</title>
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

  /*#button span {
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
    -webkit-transition: .4s,opacity .6s;
    -moz-transition: .4s,opacity .6s;
    -o-transition: .4s,opacity .6s;
    transition: .4s,opacity .6s;
}*/

  /* :before */

  /*#button:before {
    content: attr(data-hover);
    -webkit-transform: translate(-150%,0);
    -moz-transform: translate(-150%,0);
    -ms-transform: translate(-150%,0);
    -o-transform: translate(-150%,0);
    transform: translate(-150%,0);
}*/

  /* :after */

  /*#button:after {
    content: attr(data-active);
    -webkit-transform: translate(150%,0);
    -moz-transform: translate(150%,0);
    -ms-transform: translate(150%,0);
    -o-transform: translate(150%,0);
    transform: translate(150%,0);
}*/

  /* Span on :hover and :active */

  /*#button:hover span,
#button:active span {
    opacity: 0;
    -webkit-transform: scale(0.3);
    -moz-transform: scale(0.3);
    -ms-transform: scale(0.3);
    -o-transform: scale(0.3);
    transform: scale(0.3);
}*/

  /*  
    We show :before pseudo-element on :hover 
    and :after pseudo-element on :active 
*/

  /*#button:hover:before,
#button:active:after {
    opacity: 1;
    -webkit-transform: translate(0,0);
    -moz-transform: translate(0,0);
    -ms-transform: translate(0,0);
    -o-transform: translate(0,0);
    transform: translate(0,0);
    -webkit-transition-delay: .0s;
    -moz-transition-delay: .0s;
    -o-transition-delay: .0s;
    transition-delay: .0s;
}*/

  /* 
  We hide :before pseudo-element on :active
*/

  /*#button:active:before {
    -webkit-transform: translate(-150%,0);
    -moz-transform: translate(-150%,0);
    -ms-transform: translate(-150%,0);
    -o-transform: translate(-150%,0);
    transform: translate(-150%,0);
    -webkit-transition-delay: 0s;
    -moz-transition-delay: 0s;
    -o-transition-delay: 0s;
    transition-delay: 0s;
}*/
</style>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  

  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    $classcolor = "SELECT * FROM gradesheet where user_id='$fetchuser_id'";
    $classcolorst = $connect->prepare($classcolor);
    $classcolorst->execute();

    if ($classcolorst->rowCount() > 0) {
      $class = "btn btn-success";
    } else {
      $class = "btn btn-dark";
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

   /* .tooltip-text {
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
      text-align: left;
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
    }

    .top1 {
      top: -40px;
      left: -50%;
    }

    .top1::before {
      top: 80%;
      left: 45%;
    }

    .hover-text {
      position: relative;
      display: inline-block;
      margin: 40px;
      font-family: Arial;
      text-align: center;
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

  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:35px; width:45px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Stimulation_Class.png">
            Simulation <?php if(isset($_SESSION['division_NAME'])){ echo $_SESSION['division_NAME']; } ?>
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
    margin: 0px; border-radius: 20px;"><img data-bs-toggle="modal" data-bs-target="#clone" style="height:30px; width:30px; margin:5px; float:right;" src="<?php echo BASE_URL; ?>assets/svg/icons/clone12.png"></button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">

              <table id="table" class="center" style="border: 1px solid black;">
                <?php
                $query = "SELECT * FROM sim_phase where ctp_id='$std_course1'";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) {

                ?>
                  <div class="container">
                    <tr>

                      <?php
                      $phase = $row['phase'];
                      $sel_ctp_nam1 = $connect->prepare("SELECT phasename FROM phase WHERE id=?");
                      $sel_ctp_nam1->execute([$phase]);
                      $sel_ctp_nam1_data2 = $sel_ctp_nam1->fetchColumn();
                      echo $phase_name = '<div><h4 style="color:blue; margin-top:-15px;" id="phase">' . $sel_ctp_nam1_data2 . '</h4></div>';
                      ?>
                      <hr>
                    </tr>
                    <tr>
                      <?php
                      $query_sim = "SELECT * FROM sim where phase='$phase'";
                      $statement_sim = $connect->prepare($query_sim);
                      $statement_sim->execute();
                      $result_sim = $statement_sim->fetchAll();
                      foreach ($result_sim as $row) {
                        $ides = $row['id'];
                        $ctp = $row['ctp'];
                        $phase_id = $row['phase'];
                        $table = "sim";
                        $className = $row['sim'];
                        // $className = str_replace(' ', '', $className1);
                        $table = "sim";
                        $over_all_grade_sim = $connect->prepare("SELECT over_all_grade FROM `gradesheet` WHERE class=? and class_id=? and user_id=?");
                        $over_all_grade_sim->execute([$table, $ides, $fetchuser_id]);
                        $grade_sim = $over_all_grade_sim->fetchColumn();

                        $instructores_sim = $connect->prepare("SELECT to_userid FROM `notifications` WHERE type=? and data=? and user_id=? and extra_data='is selected to fill gradsheet of'");
                        $instructores_sim->execute([$table, $ides, $fetchuser_id]);
                        $instructor_sim = $instructores_sim->fetchColumn();

                        $codeId = $connect->prepare("SELECT gradsheet_status FROM `gradesheet` WHERE class=? and class_id=? and user_id=?");
                        $codeId->execute([$table, $ides, $fetchuser_id]);
                        $codeIdData = $codeId->fetchColumn();

                        $checkCode = 0;

                        $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                        $codeName->execute([$codeIdData]);
                        $codeNameData = $codeName->fetchColumn();

                        $over_all_grade_per1_sim = $connect->prepare("SELECT over_all_grade_per, over_all_comment FROM `gradesheet` WHERE class=? and class_id=? and user_id=?");
                        $over_all_grade_per1_sim->execute([$table, $ides, $fetchuser_id]);
                        $over_all_grade_per_sim = $over_all_grade_per1_sim->fetchColumn();

                        $over_all_grade_per1 = $connect->query("SELECT over_all_comment FROM `gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id'");
                          // $over_all_grade_per1->execute([$table, $ides, $fetchuser_id]);
                          $comment = $over_all_grade_per1->fetchColumn();

                        $added_ins_name_sim = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                        $added_ins_name_sim->execute([$instructor_sim]);
                        $get_ins_name_sim = $added_ins_name_sim->fetchColumn();

                        if ($grade_sim == "U") {
                          $class = "btn btn-danger";
                        } elseif ($grade_sim == "F") {
                          $class = "btn btn-warning";
                        } elseif ($grade_sim == "G") {
                          $class = "btn btn-secondary";
                        } elseif ($grade_sim == "V") {
                          $class = "btn btn-success";
                        } elseif ($grade_sim == "E") {
                          $class = "btn btn-primary";
                        } elseif ($grade_sim == "N") {
                          $class = "btn btn-light";
                        } else {
                          $class = "btn btn-dark";
                        }


                        // echo '<a style="margin-top:-10px; margin-bottom:-10px; margin-left:5px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="'.$over_all_grade_per_sim.'/'.$get_ins_name_sim.'" style="margin:5px;" id="cl_sy" class="'.$class.'" href="gradesheet.php?id='.urlencode(base64_encode($row['id'])).'&class_name='.urlencode(base64_encode($table)).'">'.$row['shortsim'].'</a>';

                        echo '<div class="hover-text"><a style="margin-left:5px; margin-bottom:25px;" class="' . $class . ' btn-flip1 ayushi" data-back="' . $over_all_grade_per_sim . '/' . $get_ins_name_sim . '" data-front="' . $row['shortsim'] . '" href="newgradesheet.php?id=' . urlencode(base64_encode($row['id'])) . '&class_name=' . urlencode(base64_encode($table)) . '"><span class="circleig1">' . $codeNameData . '</span></a>
                        <span class="tooltip-text1" id="top" style="text-align:left;border-left: 5px solid red;"><span style="color:white;"><label style="font-weight: bold;color: darkgoldenrod;font-size: large;float:left;">Class :</label><span style="font-size:large; font-family:cursive;color:black;">' . $className . '</span></span><br><span style="color:white;"><label style="font-weight: bold;color: darkgoldenrod;font-size: large;float:left;">Summary :</label><span style="font-size:large; font-family:cursive;color:black;">'.$comment.'</span></span></span></div>';

                        $cloneId = $connect->query("SELECT cloned_id,id FROM clone_class WHERE class_id = '$ides' AND std_id = '$fetchuser_id' AND class_name = 'sim'");
                        // $cloneID = $cloneId->fetchColumn();
                        if ($cloneId->rowCount() > 0) {
                          while ($cloData = $cloneId->fetch()) {
                            $cloneID = $cloData['cloned_id'];
                            $cloneClassId = $cloData['id'];
                            $fetch_grade1 = $connect->query("SELECT over_all_grade FROM cloned_gradesheet WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                            $grade1 = $fetch_grade1->fetchColumn();

                            $fetch_grade1 = $connect->query("SELECT instructor FROM cloned_gradesheet WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                            $instructor1 = $fetch_grade1->fetchColumn();

                            // $instructores1 = $connect->query("SELECT to_userid FROM `notifications` WHERE type = '$table' AND data = '$ides' AND user_id = '$fetchuser_id' AND permission = '$cloneID' AND extra_data='cloned_gradsheet'");
                            // $instructor1 = $instructores1->fetchColumn();

                            $codeId1 = $connect->query("SELECT gradsheet_status FROM `cloned_gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                            $codeIdData = $codeId1->fetchColumn();

                            $checkCode = 0;

                            $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                            $codeName->execute([$codeIdData]);
                            $codeNameData = $codeName->fetchColumn();

                            $over_all_grade_per111 = $connect->query("SELECT over_all_grade_per FROM `cloned_gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                            $over_all_grade_per11 = $over_all_grade_per111->fetchColumn();

                            $over_all_grade_per112 = $connect->query("SELECT over_all_comment FROM `cloned_gradesheet` WHERE class = '$table' AND class_id = '$ides' AND user_id = '$fetchuser_id' AND cloned_id = '$cloneID'");
                          // $over_all_grade_per1->execute([$table, $ides, $fetchuser_id]);
                          $comment11 = $over_all_grade_per112->fetchColumn();

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
                            $xString = str_repeat("x", $cloneID);
                            echo '<div class="hover-text"><a style="margin-bottom:25px; margin-left:5px; margin-right:-15px;" data-back="' . $over_all_grade_per11 . '/' . $get_ins_name1 . '" data-front="' . $row['shortsim'] . $xString . '" class="' . $class1 . ' btn-flip1 varun" href="newgradesheetcl.php?id=' . urlencode(base64_encode($ides)) . '&class_name=' . urlencode(base64_encode($table)) . '&clone_ides=' . urlencode(base64_encode($cloneID)) . '">
                            <span class="circleig1">' . $codeNameData . '</span></a>';
                            echo '<span class="tooltip-text1" id="top" style="text-align:left;border-left: 5px solid red;">
                            <span class="m-1 p-2 mt-2" style="margin-bottom:3px;color:white;"><label style="font-weight: bold;color: darkgoldenrod;font-size: large;float:left;">Class:</label><span style="font-size:large; font-family:cursive;color:black;">' . substr ($className,0,10) . ' <span>..</span></span></span><br>
                            <label style="font-weight: bold;color: darkgoldenrod;font-size: large;float:left;">Summary:</label><span style="font-size:large; font-family:cursive;color:black;">' . $comment11 . '</span>
                          </span>';

                            echo '</div>';
                            if (isset($_SESSION['permission']) && $permission['askclone_delete'] == "1") {
                              echo '<a style="margin-left:-1px;" ' . $if_cloned . ' class="delete_cloned" id=' . $ides . '><i class="bi bi-x-circle text-danger"></i></a>';
                            } else if (isset($_SESSION['permission']) && $permission['clone_delete'] == "1" && $grade_id != "") {
                              echo '<a data-bs-toggle="modal" data-bs-target="#first_confrim" class="delete_cloned1" id=' . $ides . '><i class="bi bi-x-circle text-danger"></i></a>';
                            } else if (isset($_SESSION['permission']) && $permission['clone_delete'] == "1" && $grade_id == "") {

                              echo '<a style="margin-left:7px; margin-right:-5px;position:relative;top:-20px;left:-10px;" href=delete_clone_class.php?simId=' . $cloneClassId . '><i class="bi bi-x-circle text-danger" ></i></a>';
                            }
                          }
                        }
                      }
                      ?>

                    </tr>
                    <hr style="color:white;">

                  </div>
                <?php } ?>
              </table>

            </div>
            <!-- End Body -->

          </div>
          <!-- End Card -->
        </div>
      </div>
     
      <!-- End Content -->

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
          <h5 class="modal-title" id="exampleModalLabel"></h5>
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
          <form action="delete_cloned_id_admin_sim.php" method="post">
            <input type="hidden" name="cloned_id_admin_del" id="get_clo_del_id">
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
          <form action="ask_clone_delete_sim.php" method="post">
            <input type="hidden" name="cloned_id_value" id="clonedgradesheetid">
            <input type="hidden" name="userid" value="<?php echo $user_id ?>">
            <button class="btn btn-success">Ask Admin To Delete?</button>
          </form>
        </div>

      </div>
    </div>
  </div>


  <!--MOdal for clone gradesheet-->
  <!-- Modal -->
  <div class="modal fade" id="clone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Clone Gradesheet</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="clone_gradsheet_sim.php" method="post">

            <input type="hidden" name="student_id" value="<?php echo $fetchuser_id ?>">
            <input type="hidden" name="class" value="sim">
            <table style="margin: 5px; padding:5px;" class="table table-striped table-bordered" id="simclonetable">
              <input class="form-control" type="text" id="simclonesearch" onkeyup="simclone()" placeholder="Search for Sim Class.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-light"><input type="checkbox" id="select-all-sim"></th>
                <th class="text-light">Sr No</th>
                <th class="text-light">Symbol</th>
              </thead>
              <tbody>
                <?php
                $query1 = "SELECT * FROM sim where ctp='$std_course1'";
                $statement1 = $connect->prepare($query1);
                $statement1->execute();
                $result1 = $statement1->fetchAll();
                $sn1 = 1;
                foreach ($result1 as $row1) {
                  $class_ides = $row1['id'];

                ?>
                  <tr>
                    <td><input type="checkbox" name="clone_class[]" value="<?php echo $row1['id'] ?>"></td>
                    <td><?php echo $sn1++; ?></td>
                    <td><?php echo $row1['shortsim'] ?></td>
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
  document.getElementById('select-all-sim').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  }
</script>

<script>
  function simclone() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("simclonesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("simclonetable");
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


<!--Footer-->
<footer id="contenthome" role="footer" class="footer">
  <?php include ROOT_PATH . 'includes/footer2.php'; ?>
</footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>