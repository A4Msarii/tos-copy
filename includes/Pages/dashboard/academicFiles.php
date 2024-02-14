<?php
$Phase_names1111 = "";
$q6 = "SELECT * FROM phase";
$st6 = $connect->prepare($q6);
$st6->execute();

if ($st6->rowCount() > 0) {
  $re6 = $st6->fetchAll();
  foreach ($re6 as $row6) {
    $Phase_names1111 .= '<option value="' . $row6['phasename'] . '">' . $row6['phasename'] . '</option>';
  }
}
?>

<h1>Academic Files</h1>
<div class="row">
  <div class="col-md-8">
    <input style="float:right;margin: 5px;" class="form-control" type="text" id="ClassesSearchAcademic" onkeyup="ClassSearchAcademic()" placeholder="Search for Files.." title="Type in a name">
  </div>
  <div class="col-md-4" style="display: flex;justify-content: end;">
    <!-- <label>Filter By Phase </label> -->
    <select class="form-control" id="phaseFilterAcademic" style="width: 50%;margin: 5px;border-radius: 5px !important;">
      <option selected value="all">Filter By Phase</option>
      <?php echo $Phase_names1111; ?>

    </select>
    <select id="statusFilterAcademic" style="width: 50%;margin: 5px;border-radius: 5px !important;" class="form-control">
      <option selected value="all">Filter By Status</option>
      <option>Approved</option>
      <option>In Progress</option>
      <option>In Review</option>
    </select>
  </div>
