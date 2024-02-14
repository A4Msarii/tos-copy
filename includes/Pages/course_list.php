<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Course List</title>
  <!-- <title>Phase</title> -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

<body>

  <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
              <h2 class="text-success">Course List</h2>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <center>
                <table class="table table-striped table-bordered" id="newcoursetable">
                  <input style="margin: 5px;" class="form-control" type="text" id="newcoursesearch" onkeyup="course()" placeholder="Search for Course name.." title="Type in a name">
                  <thead class="bg-dark">
                    <th class="text-light">Sr No</th>
                    <!-- <th class="text-light">Course Id</th> -->
                    <th class="text-light">Course Name</th>
                    <th class="text-light">Course Code</th>
                    <th class="text-light">Course Date</th>
                    <th class="text-light">Nick Name</th>
                    <th class="text-light">Student Names</th>
                    <th class="text-light">Course Manager</th>
                    <th class="text-light">Action</th>
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
                          <a class="btn btn-soft-warning btn-xs get_course_phase" data-getvalue="<?php echo $row1['Courseid']; ?>" id="<?php echo $row1['Courseid']; ?>" data-bs-toggle="modal" data-bs-target="#editphasecourse" onclick="document.getElementById('Courseid_val').value='<?php echo $row1['Courseid'] ?>';"><i class="bi bi-list-check"></i></a>

                          <a class="btn btn-soft-warning btn-xs get_course_phase" id="" data-bs-toggle="modal" data-bs-target="#givePermission" onclick="document.getElementById('permissionCourse').value='<?php echo $row1['Courseid'] ?>';">
                            <i class="bi bi-file-lock2-fill"></i>
                          </a>
                          
                          <a class="btn btn-soft-secondary btn-xs" href="archive_course.php?coursecode=<?php echo $course?>&coursename=<?php echo $crs_name;?>">
                            <i class="bi bi-archive-fill"></i>
                          </a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </table>
              </center>
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

  <div class="modal fade" id="editcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit New Course</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="edit_course.php" id="course_edit_fetched_data">
            <div id="get_course_foem"></div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editphasecourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h3 class="modal-title text-success" id="exampleModalLabel">Edit phase</h3> -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="get_course_foem1" method="post" action="#">


          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="givePermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Give Permission</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo BASE_URL; ?>includes/Pages/coursePermission.php">
            <input type="hidden" name="permissionCourse" id="permissionCourse" />
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionRole">
                    <option disabled selected>Select Group</option>
                    <?php
                    foreach ($alert_data_roles as $alrole) {
                      if ($alrole['roles'] == 'super admin') {
                        continue;
                      } else {
                        echo "<option value='" . $alrole['roles'] . "'>" . $alrole['roles'] . "</option>";
                      }
                    }
                    echo "<option selected value='everyone'>Everyone</option>";
                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="getusernamealert" id="getuserforshare" aria-describedby="helpId" placeholder="send individual">
                </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-12" style="justify-content: center;display: grid;">
                  <table class="table table-bordered sharetableData" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-white">#</th>
                        <th class="text-white">Profile Image</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">NickName</th>

                      </tr>
                    </thead>
                    <tbody class="alertuserDetail">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <br>
            <center>
              <input class="btn btn-success" type="submit" value="Share" name="shareCoursePermission" />
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include ROOT_PATH . "includes/Pages/courseList.php"; ?>

  <script>
    function course() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("newcoursesearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("newcoursetable");
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
    function userlist() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("usersearch");
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

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
  <script src="<?php echo BASE_URL; ?>includes/Pages/loading.js"></script>
</body>

</html>