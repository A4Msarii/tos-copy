<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$in1 = "";
$q6 = "SELECT * FROM users where role='instructor'";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $in1 .= '<option value="' . $row6['id'] . '">' . $row6['nickname'] . '</option>';
  }
}
$inss= "";
$q21 = "SELECT * FROM roles";
$st21 = $connect->prepare($q21);
$st21->execute();
$re21 = $st21->fetchAll();
foreach ($re21 as $row21) {
   $row21['id'];
   $roled=unserialize($row21['permission']);
  if(isset($roled['coursemanager'])){
if($roled['coursemanager']==1){
    $roled=$row21['roles'];
$q2 = "SELECT * FROM users where role='$roled'";
$st2 = $connect->prepare($q2);
$st2->execute();
if ($st2->rowCount() > 0) {
  $re2 = $st2->fetchAll();
  foreach ($re2 as $row2) {
     $inss .= '<option value="' . $row2['id'] . '">' . $row2['nickname'] . '</option>';
   }
   }
    }
     }
  
}


 $ctp = "";
$q5 = "SELECT * FROM ctppage";
$st5 = $connect->prepare($q5);
$st5->execute();

if ($st5->rowCount() > 0) {
  $re5 = $st5->fetchAll();
  foreach ($re5 as $row5) {
    $ctp .= '<option value="' . $row5['CTPid'] . '">' . $row5['symbol'] . '</option>';
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>New Course</title>
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
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -20rem;">

      <div class="row justify-content-center">

        <div class="col-lg-10 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between">
              <h3 class="text-success">New course form</h3>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <form action="newcoursedata.php" method="post" style="width:100%;" id="course_form" enctype="multipart/form-data">

                <div class="row m-5">


                  <div class="col-md-6 mb-4">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#newuser"><i class="fas fa-user"></i>Add New Student</button>

                    <div class="form-outline">
                      <input type="hidden" name="value_enter" id="get_if_value">
                      <label class="form-label text-dark" for="coursename" style="font-weight:bold;">Course Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <select type="text" id="select_course" class="form-control form-control-md select_course" name="coursename" required>
                        <option selected disabled value="">-Select Course-</option>
                        <?php echo $ctp ?>
                      </select>

                    </div>

                  </div>
                  <div class="col-md-6 mb-4">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#newins"><i class="fas fa-user"></i>Add Course Manager</button>

                    <div class="form-outline">
                      <label class="form-label text-dark" for="coursename" style="font-weight:bold;">Select Value</label>
                      <select id="select_number_type" class="form-control form-control-md">

                        <option selected value="1">Initial value</option>
                        <option value="2">Enter value</option>
                      </select>

                    </div>

                  </div>
                  <div class="col-md-6 mb-4" id="enter_value" style="display:none">
                    <div class="form-outline">
                      <label class="form-label text-dark" for="coursename" style="font-weight:bold;">Enter Value<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input type="number" class="form-control form-control-md" name="CourseCode" value="1" id="enter_value_text">
                    </div>

                  </div>
                  <div class="col-md-6 mb-4" id="initial">
                    <div class="form-outline">
                      <label class="form-label text-dark" style="font-weight:bold;">Course Number</label>
                      <input style="background-color: #cec9c996;" type="text" readonly name="CourseCode" required id="CourseCode" value="" class="form-control form-control-md">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="nick_name" style="font-weight:bold;">Nick Name<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" type="text" name="nick_name" required />

                    </div>

                  </div>


                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="coursedate" style="font-weight:bold;">Date<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control form-control-md" type="date" name="coursedate" required />

                    </div>

                  </div>



                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="coursemanager" style="font-weight:bold;">Course Manager<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>

                      <select id="coursemanager" name="coursemanager" class="form-control form-control-md" required>
                    
                        <option selected disabled value="">-course manager-</option> 
                         <option value="">None</option>
                        <?php
                        echo $inss;

                        ?>

                      </select>
                      <br>
                    </div>
                  </div>

                  <div class="col-md-6 mb-4" style="display: none;">

                    <div class="form-outline">
                      <label class="form-label text-dark" style="color:black; font-weight:bold;">Insert Logo<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>
                      <input class="form-control" type="file" name="file" value="" /><br>
                    </div>

                  </div>

                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <?php
                      $std1 = "";
                      $q4 = "SELECT * FROM users where role='student'";
                      $st4 = $connect->prepare($q4);
                      $st4->execute();

                      if ($st4->rowCount() > 0) {
                        $re4 = $st4->fetchAll();
                        foreach ($re4 as $row4) {
                          $check_id = $row4['id'];
                          $check_std = "SELECT Courseid FROM newcourse where StudentNames='$check_id'";
                          $check_stdst = $connect->prepare($check_std);
                          $check_stdst->execute();
                          if ($check_stdst->rowCount() <= 0) {
                            $std1 .= '<option value="' . $row4['id'] . '">' . $row4['nickname'] . '</option>';
                          }
                        }
                      }
                      ?>
                      <label class="form-label text-dark select-label" style="font-weight:bold;">Choose Student<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>

                      <select class="select form-control form-control-md" name="student[]" multiple>
                        <?php echo $std1 ?>
                      </select>
                      <!-- <label class="form-label text-dark" for="coursemanager">Course Manager</label> -->

                    </div>



                  </div>

                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <label class="form-label text-dark" for="coursemanager" style="font-weight:bold;">Department<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label>

                      <select id="" name="departmentId" class="form-control form-control-md" required>
                        <option selected disabled value="">-Departments-</option>
                        <?php
                        $depQ = $connect->query("SELECT * FROM homepage");
                        while ($depQData = $depQ->fetch()) {
                        ?>
                        <option value="<?php echo $depQData['id']; ?>"><?php echo $depQData['department_name']; ?></option>
                        <?php
                        }
                        ?>

                      </select>
                    </div>

                  </div>
                 
                  <div class="col-md-12 mb-4">

                    <div class="form-outline" id="phase-form" style="display:grid;">
                    </div>

                  </div>

                </div>

                <div class="row">
                  <center>
                    <input class="btn btn-success" style="width:50%;" type="submit" value="Submit" name="submit" />
                  </center>
                </div>
            </div>

            </form>
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
  <!--add new user-->
  <div class="modal fade" id="newins" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Register New User</h3>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <span class="get_val_res" style="color:red"></span>
            <form style="width: 80%; border: 2 px solid black;" class="form form-border" action="register_student.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="ins_id" value="<?php echo $user_id ?>">
              <div class="d-flex"><input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control" class="login-input" type="text" name="nickname" placeholder="Nick Name" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input style="background-color: #cec9c996;" class="form-control" type="text" class="login-input" name="role" required value="instructor" readonly><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control" type="text" class="login-input" name="email" placeholder="Email Address (Optional)"></div><br>
              <div class="d-flex"><input class="form-control" type="text" class="login-input" name="initial" placeholder="Add Initial" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control reg_studid_head" type="text" name="studid" placeholder="Instructor Id/Username" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div>
              <p style="color:red;">Note: This will be your Login Id</p>

              <div class="d-flex"><input class="form-control" type="password" name="password" placeholder="Password" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control" type="file" name="file" value="avtar.png" accept="image/*" /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="col-md-12 mt-2">
                <label class="mb-3 mr-1" for="gender">Gender: </label>

                <input type="radio" name="gender" id="male" value="male" autocomplete="off" required>
                <label for="male">Male</label>

                <input type="radio" name="gender" id="female" value="female" autocomplete="off" required>
                <label for="female">Female</label>
              </div>


              <!--  <div class="form-button mt-2">
                                <input class="btn btn-success" type="submit" name="submit" value="Register" class="login-button">
  
                            </div> -->


        </div>
        <div class="modal-footer">
          <input class="btn btn-success" type="submit" name="submit" value="Register" class="login-button">
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--add new user-->
  <div class="modal fade" id="newuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Register New User</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <span class="get_val_res" style="color:red"></span>
            <form style="width: 80%; border: 2 px solid black;" class="form form-border" action="register_student.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="ins_id" value="<?php echo $user_id ?>">

              <div class="d-flex"><input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control" class="login-input" type="text" name="nickname" placeholder="Nick Name" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input style="background-color: #cec9c996;" class="form-control" type="text" class="login-input" name="role" required value="student" readonly><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress (Optional)"></div><br>
              <div class="d-flex"><input class="form-control" type="text" class="login-input" name="initial" placeholder="Add Initial *" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control reg_studid_head" type="text" name="studid" placeholder="Student Id/Username *" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div>
              <p style="color:red;">Note: This will be your Login Id</p>

              <div class="d-flex"><input class="form-control" type="password" name="password" placeholder="Password" required><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="d-flex"><input class="form-control" type="file" name="file" value="avtar.png" accept="image/*" /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></div><br>
              <div class="col-md-12 mt-2">
                <label class="mb-3 mr-1" for="gender">Gender: </label>

                <input type="radio" name="gender" id="male" value="male" autocomplete="off" required>
                <label for="male">Male</label>

                <input type="radio" name="gender" id="female" value="female" autocomplete="off" required>
                <label for="female">Female</label>
              </div>

              <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div> -->


              <div class="form-button mt-2">
                <input class="btn btn-success" type="submit" name="submit" value="Register" class="login-button">
                <!-- <p class="link"><a href="login.php">Click to Login</a></p> -->
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $("#course_form").on("change", "#select_course", function() {
      var select_course = $(this).val();
      if (select_course) {
        $.ajax({
          type: 'POST',
          url: 'check_count_ctp.php',
          data: 'id=' + select_course,
          success: function(response) {

            if (response == "yes") {
              $("#select_number_type option[value=2]").remove();
              $("#enter_value").hide();
              $("#initial").show();
            } else {
              $("#select_number_type option[value=2]").remove();
              $("#select_number_type").append('<option value=2>Enter Value</option>');
            }
          }
        });
      }

      if (select_course) {
        $.ajax({
          type: 'POST',
          url: 'check_count_ctp_symbol.php',
          data: 'id=' + select_course,
          success: function(response) {

            $('#CourseCode').empty();
            $('#CourseCode').val(response);
          }
        });
      }
    });

    $(".select_course").on("change", function() {
      const select_course1 = $(this).val();

      $.ajax({
        type: 'POST',
        url: 'check_count_ctp.php',
        data: 'select_course1=' + select_course1,
        success: function(response1) {

          $("#phase-form").empty();
          $("#phase-form").html(response1);
        }
      });
    });

    $("#course_form").on("change", "#select_number_type", function() {


      var select_value = $(this).val();
      if (select_value == '1') {
        $("#enter_value").hide();
        $("#initial").show();
        $("#enter_value_text").attr('disabled', true);
        $("#CourseCode").attr('disabled', false);
        $("#get_if_value").val('');
      }
      if (select_value == '2') {
        $("#enter_value").show();

        $("#initial").hide();
        $("#CourseCode").attr('disabled', true);
        $("#enter_value_text").attr('disabled', false);
        $("#get_if_value").val('1');
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