</div>
<div class="row align-items-center gx-2 mb-2" id="filteredContentAcademic">

  <!-- <h3 class="card-subtitle"><?php echo $fetchPhaseName->fetchColumn(); ?></h3> -->
  <div class="table-responsive">
    <table class="table table-bordered" id="AcademicFileTableAll">
      <thead class="bg-dark">
        <tr>
          <th class="text-light">Filename</th>
          <th class="text-light">Course Name</th>
          <th class="text-light">Updated By</th>
          <th class="text-light">Approve By</th>
          <th class="text-light">Updated Date</th>
          <th class="text-light">Status</th>
          <th class="text-light">Class Name</th>
          <th class="text-light">File Size</th>
          <th class="text-light">Phase Name</th>
          <th class="text-light">Comments/Notes</th>
          <th class="text-light">View</th>
          <th class="text-light">Assignees</th>
          <th class="text-light">Version</th>
          <th class="text-light">Actions</th>
        </tr>
      </thead>
      <tbody class="file-rows-academic">
        <?php
        // $fethcPhase = $connect->query("SELECT * FROM manage_role_course_phase WHERE (intructor = '$user_id' OR b_up_manger = '$user_id') GROUP BY phase_id");
        // while ($phaseData = $fethcPhase->fetch()) {
        //   $phaseId = $phaseData['phase_id'];
        //   $refId = $phaseData['id'];
        //   $fetchPhaseName = $connect->query("SELECT phasename,color FROM phase WHERE id = '$phaseId'");
        //   $coursePhase = $fetchPhaseName->fetch();
        //   $fetchPhaseFileId = $connect->query("SELECT count(*) FROM academicassignee WHERE phaseId = '$phaseId'");
        //   if ($fetchPhaseFileId->fetchColumn() > 0) {
        ?>
        <?php
        $fetchPhaseFileId = $connect->query("SELECT * FROM academicassignee WHERE phaseId = '$phaseId' AND (instId = '$user_id') GROUP BY filesId,coursecode,coursename");
        while ($fetchPhaseFileData = $fetchPhaseFileId->fetch()) {
          $phaseId = $fetchPhaseFileData['phaseId'];
          $fetchPhaseName = $connect->query("SELECT phasename,color FROM phase WHERE id = '$phaseId'");
          $coursePhase = $fetchPhaseName->fetch();
          $fileId = $fetchPhaseFileData['filesId'];
          $fileMainId = $fetchPhaseFileData['id'];
          $refId = $fetchPhaseFileData['refrenceId'];
          $fetchFile = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
          $fileData = $fetchFile->fetch();
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
              $fetchCtpName = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '" . $fetchPhaseFileData['coursename'] . "'");
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
              <select style="width: auto;padding: 8px;border: 1px solid #ccc;border-radius: 4px !important;box-sizing: border-box;" class="form-control file_statusAssignee <?php echo $bg_classs; ?>" data-values="<?php echo $fileId ?>" data-values1="<?php echo $fetchPhaseFileData['phaseId'] ?>" data-userid="<?php echo $user_id; ?>" data-id="<?php echo $fileMainId; ?>" data-coursecode="<?php echo $fetchPhaseFileData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileData['coursename']; ?>">
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
              <?php
              $fetchAcaClass = $connect->query("SELECT * FROM academic WHERE file = '$fileId' AND phase = '$phaseId'");
              while ($fetchAcaClassData = $fetchAcaClass->fetch()) {
                $phaseQ = $connect->query("SELECT phasename FROM phase WHERE id = '$phaseId'");

                echo $fetchAcaClassData['academic'] . "-" . $fetchAcaClassData['shortacademic'] . "-" . $phaseQ->fetchColumn();
              }
              ?>
            </td>
            <td>
              <?php if ($mbSize == "-") {
                echo $mbSize;
              } else {
                echo $mbSize . " MB";
              } ?>
            </td>
            <td><span style="color:<?php echo $coursePhase['color']; ?>"><?php echo $coursePhase['phasename']; ?></span></td>
            <td style="text-align: center;">
              <a class="btn btn-soft-dark btn-xs" data-bs-toggle="modal" data-bs-target="#assigneeCommentModal" onclick="document.getElementById('assgiCommentFileId').value='<?php echo $fetchPhaseFileData['filesId']; ?>';document.getElementById('assigneeComment').value='<?php echo $fetchPhaseFileData['comment']; ?>';document.getElementById('assgiCommentPhaseId').value='<?php echo $fetchPhaseFileData['phaseId']; ?>';document.getElementById('assgiCommentCourseCode').value='<?php echo $fetchPhaseFileData['coursecode']; ?>';document.getElementById('assgiCommentCourseName').value='<?php echo $fetchPhaseFileData['coursename']; ?>';"><i class="bi bi-chat-text"></i></a>
            </td>
            <td>
              <?php
              if ($fileData['type'] == "offline") {
              ?>
                <a style="cursor: pointer;" class="driveLink1" value="<?php echo $fileData['filename']; ?>">View</a>
              <?php
              } elseif ($fileData['type'] == "online") {
              ?>
                <a target="_blank" style="cursor: pointer;" href="https://<?php echo $fileData['filename']; ?>">View</a>
              <?php
              } else {
              ?>
                <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileData['filename']; ?>">View</a>
              <?php
              }
              ?>
            </td>
            <td>
              <div class="row align-items-center">
                <div class="col-auto">
                  <!-- Avatar Group -->
                  <div class="avatar-group avatar-group-lg mb-1">
                    <?php
                    $instCount = 0;
                    $fetchAss = $connect->query("SELECT * FROM academicassignee WHERE filesId = '$fileId' AND phaseId = '$phaseId' AND coursecode = '" . $fetchPhaseFileData['coursecode'] . "' AND courseName = '" . $fetchPhaseFileData['coursename'] . "'");
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
                          $nRowspmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE intructor = '$insId' AND courseName = '".$fetchPhaseFileData['coursename']."' AND courseCode = '".$fetchPhaseFileData['coursecode']."'")->fetchColumn();

                          $nRowsbpmcheckuser = $connect->query("SELECT COUNT(*) FROM manage_role_course_phase WHERE b_up_manger = '$insId' AND courseName = '".$fetchPhaseFileData['coursename']."' AND courseCode = '".$fetchPhaseFileData['coursecode']."'")->fetchColumn();
                          
                          if($nRowspmcheckuser>0 || $nRowsbpmcheckuser>0){ 
                              $displaynone="display:none";
                          }
                          ?>
                          <a data-bs-target="#academicInstRemoveModal" data-bs-toggle="modal" class="confirmPhaseIns" style="position: relative;top:-60px;<?php echo $displaynone;?>" data-fileid="<?php echo $fileId; ?>" data-phaseid="<?php echo $phaseId; ?>" data-instid="<?php echo $insId; ?>" data-coursecode="<?php echo $fetchPhaseFileData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileData['coursename']; ?>" data-instname="<?php echo $instDData['nickname']; ?>" data-userimg="<?php echo $img; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                        </span>
                    <?php
                      }
                    }
                    $instCount = $instCount - 2;

                    ?>
                    <span class="avatar avatar-primary avatar-circle academicAssignee" data-bs-target="#academicInstModal" data-bs-toggle="modal" data-fileid="<?php echo $fileId; ?>" data-phaseid="<?php echo $phaseId; ?>" data-coursecode="<?php echo $fetchPhaseFileData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileData['coursename']; ?>">
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
              $fetchRefIds = $connect->query("SELECT * FROM academicassignee WHERE filesId = '$fileId' AND phaseId = '$phaseId' AND status = 'Approved'");
              $coId = 0;
              $coCode = 0;
              while ($fetchRefIdsData = $fetchRefIds->fetch()) {
                if ($fetchRefIdsData['coursecode'] > $coId) {
                  $coId = $fetchRefIdsData['coursecode'];
                  $coCode = $fetchRefIdsData['coursename'];
                  $year = $fetchRefIdsData['year'];
                  $customNumber = $fetchRefIdsData['customNumber'];
                }
              }
              if ($coId > 0) {
                $fetchCtpName = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$coCode'");
                echo $year . ",";
                echo $fetchCtpName->fetchColumn() . "-0" . $coId . ",";
                echo $customNumber;
              } else {
                echo "-";
              }
              ?>
            </td>
            <td>
              <li style="position: relative;list-style-type: none;">
                <h6 id="ActionAcademicFiles" class="hs-mega-menu-invoker dropdown-toggle btn btn-soft-secondary text-dark" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-placement="bottom" title="Action">Info</h6>

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
                        <a href="<?php echo BASE_URL; ?>includes/Pages/editPhaseFiles.php?assignFile=<?php echo $fileId; ?>&coursecode=<?php echo $fetchPhaseFileData['coursecode']; ?>&coursename=<?php echo $fetchPhaseFileData['coursename']; ?>&phaseId=<?php echo $fetchPhaseFileData['phaseId']; ?>" class="btn btn-soft-danger btn-xs m-1"><i class="bi bi-trash-fill m-1"></i>Delete</a>
                        <a class="btn btn-soft-dark btn-xs m-1" data-bs-toggle="modal" data-bs-target="#addcustomNumberAssignee" onclick="document.getElementById('customeNumberFileId').value='<?php echo $fetchPhaseFileData['filesId']; ?>';document.getElementById('customNumberAssignee').value='<?php echo $fetchPhaseFileData['customNumber']; ?>';document.getElementById('asigneeCustomNumberCourseCode').value='<?php echo $fetchPhaseFileData['coursecode']; ?>';document.getElementById('asigneeCustomNumberCourseName').value='<?php echo $fetchPhaseFileData['coursename']; ?>';document.getElementById('asigneeCustomNumberPhaseId').value='<?php echo $fetchPhaseFileData['phaseId']; ?>';"><i class="bi bi-plus-square m-1"></i>Custom Number</a>
                        <a href="" class="btn btn-soft-info btn-xs m-1" title="Working Files" data-bs-toggle="modal" data-bs-target="#WorkingAcademicModal"><i class="bi bi-paperclip m-1"></i>Working Files</a>

                        <a href="" class="btn btn-soft-warning btn-xs assigneeacFileBtn m-1" title="Add More Assign" data-bs-toggle="modal" data-bs-target="#assingacuservalue" data-phaseid="<?php echo $fetchPhaseFileData['phaseId']; ?>" data-coursecode="<?php echo $fetchPhaseFileData['coursecode']; ?>" data-coursename="<?php echo $fetchPhaseFileData['coursename']; ?>" data-fileid="<?php echo $fetchPhaseFileData['filesId']; ?>" data-mainid="<?php echo $fetchPhaseFileData['id']; ?>"><i class="bi bi-people-fill m-1"></i>Add Asignee</a>
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
    </table>
  </div>
  <?php
  //   }
  // }
  ?>
