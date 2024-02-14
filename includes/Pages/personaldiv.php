<div class="row justify-content-center">


  <div class="col-lg-12 mb-3 mb-lg-5">
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <!-- Header -->
      <div class="card-header card-header-content-between">
        <h3 class="text-success">Personal</h3>
      </div>
      <!-- End Header -->

      <!-- Body -->
      <div class="card-body">
        <div class="container">
          <div class="row align-items-start">
            <?php
            // Pagination variables
            $url = $_SERVER['PHP_SELF'];
            $filename2 = basename($url);
            $limit = 3; // Number of items to display per page
            $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

            // Query to count the total number of items
            $countQuery = "SELECT COUNT(*) AS total FROM persontitle";
            $countStatement = $connect->prepare($countQuery);
            $countStatement->execute();
            $countData = $countStatement->fetch();
            $totalItems = $countData['total'];

            // Calculate the offset
            $offset = ($page - 1) * $limit;

            // Query to retrieve the data with pagination
            $persontitle = "SELECT * FROM persontitle LIMIT $limit OFFSET $offset";
            $statement = $connect->prepare($persontitle);
            $statement->execute();
            $data = $statement->fetchAll();

            foreach ($data as $dt) {
              $userid = $dt['user_id'];
              $userquery = $connect->query("SELECT * FROM users WHERE id = '$userid'");
              while ($userdata = $userquery->fetch()) {


            ?>


                <div class="col-4 p-2">
                  <div class="col-12 border rounded p-2">
                    <div style="text-align: end;">
                      <?php
                      if ($filename2 != "index_landing.php") {
                      ?>
                                  <?php if (isset($_SESSION['permission']) && $permission['Edit_landing'] == "1"){ ?>
                        <a style="text-decoration:none; color:black; font-size: large;" href="" style="margin: 10px;" onclick="document.getElementById('title_id').value='<?php echo $dt['id']; ?>';
                                                             document.getElementById('title_name').value='<?php echo $dt['title'] ?>';document.getElementById('user_name').innerHTML='<?php echo $userdata['nickname']; ?>';document.getElementById('message1').value='<?php echo $dt['message'] ?>'" data-bs-toggle="modal" data-bs-target="#edit_title">
                          <i class="bi bi-pencil-square text-success"></i>
                        </a>
                        <?php }
                        if (isset($_SESSION['permission']) && $permission['Delete_landing'] == "1"){  
                        ?>
                        <a style="text-decoration: none; color:black; font-size: large;" href="<?php echo BASE_URL ?>includes/Pages/deletetitle.php?deleteTitleId=<?php echo $dt['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                          <i class="bi bi-trash3-fill text-danger"></i>
                        </a>
                      <?php
                      }
                      }
                      ?>
                    </div>
                    <div class="d-flex align-items-center">
                      <?php
                      $prof_pic = $userdata['file_name'];
                      if ($prof_pic != null) {
                        $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
                      } else {
                        $pic = BASE_URL . 'includes/Pages/avatar/avtar.png';
                      }
                      ?>
                      <div class="avatar avatar-lg avatar-circle">
                        <img style="height:80px; width:80px;" class="avatar" src="<?php echo $pic; ?>" alt="Logo" data-hs-theme-appearance="default">
                      </div>
                      <div class="flex-grow-1 ms-6">
                        <h1 class="mb-0 text-success"><?php echo $userdata['nickname']; ?></h1>
                        <h3 class="card-text text-body"><?php echo $dt['title'] ?></h3><br>

                      </div>

                    </div>
                    <hr>
                    <p><?php echo $dt['message'] ?></p>
                  </div>

                </div>
            <?php
              }
            }
            ?>
            <hr>

            <!-- Bootstrap Pagination -->
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center" style="float:right;">
                <?php
                $totalPages = ceil($totalItems / $limit); // Calculate the total number of pages

                // Previous page button
                if ($page > 1) {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                } else {
                  echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                }

                // Page links
                for ($i = 1; $i <= $totalPages; $i++) {
                  echo '<li class="page-item ' . ($page == $i ? "active" : "") . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                // Next page button
                if ($page < $totalPages) {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                } else {
                  echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                }
                ?>
              </ul>
            </nav>
          </div>
        </div>

        <!-- End Body -->
      </div>
      <!-- End Card -->
    </div>

  </div>
</div>



<!-- select folder for shop -->
<div class="modal fade" id="edit_title" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-success" id="exampleModalLabel"><span id="user_name"></span>
        </h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?php echo BASE_URL; ?>includes/Pages/edit_title.php" method="post">
          <input type="hidden" name="id" id="title_id" class="form-control">
          <label class="form-label text-dark">Title</label>
          <input type="" name="title" id="title_name" class="form-control">
          <label class="form-label text-dark">Message</label>
          <textarea type="text" name="message" id="message1" class="form-control"></textarea>

          <input type="hidden" name="userid" value="<?php echo $user_id ?>">
          <hr>
          <button style="float:right;" type="submit" class="btn btn-success" id="submit">Save</button>
        </form>

      </div>
    </div>
  </div>
</div>