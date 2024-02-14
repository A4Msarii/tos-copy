<div>
  <ul class="nav nav-segment nav-pills bg-dark" role="tablist" style="margin-left:25px;">
    <li class="nav-item">
      <a class="nav-link active" id="buttonviewpage-tab" href="#buttonviewpage" data-bs-toggle="pill" data-bs-target="#buttonviewpage" role="tab" aria-controls="buttonviewpage" aria-selected="true"><i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Button View" class="bi bi-menu-button"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="listviewpage-tab" href="#listviewpage" data-bs-toggle="pill" data-bs-target="#listviewpage" role="tab" aria-controls="listviewpage" aria-selected="true"><i data-bs-toggle="tooltip" data-bs-placement="bottom" title="List View" class="bi bi-card-list"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="gridviewpage-tab" href="#gridviewpage" data-bs-toggle="pill" data-bs-target="#gridviewpage" role="tab" aria-controls="gridviewpage" aria-selected="false"><i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Grid View" class="bi bi-grid-3x3-gap-fill"></i></a>
    </li>
  </ul>
</div>

<!--content of list view grid view and button-->
<div class="tab-content">
  <div class="tab-pane fade show active" id="nav-one-eg2" role="tabpanel" aria-labelledby="nav-one-eg2-tab">


    <!-- Body -->
    <div class="tab-content">

      <div class="tab-pane fade show active" id="buttonviewpage" role="tabpanel" aria-labelledby="buttonviewpage-tab">
        <div class="card-body">
          <!-- Stats -->
          <div class="row">
            <center>
              <div class="col-lg-12">
                <!-- Card -->
                <div class="card card-hover-shadow" href="actual.php" style="background-color: var(--primary-background-color); border: none;">
                  <div class="card-body">
                    <h1 class="card-subtitle text-dark" style="font-size:large; font-weight: bold;">Button View</h1>
                    <div class="row">
                      <button class="btn btn-primary btn-sm" style="font-size:large; width:auto;" data-bs-toggle="modal" data-bs-target="#buttonModal"><i class="bi bi-plus-circle"></i></button>



                    </div>
                    <!-- End Row -->
                  </div>
                </div>
                <!-- End Card -->
              </div>
          </div>
        </div>
        <!-- End Stats -->
      </div>
      <div class="tab-pane fade" id="listviewpage" role="tabpanel" aria-labelledby="listviewpage-tab">
        <div class="card-body">
          <!-- Stats -->
          <div class="row">
            <center>
              <div class="col-lg-12">
                <!-- Card -->
                <div class="card card-hover-shadow" href="actual.php" style="background-color: var(--primary-background-color); border: none;">
                  <div class="card-body">
                    <h1 class="card-subtitle text-dark" style="font-size:large; font-weight: bold;">List View</h1>

                    <div class="row align-items-center">
                      <button class="btn btn-primary btn-sm" style="font-size:large; width:auto;" data-bs-toggle="modal" data-bs-target="#listModal"><i class="bi bi-plus-circle"></i></button>
                      
                    </div>
                    <!-- End Row -->
                  </div>
                </div>
                <!-- End Card -->
              </div>
          </div>
        </div>
        <!-- End Stats -->
      </div>
      <!--grid view tab for pages-->
      <div class="tab-pane fade" id="gridviewpage" role="tabpanel" aria-labelledby="gridviewpage-tab">
        <div class="card-body">
          <!-- Stats -->
          <div class="row">
            <center>
              <div class="col-lg-12">
                <!-- Card -->
                <div class="card card-hover-shadow" href="actual.php" style="border:none;background-color: var(--primary-background-color);">
                  <div class="card-body">
                    <h1 class="card-subtitle text-dark" style="font-size:large; font-weight: bold;">Grid View</h1>
                    <div class="row align-items-center">
                      <button class="btn btn-primary btn-sm" style="font-size:large; width:auto;" data-bs-toggle="modal" data-bs-target="#gridModal"><i class="bi bi-plus-circle"></i></button>
                    
                    </div>
                    <!-- End Row -->
                  </div>
                </div>
                <!-- End Card -->
              </div>
          </div>
        </div>
        <!-- End Stats -->
      </div>
    </div>
    <!-- End Card -->
  </div>



  <!-- Modal -->
  <div class="modal fade" id="buttonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">File List</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered" id="file_all">
            <input style="margin:5px;" class="form-control" type="text" id="search_all" onkeyup="file_all()" placeholder="Search for files.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-light">Sr No</th>
              <!-- <th class="text-light">File Names</th> -->
              <th class="text-light">Files</th>
              <!-- <th class="text-light">Permission</th>
    <th class="text-light">Permission Type</th>
    <th class="text-light">View</th> -->
              <!-- <th class="text-light">Action</th> -->
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
                <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center; display: none;">
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

                      <td style="display: none;">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->


  <!-- Modal -->
  <div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">File List</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered" id="file_all">
            <input style="margin:5px;" class="form-control" type="text" id="search_all" onkeyup="file_all()" placeholder="Search for files.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-light">Sr No</th>
              <!-- <th class="text-light">File Names</th> -->
              <th class="text-light">Files</th>
              <!-- <th class="text-light">Permission</th>
    <th class="text-light">Permission Type</th>
    <th class="text-light">View</th> -->
              <!-- <th class="text-light">Action</th> -->
            </thead>
            <form action="#" method="post">
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
                  <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center; display: none;">
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
                        <td style="width:50px;"><input type="checkbox" name="docids[]" class="get_page_checks6" value="<?php echo $row['id'] ?>"></td>

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

                        <td style="display: none;">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="savelibrary">Save changes</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- End Modal -->


  <!-- Modal -->
  <div class="modal fade" id="gridModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">File List</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered" id="file_all">
            <input style="margin:5px;" class="form-control" type="text" id="search_all" onkeyup="file_all()" placeholder="Search for files.." title="Type in a name">
            <thead class="bg-dark">
              <th class="text-light">Sr No</th>
              <!-- <th class="text-light">File Names</th> -->
              <th class="text-light">Files</th>
              <!-- <th class="text-light">Permission</th>
    <th class="text-light">Permission Type</th>
    <th class="text-light">View</th> -->
              <!-- <th class="text-light">Action</th> -->
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
                <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3);text-align:center; display: none;">
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

                      <td style="display: none;">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->