</div>


<!-- Modal -->
<div id="WorkingAcademicModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

<div class="modal fade" id="assingacuservalue" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalScrollableTitle">Assing User</h3>
        <div class="form-group m-1" style="float: right;position: absolute;right: 60px;">
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo BASE_URL; ?>includes/Pages/dashboard/adduseracassing.php" method="post">
          <input type="hidden" name="phaseid" id="phaseidess1">
          <input type="hidden" name="courseidesss" id="courseidesss1">
          <input type="hidden" name="coursename" id="coursename1">
          <input type="hidden" name="filesides" id="filesides1">
          <input type="hidden" name="mainid" id="mainid1">
          <table class="table table-striped table-bordered" id="assingtablesdata">
            <thead class="bg-dark">
              <th class="text-light"><input type="checkbox" name="checksub"></th>
              <th class="text-light">Name</th>
            </thead>
            <tbody id="assacDataForm">
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


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initial data
    var originalRows = document.querySelectorAll('.file-rows-academic tr');

    // Add event listeners for filter changes
    document.getElementById('phaseFilterAcademic').addEventListener('change', filterFilesAcademic);
    document.getElementById('statusFilterAcademic').addEventListener('change', filterFilesAcademic);

    function filterFilesAcademic() {
      var phaseFilter = document.getElementById('phaseFilterAcademic').value;
      var statusFilter = document.getElementById('statusFilterAcademic').value;

      var rows = document.querySelectorAll('.file-rows-academic tr');

      rows.forEach(function(row) {
        var phaseName = row.querySelector('td:nth-child(9) span').innerText.trim();
        var status = row.querySelector('td:nth-child(6) select').value.trim();

        // Debugging output
        console.log('Phase Filter:', phaseFilter);
        console.log('Phase Name:', phaseName);
        // alert(phaseFilter);

        var phaseMatch = (phaseFilter.trim().toLowerCase() === 'all' || phaseName.trim().toLowerCase() === phaseFilter.trim().toLowerCase());
        var statusMatch = (statusFilter === 'all' || status === statusFilter);

        if (phaseMatch && statusMatch) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }
  });
