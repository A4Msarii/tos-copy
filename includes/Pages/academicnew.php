<div class="container">

  <!-- Nav -->
  <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="allacademics-tab" href="#allacademics" data-bs-toggle="pill" data-bs-target="#allacademics" role="tab" aria-controls="allacademics" aria-selected="true">
        <div class="d-flex align-items-center text-success">
          All Academic
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="assignacademic-tab" href="#assignacademic" data-bs-toggle="pill" data-bs-target="#assignacademic" role="tab" aria-controls="assignacademic" aria-selected="false">
        <div class="d-flex align-items-center text-success">
          Assigned
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="workingfiles-tab" href="#workingfiles" data-bs-toggle="pill" data-bs-target="#workingfiles" role="tab" aria-controls="workingfiles" aria-selected="false">
        <div class="d-flex align-items-center text-success">
          Working File
        </div>
      </a>
    </li>
  </ul>
  <!-- End Nav -->

  <!-- Tab Content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="allacademics" role="tabpanel" aria-labelledby="allacademics-tab">
      <div class="row">
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/assignAcademicFile.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="phasesId" value="<?php echo $phase_id; ?>">
          <table class="table table-striped table-bordered table-hover" id="allFileAcademictable">
              <input class="form-control" type="text" id="AcademicFilesearch" onkeyup="AcademicAllFiles()" placeholder="Search for Academic Files.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-white">Action</th>
                <th class="text-white">Academic File</th>
              </thead>
              <tbody>
                <?php
                $fetchAcaFile = $connect->query("SELECT * FROM academic WHERE ctp = '$ctp'");
                while ($acaFile = $fetchAcaFile->fetch()) {
                  $pId = $acaFile['phase'];
                  $fetchPhase = $connect->query("SELECT phasename FROM phase WHERE id = '$pId'");
                  $fileId = $acaFile['file'];
                  $checkFileAva = $connect->query("SELECT count(*) FROM academicassignee WHERE filesId = '$fileId'");
                  if ($checkFileAva->fetchColumn() > 0) {
                    $checkFile = "checked";
                  }else{
                    $checkFile = "";
                  }
                    $fileQ = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
                    while ($fileData = $fileQ->fetch()) {
                ?>
                      <tr>
                        <td>
                          <input <?php echo $checkFile; ?> type="checkbox" name="filesId[]" id="" value="<?php echo $fileData['id']; ?>" />
                       
                        </td>
                        <td>
                          <?php
                          echo $acaFile['academic'] . "-" . $acaFile['shortacademic'] . "-" . $fetchPhase->fetchColumn();
                          ?>
                        </td>
                      </tr>
                <?php
                    }
                } ?>
              </tbody>
            </table>
            <hr>
            <input type="submit" value="Add" name="assignAcademic" class="btn btn-success" />
          </form>
        </center>
      </div>
    </div>

    <div class="tab-pane fade" id="assignacademic" role="tabpanel" aria-labelledby="assignacademic-tab">
      <div class="row">
        <center>
          <table style="margin: 5px;" class="table table-striped table-bordered table-hover" id="assignacademictable">
            <input class="form-control" type="text" id="Assignsearch" onkeyup="AssignAcademic()" placeholder="Search for Assigned Files.." title="Type in a name"><br>
            <thead class="bg-dark">
              <th class="text-white">Sr No</th>
              <th class="text-white">Class Name</th>
              <th class="text-white">Action</th>
            </thead>
            <tbody>
              <?php
              $fetchInst = $connect->query("SELECT * FROM academicassignee GROUP BY filesId");
              $sr = 1;
              while ($instDetail = $fetchInst->fetch()) {
                $pId = $instDetail['phaseId'];
                $fetchPhase = $connect->query("SELECT phasename FROM phase WHERE id = '$pId'");
                $fileId = $instDetail['filesId'];
                $fetchAcaFile = $connect->query("SELECT * FROM academic WHERE file = '$fileId'");
                $acaFile = $fetchAcaFile->fetch()
              ?>
                <tr>
                  <td>
                    <?php echo $sr;
                    $sr++; ?>
                  </td>
                  <td>
                    <?php
                    echo $acaFile['academic'] . "-" . $acaFile['shortacademic'] . "-" . $fetchPhase->fetchColumn();
                    ?>
                  </td>
                  <td>
                    <a href="<?php echo BASE_URL; ?>includes/Pages/assignAcademicFile.php?removeAssignee=<?php echo $fileId; ?>" class="btn btn-soft-danger btn-xs"><i class="bi bi-trash-fill"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </center>
      </div>
    </div>

    <div class="tab-pane fade" id="workingfiles" role="tabpanel" aria-labelledby="workingfiles-tab">
      <center>
        <?php include ROOT_PATH . 'includes/Pages/workingFiles.php'; ?>
      </center>
    </div>

  </div>
  <!-- End Tab Content -->


</div>





<script>
  function AcademicAllFiles() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("AcademicFilesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("allFileAcademictable");
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


<script type="text/javascript">
  $(document).on("change", ".fileOptWorking", function() {

    if ($(this).val() == "addFile") {
      $(".multipleFile").css("display", "block");
      $(".phase_form").css("display", "none");
      $(".filelink").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".file").css("display", "block");
    }

    if ($(this).val() == "addFileLoca") {
      $(".phase_form").css("display", "block");
      $(".multipleFile").css("display", "none");
      $(".filelink").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".file").css("display", "block");
    }
    if ($(this).val() == "addFileLink") {
      $(".phase_form").css("display", "none");
      $(".multipleFile").css("display", "none");
      $(".newpageform").css("display", "none");
      $(".filelink").css("display", "block");
      $(".file").css("display", "block");
    }
  });
</script>