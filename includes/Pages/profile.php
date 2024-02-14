<?php

include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<html>

<head>
  <title>My Profile</title>
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
          <h1 class="text-success">Change Profile</h1>
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
                  <img class="profile-cover-img" src="<?php echo BASE_URL; ?>assets/img/1920x400/img1.jpg" alt="Image Description">
                </div>
              </div>
              <!-- End Profile Cover -->
              <!-- Profile Header -->
              <div class="text-center mb-5">
                <!-- Avatar -->
                <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
                  <img class="avatar-img" src="<?php echo $pic; ?>" alt="Image Description">
                  <span class="avatar-status avatar-status-success"></span>
                </div>
                

                <?php

                $fetch_details = "SELECT * FROM users where id='$user_id'";
                $fetch_detailsst2 = $connect->prepare($fetch_details);
                $fetch_detailsst2->execute();

                if ($fetch_detailsst2->rowCount() > 0) {
                  $re2 = $fetch_detailsst2->fetchAll();
                  foreach ($re2 as $row2) {
                  }
                }
                ?>

                <h1 class="page-header-title"><?php echo $row2['name'] ?></h1>
                <center>
                  <form action="profile_update.php" method="post" enctype="multipart/form-data" style="width:50%;">
                    <table>
                      <tr>
                        <td>
                          <input type="hidden" class="form-control" name="id" readonly value="<?php echo $row2['id'] ?>" style="width:50%;">
                        </td>
                        <td> <input type="file" class="form-control" name="file" accept="image/*" required></td>
                        <td> <input style="margin:5px;" type="submit" name="submit" value="Upload" class="btn btn-info"></td>
                      </tr>
                    </table>
                  </form>
                </center>
              </div>
              <!-- End Profile Header -->
              <div class="card-body">
                <!-- Nav -->
              <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="MyProfile-tab" href="#MyProfile" data-bs-toggle="pill" data-bs-target="#MyProfile" role="tab" aria-controls="MyProfile" aria-selected="true">
                    <div class="d-flex align-items-center">
                      My Profile
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="LetterX-tab" href="#LetterX" data-bs-toggle="pill" data-bs-target="#LetterX" role="tab" aria-controls="LetterX" aria-selected="false">
                    <div class="d-flex align-items-center">
                      Letter Of X's
                    </div>
                  </a>
                </li>

              </ul>
              <!-- End Nav -->

              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="MyProfile" role="tabpanel" aria-labelledby="MyProfile-tab">
                  
                  <div class="row">
                    <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>
                          <lable class="text-dark">Full Name</lable>
                        </td>
                        <td>:</td>
                        <td><span class="text-dark"><?php echo $row2['name'] ?></span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Change Password</label></td>
                        <td>:</td>
                        <td><span><button type="button" data-bs-toggle="modal" data-bs-target="#change_pass" class="btn btn-outline-success">Password</button></span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Email</label></td>
                        <td>:</td>
                        <td><span class="text-dark"><?php echo $row2['email'] ?></span></td>
                      </tr>
                      <td><label class="text-dark">Department</label></td>
                      <td>:</td>
                      <td>
                        <select name="" id="" class="form form-control" style="width:165px;">
                          <?php
                          if ($role == "super admin") {
                            $depQuery = $connect->query("SELECT * FROM homepage");
                            while ($depData = $depQuery->fetch()) {
                          ?>
                              <option value=""><?php echo $depData['department_name']; ?></option>
                              <?php
                            }
                          } else {
                            $depId = $connect->query("SELECT * FROM userdepartment WHERE userId = '$user_id'");
                            while ($depIdData = $depId->fetch()) {
                              $dep_Id = $depIdData['departmentId'];
                              $depQuery = $connect->query("SELECT * FROM homepage WHERE id = '$dep_Id'");
                              while ($depData = $depQuery->fetch()) {
                              ?>
                                <option value=""><?php echo $depData['department_name']; ?></option>
                          <?php
                              }
                            }
                          }
                          ?>
                        </select>
                      </td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Phone</label></td>
                        <td>:</td>
                        <td><span class="text-dark"><?php echo $row2['phone'] ?></span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Id</label></td>
                        <td>:</td>
                        <td><span class="text-dark"><?php echo $row2['studid'] ?></span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Nickname</label></td>
                        <td>:</td>
                        <td><span class="text-dark"><?php echo $row2['nickname'] ?></span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Role</label></td>
                        <td>:</td>
                        <td><span class="text-dark"><?php echo $row2['role'] ?></span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Initial</label></td>
                        <td>:</td>
                        <td><span class="text-dark"><button type="button" data-bs-toggle="modal" data-bs-target="#add_initial" class="btn btn-outline-success">Add</button></span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Date</label></td>
                        <td>:</td>
                        <td><span class="text-dark"><?php echo $row2['create_datetime'] ?></span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">City</label></td>
                        <td>:</td>
                        <td><span class="text-dark">-</span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">State</label></td>
                        <td>:</td>
                        <td><span class="text-dark">-</span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Address Line 1</label></td>
                        <td>:</td>
                        <td><span class="text-dark">-</span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Address Line 2</label></td>
                        <td>:</td>
                        <td><span class="text-dark">-</span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Zip Code</label></td>
                        <td>:</td>
                        <td><span class="text-dark">-</span></td>
                      </tr>
                      <tr>
                        <td><label class="text-dark">Signature</label></td>
                        <td>:</td>
                        <?php
                        $fetchSig = $connect->query("SELECT signature FROM users WHERE id = '$user_id'");
                        $sigData = $fetchSig->fetchColumn();
                        ?>
                        <td><img src="<?php echo $sigData; ?>" style="height: 110px;width:150px;" /></td>
                      </tr>
                      
                      <tr>
                        <td><label class="text-dark">Change permission role</label></td>
                        <td>:</td>
                        
                        <td><a class="btn btn-soft-success" type="button" data-bs-toggle="modal" data-bs-target="#askrolechnage">Ask</a></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>

                <div class="tab-pane fade" id="LetterX" role="tabpanel" aria-labelledby="LetterX-tab">
                  
                  <div class="row"> 
                    <a href="<?php echo BASE_URL;?>includes/Pages/Letter.php" class="btn btn-soft-success" type="button" style="width: auto;">Letter Of X's</a>
                    
                  </div>
                </div>
              </div>

                 

              </div>
              <!-- End Body -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
    <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="change_pass.php" id="change_pass">
              <input type="hidden" id="sess_id" name="sess_id" value="<?php echo $user_id ?>" class="form-control" required />

              <input type="password" placeholder="Enter Old Password" name="old_pass" id="old_pass" class="form-control" required />
              <br>
              <input type="password" placeholder="Enter New Password" name="new_pass" id="new_pass" class="form-control" required />
              <br>
              <input type="password" placeholder="Re-Confrim Password" name="re_pass" id="re_pass" class="form-control" required />
              <br>
              <button style="margin:5px;" class="btn btn-success" type="button" id="submit_pass">Submit</button>

            </form>
          </div>
          <div class="modal-footer">


          </div>
        </div>
      </div>
    </div>

    <!--Add initial-->
    <div class="modal fade" id="add_initial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Add Initial</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="add_initial.php" id="change_ini">
              <input type="" id="ini_id" name="ini_id" value="<?php echo $user_id ?>" class="form-control" required />

              <input type="text" placeholder="Insert Intial" name="initial" id="initial" class="form-control" required />
              <br>
              <input type="submit" name="submit_ini" id="submit_ini" class="btn btn-success">
              <!-- <button style="margin:5px;" class="btn btn-success" type="submit" id="submit_ini">Submit</button> -->

            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="askrolechnage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title text-success" id="exampleModalLabel">Add Role change</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="askrolepermission.php">
              <input type="text" name="sesid" value="<?php echo $user_id; ?>">
              <select name="role" class="form-control">
             <?php 
            $query1 = "SELECT * FROM roles where permission!='' and roles!='$role' ORDER BY id ASC";
             $statement1 = $connect->prepare($query1);
              $statement1->execute();
              if($statement1->rowCount() > 0)
              {
                  $result1 = $statement1->fetchAll();
                  $sn=1;
                  foreach($result1 as $row1)
                  {
                    ?>
                      <option value="<?php echo $row1['id'] ?>"><?php echo $row1['roles']?></option>";
                      <?php 
                  }
                  }?>
              </select>
              <br>
              <button type="submit" class="btn btn-success">Ask</button>

             </form>
          </div>
        </div>
      </div>
    </div>

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