<div class="row justify-content-center">

  <div class="col-lg-10 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

      <div class="card-body">

        <select class="form-select fileOpt" aria-label="Default select example" style="margin-bottom:25px;" id="">
          <option selected>Select File Method</option>
          <!-- <option value="addNewPage">New Page</option> -->
          <option value="addFile">Attachment</option>
          <option value="addFileLoca">Drive Link</option>
          <option value="addFileLink">Link</option>
        </select>

        <form action="<?php echo BASE_URL; ?>includes/Pages/insert_document_test.php" method="post" enctype="multipart/form-data" id="multipleFile" style="display: none;">
          <table class="table" id="table-field-document">
            <tr>

              <td>
                <div class="row">

                  <div class="col-md-4 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Document Name</label>
                      <input type="text" class="form-control" name="title" placeholder="Enter title of exam.." required>
                    </div>

                  </div>

                  <div class="col-md-4 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Year</label>

                      <input type="date" class="form-control" name="year">
                    </div>

                  </div>

                  <div class="col-md-4 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Attachment</label>
                      <input type="file" class="form-control" name="upload_file" id="" multiple />
                    </div>

                  </div>
                </div>


              </td>

            </tr>
          </table>

          <center>
            <table class="table">
              <tr>
                <td>
                  <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
                </td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                    <option disabled>Select File Method</option>
                    <option value="All instructor">Instructor Only</option>
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
          </center>

          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveFile" value="Submit">
        </form>

        <form action="<?php echo BASE_URL; ?>includes/Pages/insert_document_test.php" method="post" enctype="multipart/form-data" id="phase_form" style="display: none;">
          <table class="table" id="table-field-document">
            <tr>

              <td>
                <div class="row">

                  <div class="col-md-3 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Document Name</label>
                      <input type="text" class="form-control" name="title" placeholder="Enter title of exam.." required>
                    </div>

                  </div>

                  <div class="col-md-3 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Year</label>

                      <input type="date" class="form-control" name="year">
                    </div>

                  </div>

                  <div class="col-md-3 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Insert Link</label>
                      <input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required />
                      <!-- <input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" /> -->
                    </div>

                  </div>

                  <div class="col-md-3 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Link Name</label>
                      <!-- <input type="text" placeholder="Link" name="phase" id="phaseval" class="form-control" value="" required /> -->
                      <input type="text" placeholder="Link Name" name="phaseName" id="phasename" class="form-control" value="" />
                    </div>

                  </div>
                </div>


              </td>

            </tr>
          </table>

          <center>
            <table class="table">
              <tr>
                <td>
                  <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
                </td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                    <option disabled>Select File Method</option>
                    <option value="All instructor">Instructor Only</option>
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
          </center>

          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="driveLink" value="Submit">
        </form>

        <form action="<?php echo BASE_URL; ?>includes/Pages/insert_document_test.php" method="post" enctype="multipart/form-data" id="filelink" style="display: none;">
          <table class="table" id="table-field-document">
            <tr>

              <td>
                <div class="row">

                  <div class="col-md-3 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Document Name</label>
                      <input type="text" class="form-control" name="title" placeholder="Enter title of exam.." required>
                    </div>

                  </div>

                  <div class="col-md-3 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Year</label>

                      <input type="date" class="form-control" name="year">
                    </div>

                  </div>

                  <div class="col-md-3 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Insert Link</label>
                      <input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required />
                      <!-- <input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" /> -->
                    </div>

                  </div>

                  <div class="col-md-3 mb-2">

                    <div class="form-outline">
                      <label class="text-dark" style="font-weight:bold;">Link Name</label>
                      <!-- <input type="text" placeholder="Link" name="link" id="linkval" class="form-control" value="" required /> -->
                      <input type="text" placeholder="Link Name" name="linkName" id="linkname" class="form-control" value="" />
                    </div>

                  </div>
                </div>


              </td>

            </tr>
          </table>

          <center>
            <table class="table">
              <tr>
                <td>
                  <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
                </td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionType">
                    <option disabled>Select File Method</option>
                    <option value="All instructor">Instructor Only</option>
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
          </center>

          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="onLineLink" value="Submit">
        </form>
        <br><br>
        <hr>

        <table class="table table-striped table-bordered" id="documenttable">
          <input style="margin:5px;" class="form-control" type="text" id="document_search" onkeyup="document_search()" placeholder="Search for Course.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-white">Sr No</th>
            <th class="text-white">Document Name</th>
            <th class="text-white">Year</th>
            <th class="text-white">Document</th>
            <th class="text-white">View</th>
            <th class="text-white" colspan="2">Action</th>
          </thead>
          <tbody>
            <?php
            $query_heatmap = "SELECT * FROM document_test";
            $statement_heatmap = $connect->prepare($query_heatmap);
            $statement_heatmap->execute();
            $sn_val = 1;
            $result_heatmap = $statement_heatmap->fetchAll();
            foreach ($result_heatmap as $row_heatmap) {
              if ($row_heatmap['fileLoca'] == "userFile") {
                $mId = $row_heatmap['file_name'];
                $fileQ = $connect->query("SELECT * FROM user_files WHERE id = '$mId'");
                $fileQData = $fileQ->fetch();
              }
            ?>
              <tr>
                <td><?php echo $sn_val++; ?></td>
                <td><?php echo $row_heatmap['title']; ?></td>
                <td><?php echo $row_heatmap['year']; ?></td>
                <td><?php
                    if ($row_heatmap['fileLoca'] == "userFile") {
                      echo $fileQData['filename'];
                    } else {
                      echo $row_heatmap['file_name'];
                    }
                    ?></td>
                <td>
                  <?php
                  if ($row_heatmap['fileLoca'] != "userFile") {
                    if ($row_heatmap['file_type'] == "docx" || $row_heatmap['file_type'] == "doc" || $row_heatmap['file_type'] == "pptx" || $row_heatmap['file_type'] == "PDF" || $row_heatmap['file_type'] == "pdf" || $row_heatmap['file_type'] == "xlsx" || $row_heatmap['file_type'] == "html") {
                  ?>
                      <a href="<?php echo BASE_URL; ?>includes/Pages/test_document/<?php echo $row_heatmap['file_name']; ?>" target="_blank"><?php echo substr($row_heatmap['file_name'], 0, 10); ?> </a>
                    <?php
                    }
                    if ($row_heatmap['file_type'] == "online") {
                    ?>
                      <a href="http://<?php echo $row_heatmap['file_name']; ?>" target="_blank"><?php echo $row_heatmap['lastName']; ?></a>
                    <?php
                    }
                    if ($row_heatmap['file_type'] == "offline") {
                    ?>
                      <a style="cursor: pointer;" class="driveLink1" value="<?php echo $row_heatmap['file_type']; ?>" target="_blank"><?php echo $row_heatmap['lastName']; ?> </a>
                    <?php
                    }
                    if ($row_heatmap['file_type'] == "jpeg" || $row_heatmap['file_type'] == "jpg" || $row_heatmap['file_type'] == "png" || $row_heatmap['file_type'] == "gif") {
                    ?>
                      <a href="<?php echo BASE_URL; ?>includes/Pages/test_document/<?php echo $row_heatmap['file_name']; ?>" target="_blank"><?php echo substr($row_heatmap['file_name'], 0, 10); ?> </a>
                    <?php
                    }
                  } else {
                    if ($fileQData['type'] == "docx" || $fileQData['type'] == "doc" || $fileQData['type'] == "pptx" || $fileQData['type'] == "PDF" || $fileQData['type'] == "pdf" || $fileQData['type'] == "xlsx" || $fileQData['type'] == "html") {
                    ?>
                      <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileQData['filename']; ?>" target="_blank"><?php echo substr($fileQData['filename'], 0, 10); ?> </a>
                    <?php
                    }
                    if ($fileQData['type'] == "online") {
                    ?>
                      <a href="http://<?php echo $fileQData['filename']; ?>" target="_blank"><?php echo $fileQData['lastName']; ?></a>
                    <?php
                    }
                    if ($fileQData['type'] == "offline") {
                    ?>
                      <a style="cursor: pointer;" class="driveLink1" value="<?php echo $fileQData['filename']; ?>" target="_blank"><?php echo $fileQData['lastName']; ?> </a>
                    <?php
                    }
                    if ($fileQData['type'] == "jpeg" || $fileQData['type'] == "jpg" || $fileQData['type'] == "png" || $fileQData['type'] == "gif") {
                    ?>
                      <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileQData['filename']; ?>" target="_blank"><?php echo substr($fileQData['filename'], 0, 10); ?> </a>
                  <?php
                    }
                  }
                  ?>
                </td>

                <td>
                  <?php
                  if ($row_heatmap['fileLoca'] != "userFile") {
                    if ($row_heatmap['file_type'] == "offline") {
                  ?>
                      <a class="btn btn-soft-success btn-xs editOfflineLink" href="" data-id="<?php echo $row_heatmap['id'] ?>" data-name="<?php echo $row_heatmap['file_name']; ?>" data-last="<?php echo $row_heatmap['lastName']; ?>" data-type="<?php echo $row_heatmap['file_type']; ?>" data-bs-toggle="modal" data-bs-target="#editOffline"><i class="bi bi-pen-fill"></i></a>
                    <?php
                    } else if ($row_heatmap['file_type'] == "online") {
                    ?>
                      <a class="btn btn-soft-success btn-xs editOnlineLink" href="" data-id="<?php echo $row_heatmap['id'] ?>" data-name="<?php echo $row_heatmap['file_name']; ?>" data-last="<?php echo $row_heatmap['lastName']; ?>" data-type="<?php echo $row_heatmap['file_type']; ?>" data-bs-toggle="modal" data-bs-target="#editOnline"><i class="bi bi-pen-fill"></i></a>
                    <?php
                    } else {
                    ?>
                      <a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('docid').value='<?php echo $row_heatmap['id'] ?>';document.getElementById('doc_name').value='<?php echo $row_heatmap['title']; ?>';" data-bs-toggle="modal" data-bs-target="#docedit"><i class="bi bi-pen-fill"></i></a>
                    <?php
                    }
                  } else {
                    if ($fileQData['type'] == "offline") {
                    ?>
                      <a class="btn btn-soft-success btn-xs editOfflineLinkLab" href="" data-id="<?php echo $row_heatmap['file_name'] ?>" data-name="<?php echo $fileQData['filename']; ?>" data-last="<?php echo $fileQData['lastName']; ?>" data-type="<?php echo $fileQData['type']; ?>" data-bs-toggle="modal" data-bs-target="#editOfflineLab"><i class="bi bi-pen-fill"></i></a>
                    <?php
                    } else if ($fileQData['type'] == "online") {
                    ?>
                      <a class="btn btn-soft-success btn-xs editOnlineLinkLab" href="" data-id="<?php echo $row_heatmap['file_name'] ?>" data-name="<?php echo $fileQData['filename']; ?>" data-last="<?php echo $fileQData['lastName']; ?>" data-type="<?php echo $fileQData['type']; ?>" data-bs-toggle="modal" data-bs-target="#editOnlineLab"><i class="bi bi-pen-fill"></i></a>
                    <?php
                    } else {
                    ?>
                      <a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('docidLab').value='<?php echo $row_heatmap['file_name'] ?>';document.getElementById('doc_nameLab').value='<?php echo $fileQData['filename']; ?>';" data-bs-toggle="modal" data-bs-target="#doceditLab"><i class="bi bi-pen-fill"></i></a>
                  <?php
                    }
                  }
                  ?>


                  <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/test/docdelete.php?id=<?php echo $row_heatmap['id'] ?>"><i class="bi bi-trash-fill"></i></a>
                  <a class="btn btn-soft-primary btn-xs addRef" data-refrence="<?php echo $row_heatmap['refrence']; ?>" data-id="<?php echo $row_heatmap['id']; ?>" title="reference" data-bs-toggle="modal" data-bs-target="#refrence"><i class="bi bi-file-earmark-fill"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- End Body -->
    </div>
    <!-- End Card -->
  </div>
</div>


<div class="modal fade" id="docedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Document</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_document.php" enctype="multipart/form-data">

          <input class="form-control" type="hidden" name="fileId" value="" id="docid">

          <label class="text-dark">File Name</label>
          <input class="form-control" type="text" name="doc_name" value="" id="doc_name">

          <label class="text-dark">File</label>
          <input class="form-control" type="file" name="upload_file" value="" id="course_description">

          <hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="doceditLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Document</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_document.php" enctype="multipart/form-data">

          <input class="form-control" type="hidden" name="fileId" value="" id="docidLab">

          <label class="text-dark">File Name</label>
          <input class="form-control" type="text" name="doc_name" value="" id="doc_nameLab">

          <label class="text-dark">File</label>
          <input class="form-control" type="file" name="upload_file" value="" id="course_description">

          <hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveitLab" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>
<!-- online modal -->


<div class="modal fade" id="editOnline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Link</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_document.php" enctype="multipart/form-data">

          <input class="form-control" type="hidden" name="fileId" value="" id="onlineLinkId">
          <input class="form-control" type="hidden" name="onlineLinkType" value="" id="onlineLinkType">

          <label class="text-dark">Link</label>
          <input class="form-control" type="text" name="onlineLink" value="" id="onlineLink">

          <label class="text-dark">Link Name</label>
          <input class="form-control" type="text" name="onlineLinkName" value="" id="onlineLinkName">

          <hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editOnlineLink" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editOnlineLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Link</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_document.php" enctype="multipart/form-data">

          <input class="form-control" type="hidden" name="fileId" value="" id="onlineLinkIdLab">
          <input class="form-control" type="hidden" name="onlineLinkType" value="" id="onlineLinkTypeLab">

          <label class="text-dark">Link</label>
          <input class="form-control" type="text" name="onlineLink" value="" id="onlineLinkLab">

          <label class="text-dark">Link Name</label>
          <input class="form-control" type="text" name="onlineLinkName" value="" id="onlineLinkNameLab">

          <hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editOnlineLinkLab" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>

<!-- offline -->

<div class="modal fade" id="editOffline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Link</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_document.php" enctype="multipart/form-data">

          <input class="form-control" type="hidden" name="fileId" value="" id="offlineLinkId">
          <input class="form-control" type="hidden" name="offlineLinkType" value="" id="offlineLinkType">

          <label class="text-dark">Link</label>
          <input class="form-control" type="text" name="onlineLink" value="" id="offlineLink">

          <label class="text-dark">Link Name</label>
          <input class="form-control" type="text" name="onlineLinkName" value="" id="offlineLinkName">

          <hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editOfflineLink" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editOfflineLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Link</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_document.php" enctype="multipart/form-data">

          <input class="form-control" type="hidden" name="fileId" value="" id="offlineLinkIdLab">
          <input class="form-control" type="hidden" name="offlineLinkType" value="" id="offlineLinkTypeLab">

          <label class="text-dark">Link</label>
          <input class="form-control" type="text" name="onlineLink" value="" id="offlineLinkLab">

          <label class="text-dark">Link Name</label>
          <input class="form-control" type="text" name="onlineLinkName" value="" id="offlineLinkNameLab">

          <hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="editOfflineLinkLab" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="refrence" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Document</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/refrence_document.php">
          <input class="form-control" type="hidden" name="refId" value="" id="refId">
          <textarea class="form-control" name="refrenceName" id="refrenceName"></textarea>
          <hr>
          <input style="margin:5px; font-weight: bold; font-size:large; float:right;" class="btn btn-success" type="submit" name="saveit" value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
                      <td>\
                        <div class="row">\
                       \
                          <div class="col-md-4 mb-2">\
\
                                    <div class="form-outline">\
                                    <label class="text-dark" style="font-weight:bold;">Document Name</label>\
                                     <input type="text" class="form-control" name="title[]" placeholder="Enter title of exam.." required>\
                                    </div>\
\
                                  </div>\
\
                                  <div class="col-md-4 mb-2">\
\
                                    <div class="form-outline">\
                                    <label class="text-dark" style="font-weight:bold;">Year</label>\
                                    <input type="date" class="form-control" name="year[]">\
                                    </div>\
\
                                  </div>\
\
                                  <div class="col-md-4 mb-2">\
\
                                    <div class="form-outline">\
                                    <label class="text-dark" style="font-weight:bold;">Attachment</label>\
                                     <input type="file" class="form-control" name="upload_file[]" placeholder="Enter title of exam.." required multiple>\
                                    </div>\
\
                                  </div>\
                        </div>\
                      \
                       \
                      </td>\
                          <td><button type="button" name="remove_doc" id="remove_doc" class="btn btn-soft-danger" style="margin-top:30px;"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_doc").click(function() {
      if (a <= max) {
        $("#table-field-document").append(html);
        a++;
      }
    });
    $("#table-field-document").on('click', '#remove_doc', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  function document_search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("document_search");
    filter = input.value.toUpperCase();
    table = document.getElementById("documenttable");
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
  $(document).ready(function() {
    $(".fileOpt").change(function() {
      if ($(this).val() == "addFile") {
        $("#multipleFile").css("display", "block");
        $("#phase_form").css("display", "none");
        $("#filelink").css("display", "none");
        $("#newpageform").css("display", "none");
        $("#file").css("display", "block");
      }

      if ($(this).val() == "addFileLoca") {
        $("#phase_form").css("display", "block");
        $("#multipleFile").css("display", "none");
        $("#filelink").css("display", "none");
        $("#newpageform").css("display", "none");
        $("#file").css("display", "block");
      }
      if ($(this).val() == "addFileLink") {
        $("#phase_form").css("display", "none");
        $("#multipleFile").css("display", "none");
        $("#newpageform").css("display", "none");
        $("#filelink").css("display", "block");
        $("#file").css("display", "block");
      }

      if ($(this).val() == "addNewPage") {
        window.location.href = "<?php echo BASE_URL; ?>chatbox/editorPage.php";
      }
    });
  });

  $(".txt_search").keyup(function() {
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
          $(".tableData").show();
          $('.userDetail').empty();
          $('.userDetail').append(response);
          // console.log(response);

        }
      });
    } else {
      $('.searchResult').empty();
      $(".tableData").hide();
    }


  });
