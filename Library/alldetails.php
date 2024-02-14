<?php
include '../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php include 'lb_thumbnail.php';?>
  <title>DashBoard</title>
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/tiny.min.js" referrerpolicy="origin"></script>
  <style>
    p {
      text-align: initial;
    }

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
<div id="header-hide">
  <?php include('./secondWindowHeader.php');
  if (isset($_REQUEST['bId'])) {
    $_SESSION['page_ID'] = $_REQUEST['bId'];
  }
  if (isset($_REQUEST['pId'])) {
    $_SESSION['page_ID'] = $_REQUEST['pId'];
  }
  $f_id = $_SESSION['folderId'];
  $userRole = $_SESSION['role'];
  ?>
</div>

    <main id="content" role="main" class="main">
      <!-- Content -->
      <div class="content container-fluid" style="margin-left:45px;">
        <center>
          <div class="row justify-content-center">
            <div class="alertlibrary" style="width: 92%;margin-top: -30px;margin-bottom: -30px;">
         <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>
            <div class="col-lg-11 mb-3 mb-lg-5">
              <!-- Card -->
              <div class="card card-hover-shadow h-100" style="border:1px solid black;">
                <!-- Body -->
                <div class="card-body" style="background-color: black;">

                  <div class="col">
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
                              $sql = $connect->query("SELECT * FROM user_briefcase WHERE (user_id = '$userId' OR role = 'student') AND folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            }elseif($userRole == "student"){
                              $sql = $connect->query("SELECT * FROM user_briefcase WHERE user_id = '$userId' AND folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            }else {
                              $sql = $connect->query("SELECT * FROM user_briefcase WHERE folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            }
                            while ($data = $sql->fetch()) {
                              $breifcase_id = $data['id'];
                              $userId = $data['user_id'];
                              $userSql = $connect->query("SELECT nickname FROM users WHERE id = '$userId'");
                              $userName = $userSql->fetchColumn();
                            ?>
                              <p style="font-size: large;"><b><?php echo $userName; ?></b> Created <b><?php echo $data['briefcase_name']; ?></b>
                                <span style="float:right; position:relative;">
                                  <a class="btn btn-soft-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit Briefcase" href="" onclick="document.getElementById('brief_edit_id_deatail').value='<?php echo $breifcase_id; ?>';
                                                             document.getElementById('brief_deatail').value='<?php echo $data['briefcase_name']; ?>';" data-bs-toggle="modal" data-bs-target="#edit_brief_deatail"><i class="bi bi-pen-fill"></i></a>
                                  <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete Briefcase" class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL ?>Library/deleteBrief.php?deleteUserIddetail=<?php echo $breifcase_id; ?>"><i class="bi bi-x-circle"></i></a>
                                  <!-- <a href=""><img class="moveImg" src="<?php echo BASE_URL; ?>assets/svg/actions/black/move.png"></a> -->
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
                              $sql = $connect->query("SELECT * FROM user_files WHERE (user_id = '$userId' OR role = 'student') AND folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            } elseif($userRole == "student"){
                              $sql = $connect->query("SELECT * FROM user_files WHERE user_id = '$userId' AND folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            }else {
                              $sql = $connect->query("SELECT * FROM user_files WHERE folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            }
                            while ($data = $sql->fetch()) {
                              $fileid = $data['id'];
                              $userId = $data['user_id'];
                              $userSql = $connect->query("SELECT nickname FROM users WHERE id = '$userId'");
                              $userName = $userSql->fetchColumn();
                              if($data['type'] == "online" || $data['type'] == "offline"){
                                ?>
                                <p style="font-size:large;"><b><?php echo $userName; ?></b> Created <b><?php echo $data['lastName']; ?></b>
                                <?php
                              }else{
                                $extension = pathinfo($data['filename'], PATHINFO_FILENAME);
                            ?>
                            <p style="font-size:large;"><b><?php echo $userName; ?></b> Created <b><?php echo $extension ?></b>
                            <?php
                              }
                            ?>
                            
                               File
                                <span style="float:right; position:relative;">
                                  <a data-bs-toggle="tooltip" data-bs-placement="right" title="Edit File" class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('file_edit_id_dashboardd').value='<?php echo $fileid; ?>';
                                                             document.getElementById('file_dashboardd').value='<?php echo $data['filename']; ?>';" data-bs-toggle="modal" data-bs-target="#file_dashboard_modald"><i class="bi bi-pen-fill"></i></a>
                                  <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete File" class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL ?>Library/delete_files.php?deleteIdfilesdetail=<?php echo $fileid; ?>"><i class="bi bi-x-circle"></i></a>
                                  <button data-bs-toggle="tooltip" data-bs-placement="right" title="Move File" class="btn btn-soft-primary btn-xs" style="padding-left:5px; padding-right:5px;"><a href="move_link_data.php?copyId=<?php echo $fileid; ?>"><img style="height: 15px; width:15px;" class="moveImg" src="<?php echo BASE_URL; ?>assets/svg/actions/black/move.png"></a></button>
                                  <button data-bs-toggle="tooltip" data-bs-placement="right" title="Permission File" class="btn btn-soft-secondary btn-xs"><a data-bs-target="#filePermissionModal" class="filePermissionModal" data-bs-toggle="modal" value="<?php echo $fileid; ?>"><img style="height: 15px; width:15px;" src="<?php echo BASE_URL; ?>assets/svg/actions/Permissions/permission.png"></a></button>
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
                              $sql = $connect->query("SELECT * FROM editor_data WHERE (userId = '$userId' OR userRole = 'student') AND folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            }  elseif($userRole == "student"){
                              $sql = $connect->query("SELECT * FROM editor_data WHERE userId = '$userId' AND folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            }else {
                              $sql = $connect->query("SELECT * FROM editor_data WHERE folderId = '$f_id' ORDER BY id DESC LIMIT 10");
                            }
                            while ($data = $sql->fetch()) {
                              $userId = $data['userId'];
                              $pageid = $data['id'];
                              $userSql = $connect->query("SELECT nickname FROM users WHERE id = '$userId'");
                              $userName = $userSql->fetchColumn();
                            ?>

                              <p style="font-size:large;"><b><?php echo $userName; ?></b> Created <b><?php echo $data['pageName']; ?></b> Page
                                <span style="float:right; position:relative;">
                                  <a data-bs-toggle="tooltip" data-bs-placement="right" title="Edit Page" class="btn btn-soft-success btn-xs" href="edit-textEditor.php?id=<?php echo $pageid; ?>"><i class="bi bi-pen-fill"></i></a>
                                  <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete Page" class="btn btn-soft-danger btn-xs" href="delete_newpage.php?deleteId=<?php echo $pageid; ?>"><i class="bi bi-x-circle"></i></a>
                                  <button data-bs-toggle="tooltip" data-bs-placement="right" title="Move Page" class="btn btn-soft-primary btn-xs" style="padding-left:5px; padding-right:5px;"><a href="move_editor_data.php?copyId=<?php echo $pageid; ?>"><img style="height: 15px; width:15px;" class="moveImg" src="<?php echo BASE_URL; ?>assets/svg/actions/black/move.png"></a></button>
                                  <button data-bs-toggle="tooltip" data-bs-placement="right" title="Permission Page" class="btn btn-soft-secondary btn-xs"><a data-bs-target="#pagePermissionModal" class="pagePermissionModal" data-bs-toggle="modal" value="<?php echo $pageid; ?>"><img style="height: 15px; width:15px;" src="<?php echo BASE_URL; ?>assets/svg/actions/Permissions/permission.png"></a></button>
                                </span>
                              </p>
                              <hr>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- End Body -->
                </div>
                <!-- End Card -->
              </div>
            </div>
            <!-- End Row -->

          </div>
        </center>
      </div>
      <!-- End Content -->

    </main>
 

  <!-- permission modal -->

  <div class="modal fade" id="filePermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="hidden" value="" name="permissionPageID" id="permissionFileID" />
                <table class="table">
                  <tr>
                    <td>
                      <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                    <option disabled>Select File Method</option>
                    <option value="All instructor">All Instructor</option>
                    <option selected value="Everyone">Everyone</option>
                    <option value="None">None</option>
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
                  <input type="submit" class="btn btn-success" value="Give Permission" name="filePermissionBtnAllDetail" />
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- permission modal pages -->

  <div class="modal fade" id="pagePermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="hidden" value="" name="permissionPageID" id="permissionPage_ID" />
                <center>
                  <table class="table">
                    <tr>
                      <td>
                        <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                    <option disabled>Select File Method</option>
                    <option value="All instructor">All Instructor</option>
                    <option selected value="Everyone">Everyone</option>
                    <option value="None">None</option>
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
                  <input type="submit" class="btn btn-success" value="Give Permission" name="permissionBtnAllDetail" />
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!--Edit briefcase modal-->
  <div class="modal fade" id="edit_brief_deatail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark" id="exampleModalLabel">Edit Briefcase</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_brief_lib.php">
            <input type="hidden" class="form-control" name="id" value="" id="brief_edit_id_deatail" readonly>
            <input type="text" class="form-control" name="brief" value="" id="brief_deatail">
            <br>
            <input style="float:right;" class="btn btn-soft-dark" type="submit" name="submit_user_briefcase_deatail" value="Submit">
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
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Files</h3>
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
            <input style="float:right;" class="btn btn-success" type="submit" name="adminFileEdit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="file_dashboard_modald" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Files</h3>
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
            <input style="float:right;" class="btn btn-success" type="submit" name="userFileEditdetail" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>



<script>
  $(".filePermissionModal").on("click", function() {
    var fileId = $(this).attr("value");
    $("#permissionFileID").val(fileId);
  });

  $(".pagePermissionModal").on("click", function() {
    var pageId = $(this).attr("value");
    $("#permissionPage_ID").val(pageId);
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