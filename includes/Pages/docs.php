<p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">DOCUMENT
          <!-- checkbox for multiple delete docx -->
          <input type="checkbox" class="page_checks2" id="pages_table2">
          <i class="bi bi-trash-fill text-danger delte_pages2" onclick="alert('are you sure to delete documents..')"></i>
        </p>
        <table class="table table-bordered" id="file_docs">
          <input style="margin:5px;" class="form-control" type="text" id="search_docs" onkeyup="docs()" placeholder="Search for Documents.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-light">Sr No</th>
            <!-- <th class="text-light">File Names</th> -->
            <th class="text-light">Uploaded Files</th>

            <th class="text-light">View</th>
            <th class="text-light">Action</th>
          </thead>
          <?php
          // $output ="";
          $query12_fm21 = "SELECT * FROM users where `role`='super admin'";
          $statement12_fm21 = $connect->prepare($query12_fm21);
          $statement12_fm21->execute();
          $result12_fm21 = $statement12_fm21->fetchAll();
          foreach ($result12_fm21 as $row1391) {
            $admin_ides1 = $row1391['id'];
            $query1_ff = "SELECT * FROM user_files where user_id='$admin_ides1' and type='docx'";
            $statement1_ff = $connect->prepare($query1_ff);
            $statement1_ff->execute();
            if ($statement1_ff->rowCount() > 0) {
              $result1_ff = $statement1_ff->fetchAll();
              $sn = 1;
              foreach ($result1_ff as $row_pdf) {
                $filename = "";
                  $pdf_name=$row_pdf['filename'];
                  $extension=pathinfo($pdf_name, PATHINFO_FILENAME);
                $id = $row_pdf['id']; ?>
                <tr>
                  <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages2[]" class="get_page_checks2" value="<?php echo $row_pdf['id'] ?>"></td>

                  <td>
                    <?php echo $row_pdf['filename'] ?>
                  </td>
                  <td>

                    <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row_pdf['filename']; ?>" target="_blank">View</a>

                  </td>
                  <td>
                    <a class="btn btn-soft-success btn-xs" id="<?php echo $row_pdf['id']; ?>" onclick="document.getElementById('pdf_loc_edit_id').value='<?php echo $row_pdf['id'] ?>';
                                                             document.getElementById('fullname').value='<?php echo $row_pdf['filename'] ?>';
                                                             document.getElementById('editname').value='<?php echo $extension ?>';" value="<?php echo $row_pdf['filename']; ?>" value="<?php echo $row_pdf['filename']; ?>" class="editFile" data-bs-target="#editPdfFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
                    <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/delet_file.php?userid=<?php echo $row_pdf['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

                  </td>
                </tr>
          <?php
              }
            }
          }
          ?>
          <?php
          // $output ="";
          $query1_fm2 = "SELECT * FROM user_files where type='docx' group by user_id";
          $statement1_fm2 = $connect->prepare($query1_fm2);
          $statement1_fm2->execute();
          if ($statement1_fm2->rowCount() > 0) {
            $result1_fm2 = $statement1_fm2->fetchAll();
            foreach ($result1_fm2 as $row31) {
              $page_user_id1 = $row31['user_id'];
              $query21_fm2 = "SELECT * FROM users where `role`='super admin'";
              $statement21_fm2 = $connect->prepare($query21_fm2);
              $statement21_fm2->execute();
              $result21_fm2 = $statement21_fm2->fetchAll();
              foreach ($result21_fm2 as $row139) {
                $admin1_ides = $row139['id'];
                if ($page_user_id1 != $admin1_ides) {
                  $user_name_files = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                  $user_name_files->execute([$page_user_id1]);
                  $name1 = $user_name_files->fetchColumn();
          ?>

                  <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center;">
                    <td colspan="4"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size:large;"><?php echo $name1 ?> Pages </span>
                        <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete <?php echo $name1 ?> all documents" style="font-weight:bold; font-size:large; color:red;" href="<?php echo BASE_URL; ?>includes/Pages/delete_usernewfile.php?deleteId=<?php echo $page_user_id1; ?>&type=docx"><i class="bi bi-trash-fill"></i></a></span>
                    </td>

                  </tr>
                  <?php

                  $query1_ff = "SELECT * FROM user_files where `type`='docx' and user_id='$page_user_id1'";
                  $statement1_ff = $connect->prepare($query1_ff);
                  $statement1_ff->execute();
                  if ($statement1_ff->rowCount() > 0) {
                    $result1_ff = $statement1_ff->fetchAll();
                    // $sn = 1;
                    foreach ($result1_ff as $row_pdf1) {
                      $filename = "";
                      $pdf_name=$row_pdf1['filename'];
                      $extension=pathinfo($pdf_name, PATHINFO_FILENAME);
                      $id = $row_pdf1['id']; ?>
                      <tr>
                        <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages2[]" class="get_page_checks2" value="<?php echo $row_pdf1['id'] ?>"></td>

                        <td><?php echo $row_pdf1['filename'] ?>
                        </td>
                        <td>

                          <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row_pdf1['filename']; ?>" target="_blank">View</a>

                        </td>
                        <td>
                          <a class="btn btn-soft-success btn-xs" id="<?php echo $row_pdf1['id']; ?>" onclick="document.getElementById('pdf_loc_edit_id').value='<?php echo $row_pdf1['id'] ?>';
                                                             document.getElementById('fullname').value='<?php echo $row_pdf1['filename'] ?>';
                                                             document.getElementById('editname').value='<?php echo $extension ?>';" value="<?php echo $row_pdf1['filename']; ?>" class="editPdfFile" data-bs-target="#editPdfFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
                          <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/delet_file.php?userid=<?php echo $id ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

                        </td>
                      </tr>
          <?php
                    }
                  }
                }
              }
            }
          }
          ?>

        </table>