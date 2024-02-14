<div class="container">
  <!-- Nav -->
  <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="academictable3-tab" href="#academictable3" data-bs-toggle="pill" data-bs-target="#academictable3" role="tab" aria-controls="academictable3" aria-selected="true">
        <div class="d-flex align-items-center text-success">
          Add Academic
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="academicgoals-tab" href="#academicgoals" data-bs-toggle="pill" data-bs-target="#academicgoals" role="tab" aria-controls="academicgoals" aria-selected="false">
        <div class="d-flex align-items-center text-success">
          Goal Table
        </div>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="workingfilesAcademic-tab" href="#workingfilesAcademic" data-bs-toggle="pill" data-bs-target="#workingfilesAcademic" role="tab" aria-controls="workingfilesAcademic" aria-selected="false">
        <div class="d-flex align-items-center text-success">
          Working File
        </div>
      </a>
    </li>
  </ul>
  <!-- End Nav -->

  <!-- Tab Content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="academictable3" role="tabpanel" aria-labelledby="academictable3-tab">
      <div class="row">
        <center>
          <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/academic_insert_data.php" style="width:100%;">
            <h3>Class : <span style="font-size:larger; color:green;">Academic</span></h3>
            <div class="input-field">
              <table class="table table-bordered" id="table-field-academic" style="width:100%;">
                <tr>
                  <input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
                  <input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
                  <input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
                  <td class="short"><input type="text" name="academic[]" id="text7" class="form-control" placeholder="Enter Academic Class.." required></td>
                  <td class="short"><input maxlength="10" type="text" id="txt8" name="shortacademic[]" class="form-control" placeholder="Symbol" required></td>
                  <!-- <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type" required></td>
                                                      <td class="short"><input maxlength="10" readonly style="background-color: #bfcfe09e;" type="number" id="txt9" class="type_value form-control" name="percentage[]" placeholder="Percentage" required value="100"></td> -->
                  <td><button type="button" name="add_academic" id="add_academic" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="submit_academic">Save</button>
            </div>
          </form>
        </center>
      </div>
      <hr>
      <div class="row">
        <center>
          <table style="margin: 5px;" class="table table-striped table-bordered table-hover" id="academictable">
            <input class="form-control" type="text" id="academicsearch" onkeyup="academic()" placeholder="Search for Academic Class.." title="Type in a name"><br>
            <thead class="bg-dark">
              <th class="text-light">Sr No</th>
              <th class="text-light">Class Name</th>
              <th class="text-light">Symbol</th>
              <th class="text-light">Phase</th>
              <th class="text-light">CTP</th>
              <th class="text-light">Choose Files</th>
              <th class="text-light">File</th>
              <th class="text-light">Action</th>
            </thead>
            <?php
            $query3 = "SELECT * FROM academic where ctp='$ctp' and phase='$phase_id'";
            $statement3 = $connect->prepare($query3);
            $statement3->execute();
            if ($statement3->rowCount() > 0) {
              $result3 = $statement3->fetchAll();
              $sn = 1;
              foreach ($result3 as $row) {
                $ctp_name = $row['ctp'];
                $ctp1_name = $connect->prepare("SELECT course FROM ctppage WHERE CTPid=?");
                $ctp1_name->execute([$ctp_name]);
                $ctpname1 = $ctp1_name->fetchColumn();
            ?>

                <tr>
                  <td><?php echo $sn++;
                      $id = $row['id'] ?></td>
                  <td><span title="<?php echo $row['academic']; ?>"><?php
                                                                    $academicValue = $row['academic'];
                                                                    echo strlen($academicValue) > 20 ? substr($academicValue, 0, 20) . '...' : $academicValue;
                                                                    ?></span>
                  </td>
                  <td><?php echo $row['shortacademic'] ?></td>
                  <td><?php echo $phase ?></td>
                  <td><?php echo $ctpname1; ?></td>
                  <td style="width:20%; display:none;">

                    <span class="nav-link-title text-secondary" style="color:black; font-weight:bold;">Add File</span>
                    <!-- user modal -->
                    <div class="dropdown">
                      <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                        <div class="form-control" style="height: 40px;padding: inherit;margin: 5px;">
                          <label>Select</label>
                        </div>
                      </a>

                      <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 12rem;">
                        <div class="dropdown-item-text">
                          <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                              <ul style="text-decoration:none;">
                                <li>
                                  <a href="" id="fileadd"><label class="btn" data-bs-toggle="modal" data-bs-target="#add_file_academic" onclick="document.getElementById('fileaid').value='<?php echo $id = $row['id'] ?>'">Add File</label></a>
                                </li>
                                <li>
                                  <label class="btn" data-bs-toggle="modal" data-bs-target="#add_location_academic" onclick="document.getElementById('locaid').value='<?php echo $id = $row['id'] ?>'">Add File location</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End user modal -->

                  </td>

                  <td>
                    <div class="nav-item">
                      <a style="color:black;" class="btn btn-soft-secondary addAcademicId" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#addAcademiClassFile">
                        <span>Add File</span>
                      </a>
                    </div>
                  </td>

                  <td class="get_text_value_tab">
                    <?php
                    if ($row['type'] != "user_file") {
                      if ($row['type'] == 'link') {
                    ?>
                        <a href="<?php echo $row['file']; ?>" class="get_valueb<?php echo $row['id'] ?>" target="_blank" data-bs-placement="bottom" title="<?php echo $row['file']; ?>"><?php echo substr($row['file'], 0, 8); ?></a>
                        <a href="<?php echo $row['file']; ?>" target="_blank"> <button class="btn btn-soft-primary btn-sm" id="<?php echo $row['id'] ?>" title="copy link"><i class="bi bi-files"></i></button></a>
                      <?php
                      } elseif ($row['type'] == 'location') {
                      ?>
                        <a href="http://<?php echo $row['file']; ?>" class="get_valueb<?php echo $row['id'] ?>" target="_blank" data-bs-placement="bottom" title="<?php echo $row['file']; ?>"><?php echo substr($row['file'], 0, 8); ?></a>
                        <a class="copyLink" target="_blank"><button class="btn btn-soft-primary btn-sm" id="<?php echo $row['id'] ?>" title="copy link"><i class="bi bi-files"></i></button></a>
                      <?php
                      } elseif ($row['type'] == 'online_link') {
                      ?>
                        <a href="<?php echo $row['file']; ?>" class="get_valueb<?php echo $row['id'] ?>" target="_blank" data-bs-placement="bottom" title="<?php echo $row['file']; ?>"><?php echo substr($row['file'], 0, 8); ?></a>
                        <a href="<?php echo $row['file']; ?>" target="_blank"><button class="btn btn-soft-primary btn-sm" id="<?php echo $row['id'] ?>" title="copy link"> <i class="bi bi-files"></i></button></a>
                      <?php
                      } else {
                      ?>
                        <?php if ($row['file'] != "") { ?>
                          <a href="upload/<?php echo $row['file']; ?>" target="_blank" data-bs-placement="bottom" title="<?php echo $row['file']; ?>"><?php echo substr($row['file'], 0, 8); ?></a>
                        <?php } else {
                          echo "-";
                        }
                      }
                    }
                    if ($row['type'] == "user_file") {
                      $mainId = $row['file'];
                      $fetchFile = $connect->query("SELECT * FROM user_files WHERE id = '$mainId'");
                      $fetchFileData = $fetchFile->fetch();
                      if ($fetchFileData['type'] == 'online') {
                        ?>
                        <a href="<?php echo $fetchFileData['filename']; ?>" class="get_valueb<?php echo $row['id'] ?>" target="_blank" data-bs-placement="bottom" title="<?php echo $fetchFileData['filename']; ?>"><?php echo substr($fetchFileData['filename'], 0, 8); ?></a>
                        <a href="<?php echo $fetchFileData['filename']; ?>" target="_blank"> <button class="btn btn-soft-primary btn-sm" id="<?php echo $row['id'] ?>" title="copy link"><i class="bi bi-files"></i></button></a>
                      <?php
                      } elseif ($fetchFileData['type'] == 'offline') {
                      ?>
                        <a href="http://<?php echo $fetchFileData['filename']; ?>" class="get_valueb<?php echo $row['id'] ?>" target="_blank" data-bs-placement="bottom" title="<?php echo $fetchFileData['filename']; ?>"><?php echo substr($fetchFileData['filename'], 0, 8); ?></a>
                        <a class="copyLink" target="_blank"><button class="btn btn-soft-primary btn-sm" id="<?php echo $row['id'] ?>" title="copy link"><i class="bi bi-files"></i></button></a>
                      <?php
                      } elseif ($fetchFileData['lastName'] == '') {
                      ?>
                        <a href="files/<?php echo $fetchFileData['filename']; ?>" target="_blank" data-bs-placement="bottom" title="<?php echo $fetchFileData['filename']; ?>"><?php echo substr($fetchFileData['filename'], 0, 8); ?></a>
                    <?php }
                    }
                    ?>

                    <?php

                    ?>
                  </td>
                  <td><a class="btn btn-soft-success btn-xs" href="" onclick="document.getElementById('acaid').value='<?php echo $id = $row['id'] ?>';
                                               document.getElementById('academicname').value='<?php echo $row['academic'] ?>';
                                               document.getElementById('shortacademicname').value='<?php echo $row['shortacademic'] ?>';
                                            " data-bs-toggle="modal" data-bs-target="#editacademic"><i class="bi bi-pen-fill"></i></a>
                    </a>
                    <a class="btn btn-soft-danger btn-xs" href="academic-delet.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>
                    <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('ac_id').value='<?php echo $id = $row['id'] ?>';
                                                             " data-bs-toggle="modal" data-bs-target="#addgoalsacademic"><i class="bi bi-diagram-3"></i>
                    </a>
                  </td>
                </tr>
              <?php
              }
            } else { ?>
              <tr>
                <td colspan='9' style="text-align:center">
                  No data
                </td>
              </tr>
            <?php  }
            ?>
          </table>
        </center>
      </div>
    </div>

    <div class="tab-pane fade" id="academicgoals" role="tabpanel" aria-labelledby="academicgoals-tab">
      <div class="row">
        <center>
          <table style="margin: 5px;" class="table table-striped table-bordered table-hover" id="simtable">
            <input class="form-control" type="text" id="simsearch" onkeyup="sim()" placeholder="Search for Simulation Class.." title="Type in a name"><br>
            <thead class="bg-dark">
              <th class="text-light">Sr No</th>
              <th class="text-light">Class Name</th>
              <th class="text-light">Symbol</th>
              <th class="text-light">Goals</th>
            </thead>
            <tbody>
              <?php
              $sr = 0;

              $className = $connect->query("SELECT *
                FROM academic
                WHERE id IN (SELECT goalClassId FROM table_golas WHERE goalTable = 'academic')");
              while ($classData = $className->fetch()) {
                $sr++;
                $classID = $classData['id'];
              ?>
                <tr>
                  <td><?php echo $sr; ?></td>
                  <td><?php echo $classData['academic']; ?></td>
                  <td><?php echo $classData['shortacademic']; ?></td>
                  <td><?php
                      $goqlQuery = $connect->query("SELECT * FROM table_golas WHERE goalTable = 'academic' AND goalClassId = '$classID'");
                      while ($goalData = $goqlQuery->fetch()) {
                      ?>
                      <p>
                        <?php echo $goalData['goalName']; ?>
                        <a class="btn btn-soft-success btn-xs" id="edit_actual_goals_modal" data-id="<?php echo $goalData['id'] ?>" data-name="<?php echo $goalData['goalName']; ?>" data-bs-toggle="modal" data-bs-target="#editgoalsacadmic"><i class="bi bi-pen-fill"></i>
                        </a>
                        <a class="btn btn-soft-danger btn-xs" href="goals_delete.php?id=<?php echo $goalData['id'] ?>"><i class="bi bi-trash-fill"></i></a>
                      </p>
                    <?php } ?>
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

    <div class="tab-pane fade" id="workingfilesAcademic" role="tabpanel" aria-labelledby="workingfilesAcademic-tab">
      <center>
        <?php include 'workingFiles.php'; ?>
      </center>
    </div>

  </div>
  <!-- End Tab Content -->



</div>


<!--Edit Academic class modal-->
<div class="modal fade" id="editacademic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Academic Class</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="edit_academic_class.php">
          <input class="form-control" type="hidden" name="id" value="" id="acaid" readonly>
          <label style="color:black; font-weight:bold; margin:5px;">Class :</label>
          <input class="form-control" type="text" name="academic" value="" id="academicname">
          <label style="color:black; font-weight:bold; margin:5px;">Symbol :</label>
          <input class="form-control" type="text" name="shortacademic" value="" id="shortacademicname"><br>
          <input class="btn btn-success" type="submit" name="submit1" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<!--Add goals to sim modal-->
<div class="modal fade" id="addgoalsacademic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Goals</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form class="insert-goals" id="goal" method="post" action="goal_insert_data_actual.php">

            <div class="input-field">
              <table class="table table-bordered" id="table-field-goal-academic">
                <tr>
                  <input type="hidden" class="form-control" name="classId" value="" id="ac_id" readonly>
                  <td><input type="text" name="goalacademic[]" class="form-control" placeholder="Enter Goals" required></td>
                  <td style="border: 1px solid white;"><button type="button" name="add_goal_academic" id="add_goal_academic" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="submit_goal_academic">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- edit goals -->
<div class="modal fade" id="editgoalsacadmic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Goals</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form class="insert-goals" id="goal" method="post" action="goal_insert_data_actual.php">
            <div class="input-field">
              <input type="hidden" class="form-control actual_edit_id" name="id" value="" id="actual_edit_id1" readonly>
              <input type="text" name="goalactual" class="actual_edit_name form-control" value="" placeholder="Enter Goals" required>
              <button style="margin:10px;" class="btn btn-success" type="submit" name="edit_goal_actual">Save</button>
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="add_file_academic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content animate-zoom">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add File For Academic</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="upload_academic.php" method="post" enctype="multipart/form-data" class="multipleFile">
          <div class="input-field">
            <table class="table table-bordered">
              <tr>

                <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose File</label>
                  <input type="file" class="form-control" name="file" id="" multiple />
                </td>
              </tr>
            </table>
          </div><br>
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
          <center>
            <input style="margin:5px;" type="submit" value="Submit" name="upload" class="btn btn-success" />
            <input class="form-control" type="hidden" name="id" value="" id="fileaid" readonly>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade animate-zoom" id="add_location_academic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add File For Academic</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="insert-phases file_form" method="post" action="academic_location.php" enctype="multipart/form-data">
          <div class="input-field">
            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add File Location</label>
            <table class="table table-bordered" id="table-field">
              <tr>
                <td style="text-align: center;">
                  <input type="text" placeholder="Enter Locations" name="location" id="locationval" class="form-control" value="" required />
                  <input type="hidden" name="type" value="offline">

                </td>

              </tr>
            </table>
          </div>
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
          <center>
            <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>

            <input class="form-control" type="hidden" name="id" value="" id="locaid" readonly>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade animate-zoom" id="add_online_academic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Online Link</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="insert-phases file_form" method="post" action="academic_link.php" enctype="multipart/form-data">
          <div class="input-field">
            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
            <table class="table table-bordered" id="table-field">
              <tr>
                <td style="text-align: center;">
                  <input type="text" placeholder="Enter Link" name="link" id="linkval" class="form-control" value="" required />
                  <input type="hidden" name="type" value="online">

                </td>

              </tr>
            </table>
          </div>
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
          <center>
            <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savelink">Submit</button>

            <input class="form-control" type="hidden" name="id" value="" id="linkid" readonly>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addAcademiClassFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content animate-zoom">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add File For Academic</h3>
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
        <form method="post" enctype="multipart/form-data" id="multipleFile" style="width:80%;display:none;" action="<?php echo BASE_URL; ?>includes/Pages/upload_academic.php">
          <div class="input-field">
            <table class="table table-bordered">
              <tr>
                <input type="hidden" class="form-control academicId" name="id" value="">
                <td style="text-align: center;"><label for="exampleInputPassword1" style="color:black; font-weight:bold;">Choose Multiple Files</label>
                  <input type="file" class="form-control" name="file" id="" multiple />
                </td>
              </tr>
            </table>
          </div><br>
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

          <hr>
          <center>
            <input style="margin:5px; float:right; font-weight:bold; font-size:large;" type="submit" value="Submit" name="attachement" class="btn btn-success" />

          </center>
        </form>
      </center>
      <center>
      <form class="insert-phases file_form" method="post" action="academic_location.php" enctype="multipart/form-data" style="display:none" id="phase_form">
          <div class="input-field">
            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add File Location</label>
            <table class="table table-bordered" id="table-field">
              <tr>
                <td style="text-align: center;">
                  <input type="text" placeholder="Enter Locations" name="location" id="locationval" class="form-control" value="" required />
                  <input type="hidden" name="type" value="offline">

                </td>

              </tr>
            </table>
          </div>
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
          <center>
            <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savephase">Submit</button>

            <input class="form-control academicId" type="hidden" name="id" value="" readonly>
          </center>
        </form>
      </center>

      <center>
      <form class="insert-phases file_form" id="filelink" method="post" action="academic_link.php" enctype="multipart/form-data" style="display:none">
          <div class="input-field">
            <label for="exampleInputPassword1" style="color:black; font-weight:bold;">Add Link</label>
            <table class="table table-bordered" id="table-field">
              <tr>
                <td style="text-align: center;">
                  <input type="text" placeholder="Enter Link" name="link" id="linkval" class="form-control" value="" required />
                  <input type="hidden" name="type" value="online">

                </td>

              </tr>
            </table>
          </div>
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
          <center>
            <button style="margin:5px;" class="btn btn-success" type="submit" id="phase_submit" name="savelink">Submit</button>

            <input class="form-control academicId" type="hidden" name="id" value="" readonly>
          </center>
        </form>
      </center>
    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {

    var html2 = '<tr>\
                <td style="text-align: center;"><input type="text" name="academic[]" class="form-control" placeholder="Enter How many academic Classes you want?" required></td>\
                <td class="short"><input maxlength="10" type="text" name="shortacademic[]" class="form-control" placeholder="Symbol" required></td>\
                \
                <td><button type="button" name="remove_academic" id="remove_academic" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
              </tr>'
    var max2 = 100;
    var c = 1;

    $("#add_academic").click(function() {
      if (c <= max2) {
        $("#table-field-academic").append(html2);
        c++;
      }
    });
    $("#table-field-academic").on('click', '#remove_academic', function() {
      $(this).closest('tr').remove();
      c--;
    });
  });
</script>


<!--search for academic class-->
<script>
  function academic() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("academicsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("academictable");
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
  $(document).ready(function() {
    var html = '<tr>\
                  <td style="text-align: center;"><input type="text" name="goalacademic[]" class="form-control" placeholder="Enter Goals" required></td>\
                  <td style="border: 1px solid white;"><button type="button" name="remove_goal_academic" id="remove_goal_academic" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                </tr>'
    var max = 100;
    var a = 1;

    $("#add_goal_academic").click(function() {
      if (a <= max) {
        $("#table-field-goal-academic").append(html);
        a++;
      }
    });
    $("#table-field-goal-academic").on('click', '#remove_goal_academic', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });

  $(document).ready(function() {
    $(document).on('click', '#edit_actual_goals_modal', function() {
      var name = $(this).data('name');
      var id = $(this).data('id');
      $(".actual_edit_id").val(id);
      $(".actual_edit_name").val(name);
    });
  });
</script>

<script>
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
  $(".addAcademicId").on("click", function() {
    var acId = $(this).data("id");
    $(".academicId").val(acId);
  })
</script>