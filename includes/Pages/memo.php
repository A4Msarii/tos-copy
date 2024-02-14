<?php
$std_course = "";
?>
<?php
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Memo Log</title>
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
    $classcolor = "SELECT * FROM gradesheet where user_id='$student'";
    $classcolorst = $connect->prepare($classcolor);
    $classcolorst->execute();

    if ($classcolorst->rowCount() > 0) {
      $class = "btn btn-success";
    } else {
      $class = "btn btn-dark";
    }
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
            <img style="height:35px; width:35px;" src="<?php echo BASE_URL; ?>assets/svg/3d_icons_green/Memorandum Icon.png">
            Memorandum For Record
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
                $absQ = $connect->query("SELECT * FROM memo WHERE student_id = '$fetchuser_id' AND categoryId = 'absent'");
                $absDay = 0;
                while($absData = $absQ->fetch()){
                  $absDay = $absDay + $absData['memomarks'];
                }
                ?>
                <label style="display: flex; font-size:x-large; color:white; padding:5px; margin:5px;">Sick 
                  <input type="hidden" value="" name=""> 
                   <p> - <?php echo $absDay; ?> Days</p>
                </label>
                
              </div>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">

              <?php if (isset($_SESSION['permission']) && $permission['Create_memo'] == "1") { ?>
                <form class="insert-phases" id="memo" method="post" action="insert_memo_data.php" enctype="multipart/form-data">
                  <input type="hidden" name="pageId" value="0" />

                  <?php include ROOT_PATH . 'includes/Pages/memoform.php'; ?>



                </form>
              <?php } ?>
            </div>

            <hr>
            <div class="card-body">
              <table style=" margin: 5px; padding:5px;" class="table table-striped table-bordered table-hover" id="actualtable">
                <input style="width:80%; display: none;" class="form-control" type="text" id="actualsearch" onkeyup="actual()" placeholder="Search for Actual Class.." title="Type in a name"><br>
                <thead class="bg-dark">
                  <!-- <th style="color:black; font-weight: bolder;">Sr No</th> -->
                  <th style="font-weight: bolder;" class="text-white">Instructor</th>
                  <th style="font-weight: bolder;" class="text-white">Date</th>
                  <th style="font-weight: bolder;" class="text-white">Topic</th>
                  <th style="font-weight: bolder;" class="text-white">Marks</th>
                  <th style="font-weight: bolder;" class="text-white">File</th>
                  <th style="font-weight: bolder;" class="text-white">Comment</th>
                  <?php if (isset($_SESSION['permission']) && $permission['Edit_memo'] == "1" || $permission['Delete_memo'] == "1") {  ?>
                  <th style="color:black; font-weight: bolder;">Action</th>
                <?php } ?>
                </thead>
                <?php
                $output = "";
                $query = "SELECT * FROM memo where course_id='$std_course1' AND student_id='$fetchuser_id'";
                $statement = $connect->prepare($query);
                $statement->execute();
                if ($statement->rowCount() > 0) {
                  $result = $statement->fetchAll();
                  $sn = 1;
                  foreach ($result as $row) {
                    $fileId = $row['fileName'];
                    $std_in1 = $row['inst_id'];
                    if ($row['topic'] == "") {
                      $tId = $row['categoryId'];
                      if (is_numeric($row['categoryId'])) {
                        $tQ = $connect->query("SELECT category FROM memocate WHERE id = '$tId'");
                        $tData = $tQ->fetchColumn();
                      } else {
                        $tData = $row['categoryId'];
                      }
                    } else {
                      $tData = $row['topic'];
                    }

                    $instr_name1 = $connect->prepare("SELECT name FROM users WHERE id=?");
                    $instr_name1->execute([$std_in1]);
                    $name21 = $instr_name1->fetchColumn();
                    
                ?>
                    <tr>
                      <!-- <td><?php echo $sn++;
                                $id = $row['id'] ?></td> -->
                      <td><?php echo $name21; ?></td>
                      <td><?php echo $row['date'] ?></td>
                      <td><?php if($tData == "absent"){ echo "Sick"; }else{ echo $tData; } ?></td>
                      <td><?php echo $row['memomarks'] ?></td>
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
                      <td><?php echo $row['comment'] ?></td>
                      <?php if ($role == "super admin") { ?>
                        <td>
                          <?php
                          if (isset($_SESSION['permission']) && $permission['Edit_memo'] == "1") { 
                          if($tData == "absent"){
                          ?>
                          <a href="" style="margin: 10px;" id="<?php echo $id = $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#editAbsent" class="editAbsent"><i class="bi bi-pen-fill text-success"></i>
                          </a>
                          <?php } else{
                            ?>
                            <a href="" style="margin: 10px;" id="<?php echo $id = $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#editmemo" class="editMemo"><i class="bi bi-pen-fill text-success"></i>
                            <?php }
                            }
                            if (isset($_SESSION['permission']) && $permission['Delete_memo'] == "1") { 
                            ?>
                          <a href="memo_delete.php?id=<?php echo $id ?>"><i class="bi bi-trash-fill text-danger"></i></a>
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
 
  <!--Modal for Edit Memo-->
  <div class="modal fade" id="editmemo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Edit Memorandum Record</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_memo.php" enctype="multipart/form-data" id="disiForm">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editAbsent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Edit Memorandum Record</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit_memo.php" enctype="multipart/form-data" id="absentForm">
          </form>
        </div>
      </div>
    </div>
  </div>


  <!--Script for adding multiple actual classes-->

  <!-- <script type="text/javascript">
    $(document).ready(function() {

      var max = 5;
      var a = 1;

      $("#add_memo").click(function() {
        if (a <= max) {

          var html = '<tr>\
          <td style="display:none;"><input type="text" name="inst" class="form-control" value="<?php echo $username; ?>">\
                                  <input type="hidden" value="<?php echo $user_id ?>" name="inst_id[]" required>\
                                </td>\
					                <td><input style="width:50px;" type="date" name="date[]" class="form-control" placeholder="Enter Date" required></td>\
									<td><select name="topic[]" id=""class="form-control fetchMark" required data-name="markVal' + a + '"><?php echo $option; ?></select></td>\
									<td><input type="text" id="markVal' + a + '" name="memomarks[]" class="form-control" placeholder="Marks" required></td>\
                  <td><input type="file" name="attachemnt[]" class="form-control"></td>\
                                <td style="width:50%;"><textarea style="height:150px; width:100%;" maxlength="100" type="text" name="comment[]" class="form-control" placeholder="Comment" required></textarea></td>\
									<td><button type="button" name="remove_memo" id="remove_memo" class="btn btn-outline-danger"><i class="bi bi-dash-square-fill"></i></button></td>\
								</tr>';

          $("#table-field-memo").append(html);
          a++;
        }
      });
      $("#table-field-memo").on('click', '#remove_memo', function() {
        $(this).closest('tr').remove();
        a--;
      });
    });
  </script> -->

<script>
  $(".editMemo").on("click", function() {
    const editId = $(this).attr("id");
    $.ajax({
      type: 'POST',
      url: "insert_memo_data.php",
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
      url: "insert_memo_data.php",
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
  $("#table-field-memo").on('change', '.fetchMarkMemo', function() {
    const selVal = $(this).val();
    const selAttr = $(this).data("name");
    const otherInput = $(this).data("value");

    if (selVal == "other") {
      $("#" + otherInput).css("display", "block");
      $("#" + selAttr).attr('readonly', false);
      $("#" + otherInput).attr("name", "topic[]");
      $("#" + selAttr).val('');
      $(this).removeAttr("name");

    } else if(selVal == "absent"){
      $(".marks").css("display", "none");
      $(".days").css("display", "");
    }else {
      $("#" + otherInput).css("display", "none");
      $("#" + otherInput).removeAttr("name");
      $(this).attr("name", "topic[]");
      $.ajax({
        type: 'POST',
        url: "insert_memo_data.php",
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

<script>
  // Initialize an object to store values for each item
  const itemValues = {};

  // Creation of increment function
  function increment(value) {
    const uId = <?php echo $fetchuser_id; ?>;
    if (!itemValues[value]) {
      itemValues[value] = 0; // Initialize the value to 0 for new items
    }
    itemValues[value]++; // Increment the value for the specific item
    // document.getElementById("counting" + value).innerText = itemValues[value];
    document.getElementById("counting").setAttribute('value', itemValues[value]);
    // alert(UId);

    $.ajax({
      type: 'POST',
      url: "insert_memo_data.php",
      data: {
        uId: uId,
        day: itemValues[value],
      },
      dataType: "html",

      success: function(resultData) {
        $("#counting").val(itemValues[value]);
      }
    });
  }

  // Creation of decrement function
  function decrement(value) {
    const uId = <?php echo $fetchuser_id; ?>;
    if (!itemValues[value]) {
      itemValues[value] = 0; // Initialize the value to 0 for new items
    }
    if (itemValues[value] > 0) {
      itemValues[value]--; // Decrement the value for the specific item if it's greater than 0
      // document.getElementById("counting" + value).innerText = itemValues[value];
      document.getElementById("counting").setAttribute('value', itemValues[value]);
      $.ajax({
      type: 'POST',
      url: "insert_memo_data.php",
      data: {
        uId: uId,
        day: itemValues[value],
      },
      dataType: "html",

      success: function(resultData) {
        $("#counting").val(itemValues[value]);
      }
    });
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