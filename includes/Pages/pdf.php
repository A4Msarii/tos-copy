<p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">PDF Table
          <input type="checkbox" class="page_checks1" id="pages_table1">
          <i class="bi bi-trash-fill text-danger delte_pages1" onclick="alert('are you sure to delete pages..')"></i>
        </p>
        <table class="table table-bordered table-hover" id="file_pdf">
          <input style="margin:5px;" class="form-control" type="text" id="search_pdf" onkeyup="pdf()" placeholder="Search for pdf.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-white">Sr No</th>
            <!-- <th class="text-white">File Names</th> -->
            <th class="text-white">Uploaded Files</th>
            <th class="text-white">View</th>
            <th class="text-white">Action</th>
          </thead>
          <?php
          // $output ="";
          $query2_fm21 = "SELECT * FROM users where `role`='super admin'";
          $statement2_fm21 = $connect->prepare($query2_fm21);
          $statement2_fm21->execute();
          $result2_fm21 = $statement2_fm21->fetchAll();
          foreach ($result2_fm21 as $row391) {
            $admin_ides1 = $row391['id'];
            $query1_ff = "SELECT * FROM user_files where user_id='$admin_ides1' and type='pdf'";
            $statement1_ff = $connect->prepare($query1_ff);
            $statement1_ff->execute();
            if ($statement1_ff->rowCount() > 0) {
              $result1_ff = $statement1_ff->fetchAll();
              $sn = 1;
              foreach ($result1_ff as $row_pdf) {
                $filename = "";
                $id = $row_pdf['id'];
                $pdf_name=$row_pdf['filename'];
                $extension=pathinfo($pdf_name, PATHINFO_FILENAME);
                ?>
                <tr>
                  <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages1[]" class="get_page_checks1" value="<?php echo $row_pdf['id'] ?>"></td>

                  <td>
                    <?php echo $row_pdf['filename'] ?>
                  </td>
                  <td>

                    <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row_pdf['filename']; ?>" target="_blank">View</a>

                  </td>
                  <td>
                     <a class="btn btn-soft-success btn-xs" id="<?php echo $row_pdf['id']; ?>" onclick="document.getElementById('pdf_loc_edit_id').value='<?php echo $row_pdf['id'] ?>';
                                                             document.getElementById('fullname').value='<?php echo $row_pdf['filename'] ?>';
                                                             document.getElementById('editname').value='<?php echo $extension ?>';" value="<?php echo $row_pdf['filename']; ?>" class="editFile" data-bs-target="#editPdfFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
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
          $query1_fm2 = "SELECT * FROM user_files where type='pdf' group by user_id";
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
                  <tr></tr>
                  <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center;">
                    <td colspan="4"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size:large; font-style: oblique;"><?php echo $name1 ?> PDF </span>
                        <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete <?php echo $name5 ?> all PDF Files" style="font-weight:bold; color:red; font-size:large;" href="<?php echo BASE_URL; ?>includes/Pages/delete_usernewfile.php?deleteId=<?php echo $page_user_id1; ?>&type=pdf"><i class="bi bi-trash-fill"></i></a></span>
                    </td>

                  </tr>
                  <?php

                  $query1_ff = "SELECT * FROM user_files where `type`='pdf' and user_id='$page_user_id1'";
                  $statement1_ff = $connect->prepare($query1_ff);
                  $statement1_ff->execute();
                  if ($statement1_ff->rowCount() > 0) {
                    $result1_ff = $statement1_ff->fetchAll();
                    // $sn = 1;
                    foreach ($result1_ff as $row_pdf1) {
                      $filename = "";
                      $id = $row_pdf1['id'];
                      $pdf_name=$row_pdf1['filename'];
                      $extension=pathinfo($pdf_name, PATHINFO_FILENAME); ?>
                      <tr>
                        <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages1[]" class="get_page_checks1" value="<?php echo $row_pdf1['id'] ?>"></td>

                        <td><?php echo $row_pdf1['filename'] ?>
                        </td>
                        <td>

                          <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row_pdf['filename']; ?>" target="_blank">View</a>

                        </td>
                        <td>
                          <a class="btn btn-soft-success btn-xs" id="<?php echo $row_pdf1['id']; ?>" onclick="document.getElementById('pdf_loc_edit_id').value='<?php echo $row_pdf1['id'] ?>';
                                                             document.getElementById('fullname').value='<?php echo $row_pdf1['filename'] ?>';
                                                             document.getElementById('editname').value='<?php echo $extension ?>';" value="<?php echo $row_pdf1['filename']; ?>" class="userEditFile" data-bs-target="#editPdfFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
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