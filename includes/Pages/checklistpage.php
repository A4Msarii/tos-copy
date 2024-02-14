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
  <title>CheckList Page</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">
</head>
<style type="text/css">
  .col-1,
  .col-10,
  .col-5 {
    padding: 10px;
  }

  input {
    margin: 5px;
  }

  h5 {
    margin: 5px;
  }
</style>

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
          <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/icons/checklist1.png">
          Checklist
        </h1>
      </div>
      <!-- End Page Header -->
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

              <?php include 'courcecode.php'; ?>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body justify-content-center">
              <center>
                <input type="text" class="form-control form-control-lg" id="searchInputchecklist" placeholder="Search messages or users" aria-label="Search for messages or users..." style="width: 90%; padding: 10px;">
              </center>
              <input type="hidden" value="<?php echo $fetchuser_id ?>" id="user_ides1">
              <?php
              $item_sel_em = "SELECT * FROM checklist where ctp='$std_course1'";
              $item_selst_em = $connect->prepare($item_sel_em);
              $item_selst_em->execute();

              if ($item_selst_em->rowCount() > 0) {
                $students_em = $item_selst_em->fetchAll();
                foreach ($students_em as $student_id) {
                  if ($student_id['color'] == "") {
                    $bgColor = "grey";
                  } else {
                    $bgColor = $student_id['color'];
                  }
                  $item_ided = $student_id['id'];

                  $allCheckList = $connect->query("SELECT count(*) FROM subcheclist WHERE main_checklist_id = '$item_ided'");
                  $allCheckListData = $allCheckList->fetchColumn();

                  $countSubCheckList = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$item_ided' AND studentId = '$fetchuser_id' AND ctpId = '$std_course1'");
                  $checkSubListData = $countSubCheckList->fetchColumn();

                  $countCheckFile = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE checkId = '$item_ided' AND ctpId = '$std_course1'");
                  $countCheckFileData = $countCheckFile->fetchColumn();

              ?>
                  <div class="container justify-content-center rowAdd" id="rowAdd" style="margin-left:200px; margin-right:200px;">

                    <div class="row" id="rowsearch">
                      <div class="col-1" style="position: absolute;margin-left: -75px;">


                        <?php if ($checkSubListData != $allCheckListData || $allCheckListData == 0) { ?>
                          <img src="<?php echo BASE_URL; ?>assets/svg/icons/corss1.png" style="height: 45px; margin:10px;">
                        <?php } else {
                        ?>
                          <img src="<?php echo BASE_URL; ?>assets/svg/icons/check1.png" style="height: 45px; margin:10px;">
                        <?php
                        } ?>
                      </div>
                      <div class="col-11">
                        <div class="row">
                          <div class="col-10" style="margin-top:20px; border-radius:15px; background-color: <?php echo $bgColor; ?>">
                            <h3 style="color:white;margin: 5px; cursor:pointer;float: left;"><?php echo $student_id['checklist']; ?>
                              <?php
                              if ($countCheckFileData != 0) {
                              ?>
                                <!-- <p>Total Files :- <?php echo $countCheckFileData; ?></p> -->
                              <?php
                              }
                              ?>
                            </h3>
                            <i class="bi bi-three-dots-vertical" style="float:right;border-radius: 50px;padding: 5px; color:white; cursor:pointer;" id="selectLanguageDropdowncheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdowncheck">
                              <!-- Dropdown menu content -->
                              <label style="font-weight:bold; color:black;">Checklist Name : <span style="font-size:larger; color:grey;"><?php echo $student_id['checklist']; ?></span></label><br>
                              <label style="font-weight:bold; color:black;">Description : <span style="font-size:larger; color:grey;"><?php echo $student_id['description']; ?></span></label><br>
                              <label style="font-weight:bold; color:black;">Status : <span style="font-size:larger; color:grey;"><?php echo $student_id['status']; ?></span></label><br>
                              <label style="font-weight:bold; color:black;">Priority : <span style="font-size:larger; color:grey;"><?php echo $student_id['priority']; ?></span></label><br>
                              <label style="font-weight:bold; color:black;">Category : <span style="font-size:larger; color:grey;"><?php echo $student_id['category']; ?></span></label><br>
                              <label style="font-weight:bold; color:black;">Comment : <span style="font-size:larger; color:grey;"><?php echo $student_id['comment']; ?></span></label><br>
                              <label style="font-weight:bold; color:black;">Date : <span style="font-size:larger; color:grey;"><?php echo $student_id['date']; ?></span></label><br>

                            </div>

                            <i class="bi bi-eye" style="border-radius: 50px;padding: 5px;cursor:pointer; font-size: large;margin-top: 5px;" id="viewChecklistFiles" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                            <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="viewChecklistFiles">
                              <!-- Dropdown menu content -->
                              <?php
                              $fetchMainCheckFile = $connect->query("SELECT * FROM checklistfile WHERE checkListId = '$item_ided'");
                              while ($fetchMainCheckFileData = $fetchMainCheckFile->fetch()) {
                                $fId = $fetchMainCheckFileData['fileId'];
                                $fetchFileQ = $connect->query("SELECT * FROM user_files WHERE id = '$fId'");
                                while ($fetchFileData = $fetchFileQ->fetch()) {
                                  if ($fetchFileData['lastName'] == "") {
                              ?>
                                    <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['filename']; ?></a>
                                  <?php
                                  }
                                  if ($fetchFileData['type'] == "online") {
                                  ?>
                                    <a href="http://<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['lastName']; ?></a>
                                  <?php
                                  }
                                  if ($fetchFileData['type'] == "offline") {
                                  ?>
                                    <a class="driveLinkPer" value="<?php echo $fetchFileData['filename'] ?>"><?php echo $fetchFileData['lastName']; ?></a>
                              <?php
                                  }
                                }
                              }
                              ?>

                            </div>

                          </div>
                        </div>
                        <div class="row">
                          <?php
                          $select_checklist = "SELECT * FROM subcheclist where main_checklist_id='$item_ided'";
                          $select_checklist_st = $connect->prepare($select_checklist);
                          $select_checklist_st->execute();

                          if ($select_checklist_st->rowCount() > 0) {
                            $select_checklist_re = $select_checklist_st->fetchAll();
                            foreach ($select_checklist_re as $rowselect) {
                              $subCheckId = $rowselect['id'];
                              $checkSubCheckList = $connect->query("SELECT count(*) FROM check_sub_checklist WHERE checkListId = '$item_ided' AND subCheckListId = '$subCheckId' AND studentId = '$fetchuser_id' AND ctpId = '$std_course1'");
                              $checkSubData = $checkSubCheckList->fetchColumn();
                              if ($checkSubData > 0) {
                                $checkData = "checked";
                              } else {
                                $checkData = "";
                              }
                          ?>
                              <div class="col-10 border d-flex" style="border-radius: 20px;">
                                <input style="height: 25px;width: 25px;border-radius: 15px;" type="checkbox" class="form-check-input is-valid allcheckList" name="check" id="<?php echo $rowselect['id']; ?>" data-checklist="<?php echo $item_ided; ?>" value="<?php echo $rowselect['id']; ?>" <?php echo $checkData; ?>>

                                <h5 style="cursor: pointer; margin: 5px; float:left;"><?php echo $rowselect['name']; ?></h5>
                                <i class="bi bi-three-dots-vertical" style="float:right;border-radius: 50px;padding: 5px; color:black; cursor:pointer;" id="selectLanguageDropdownsubcheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                                <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdownsubcheck">
                                  <!-- Dropdown menu content -->
                                  <label style="font-weight:bold; color:black;">Checklist Name : <span style="font-size:larger; color:grey;"><?php echo $rowselect['name']; ?></span></label><br>
                                  <label style="font-weight:bold; color:black;">Description : <span style="font-size:larger; color:grey;"><?php echo $rowselect['description']; ?></span></label><br>
                                  <label style="font-weight:bold; color:black;">Status : <span style="font-size:larger; color:grey;"><?php echo $rowselect['status']; ?></span></label><br>
                                  <label style="font-weight:bold; color:black;">Priority : <span style="font-size:larger; color:grey;"><?php echo $rowselect['priority']; ?></span></label><br>
                                  <label style="font-weight:bold; color:black;">Category : <span style="font-size:larger; color:grey;"><?php echo $rowselect['category']; ?></span></label><br>
                                  <label style="font-weight:bold; color:black;">Comment : <span style="font-size:larger; color:grey;"><?php echo $rowselect['comment']; ?></span></label><br>

                                </div>
                                <?php
                                $countCheckFile = $connect->query("SELECT count(*) FROM subchecklistfiles WHERE subCheckId = '$subCheckId' AND ctpId = '$std_course1'");
                                $countCheckFileData = $countCheckFile->fetchColumn();
                                if ($countCheckFileData > 0) {
                                ?>
                                  <i class="bi bi-paperclip" style="float:right;border-radius: 50px;padding: 5px; color:black; cursor:pointer; float: right;" id="selectLanguageDropdowncheck" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation></i>
                                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdowncheck">
                                    <!-- Dropdown menu content -->
                                    <?php
                                    $fetchMainCheckFile = $connect->query("SELECT * FROM subchecklistfile WHERE subCheckId = '$subCheckId'");
                                    while ($fetchMainCheckFileData = $fetchMainCheckFile->fetch()) {
                                      $fId = $fetchMainCheckFileData['fileId'];
                                      $fetchFileQ = $connect->query("SELECT * FROM user_files WHERE id = '$fId'");
                                      while ($fetchFileData = $fetchFileQ->fetch()) {
                                        if ($fetchFileData['lastName'] == "") {
                                    ?>
                                          <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['filename']; ?>&nbsp;|</a>
                                        <?php
                                        }
                                        if ($fetchFileData['type'] == "online") {
                                        ?>
                                          <a href="http://<?php echo $fetchFileData['filename'] ?>" target="_blank"><?php echo $fetchFileData['lastName']; ?>&nbsp;|</a>
                                        <?php
                                        }
                                        if ($fetchFileData['type'] == "offline") {
                                        ?>
                                          <a class="driveLinkPer" value="<?php echo $fetchFileData['filename'] ?>"><?php echo $fetchFileData['lastName']; ?>&nbsp;|</a>
                                    <?php
                                        }
                                      }
                                    }
                                    ?>
                                  </div>
                                <?php
                                }
                                ?>
                              </div>
                          <?php
                            }
                          }
                          ?>

                        </div>
                      </div>
                    </div>

                  </div>
              <?php }
              } ?>
              <hr>
              <!-- <input type="button" value="Submit" class="btn btn-success" id="addAllCheckList" style="font-size: large;font-weight: bold;float: right;" /> -->
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->
      </div>
    </div>

  </main>

  <!-- Modal -->
  <div class="modal fade" id="subchecklistmodal" tabindex="-1" role="dialog" aria-labelledby="subname" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-success" id="subname">Add Files</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- <form>
            <input type="" name="id" id="subid">
            <input type="file" name="file" class="form-control"><br>
            <hr>
            <input class="btn btn-success" type="button" name="subbtn" value="Submit" style="font-size:large; font-weight:bold;float: right;">
          </form> -->

          <div class="card-body">
            <select class="form-select fileOpt" aria-label="Default select example" style="width:80%;margin: auto;margin-top:25px;" id="fileOpt">
              <option selected>Select File Type</option>
              <!-- <option value="addNewPage">New Page</option> -->
              <option value="addFile">Attachment</option>
              <option value="addFileLoca">Drive Link</option>
              <option value="addFileLink">Link</option>
            </select>
            <form action="<?php echo BASE_URL ?>includes/Pages/addCheckFile.php" method="post" enctype="multipart/form-data" style="width:95%;margin: auto;margin-top: 25px;display:none;" id="multipleFile" class="multipleFile">
              <input type="hidden" name="checkId" class="checkId" value="" />
              <input type="hidden" name="subCheckId" class="subCheckId" value="" />
              <input type="hidden" name="ctpId" class="" value="<?php echo $std_course1; ?>" />
              <!-- <input type="hidden" name="fileBriefcase" class="" value="user" /> -->
              <div class="input-field">
                <table class="table table-bordered">
                  <tr>
                    <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                      <input type="file" class="form-control" name="file[]" id="" multiple />
                    </td>
                  </tr>
                </table>
              </div><br>
              <!-- <center>
                <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                <br>
                <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                  <option value="All instructor">Instructor Only</option>
                  <option value="Everyone" selected>Everyone</option>
                  <option value="None">None</option>
                </select>
                <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                  <option selected value="readOnly">ReadOnly</option>
                  <option value="None">None</option>
                  <option value="readAndWrite">Read And Write</option>
                </select>
                <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                <table class="table table-bordered tableData" style="display:none;">
                  <thead class="bg-dark">
                    <tr>
                      <th class="text-light">#</th>
                      <th class="text-light">Profile Image</th>
                      <th class="text-light">Name</th>

                    </tr>
                  </thead>
                  <tbody class="userDetail">

                  </tbody>
                </table>
              </center> -->
              <center>
                <input style="margin:5px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" value="Submit" name="attachement" />
                <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
              </center>
            </form>
            <br>
            <center>
              <form class="insert-phases phase_form" id="phase_form" method="post" action="<?php echo BASE_URL ?>includes/Pages/addCheckFile.php" style="display:none;" enctype="multipart/form-data">
                <input type="hidden" name="checkId" class="checkId" value="" />
                <input type="hidden" name="subCheckId" class="subCheckId" value="" />
                <input type="hidden" name="linkType" id="linkType" value="<?php echo "offline"; ?>" />
                <input type="hidden" name="ctpId" class="" value="<?php echo $std_course1; ?>" />
                <input type="hidden" name="fileBriefcase" class="" value="user" />
                <div class="input-field">
                  <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                  <table class="table table-bordered" id="table-field">
                    <tr>
                      <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" />
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- <center>
                  <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                  <br>
                  <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                    <option value="All instructor">Instructor Only</option>
                    <option value="Everyone" selected>Everyone</option>
                    <option value="None">None</option>
                  </select>
                  <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                    <option selected value="readOnly">ReadOnly</option>
                    <option value="None">None</option>
                    <option value="readAndWrite">Read And Write</option>
                  </select>
                  <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                  <table class="table table-bordered tableData" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-light">#</th>
                        <th class="text-light">Profile Image</th>
                        <th class="text-light">Name</th>

                      </tr>
                    </thead>
                    <tbody class="userDetail">

                    </tbody>
                  </table>
                </center> -->
                <center>
                  <button style="margin:5px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
                  <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                </center>
              </form>
            </center>
            <center>
              <form class="insert-phases filelink" id="filelink" method="post" action="<?php echo BASE_URL ?>includes/Pages/addCheckFile.php" style="display:none;" enctype="multipart/form-data" sty>
                <input type="hidden" name="checkId" class="checkId" value="" />
                <input type="hidden" name="subCheckId" class="subCheckId" value="" />
                <input type="hidden" name="linkType" id="linkType" value="<?php echo "online"; ?>" />
                <input type="hidden" name="ctpId" class="" value="<?php echo $std_course1; ?>" />
                <input type="hidden" name="fileBriefcase" class="" value="user" />
                <div class="input-field">
                  <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                  <table class="table table-bordered" id="table-field-link">
                    <tr>
                      <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required />
                      </td>

                    </tr>
                    <tr>
                      <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" />
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- <center>
                  <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="share individual" />
                  <br>
                  <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionType">

                    <option value="All instructor">Instructor Only</option>
                    <option value="None">None</option>
                    <option value="Everyone" selected>Everyone</option>
                  </select>
                  <select class="form-select" aria-label="Default select example" style="width:95%;margin-bottom:25px;" id="permissionType" name="permissionCategory">
                    <option value="readOnly">ReadOnly</option>
                    <option value="None">None</option>
                    <option value="readAndWrite">Read And Write</option>
                  </select>
                  <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                  <table class="table table-bordered tableData" style="display:none;">
                    <thead class="bg-dark">
                      <tr>
                        <th class="text-light">#</th>
                        <th class="text-light">Profile Image</th>
                        <th class="text-light">Name</th>

                      </tr>
                    </thead>
                    <tbody class="userDetail">

                    </tbody>
                  </table>
                </center> -->
                <center>
                  <button style="margin:5px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
                  <input class="form-control" type="hidden" name="br_id" value="" id="userfi_id" readonly>
                </center>
            </center>
            </form>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->


  <script type="text/javascript">
    $(document).ready(function() {


      var html9 = '<div class="row">\
                  <div class="col-1"><i class="bi bi-card-checklist" style="font-size:xxx-large;"></i></div>\
                  <div class="col-10 bg-primary" style="margin-top:25px;"><h3>Column</h3></div>\
                  <div class="col-1"><button class="btn btn-danger" id="btnRemove"><i class="bi bi-dash-square"></i></button></div>\
                  <div class="w-100"></div>\
                  <div class="col-1"></div>\
                  <div class="col-5 border d-flex"><input type="checkbox" name="check"><h5>Column</h5></div>\
                  <div class="col-5 border d-flex"><input type="checkbox" name="check"><h5>Column</h5></div>\
                  <div class="w-100"></div>\
                  <div class="col-1"></div>\
                  <div class="col-5 border d-flex"><input type="checkbox" name="check"><h5>Column</h5></div>\
                  <div class="col-5 border d-flex"><input type="checkbox" name="check"><h5>Column</h5></div>\
                  <div class="w-100"></div>\
                  <div class="col-1"></div>\
                  <div class="col-5 border d-flex"><input type="checkbox" name="check"><h5>Column</h5></div>\
                  <div class="col-5 border d-flex"><input type="checkbox" name="check"><h5>Column</h5></div>\
                </div>'
      var max9 = 100;
      var a9 = 1;

      $("#btnAdd").click(function() {
        if (a9 <= max9) {
          $("#rowAdd").append(html9);
          a9++;
        }
      });
      $("#rowAdd").on('click', '#btnRemove', function() {
        $(this).closest('tr').remove();
        a9--;
      });
    });
  </script>




  <script>
    $(".allcheckList").change(function() {
      const studentId = <?php echo $fetchuser_id ?>;
      const ctpId = <?php echo $std_course1 ?>;
      const mainCheck = $(this).data("checklist");
      const subCheck = $(this).val();
      if ($(this).is(":checked")) {
        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
          data: {
            dataItem: mainCheck,
            subItem: subCheck,
            studentId: studentId,
            ctpId: ctpId,
          },
          success: function(response) {
            // alert(response);
            // fetchCheckData();
            window.location.reload();
          }
        });
      } else {
        $.ajax({
          type: 'POST',
          url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
          data: {
            dataItem: mainCheck,
            subItemRem: subCheck,
            studentId: studentId,
            ctpId: ctpId,
          },
          success: function(response) {
            // alert(response);
            // fetchCheckData();
            window.location.reload();
          }
        });
      }

    });

    // $("#addAllCheckList").on("click", function() {
    //   const studentId = <?php echo $fetchuser_id ?>;
    //   const ctpId = <?php echo $std_course1 ?>;
    //   let submittedCount = 0;
    //   $('.allcheckList:checked').each(function() {
    //     const dataItemValue = $(this).data('checklist');
    //     const subItemValue = $(this).val();

    //     const totalSubItems = $('.allcheckList:checked').length;

    //     sendDataToServer(dataItemValue, subItemValue, studentId, ctpId, totalSubItems, ++submittedCount);
    //   });

    // });

    function sendDataToServer(dataItemValue, subItemValue, studentId, ctpId, totalSubItems, submittedCount) {
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
        data: {
          dataItem: dataItemValue,
          subItem: subItemValue,
          studentId: studentId,
          ctpId: ctpId,
        },
        success: function(response) {
          if (submittedCount == totalSubItems) {
            location.reload(); // Reload the page when all subitems are submitted
          }
        }
      });
    }
  </script>

  <!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const button = document.getElementById('selectLanguageDropdownchecklist');
        const dropdownMenu = document.querySelector('.dropdown-menu');
        let isHovered = false;

        button.addEventListener('mouseover', function () {
            isHovered = true;
            dropdownMenu.classList.add('show');
        });

        button.addEventListener('mouseleave', function () {
            isHovered = false;
            setTimeout(function () {
                if (!isHovered) {
                    dropdownMenu.classList.remove('show');
                }
            }, 200); // Delay before hiding the dropdown
        });

        dropdownMenu.addEventListener('mouseenter', function () {
            isHovered = true;
        });

        dropdownMenu.addEventListener('mouseleave', function () {
            isHovered = false;
            setTimeout(function () {
                if (!isHovered) {
                    dropdownMenu.classList.remove('show');
                }
            }, 200); // Delay before hiding the dropdown
        });
    });
