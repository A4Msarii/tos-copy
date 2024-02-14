<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
$_SESSION['page'] = 'scheduling';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Schedulling</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <?php include 'sc_thumbnail.php'; ?>
  <style>
    /*body {
      background-color: #fbfbfb;
    }*/

    @media (min-width: 991.98px) {
      main {
        padding-left: 240px;
      }
    }

    #studentTable.table {
      display: unset !important;
    }

    #studentTable th,
    td {
      /* border-bottom: 0px !important; */
      border: 1px solid black !important;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      padding: 58px 0 0;
      /* Height of navbar */
      box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
      width: 240px;
      z-index: 600;
    }

    @media (max-width: 991.98px) {
      .sidebar {
        width: 100%;
      }
    }

    .sidebar .active {
      border-radius: 5px;
      box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: 0.5rem;
      overflow-x: hidden;
      overflow-y: auto;
      /* Scrollable contents if viewport is shorter than content. */
    }

    .secondTable {
      height: 50px;
      padding: 10px;
      width: 73px;
      text-align: center;
    }

    .tdSpace {
      padding: 0px !important;
      border: 0px !important;
    }

    #studentTable th,
    td {
      text-align: center !important;
    }

    .stuImage {
      height: 83px;
      width: 100%;
    }

    @media only screen and (max-width: 768px) {
      .prereuisite {
        width: 96.4%;
      }
    }

    @media only screen and (min-width: 992px) {
      .prereuisite {
        position: fixed;
        z-index: 11;
        width: 76.4%;
      }
    }

    .prereuisite {
      position: fixed;
      z-index: 11;
    }

    .tableData {
      margin-top: 100px !important;
    }

    #preUl {
      margin-left: 20px;
    }

    .preUl {
      margin-left: -21px;
    }

    /* .shedHead {
      position: sticky;
      top: 263px;
      z-index: 1;
    } */

    /* .blankTh {
      padding: 2px !important;
      text-align: center !important;
      background-color: white !important;

    } */

    /* .tableTr:first-child {
      position: sticky;
      top: 307px;
      background-color: white;
    } */

    /* .className {
      width: 81px;
    } */

    #myDiv {
      position: relative;
      margin-top: 50;
    }

    #studentsearch {
      position: fixed;
      width: 70%;
    }

    /* .tableFixHead {
      overflow-y: auto;
     position: fixed;
     height: 290px;
      border: 3px solid black;
    }

    .tableFixHead thead th {
      position: sticky;
      top: 0px;
      background-color: white;
    }
    .tableTr:first-child{
      position:sticky;
      top: 43px;
      background-color: white;
    } */

    #headshed {
      position: sticky;
      top: 308px;
    }

    .tableTr1:first-child {
      background-color: white;
      z-index: 111;
      position: sticky;
      top: 386px;
    }
  </style>
</head>

