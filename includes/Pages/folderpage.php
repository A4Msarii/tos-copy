<div class="container">
  <div class="row-12">
    <h1>Folder</h1>
    <a class="btn btn-soft-secondary previous-button text-dark" style="text-decoration:none; float: left;"><i class="bi bi-arrow-left"></i></a>
    <a class="btn btn-soft-secondary next-button text-dark" style="text-decoration:none; float:right;"><i class="bi bi-arrow-right"></i></a>
    <br><br>
    <center>
      <form class="insert-folder" id="folder_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_folder.php" style="width:700px;">
        <div class="input-field">
          <table class="table table-bordered" id="table-field-folder">
            <tr>
              <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
              <td style="text-align: center;"><input type="text" placeholder="Enter Folder" name="folder[]" id="folderval" class="form-control" value="" required /> </td>
              <td style="width:20px;"><button type="button" name="add_folder" id="add_folder" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
            </tr>
          </table>
        </div>
        <center>
          <button style="margin:5px;" class="btn btn-success" type="submit" id="folder_submit" name="savesfolder">Submit</button>
        </center>
      </form>
    </center>

  </div>
  <hr>
  <div class="row">
    <p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">Pages Table <input type="checkbox" class="folder_checks" id="folder_table">
      <i class="bi bi-trash-fill text-danger delte_folder" onclick="alert('are you sure to delete pages..')"></i>
    </p>
    <table class="table table-bordered table-hover" id="foldertable">
      <input style="margin-bottom: 10px;" class="form-control" type="text" id="foldersearch" onkeyup="folder()" placeholder="Search for Folder.." title="Type in a name"><br>
      <thead class="bg-dark">
        <th class="text-white">Sr No</th>
        <th class="text-white">Folder</th>
        <th class="text-white">Files & Briefcase</th>
        <th class="text-white">Action</th>
      </thead>
      <?php
      // $output ="";
      $query1_bb = "SELECT * FROM folders";
      $statement1_bb = $connect->prepare($query1_bb);
      $statement1_bb->execute();
      if ($statement1_bb->rowCount() > 0) {
        $result1_bb = $statement1_bb->fetchAll();
        $sn = 1;
        foreach ($result1_bb as $row) {
          $id = $row['id']; ?>
          <tr>
            <td style="width:50px;"><input type="checkbox" name="delete_multiple_folder[]" class="get_folder_checks" value="<?php echo $row['id'] ?>"></td>
            <td><a style="color:black; text-decoration:underline;" onclick="document.getElementById('fol_id').value='<?php echo $row['id'] ?>';" type="button" data-bs-toggle="modal" data-bs-target="#selectbriefcase"><?php echo $row['folder'] ?></a></td>
            <td>
              <?php

              $breifcase_fetch1 = "SELECT * FROM user_briefcase";
              $stbreifcase_fetch21 = $connect->prepare($breifcase_fetch1);
              $stbreifcase_fetch21->execute();

              if ($stbreifcase_fetch21->rowCount() > 0) {
                $rebreifcase_fetch21 = $stbreifcase_fetch21->fetchAll();
                foreach ($rebreifcase_fetch21 as $rowbreifcase_fetch21) {
                  $us_id2 = $rowbreifcase_fetch21['user_id'];
                  $breif_id1 = $rowbreifcase_fetch21['id'];
                  $sql101 = "SELECT count(*) FROM `user_files` WHERE briefId = ? and folderId='$id'";
                  $result1101 = $connect->prepare($sql101);
                  $result1101->execute([$breif_id1]);
                  $number_of_rows1001 = $result1101->fetchColumn();
                  $sql102 = "SELECT count(*) FROM `editor_data` WHERE briefId = ? and folderId='$id'";
                  $result1102 = $connect->prepare($sql102);
                  $result1102->execute([$breif_id1]);
                  $number_of_rows1002 = $result1102->fetchColumn();
                  $to = $number_of_rows1001 + $number_of_rows1002;
                  $user2_name_files12 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                  $user2_name_files12->execute([$us_id2]);
                  $name1232 = $user2_name_files12->fetchColumn();
                  if ($to > 0) {

              ?>
                    <details>
                      <summary>
                        <ul style="display:inline-block;list-style-type:none;" id="ulsearchlist" class="em">
                          <li style="text-decoration:none; display:inline-block;">
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                            <span class="varun" style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px; margin-right:5px; border-radius:10px;"><?php echo  $rowbreifcase_fetch21['briefcase_name']; ?>

                            </span>
                            <?php
                            if ($rowbreifcase_fetch21['role'] == 'super admin') {
                              $bgColor = '#c32e2e';
                            } elseif ($rowbreifcase_fetch21['role'] == 'student') {
                              $bgColor = 'green';
                            } else {
                              $bgColor = '#c3b02e';
                            }
                            ?>
                            <span style="color:white; background-color: <?php echo $bgColor; ?>; padding: 5px; font-size:large; font-weight:bolder; font-style:oblique; border-radius: 40px;"><?php echo  $name1232; ?></span>
                            <a style="margin-left: 5px; float: unset;" href="<?php echo BASE_URL ?>includes/Pages/deleteBrief.php?folderBrief=<?php echo $row['id'] ?>&briefId=<?php echo  $rowbreifcase_fetch21['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                          </li>
                        </ul>
                      </summary>
                      <?php
                      $file_fetch2 = "SELECT * FROM user_files where briefId='$breif_id1' and folderId='$id'";
                      $file_fetch_st2 = $connect->prepare($file_fetch2);
                      $file_fetch_st2->execute();
                      if ($file_fetch_st2->rowCount() > 0) {
                        $result_file2 = $file_fetch_st2->fetchAll();

                        foreach ($result_file2 as $row_file2) {
                          $filesname5 = "";
                          $filesname5 = ($row_file2['type'] == "online" || $row_file2['type'] == "offline") ? $row_file2['lastName'] : $row_file2['filename'];
                      ?>
                          <ul style="margin-left:40px" class="ayushi">
                            <li style="list-style-type:none; display:inline-block;">
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <?php echo '<span id="arun" style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file2['filename'] . '"> ' . $filesname5 . '</span>'; ?>
                              <a style="margin-left: 5px;" href="<?php echo BASE_URL ?>includes/Pages/deleteBrief.php?folderBriefFile=<?php echo $row_file2['id'] ?>&folderFileId=<?php echo $row['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                            </li>
                          </ul>
                      <?php }
                      }
                      ?>
                      <?php
                      $file_fetch12 = "SELECT * FROM editor_data where briefId='$breif_id1' and folderId='$id'";
                      $file_fetch_st12 = $connect->prepare($file_fetch12);
                      $file_fetch_st12->execute();
                      if ($file_fetch_st12->rowCount() > 0) {
                        $result_file12 = $file_fetch_st12->fetchAll();
                        foreach ($result_file12 as $row_file12) {
                      ?>
                          <ul style="margin-left:40px" class="varun">
                            <li style="list-style-type:none; display:inline-block;">
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file12['pageName'] . '"> ' . $row_file12['pageName'] . '</span>'; ?>
                              <a style="margin-left: 5px;" href="<?php echo BASE_URL ?>includes/Pages/deleteBrief.php?folderBriefPage=<?php echo $row_file2['id'] ?>&folderPageId=<?php echo $row['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                            </li>
                          </ul>
                      <?php }
                      }
                      ?>
                    </details>
                  <?php
                  }
                  $sql1 = "SELECT count(*) FROM `user_files` WHERE briefId = ?";
                  $result10 = $connect->prepare($sql1);
                  $result10->execute([$breif_id1]);
                  $number_of_rows10 = $result10->fetchColumn();
                  $sql10 = "SELECT count(*) FROM `editor_data` WHERE briefId = ?";
                  $result110 = $connect->prepare($sql10);
                  $result110->execute([$breif_id1]);
                  $number_of_rows100 = $result110->fetchColumn();
                  $total_c1 = $number_of_rows10 + $number_of_rows100;
                  $foder_ides = $rowbreifcase_fetch21['folderId'];
                  if ($total_c1 == 0 && $foder_ides == $id) {
                  ?>

                    <ul style="display:inline-block;list-style-type:none; margin-left: 5px;width:100%" id="ulsearchlist">
                      <li style="text-decoration:none; display:inline-block;" class="ayushi1">
                        <img style="height:20px; width:20px; margin-left: 30px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                        <?php echo '<span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px; border-radius:10px;">' . $rowbreifcase_fetch21['briefcase_name'] . ' - ' . $name1232 . '</span>'; ?>
                        <span style="font-size:large; font-weight:bolder; color:white; background-color:#c32e2e; padding:5px; border-radius:40px;"><?php echo $name1232; ?></span>
                        <a style="margin-left: 5px;" href="<?php echo BASE_URL ?>includes/Pages/deleteBrief4.php?briefId=<?php echo $breif_id1; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                      </li>
                    </ul>
              <?php
                  }
                }
              } ?>
              <?php
              $allitem1_a1 = "SELECT * FROM user_files where briefId='0' and folderId='$id'";
              $statement1_a1 = $connect->prepare($allitem1_a1);
              $statement1_a1->execute();
              if ($statement1_a1->rowCount() > 0) {
                $result1_a1 = $statement1_a1->fetchAll();

                foreach ($result1_a1 as $row11) {
                  $us_id11 = $row11['user_id'];
                  $filesname6 = "";
                  $filesname6 = ($row11['type'] == "online" || $row11['type'] == "offline") ? $row11['lastName'] : $row11['filename'];
                  $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                  $user_names1->execute([$us_id11]);
                  $name12301 = $user_names1->fetchColumn();
              ?>
                  <ul style="margin-left:15px;" class="archana">

                    <li style="list-style-type:none; display:inline-block ;">
                      <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                      <?php
                      if ($row11['role'] == 'super admin') {
                        $bgColor = '#c32e2e';
                      } elseif ($row11['role'] == 'student') {
                        $bgColor = 'green';
                      } else {
                        $bgColor = '#c3b02e';
                      }
                      ?>
                      <span style="color:#7800c0;" title="<?php echo $row11['filename'] ?>">
                        <?php echo $filesname6; ?></span> -
                      <span style="font-size:bold; color:<?php echo $bgColor; ?>;"><?php echo $name12301; ?></span>
                      <a style="margin-left: 5px;" href="<?php echo BASE_URL ?>includes/Pages/deleteBrief1.php?folId=<?php echo $row11['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                    </li>

                  </ul>
              <?php
                }
              }
              ?>
              <?php
              $allitem11_a1 = "SELECT * FROM editor_data where briefId='0' and folderId='$id'";
              $statement11_a1 = $connect->prepare($allitem11_a1);
              $statement11_a1->execute();
              if ($statement11_a1->rowCount() > 0) {
                $result11_a1 = $statement11_a1->fetchAll();

                foreach ($result11_a1 as $row110) {
                  $us_id110 = $row110['userId'];
                  $user_names10 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                  $user_names10->execute([$us_id110]);
                  $name123010 = $user_names10->fetchColumn();
              ?>
                  <ul style="margin-left:15px;" class="var">

                    <li style="list-style-type:none; display:inline-block ;"><img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                      <?php
                      if ($row110['userRole'] == 'super admin') {
                        $bgColor = '#c32e2e';
                      } elseif ($row110['userRole'] == 'student') {
                        $bgColor = 'green';
                      } else {
                        $bgColor = '#c3b02e';
                      }
                      ?>
                      <span style="color:#7800c0;">
                        <?php echo $row110['pageName']; ?></span> -
                      <span style="color:<?php echo $bgColor; ?>;"><?php echo  $name123010; ?></span>
                      <a href="<?php echo BASE_URL ?>includes/Pages/deleteBrief2.php?folderBrief=<?php echo $row110['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                    </li>

                  </ul>
              <?php
                }
              }
              ?>
            </td>
            <td><a class="btn btn-soft-success btn-xs" href="" style="margin: 10px;" onclick="document.getElementById('folder_id').value='<?php echo $id = $row['id'] ?>';
                                                                           document.getElementById('folder').value='<?php echo $row['folder'] ?>';" data-bs-toggle="modal" data-bs-target="#editfolder"><i class="bi bi-pen-fill"></i>
              </a>
              <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL ?>includes/Pages/folder_delete.php?folderId=<?php echo $id ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

            </td>
          </tr>
        <?php
        }
      } else { ?>
        <tr>
          <td colspan='5' style="text-align:center">
            No data
          </td>
        </tr>
      <?php }
      ?>
    </table>

  </div>
