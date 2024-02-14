<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 

            if ($fetchuser_id != '0') {
              $fetch_missing = "SELECT * FROM gradesheet WHERE course_id='$std_course1' AND user_id='$fetchuser_id' AND instructor IS NOT NULL AND over_all_grade IS NULL ORDER BY id";
              $fetch_missingstatement1 = $connect->prepare($fetch_missing);
              $fetch_missingstatement1->execute();
              $fetch_missingresult1 = $fetch_missingstatement1->fetchAll();
              foreach ($fetch_missingresult1 as $row1151) {
                $table_name10 = $row1151['class'];
                $symbol_id10 = $row1151['class_id'];
                $inst_Id = $row1151['instructor'];

                if ($table_name10 == "actual") {
                  $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                  $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
                  $q12 = $connect->query("SELECT count(*) FROM $table_name10 WHERE id = '$symbol_id10'");
                } else if ($table_name10 == "sim") {
                  $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                  $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
                  $q12 = $connect->query("SELECT count(*) FROM $table_name10 WHERE id = '$symbol_id10'");
                }

                $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$inst_Id'");
                $insD = $insQ->fetchColumn();

                $name111221 = $q11->fetchColumn();
                $q10->execute([$symbol_id10]);
                $name_class = $q10->fetchColumn();
                $countClass = $q12->fetchColumn();
                if ($countClass > 0) {

            ?>
                  <a href="newgradesheet.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>" class="btn btn-danger position-relative"><?php echo $name_class; ?>

                    <span class="circleig1"><?php echo $insD; ?></span>
                  </a>
              <?php
                }
              }
              ?>
              <?php $fetch_missing1 = "SELECT * FROM cloned_gradesheet WHERE course_id='$std_course1' AND user_id='$fetchuser_id' AND instructor IS NOT NULL AND over_all_grade IS NULL ORDER BY id";
              $fetch_missing1statement1 = $connect->prepare($fetch_missing1);
              $fetch_missing1statement1->execute();
              $fetch_missing1result1 = $fetch_missing1statement1->fetchAll();
              foreach ($fetch_missing1result1 as $row1152) {
                $table_name10 = $row1152['class'];
                $symbol_id10 = $row1152['class_id'];
                $inst_Id = $row1152['instructor'];
                $cl_id = $row1152['cloned_id'];
                if ($table_name10 == "actual") {
                  $q10 = $connect->prepare("SELECT symbol FROM $table_name10 WHERE id=?");
                  $q11 = $connect->query("SELECT actual FROM $table_name10 WHERE id = '$symbol_id10'");
                  $q12 = $connect->query("SELECT count(*) FROM $table_name10 WHERE id = '$symbol_id10'");
                } else if ($table_name10 == "sim") {
                  $q10 = $connect->prepare("SELECT shortsim FROM $table_name10 WHERE id=?");
                  $q11 = $connect->query("SELECT sim FROM $table_name10 WHERE id = '$symbol_id10'");
                  $q12 = $connect->query("SELECT count(*) FROM $table_name10 WHERE id = '$symbol_id10'");
                }

                $insQ = $connect->query("SELECT nickname FROM users WHERE id = '$inst_Id'");
                $insD = $insQ->fetchColumn();

                $name111221 = $q11->fetchColumn();
                $q10->execute([$symbol_id10]);
                $name_class = $q10->fetchColumn();
                $countClass = $q12->fetchColumn();
                if ($countClass > 0) {
                  $xString4 = str_repeat("x", $cl_id);
              ?>
                  <a href="newgradesheetcl.php?id=<?php echo urlencode(base64_encode($symbol_id10)) ?>&class_name=<?php echo urlencode(base64_encode($table_name10)) ?>&clone_ides=<?php echo urlencode(base64_encode($cl_id)); ?>" class="btn btn-danger position-relative"><?php echo $name_class . $xString4; ?>
                    <span class="circleig1"><?php echo $insD; ?></span>
                  </a>
            <?php
                }
              }
            }
          }
            ?>