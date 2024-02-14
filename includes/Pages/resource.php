<div class="container">
  <div class="row">
    <center>
      <button class="btn btn-success" style="width:auto;" data-bs-toggle="modal" data-bs-target="#attachResourceFile">Attach Files</button>
    </center>
  </div>
  <hr>
  <div class="row">

    <center>
      <table class="table table-bordered table-striped table-hover" id="ResourceTable">
        <input class="form-control" type="text" id="ResourceFilesearch" onkeyup="ResourceAllFiles()" placeholder="Search for Files.." title="Type in a name"><br>
        <thead class="bg-dark">
          <tr>
            <th class="text-light">Filename</th>
            <th class="text-light">Created By</th>
            <th class="text-light">Updated By</th>
            <th class="text-light">Created Date</th>
            <th class="text-light">Updated Date</th>
            <th class="text-light">View</th>
            <th class="text-light">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $fetchFile = $connect->query("SELECT * FROM user_files WHERE is_phase_resourse='$phase_id'");
          while ($fileData = $fetchFile->fetch()) {
            $fileId = $fileData['id'];

          ?>
            <tr>
              <td><?php echo $fileData['filename']; ?></td>
              <td><?php echo $fileData['createdBy']; ?></td>
              <td><?php echo $fileData['updatedBy']; ?></td>
              <td><?php echo $fileData['createdAt']; ?></td>
              <td><?php echo $fileData['updatedAt']; ?></td>
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
                <?php
                if ($fileData['type'] == "offline" || $fileData['type'] == "online") {
                ?>
                  <a class="btn btn-soft-success btn-xs editPhaseLink" data-bs-toggle="modal" data-bs-target="#editPhaseLink" data-fileid="<?php echo $fileId; ?>" data-filename="<?php echo $fileData['filename']; ?>" data-filelastname="<?php echo $fileData['lastName']; ?>"><i class="bi bi-pen-fill"></i></a>
                <?php
                } else {
                ?>
                  <a class="btn btn-soft-success btn-xs editPhaseFile" data-bs-toggle="modal" data-bs-target="#editPhaseAttach" data-fileid="<?php echo $fileId; ?>" data-filename="<?php echo $fileData['filename']; ?>"><i class="bi bi-pen-fill"></i></a>
                <?php } ?>
                <a href="<?php echo BASE_URL; ?>includes/Pages/editAdminPhaseFiles.php?fileId=<?php echo $fileId; ?>&phaseId=<?php echo $phase_id; ?>" class="btn btn-soft-danger btn-xs"><i class="bi bi-trash-fill"></i></a>
                <a class="btn btn-soft-warning btn-xs" data-bs-toggle="modal" data-bs-target="#addmoreuser"><i class="bi bi-people"></i></a>
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

<!-- edit goals -->
<div class="modal fade" id="select_file_r" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <form action="<?php echo BASE_URL; ?>includes/Pages/addResource.php" method="POST">
                  <input type="hidden" name="phaseId" value="<?php echo $phase_id; ?>" />
                  <input type="hidden" name="ctpId" value="<?php echo $ctp; ?>" />
                  <table class="table table-striped table-bordered table-hover" id="SelectFileAllTable">
                    <input style=" margin:5px;" class="form-control" id="SelectFileSearchAll" type="text" onkeyup="SelectFileSearch()" placeholder="Search for File.." title="Type in a name">
                    <thead class="bg-dark">
                      <th class="text-white">Sr No</th>
                      <th class="text-white">Files</th>
                      <th class="text-white">View</th>
                    </thead>
                    <?php
                    $query4 = "SELECT * FROM user_files ORDER BY id ASC";
                    $statement2 = $connect->prepare($query4);
                    $statement2->execute();
                    if ($statement2->rowCount() > 0) {
                      $result2 = $statement2->fetchAll();
                      $sn4 = 1;
                      foreach ($result2 as $row2) {
                        $fileId = $row2['id'];
                        $result1 = $connect->query("SELECT COUNT(*) FROM filepermissions WHERE pageId = '$fileId' AND userId = 'Everyone' AND permissionType = 'readOnly'");
                        $data = $result1->fetchColumn();
                        if ($data <= 0) {
                          $checkPhaseFile = $connect->query("SELECT COUNT(*) FROM phasefilepermission WHERE fileId = '$fileId' AND phaseId = '$phase_id'");
                          if ($checkPhaseFile->fetchColumn() <= 0) {
                    ?>
                            <tr>
                              <td><input type="checkbox" name="fileID[]" id="" value="<?php echo $fileId; ?>"></td>
                              <!-- <td><?php echo $row2['id']; ?></td> -->
                              <td><?php echo $row2['filename']; ?></td>
                              <td>
                                <?php
                                if ($row2['type'] == "offline") {
                                ?>
                                  <a style="cursor: pointer;" class="driveLink1" value="<?php echo $row2['filename']; ?>">View</a>
                                <?php
                                } elseif ($row2['type'] == "online") {
                                ?>
                                  <a target="_blank" style="cursor: pointer;" href="http://<?php echo $row2['filename']; ?>">View</a>
                                <?php
                                } else {
                                ?>
                                  <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row2['filename']; ?>">View</a>
                                <?php
                                }
                                ?>
                              </td>

                            </tr>
                    <?php
                          }
                        }
                      }
                    }
                    ?>
                  </table>

              </div>
            </div>
          </div>
        </center>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Submit" name="addResource" class="btn btn-success" />
        </form>
      </div>
    </div>
  </div>
</div>
<!-- edit goals -->
<div class="modal fade" id="addmoreuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="usertophaseresoure.php" method='post'>
          <center>
            <table class="table table-striped table-bordered table-hover">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <th class="text-white">user name</th>
              </thead>
              <?php
              $query5 = "SELECT * FROM users ORDER BY id ASC";
              $statement5 = $connect->prepare($query5);
              $statement5->execute();
              if ($statement5->rowCount() > 0) {
                $result2 = $statement5->fetchAll();
                $sn5 = 1;
                foreach ($result2 as $row2) {
                  $user_ides12 = $row2['id'];
                  $nRows102 = $connect->query("SELECT count(*) FROM phasefilepermission where phaseId='$phase_id' and instId='$user_ides12'")->fetchColumn();
                  if ($nRows102 == 0) {

              ?>
                    <tr>
                      <td><?php echo $sn5++; ?></td>
                      <td><?php echo $row2['nickname']; ?></td>
                    </tr>
              <?php }
                }
              } ?>
            </table>
          </center>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Submit" name="addResource" class="btn btn-success" />
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="attachResourceFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Files</h3>
        <button class="btn btn-success" style="width:auto;" data-bs-toggle="modal" data-bs-target="#select_file_r">Select Files</button>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="fileOpt">
          <option selected>Select File Method</option>
          <!-- <option value="addNewPage">New Page</option> -->
          <option value="addFile">Attachment</option>
          <option value="addFileLoca">Drive Link</option>
          <option value="addFileLink">Link</option>
        </select>
      </div>
      <br>
      <center>
        <form method="post" enctype="multipart/form-data" id="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/addPhaseFiles.php">
          <div class="input-field">
            <table class="table table-bordered">
              <tr>
                <input type="hidden" class="form-control" name="phaseId" value="<?php echo $phase_id; ?>">
                <input type="hidden" name="ctpId" value="<?php echo $ctp; ?>" />
                <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                  <input type="file" class="form-control" name="file[]" id="" multiple />
                </td>
              </tr>
            </table>
          </div><br>

          <hr>
          <center>
            <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="attachement" class="btn btn-success" />

          </center>
        </form>
      </center>
      <center>
        <form class="insert-phases" id="phase_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addPhaseFiles1.php" style="width:80%;display:none;" enctype="multipart/form-data">
          <div class="input-field">
            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Drive Link</label>
            <table class="table table-bordered" id="table-field">
              <input type="hidden" class="form-control" name="phaseId" value="<?php echo $phase_id; ?>">
              <input type="hidden" name="ctpId" value="<?php echo $ctp; ?>" />
              <tr>
                <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
                <td style="text-align: center;"><input type="text" placeholder="Link" name="phase[]" id="phaseval" class="form-control" value="" required /> </td>
                <td style="text-align: center;"><input type="text" placeholder="Link Name" name="phaseName[]" id="phasename" class="form-control" value="" /> </td>
                <td style="width:20px;"><button type="button" name="add_phase" id="add_phase" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
              </tr>
            </table>
          </div>
          <br>
          <center>
            <button style="margin:5px;float: right; font-weight:bold; font-size:large;" class="btn btn-success" type="submit" id="phase_submit" name="driveLink">Submit</button>
          </center>
        </form>
      </center>

      <center>
        <form class="insert-phases" id="filelink" method="post" action="<?php echo BASE_URL; ?>includes/Pages/addPhaseFiles2.php" style="width:80%;display:none;" enctype="multipart/form-data">
          <div class="input-field">
            <input type="hidden" class="form-control" name="phaseId" value="<?php echo $phase_id; ?>">
            <input type="hidden" name="ctpId" value="<?php echo $ctp; ?>" />
            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Online Link</label>
            <table class="table table-bordered" id="table-field-link">
              <tr>
                <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
                <td style="text-align: center;"><input type="text" placeholder="Link" name="link[]" id="linkval" class="form-control" value="" required /> </td>
                <td style="text-align: center;"><input type="text" placeholder="Link Name" name="linkName[]" id="linkname" class="form-control" value="" /> </td>
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
  </div>
</div>


<script>
  function ResourceAllFiles() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("ResourceFilesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("ResourceTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
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
  function SelectFileSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("SelectFileSearchAll");
    filter = input.value.toUpperCase();
    table = document.getElementById("SelectFileAllTable");
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