</div>


<div class="modal fade" id="selectbriefcase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Briefcase And Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/add_folder_brief.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <input type="hidden" id="fol_id" name="fol_id">
          <table class="table table-bordered src-table1" id="folder_table_briefcase">
            <input class="form-control" type="text" id="searchfolder" onkeyup="folder_Search()" placeholder="Search for Briefcase.." title="Type in a name"><br>

            <tbody>
              <?php

              $breifcase_fetch = "SELECT * FROM user_briefcase";
              $stbreifcase_fetch2 = $connect->prepare($breifcase_fetch);
              $stbreifcase_fetch2->execute();

              if ($stbreifcase_fetch2->rowCount() > 0) {
                $rebreifcase_fetch2 = $stbreifcase_fetch2->fetchAll();
                foreach ($rebreifcase_fetch2 as $rowbreifcase_fetch2) {
                  $breif_id = $rowbreifcase_fetch2['id'];
                  $sql = "SELECT count(*) FROM `user_files` WHERE briefId = ? and folderId='0'";
                  $result = $connect->prepare($sql);
                  $result->execute([$breif_id]);
                  $number_of_rows = $result->fetchColumn();
                  $sql1 = "SELECT count(*) FROM `editor_data` WHERE briefId = ? and folderId='0'";
                  $result1 = $connect->prepare($sql1);
                  $result1->execute([$breif_id]);
                  $number_of_rows1 = $result1->fetchColumn();
                  $total_c = $number_of_rows + $number_of_rows1;
                  $us_id = $rowbreifcase_fetch2['user_id'];
                  $user_name_files12 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                  $user_name_files12->execute([$us_id]);
                  $name123 = $user_name_files12->fetchColumn();
                  if ($total_c > 0) {

              ?>
                    <details style="text-align: initial;width:100%;margin-top:53px !important;" class="mt-4">
                      <summary>
                        <ul style="display:inline-block;list-style-type:none;" id="ulsearchlist" class="ayu1">
                          <li style="text-decoration:none; display:inline-block;">
                            <input type="checkbox" class="parent_checkbox" name="main_breif[]" data-created="<?php echo $rowbreifcase_fetch2['id'] ?>" value="<?php echo $rowbreifcase_fetch2['id'] ?>" />
                            <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                            <?php echo '<span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px; border-radius:10px;">' . $rowbreifcase_fetch2['briefcase_name'] . ' - ' . $name123 . '</span>'; ?>
                          </li>
                        </ul>
                      </summary>
                      <?php
                      $file_fetch = "SELECT * FROM user_files where briefId='$breif_id' and folderId='0'";
                      $file_fetch_st = $connect->prepare($file_fetch);
                      $file_fetch_st->execute();
                      if ($file_fetch_st->rowCount() > 0) {
                        $result_file = $file_fetch_st->fetchAll();

                        foreach ($result_file as $row_file) {
                          $filesname3 = "";
                          if ($row_file['type'] == "online" || $row_file['type'] == "offline") {
                            $filesname3 = $row_file['lastName'];
                          } else {
                            $filesname3 = $row_file['filename'];
                          }
                      ?>
                          <ul style="margin-left:40px" class="ayu2">
                            <li style="list-style-type:none;">
                              <input type="checkbox" class="checkbox<?php echo $rowbreifcase_fetch2['id'] ?>" id="<?php echo $rowbreifcase_fetch2['id'] ?>" onclick="javascript:testId(this.id)" name="foid[]" value="<?php echo $row_file['id'] ?>" />
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file['filename'] . '"> ' . $filesname3 . '</span>'; ?>
                            </li>
                          </ul>
                      <?php }
                      }
                      ?>
                      <?php
                      $file_fetch1 = "SELECT * FROM editor_data where briefId='$breif_id' and folderId='0'";
                      $file_fetch_st1 = $connect->prepare($file_fetch1);
                      $file_fetch_st1->execute();
                      if ($file_fetch_st1->rowCount() > 0) {
                        $result_file1 = $file_fetch_st1->fetchAll();
                        foreach ($result_file1 as $row_file1) {
                      ?>
                          <ul style="margin-left:40px" class="ayu3">
                            <li style="list-style-type:none; display:inline-block;">
                              <input type="checkbox" class="checkbox<?php echo $rowbreifcase_fetch2['id'] ?>" id="<?php echo $rowbreifcase_fetch2['id'] ?>" onclick="javascript:testId(this.id)" name="foid1[]" value="<?php echo $row_file1['id'] ?>" />
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file1['pageName'] . '"> ' . $row_file1['pageName'] . '</span>'; ?>
                            </li>
                          </ul>
                      <?php }
                      }
                      ?>
                    </details>
                  <?php
                  }
                  $sql1 = "SELECT count(*) FROM `user_files` WHERE briefId = ?";
                  $result10 = $connect->prepare($sql1);
                  $result10->execute([$breif_id]);
                  $number_of_rows10 = $result10->fetchColumn();
                  $sql10 = "SELECT count(*) FROM `editor_data` WHERE briefId = ?";
                  $result110 = $connect->prepare($sql10);
                  $result110->execute([$breif_id]);
                  $number_of_rows100 = $result110->fetchColumn();
                  $total_c1 = $number_of_rows10 + $number_of_rows100;
                  $foder_ides = $rowbreifcase_fetch2['folderId'];
                  if ($total_c1 == 0 && $foder_ides == 0) {
                  ?>
                    <br>
                    <ul style="list-style-type:none; margin-right: 853px;width:100%" id="ulsearchlist" class="ayu4">

                      <li style="text-decoration:none; list-style-type: none; float:left;margin-left:-20px">
                        <input style="margin-left:15px;" type="checkbox" name="breifcase1[]" value="<?php echo $rowbreifcase_fetch2['id'] ?>" />
                        <img style="height:20px; width:20px; margin-left: 30px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                        <?php echo '<span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px;">' . $rowbreifcase_fetch2['briefcase_name'] . ' - ' . $name123 . '</span>'; ?>
                      </li>


                    </ul>
              <?php
                  }
                }
              }
              ?>
              <?php
              $allitem1_a = "SELECT * FROM user_files where briefId='0' and folderId='0'";
              $statement1_a = $connect->prepare($allitem1_a);
              $statement1_a->execute();
              if ($statement1_a->rowCount() > 0) {
                $result1_a = $statement1_a->fetchAll();
                $sn = 1;
                foreach ($result1_a as $row1) {
                  $us_id1 = $row1['user_id'];
                  $filesname4 = "";
                  if ($row1['type'] == "online" || $row1['type'] == "offline") {
                    $filesname4 = $row1['lastName'];
                  } else {
                    $filesname4 = $row1['filename'];
                  }
                  $user_names = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                  $user_names->execute([$us_id1]);
                  $name1230 = $user_names->fetchColumn();
              ?>
                  <ul style="margin-left:40px" class="ayu5">
                    <tr>
                      <td>
                        <li style="list-style-type:none; display:inline-block ;"><input type="checkbox" name="foid[]" value="<?php echo $row1['id'] ?>" />
                          <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                          <span style="color:#c299ff;" title="<?php echo $row1['filename'] ?>">
                            <?php echo $filesname4 . ' - ' . $name1230; ?></span>
                        </li>
                      </td>
                    </tr>
                  </ul>
              <?php
                }
              }
              ?>
              <?php
              $allitem1_a1 = "SELECT * FROM editor_data where briefId='0' and folderId='0'";
              $statement1_a1 = $connect->prepare($allitem1_a1);
              $statement1_a1->execute();
              if ($statement1_a1->rowCount() > 0) {
                $result1_a1 = $statement1_a1->fetchAll();

                foreach ($result1_a1 as $row11) {
                  $us_id11 = $row11['userId'];
                  $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                  $user_names1->execute([$us_id11]);
                  $name12301 = $user_names1->fetchColumn();
              ?>
                  <ul style="margin-left:40px" class="ayu6">
                    <tr>
                      <td>
                        <li style="list-style-type:none; display:inline-block ;"><input type="checkbox" name="foid1[]" value="<?php echo $row11['id'] ?>" />
                          <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                          <span style="color:#c299ff;">
                            <?php echo $row11['pageName'] . ' - ' . $name12301; ?></span>
                        </li>
                      </td>
                    </tr>
                  </ul>
              <?php
                }
              }
              ?>
            </tbody>

          </table>
          <hr>
          <input type="submit" class="btn btn-success" value="Add" style="float:right;">
      </div>
      </form>
    </div>
  </div>
