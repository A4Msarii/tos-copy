<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Department</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, 
                    initial-scale=1" />
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/svg/thumbnail/GS.png">

</head>

<body>

    <?php include ROOT_PATH . 'includes/Pages/gsloader.php'; ?>

<div id="header-hide">
  <?php
  include(ROOT_PATH . 'includes/head_navbar.php');
  $course = "";
  $ctp = "";
  ?></div>
<!--Input Phases-->
<!--Main contect We need to insert data here-->
<main id="content" role="main" class="main">
  <!-- Content -->
  <div>
    <div class="content container-fluid" style="height: 30rem;">
      <!-- Page Header -->
      <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
      <div class="page-header" style="padding: 0px;">
        <h1 class="text-success">Department</h1>
      </div>
      <!-- End Page Header -->
    </div>
  </div>
  <!-- End Content -->

  <!-- Content -->
  <div class="content container-fluid" style="margin-top: -20rem;">

    <div class="row justify-content-center">

      <div class="col-lg-10 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

          <!-- Body -->
          <div class="card-body">
           
            <?php
            $ma_id = "";
            $readonly = "";
            $ma_name = "";
            $department_name = "";
            $description = "";
            $location = "";
            $contact_number = "";
            $email = "";
            $website = "";
            $additional = "";
            $q11 = "SELECT * FROM main_department where user_id=$user_id";
            $st11 = $connect->prepare($q11);
            $st11->execute();

            if ($st11->rowCount() > 0) {
              $result11 = $st11->fetchAll();
              foreach ($result11 as $row2) {
                $ma_id = $row2['id'];
                $ma_name = $row2['department_name'];

                $description = $row2['description'];
                $location = $row2['location'];
                $contact_number = $row2['contact_number'];
                $email = $row2['email'];
                $website = $row2['website'];
                $additional = $row2['additional'];
              }
            }

            ?>
            <center>
              <form class="insert-dept" id="dep_form" method="post" action="add_departement.php" style="width:700px;">
                <input type="hidden" name="u_id" value="<?php echo $user_id ?>">
                <input type="hidden" name="id" class="form-control" value="<?php echo $ma_id ?>" readonly />
                <div class="input-field">
                  <table class="table" id="table-field-department">
                    <tr>

                      <td style="text-align: center;">
                        <label class="form-label text-dark" style="font-weight:bold; font-size: large; float:left;">Main Department Name:</label>
                        <input type="text" id="mainval" class="form-control" value="<?php echo $ma_name ?>" readonly />
                      </td>

                      <td style="text-align: center;">
                        <label class="form-label text-dark" style="font-weight:bold; font-size: large; float:left;">Department Name <span><i class="bi bi-asterisk text-danger m-2" style="font-size: x-small;"></i></span>:</label>
                        <input type="text" placeholder="Enter Department" name="dep[]" id="depval" class="form-control" value="" required />
                      </td>
                      <td style="width:20px;"><button style="margin-top: 40px;" type="button" name="add_dep" id="add_dep" class="btn btn-soft-primary"><i class="bi bi-plus-circle-fill"></i></button></td>
                    </tr>
                  </table>
                </div>
                <center>
                  <button style="margin:5px;" class="btn btn-success" type="submit">Submit</button>
                </center>


              </form>
            </center>


            <center>
              <table class="table table-striped table-bordered table-hover" id="departmenttableheadAll">
                <input style=" margin:5px;" class="form-control" id="departmentsearchheadAll" type="text" onkeyup="departmentheadAll()" placeholder="Search for Department.." title="Type in a name">
                <thead class="bg-dark">
                  <th class="text-white">Sr No</th>
                  <!-- <th class="text-white">Id</th> -->
                  <th class="text-white">Main Department</th>
                  <th class="text-white">Department Name</th>
                  <th class="text-white">User</th>
                  <th class="text-white">Change Department Logo</th>
                  <th class="text-white">Action</th>
                </thead>
                <?php
                $query4 = "SELECT * FROM homepage ORDER BY id ASC";
                $statement2 = $connect->prepare($query4);
                $statement2->execute();
                if ($statement2->rowCount() > 0) {
                  $result2 = $statement2->fetchAll();
                  $sn4 = 1;
                  foreach ($result2 as $row2) {
                    $departId = $row2['id'];
                    $school=$row2['school_name'];
                    $uName1 = $connect->query("SELECT department_name FROM main_department WHERE id = '$school'");
                    $uData1 = $uName1->fetchColumn();
                    // $id = $row1["id"];
                                        // $mainDImg = $connect->query("SELECT file_name FROM homepage");
                                        $mainDImgData = $row2['file_name'];
                                        if ($mainDImgData != "") {
                                            $pic1111 = BASE_URL . 'includes/Pages/department/' . $mainDImgData;
                                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pic1111)) {
                                                $pic1111 = BASE_URL . 'includes/Pages/department/' . $mainDImgData;
                                            } else {
                                                $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                            }
                                        } else {
                                            $pic1111 = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                        }
                ?>
                    <tr>
                      <td><?php echo $sn4++; ?></td>
                      <!-- <td><?php echo $row2['id']; ?></td> -->
                      <td><?php echo $uData1; ?></td>
                      <td><img src="<?php echo $pic1111; ?>" alt="Your Image" style="height:inherit;width:inherit;border-radius:50%;height: 30px;width:30px;margin: 5px;" /><?php echo $row2['department_name']; ?></td>
                      <td>
                        <?php
                        $depUser = $connect->query("SELECT * FROM userdepartment WHERE departmentId = '$departId'");
                        while ($userDepData = $depUser->fetch()) {
                          $depUserId = $userDepData['userId'];
                          $uName = $connect->query("SELECT nickname FROM users WHERE id = '$depUserId'");
                          $uData = $uName->fetchColumn();
                        ?>
                          <p>
                            <?php echo $uData; ?>
                            <a href="<?php echo BASE_URL; ?>includes/Pages/devision-delete.php?depId=<?php echo $userDepData['id'] ?>"><i class="bi bi-x-circle text-danger"></i></a>
                          </p>
                        <?php
                        }
                        ?>
                      </td>

                      <td>
                        <center>
                          <form action="department_logo.php" method="post" enctype="multipart/form-data">
                            <table>
                              <tr>
                                <td>
                                  <input type="hidden" class="form-control" name="id" readonly value="<?php echo $row2['id'] ?>">
                                  <input type="file" class="form-control" name="file" accept="image/*">
                                </td>
                                <td> <input style="margin:5px;" type="submit" name="submit" value="Upload" class="btn btn-info"></td>
                              </tr>
                            </table>
                          </form>
                        </center>
                      </td>
                      <td><a class="btn btn-soft-success btn-xs" onclick="document.getElementById('id_head').value='<?php echo $row2['id'] ?>';
                                    document.getElementById('school_name_head').value='<?php echo $row2['school_name'] ?>';
                                    document.getElementById('department_name_head').value='<?php echo $row2['department_name'] ?>';
                                    document.getElementById('description').value='<?php echo $row2['description'] ?>';document.getElementById('location').value='<?php echo $row2['location'] ?>';document.getElementById('contact_number').value='<?php echo $row2['contact_number'] ?>';
                                    document.getElementById('email').value='<?php echo $row2['email'] ?>';document.getElementById('website').value='<?php echo $row2['website'] ?>';document.getElementById('additional').value='<?php echo $row2['additional'] ?>';
                                    " data-bs-toggle="modal" data-bs-target="#edit_department_head"><i class="bi bi-pen-fill"></i></a>
                        <a class="btn btn-soft-danger btn-xs" href="department_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill"></i></a>
                        <a class="btn btn-soft-primary btn-xs editUserDepart" onclick="document.getElementById('id_head1').value='<?php echo $row2['id'] ?>';" data-bs-toggle="modal" data-bs-target="#add_user1" name="<?php echo $row2['id'] ?>" title="Add User"><i class="bi bi-people"></i></a>
                        <a onclick="document.getElementById('delDepartId').value='<?php echo $row2['id'] ?>';" class="btn btn-soft-danger btn-xs deleteUser" href="<?php echo BASE_URL;?>includes/Pages/department_delete.php?id=<?php echo $row2['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteUserDepartMent" name="<?php echo $row2['id'] ?>" title="Remove User"><i class="bi bi-person-x"></i></a>


                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
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

