<?php

include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<html>

<head>
  <title>Department</title>
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
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">Department Profile</h1>
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
            <!-- Header -->
            <!-- <div class="card-header card-header-content-between">
               <h1>Update Profile</h1>
            </div> -->
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">





              <!-- Profile Cover -->
              <div class="profile-cover">
                <div class="profile-cover-img-wrapper">
                  <img class="profile-cover-img" src="<?php echo BASE_URL; ?>assets/svg/profile_bg/5.png" alt="Image Description">
                </div>
              </div>
              <!-- End Profile Cover -->
              <!-- Profile Header -->
              <div class="text-center mb-5">
                <!-- Avatar -->
                <?php
                $mainDepImg = $connect->query("SELECT file_name FROM main_department WHERE id = '$institute'");
                $prof_pic11 = $mainDepImg->fetchColumn();
                if ($prof_pic11 != "") {
                  $pic11 = BASE_URL . 'includes/Pages/department/' . $prof_pic11;
                  if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                    $pic11 = BASE_URL . 'includes/Pages/department/' . $prof_pic11;
                  } else {
                    $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                  }
                } else {
                  $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                }
                ?>
                <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
                  <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                  <span class="avatar-status avatar-status-success"></span>
                </div>
                <!-- End Avatar -->

                <?php
                $ma_id = "";
                $readonly = "";
                $ma_name = "";
                $department_name = "";
                $description = "";
                $location = "";
                $contact_number = "";
                $email = "";
                $website = "";
                $additional = "";
                $q11 = "SELECT * FROM main_department where user_id=$user_id";
                $st11 = $connect->prepare($q11);
                $st11->execute();

                if ($st11->rowCount() > 0) {
                  $result11 = $st11->fetchAll();
                  foreach ($result11 as $row2) {
                    $ma_id = $row2['id'];
                    $ma_name = $row2['department_name'];

                    $description = $row2['description'];
                    $location = $row2['location'];
                    $contact_number = $row2['contact_number'];
                    $email = $row2['email'];
                    $website = $row2['website'];
                    $additional = $row2['additional'];
                  }
                }

                ?>

                <h1 class="page-header-title"><?php echo $ma_name ?></h1>
                <center>
                  <form action="update_main_Dep.php" method="post" enctype="multipart/form-data" style="width:50%;">
                    <table>
                      <tr>
                        <td>
                          <input type="hidden" class="form-control" name="depId" readonly value="<?php echo $ma_id ?>" style="width:50%;">
                        </td>
                        <td> <input type="file" class="form-control" name="depImg" accept="image/*" required></td>
                        <td> <input style="margin:5px;" type="submit" name="submitImg" value="Upload" class="btn btn-info"></td>
                      </tr>
                    </table>
                  </form>
                </center>
              </div>

              <div class="card-body">
                <dl class="row">
                  <form action="update_main_Dep.php" method="post" style="width:50%;">
                    <input type="hidden" class="form-control" name="id" readonly value="<?php echo $ma_id ?>" style="width:50%;">
                    <input type="hidden" class="form-control" name="uid" readonly value="<?php echo $user_id ?>" style="width:50%;">
                    <table class="table table-borderless">
                      <tbody>

                        <tr>
                          <td><label>Department Name</label></td>
                          <td>:</td>
                          <td><input class="form-control" type="text" name="department_name" value="<?php echo $ma_name ?>"></td>
                        </tr>
                        <tr>
                          <td><label>Description<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label></td>
                          <td>:</td>
                          <td><input class="form-control" type="text" name="description" value="<?php echo $description ?>" required></td>
                        </tr>
                        <tr>
                          <td><label>Location<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label></td>
                          <td>:</td>
                          <td><input class="form-control" type="text" name="location" value="<?php echo $location ?>" required></td>
                        </tr>
                        <tr>
                          <td><label>Contact Number<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label></td>
                          <td>:</td>
                          <td><input class="form-control" type="text" name="contact_number" value="<?php echo $contact_number ?>" required></td>
                        </tr>
                        <tr>
                          <td><label>Email Id<span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span></label></td>
                          <td>:</td>
                          <td><input class="form-control" type="text" name="email" value="<?php echo $email ?>" required></td>
                        </tr>
                        <tr>
                          <td><label>Website</label></td>
                          <td>:</td>
                          <td><input class="form-control" type="text" name="website" value="<?php echo $website ?>"></td>
                        </tr>
                        <tr>
                          <td><label>Additional Information</label></td>
                          <td>:</td>
                          <td><input class="form-control" type="text" name="additional" value="<?php echo $additional ?>"></td>
                        </tr>
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-success" name="updateDep">Update</button>
                  </form>
              </div>
            </div>
          </div>
          <!-- End Tab Content -->


          <!-- End Profile Header -->

          <!-- End Body -->
        </div>
        <!-- End Body -->
      </div>

      <!-- End Row -->
    </div>
    <!-- End Content -->


    <script>
      $("#change_pass").on("click", "#submit_pass", function() {
        //alert("hello");
        var id = $("#sess_id").val();
        var old_pass = $("#old_pass").val();
        var new_pass = $("#new_pass").val();
        var re_pass = $("#re_pass").val();

        if (old_pass == "" || new_pass == "" || re_pass == "") {
          alert("field are missing");
        }

        if (new_pass !== re_pass) {
          alert("new password not match with old password");
        }
        if (id) {
          $.ajax({
            type: 'POST',
            url: 'change_pass.php',
            data: 'sess_id=' + id + '&old_pass=' + old_pass + '&new_pass=' + new_pass + '&re_pass=' + re_pass,
            success: function(response) {
              alert(response);
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