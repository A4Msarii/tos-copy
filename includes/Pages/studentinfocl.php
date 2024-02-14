<div class="col-lg-10 mb-3 mb-lg-5">
  <!-- Card -->
  <div class="card card-hover-shadow h-100" style="border:0.001rem solid #dddddd;">

    <!-- Body -->
    <div class="card-body">
      <div class="row">
        <div class="col-6">



          <div class="d-flex align-items-center">
            <?php
            
            if (isset($_REQUEST['std_id'])) {
              $fetchuser_id = $_COOKIE['student'] = $_REQUEST['std_id'];
              if(isset($_REQUEST['noti_id'])){
              $noti_id = $_REQUEST['noti_id'];
              }else{
                $noti_id = "";
              }

              $name = "SELECT * FROM users where id='$fetchuser_id'";
              $stname2 = $connect->prepare($name);
              $stname2->execute();

              if ($stname2->rowCount() > 0) {
                $rename2 = $stname2->fetchAll();
                foreach ($rename2 as $rowname2) {
                  $fetchname = $rowname2['name'];
                  $fetchid = $rowname2['studid'];
                  $fetchrole = $rowname2['role'];
                  $fetchphone = $rowname2['phone'];
                  $fetchemail = $rowname2['email'];
                  $fetchuser_id = $rowname2['id'];
                  $fetchnickname = $rowname2['nickname'];
                  $fetchuser_image = $rowname2['file_name'];
                }
              }
              $cr_name_data = "SELECT * FROM newcourse where StudentNames='$fetchuser_id'";
              $cr_st1 = $connect->prepare($cr_name_data);
              $cr_st1->execute();

              if ($cr_st1->rowCount() > 0) {
                $cr_result1 = $cr_st1->fetchAll();
                foreach ($cr_result1 as $row1) {
                  $CourseCode11 = $row1['CourseCode'];
                  $Coursename11 = $row1['nick_name'];
                  $ctp_v = $row1['CourseName'];
                  $values_c = $row1['Courseid'];
                }
              }
              $cr_name_data1 = "SELECT * FROM newcourse where CourseCode='$CourseCode11' and CourseName='$ctp_v' group by CourseCode,CourseName";
              $cr_st11 = $connect->prepare($cr_name_data1);
              $cr_st11->execute();

              if ($cr_st11->rowCount() > 0) {
                $cr_result11 = $cr_st11->fetchAll();
                foreach ($cr_result11 as $row11) {
                  $values_c1 = $row11['Courseid'];
                }
              }
              $cr_name = "SELECT * FROM ctppage where CTPid='$ctp_v'";
              $cr_st = $connect->prepare($cr_name);
              $cr_st->execute();

              if ($cr_st->rowCount() > 0) {
                $cr_result = $cr_st->fetchAll();
                foreach ($cr_result as $row) {

                  $std_course1 = $row['CTPid'];
                  $std_course = $row['course'];
                  $Total_type_maarks = $row['total_mark'];
                  $course_code = $row['symbol'];
                }
              }
            ?>
              <input type="hidden" value="<?php echo $fetchuser_id ?>" id="set_values1s">
              <input type="hidden" value="<?php echo $values_c1 ?>" id="set_values1s1">
              <input type="hidden" value="<?php echo $ctp_v ?>" id="set_values1s11">
              <input type="hidden" value="<?php echo $course_code . ' - ' . '0' . $CourseCode11 ?>" id="get_name_co_s">
              <script>
                $(document).ready(function() {
                  var set_values1s = $('#set_values1s').val();
                  var set_values1s1 = $('#set_values1s1').val();

                  var set_values1s11 = $('#set_values1s11').val();

                  var course1 = sessionStorage.getItem('id');
                  var get_name_co_s = $('#get_name_co_s').val();
                  $('#get_co_name').html(get_name_co_s);
                  document.cookie = "phpgetcourse = " + set_values1s11;

                  if (set_values1s1) {

                    $.ajax({
                      type: 'POST',
                      url: '../selec_std1.php',
                      data: 'courseid=' + set_values1s1,
                      success: function(html) {
                        sessionStorage.setItem('id', set_values1s1);
                        document.cookie = "allstudent = " + html;
                        $('#state').html(html);
                        sessionStorage.setItem('student', set_values1s);
                        document.cookie = "student = " + set_values1s;
                        var getstudent = sessionStorage.getItem('student');
                        $('#state').val(getstudent);
                      }
                    });
                  }

                });
              </script>
            <?php

            }

            if ($fetchuser_image != null) {
              $fetchuser_image1 = BASE_URL . 'includes/Pages/upload/' . $fetchuser_image;
            } else {
              $fetchuser_image1 = BASE_URL . 'includes/Pages/avatar/avtar.png';
            }
            $xString4 = str_repeat("x", $get_clone_ides);
            ?>

            <div class="avatar avatar-lg avatar-circle" style="height: 150px; width:150px;">
              <img style="height:150px; width:150px;" class="avatar" src="<?php echo $fetchuser_image1; ?>" alt="Logo">
            </div>
            <div class="flex-grow-2 ms-5">
              <h1 class="mb-0 text-secondary" style="font-weight:bold; font-size:xxx-large; font-family: cursive;"><?php echo $fetchnickname ?></h1>
              <span class="card-text text-body text-dark" style="font-weight:bold;"><?php echo $course_code . ' - ' . '0' . $CourseCode11; ?></span><br>
              <span class="card-text text-body text-dark" style="font-weight:bold;"><?php echo $Coursename11; ?></span><br>
              <span class="card-text text-body text-dark" style="font-weight:bold;"><?php echo $class . $xString4; ?></span>
            </div>
          </div>




        </div>
        <div class="col-6">
          <!-- <button class="btn btn-success"><a style="color:white; text-decoration: none;" href="prereuisite.php">Add</a></button> -->
          <h1>Prerequisites</h1>
          <?php

          $fet = "SELECT * FROM prereuisite_data WHERE class_id='$classid' AND class_table='$class_name' group by class_id,class_table,id";

          $statement = $connect->prepare($fet);
          $statement->execute();
          $result = $statement->fetchAll();
          foreach ($result as $row1) {
            $symbol_id1 = $row1["prereui_id"];
            $table_name1 = $row1["prereui_table"];
            $select_ctp = $connect->prepare("SELECT ctp FROM $table_name1 WHERE id=?");
            $select_ctp->execute([$symbol_id1]);
            $select_ctp_id = $select_ctp->fetchColumn();

            $select_phase = $connect->prepare("SELECT phase FROM $table_name1 WHERE id=?");
            $select_phase->execute([$symbol_id1]);
            $select_phase_id = $select_phase->fetchColumn();
            $fetch_grade1 = $connect->prepare("SELECT id FROM gradesheet where class=? and class_id=? and course_id=? and phase_id=? and user_id=?");
            $fetch_grade1->execute([$table_name1, $symbol_id1, $select_ctp_id, $select_phase_id, $fetchuser_id]);
            $grade1 = $fetch_grade1->fetchColumn();
            if ($grade1 == "") {
              $class = "btn btn-danger";
            } elseif ($grade1 != "") {
              $class = "btn btn-success";
            }
            if ($table_name1 == "academic") {
              $get_color = $connect->prepare("SELECT permission FROM acedemic_stu WHERE acedemic_id=? and std_id=?");
              $get_color->execute([$symbol_id1, $fetchuser_id]);
              $value_per = $get_color->fetchColumn();
              if ($value_per == '1') {
                $class = "btn btn-success";
              }
            }
            if ($table_name1 == "actual") {
              $q = $connect->prepare("SELECT symbol FROM $table_name1 WHERE id=?");
            } else if ($table_name1 == "sim") {
              $q = $connect->prepare("SELECT shortsim FROM $table_name1 WHERE id=?");
            } else if ($table_name1 == "academic") {
              $q = $connect->prepare("SELECT shortacademic FROM $table_name1 WHERE id=?");
            } else if ($table_name1 == "test") {
              $q = $connect->prepare("SELECT shorttest FROM $table_name1 WHERE id=?");
            }
            $q->execute([$symbol_id1]);
            $name = $q->fetchColumn();
          ?>

            <ul style=" list-style-type: none; display: inline-block;">
              <li style="text-decoration: none;" class="<?php echo $class ?>"><?php echo $name; ?></li>
            </ul>
          <?php }
          ?>
        </div>
      </div>
    </div>
    <!-- End Body -->
  </div>
  <!-- End Card -->
</div>