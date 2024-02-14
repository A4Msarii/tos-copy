<p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">Pages Table <input type="checkbox" class="page_checks" id="pages_table">
  <i class="bi bi-trash-fill text-danger delte_pages" onclick="alert('are you sure to delete pages..')"></i>
</p>
<table class="table table-bordered table-hover" id="file_page">
  <input style="margin:5px;" class="form-control" type="text" id="search_page" onkeyup="page()" placeholder="Search for pages.." title="Type in a name">
  <thead class="bg-dark">
    <th class="text-white">Sr No</th>
    <th class="text-white">Page name</th>

    <th class="text-white">Created By</th>
    <th class="text-white">Permission</th>
    <th class="text-white">Export</th>
    <th class="text-white">Action</th>
  </thead>
  <?php

  $query2_fm2 = "SELECT * FROM users where `role`='super admin'";
  $statement2_fm2 = $connect->prepare($query2_fm2);
  $statement2_fm2->execute();
  $result2_fm2 = $statement2_fm2->fetchAll();
  foreach ($result2_fm2 as $row39) {
    $admin_ides = $row39['id'];
    $query1_fm = "SELECT * FROM editor_data where userId='$admin_ides'";
    $statement1_fm = $connect->prepare($query1_fm);
    $statement1_fm->execute();
    if ($statement1_fm->rowCount() > 0) {
      $result1_fm = $statement1_fm->fetchAll();
      $snm = 1;
      foreach ($result1_fm as $row) {
        $pId = $row['id'];
  ?>
        <tr>
          <td style="width:50px;"> <input type="checkbox" name="delete_multiple_pages[]" class="get_page_checks" value="<?php echo $row['id'] ?>"></td>

          <td><?php echo $row['pageName']; ?>
            <a class="pageData" value="<?php echo $row['pageName']; ?>" name="<?php echo $pId; ?>" style="float: right; font-weight:bold; font-size:larger;" type="button" data-bs-toggle="modal" data-bs-target="#viewnewpage"><i class="bi bi-eye-fill"></i></a>
          </td>

          <td><?php echo $row['createdBy']; ?></td>
          <td>
            <?php
            $permissionQuery = $connect->query("SELECT * FROM pagepermissions WHERE pageID = '$pId'");
            while ($perData = $permissionQuery->fetch()) {
              if ($perData['userId'] == 'All instructor' || $perData['userId'] == 'Everyone' || $perData['userId'] == 'None') {
                $perName = $perData['userId'];
              } else {
                $perId = $perData['userId'];
                $userQuery = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                $perName = $userQuery->fetchColumn();
              }
            ?>
              <p><b><?php echo $perName; ?></b>
                <a style="float:right;" href="<?php echo BASE_URL; ?>includes/Pages/delete_permission.php?userPermissionDeleteId=<?php echo $perData['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill text-danger"></i></a>
              </p>
            <?php
            }
            ?>
          </td>
          <td>
            <div class="nav-item">
              <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarExportUser<?php echo $id; ?>" aria-expanded="false" aria-controls="navbarExport">
                <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/Export/export1.png">
                Export
              </a>
              <div id="navbarExportUser<?php echo $id; ?>" class="nav-collapse collapse hide" data-bs-parent="#navbarExport" hs-parent-area="#navbarExport">

                <div id="navbarUsersMenuDiv">
                  <div class="nav-item">
                    <a href="<?php echo BASE_URL; ?>includes/Pages/savePDF.php?pdfIdUser=<?php echo $pId ?>" class="nav-link" download="filename.pdf">
                      <span class="nav-link-title">PDF</span>
                    </a>
                    <a href="<?php echo BASE_URL; ?>includes/Pages/saveDocx.php?docxIdUser=<?php echo $pId ?>" class="nav-link" download="filename.docx">
                      <span class="nav-link-title">DOCX</span>
                    </a>
                    <a href="<?php echo BASE_URL; ?>includes/Pages/saveHtml.php?htmlIdUser=<?php echo $pId ?>" class="nav-link" download="filename.html">
                      <span class="nav-link-title">HTML</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td>
            <a class="btn btn-soft-success btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/edit_texteditor.php?userPageId=<?php echo $row['id']; ?>"><i class="bi bi-pen-fill"></i></a>
            <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/delete_newpage.php?userDeleteId=<?php echo $row['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>
            <a class="btn btn-soft-secondary btn-xs permissionModalAdmin" data-bs-target="#permissionModalAdmin" data-bs-toggle="modal" value="<?php echo $row['id']; ?>"><img style="height: 10px; width:10px;" src="<?php echo BASE_URL; ?>assets/svg/actions/Permissions/permission.png"></a>
          </td>
        </tr>
  <?php
      }
    }
  }

  ?>

  <?php
  // $output ="";
  $query1_fm1 = "SELECT * FROM editor_data group by userId";
  $statement1_fm1 = $connect->prepare($query1_fm1);
  $statement1_fm1->execute();
  if ($statement1_fm1->rowCount() > 0) {
    $result1_fm1 = $statement1_fm1->fetchAll();
    $snm = 1;
    foreach ($result1_fm1 as $row30) {
      $page_user_id = $row30['userId'];
      $query2_fm2 = "SELECT * FROM users where `role`='super admin'";
      $statement2_fm2 = $connect->prepare($query2_fm2);
      $statement2_fm2->execute();
      $result2_fm2 = $statement2_fm2->fetchAll();
      foreach ($result2_fm2 as $row39) {
        $admin_ides = $row39['id'];
        if ($page_user_id != $admin_ides) {

  ?>

          <tr class="varun" style="text-align:center;">
            <td colspan="6"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size:large; font-style: oblique;"><?php echo $row30['createdBy']; ?> Pages </span>


                <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete <?php echo $row30['createdBy'] ?> all pages" style="font-weight:bold; color: red; font-size:large;" href="<?php echo BASE_URL; ?>includes/Pages/delete_usernewpage.php?deleteId=<?php echo $page_user_id; ?>"><i class="bi bi-trash-fill"></i></a></span>
            </td>

          </tr>
          <?php

          $query1_fm = "SELECT * FROM editor_data where userId='$page_user_id'";
          $statement1_fm = $connect->prepare($query1_fm);
          $statement1_fm->execute();
          if ($statement1_fm->rowCount() > 0) {
            $result1_fm = $statement1_fm->fetchAll();
            $snm = 1;
            foreach ($result1_fm as $row) {
              $pId = $row['id'];
          ?>

              <tr>
                <td style="width:50px;"> <input type="checkbox" name="delete_multiple_pages[]" class="get_page_checks" value="<?php echo $row['id'] ?>"></td>

                <td><?php echo $row['pageName']; ?>
                  <a style="float: right; font-weight:bold; font-size:larger;" onclick="document.getElementById('adminid').value='<?php echo $id; ?>';" type="button" data-bs-toggle="modal" data-bs-target="#viewnewpage"><i class="bi bi-eye-fill"></i></a>
                </td>

                <td><?php echo $row['createdBy']; ?></td>
                <td>
                  <?php
                  $permissionQuery = $connect->query("SELECT * FROM pagepermissions WHERE pageID = '$pId'");
                  while ($perData = $permissionQuery->fetch()) {
                    if ($perData['userId'] == 'All instructor' || $perData['userId'] == 'Everyone') {
                      $perName = $perData['userId'];
                    } else {
                      $perId = $perData['userId'];
                      $userQuery = $connect->query("SELECT nickname FROM users WHERE id = '$perId'");
                      $perName = $userQuery->fetchColumn();
                    }
                  ?>
                    <p><b><?php echo $perName; ?></b>
                      <a style="float:right;" href="<?php echo BASE_URL; ?>includes/Pages/delete_permission.php?userPermissionDeleteId=<?php echo $perData['id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                    </p>
                  <?php
                  }
                  ?>
                </td>
                <td>
                  <div class="nav-item">
                    <a class="nav-link dropdown-toggle dropdown-toggle-split" role="button" data-bs-toggle="collapse" data-bs-target="#navbarExportUser<?php echo $id; ?>" aria-expanded="false" aria-controls="navbarExport">
                      <img style="height: 15px; width:15px; margin:5px" src="<?php echo BASE_URL; ?>assets/svg/actions/Export/export1.png">
                      Export
                    </a>
                    <div id="navbarExportUser<?php echo $id; ?>" class="nav-collapse collapse hide" data-bs-parent="#navbarExport" hs-parent-area="#navbarExport">

                      <div id="navbarUsersMenuDiv">
                        <div class="nav-item">
                          <a href="<?php echo BASE_URL; ?>includes/Pages/savePDF.php?pdfIdUser=<?php echo $id ?>" class="nav-link" download="filename.pdf">
                            <span class="nav-link-title">PDF</span>
                          </a>
                          <a href="<?php echo BASE_URL; ?>includes/Pages/saveDocx.php?docxIdUser=<?php echo $id ?>" class="nav-link" download="filename.docx">
                            <span class="nav-link-title">DOCX</span>
                          </a>
                          <a href="<?php echo BASE_URL; ?>includes/Pages/saveHtml.php?htmlIdUser=<?php echo $id ?>" class="nav-link" download="filename.html">
                            <span class="nav-link-title">HTML</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <a class="btn btn-soft-success btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/edit_texteditor.php?userPageId=<?php echo $row['id']; ?>"><i class="bi bi-pen-fill text-success"></i></a>
                  <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/delete_newpage.php?userDeleteId=<?php echo $row['id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                  <a class="btn btn-soft-secondary btn-xs permissionModalAdmin" data-bs-target="#permissionModalAdmin" data-bs-toggle="modal" value="<?php echo $row['id']; ?>"><img style="height: 10px; width:10px;" src="<?php echo BASE_URL; ?>assets/svg/actions/Permissions/permission.png"></a>
                </td>
              </tr>
          <?php
            }
          }

          ?>

  <?php }
      }
    }
  }
  ?>
</table>



<!--View Page modal-->
<div class="modal fade" id="viewnewpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="pageName">Edit Briefcase</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="pageModal">
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="permissionModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Permission Modal</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <input type="text" id="" name="to_user" class="form-control txt_search1" placeholder="Share Individual" />
          <br>
        </div>
        <div>
          <center>
            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
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
                    <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory" style="border-radius: 20px; border:1px solid #0000004d;">
                      <option selected value="readOnly">ReadOnly</option>
                      <option value="readAndWrite">Read And Write</option>
                      <option value="None">None</option>
                    </select>
                  </td>
                </tr>
              </table>
              <br>

              <center>

                <input type="hidden" value="" name="permissionPageIDAdmin" id="permissionPageIDAdmin" />
                <table class="table table-bordered" id="tableData1" style="display:none;">
                  <thead class="bg-dark">
                    <tr>
                      <th class="text-white">#</th>
                      <th class="text-white">Profile Image</th>
                      <th class="text-white">Name</th>

                    </tr>
                  </thead>
                  <tbody id="adminDetail">

                  </tbody>
                </table>
                <input type="submit" class="btn btn-success" value="Give Permission" name="permissionBtnFileManageradmin" />
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Permision Modal</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <input type="text" id="" name="to_user" class="form-control txt_search" placeholder="Share Individual" />
          <br>
        </div>
        <div>
          <center>
            <table>
              <tr>
                <td>
                  <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                    <option disabled>Select File Method</option>
                    <option value="All instructor">Instructor Only</option>
                    <option value="Everyone">Everyone</option>
                    <option selected value="None">None</option>
                  </select>
                </td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="permissionType" name="permissionCategory" style="border-radius: 20px; border:1px solid #0000004d;">
                    <option selected value="readOnly">ReadOnly</option>
                    <option value="readAndWrite">Read And Write</option>
                    <option value="None">None</option>
                  </select>
                </td>
              </tr>
            </table>
            <form method="post" action="<?php echo BASE_URL; ?>Library/giveUserPermission.php" enctype="multipart/form-data">
              <center>
                <select class="form-select" aria-label="Default select example" style="width:50%;margin-bottom:25px;" id="permissionType" name="permissionType">
                  <option disabled>Select File Method</option>
                  <option value="All instructor">Instructor Only</option>
                  <option value="Everyone">Everyone</option>
                  <option selected value="None">None</option>
                </select>
                <input type="hidden" value="" name="permissionPageID" id="permissionPageID" />
                <table class="table table-bordered" id="tableData" style="display:none;">
                  <thead class="bg-dark">
                    <tr>
                      <th class="text-white">#</th>
                      <th class="text-white">Profile Image</th>
                      <th class="text-white">Name</th>

                    </tr>
                  </thead>
                  <tbody id="userDetail">

                  </tbody>
                </table>
                <input type="submit" class="btn btn-success" value="Give Permission" name="permissionBtnFileManager" />
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>