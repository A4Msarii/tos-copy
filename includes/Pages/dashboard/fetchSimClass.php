<?php
include('../../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');

if (isset($_REQUEST['ctpId'])) {
    $std_course1 = $_REQUEST['ctpId'];
    
    $fetchuser_id = $_REQUEST['userId']; 

            if ($fetchuser_id != '0') {
              $query_sim = "SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
            FROM (
                SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, NULL as cloned_id
                FROM gradesheet WHERE class = 'sim'
                                      AND course_id = '$std_course1'
                                      AND user_id = '$fetchuser_id'
                                      AND over_all_grade IS NOT NULL
                UNION
                SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
                FROM cloned_gradesheet WHERE class = 'sim'
                                      AND course_id = '$std_course1'
                                      AND user_id = '$fetchuser_id'
                                      AND over_all_grade IS NOT NULL
            ) AS combined_data
            ORDER BY date DESC
            LIMIT 3";
              $statement_sim = $connect->prepare($query_sim);

              $statement_sim->execute();
              if ($statement_sim->rowCount() > 0) {
            ?>
                <td>
                  <?php $result_sim = $statement_sim->fetchAll();
                  $cR = 0;
                  foreach ($result_sim as $row) {
                    if ($cR == 3) {
                      break;
                    }
                    $gradess_sim = $row['over_all_grade'];
                    $gradess_per_sim = $row['over_all_grade_per'];
                    $class_ides_sim = $row['class_id'];
                    $clone_id = $row['cloned_id'];
                    $class_name_fect_sim = $connect->prepare("SELECT shortsim FROM sim WHERE id=?");
                    $class_name_fect_sim->execute([$class_ides_sim]);
                    $class_name_fects_sim = $class_name_fect_sim->fetchColumn();
                    $ins_id_sim = $row['instructor'];
                    $sel_ins_sim = $connect->prepare("SELECT `name` FROM `users` WHERE id=?");
                    $sel_ins_sim->execute([$ins_id_sim]);
                    $sel_ins_name_sim = $sel_ins_sim->fetchColumn();

                    $sel_ins_sim1 = $connect->prepare("SELECT `nickname` FROM `users` WHERE id=?");
                    $sel_ins_sim1->execute([$ins_id_sim]);
                    $sel_ins_name_sim1 = $sel_ins_sim1->fetchColumn();

                    $codeIdData = $row['gradsheet_status'];

                    $codeName = $connect->prepare("SELECT code FROM `status` WHERE id=?");
                    $codeName->execute([$codeIdData]);
                    $codeNameData = $codeName->fetchColumn();

                    if ($codeNameData == "") {
                      $codeNameData = "";
                    }

                    if ($gradess_sim == "U") {
                      $class1_sim = "btn btn-danger";
                    } elseif ($gradess_sim == "F") {
                      $class1_sim = "btn btn-warning";
                    } elseif ($gradess_sim == "G") {
                      $class1_sim = "btn btn-secondary";
                    } elseif ($gradess_sim == "V") {
                      $class1_sim = "btn btn-success";
                    } elseif ($gradess_sim == "E") {
                      $class1_sim = "btn btn-primary";
                    } elseif ($gradess_sim == "N") {
                      $class1_sim = "btn btn-dark";
                    } else {
                      $class1_sim = "btn btn-dark";
                    }
                    $xString2 = str_repeat("x", $clone_id);
                  ?>
                    <div class="row">
                      <h4 class="btnFlip" style="position: relative;"><span class="legend-indicator bg-danger"></span>
                        <a style="font-weight:bold;" href="newgradesheet.php?id=<?php echo urlencode(base64_encode($class_ides_sim)) ?>&class_name=<?php echo urlencode(base64_encode('sim')) ?>"><?php if ($clone_id != "") {
                                                                                                                                                                                                    echo $class_name_fects_sim . $xString2;
                                                                                                                                                                                                  } else {
                                                                                                                                                                                                    echo $class_name_fects_sim;
                                                                                                                                                                                                  } ?></a>
                        <span class="tooltip-text" class="top1" style="white-space: nowrap;"><?php echo $sel_ins_name_sim1; ?></span>
                      </h4>
                      <div class="col-12">

                        <span style="font-weight:bolder; font-size:larger; width:5%; text-align:center; padding:5px;" class="badge<?php echo $class1_sim ?>"><?php echo $gradess_sim; ?></span> -
                        <span style="font-weight:bolder; font-size:larger;" class="badge <?php echo $class1_sim; ?>">
                          <i class="bi-graph-up"></i> <?php echo $gradess_per_sim; ?>%
                        </span> -
                        <?php if ($codeNameData != "") { ?>
                          <span style="font-weight:bolder; font-size:larger;color: darkgoldenrod; font-family: cursive; background: #e2e4e6;" class="badge">
                            <span><?php echo $codeNameData; ?></span>
                          </span>
                        <?php } ?>
                        <div class="slidecontainer" style="margin-top: 23px;">
                          <progress style="width:100%;" id="file" max="100" value=<?php echo $gradess_per_sim ?>><?php echo $gradess_per_sim ?></progress>

                        </div>
                        <hr>
                      </div>
                    </div>
                  <?php $cR++;
                  }
                  ?>
                </td>
            <?php
              }
            }
            } ?>