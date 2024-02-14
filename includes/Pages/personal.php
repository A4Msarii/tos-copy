<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>User Details</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 
  <div id="header-hide">

    <div>
      <?php
      include(ROOT_PATH . 'includes/head_navbar.php');
      ?>
    </div>


    <!--Main contect We need to insert data here-->
    <main id="content" role="main" class="main">
      <!-- Content -->
      <div>
        <div class="content container-fluid" style="height: 25rem;">
<?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        </div>

      </div>
      <!-- End Content -->

      <!-- Content -->
      <div class="content container-fluid" style="margin-top: -20rem;">

        <div class="row justify-content-center">

          <div class="col-lg-10 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
              <!-- Header -->
              <div class="card-header card-header-content-between">
                <h3 class="text-success">All User's</h3>
              </div>
              <!-- End Header -->

              <!-- Body -->
              <div class="card-body">
                
                <table class="table table-striped table-bordered table-hover" id="usertable1">
                  <input style="margin:5px;" class="form-control" type="text" id="usersearch1" onkeyup="userlist1()" placeholder="Search for names.." title="Type in a name">
                  <thead class="bg-dark">
                    <th class="text-white">Sr No</th>

                    <th class="text-white">Name</th>
                    <th class="text-white">User Id</th>
                    <th class="text-white">Profile image</th>
                    <th class="text-white">Role</th>

                  </thead>
                  <?php
                  $query71 = "SELECT * FROM users  ORDER BY id ASC";
                  $statement1 = $connect->prepare($query71);
                  $statement1->execute();

                  if ($statement1->rowCount() > 0) {
                    $result1 = $statement1->fetchAll();
                    $sn = 1;
                    foreach ($result1 as $row) {
                  ?>
                      <tr style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#message_modal" onclick="document.getElementById('user_name').innerHTML='<?php echo $row['name'] ?>';
             document.getElementById('u_id').value='<?php echo $row['id'] ?>';
             document.getElementById('user_image').innerHTML='<?php echo $pic11; ?>';
             ">
                        <td><?php echo $sn++ ?></td>

                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['studid'] ?></td>
                        <td><?php
                            $prof_pic11 = $row['file_name'];
                            if ($prof_pic11 != null) {
                              $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                            } else {
                              $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                            }
                            ?>
                          <div class="avatar avatar-sm avatar-circle">
                            <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                          </div>
                        </td>
                        <td><?php echo $row['role'] ?></td>
                      </tr>
                  <?php
                    }
                  }       ?>
                </table>


              </div>
              <!-- End Body -->
            </div>
            <!-- End Card -->
          </div>
        </div>
        <!-- End Row -->
      </div>
      <!-- End Content -->
    </main>


    <div class="modal fade" id="message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <img class="avatar-img" src="" id="user_image">
            <h2 class="modal-title text-success" id="exampleModalLabel">
              <p id="user_name"></p>
            </h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?php echo BASE_URL; ?>includes/Pages/insert_personal.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="user_name" id="user_name">
              <input type="hidden" name="id" id="u_id" class="form-control">
              <!-- <label class="form-label">Name Of User : </label> <p id="user_name"></p><br> -->
              <label class="form-label text-dark">Title</label>
              <input type="text" name="title" class="form-control"><br>
              <label class="form-label text-dark">Message</label>
              <textarea class="form-control" name="message"></textarea><br>
              <input type="submit" name="personalbtn" value="Save" class="btn btn-success" style="float:right;">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      function userlist1() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("usersearch1");
        filter = input.value.toUpperCase();
        table = document.getElementById("usertable1");
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
 <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>