</script> -->

  <script>
    $(".fileOpt").change(function() {
      if ($(this).val() == "addFile") {
        $(".multipleFile").css("display", "block");
        $(".phase_form").css("display", "none");
        $(".filelink").css("display", "none");
        $("#file").css("display", "block");
      }

      if ($(this).val() == "addFileLoca") {
        $(".phase_form").css("display", "block");
        $(".multipleFile").css("display", "none");
        $(".filelink").css("display", "none");
        $("#file").css("display", "block");
      }
      if ($(this).val() == "addFileLink") {
        $(".phase_form").css("display", "none");
        $(".multipleFile").css("display", "none");
        $(".filelink").css("display", "block");
      }

      if ($(this).val() == "addNewPage") {
        window.location.href = "<?php echo BASE_URL; ?>Library/newPage.php?folder_ID=" + folder_ID + "&briefCase_ID=" + briefCase_ID + "&briefType=" + fileBrief;
      }
    });
  </script>

  <script>
    $(".addCheckValue").on("click", function() {
      const checkValue = $(this).data("check");
      const subCheckValue = $(this).data("subcheck");
      $(".subCheckId").val(subCheckValue);
      $(".checkId").val(checkValue);
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('searchInputchecklist');
      const rowElements = document.querySelectorAll('.rowAdd');

      searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();

        rowElements.forEach(rowElement => {
          const textContent = rowElement.textContent.toLowerCase();
          if (textContent.includes(searchTerm)) {
            rowElement.style.display = 'block';
          } else {
            rowElement.style.display = 'none';
          }
        });
      });
    });
  </script>

  <script>
    $(document).on("click", ".driveLink1", function() {
      const page = $(this).attr("value");

      var $tempInput = $("<input>");

      // Set the value of the temporary input element to the text
      $tempInput.val(page);

      // Append the temporary input element to the body
      $("body").append($tempInput);

      // Select the text in the temporary input element
      $tempInput.select();

      // Copy the selected text to the clipboard
      document.execCommand("copy");

      // Remove the temporary input element from the body
      $tempInput.remove();
      window.open('<?php echo BASE_URL; ?>openPageIllu.php', '_blank');
    });
  </script>


  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>

<script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>