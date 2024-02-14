<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$items = "";
$course_ides = "";
$class_ides = "";
$phase_ides = "";
$classes = "";
$item_ides = "";

$get_class_name = "";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Emergency Log</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>


<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>



  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';

    ?>
  </div>
  <!--Fetching item info in this container-->
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;display: flex;">
          <a class="btn btn-soft-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" style="color:black; text-decoration:none;" href="emergency_data.php"><i class="bi bi-arrow-left"></i></a>
          <h1 class="text-success">
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Emergancy_Log.png">
            Emergency Log
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
            <div class="card-header card-header-content-between">
              <input class="form-control" type="hidden" name="stud_db_id" value="<?php echo $fetchuser_id ?>">
              <input class="form-control" type="hidden" name="class_name" value="<?php echo $class_name ?>">
              <?php include 'courcecode.php'; ?>
            </div>
                  <!-- End Header -->

          <!-- Body -->
          <div class="card-body">

            <!-- <center>
              <button style="margin:5px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#item-bank" id="student_details">
              <i class="fas fa-plus-hexagon"></i>ADD
              </button></center> -->

            <table class="table table-bordered target-table table-hover" id="radio">
              <thead class="thead-dark bg-dark">
                <tr>
                <th class="text-white">No.</th>
                  <th class="text-white">event</th>
                  <th class="text-white">Instructor</th>
                  <th class="text-white">Date</th>
                  <th class="text-white">Class</th>
                  <?php  if (isset($_SESSION['permission']) && $permission['delete_emergance'] == "1"){ ?>
                    <th class="text-white">Operation</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody id="filterDataTable">
                <?php

                $classQ = $connect->query("SELECT className FROM classfilter WHERE pageName = 'emergency'");
                $classData2 = $classQ->fetchColumn();

                $eme_id = "SELECT * FROM emergency_data where ctp_id='$std_course1'";
                $eme_idst = $connect->prepare($eme_id);
                $eme_idst->execute();
                $eme_idre = $eme_idst->fetchAll();
                $sns = 1;
                foreach ($eme_idre as $eme_idvalue) {
                  $eme_id = $eme_idvalue['id'];
                  $eme_get_id = $eme_idvalue['item'];
                  $eme_get_subid = $eme_idvalue['subitem'];
                    $checkClass = $connect->query("SELECT count(*) FROM item WHERE item = '$eme_get_id' AND class = '$classData2'");
                    $classData = $checkClass->fetchColumn();
                    $checkClass1 = $connect->query("SELECT count(*) FROM subitem WHERE subitem = '$eme_get_subid' AND class = '$classData2'");
                    $classData1 = $checkClass1->fetchColumn();

                    if ($eme_get_id != 0) {
                      $q1 = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                      $q1->execute([$eme_get_id]);
                      $item_name1 = $q1->fetchColumn();
                    } else if ($eme_get_subid != 0) {
                      $q1 = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
                      $q1->execute([$eme_get_subid]);
                      $item_name1 = $q1->fetchColumn();
                    }
                    if ($eme_get_id != 0) {
                      $stu_grade = "SELECT item_gradesheet.item_id as item_id,MIN(item_gradesheet.date) as get_date
              FROM item_gradesheet
              INNER JOIN item ON item_gradesheet.item_id = item.id where item.item='$eme_get_id' and item_gradesheet.user_id='$fetchuser_id' and item_gradesheet.grade!=''";
                    } else if ($eme_get_subid != 0) {
                      $stu_grade = "SELECT subitem_gradesheet.subitem_id as item_id,MIN(subitem_gradesheet.date) as get_date
              FROM subitem_gradesheet
              INNER JOIN subitem ON subitem_gradesheet.subitem_id = subitem.id where subitem.subitem='$eme_get_subid' and subitem_gradesheet.user_id='$fetchuser_id' and subitem_gradesheet.grade!=''";
                    }

                    $st = $connect->prepare($stu_grade);
                    $st->execute();
                    if ($st->rowCount() > 0) {
                      $re = $st->fetchAll();
                      foreach ($re as $value) {
                        $idd = $value['item_id'];
                        $course_ides = "";
                        $class_ides = "";
                        $phase_ides = "";
                        $classes = "";
                        $item_ides = "";
                        if ($eme_get_id != 0) {
                          $sel_item_data = "SELECT * FROM item WHERE id = '$idd' AND class = 'actual'";
                          $sel_item_data_St = $connect->prepare($sel_item_data);
                          $sel_item_data_St->execute();
                          if ($sel_item_data_St->rowCount() > 0) {
                            $sel_item_data_re = $sel_item_data_St->fetchAll();
                            $sn = 1;
                            foreach ($sel_item_data_re as $datas) {
                              $course_ides = $datas['course_id'];
                              $class_ides = $datas['class_id'];
                              $phase_ides = $datas['phase_id'];
                              $classes = $datas['class'];
                              $item_ides = $datas['item'];
                            }
                          }
                        } else if ($eme_get_subid != 0) {
                          $sel_item_data = "SELECT * FROM subitem WHERE id='$idd'";
                          $sel_item_data_St = $connect->prepare($sel_item_data);
                          $sel_item_data_St->execute();
                          if ($sel_item_data_St->rowCount() > 0) {
                            $sel_item_data_re = $sel_item_data_St->fetchAll();
                            $sn = 1;
                            foreach ($sel_item_data_re as $datas) {
                              $course_ides = $datas['course_id'];
                              $class_ides = $datas['class_id'];
                              $phase_ides = $datas['phase_id'];
                              $classes = $datas['class'];
                              $item_ides = $datas['subitem'];
                            }
                          }
                        }
                        $get_ins_name = "";
                        $dates = "";
                        $get_class_name = "";

                        if($classData2 == "actual"){
                          $sel_grade_data = "SELECT * FROM gradesheet WHERE user_id='$fetchuser_id' and phase_id='$phase_ides' and course_id='$course_ides' and class_id='$class_ides' and class='actual' and over_all_grade!=''";
                        }else if($classData2 == "sim"){
                          $sel_grade_data = "SELECT * FROM gradesheet WHERE user_id='$fetchuser_id' and phase_id='$phase_ides' and course_id='$course_ides' and class_id='$class_ides' and class='sim' and over_all_grade!=''";
                        }else{
                          $sel_grade_data = "SELECT * FROM gradesheet WHERE user_id='$fetchuser_id' and phase_id='$phase_ides' and course_id='$course_ides' and class_id='$class_ides' and class='$classes' and over_all_grade!=''";
                        }
                        $sel_grade_data_St = $connect->prepare($sel_grade_data);
                        $sel_grade_data_St->execute();

                        if ($sel_grade_data_St->rowCount() > 0) {
                          $sel_grade_data_re = $sel_grade_data_St->fetchAll();
                          $sn = 1;
                          foreach ($sel_grade_data_re as $datas1) {
                            $inst = $datas1['instructor'];
                            $added_ins_name = $connect->prepare("SELECT name FROM `users` WHERE id=?");
                            $added_ins_name->execute([$inst]);
                            $get_ins_name = $added_ins_name->fetchColumn();
                            $cls = $datas1['class_id'];

                            if ($classData2 == "actual") {
                              $added_class_name = $connect->prepare("SELECT Symbol FROM `actual` WHERE id=?");
                            } else if ($classData2 == "sim") {
                              $added_class_name = $connect->prepare("SELECT shortsim FROM `sim` WHERE id=?");
                            } else {
                              if ($classes == "actual") {
                                $added_class_name = $connect->prepare("SELECT Symbol FROM `actual` WHERE id=?");
                              } else if ($classes == "sim") {
                                $added_class_name = $connect->prepare("SELECT shortsim FROM `sim` WHERE id=?");
                              }
                            }

                            // if ($classes == "actual") {
                            //   $added_class_name = $connect->prepare("SELECT Symbol FROM `actual` WHERE id=?");
                            // } else if ($classes == "sim") {
                            //   $added_class_name = $connect->prepare("SELECT shortsim FROM `sim` WHERE id=?");
                            // }
                            $added_class_name->execute([$cls]);
                            $get_class_name = $added_class_name->fetchColumn();
                            $dates = $datas1['date'];
                          }
                        }
                        if ($eme_get_id != 0) {
                          $fetch_itemaddescount = $connect->query("SELECT COUNT(item_gradesheet.id)
                        FROM item_gradesheet
                        JOIN item ON item_gradesheet.item_id = item.id AND grade != 'N' AND grade IS NOT NULL AND grade != ''
                        JOIN itembank ON item.item = itembank.id
                        WHERE item_gradesheet.user_id = '$fetchuser_id'
                        AND itembank.id = '$eme_get_id';");
                          $fetch_itemaddescount1 = $fetch_itemaddescount->fetchColumn();
                        }
                        if ($eme_get_subid != 0) {
                          $fetch_itemaddescount = $connect->query("SELECT COUNT(subitem_gradesheet.id)
                        FROM subitem_gradesheet
                        JOIN subitem ON subitem_gradesheet.subitem_id = subitem.id AND grade != 'N' AND grade IS NOT NULL AND grade != ''
                        JOIN sub_item ON subitem.subitem = sub_item.id
                        WHERE subitem_gradesheet.user_id = '$fetchuser_id'
                        AND sub_item.id = '$eme_get_subid';");
                          $fetch_itemaddescount1 = $fetch_itemaddescount->fetchColumn();
                        }
                ?>
                        <tr>
                          <td><?php echo $fetch_itemaddescount1; ?></td>
                          <td><?php echo $item_name1 ?></td>
                          <td><?php
                              if ($get_ins_name == "") {
                                echo "-";
                              } else {
                                echo $get_ins_name;
                              } ?></td>
                          <td><?php if ($dates == "") {
                                echo "-";
                              } else {
                                echo $dates;
                              } ?></td>
                          <td><?php echo $get_class_name; ?></td>
                          <?php  if (isset($_SESSION['permission']) && $permission['delete_emergance'] == "1"){ ?>
                            <td><a href="delete_em.php?id=<?php echo $eme_id ?>" style="font-size:small; border:1px solid #ed4c78;"><i class="bi bi-trash-fill text-danger"></i> </td>
                          <?php } ?>
                        </tr>
                      <?php }
                    } else { ?>
                      <tr>
                        <td>Not Added yet</td>
                      </tr>
                <?php }
                  }
                ?>

              </tbody>
            </table>
 

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


  <!--select item to the table-->
  <div class="modal fade" id="item-bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Item Bank</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="emergancy_submit.php" method="get">
            <table class="table table-bordered src-table1" id="selectitemtable">
              <input style="margin:5px;" class="form-control" type="text" id="selectitemsearch" onkeyup="selectitem()" placeholder="Search for Subitem name.." title="Type in a name">
              <thead class="bg-dark">
                <tr>
                  <th class="text-white"><input type="checkbox" id="select-all-item"></th>
                  <th class="text-white">Id</th>
                  <th class="text-white">Item</th>

                </tr>
              </thead>
              <tbody>
                <?php

                $item_sel = "SELECT * FROM itembank";
                $item_selst = $connect->prepare($item_sel);
                $item_selst->execute();

                if ($item_selst->rowCount() > 0) {
                  $students = $item_selst->fetchAll();

                  $i = 0;
                  $sn = 1;
                  foreach ($students as $student) {
                    $check_id = $student['id'];
                    $checkitem_sel = "SELECT * FROM emergency_data where item='$check_id' AND user_id='$fetchuser_id'";
                    $checkitem_selst = $connect->prepare($checkitem_sel);
                    $checkitem_selst->execute();

                    if ($checkitem_selst->rowCount() <= 0) {

                ?>
                      <tr>
                        <td><input type="checkbox" class="get_value" name="itemcheck[]" value="<?php echo $student['id'] ?>" /></td>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $student['item']; ?></td>
                      </tr>
                <?php
                      $i++;
                    }
                  }
                }
                ?>

              </tbody>
            </table>
            <!-- <input type="text" name="std_id" value="<?php echo $fetchuser_id ?>"> -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="submit">Select</button>
          </form>
        </div>
      </div>
    </div>
  </div>




  <script>
    $(document).ready(function() {

      $("#radio").on('click', '.btnDelete', function() {
        $(this).closest('tr').remove();
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