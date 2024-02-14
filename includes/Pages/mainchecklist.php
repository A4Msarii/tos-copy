<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>CheckList</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                    initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>
<style type="text/css">
  tr:hover {
    background-color: #accbec6b;
  }
</style>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    $course = "";
    $ctp = "";
    ?></div>
  <!--Input checklists-->
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">CheckList</h1>
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
            <div class="card-header card-header-content-center">

              <?php
              $course_du = "";
              if (isset($fixed_ctp_id)) {
                $_SESSION['ctp_value'] = $ctp = $fixed_ctp_id;
                $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
                $statement = $connect->prepare($ctp_id);
                $statement->execute();
                if ($statement->rowCount() > 0) {
                  $result = $statement->fetchAll();
                  $sn = 1;
                  foreach ($result as $row) {
                    $course = $row['course'];
                    $course_du = $row['duration'];
                  }
                }
              } else if (isset($_SESSION['ctp_value'])) {
                $ctp = $_SESSION['ctp_value'];
                $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
                $statement = $connect->prepare($ctp_id);
                $statement->execute();

                if ($statement->rowCount() > 0) {
                  $result = $statement->fetchAll();
                  $sn = 1;
                  foreach ($result as $row) {
                    $course = $row['course'];
                    $course_du = $row['duration'];
                  }
                }
              }
              if (isset($_SESSION['ctp_value'])) { ?>
                <h3>Selected CTP: <span style="color:blue;"><?php echo $course ?></span></h3>
                <span>Duration:<?php echo $course_du; ?></span>
              <?php } else { ?>
                <h3>Selected CTP: <span style="color:red;">Select ctp</span></h3>
              <?php }

              ?>

            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">

              <center>
                <form class="insert-checklists" id="checklist_form" method="post" action="insert_checklist.php" style="width:700px;">
                  <div class="input-field">
                    <table class="table table-bordered" id="table-field-mainchecklist">
                      <tr>
                        <?php if ($_SESSION['ctp_value']) { ?>
                          <input type="hidden" name="ctp" value="<?php echo $ctp ?>">
                        <?php } ?>
                        <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter CheckList" name="checklist[]" id="checklistval" class="form-control" value="" required /><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>
                        <td style="width:20px;"><button type="button" name="add_checklist" id="add_checklist12" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                      </tr>
                    </table>
                  </div>
                  <center>
                    <button style="margin:5px;" class="btn btn-success" type="submit" id="checklist_submit" name="savechecklist">Submit</button>
                  </center>
                </form>
              </center>

              <!--checklist Table-->



              <table class="table table-striped table-bordered" id="newchecktable">
                <input style="margin:5px;" class="form-control" type="text" id="checklistsearch" onkeyup="checklist()" placeholder="Search for checklists.." title="Type in a name">
                <thead class="bg-dark">
                  <th class="text-white">Sr No</th>
                  <th class="text-white">checklist</th>
                  <th>File</th>
                  <th class="text-white">View</th>
                  <th class="text-white" colspan="2">Action</th>
                </thead>
                <?php

                $output1 = "";
                $query1 = "SELECT * FROM checklist where ctp='$ctp'";
                $statement1 = $connect->prepare($query1);
                $statement1->execute();
                if ($statement1->rowCount() > 0) {
                  $result1 = $statement1->fetchAll();
                  $sn1 = 1;
                  foreach ($result1 as $row1) {
                    $id = $row1["id"];
                ?>
                    <tr>

                      <td><?php echo $sn1++; ?></td>
                      <td><a style="color: <?php echo $row1['color']; ?>" href="<?php echo BASE_URL; ?>includes/Pages/subCheckList.php?checkListId=<?php echo $row1['id']; ?>"><?php echo $row1['checklist']; ?></a></td>
                      <td>
                        <?php
                        $fetchMainCheckFile = $connect->query("SELECT * FROM checklistfile WHERE checkListId = '$id'");
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
                      </td>
                      <td>
                        <?php
                        $allFiles = $connect->query("SELECT * FROM subchecklistfiles WHERE checkId = '$id'");
                        while ($fileData = $allFiles->fetch()) {
                          if ($fileData['fileType'] != "offline") {
                            if ($fileData['fileType'] == "online") {
                        ?>
                              <a href="<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo $fileData['lastName']; ?></a>
                              <a href="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php?deleteId=<?php echo $fileData['id']; ?>"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>|
                            <?php
                            }
                            if ($fileData['fileType'] == "pdf" || $fileData['fileType'] == "PDF") {
                            ?>
                              <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo substr($fileData['fileName'], 0, 10); ?> </a>
                              <a href="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php?deleteId=<?php echo $fileData['id']; ?>"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>|
                            <?php
                            }
                          }
                          if ($fileData['fileType'] == "editorData") {
                            ?>
                            <a data-bs-target="#pageModal" data-bs-toggle="modal" style="cursor: pointer;" class="editData" data-id="<?php echo $id; ?>"><?php echo substr($fileData['fileName'], 0, 10); ?> </a>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php?deleteId=<?php echo $fileData['id']; ?>"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>|
                          <?php
                          }
                          if ($fileData['fileType'] == "offline") {
                          ?>
                            <a style="cursor: pointer;" class="driveLink1" value="<?php echo $fileData['fileName']; ?>" target="_blank"><?php echo $fileData['lastName']; ?> </a>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php?deleteId=<?php echo $fileData['id']; ?>"><i style="position:relative;cursor:pointer;" class="bi bi-x-circle text-danger"></i></a>|
                          <?php
                          }
                          ?>

                        <?php
                        }
                        ?>
                      </td>
                      <td><a class="btn btn-soft-success btn-xs edit_course_data" id="<?php echo $row1['id'] ?>" href="" onclick="document.getElementById('chid').value='<?php echo $row1['id'] ?>';document.getElementById('checklist_name').value='<?php echo $row1['checklist']; ?>';" data-bs-toggle="modal" data-bs-target="#editchecklist"><i class="bi bi-pen-fill"></i></a>


                        <a class="btn btn-soft-danger btn-xs" href="checklist-delete.php?id=<?php echo $id ?>&ctp=<?php echo $ctp ?>"><i class="bi bi-trash-fill"></i></a>
                        <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('spid').value='<?php echo $row1['id'] ?>';document.getElementById('checklistmainname').innerHTML='<?php echo $row1['checklist'] ?>';
                                      " data-bs-toggle="modal" data-bs-target="#subchecklist" data-bs-title="Add Objective"><i class="bi bi-info-lg"></i></a>
                        <a class="btn btn-soft-warning btn-xs fetchSubCheckList" onclick="document.getElementById('checkname').innerHTML='<?php echo $row1['checklist']; ?>';" data-bs-toggle="modal" data-id="<?php echo $row1['id']; ?>" data-bs-target="#subchecklistmange" data-bs-title="Sub Checklist List"><i class="bi bi-gear"></i></a>

                        <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('cc_id').value='<?php echo $row1['id']; ?>';
                                        document.getElementById('cc_name').innerHTML='<?php echo $row1['checklist']; ?>';
                                      " data-bs-toggle="modal" data-bs-target="#color_checklist" data-bs-title="Add Color"><i class="bi bi-palette"></i>

                        </a>

                        <a class="btn btn-soft-primary btn-xs getMainId" href="" data-mainid="<?php echo $row1['id']; ?>" data-bs-toggle="modal" data-bs-target="#AttachamentModalStuChecklist" data-bs-title="Add File"><i class="bi bi-paperclip"></i>

                        </a>

                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </table>
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

  <!-- Modal -->
  <div id="AttachamentModalStuChecklist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: #71869d8f;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalCenterTitle">Add File</h3>
          <button style="margin-left:5px;position: absolute;right: 65px;" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#selectfilesStuChecklist">Select</button>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOptChecklist">
            <option selected>Select File Method</option>
            <!-- <option value="addNewPage">New Page</option> -->
            <option value="addFile">Attachment</option>
            <option value="addFileLoca">Drive Link</option>
            <option value="addFileLink">Link</option>
          </select>
          <br>
          <center>
            <form method="post" enctype="multipart/form-data" class="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/addStuCheckFiles.php">
              <div class="input-field">
                <table class="table table-bordered">
                  <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                  <tr>
                    <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Files</label>
                      <input type="file" class="form-control" name="file" id="" />
                    </td>
                </table>
              </div><br>
              <hr>
              <center>
                <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="addNewFile" class="btn btn-success" />

              </center>
            </form>
          </center>
          <center>
            <form class="insert-phases phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addStuCheckFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
              <div class="input-field">
                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
                <table class="table table-bordered" id="table-field">
                  <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                  <tr>
                    <td style="text-align: center;"><input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required /> </td>
                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" /> </td>
                  </tr>
                </table>
              </div>
              <br>
              <hr>
              <center>
                <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
              </center>
            </form>
          </center>

          <center>
            <form class="insert-phases filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addStuCheckFiles.php" style="width:80%;display:none;" enctype="multipart/form-data">
              <div class="input-field">
                <input type="hidden" name="mainCheckFileId" class="mainCheckFileId">
                <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
                <table class="table table-bordered" id="table-field-link">
                  <tr>
                    <td style="text-align: center;"><input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required /> </td>
                    <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" /> </td>
                  </tr>
                </table>
              </div>
              <br>
              <hr>
              <center>
                <button style="margin:5px; float:right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="link_submit" name="onlineLink">Submit</button>
              </center>
            </form>
          </center>
        </div>
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <div class="modal fade" id="selectfilesStuChecklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #71869d8f;">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/addStuCheckFiles.php" enctype="multipart/form-data">

            <input type="text" class="mainCheckFileId" name="mainCheckFileId">
            <table class="table table-bordered" id="files1">
              <input style="margin:5px;" class="form-control" type="text" id="file_search" onkeyup="file_by_file()" placeholder="Search for Files.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-light"><input type="checkbox" id="select-all"></th>
                <!-- <th class="text-light">File Names</th> -->
                <th class="text-light"> UPLOADED FILES</th>
                <th class="text-light">View</th>

              </thead>
              <?php

              $query11_fm10 = "SELECT * FROM user_files";
              $statement11_fm10 = $connect->prepare($query11_fm10);
              $statement11_fm10->execute();
              if ($statement11_fm10->rowCount() > 0) {
                $result11_fm10 = $statement11_fm10->fetchAll();

                foreach ($result11_fm10 as $row110) {
                  $filesname = "";
                  $f = $row110['id'];
                  $countQ = $connect->query("SELECT count(*) FROM checklistfile WHERE fileId = '$f'");
                  if ($countQ->fetchColumn() <= 0) {

                    if ($row110['type'] == "online" || $row110['type'] == "offline") {
                      $filesname = $row110['lastName'];
                    } else {
                      $filesname = $row110['filename'];
                    }

              ?>
                    <tr>
                      <td><input type="checkbox" name="fileId[]" value="<?php echo $row110['id'] ?>" /></td>
                      <td style="text-align: left;">
                        <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                        <span style="color:#9540e4; text-align: left;" title="<?php echo $row110['filename'] ?>"><?php echo $filesname; ?></span>
                      </td>
                      <td>
                        <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row110['filename']; ?>" target="_blank">View</a>
                      </td>
                    </tr>
              <?php }
                }
              }
              ?>

            </table>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
              <input style="float:right;" type="submit" class="btn btn-success" value="Add" name="addSelectFile" />
            </div>
            <!-- <input style="float:right;" type="submit" class="btn btn-success" value="Add" name="addFile" /> -->
          </form>
          <!-- </div> -->
        </div>
      </div>
    </div>
  </div>

  <!-- edit checklist modal -->
  <div class="modal fade" id="editchecklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit checklist</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="post" action="edit_checklist.php">
            <?php if (isset($_SESSION['ctp_value'])) { ?>
              <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
            <?php } ?>
            <input class="form-control" type="hidden" name="id" value="" id="chid">
            <div class="row" id="get_course_foem">




            </div>


            <input class="btn btn-success" type="submit" value="Submit" name="checksubmit" style="float:right; font-weight:bold; font-size:large;" />

        </div>
        </form>

      </div>
    </div>
  </div>
  </div>

  <div class="modal fade" id="subchecklistmange" tabindex="-1" role="dialog" aria-labelledby="checkname" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-success" id="checkname"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered">
            <thead class="bg-dark">
              <th class="text-white">Sr No</th>
              <th class="text-white">Name</th>
              <th class="text-white">Files</th>
              <th class="text-white">Action</th>
            </thead>
            <tbody id="subCheckListId">
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="pageModal" tabindex="-1" role="dialog" aria-labelledby="checkname" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-success" id="checkname"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="pageDatas">

        </div>
      </div>
    </div>
  </div>



  <!-- add sub checklist modal -->
  <div class="modal fade" id="subchecklist" tabindex="-1" role="dialog" aria-labelledby="checklistmainname" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="checklistmainname"></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form method="post" action="insert_subchecklist.php">
              <?php if (isset($_SESSION['ctp_value'])) { ?>
                <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
              <?php } ?>
              <input class="form-control" type="hidden" name="id" value="" id="spid">
              <div class="input-field">
                <table class="table table-bordered" id="subchecklist_table">
                  <tr>

                    <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>
                    <td style="border: 1px solid white;"><button type="button" name="add_goal_actual" id="add_subchecklist" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                  </tr>
                </table>
                <hr>
                <button style="margin:10px; float: right; font-size:large; font-weight:bold;" class="btn btn-success" type="submit" name="submit_subchecklist">Save</button>
              </div>
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="subchecklistEdit" tabindex="-1" role="dialog" aria-labelledby="checklistmainname" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="checklistmainname1"></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php">
              <input type="hidden" name="subCheckVal" id="subCheckVal" />
              <input class="form form-control" type="text" name="subCheckListInput" id="subCheckListInput" placeholder="Enter Sub checklist" />
              <input type="submit" value="Edit" name="editSub" class="btn btn-success" />
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>



  <!-- add color modal modal -->
  <div class="modal fade" id="color_checklist" tabindex="-1" role="dialog" aria-labelledby="cc_name" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="cc_name"></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center>
            <form action="<?php echo BASE_URL; ?>includes/Pages/insert_color.php">
              <input class="form-control" type="hidden" name="id" value="" id="cc_id">
              <label for="color" style="font-size:large; font-weight:bold;">Select a color for Checklist:</label><br>
              <input type="color" id="color" name="favcolor" required><br>
              <hr>
              <input type="submit" class="btn btn-success" style="float:right;" name="checklist_color">
            </form>

          </center>
        </div>
      </div>
    </div>
  </div>



  <!--Script for add multiple checklists-->

  <script type="text/javascript">
    $(document).ready(function() {


      var html = '<tr>\
	                        <td style="text-align: center; display:flex;"><input type="text" placeholder="Enter checklist" name="checklist[]" id="checklistval" class="form-control" value="" required/><span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span> </td>\
	                        <td><button type="button" name="remove_actual" id="remove_checklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
	                    </tr>'
      var max = 100;
      var a = 1;

      $("#add_checklist12").click(function() {
        if (a <= max) {
          $("#table-field-mainchecklist").append(html);
          a++;
        }
      });
      $("#table-field-mainchecklist").on('click', '#remove_checklist', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script>


  <script type="text/javascript">
    $(document).ready(function() {
      var html = '<tr>\
                  <td style="border: 1px solid white;"><input type="text" name="subchecklist[]" class="form-control" placeholder="Enter Checklist" required></td>\
                  <td style="border: 1px solid white;"><button type="button" name="remove_subchecklist" id="remove_subchecklist" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
      var max = 100;
      var a = 1;

      $("#add_subchecklist").click(function() {
        if (a <= max) {
          $("#subchecklist_table").append(html);
          a++;
        }
      });
      $("#subchecklist_table").on('click', '#remove_subchecklist', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
    $("#newchecktable").on("click", ".edit_course_data", function() {

      var ctid = $(this).attr('id');

      $.ajax({
        type: 'POST',
        url: 'fetch_check_edit_value.php',
        data: 'ctid=' + ctid,
        success: function(response) {

          $('#get_course_foem').empty();
          $('#get_course_foem').html(response);
        }
      });

    });
  </script>


  <script>
    function checklist() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("checklistsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("checklisttable");
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
    let subCheck = 0;
    let check = 0;
    const cId = <?php echo $std_course1 ?>;
    $("#subCheckListId").on("click", ".addCheckValue", function() {
      const checkValue = $(this).data("check");
      const subCheckValue = $(this).data("subcheck");
      subCheck = subCheckValue;

      check = checkValue;
      $(".subCheckId").val(subCheckValue);
      $(".checkId").val(checkValue);
    });
  </script>

  <script>
    $(".fetchSubCheckList").on("click", function() {
      const checkListId = $(this).data("id");
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
        data: {
          checkListId: checkListId,
        },
        success: function(response) {
          $("#subCheckListId").empty();
          $("#subCheckListId").html(response);
        }
      });
    });
  </script>

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
        // window.location.href = "<?php echo BASE_URL; ?>includes/Pages/subTextEditor.php?subCheck=" + subCheck + "&check=" + check + "&ctpId=" + cId;

        window.location.href = "<?php echo BASE_URL; ?>includes/Pages/subTextEditor.php?subCheck=" + subCheck + "&check=" + check + "&ctpId=" + cId;
      }
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

  <script>
    $(".editData").on("click", function() {

      const pageId = $(this).data("id");
      $.ajax({
        type: 'POST',
        url: '<?php echo BASE_URL; ?>includes/Pages/addCheckAndSubCheckList.php',
        data: {
          pageId: pageId,
        },
        success: function(response) {
          $("#pageDatas").empty();
          $("#pageDatas").html(response);
        }
      });

    });
  </script>

  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>


</body>

<script>
  $(".getMainId").on("click", function() {
    const mId = $(this).data("mainid");
    $(".mainCheckFileId").val(mId);
  })
</script>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</html>