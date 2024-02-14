<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

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
<style type="text/css">
  tr:hover {
    background-color: #accbec6b;
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

  .circleig {
    height: 20px;
    width: 100%;
    position: absolute;
    display: inline-block;
    left: 0px;
    bottom: -38px;
    border-radius: 2px;
    /*    font-weight: bolder;*/
    /*    font-size: larger;*/
    color: white;
    font-family: cursive;
    background: darkcyan;
  }
</style>

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
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:25px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Task_Log.png">
            Task Log All
          </h1>
        </div>
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <div class="card-body">
              <div class="card-header">
                <!-- Nav -->
                <ul class="nav nav-pills justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="nav-one-eg2-tab" href="#nav-one-eg2" data-bs-toggle="pill" data-bs-target="#nav-one-eg2" role="tab" aria-controls="nav-one-eg2" aria-selected="true">
                      <div class="d-flex align-items-center text-success" style="font-size:large; font-weight: bold;">
                        Additional Task
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="nav-two-eg2-tab" href="#nav-two-eg2" data-bs-toggle="pill" data-bs-target="#nav-two-eg2" role="tab" aria-controls="nav-two-eg2" aria-selected="false">
                      <div class="d-flex align-items-center text-success" style="font-size:large; font-weight: bold;">
                        Unaccomplish Task
                      </div>
                    </a>
                  </li>
                </ul>
                <!-- End Nav -->
              </div>
              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="nav-one-eg2" role="tabpanel" aria-labelledby="nav-one-eg2-tab">
                  <br>
                  <?php $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
                  $statement101 = $connect->prepare($query101);
                  $statement101->execute();
                  if ($statement101->rowCount() > 0) {
                    $result101 = $statement101->fetchAll();
                    foreach ($result101 as $row101) {
                      $s_tid = $row101['StudentNames'];
                      $query_add = "SELECT * FROM additional_task where assign_class_table IS NULL and Stud_id='$s_tid'";
                      $statement_Add = $connect->prepare($query_add);
                      $statement_Add->execute();
                      if ($statement_Add->rowCount() > 0) {
                        $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                        $get_image->execute([$s_tid]);
                        $get_image_name = $get_image->fetchColumn();
                        $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                        $get_name_st->execute([$s_tid]);
                        $get_name_st_name = $get_name_st->fetchColumn();

                        if ($get_image_name != "") {
                          $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                          if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                            $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                          } else {
                            $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                          }
                        }
                  ?>
                        <div class="row">
                          <div class="col-1">
                            <div style="display: grid; place-items: center;">

                              <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">

                              <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                            </div>
                          </div>
                          <div class="col-10">
                            <?php

                            $result_add = $statement_Add->fetchAll();
                            $sn = 1;
                            foreach ($result_add as $rows) {
                              $item_name = $rows['Item'];
                              $type = $rows['type'];
                              if ($type == 'item') {
                                $i_name = $connect->prepare("SELECT item FROM itembank WHERE id=?");
                              } else if ($type == 'subitem') {
                                $i_name = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                              }
                              $i_name->execute([$item_name]);
                              $addname1 = $i_name->fetchColumn();
                              $gradesheetId = $rows['gradesheet_id'];
                              $instNameData = "";
                              $className = "";
                              $fetchgradeSheetQ = $connect->query("SELECT * FROM gradesheet WHERE id = '$gradesheetId' AND user_id = '$s_tid'");
                              if ($fetchgradeSheetQ->rowCount() > 0) {
                                $fetchgradeSheetData = $fetchgradeSheetQ->fetch();
                                $classId = $fetchgradeSheetData['class_id'];
                                $classTable = $fetchgradeSheetData['class'];
                                $instructorId = $fetchgradeSheetData['instructor'];
                                if ($classTable == "actual") {
                                  $fetchClassNameQ = $connect->query("SELECT symbol FROM actual WHERE id = '$classId'");
                                }
                                if ($classTable == "sim") {
                                  $fetchClassNameQ = $connect->query("SELECT shortsim FROM sim WHERE id = '$classId'");
                                }
                                $className = $fetchClassNameQ->fetchColumn();
                                $fetchInstQ = $connect->query("SELECT nickname FROM users WHERE id = '$instructorId'");
                                $instNameData = $fetchInstQ->fetchColumn();
                              }
                            ?>

                              <!-- <a class="badge bg-soft-secondary rounded-pill m-2 text-dark" href="#" style="font-size:medium;"><?php echo $addname1; ?></a> -->
                              <a href="" class="btn btn-danger position-relative" style="margin-bottom: 45px;"><?php echo $addname1; ?>

                                <?php
                                if ($className != "") {
                                  echo '<span class="circleig1 bg-primary">'. $className. '</span>';
                                }
                                if ($instNameData != "") {
                                  echo '<span class="circleig bg-success">'. $instNameData. '</span>';
                                }
                                ?>
                              </a>
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                        <hr>
                      <?php
                      } ?>
                  <?php
                    }
                  } ?>
                </div>

                <div class="tab-pane fade" id="nav-two-eg2" role="tabpanel" aria-labelledby="nav-two-eg2-tab">
                  <br>
                  <?php $query101 = "SELECT * FROM newcourse where CourseName='$std_course1' and CourseCode='$CourseCode11'";
                  $statement101 = $connect->prepare($query101);
                  $statement101->execute();
                  if ($statement101->rowCount() > 0) {
                    $result101 = $statement101->fetchAll();
                    foreach ($result101 as $row101) {
                      $s_tid = $row101['StudentNames'];
                      $query_acc = "SELECT * FROM accomplish_task where assign_class_table IS null and Stud_ac='$s_tid'";
                      $statement_acc = $connect->prepare($query_acc);
                      $statement_acc->execute();
                      if ($statement_acc->rowCount() > 0) {
                        $get_image = $connect->prepare("SELECT file_name FROM users WHERE id=?");
                        $get_image->execute([$s_tid]);
                        $get_image_name = $get_image->fetchColumn();
                        $get_name_st = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                        $get_name_st->execute([$s_tid]);
                        $get_name_st_name = $get_name_st->fetchColumn();

                        if ($get_image_name != "") {
                          $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                          if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic)) {
                            $pic111 = BASE_URL . 'includes/Pages/upload/' . $get_image_name;
                          } else {
                            $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                          }
                        }
                  ?>
                        <div class="row">
                          <div class="col-1">
                            <div style="display: grid; place-items: center;">

                              <img class="avatar avatar-sm avatar-circle avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">

                              <span style="margin: 5px;"><?php echo $get_name_st_name ?></span>
                            </div>
                          </div>
                          <div class="col-10">
                            <?php
                            $result_acc = $statement_acc->fetchAll();
                            $sn = 1;
                            foreach ($result_acc as $row) {
                              $item_acc = $row['Item_ac'];
                              $type1 = $row['Type'];
                              if ($type1 == 'item') {
                                $it_name = $connect->prepare("SELECT item FROM itembank WHERE id=?");
                              } else if ($type1 == 'subitem') {
                                $it_name = $connect->prepare("SELECT subitem FROM sub_item WHERE id=?");
                              }
                              $it_name->execute([$item_acc]);
                              $fetchname = $it_name->fetchColumn(); {
                                $gradesheetId = $row['gradsheet_id'];
                                $instNameData = "";
                                $className = "";
                                $fetchgradeSheetQ = $connect->query("SELECT * FROM gradesheet WHERE id = '$gradesheetId' AND user_id = '$s_tid'");
                                if ($fetchgradeSheetQ->rowCount() > 0) {
                                  $fetchgradeSheetData = $fetchgradeSheetQ->fetch();
                                  $classId = $fetchgradeSheetData['class_id'];
                                  $classTable = $fetchgradeSheetData['class'];
                                  $instructorId = $fetchgradeSheetData['instructor'];
                                  if ($classTable == "actual") {
                                    $fetchClassNameQ = $connect->query("SELECT symbol FROM actual WHERE id = '$classId'");
                                  }
                                  if ($classTable == "sim") {
                                    $fetchClassNameQ = $connect->query("SELECT shortsim FROM sim WHERE id = '$classId'");
                                  }
                                  $className = $fetchClassNameQ->fetchColumn();
                                  $fetchInstQ = $connect->query("SELECT nickname FROM users WHERE id = '$instructorId'");
                                  $instNameData = $fetchInstQ->fetchColumn();
                                }
                            ?>

                                <!-- <a class="badge bg-soft-secondary rounded-pill m-2" href="#" style="font-size:medium; color: black;"><?php echo $fetchname; ?></a> -->
                                <a href="" class="btn btn-danger position-relative" style="margin-bottom: 45px;"><?php echo $fetchname; ?>
                                  <?php
                                  if ($className != "") {
                                    echo '<span class="circleig1 bg-primary">'. $className. '</span>';
                                  }
                                  if ($instNameData != "") {
                                    echo '<span class="circleig bg-success">'. $instNameData. '</span>';
                                  }
                                  ?>


                                </a>
                            <?php }
                            }
                            ?>
                          </div>
                        </div>
                        <hr>
                      <?php
                      } ?>
                  <?php
                    }
                  } ?>
                </div>
              </div>
              <!-- End Tab Content -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>