</div>


<!--Edit folder modal-->
<div class="modal fade" id="editfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Folder</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_folder.php">
          <input type="hidden" class="form-control" name="id" value="" id="folder_id" readonly>
          <input type="" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <label style="color:black; font-weight:bold; margin:5px;">Folder</label>
          <input type="text" class="form-control" name="folder" value="" id="folder">
          <br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function folder_Search() {
    // Get input value and convert to lowercase
    var input = document.getElementById("searchfolder");
    var filter = input.value.toLowerCase();

    // Get all lists (ul elements)
    var lists = document.getElementsByTagName("ul");

    // Loop through each list
    for (var i = 0; i < lists.length; i++) {
      var list = lists[i];

      // Get all list items (li elements) within the current list
      var items = list.getElementsByTagName("li");

      // Loop through each list item
      for (var j = 0; j < items.length; j++) {
        var item = items[j];

        // Get item text and convert to lowercase
        var text = item.textContent || item.innerText;
        text = text.toLowerCase();

        // If the item text contains the filter text, show it, otherwise hide it
        if (text.indexOf(filter) > -1) {
          item.style.display = "";
        } else {
          item.style.display = "none";
        }
      }
    }
  }
</script>

<script>
  function folder() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("foldersearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("foldertable");
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
                          <td style="text-align: center;"><input type="text" placeholder="Enter Folder" name="folder[]" id="foldersval" class="form-control" value="" required/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_folder" id="remove_folder" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                        </tr>'
    var max = 100;
    var a = 1;

    $("#add_folder").click(function() {
      if (a <= max) {
        $("#table-field-folder").append(html);
        a++;
      }
    });
    $("#table-field-folder").on('click', '#remove_folder', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
  $(document).on("click", ".parent_checkbox", function() {
    var class1 = $(this).data("created");
    var checkboxes = document.getElementsByClassName('checkbox' + class1);
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
      // $("."+class1).prop("checked", true);
    }

  });
</script>