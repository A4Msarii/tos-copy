<div class="container">
  <div class="row-12">
    <h1>Shop</h1>
    <a class="btn btn-soft-secondary previous-button" style="text-decoration:none; float:left;"><i class="bi bi-arrow-left"></i></a>
    <!-- <a class="btn btn-soft-secondary next-button" style="text-decoration:none;"><i class="bi bi-arrow-right"></i></a> -->

    <br><br>
    <center>
      <form class="insert-file" id="file_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_shops.php" enctype="multipart/form-data" style="width:700px;">
        <div class="input-field">
          <table class="table table-bordered" id="table-field-shop">
            <tr>
              <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
              <td style="text-align: center;"><input type="file" placeholder="Enter Name" name="file[]" accept="image/*" id="val" class="form-control" value="" /> </td>
              <td style="text-align: center;"><input type="text" placeholder="Enter Shop" name="shop[]" class="form-control" value="" required /> </td>
              <td style="width:20px;"><button type="button" name="add_shop" id="add_shop" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
            </tr>
          </table>
        </div>
        <center>
          <button style="margin:5px;" class="btn btn-success" type="submit" id="shop_submit" name="saveshop">Submit</button>
        </center>
      </form>
    </center>

  </div>
  <hr>
  <div class="row">
    <p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">Pages Table <input type="checkbox" class="shop_checks" id="shop_table">
      <i class="bi bi-trash-fill text-danger delte_shop" onclick="alert('are you sure to delete pages..')"></i>
    </p>
    <table class="table table-bordered table-hover" id="shops">
      <input style="margin:5px;" class="form-control" type="text" id="shopsearch" onkeyup="shop()" placeholder="Search for Shops.." title="Type in a name">
      <thead class="bg-dark">
        <th class="text-white">Sr No</th>
        <th class="text-white">Image</th>
        <th class="text-white">Shop Names</th>
        <th class="text-white">Folders</th>
        <th class="text-white">Action</th>
      </thead>
      <?php
      // $output ="";
      $query1_ff = "SELECT * FROM shops";
      $statement1_ff = $connect->prepare($query1_ff);
      $statement1_ff->execute();
      if ($statement1_ff->rowCount() > 0) {
        $result1_ff = $statement1_ff->fetchAll();
        $sn = 1;
        foreach ($result1_ff as $row) {
          $filename = "";
          $shopesid = $row['id']; ?>
          <tr>
            <td style="width:50px;"><input type="checkbox" name="delete_multiple_shop[]" class="get_shop_checks" value="<?php echo $row['id'] ?>"></td>
            <td>
              <?php
              $image_shop = $row['image'];

              if ($image_shop != "") {


                                            $pic111 = BASE_URL . 'includes/Pages/shops/' . $image_shop;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic111)) {
                                                $pic111 = BASE_URL . 'includes/Pages/shops/' . $image_shop;
                                            } else {
                                                $pic111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        }

              ?>
              <div class="avatar avatar-sm avatar-circle">
                <img class="avatar-img" src="<?php echo $pic111; ?>" alt="Image Description">
              </div>
            </td>
            <td>
              <a style="text-decoration:underline;" onclick="document.getElementById('shid').value='<?php echo $row['id'] ?>';" type="button" data-bs-toggle="modal" data-bs-target="#selectfolderShop"><?php echo $row['shops'] ?></a>
            </td>
            <td>
              <?php
              $allitem1_b1 = "SELECT * FROM folders";
              $statement1_b1 = $connect->prepare($allitem1_b1);
              $statement1_b1->execute();

              if ($statement1_b1->rowCount() > 0) {
                $result1_b1 = $statement1_b1->fetchAll();
                foreach ($result1_b1 as $row1) {
                  $f_to1 = 0;
                  $fo_id = $row1['id'];
                  $sql_fo = "SELECT count(*) FROM `user_files` WHERE folderId=? and shopid='$shopesid'";
                  $result1_fo = $connect->prepare($sql_fo);
                  $result1_fo->execute([$fo_id]);
                  $number_of_rows_fo = $result1_fo->fetchColumn();
                  $sql_fo1 = "SELECT count(*) FROM `editor_data` WHERE folderId=? and shopid='$shopesid'";
                  $result1_fo1 = $connect->prepare($sql_fo1);
                  $result1_fo1->execute([$fo_id]);
                  $number_of_rows_fo1 = $result1_fo1->fetchColumn();
                  // $sql_fo2 = "SELECT count(*) FROM `user_briefcase` WHERE folderId=? and shopid='$shopesid'";
                  // $result1_fo2 = $connect->prepare($sql_fo2);
                  // $result1_fo2->execute([$fo_id]);
                  // $number_of_rows_fo2 = $result1_fo2->fetchColumn();

                  $f_to1 = $number_of_rows_fo + $number_of_rows_fo1;

                  if ($f_to1 > 0) {
              ?>
                    <details>
                      <summary>
                        <ul style="display:inline-block; list-style-type:none;">
                          <li style="text-decoration:none; display:inline-block ;">
                            <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/folder.png">
                            <span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px; border-radius:10px;">

                              <?php echo  $item_id1_a = $row1['folder'];

                              ?>
                            </span>
                            <a id="shakti" href="<?php echo BASE_URL ?>includes/Pages/deleteBrief.php?shopId=<?php echo $shopesid; ?>&shopFolderId=<?php echo $row1['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                          </li>
                        </ul>
                      </summary>
                      <?php

                      $breifcase_fetch1 = "SELECT * FROM user_briefcase";
                      $stbreifcase_fetch21 = $connect->prepare($breifcase_fetch1);
                      $stbreifcase_fetch21->execute();

                      if ($stbreifcase_fetch21->rowCount() > 0) {
                        $rebreifcase_fetch21 = $stbreifcase_fetch21->fetchAll();
                        foreach ($rebreifcase_fetch21 as $rowbreifcase_fetch21) {
                          $us_id2 = $rowbreifcase_fetch21['user_id'];
                          $breif_id1 = $rowbreifcase_fetch21['id'];
                          $fo_ides1 = $rowbreifcase_fetch21['folderId'];
                          $shop_id = $rowbreifcase_fetch21['shopid'];
                          $sql101 = "SELECT count(*) FROM `user_files` WHERE briefId = ? and folderId='$fo_id' and shopid='$shopesid'";
                          $result1101 = $connect->prepare($sql101);
                          $result1101->execute([$breif_id1]);
                          $number_of_rows1001 = $result1101->fetchColumn();
                          $sql102 = "SELECT count(*) FROM `editor_data` WHERE briefId = ? and folderId='$fo_id' and shopid='$shopesid'";
                          $result1102 = $connect->prepare($sql102);
                          $result1102->execute([$breif_id1]);
                          $number_of_rows1002 = $result1102->fetchColumn();
                          $to11 = $number_of_rows1001 + $number_of_rows1002;
                          $user2_name_files12 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                          $user2_name_files12->execute([$us_id2]);
                          $name1232 = $user2_name_files12->fetchColumn();
                          if ($to11 > 0) { ?>
                            <details style="margin-left:30px;">
                              <summary>
                                <ul style="display:inline-block; list-style-type:none;">

                                  <li style="list-style-type:none; display:inline-block ;">
                                    <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                    <span id="tarun" style="font-size:15px; font-weight:bolder; color:#7800c0; padding:5px; text-decoration-line: underline;"><?php echo $rowbreifcase_fetch21['briefcase_name'] . ' - ' . $name1232;

                                                                                                                                                              ?>
                                    </span>
                                    <a href="<?php echo BASE_URL ?>includes/Pages/deleteBrief.php?shopBrief=<?php echo $shopesid; ?>&briefId=<?php echo $rowbreifcase_fetch21['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                  </li>
                                </ul>
                              </summary>
                              <?php
                              $file_fetch2 = "SELECT * FROM user_files where briefId='$breif_id1' and folderId='$fo_id' and shopid='$shopesid'";
                              $file_fetch_st2 = $connect->prepare($file_fetch2);
                              $file_fetch_st2->execute();
                              if ($file_fetch_st2->rowCount() > 0) {
                                $result_file2 = $file_fetch_st2->fetchAll();

                                foreach ($result_file2 as $row_file2) {
                                  $filesname9 = "";
                                  $filesname9 = ($row_file2['type'] == "online" || $row_file2['type'] == "offline") ? $row_file2['lastName'] : $row_file2['filename'];
                              ?>
                                  <ul style="left-margin:150px">
                                    <li style="list-style-type:none; display:inline-block;">
                                      <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                      <?php echo '<span style="color:#9540e4;" title="' . $row_file2['filename'] . '">' . $filesname9 . '</span>'; ?>
                                      <a href="<?php echo BASE_URL ?>includes/Pages/deleteBrief.php?shopFile=<?php echo $shopesid; ?>&fileId=<?php echo $row_file2['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                    </li>
                                  </ul>
                              <?php }
                              }
                              ?>
                              <?php
                              $file_fetch12 = "SELECT * FROM editor_data where briefId='$breif_id1' and folderId='$fo_id' and shopid='$shopesid'";
                              $file_fetch_st12 = $connect->prepare($file_fetch12);
                              $file_fetch_st12->execute();
                              if ($file_fetch_st12->rowCount() > 0) {
                                $result_file12 = $file_fetch_st12->fetchAll();
                                foreach ($result_file12 as $row_file12) {
                              ?>
                                  <ul style="left-margin:150px">
                                    <li style="list-style-type:none; display:inline-block;">
                                      <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                      <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file12['pageName'] . '"> ' . $row_file12['pageName'] . '</span>'; ?>
                                      <a href="<?php echo BASE_URL ?>includes/Pages/deleteBrief.php?shopPage=<?php echo $shopesid; ?>&pageId=<?php echo $row_file12['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
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

                          if ($total_c1 == 0 && $fo_ides1 == $fo_id && $shop_id == $shopesid) {
                          ?>

                            <ul style="display:inline-block; list-style-type:none;margin-left:45px;">

                              <li style="list-style-type:none; display:inline-block ;">
                                <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                <span style="font-size:15px; font-weight:bolder; color:#7800c0; padding:5px; text-decoration-line: underline;"><?php echo $rowbreifcase_fetch21['briefcase_name'] . ' - ' . $name1232;

                                                                                                                                                ?>
                                </span>
                                <a id="shakti" href="<?php echo BASE_URL ?>includes/Pages/deleteBriefs4.php?briefId=<?php echo $breif_id1; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                              </li>
                            </ul>
                      <?php
                          }
                        }
                      } ?>

                      <?php
                      $allitem1_a1 = "SELECT * FROM user_files where briefId='0' and folderId='$fo_id' and shopid='$shopesid'";
                      $statement1_a1 = $connect->prepare($allitem1_a1);
                      $statement1_a1->execute();
                      if ($statement1_a1->rowCount() > 0) {
                        $result1_a1 = $statement1_a1->fetchAll();

                        foreach ($result1_a1 as $row11) {
                          $us_id11 = $row11['user_id'];
                          $filesname10 = "";
                          $filesname10 = ($row11['type'] == "online" || $row11['type'] == "offline") ? $row11['lastName'] : $row11['filename'];
                          $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                          $user_names1->execute([$us_id11]);
                          $name12301 = $user_names1->fetchColumn();
                      ?>
                          <ul>

                            <li style="list-style-type:none; display:inline-block ;">
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <span style="color:#c299ff;" title="<?php echo $row11['filename'] ?>">
                                <?php echo $filesname10 . ' - ' . $name12301; ?></span>
                              <a id="shakti" href="<?php echo BASE_URL ?>includes/Pages/deleteBriefs1.php?folId=<?php echo $row11['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                            </li>

                          </ul>
                      <?php
                        }
                      }
                      ?>
                      <?php
                      $allitem11_a1 = "SELECT * FROM editor_data where briefId='0' and folderId='$fo_id' and shopid='$shopesid'";
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
                          <ul>

                            <li style="list-style-type:none; display:inline-block ;">
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <span style="color:#c299ff;">
                                <?php echo $row110['pageName'] . ' - ' . $name123010; ?></span>
                              <a id="shakti" href="<?php echo BASE_URL ?>includes/Pages/deleteBriefs2.php?folderBrief=<?php echo $row110['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                            </li>

                          </ul>
                      <?php
                        }
                      }
                      ?>
                    </details>
              <?php
                  }
                }
              } ?>
            </td>
            <td><a class="btn btn-soft-success btn-xs" href="" style="margin: 10px;" onclick="document.getElementById('shop_id').value='<?php echo $row['id'] ?>';
                                                             document.getElementById('shop1').value='<?php echo $row['shops'] ?>';
                                                             document.getElementById('image1').value='<?php echo $row['image'] ?>';" data-bs-toggle="modal" data-bs-target="#editshop"><i class="bi bi-pen-fill"></i>
              </a>
              <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL ?>includes/Pages/delete_shop.php?id=<?php echo $shopesid ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

            </td>
          </tr>
        <?php
        }
      } else { ?>
        <tr>
          <td colspan='3' style="text-align:center">
            No data
          </td>
        </tr>
      <?php }
      ?>
    </table>
  </div>
