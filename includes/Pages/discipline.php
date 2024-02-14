<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
$std_course = "";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Descipline Log</title>
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

    ?>
    <?php
    if (isset($_GET['ctp'])) {
      $ctp = $_GET['ctp'];
      $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
      $statement = $connect->prepare($ctp_id);
      $statement->execute();

      if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
        $sn = 1;
        foreach ($result as $row) {
          $course = $row['course'];
        }
      }
    }
    if (isset($_GET['phase_id'])) {
      $phase_id = "";
      $phase_id = $_GET['phase_id'];
    }
    if (isset($_GET['phase'])) {
      $phase = "";
      $phase = $_GET['phase'];
    }
    ?>
  </div>
  <!--Main contect We need to insert data here-->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div>
      <div class="content container-fluid" style="height: 30rem;">
        <!-- Page Header -->
        <?php include ROOT_PATH . 'login/alertboxheader.php'; ?>
        <div class="page-header" style="padding: 0px;">
          <h1 class="text-success">
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Discipline .png">
            Discipline Log
          </h1>
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
          <div class="card card-hover-shadow h-100" id="" style="border:0.001rem solid #dddddd;">
            <!-- Header -->
            <div class="card-header card-header-content-between" style="border-bottom: 2px solid lightgray;">
              <!--Student name And course name-->
              <?php include 'courcecode.php'; ?>
              <div class="col-6 d-flex justify-content-center bg-danger" style="width:auto; border-radius: 10px;">
                <!-- <label>Absent
                  <input type="hidden" value="" name="">
                </label> -->
                <?php
                $absQ = $connect->query("SELECT * FROM discipline WHERE student_id = '$fetchuser_id' AND categoryId = 'absent'");
                $absDay = 0;
                while ($absData = $absQ->fetch()) {
                  $absDay = $absDay + $absData['dismarks'];
                }
                ?>
                <label style="display: flex; font-size:x-large; color:white; padding:5px; margin:5px;">Absent
                  <input type="hidden" value="" name="">
                  <p> - <?php echo $absDay; ?> Days</p>
                </label>

              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">

               <?php if (isset($_SESSION['permission']) && $permission['Create_memo'] == "1") { ?>
                <form class="insert-phases" id="discipline" method="post" action="insert_discipline_data.php" enctype="multipart/form-data">
                  <input type="hidden" name="pageId" value="0" />
                  <?php include ROOT_PATH . 'includes/Pages/desciplineform.php'; ?>
                </form>

            </div>
            <hr style="color:black;"><?php } ?>
          <div class="card-body">
            <table style=" margin: 5px; padding:5px;" class="table table-striped table-bordered table-hover" id="actualtable">
              <input style="width:80%; display: none;" class="form-control" type="text" id="actualsearch" onkeyup="actual()" placeholder="Search for Actual Class.." title="Type in a name"><br>
              <thead class="bg-dark">
                <th class="text-white" style="font-weight: bolder;">Instructor</th>
                <th class="text-white" style="font-weight: bolder;">Date</th>
                <th class="text-white" style="font-weight: bolder;">Topic</th>
                <th class="text-white" style="font-weight: bolder;">Comment</th>
                <th class="text-white" style="font-weight: bolder;">Marks</th>
                <th class="text-white" style="font-weight: bolder;">File</th>
                <?php if (isset($_SESSION['permission']) && $permission['Edit_memo'] == "1" || $permission['Delete_memo'] == "1") {  ?>
                  <th style="color:black; font-weight: bolder;">Action</th>
                <?php } ?>
              </thead>
              <?php
              $output = "";
              $query = "SELECT * FROM discipline where student_id='$fetchuser_id'";
              $statement = $connect->prepare($query);
              $statement->execute();
              if ($statement->rowCount() > 0) {
                $result = $statement->fetchAll();
                $sn = 1;
                foreach ($result as $row) {
                  $std_in = $row['inst_id'];
                  $fileId = $row['fileName'];

                  if ($row['topic'] == "") {
                    $tId = $row['categoryId'];
                    if (is_numeric($row['categoryId'])) {
                      $tQ = $connect->query("SELECT category FROM desccate WHERE id = '$tId'");
                      $tData = $tQ->fetchColumn();
                    } else {
                      $tData = $row['categoryId'];
                    }
                  } else {
                    $tData = $row['topic'];
                  }



                  $instr_name = $connect->prepare("SELECT name FROM users WHERE id=?");
                  $instr_name->execute([$std_in]);
                  $name2 = $instr_name->fetchColumn();

              ?>
                  <tr>
                    <td><?php echo $name2; ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $tData; ?></td>
                    <td><?php echo $row['comment'] ?></td>
                    <td><?php echo $row['dismarks'] ?></td>
                    <td>
                      <?php
                      if (is_numeric($fileId)) {
                        $fetchFile = $connect->query("SELECT * FROM user_files WHERE id = '$fileId'");
                        $fileDataUser = $fetchFile->fetch();
                        if ($fileDataUser['lastName'] == "") {
                      ?>
                      <a target="_blank" href="<?php echo BASE_URL; ?>includes/Pages/files/<?php echo $fileDataUser['filename']; ?>">View</a>
                      <?php
                        }
                        if ($fileDataUser['type'] == "online") {
                          ?>
                          <a target="_blank" href="<?php echo $fileDataUser['filename']; ?>" title="<?php echo $fileDataUser['filename']; ?>">View</a>
                          <?php
                        }
                        if ($fileDataUser['type'] == "offline") {
                          ?>
                          <a class="driveLinkPer" value="<?php echo $fileDataUser['filename']; ?>" title="<?php echo $fileDataUser['filename']; ?>">View</a>
                          <?php
                        }
                      }
                      ?>
                    </td>
                    <?php  if (isset($_SESSION['permission']) && $permission['Edit_memo'] == "1" || $permission['Delete_memo'] == "1") {  ?>
                      <td>

                        <?php
                         if (isset($_SESSION['permission']) && $permission['Edit_memo'] == "1") { 
                        if ($tData == "absent") {
                        ?>
                          <a href="" style="margin: 10px;" id="<?php echo $id = $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#editAbsent" class="editAbsent"><i style="color:green;" class="bi bi-pen-fill"></i>
                          </a>
                        <?php } else { ?>
                          <a href="" style="margin: 10px;" id="<?php echo $id = $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#editdiscipline" class="editDici"><i style="color:green;" class="bi bi-pen-fill"></i>
                          </a>
                        <?php }
                        }
                        if (isset($_SESSION['permission']) && $permission['Delete_memo'] == "1") { 
                         ?>
                        <a href="discipline_delete.php?id=<?php echo $id ?>"><i style="color:red;" class="bi bi-trash-fill"></i></a>
                          <?php } ?>
                      </td>
                    <?php } ?>
                  </tr>
              <?php
                }
              } ?>
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

  <!--Edit Discipline modal-->
  <div class="modal fade" id="editdiscipline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Discipline</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_discipline.php" enctype="multipart/form-data" id="disiForm">
            <!-- <label class="text-success" type="hidden">Id</label> -->

            <center>
              <input style="margin:10px;" class="btn btn-success" type="submit" name="submit" value="Submit">
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editAbsent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-success" id="exampleModalLabel">Edit Discipline</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_discipline.php" enctype="multipart/form-data" id="absentForm">
            <!-- <label class="text-success" type="hidden">Id</label> -->

            <center>
              <input style="margin:10px;" class="btn btn-success" type="submit" name="submit" value="Submit">
            </center>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Script for adding multiple actual classes-->

  <!-- <script type="text/javascript">
    $(document).ready(function() {

      var max = 100;
      var a = 1;

      $("#add_discipline").click(function() {
        if (a <= max) {
          var html = '<tr>\
          <td style="display:none;"><input type="text" name="inst" class="form-control" value="<?php echo $username; ?>">\
                                  <input type="hidden" value="<?php echo $user_id ?>" name="inst_id[]" required>\
                                </td>\
					                <td><input style="width:50px;" type="date" name="date[]" class="form-control" placeholder="Enter Date" required></td>\
                            <td><select name="topic[]" id=""class="form-control fetchMark" required data-name="markVal' + a + '"><?php echo $option; ?></select></td>\
                            <td><input type="text" id="markVal' + a + '" name="dismarks[]" class="form-control" placeholder="Marks" required></td>\
                            <td><input type="file" name="attachemnt[]" class="form-control"></td>\
                            <td style="width:50%;"><textarea style="height:150px; width:100%;" maxlength="100" type="text" name="comment[]" class="form-control" placeholder="Comment" required></textarea></td>\
									<td><button type="button" name="remove_discipline" id="remove_discipline" class="btn btn-outline-danger"><i class="bi bi-dash-square-fill"></i></button></td>\
								</tr>';
          $("#table-field-discipline").append(html);
          a++;
        }
      });
      $("#table-field-discipline").on('click', '#remove_discipline', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script> -->




  <script>
    $(".editDici").on("click", function() {
      const editId = $(this).attr("id");
      $.ajax({
        type: 'POST',
        url: "insert_discipline_data.php",
        data: {
          editId: editId,
        },
        dataType: "html",

        success: function(resultData) {
          $("#disiForm").empty();
          $("#disiForm").html(resultData);
        }
      });
    });
  </script>

<script>
    $(".editAbsent").on("click", function() {
      const absentId = $(this).attr("id");
      $.ajax({
        type: 'POST',
        url: "insert_discipline_data.php",
        data: {
          absentId: absentId,
        },
        dataType: "html",

        success: function(resultData) {
          $("#absentForm").empty();
          $("#absentForm").html(resultData);
        }
      });
    });
  </script>

  <script>
    $("#table-field-discipline").on('change', '.fetchMarkDesci', function() {
      const selVal = $(this).val();
      const selAttr = $(this).data("name");
      const otherInput = $(this).data("value");

      if (selVal == "other") {
        $("#" + otherInput).css("display", "block");
        $("#" + selAttr).attr('readonly', false);
        $("#" + otherInput).attr("name", "topic[]");
        $("#" + selAttr).val('');
        $(this).removeAttr("name");

      } else if (selVal == "absent") {
        $(".marks").css("display", "none");
        $(".days").css("display", "");
      } else {
        $("#" + otherInput).css("display", "none");
        $("#" + otherInput).removeAttr("name");
        $(this).attr("name", "topic[]");
        $.ajax({
          type: 'POST',
          url: "insert_discipline_data.php",
          data: {
            selVal: selVal,
          },
          dataType: "html",

          success: function(resultData) {
            $("#" + selAttr).val(resultData);
            $("#" + selAttr).attr('readonly', true);
          }
        });
      }
    });
  </script>


  <!--Footer-->
  <footer id="contenthome" role="footer" class="footer">
    <?php include ROOT_PATH . 'includes/footer2.php'; ?>
  </footer>
 <script src="<?php echo BASE_URL;?>includes/Pages/loading.js"></script>
</body>

</html>