<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
if (isset($_COOKIE['libShopId'])) {
  $libShopId = $_COOKIE['libShopId'];
}

if (isset($_COOKIE['libLibId'])) {
  $libLibId = $_COOKIE['libLibId'];
}

if (isset($_COOKIE['libLVid'])) {
  $libLVid = $_COOKIE['libLVid'];
}
$_SESSION['page'] = 'library';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Shelf</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
   <?php include 'lb_thumbnail.php';?>
  <style>
    .moveImg {
      height: 35px;
      width: 35px;
      margin: 0px 5px 0px 5px;
    }

    .text-success,
    .text-danger {
      font-size: 22px;
    }
  </style>

</head>

<body>
  <?php include 'lb_loader.php';?>
  
  <?php
  if (isset($_SESSION['folderId'])) {
    $f_id = $_SESSION['folderId'];
  }
  $userRole = $_SESSION['role'];
  ?>
  <?php
  $lib_id = 1;
  if (isset($_GET['library'])) {
    $lib = "Main";
    $_SESSION['library_value'] = $lib = urldecode(base64_decode($_GET['library']));
  } else if (isset($_SESSION['library_value'])) {
    $lib = $_SESSION['library_value'];
  } else {
    $lib = "Main";
  }
  if (isset($_GET['lib_id'])) {
    $lib_id = "";
    $_SESSION['libraryid_value'] = $lib_id = urldecode(base64_decode($_GET['lib_id']));
  } else if (isset($_SESSION['libraryid_value'])) {
    $lib_id = $_SESSION['libraryid_value'];
  } else {
    if (isset($_SESSION['libraryid_value'])) {
      $lib_id = $_SESSION['libraryid_value'];
    }
  }
  ?>


  <div id="header-hide">
    <?php
    include ROOT_PATH . 'includes/library_header.php';
    ?>
  </div>

  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 25rem;">
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <!-- Page Header -->
        <!-- End Page Header -->
      </div>
    </div>
    <!-- End Content -->

    <!-- Content -->
    <div class="content container-fluid" style="margin-top: -19rem;">

      <div class="row justify-content-center">

        <div class="col-lg-12">
          <!-- Card -->
          <div class="card card-hover-shadow h-100">
            <div class="card-header" style="border-bottom: 2px solid lightgray; display:flex;">
              <a class="btn btn-soft-secondary text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Back To Main Library" style="text-decoration:none;" href="<?php echo BASE_URL; ?>Library/index.php"><i class="bi bi-arrow-left"></i></a>
              <h1 style="margin:10px;">Dashboard</h1>
            </div>
            <!-- Body -->
            <div class="card-body" style="margin-bottom:-20px;">
             

              <div class="card-body">

                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h1 style="color:#7901c1;">Briefcase</h1>
                      </button>
                    </h2>
                    <hr style="color:#0000003b;">
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php
                        if ($userRole == "instructor") {
                          $sql = $connect->query("SELECT * FROM user_briefcase WHERE role = '$userRole' OR role = 'student' ORDER BY id DESC LIMIT 10");
                        } else {
                          $sql = $connect->query("SELECT * FROM user_briefcase ORDER BY id DESC LIMIT 10");
                        }
                        while ($data = $sql->fetch()) {
                          $breifcase_id = $data['id'];
                          $userId = $data['user_id'];
                          $userSql = $connect->query("SELECT nickname FROM users WHERE id = '$userId'");
                          $userName = $userSql->fetchColumn();
                        ?>
                          <p style="font-size:large;"><b class="text-dark"><?php echo $userName; ?></b> Created <b class="text-dark"><?php echo $data['briefcase_name']; ?></b>
                            <span style="float:right; position:relative;">
                              <a data-bs-placement="top" title="Edit Briefcase" class="btn btn-success btn-sm" style="color: white;" href="" onclick="document.getElementById('brief_edit_id_dashboard').value='<?php echo $breifcase_id; ?>';
                                                             document.getElementById('brief_dashboard').value='<?php echo $data['briefcase_name']; ?>';" data-bs-toggle="modal" data-bs-target="#edit_brief_dashboard"><i style="margin:5px;" class="bi bi-pen-fill"></i></a></button>
                              <button style="padding-left: 10px; padding-right:10px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete Briefcase" class="btn btn-danger btn-sm"><a style="color: white;" href="<?php echo BASE_URL ?>Library/deleteBrief.php?deleteUserIddashboard=<?php echo $breifcase_id; ?>"><i class="bi bi-x-circle"></i></a></button>
                              <!-- <a href=""><img class="moveImg" style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/black/move.png"></a> -->
                            </span>
                          </p>
                          <hr>
                        <?php }
                        ?>


                      </div>
                    </div>
                  </div>
                </div><br>

                <div class="accordion" id="accordionExample1">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h1 style="color: #7901c1;">Files</h1>
                      </button>
                    </h2>
                    <hr style="color:#0000003b;">
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample1">
                      <div class="accordion-body">
                        <?php
                        if ($userRole == "instructor") {
                          $sql = $connect->query("SELECT * FROM user_files WHERE role = '$userRole' OR role = 'student' ORDER BY id DESC LIMIT 10");
                        } else {
                          $sql = $connect->query("SELECT * FROM user_files ORDER BY id DESC LIMIT 10");
                        }
                        while ($data = $sql->fetch()) {
                          $fileid = $data['id'];
                          $userId = $data['user_id'];
                          $userSql = $connect->query("SELECT nickname FROM users WHERE id = '$userId'");
                          $userName = $userSql->fetchColumn();
                        ?>
                          <p style="font-size:large;"><b class="text-dark"><?php echo $userName; ?></b> Created <b class="text-dark"><?php echo $data['filename']; ?></b>

                            <span style="float:right; position:relative;">
                              <button class="btn btn-success btn-sm" style="padding-left:10px; padding-right:10px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit File"><a style="color: white;" href="" href="" onclick="document.getElementById('file_edit_id_dashboardd').value='<?php echo $fileid; ?>';
                                                             document.getElementById('file_dashboardd').value='<?php echo $data['filename']; ?>';" data-bs-toggle="modal" data-bs-target="#file_dashboard_modald"><i class="bi bi-pen-fill"></i></a></button>
                              <button class="btn btn-danger btn-sm" style="padding-left:10px; padding-right:10px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete File"><a style="color: white;" href="<?php echo BASE_URL ?>Library/delete_files.php?deleteIdfiles=<?php echo $fileid; ?>"><i class="bi bi-x-circle"></i></a></button>
                              <!-- <button class="btn btn-primary btn-sm" style="padding-left:5px; padding-right:5px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Move File"><a href="<?php echo BASE_URL; ?>Library/adminMove_user_editor_data.php?moveId=<?php echo $fileid; ?>"><img class="moveImg" src="<?php echo BASE_URL; ?>assets/svg/actions/black/move.png" style="height: 15px; width:15px;"></a></button> -->
                              <button class="btn btn-secondary btn-sm" style="padding-left:5px; padding-right:5px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Permission File"><a data-bs-target="#userFilePermissionModal" class="userFilePermissionModal" data-bs-toggle="modal" value="<?php echo $fileid; ?>"><img style="height: 15px; width:15px;" class="moveImg" src="<?php echo BASE_URL; ?>assets/svg/actions/Permissions/permission.png"></a></button>
                            </span>
                          </p>
                          <hr>
                        <?php } ?>

                      </div>
                    </div>
                  </div>
                </div><br>

                <div class="accordion" id="accordionExample2">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h1 style="color:#7901c1;">Pages</h1>
                      </button>
                    </h2>
                    <hr style="color:#0000003b;">
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample2">
                      <div class="accordion-body">
                        <?php
                        if ($userRole == "instructor") {
                          $sql = $connect->query("SELECT * FROM editor_data WHERE userRole = '$userRole' OR role = 'student' ORDER BY id DESC LIMIT 10");
                        } else {
                          $sql = $connect->query("SELECT * FROM editor_data ORDER BY id DESC LIMIT 10");
                        }
                        while ($data = $sql->fetch()) {
                          $pageId = $data['id'];
                          $userId = $data['userId'];
                          $userSql = $connect->query("SELECT nickname FROM users WHERE id = '$userId'");
                          $userName = $userSql->fetchColumn();
                        ?>
                          <p style="font-size:large;"><b class="text-dark"><?php echo $userName; ?></b> Created <b class="text-dark"><a style="display: contents;" class="nav-link" href="<?php echo BASE_URL; ?>Library/pageData.php?pId=<?php echo $pageId; ?>" role="button"><?php echo $data['pageName']; ?></a></b>

                            <span style="float:right; position:relative;">
                              <button data-bs-toggle="tooltip" data-bs-placement="right" title="Edit Page" class="btn btn-success btn-sm" style="padding-left:10px; padding-right:10px;"><a style="color: white;" href="edit-textEditor.php?id=<?php echo $pageId; ?>"><i class="bi bi-pen-fill"></i></a></button>
                              <button data-bs-toggle="tooltip" data-bs-placement="right" title="Delete Page" class="btn btn-danger btn-sm" style="padding-left:10px; padding-right:10px;"><a style="color: white;" href="delete_newpage.php?deleteId=<?php echo $pageId; ?>"><i class="bi bi-x-circle"></i></a></button>
                              <!-- <button data-bs-toggle="tooltip" data-bs-placement="right" title="Move Page" class="btn btn-primary btn-sm" style="padding-left:5px; padding-right:5px;"><a href="<?php echo BASE_URL; ?>Library/adminMove_user_pageEditor_data.php?moveId=<?php echo $pageId; ?>"><img style="height: 15px; width:15px;" class="moveImg" src="<?php echo BASE_URL; ?>assets/svg/actions/black/move.png"></a></button> -->
                              <button data-bs-toggle="tooltip" data-bs-placement="right" title="Permission Page" class="btn btn-secondary btn-sm" style="padding-left:5px; padding-right:5px;"><a data-bs-target="#userPagePermissionModal" class="userPagePermissionModal" data-bs-toggle="modal" value="<?php echo $pageId; ?>"><img style="height: 15px; width:15px;" class="moveImg" src="<?php echo BASE_URL; ?>assets/svg/actions/Permissions/permission.png"></a></button>
                            </span>
                          </p>
                          <hr>
                        <?php } ?>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>




    </div>
  </main>

  <!-- user File permission modal -->

  <div class="modal fade" id="userFilePermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Permision Modal</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <input type="text" id="" name="to_user" class="form-control txt_search1" placeholder="share individual" />
            <br>
          </div>
          <div>
            <center>
              <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td>
                      <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">

                  <option value="None">None</option>
                    <option value="All instructor">All Instructor</option>
                    <option selected value="Everyone">Everyone</option>
                  </select>
                    </td>
                    <td>
                      <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory">
                    <option selected value="readOnly">ReadOnly</option>
                    <option value="readAndWrite">Read And Write</option>
                    <option value="None">None</option>
                  </select>
                    </td>
                  </tr>
                </table>
                <br>
                <center>
                  
                  
                  <input type="hidden" value="" name="permissionPageID" id="userFilepermissionID" />
                  <table class="table table-bordered tableData1" id="" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-light">#</th>
                        <th class="text-light">Profile Image</th>
                        <th class="text-light">Name</th>

                      </tr>
                    </thead>
                    <tbody class="adminDetail">

                    </tbody>
                  </table>
                  <br>
                  <input type="submit" class="btn btn-success" value="Give Permission" name="filePermissionBtnDashboard" />
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- user Page permission modal -->

  <div class="modal fade" id="userPagePermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Permision Modal</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <input type="text" id="" name="to_user" class="form-control txt_search1" placeholder="share individual" />
            <br>
          </div>
          <div>
            <center>
              <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td>
                      <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">

                  <option value="None">None</option>
                    <option value="All instructor">All Instructor</option>
                    <option selected value="Everyone">Everyone</option>
                  </select>
                    </td>
                    <td>
                      <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory">
                    <option selected value="readOnly">ReadOnly</option>
                    <option value="readAndWrite">Read And Write</option>
                    <option value="None">None</option>
                  </select>
                    </td>
                  </tr>
                </table>
                <br>
                <center>
                  
                  
                  <input type="hidden" value="" name="permissionPageID" id="userPagepermissionID" />
                  <table class="table table-bordered tableData1" id="" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-light">#</th>
                        <th class="text-light">Profile Image</th>
                        <th class="text-light">Name</th>

                      </tr>
                    </thead>
                    <tbody class="adminDetail">

                    </tbody>
                  </table>
                  <br>
                  <input type="submit" class="btn btn-success" value="Give Permission" name="permissionBtnDashboard" />
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- admin File permission modal -->

  <div class="modal fade" id="adminFilePermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Permision Modal</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <input type="text" id="" name="to_user" class="form-control txt_search1" placeholder="share individual" />
            <br>
          </div>
          <div>
            <center>
              <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                <center>
                  <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                    <option selected disabled>Select File Method</option>
                    <option value="All instructor">All Instructor</option>
                    <option value="Everyone">Everyone</option>
                    <option value="None">None</option>
                  </select>
                  <input type="hidden" value="" name="permissionPageID" id="adminFilepermissionID" />
                  <table class="table table-bordered tableData1" id="" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-light">#</th>
                        <th class="text-light">Profile Image</th>
                        <th class="text-light">Name</th>

                      </tr>
                    </thead>
                    <tbody class="adminDetail">

                    </tbody>
                  </table>
                  <input type="submit" class="btn btn-success" value="Give Permission" name="adminFilePermissionBtnDashboard" />
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- admin Page permission modal -->

  <div class="modal fade" id="adminPagePermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Permision Modal</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <input type="text" id="" name="to_user" class="form-control txt_search1" placeholder="share individual" />
            <br>
          </div>
          <div>
            <center>
              <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
                <center>
                  <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                    <option selected disabled>Select File Method</option>
                    <option value="All instructor">All Instructor</option>
                    <option value="Everyone">Everyone</option>
                    <option value="None">None</option>
                  </select>
                  <input type="hidden" value="" name="permissionPageID" id="adminPagepermissionID" />
                  <table class="table table-bordered tableData1" id="" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-light">#</th>
                        <th class="text-light">Profile Image</th>
                        <th class="text-light">Name</th>

                      </tr>
                    </thead>
                    <tbody class="adminDetail">

                    </tbody>
                  </table>
                  <input type="submit" class="btn btn-success" value="Give Permission" name="adminPagePermissionBtnDashboard" />
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Edit briefcase modal-->
  <div class="modal fade" id="edit_brief_dashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Briefcase</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_brief_lib.php">
            <input type="hidden" class="form-control" name="id" value="" id="brief_edit_id_dashboard" readonly>
            <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
            <input type="text" class="form-control" name="brief" value="" id="brief_dashboard">
            <br>
            <input style="float:right;background-color: #7901c1;color: white;" class="btn" type="submit" name="submit_user_briefcase_dashboard" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Edit briefcase modal-->
  <div class="modal fade" id="edit_brief_dashboard_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Briefcase</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_brief_lib.php">
            <input type="hidden" class="form-control" name="id" value="" id="brief_edit_id_dashboard_admin" readonly>
            <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
            <input type="text" class="form-control" name="brief" value="" id="brief_dashboard_admin">
            <br>
            <input style="float:right;background-color: #7901c1;color: white;" class="btn" type="submit" name="submit_user_briefcase_dashboard_admin" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Edit file modal-->


  <div class="modal fade" id="file_dashboard_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Files</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>Library/edit_files.php" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="pdf_loc_edit_id" value="" id="file_edit_id_dashboard" readonly>
            <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
            <!-- <input type="text" class="form-control" name="editLocation" value="" id="location">--><br>
            <input type="text" class="form-control" value="" id="file_dashboard">
            <br>
            <input class="form-control" type="file" name="file_dashboard" />
            <br>
            <input style="float:right;background-color: #7901c1;color: white;" class="btn" type="submit" name="adminFileEdit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="file_dashboard_modald" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Files</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>Library/edit_files.php" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="pdf_loc_edit_id" value="" id="file_edit_id_dashboardd" readonly>
            <!-- <label style="color:black; font-weight:bold; margin:5px;">Briefcase :</label> -->
            <!-- <input type="text" class="form-control" name="editLocation" value="" id="location">--><br>
            <input type="text" class="form-control" value="" id="file_dashboardd">
            <br>
            <input class="form-control" type="file" name="file_dashboard" />
            <br>
            <input style="float:right;background-color: #7901c1;color: white;" class="btn" type="submit" name="userFileEdit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>



<script>
  $(".userFilePermissionModal").on("click", function() {
    var fileId = $(this).attr("value");
    $("#userFilepermissionID").val(fileId);
  });

  $(".userPagePermissionModal").on("click", function() {
    var fileId = $(this).attr("value");
    $("#userPagepermissionID").val(fileId);
  });

  $(".adminFilePermissionModal").on("click", function() {
    var fileId = $(this).attr("value");
    $("#adminFilepermissionID").val(fileId);
  });

  $(".adminPagePermissionModal").on("click", function() {
    var fileId = $(this).attr("value");
    $("#adminPagepermissionID").val(fileId);
  });

  $(".txt_search1").keyup(function() {
    var search = $(this).val();
    // alert(search);
    if (search != "") {

      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>Library/getPermissionSearch.php',
        data: {
          search: search,
        },
        success: function(response) {
          $(".tableData1").show();
          $('.adminDetail').empty();
          $('.adminDetail').append(response);
          // console.log(response);

        }
      });
    } else {
      $('.searchResult').empty();
      $(".tableData1").hide();
    }
  });
</script>

<footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
</body>
</html>