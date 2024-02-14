<!--To fetch the instructor on modal of instructor-->
<?php
ini_set('display_errors', 1);
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$class = "";
$classid = "";
$output = "";

$course = "select course";
$in = "";
$q2 = "SELECT * FROM users where role='instructor'";
$st2 = $connect->prepare($q2);
$st2->execute();

if ($st2->rowCount() > 0) {
  $re2 = $st2->fetchAll();
  foreach ($re2 as $row2) {
    $in .= '<option value="' . $row2['id'] . '">' . $row2['nickname'] . '</option>';
  }
}

$std_course = "";

$stu_ac = "";
$q_ac = "SELECT * FROM users where role='student'";
$st_ac = $connect->prepare($q_ac);
$st_ac->execute();

if ($st_ac->rowCount() > 0) {
  $re4_ac = $st_ac->fetchAll();
  foreach ($re4_ac as $row) {
    $stu_ac .= '<ul value="' . $row['id'] . '">' . $row['name'] . ' - ' . $row['role'] . '</ul>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Academic Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,
                   initial-scale=1" />
  <?php include 'gs_thumbnail.php'; ?>

</head>
<style type="text/css">
  [data-bs-title]:hover:after {
    visibility: visible;
  }

  [data-bs-title]:after {
    content: attr(data-bs-title);
    background-color: #042156;
    color: white;
    font-size: 100%;
    font-weight: bolder;
    /*            margin-top: 20px;*/
    position: absolute;
    padding: 4px 8px 4px 8px;
    visibility: hidden;
    border-radius: 10px;
    width: auto;


  }

  tr:hover {
    background-color: #accbec6b;
  }
</style>

<body>


  <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>


  <!--Head navbar-->
  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/head_navbar.php';

    ?>
  </div>
  <!--Main Part-->
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">

          <h1 class="text-success">
            <img style="height:35px; width:45px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Academics.png">
            Academic <?php if(isset($_SESSION['division_NAME'])){ echo $_SESSION['division_NAME']; } ?>
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
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
              <!--Student name And course name-->
              <?php include 'courcecode.php'; ?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <input style="margin:5px;" class="form-control" type="text" id="academicsearch" onkeyup="academic()" placeholder="Search for Academic name.." title="Type in a name">
              <?php if (isset($_REQUEST['noti_id'])) {
                $noti_id = $_REQUEST['noti_id'];
                $update_read = "UPDATE `notifications`
                      SET `is_read` = 1 WHERE `id`='$noti_id'";
                $update_statement = $connect->prepare($update_read);
                $update_statement->execute();
              } ?>

              <input type="hidden" id="ac_std_id" value="<?php echo $fetchuser_id ?>">

              <?php
              // var_dump($std_course1);
              $query = "SELECT * FROM acedemic_phase where ctp_id='$std_course1'";
              $statement = $connect->prepare($query);
              $statement->execute();
              $result = $statement->fetchAll();
              foreach ($result as $row) {

              ?>
                <?php
                $phase = $row['phase'];
                $sel_ctp_nam = $connect->prepare("SELECT phasename FROM phase WHERE id=?");
                $sel_ctp_nam->execute([$phase]);
                $sel_ctp_nam_data2 = $sel_ctp_nam->fetchColumn();
                echo $phase_name = '<div><h4 style="color:blue" id="phase"><label class="text-dark">Phase : </label> ' . $sel_ctp_nam_data2 . '</h4></div>';
                ?>
                <table class="table table-bordered academictable" id="academictable">
                  <br>
                  <thead class="bg-dark">
                    <tr>
                      <!-- <th class="text-white">Name</th> -->
                      <th class="text-white">symbol</th>
                      <th class="text-white">Done</th>
                      <th class="text-white">Given By</th>
                      <th class="text-white">Updated By</th>
                      <th class="text-white">Date</th>
                      <th class="text-white">Prereuisites</th>
                      <th class="text-white">Updated</th>
                      <th class="text-white">view</th>
                      <?php if (isset($_SESSION['permission']) && $permission['give_Acedemic'] == "1" || $permission['Clear_Acedemic'] == "1") { ?>
                        <th class="text-white">Action</th>
                      <?php } ?>
                      <?php
                      if (isset($_SESSION['permission']) && $permission['ask_Acedemic'] == "1") {
                      ?>
                        <th class="text-white">With Instructor</th>
                      <?php } ?>
                    </tr>
                  </thead>


                  <?php
                  $sel_ctp_role_data2 = "";
                  $query_aca = "SELECT * FROM academic where phase='$phase'";
                  $statement_aca = $connect->prepare($query_aca);
                  $statement_aca->execute();
                  if ($statement_aca->rowCount() > 0) {
                    $result_aca = $statement_aca->fetchAll();
                    foreach ($result_aca as $row) {
                      $classid1 = $row['id'];
                      $icon = "";
                      $formatted_date = "";
                      $updatedBy = "";
                      $sel_ctp_nam2_data2 = "";
                      $sel_ctp_nam4_data2 = "";
                      $sel_ctp_nam1 = $connect->prepare("SELECT permission FROM acedemic_stu WHERE std_id=? and acedemic_id=?");
                      $sel_ctp_nam1->execute([$fetchuser_id, $classid1]);
                      $sel_ctp_nam1_data2 = $sel_ctp_nam1->fetchColumn();

                      $fetchUpdateDateQ = $connect->query("SELECT updateDate FROM acedemic_stu WHERE acedemic_id = $classid1 AND std_id = '$fetchuser_id'");
                      $fetchUpdateDateData = $fetchUpdateDateQ->fetchColumn();

                      if ($sel_ctp_nam1_data2 == '1') {
                        $sel_ctp_nam2 = $connect->prepare("SELECT date,updatedBy FROM acedemic_stu WHERE std_id=? and acedemic_id=?");
                        $sel_ctp_nam2->execute([$fetchuser_id, $classid1]);
                        $sel_ctp_nam2_data2 = $sel_ctp_nam2->fetch();
                        $formatted_date = date('y-m-d', strtotime($sel_ctp_nam2_data2['date']));
                        $fetchInstName = $connect->query("SELECT nickname FROM users WHERE id = '" . $sel_ctp_nam2_data2['updatedBy'] . "'");
                        $updatedBy = $fetchInstName->fetchColumn();
                        $sel_ctp_nam3 = $connect->prepare("SELECT `user_id` FROM notifications WHERE `to_userid`='$fetchuser_id' and `type`='academic' and `data`='$classid1' and extra_data='Has Accepted Academic For'");
                        $sel_ctp_nam3->execute();

                        $sel_ctp_nam3_data2 = $sel_ctp_nam3->fetchColumn();
                        $sel_ctp_nam4 = $connect->prepare("SELECT `nickname` FROM users WHERE `id`='$sel_ctp_nam3_data2'");
                        $sel_ctp_nam4->execute();
                        $sel_ctp_nam4_data2 = $sel_ctp_nam4->fetchColumn();
                        $sel_ctp_nam41 = $connect->prepare("SELECT `role` FROM users WHERE `id`='$sel_ctp_nam3_data2'");
                        $sel_ctp_nam41->execute();
                        $sel_ctp_role_data2 = $sel_ctp_nam41->fetchColumn();
                        $formatted_date = date('y-m-d', strtotime($sel_ctp_nam2_data2['date']));
                        $icon = '<span><i style="margin:5px; font-size:30px;" class="bi bi-check-circle text-success"></i></span>';
                      }
                  ?>
                      <tbody>
                        <tr>
                          <td style="width:200px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?php echo $row['academic'] ?>">
                            <h3 class="text-danger"><?php echo $row['shortacademic']; ?></h3>
                          </td>
                          <td>
                            <?Php echo $icon; ?>
                          </td>

                          <td><?php echo $sel_ctp_nam4_data2; ?></td>
                          <td>
                            <?php
                            echo $updatedBy;
                            ?>
                          </td>
                          <td style="width:100px;">

                            <?php echo $formatted_date; ?>
                          </td>
                          <td><?php
                              $fet = "SELECT * FROM prereuisite_data WHERE class_id='$classid1' AND class_table='academic' group by class_id,class_table,id";

                              $statement = $connect->prepare($fet);
                              $statement->execute();
                              if ($statement->rowCount() > 0) {
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
                                  <li style="text-decoration: none; margin: -5px; margin-right: -1px;" class="<?php echo $class ?>"><?php echo $name; ?></li>
                                </ul>
                              <?php }
                              } else { ?>
                              <!-- <a href="prereuisite.php" class="btn btn-soft-info">Add</a> -->
                            <?php }
                            ?>
                          </td>
                          <td>
                            <?php
                            $fileId = $row['file'];
                            $cId = 0;
                            $inst_Id = "";
                            if (is_numeric($fileId)) {
                              $fetchInst = $connect->query("SELECT * FROM academicassignee WHERE filesId = '$fileId' AND status = 'done'");
                              while ($instDetail = $fetchInst->fetch()) {
                                $instId = $instDetail['instId'];
                                $pId = $instDetail['phaseId'];
                                $fetchCourseDetail = $connect->query("SELECT * FROM manage_role_course_phase WHERE intructor = '$instId' AND phase_id = '$pId'");
                                while ($fetchCourseDetailData = $fetchCourseDetail->fetch()) {
                                  if ($fetchCourseDetailData['courseCode'] > $cId) {
                                    $cId = $fetchCourseDetailData['courseCode'];
                                    $cName = $fetchCourseDetailData['courseName'];
                                    $inst_Id = $fetchCourseDetailData['intructor'];
                                  }
                                }
                              }
                            }
                            if ($inst_Id != "") {
                              $instN = $connect->query("SELECT nickname FROM users WHERE id = '$inst_Id'");
                              $courseD = $connect->query("SELECT symbol,color FROM ctppage WHERE CTPid = '$cName'");
                              $courseSym = $courseD->fetch();
                              // echo $instN->fetchColumn() . " ," . $courseD->fetchColumn() . "-0" . $cId;
                            ?>
                              <span style="font-weight: bold;font-size: large;"><?php echo $instN->fetchColumn(); ?></span> - <span class="badge rounded-pill bg-warning" style="background-color:<?php echo $courseSym['color']; ?>!important;font-size:large;"><?php echo $courseSym['symbol'] . "-" . $cId; ?></span>
                            <?php } else {
                              echo "-";
                            }
                            ?>
                          </td>

                          <td class="url_td">
                            <?php
                            if (is_numeric($fileId)) {
                              $fetchFile = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
                              $fileDataUser = $fetchFile->fetch();
                              if ($fileDataUser['lastName'] == "") {
                            ?>
                                <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileDataUser['filename']; ?>">View</a>
                              <?php
                              }
                              if ($fileDataUser['type'] == "online") {
                              ?>
                                <a target="_blank" href="<?php echo $fileDataUser['filename']; ?>" title="<?php echo $fileDataUser['filename']; ?>">View</a>
                              <?php
                              }
                              if ($fileDataUser['type'] == "offline") {
                              ?>
                                <a class="driveLinkPer" value="<?php echo $fileDataUser['filename']; ?>" title="<?php echo $fileDataUser['filename']; ?>">View</a>
                            <?php
                              }
                            }
                            ?>
                          </td>

                          <?php
                          if (isset($_SESSION['permission']) && $permission['ask_Acedemic'] == "1") {
                            $check_ac = "SELECT * FROM acedemic_stu where std_id='$user_id' and acedemic_id='$classid1' and permission='1'";

                            $check_acst = $connect->prepare($check_ac);
                            $check_acst->execute();

                            if ($check_acst->rowCount() <= 0) {
                          ?>
                              <td><button onclick="document.getElementById('ac_id').value='<?php echo $row['id'] ?>';" data-bs-toggle="modal" data-bs-target="#send-instructor" class="btn btn-primary">With Instructor</button></td>
                            <?php } else { ?>
                              <td>
                                <span>Completed</span>
                              </td>
                          <?php }
                          }

                          ?>
                          <?php if (isset($_SESSION['permission']) && $permission['give_Acedemic'] == "1" || $permission['Clear_Acedemic'] == "1") { ?>
                            <td>
                              <?php if (isset($_SESSION['permission']) && $permission['give_Acedemic'] == "1") { ?>
                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#give_academic" id="give_academic1" onclick="document.getElementById('ace_id').value='<?php echo $row['id'] ?>';">Give</a>
                              <?php } ?>
                              <?php if (isset($_SESSION['permission']) && $permission['Clear_Acedemic'] == "1") { ?>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#clear_academic1" onclick="document.getElementById('ace_id1').value='<?php echo $row['id'] ?>';">Clear</a>
                              <?php } ?>
                            </td>
                          <?php } ?>


                        </tr>
                      </tbody>

                  <?php
                    }
                  }
                  ?>
                </table><br>


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

  <div class="modal fade animate-zoom" id="url2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Copied!!!</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-field">
            <div class="view_url2"></div>
            <br>
          </div>


        </div>
      </div>
    </div>
  </div>


  <!--modal for class self study and intructor--->
  <div class="modal fade" id="open-files" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success" id="exampleModalLabel"><input style="width:max-content; background-color:white; font-weight:bold; text-align:left; text-decoration:underline;" readonly id="file_name" value="<?php echo $row["file"]; ?>" /></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <table>
              <tr>
                <input type="hidden" value="" id="aced_id" name="aced_id">

                <td><input id="file_name" value="upload/<?php echo $row["file"]; ?>" /></td>
                <td><button class="btn btn-success"><a style="color:black;" href="upload/<?php echo $row["file"]; ?>" target="_blank">Self Study</a></button></td>
                <td><!-- <button data-bs-toggle="modal" data-bs-target="#send-instructor" class="btn btn-primary">With Instructor</button> --></td>
              </tr>
            </table>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


  <!--Modal For Instructor-->
  <div class="modal fade" id="send-instructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Contact Instructor</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form action="select_acedmic_ins.php" method="post">
              <input type="hidden" id="ac_id" value="" name="aced_id">
              <!-- <input type="hidden" value="" id="aced_id" name="aced_id"> -->
              <input type="hidden" value="<?php echo $user_id ?>" name="login_id">
              <label class="form-label" for="Instructor" name="choose instructor" style="color:black; font-weight:bold;">Select Instructor</label>
              <select type="text" id="instructor" class="form-control form-control-md" name="Instructor" required>
                <option selected disabled value="">-select instructor-</option>
                <?php echo $in ?>
              </select><br>
              <input type="submit" class="btn btn-success" value="select">
            </form>
          </center>
        </div>

      </div>
    </div>
  </div>


  <!-- Modal For give academic-->
  <div class="modal fade" id="give_academic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Select Student to give class</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col">
                <form action="add_std_acedemic.php" method="post">
                  <input type="hidden" id="ace_id" value="" name="aced_id">
                  <input type="hidden" name="">

                  <div id="user_idded">
                    <label class="form-label text-dark" style="font-weight:bold;">Instructor</label>
                    <input type="text" class="form-control" id="username-input" placeholder="Search Instructor">
                    <div id="suggestions" style="width:auto; border-radius: 10px;" class="bg-soft-dark">
                    </div>
                  </div>
                  <br>

                  <table class="table table-bordered table-striped" id="student_fetch1">
                    <thead class="bg-dark">
                      <tr>

                        <th class="text-white"><input type="checkbox" name="checkall[]" id="checkall"></th>
                        <th class="text-white">Name</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                  <input style="float:right;" class="btn btn-success" type="submit" name="" value="Select">
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>
  <div class="modal fade" id="clear_academic1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header btn-danger text-center" style="height: 110px;">
          <h6 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Clear acedemic</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
        </div>
        <div class="modal-body">
          <center>
            <form action="clear_acedemic.php">
              <input type="hidden" id="ace_id1" name="ace_id1">
              <input type="hidden" name="u_id" value="<?php echo $fetchuser_id; ?>">
              <input class="form-control" type="text" id="check_admin_username" class="login-input" name="username" placeholder="Username" autofocus="true" /><br>
              <input class="form-control" type="password" id="check_admin_password" class="login-input" name="password" placeholder="Password" /><br>
              <hr>
              <input class="btn btn-outline-success" type="submit" value="Submit" name="login" class="login-button" style="font-weight:bold; font-size: large; float:right;" />
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->


  <script>
    $('#myTable').margetable({
      type: 1,
      colindex: [{
        index: 1,
        dependent: [0]
      }]
    });
  </script>

  <!-- <script>
function academic() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("academicsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("academictable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
</script> -->

  <script>
    document.getElementById('checkall').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  <script type="text/javascript">
    $(".url_td").on("click", "button", function() {
      var id = $(this).attr('id');
      var text1 = $('.get_valuec' + id).text();
      var temp2 = $("<input>");
      $("body").append(temp2);
      temp2.val(text1).select();
      document.execCommand("copy");
      temp2.remove();
      $('.url_td').find("#" + id).find(".bi").removeClass("bi-files").addClass("bi-check-circle");
      $('.url_td').find("#" + id).removeClass("btn-soft-primary").addClass("btn-soft-success");
      setTimeout(function() {
        $('.url_td').find("#" + id).find(".bi").removeClass("bi-check-circle").addClass("bi-files");
        $('.url_td').find("#" + id).removeClass("btn-soft-success").addClass("btn-soft-primary");
      }, 1000);
    });
    $(document).ready(function() {
      $("#academicsearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".academictable tbody tr").filter(function() {
          $(this).toggle($(this).find("td:eq(0)").text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  <script>
    $(".copyLink").on("click", function() {
      setTimeout(copURL, 2000);
    });

    function copURL() {
      window.open("<?php echo BASE_URL; ?>openPageIllu.php", "_blank");
    }
  </script>
  <script>
    $(document).on("click", "#give_academic1", function() {
      var got_id = $("#ace_id").val();
      const cCourse = <?php echo $CourseCode11; ?>;
      // var user_id=$("#ac_std_id").val();

      $.ajax({
        type: 'POST',
        url: 'fetch_student_acedemic1.php',
        data: {
          id: got_id,
          cCourse: cCourse
        },
        success: function(response) {

          $('#student_fetch1 tbody').empty();
          $("#student_fetch1 tbody").append(response);

        }
      });

    });
  </script>



  <script>
    $(document).ready(function() {
      // Initialize an empty array to store selected user IDs
      let selectedUserIds = [];
       // $("#username-input").on("keyup", function() {
      $(document).on("keyup", "#username-input", function() {
        let keyword = $(this).val();
        // alert(keyword);

        // Make an AJAX request to fetch username suggestions
        $.ajax({
          url: "<?php echo BASE_URL; ?>includes/Pages/test/fetch_user_info.php",
          method: "POST",
          data: {
            instName: keyword
          },
          success: function(data) {
            // Parse the JSON response
            let suggestions = JSON.parse(data);

            // Clear and populate the suggestions box
            let suggestionsBox = $("#suggestions");
            suggestionsBox.empty();

            if (suggestions.length > 0) {
              suggestions.forEach(function(user) {
                let isChecked = selectedUserIds.includes(user.id) ? "checked" : "";
                if (user.id == <?php echo $user_id; ?>) {
                  isChecked = "checked";
                }
                suggestionsBox.append(
                  `<div class="suggestion-item" style="font-size:x-large;"><input style="height: 15px;width: 15px;margin: 5px;" type="radio" name="ses_id" value="${user.id}" ${isChecked}>${user.nickname}</div>`
                );
              });

              suggestionsBox.show();
            } else {
              suggestionsBox.hide();
            }
          },
        });
      });

      // Handle checkbox clicks
      $("#suggestions").on("click", ".suggestion-item input[type='checkbox']", function() {
        let selectedUserId = $(this).val();
        if ($(this).prop("checked")) {
          // Add the selected user ID to the array if it's checked
          selectedUserIds.push(selectedUserId);
        } else {
          // Remove the selected user ID from the array if it's unchecked
          selectedUserIds = selectedUserIds.filter(id => id !== selectedUserId);
        }
        console.log("Selected User IDs: " + selectedUserIds.join(", "));
      });
    });
  </script>
  <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

</body>

</html>