</div>
<!-- End Tab Content -->


<div class="modal fade" id="editshop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Shop</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_file.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="id" value="" id="shop_id" readonly>
          <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <label class="form-label text-dark" style="font-weight:bold; margin:5px;">Shop :</label>
          <input type="text" class="form-control" name="shop" value="" id="shop1">
          <label class="form-label text-dark" style="font-weight:bold; margin:5px;">image :</label>
          <input type="file" class="form-control" name="newImage" id="" accept="image/*">
          <input type="hidden" class="form-control" name="oldFile" value="" id="image1" readonly />
          <br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="selectfolderShop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Folders</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo BASE_URL; ?>includes/Pages/add_folder_shop.php" method="post">
          <input type="hidden" id="shid" name="shop">
          <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <table class="table table-bordered src-table1" id="itemtablesearch" style="text-align:left;">
            <input class="form-control" type="text" id="searchshop1" onkeyup="shop_Search()" placeholder="Search for Folder.." title="Type in a name"><br>

            <tbody>
              <?php
              $allitem1_a = "SELECT * FROM folders";
              $statement1_a = $connect->prepare($allitem1_a);
              $statement1_a->execute();

              if ($statement1_a->rowCount() > 0) {
                $result1_a = $statement1_a->fetchAll();
                foreach ($result1_a as $row1) {
                  $fo_id = $row1['id'];
                  $sql_fo = "SELECT count(*) FROM `user_files` WHERE folderId=? and shopid='0'";
                  $result1_fo = $connect->prepare($sql_fo);
                  $result1_fo->execute([$fo_id]);
                  $number_of_rows_fo = $result1_fo->fetchColumn();
                  $sql_fo1 = "SELECT count(*) FROM `editor_data` WHERE folderId=? and shopid='0'";
                  $result1_fo1 = $connect->prepare($sql_fo1);
                  $result1_fo1->execute([$fo_id]);
                  $number_of_rows_fo1 = $result1_fo1->fetchColumn();
                  $sql_fo2 = "SELECT count(*) FROM `user_briefcase` WHERE folderId=? and shopid='0'";
                  $result1_fo2 = $connect->prepare($sql_fo2);
                  $result1_fo2->execute([$fo_id]);
                  $number_of_rows_fo2 = $result1_fo2->fetchColumn();
                  $f_to = $number_of_rows_fo + $number_of_rows_fo1 + $number_of_rows_fo2;
                  if ($f_to > 0) {
              ?>
                    <details style="text-align:left;">
                      <summary>
                        <ul style="display:inline-block; list-style-type:none;">
                          <li style="text-decoration:none; display:inline-block ;"> <input type="checkbox" name="add_folder[]" value="<?php echo $fo_id ?>" class="folder_check" id="fol<?php echo $row1['id']; ?>" data-created="<?php echo $row1['id']; ?>"></li>
                          <!-- <td><?php echo $sn++ ?></td> -->
                          <li style="text-decoration:none; display:inline-block ;">
                            <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/folder.png">
                            <span style="font-size:large; font-weight:bolder; color:white; background-color:#7800c0; padding:5px; border-radius:10px;">

                              <?php echo $item_id1_a = $row1['folder'];

                              ?>
                            </span>
                          </li>
                        </ul>
                      </summary>
                      <?php

                      $breifcase_fetch1 = "SELECT * FROM user_briefcase";
                      $stbreifcase_fetch21 = $connect->prepare($breifcase_fetch1);
                      $stbreifcase_fetch21->execute();

                      if ($stbreifcase_fetch21->rowCount() > 0) {
                        $rebreifcase_fetch21 = $stbreifcase_fetch21->fetchAll();
                        foreach ($rebreifcase_fetch21 as $rowbreifcase_fetch21) {
                          $us_id2 = $rowbreifcase_fetch21['user_id'];
                          $breif_id1 = $rowbreifcase_fetch21['id'];
                          $fo_ides1 = $rowbreifcase_fetch21['folderId'];
                          $shop_id = $rowbreifcase_fetch21['shopid'];
                          $sql101 = "SELECT count(*) FROM `user_files` WHERE briefId = ? and folderId='$fo_id' and shopid='0'";
                          $result1101 = $connect->prepare($sql101);
                          $result1101->execute([$breif_id1]);
                          $number_of_rows1001 = $result1101->fetchColumn();
                          $sql102 = "SELECT count(*) FROM `editor_data` WHERE briefId = ? and folderId='$fo_id' and shopid='0'";
                          $result1102 = $connect->prepare($sql102);
                          $result1102->execute([$breif_id1]);
                          $number_of_rows1002 = $result1102->fetchColumn();
                          $to = $number_of_rows1001 + $number_of_rows1002;
                          $user2_name_files12 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                          $user2_name_files12->execute([$us_id2]);
                          $name1232 = $user2_name_files12->fetchColumn();
                          if ($to > 0) { ?>
                            <details style="margin-left:30px;">
                              <summary>
                                <ul style="display:inline-block; list-style-type:none;">

                                  <li style="list-style-type:none; display:inline-block ;">
                                    <input type="checkbox" data-created="<?php echo $breif_id1 ?>" data-breif="<?php echo $breif_id1 . $row1['id'] ?>" class="breif_case<?php echo $row1['id']; ?> breifCase" data-folder="<?php echo $row1['id']; ?>" name="add_breif[]" value="<?php echo $breif_id1; ?>" />
                                    <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                    <span style="font-size:15px; font-weight:bolder; color:#7800c0; padding:5px; text-decoration-line: underline;"><?php echo $rowbreifcase_fetch21['briefcase_name'] . ' - ' . $name1232;

                                                                                                                                                    ?>
                                    </span>
                                  </li>
                                </ul>
                              </summary>
                              <?php
                              $file_fetch2 = "SELECT * FROM user_files where briefId='$breif_id1' and folderId='$fo_id' and shopid='0'";
                              $file_fetch_st2 = $connect->prepare($file_fetch2);
                              $file_fetch_st2->execute();
                              if ($file_fetch_st2->rowCount() > 0) {
                                $result_file2 = $file_fetch_st2->fetchAll();

                                foreach ($result_file2 as $row_file2) {
                                  $filesname7 = "";
                                  $filesname7 = ($row_file2['type'] == "online" || $row_file2['type'] == "offline") ? $row_file2['lastName'] : $row_file2['filename'];
                              ?>
                                  <ul style="left-margin:150px">
                                    <li style="list-style-type:none; display:inline-block;">
                                      <input style="margin-left: 30px" type="checkbox" class="files<?php echo $row1['id'] ?> filesBreif<?php echo $breif_id1 . $row1['id']; ?> getbreifId getfileclass<?php echo $breif_id1 ?>" id="<?php echo $breif_id1 ?>" data-folder="<?php echo $row1['id']; ?>" name="add_file[]" value="<?php echo $row_file2['id']; ?>" />
                                      <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                      <?php echo '<span style="color:#9540e4;" title="' . $row_file2['filename'] . '">' . $filesname7 . '</span>'; ?>
                                    </li>
                                  </ul>
                              <?php }
                              }
                              ?>
                              <?php
                              $file_fetch12 = "SELECT * FROM editor_data where briefId='$breif_id1' and folderId='$fo_id' and shopid='0'";
                              $file_fetch_st12 = $connect->prepare($file_fetch12);
                              $file_fetch_st12->execute();
                              if ($file_fetch_st12->rowCount() > 0) {
                                $result_file12 = $file_fetch_st12->fetchAll();
                                foreach ($result_file12 as $row_file12) {
                              ?>
                                  <ul style="left-margin:150px">
                                    <li style="list-style-type:none; display:inline-block;">

                                      <input style="margin-left: 30px" type="checkbox" class="files<?php echo $row1['id']; ?> filesBreif<?php echo $breif_id1 . $row1['id']; ?> getbreifId getfileclass<?php echo $breif_id1 ?>" id="<?php echo $breif_id1 ?>" data-folder="<?php echo $row1['id']; ?>" name="add_file1[]" value="<?php echo $row_file12['id']; ?>" />
                                      <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                      <?php echo '<span style="color:#9540e4; text-decoration-line:underline;" class="btn-soft" title="' . $row_file12['pageName'] . '"> ' . $row_file12['pageName'] . '</span>'; ?>
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

                          if ($total_c1 == 0 && $fo_ides1 == $fo_id && $shop_id == 0) {
                          ?>

                            <ul style="display:inline-block; list-style-type:none;margin-left:45px;">

                              <li style="list-style-type:none; display:inline-block ;">
                                <input type="checkbox" data-created="<?php echo $breif_id1 ?>" class="breif_case<?php echo $row1['id']; ?> breifCase breif_case<?php echo $breif_id1; ?>" data-folder="<?php echo $row1['id']; ?>" name="add_breif[]" value="<?php echo $breif_id1; ?>" />
                                <img style="height:20px; width:20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/briefcase.png">
                                <span style="font-size:15px; font-weight:bolder; color:#7800c0; padding:5px; text-decoration-line: underline;"><?php echo $rowbreifcase_fetch21['briefcase_name'] . ' - ' . $name1232;

                                                                                                                                                ?>
                                </span>
                              </li>
                            </ul>
                      <?php
                          }
                        }
                      } ?>

                      <?php
                      $allitem1_a1 = "SELECT * FROM user_files where briefId='0' and folderId='$fo_id' and shopid='0'";
                      $statement1_a1 = $connect->prepare($allitem1_a1);
                      $statement1_a1->execute();
                      if ($statement1_a1->rowCount() > 0) {
                        $result1_a1 = $statement1_a1->fetchAll();

                        foreach ($result1_a1 as $row11) {
                          $us_id11 = $row11['user_id'];
                          $user_names1 = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                          $user_names1->execute([$us_id11]);
                          $name12301 = $user_names1->fetchColumn();
                          $filesname8 = "";
                          $filesname8 = ($row11['type'] == "online" || $row11['type'] == "offline") ? $row11['lastName'] : $row11['filename'];
                      ?>
                          <ul>

                            <li style="list-style-type:none; display:inline-block ;">
                              <input style="margin-left: 30px" type="checkbox" class="files<?php echo $row1['id'] ?>" data-folder="<?php echo $row1['id']; ?>" name="add_file[]" value="<?php echo $row11['id']; ?>" />
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <span style="color:#c299ff;" title="<?php echo $row11['lastName'] ?>">
                                <?php echo $filesname8 . ' - ' . $name12301; ?></span>
                            </li>

                          </ul>
                      <?php
                        }
                      }
                      ?>
                      <?php
                      $allitem11_a1 = "SELECT * FROM editor_data where briefId='0' and folderId='$fo_id' and shopid='0'";
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
                          <ul>

                            <li style="list-style-type:none; display:inline-block ;">
                              <input style="margin-left: 30px" type="checkbox" class="files<?php echo $row1['id'] ?>" data-folder="<?php echo $row1['id']; ?>" name="add_file1[]" value="<?php echo $row110['id']; ?>" />
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <span style="color:#c299ff;">
                                <?php echo $row110['pageName'] . ' - ' . $name123010; ?></span>
                            </li>

                          </ul>
                      <?php
                        }
                      }
                      ?>
                    </details>
              <?php
                  }
                }
              } ?>
            </tbody>

          </table>
          <hr>
          <button style="float:right;" type="submit" class="btn btn-success" id="submit">Select</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
          <td style="text-align: center;"><input type="file" placeholder="Enter Name" name="file[]" accept="image/*" id="val" class="form-control" value=""/> </td>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Shop" name="shop[]" class="form-control" value="" required/> </td>\
                          <td style="width:20px;"><button type="button" name="remove_shop" id="remove_shop" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                        </tr>'
    var max = 100;
    var a = 1;

    $("#add_shop").click(function() {
      if (a <= max) {
        $("#table-field-shop").append(html);
        a++;
      }
    });
    $("#table-field-shop").on('click', '#remove_shop', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  function shop() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("shopsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("shops");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
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
  function shop_Search() {
    // Get input value and convert to lowercase
    var input = document.getElementById("searchshop1");
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
  $(document).on("click", ".folder_check", function() {
    var class1 = $(this).data("created");
    var checkboxes = document.getElementsByClassName('breif_case' + class1);
    var class2 = $(".files" + class1).attr("class");
    // $("." + class2).prop('checked', true);
    if ($(".files" + class1).prop('checked') == true) {
      $(".files" + class1).prop('checked', false);
    } else {
      $(".files" + class1).prop('checked', true);
    }
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }

  });

  $(".breifCase").on("click", function() {
    var class1 = $(this).data("created");
    fId = $(this).data("folder");

    var class2 = $(".filesBreif" + class1 + fId).attr("class");
    // $("." + class2).prop('checked', true);
    if ($(".filesBreif" + class1 + fId).prop('checked') == true) {
      $(".filesBreif" + class1 + fId).prop('checked', false);
    } else {
      $(".filesBreif" + class1 + fId).prop('checked', true);
    }


    $("#fol" + fId).prop('checked', true);
  });

  $(".getbreifId").on("click", function() {
    bId = $(this).attr('id');
    fId = $(this).data("folder");
    $('input[type="checkbox"][data-breif="' + bId + fId + '"]').prop('checked', true);


    $("#fol" + fId).prop('checked', true);

  });

  function testId(id) {

    // Select the checkbox with the custom attribute "data-custom-attribute" set to "my-custom-attribute"
    $('input[type="checkbox"][data-created="' + id + '"]').prop('checked', true);
    var v = $(this).attr('class');
    // console.log(v);

  }
</script>