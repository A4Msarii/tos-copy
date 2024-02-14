<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>User List</title>
  <!-- <title>Phase</title> -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

<body>
  
    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>
 

  <div id="header-hide">
    <?php
    include(ROOT_PATH . 'includes/head_navbar.php');
    ?>
  </div>
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
              <h2 class="text-success">User List</h2>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <center>
                <?php
                $output = "";

                ?>
                <center>

                  <table class="table table-striped table-bordered table-hover" id="usertableAll">
                    <input style="margin:5px;" class="form-control" type="text" id="usersearchAll" onkeyup="userlistAll()" placeholder="Search for names.." title="Type in a name">
                    <thead class="bg-dark">
                      <th class="text-white">Sr No</th>

                      <th class="text-white">Name</th>
                      <th class="text-white">User Id</th>
                      <th class="text-white">Profile image</th>
                      <th class="text-white">Role</th>
                      <th class="text-white">Nick Name</th>
                      <th class="text-white">Phone Number</th>
                      <th class="text-white">email</th>

                      <th class="text-white">Action</th>

                    </thead>
                    <?php $query7 = "SELECT * FROM users  ORDER BY id ASC";
                    $statement = $connect->prepare($query7);
                    $statement->execute();

                    if ($statement->rowCount() > 0) {
                      $result = $statement->fetchAll();
                      $sn = 1;
                      foreach ($result as $row) {
                    ?>
                        <tr>
                          <td><?php echo $sn++ ?></td>

                          <td><?php echo $row['name'] ?></td>
                          <td><?php echo $row['studid'] ?></td>
                          <td style="text-align:center;"><?php
                              $prof_pic11 = $row['file_name'];


                              if ($prof_pic11 != "") {


                                $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic11)) {
                                  $pic11 = BASE_URL . 'includes/Pages/upload/' . $prof_pic11;
                                } else {
                                  $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                }
                              }else{
                                $pic11 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                              }
                              ?>
                            <div class="avatar avatar-sm avatar-circle">
                              <img class="avatar-img" src="<?php echo $pic11; ?>" alt="Image Description">
                            </div>
                          </td>
                          <td><?php echo $row['role'] ?></td>
                          <td><?php echo $row['nickname'] ?></td>
                          <td><?php echo $row['phone'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><a class="btn btn-soft-success btn-xs" href="edituser-update.php?id=<?php echo $row["id"] ?>"><i class="bi bi-pen-fill"></i></a>
                            <a class="btn btn-soft-danger btn-xs" href="user-delete.php?id=<?php echo $row["id"] ?>"><i class="bi bi-trash-fill"></i></a>
                          </td>
                        </tr>
                    <?php
                      }
                    }       ?>
                  </table>
                </center>
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


  <script>
    function userlistAll() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("usersearchAll");
      filter = input.value.toUpperCase();
      table = document.getElementById("usertableAll");
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