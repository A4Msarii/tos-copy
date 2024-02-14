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

$in11 = "";
$q6 = "SELECT * FROM users where role='instructor' or role = 'instructors'";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $in11 .= '<option value="' . $row6['id'] . '">' . $row6['nickname'] . '</option>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Checklist Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<body>


<?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  <!--Head Navbar-->
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <!--Main Content-->

  <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">
          <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Quiz.png">
          Checklist
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
            
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
            <div class="col">
                <?php

                 $getCourse = $connect->query("SELECT * FROM newcourse WHERE Courseid = '$c_id' group by CourseCode,CourseName");
                while ($getCourseData = $getCourse->fetch()) {
                  $stuIDArr = array();
                  $stuIDArrP = 0;
                  $course_Code = $getCourseData['CourseCode'];
                  $course_Name = $getCourseData['CourseName'];
                  $get_course_name3 = $connect->prepare("SELECT symbol FROM ctppage WHERE CTPid=?");
                  $get_course_name3->execute([$course_Name]);
                  $course_code3 = $get_course_name3->fetchColumn();
                  $checkQ = $connect->query("SELECT * FROM checklist WHERE ctp = '$std_course1'");
                  while($checkData = $checkQ->fetch()){
                    $checkID = $checkData['id'];
                ?>
                  <h1 class="text-danger"><?php echo $checkData['checklist']; ?>:<?php echo $course_code3 . ' - ' . '0' . $course_Code; ?>
                  </h1>
                  <hr class="text-success">

                  <div class="row align-items-center gx-2 mb-2">
                    <div class="col-12">

                      <table class="table table-bordered">
                        <thead class="bg-dark">
                          <tr>
                            <th class="text-white">Sub Checklist</th>
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
                          $eme_id = "SELECT * FROM subcheclist WHERE main_checklist_id='$checkID'";
                          $eme_idst = $connect->prepare($eme_id);
                          $eme_idst->execute();
                          $eme_idre = $eme_idst->fetchAll();
                          $sns = 1;
                          foreach ($eme_idre as $eme_idvalue) {
                            $eme_id = $eme_idvalue['id'];

                          ?>

                            <tr>
                              <td>
                                <?php echo $eme_idvalue['name']; ?>
                              </td>
                              <?php
                              $stuName = 0;
                              while ($stuName < count($stuIDArr)) {
                                $stuId = $stuIDArr[$stuName];
                                $q = $connect->prepare("SELECT marks FROM test_data WHERE test_id=? and student_id=?");
                                $q->execute([$eme_id, $stuId]);
                                $name = $q->fetchColumn();
                                $eme_id1 = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$checkID' AND subCheckListId = '$eme_id' AND studentId = '$stuId'");
                                $eme_id2 = $eme_id1->fetchColumn();
                                if ($eme_id2 > 0) {
                                  $bgColor1 = '<input type="checkbox" id="validCheck" class="form-check-input is-valid" checked style="height: 30px;width: 30px;border-radius: 35px;opacity: 1;" disabled>';
                                } else {
                                  $bgColor1 = '<input type="checkbox" id="invalidCheck" class="form-check-input is-invalid" style="height: 30px;width: 30px;border-radius: 35px;opacity: 1;" disabled>';
                                }
                              ?>
                                <td style="text-align:center;"><?php echo $bgColor1;?></td>
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
                <?php } } ?>

              </div>
            </div>

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