<div class="modal fade" id="deleteUserDepartMent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Delete User From Department</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/setDepartment.php" method="POST">
            <input class="form-control" type="hidden" name="delDepartId" value="" id="delDepartId">
            <table class="table table-striped table-bordered" id="usertable">
              <input style="margin:5px;" class="form-control" type="text" id="usersearch" onkeyup="userlist()" placeholder="Search for names.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white"><input type="checkbox" id="select-all-userremove"></th>

                <th class="text-white">Name</th>
                <th class="text-white">User Id</th>
                <th class="text-white">Profile image</th>
                <th class="text-white">Role</th>


              </thead>
              <tbody id="delUserTable"></tbody>
            </table>
            <input type="submit" value="Remove" name="deleteUserDepartment" class="btn btn-danger" />
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- edit phase modal -->
<div class="modal fade" id="editphase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Phase</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="edit_phase.php" style="width:80%;">
            <?php if (isset($_SESSION['ctp_value'])) { ?>
              <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
            <?php } ?>
            <input class="form-control" type="hidden" name="id" value="" id="phid">
            <label class="text-dark">Phase Name</label>
            <input class="form-control" type="text" name="phase_name" value="" id="phase_name">
            <input style="margin:5px;" class="btn btn-success" type="submit" name="saveit" value="Submit">
          </form>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- edit phase modal -->
