<p class="btn" style="background-image: linear-gradient(to left, #553c9a, #b393d3); color: white; font-weight: bold; border-radius:10px;">Images
  <input type="checkbox" class="page_checks4" id="pages_table4">
  <i class="bi bi-trash-fill text-danger delte_pages4" onclick="alert('are you sure to delete pages..')"></i>
  </?p>
  <!-- <button class="btn" data-bs-toggle="modal" data-bs-target="#open_slider">Open Slider</button> -->
<table class="table table-bordered" id="file_image">
  <input style="margin:5px;" class="form-control" type="text" id="search_image" onkeyup="image()" placeholder="Search for Image.." title="Type in a name">
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
    $query1_ff = "SELECT * FROM user_files where type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp') and user_id='$admin_ides1'";
    $statement1_ff = $connect->prepare($query1_ff);
    $statement1_ff->execute();
    if ($statement1_ff->rowCount() > 0) {
      $result1_ff = $statement1_ff->fetchAll();
      $sn = 1;
      foreach ($result1_ff as $row_imag) {
        $filename = "";
        $pdf_name=$row_imag['filename'];
        $extension=pathinfo($pdf_name, PATHINFO_FILENAME);
        $id = $row_imag['id']; ?>
        <tr>
          <td style="width:50px;"><input type="checkbox" name="delete_multiple_pages4[]" class="get_page_checks4" value="<?php echo $row_imag['id'] ?>"></td>

          <td>
            <?php echo $row_imag['filename'] ?>
          </td>
          <td>
            <a href="" data-bs-toggle="modal" data-bs-target="#open_slider">View</a>
            <!-- <a href="files/<?php echo $row_imag['filename']; ?>" target="_blank">View</a> -->

          </td>
          <td>
            <a class="btn btn-soft-success btn-xs" id="<?php echo $row_imag['id']; ?>" onclick="document.getElementById('pdf_loc_edit_id').value='<?php echo $row_imag['id'] ?>';
                                                             document.getElementById('fullname').value='<?php echo $row_imag['filename'] ?>';
                                                             document.getElementById('editname').value='<?php echo $extension ?>';" value="<?php echo $row_imag['filename']; ?>" class="editFile" data-bs-target="#editPdfFile" data-bs-toggle="modal"><i class="bi bi-pen-fill"></i></a>
            <a class="btn btn-soft-danger btn-xs" href="delet_file.php?userid=<?php echo $row_imag['id']; ?>&page_type=<?php echo $page_type; ?>"><i class="bi bi-trash-fill"></i></a>

          </td>
        </tr>
  <?php
      }
    }
  }
  ?>
  <?php
  $query1_fm5 = "SELECT * FROM user_files WHERE type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp') group by user_id";
  $statement1_fm5 = $connect->prepare($query1_fm5);
  $statement1_fm5->execute();
  if ($statement1_fm5->rowCount() > 0) {
    $result1_fm5 = $statement1_fm5->fetchAll();
    foreach ($result1_fm5 as $row33) {
      $page_user_id5 = $row33['user_id'];
      $query21_fm2 = "SELECT * FROM users where `role`!='super admin' and id='$page_user_id5 '";
      $statement21_fm2 = $connect->prepare($query21_fm2);
      $statement21_fm2->execute();
      $result21_fm2 = $statement21_fm2->fetchAll();
      foreach ($result21_fm2 as $row139) {
        $admin1_ides = $row139['id'];
        $name5 = $row139['nickname'];
  ?>

        <tr style="background-image: linear-gradient(to left, #553c9a, #b393d3); text-align:center;">
          <td colspan="4"><span class="btn btn-light" style="border-radius:20px; height:50px;"><span style="color:black; font-weight:bold; font-size:large; font-style:oblique;"><?php echo $name5 ?> Images</span>
              <a data-bs-toggle="tooltip" data-bs-placement="right" title="Delete <?php echo $name5 ?> all Images" style="font-weight:bold;font-size: large; color: red;" href="delete_usernewfile.php?deleteId=<?php echo $page_user_id5; ?>&type=img"><i class="bi bi-trash-fill"></i></a></span>
          </td>
          <!-- <td colspan="4"></td> -->
        </tr>
        <?php
        $query1_ff = "SELECT * FROM user_files WHERE user_id='$page_user_id5' and type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
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
              <td style="width:50px;"> <input type="checkbox" name="delete_multiple_pages4[]" class="get_page_checks4" value="<?php echo $row['id'] ?>"></td>

              <td>
                <?php echo $row['filename'] ?>
              </td>
              <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#open_slider">View</a>
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




<div class="modal fade" id="open_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel"></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <?php
            $query1 = "SELECT * FROM user_files WHERE type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
            $statement1 = $connect->prepare($query1);
            $statement1->execute();

            // $query2 = "SELECT * FROM user_files WHERE type IN ('jpg', 'png', 'jpeg', 'gif', 'svg', 'webp')";
            // $statement2 = $connect->prepare($query2);
            // $statement2->execute();

            $images = array();

            if ($statement1->rowCount() > 0) {
              $result1 = $statement1->fetchAll();
              foreach ($result1 as $row) {
                $images[] = $row['filename'];
              }
            }

            // if ($statement2->rowCount() > 0) {
            //   $result2 = $statement2->fetchAll();
            //   foreach ($result2 as $row) {
            //     $images[] = $row['name'];
            //   }
            // }

            // Display the images in the carousel

            foreach ($images as $image) {
              echo '<div class="carousel-item">';
              echo '<img src="<?php echo BASE_URL; ?>includes/Pages/files/' . $image . '" class="d-block" alt="" style="width:500px; height:500px;">';
              echo '<img src="<?php echo BASE_URL; ?>includes/Pages/files/' . $image . '" class="d-block" alt="" style="width:500px; height:500px;">';
              echo '</div>';
            }

            ?>
          </div>
          <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button> -->
        </div>

        <!-- End Body -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:600px;">
          <!-- Indicators -->
          <center>

            <!-- Slides -->
            <div class="carousel-inner">

              <?php foreach ($images as $index => $image) { ?>
                <div class="carousel-item <?php if ($index === 0) {
                                            echo 'active';
                                          }
                                          ?>">
                  <div class="thumbnail-caption">
                    <h6 style="font-size: large; float:center;" class="text-success"><?php echo $image; ?></h6>
                  </div><br>
                  <img src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $image ?>" class="d-block" alt="<?php echo $image ?>" style="height: 500px; width: 1000px;">
                </div>
              <?php } ?>
            </div>
            <br><br>
            <!-- Thumbnails -->
            <div class="carousel-thumbnails">
              <?php foreach ($images as $index => $image) { ?>
                <a href="#myCarousel" data-slide-to="<?php echo $index ?>" class="<?php if ($index === 0) {
                                                                                    echo 'active';
                                                                                  }
                                                                                  ?>">
                  <img src="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $image ?>" alt="<?php echo $image ?>" width="50">
                </a>

              <?php } ?>
            </div>
          </center>
          <!-- Controls -->
          <a class="carousel-control-prev text-primary" href="#myCarousel" role="button" data-slide="prev" style="font-weight:bold;">
            <span class="carousel-control-prev-icon text-primary" aria-hidden="true"></span>
            <span class="sr-only text-primary">Previous</span>
          </a>
          <a class="carousel-control-next text-primary" href="#myCarousel" role="button" data-slide="next" style="font-weight: bold;">
            <span class="carousel-control-next-icon text-primary" aria-hidden="true"></span>
            <span class="sr-only text-primary">Next</span>
          </a>
        </div>
        <br>
        <br>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
      $('#myCarousel').carousel();
    });
  </script>