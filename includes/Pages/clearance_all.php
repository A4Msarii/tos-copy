<?php
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Clearance Log</title>
 <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width,
                   initial-scale=1" />
                   <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<style type="text/css">
  tr:hover {
          background-color: #accbec6b;
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
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Clearence_Log.png">
          Clearance Log</h1>
          
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
            <!-- Header -->
           <input type="search" name="search" class="form-control">
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
            <?php
        
        $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id'");
        while ($getCourseData = $getCourse->fetch()) {
          $stuIDArr = array();
        $stuIDArrP = 0;
          $course_Code = $getCourseData['CourseCode'];
          $course_Name = $getCourseData['CourseName'];
          $get_course_name3 = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
      $get_course_name3->execute([$course_Name]);
      $course_code3 = $get_course_name3->fetchColumn();
        ?>
        <h4><a class="text-success">Cleranace Log <?php echo $course_code3 . ' - ' . '0' . $course_Code; ?></a></h4>
        <hr class="text-success">

        <div class="row align-items-center gx-2 mb-2">
          <div class="col-12">

            <table class="table table-bordered">
              <thead class="bg-dark">
                <tr>
                  <th class="text-white">item</th>
                  <?php
                  // AND StudentNames = '29'
                    $selecAllUser = $connect->query("SELECT * FROM newcourse WHERE CourseCode = '$course_Code' AND CourseName = '$course_Name'");
                    while ($selecAllUserData = $selecAllUser->fetch()) {
                      $uID = $selecAllUserData['StudentNames'];
                      $usersQ = $connect->query("SELECT * FROM users WHERE id = '$uID'");
                      while ($usersQData = $usersQ->fetch()) {
                        if (!in_array($usersQData['id'], $stuIDArr)) {
                          $stuIDArr[$stuIDArrP] = $usersQData['id'];
                          $stuIDArrP++;
                        }
                  ?>
                        <th class="text-white text-center"><?php echo $usersQData['nickname']; ?></th>
                  <?php
                      }
                    }
                  ?>

                </tr>
              <tbody>
                <tr>
                  <td>
                    <img class=" avatar avatar-img avatar-circle" src="<?php echo BASE_URL; ?>assets/img/Class-Student.png" height='20px' width='20px' alt="">
                  </td>
                  <?php
                  $stuName = 0;
                  while ($stuName < count($stuIDArr)) {
                    $stuId = $stuIDArr[$stuName];
                    $query = $connect->query("SELECT file_name FROM users WHERE id = '$stuId'");
                    $prof_pic11 = $query->fetchColumn();
                    if ($prof_pic11 != "") {
                      $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
                        $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                      } else {
                        $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                    } else {
                      $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                    }
                  ?>
                    <td class="text-center">
                    <img class=" avatar avatar-img avatar-circle" src="<?php echo $img; ?>" height='20px' width='20px' alt="">
                    </td>
                  <?php $stuName++;
                  } ?>
                </tr>
                <?php
                $eme_id = "SELECT * FROM clearance_data";
                $eme_idst = $connect->prepare($eme_id);
                $eme_idst->execute();
                $eme_idre = $eme_idst->fetchAll();
                $sns = 1;
                foreach ($eme_idre as $eme_idvalue) {
                  $class_clearnce = "";
                  $class_table_clearnace = "";
                  $clone_cid_clearnace = "";
                  $get_ins_name1 = "";
                  $get_datess1 = "";
                  $eme_id = $eme_idvalue['id'];
                  $eme_get_id = $eme_idvalue['item'];
                  $eme_get_subid = $eme_idvalue['subitem'];
                  if ($eme_get_id != 0) {
                    $q1 = $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                    $q1->execute([$eme_get_id]);
                    $item_name1 = $q1->fetchColumn();
                  } else if ($eme_get_subid != 0) {
                    $q1 = $connect->prepare("SELECT subitem FROM `sub_item` WHERE id=?");
                    $q1->execute([$eme_get_subid]);
                    $item_name1 = $q1->fetchColumn();
                  }
                ?>

                  <tr>
                    <td>
                      <?php echo $item_name1; ?>
                    </td>
                    <?php
                    $stuName = 0;
                    while ($stuName < count($stuIDArr)) {
                      $stuId = $stuIDArr[$stuName];
                      $eme_id1 = $connect->query("SELECT count(*) FROM clearance_student_id WHERE clearance_id='$eme_id' AND stud_id = '$stuId' AND class_id IS NOT NULL");
                      if ($eme_id1->fetchColumn() > 0) {
                        $bgColor1 = "#00C9A7";
                      } else {
                        $bgColor1 = "#ED4C78";
                      }
                    ?>
                      <td style="background-color:<?php echo $bgColor1; ?> !important;"></td>
                    <?php
                      $stuName++;
                    }
                    ?>
                  </tr>
                <?php

                }
                ?>

              </tbody>

              </thead>

            </table>
            <hr>

          </div>
          <!-- End Col -->
        </div>
        <?php } ?>



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