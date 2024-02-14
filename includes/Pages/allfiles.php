<p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">All files
  <input type="checkbox" class="page_checks6" id="pages_table6">
  <i class="bi bi-trash-fill text-danger delte_pages6" onclick="alert('are you sure to delete pages..')"></i>

</p>

<table class="table table-bordered" id="file_all">
  <input style="margin:5px;" class="form-control" type="text" id="search_all" onkeyup="file_all()" placeholder="Search for files.." title="Type in a name">
  <thead class="bg-dark">
    <th class="text-light">Sr No</th>
    <!-- <th class="text-light">File Names</th> -->
    <th class="text-light">Uploaded Files</th>
    <th class="text-light">Permission</th>
    <th class="text-light">Permission Type</th>
    <th class="text-light">View</th>
    <th class="text-light">Action</th>
  </thead>

  <?php
  $query1_fm7 = "SELECT * FROM user_files group by user_id";
  $statement1_fm7 = $connect->prepare($query1_fm7);
  $statement1_fm7->execute();
  if ($statement1_fm7->rowCount() > 0) {
    $result1_fm7 = $statement1_fm7->fetchAll();
    foreach ($result1_fm7 as $key => $row39) {
      $page_user_id7 = $row39['user_id'];

      $user_name_docx = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
      $user_name_docx->execute([$page_user_id7]);
      $name7 = $user_name_docx->fetchColumn();
  ?>
      <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center;">
        <td colspan="6"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size:large; font-style:oblique;"><?php echo $name7 ?> Pages </span>
            <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete <?php echo $name7 ?> all files" style="float: right; font-weight:bold; font-size:large;color: red;" href="<?php echo BASE_URL; ?>includes/Pages/delete_userallfile.php?deleteId=<?php echo $page_user_id7; ?>"><i class="bi bi-trash-fill"></i></a></span>
        </td>
        <!-- <td colspan="4"></td> -->
      </tr>

      <?php
      $query1_ff = "SELECT * FROM user_files where user_id='$page_user_id7'";
      $statement1_ff = $connect->prepare($query1_ff);
      $statement1_ff->execute();
      if ($statement1_ff->rowCount() > 0) {
        $result1_ff = $statement1_ff->fetchAll();
        // $sn = 1;
        foreach ($result1_ff as $row) {
          $filename = "";
          $id = $row['id']; ?>
          <tr>
            <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages6[]" class="get_page_checks6" value="<?php echo $row['id'] ?>"></td>

            <td><?php
                if ($row['type'] == "offline" || $row['type'] == "online") { ?>
                <a href="#" title="<?php echo $row['lastName'] ?>"> <?php echo $row['lastName'] ?></a>


              <?php } else {
              ?>

                <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row['filename'] ?>" target="_blank"><?php echo $row['filename'] ?></a>


              <?php
                }
              ?>
            </td>
            <td>
              <?php
              $permissionQuery = $connect->query("SELECT * FROM filepermissions WHERE pageID = '$id'");
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
                  <a style="float:right;" href="<?php echo BASE_URL; ?>includes/Pages/delete_permission.php?userFilePermissionDeleteId=<?php echo $perData['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>
                </p>
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              $permissionQuery = $connect->query("SELECT * FROM filepermissions WHERE pageID = '$id'");
              while ($perData = $permissionQuery->fetch()) {
              ?>
                <p><b><?php echo $perData['permissionType']; ?></b>
                </p>
              <?php
              }
              ?>
            </td>
            <td class="get_url_val"><?php if ($row['type'] == "offline") { ?>

                <a href="<?php echo BASE_URL; ?>openPageIllu.php" target="_blank"><button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $row['id'] ?>"><i class="bi bi-files"></i></button>

                  <a style="display:none" href="<?php echo $row['filename']; ?>" class="url_value<?php echo $row['id'] ?>" target="_blank"><?php echo $row['filename']; ?></a>
                <?php } else if ($row['type'] == "online") {
                ?>
                  <a href="<?php echo $row['filename'] ?>" target="_blank"> <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $row['id'] ?>"><i class="bi bi-files"></i></button></a>

                  <a style="display:none" href="<?php echo $row['filename']; ?>" class="url_value<?php echo $row['id'] ?>" target="_blank"><?php echo $row['filename']; ?></a>
                <?php
                                    } else { ?>
                  <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row['filename']; ?>" target="_blank">View</a>
                <?php } ?>
            </td>
            <td>
              <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/delet_file.php?userid=<?php echo $id; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

            </td>
          </tr>

  <?php
        }
      }
    }
  }
  ?>
  </tbody>
</table>