<body>
  <?php include 'sc_loader.php'; ?>


  <div id="header-hide">
    <?php
    $get_ctp = '';
    include ROOT_PATH . 'includes/scheduling_header.php';
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <!-- Page Header -->
        <!-- <div class="page-header page-header-light">
          <img style="height: 50px;" class="img-fluid" src="./assets/svg/logos/sche.svg" alt="SVG Illustration">
        </div> -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -22rem;">

      <div class="row justify-content-center prereuisite" style="margin-bottom:50px;">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100">


            <!-- Body -->
            <div class="card-body">
              <div class="col-lg-12">
                <h1 style="color:#de3a29;">
                  <img style="height:30px; width:30px; margin-right: 10px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_sche/pre1.png">
                  Prerequisites
               
                </h1>


                <div class="get_prereui">


                </div>
              
              </div>
              <!-- End Row -->
            </div>


            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>

      <div class="row justify-content-center tableData" id="myDiv">

        <div class="col-lg-12 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow">
            <!-- Body -->
            <div class="card-body">

              <div class="container pt-4">
                <center>
                  <input class="form-control" type="text" id="studentsearch" onkeyup="student()" placeholder="Search for Class.." title="Type in a name"><br><br>
                </center>
                <div class="row">
                  <div class="col-md-12">
                    <br><br>
                    <?php
                    // $pic = BASE_URL . '/includes/Pages/upload/avtar.png';
                    $imgPath = BASE_URL . '/assets/img/Class-Student.png';
                    $img = "<img src='$imgPath' class='stuImage' />";
                    $check = array($img);
                    $j = 0;
                    $count = array();
                    $i = 0;
                    $colspan = 0;
                    $span = array();
                    $k = 0;
                    $td = 0;
                    $classId = array();
                    $classTableName = array();
                    $stdId = array();
                    $um = 0;
                    // fetch the student courseId and Name/
                    $courseName = '';
                    $course_id = '';

                    if (isset($courseides)) {
                      $get_course_ide = $courseides;
                    }

                    if (isset($get_course_ide)) {
                      if ($_SESSION['role'] == "student") {
                        $studentId = $_SESSION['login_id'];

                        $courseId = $connect->query("SELECT CourseName,CourseCode FROM newcourse
                                WHERE Courseid = '$get_course_ide' AND StudentNames = '$studentId'");
                        while ($stuData1 = $courseId->fetch()) {
                          $courseName = $stuData1['CourseName'];
                          $course_id = $stuData1['CourseCode'];
                        }
                      }
                      if ($_SESSION['role'] != "student") {
                        $courseId = $connect->query("SELECT CourseName,CourseCode FROM newcourse
                                WHERE Courseid = '$get_course_ide'");
                        while ($stuData1 = $courseId->fetch()) {
                          $courseName = $stuData1['CourseName'];
                          $course_id = $stuData1['CourseCode'];
                        }
                      }

                      $nameArray = array();
                      $name = 0;
                      $stuName = $connect->query("SELECT StudentNames from newcourse WHERE CourseName = '$courseName' AND CourseCode = '$course_id'");
                      while ($stuResult1 = $stuName->fetch()) {
                        $nameArray[$name] = $stuResult1['StudentNames'];
                        $name++;
                      }
                      $stuName = array();
                      $countData1 = 0;
                      for ($stuCount = 0; $stuCount < count($nameArray); $stuCount++) {
                        $checkId = $nameArray[$stuCount];
                        $checkQuery = $connect->query("SELECT * FROM group_student_scheduling WHERE std_id ='$checkId'");
                        if (!$checkQuery->rowCount() > 0) {
                          $stuName[$um] = $nameArray[$stuCount];
                          $countData1++;
                          $um++;
                        }
                      }
                    }
                    $um = 0;
                    $var = 0;
                    $stuCount = 0;
                    $su = 0;

                    // End fetch the student courseId and Name/

                    if ($get_ctp != '') {
                    ?>
                      <div class="tableFixHead">
                        <table class="table" id="studentTable">

                          <thead class="shedHead" id="headshed">
                            <tr id="headtr">
                              <th class="blankTh" style="color:white;background-color:white;">scheduling</th>

                              <?php
                              $result = $connect->query("SELECT DISTINCT group_id FROM group_student_scheduling");
                              while ($data = $result->fetch()) {
                                $group_id = $data['group_id'];
                                $groupNameQuery = $connect->query("SELECT * FROM groups WHERE id = '$group_id' and course_id='$get_course_ide'");
                                while ($groupData = $groupNameQuery->fetch()) {
                                  $count[$i] = $groupData['id'];
                                  $g_id = $groupData['id'];
                                  $stu_Count = $connect->query("SELECT count(*) FROM group_student_scheduling
                                    WHERE group_id = '$g_id'");
                                  $stRes = $stu_Count->fetchColumn();
                                  $stRes--;

                                  $colors = array("#e6ffe6", "#ffffcc", "#ffe0cc", "#ffccdd", "#cce0ff", "#f2f2f2", "#ccffff", "#e0ccff", "#ffcccc");
                                  $randomColor = $colors[array_rand($colors)];
                              ?>
                                  <th class="blankTh11" colspan="<?php echo $stRes; ?>" style="padding:12px;background-color: <?php echo $randomColor; ?>;height:80px;">
                                    <!-- <img style="height:25px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_sche/group.png"> -->
                                    <strong><?php echo $groupData['groupname']; ?></strong>
                                  </th>
                                <?php $i++;
                                }
                              }
                              $i = 0;
                              if (count($stuName) > 0) {
                                ?>
                                <th class="blankTh22" style="padding: 8px;background-color:#ebebe0;height:80px;" colspan="<?php echo $countData1; ?>">
                                  <img style="height:25px; width:25px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_sche/No_student/Ns_1.png">
                                  <!-- Not Added student -->
                                </th>
                              <?php } ?>
                            </tr>
                          </thead>

                          <tbody class="tableBody" style="width:100%;">
                            <?php
                            $stuResult = "";
                            $result = $connect->query("SELECT id,symbol,days,'actual' AS table_name FROM actual where ctp='$get_ctp' UNION ALL SELECT id,shortsim,days,'sim' AS table_name FROM sim where ctp='$get_ctp' UNION ALL SELECT id,shortacademic,days,'academic' AS table_name FROM academic where ctp='$get_ctp' UNION ALL SELECT id,shorttest,days,'test' AS table_name FROM  test where ctp='$get_ctp'ORDER BY CASE WHEN days THEN days ELSE symbol END");
                            $r = $connect->query("SELECT id,symbol,'actual' AS table_name FROM actual where ctp='$get_ctp' UNION ALL SELECT id,shortsim,'sim' AS table_name FROM sim where ctp='$get_ctp' UNION ALL SELECT id,shortacademic,'academic' AS table_name FROM academic where ctp='$get_ctp' UNION ALL SELECT id,shorttest,'test' AS table_name FROM  test where ctp='$get_ctp' ORDER BY symbol");
                            $result1 = $result->fetchAll();
                            $v = count($r->fetchAll());
                            if ($v > 0) {
                              for ($m = 0; $m <= $v; $m++) {
                            ?>

                                <tr class="<?php if ($m != 0) { ?>tableTr<?php } ?> tableTr1" id="<?php if ($m != 0) { ?><?php echo $result1[$a]['symbol']; ?><?php } ?>">

                                  <td class="className" style="padding:0px !important;">
                                    <?php echo $check[$j];
                                    $j++;
                                    $a = $m;

                                    if ($m == $v) {
                                      $a--;
                                    }

                                    $check[$j] = $result1[$a]['symbol'];
                                    ?>
                                  </td>

                                  <?php
                                  $colspan = 0;
                                  $td = 0;

                                  while ($i < count($count)) {
                                    $groupId = $count[$i];
                                    $stuResult = $connect->query("SELECT * FROM group_student_scheduling
                                    WHERE group_id = '$groupId'");
                                    if ($stuResult->rowCount() > 0) {
                                      $var++;
                                  ?>

                                      <td scope="row" class="tdSpace">
                                        <table style="height:84px;width:100%;" id="studentTable1">

                                          <?php
                                          $class = '#ff0c0c';

                                          while ($stuData = $stuResult->fetch()) {
                                            $std_subi = $stuData['std_id'];
                                            $stdId[$um] = $stuData['std_id'];
                                            $um++;
                                            $stud_subi = $connect->prepare("SELECT `nickname` FROM users WHERE id=?");
                                            $stud_subi->execute([$std_subi]);
                                            $name_sub = $stud_subi->fetchColumn();
                                            $profile = $connect->prepare("SELECT file_name FROM `users` WHERE id=?");
                                            $profile->execute([$std_subi]);
                                            $prof_pic = $profile->fetchColumn();
                                            $uImg = $prof_pic;
                                            if ($uImg != "") {
                                              $pic1 = BASE_URL . 'includes/Pages/upload/' . $uImg;
                                              if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1)) {
                                                $pic1 = BASE_URL . 'includes/Pages/upload/' . $uImg;
                                              } else {
                                                $pic1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                              }
                                            } else {
                                              $pic1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                            $colspan++;
                                            $td++;
                                            $su++;
                                          ?>
                                            <td class="secondTable" style="padding:0px;overflow:hidden;">
                                              <div class="avatar avatar-sm avatar-circle">
                                                <img class="avatar-img" src="<?php echo $pic ?>" alt="Image Description">
                                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                              </div>
                                              <?php echo $name_sub; ?>
                                            </td>

                                          <?php
                                          }
                                          $span[$k] = $colspan;
                                          $k++;
                                          $colspan = 0;
                                          ?>

                                        </table>
                                      </td>
                                  <?php
                                    }
                                    $i++;
                                  }
                                  ?>
                                  <!-- not added stu start -->
                                  <!-- <td>varun</td> -->
                                  <!-- not added stu end -->
                                  <?php
                                  $k = 0;
                                  if ($var > 0) {
                                    if ($stuResult->rowCount() > 0) {
                                      $c = $td;
                                      $um = 0;
                                      while ($c < count($count)) {

                                        $z = 0;
                                  ?>
                                        <td class="tdSpace">
                                          <table class="pre_table" style="width:100%;" id="studentTable2">
                                            <tr>
                                              <?php
                                              $ard = $span[$k];

                                              while ($ard > 0) {
                                                $std_subi1 = $stdId[$um];
                                                $class = "bg-danger";
                                                $std_subi1 = $stdId[$um];
                                                if ($class_tbls == "actual" || $class_tbls == "sim") {
                                                  $fetch_grade1 = $connect->prepare("SELECT id FROM gradesheet where class=? and class_id=? and user_id=?");
                                                  $fetch_grade1->execute([$class_tbls, $class_idees, $std_subi1]);
                                                  $grade1 = $fetch_grade1->fetchColumn();
                                                  if ($grade1 == "") {
                                                    $class = "bg-danger";
                                                  } elseif ($grade1 != "") {
                                                    $class = "bg-success";
                                                  }
                                                } elseif ($class_tbls == "academic") {
                                                  $get_color = $connect->prepare("SELECT permission FROM acedemic_stu WHERE acedemic_id=? and std_id=?");
                                                  $get_color->execute([$class_idees, $std_subi1]);
                                                  $value_per = $get_color->fetchColumn();
                                                  if ($value_per == '1') {
                                                    $class = "bg-success";
                                                  }
                                                } elseif ($class_tbls == "test") {
                                                  $get_color1 = $connect->prepare("SELECT id FROM test_data WHERE test_id=? and student_id=?");
                                                  $get_color1->execute([$class_idees, $std_subi1]);
                                                  $value_per = $get_color1->fetchColumn();
                                                  if ($value_per != "") {
                                                    $class = "bg-success";
                                                  }
                                                }
                                              ?>
                                                <td onclick="moveDown()" class="secondTable <?php echo $class ?>" data-studentid="<?php echo $std_subi1 ?>" data-classid="<?php echo $class_idees ?>" data-classname="<?php echo $class_tbls ?>">
                                                </td>
                                              <?php
                                                $um++;
                                                $ard--;
                                              }
                                              $k++;
                                              ?>
                                            </tr>
                                          </table>
                                        </td>
                                  <?php
                                        $c++;
                                      }
                                    }
                                  }
                                  ?>
                                  <!-- not added stu start -->
                                  <!-- <td>varun</td> -->
                                  <?php
                                  if ($stuCount == 0) {
                                    for ($ar = 0; $ar < count($stuName); $ar++) {
                                      $usId = $stuName[$ar];
                                      $stu_subi = $connect->query("SELECT * FROM users WHERE id='$usId'");
                                      while ($userResult = $stu_subi->fetch()) {
                                        $uImg = $userResult['file_name'];
                                        if ($uImg != "") {
                                          $pic1 = BASE_URL . 'includes/Pages/upload/' . $uImg;
                                          if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1)) {
                                            $pic1 = BASE_URL . 'includes/Pages/upload/' . $uImg;
                                          } else {
                                            $pic1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                          }
                                        } else {
                                          $pic1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                                  ?>
                                        <td class="secondTable">
                                          <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="<?php echo $pic1 ?>" alt="Image Description">
                                            <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                          </div>
                                          <?php echo $userResult['nickname'];
                                          $stuCount++; ?>
                                        </td>
                                      <?php
                                      }
                                    }
                                  } else {
                                    $ar = 0;
                                    for ($er = 1; $er <= $countData1; $er++) {
                                      $usId = $stuName[$ar];
                                      $std_subi1 = $stuName[$ar];
                                      $ar++;

                                      $class = "bg-danger";
                                      // $std_subi1 = $stdId[$um];
                                      if ($class_tbls == "actual" || $class_tbls == "sim") {
                                        $fetch_grade1 = $connect->prepare("SELECT id FROM gradesheet where class=? and class_id=? and user_id=?");
                                        $fetch_grade1->execute([$class_tbls, $class_idees, $std_subi1]);
                                        $grade1 = $fetch_grade1->fetchColumn();
                                        if ($grade1 == "") {
                                          $class = "bg-danger";
                                        } elseif ($grade1 != "") {
                                          $class = "bg-success";
                                        }
                                      } elseif ($class_tbls == "academic") {
                                        $get_color = $connect->prepare("SELECT permission FROM acedemic_stu WHERE acedemic_id=? and std_id=?");
                                        $get_color->execute([$class_idees, $std_subi1]);
                                        $value_per = $get_color->fetchColumn();
                                        if ($value_per == '1') {
                                          $class = "bg-success";
                                        }
                                      } elseif ($class_tbls == "test") {
                                        $get_color1 = $connect->prepare("SELECT id FROM test_data WHERE test_id=? and student_id=?");
                                        $get_color1->execute([$class_idees, $std_subi1]);
                                        $value_per = $get_color1->fetchColumn();
                                        if ($value_per != "") {
                                          $class = "bg-success";
                                        }
                                      }
                                      ?>
                                      <td onclick="moveDown()" class="fetchPre secondTable <?php echo $class ?>" data-studentid="<?php echo $usId ?>" data-classid="<?php echo $class_idees ?>" data-classname="<?php echo $class_tbls ?>"></td>
                                  <?php
                                    }
                                  }
                                  ?>
                                  <!-- not added stu end -->
                                </tr>
                            <?php
                                $class_idees = $classId[$j] = $result1[$a]['id'];
                                //classTable Variable
                                $class_tbls = $classTableName[$j] = $result1[$a]['table_name'];
                              }
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    <?php } ?>
                  </div>
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

</body>
<script>
  $(".pre_table td").click(function() {
    var studentid = $(this).data("studentid");
    var classid = $(this).data("classid");
    var classname = $(this).data("classname");
    $.ajax({
      type: 'GET',
      url: 'fetch_pre_ctudent.php',
      data: 'studentid=' + studentid + '&classid=' + classid + '&classname=' + classname,
      success: function(response) {
        $('.get_prereui').empty();
        $(".get_prereui").append(response);


      }
    });

  });

  $(".fetchPre").click(function() {
    var studentid = $(this).data("studentid");
    var classid = $(this).data("classid");
    var classname = $(this).data("classname");
    $.ajax({
      type: 'GET',
      url: 'fetch_pre_ctudent.php',
      data: 'studentid=' + studentid + '&classid=' + classid + '&classname=' + classname,
      success: function(response) {
        $('.get_prereui').empty();
        $(".get_prereui").append(response);


      }
    });

  });
</script>

<script>
  function moveDown() {
    var div = document.getElementById("myDiv");
    var t = document.getElementById('headshead');
    var height = div.offsetHeight; // get the height of the element
    div.style.top = "20vh"; // set the top property to 50% of the viewport height
    $(".tableTr1:first-child").css('top', "526px");
    $("#headshed").css("top", "448px");
  }
</script>





<script>
  function student() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("studentsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("studentTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          $(".tableBody tr:first-child").css('display', "");
          tr[i].style.display = "";
          $(".tableBody tr:first-child").css('display', "");
        } else {
          tr[i].style.display = "none";
          $(".tableBody tr:first-child").css('display', "");
        }
      }
    }
  }

  function student1() {
    var input, filter, table, tr, td, td1, i, txtValue;
    input = document.getElementById("studentsearch");
    var getClass = input.value;
    filter = input.value.toUpperCase();
    table = document.getElementById("studentTable");
    var table1 = document.getElementById("studentTable1");
    var table2 = document.getElementById("studentTable2");
    tr = table.getElementsByTagName("tr");
    var showClass = 0;
    var checkShowClass = <?php echo $su; ?>;
    // console.log(checkShowClass);
    // console.log(checkShowClass);
    $(".tableTr").css("display", "none");
    if (input.value == '') {
      $(".tableTr").css("display", "");
    }
    for (i = 0; i < tr.length; i++) {
      // td = tr[i].getElementsByTagName("td")[0];
      td1 = tr[i].getAttribute("id");
      if (getClass == td1) {
        // td1.style.display = "block";
        // console.log(td1);
        $("#" + td1).css("display", "contents");
      }
      // if (td) {
      //   txtValue = td.textContent || td.innerText;
      //   if (txtValue.toUpperCase().indexOf(filter) > -1) {
      //     tr[i].style.display = "";
      //   } else {
      //     if (showClass > checkShowClass) {
      //       tr[i].style.display = "none";
      //     }
      //     showClass++;
      //   }
      // }
    }
  }
</script>

</html>