</script>

<div id="academicInstRemoveModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-danger text-center" style="height: 110px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -30px;font-size: x-large;color: white;">Are you sure to delete <span id="remoUserAssigneeName"></span>?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-top:-55px;"></button>
      </div>
      <div class="modal-body">
        <center>
          <span>
            <img class="avatar avatar-img avatar-circle" id="asssignRemoUser" alt="" style="height: 100px;width: 100px;" />
          </span>
        </center>
        <label class="text-danger" style="font-weight: bold;">Note : </label><span>Removing users from the assigned list will result in a loss of permissions for files.</span>
        <form action="<?php echo BASE_URL; ?>includes/Pages/dashboard/removePhaseManager.php" method="POST">
          <input type="hidden" name="fileId" id="acaFileId">
          <input type="hidden" name="acaPhaseId" id="acaPhaseId">
          <input type="hidden" name="instId" id="acaInstId">
          <input type="hidden" name="assigneCourseCode" id="assigneCourseCode">
          <input type="hidden" name="assigneCourseName" id="assigneCourseName">
          <!-- <input type="submit" name="removeAcaAss" class="btn btn-danger" value="Remove" /> -->
          <div class="modal-footer flex-center" style="margin-bottom: -30px;">
            <input type="submit" name="removeAcaAss" class="btn btn-outline-danger" value="Yes" />
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

<div id="academicInstModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalCenterTitle">Manage Users</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container" id="AcademicAssignFile"></div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- End Modal -->

<script>
  $(".academicAssignee").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const coursecode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL; ?>includes/Pages/fetchAssignFile.php",
      data: {
        fileId: fileId,
        academic: "academic",
        phaseId: phaseId,
        coursecode: coursecode,
        courseName: courseName,
      },
      dataType: "html",

      success: function(resultData) {
        // console.log(resultData);
        $("#AcademicAssignFile").empty();
        $("#AcademicAssignFile").html(resultData);
      }
    });
  });

  // $(".confirmPhaseIns").on("click", function() {
  $(document).on('click', '.confirmPhaseIns', function() {
    // alert("hii");
    const fileId = $(this).data("fileid");
    const instId = $(this).data("instid");
    const phaseId = $(this).data("phaseid");
    const instName = $(this).data("instname");
    const userImg = $(this).data("userimg");
    const coursecode = $(this).data("coursecode");
    const courseName = $(this).data("coursename");
    $("#asssignRemoUser").attr('src', userImg);

    $("#acaInstId").val(instId);
    $("#acaFileId").val(fileId);
    $("#acaPhaseId").val(phaseId);
    $("#assigneCourseCode").val(coursecode);
    $("#assigneCourseName").val(courseName);

    $("#remoUserAssigneeName").html(instName);
  });
</script>

<script>
  $(".assigneeacFileBtn").on("click", function() {
    const fileId = $(this).data("fileid");
    const phaseId = $(this).data("phaseid");
    const coursename = $(this).data("coursename");
    const coursecode = $(this).data("coursecode");
    const mainid = $(this).data("mainid");
    $("#phaseidess1").val(phaseId);
    $("#courseidesss1").val(coursecode);
    $("#coursename1").val(coursename);
    $("#filesides1").val(fileId);
    $("#mainid1").val(mainid);
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE_URL; ?>includes/Pages/fetchacPhaseAss.php',
      data: {
        fileId: fileId,
        phaseId: phaseId,
        coursename: coursename,
        coursecode: coursecode,
      },
      success: function(response) {
        // alert(response);
        $("#assacDataForm").empty();
        $("#assacDataForm").html(response);
      }
    });
  });
</script>