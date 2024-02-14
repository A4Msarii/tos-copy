<p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">XLS Files
          <input type="checkbox" class="page_checks5" id="pages_table5">
          <i class="bi bi-trash-fill text-danger delte_pages5" onclick="alert('are you sure to delete pages..')"></i>
        </p>
        <table class="table table-bordered" id="file_xls">
          <input style="margin:5px;" class="form-control" type="text" id="search_xls" onkeyup="xls()" placeholder="Search for XLS Files.." title="Type in a name">
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
          foreach ($result2_fm211 as $row3911) {
            $admin_ides1 = $row3911['id'];
            $query1_ff = "SELECT * FROM user_files where user_id='$admin_ides1' and type='xlsx'";
            $statement1_ff = $connect->prepare($query1_ff);
            $statement1_ff->execute();
            if ($statement1_ff->rowCount() > 0) {
              $result1_ff = $statement1_ff->fetchAll();
              $sn = 1;
              foreach ($result1_ff as $row_xlx) {
                $filename = "";
                $pdf_name=$row_xlx['filename'];
                $extension=pathinfo($pdf_name, PATHINFO_FILENAME);
                $id = $row_xlx['id']; ?>
                <tr>
                  <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages5[]" class="get_page_checks5" value="<?php echo $row_xlx['id'] ?>"></td>

                  <td>
                    <?php echo $row_xlx['filename'] ?>
                  </td>
                  <td>

                    <a href="files/<?php echo $row_xlx['filename']; ?>" target="_blank">View</a>

                  </td>
                  <td>
                    <a class="btn btn-soft-success btn-xs" id="<?php echo $row_xlx['id']; ?>" onclick="document.getElementById('pdf_loc_edit_id').value='<?php echo $row_xlx['id'] ?>';
                                                             document.getElementById('fullname').value='<?php echo $row_xlx['filename'] ?>';
                                                             document.getElementById('editname').value='<?php echo $extension ?>';" value="<?php echo $row_xlx['filename']; ?>" class="editFile" data-bs-target="#editPdfFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
                    <a class="btn btn-soft-danger btn-xs" href="delet_file.php?userid=<?php echo $row_xlx['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

                  </td>
                </tr>
          <?php
              }
            }
          }
          ?>
          <?php
          $query1_fm6 = "SELECT * FROM user_files where type='xlsx' group by user_id";
          $statement1_fm6 = $connect->prepare($query1_fm6);
          $statement1_fm6->execute();
          if ($statement1_fm6->rowCount() > 0) {
            $result1_fm6 = $statement1_fm6->fetchAll();
            foreach ($result1_fm6 as $row36) {
              $page_user_id6 = $row36['user_id'];
              $query21_fm2 = "SELECT * FROM users where `role`!='super admin' and id='$page_user_id6'";
              $statement21_fm2 = $connect->prepare($query21_fm2);
              $statement21_fm2->execute();
              $result21_fm2 = $statement21_fm2->fetchAll();
              foreach ($result21_fm2 as $row139) {
                $admin1_ides = $row139['id'];
                $adminname = $row139['nickname'];
          ?>

                <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center;">
                  <td colspan="4"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size: large; font-style:oblique;"><?php echo $name5 ?> files </span>
                      <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete <?php echo $name5 ?> all XLS Files" style="float: right; font-weight:bold; font-size:large;color: red;" href="delete_usernewfile.php?deleteId=<?php echo $page_user_id6; ?>&type=xlsx"><i class="bi bi-trash-fill"></i></a></span>
                  </td>
                  <!-- <td colspan="4"></td> -->
                </tr>
                <?php
                $query1_ff = "SELECT * FROM user_files WHERE type='xlsx' and user_id='$page_user_id6'";
                $statement1_ff = $connect->prepare($query1_ff);
                $statement1_ff->execute();
                if ($statement1_ff->rowCount() > 0) {
                  $result1_ff = $statement1_ff->fetchAll();
                  // $sn = 1;
                  foreach ($result1_ff as $row) {
                    $filename = "";
                    $pdf_name=$row['filename'];
                    $extension=pathinfo($pdf_name, PATHINFO_FILENAME);
                    $id = $row['id']; ?>
                    <tr>
                      <td style="width:50px;"> <input type="checkbox" name="delete_multiple_pages5[]" class="get_page_checks5" value="<?php echo $row['id'] ?>"></td>

                      <td><?php
                          if ($row['lastName'] == "location" || $row['lastName'] == "link") { ?>
                          <a href="#" title="<?php echo $row['name'] ?>"> <?php echo $row['type'] ?></a>


                        <?php } else {
                        ?>

                          <a href="files/<?php echo $row['filename'] ?>" target="_blank"><?php echo $row['filename'] ?></a>


                        <?php
                          }
                        ?>
                      </td>
                      <td>
                        <a href="files/<?php echo $row['filename']; ?>" target="_blank">View</a>

                      </td>
                      <td>
                        <a class="btn btn-soft-success btn-xs" id="<?php echo $row['id']; ?>" onclick="document.getElementById('user_pdf_loc_edit_id').value='<?php echo $row['id'] ?>';
                                                             document.getElementById('user_fullname').value='<?php echo $row['filename'] ?>';
                                                             document.getElementById('user_editname').value='<?php echo $extension ?>';" value="<?php echo $row['filename']; ?>" class="userEditFile" data-bs-target="#userEditPdfFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
                        <a class="btn btn-soft-danger btn-xs" href="delet_file.php?userid=<?php echo $id ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

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