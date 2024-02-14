<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 


            if ($fetchuser_id != '0') {
              $query3 = "SELECT * FROM test_data where `course_id`='$std_course1' and student_id='$fetchuser_id' ORDER BY id DESC";
              $statement3 = $connect->prepare($query3);
              $statement3->execute();
              if ($statement3->rowCount() > 0) {
            ?>
                <td>

                  <?php $result3 = $statement3->fetchAll();
                  foreach ($result3 as $row3) {
                    $marks_test = $row3['marks'];
                    $class_id_te = $row3['test_id'];
                    $inId = $row3['userId'];

                    $inQ = $connect->query("SELECT nickname FROM users WHERE id = '$inId'");
                    $inData1 = $inQ->fetchColumn();

                    if ($inData1 == "") {
                      $inData = "-";
                    } else {
                      $inData = $inData1;
                    }

                    $class_name_fect_te = $connect->prepare("SELECT shorttest FROM test WHERE id=?");
                    $class_name_fect_te->execute([$class_id_te]);
                    $class_name_fect_tes = $class_name_fect_te->fetchColumn();

                    $class_test = "btn btn-dark";
                    if ($marks_test != "") {
                      if ($marks_test <= 50 && $marks_test >= 0) {
                        $class_test = "btn btn-danger";
                      } else if ($marks_test <= 70 && $marks_test >= 51) {
                        $class_test = "btn btn-warning";
                      } else if ($marks_test <= 80 && $marks_test >= 71) {
                        $class_test = "btn btn-secondary";
                      } else if ($marks_test <= 90 && $marks_test >= 81) {
                        $class_test = "btn btn-success";
                      } else if ($marks_test <= 100 && $marks_test >= 91) {
                        $class_test = "btn btn-primary";
                      }
                    }
                  ?>

                    <h4 id="<?php echo $class_id_te; ?>" name="test" data-bs-toggle="modal" data-bs-target="#" style="margin:5px; padding: 5px;position:relative;" onclick="document.getElementById('testId').value='<?php echo $class_id_te; ?>';" class="btnFlip testFiles"><span class="legend-indicator bg-danger"></span>
                      <span style="font-weight:bold; width:5%; text-align:center; padding:5px; border-radius: 5px; color: white;" class="badge<?php echo $class_test; ?>"><?php echo $marks_test; ?></span> -
                      <a style="font-weight:bold;"><?php echo $class_name_fect_tes ?></a>
                      <span class="tooltip-text" style="white-space: nowrap;"><?php echo $inData; ?></span>
                    </h4>

                  <?php } ?>
                </td>
            <?php }
            }
          }
            ?>