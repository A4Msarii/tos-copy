<div class="container">

  <div class="row-12">

    <!-- Nav -->
    <ul class="nav nav-pills justify-content-center mb-7" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="adminbrief-tab" href="#adminbrief" data-bs-toggle="pill" data-bs-target="#adminbrief" role="tab" aria-controls="adminbrief" aria-selected="true">
          <div class="d-flex align-items-center">
            Admin
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="userbrief-tab" href="#userbrief" data-bs-toggle="pill" data-bs-target="#userbrief" role="tab" aria-controls="userbrief" aria-selected="false">
          <div class="d-flex align-items-center">
            User
          </div>
        </a>
      </li>
    </ul>
    <!-- End Nav -->

    <!-- Tab Content -->
    <div class="tab-content">
      <div class="tab-pane fade show active" id="adminbrief" role="tabpanel" aria-labelledby="adminbrief-tab">
        <h4>Admin Briefcase Table</h4>
        <!-- <h1>briefcase</h1> -->

        <a class="btn btn-soft-secondary previous-button" style="color:black; text-decoration:none; float: left;"><i class="bi bi-arrow-left"></i></a>
        <a class="btn btn-soft-secondary next-button" style="color:black; text-decoration:none; float: right;"><i class="bi bi-arrow-right"></i></a>
        <br><br>
        <center>
          <form class="insert-brief" id="brief_form" method="post" action="<?php echo BASE_URL; ?>includes/Pages/insert_briefcase.php" enctype="multipart/form-data" style="width:700px;">
            <div class="input-field">
              <table class="table table-bordered" id="table-field-brief2">
                <tr>
                  <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                  <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
                  <td style="text-align: center;"><input type="text" placeholder="Enter Briefcase" name="briefcase[]" id="val" class="form-control" value="" /> </td>
                  <td style="width:20px;"><button type="button" name="add_brief1" id="add_brief1" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                </tr>
              </table>
            </div>
            <center>
              <button style="margin:5px;" class="btn btn-success" type="submit" id="briefcase_submit" name="savesbrief">Submit</button>
            </center>
          </form>
        </center>
        <hr>
        <div class="row">
          <p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">Pages Table <input type="checkbox" class="brief_checks" id="pages_table">
            <i class="bi bi-trash-fill text-danger delte_brief" onclick="alert('are you sure to delete pages..')"></i>
          </p>
          <table class="table table-bordered" id="brieftable1">
            <input style="margin-bottom:10px;" class="form-control" type="text" id="briefsearch1" onkeyup="brief1()" placeholder="Search for Briefcase.." title="Type in a name"><br><br>
            <thead class="bg-dark">
              <th class="text-light">Sr No</th>
              <th class="text-light">BriefCases</th>
              <th class="text-light">Files</th>
              <th class="text-light">Action</th>
            </thead>
            <?php

            $query1_bb1 = "SELECT * FROM users where `role`='super admin'";
            $statement1_bb1 = $connect->prepare($query1_bb1);
            $statement1_bb1->execute();
            $result1_bb1 = $statement1_bb1->fetchAll();
            foreach ($result1_bb1 as $row11) {
              $ad_id = $row11['id'];

              $query1_bb = "SELECT * FROM user_briefcase where user_id='$ad_id'";
              $statement1_bb = $connect->prepare($query1_bb);
              $statement1_bb->execute();
              if ($statement1_bb->rowCount() > 0) {
                $result1_bb = $statement1_bb->fetchAll();
                // $sn = 1;
                foreach ($result1_bb as $row) {
                  $id = $row['id']; ?>
                  <tr>
                    <td style="width:50px;"><input type="checkbox" name="delete_multiple_brief[]" class="get_brief_checks" value="<?php echo $row['id'] ?>"></td>
                    <td><a style="color:black; text-decoration:underline;" onclick="document.getElementById('brid').value='<?php echo $row['id'] ?>';document.getElementById('brtype').value='user';document.getElementById('ur_ides').value='<?php echo $user_id ?>';" type="button" data-bs-toggle="modal" data-bs-target="#selectfiles"><?php echo $row['briefcase_name'] ?></a></td>
                    <td>
                      <?php
                      $name = "SELECT * FROM user_files where briefId='$id' and user_id='$ad_id'";
                      $stname2 = $connect->prepare($name);
                      $stname2->execute();

                      if ($stname2->rowCount() > 0) {
                        $rename2 = $stname2->fetchAll();
                        foreach ($rename2 as $rowname2) {
                          $rowname2['id'];
                          $filesname2 = "";
                          if ($rowname2['type'] == "online" || $rowname2['type'] == "offline") {
                            $filesname2 = $rowname2['lastName'];
                          } else {
                            $filesname2 = $rowname2['filename'];
                          }
                      ?>
                          <ul style=" list-style-type: none; display: block;">
                            <li style="text-decoration: none;">
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <span style="color:#9540e4;" title="<?php echo $rowname2['filename']; ?>">
                                <?php echo $filesname2; ?></span>
                              <a href="<?php echo BASE_URL; ?>includes/Pages/delete_adminpage_brief1.php?adminFiles=<?php echo $rowname2['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                            </li>
                          </ul>
                          <?php
                          ?>

                      <?php }
                      }

                      ?>
                      <?php
                      $name11 = "SELECT * FROM editor_data where briefId='$id' and userId='$ad_id'";
                      $stname12 = $connect->prepare($name11);
                      $stname12->execute();

                      if ($stname12->rowCount() > 0) {
                        $rename12 = $stname12->fetchAll();
                        foreach ($rename12 as $rowname12) {
                          $rowname12['id'];
                      ?>
                          <ul style=" list-style-type: none; display: block;">
                            <li style="text-decoration: none;">
                              <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                              <span style="color:#9540e4;" title="<?php echo $rowname12['pageName']; ?>">
                                <?php echo $rowname12['pageName']; ?></span>
                              <a href="<?php echo BASE_URL; ?>includes/Pages/delete_adminpage_brief1.php?adminPage=<?php echo $rowname12['id'] ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                            </li>
                          </ul>
                          <?php
                          ?>

                      <?php }
                      }

                      ?>
                    </td>
                    <td><a class="btn btn-soft-success btn-xs" href="" style="margin: 10px;" onclick="document.getElementById('userbrief_id').value='<?php echo $row['id'] ?>';
                                                                           document.getElementById('userbrief1').value='<?php echo $row['briefcase_name'] ?>';" data-bs-toggle="modal" data-bs-target="#editbriefuser"><i class="bi bi-pen-fill"></i>
                      </a>
                      <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/deleteBrief.php?adminBrief=<?php echo $row['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

                    </td>
                  </tr>
            <?php
                }
              }
            }
            ?>
          </table>

        </div>
      </div>

      <div class="tab-pane fade" id="userbrief" role="tabpanel" aria-labelledby="userbrief-tab">
        <h4>User Briefcase table</h4>
        <div class="row">
        <p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">Pages Table <input type="checkbox" class="user_brief_checks" id="pages_table">
            <i class="bi bi-trash-fill text-danger delte_user_brief" onclick="alert('are you sure to delete pages..')"></i>
          </p>
          <table class="table table-bordered" id="brieftable1">
            <input style="margin-bottom:10px;" class="form-control" type="text" id="briefsearch1" onkeyup="brief1()" placeholder="Search for Briefcase.." title="Type in a name"><br><br>
            <thead class="bg-dark">
              <th class="text-light">Sr No</th>
              <th class="text-light">BriefCases</th>
              <th class="text-light">Files</th>
              <th class="text-light">Action</th>
            </thead>
            <?php
            $query2_fm2 = "SELECT * FROM user_briefcase group by user_id";
            $statement2_fm2 = $connect->prepare($query2_fm2);
            $statement2_fm2->execute();
            if ($statement2_fm2->rowCount() > 0) {
              $result2_fm2 = $statement2_fm2->fetchAll();
              $snm = 1;
              foreach ($result2_fm2 as $row32) {
                $page_user_id2 = $row32['user_id'];
                $query2_fm1 = "SELECT * FROM users where `role`='super admin'";
                $statement2_fm1 = $connect->prepare($query2_fm1);
                $statement2_fm1->execute();
                $result2_fm1 = $statement2_fm1->fetchAll();
                foreach ($result2_fm1 as $row399) {
                  $admin_ides1 = $row399['id'];
                  if ($page_user_id2 != $admin_ides1) {
                    $user_name_files = $connect->prepare("SELECT nickname FROM `users` WHERE id=?");
                    $user_name_files->execute([$page_user_id2]);
                    $name12 = $user_name_files->fetchColumn();
            ?><tr></tr>
                    <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center;">
                      <td colspan="6"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size:large; font-style: oblique;"><?php echo $name12 ?> Breifcases </span>
                          <!-- <td colspan="3"><?php echo $name12 ?> Breifcases</td> -->
                          <a style="font-size: large; font-weight:bold; color:red;" href="<?php echo BASE_URL; ?>includes/Pages/delete_usernewbr.php?deleteId=<?php echo $page_user_id2; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>
                        </span>
                      </td>

                    </tr>
                    <?php
                    $query1_bb = "SELECT * FROM user_briefcase where user_id='$page_user_id2'";
                    $statement1_bb = $connect->prepare($query1_bb);
                    $statement1_bb->execute();
                    if ($statement1_bb->rowCount() > 0) {
                      $result1_bb = $statement1_bb->fetchAll();
                      // $sn = 1;
                      foreach ($result1_bb as $row) {
                        $beid = $row['id']; ?>
                        <tr>
                          <td style="width:50px;"><input type="checkbox" name="delete_multiple_user_brief[]" class="get_user_brief_checks" value="<?php echo $row['id'] ?>"></td>
                          <td><a style="color:black; text-decoration:underline;" onclick="document.getElementById('brid').value='<?php echo $row['id'] ?>';document.getElementById('brtype').value='user';document.getElementById('ur_ides').value='<?php echo $page_user_id2 ?>';" type="button" data-bs-toggle="modal" data-bs-target="#selectfiles"><?php echo $row['briefcase_name'] ?></a></td>
                          <td>

                            <?php

                            $name1110 = "SELECT * FROM editor_data where briefid='$beid' and userId='$page_user_id2'";
                            $stname21110 = $connect->prepare($name1110);
                            $stname21110->execute();

                            if ($stname21110->rowCount() > 0) {
                              $rename21110 = $stname21110->fetchAll();
                              foreach ($rename21110 as $rowname21110) { ?>
                                <ul style=" list-style-type: none; display: block;">
                                  <li style="text-decoration: none;">
                                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                    <span style="color:#9540e4;" title="<?php echo $rowname21110['pageName'] ?>">
                                      <?php echo $rowname21110['pageName']; ?></span>
                                    <a href="<?php echo BASE_URL; ?>includes/Pages/delete_adminpage_brief4.php?userid=<?php echo $rowname21110['id'] ?>&main_id=<?php echo $user_id ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                  </li>
                                </ul>
                            <?php }
                            }

                            ?>
                            <?php
                            $name13 = "SELECT * FROM user_files where briefId='$beid' and user_id='$page_user_id2'";
                            $st1name2 = $connect->prepare($name13);
                            $st1name2->execute();

                            if ($st1name2->rowCount() > 0) {
                              $re1name2 = $st1name2->fetchAll();
                              foreach ($re1name2 as $rowname21) {
                                $rowname21['id'];
                                $filesname1 = "";
                                if ($rowname21['type'] == "online" || $rowname21['type'] == "offline") {
                                  $filesname1 = $rowname21['lastName'];
                                } else {
                                  $filesname1 = $rowname21['filename'];
                                }
                            ?>
                                <ul style=" list-style-type: none; display: block;">
                                  <li style="text-decoration: none;">
                                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                                    <span style="color:#9540e4;" title="<?php echo $rowname21['filename']; ?>">
                                      <?php echo $filesname1; ?></span>
                                    <a href="<?php echo BASE_URL; ?>includes/Pages/delete_adminpage_brief3.php?userid=<?php echo $rowname21['id'] ?>&main_id=<?php echo $user_id ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                  </li>
                                </ul>
                                <?php
                                ?>

                            <?php }
                            }

                            ?>
                          </td>
                          <td><a class="btn btn-soft-success btn-xs" href="" style="margin: 10px;" onclick="document.getElementById('userbrief_id').value='<?php echo $id = $row32['id'] ?>';
                                                                           document.getElementById('userbrief1').value='<?php echo $row32['briefcase_name'] ?>';" data-bs-toggle="modal" data-bs-target="#editbriefuser"><i class="bi bi-pen-fill"></i>
                            </a>
                            <a class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/deleteBrief.php?adminBrief=<?php echo $id ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

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

        </div>
      </div>
    </div>
    <!-- End Tab Content -->


  </div>
  <hr>


</div>



<!--Edit briefcase modal-->
<div class="modal fade" id="selectfiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Select Files</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/add_file_brief.php?page_type=<?php echo $page_type ?>" enctype="multipart/form-data">
          <input type="hidden" id="brid" name="brid"> <input type="hidden" id="brtype" name="brtype">
          <input type="hidden" id="ur_ides" name="urtype">
          <!-- <input type="text" id="fo_ides" name="fo_ides"> -->
          <table class="table table-bordered" id="files1">
            <input style="margin:5px;" class="form-control" type="text" id="file_search" onkeyup="file_by_file()" placeholder="Search for Files.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-light"><input type="checkbox" id="select-all"></th>
              <!-- <th class="text-light">File Names</th> -->
              <th class="text-light"> UPLOADED FILES</th>
              <th class="text-light">View</th>

            </thead>
            <?php

            $query11_fm10 = "SELECT * FROM user_files where briefId='0' and folderId='0'";
            $statement11_fm10 = $connect->prepare($query11_fm10);
            $statement11_fm10->execute();
            if ($statement11_fm10->rowCount() > 0) {
              $result11_fm10 = $statement11_fm10->fetchAll();

              foreach ($result11_fm10 as $row110) {
                $filesname = "";
                if ($row110['type'] == "online" || $row110['type'] == "offline") {
                  $filesname = $row110['lastName'];
                } else {
                  $filesname = $row110['filename'];
                }

            ?>
                <tr>
                  <td><input type="checkbox" name="fsid2[]" value="<?php echo $row110['id'] ?>" /></td>
                  <td>
                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                    <span style="color:#9540e4;" title="<?php echo $row110['filename'] ?>"><?php echo $filesname; ?></span>
                  </td>
                  <td>
                    <a href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $row110['filename']; ?>" target="_blank">View</a>
                  </td>
                </tr>
            <?php }
            }
            ?>
            <?php

            $query11_fm101 = "SELECT * FROM editor_data where briefId='0' and folderId='0'";
            $statement11_fm101 = $connect->prepare($query11_fm101);
            $statement11_fm101->execute();
            if ($statement11_fm101->rowCount() > 0) {
              $result11_fm101 = $statement11_fm101->fetchAll();

              foreach ($result11_fm101 as $row1101) {

            ?>
                <tr>
                  <td><input type="checkbox" name="fsid1[]" value="<?php echo $row1101['id'] ?>" /></td>
                  <td>
                    <img style="height:20px; width:20px; margin-left: 20px;" src="<?php echo BASE_URL; ?>assets/svg/phase2_grey/file.png">
                    <span style="color:#9540e4;" title="<?php echo $row1101['pageName'] ?>"><?php echo $row1101['pageName']; ?></span>
                  </td>
                  <td>
                    <i class="bi bi-eye-fill" onclick="openInNewWindow('<?php echo BASE_URL; ?>Library/viewpage.php/?pId=<?php echo $row1101['id'] ?>');"></i>
                  </td>
                </tr>
            <?php }
            }
            ?>
          </table>
          <hr>
          <input style="float:right;" type="submit" class="btn btn-success" value="Add">
        </form>
      </div>
    </div>
  </div>
</div>




<!--Edit briefcase modal-->
<div class="modal fade" id="editbrief" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Briefcase</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_briefcase.php">
          <input type="hidden" class="form-control" name="id" value="" id="brief_id" readonly>
          <label style="color:black; font-weight:bold; margin:5px;">Briefcase</label>
          <input type="text" class="form-control" name="brief" value="" id="brief">
          <br>
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<!--Edit user briefcase modal-->
<div class="modal fade" id="editbriefuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Briefcase</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo BASE_URL; ?>includes/Pages/edit_briefcase.php">
          <input type="hidden" class="form-control" name="id" value="" id="userbrief_id" readonly>
          <input type="hidden" class="form-control" name="page_redirection" value="<?php echo $page_type ?>">
          <label style="color:black; font-weight:bold; margin:5px;">Briefcase</label>
          <input type="text" class="form-control" name="brief" id="userbrief1">
          <br>
          <input class="btn btn-success" type="submit" name="submitbrief" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  document.getElementById('select-all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  }
</script>

<script>
  function brief1() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("briefsearch1");
    filter = input.value.toUpperCase();
    table = document.getElementById("brieftable1");
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
                        \
                          <td style="text-align: center;"><input type="text" placeholder="Enter Briefcase" name="briefcase[]" id="val" class="form-control" value="" required /> </td>\
                          <td style="width:20px;"><button type="button" name="remove_brief1" id="remove_brief1" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                        </tr>'
    var max = 100;
    var a = 1;

    $("#add_brief1").click(function() {
      if (a <= max) {
        $("#table-field-brief2").append(html);
        a++;
      }
    });
    $("#table-field-brief2").on('click', '#remove_brief1', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>