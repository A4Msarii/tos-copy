<div class="row justify-content-center">

  <div class="col-lg-12 mb-3 mb-lg-5">
    <!-- Card -->
    <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">
      <!-- Header -->

      <!-- Body -->
      <div class="card-body">

        <table class="table table-striped table-bordered table-hover" id="examtabtable">
          <input style="margin:5px;" class="form-control" type="text" id="examtab_search" onkeyup="examtab_search()" placeholder="Search for Exam Name.." title="Type in a name">
          <thead class="bg-dark">
            <th class="text-white">Sr No</th>
            <th class="text-white">Exam For</th>
            <th class="text-white">Exam Name</th>
            <th class="text-white">Question Number</th>
            <th class="text-white">Difficulty</th>
            <th class="text-white">Exam Type</th>
            <th class="text-white">Exam Marks</th>
            <th class="text-white">Passing Marks</th>
            <th class="text-white">Duration</th>
            <th class="text-white">Date</th>
            <th class="text-white" colspan="2">Action</th>
          </thead>
          <tbody>
            <?php
            $examNameData = ""; $examNameData1 = "";
            $fetchExam = $connect->query("SELECT * FROM examname order by id desc");
            $sn_val = 1;
            while ($examData = $fetchExam->fetch()) {

              $examFor = $examData['examFor'];
              $exam_id= $examData['id'];
              if ($examFor == "course") {
                $coursed_ided=$examData['course_id'];
                $sql = "SELECT CourseName, CourseCode FROM newcourse WHERE Courseid = :course_id";
                $stmt = $connect->prepare($sql);
                $stmt->bindParam(':course_id', $coursed_ided, PDO::PARAM_INT);
                $stmt->execute();
                $result1333 = $stmt->fetch(PDO::FETCH_ASSOC);
               if ($result1333) {
                    $CourseNamess=$result1333['CourseName'];
                    $CourseCodess=$result1333['CourseCode'];
               }
                $ctpnames1 = $connect->query("SELECT symbol FROM ctppage WHERE CTPid = '$CourseNamess'");
                $ctpnames11 = $ctpnames1->fetchColumn();
                $examNameData=$ctpnames11.' -0'.$CourseCodess;
              } else if ($examFor == "par") {
               $query7 = "SELECT users.nickname
                FROM users
                JOIN studentexam ON studentexam.examSubject = users.id where examId ='$exam_id';";
                $statement = $connect->prepare($query7);
                $statement->execute();
               
                if($statement->rowCount() > 0)
                    {
                        $result = $statement->fetchAll();
                        $sn=1;
                        foreach($result as $row1)
                        {
                          $examNameData1.='<option>'.$row1['nickname'].'</option>';
                        }
                      }
                      $examNameData='<select class="form-control">'.$examNameData1.'</select>';
              } else if ($examFor == "dep") {
                $examdip = $examData['dep_id'];
                $examName = $connect->query("SELECT department_name FROM homepage WHERE id = '$examdip'");
                $examNameData = $examName->fetchColumn();
              } else if ($examFor == "everyone") {

                $examNameData = "Everyone";
              } else {
                $examName = $connect->query("SELECT roles FROM roles WHERE id = '$examFor'");
                $examNameData = $examName->fetchColumn();
              }
              $exam_name = "";
              if ($examData['course_id'] == "") {
                $exam_name = $examData['examName'];
              } else {
                $exam_name1 = $examData['examName'];
                $fetch_exam_name = $connect->query("SELECT shorttest FROM test WHERE id = '$exam_name1'");
                $exam_name = $fetch_exam_name->fetchColumn();
              }
            ?>
              <tr>
                <td><?php echo $sn_val++; ?></td>
                <td><?php echo $examNameData; ?></td>
                <td><?php echo $exam_name; ?></td>
                <td><?php echo $examData['questionNumber']; ?></td>
                <td><?php
                    if ($examData['exam_created_type'] == NULL) {
                      if ($examData['percentageEasy'] != 0) {
                        echo "Easy : " . $examData['percentageEasy'] . "<br>";
                      }
                      if ($examData['percentageMedium'] != 0) {
                        echo "Medium : " . $examData['percentageMedium'] . "<br>";
                      }
                      if ($examData['percentageHard'] != 0) {
                        echo "Hard : " . $examData['percentageHard'] . "<br>";
                      }
                      if ($examData['percentageveryhard'] != 0) {
                        echo "Very Hard : " . $examData['percentageveryhard'] . "<br>";
                      }
                    } else {
                      echo "-";
                    }
                    ?></td>
                <td><?php if ($examData['exam_Types'] == "once") {
                    ?>
                    <img src="<?php echo BASE_URL; ?>assets/exam_imag/once3d.png" style="width:20px;height:20px">
                  <?php  } else { ?>
                    <img src="<?php echo BASE_URL; ?>assets/exam_imag/repeat1.png" style="width:20px;height:20px">
                  <?php  } ?>
                </td>
                <td><?php echo $examData['total_marks']; ?></td>
                <td><?php echo $examData['passing_marks']; ?></td>
                <td><?php $startTime = new DateTime($examData['start_hours']);
                    $endTime = new DateTime($examData['end_hours']);

                    $duration = $startTime->diff($endTime);
                    $duration_string_h = $duration->format('%H');
                    $duration_string_i = $duration->format('%I');
                    echo $duration_string_h . " hr " . $duration_string_i . "min "; ?></td>

                <td><?php echo $examData['dates']; ?></td>
                <td>
                  <a style="padding: 5px;padding-top: 2px;padding-bottom: 2px;" class="btn btn-soft-success btn-xs edit_fome" data-bs-toggle="modal" data-bs-target="#editexam" id="<?php echo $examData['id'] ?>"><i class="bi bi-pen-fill"></i></a>
                  <a style="padding: 5px;padding-top: 2px;padding-bottom: 2px;" class="btn btn-soft-danger btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/test/testdelete.php?id=<?php echo $examData['id'] ?>"><i class="bi bi-trash-fill"></i></a>
                  <?php
                  $exam_idesss=$examData['id'];
                  $nRows1111 = $connect->query("select count(*) from notifications where data='$exam_idesss' and extra_data='test scheduled'")->fetchColumn(); 
                  if($nRows1111==0){
                  ?>
                  <a style="padding: 5px;padding-top: 2px;padding-bottom: 2px;" class="btn btn-soft-dark btn-xs" href="send_noti_test.php?id=<?php echo $examData['id']; ?>"><i class="bi bi-bell-fill"></i></a>
                  <?php
                  }
                  if ($examData['exam_created_type'] == NULL) { ?>
                    <a style="padding: 5px;padding-top: 2px;padding-bottom: 2px;" class="btn btn-soft-warning btn-xs fetch_data_cet" data-bs-toggle="modal" data-bs-target="#fetch_cat_exams" id="<?php echo $examData['id']; ?>"><i class="bi bi-card-list"></i></a><?php } ?>
                  <?php if ($examFor == "par") { ?>
                    <a style="padding: 5px;padding-top: 2px;padding-bottom: 2px;" class="btn btn-soft-info btn-xs fetch_data_per" data-bs-toggle="modal" data-bs-target="#fetch_per_exams" id="<?php echo $examData['id']; ?>" onclick="document.getElementById('get_id_ex').value='<?php echo $examData['id'] ?>';"><i class="bi bi-people-fill"></i></a>
                  <?php } ?>
                  <?php
                  $code_values = $examData['code'];
                  if ($examData['exam_created_type'] == NULL) {
                    if ($code_values == "yes") { ?>
                      <a class="btn btn-soft-primary btn-xs" href="" onclick="document.getElementById('get_id_exams').value='<?php echo $examData['id'] ?>';" data-bs-toggle="modal" data-bs-target="#create_exma"><i class="bi bi-calendar3-week"></i></a>
                    <?php } else {
                    ?>
                      <a style="padding: 5px;padding-top: 2px;padding-bottom: 2px;" class="btn btn-soft-primary btn-xs" href="<?php echo BASE_URL; ?>includes/Pages/Test/create_exam_user.php?id=<?php echo $examData['id'] ?>"><i class="bi bi-calendar3-week"></i></a>
                  <?php
                    }
                  } ?>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- End Body -->
    </div>
    <!-- End Card -->
  </div>
</div>
<div class="modal fade" id="create_exma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Indivisual Method Data</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="create_exam_user.php" method="get">
          <input type="hidden" id="get_id_exams" class="form-control" name="id">
          <label>Your Exam Code</label>
          <input type="text" readonly id="randomCode" class="form-control" name="code">
          <center><button class="btn btn-soft-success btn-sm" title="copy" id="copyButton" type="button"><i class="bi bi-files-alt"></i></button></center>
          <br><input type="submit" class="btn btn-primary" value="create Exam">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editcategoryexam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Indivisual Method Data</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="edit_cat_number.php" method="post">
          <input type="hidden" id="get_exam_ides" class="form-control" name="id">
          <label>Edit Percentage</label>
          <input type="number" class="form-control" name="number" id="get_exam_name_per">
          <br><input type="submit" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="fetch_cat_exams" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Category Exam</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered" id="get_cat_datass">

          <thead>
            <tr>
              <th>SN</th>
              <th>category</th>
              <th>percentage</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody></tbody>

        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="fetch_per_exams" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">User added in Exam <button type="button" class="btn btn-soft-info get_per_datas_va" data-bs-toggle="modal" data-bs-target="#add_users_data"><i class="bi bi-person-plus-fill"></i></button></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="get_id_ex">
        <table class="table table-striped table-bordered" id="get_per_datass">

          <thead>
            <tr>
              <th>SN</th>
              <th>user</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody></tbody>

        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="add_users_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">User added in Exam </h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="add_new_usertoexam.php">
          <input type="hidden" id="get_value_exam_ided" name="exam_id">
          <table class="table table-striped table-bordered" id="get_per_datass_val">

            <thead>
              <tr>
                <th>SN</th>
                <th>user</th>
              </tr>
            </thead>
            <tbody>

            </tbody>

          </table>
          <input type="submit" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editexam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success" id="exampleModalLabel">Edit Exam</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="edit_exam_form.php" method="POST">

          <div id="get_cat_Edit_form">

          </div>
          <button type="submit" class="btn btn-success" style="font-size:large; font-weight:bold; float: right;">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {

    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    let randomCode = '';

    for (let i = 0; i < 8; i++) {

      const randomIndex = Math.floor(Math.random() * characters.length);

      randomCode += characters.charAt(randomIndex);

    }

    $("#randomCode").val(randomCode);

  });
