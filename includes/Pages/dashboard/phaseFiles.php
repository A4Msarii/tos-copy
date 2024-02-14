<h1>Phase Files</h1>
<div class="row">
  <div class="col-md-8">
    <input style="float:right;margin: 5px;" class="form-control" type="text" id="ClassesSearchFile" onkeyup="ClassSearchFile()" placeholder="Search for Files.." title="Type in a name">
  </div>
  <div class="col-md-4" style="display: flex;justify-content: end;">
    <!-- <label>Filter By Phase </label> -->
    <select id="phaseFilter" style="width: 50%;margin: 5px;border-radius: 5px !important;" class="form-control">
      <option selected value="all">Filter By Phase</option>
      <?php echo $Phase_names11; ?>
    </select>

    <select id="statusFilter" style="width: 50%;margin: 5px;border-radius: 5px !important;" class="form-control" name="">
      <option selected value="all">Filter By Status</option>
      <option>Approved</option>
      <option>In Progress</option>
      <option>In Review</option>
    </select>
  </div>
</div>
<div class="row align-items-center gx-2 mb-2" id="filteredContent">

  <!-- <h3 class="card-subtitle"><?php echo $coursePhase['phasename']; ?></h3> -->
  <div class="table-responsive">
    <table class="table table-bordered" id="PhaseFileTableAll">

      <thead class="bg-dark">
        <tr>
          <th class="text-light">Filename</th>
          <th class="text-light">Course Name</th>
          <th class="text-light">Updated By</th>
          <th class="text-light">Approve By</th>
          <th class="text-light">Updated Date</th>
          <th class="text-light">Status</th>
          <th class="text-light">File size</th>
          <th class="text-light">Phase Name</th>
          <th class="text-light">Version Number</th>
          <th class="text-light">Comments/Notes:</th>
          <th class="text-light">assignees</th>
          <th class="text-light">View</th>
          <th class="text-light">Action</th>

        </tr>
      </thead>
      <tbody class="file-rows">
        <?php
        // $fethcPhase = $connect->query("SELECT * FROM manage_role_course_phase WHERE (intructor = '$user_id' OR b_up_manger = '$user_id') GROUP BY phase_id");
        // while ($phaseData = $fethcPhase->fetch()) {
        //   $phaseId = $phaseData['phase_id'];
        //   $fetchPhaseName = $connect->query("SELECT phasename,color FROM phase WHERE id = '$phaseId'");
        //   $coursePhase = $fetchPhaseName->fetch();
        //   $fetchPhaseFileId = $connect->query("SELECT count(*) FROM phasefilepermission WHERE phaseId = '$phaseId'");
        //   if ($fetchPhaseFileId->fetchColumn() > 0) {
        ?>

        <?php
        $fetchPhaseFileId = $connect->query("SELECT * FROM phasefilepermission WHERE instId = '$user_id' GROUP BY fileId,coursecode,courseName");
        while ($fetchPhaseFileData = $fetchPhaseFileId->fetch()) {
          $phaseId = $fetchPhaseFileData['phaseId'];
          $fetchPhaseName = $connect->query("SELECT phasename,color FROM phase WHERE id = '$phaseId'");
          $coursePhase = $fetchPhaseName->fetch();
          $fileId = $fetchPhaseFileData['fileId'];
          $fileMainId = $fetchPhaseFileData['id'];
          $refId = $fetchPhaseFileData['refrenceid'];
          $fetchFile = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
          $fileData = $fetchFile->fetch();
          $fetchCTPname = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
          $fetchCTPname1 = $fetchCTPname->fetch();
          // $file_paths_value = "includes/Pages/files/" . $fileData['filename'];
          if ($fileData['lastName'] == "") {
            $fName = $fileData['filename'];
            $folderPath = ROOT_PATH . "includes/Pages/files/";
            $filePath = $folderPath . $fName;

            if (file_exists($filePath)) {
              $filePath;
              // Get the file size
              $fileSize = filesize($filePath);
              $size = round($fileSize / 1024);
              $mbSize = number_format($size / 1024, 2);
            } else {
              $mbSize = "-";
            }
          } else {
            $mbSize = "-";
          }
          $bg_classs = "";
          if ($fetchPhaseFileData['status'] == "In Review") {
            $bg_classs = "bg-danger";
          }
          if ($fetchPhaseFileData['status'] == "Approved") {
            $bg_classs = "bg-success";
          }
          if ($fetchPhaseFileData['status'] == "In Progress") {
            $bg_classs = "bg-primary";
          }
        ?>
          <tr>
            <td><span title="<?php echo $fileData['filename']; ?>"><?php echo substr($fileData['filename'], 0, 10); ?></span></td>
            <td>
              <?php
              $fetchCtpName = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '" . $fetchPhaseFileData['courseName'] . "'");
              echo $fetchCtpName->fetchColumn() . "-0" . $fetchPhaseFileData['coursecode'];
              ?>
            </td>
            <td><?php echo $fileData['updatedBy']; ?></td>
            <td>
              <?php
              $fetchAppName = $connect->query("SELECT nickname FROM users WHERE id = '" . $fetchPhaseFileData['lastApprove'] . "'");
              echo $fetchAppName->fetchColumn();
              ?>
            </td>
            <td><?php echo $fetchPhaseFileData['lastDate']; ?></td>
            <td>
              <select id="" style="width: auto;padding: 8px;border: 1px solid #ccc;border-radius: 4px !important;box-sizing: border-box;" class="form-control file_status <?php echo $bg_classs; ?>" data-values="<?php echo $fileId ?>" data-id="<?php echo $fileMainId; ?>" data-values1="<?php echo $fetchPhaseFileData['phaseId'] ?>" data-userid="<?php echo $user_id; ?>" data-coursecode="<?php echo $fetchPhaseFileData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileData['courseName']; ?>">
                <option value="In Review" <?php if ($fetchPhaseFileData['status'] == "In Review") {
                                            echo "selected";
                                          } ?>>In Review</option>
                <option value="Approved" <?php if ($fetchPhaseFileData['status'] == "Approved") {
                                            echo "selected";
                                          } ?>>Approved</option>
                <option value="In Progress" <?php if ($fetchPhaseFileData['status'] == "In Progress") {
                                              echo "selected";
                                            } ?>>In Progress</option>
              </select>
            </td>
            <td>
              <?php if ($mbSize == "-") {
                echo $mbSize;
              } else {
                echo $mbSize . " MB";
              } ?>
            </td>
            <td><span style="color:<?php echo $coursePhase['color']; ?>"><?php echo $coursePhase['phasename']; ?></span></td>
            <td>
              <?php
              $fetchRefIds = $connect->query("SELECT * FROM phasefilepermission WHERE fileId = '$fileId' AND phaseId = '$phaseId' AND status = 'Approved'");
              $coId = 0;
              $coCode = 0;
              while ($fetchRefIdsData = $fetchRefIds->fetch()) {
                if ($fetchRefIdsData['coursecode'] > $coId) {
                  $coId = $fetchRefIdsData['coursecode'];
                  $coCode = $fetchRefIdsData['courseName'];
                  $year = $fetchRefIdsData['year'];
                  $custom_number = $fetchRefIdsData['custom_number'];
                }
              }
              if ($coId > 0) {
                $fetchCtpName = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$coCode'");
                echo $year . ",";
                echo $fetchCtpName->fetchColumn() . "-0" . $coId . ",";
                echo $custom_number;
              } else {
                echo "-";
              }
              ?>
            </td>
            <td style="text-align: center;">
              <a class="btn btn-soft-dark btn-xs" data-bs-toggle="modal" data-bs-target="#phaseCommentModal" onclick="document.getElementById('commentFileId').value='<?php echo $fetchPhaseFileData['fileId']; ?>';document.getElementById('phaseComment').value='<?php echo $fetchPhaseFileData['comments']; ?>';document.getElementById('commentPhaseId').value='<?php echo $fetchPhaseFileData['phaseId']; ?>';document.getElementById('commentCourseCode').value='<?php echo $fetchPhaseFileData['coursecode']; ?>';document.getElementById('commentCourseName').value='<?php echo $fetchPhaseFileData['courseName']; ?>';"><i class="bi bi-chat-text"></i></a>
            </td>
            <td>
              <div class="row align-items-center">
                <div class="col-auto">
                  <!-- Avatar Group -->
                  <div class="avatar-group avatar-group-lg mb-1">
                    <?php
                    $instCount = 0;
                    $fetchAss = $connect->query("SELECT * FROM phasefilepermission WHERE fileId = '$fileId' AND phaseId = '$phaseId' AND coursecode = '" . $fetchPhaseFileData['coursecode'] . "' AND courseName = '" . $fetchPhaseFileData['courseName'] . "'");
                    while ($assData = $fetchAss->fetch()) {
                      $insId = $assData['instId'];
                      $instCount++;
                      if ($instCount > 2) {
                        continue;
                      }
                      $fetchInsDetail = $connect->query("SELECT nickname,file_name FROM users WHERE id = '$insId'");
                      if ($fetchInsDetail->rowCount() > 0) {
                        $instDData = $fetchInsDetail->fetch();
                        $prof_pic11 = $instDData['file_name'];
                        // echo $instDData['nickname'];
                        if ($prof_pic11 != "") {
                          $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                          if (file_exists($_SERVER['DOCUMENT_ROOT'] . $img)) {
                            $img = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                          } else {
                            $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                          }
                        } else {
                          $img = BASE_URL . 'includes/Pages/avatar/avtar.png';
                        }

                    ?>
                        <span class="avatar avatar-circle" title="<?php echo $instDData['nickname']; ?>">
                          <img class="avatar-img" src="<?php echo $img; ?>" alt="Image Description" />
                          <?php
                          $displaynone = "";
                          $nRowspmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE intructor = '$insId' AND courseName = '".$fetchPhaseFileData['courseName']."' AND courseCode = '".$fetchPhaseFileData['coursecode']."'")->fetchColumn();

                          $nRowsbpmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE b_up_manger = '$insId' AND courseName = '".$fetchPhaseFileData['courseName']."' AND courseCode = '".$fetchPhaseFileData['coursecode']."'")->fetchColumn();
                          
                          if($nRowspmcheckuser>0 || $nRowsbpmcheckuser>0){ 
                              $displaynone="display:none";
                          }
                          ?>
                          <a data-bs-target="#resourceInstRemoveModal" data-bs-toggle="modal" class="confirmResourcePhaseIns" style="position: relative;top:-60px;<?php echo $displaynone;?>" data-fileid="<?php echo $fileId; ?>" data-phaseid="<?php echo $phaseId; ?>" data-instid="<?php echo $insId; ?>" data-coursecode="<?php echo $fetchPhaseFileData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileData['courseName']; ?>" data-instname="<?php echo $instDData['nickname']; ?>" data-userimg="<?php echo $img; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                        </span>
                    <?php
                      }
                    }
                    $instCount = $instCount - 2;

                    ?>
                    <span class="avatar avatar-primary avatar-circle fetchPhaseDetail" data-bs-target="#phaseInstModal" data-bs-toggle="modal" data-fileid="<?php echo $fileId; ?>" data-phaseid="<?php echo $phaseId; ?>" data-coursecode="<?php echo $fetchPhaseFileData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileData['courseName']; ?>" data-instid="<?php echo $user_id; ?>">
                      <span class="avatar-initials">
                        <?php
                        if ($instCount > 0) {
                          echo $instCount;
                        }
                        ?>
                        +
                      </span>
                    </span>
                  </div>
                  <!-- End Avatar Group -->
                </div>
            </td>
            <td>
              <?php
              if ($fileData['type'] == "offline") {
              ?>
                <a style="cursor: pointer;" class="driveLink1" value="<?php echo $fileData['filename']; ?>">View</a>
              <?php
              } elseif ($fileData['type'] == "online") {
              ?>
                <a target="_blank" style="cursor: pointer;" href="http://<?php echo $fileData['filename']; ?>">View</a>
              <?php
              } else {
              ?>
                <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileData['filename']; ?>">View</a>
              <?php
              }
              ?>
            </td>
            <td>
              <li style="position: relative;list-style-type: none;">
                <h6 id="ActionPhaseFiles" class="hs-mega-menu-invoker dropdown-toggle btn btn-soft-secondary text-dark" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-placement="bottom" title="Action">Info</h6>

                <!-- Mega Menu -->
                <div class="dropdown-menu bg-light" aria-labelledby="ActionAcademic" style="position: absolute;left: -825px;width: auto;height: -webkit-fill-available;">
                  <div class="row ps-2 pe-2">
                    <ul>
                      <div class="d-flex">
                        <?php
                        if ($fileData['type'] == "offline" || $fileData['type'] == "online") {
                        ?>
                          <a class="btn btn-soft-success btn-xs editPhaseLink m-1" data-bs-toggle="modal" data-bs-target="#editPhaseLink" data-fileid="<?php echo $fileId; ?>" data-filename="<?php echo $fileData['filename']; ?>" data-filelastname="<?php echo $fileData['lastName']; ?>"><i class="bi bi-pen-fill m-1"></i>Edit</a>
                        <?php
                        } else {
                        ?>
                          <a class="btn btn-soft-success btn-xs editPhaseFile m-1" data-bs-toggle="modal" data-bs-target="#editPhaseAttach" data-fileid="<?php echo $fileId; ?>" data-filename="<?php echo $fileData['filename']; ?>"><i class="bi bi-pen-fill m-1"></i>Edit</a>
                        <?php } ?>
                        <a href="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php?phaseFileId=<?php echo $fileId; ?>&coursecode=<?php echo $fetchPhaseFileData['coursecode']; ?>&coursename=<?php echo $fetchPhaseFileData['courseName']; ?>&phaseId=<?php echo $fetchPhaseFileData['phaseId']; ?>" class="btn btn-soft-danger btn-xs m-1"><i class="bi bi-trash-fill m-1"></i>Delete</a>
                        <a class="btn btn-soft-dark btn-xs m-1" title="Custom Number" data-bs-toggle="modal" data-bs-target="#addcustom_number" onclick="document.getElementById('custome_number_file_id').value='<?php echo $fetchPhaseFileData['fileId']; ?>';document.getElementById('custome_number').value='<?php echo $fetchPhaseFileData['custom_number']; ?>';document.getElementById('customNumberCourseCode').value='<?php echo $fetchPhaseFileData['coursecode']; ?>';document.getElementById('customNumberCourseName').value='<?php echo $fetchPhaseFileData['courseName']; ?>';document.getElementById('customNumberPhaseId').value='<?php echo $fetchPhaseFileData['phaseId']; ?>';"><i class="bi bi-plus-square m-1"></i>Custom Number</a>
                        <a href="" class="btn btn-soft-info btn-xs m-1" title="Working Files" data-bs-toggle="modal" data-bs-target="#WorkingPhaseModal"><i class="bi bi-paperclip m-1"></i>Working Files</a>
                        <a href="" class="btn btn-soft-warning btn-xs assigneeFileBtn m-1" title="Add More Assign" data-bs-toggle="modal" data-bs-target="#assinguservalue" data-phaseid="<?php echo $fetchPhaseFileData['phaseId']; ?>" data-coursecode="<?php echo $fetchPhaseFileData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileData['courseName']; ?>" data-fileid="<?php echo $fetchPhaseFileData['fileId']; ?>" data-mainid="<?php echo $fetchPhaseFileData['id']; ?>"><i class="bi bi-people-fill m-1"></i>Add Assignee</a>
                      </div>
                    </ul>
                  </div>
                  <!-- End Promo Item -->
                </div>
                <!-- End Promo -->
              </li>
            </td>
          </tr>
        <?php
        }
        //   }
        // }
        ?>
      </tbody>
      <?php
      //   }
      // }
      ?>
    </table>
  </div>

