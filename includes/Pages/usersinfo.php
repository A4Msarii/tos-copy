<!--Fethching ctp name-->
<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$output2 = "";
$query2 = "SELECT * FROM ctppage  ORDER BY CTPid DESC";
$statement2 = $connect->prepare($query2);
$statement2->execute();

if ($statement2->rowCount() > 0) {
  $result2 = $statement2->fetchAll();

  foreach ($result2 as $row2) {
    $output2 .= '<option value="' . $row2['CTPid'] . '">' . $row2['course'] . '</option>';
  }
}
?>
<?php
$vehicate = "";
$cate = "SELECT * FROM vehicletype ORDER BY vehid ASC";
$state = $connect->prepare($cate);
$state->execute();
if ($state->rowCount() > 0) {
  $ans = $state->fetchAll();
  foreach ($ans as $r) {
    $vehicate .= '<option value="' . $r['vehid'] . '">' . $r['vehicletype'] . '</option>';
  }
}

$pm = "";
$q2 = "SELECT * FROM users where role='Phase Manager'";
$st2 = $connect->prepare($q2);
$st2->execute();

if ($st2->rowCount() > 0) {
  $re2 = $st2->fetchAll();
  foreach ($re2 as $row2) {
    $pm .= '<option value="' . $row2['id'] . '">' . $row2['name'] . '</option>';
  }
}

$cm = "";
$q3 = "SELECT * FROM users where role='course manager'";
$st3 = $connect->prepare($q3);
$st3->execute();

if ($st3->rowCount() > 0) {
  $re3 = $st3->fetchAll();
  foreach ($re3 as $row3) {
    $cm .= '<option value="' . $row3['id'] . '">' . $row3['name'] . '</option>';
  }
}
$std = "";
$q4 = "SELECT * FROM users where role='student'";
$st4 = $connect->prepare($q4);
$st4->execute();

if ($st4->rowCount() > 0) {
  $re4 = $st4->fetchAll();
  foreach ($re4 as $row4) {
    $std .= '<option value="' . $row4['id'] . '">' . $row4['name'] . '</option>';
  }
}

$ins = "";
$q5 = "SELECT * FROM users where role='Instructor'";
$st5 = $connect->prepare($q5);
$st5->execute();