</script>
<script>
  // Get the input field and copy button by their IDs
  const inputField = document.getElementById('randomCode');
  const copyButton = document.getElementById('copyButton');

  // Add a click event listener to the copy button
  copyButton.addEventListener('click', function() {
    // Select the text in the input field
    inputField.select();

    // Copy the selected text to the clipboard
    document.execCommand('copy');

    // Deselect the text (optional)
    inputField.blur();

    // Alert the user that the text has been copied (you can also use other feedback mechanisms)
    alert('Text copied to clipboard: ' + inputField.value);
  });
</script>


<script>
  function examtab_search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("examtab_search");
    filter = input.value.toUpperCase();
    table = document.getElementById("examtabtable");
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
  $(".fetch_data_cet").click(function() {
    var id = $(this).attr('id');
    if (id) {
      $.ajax({
        type: 'POST',
        url: 'fetch_cat_ex.php',
        data: 'id=' + id,
        success: function(response) {

          $('#get_cat_datass tbody').empty();
          $("#get_cat_datass tbody").html(response);
        }
      });
    }
  });
  $(".fetch_data_per").click(function() {
    var id = $(this).attr('id');

    if (id) {
      $.ajax({
        type: 'POST',
        url: 'fetch_per_ex.php',
        data: 'id=' + id,
        success: function(response) {
          // console.log(response);
          $('#get_per_datass tbody').empty();
          $("#get_per_datass tbody").html(response);
        }
      });
    }
  });
  $(".get_per_datas_va").unbind('click').click(function() {
    var id = $("#get_id_ex").val();
    $("#get_value_exam_ided").val(id);

    if (id) {
      $.ajax({
        type: 'POST',
        url: 'fetch_person_ex.php',
        data: 'id=' + id,
        success: function(response) {
          // console.log(response);

          // Clear the table before appending new data
          $('#get_per_datass_val tbody').empty();

          // Append the new data
          $("#get_per_datass_val tbody").append(response);
        }
      });
    }
  });
  $(".edit_fome").click(function() {
    var id = $(this).attr('id');

    if (id) {
      $.ajax({
        type: 'POST',
        url: 'fetch_edit_form_exam.php',
        data: 'id=' + id,
        success: function(response) {
          // console.log(response);

          // Clear the table before appending new data
          $('#get_cat_Edit_form').empty();

          // Append the new data
          $("#get_cat_Edit_form").append(response);
        }
      });
    }
  });
</script>