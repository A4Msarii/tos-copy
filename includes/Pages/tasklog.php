<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$clclass = "";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Task Log</title>
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
    $actclass = "";
    $simclass = "";
    $academicclass = "";
    $in = "";
    $class = $_REQUEST['class'];
    $q2 = "SELECT * FROM users where role='instructor'";
    $st2 = $connect->prepare($q2);
    $st2->execute();

    if ($st2->rowCount() > 0) {
      $re2 = $st2->fetchAll();
      foreach ($re2 as $row2) {
        $in .= '<option value="' . $row2['id'] . '">' . $row2['name'] . '</option>';
      }
    }

    $q3 = "SELECT * FROM actual where ctp='$std_course1'";
    $st3 = $connect->prepare($q3);
    $st3->execute();
    if ($st3->rowCount() > 0) {
      $re3 = $st3->fetchAll();
      foreach ($re3 as $row3) {
        $actclass .= '<option value="' . $row3['id'] . '" class="actual" id="">' . $row3['symbol'] . '</option>';
      }
    }

    $q4 = "SELECT * FROM sim where ctp='$std_course1'";
    $st4 = $connect->prepare($q4);
    $st4->execute();
    if ($st4->rowCount() > 0) {
      $re4 = $st4->fetchAll();
      foreach ($re4 as $row4) {
        $simclass .= '<option value="' . $row4['id'] . '" class="sim" id="">' . $row4['shortsim'] . '</option>';
      }
    }
    $q9 = "SELECT * FROM clone_class where std_id='$fetchuser_id' and class_name='actual'";
    $st9 = $connect->prepare($q9);
    $st9->execute();
    if ($st9->rowCount() > 0) {
      $re9 = $st9->fetchAll();
      foreach ($re9 as $row9) {
        $a_ides = $row9['class_id'];
        $clas_c_ac = $connect->prepare("SELECT symbol FROM `actual` WHERE id=?");
        $clas_c_ac->execute([$a_ides]);
        $get_c_a = $clas_c_ac->fetchColumn();

        $clclass .= '<option value="' . $row9['class_id'] . '" class="actual" id="' . $row9['cloned_id'] . '">' . $get_c_a . '-C' . $row9['cloned_id'] . '</option>';
      }
    }
    $clclass1 = "";
    $q10 = "SELECT * FROM clone_class where std_id='$fetchuser_id' and class_name='sim'";
    $st10 = $connect->prepare($q10);
    $st10->execute();
    if ($st10->rowCount() > 0) {
      $re10 = $st10->fetchAll();
      foreach ($re10 as $row10) {
        $a_ides = $row10['class_id'];
        $clas_c_si = $connect->prepare("SELECT shortsim FROM `sim` WHERE id=?");
        $clas_c_si->execute([$a_ides]);
        $get_c_s = $clas_c_si->fetchColumn();

        $clclass1 .= '<option value="' . $row10['class_id'] . '" class="sim" id="' . $row10['cloned_id'] . '">' . $get_c_s . '-C' . $row10['cloned_id'] . '</option>';
      }
    }


    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">
          <img style="height:25px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Task_Log.png">
          Task Log
        </h1>
      </div>
      <!-- End Page Header -->
    </div>

    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="background-color:black;">
              <h3 class="text-white">Unaccomplish Task</h3>
            </div>
            <!-- End Header -->
            <!-- Body -->
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover" id="acc_form">
                <?php
                $get_ins_name1 = "";
                $get_datess = "";
                $cloned_ides = "";
                $res_cll_name = "";
                $added_cls_name2 = "";
                $query_acc = "SELECT * FROM accomplish_task where Stud_ac='$fetchuser_id'";
                $statement_acc = $connect->prepare($query_acc);
                $statement_acc->execute();
                if ($statement_acc->rowCount() > 0) {
                  $result_acc = $statement_acc->fetchAll();
                  $sn = 1;
                  foreach ($result_acc as $row) {
                    $id_ac = $row['ac_id'];
                    $item_acc = $row['Item_ac'];
                    $type1 = $row['Type'];
                    $g_id1 = $row['gradsheet_id'];

                    if ($type1 == 'item') {
                      $it_name = $connect->prepare("SELECT item FROM itembank WHERE id=?");
                    } else if ($type1 == 'subitem') {
                      $it_name = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                    }
                    $it_name->execute([$item_acc]);
                    $fetchname = $it_name->fetchColumn();

                    $query5 = "SELECT * FROM gradesheet WHERE id='$g_id1'";
                    $statement5 = $connect->prepare($query5);
                    $statement5->execute();
                    $result5 = $statement5->fetchAll();
                    foreach ($result5 as $row3) {
                      $inst = $row3['instructor'];
                      $class_table = $row3['class'];
                      $cls_name2 = $row3['class_id'];
                      $g_date = $row3['date'];
                    }
                    $added_ins_name = $connect->prepare("SELECT name FROM `users` WHERE id=?");
                    $added_ins_name->execute([$inst]);
                    $get_ins_name = $added_ins_name->fetchColumn();
                    if ($class_table == "actual") {
                      $c_name2 = $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                    } else if ($class_table == "sim") {
                      $c_name2 = $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                    }
                    $c_name2->execute([$cls_name2]);
                    $classs2 = $c_name2->fetchColumn();

                    $cloned_ides = $row['clone_id'];


                    $class_tab = $row['assign_class_table'];
                    $class_idd = $row['assign_class'];
                    if ($cloned_ides == "") {
                      $classs_name1 = $classs2;
                    } else {
                      $classs_name1 = $classs2 . ' - C' . $cloned_ides;
                    }
                    $assi_cls = $row['assign_class'];
                    $assi_cls_table = $row['assign_class_table'];
                    $assi_val = $row['assign_class_table_cloneid'];
                    $res_cll_name = "";
                    $get_ins_name1 = "";
                    $get_datess = "";
                    if ($assi_cls != "") {
                      if ($assi_cls_table == "actual") {
                        $added_cls_name2 = $connect->prepare("SELECT symbol FROM `actual` WHERE id=?");
                      }
                      if ($assi_cls_table == "sim") {
                        $added_cls_name2 = $connect->prepare("SELECT shortsim FROM `sim` WHERE id=?");
                      }
                      $added_cls_name2->execute([$assi_cls]);
                      $get_cls_name2 = $added_cls_name2->fetchColumn();
                      if ($row['assign_class'] != "" && $assi_val == "") {
                        $assi_val = "";
                        $res_cll_name = $get_cls_name2;
                      } else if ($row['assign_class'] != "" && $assi_val != "") {
                        $res_cll_name = $get_cls_name2 . '-C' . $assi_val;
                      }
                    }

                ?>

                    <tr>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="task">Task</label>
                        <input readonly class="form-control text-dark" value="<?php echo $fetchname ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Class">Class</label>
                        <input readonly class="form-control text-dark" value="<?php echo $classs_name1; ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Instructor">Instructor</label>
                        <input readonly class="form-control text-dark" value="<?php echo $get_ins_name ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Date">Date</label>
                        <input readonly class="form-control text-dark" value="<?php echo $g_date ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Instructor">Class</label>
                        <a href="<?php echo BASE_URL; ?>includes/Pages/acc_task_delete.php?accId=<?php echo $id_ac; ?>" style="color:red;"><i class="bi bi-x-circle"></i></a>
                        <input readonly class="form-control text-dark" value="<?php echo $res_cll_name ?>" style="background-color: #bfcfe09e;" />

                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Instructor">Instructor</label>
                        <?php
                        if ($row['assign_class'] != "" && $row['assign_class_table_cloneid'] == "") {
                          $sel_val = $connect->prepare("SELECT users.name FROM `users`
                        INNER JOIN gradesheet ON gradesheet.instructor = users.id where gradesheet.class='$class_tab' and gradesheet.class_id='$class_idd' and gradesheet.user_id='$fetchuser_id'");
                          $sel_val->execute();
                          $get_ins_name1 = $sel_val->fetchColumn();
                        }
                        if ($row['assign_class'] != "" && $row['assign_class_table_cloneid'] != "") {
                          $cl_id = $row['assign_class_table_cloneid'];
                          $sel_val = $connect->prepare("SELECT users.name FROM `users`
                        INNER JOIN cloned_gradesheet ON cloned_gradesheet.instructor = users.id where cloned_gradesheet.class='$class_tab' and cloned_gradesheet.class_id='$class_idd' and cloned_gradesheet.user_id='$fetchuser_id' and cloned_gradesheet.cloned_id='$cl_id'");
                          $sel_val->execute();
                          $get_ins_name1 = $sel_val->fetchColumn();
                        }
                        ?>
                        <input type="text" readonly class="form-control text-dark" name="Instructor_ac" readonly value="<?php echo $get_ins_name1 ?>">
                      </td>
                      <td>
                        <?php
                        if ($row['assign_class'] != "" && $row['assign_class_table_cloneid'] == "") {
                          $get_date = $connect->prepare("SELECT date FROM `gradesheet` WHERE class='$class_tab' and class_id='$class_idd' and user_id='$fetchuser_id'");
                          $get_date->execute();
                          $get_datess = $get_date->fetchColumn();
                        } else if ($row['assign_class'] != "" && $row['assign_class_table_cloneid'] != "") {
                          $get_date = $connect->prepare("SELECT date FROM `cloned_gradesheet` WHERE class='$class_tab' and class_id='$class_idd' and user_id='$fetchuser_id' and cloned_id='$cl_id'");
                          $get_date->execute();
                          $get_datess = $get_date->fetchColumn();
                        }
                        ?>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Date">Date</label>
                        <input class="form-control text-dark" readonly type="date" value="<?php echo $get_datess ?>" name="date_ac" />
                      </td>
                      <?php if (isset($_SESSION['permission']) && $permission['delete_task'] == "1") { ?>
                        <td>
                          <center>

                            <a href="acc_task_delete.php?id=<?php echo $id_ac ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                          </center>
                        </td>
                      <?php } ?>
                    </tr>
                    <!-- </form> -->
                <?php
                  }
                } ?>
              </table>


              <br>
              <!-- <center>
						    <input style="width:max-content;width:30%;" type="submit" name="save" class="btn btn-success" value="save">
						  </center> -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <!--Second row-->
      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="background-color:#790579;">
              <h3 class="text-white">Additional Task</h3>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <div id="info-tasklog1">
                <?php
                // error message 
                if (isset($_REQUEST['error1'])) {
                  $error = $_REQUEST['error1'];
                  echo $error;
                } ?></div>
              <table class="table table-striped table-bordered" id="additional_task">
                <?php
                $get_ins_name1 = "";
                $get_datess1 = "";
                $query_add = "SELECT * FROM additional_task where Stud_id='$fetchuser_id'";
                $statement_Add = $connect->prepare($query_add);
                $statement_Add->execute();
                if ($statement_Add->rowCount() > 0) {
                  $result_add = $statement_Add->fetchAll();
                  $sn = 1;
                  foreach ($result_add as $rows) {
                    $ides = $rows['ad_id'];
                    $item_name = $rows['Item'];
                    $type = $rows['type'];
                    $g_id = $rows['gradesheet_id'];
                    if ($type == 'item') {
                      $it_name1 = $connect->prepare("SELECT item FROM itembank WHERE id=?");
                    } else if ($type == 'subitem') {
                      $it_name1 = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                    }
                    $it_name1->execute([$item_name]);
                    $fetchname1 = $it_name1->fetchColumn();
                    $query89 = "SELECT * FROM gradesheet WHERE id=?";
                      $statement89 = $connect->prepare($query89);
                      $statement89->execute([$g_id]);
                      $rows89 = $statement89->fetchAll();

                      foreach ($rows89 as $row89) {
                          $inst_name = $row89['instructor'];
                          $cls_table = $row89['class'];
                          $cls_name = $row89['class_id'];
                          $date = $row89['date'];}
                    if ($cls_table == "actual") {
                      $c_name2 = $connect->prepare("SELECT symbol FROM actual WHERE id=?");
                    } else if ($cls_table == "sim") {
                      $c_name2 = $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                    }
                    $c_name2->execute([$cls_name]);
                    $classs2 = $c_name2->fetchColumn();
                    $cloned_ides = "";
                    $cloned_ides = $rows['clone_id'];
                    if ($cloned_ides == "") {
                      $classs_name = $classs2;
                    } else {
                      $classs_name = $classs2 . ' - C' . $cloned_ides;
                    }
                    $in_name = $connect->prepare("SELECT name FROM users WHERE id=?");
                    $in_name->execute([$inst_name]);
                    $inst1 = $in_name->fetchColumn();
                    $res_cll_name1 = "";
                    $added_cls_name12 = "";
                    $get_ins_name1 = "";
                    $assi_cls1 = $rows['assign_class'];
                    $assi_cls_table1 = $rows['assign_class_table'];
                    $assi_val = $rows['assign_class_table_cloneid'];
                    if ($assi_cls1 != "") {
                   if ($assi_cls_table1 == "actual") {
                      $added_cls_name12 = $connect->prepare("SELECT symbol FROM `actual` WHERE id=?");
                    }
                    if ($assi_cls_table1 == "sim") {
                      $added_cls_name12 = $connect->prepare("SELECT shortsim FROM `sim` WHERE id=?");
                    }
                    $added_cls_name12->execute([$assi_cls1]);
                    $get_cls_name12 = $added_cls_name12->fetchColumn();
                 
                      
                    if ($rows['assign_class'] != "" && $assi_val == "") {
                      $assi_val = "";
                      $res_cll_name1 = $get_cls_name12;
                    } else if ($rows['assign_class'] != "" && $assi_val != "") {
                      $res_cll_name1 = $get_cls_name12 . '-C' . $assi_val;
                    }
                  }
                    if ($rows['assign_class'] != "" && $rows['assign_class_table_cloneid'] == "") {
                      $sel_val = $connect->prepare("SELECT users.name FROM `users`
                                  INNER JOIN gradesheet ON gradesheet.instructor = users.id where gradesheet.class='$assi_cls_table1' and gradesheet.class_id='$assi_cls1' and gradesheet.user_id='$fetchuser_id'");
                      $sel_val->execute();
                      $get_ins_name1 = $sel_val->fetchColumn();
                    }
                    if ($rows['assign_class'] != "" && $rows['assign_class_table_cloneid'] != "") {
                      $cl_id = $rows['assign_class_table_cloneid'];
                      $sel_val = $connect->prepare("SELECT users.name FROM `users`
                                  INNER JOIN cloned_gradesheet ON cloned_gradesheet.instructor = users.id where cloned_gradesheet.class='$assi_cls_table1' and cloned_gradesheet.class_id='$assi_cls1' and cloned_gradesheet.user_id='$fetchuser_id' and cloned_gradesheet.cloned_id='$cl_id'");
                      $sel_val->execute();
                      $get_ins_name1 = $sel_val->fetchColumn();
                    }
                    $get_datess1 = "";
                 
                    if ($rows['assign_class'] != "" && $rows['assign_class_table_cloneid'] == "") {
                      $get_date = $connect->prepare("SELECT date FROM `gradesheet` WHERE class='$assi_cls_table1' and class_id='$assi_cls1' and user_id='$fetchuser_id'");
                      $get_date->execute();
                      $get_datess1 = $get_date->fetchColumn();
                    } else if ($rows['assign_class'] != "" && $rows['assign_class_table_cloneid'] != "") {
                      $get_date = $connect->prepare("SELECT date FROM `cloned_gradesheet` WHERE class='$assi_cls_table1' and class_id='$assi_cls1' and user_id='$fetchuser_id' and cloned_id='$cl_id'");
                      $get_date->execute();
                      $get_datess1 = $get_date->fetchColumn();
                    }
               
                ?>
                    <tr>
                      <td>

                        <label style="font-weight:bold;" class="form-label text-dark" for="Task">Task</label>
                        <input readonly class="form-control text-danger" value="<?php echo $fetchname1 ?>" style="background-color: #bfcfe09e; font-weight: bold; font-size:large;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Class">Class</label>
                        <input readonly class="form-control text-dark" value="<?php echo $classs_name; ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Instructor">Instructor</label>
                        <input readonly class="form-control text-dark" type="" value="<?php echo $inst1; ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Date">Date</label>
                        <input readonly class="form-control text-dark" value="<?php echo $date ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Class">Class</label>
                        <a href="<?php echo BASE_URL; ?>includes/Pages/acc_task_delete.php?addId=<?php echo $ides; ?>" style="color:red;"><i class="bi bi-x-circle"></i></a>
                        <input readonly class="form-control text-dark" value="<?php echo $res_cll_name1 ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Class">Instructor</label>
                        <input readonly class="form-control text-dark" value="<?php echo $get_ins_name1 ?>" style="background-color: #bfcfe09e;" />
                      </td>
                      <td>
                        <label style="font-weight:bold;" class="form-label text-dark" for="Class">Date</label>
                        <input readonly class="form-control text-dark" value="<?php echo $get_datess1 ?>" style="background-color: #bfcfe09e;" />
                       </td>
                      <?php if (isset($_SESSION['permission']) && $permission['delete_task'] == "1") { ?>
                        <td>
                          <center>
                            <a href="add_task_delete.php?id=<?php echo $ides ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                          </center>
                        </td>
                      <?php } ?>
                    </tr>
                <?php  }
                } ?>
              </table>

            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
    </div>
    <!-- End Content -->


  </main>


  <!--Edit accom class modal-->
  <div class="modal fade" id="editacc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Unaccomplish Task</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action=".php">
            <input type="hidden" class="form-control text-dark" name="id" value="" id="actual_edit_id" readonly>
            <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Instructor :</label>
            <input type="text" class="form-control text-dark" name="actual" value="" id="actual1">
            <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Class :</label>
            <input type="text" class="form-control text-dark" name="symbol" value="" id="symbol">
            <br>
            <input class="btn btn-success" type="submit" name="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Edit accom class modal-->
  <div class="modal fade" id="editadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Additional Task</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action=".php">
            <input type="hidden" class="form-control text-dark" name="id" value="" id="actual_edit_id" readonly>
            <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Instructor :</label>
            <input type="text" class="form-control text-dark" name="actual" value="" id="actual1">
            <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Class :</label>
            <input type="text" class="form-control text-dark" name="symbol" value="" id="symbol">
            <br>
            <input class="btn btn-success" type="submit" name="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $("#acc_form").on("change", "select", function() {
      var t = $(this).attr('id');
      var class_ides = $(this).val();
      var class_table = $(this).children(":selected").attr("class");
      var class_cl = $(this).children(":selected").attr("id");
      if (class_cl) {
        $.ajax({
          type: 'GET',
          url: 'insert_accomplish2.php',
          data: 'id=' + t + '&class_id=' + class_ides + '&class_table=' + class_table + '&class_cl=' + class_cl,
          success: function(response) {
            // console.log(response);
            window.location.reload();

          }
        });
      } else {
        $.ajax({
          type: 'GET',
          url: 'insert_accomplish1.php',
          data: 'id=' + t + '&class_id=' + class_ides + '&class_table=' + class_table,
          success: function(response) {

            window.location.reload();

          }
        });
      }
    });

    $("#additional_task").on("change", "select", function() {
      var t1 = $(this).attr('id');
      var class_ides = $(this).val();
      var class_table = $(this).children(":selected").attr("class");
      var class_cl = $(this).children(":selected").attr("id");
      if (class_cl) {
        $.ajax({
          type: 'GET',
          url: 'insert_additional2.php',
          data: 'id=' + t1 + '&class_id=' + class_ides + '&class_table=' + class_table + '&class_cl=' + class_cl,
          success: function(response) {
            //console.log(response);
            window.location.reload();

          }
        });
      } else {
        $.ajax({
          type: 'GET',
          url: 'insert_additional1.php',
          data: 'id=' + t1 + '&class_id=' + class_ides + '&class_table=' + class_table,
          success: function(response) {
            //console.log(response);
            window.location.reload();

          }
        });
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