<p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">Location
          <input type="checkbox" class="page_checks3" id="pages_table3">
          <i class="bi bi-trash-fill text-danger delte_pages3" onclick="alert('are you sure to delete locations..')"></i>
        </p>
        <table class="table table-bordered" id="file_location_link">
          <input style="margin:5px;" class="form-control" type="text" id="search_location" onkeyup="location_link()" placeholder="Search for Location/link.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-light">Sr No</th>
            <!-- <th class="text-light">File Names</th> -->
            <th class="text-light">Uploaded Files</th>
            <th class="text-light">View</th>
            <th class="text-light">Action</th>
          </thead>
          <?php
          // $output ="";
          $query2_fm211 = "SELECT * FROM users where `role`='super admin'";
          $statement2_fm211 = $connect->prepare($query2_fm211);
          $statement2_fm211->execute();
          $result2_fm211 = $statement2_fm211->fetchAll();
          foreach ($result2_fm211 as $row391) {
            $admin_ides110 = $row391['id'];
            $query1_ff = "SELECT * FROM user_files where user_id='$admin_ides110' and type IN ('offline', 'online')";
            $statement1_ff = $connect->prepare($query1_ff);
            $statement1_ff->execute();
            if ($statement1_ff->rowCount() > 0) {
              $result1_ff = $statement1_ff->fetchAll();

              foreach ($result1_ff as $row_loc) {
                $filename = "";
                $id = $row_loc['id']; ?>
                <tr>
                  <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages3[]" class="get_page_checks3" value="<?php echo $row_loc['id'] ?>"></td>

                  <td>
                    <span title="<?php echo $row_loc['filename'] ?>"> <?php echo $row_loc['lastName'] ?></span>
                  </td>
                  <td class="get_url_val"><?php if ($row_loc['type'] == "offline") { ?>

                      <a href="<?php echo BASE_URL; ?>openPageIllu.php" target="_blank"><button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $row_loc['id'] ?>"><i class="bi bi-files"></i></button>

                        <a style="display:none" href="<?php echo $row_loc['filename']; ?>" class="url_value<?php echo $row_loc['id'] ?>" target="_blank"><?php echo $row_loc['filename']; ?></a>
                      <?php } else if ($row_loc['type'] == "online") {
                      ?>
                        <a href="<?php echo $row_loc['filename'] ?>" target="_blank"> <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $row_loc['id'] ?>"><i class="bi bi-files"></i></button></a>

                        <a style="display:none" href="<?php echo $row_loc['filename']; ?>" class="url_value<?php echo $row_loc['id'] ?>" target="_blank"><?php echo $row_loc['filename']; ?></a>
                      <?php
                                          } ?>
                  </td>
                  <td>
                    <a class="btn btn-soft-success btn-xs" id="<?php echo $row_loc['id']; ?>" value="<?php echo $row_loc['filename']; ?>" name="<?php echo $row_loc['lastName']; ?>" class="editFilelink" data-bs-target="#editlinkFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
                    <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/delet_file.php?userid=<?php echo $row_loc['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

                  </td>
                </tr>
          <?php
              }
            }
          }
          ?>
          <?php
          // $output ="";
          $query1_fm21 = "SELECT * FROM user_files where type IN ('offline', 'online') group by user_id";
          $statement1_fm21 = $connect->prepare($query1_fm21);
          $statement1_fm21->execute();
          if ($statement1_fm21->rowCount() > 0) {
            $result1_fm21 = $statement1_fm21->fetchAll();
            foreach ($result1_fm21 as $row311) {
              $page_user_id11 = $row311['user_id'];
              $query21_fm2 = "SELECT * FROM users where `role`!='super admin' and id='$page_user_id11'";
              $statement21_fm2 = $connect->prepare($query21_fm2);
              $statement21_fm2->execute();
              $result21_fm2 = $statement21_fm2->fetchAll();
              foreach ($result21_fm2 as $row139) {
                $admin1_ides1 = $row139['id'];
                $user_name_files = $row139['nickname'];
          ?>

                <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center;">
                  <td colspan="4"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size:large; font-style:oblique;"><?php echo $user_name_files ?> Pages </span>
                      <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete <?php echo $name5 ?> all Links" style="font-weight:bold; font-size:large; color:red;" href="<?php echo BASE_URL; ?>includes/Pages/delete_usernewfile.php?deleteId=<?php echo $admin1_ides1; ?>&type=link"><i class="bi bi-trash-fill"></i></a></span>
                  </td>

                </tr>
                <?php

                $query1_ff = "SELECT * FROM user_files where user_id='$admin1_ides1' and  type IN ('offline', 'online')";
                $statement1_ff = $connect->prepare($query1_ff);
                $statement1_ff->execute();
                if ($statement1_ff->rowCount() > 0) {
                  $result1_ff = $statement1_ff->fetchAll();
                  // $sn = 1;
                  foreach ($result1_ff as $row_pdf1) {
                    $filename = "";
                    $id = $row_pdf1['id']; ?>
                    <tr>
                      <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages3[]" class="get_page_checks3" value="<?php echo $row_pdf1['id'] ?>"></td>

                      <td><span title="<?php echo $row_pdf1['filename'] ?>"><?php echo $row_pdf1['lastName'] ?></span>
                      </td>
                      <td class="get_url_val"><?php if ($row_pdf1['type'] == "offline") { ?>

                          <a href="<?php echo BASE_URL; ?>" target="_blank"><button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $row_pdf1['id'] ?>"><i class="bi bi-files"></i></button>

                            <a style="display:none" href="<?php echo $row_pdf1['filename']; ?>" class="url_value<?php echo $row_pdf1['id'] ?>" target="_blank"><?php echo $row_pdf1['filename']; ?></a>
                          <?php } else if ($row_pdf1['type'] == "online") {
                          ?>
                            <a href="<?php echo $row_pdf1['filename'] ?>" target="_blank"> <button class="btn btn-soft-primary btn-sm" title="copy link" id="<?php echo $row_pdf1['id'] ?>"><i class="bi bi-files"></i></button></a>

                            <a style="display:none" href="<?php echo $row_pdf1['filename']; ?>" class="url_value<?php echo $row_pdf1['id'] ?>" target="_blank"><?php echo $row_pdf1['filename']; ?></a>
                          <?php
                                              } ?>
                      </td>
                      <td>
                        <a class="btn btn-soft-success btn-xs" id="<?php echo $row_pdf1['id']; ?>" value="<?php echo $row_pdf1['filename']; ?>" class="userEditFile" data-bs-target="#userEditPdfFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
                        <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/delet_file.php?userid=<?php echo $id ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

                      </td>
                    </tr>
          <?php
                  }
                }
              }
            }
          }

          ?>

        </table>