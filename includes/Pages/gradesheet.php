<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$phase_id = "";
$actclass = "";
$simclass = "";
$academicclass = "";
$vehnum = "";
$vehtype = "";
$in = "";
$class = "";
$classid = "";
$over_all_comment = "";
$comments = "";
$noti_id = "";
//fetch ins for form
$q2 = "SELECT * FROM users where role='instructor'";
$st2 = $connect->prepare($q2);
$st2->execute();

if ($st2->rowCount() > 0) {
  $re2 = $st2->fetchAll();
  foreach ($re2 as $row2) {
    $in .= '<option value="' . $row2['id'] . '">' . $row2['nickname'] . '</option>';
  }
}

//fetch percentage details
$per_table_data = "";
$per = "SELECT * FROM percentage";
$per5 = $connect->prepare($per);
$per5->execute();
if ($per5->rowCount() > 0) {
  $reper55 = $per5->fetchAll();
  $sn = 1;
  foreach ($reper55 as $rowper5) {
    $per_table_data .= '<tr>
         <td>' . $sn++ . '</td>
         <td>' . $rowper5['percentagetype'] . '</td>
             <td>' . $rowper5['percentage'] . '</td>
             <td>' . $rowper5['color'] . '</td>

         </tr>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Grade Sheet</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>includes/Pages/tos.svg">
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/vendor/quill/dist/quill.snow.css">
</head>

<style type="text/css">
  #radio tr:hover {
    background-color: #accbec6b;
  }

  .tox-statusbar__text-container {
    display: none !important;
  }
  /*.ql-toolbar.ql-snow
  {
  position: fixed;
    top: 842px;
    width: 618px;
  }*/
</style>

<body>
  
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 

  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- display corse name -->
    <?php
    // if class id is set
    if (isset($_GET['class_name'])) {
      $_SESSION['class_name_Sess'] = $class_name = urldecode(base64_decode($_GET['class_name']));
    } else if (isset($_SESSION['class_name_Sess'])) {
      $class_name = $_SESSION['class_name_Sess'];
    }
    if (isset($_GET['id'])) {
      $_SESSION['classid_Sess'] = $classid = urldecode(base64_decode($_GET['id']));
      $class_data = "SELECT * FROM $class_name where id='$classid'";

      $class_datast = $connect->prepare($class_data);
      $class_datast->execute();

      if ($class_datast->rowCount() > 0) {
        $result_data = $class_datast->fetchAll();
        foreach ($result_data as $rs) {
          if ($class_name == "actual") {
            $class = $rs['symbol'];
          } else if ($class_name == "sim") {
            $class = $rs['shortsim'];
          }
          $percentage = $rs['percentage'];
          $phase_id = $rs['phase'];
        }
      }
    } else if (isset($_SESSION['classid_Sess'])) {
      $classid = $_SESSION['classid_Sess'];
      $class_data = "SELECT * FROM $class_name where id='$classid'";
      $class_datast = $connect->prepare($class_data);
      $class_datast->execute();

      if ($class_datast->rowCount() > 0) {
        $result_data = $class_datast->fetchAll();
        foreach ($result_data as $rs) {
          if ($class_name == "actual") {
            $class = $rs['symbol'];
          } else if ($class_name == "sim") {
            $class = $rs['shortsim'];
          }
          $percentage = $rs['percentage'];
          $phase_id = $rs['phase'];
        }
      }
    }

    // if class name is set

    // echo '<h5>Class : <span class="text-success" style="font-size: unset; text-decoration: underline;">'.$class.'</span> </h5>';

    ?>
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <div class="page-header" style="margin-top:50px;">
          <h1 class="text-success">Grade sheet</h1>
          <?php
          $re_page = "";
          $re_page = $class_name . '.php';
          ?>
          <a style="position: fixed;" class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To the Class Page" style="color:black; text-decoration:none;" href="<?php echo $re_page ?>"><i class="bi bi-arrow-left"></i></a>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <!-- <div class="card-header card-header-content-between">
               <h1>Gradesheet</h1>
            </div> -->
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              

              <div class="row">
                <div class="col-6">



                  <div class="d-flex align-items-center">
                    <?php
                     if (isset($_REQUEST['std_id'])) {
                      $fetchuser_id = $_COOKIE['student'] = $_REQUEST['std_id'];
                      $noti_id = $_REQUEST['noti_id'];

                      $name = "SELECT * FROM users where id='$fetchuser_id'";
                      $stname2 = $connect->prepare($name);
                      $stname2->execute();

                      if ($stname2->rowCount() > 0) {
                        $rename2 = $stname2->fetchAll();
                        foreach ($rename2 as $rowname2) {
                          $fetchname = $rowname2['name'];
                          $fetchid = $rowname2['studid'];
                          $fetchrole = $rowname2['role'];
                          $fetchphone = $rowname2['phone'];
                          $fetchemail = $rowname2['email'];
                          $fetchuser_id = $rowname2['id'];
                          $fetchnickname = $rowname2['nickname'];
                          $fetchuser_image = $rowname2['file_name'];
                        }
                      }
                      $cr_name_data = "SELECT * FROM newcourse where StudentNames='$fetchuser_id'";
                      $cr_st1 = $connect->prepare($cr_name_data);
                      $cr_st1->execute();

                      if ($cr_st1->rowCount() > 0) {
                        $cr_result1 = $cr_st1->fetchAll();
                        foreach ($cr_result1 as $row1) {
                          $CourseCode11 = $row1['CourseCode'];
                          $Coursename11 = $row1['nick_name'];
                          $ctp_v = $row1['CourseName'];
                          $values_c = $row1['Courseid'];
                        }
                      }
                      $cr_name_data1 = "SELECT * FROM newcourse where CourseCode='$CourseCode11' and CourseName='$ctp_v' group by CourseCode,CourseName";
                      $cr_st11 = $connect->prepare($cr_name_data1);
                      $cr_st11->execute();

                      if ($cr_st11->rowCount() > 0) {
                        $cr_result11 = $cr_st11->fetchAll();
                        foreach ($cr_result11 as $row11) {
                          $values_c1 = $row11['Courseid'];
                        }
                      }
                      $cr_name = "SELECT * FROM ctppage where CTPid='$ctp_v'";
                      $cr_st = $connect->prepare($cr_name);
                      $cr_st->execute();

                      if ($cr_st->rowCount() > 0) {
                        $cr_result = $cr_st->fetchAll();
                        foreach ($cr_result as $row) {

                          $std_course1 = $row['CTPid'];
                          $std_course = $row['course'];
                          $Total_type_maarks = $row['total_mark'];
                          $course_code = $row['symbol'];
                        }
                      }
                    ?>
                      <input type="hidden" value="<?php echo $fetchuser_id ?>" id="set_values1s">
                      <input type="hidden" value="<?php echo $values_c1 ?>" id="set_values1s1">
                      <input type="hidden" value="<?php echo $ctp_v ?>" id="set_values1s11">
                      <input type="hidden" value="<?php echo $course_code . ' - ' . '0' . $CourseCode11 ?>" id="get_name_co_s">
                      <script>
                        $(document).ready(function() {
                          var set_values1s = $('#set_values1s').val();
                          var set_values1s1 = $('#set_values1s1').val();
                          
                          var set_values1s11 = $('#set_values1s11').val();
                          
                          var course1 = sessionStorage.getItem('id');
                          var get_name_co_s = $('#get_name_co_s').val();
                          $('#get_co_name').html(get_name_co_s);
                          document.cookie = "phpgetcourse = " + set_values1s11;

                          if (set_values1s1) {

                            $.ajax({
                              type: 'POST',
                              url: '../selec_std1.php',
                              data: 'courseid=' + set_values1s1,
                              success: function(html) {
                                sessionStorage.setItem('id', set_values1s1);
                                document.cookie = "allstudent = " + html;
                                $('#state').html(html);
                                sessionStorage.setItem('student', set_values1s);
                                document.cookie = "student = " + set_values1s;
                                var getstudent = sessionStorage.getItem('student');
                                $('#state').val(getstudent);
                              }
                            });
                          }

                        });
                      </script>
                    <?php

                    }

                    if ($fetchuser_image != null) {
                      $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
                    } else {
                      $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
                    ?>

                    <div class="avatar avatar-lg avatar-circle">
                      <img style="height:50px; width:50px;" class="avatar" src="<?php echo $fetchuser_image1; ?>" alt="Logo" data-hs-theme-appearance="default">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h3 class="mb-0 text-dark"><?php echo $fetchnickname ?></h3>
                      <span class="card-text text-body"><?php echo $course_code . ' - ' . '0' . $CourseCode11; ?></span><br>
                      <span class="card-text text-body"><?php echo $Coursename11; ?></span><br>
                      <span class="card-text text-body"><?php echo $class; ?></span>
                    </div>
                  </div>


                  <?php $get_ins1 = "SELECT * FROM notifications where `type`='$class_name' AND `data`='$classid' AND `to_userid`='$user_id' AND user_id='$fetchuser_id' and extra_data='is selected to fill gradsheet of'";
                  $get_insst1 = $connect->prepare($get_ins1);
                  $get_insst1->execute();
                  if ($get_insst1->rowCount() == 0) { ?>
                    <script>
                      $(document).ready(function() {
                        $(".myRadio").attr('disabled', true);
                        $(".myRadio1").attr('disabled', true);
                        $(".myRadio2").attr('disabled', true);
                        $("#gradesper").attr('disabled', true);
                        $("#additional_training").attr('disabled', true);
                        $("#Unaccomplish_but").attr('disabled', true);
                        $("#submit_gradsheet_but").attr('disabled', true);
                      });
                    </script>
                  <?php
                  }
                  ?>

                </div>
                <div class="col-6">
                  <!-- <button class="btn btn-success"><a style="color:white; text-decoration: none;" href="prereuisite.php">Add</a></button> -->
                  <h1>Prerequisites</h1>
                  <?php

                  $fet = "SELECT * FROM prereuisite_data WHERE class_id='$classid' AND class_table='$class_name' group by class_id,class_table,id";

                  $statement = $connect->prepare($fet);
                  $statement->execute();
                  $result = $statement->fetchAll();
                  foreach ($result as $row1) {
                    $symbol_id1 = $row1["prereui_id"];
                    $table_name1 = $row1["prereui_table"];
                    $select_ctp = $connect->prepare("SELECT ctp FROM $table_name1 WHERE id=?");
                    $select_ctp->execute([$symbol_id1]);
                    $select_ctp_id = $select_ctp->fetchColumn();

                    $select_phase = $connect->prepare("SELECT phase FROM $table_name1 WHERE id=?");
                    $select_phase->execute([$symbol_id1]);
                    $select_phase_id = $select_phase->fetchColumn();
                    $fetch_grade1 = $connect->prepare("SELECT id FROM gradesheet where class=? and class_id=? and course_id=? and phase_id=? and user_id=?");
                    $fetch_grade1->execute([$table_name1, $symbol_id1, $select_ctp_id, $select_phase_id, $fetchuser_id]);
                    $grade1 = $fetch_grade1->fetchColumn();
                    if ($grade1 == "") {
                      $class = "btn btn-danger";
                    } elseif ($grade1 != "") {
                      $class = "btn btn-success";
                    }
                    if ($table_name1 == "academic") {
                      $get_color = $connect->prepare("SELECT permission FROM acedemic_stu WHERE acedemic_id=? and std_id=?");
                      $get_color->execute([$symbol_id1, $fetchuser_id]);
                      $value_per = $get_color->fetchColumn();
                      if ($value_per == '1') {
                        $class = "btn btn-success";
                      }
                    }
                    if ($table_name1 == "actual") {
                      $q = $connect->prepare("SELECT symbol FROM $table_name1 WHERE id=?");
                    } else if ($table_name1 == "sim") {
                      $q = $connect->prepare("SELECT shortsim FROM $table_name1 WHERE id=?");
                    } else if ($table_name1 == "academic") {
                      $q = $connect->prepare("SELECT shortacademic FROM $table_name1 WHERE id=?");
                    } else if ($table_name1 == "test") {
                      $q = $connect->prepare("SELECT shorttest FROM $table_name1 WHERE id=?");
                    }
                    $q->execute([$symbol_id1]);
                    $name = $q->fetchColumn();
                  ?>

                    <ul style=" list-style-type: none; display: inline-block;">
                      <li style="text-decoration: none;" class="<?php echo $class ?>"><?php echo $name; ?></li>
                    </ul>
                  <?php }
                  ?>
                </div>
              </div>
              <!-- End Body -->
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->


        <!--2nd row started-->
        <div class="row justify-content-center">

          <div class="col-lg-10 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
              <!-- Body -->
              <div class="card-body">
                <?php
                //fetch all vechile for form
                $q6 = "SELECT vehicle.VehicleNumber,vehicle.VehicleSpot,vehicle.id FROM vehicle INNER JOIN ctppage ON vehicle.VehicleType = ctppage.VehicleType where ctppage.CTPid='$std_course1'";

                $st6 = $connect->prepare($q6);
                $st6->execute();
                if ($st6->rowCount() > 0) {
                  $re6 = $st6->fetchAll();
                  foreach ($re6 as $row7) {
                    $vehnum .= '<option value="' . $row7['id'] . '">' . $row7['VehicleNumber'] . '</option>';
                  }
                } ?>
                <!-- form starts here -->

                <table style="width:100%;" id="user_Data_table">
                  <tr>


                    <td style="width:50%;"><label class="text-dark" style="font-weight:bolder;">StdId</label>
                      <input class="form-control" type="text" name="stud_id" readonly value="<?php echo $fetchid ?>" style="background-color: #bfcfe09e;">
                    </td>
                    <td style="width:50%;"><label class="text-dark" style="font-weight:bolder;">Name</label>
                      <input class="form-control" type="text" name="stud_name" readonly value="<?php echo $fetchnickname ?>" style="background-color: #bfcfe09e;">
                    </td>
                  </tr>
                  <tr>
                    <td style="width:50%;"><label class="text-dark" style="font-weight:bolder;">Role</label>
                      <input class="form-control" type="text" name="stud_role" readonly value="<?php echo $fetchrole ?>" style="background-color: #bfcfe09e;">
                    </td>
                    <td style="width:50%;"><label class="text-dark" style="font-weight:bolder;">Phone</label>
                      <input class="form-control" type="text" name="stud_phone" readonly value="<?php echo $fetchphone ?>" style="background-color: #bfcfe09e;">
                    </td>
                  </tr>
                  <tr>
                    <?php
                    $std_in = "";
                    $vec_id = "";
                    $over_all_grade_per = "";
                    //fetch selected student details
                    $stu_grade = "SELECT * FROM gradesheet where user_id='$fetchuser_id' and course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name'";
                    $st = $connect->prepare($stu_grade);
                    $st->execute();
                    if ($st->rowCount() > 0) {
                      $re = $st->fetchAll();
                      foreach ($re as $value) {
                        $over_all_comment = $value['over_all_comment'];
                        $over_all_grade_per = $value['over_all_grade_per'];
                        $comments = $value['comments'];
                        //fetch instructor of selected std if set
                        $std_in = $value['instructor'];
                        $instr_name = $connect->prepare("SELECT name FROM `users` WHERE id=?");
                        $instr_name->execute([$std_in]);
                        $name1 = $instr_name->fetchColumn();
                        //fetch vechile
                        $vec_id = $value['vehicle'];
                        $vec_name = $connect->prepare("SELECT VehicleNumber FROM `vehicle` WHERE id=?");
                        $vec_name->execute([$vec_id]);
                        $name2 = $vec_name->fetchColumn();
                        $vec_type = $connect->prepare("SELECT VehicleSpot FROM `vehicle` WHERE id=?");
                        $vec_type->execute([$vec_id]);
                        $name3 = $vec_type->fetchColumn();
                        $st_time = $value['time'];
                        $st_date = $value['date'];

                        $st_date = strtotime($st_date);
                        $st_duration_hr = $value['duration_hours'];
                        $st_duration_min = $value['duration_min'];
                      }
                    }
                    $added_ins = "";
                    $get_ins = "SELECT * FROM notifications where `type`='$class_name' AND `data`='$classid' AND user_id='$fetchuser_id' and extra_data='is selected to fill gradsheet of'";

                    $get_insst = $connect->prepare($get_ins);
                    $get_insst->execute();
                    if ($get_insst->rowCount() > 0) {
                      $re1 = $get_insst->fetchAll();
                      foreach ($re1 as $row1) {
                        $added_ins = $row1['to_userid'];
                        $added_ins_name = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                        $added_ins_name->execute([$added_ins]);
                        $get_ins_name = $added_ins_name->fetchColumn();
                      }
                    }
                    ?>
                    <form action="stu_Data.php" method="get">
                      <input type="hidden" name="st_id" value="<?php echo $fetchuser_id ?>">
                      <input type="hidden" name="cl_na" value="<?php echo $class_name ?>">
                      <input type="hidden" name="co_id" value="<?php echo $std_course1 ?>">
                      <input type="hidden" name="ph_id" value="<?php echo $phase_id ?>">
                      <input type="hidden" name="cl_id" value="<?php echo $classid ?>">
                      <td style="margin-top:5px; width:50%;"><label class="text-dark" class="form-label" for="instructor_id" style="font-weight:bolder; margin-top: 5px;">Instructor<span style="color:red"> (Select Instructor Will Notified)</span></label>

                        <!-- inserted instructor -->
                        <?php if ($added_ins != "") { ?>
                          <select type="text" id="instructor" class="form-control form-control-md" name="instructor_id" required>
                            <option selected hidden value="<?php echo $added_ins ?>"><?php echo $get_ins_name ?></option>
                            <option disabled value="">-select instructor-</option>
                            <?php echo $in ?>
                          </select>
                        <?php } else { ?>
                          <select type="text" id="instructor" class="form-control form-control-md" name="instructor_id" required>
                            <option selected disabled value="">-select instructor-</option>
                            <?php echo $in ?>
                          </select>
                        <?php } ?>




                      </td>
                      <td style="width:50%;"><label class="text-dark" style="font-weight:bolder; margin-top: -15px;">Vehicle</label>
                        <!-- inserted vechile number -->
                        <?php if ($vec_id != "") { ?>
                          <select type="text" id="vechile_dropdown" class="form-control form-control-md" name="vechile_id" required>
                            <option selected value="<?php echo $vec_id ?>"><?php echo $name2 ?></option>
                            <?php echo $vehnum ?>
                          </select>
                        <?php } else { ?>
                          <select type="text" class="form-control form-control-md" name="vechile_id" required>
                            <option selected disabled value="">-select Number-</option>
                            <?php echo $vehnum ?>
                          </select>
                        <?php } ?>


                        <span style="color:red"></span><span></span>
                      </td>
                  </tr>
                  <tr>
                    <!-- set inserted value of time -->
                    <td><label class="text-dark" style="font-weight:bolder;">Time</label><input required class="form-control" type="time" id="time_filled" value="<?php if (isset($st_time)) {
                                                                                                                                                                    $date = date("H:i", strtotime($st_time));
                                                                                                                                                                    echo "$date";
                                                                                                                                                                  } else {
                                                                                                                                                                    echo "";
                                                                                                                                                                  } ?>" name="time"></td>
                    <!-- set inserted value of date -->
                    <td><label class="text-dark" style="font-weight:bolder;">Date</label><input required class="form-control" type="date" id="date_filled" value="<?php if (isset($st_date)) {
                                                                                                                                                                    echo date('Y-m-d', $st_date);
                                                                                                                                                                  } else {
                                                                                                                                                                    echo "";
                                                                                                                                                                  } ?>" name="date"></td>
                  </tr>
                  <tr>
                    <td>
                      <label class="text-dark" style="font-weight:bolder;">Duration</label><br>

                      <input style="border-radius: 5px;" type="number" id="duration-hours" name="duration_hours" value="<?php if (isset($st_duration_hr)) {
                                                                                                                          echo $st_duration_hr;
                                                                                                                        } else {
                                                                                                                          echo "00";
                                                                                                                        } ?>" min="0" max="23" placeholder="hh" style="width: 50px;" oninput="this.value = this.value.slice(0, 2)" oninput="this.value = Math.min(Math.max(parseInt(this.value), 0), 12)">

                      :
                      <input style="border-radius: 5px;" type="number" id="duration-minutes" name="duration_minutes" value="<?php if (isset($st_duration_min)) {
                                                                                                                              echo $st_duration_min;
                                                                                                                            } else {
                                                                                                                              echo "00";
                                                                                                                            } ?>" min="0" max="59" placeholder="mm" style="width: 50px;" oninput="this.value = this.value.slice(0, 2)" oninput="this.value = Math.min(Math.max(parseInt(this.value), 0), 60)">

                    </td>
                  </tr>
                </table>
                <br>
                <input type="submit" class="btn btn-success" value="update" id="f_form">

                </form>

                <?php
                //  unlock the gradesheet
                $lock = "SELECT * FROM gradesheet where user_id='$fetchuser_id' and course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name'";
                $lockst = $connect->prepare($lock);
                $lockst->execute();
                if ($lockst->rowCount() > 0) {
                  $re = $lockst->fetchAll();
                  foreach ($re as $row) {
                ?>
                    <?php if ($role == 'super admin') { ?>
                      <button style="margin:5px; float: right;" onclick="document.getElementById('ins_reset_id').value='<?php echo $row['instructor'] ?>';document.getElementById('stu_reset_id').value='<?php echo $row['user_id'] ?>';" class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#admin_reset" id="ctpbtn">Clear</button> <input type="hidden" id="gradsheet_get_id" value="<?php echo $row['id'] ?>">
                    <?php
                    }

                    if ($role == 'instructor') { ?>
                      <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#ask_for_rest" style="float:right;margin-right:10px">Ask To Reset</a>
                      <div class="modal fade" id="ask_for_rest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <H3>Ask Permission for Unlock gradesheet</h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                              <form action="reset_ask.php" method="post" style="margin-left:5px; float: left;">
                                <input type="hidden" name="session_id" id="session_id" value="<?php echo $user_id ?>">
                                <input type="hidden" name="for_unlock" value="<?php echo $fetchuser_id ?>">
                                <input type="hidden" name="class_name" value="<?php echo $class_name ?>">
                                <input type="hidden" name="class_id" value="<?php echo $classid ?>">
                                <input type="submit" value="Ask" class="btn btn-success">
                              </form>
                              <button onclick="document.getElementById('ins_reset_id').value='<?php echo $row['instructor'] ?>';document.getElementById('stu_reset_id').value='<?php echo $row['user_id'] ?>';" class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#admin_reset" id="ctpbtn">Reset</button> <input type="hidden" id="gradsheet_get_id" value="<?php echo $row['id'] ?>">

                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }
                    // if role is super admin and gradesheet table value is 1
                    if ($row['status'] == '1' && $role == 'super admin') { ?>
                      <button style="margin:5px; float: right;" onclick="document.getElementById('gradesheetid').value='<?php echo $row['id'] ?>';" class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#unlock" id="ctpbtn">Unlock</button>

                    <?php
                    } else if ($row['status'] == '1' && $role == 'instructor') { ?>

                      <a class="btn btn-outline-success" id="ask_for_unlock" data-bs-toggle="modal" data-bs-target="#ask_for_unlock_modal" style="float: right; margin-right:10px;">Ask To Unlock</a>

                      <div class="modal fade" id="ask_for_unlock_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <H3>Ask Permission for Unlock gradesheet</h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                              <input type="hidden" name="session_id" id="session_id" value="<?php echo $user_id ?>">
                              <input type="hidden" name="for_unlock" value="<?php echo $fetchuser_id ?>">
                              <input type="hidden" name="class_name" value="<?php echo $class_name ?>">
                              <input type="hidden" name="class_id" value="<?php echo $classid ?>">
                              <input type="button" id="Ask_to_unlock" value="Ask" class="btn btn-success">

                              <button style="margin:5px;" onclick="document.getElementById('gradesheetid').value='<?php echo $row['id'] ?>';" class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#unlock" id="ctpbtn">Unlock</button>

                            </div>
                          </div>
                        </div>
                      </div>


                <?php }
                  }
                }
                ?>
              </div>
              <!-- End Body -->
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->
        <form method="post" action="submit_gradesheet.php">
          <input type="hidden" value="<?php echo $added_ins ?>" name="instructor_ides">
          <input class="form-control" type="hidden" id="stud_db_id" name="stud_db_id" value="<?php echo $fetchuser_id ?>">
          <input class="form-control" type="hidden" name="class_name" id="class_name" value="<?php echo $class_name ?>">
          <input type="hidden" name="phases_id" value="<?php echo $phase_id ?>">
          <input type="hidden" id="get_std_id" value="<?php echo $fetchuser_id ?>">
          <input type="hidden" name="course_id" value="<?php echo $std_course1 ?>">
          <input type="hidden" name="class_id" id="class_id" value="<?php echo $classid ?>">

          <!--#rd row started-->
          <div class="row justify-content-center">

            <div class="col-lg-10 mb-3 mb-lg-5">
              <!-- Card -->
              <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
                <!-- Body -->
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-6">
                        <!-- fetch item and subitem add from class page for particular class -->
                        <table class="table table-bordered target-table" id="radio">
                          <thead class="bg-dark">
                            <tr>
                              <th class="text-light">Id</th>
                              <th class="text-light">Name</th>
                              <th class="text-light">Grade</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            //fetch item
                            $allitem = "SELECT * FROM item where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name'";
                            $statement = $connect->prepare($allitem);
                            $statement->execute();

                            if ($statement->rowCount() > 0) {
                              $result = $statement->fetchAll();
                              $sn112 = 1;
                              foreach ($result as $row) {
                                $item_db_id = $row['id'];
                                $fetch_grade = $connect->prepare("SELECT grade FROM `item_gradesheet` WHERE item_id=? AND user_id=?");
                                $fetch_grade->execute([$item_db_id, $fetchuser_id]);
                                $grade = $fetch_grade->fetchColumn();
                                $bac_ground = "";

                                if ($grade == "U") {
                                  $bac_ground = "background-color:#ed4c78;color:white";
                                }
                                if ($grade == "F") {
                                  $bac_ground = "background-color:#f5ca99;color:white";
                                }
                                if ($grade == "G") {
                                  $bac_ground = "background-color:#71869d;color:white";
                                }
                                if ($grade == "E") {
                                  $bac_ground = "background-color:#377dff;color:white";
                                }

                                if ($grade == "V") {
                                  $bac_ground = "background-color:#00c9a7;color:white";
                                }
                                if ($grade == "N") {
                                  $bac_ground = "background-color:#525d53;color:white";
                                }
                            ?>
                                <tr class="Myitem" style="<?php echo $bac_ground ?>" id="color_tr<?php echo $sn112 ?>">
                                  <td><?php echo $sn112 ?></td>
                                  <td style="font-weight:bold;"><?php $item_id = $row['item'];
                                                                //select name of item of item id
                                                                $q = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                                                                $q->execute([$item_id]);
                                                                $name = $q->fetchColumn();
                                                                echo $name;

                                                                ?>
                                     <input type="hidden" name="items_id[]" value="<?php echo $item_db_id ?>">
                                    <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                                    <input type="hidden" name="std_sub[]" value="item">
                                  </td>
                                  <td style="display: flex;">

                                    <input style="margin: 5px; padding: 5px;" gradeval="U<?php echo $sn112 ?>" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "U") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> value="U" name="grade[item<?php echo $item_id ?>]" />
                                    <label for="item-U">U</label>
                                    <input style="margin: 5px; padding: 5px;" gradeval="F<?php echo $sn112 ?>" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "F") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> value="F" name="grade[item<?php echo $item_id ?>]" />
                                    <label for="item-F">F</label>
                                    <input style="margin: 5px; padding: 5px;" gradeval="G<?php echo $sn112 ?>" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "G") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> value="G" name="grade[item<?php echo $item_id ?>]" />
                                    <label for="item-G">G</label>
                                    <input style="margin: 5px; padding: 5px;" gradeval="V<?php echo $sn112 ?>" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "V") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> value="V" name="grade[item<?php echo $item_id ?>]" />
                                    <label for="item-V">V</label>
                                    <input style="margin: 5px; padding: 5px;" gradeval="E<?php echo $sn112 ?>" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "E") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> value="E" name="grade[item<?php echo $item_id ?>]" />
                                    <label for="item-E">E</label>
                                    <input style="margin: 5px; padding: 5px;" gradeval="N<?php echo $sn112 ?>" number="<?php echo $sn112 ?>" type="radio" class="myRadio1" <?php if ($grade == "N") {
                                                                                                                                                                              echo "checked";
                                                                                                                                                                            } ?> value="N" name="grade[item<?php echo $item_id ?>]" />
                                    <label for="item-N">N</label>
                                  </td>
                                </tr>
                                <!-- fetch subitem -->
                                <?php
                                $allsubitem = "SELECT * FROM subitem where course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' AND item='$item_id'";
                                $statement = $connect->prepare($allsubitem);
                                $statement->execute();

                                if ($statement->rowCount() > 0) {
                                  $result1 = $statement->fetchAll();
                                  $sn116 = 'a';
                                  foreach ($result1 as $row1) {
                                    $std_subi = $row1['subitem'];
                                    $stud_subi = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                                    $stud_subi->execute([$std_subi]);
                                    $name_sub = $stud_subi->fetchColumn();
                                    $bac_ground1 = "";
                                    $subitem_db_id = $row1['id'];
                                    $fetch_subgrade = $connect->prepare("SELECT grade FROM `subitem_gradesheet` WHERE subitem_id=? AND user_id=?");
                                    $fetch_subgrade->execute([$subitem_db_id, $fetchuser_id]);
                                    $grade1 = $fetch_subgrade->fetchColumn();
                                    if ($grade1 == "U") {
                                      $bac_ground1 = "background-color:#ed4c78;color:white";
                                    }
                                    if ($grade1 == "F") {
                                      $bac_ground1 = "background-color:#f5ca99;color:white";
                                    }
                                    if ($grade1 == "G") {
                                      $bac_ground1 = "background-color:#71869d;color:white";
                                    }
                                    if ($grade1 == "E") {
                                      $bac_ground1 = "background-color:#377dff;color:white";
                                    }

                                    if ($grade1 == "V") {
                                      $bac_ground1 = "background-color:#00c9a7;color:white";
                                    }
                                    if ($grade == "N") {
                                      $bac_ground1 = "background-color:#525d53;color:white";
                                    }
                                ?>
                                    <tr id="color_tr1<?php echo $sn116 . $sn112 ?>" style="<?php echo $bac_ground1 ?>">
                                      <td style="text-align:end;"><?php echo $sn116; ?></td>
                                      <td><span style="margin-left:15px;"><?php echo $sub_value = $name_sub;

                                                                          ?>
                                          <input type="hidden" name="items_id[]" value="<?php echo $subitem_db_id ?>">
                                          <input type="hidden" name="std_idies[]" value="<?php echo $item_id ?>">
                                          <input type="hidden" name="std_sub[]" value="<?php echo $sub_value ?>"></span></td>
                                      <td style="display: flex;">
                                        <input style="margin: 5px; padding: 5px;" type="radio" value="U" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "U") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /><label for="subitem-U">U</label>
                                        <input style="margin: 5px; padding: 5px;" type="radio" value="F" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "F") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /><label for="subitem-F">F</label>
                                        <input style="margin: 5px; padding: 5px;" type="radio" value="G" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "G") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /><label for="subitem-G">G</label>
                                        <input style="margin: 5px; padding: 5px;" type="radio" value="V" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "V") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /><label for="subitem-V">V</label>
                                        <input style="margin: 5px; padding: 5px;" type="radio" value="E" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "E") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /><label for="subitem-E">E</label>
                                        <input style="margin: 5px; padding: 5px;" type="radio" value="N" number="<?php echo $sn116 ?>" number2="<?php echo $sn112 ?>" class="myRadio2" <?php if ($grade1 == "N") {
                                                                                                                                                                                          echo "checked";
                                                                                                                                                                                        } ?> name="grade[<?php echo $sub_value . $item_id ?>]" /><label for="subitem-N">N</label>
                                      </td>
                                    </tr>
                            <?php
                                    $sn116++;
                                  }
                                }
                                $sn112++;
                              }
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>

                      <div class="col-6">

                        <!-- End Quill -->
                        <?php if ($comments != "") { ?>
                          <pre><textarea style="height: 500px; width:auto;" name="comment" placeholder="comments" rows="4" id="comment"><?php echo $comments ?></textarea></pre>
                        <?php } else { ?>
                          <pre><textarea style="height: 500px; width:auto;" name="comment" placeholder="comments" rows="4" id="comment"></textarea></pre>
                        <?php } ?>
                      </div>
                    </div><br>
                    <!--ROwend-->
                    <!--Second row-->
                    <div class="row">
                      <div class="col-lg-6">
                        <center>
                          <?php
                          //  var_dump($over_all_comment != "");
                          if ($over_all_comment != "") { ?>
                            <pre><textarea style="width:500px; margin: 10px; border-radius: 20px;" name="overall_data" placeholder="overall" rows="4" cols="50" id="overall_all_com"><?php echo $over_all_comment ?></textarea></pre><br>
                          <?php } else { ?>
                            <pre><textarea style="width:500px; margin: 10px; border-radius:20px;" name="overall_data" placeholder="overall" rows="4" cols="50" id="overall_all_com"> </textarea></pre><br>

                          <?php } ?>
                          <?php if($role=="instructor"){?>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#additional-training" class="btn btn-outline-success" id="additional_training">Additional Task</button>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#unaccomplish-training" class="btn btn-outline-success" id="Unaccomplish_but">Unaccomplish Task</button>
                            <?php } ?>
                        </center>
                      </div>

                      <div class="col-6">
                        <center>
                          <table>

                            <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#detailsper"><i class="bi bi-info-circle"></i></button>
                            <center>
                              <tr>
                                <?php

                                //fetch overall garde
                                $overall_grade = $connect->prepare("SELECT over_all_grade, over_all_grade_per FROM `gradesheet` WHERE user_id=? and course_id=? AND class_id=? AND phase_id=? AND class=?");
                                $overall_grade->execute([$fetchuser_id, $std_course1, $classid, $phase_id, $class_name]);
                                $fetch_overall_grade = $overall_grade->fetchColumn();

                                ?>

                                <td style="display: flex; text-align: center;">
                                  <?php $grade_per = "";
                                  $que = "SELECT * FROM grade_per";
                                  $stat = $connect->prepare($que);
                                  $stat->execute();
                                  if ($stat->rowCount() > 0) {
                                    $result6 = $stat->fetchAll();
                                    $sn7 = 1;
                                    foreach ($result6 as $row6) {
                                      $grade = $row6['grade'];
                                      if ($row6['permission'] == '1') { ?>
                                        <input style="margin:10px;" type="radio" onclick="return false" class="myRadio" value="<?php echo $grade ?>" <?php if ($fetch_overall_grade == $grade) {
                                                                                                                                                        echo "checked";
                                                                                                                                                      } ?> id="<?php echo $grade ?>" name="overall_grade"><span style="font-weight:bold;" id="<?php echo $grade . '1'; ?>"><?php echo $grade ?></span>
                                      <?PHP } else {
                                      ?>
                                        <input style="margin:10px;" onclick="return false" type="radio" class="myRadio" value="<?php echo $grade ?>" <?php if ($fetch_overall_grade == $grade) {
                                                                                                                                                        echo "checked";
                                                                                                                                                      } ?> id="<?php echo $grade ?>" name="overall_grade"><span style="font-weight:bold;" id="<?php echo $grade . '1'; ?>"><?php echo $grade ?></span>
                                  <?php
                                      }
                                    }
                                  } ?>
                                </td>


                              </tr>
                            </center>

                            <tr>
                              <td>
                                <span id="slider_value" style="color:red; font-size:20px; font-weight:bolder; display:none;"></span>
                                <?php
                                $bac_ground2 = "";
                                if ($fetch_overall_grade == "U") {
                                  $bac_ground2 = "background-color:#ed4c78;color:white;";
                                }
                                if ($fetch_overall_grade == "F") {
                                  $bac_ground2 = "background-color:#f2c99b;color:white;";
                                }
                                if ($fetch_overall_grade == "G") {
                                  $bac_ground2 = "background-color:#71869d;color:white;";
                                }
                                if ($fetch_overall_grade == "E") {
                                  $bac_ground2 = "background-color:#377dff;color:white;";
                                }
                                if ($fetch_overall_grade == "N") {
                                  $bac_ground2 = "background-color:#525d53;color:white;";
                                }
                                if ($fetch_overall_grade == "V") {
                                  $bac_ground2 = "background-color:#00c9a7;color:white;";
                                }
                                if ($fetch_overall_grade != "") { ?>
                                  <input type="hidden" required name="overall_grade_per" id="silder_get_value">
                                  <input type="number" name="overall_grade_per" required style="color:white; text-align: center; font-weight:bold; font-size: large;<?php echo $bac_ground2 ?>" value="<?php echo $over_all_grade_per; ?>" class="form-control check_over_all_per" id="gradesper" onkeyup="displayRadioValue(this.value);" />
                                <?php } else { ?>
                                  <input type="number" name="overall_grade_per" required style="color:black; text-align: center; font-weight:bold; font-size: large;" class="form-control check_over_all_per" id="gradesper" onkeyup="displayRadioValue(this.value);">
                                <?php } ?>

                              </td>
                            </tr>

                            <tr>
                              <td>
                                <center>
                                  <?php
                                  $percentage;
                                  ?></center>
                              </td>
                            </tr>
                            <?php if($role=="instructor"){?>
                            <tr>
                              <td>
                                <center><input type="submit" id="submit_gradsheet_but" class="btn btn-success" name="ins_sub" onclick="return confirm('Are you sure?Once submitted gradsheet will get lock..?')" /></center>
                              </td>
                            </tr>
                            <?php } ?>
                          </table>
                        </center>
        </form>
        <?php

        ?>
      </div>
    </div>
    </div>
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
  <!--unlock modal-->
  <div class="modal fade" id="unlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <H3>Unlock gradesheet</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form>
              <input type="hidden" value="" id="gradesheetid" name="gradesheetid">
              <input class="form-control" type="text" id="check_admin_username" class="login-input" name="username" placeholder="Username" autofocus="true" /><br>
              <input class="form-control" type="password" id="check_admin_password" class="login-input" name="password" placeholder="Password" /><br>
              <input class="btn btn-primary" type="button" value="Check" id="unlock_gradsheet" name="login" class="login-button" />
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="admin_reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <H3>Reset gradesheet</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form action="reset_gradsheet.php" method="post">

              <input type="hidden" value="" id="ins_reset_id" name="ins_reset_id">
              <input type="hidden" value="" id="stu_reset_id" name="stu_reset_id">
              <input type="hidden" value="<?php echo $noti_id ?>" name="noti_id">

              <input type="hidden" name="class_id" value="<?php echo $classid ?>"> <input type="hidden" name="class" value="<?php echo $class_name ?>"> <input type="hidden" name="u_id" value="<?php echo $fetchuser_id ?>">
              <input class="form-control" type="text" class="login-input" name="username" placeholder="Username" autofocus="true" /><br>
              <input class="form-control" type="password" class="login-input" name="password" placeholder="Password" /><br>

              <textarea style="height: 100px; width: 100%; border-radius: 20px;" name="clearReason" placeholder="Reason For Clear..." rows="4" required></textarea>

              <br> <input type="submit" class="btn btn-danger" value="Clear">
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!-- unaccomplish task -->

  <div class="modal fade" id="unaccomplish-training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success">Accomplish Task</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>

            <table class="table table-bordered src-table2" id="selectsubitemtable">
              <input class="form-control" type="text" id="accomplishsearch" onkeyup="accomplish_task()" placeholder="Search for Items" title="Type in a name"><br>
              <thead class="bg-dark">
                <tr>
                  <th class="text-light"><input type="checkbox" id="select-all-subitem"></th>
                  <!-- <th>ID</th> -->
                  <th class="text-light">Name</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $fetch_items = "SELECT item.item
            FROM item
            INNER JOIN item_gradesheet ON item_gradesheet.item_id = item.id where item.course_id='$std_course1' AND item.class_id='$classid' AND item.phase_id='$phase_id' AND item.class='$class_name' and item_gradesheet.user_id='$fetchuser_id' and item_gradesheet.grade='' ";
                $fetch_itemsst = $connect->prepare($fetch_items);
                $fetch_itemsst->execute();
                if ($fetch_itemsst->rowCount() > 0) {
                  $sn_item = 1;
                  $re1 = $fetch_itemsst->fetchAll();
                  foreach ($re1 as $value1) {
                    $item_ides = $value1['item'];
                    $select_itemname = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                    $select_itemname->execute([$item_ides]);
                    $itemname = $select_itemname->fetchColumn();

                ?>
                    <tr>
                      <td> <input type="checkbox" name="add_list_acc[]" id="<?php echo 'item' ?>" value="<?php echo $value1['item'] ?>"></td>
                      <!-- <td style="text-align:end;"><?php echo $sn_item++; ?></td> -->
                      <td><?php echo '<span>' . $itemname . '</span>';

                          ?>
                      </td>

                    </tr>
                <?php }
                }
                ?>
                <?php
                $fetch_subitems = "SELECT subitem.subitem
             FROM subitem INNER JOIN subitem_gradesheet ON subitem_gradesheet.subitem_id = subitem.id where subitem.course_id='$std_course1' AND subitem.class_id='$classid' AND subitem.phase_id='$phase_id' AND subitem.class='$class_name' and subitem_gradesheet.user_id='$fetchuser_id' and subitem_gradesheet.grade='' ";
                $fetch_subitemsst = $connect->prepare($fetch_subitems);
                $fetch_subitemsst->execute();
                if ($fetch_subitemsst->rowCount() > 0) {
                  $sn_subitem = 'a';
                  $re2 = $fetch_subitemsst->fetchAll();
                  foreach ($re2 as $value2) {
                    $std_subi2 = $value2['subitem'];
                    $stud_subi2 = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                    $stud_subi2->execute([$std_subi2]);
                    $name_sub2 = $stud_subi2->fetchColumn();
                ?>
                    <tr>
                      <td> <input type="checkbox" name="add_list_acc[]" id="<?php echo 'subitem' ?>" value="<?php echo $value2['subitem'] ?>"></td>
                      <!-- <td style="text-align:end;"><?php echo $sn_subitem++; ?></td> -->
                      <td><?php echo '<span>' . $name_sub2 . '</span>';

                          ?>
                      </td>

                    </tr>

                <?php }
                }
                ?>
              </tbody>
            </table>
            <div class="modal-footer">



            </div>
            <button type="button" class="btn btn-primary" id="submitaccomplish">Select</button>


          </center>
        </div>
      </div>
    </div>
  </div>


  <!--modal for percentage info-->
  <div class="modal fade" id="detailsper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Percentage</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <table style=" width: max-content;" class="table table-striped">
                        <input style="width:50%; display: none;" class="form-control" type="text" onkeyup="score()" placeholder="Search for name.." title="Type in a name">
                        <thead class="bg-dark">
                            <th class="text-light">Sr No</th>
                            <th class="text-light">Type</th>
                            <th class="text-light">Percentage</th>
                            
                            <th class="text-light">Description</th>
                            
                        </thead>
                        <?php
                        $output6 = "";
                        $query6 = "SELECT * FROM percentage  ORDER BY id ASC";
                        $statement6 = $connect->prepare($query6);
                        $statement6->execute();
                        if ($statement6->rowCount() > 0) {
                            $result6 = $statement6->fetchAll();
                            $sn6 = 1;
                            foreach ($result6 as $row6) {
                        ?>
                                <tr>
                                    <td><?php echo $id = $row6['id']; ?></td>
                                    <td><h6 style="color:<?php echo $row6['color']; ?>"><?php echo $row6['percentagetype']; ?></h6></td>
                                    <td><?php echo $row6['percentage']; ?></td>
                                    
                                    <td><?php echo $row6['description']; ?></td>
                                    
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
          </center>
        </div>
      </div>
    </div>
  </div>


  <!--Additional Training modal-->

  <div class="modal fade" id="additional-training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Additional Item</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered src-table1" id="itemtablesearch">
            <input class="form-control" type="text" id="additionalsearch" onkeyup="additional_task()" placeholder="Search for Item.." title="Type in a name"><br>
            <thead class="bg-dark">
              <tr>
                <th class="text-light"><input type="checkbox" id="select-all"></th>
                <!-- <th class="text-light">Id</th> -->
                <th class="text-light">Item</th>

              </tr>
            </thead>
            <tbody>
              <?php
              //fetch item
              $allitem1_a = "SELECT * FROM itembank";
              $statement1_a = $connect->prepare($allitem1_a);
              $statement1_a->execute();

              if ($statement1_a->rowCount() > 0) {
                $result1_a = $statement1_a->fetchAll();
                $sn = 1;
                foreach ($result1_a as $row1) { ?>
                  <tr>
                    <td> <input type="checkbox" name="add_list[]" id="<?php echo 'item' ?>" value="<?php echo $row1['id'] ?>"></td>
                    <!-- <td><?php echo $sn++ ?></td> -->
                    <td><?php echo $item_id1_a = $row1['item'];

                        ?>

                    </td>
                  </tr>
                  <!-- fetch subitem -->
              <?php
                }
              }
              ?>
              <?php
              $allsubitem1_a = "SELECT * FROM sub_item";
              $statement2_a = $connect->prepare($allsubitem1_a);
              $statement2_a->execute();

              if ($statement2_a->rowCount() > 0) {
                $result2_a = $statement2_a->fetchAll();
                $sn1 = 'a';
                foreach ($result2_a as $row2) {
                  $std_subi1_a = $row2['id'];
                  $name_sub1_a = $row2['subitem'];
              ?>
                  <tr>
                    <td> <input type="checkbox" name="add_list[]" id="<?php echo 'subitem' ?>" value="<?php echo $row2['id'] ?>"></td>

                    <!-- <td style="text-align:end;"><?php echo $sn1++; ?></td> -->
                    <td><?php echo '<span>' . $name_sub1_a . '</span>';

                        ?>
                    </td>

                  </tr>
              <?php
                }
              } ?>



            </tbody>

          </table>

          <button style="float:right;" type="button" class="btn btn-primary" id="submitadditional">Select</button>

          <!-- End Tab Content -->

        </div>
      </div>
    </div>
  </div>

  <!-- add notification for permission of grade -->
  <div class="modal fade" id="confrim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ask for permission?</h5>
          <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="grade_notification.php">

            <input type="hidden" name="grade" value="" id="gradeid">
            <input type="hidden" name="gradeuserid" value="" id="gradeuserid">
            <input type="hidden" name="ins_id" value="" id="ins_id">
            <button class="btn btn-success" type="submit" name="savephase">Yes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->


  <script src="<?php echo BASE_URL; ?>assets/tinymce/tinymce.min.js"></script>

  <!-- Include the Quill library -->
    <!-- <script src="<?php echo BASE_URL;?>assets/vendor/quill/dist/quill.min.js"></script> -->

    <script>
    tinymce.init({
      selector: '#comment',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | emoticons charmap',
      menubar: false,
      textcolor_map: [
        "000000", "Black",
        "FF0000", "Red",
        "00FF00", "Green",
        "0000FF", "Blue"
      ],
      color_picker_callback: function(callback, value, meta) {
        if (meta === 'forecolor') {
          tinymce.activeEditor.windowManager.openUrl({
            title: 'Select Text Color',
            url: 'color_picker.html', // Replace with your custom color picker URL
            onMessage: function(instance, message) {
              callback(message.color);
            }
          });
        } else if (meta === 'backcolor') {
          tinymce.activeEditor.windowManager.openUrl({
            title: 'Select Background Color',
            url: 'color_picker.html', // Replace with your custom color picker URL
            onMessage: function(instance, message) {
              callback(message.color);
            }
          });
        }
      }
    });
  </script>

    <!-- Initialize Quill editor -->
   <!--  <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            
            
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
             // text direction
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean'] // remove formatting button
        ];

        var quill = new Quill('#comment', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    </script> -->
  <script type='text/javascript'>
    $('.myRadio1').change(function() {
      // var gradeval = $(this).attr('gradeval');
      var number = $(this).attr('number');
      var name = $(this).attr('name');

      selected_value = $("input[name='" + name + "']:checked").val();

      if (selected_value == "U") {
        $('#color_tr' + number).css("background-color", "#ed4c78");
        $('#color_tr' + number).css("color", "white");
      }
      if (selected_value == "F") {
        $('#color_tr' + number).css("background-color", "#f5ca99");
        $('#color_tr' + number).css("color", "white");
      }
      if (selected_value == "G") {
        $('#color_tr' + number).css("background-color", "#71869d");
        $('#color_tr' + number).css("color", "white");
      }
      if (selected_value == "V") {
        $('#color_tr' + number).css("background-color", "#00c9a7");
        $('#color_tr' + number).css("color", "white");
      }
      if (selected_value == "E") {
        $('#color_tr' + number).css("background-color", "#377dff");
        $('#color_tr' + number).css("color", "white");
      }

      if (selected_value == "N") {
        $('#color_tr' + number).css("background-color", "white");
        $('#color_tr' + number).css("color", "black");
      }

    });


    $('.myRadio2').change(function() {
      var number = $(this).attr('number');
      var number2 = $(this).attr('number2');
      var name = $(this).attr('name');

      selected_value = $("input[name='" + name + "']:checked").val();
      if (selected_value == "U") {
        $('#color_tr1' + number + number2).css("background-color", "#ed4c78");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "F") {
        $('#color_tr1' + number + number2).css("background-color", "#f5ca99");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "G") {
        $('#color_tr1' + number + number2).css("background-color", "#71869d");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "V") {
        $('#color_tr1' + number + number2).css("background-color", "#00c9a7");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "E") {
        $('#color_tr1' + number + number2).css("background-color", "#377dff");
        $('#color_tr1' + number + number2).css("color", "white");
      }
      if (selected_value == "N") {
        $('#color_tr1' + number + number2).css("background-color", "white");
        $('#color_tr1' + number + number2).css("color", "black");
      }

    });
  </script>

  <script>
    function formatNumber(input) {
      // Format the number with dots
      input.value = input.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
  </script>
  <?php
  $lock1 = "SELECT * FROM gradesheet where user_id='$fetchuser_id' and course_id='$std_course1' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name'";
  $lock1st = $connect->prepare($lock1);
  $lock1st->execute();
  if ($lock1st->rowCount() > 0) {
    $re1 = $lock1st->fetchAll();
    foreach ($re1 as $row1) {
      if ($row1['status'] == '1') { ?>
        <script>
          $(document).ready(function() {
            $(".myRadio").attr('disabled', true);
            $(".myRadio1").attr('disabled', true);
            $(".myRadio2").attr('disabled', true);
            $("#gradesper").attr('disabled', true);
            $("#instructor").attr('disabled', true);
            $("#vechile_dropdown").attr('disabled', true);
            $("#time_filled").attr('disabled', true);
            $("#date_filled").attr('disabled', true);
            $("#submit_gradsheet_but").attr('disabled', true);
            $("#gradesper1").attr('disabled', true);
            $("#gradesper").attr('disabled', true);
            $("#overall_all_com").attr('disabled', true);
            $("#comment").attr('disabled', true);
            $("#duration-hours").attr('disabled', true);
            $("#duration-minutes").attr('disabled', true);
            $("#f_form").attr('disabled', true);
          });
        </script>
    <?php }
    }
  } else { ?>
    <script>
      $("#additional_training").attr('disabled', true);
      $("#Unaccomplish_but").attr('disabled', true);
    </script>
  <?php }
  ?>


  <script>
    function genCharArray(charA, charZ) {
      var a = [],
        i = charA.charCodeAt(0),
        j = charZ.charCodeAt(0);
      for (; i <= j; ++i) {
        a.push(String.fromCharCode(i));
      }
      return a;
    }
    $(document).on("click", "#unlock_gradsheet", function() {
      var gradesheetid = $("#gradesheetid").val();
      check_admin_username = $("#check_admin_username").val();
      check_admin_password = $("#check_admin_password").val();
      if (check_admin_username == "") {
        alert("enter admin username");
      }
      if (check_admin_password == "") {
        alert("enter admin password");
      }

      $.ajax({
        type: 'POST',
        url: 'unlock_admin_gradsheet.php',
        data: 'gradesheetid=' + gradesheetid + '&check_admin_username=' + check_admin_username + '&check_admin_password=' + check_admin_password,
        success: function(response) {
          alert(response);
          window.location.reload();
        }
      });

    });
    // 	$(document).load(function() {
    //     event.preventDefault();
    // });
    $("#user_Data_table").on("change", "#instructor", function() {

      var ins = $(this).val();
      var std = $("#get_std_id").val();
      var class_name = $("#class_name").val();
      var class_id = $("#class_id").val();

      if (ins) {
        $.ajax({
          type: 'GET',
          url: 'insert_notification_instructor.php',
          data: 'ins=' + ins + '&std=' + std + '&class_name=' + class_name + '&class_id=' + class_id,
          success: function(response) {
            // alert(response);
            window.location.reload();

          }
        });
      }
    });
    $(document).on("click", "#Ask_to_unlock", function() {
      var ins = $("#session_id").val();
      var std = $("#get_std_id").val();
      var class_name = $("#class_name").val();
      var class_id = $("#class_id").val();
      if (ins) {
        $.ajax({
          type: 'POST',
          url: 'insert_unlock_noti.php',
          data: 'ins=' + ins + '&std=' + std + '&class_name=' + class_name + '&class_id=' + class_id,
          success: function(response) {
            alert(response);
            window.location.reload();

          }
        });
      }
    });


    $(document).on("click", "#submitadditional", function() {
      // alert("hello");
      var gradesper = $("#gradsheet_get_id").val();
      var std_id = $("#stud_db_id").val();
      var rows = "";
      var names = "";
      var id = "";
      var values = $('input[name="add_list[]"]').val();
      var arr = [];
      $('input[name="add_list[]"]:checked').each(function() {
        arr.push({
          name: this.value,
          ides: this.id
        });
      });
      // console.log(arr);
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "add_additional_task.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id + '&grad_id=' + gradesper + '&std_id=' + std_id,
          success: function(data) {

            $('input[name="add_list[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    });

    $(document).on("click", "#submitaccomplish", function() {

      var gradesper = $("#gradsheet_get_id").val();
      var std_id = $("#stud_db_id").val();
      var rows = "";
      var names = "";
      var id = "";
      var values = $('input[name="add_list_acc[]"]').val();
      var arr = [];
      $('input[name="add_list_acc[]"]:checked').each(function() {
        arr.push({
          name: this.value,
          ides: this.id
        });
      });
      // console.log(arr);
      for (i = 0; i < arr.length; ++i) {
        names = arr[i]['name'];
        id = arr[i]['ides'];
        $.ajax({
          url: "add_accomplish_task.php",
          method: "POST",
          data: 'values=' + names + '&id=' + id + '&grad_id=' + gradesper + '&std_id=' + std_id,
          success: function(data) {
            $('input[name="add_list_acc[]"]').prop('checked', false);
            window.location.reload();
          }
        });
      }
    });
  </script>
  <!-- <script src="loading.js"></script> -->
  <!-- <script>
  $(document).ajaxStart(function() {
    $("#loading-screen").show();
    $("#content").hide();
    $("#header-hide").hide();
  });
  $(document).ajaxStop(function() {
    $("#loading-screen").hide();
    $("#content").show();
    $("#header-hide").show();
  });
</script> -->
  <script>
    $(document).ready(function() {
      $('#U').change(function() {
        $('#dummyModal').modal('show');
      });
      $('#gradesper').on('change', function() {
        var inst_id = $(this).val();
        // console.log(inst_id);
        if (inst_id) {
          $('#silder_get_value').val(inst_id);
        }
      });
      $("#radio").on('click', '#rembtn', function() {
        $(this).closest('tr').remove();
      });

      $("#radio").on('click', '#rembtn1', function() {
        $(this).closest('tr').remove();
      });

      $("#radio").on('click', '#rembtn2', function() {
        $(this).closest('tr').remove();
      });

    });
  </script>

  <!--Search for additional training-->
  <script>
    function item() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("itemsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("itemtablesearch");
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
    function accomplish_task() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("accomplishsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("selectsubitemtable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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
    function additional_task() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("additionalsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("itemtablesearch");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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
    document.getElementById('select-all').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    document.getElementById('select-all-item').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script>
    document.getElementById('select-all-subitem').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <!--check uncheck code for item grades-->
  <script>
    document.querySelectorAll(
      'input[type=radio]').forEach((elem) => {
      elem.addEventListener('click', allowUncheck);
      // only needed if elem can be pre-checked
      elem.previous = elem.checked;
    });

    function allowUncheck(e) {
      if (this.previous) {
        this.checked = false;
      }
      // need to update previous on all elements of this group
      // (either that or store the id of the checked element)
      document.querySelectorAll(
        `input[type=radio][type=${this.type}]`).forEach((elem) => {
        elem.previous = elem.checked;
      });
    }
  </script>


  <script>
    $(document).on("keyup", "#gradesper", function() {
      var val = $(this).val();
      if (val >= 101) {
        alert("enter marks under 100..");
        $("#submit_gradsheet_but").attr('disabled', true);
      } else {
        $("#submit_gradsheet_but").attr('disabled', false);
      }
      if (val) {
        $.ajax({
          type: 'POST',
          url: '../fetch_mark_color.php',
          data: 'val=' + val,
          success: function(response) {

            if (response == "U") {
              document.querySelector('#U').checked = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#U1').style.color = '#ed4c78';
              document.querySelector('#U1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#ed4c78';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "F") {
              document.querySelector('#F').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#F1').style.color = '#f5ca99';
              document.querySelector('#F1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#f5ca99';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "G") {
              document.querySelector('#G').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#G1').style.color = '#71869d';
              document.querySelector('#G1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#71869d';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "V") {
              document.querySelector('#V').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#V1').style.color = '#00c9a7';
              document.querySelector('#V1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#00c9a7';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "E") {
              document.querySelector('#E').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#N').readOnly = true;
              document.querySelector('#E1').style.color = '#377dff';
              document.querySelector('#E1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = '#377dff';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
            if (response == "N") {
              document.querySelector('#N').checked = true;
              document.querySelector('#U').readOnly = true;
              document.querySelector('#G').readOnly = true;
              document.querySelector('#V').readOnly = true;
              document.querySelector('#F').readOnly = true;
              document.querySelector('#E').readOnly = true;
              document.querySelector('#N1').style.color = 'black';
              document.querySelector('#N1').style.fontSize = 'larger';
              document.querySelector("#gradesper").style.backgroundColor = 'black';
              document.querySelector("#gradesper").style.fontSize = 'larger';
              document.querySelector("#gradesper").style.fontWeight = 'bolder';
            }
          }
        });
      }
    });
  </script>

  <!-- <script>
    tinymce.init({
      selector: '#comment',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | emoticons charmap',
      menubar: false,
      textcolor_map: [
        "000000", "Black",
        "FF0000", "Red",
        "00FF00", "Green",
        "0000FF", "Blue"
      ],
      color_picker_callback: function(callback, value, meta) {
        if (meta === 'forecolor') {
          tinymce.activeEditor.windowManager.openUrl({
            title: 'Select Text Color',
            url: 'color_picker.html', // Replace with your custom color picker URL
            onMessage: function(instance, message) {
              callback(message.color);
            }
          });
        } else if (meta === 'backcolor') {
          tinymce.activeEditor.windowManager.openUrl({
            title: 'Select Background Color',
            url: 'color_picker.html', // Replace with your custom color picker URL
            onMessage: function(instance, message) {
              callback(message.color);
            }
          });
        }
      }
    });
  </script> -->

  
 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>