if ($st5->rowCount() > 0) {
  $re5 = $st5->fetchAll();
  foreach ($re5 as $row5) {
    $ins .= '<option value="' . $row5['id'] . '">' . $row5['name'] . '</option>';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Data Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<!-- <style type="text/css">
  ::-webkit-scrollbar
    {
      width: 2rem;
    }
</style> -->

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 
  <div>

    <div id="header-hide">
      <!--Head Navbar-->
      <?php
      include(ROOT_PATH . 'includes/head_navbar.php');
      ?>
    </div>
    <!--Main contect We need to insert data here-->
    <main id="content" role="main" class="main">
      <!-- Content -->
      <div>
        <div class="content container-fluid" style="height: 30rem;">
          <!-- Page Header -->
          <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
          <div class="page-header" style="padding: 0px;">
            <h1 class="text-success">Data Page</h1>
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
            <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

              <!-- Body -->
              <div class="card-body">
                
                <ul class="nav nav-pills justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active text-secondary" id="user-tab" href="#user" data-bs-toggle="pill" data-bs-target="#user" role="tab" aria-controls="user" aria-selected="true">
                      <div class="d-flex align-items-center">
                        Users
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-secondary" id="vehicle-tab" href="#vehicle" data-bs-toggle="pill" data-bs-target="#vehicle" role="tab" aria-controls="vehicle" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Equipments
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-secondary" id="newcourse-tab" href="#newcourse" data-bs-toggle="pill" data-bs-target="#newcourse" role="tab" aria-controls="newcourse" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Courses
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-secondary" id="ctp-tab" href="#ctp" data-bs-toggle="pill" data-bs-target="#ctp" role="tab" aria-controls="ctp" aria-selected="false">
                      <div class="d-flex align-items-center">
                        CTP'S
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-secondary" id="setting-tab" href="#setting" data-bs-toggle="pill" data-bs-target="#setting" role="tab" aria-controls="setting" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Settings
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-secondary" id="" href="<?php echo BASE_URL; ?>includes/Pages/file_management.php" role="tab" aria-controls="files" aria-selected="false">
                      <div class="d-flex align-items-center">
                        File Management
                      </div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-secondary" id="apps-tab" href="#apps" data-bs-toggle="pill" data-bs-target="#apps" role="tab" aria-controls="apps" aria-selected="false">
                      <div class="d-flex align-items-center">
                        Apps
                      </div>
                    </a>
                  </li>
                </ul>
                <!-- End Nav -->
              </div>
              <!-- End Body -->
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->
        <!--Second Row start-->
        <div class="row justify-content-center">

          <div class="col-lg-10 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

              <!-- Body -->
              <div class="card-body">
                <!-- Tab Content -->
                <center>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                      <a class="btn btn-secondary" id="btn-success" style="color:white;" href="roles.php" onclick="manage()">Manage Roles</a>
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#newuser_head">Register User</button>
                      <a type="button" class="btn btn-secondary" style="color:white;" href="user_list.php" onclick="userlist()">User List</a>
                      <a type="button" class="btn btn-secondary" href="<?php echo BASE_URL; ?>includes/Pages/profile.php">My Profile</a>
                    </div>

                    <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add_cate_head" onclick="addcate()">Add Category</button>
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addvehicle_head" onclick="addvehicle()">Add Equipment</button>
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#vehiclecate_list_head">Equipment Category List</button>
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#vehicle_list_head">Equipment List</button>
                    </div>

                    <div class="tab-pane fade" id="newcourse" role="tabpanel" aria-labelledby="newcourse-tab">
                      <a class="btn btn-secondary" style="color:white;" href="newcourse.php" onclick="addnewcourse()">Add New Course</a>
                      <a class="btn btn-secondary" style="color:white;" href="quiz_data.php">Quiz</a>
                      <a class="btn btn-secondary" type="button" type="button" data-bs-toggle="modal" data-bs-target="#select_course">Add Group</a>
                      <a type="button" class="btn btn-secondary" href="<?php echo BASE_URL; ?>includes/Pages/course_list.php">Course List</a>
                      
                      <a class="btn btn-secondary" type="button" href="mange_course_ctp.php" style="color:white;">Manage Course</a>
                    </div>

                    <div class="tab-pane fade" id="ctp" role="tabpanel" aria-labelledby="ctp-tab">
                      <a class="btn btn-secondary" style="color:white;" href="ctp.php">Add New CTP</a>
                      <a type="button" class="btn btn-secondary" style="color:white;" href="Next-home.php">Phase</a>
                      
                      <a type="button" class="btn btn-secondary" href="<?php echo BASE_URL; ?>includes/Pages/ctp_list.php">CTP List</a>
                      <button class="btn btn-secondary" type="button" onclick="scoringbtn()">Scoring</button>
                      <a class="btn btn-secondary" type="button" style="color:white;" href="prereuisite.php">Prerequisite</a>
                      <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#class_modal">Class</button>
                    </div>

                    <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                      <a class="btn btn-secondary" href="<?php echo BASE_URL; ?>includes/Pages/department_list.php">Department</a>
                      <a class="btn btn-secondary" href="<?php echo BASE_URL; ?>includes/Pages/department.php">Main Department</a>
                      <a class="btn btn-secondary" href="<?php echo BASE_URL; ?>includes/Pages/dataBase.php">DataBase</a>
                      <a class="btn btn-secondary" href="<?php echo BASE_URL; ?>includes/Pages/division.php">Division</a>
                      <a class="btn btn-secondary" type="button" >Landing Page</a>
                    </div>



                    <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="file-tab">
                      <a class="btn btn-secondary" type="button" href="<?php echo BASE_URL; ?>includes/Pages/multiple_files.php">Add Files</a>
                      <a type="button" class="btn btn-secondary" href="<?php echo BASE_URL; ?>includes/Pages/briefcase.php">Add Briefcase</a>
                      <a class="btn btn-secondary" type="button" href="<?php echo BASE_URL; ?>includes/Pages/folder.php">Add Folders</a>
                      <a class="btn btn-secondary" type="button" href="<?php echo BASE_URL; ?>includes/Pages/shops.php">Add Shops</a>
                      <a class="btn btn-secondary" type="button" href="<?php echo BASE_URL; ?>includes/Pages/editor.php">New Page</a>
                    </div>

                    <div class="tab-pane fade" id="apps" role="tabpanel" aria-labelledby="apps-tab">
                      <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                          <a class="btn btn-secondary active" id="gradesheet-tab" href="#gradesheet" data-bs-toggle="pill" data-bs-target="#gradesheet" role="tab" aria-controls="gradesheet" aria-selected="true">
                            <div class="d-flex align-items-center">
                              Grade Sheet
                            </div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-secondary" id="schedulling-tab" href="#schedulling" data-bs-toggle="pill" data-bs-target="#schedulling" role="tab" aria-controls="schedulling" aria-selected="false">
                            <div class="d-flex align-items-center">
                              Schedulling
                            </div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-secondary" id="library-tab" href="#library" data-bs-toggle="pill" data-bs-target="#library" role="tab" aria-controls="library" aria-selected="false">
                            <div class="d-flex align-items-center">
                              Library
                            </div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-secondary" id="BRI-tab" href="#BRI" data-bs-toggle="pill" data-bs-target="#BRI" role="tab" aria-controls="BRI" aria-selected="false">
                            <div class="d-flex align-items-center">
                              BRI
                            </div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div><br>
                </center>
              </div>

              <center>
                <div class="tab-content">
                  <div class="tab-pane fade active" id="gradesheet" role="tabpanel" aria-labelledby="gradesheet-tab">
                    <button style="margin:5px;" class="btn btn-secondary">Actual</button>
                    <button style="margin:5px;" class="btn btn-secondary">Sim</button>
                    <button style="margin:5px;" class="btn btn-secondary">Academic</button>
                    <button style="margin:5px;" class="btn btn-secondary">Tasklog</button>
                    <button style="margin:5px;" class="btn btn-secondary">Evaluation</button><br>
                    <button style="margin:5px;" class="btn btn-secondary">Activity</button>
                    <button style="margin:5px;" class="btn btn-secondary">Testing</button>
                    <button style="margin:5px;" class="btn btn-secondary">Emergency</button>
                    <button style="margin:5px;" class="btn btn-secondary">Qual</button>
                    <button style="margin:5px;" class="btn btn-secondary">Clearance</button><br>
                    <button style="margin:5px;" class="btn btn-secondary">CAP</button>
                    <button style="margin:5px;" class="btn btn-secondary">Memo</button>
                    <button style="margin:5px;" class="btn btn-secondary">Report</button>
                    <button style="margin:5px;" class="btn btn-secondary">Descipline</button>
                    <button style="margin:5px;" class="btn btn-secondary">Quiz</button>
                  </div>

                  <div class="tab-pane fade" id="schedulling" role="tabpanel" aria-labelledby="schedulling-tab">
                    <p>Schedulling Tab</p>
                  </div>

                  <div class="tab-pane fade" id="library" role="tabpanel" aria-labelledby="library-tab">
                    <p>library Tab</p>
                  </div>

                  <div class="tab-pane fade" id="BRI" role="tabpanel" aria-labelledby="BRI-tab">
                    <p>library Tab</p>
                  </div>
                </div>
              </center>


              <!-- End Card -->
            </div>
          </div>
          <!--Second End Row -->


        </div>

        <!--4th tabs row-->
        <center>
          <div class="row justify-content-center" style="display:none;" id="scoringrow">

            <div class="col-lg-10 mb-3 mb-lg-5">
              <!-- Card -->
              <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

                <!-- Body -->
                <div class="card-body">
                  <center>
                    <div id="scoretab" style="display:none;">
                      <button style="display:none;" class="btn btn-info" type="button" data-toggle="modal" data-target="#addpercentage">Insert Percentage</button>
                      <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#per_table_head" type="button">Percentage</button>
                      <button class="btn btn-secondary" id="permissionbtn" type="button" data-bs-toggle="modal" data-bs-target="#per_list_head">Permission</button>
                      <button class="btn btn-secondary"><a style="color:white;" href="addtype.php">Add Type</a></button>
                    </div>
                    <hr>

                  </center>

                  <!-- <div class="tab-content">
                  <div class="tab-pane fade show active" id="gradesheet" role="tabpanel" aria-labelledby="gradesheet-tab">
                    <button class="btn btn-secondary" id="btn-success"><a style="color:white;" href="roles.php" onclick="manage()">Manage Roles</a></button>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#newuser_head">Register User</button>
                    <button type="button" class="btn btn-secondary"><a style="color:white;" href="user_list.php" onclick="userlist()">User List</a></button>
                  </div>
                </div> -->
                </div>
                <!-- End Body -->
              </div>
              <!-- End Card -->
            </div>
          </div>
        </center>
        <!--4th End Row -->
      </div>
      <!-- End Content -->

    </main>

    <div class="modal fade" id="course_list_head1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Course List</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered" id="newcoursetable">
              <input style="margin: 5px;" class="form-control" type="text" id="newcoursesearch" onkeyup="course()" placeholder="Search for Course name.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <!-- <th class="text-white">Course Id</th> -->
                <th class="text-white">Course Name</th>
                <th class="text-white">Course Code</th>
                <th class="text-white">Course Date</th>
                <th class="text-white">Nick Name</th>
                <th class="text-white">Student Names</th>
                <th class="text-white">Course Manager</th>
                <th class="text-white">Action</th>
              </thead>
              <?php

              $query1_cs = "SELECT * FROM newcourse group by CourseCode,CourseName";
              $statement1_cs = $connect->prepare($query1_cs);
              $statement1_cs->execute();
              if ($statement1_cs->rowCount() > 0) {
                $result1_cs = $statement1_cs->fetchAll();
                $sn1 = 1;
                foreach ($result1_cs as $row1) {
                  $crs_name = $row1['CourseName'];
                  $course_name = $connect->prepare("SELECT course FROM ctppage WHERE CTPid=?");
                  $course_name->execute([$crs_name]);
                  $name2 = $course_name->fetchColumn();
                  $crs_man = $row1['CourseManager'];
                  $course_man = $connect->prepare("SELECT nickname FROM users WHERE id=?");
                  $course_man->execute([$crs_man]);
                  $name2_man = $course_man->fetchColumn();
              ?>
                  <tr>
                    <td><?php echo $sn1++; ?></td>
                    <td><?php echo $name2; ?></td>
                    <td><?php echo $course = $row1['CourseCode']; ?></td>
                    <td><?php echo $row1['CourseDate']; ?></td>
                    <td><?php echo $row1['nick_name']; ?></td>
                    <td><?php
                        $query_for_student = "SELECT * FROM newcourse where CourseCode='$course' and CourseName='$crs_name'";
                        $statement_query_for_student = $connect->prepare($query_for_student);
                        $statement_query_for_student->execute();
                        if ($statement_query_for_student->rowCount() > 0) {
                          $result_query_for_student = $statement_query_for_student->fetchAll();
                          foreach ($result_query_for_student as $row_query_for_student) {
                            $course_ides = $row_query_for_student['Courseid'];
                            $std_id = $row_query_for_student['StudentNames'];
                            $query2 = "SELECT * FROM users where id='$std_id'";
                            $statement2 = $connect->prepare($query2);
                            $statement2->execute();
                            if ($statement2->rowCount() > 0) {
                              $result2 = $statement2->fetchAll();

                              foreach ($result2 as $row2) {

                        ?>

                              <ul style=" list-style-type: none; display: block;">
                                <li style="text-decoration: none;"><?php echo $row2['name']; ?>
                                  <a href="delete_student_course.php?id=<?php echo $course_ides ?>"><i class="bi bi-x-circle"></i></a>

                                </li>
                              </ul>
                      <?php }
                            }
                          }
                        }
                      ?>
                    </td>
                    <td><?php echo $name2_man; ?></td>
                    <td><a class="btn btn-soft-success btn-xs edit_course_data" id="<?php echo $row1['Courseid'] ?>" data-bs-toggle="modal" data-bs-target="#editcourse"><i class="bi bi-pen-fill" class="fetch_course_data"></i></a>
                      <a class="btn btn-soft-danger btn-xs" href="newcourse_delete.php?Courseid=<?php echo $row1['Courseid'] ?>"><i class="bi bi-trash-fill"></i></a>
                      <a class="btn btn-soft-success btn-xs select_course" value="<?php echo $row1['CourseName'] ?>" name="<?php echo $row1['Courseid'] ?>" data-bs-toggle="modal" data-bs-target="#fetchPhase"><i class="bi bi-pen-fill" class="fetch_course_data"></i></a>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="fetchPhase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Edit Phase</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form method="post" action="edit_course.php" id="course_edit_fetched_data">
              <div class="form-outline" id="phase-form1" style="display:grid;">

              </div>
            </form>

          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="Prereuisites_modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Select CTP</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <center>
              <form action="prereuisite.php" method="post">
                <label class="form-label text-dark" for="student" style="font-weight:bold; margin:5px;">Select CTP :</label>
                <select type="text" class="form-control form-control-md" name="pre_ctp" required>
                  <option selected disabled value="">-select CTP-</option>
                  <?php echo $output2 ?>
                </select>
                <br>
                <button class="btn btn-secondary" type="submit" name="submit_Phase">Way To Phase</button>
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->


    <!--Add Percentage modal-->
    <div class="modal fade" id="addpercentage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Add Percentage</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <center>
              <form action="insert_percentage_data.php" method="post">

                <div class="form-outline">
                  <label class="form-label text-dark" for="percentagetype" style="font-weight:bold; margin:5px;">Percentage Type :</label>
                  <input type="text" name="percentagetype" class="form-control form-control-md" />
                </div>

                <div class="form-outline">
                  <label class="form-label text-dark" for="percentage" style="font-weight:bold; margin:5px;">Percentage :</label>
                  <input type="text" id="addmanual" name="percentage" class="form-control form-control-md" />
                </div>

                <div class="form-outline">
                  <label class="form-label text-dark" for="color" style="font-weight:bold; margin:5px;">Color :</label>
                  <input type="text" name="color" class="form-control form-control-md" />
                </div><br>
                <input class="btn btn-primary btn-md" type="submit" value="Submit" name="submitpercentage" />
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>




    <!-- modal for type ctp  -->
    <div class="modal fade" id="select_ctp_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Select CTP</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <center>
              <form action="addtype.php" method="post">
                <label class="form-label text-dark" for="student" style="font-weight:bold; margin:5px;">Select CTP :</label>
                <select type="text" class="form-control form-control-md" name="ctp" required>
                  <option selected disabled value="">-select CTP-</option>
                  <?php echo $output2 ?>
                </select>
                <br>
                <button class="btn btn-secondary" type="submit" name="submit_Phase">Way To Phase</button>
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
    <!--register new user modal-->

    <!--Fetch User List-->
    <div class="modal fade" id="user_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">User List</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php
            include('connect.php');
            $output_user = "";
            $query7 = "SELECT * FROM users  ORDER BY id ASC";
            $statement7 = $connect->prepare($query7);
            $statement7->execute();

            if ($statement7->rowCount() > 0) {
              $result7 = $statement7->fetchAll();
              $sn7 = 1;
              foreach ($result7 as $row7) {
                $output_user .= '
             <tr>
             <td>' . $sn7++ . '</td>
             <td>' . $row7['name'] . '</td>
             <td>' . $row7['studid'] . '</td>
             <td>' . $row7['role'] . '</td>
             <td>' . $row7['phone'] . '</td>
             <td>' . $row7['email'] . '</td>
             <td><a href="edituser-update.php?id=' . $row7["id"] . '"><i class="bi bi-pen-fill text-success"></i></a>
            <a href="user-delete.php?id=' . $row7["id"] . '"><i class="bi bi-trash-fill text-danger"></i></a></td>
             </tr>
             ';
              }
            }
            ?>
            <center>
              <input style="margin:5px;" class="form-control" type="text" id="userdata" onkeyup="userFunction()" placeholder="Search for names.." title="Type in a name">
              <table class="table table-striped table-bordered" id="usertable">
                <thead class="bg-dark">
                  <th class="text-white">Sr No</th>
                  <th class="text-white">Name</th>
                  <th class="text-white">User Id</th>
                  <th class="text-white">Role</th>
                  <th class="text-white">Phone Number</th>
                  <th class="text-white">email</th>
                  <th class="text-white">Action</th>

                </thead>
                <?php
                echo $output_user;
                ?>
              </table>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </li>
  </ul>
  </div>
  </div>
  </div>


  <!--edit user modal-->
  <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit User</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          $query4 = "SELECT * FROM users where id='$id'";
          $statement2 = $connect->prepare($query4);
          $statement2->execute();
          if ($statement2->rowCount() > 0) {
            $result2 = $statement2->fetchAll();
            $sn4 = 1;
            foreach ($result2 as $row2) {
          ?>
              <div class="container">
                <form method="post" action="update_user.php">
                  <input type="hidden" value="'.$id.'" name="user_dbid" class="form-control">

                  <label class="form-label text-dark" style="font-weight:bold;">Name :</label>
                  <input type="text" value="<?php echo $row2['name'] ?>" name="name" class="form-control">

                  <label class="form-label text-dark" style="font-weight:bold;">NickName :</label>
                  <input type="text" value="<?php echo $row2['nickname'] ?>" name="nickname" class="form-control">

                  <label class="form-label text-dark" style="font-weight:bold;">Role :</label>
                  <select name="role" class="form-control">
                    <option value="<?php echo $row2['role'] ?>" selected><?php echo $row2['role'] ?></option>
                    <option>Admin</option>
                    <option>Course Manager</option>
                    <option>Phase Manager</option>
                    <option>Instructor</option>
                    <option>Student</option>
                  </select>

                  <label class="form-label text-dark" style="font-weight:bold;">Student Id :</label>
                  <input type="text" value="<?php echo $row2['studid'] ?>" name="studid" class="form-control">

                  <label class="form-label text-dark" style="font-weight:bold;">Phone Number :</label>
                  <input type="text" value="<?php echo $row2['phone'] ?>" name="phone" class="form-control">

                  <label class="form-label text-dark" style="font-weight:bold;">Email id :</label>
                  <input type="text" value="<?php echo $row2['email'] ?>" name="email" class="form-control">
                  <br>
                  <input class="btn btn-secondary" type="submit" name="submit" value="Update">
                </form>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!--edit user modal-->
 

  

  <script>
    // Function to keep track of the last clicked tab and store it in sessionStorage
    function storeLastClickedTab() {
      // Retrieve the last clicked tab ID from sessionStorage
      var storedTab = sessionStorage.getItem('lastClickedTab');

      // If there is a stored tab, activate it on page load
      if (storedTab !== null) {
        $('a#' + storedTab).tab('show');
      }

      // When a tab is clicked, set the last clicked tab to its ID and store it in sessionStorage
      $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
        var lastClickedTab = e.target.id;
        sessionStorage.setItem('lastClickedTab', lastClickedTab);
      });
    }

    // Function to stay on the last clicked tab after form submission
    function stayOnLastClickedTab() {
      // Retrieve the last clicked tab ID from sessionStorage
      var storedTab = sessionStorage.getItem('lastClickedTab');

      // When the form is submitted, stay on the last clicked tab
      $('form').submit(function() {
        // Perform form submission
        // ...
        console.log("lastClickedTab: " + lastClickedTab);
        // Activate the last clicked tab
        $('a#' + storedTab).tab('show');

        // Return false to prevent the form from submitting normally
        return false;
      });
    }

    // Call the functions on page load
    $(document).ready(function() {
      storeLastClickedTab();
      stayOnLastClickedTab();
    });
  </script>


  <script>
    // $(document).on("click","#fetch_course_data",function()
    // {

    //   var courseid=$("#Courseid").val();

    //   alert(courseid);
    //   if(courseid){
    //   $.ajax({
    //       type:'POST',
    //       url:'check_available_Student.php',
    //       data:'courseid='+courseid,
    //       success:function(response){
    //         // alert(response);
    //         // window.location.reload();
    //       }
    //     });
    //   }
    // }); 
    // $("#reg_form").on("change","#reg_studid",function()
    // {
    //   var check=$(this).val();

    //    if(check){
    //     $.ajax({
    //       type:'POST',
    //       url:'check_id.php',
    //       data:'check='+check,
    //       success:function(response){
    //         alert(response);

    //       }
    //     });
    //  }
    // });
    function scorebtn() {
      var x = document.getElementById("scoretable");
      var c = document.getElementById("scoresearch");
      if (x.style.display === "none" && c.style.display === "none") {
        x.style.display = "block";
        c.style.display = "block";
      } else {
        x.style.display = "none";
        c.style.display = "none";
      }
    }

    function vehiclebtn() {
      var y = document.getElementById("vehicletable");
      var d = document.getElementById("vehiclesearch");
      var z = document.getElementById("newcoursetable");
      var a = document.getElementById("newcoursesearch");
      var p = document.getElementById("ctptable");
      var q = document.getElementById("ctpsearch");
      var v = document.getElementById("departmenttable");
      var w = document.getElementById("departmentsearch");
      var o = document.getElementById("scoringrow");
      var g = document.getElementById("AllTables");
      if (y.style.display === "none" && d.style.display === "none") {
        y.style.display = "block";
        d.style.display = "block";
        g.style.display = "block";
        z.style.display = "none";
        a.style.display = "none";
        p.style.display = "none";
        q.style.display = "none";
        v.style.display = "none";
        w.style.display = "none";
        o.style.display = "none";
      } else {
        y.style.display = "none";
        d.style.display = "none";
      }
    }

    function newcoursebtn() {
      var z = document.getElementById("newcoursetable");
      var a = document.getElementById("newcoursesearch");
      var y = document.getElementById("vehicletable");
      var d = document.getElementById("vehiclesearch");
      var p = document.getElementById("ctptable");
      var q = document.getElementById("ctpsearch");
      var v = document.getElementById("departmenttable");
      var w = document.getElementById("departmentsearch");
      var o = document.getElementById("scoringrow");
      var g = document.getElementById("AllTables");
      if (z.style.display === "none" && a.style.display === "none") {
        z.style.display = "block";
        a.style.display = "block";
        g.style.display = "block";
        y.style.display = "none";
        d.style.display = "none";
        p.style.display = "none";
        q.style.display = "none";
        v.style.display = "none";
        w.style.display = "none";
        o.style.display = "none";
      } else {
        z.style.display = "none";
        a.style.display = "none";
      }
    }

    function ctpbtn() {
      var p = document.getElementById("ctptable");
      var q = document.getElementById("ctpsearch");
      var y = document.getElementById("vehicletable");
      var d = document.getElementById("vehiclesearch");
      var z = document.getElementById("newcoursetable");
      var a = document.getElementById("newcoursesearch");
      var v = document.getElementById("departmenttable");
      var w = document.getElementById("departmentsearch");
      var o = document.getElementById("scoringrow");
      var g = document.getElementById("AllTables");
      if (p.style.display === "none" && q.style.display === "none") {
        p.style.display = "block";
        q.style.display = "block";
        g.style.display = "block";
        y.style.display = "none";
        d.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        v.style.display = "none";
        w.style.display = "none";
        o.style.display = "none";
      } else {
        p.style.display = "none";
        q.style.display = "none";
      }
    }

    function departmentbtn() {
      var v = document.getElementById("departmenttable");
      var w = document.getElementById("departmentsearch");
      var p = document.getElementById("ctptable");
      var q = document.getElementById("ctpsearch");
      var y = document.getElementById("vehicletable");
      var d = document.getElementById("vehiclesearch");
      var z = document.getElementById("newcoursetable");
      var a = document.getElementById("newcoursesearch");
      var o = document.getElementById("scoringrow");
      var g = document.getElementById("AllTables");
      if (v.style.display === "none" && w.style.display === "none") {
        v.style.display = "block";
        w.style.display = "block";
        g.style.display = "block";
        y.style.display = "none";
        d.style.display = "none";
        z.style.display = "none";
        a.style.display = "none";
        p.style.display = "none";
        q.style.display = "none";
        o.style.display = "none";
      } else {
        v.style.display = "none";
        w.style.display = "none";
      }
    }

    function scoringbtn() {
      var f = document.getElementById("scoretab");
      var e = document.getElementById("scoringrow")
      if (f.style.display === "none") {
        f.style.display = "block";
        e.style.display = "block";

      } else {
        f.style.display = "none";

      }
    }

    function manage() {
      var o = document.getElementById("scoringrow").style.display = "none";
    }

    function register() {
      var o = document.getElementById("scoringrow").style.display = "none";
    }

    function addcate() {
      var o = document.getElementById("scoringrow").style.display = "none";
    }

    function addvehicle() {
      var o = document.getElementById("scoringrow").style.display = "none";
    }

    function addnewcourse() {
      var o = document.getElementById("scoringrow").style.display = "none";
    }
  </script>


  <!--Search Bar for user table-->
  <script>
    function userFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("userdata");
      filter = input.value.toUpperCase();
      table = document.getElementById("usertable");
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
  <!--Search bar for ctp table-->
  <script>
    function ctp() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("ctpsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("ctptable");
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
  <!--Search Bar for New course table-->
  <script>
    function newcourse() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("newcoursesearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("newcoursetable");
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
  <!--Search Bar for Vehicle table-->
  <script>
    function vehicle() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("vehiclesearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("vehicletable");
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
  <!--Search Bar for home pafe table-->
  <script>
    function department() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("departmentsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("departmenttable");
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
  <!--search bar for percentage table-->
  <script>
    function score() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("scoresearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("scoretable");
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
  $(".select_course").on("click", function() {
    const select_course2 = $(this).attr("value");
    const select_courseId = $(this).attr("name");

    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/check_count_ctp.php',
      data: {
        select_course2 : select_course2,
        select_courseId : select_courseId
      },
      success: function(response1) {
        // alert(response1);
        $("#phase-form1").empty();
        $("#phase-form1").html(response1);
      }
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