</script>

<script>
  $(".addRef").on("click", function() {
    const refId = $(this).data("id");
    const refName = $(this).data("refrence");
    $("#refId").val(refId);
    $('#refrenceName').val(refName);
  });
</script>

<script>
  $(".editOnlineLink").on("click", function() {
    const linkId = $(this).data("id");
    const linkType = $(this).data("type");
    const linkName = $(this).data("name");
    const linkLastName = $(this).data("last");
    $("#onlineLinkId").val(linkId);
    $("#onlineLinkType").val(linkType);
    $("#onlineLink").val(linkName);
    $("#onlineLinkName").val(linkLastName);
  });

  $(".editOfflineLink").on("click", function() {
    const linkId = $(this).data("id");
    const linkType = $(this).data("type");
    const linkName = $(this).data("name");
    const linkLastName = $(this).data("last");
    $("#offlineLinkId").val(linkId);
    $("#offlineLinkType").val(linkType);
    $("#offlineLink").val(linkName);
    $("#offlineLinkName").val(linkLastName);
  });

  $(".editOnlineLinkLab").on("click", function() {
    const linkId = $(this).data("id");
    const linkType = $(this).data("type");
    const linkName = $(this).data("name");
    const linkLastName = $(this).data("last");
    $("#onlineLinkIdLab").val(linkId);
    $("#onlineLinkTypeLab").val(linkType);
    $("#onlineLinkLab").val(linkName);
    $("#onlineLinkNameLab").val(linkLastName);
  });

  $(".editOfflineLinkLab").on("click", function() {
    const linkId = $(this).data("id");
    const linkType = $(this).data("type");
    const linkName = $(this).data("name");
    const linkLastName = $(this).data("last");
    $("#offlineLinkIdLab").val(linkId);
    $("#offlineLinkTypeLab").val(linkType);
    $("#offlineLinkLab").val(linkName);
    $("#offlineLinkNameLab").val(linkLastName);
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