</div>


<!-- Modal -->
<div id="WorkingPhaseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Working Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include ROOT_PATH . 'includes/Pages/workingFiles.php'; ?>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Modal -->

<div class="modal fade" id="assinguservalue" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">Assing User</h3>
        <div class="form-group m-1" style="float: right;position: absolute;right: 60px;">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo BASE_URL; ?>includes/Pages/dashboard/adduserassing.php" method="post">
          <input type="hidden" name="phaseid" id="phaseidess">
          <input type="hidden" name="courseidesss" id="courseidesss">
          <input type="hidden" name="coursename" id="coursename">
          <input type="hidden" name="filesides" id="filesides">
          <input type="hidden" name="mainid" id="mainid">
          <table class="table table-striped table-bordered" id="assingtablesdata">
            <thead class="bg-dark">
              <th class="text-light"><input type="checkbox" name="checksub"></th>
              <th class="text-light">Name</th>
            </thead>
            <tbody id="assDataForm">
              <?php
              // echo $in1;
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-success">
        </form>
      </div>

    </div>
  </div>
</div>

<div id="phaseInstModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">File Detail</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container" id="phaseAssignFile"></div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Modal -->

<div id="resourceInstRemoveModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-danger text-center" style="height: 110px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Are you sure to delete <span id="remoUserPhaseName"></span>?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
      </div>
      <div class="modal-body">
        <center>
          <span>
            <img class="avatar avatar-img avatar-circle" id="phaseRemoUser" alt="" style="height: 100px;width: 100px;" />
          </span>
        </center>
        <label class="text-danger" style="font-weight: bold;">Note : </label><span>Removing users from the assigned list will result in a loss of permissions for files.</span>
        <form action="<?php echo BASE_URL; ?>includes/Pages/dashboard/removePhaseManager.php" method="POST">
          <input type="hidden" name="fileId" id="resFileId">
          <input type="hidden" name="phaseId" id="resPhaseId">
          <input type="hidden" name="instId" id="resInstId">
          <input type="hidden" name="resRefId" id="resRefId">

          <input type="hidden" name="courseCode" id="courseCode">
          <input type="hidden" name="courseName" id="courseName">
          <!-- <input type="submit" name="removeResAss" class="btn btn-danger" value="Remove" /> -->
          <div class="modal-footer flex-center" style="margin-bottom: -30px;">
            <input type="submit" name="removeResAss" class="btn btn-outline-danger" value="Yes" />
            <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<script>
  $(".fetchPhaseDetail").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const instId = $(this).data("instid");
    const coursecode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL; ?>includes/Pages/fetchAssignFile.php",
      data: {
        fileId: fileId,
        phaseId: phaseId,
        phase: "phase",
        instId: instId,
        coursecode: coursecode,
        courseName: courseName
      },
      dataType: "html",

      success: function(resultData) {
        // console.log(resultData);
        $("#phaseAssignFile").empty();
        $("#phaseAssignFile").html(resultData);
      }
    });
  });

  // $(".confirmResourcePhaseIns").on("click", function() {
  $(document).on('click', '.confirmResourcePhaseIns', function() {
    const fileId = $(this).data("fileid");
    const instId = $(this).data("instid");
    const phaseId = $(this).data("phaseid");
    const instName = $(this).data("instname");
    const userImg = $(this).data("userimg");
    const coursecode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");
    $("#phaseRemoUser").attr('src', userImg);

    $("#resInstId").val(instId);
    $("#resFileId").val(fileId);
    $("#resPhaseId").val(phaseId);
    $("#courseCode").val(coursecode);
    $("#courseName").val(courseName);
    $("#remoUserPhaseName").html(instName);
  });
</script>

<script>
  $(".assigneeFileBtn").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const coursename = $(this).data("coursename");
    const coursecode = $(this).data("coursecode");
    const mainid = $(this).data("mainid");
    $("#phaseidess").val(phaseId);
    $("#courseidesss").val(coursecode);
    $("#coursename").val(coursename);
    $("#filesides").val(fileId);
    $("#mainid").val(mainid);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchPhaseAss.php',
      data: {
        fileId: fileId,
        phaseId: phaseId,
        coursename: coursename,
        coursecode: coursecode,
      },
      success: function(response) {
        // alert(response);
        $("#assDataForm").empty();
        $("#assDataForm").html(response);
      }
    });
  });
</script>