<div class="modal fade" id="add_user1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">User List</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/setDepartment.php" method="POST">
            <input class="form-control" type="hidden" name="departId" value="" id="id_head1">
            <table class="table table-striped table-bordered" id="usertable11">
              <input style="margin:5px;" class="form-control" type="text" id="usersearch11" onkeyup="userlist11()" placeholder="Search for names.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white"><input type="checkbox" id="select-all-useradd"></th>

                <th class="text-white">Name</th>
                <th class="text-white">User Id</th>
                <th class="text-white">Profile image</th>
                <th class="text-white">Role</th>


              </thead>
              <tbody id="userTableModal"></tbody>
            </table>
            
        </center>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Add" name="addUserDepartment" class="btn btn-success" />
          </form>
      </div>
    </div>
  </div>
</div>

<!-- add color modal modal -->
<div class="modal fade" id="color_phase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Color</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form action="<?php echo BASE_URL; ?>includes/Pages/insert_color.php">
            <input class="form-control" type="hidden" name="id" value="" id="pp_id">
            <label for="color" style="font-size:large; font-weight:bold;">Select a color for Division:</label><br>
            <input type="color" id="color" name="favcolor" required><br>
            <hr>
            <input type="submit" class="btn btn-success" style="float:right;" name="phase_color">
          </form>

        </center>
      </div>
    </div>
  </div>
</div>


<!-- edit phase modal -->
<div class="modal fade" id="objective" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Add Objective</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
          <form method="post" action="insert_objective.php" style="width:80%;">
            <?php if (isset($_SESSION['ctp_value'])) { ?>
              <input class="form-control" type="hidden" name="ctp" value="<?php echo $ctp ?>">
            <?php } ?>
            <input class="form-control" type="hidden" name="id" value="" id="pid">
            <!-- <input class="form-control" type="" name="id" value="" id="p_name"> -->
            <input class="form-control" type="text" name="objective">
            <input style="margin:5px;" class="btn btn-success" type="submit" name="saveit" value="Submit">
          </form>
        </center>
      </div>
    </div>
  </div>
</div>


<!--Script for add multiple phases-->

<script type="text/javascript">
  $(document).ready(function() {


    var html = '<tr>\
                          <td style="text-align: center;"><input type="text" name="main[]" id="mainval" class="form-control" value="<?php echo $ma_name; ?>" readonly/></td>\
                          <td style="text-align: center;"><input type="text" placeholder="Enter Department" name="dep[]" id="depval" class="form-control" value="" required/> </td>\
                          <td><button type="button" name="remove_dep" id="remove_dep" class="btn btn-soft-danger"><i class="bi bi-dash-circle-fill"></i></button></td>\
                      </tr>'
    var max = 100;
    var a = 1;

    $("#add_dep").click(function() {
      if (a <= max) {
        $("#table-field-department").append(html);
        a++;
      }
    });
    $("#table-field-department").on('click', '#remove_dep', function() {
      $(this).closest('tr').remove();
      a--;
    });
  });
</script>

<script>
  function phase() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("phasesearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("phasetable");
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

<script>
        function departmentheadAll() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("departmentsearchheadAll");
            filter = input.value.toUpperCase();
            table = document.getElementById("departmenttableheadAll");
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

<script>
  function userlist11() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("usersearch11");
    filter = input.value.toUpperCase();
    table = document.getElementById("usertable11");
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

<script>
  $(".editUserDepart").on("click", function() {
    var dId = $(this).attr("name");
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL; ?>includes/Pages/setDepartment.php",
      data: {
        dId: dId
      },
      dataType: "html",

      success: function(resultData) {
        // alert(resultData);
        $("#userTableModal").empty();
        $("#userTableModal").html(resultData);
      }
    });
  });
</script>

<script>
  $(".deleteUser").on("click", function() {
    var dUserId = $(this).attr("name");
    $.ajax({
      type: 'POST',
      url: "<?php echo BASE_URL; ?>includes/Pages/setDepartment.php",
      data: {
        dUserId: dUserId
      },
      dataType: "html",

      success: function(resultData1) {
        // alert(resultData1);
        $("#delUserTable").empty();
        $("#delUserTable").html(resultData1);
      }
    });
  });
</script>


  <script>
    document.getElementById('select-all-useradd').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

    <script>
    document.getElementById('select-all-userremove').onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
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